<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class EmpType extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/memptype');
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
            $trackarray = array("action" => "View EmpType", "activityName" => "View EmpType Pg",
                "result" => "View EmpType page. URL: " . current_url() . " .  Function: EmpType/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $model = new MEmpType();
            $data['myData'] = $model->getAllEmpTypes();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/emptype', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addEmpTypeData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['EmpTypeName']) && $_POST['EmpTypeName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['emptype'] = ucfirst($_POST['EmpTypeName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['emptype']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'id', 'hr_emptype', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "EmpType Add -> Function: addEmpTypeData() ",
                "activityName" => "Add EmpType",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field)
    {
        $model = new MEmpType();
        $result = $model->chkDuplicateByName($field);
        return count($result);
    }


    public function getEmpTypeEdit()
    {
        $model = new MEmpType();
        $result = $model->getEditEmpType($this->input->post('id'));
        echo json_encode($result, true);
    }


    function editEmpTypeData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idEmpType']) && $_POST['idEmpType'] != '' && isset($_POST['EmpTypeName']) && $_POST['EmpTypeName'] != '') {
            $editData = 0;
            $idEmpType = $_POST['idEmpType'];
            $editArr['emptype'] = ucfirst($_POST['EmpTypeName']);
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['emptype']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'id', $idEmpType, 'hr_emptype');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "EmpType Edit -> Function: editEmpTypeData()",
                "activityName" => "Edit EmpType",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


    function deleteEmpTypeData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idEmpType']) && $_POST['idEmpType'] != '') {
            $idEmpType = $_POST['idEmpType'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idEmpType, 'hr_emptype');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "EmpType Delete -> Function: deleteEmpTypeData() EmpType Delete ",
                "activityName" => "Delete EmpType",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}