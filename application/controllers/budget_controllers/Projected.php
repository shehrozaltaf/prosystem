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
        $Mprojected = new Mprojected();
        $data['data'] = $Mprojected->getAll();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/projected', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
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
        $data['project'] = $Custom->selectAllQuery('project', 'idProject', 'isActive');
        $data['hr_employee'] = $Custom->selectAllQuery('hr_employee', 'id', 'status');

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/projected_add', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
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
        if (!isset($_POST['empl_code']) || $_POST['empl_code'] == '' || $_POST['empl_code'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Code');
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

        if ($flag == 0) {
            $Custom = new Custom();
            $insertArray = array();
            $insertArray['proj_code'] = $_POST['proj_code'];
            $insertArray['empl_code'] = $_POST['empl_code'];
            $insertArray['bdgt_code'] = $_POST['bdgt_code'];
            /*$insertArray['prjn_pctg'] = $_POST['prjn_pctg'];
            $insertArray['prjn_month'] = $_POST['prjn_month'];
            $insertArray['prjn_year'] = $_POST['prjn_year'];*/

            $insertArray['isActive'] = 1;
            $insertArray['createdBy'] = $_SESSION['login']['idUser'];
            $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($insertArray, 'idPrjn', 'b_projected', 'N');
            if ($InsertData) {
                $result = array('0' => 'Success', '1' => 'Successfully Inserted');
            } else {
                $result = array('0' => 'Error', '1' => 'Error in Inserting Data');
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


}

?>