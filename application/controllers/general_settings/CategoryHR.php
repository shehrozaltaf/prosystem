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
        $this->load->model('general_setting_models/mcategoryhr');
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
            $trackarray = array("action" => "View CategoryHR", "activityName" => "View CategoryHR Pg",
                "result" => "View CategoryHR page. URL: " . current_url() . " .  Function: CategoryHR/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $model = new MCategoryHR();
            $data['myData'] = $model->getAllCategorys();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/categoryhr', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addCategoryHRData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['CategoryHRName']) && $_POST['CategoryHRName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['category'] = ucfirst($_POST['CategoryHRName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['category']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'id', 'hr_category', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "CategoryHR Add -> Function: addCategoryHRData() ",
                "activityName" => "Add CategoryHR",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field)
    {
        $model = new MCategoryHR();
        $result = $model->chkDuplicateByName($field);
        return count($result);
    }


    public function getCategoryHREdit()
    {
        $model = new MCategoryHR();
        $result = $model->getEditCategory($this->input->post('id'));
        echo json_encode($result, true);
    }


    function editCategoryHRData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idCategoryHR']) && $_POST['idCategoryHR'] != '' && isset($_POST['CategoryHRName']) && $_POST['CategoryHRName'] != '') {
            $editData = 0;
            $idCategoryHR = $_POST['idCategoryHR'];
            $editArr['category'] = ucfirst($_POST['CategoryHRName']);
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['category']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'id', $idCategoryHR, 'hr_category');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "CategoryHR Edit -> Function: editCategoryHRData()",
                "activityName" => "Edit CategoryHR",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


    function deleteCategoryHRData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idCategoryHR']) && $_POST['idCategoryHR'] != '') {
            $idCategoryHR = $_POST['idCategoryHR'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idCategoryHR, 'hr_category');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "CategoryHR Delete -> Function: deleteCategoryHRData() CategoryHR Delete ",
                "activityName" => "Delete CategoryHR",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}