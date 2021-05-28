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
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        if (isset($data['permission'][0]->CanView) && $data['permission'][0]->CanView == 1) {
            /*==========Log=============*/
            $Custom = new Custom();
            $trackarray = array("action" => "View Field", "activityName" => "View Field Pg",
                "result" => "View Field page. URL: " . current_url() . " .  Function: Field/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $model = new MField();
            $data['myData'] = $model->getAllFields();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/field', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addFieldData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['FieldName']) && $_POST['FieldName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['field'] = ucfirst($_POST['FieldName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['field']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'id', 'hr_field', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Field Add -> Function: addFieldData() ",
                "activityName" => "Add Field",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field)
    {
        $model = new MField();
        $result = $model->chkDuplicateByName($field);
        return count($result);
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
            $editData = 0;
            $idField = $_POST['idField'];
            $editArr['field'] = ucfirst($_POST['FieldName']);
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['field']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'id', $idField, 'hr_field');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Field Edit -> Function: editFieldData()",
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