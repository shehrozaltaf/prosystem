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
        $this->load->model('general_setting_models/mEntity');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Entity", "activityName" => "Entity Main",
            "result" => "View Entity Main page. URL: " . current_url() . " .  Function: Entity/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $model = new MEntity();
        $data['myData'] = $model->getAllEntitys();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('general_settings/entity', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addEntityData()
    {
        ob_end_clean();
        if (isset($_POST['EntityName']) && $_POST['EntityName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['entity'] = ucfirst($_POST['EntityName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_entity', 'Y');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Entity Add -> Function: addEntityData() Entity insert ",
                "activityName" => "Add Entity",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
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
            $idEntity = $_POST['idEntity'];
            $editArr['entity'] = $_POST['EntityName'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idEntity, 'hr_entity');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Entity Edit -> Function: editEntityData() Entity Edit ",
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