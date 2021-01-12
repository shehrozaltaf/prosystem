<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 28/10/2020
 * Time: 16:35
 */

defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();

class EmpDesig extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('hr_model/Mhr_Designation');
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

        $data['band'] = $Custom->selectAllQuery('hr_band', 'id');

        $Mhr_Designation = new Mhr_Designation();
        $data['data'] = $Mhr_Designation->getAllDesignation();


        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/hr_settings/emp_desig', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    function addDesignation()
    {
        ob_end_clean();
        $flag = 0;


        if (isset($_POST['desig']) && $_POST['desig'] != '' && $flag == 0 &&
            isset($_POST['ddlband']) && $_POST['ddlband'] != '' && $flag == 0
        ) {
            $formArray = array();
            $formArray['band'] = $_POST['ddlband'];
            $formArray['desig'] = ucwords($_POST['desig']);
            $Custom = new Custom();
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_desig', 'N');

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


    function editDesignation()
    {
        ob_end_clean();
        $flag = 0;
        if (!isset($_POST['id']) || $_POST['id'] == '') {
            $flag = 1;
            $id = '';
        } else {
            $id = $_POST['id'];
        }


        if (isset($_POST['desig']) && $_POST['desig'] != '' && $flag == 0 &&
            isset($_POST['ddlband']) && $_POST['ddlband'] != '' && $flag == 0
        ) {
            $formArray = array();
            $formArray['band'] = $_POST['ddlband'];
            $formArray['desig'] = ucwords($_POST['desig']);

            $Custom = new Custom();
            $EditData = $Custom->Edit($formArray, 'id', $id, 'hr_desig');

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


    function getDesignationAlreadyExists()
    {

        if (isset($_POST['desig']) && $_POST['desig'] != '') {
            $Mhr_Designation = new Mhr_Designation();

            $id = $_POST['id'];
            $desig = $_POST['desig'];


            if ($id == "0") {
                $getEmp = $Mhr_Designation->getDesignationAlreadyExistsWithOutID($desig);
            } else {
                $getEmp = $Mhr_Designation->getDesignationAlreadyExists($id, $desig);
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