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
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View EmpType", "activityName" => "EmpType Main",
            "result" => "View EmpType Main page. URL: " . current_url() . " .  Function: EmpType/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $model = new MEmpType();
        $data['myData'] = $model->getAllEmpTypes();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('general_settings/emptype', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addEmpTypeData()
    {
        ob_end_clean();
        if (isset($_POST['EmpTypeName']) && $_POST['EmpTypeName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['emptype'] = ucfirst($_POST['EmpTypeName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_emptype', 'Y');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "EmpType Add -> Function: addEmpTypeData() EmpType insert ",
                "activityName" => "Add EmpType",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
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
            $idEmpType = $_POST['idEmpType'];
            $editArr['emptype'] = $_POST['EmpTypeName'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idEmpType, 'hr_emptype');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "EmpType Edit -> Function: editEmpTypeData() EmpType Edit ",
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