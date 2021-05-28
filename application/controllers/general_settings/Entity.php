<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class Entity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mentity');
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
            $trackarray = array("action" => "View Entity", "activityName" => "View Entity Pg",
                "result" => "View Entity page. URL: " . current_url() . " .  Function: Entity/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $model = new MEntity();
            $data['myData'] = $model->getAllEntitys();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/entity', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addEntityData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['EntityName']) && $_POST['EntityName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['entity'] = ucfirst($_POST['EntityName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['entity']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'id', 'hr_entity', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Entity Add -> Function: addEntityData() ",
                "activityName" => "Add Entity",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field)
    {
        $model = new MEntity();
        $result = $model->chkDuplicateByName($field);
        return count($result);
    }


    public function getEntityEdit()
    {
        $model = new MEntity();
        $result = $model->getEditEntity($this->input->post('id'));
        echo json_encode($result, true);
    }


    function editEntityData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idEntity']) && $_POST['idEntity'] != '' && isset($_POST['EntityName']) && $_POST['EntityName'] != '') {
            $editData = 0;
            $idEntity = $_POST['idEntity'];
            $editArr['entity'] = ucfirst($_POST['EntityName']);
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['entity']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'id', $idEntity, 'hr_entity');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Entity Edit -> Function: editEntityData()",
                "activityName" => "Edit Entity",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


    function deleteEntityData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idEntity']) && $_POST['idEntity'] != '') {
            $idEntity = $_POST['idEntity'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idEntity, 'hr_entity');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Entity Delete -> Function: deleteEntityData() Entity Delete ",
                "activityName" => "Delete Entity",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}