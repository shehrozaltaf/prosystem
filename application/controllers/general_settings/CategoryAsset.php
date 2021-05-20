<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class CategoryAsset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mcategoryasset');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View CategoryAsset", "activityName" => "CategoryAsset Main",
            "result" => "View CategoryAsset Main page. URL: " . current_url() . " .  Function: CategoryAsset/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $model = new MCategoryAsset();
        $data['myData'] = $model->getAllCategoryAssets();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('general_settings/categoryasset', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addCategoryAssetData()
    {
        ob_end_clean();
        if (isset($_POST['CategoryAssetName']) && $_POST['CategoryAssetName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['CategoryHR'] = ucfirst($_POST['CategoryAssetName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($formArray, 'idCategory', 'CategoryHR', 'Y');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "CategoryAsset Add -> Function: addCategoryAssetData() CategoryAsset insert ",
                "activityName" => "Add CategoryAsset",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    public function getCategoryAssetEdit()
    {
        $model = new MCategoryAsset();
        $result = $model->getEditCategoryAsset($this->input->post('idCategory'));
        echo json_encode($result, true);
    }

    function editCategoryAssetData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idCategoryAsset']) && $_POST['idCategoryAsset'] != '' && isset($_POST['CategoryAssetName']) && $_POST['CategoryAssetName'] != '') {
            $idCategoryAsset = $_POST['idCategoryAsset'];
            $editArr['CategoryHR'] = $_POST['CategoryAssetName'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idCategory', $idCategoryAsset, 'CategoryHR');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "CategoryAsset Edit -> Function: editCategoryAssetData() CategoryAsset Edit ",
                "activityName" => "Edit CategoryAsset",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function deleteCategoryAssetData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idCategoryAsset']) && $_POST['idCategoryAsset'] != '') {
            $idCategoryAsset = $_POST['idCategoryAsset'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idCategory', $idCategoryAsset, 'CategoryHR');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "CategoryAsset Delete -> Function: deleteCategoryAssetData() CategoryAsset Delete ",
                "activityName" => "Delete CategoryAsset",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}