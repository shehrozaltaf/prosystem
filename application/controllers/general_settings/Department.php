<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class Department extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mdepartment');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Department", "activityName" => "Department Main",
            "result" => "View Department Main page. URL: " . current_url() . " .  Function: Department/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $model = new MDepartment();
        $data['myData'] = $model->getAllDepartments();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('general_settings/department', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addDepartmentData()
    {
        ob_end_clean();
        if (isset($_POST['DepartmentName']) && $_POST['DepartmentName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['dept'] = ucfirst($_POST['DepartmentName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_dept', 'Y');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Department Add -> Function: addDepartmentData() Department insert ",
                "activityName" => "Add Department",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    public function getDepartmentEdit()
    {
        $model = new MDepartment();
        $result = $model->getEditDepartment($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editDepartmentData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idDepartment']) && $_POST['idDepartment'] != '' && isset($_POST['DepartmentName']) && $_POST['DepartmentName'] != '') {
            $idDepartment = $_POST['idDepartment'];
            $editArr['dept'] = $_POST['DepartmentName'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idDepartment, 'hr_dept');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Department Edit -> Function: editDepartmentData() Department Edit ",
                "activityName" => "Edit Department",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function deleteDepartmentData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idDepartment']) && $_POST['idDepartment'] != '') {
            $idDepartment = $_POST['idDepartment'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idDepartment, 'hr_dept');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Department Delete -> Function: deleteDepartmentData() Department Delete ",
                "activityName" => "Delete Department",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}