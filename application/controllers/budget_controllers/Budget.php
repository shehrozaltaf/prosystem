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
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '',  uri_string());
        $Mbudget = new Mbudget();
        $data['data'] = $Mbudget->getAll();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/budget', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addBudget_view(){
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Budget",
            "result" => "View Budget page. Fucntion: Budget/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '',  uri_string());

        $Mbudget = new Mbudget();
        $data['data'] = $Mbudget->getAll();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/budget_add', $data);
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
        if (!isset($_POST['bdgt_code']) || $_POST['bdgt_code'] == '' || $_POST['bdgt_code'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Code');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['bdgt_posi']) || $_POST['bdgt_posi'] == '' || $_POST['bdgt_posi'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Position');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['bdgt_band']) || $_POST['bdgt_band'] == '' || $_POST['bdgt_band'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Budget Band');
            $flag = 1;
            echo json_encode($result);
            exit();
        } 

        if (!isset($_POST['bdgt_amnt']) || $_POST['bdgt_amnt'] == '' || $_POST['bdgt_amnt'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Amount');
            $flag = 1;
            echo json_encode($result);
            exit();
        } 
        if (!isset($_POST['bdgt_pctg']) || $_POST['bdgt_pctg'] == '' || $_POST['bdgt_pctg'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Percentage');
            $flag = 1;
            echo json_encode($result);
            exit();
        } 
        if (!isset($_POST['bdgt_month']) || $_POST['bdgt_month'] == '' || $_POST['bdgt_month'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Prohect Month');
            $flag = 1;
            echo json_encode($result);
            exit();
        } 
        if (!isset($_POST['bdgt_year']) || $_POST['bdgt_year'] == '' || $_POST['bdgt_year'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Prohect Year');
            $flag = 1;
            echo json_encode($result);
            exit();
        } 

        if ($flag == 0) {
            $Custom = new Custom();
            $insertArray = array();
            $insertArray['proj_code'] = $_POST['proj_code'];
            $insertArray['bdgt_code'] = $_POST['bdgt_code'];
            $insertArray['bdgt_posi'] = $_POST['bdgt_posi'];
            $insertArray['bdgt_band'] = $_POST['bdgt_band']; 
            $insertArray['bdgt_amnt'] = $_POST['bdgt_amnt'];
            $insertArray['bdgt_pctg'] = $_POST['bdgt_pctg'];
            $insertArray['bdgt_month'] = $_POST['bdgt_month'];
            $insertArray['bdgt_year'] = $_POST['bdgt_year'];
            // $insertArray['createdBy'] = $_SESSION['login']['idUser'];
            // $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($insertArray, 'idBugt', 'b_budget', 'N');
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

}

?>