<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 28/10/2020
 * Time: 16:35
 */

defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();

class EmpEntity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('hr_model/Mhr_Entity');
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

        $Mhr_Entity = new Mhr_Entity();
        $data['data'] = $Mhr_Entity->getAllEntity();


        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/hr_settings/emp_entity', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    function addEntity()
    {
        ob_end_clean();
        $flag = 0;


        if (isset($_POST['entity']) && $_POST['entity'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['entity'] = strtoupper($_POST['entity']);
            $Custom = new Custom();
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_entity', 'N');

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


    function editEntity()
    {
        ob_end_clean();
        $flag = 0;
        if (!isset($_POST['id']) || $_POST['id'] == '') {
            $flag = 1;
            $id = '';
        } else {
            $id = $_POST['id'];
        }

        if (isset($_POST['entity']) && $_POST['entity'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['entity'] = strtoupper($_POST['entity']);
            $Custom = new Custom();
            $EditData = $Custom->Edit($formArray, 'id', $id, 'hr_entity');

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


    function getEntityAlreadyExists()
    {

        if (isset($_POST['entity']) && $_POST['entity'] != '') {
            $Mhr_Entity = new Mhr_Entity();

            $id = $_POST['id'];
            $entity = $_POST['entity'];

            if ($id == "0") {
                $getEmp = $Mhr_Entity->getEntityAlreadyExistsWithoutID($entity);
            } else {
                $getEmp = $Mhr_Entity->getEntityAlreadyExists($id, $entity);
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