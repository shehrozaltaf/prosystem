<?php

class Project extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('budget_model/mproject');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Project",
            "result" => "View Project page. Fucntion: Project/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '',  uri_string());

        $Mproject = new Mproject();
        $data['data'] = $Mproject->getAll();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/project', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addProject_view(){
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Project",
            "result" => "View Project page. Fucntion: Project/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '',  uri_string());

        $Mproject = new Mproject();
        $data['data'] = $Mproject->getAll();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/project_add', $data);
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
        if (!isset($_POST['proj_name']) || $_POST['proj_name'] == '' || $_POST['proj_name'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Project Name');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['proj_priv']) || $_POST['proj_priv'] == '' || $_POST['proj_priv'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Project Privalence');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['proj_sn']) || $_POST['proj_sn'] == '' || $_POST['proj_sn'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Prohect Short Name');
            $flag = 1;
            echo json_encode($result);
            exit();
        } 

        if ($flag == 0) {
            $Custom = new Custom();
            $insertArray = array();
            $insertArray['proj_code'] = $_POST['proj_code'];
            $insertArray['proj_name'] = $_POST['proj_name'];
            $insertArray['proj_priv'] = $_POST['proj_priv'];
            $insertArray['proj_sn'] = $_POST['proj_sn']; 
            // $insertArray['createdBy'] = $_SESSION['login']['idUser'];
            // $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($insertArray, 'idProject', 'project', 'N');
            if ($InsertData) {
                $result = array('0' => 'Success', '1' => 'Successfully Inserted');
            } else {
                $result = array('0' => 'Error', '1' => 'Error in Inserting Data');
            }
            echo json_encode($result);
        }

    }

}

?>