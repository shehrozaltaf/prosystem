<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class SourceOfPurchase extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/msourceofpurchase');
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
            $trackarray = array("action" => "View SourceOfPurchase", "activityName" => "View SourceOfPurchase Pg",
                "result" => "View SourceOfPurchase page. URL: " . current_url() . " .  Function: SourceOfPurchase/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $model = new MSourceOfPurchase();
            $data['myData'] = $model->getAllSourceOfPurchases();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/sourceofpurchase', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addSourceOfPurchaseData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['SourceOfPurchaseValue']) && $_POST['SourceOfPurchaseValue'] != '' && isset($_POST['SourceOfPurchaseName']) && $_POST['SourceOfPurchaseName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['sopName'] = ucfirst($_POST['SourceOfPurchaseName']);
            $formArray['sopValue'] = $_POST['SourceOfPurchaseValue'];
            $formArray['status'] = 1;
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['sopValue']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'idSop', 'a_sourceOfPurchase', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "SourceOfPurchase Add -> Function: addSourceOfPurchaseData() ",
                "activityName" => "Add SourceOfPurchase",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field)
    {
        $model = new MSourceOfPurchase();
        $result = $model->chkDuplicateByName($field);
        return count($result);
    }


    public function getSourceOfPurchaseEdit()
    {
        $model = new MSourceOfPurchase();
        $result = $model->getEditSourceOfPurchase($this->input->post('id'));
        echo json_encode($result, true);
    }


    function editSourceOfPurchaseData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['SourceOfPurchaseValue']) && $_POST['SourceOfPurchaseValue'] != '' && isset($_POST['idSourceOfPurchase']) && $_POST['idSourceOfPurchase'] != '' && isset($_POST['SourceOfPurchaseName']) && $_POST['SourceOfPurchaseName'] != '') {
            $editData = 0;
            $idSourceOfPurchase = $_POST['idSourceOfPurchase'];
            $editArr['sopName'] = ucfirst($_POST['SourceOfPurchaseName']);
            $editArr['sopValue'] = $_POST['SourceOfPurchaseValue'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['sopValue']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'idSop', $idSourceOfPurchase, 'a_sourceOfPurchase');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "SourceOfPurchase Edit -> Function: editSourceOfPurchaseData()",
                "activityName" => "Edit SourceOfPurchase",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


    function deleteSourceOfPurchaseData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idSourceOfPurchase']) && $_POST['idSourceOfPurchase'] != '') {
            $idSourceOfPurchase = $_POST['idSourceOfPurchase'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idSop', $idSourceOfPurchase, 'a_sourceOfPurchase');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "SourceOfPurchase Delete -> Function: deleteSourceOfPurchaseData() SourceOfPurchase Delete ",
                "activityName" => "Delete SourceOfPurchase",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}