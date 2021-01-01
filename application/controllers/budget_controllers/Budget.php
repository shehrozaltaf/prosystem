<?php

class Budget extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('budget_model/mbudget');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {

        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Budget",
            "result" => "View Budget page. Fucntion: Budget/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $Mbudget = new Mbudget();
//        $data['data'] = $Mbudget->getAll();
        $data['project'] = $Custom->selectAllQuery('project', 'idProject', 'isActive', 'DESC');
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/budget', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function getData()
    {
        $M = new Mbudget();
        $orderindex = (isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column'] : '');
        $orderby = (isset($_REQUEST['columns'][$orderindex]['name']) ? $_REQUEST['columns'][$orderindex]['name'] : '');
        $searchData = array();

        $searchData['proj_code'] = (isset($_REQUEST['proj_code']) && $_REQUEST['proj_code'] != '' ? $_REQUEST['proj_code'] : 0);
        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : 25);
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'b_budget.idBugt');
        $searchData['ordersort'] = (isset($_REQUEST['order'][0]['dir']) && $_REQUEST['order'][0]['dir'] != '' ? $_REQUEST['order'][0]['dir'] : 'desc');
        $data = $M->getBdgt($searchData);
        $table_data = array();
        $result_table_data = array();
        $SNo = 0;
        foreach ($data as $key => $value) {

            $table_data[$value->idBugt]['proj_code'] = $value->proj_code;
            $table_data[$value->idBugt]['bdgt_code'] = $value->bdgt_code;
            $table_data[$value->idBugt]['Band'] = $value->band;
            $table_data[$value->idBugt]['Position'] = $value->desig;
            $table_data[$value->idBugt]['Amount'] = $value->bdgt_amnt;
            $table_data[$value->idBugt]['Percentage'] = (isset($value->bdgt_pctg) && $value->bdgt_pctg != '' ? $value->bdgt_pctg : '0') . '%';
            $table_data[$value->idBugt]['Start Month-Year'] = $this->returnM($value->bdgt_start_month) . '-' . $value->bdgt_start_year;
            $table_data[$value->idBugt]['End Month-Year'] = $this->returnM($value->bdgt_end_month) . '-' . $value->bdgt_end_year;
            $table_data[$value->idBugt]['Action'] = '
                          <a href="javascript:void(0)" onclick="getDelete(this)" data-id="'.$value->idBugt.'">
                                <i class="feather icon-trash"></i>
                            </a> ';

        }
        foreach ($table_data as $k => $v) {
            $result_table_data[] = $v;
        }

        $result["draw"] = (isset($_REQUEST['draw']) && $_REQUEST['draw'] != '' ? $_REQUEST['draw'] : 0);
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 10000000;
        $totalsearchData['proj_code'] = $searchData['proj_code'];

        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalrecords = $M->getCntTotalBdgt($totalsearchData);

        $result["recordsTotal"] = $totalrecords[0]->cnttotal;
        $result["recordsFiltered"] = $totalrecords[0]->cnttotal;
        $result["data"] = $result_table_data;

