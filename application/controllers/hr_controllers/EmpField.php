<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class EmpField extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('hr_model/Mhr_Field');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }


    function index()
    {
        $data = array();
        $MSettings = new MSettings();

        $Custom = new Custom();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        /*==========Log=============*/
        $trackarray = array("action" => "View Dashboard Users Page",
            "result" => "View Dashboard Users page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");

        $Mhr_Field = new Mhr_Field();
        $data['data'] = $Mhr_Field->getAllField();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/hr_settings/emp_field', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    function getFieldAlreadyExists()
    {
        if (isset($_POST['field']) && $_POST['field'] != '') {
            $Mhr_Field = new Mhr_Field();

            $id = $_POST['id'];
            $field = $_POST['field'];

            if ($id == "0") {
                $getEmp = $Mhr_Field->getFieldAlreadyExistsWithOutID($field);
            } else {
                $getEmp = $Mhr_Field->getFieldAlreadyExists($id, $field);
            }


            $results = array();

            if (isset($getEmp) && $getEmp != null) {
                $results = array(['error' => 1]);
            }

        } else {
            $results = array(['error' => 2]);
        }

        echo json_encode($results);
    }


    function addField()
    {
        ob_end_clean();
        $flag = 0;


        if (isset($_POST['field']) && $_POST['field'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['field'] = ucwords($_POST['field']);
            $Custom = new Custom();
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_field', 'N');

            if ($InsertData) {
                $InsertData = 1;
            } else {
                $InsertData = 2;
            }

        } else {
            $InsertData = 3;
        }

        echo $InsertData;
    }


    function editField()
    {
        ob_end_clean();
        $flag = 0;
        if (!isset($_POST['id']) || $_POST['id'] == '') {
            $flag = 1;
            $id = '';
        } else {
            $id = $_POST['id'];
        }

        if (isset($_POST['field']) && $_POST['field'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['field'] = ucwords($_POST['field']);
            $Custom = new Custom();
            $EditData = $Custom->Edit($formArray, 'id', $id, 'hr_field');

            if ($EditData) {
                $EditData = 1;
            } else {
                $EditData = 2;
            }

        } else {
            $EditData = 3;
        }

        echo $EditData;
    }


}