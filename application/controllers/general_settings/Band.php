<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class Band extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mband');
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
            $trackarray = array("action" => "View Band", "activityName" => "View Band Pg",
                "result" => "View Band page. URL: " . current_url() . " .  Function: Band/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $model = new MBand();
            $data['myData'] = $model->getAllBands();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/band', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addBandData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['BandName']) && $_POST['BandName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['band'] = ucfirst($_POST['BandName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['band']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'id', 'hr_band', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Band Add -> Function: addBandData() ",
                "activityName" => "Add Band",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field)
    {
        $model = new MBand();
        $result = $model->chkDuplicateByName($field);
        return count($result);
    }


    public function getBandEdit()
    {
        $model = new MBand();
        $result = $model->getEditBand($this->input->post('id'));
        echo json_encode($result, true);
    }


    function editBandData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idBand']) && $_POST['idBand'] != '' && isset($_POST['BandName']) && $_POST['BandName'] != '') {
            $editData = 0;
            $idBand = $_POST['idBand'];
            $editArr['band'] = ucfirst($_POST['BandName']);
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['band']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'id', $idBand, 'hr_band');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Band Edit -> Function: editBandData()",
                "activityName" => "Edit Band",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


    function deleteBandData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idBand']) && $_POST['idBand'] != '') {
            $idBand = $_POST['idBand'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idBand, 'hr_band');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Band Delete -> Function: deleteBandData() Band Delete ",
                "activityName" => "Delete Band",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}