<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class Field extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mfield');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Field", "activityName" => "Field Main",
            "result" => "View Field Main page. URL: " . current_url() . " .  Function: Field/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $model = new MField();
        $data['myData'] = $model->getAllFields();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('general_settings/field', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addFieldData()
    {
        ob_end_clean();
        if (isset($_POST['FieldName']) && $_POST['FieldName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['field'] = ucfirst($_POST['FieldName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_field', 'Y');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Field Add -> Function: addFieldData() Field insert ",
                "activityName" => "Add Field",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    public function getFieldEdit()
    {
        $model = new MField();
        $result = $model->getEditField($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editFieldData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idField']) && $_POST['idField'] != '' && isset($_POST['FieldName']) && $_POST['FieldName'] != '') {
            $idField = $_POST['idField'];
            $editArr['field'] = $_POST['FieldName'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idField, 'hr_field');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Field Edit -> Function: editFieldData() Field Edit ",
                "activityName" => "Edit Field",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function deleteFieldData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idField']) && $_POST['idField'] != '') {
            $idField = $_POST['idField'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idField, 'hr_field');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Field Delete -> Function: deleteFieldData() Field Delete ",
                "activityName" => "Delete Field",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}