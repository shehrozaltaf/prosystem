<?php

class Assets extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->load->model('msettings');
        $this->load->model('asset_models/masset');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    function index()
    {
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Asset Dashboard",
            "result" => "View Asset Dashboard page. Fucntion: Assets/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());

        $data['project'] = $Custom->selectAllQuery('project', 'idProject');
        $data['employee'] = $Custom->selectAllQuery('hr_employee', 'id');
        $data['category'] = $Custom->selectAllQuery('category', 'idCategory', 'isActive');
        $data['location'] = $Custom->selectAllQuery('location', 'id');
        $data['location_sub'] = $Custom->selectAllQuery('location_sub', 'id');
        $data['status'] = $Custom->selectAllQuery('a_status', 'id', 'status');
        $data['sop'] = $Custom->selectAllQuery('a_sourceOfPurchase', 'idSop', 'status');
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('asset_views/asset_dashboard', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function getAsset()
    {
        $M = new MAsset();
        $orderindex = (isset($_REQUEST['order'][0]['column']) ? $_REQUEST['order'][0]['column'] : '');
        $orderby = (isset($_REQUEST['columns'][$orderindex]['name']) ? $_REQUEST['columns'][$orderindex]['name'] : '');
        $searchData = array();


        $searchData['project'] = (isset($_REQUEST['project']) && $_REQUEST['project'] != '' && $_REQUEST['project'] != '0' ? $_REQUEST['project'] : 0);
        $searchData['emp'] = (isset($_REQUEST['emp']) && $_REQUEST['emp'] != '' && $_REQUEST['emp'] != '0' ? $_REQUEST['emp'] : 0);
        $searchData['category'] = (isset($_REQUEST['category']) && $_REQUEST['category'] != '' && $_REQUEST['category'] != '0' ? $_REQUEST['category'] : 0);
        $searchData['sop'] = (isset($_REQUEST['sop']) && $_REQUEST['sop'] != '' && $_REQUEST['sop'] != '0' ? $_REQUEST['sop'] : 0);
        $searchData['idLocation'] = (isset($_REQUEST['location']) && $_REQUEST['location'] != '' && $_REQUEST['location'] != '0' ? $_REQUEST['location'] : 0);
        $searchData['idSubLocation'] = (isset($_REQUEST['sublocation']) && $_REQUEST['sublocation'] != '' && $_REQUEST['sublocation'] != '0' ? $_REQUEST['sublocation'] : 0);
        $searchData['status'] = (isset($_REQUEST['status']) && $_REQUEST['status'] != '' && $_REQUEST['status'] != '0' ? $_REQUEST['status'] : 0);
        $searchData['tag_pr'] = (isset($_REQUEST['tag_pr']) && $_REQUEST['tag_pr'] != '' && $_REQUEST['tag_pr'] != '0' ? $_REQUEST['tag_pr'] : 0);
        $searchData['idAsset'] = (isset($_REQUEST['idAsset']) && $_REQUEST['idAsset'] != '' && $_REQUEST['idAsset'] != '0' ? $_REQUEST['idAsset'] : 0);
        $searchData['writeOffNo'] = (isset($_REQUEST['writeOffNo']) && $_REQUEST['writeOffNo'] != '' && $_REQUEST['writeOffNo'] != '0' ? $_REQUEST['writeOffNo'] : 0);
        $searchData['dateTo'] = (isset($_REQUEST['dateTo']) && $_REQUEST['dateTo'] != '' ? $_REQUEST['dateTo'] : 0);
        $searchData['dateFrom'] = (isset($_REQUEST['dateFrom']) && $_REQUEST['dateFrom'] != '' ? $_REQUEST['dateFrom'] : 0);

        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : 25);
        $searchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $searchData['orderby'] = (isset($orderby) && $orderby != '' ? $orderby : 'a.idAsset');
        $searchData['ordersort'] = (isset($_REQUEST['order'][0]['dir']) && $_REQUEST['order'][0]['dir'] != '' ? $_REQUEST['order'][0]['dir'] : 'desc');

        $data = $M->getAsset($searchData);
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

            $table_data[$value->idAsset]['paeds_id'] = $value->idAsset;
            $table_data[$value->idAsset]['model'] = $value->model;
            $table_data[$value->idAsset]['product_no'] = $value->product_no;
            $table_data[$value->idAsset]['serial_no'] = $value->serial_no;
            $table_data[$value->idAsset]['po_no'] = $value->po_no;
            $table_data[$value->idAsset]['cost'] = $value->cost;
            $table_data[$value->idAsset]['idCurrency'] = $value->idCurrency;
            $table_data[$value->idAsset]['idSourceOfPurchase'] = $value->idSourceOfPurchase;
            $table_data[$value->idAsset]['resp_person_name'] = $value->resp_person_name;
            $table_data[$value->idAsset]['ou'] = $value->ou;
            $table_data[$value->idAsset]['account'] = $value->account;
            $table_data[$value->idAsset]['dept'] = $value->dept;
            $table_data[$value->idAsset]['fund'] = $value->fund;
            $table_data[$value->idAsset]['prog'] = $value->prog;
            $table_data[$value->idAsset]['area'] = $value->area;
            $table_data[$value->idAsset]['verification_status'] = $value->verification_status;
            $table_data[$value->idAsset]['last_verify_date'] = $value->last_verify_date;
            $table_data[$value->idAsset]['due_date'] = $value->due_date;
            $table_data[$value->idAsset]['pur_date'] = $value->pur_date;
            $table_data[$value->idAsset]['writOff_formNo'] = $value->writOff_formNo;
            $table_data[$value->idAsset]['wo_date'] = $value->wo_date;
            $table_data[$value->idAsset]['remarks'] = $value->remarks;

            $table_data[$value->idAsset]['category'] = $value->category;
            $table_data[$value->idAsset]['desc'] = $value->description;
            $table_data[$value->idAsset]['tag'] = $value->tag_no;
            $table_data[$value->idAsset]['emp'] = $value->emp_no . ' - ' . $value->empname;
            $table_data[$value->idAsset]['proj'] = $value->proj_code . ' - ' . $value->proj_name;
            $table_data[$value->idAsset]['loc'] = $value->location;
            $table_data[$value->idAsset]['sub_loc'] = $value->location_sub;
            $table_data[$value->idAsset]['status'] = '<span class="label mystatus btn btn-sm btn-' . $statusClass . ' waves-effect waves-light" 
             onclick="changeStatus(this)" data-id="' . $value->idAsset . '" data-status="' . $value->status . '"  data-status_name="' . $value->status_name . '">' . $value->status_name . '</span>';
            $table_data[$value->idAsset]['pr_path'] = $value->pr_path;

            $table_data[$value->idAsset]['Action'] = '
                <a href="' . base_url('index.php/asset_controllers/Assets/assetDetail?a=' . $value->idAsset) . '"  target="_blank" title="Asset Details" data-id="' . $value->idAsset . '">
                        <i class="feather icon-eye" ></i> 
                </a> 
                <a href="javascript:void(0)" onclick="getDelete(this)" data-id="' . $value->idAsset . '">
                        <i class="feather icon-trash"></i>
                </a>';

            $table_data[$value->idAsset]['check'] = '<input type="checkbox" class="checkboxes" 
                data-id="' . $value->idAsset . '"  
                data-oldval="' . $value->idAsset . '" 
                name="check_asset" id="check_asset_' . $key . '"
                value="1" 
                onclick="updBtnToggle()" />';

        }
        foreach ($table_data as $k => $v) {
            $result_table_data[] = $v;
        }

        $result["draw"] = (isset($_REQUEST['draw']) && $_REQUEST['draw'] != '' ? $_REQUEST['draw'] : 0);
        $totalsearchData = array();
        $totalsearchData['start'] = 0;
        $totalsearchData['length'] = 10000000;

        $totalsearchData['project'] = $searchData['project'];
        $totalsearchData['emp'] = $searchData['emp'];
        $totalsearchData['category'] = $searchData['category'];
        $totalsearchData['sop'] = $searchData['sop'];
        $totalsearchData['idLocation'] = $searchData['idLocation'];
        $totalsearchData['idSubLocation'] = $searchData['idSubLocation'];
        $totalsearchData['status'] = $searchData['status'];
        $totalsearchData['tag_pr'] = $searchData['tag_pr'];
        $totalsearchData['idAsset'] = $searchData['idAsset'];
        $totalsearchData['writeOffNo'] = $searchData['writeOffNo'];
        $totalsearchData['dateTo'] = $searchData['dateTo'];
        $totalsearchData['dateFrom'] = $searchData['dateFrom'];
        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalrecords = $M->getCntTotalAsset($totalsearchData);
        $result["recordsTotal"] = $totalrecords[0]->cnttotal;
        $result["recordsFiltered"] = $totalrecords[0]->cnttotal;
        $result["data"] = $result_table_data;

        echo json_encode($result, true);
    }

    function changeStatus()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idAsset']) && $_POST['idAsset'] != '' && isset($_POST['status']) && $_POST['status'] != '') {
            $id = $_POST['idAsset'];
            $editArr['status'] = $_POST['status'];
            $editArr['statusChangedBy'] = $_SESSION['login']['idUser'];
            $editArr['statusDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idAsset', $id, 'a_asset');
            $trackarray = array("action" => "Status asset -> Function: changeStatus() ",
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

    function deleteAsset()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idAsset']) && $_POST['idAsset'] != '') {
            $id = $_POST['idAsset'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idAsset', $id, 'a_asset');
            $trackarray = array("action" => "Delete asset -> Function: deleteAsset() ",
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

    function assetDetail()
    {
        if (isset($_GET['a']) && $_GET['a'] != '') {
            $data = array();
            /*==========Log=============*/
            $Custom = new Custom();
            $trackarray = array("action" => "View Asset Detail",
                "result" => "View Asset Detail page. Fucntion: Assets/assetDetail()");
//        $Custom->trackLogs($trackarray, "user_logs");
            /*==========Log=============*/
            $MSettings = new MSettings();
            $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'asset_controllers/Assets/assetDetail', 0);

            $searchData = array();
            $searchData['idAsset'] = $_GET['a'];

            $M = new MAsset();
            $data['asset_data'] = $M->getAssetById($searchData);
            $data['asset_data_docs'] = $M->getAssetDocsByIdAsset($searchData);
            /*$audit = array();
            $asset_audit = $M->getAuditTrialById($searchData);
            foreach ($asset_audit as $k => $a) {
                $audit[$a->FormName][] = $a;
            }
            $data['asset_audit'] = $audit;
            $data['all_asset_audit'] = $asset_audit;*/
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('asset_views/asset_detail', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-invalid-id');
        }
    }

    function bulkupdate()
    {
        $editArr = array();
        if (isset($_POST['status']) && $_POST['status'] != '') {
            $editArr['status'] = $_POST['status'];
        }
        if (isset($_POST['writOff_formNo']) && $_POST['writOff_formNo'] != '') {
            $editArr['writOff_formNo'] = $_POST['writOff_formNo'];
        }
        if (isset($_POST['wo_date']) && $_POST['wo_date'] != '') {
            $editArr['wo_date'] = $_POST['wo_date'];
        }
        if (isset($_POST['idLocation']) && $_POST['idLocation'] != '') {
            $editArr['idLocation'] = $_POST['idLocation'];
        }
        if (isset($_POST['idSubLocation']) && $_POST['idSubLocation'] != '') {
            $editArr['idSubLocation'] = $_POST['idSubLocation'];
        }
        $Custom = new Custom();
        if (isset($_POST['assets']) && $_POST['assets'] != '' && count($_POST['assets']) >= 1) {
            foreach ($_POST['assets'] as $asset) {
                $editData = $Custom->Edit($editArr, 'idAsset', $asset, 'a_asset');
            }

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

?>