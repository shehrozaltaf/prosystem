<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 28/10/2020
 * Time: 16:35
 */

defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();

class EmpType extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('hr_model/Mhr_EmpType');
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


        $Mhr_EmpType = new Mhr_EmpType();
        $data['data'] = $Mhr_EmpType->getAllEmpType();


        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/hr_settings/emp_type', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    function getEmpTypeAlreadyExists()
    {
        if (isset($_POST['emptype']) && $_POST['emptype'] != '') {
            $Mhr_EmpType = new Mhr_EmpType();

            $id = $_POST['id'];
            $emptype = $_POST['emptype'];

            if ($id == "0") {
                $getEmp = $Mhr_EmpType->getEmpTypeAlreadyExistsWithoutID($emptype);
            } else {
                $getEmp = $Mhr_EmpType->getEmpTypeAlreadyExists($id, $emptype);
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


    function addEmpType()
    {
        ob_end_clean();
        $flag = 0;


        if (isset($_POST['emptype']) && $_POST['emptype'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['emptype'] = ucwords($_POST['emptype']);
            $Custom = new Custom();
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_emptype', 'N');

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


    function editEmpType()
    {
        ob_end_clean();
        $flag = 0;
        if (!isset($_POST['id']) || $_POST['id'] == '') {
            $flag = 1;
            $id = '';
        } else {
            $id = $_POST['id'];
        }

        if (isset($_POST['emptype']) && $_POST['emptype'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['emptype'] = ucwords($_POST['emptype']);
            $Custom = new Custom();
            $EditData = $Custom->Edit($formArray, 'id', $id, 'hr_emptype');

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