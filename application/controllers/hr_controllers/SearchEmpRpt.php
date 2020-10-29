<?php
/**
 * Created by PhpStorm.
 * User: javed.khan
 * Date: 23/10/2020
 * Time: 11:58
 */

defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();

class SearchEmpRpt extends CI_Controller
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
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        /*==========Log=============*/
        $trackarray = array("action" => "View Dashboard Users Page",
            "result" => "View Dashboard Users page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");


        $data['project'] = $Custom->selectAllQuery('project', 'proj_name');
        $data['location'] = $Custom->selectAllQuery('hr_location', 'location');
        $data['entity'] = $Custom->selectAllQuery('hr_entity', 'entity');
        $data['status'] = $Custom->selectAllQuery('hr_status', 'id');
        $data['desig'] = $Custom->selectAllQuery('hr_desig', 'desig');
        $data['band'] = $Custom->selectAllQuery('hr_band', 'band');
        $data['category'] = $Custom->selectAllQuery('hr_category', 'category');
        /*$Mempmodel = new Mempmodel();
        $data['employees'] = $Mempmodel->getAllEmployeeForReport();*/

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/search_emp_rpt', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    function getEmployee()
    {
        $M = new Mempmodel();

        $orderindex = (isset($_REQUEST['order'][4]['column']) ? $_REQUEST['order'][4]['column'] : '');
        $orderby = (isset($_REQUEST['columns'][$orderindex]['name']) ? $_REQUEST['columns'][$orderindex]['name'] : '');
        $searchData = array();

        $searchData['projects'] = (isset($_REQUEST['projects']) && $_REQUEST['projects'] != '' && $_REQUEST['projects'] != '0' ? $_REQUEST['projects'] : 0);
        $searchData['location'] = (isset($_REQUEST['location']) && $_REQUEST['location'] != '' && $_REQUEST['location'] != '0' ? $_REQUEST['location'] : 0);
        $searchData['category'] = (isset($_REQUEST['category']) && $_REQUEST['category'] != '' && $_REQUEST['category'] != '0' ? $_REQUEST['category'] : 0);
        $searchData['entity'] = (isset($_REQUEST['entity']) && $_REQUEST['entity'] != '' && $_REQUEST['entity'] != '0' ? $_REQUEST['entity'] : 0);
        $searchData['band'] = (isset($_REQUEST['band']) && $_REQUEST['band'] != '' && $_REQUEST['band'] != '0' ? $_REQUEST['band'] : 0);
        $searchData['status'] = (isset($_REQUEST['status']) && $_REQUEST['status'] != '' && $_REQUEST['status'] != '0' ? $_REQUEST['status'] : 0);
        $searchData['empname'] = (isset($_REQUEST['empname']) && $_REQUEST['empname'] != '' ? $_REQUEST['empname'] : 0);
        $searchData['empno'] = (isset($_REQUEST['empno']) && $_REQUEST['empno'] != '' ? $_REQUEST['empno'] : 0);
        $searchData['hiredatefrom'] = (isset($_REQUEST['hiredatefrom']) && $_REQUEST['hiredatefrom'] != '' ? $_REQUEST['hiredatefrom'] : 0);
        $searchData['hiredateto'] = (isset($_REQUEST['hiredateto']) && $_REQUEST['hiredateto'] != '' ? $_REQUEST['hiredateto'] : 0);
        $searchData['salaryfrom'] = (isset($_REQUEST['salaryfrom']) && $_REQUEST['salaryfrom'] != '' ? $_REQUEST['salaryfrom'] : 0);
        $searchData['salaryto'] = (isset($_REQUEST['salaryto']) && $_REQUEST['salaryto'] != '' ? $_REQUEST['salaryto'] : 0);


        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : 25);
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'b.id');
        $searchData['ordersort'] = (isset($_REQUEST['order'][4]['dir']) && $_REQUEST['order'][4]['dir'] != '' ? $_REQUEST['order'][4]['dir'] : 'desc');


        $data = $M->getEmployee($searchData);

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();*/


        $table_data = array();
        $result_table_data = array();

        /*foreach ($data as $key => $value) {

            $table_data[$value->id]['EmployeeType'] = $value->EmployeeType;
            $table_data[$value->id]['EmployeeCategory'] = $value->EmployeeCategory;
            $table_data[$value->id]['EmployeeNo'] = $value->EmployeeNo;
            $table_data[$value->id]['EmployeeName'] = ucwords($value->EmployeeName);
            $table_data[$value->id]['Designation'] = ucwords($value->Designation);
            $table_data[$value->id]['SupervisorName'] = ucwords($value->SupervisorName);
            $table_data[$value->id]['WorkingProject'] = ucwords($value->WorkingProject);
            $table_data[$value->id]['ChargingProject'] = ucwords($value->ChargingProject);
            $table_data[$value->id]['Location'] = ucwords($value->Location);
            $table_data[$value->id]['ContractExpiry'] = date('d-M-Y', strtotime($value->ContractExpiry));
            $table_data[$value->id]['Status'] = ucwords($value->Status);


            $table_data[$value->id]['Action'] = '
                <a href="javascript:void(0)" onclick="showExpiry()" >
                        <i class="feather icon-edit action-edit" ></i> 
                </a>
                <a href="javascript:void(0)" onclick="getDelete(this)">
                        <i class="feather icon-trash"></i>
                </a>';

            $table_data[$value->id]['Settings'] = '
                <a href="javascript:void(0)" onclick="getExpiry(this)" data-id="' . $value->id . '" data-expiry="">
                       Set Expiry
                </a> | 
                <a href="javascript:void(0)" onclick="getCustodianData(this)" data-id="' . $value->id . '">
                       Assign Custodian
                </a> | 
                <a href="' . base_url('index.php/inventory_controllers/Inventory/auditTrial?i=' . $value->id) . '">
                       Audit Trial
                </a>';
        }*/

        /*foreach ($data as $k => $v) {
            $result_table_data[] = $v;
        }*/

        $result["draw"] = (isset($_REQUEST['draw']) && $_REQUEST['draw'] != '' ? $_REQUEST['draw'] : 0);
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 10000000;
        $totalsearchData['projects'] = $searchData['projects'];
        $totalsearchData['location'] = $searchData['location'];
        $totalsearchData['category'] = $searchData['category'];
        $totalsearchData['entity'] = $searchData['entity'];
        $totalsearchData['band'] = $searchData['band'];
        $totalsearchData['status'] = $searchData['status'];
        $totalsearchData['empname'] = $searchData['empname'];
        $totalsearchData['empno'] = $searchData['empno'];
        $totalsearchData['hiredatefrom'] = $searchData['hiredatefrom'];
        $totalsearchData['hiredateto'] = $searchData['hiredateto'];
        $totalsearchData['salaryfrom'] = $searchData['salaryfrom'];
        $totalsearchData['salaryto'] = $searchData['salaryto'];

        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalrecords = $M->getCntTotalEmployee($totalsearchData);

        $result["recordsTotal"] = $totalrecords[0]->cnttotal;
        $result["recordsFiltered"] = $totalrecords[0]->cnttotal;
        $result["data"] = $data;
        /*echo "<pre>";
        print_r($result);
        echo "</pre>";
        die();*/
        echo json_encode($result, true);
    }

}