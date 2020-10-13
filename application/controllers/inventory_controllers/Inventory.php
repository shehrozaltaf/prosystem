<?php

class Inventory extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('inventory_models/minventory');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View LineListing Dashboard",
            "result" => "View LineListing Dashboard page. Fucntion: dashboard/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());

        $data['project'] = $Custom->selectAllQuery('project', 'idProject');
        $data['location'] = $Custom->selectAllQuery('hr_location', 'id');
        $M = new MInventory();
        $data['employees'] = $M->getEmployees();

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('inventory_views/inventory_dashboard', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    function getInventory()
    {
        $M = new MInventory();
        $orderindex = (isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column'] : '');
        $orderby = (isset($_REQUEST['columns'][$orderindex]['name']) ? $_REQUEST['columns'][$orderindex]['name'] : '');
        $searchData = array();

        $searchData['username'] = (isset($_REQUEST['username']) && $_REQUEST['username'] != '' ? $_REQUEST['username'] : 0);
        $searchData['ftag'] = (isset($_REQUEST['ftag']) && $_REQUEST['ftag'] != '' ? $_REQUEST['ftag'] : 0);
        $searchData['aaftag'] = (isset($_REQUEST['aaftag']) && $_REQUEST['aaftag'] != '' ? $_REQUEST['aaftag'] : 0);
        $searchData['location'] = (isset($_REQUEST['location']) && $_REQUEST['location'] != '' && $_REQUEST['location'] != '0' ? $_REQUEST['location'] : 0);
        $searchData['project'] = (isset($_REQUEST['project']) && $_REQUEST['project'] != '' && $_REQUEST['project'] != '0' ? $_REQUEST['project'] : 0);
        $searchData['status'] = (isset($_REQUEST['status']) && $_REQUEST['status'] != '' && $_REQUEST['status'] != '0' ? $_REQUEST['status'] : 0);

        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : 25);
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'id');
        $searchData['ordersort'] = (isset($_REQUEST['order'][0]['dir']) && $_REQUEST['order'][0]['dir'] != '' ? $_REQUEST['order'][0]['dir'] : 'desc');
        $data = $M->getInventory($searchData);
        $table_data = array();
        $result_table_data = array();
        foreach ($data as $key => $value) {
            $table_data[$value->id]['inventory_type'] = $value->inventory_type;
            $table_data[$value->id]['model'] = $value->model;
            $table_data[$value->id]['product'] = $value->product;
            $table_data[$value->id]['serial'] = $value->serial;
            $table_data[$value->id]['dop'] = date('d-M-Y', strtotime($value->dop));

            $table_data[$value->id]['aaftag'] = $value->aaftag;
            $table_data[$value->id]['aaproduct'] = $value->aaproduct;
            $table_data[$value->id]['aaserial'] = $value->aaserial;
            $table_data[$value->id]['username'] = $value->username;
            $table_data[$value->id]['loc'] = $value->loc;
            $table_data[$value->id]['remarks'] = $value->remarks;
            $table_data[$value->id]['status'] = $value->status;
            $table_data[$value->id]['expiryDateTime'] = (isset($value->expiryDateTime) && $value->expiryDateTime != '' && $value->expiryDateTime != '01-Jan-1970' ?
                date('d-M-Y', strtotime($value->expiryDateTime)) : '');

            $table_data[$value->id]['ftag'] = $value->ftag;
            $table_data[$value->id]['aadop'] = $value->aadop;
            $table_data[$value->id]['newEntry'] = $value->newEntry;
            $table_data[$value->id]['Action'] = '
                <a href="javascript:void(0)" onclick="getEdit(this)">
                        <i class="feather icon-edit"></i> 
                </a>
                <a href="javascript:void(0)" onclick="getDelete(this)">
                        <i class="feather icon-trash"></i>
                </a>';

            $table_data[$value->id]['Settings'] = '
                <a href="javascript:void(0)" onclick="getExpiry(this)" data-id="' . $value->id . '" data-expiry="' . $table_data[$value->id]['expiryDateTime'] . '">
                       Set Expiry
                </a> | 
                <a href="javascript:void(0)" onclick="getCustodianData(this)" data-id="' . $value->id . '">
                       Assign Custodian
                </a>';
            /*$table_data[$value->crf_name]['action'] = '<div class="btn-group mr-1 mb-1">
							<button class="btn btn-danger dropdown-toggle btn-sm" type="button"
							id="dropdownMenuButton' . $value->id_crf . '" data-toggle="dropdown" >
								Actions
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
								<a class="dropdown-item" href="' . base_url('index.php/edit_crf/' . $value->id_crf) . '">Edit CRF</a>
								<a class="dropdown-item" href="javascript:void(0)" onclick="getDelete(this)" data-id="' . $value->id_crf . '">Delete CRF</a>
								<a class="dropdown-item" href="' . base_url('index.php/module/' . $value->id_crf) . '">View Modules</a>
								<a class="dropdown-item" href="' . base_url('index.php/add_module?crf=' . $value->id_crf) . '">Add Module</a>
							</div>
						</div> '; */

            /* $subChild = array();
             $subChild['ftag'] = $value->ftag;
             $subChild['aadop'] = $value->aadop;
             $subChild['newEntry'] = $value->newEntry;
             $subChild['remarks'] = $value->remarks;
             $subChild['status'] = $value->status;
             $table_data[$value->id]['subChild'][] = $subChild;*/

        }
        foreach ($table_data as $k => $v) {
            $result_table_data[] = $v;
        }

        $result["draw"] = (isset($_REQUEST['draw']) && $_REQUEST['draw'] != '' ? $_REQUEST['draw'] : 0);
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 10000000;
        $totalsearchData['username'] = $searchData['username'];
        $totalsearchData['ftag'] = $searchData['ftag'];
        $totalsearchData['aaftag'] = $searchData['aaftag'];
        $totalsearchData['location'] = $searchData['location'];
        $totalsearchData['project'] = $searchData['project'];
        $totalsearchData['status'] = $searchData['status'];
        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalrecords = $M->getCntTotalInventory($totalsearchData);

        $result["recordsTotal"] = $totalrecords[0]->cnttotal;
        $result["recordsFiltered"] = $totalrecords[0]->cnttotal;
        $result["data"] = $result_table_data;

        echo json_encode($result, true);
    }

    function setExpiry()
    {
        if (isset($_POST['expiry_id']) && $_POST['expiry_id'] != '' && $_POST['expiry_id'] != '0'
            && isset($_POST['expiryDateTime']) && $_POST['expiryDateTime'] != '' && $_POST['expiryDateTime'] != '0') {
            $id = $_POST['expiry_id'];
            $Custom = new Custom();
            $editArr = array();
            $editArr['expiryDateTime'] = date('Y-m-d', strtotime($_POST['expiryDateTime']));;
            $editData = $Custom->Edit($editArr, 'id', $id, 'i_paedsinventory');
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

    public function getCustodianData()
    {
        $M = new MInventory();
        $id = $_POST['id'];
        $result = $M->getCustodian($id);
        echo json_encode($result, true);
    }

    function saveCustodianData()
    {
        $flag = 0;
        if (!isset($_POST['assignCustodian_id']) || $_POST['assignCustodian_id'] == '' || $_POST['assignCustodian_id'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Inventory Id');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['custodian_location']) || $_POST['custodian_location'] == '' || $_POST['custodian_location'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Location');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['custodian_project']) || $_POST['custodian_project'] == '' || $_POST['custodian_project'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Project');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['custodian_emp']) || $_POST['custodian_emp'] == '' || $_POST['custodian_emp'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Owner/Employee');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if ($flag == 0) {
            $id = $_POST['assignCustodian_id'];
            $Custom = new Custom();
            $editArr = array();
            $editArr['loc'] = $_POST['custodian_location'];
            $editArr['proj_code'] = $_POST['custodian_project'];
            $editArr['username'] = $_POST['custodian_emp'];
            $editData = $Custom->Edit($editArr, 'id', $id, 'i_paedsinventory');
            if ($editData) {
                $result = array('0' => 'Success', '1' => 'Successfully Inserted');
            } else {
                $result = array('0' => 'Error', '1' => 'Error in Inserting Data');
            }
            echo json_encode($result);
        }

    }


}

?>