<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 29/10/2020
 * Time: 10:51
 */

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();


class EmpBand extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('hr_model/Mhr_Band');
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


        $Mhr_Band = new Mhr_Band();
        $data['data'] = $Mhr_Band->getAllBand();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/hr_settings/emp_band', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    function addBand()
    {
        ob_end_clean();
        $flag = 0;


        if (isset($_POST['band']) && $_POST['band'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['band'] = strtoupper($_POST['band']);
            $Custom = new Custom();
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_band', 'N');

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


    function editBand()
    {
        ob_end_clean();
        $flag = 0;
        if (!isset($_POST['id']) || $_POST['id'] == '') {
            $flag = 1;
            $id = '';
        } else {
            $id = $_POST['id'];
        }

        if (isset($_POST['band']) && $_POST['band'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['band'] = strtoupper($_POST['band']);
            $Custom = new Custom();
            $EditData = $Custom->Edit($formArray, 'id', $id, 'hr_band');

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


    function getBandAlreadyExists()
    {

        if (isset($_POST['band']) && $_POST['band'] != '') {
            $Mhr_Band = new Mhr_Band();

            $id = $_POST['id'];
            $loc = $_POST['band'];

            if ($id == "0") {
                $getEmp = $Mhr_Band->getBandAlreadyExistsWithoutID($loc);
            } else {
                $getEmp = $Mhr_Band->getBandAlreadyExists($id, $loc);
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


}