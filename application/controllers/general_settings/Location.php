<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class Location extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mlocation');
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
            $trackarray = array("action" => "View Location", "activityName" => "View Location Pg",
                "result" => "View Location page. URL: " . current_url() . " .  Function: Location/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $model = new MLocation();
            $data['myData'] = $model->getAllLocations();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/location', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addLocationData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['LocationName']) && $_POST['LocationName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['location'] = ucfirst($_POST['LocationName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['location']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'id', 'location', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Location Add -> Function: addLocationData() ",
                "activityName" => "Add Location",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field)
    {
        $model = new MLocation();
        $result = $model->chkDuplicateByName($field);
        return count($result);
    }

    public function getLocationEdit()
    {
        $model = new MLocation();
        $result = $model->getEditLocation($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editLocationData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idLocation']) && $_POST['idLocation'] != '' && isset($_POST['LocationName']) && $_POST['LocationName'] != '') {
            $editData = 0;
            $idLocation = $_POST['idLocation'];
            $editArr['location'] = ucfirst($_POST['LocationName']);
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['location']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'id', $idLocation, 'location');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }

            $trackarray = array("action" => "Location Edit -> Function: editLocationData()",
                "activityName" => "Edit Location",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function deleteLocationData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idLocation']) && $_POST['idLocation'] != '') {
            $idLocation = $_POST['idLocation'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idLocation, 'location');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Location Delete -> Function: deleteLocationData()",
                "activityName" => "Delete Location",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}