<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

class Currency extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('general_setting_models/mcurrency');
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
            $trackarray = array("action" => "View Currency", "activityName" => "View Currency Pg",
                "result" => "View Currency page. URL: " . current_url() . " .  Function: Currency/index()",
                "PostData" => "");
            $Custom->trackLogs($trackarray, "user_logs");

            $model = new MCurrency();
            $data['myData'] = $model->getAllCurrency();
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('general_settings/currency', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
    }

    function addCurrencyData()
    {
        ob_end_clean();
        $Custom = new Custom();
        if (isset($_POST['CurrencyName']) && $_POST['CurrencyName'] != '') {
            $InsertData = 0;
            $formArray = array();
            $formArray['currency'] = ucfirst($_POST['CurrencyName']);
            $formArray['isActive'] = 1;
            $formArray['createdBy'] = $_SESSION['login']['idUser'];
            $formArray['createdDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($formArray['currency']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $InsertData = $Custom->Insert($formArray, 'idCurrency', 'currency', 'Y');
                if ($InsertData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Currency Add -> Function: addCurrencyData() ",
                "activityName" => "Add Currency",
                "result" => $result . "--- resultID: " . $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }

    function chkDuplicate($field)
    {
        $model = new MCurrency();
        $result = $model->chkDuplicateByName($field);
        return count($result);
    }


    public function getCurrencyEdit()
    {
        $model = new MCurrency();
        $result = $model->getEditCurrency($this->input->post('id'));
        echo json_encode($result, true);
    }


    function editCurrencyData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idCurrency']) && $_POST['idCurrency'] != '' && isset($_POST['CurrencyName']) && $_POST['CurrencyName'] != '') {
            $editData = 0;
            $idCurrency = $_POST['idCurrency'];
            $editArr['currency'] = ucfirst($_POST['CurrencyName']);
            $editArr['updatedBy'] = $_SESSION['login']['idUser'];
            $editArr['updatedDateTime'] = date('Y-m-d H:i:s');

            $chkDuplicate = $this->chkDuplicate($editArr['currency']);
            if ($chkDuplicate >= 1) {
                $result = 4; /*'already exist'*/
            } else {
                $editData = $Custom->Edit($editArr, 'idCurrency', $idCurrency, 'currency');
                if ($editData) {
                    $result = 1;
                } else {
                    $result = 2;
                }
            }
            $trackarray = array("action" => "Currency Edit -> Function: editCurrencyData()",
                "activityName" => "Edit Currency",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


    function deleteCurrencyData()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idCurrency']) && $_POST['idCurrency'] != '') {
            $idCurrency = $_POST['idCurrency'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idCurrency', $idCurrency, 'currency');
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
            $trackarray = array("action" => "Currency Delete -> Function: deleteCurrencyData() Currency Delete ",
                "activityName" => "Delete Currency",
                "result" => $result . "--- resultID: " . $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
        } else {
            $result = 3;
        }
        echo $result;
    }


}