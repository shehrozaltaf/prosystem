<?php

class Projected extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('budget_model/mprojected');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Projected",
            "result" => "View Projected page. Fucntion: Projected/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $data['project'] = $Custom->selectAllQuery('project', 'idProject', 'isActive', 'DESC');
        $data['hr_employee'] = $Custom->selectAllQuery('hr_employee', 'id', 'status');
        $data['hr_desig'] = $Custom->selectAllQuery('hr_desig', 'id', '');
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/projected', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function getProjected()
    {
        $M = new Mprojected();
        $orderindex = (isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column'] : '');
        $orderby = (isset($_REQUEST['columns'][$orderindex]['name']) ? $_REQUEST['columns'][$orderindex]['name'] : '');
        $searchData = array();

        $searchData['proj_code'] = (isset($_REQUEST['proj_code']) && $_REQUEST['proj_code'] != '' ? $_REQUEST['proj_code'] : 0);
        $searchData['bdgt_code'] = (isset($_REQUEST['bdgt_code']) && $_REQUEST['bdgt_code'] != '' ? $_REQUEST['bdgt_code'] : 0);
        $searchData['emp_code'] = (isset($_REQUEST['emp_code']) && $_REQUEST['emp_code'] != '' ? $_REQUEST['emp_code'] : 0);
        $searchData['desig'] = (isset($_REQUEST['desig']) && $_REQUEST['desig'] != '' ? $_REQUEST['desig'] : 0);

        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : 25);
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'p.idPrjn');
        $searchData['ordersort'] = (isset($_REQUEST['order'][0]['dir']) && $_REQUEST['order'][0]['dir'] != '' ? $_REQUEST['order'][0]['dir'] : 'desc');
        $data = $M->getProjected($searchData);
        $table_data = array();
        $result_table_data = array();
        foreach ($data as $key => $value) {


            $table_data[$value->idPrjn]['proj_code'] = $value->proj_code;
            $table_data[$value->idPrjn]['bdgt_code'] = $value->bdgt_code;
            $table_data[$value->idPrjn]['empl_code'] = $value->empname . ' (' . $value->empl_code . ')';
            $table_data[$value->idPrjn]['prjn_pctg'] = $value->prjn_pctg;
            $table_data[$value->idPrjn]['prjn_month'] = $value->prjn_month;
            $table_data[$value->idPrjn]['prjn_year'] = $value->prjn_year;
            $table_data[$value->idPrjn]['Action'] = '
              <a href="javascript:void(0)" onclick="getCopy(this)">
                                                                <i class="feather icon-copy"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" onclick="getDelete(this)">
                                                                <i class="feather icon-trash"></i>
                                                            </a>
                                                             ';

        }
        foreach ($table_data as $k => $v) {
            $result_table_data[] = $v;
        }

        $result["draw"] = (isset($_REQUEST['draw']) && $_REQUEST['draw'] != '' ? $_REQUEST['draw'] : 0);
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 10000000;
        $totalsearchData['proj_code'] = $searchData['proj_code'];
        $totalsearchData['bdgt_code'] = $searchData['bdgt_code'];
        $totalsearchData['emp_code'] = $searchData['emp_code'];
        $totalsearchData['desig'] = $searchData['desig'];

        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalrecords = $M->getCntTotalProjected($totalsearchData);

        $result["recordsTotal"] = $totalrecords[0]->cnttotal;
        $result["recordsFiltered"] = $totalrecords[0]->cnttotal;
        $result["data"] = $result_table_data;

        echo json_encode($result, true);
    }

    function addProjected_view()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Project",
            "result" => "View Project page. Fucntion: Projected/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'budget_controllers/Projected');

        $Mprojected = new Mprojected();
        $data['data'] = $Mprojected->getAll();
        $data['project'] = $Custom->selectAllQuery('project', 'idProject', 'isActive', 'DESC');
        $data['hr_employee'] = $Custom->selectAllQuery('hr_employee', 'id', 'status');

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/projected_add', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function getprojectByMY()
    {
        if (isset($_POST['prjn_month']) && $_POST['prjn_month'] != '' && isset($_POST['prjn_year']) && $_POST['prjn_year'] != '') {
            $prjn_month = $_POST['prjn_month'];
            $prjn_year = $_POST['prjn_year'];
            $this->load->model('budget_model/mproject');
            $M = new Mproject();
            $s = $prjn_year . '-' . $prjn_month . '-01';
            $e = '2030-12-30';
            $getData = $M->getProjectByMY($s, $e);
            $result = array('0' => 'Success', '1' => $getData);
        } else {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Code');
        }
        echo json_encode($result);
    }

    function checkProjectedData()
    {
        $flag = 0;
        $result = array('0' => 'Error', '1' => 'Invalid Data');
        if (!isset($_POST['prjn_month']) || $_POST['prjn_month'] == '') {
            $result = array('0' => 'Error', '1' => 'Invalid Month');
            $flag = 1;
        }
        if (!isset($_POST['prjn_year']) || $_POST['prjn_year'] == '') {
            $result = array('0' => 'Error', '1' => 'Invalid Year');
            $flag = 1;
        }
        if (!isset($_POST['proj_code']) || $_POST['proj_code'] == '') {
            $result = array('0' => 'Error', '1' => 'Invalid Project Code');
            $flag = 1;
        }
        if (!isset($_POST['bdgt_code']) || $_POST['bdgt_code'] == '') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Code');
            $flag = 1;
        }
        if ($flag == 0) {
            $searchData = array();
            $searchData['prjn_month'] = $_POST['prjn_month'];
            $searchData['prjn_year'] = $_POST['prjn_year'];
            $searchData['proj_code'] = $_POST['proj_code'];
            $searchData['bdgt_code'] = $_POST['bdgt_code'];
            $M = new Mprojected();
            $getData = $M->checkBdgtProjected($searchData);
            $result = array('0' => 'Success', '1' => $getData);
        }
        echo json_encode($result);
    }

    function insertData()
    {
        $flag = 0;
        if (!isset($_POST['proj_code']) || $_POST['proj_code'] == '' || $_POST['proj_code'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Project Code');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['bdgt_code']) || $_POST['bdgt_code'] == '' || $_POST['bdgt_code'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['prjn_month']) || $_POST['prjn_month'] == '' || $_POST['prjn_month'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Month');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['prjn_year']) || $_POST['prjn_year'] == '' || $_POST['prjn_year'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Year');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['empList']) || $_POST['empList'] == '' || $_POST['empList'] == '0' || count($_POST['empList']) == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Month Year');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if ($flag == 0) {
            $Custom = new Custom();
//            $expMY = explode('-', $_POST['prjn_month']);
            $insertArray = array();

            $insertArray['proj_code'] = $_POST['proj_code'];
            $insertArray['bdgt_code'] = $_POST['bdgt_code'];
            $insertArray['prjn_month'] = $_POST['prjn_month'];
            $insertArray['prjn_year'] = $_POST['prjn_year'];
            $insertArray['isActive'] = 1;
            $insertArray['createdBy'] = $_SESSION['login']['idUser'];
            $insertArray['createdDateTime'] = date('Y-m-d H:i:s');

            foreach ($_POST['empList'] as $emp) {
                $insertArray['empl_code'] = $emp['emp'];
                $insertArray['prjn_pctg'] = $emp['perc'];
                $InsertData = $Custom->Insert($insertArray, 'idPrjn', 'b_projected', 'N');
                if ($InsertData) {
                    $result = array('0' => 'Success', '1' => 'Successfully Inserted');
                } else {
                    $result = array('0' => 'Error', '1' => 'Error in Inserting Data');
                }
            }
            echo json_encode($result);
        }

    }

    function deleteData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idPrjn']) && $_POST['idPrjn'] != '') {
            $idPrjn = $_POST['idPrjn'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idPrjn', $idPrjn, 'b_projected');
            $trackarray = array("action" => "Delete Page setting -> Function: deletePageData() ",
                "result" => $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            $result = 3;
        }
        echo $result;
    }

    /* function cloneData()
     {
         $flag = 0;
         if (!isset($_POST['proj_code']) || $_POST['proj_code'] == '' || $_POST['proj_code'] == '0') {
             $result = array('0' => 'Error', '1' => 'Invalid Project Code');
             $flag = 1;
             echo json_encode($result);
             exit();
         }

         if (!isset($_POST['bdgt_code']) || $_POST['bdgt_code'] == '' || $_POST['bdgt_code'] == '0') {
             $result = array('0' => 'Error', '1' => 'Invalid Budget');
             $flag = 1;
             echo json_encode($result);
             exit();
         }
         if (!isset($_POST['prjn_month']) || $_POST['prjn_month'] == '' || $_POST['prjn_month'] == '0') {
             $result = array('0' => 'Error', '1' => 'Invalid Budget Month Year');
             $flag = 1;
             echo json_encode($result);
             exit();
         }
         if ($flag == 0) {
             $Custom = new Custom();
             $expMY = explode('-', $_POST['prjn_month']);
             $insertArray = array();

             $insertArray['proj_code'] = $_POST['proj_code'];
             $insertArray['bdgt_code'] = $_POST['bdgt_code'];
             $insertArray['prjn_month'] = $expMY[0];
             $insertArray['prjn_year'] = $expMY[1];
             $insertArray['isActive'] = 1;
             $insertArray['createdBy'] = $_SESSION['login']['idUser'];
             $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
             $insertArray['empl_code'] = $_POST['empl_code'];
             $insertArray['prjn_pctg'] = $_POST['prjn_pctg'];
             $InsertData = $Custom->Insert($insertArray, 'idPrjn', 'b_projected', 'N');
             if ($InsertData) {
                 $result = array('0' => 'Success', '1' => 'Successfully Inserted');
             } else {
                 $result = array('0' => 'Error', '1' => 'Error in Inserting Data');
             }
             echo json_encode($result);
         }

     }*/

    function cloneData()
    {
        $flag = 0;
        if (!isset($_POST['proj_code']) || $_POST['proj_code'] == '' || $_POST['proj_code'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Project Code');
            $flag = 1;
            echo json_encode($result);
            exit();
        }

        if (!isset($_POST['bdgt_code']) || $_POST['bdgt_code'] == '' || $_POST['bdgt_code'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['prjn_month']) || $_POST['prjn_month'] == '' || $_POST['prjn_month'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Month Year');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if ($flag == 0) {
            $searchData = array();
            $searchData['prjn_month'] = $_POST['prjn_month'];
            $searchData['prjn_year'] = $_POST['prjn_year'];
            $searchData['proj_code'] = $_POST['proj_code'];
            $searchData['bdgt_code'] = $_POST['bdgt_code'];
            $searchData['hr_active'] = 1;
            $M = new Mprojected();
            $getData = $M->checkBdgtProjected($searchData);
            if (isset($getData) && $getData != '') {
                $Custom = new Custom();
                $expMY = explode('-', $_POST['cloned_prjn_month_year']);
                if ($expMY[0] == 'Jan') {
                    $m = '03';
                } elseif ($expMY[0] == 'Feb') {
                    $m = '02';
                } elseif ($expMY[0] == 'Mar') {
                    $m = '03';
                } elseif ($expMY[0] == 'Apr') {
                    $m = '04';
                } elseif ($expMY[0] == 'May') {
                    $m = '05';
                } elseif ($expMY[0] == 'Jun') {
                    $m = '06';
                } elseif ($expMY[0] == 'Jul') {
                    $m = '07';
                } elseif ($expMY[0] == 'Aug') {
                    $m = '08';
                } elseif ($expMY[0] == 'Sep') {
                    $m = '09';
                } elseif ($expMY[0] == 'Oct') {
                    $m = '10';
                } elseif ($expMY[0] == 'Nov') {
                    $m = '11';
                } elseif ($expMY[0] == 'Dec') {
                    $m = '12';
                } else {
                    $m = $expMY[0];
                }
                foreach ($getData as $k => $v) {
                    $insertArray = array();
                    $insertArray['proj_code'] = $v->proj_code;
                    $insertArray['bdgt_code'] = $v->bdgt_code;
                    $insertArray['prjn_month'] = $m;
                    $insertArray['prjn_year'] = $expMY[1];
                    $insertArray['isActive'] = 1;
                    $insertArray['createdBy'] = $_SESSION['login']['idUser'];
                    $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
                    $insertArray['empl_code'] = $v->empl_code;
                    $insertArray['prjn_pctg'] = $v->prjn_pctg;
                    $InsertData = $Custom->Insert($insertArray, 'idPrjn', 'b_projected', 'N');
                    if ($InsertData) {
                        $result = array('0' => 'Success', '1' => 'Successfully Inserted');
                    } else {
                        $result = array('0' => 'Error', '1' => 'Error in Inserting Data');
                    }
                }
            } else {
                $result = array('0' => 'Error', '1' => 'No Data Found');
            }
            echo json_encode($result);
        }

    }


}

?>