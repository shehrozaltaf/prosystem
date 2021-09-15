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

        $Custom = new Custom();

        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        /*==========Log=============*/
        $trackarray = array("action" => "View Dashboard Users Page",
            "result" => "View Dashboard Users page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");

        $data['project'] = $Custom->selectAllQuery('project', 'proj_name');
        $data['location'] = $Custom->selectAllQuery('location', 'location');
        $data['entity'] = $Custom->selectAllQuery('hr_entity', 'entity');
        $data['status'] = $Custom->selectAllQuery('hr_status', 'id');
        $data['desig'] = $Custom->selectAllQuery('hr_desig', 'desig');
        $data['band'] = $Custom->selectAllQuery('hr_band', 'band');
        $data['category'] = $Custom->selectAllQuery('hr_category', 'id');


        $Mempmodel = new Mempmodel();
        $searchData = array();
        $searchData['projects'] = (isset($_REQUEST['pro']) && $_REQUEST['pro'] != '' && $_REQUEST['pro'] != '0' ? $_REQUEST['pro'] : 0);
        $searchData['location'] = (isset($_REQUEST['loc']) && $_REQUEST['loc'] != '' && $_REQUEST['loc'] != '0' ? $_REQUEST['loc'] : 0);
        $searchData['category'] = (isset($_REQUEST['cat']) && $_REQUEST['cat'] != '' && $_REQUEST['cat'] != '0' ? $_REQUEST['cat'] : 0);
        $searchData['entity'] = (isset($_REQUEST['ent']) && $_REQUEST['ent'] != '' && $_REQUEST['ent'] != '0' ? $_REQUEST['ent'] : 0);
        $searchData['band'] = (isset($_REQUEST['band']) && $_REQUEST['band'] != '' && $_REQUEST['band'] != '0' ? $_REQUEST['band'] : 0);
        $searchData['status'] = (isset($_REQUEST['status']) && $_REQUEST['status'] != '' && $_REQUEST['status'] != '0' ? $_REQUEST['status'] : 0);
        $searchData['empname'] = (isset($_REQUEST['ename']) && $_REQUEST['ename'] != '' ? $_REQUEST['ename'] : 0);
        $searchData['empno'] = (isset($_REQUEST['eno']) && $_REQUEST['eno'] != '' ? $_REQUEST['eno'] : 0);
        $searchData['hiredatefrom'] = (isset($_REQUEST['hfrom']) && $_REQUEST['hfrom'] != '' ? $_REQUEST['hfrom'] : 0);
        $searchData['hiredateto'] = (isset($_REQUEST['hto']) && $_REQUEST['hto'] != '' ? $_REQUEST['hto'] : 0);

        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : 500000);
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'id');
        $searchData['ordersort'] = (isset($_REQUEST['order'][4]['dir']) && $_REQUEST['order'][4]['dir'] != '' ? $_REQUEST['order'][4]['dir'] : 'desc');

        $data['datatbl'] = $Mempmodel->getAllEmployee($searchData);
        $data['searchData'] = $searchData;
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/searchemployee', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function EmpDetail()
    {
        $data = array();
        $MSettings = new MSettings();
        $Custom = new Custom();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'hr_controllers/searchemployee');
        if (isset($data['permission'][0]->CanView) && $data['permission'][0]->CanView == 1) {
            /*==========Log=============*/
            $trackarray = array("action" => "View Dashboard Users Page",
                "result" => "View Dashboard Users page. Function: index()");
            $Custom->trackLogs($trackarray, "user_logs");
            if (isset($_GET['emp']) && $_GET['emp'] != '') {
                $data['emp'] = $_GET['emp'];
            } else {
                $data['emp'] = '';
            }
            $Mempmodel = new Mempmodel();
            $data['empDetails'] = $Mempmodel->getEmployeeDataByEmpNo($data['emp']);
            $data['assetEmp'] = $Mempmodel->getAssetByEmpNo($data['emp']);
            $searchdata = array();
            $searchdata['empno'] = $data['emp'];
            $data['emp_docs'] = $Mempmodel->getEmpDocsByEmpNo($searchdata);
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('hr_views/empdetail', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-not-authorized', $data);
        }
        /* echo '<pre>';
         print_r($data['permission']);
         echo '<pre>';
         exit();*/

    }

}