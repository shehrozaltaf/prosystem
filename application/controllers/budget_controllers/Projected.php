<?php

class Projected extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('mprojected');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Projected",
            "result" => "View Projected page. Fucntion: Projected/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '',  uri_string());
        $Mprojected = new Mprojected();
        $data['data'] = $Mprojected->getAll();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('projected', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

}

?>