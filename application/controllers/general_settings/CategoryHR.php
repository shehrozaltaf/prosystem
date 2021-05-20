<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class CategoryHR extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mcategory');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View CategoryHR", "activityName" => "CategoryHR Main",
            "result" => "View CategoryHR Main page. URL: " . current_url() . " .  Function: CategoryHR/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        $model = new MCategory();
        $data['myData'] = $model->getAllCategorys();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('general_settings/category', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addCategoryData()
    {
        ob_end_clean();
        if (isset($_POST['CategoryName']) && $_POST['CategoryName'] != '') {
            $Custom = new Custom();
            $formArray = array();
            $formArray['CategoryHR'] = ucfirst($_POST['CategoryName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_category', 'Y');
            if ($InsertData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "CategoryHR Add -> Function: addCategoryData() CategoryHR insert ",
                "activityName" => "Add CategoryHR",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    public function getCategoryEdit()
    {
        $model = new MCategory();
        $result = $model->getEditCategory($this->input->post('id'));
        echo json_encode($result, true);
    }

    function editCategoryData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idCategory']) && $_POST['idCategory'] != '' && isset($_POST['CategoryName']) && $_POST['CategoryName'] != '') {
            $idCategory = $_POST['idCategory'];
            $editArr['CategoryHR'] = $_POST['CategoryName'];
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idCategory, 'hr_category');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "CategoryHR Edit -> Function: editCategoryData() CategoryHR Edit ",
                "activityName" => "Edit CategoryHR",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function deleteCategoryData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idCategory']) && $_POST['idCategory'] != '') {
            $idCategory = $_POST['idCategory'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idCategory, 'hr_category');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "CategoryHR Delete -> Function: deleteCategoryData() CategoryHR Delete ",
                "activityName" => "Delete CategoryHR",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}