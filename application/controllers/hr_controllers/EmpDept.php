<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 28/10/2020
 * Time: 16:35
 */

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();


class EmpDept extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('hr_model/Mhr_Dept');
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


        $Mhr_Dept = new Mhr_Dept();
        $data['data'] = $Mhr_Dept->getAllDept();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/hr_settings/emp_dept', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    function addDept()
    {
        ob_end_clean();
        $flag = 0;


        if (isset($_POST['dept']) && $_POST['dept'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['dept'] = strtoupper($_POST['dept']);
            $Custom = new Custom();
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_dept', 'N');

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


    function editDept()
    {
        ob_end_clean();
        $flag = 0;
        if (!isset($_POST['id']) || $_POST['id'] == '') {
            $flag = 1;
            $id = '';
        } else {
            $id = $_POST['id'];
        }

        if (isset($_POST['dept']) && $_POST['dept'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['dept'] = strtoupper($_POST['dept']);
            $Custom = new Custom();
            $EditData = $Custom->Edit($formArray, 'id', $id, 'hr_dept');

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


    function getDeptAlreadyExists()
    {

        if (isset($_POST['dept']) && $_POST['dept'] != '') {
            $Mhr_Dept = new Mhr_Dept();

            $id = $_POST['id'];
            $dept = $_POST['dept'];

            if ($id == "0") {
                $getEmp = $Mhr_Dept->getDeptAlreadyExistsWithoutID($dept);
            } else {
                $getEmp = $Mhr_Dept->getDeptAlreadyExists($id, $dept);
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