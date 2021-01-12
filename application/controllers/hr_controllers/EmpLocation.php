<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 28/10/2020
 * Time: 16:35
 */

defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();

class EmpLocation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('hr_model/Mhr_Location');
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

        $Mhr_Location = new Mhr_Location();
        $data['data'] = $Mhr_Location->getAllLocation();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/hr_settings/emp_location', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    function addLocation()
    {
        ob_end_clean();
        $flag = 0;


        if (isset($_POST['location']) && $_POST['location'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['location'] = ucwords($_POST['location']);
            $Custom = new Custom();
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_location', 'N');

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


    function editLocation()
    {
        ob_end_clean();
        $flag = 0;
        if (!isset($_POST['id']) || $_POST['id'] == '') {
            $flag = 1;
            $id = '';
        } else {
            $id = $_POST['id'];
        }

        if (isset($_POST['location']) && $_POST['location'] != '' && $flag == 0) {
            $formArray = array();
            $formArray['location'] = ucwords($_POST['location']);
            $Custom = new Custom();
            $EditData = $Custom->Edit($formArray, 'id', $id, 'hr_location');

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


    function getLocationAlreadyExists()
    {
        if (isset($_POST['location']) && $_POST['location'] != '') {
            $Mhr_Location = new Mhr_Location();

            $id = $_POST['id'];
            $loc = $_POST['location'];

            if ($id == "0") {
                $getEmp = $Mhr_Location->getLocationAlreadyExistsWithOutID($loc);
            } else {
                $getEmp = $Mhr_Location->getLocationAlreadyExists($id, $loc);
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




//     function addLocation_view(){
//         $data = array();
//         /*==========Log=============*/
//         $Custom = new Custom();
//         $trackarray = array("action" => "View Project",
//             "result" => "View Project page. Fucntion: EmpLocation/index()");
// //        $Custom->trackLogs($trackarray, "user_logs");
//         /*==========Log=============*/
//         $MSettings = new MSettings();
//         $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '',  uri_string());

//         $MHr_settings= new Mhr_settings();
//         $data['data'] = $MHr_settings->getAllLocation();

//         $this->load->view('include/header');
//         $this->load->view('include/top_header');
//         $this->load->view('include/sidebar');
//         $this->load->view('hr_views/hr_setttings/emp_location', $data);
//         $this->load->view('include/customizer');
//         $this->load->view('include/footer');
//     }


}