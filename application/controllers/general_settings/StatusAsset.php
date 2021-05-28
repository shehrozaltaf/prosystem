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
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        if (isset($data['permission'][0]->CanView) && $data['permission'][0]->CanView == 1) {
            /*==========Log=============*/
            $Custom = new Custom();
            $trackarray = array("action" => "View StatusAsset", "activityName" => "View StatusAsset Pg",
                "result" => "View StatusAsset page. URL: " . current_url() . " .  Function: StatusAsset/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $model = new MStatusAsset();
            $data['myData'] = $model->getAllStatusAssets();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/statusasset', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addStatusAssetData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['StatusAssetName']) && $_POST['StatusAssetName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['status_name'] = ucfirst($_POST['StatusAssetName']);
            $formArray['status_value'] = ucfirst($_POST['StatusAssetValue']);
            $formArray['status'] = 1;
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['status_value']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'id', 'a_status', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "StatusAsset Add -> Function: addStatusAssetData() ",
                "activityName" => "Add StatusAsset",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field)
    {
        $model = new MStatusAsset();
        $result = $model->chkDuplicateByName($field);
        return count($result);
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
            $editData = 0;
            $idStatusAsset = $_POST['idStatusAsset'];
            $editArr['status_name'] = ucfirst($_POST['StatusAssetName']);
            $editArr['status_value'] = ucfirst($_POST['StatusAssetValue']);
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['status_value']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'id', $idStatusAsset, 'a_status');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "StatusAsset Edit -> Function: editStatusAssetData()",
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
            $editArr['status'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idStatusAsset, 'a_status');
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