        echo json_encode($result, true);
    }

    function returnM($month)
    {
        if ($month == 1) {
            $res = 'Jan';
        } elseif ($month == 2) {
            $res = 'Feb';
        } elseif ($month == 3) {
            $res = 'Mar';
        } elseif ($month == 4) {
            $res = 'Apr';
        } elseif ($month == 5) {
            $res = 'May';
        } elseif ($month == 6) {
            $res = 'June';
        } elseif ($month == 7) {
            $res = 'July';
        } elseif ($month == 8) {
            $res = 'Aug';
        } elseif ($month == 9) {
            $res = 'Sep';
        } elseif ($month == 10) {
            $res = 'Oct';
        } elseif ($month == 11) {
            $res = 'Nov';
        } elseif ($month == 12) {
            $res = 'Dec';
        } else {
            $res = '';
        }
        return $res;
    }

    function addBudget_view()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Budget",
            "result" => "View Budget page. Fucntion: Budget/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'budget_controllers/Budget');

        $Mbudget = new Mbudget();
        $data['data'] = $Mbudget->getAll();
        $data['project'] = $Custom->selectAllQuery('project', 'idProject', 'isActive', 'DESC');
        $data['band'] = $Custom->selectAllQuery('hr_band', 'id');
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/budget_add', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function getDesignation()
    {
        if (isset($_POST['bdgt_band']) && $_POST['bdgt_band'] != '') {
            $M = new Mbudget();
            $getDesignation = $M->getDesignation($_POST['bdgt_band']);
            $result = array('0' => 'Success', '1' => $getDesignation);
        } else {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Band');
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
        if (!isset($_POST['budgData']) || $_POST['budgData'] == '' || $_POST['budgData'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Data');
        } else {
            $proj_code = $_POST['proj_code'];
            foreach ($_POST['budgData'] as $kv => $bv) {
                if (!isset($bv['bdgt_code']) || $bv['bdgt_code'] == '' || $bv['bdgt_code'] == '0') {
                    $result = array('0' => 'Error', '1' => 'Invalid Budget Code');
                    $flag = 1;
                    echo json_encode($result);
                    exit();
                }
                if (!isset($bv['bdgt_posi']) || $bv['bdgt_posi'] == '' || $bv['bdgt_posi'] == '0') {
                    $result = array('0' => 'Error', '1' => 'Invalid Position');
                    $flag = 1;
                    echo json_encode($result);
                    exit();
                }
                if (!isset($bv['bdgt_band']) || $bv['bdgt_band'] == '' || $bv['bdgt_band'] == '0') {
                    $result = array('0' => 'Error', '1' => 'Invalid Budget Band');
                    $flag = 1;
                    echo json_encode($result);
                    exit();
                }

                if (!isset($bv['bdgt_amnt']) || $bv['bdgt_amnt'] == '' || $bv['bdgt_amnt'] == '0') {
                    $result = array('0' => 'Error', '1' => 'Invalid Amount');
                    $flag = 1;
                    echo json_encode($result);
                    exit();
                }
                if (!isset($bv['bdgt_pctg']) || $bv['bdgt_pctg'] == '' || $bv['bdgt_pctg'] == '0') {
                    $result = array('0' => 'Error', '1' => 'Invalid Percentage');
                    $flag = 1;
                    echo json_encode($result);
                    exit();
                }
                if (!isset($bv['bdgt_start_month']) || $bv['bdgt_start_month'] == '' || $bv['bdgt_start_month'] == '0') {
                    $result = array('0' => 'Error', '1' => 'Invalid Budget Start Month');
                    $flag = 1;
                    echo json_encode($result);
                    exit();
                }
                if (!isset($bv['bdgt_start_year']) || $bv['bdgt_start_year'] == '' || $bv['bdgt_start_year'] == '0') {
                    $result = array('0' => 'Error', '1' => 'Invalid Budget Start Year');
                    $flag = 1;
                    echo json_encode($result);
                    exit();
                }
                if (!isset($bv['bdgt_end_month']) || $bv['bdgt_end_month'] == '' || $bv['bdgt_end_month'] == '0') {
                    $result = array('0' => 'Error', '1' => 'Invalid Budget End Month');
                    $flag = 1;
                    echo json_encode($result);
                    exit();
                }
                if (!isset($bv['bdgt_end_year']) || $bv['bdgt_end_year'] == '' || $bv['bdgt_end_year'] == '0') {
                    $result = array('0' => 'Error', '1' => 'Invalid Budget End Year');
                    $flag = 1;
                    echo json_encode($result);
                    exit();
                }
                if ($flag == 0) {
                    $Custom = new Custom();
                    $insertArray = array();
                    $insertArray['proj_code'] = $proj_code;
                    $insertArray['bdgt_code'] = $bv['bdgt_code'];
                    $insertArray['bdgt_posi'] = $bv['bdgt_posi'];
                    $insertArray['bdgt_band'] = $bv['bdgt_band'];
                    $insertArray['bdgt_amnt'] = $bv['bdgt_amnt'];
                    $insertArray['bdgt_pctg'] = $bv['bdgt_pctg'];
                    $insertArray['bdgt_start_month'] = $bv['bdgt_start_month'];
                    $insertArray['bdgt_start_year'] = $bv['bdgt_start_year'];
                    $insertArray['bdgt_end_month'] = $bv['bdgt_end_month'];
                    $insertArray['bdgt_end_year'] = $bv['bdgt_end_year'];
                    $insertArray['start_m_y'] = $bv['bdgt_start_year'] . '-' . $bv['bdgt_start_month'] . '-' . '01';
                    $insertArray['end_m_y'] = $bv['bdgt_end_year'] . '-' . $bv['bdgt_end_month'] . '-' . '30';
                    $insertArray['isActive'] = 1;
                    $insertArray['assigned'] = 0;
                    $insertArray['createdBy'] = $_SESSION['login']['idUser'];
                    $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
                    $InsertData = $Custom->Insert($insertArray, 'idBugt', 'b_budget', 'N');
                    if ($InsertData) {
                        $result = array('0' => 'Success', '1' => 'Successfully Inserted');
                    } else {
                        $result = array('0' => 'Error', '1' => 'Error in Inserting Data');
                    }
                }
            }

        }
        echo json_encode($result);
    }

    function deleteData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idBugt']) && $_POST['idBugt'] != '') {
            $idBugt = $_POST['idBugt'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idBugt', $idBugt, 'b_budget');
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


    function getEmployees()
    {
        if (isset($_POST['bdgt_code']) && $_POST['bdgt_code'] != '') {
            $M = new Mbudget();
            $getBandEmp = $M->getBandEmp($_POST['bdgt_code']);
            $result = array('0' => 'Success', '1' => $getBandEmp);
        } else {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Code');
        }
        echo json_encode($result);
    }

    function getEmployeesByDesi()
    {
        if (isset($_POST['desi']) && $_POST['desi'] != '') {
            $M = new Mbudget();
            $getBandEmp = $M->getDesigEmp($_POST['desi']);
            $result = array('0' => 'Success', '1' => $getBandEmp);
        } else {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Code');
        }
        echo json_encode($result);
    }

    function getBand_Month_Year()
    {
        if (isset($_POST['bdgt_code']) && $_POST['bdgt_code'] != '' && isset($_POST['proj_code']) && $_POST['proj_code'] != '') {
            $M = new Mbudget();

            $getBandEmp = $M->getBands_Month_Year($_POST['bdgt_code'], $_POST['proj_code']);
            if (isset($getBandEmp[0]->bdgt_start_month) && $getBandEmp[0]->bdgt_start_month != '') {
                $sm = $getBandEmp[0]->bdgt_start_month;
            } else {
                $sm = date('m');
            }
            if (isset($getBandEmp[0]->bdgt_start_year) && $getBandEmp[0]->bdgt_start_year != '') {
                $sy = $getBandEmp[0]->bdgt_start_year;
            } else {
                $sy = date('Y');
            }
            if (isset($getBandEmp[0]->bdgt_end_month) && $getBandEmp[0]->bdgt_end_month != '') {
                $em = $getBandEmp[0]->bdgt_end_month;
            } else {
                $em = date('m');
            }
            if (isset($getBandEmp[0]->bdgt_end_year) && $getBandEmp[0]->bdgt_end_year != '') {
                $ey = $getBandEmp[0]->bdgt_end_year;
            } else {
                $ey = date('Y');
            }
            $sd = $sy . '-' . $sm . '-01';
            $ed = $ey . '-' . $em . '-01';
            $data = $this->getDatesFromRange($sd, $ed);
            $result = array('0' => 'Success', '1' => $data);
        } else {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Code');
        }
        echo json_encode($result);
    }

    function getDatesFromRange($start, $end, $format = 'M-Y')
    {
        $array = array();
        $interval = new DateInterval('P1D');
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
        foreach ($period as $date) {
            $array[$date->format($format)] = $date->format($format);
        }
        return $array;
    }


}

?>