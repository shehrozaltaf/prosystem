<?php

class Actual extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('budget_model/mactual');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Actual Data",
            "result" => "View Actual page. Fucntion: Actual/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());

        $Mactual = new Mactual();
        $data['data'] = $Mactual->getAll();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/actual', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addActual_view()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Project",
            "result" => "View Project page. Fucntion: Actual/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'budget_controllers/Actual');

        $MActual = new Mactual();
        $data['data'] = $MActual->getAll();
        $data['project'] = $Custom->selectAllQuery('project', 'idProject', 'isActive');
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/actual_add', $data);
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
     /*   if (!isset($_POST['bdgt_code']) || $_POST['bdgt_code'] == '' || $_POST['bdgt_code'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Code');
            $flag = 1;
            echo json_encode($result);
            exit();
        }*/
        if (!isset($_POST['empl_code']) || $_POST['empl_code'] == '' || $_POST['empl_code'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Code');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['actl_pctg']) || $_POST['actl_pctg'] == '' || $_POST['actl_pctg'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Percentage');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['actl_month']) || $_POST['actl_month'] == '' || $_POST['actl_month'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Month');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['actl_year']) || $_POST['actl_year'] == '' || $_POST['actl_year'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Year');
            $flag = 1;
            echo json_encode($result);
            exit();
        }


        if ($flag == 0) {
            $Custom = new Custom();
            $insertArray = array();
            $insertArray['actl_month'] = $_POST['actl_month'];
            $insertArray['actl_year'] = $_POST['actl_year'];
            $insertArray['proj_code'] = $_POST['proj_code'];
//            $insertArray['bdgt_code'] = $_POST['bdgt_code'];
            $insertArray['empl_code'] = $_POST['empl_code'];
            $insertArray['actl_pctg'] = $_POST['actl_pctg'];
            $insertArray['isActive'] = 1;
            $insertArray['createdBy'] = $_SESSION['login']['idUser'];
            $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($insertArray, 'idActual', 'b_actual', 'N');
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
        if (isset($_POST['idActual']) && $_POST['idActual'] != '') {
            $idActual = $_POST['idActual'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idActual', $idActual, 'b_actual');
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


    function editActual_view()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Project",
            "result" => "View Project page. Fucntion: Actual/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'budget_controllers/Actual');

        $MActual = new Mactual();
        $data['data'] = $MActual->getAll();
        $data['project'] = $Custom->selectAllQuery('project', 'idProject', 'isActive');
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/actual_edit', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function updateData()
    {
        $flag = 0;
        if (!isset($_POST['idActual']) || $_POST['idActual'] == '' || $_POST['idActual'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Actual ID');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
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
        if (!isset($_POST['actl_pctg']) || $_POST['actl_pctg'] == '' || $_POST['actl_pctg'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Percentage');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['actl_month']) || $_POST['actl_month'] == '' || $_POST['actl_month'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Month');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['actl_year']) || $_POST['actl_year'] == '' || $_POST['actl_year'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Year');
            $flag = 1;
            echo json_encode($result);
            exit();
        }


        if ($flag == 0) {
            $idActual = $_POST['idActual'];
            $Custom = new Custom();
            $editArr = array();
            $editArr['proj_code'] = $_POST['proj_code'];
            $editArr['empl_code'] = $_POST['empl_code'];
            $editArr['actl_pctg'] = $_POST['actl_pctg'];
            $editArr['actl_month'] = $_POST['actl_month'];
            $editArr['actl_year'] = $_POST['actl_year'];
            $editArr['updateBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            // $insertArray['createdBy'] = $_SESSION['login']['idUser'];
            // $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idActual', $idActual, 'b_actual');
            if ($editData) {
                $result = array('0' => 'Success', '1' => 'Successfully updated');
            } else {
                $result = array('0' => 'Error', '1' => 'Error in updated Data');
            }
            echo json_encode($result);
        }

    }


}

?>