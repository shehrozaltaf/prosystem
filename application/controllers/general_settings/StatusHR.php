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
        $this->load->model('general_setting_models/mStatus');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Status", "activityName" => "Status Main",
            "result" => "View Status Main page. URL: " . current_url() . " .  Function: Status/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $model = new MStatus();
        $data['myData'] = $model->getAllStatuss();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('general_settings/status', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addStatusData()
    {
        ob_end_clean();
        if (isset($_POST['StatusName']) && $_POST['StatusName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['status'] = ucfirst($_POST['StatusName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_status', 'Y');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Status Add -> Function: addStatusData() Status insert ",
                "activityName" => "Add Status",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    public function getStatusEdit()
    {
        $model = new MStatus();
        $result = $model->getEditStatus($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editStatusData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idStatus']) && $_POST['idStatus'] != '' && isset($_POST['StatusName']) && $_POST['StatusName'] != '') {
            $idStatus = $_POST['idStatus'];
            $editArr['status'] = $_POST['StatusName'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idStatus, 'hr_status');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Status Edit -> Function: editStatusData() Status Edit ",
                "activityName" => "Edit Status",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function deleteStatusData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idStatus']) && $_POST['idStatus'] != '') {
            $idStatus = $_POST['idStatus'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idStatus, 'hr_status');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Status Delete -> Function: deleteStatusData() Status Delete ",
                "activityName" => "Delete Status",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}