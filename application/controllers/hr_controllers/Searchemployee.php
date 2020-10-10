<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();

/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 10/07/2020
 * Time: 11:22
 */
class Searchemployee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('hr_model/Mempmodel');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        $MSettings = new MSettings();
        $Mempmodel = new Mempmodel();
        $Custom = new Custom();
        $data['datatbl'] = $Mempmodel->getAllEmployee();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        /*==========Log=============*/
        $trackarray = array("action" => "View Dashboard Users Page",
            "result" => "View Dashboard Users page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");


        $data['project'] = $Custom->selectAllQuery('project', 'idProject');
        $data['location'] = $Custom->selectAllQuery('hr_location', 'id');

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/searchemployee', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

}