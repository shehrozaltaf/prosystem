<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class StatusHR extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mstatushr');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        if (isset($data['permission'][0]->CanView) && $data['permission'][0]->CanView == 1) {
            /*==========Log=============*/
            $Custom = new Custom();
            $trackarray = array("action" => "View StatusHR", "activityName" => "View StatusHR Pg",
                "result" => "View StatusHR page. URL: " . current_url() . " .  Function: StatusHR/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $model = new MStatusHR();
            $data['myData'] = $model->getAllStatusHR();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/statushr', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addStatusHRData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['StatusHRName']) && $_POST['StatusHRName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['status'] = ucfirst($_POST['StatusHRName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['status']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'id', 'hr_status', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "StatusHR Add -> Function: addStatusHRData() ",
                "activityName" => "Add StatusHR",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field)
    {
        $model = new MStatusHR();
        $result = $model->chkDuplicateByName($field);
        return count($result);
    }


    public function getStatusHREdit()
    {
        $model = new MStatusHR();
        $result = $model->getEditStatusHR($this->input->post('id'));
        echo json_encode($result, true);
    }


    function editStatusHRData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idStatusHR']) && $_POST['idStatusHR'] != '' && isset($_POST['StatusHRName']) && $_POST['StatusHRName'] != '') {
            $editData = 0;
            $idStatusHR = $_POST['idStatusHR'];
            $editArr['status'] = ucfirst($_POST['StatusHRName']);
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['status']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'id', $idStatusHR, 'hr_status');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "StatusHR Edit -> Function: editStatusHRData()",
                "activityName" => "Edit StatusHR",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


    function deleteStatusHRData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idStatusHR']) && $_POST['idStatusHR'] != '') {
            $idStatusHR = $_POST['idStatusHR'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idStatusHR, 'hr_status');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "StatusHR Delete -> Function: deleteStatusHRData() StatusHR Delete ",
                "activityName" => "Delete StatusHR",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}