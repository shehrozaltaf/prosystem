<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class Degree extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mdegree');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Degree", "activityName" => "Degree Main",
            "result" => "View Degree Main page. URL: " . current_url() . " .  Function: Degree/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $model = new MDegree();
        $data['myData'] = $model->getAllDegrees();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('general_settings/degree', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addDegreeData()
    {
        ob_end_clean();
        if (isset($_POST['DegreeName']) && $_POST['DegreeName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['degree'] = ucfirst($_POST['DegreeName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_degree', 'Y');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Degree Add -> Function: addDegreeData() Degree insert ",
                "activityName" => "Add Degree",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    public function getDegreeEdit()
    {
        $model = new MDegree();
        $result = $model->getEditDegree($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editDegreeData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idDegree']) && $_POST['idDegree'] != '' && isset($_POST['DegreeName']) && $_POST['DegreeName'] != '') {
            $idDegree = $_POST['idDegree'];
            $editArr['degree'] = $_POST['DegreeName'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idDegree, 'hr_degree');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Degree Edit -> Function: editDegreeData() Degree Edit ",
                "activityName" => "Edit Degree",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function deleteDegreeData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idDegree']) && $_POST['idDegree'] != '') {
            $idDegree = $_POST['idDegree'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idDegree, 'hr_degree');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Degree Delete -> Function: deleteDegreeData() Degree Delete ",
                "activityName" => "Delete Degree",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}