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
        $this->load->model('hr_model/mhr_settings');
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

        $MHr_settings= new Mhr_settings();
        $data['data'] = $MHr_settings->getAllLocation();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/hr_settings/emp_location', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
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