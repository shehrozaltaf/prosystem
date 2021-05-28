<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class LocationSub extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mlocationsub');
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
            $trackarray = array("action" => "View LocationSub", "activityName" => "View LocationSub Pg",
                "result" => "View LocationSub page. URL: " . current_url() . " .  Function: LocationSub/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $data['location'] = $Custom->selectAllQuery('location', 'id', 'isActive', 'DESC');

            $model = new MLocationSub();
            $data['myData'] = $model->getAllLocationSubs();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/LocationSub', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addLocationSubData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['idLocation']) && $_POST['idLocation'] != '' && isset($_POST['LocationSubName']) && $_POST['LocationSubName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['idLocation'] = $_POST['idLocation'];
            $formArray['location_sub'] = ucfirst($_POST['LocationSubName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['location_sub'], $formArray['idLocation']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'id', 'location_sub', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "LocationSub Add -> Function: addLocationSubData() ",
                "activityName" => "Add LocationSub",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field, $loc)
    {
        $model = new MLocationSub();
        $result = $model->chkDuplicateByName($field, $loc);
        return count($result);
    }

    public function getLocationSubEdit()
    {
        $model = new MLocationSub();
        $result = $model->getEditLocationSub($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editLocationSubData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idLocation']) && $_POST['idLocation'] != '' && isset($_POST['idLocationSub']) && $_POST['idLocationSub'] != '' && isset($_POST['LocationSubName']) && $_POST['LocationSubName'] != '') {
            $editData = 0;
            $idLocationSub = $_POST['idLocationSub'];
            $editArr['idLocation'] = $_POST['idLocation'];
            $editArr['location_sub'] = $_POST['LocationSubName'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['location_sub'], $editArr['idLocation']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'id', $idLocationSub, 'location_sub');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }

            $trackarray = array("action" => "LocationSub Edit -> Function: editLocationSubData()",
                "activityName" => "Edit LocationSub",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function deleteLocationSubData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idLocationSub']) && $_POST['idLocationSub'] != '') {
            $idLocationSub = $_POST['idLocationSub'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idLocationSub, 'location_sub');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "LocationSub Delete -> Function: deleteLocationSubData()",
                "activityName" => "Delete LocationSub",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}