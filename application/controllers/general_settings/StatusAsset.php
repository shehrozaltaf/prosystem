<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class StatusAsset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mstatusasset');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View StatusAsset", "activityName" => "StatusAsset Main",
            "result" => "View StatusAsset Main page. URL: " . current_url() . " .  Function: StatusAsset/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $model = new MStatusAsset();
        $data['myData'] = $model->getAllStatusAssets();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('general_settings/statusasset', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addStatusAssetData()
    {
        ob_end_clean();
        if (isset($_POST['StatusAssetName']) && $_POST['StatusAssetName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['StatusAsset'] = ucfirst($_POST['StatusAssetName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_StatusAsset', 'Y');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "StatusAsset Add -> Function: addStatusAssetData() StatusAsset insert ",
                "activityName" => "Add StatusAsset",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    public function getStatusAssetEdit()
    {
        $model = new MStatusAsset();
        $result = $model->getEditStatusAsset($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editStatusAssetData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idStatusAsset']) && $_POST['idStatusAsset'] != '' && isset($_POST['StatusAssetName']) && $_POST['StatusAssetName'] != '') {
            $idStatusAsset = $_POST['idStatusAsset'];
            $editArr['StatusAsset'] = $_POST['StatusAssetName'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idStatusAsset, 'hr_StatusAsset');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "StatusAsset Edit -> Function: editStatusAssetData() StatusAsset Edit ",
                "activityName" => "Edit StatusAsset",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function deleteStatusAssetData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idStatusAsset']) && $_POST['idStatusAsset'] != '') {
            $idStatusAsset = $_POST['idStatusAsset'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idStatusAsset, 'hr_StatusAsset');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "StatusAsset Delete -> Function: deleteStatusAssetData() StatusAsset Delete ",
                "activityName" => "Delete StatusAsset",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}