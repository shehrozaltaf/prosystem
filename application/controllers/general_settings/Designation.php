<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class Designation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mdesignation');
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
            $trackarray = array("action" => "View Designation", "activityName" => "View Designation Pg",
                "result" => "View Designation page. URL: " . current_url() . " .  Function: Designation/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");


            $model = new MDesignation();
            $data['myData'] = $model->getAllDesignations();
            $data['Band'] = $Custom->selectAllQuery('hr_band', 'id', 'isActive', 'DESC');
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/Designation', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addDesignationData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['DesignationName']) && $_POST['DesignationName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['desig'] = ucfirst($_POST['DesignationName']);
            $formArray['band'] = $_POST['Band'];
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['desig'], $formArray['band']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'id', 'hr_desig', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Designation Add -> Function: addDesignationData() ",
                "activityName" => "Add Designation",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field, $band)
    {
        $model = new MDesignation();
        $result = $model->chkDuplicateByName($field, $band);
        return count($result);
    }


    public function getDesignationEdit()
    {
        $model = new MDesignation();
        $result = $model->getEditDesignation($this->input->post('id'));
        echo json_encode($result, true);
    }


    function editDesignationData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idDesignation']) && $_POST['idDesignation'] != '' && isset($_POST['DesignationName']) && $_POST['DesignationName'] != '') {
            $editData = 0;
            $idDesignation = $_POST['idDesignation'];
            $editArr['desig'] = ucfirst($_POST['DesignationName']);
            $editArr['band'] = $_POST['Band'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['desig'], $editArr['band']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'id', $idDesignation, 'hr_desig');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Designation Edit -> Function: editDesignationData()",
                "activityName" => "Edit Designation",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


    function deleteDesignationData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idDesignation']) && $_POST['idDesignation'] != '') {
            $idDesignation = $_POST['idDesignation'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idDesignation, 'hr_desig');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Designation Delete -> Function: deleteDesignationData() Designation Delete ",
                "activityName" => "Delete Designation",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}