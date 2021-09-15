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
        $data['location_sub'] = $Custom->selectAllQuery('location_sub', 'location_sub');
        $data['entity'] = $Custom->selectAllQuery('hr_entity', 'entity');
        $data['status'] = $Custom->selectAllQuery('hr_status', 'id');
        $data['desig'] = $Custom->selectAllQuery('hr_desig', 'desig');
        $data['band'] = $Custom->selectAllQuery('hr_band', 'band');
        $data['designation'] = $Custom->selectAllQuery('hr_desig', 'desig');
        $data['category'] = $Custom->selectAllQuery('hr_category', 'id');


        /*$Mempmodel = new Mempmodel();
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
        $data['searchData'] = $searchData;*/
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/searchemployee', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function getEmps()
    {
        $MSettings = new MSettings();
        $permission = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'hr_controllers/Searchemployee');

        $M = new Mempmodel();
        $orderindex = (isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column'] : '');
        $orderby = (isset($_REQUEST['columns'][$orderindex]['name']) ? $_REQUEST['columns'][$orderindex]['name'] : '');
        $searchData = array();

        $searchData['projects'] = (isset($_REQUEST['projects']) && $_REQUEST['projects'] != '' && $_REQUEST['projects'] != '0' ? $_REQUEST['projects'] : 0);
        $searchData['location'] = (isset($_REQUEST['location']) && $_REQUEST['location'] != '' && $_REQUEST['location'] != '0' ? $_REQUEST['location'] : 0);
        $searchData['sublocation'] = (isset($_REQUEST['sublocation']) && $_REQUEST['sublocation'] != '' && $_REQUEST['sublocation'] != '0' ? $_REQUEST['sublocation'] : 0);
        $searchData['category'] = (isset($_REQUEST['category']) && $_REQUEST['category'] != '' && $_REQUEST['category'] != '0' ? $_REQUEST['category'] : 0);
        $searchData['entity'] = (isset($_REQUEST['entity']) && $_REQUEST['entity'] != '' && $_REQUEST['entity'] != '0' ? $_REQUEST['entity'] : 0);
        $searchData['band'] = (isset($_REQUEST['band']) && $_REQUEST['band'] != '' && $_REQUEST['band'] != '0' ? $_REQUEST['band'] : 0);
        $searchData['status'] = (isset($_REQUEST['status']) && $_REQUEST['status'] != '' && $_REQUEST['status'] != '0' ? $_REQUEST['status'] : 0);
        $searchData['designation'] = (isset($_REQUEST['designation']) && $_REQUEST['designation'] != '' && $_REQUEST['designation'] != '0' ? $_REQUEST['designation'] : 0);
        $searchData['empname'] = (isset($_REQUEST['empname']) && $_REQUEST['empname'] != '' ? $_REQUEST['empname'] : 0);
        $searchData['hiredatefrom'] = (isset($_REQUEST['hiredatefrom']) && $_REQUEST['hiredatefrom'] != '' ? $_REQUEST['hiredatefrom'] : 0);
        $searchData['hiredateto'] = (isset($_REQUEST['hiredateto']) && $_REQUEST['hiredateto'] != '' ? $_REQUEST['hiredateto'] : 0);
        $searchData['contractdatefrom'] = (isset($_REQUEST['contractdatefrom']) && $_REQUEST['contractdatefrom'] != '' ? $_REQUEST['contractdatefrom'] : 0);
        $searchData['contractdateto'] = (isset($_REQUEST['contractdateto']) && $_REQUEST['contractdateto'] != '' ? $_REQUEST['contractdateto'] : 0);

        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : '');
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'e.id');
        $searchData['ordersort'] = (isset($_REQUEST['order'][0]['dir']) && $_REQUEST['order'][0]['dir'] != '' ? $_REQUEST['order'][0]['dir'] : 'desc');

        $data = $M->getAllEmployee($searchData);
        $table_data = array();
        $result_table_data = array();
        foreach ($data as $key => $value) {

            if ($value->status == 1) {
                $statusClass = 'primary';
            } elseif ($value->status == 2) {
                $statusClass = 'danger';
            } elseif ($value->status == 3) {
                $statusClass = 'warning';
            } elseif ($value->status == 4) {
                $statusClass = 'success';
            } elseif ($value->status == 5) {
                $statusClass = 'info';
            } elseif ($value->status == 6) {
                $statusClass = 'mycolor1';
            } elseif ($value->status == 7) {
                $statusClass = 'mycolor2';
            } elseif ($value->status == 8) {
                $statusClass = 'mycolor3';
            } elseif ($value->status == 9) {
                $statusClass = 'warning';
            } else {
                $statusClass = '';
            }

            $table_data[$value->empno]['id'] = $value->id;
            $table_data[$value->empno]['empno'] = $value->empno;
            $table_data[$value->empno]['offemail'] = $value->offemail;
            $table_data[$value->empno]['empname'] = $value->empname;
            $table_data[$value->empno]['cnicno'] = $value->cnicno;
            $table_data[$value->empno]['cnicexdt'] = $value->cnicexdt;
            $table_data[$value->empno]['dob'] = (isset($value->dob) && $value->dob != '' ? date('d/m/y', strtotime($value->dob)) : '-');
            $table_data[$value->empno]['degree'] = $value->degree;
            $table_data[$value->empno]['degreeName'] = $value->degreeName;
            $table_data[$value->empno]['fieldID'] = $value->fieldID;
            $table_data[$value->empno]['field'] = $value->field;
            $table_data[$value->empno]['category'] = $value->category;
            $table_data[$value->empno]['landlineccode'] = $value->landlineccode;
            $table_data[$value->empno]['landline'] = $value->landline;
            $table_data[$value->empno]['cellno1ccode'] = $value->cellno1ccode;
            $table_data[$value->empno]['cellno1'] = $value->cellno1;
            $table_data[$value->empno]['cellno2ccode'] = $value->cellno2ccode;
            $table_data[$value->empno]['cellno2'] = $value->cellno2;
            $table_data[$value->empno]['personnme'] = $value->personnme;
            $table_data[$value->empno]['emcellnoccode'] = $value->emcellnoccode;
            $table_data[$value->empno]['emcellno'] = $value->emcellno;
            $table_data[$value->empno]['emlandnoccode'] = $value->emlandnoccode;
            $table_data[$value->empno]['emlandno'] = $value->emlandno;
            $table_data[$value->empno]['resaddr'] = $value->resaddr;
            $table_data[$value->empno]['peremail'] = $value->peremail;
            $table_data[$value->empno]['gncno'] = $value->gncno;
            $table_data[$value->empno]['ddlband'] = $value->ddlband;
            $table_data[$value->empno]['band'] = $value->band;
            $table_data[$value->empno]['titdesi'] = $value->titdesi;
            $table_data[$value->empno]['desig'] = $value->desig;
            $table_data[$value->empno]['rehiredt'] = $value->rehiredt;
            $table_data[$value->empno]['conexpiry'] = $value->conexpiry;
            $table_data[$value->empno]['workproj'] = $value->workproj;
            $table_data[$value->empno]['workingProj'] = $value->workingProj;
            $table_data[$value->empno]['chargproj'] = $value->chargproj;
            $table_data[$value->empno]['chargingProj'] = $value->chargingProj;
            $table_data[$value->empno]['ddlloc'] = $value->ddlloc;
            $table_data[$value->empno]['location'] = $value->location;
            $table_data[$value->empno]['ddlloc_sub'] = $value->ddlloc_sub;
            $table_data[$value->empno]['location_sub'] = $value->location_sub;
            $table_data[$value->empno]['supernme'] = $value->supernme;
            $table_data[$value->empno]['hiresalary'] = $value->hiresalary;
            $table_data[$value->empno]['ddlhardship'] = $value->ddlhardship;
            $table_data[$value->empno]['amount'] = $value->amount;
            $table_data[$value->empno]['benefits'] = $value->benefits;
            $table_data[$value->empno]['peme'] = $value->peme;
            $table_data[$value->empno]['gop'] = $value->gop;
            $table_data[$value->empno]['gopdt'] = $value->gopdt;
            $table_data[$value->empno]['entity'] = $value->entity;
            $table_data[$value->empno]['entityName'] = $value->entityName;
            $table_data[$value->empno]['dept'] = $value->dept;
            $table_data[$value->empno]['departmentName'] = $value->departmentName;
            $table_data[$value->empno]['cardissue'] = $value->cardissue;
            $table_data[$value->empno]['letterapp'] = $value->letterapp;
            $table_data[$value->empno]['confirmation'] = $value->confirmation;
            $table_data[$value->empno]['statusName'] = $value->statusName;
            $table_data[$value->empno]['remarks'] = $value->remarks;
            $table_data[$value->empno]['pic'] = $value->pic;
            $table_data[$value->empno]['emptype'] = $value->emptype;

            $table_data[$value->empno]['status'] = '<span class="label mystatus btn btn-sm btn-' . $statusClass . ' waves-effect waves-light" 
             onclick="changeStatus(this)" data-id="' . $value->id . '" data-status="' . $value->status . '"  data-status_name="' . $value->statusName . '">' . $value->statusName . '</span>';


            $searchdata_docs = array();
            $searchdata_docs['empno'] = $value->empno;
            $docs = $M->getAssetDocsByEmpno($searchdata_docs);
            $table_data[$value->empno]['document'] = (isset($docs[0]->docPath) && $docs[0]->docPath != '' ?
                '<a data-ur="' . base_url($docs[0]->docPath) . '" href="' . base_url() . 'index.php/OpenFile?a=' . $value->empno . '&doc=' . $docs[0]->docName . '"
                 target="_blank">' . $docs[0]->docName . '</a>' : '');

            if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) {
                $edit = '<a href="' . base_url('index.php/hr_controllers/employee_entry/getEmployeeEdit/' . $value->empno) . '"  target="_blank" title="Employee Edit" data-id="' . $value->empno . '">
                             <i class="feather icon-edit" ></i> 
                       </a> ';
            } else {
                $edit = '';
            }

            if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) {
                $delete = ' <a href="javascript:void(0)" onclick="getDelete(this)" data-id="' . $value->id . '" data-empno="' . $value->empno . '">
                                                                        <i class="feather icon-trash"></i>
                                                                    </a> ';
            } else {
                $delete = '';
            }
            $table_data[$value->empno]['Action'] = '
                <a href="' . base_url('index.php/hr_controllers/searchemployee/EmpDetail?emp=' . $value->empno) . '"  target="_blank" title="Employee Details" data-id="' . $value->empno . '">
                        <i class="feather icon-eye" ></i> 
                </a> 
                
                  ' . $edit . $delete;

            $table_data[$value->empno]['check'] = '<input type="checkbox" class="checkboxes" 
                data-id="' . $value->empno . '"  
                data-oldval="' . $value->empno . '" 
                name="check_asset" 
                id="check_asset_' . $key . '"  value="1" 
                onclick="updBtnToggle()" />
                <a href="' . base_url('index.php/hr_controllers/searchemployee/EmpDetail?emp=' . $value->empno) . '"  target="_blank" title="Asset Details" data-id="' . $value->empno . '">
                        <i class="feather icon-eye" ></i> 
                </a>' . $edit . $delete;

        }
        foreach ($table_data as $k => $v) {
            $result_table_data[] = $v;
        }

        $result["draw"] = (isset($_REQUEST['draw']) && $_REQUEST['draw'] != '' ? $_REQUEST['draw'] : 0);
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 10000000;

        $totalsearchData['projects'] = $searchData['projects'];
        $totalsearchData['location'] = $searchData['location'];
        $totalsearchData['sublocation'] = $searchData['sublocation'];
        $totalsearchData['category'] = $searchData['category'];
        $totalsearchData['entity'] = $searchData['entity'];
        $totalsearchData['band'] = $searchData['band'];
        $totalsearchData['status'] = $searchData['status'];
        $totalsearchData['designation'] = $searchData['designation'];
        $totalsearchData['empname'] = $searchData['empname'];
        $totalsearchData['hiredatefrom'] = $searchData['hiredatefrom'];
        $totalsearchData['contractdatefrom'] = $searchData['contractdatefrom'];
        $totalsearchData['contractdateto'] = $searchData['contractdateto'];
        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalrecords = $M->getCntTotalEmp($totalsearchData);
        $result["recordsTotal"] = $totalrecords[0]->cnttotal;
        $result["recordsFiltered"] = $totalrecords[0]->cnttotal;
        $result["data"] = $result_table_data;

        echo json_encode($result, true);
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
    }

    function changeStatus()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idEmp']) && $_POST['idEmp'] != '') {
            $idEmp = $_POST['idEmp'];
            $editArr['status'] = (isset($_POST['status']) && $_POST['status'] != '' ? $_POST['status'] : '1');
            $editData = $Custom->Edit($editArr, 'id', $idEmp, 'hr_employee');
            $trackarray = array("action" => "Change Employee Status -> Function: changeStatus() ",
                "result" => $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
            if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }
        } else {
            $result = 3;
        }
        echo $result;
    }
}