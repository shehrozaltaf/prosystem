<?php

defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();

class Users extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('muser');
        $this->load->model('msettings');
        $this->load->library('session');
        $this->load->helper('string');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $MUser = new MUser();
        $data = array();

        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Dashboard Users Page",
            "result" => "View Dashboard Users page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $data['user'] = $MUser->getAllUser();
        $data['districts'] = '';
        $data['groups'] = $MSettings->getAllGroups();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('auth/dashboard_users', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    public function getEdit()
    {
        $MUser = new MUser();
        $result = $MUser->getEditUser($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editData()
    {
        $Custom = new Custom();
        $flag = 0;
        if (!isset($_POST['idUser']) || $_POST['idUser'] == '') {
            $result = 4;
            $flag = 1;
            echo $result;
            die();
        }

        if (!isset($_POST['userName']) || $_POST['userName'] == '') {
            $result = 5;
            $flag = 1;
            echo $result;
            die();
        }

        if (!isset($_POST['userEmail']) || $_POST['userEmail'] == '') {
            $result = 6;
            $flag = 1;
            echo $result;
            die();
        }

        if (!isset($_POST['userPassword']) || $_POST['userPassword'] == '') {
            $result = 7;
            $flag = 1;
            echo $result;
            die();
        }

        if ($flag == 0) {
            $idUser = $_POST['idUser'];

            $formArray = array();
            $formArray['full_name'] = ucfirst($_POST['fullName']);
            $formArray['username'] = $_POST['userName'];
            $formArray['email'] = $_POST['userEmail'];
            $formArray['password'] = $_POST['userPassword'];
            $formArray['passwordenc'] = hash('sha256', $_POST['userPassword']);
            $formArray['designation'] = $_POST['designation'];
            $formArray['contact'] = $_POST['contactNo'];
            $formArray['idGroup'] = $_POST['userGroup'];
            $formArray['updateBy'] = $_SESSION['login']['idUser'];
            $formArray['updatedDateTime'] = date('Y-m-d H:m:s');

            $editData = $Custom->Edit($formArray, 'id', $idUser, 'users_dash');
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

    function deleteData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idUser']) && $_POST['idUser'] != '') {
            $idUser = $_POST['idUser'];
            $editArr['status'] = 0;
            $editData = $Custom->Edit($editArr, 'id', $idUser, 'users_dash');
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

    function addData()
    {
        ob_end_clean();
        if (isset($_POST['userName']) && $_POST['userName'] != ''
            && isset($_POST['userEmail']) && $_POST['userEmail'] != ''
            && isset($_POST['userPassword']) && $_POST['userPassword'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['full_name'] = ucfirst($_POST['fullName']);
            $formArray['username'] = $_POST['userName'];
            $formArray['email'] = $_POST['userEmail'];
            $formArray['password'] = $_POST['userPassword'];
            $formArray['passwordenc'] = hash('sha256', $_POST['userPassword']);
            $formArray['designation'] = $_POST['designation'];
            $formArray['contact'] = $_POST['contactNo'];
            $formArray['idGroup'] = $_POST['userGroup'];
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:m:s');
            $formArray['status'] = 1;
            $InsertData = $Custom->Insert($formArray, 'id', 'users_dash', 'N');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            $result = 3;
        }
        echo $result;
    }

    function changePassword()
    {
        $Custom = new Custom();
        $editArr = array();
        $flag = 0;
        if (!isset($_POST['newpassword']) || $_POST['newpassword'] == '') {
           echo $result = 2;
            $flag = 1;
            exit();
        }

        if (!isset($_POST['newpasswordconfirm']) || $_POST['newpasswordconfirm'] == '' || $_POST['newpassword'] != $_POST['newpasswordconfirm']) {
          echo  $result = 3;
            $flag = 1;
            exit();
        }
        if ($flag == 0 && isset($_SESSION['login']['idUser']) && $_SESSION['login']['idUser'] != '') {
            $idUser = $_SESSION['login']['idUser'];
            $editArr['password'] = $_POST['newpassword'];
            $editArr['passwordenc'] = hash('sha256', $_POST['newpassword']);
            $editData = $Custom->Edit($editArr, 'idUser', $idUser, 'users');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            $result = 4;
        }
        echo $result;
    }
} ?>