<?php

class Projected extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('budget_model/mprojected');
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
        $this->load->view('budget_views/projected', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function addProjected_view(){
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Project",
            "result" => "View Project page. Fucntion: Projected/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '',  uri_string());

        $Mproject = new Mproject();
        $data['data'] = $Mproject->getAll();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('budget_views/projected_add', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

}

?>