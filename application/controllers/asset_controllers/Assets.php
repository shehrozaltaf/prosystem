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
        $searchData['ftag'] = (isset($_REQUEST['ftag']) && $_REQUEST['ftag'] != '' && $_REQUEST['ftag'] != '0' ? $_REQUEST['ftag'] : 0);
        $searchData['prno'] = (isset($_REQUEST['prno']) && $_REQUEST['prno'] != '' && $_REQUEST['prno'] != '0' ? $_REQUEST['prno'] : 0);
        $searchData['paedsid'] = (isset($_REQUEST['paedsid']) && $_REQUEST['paedsid'] != '' && $_REQUEST['paedsid'] != '0' ? $_REQUEST['paedsid'] : 0);
        $searchData['writeOffNod'] = (isset($_REQUEST['writeOffNod']) && $_REQUEST['writeOffNod'] != '' && $_REQUEST['writeOffNod'] != '0' ? $_REQUEST['writeOffNod'] : 0);
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
        $colors = array('primary', 'warning', 'danger', 'success', 'info', 'mycolor1', 'mycolor2', 'mycolor3');

        foreach ($data as $key => $value) {

            if ($value->status == 1) {
                $statusClass = 'primary';
            } elseif ($value->status == 2) {
                $statusClass = 'danger';
            } elseif ($value->status == 3) {
                $statusClass = 'accent-2';
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
            $table_data[$value->idAsset]['category'] = $value->idCategory;
            $table_data[$value->idAsset]['desc'] = $value->desc;
            $table_data[$value->idAsset]['tag'] = $value->tag_no;
            $table_data[$value->idAsset]['emp'] = $value->emp_no;
            $table_data[$value->idAsset]['proj'] = $value->proj_code;
            $table_data[$value->idAsset]['loc'] = $value->idLocation;
            $table_data[$value->idAsset]['sub_loc'] = $value->idSubLocation;
            $table_data[$value->idAsset]['status'] = '<span class="label btn btn-sm btn-' . $statusClass . ' waves-effect waves-light" 
             onclick="changeStatus(this)" data-id="' . $value->idAsset . '" data-status="' . $value->status . '">' . $value->status_name . '</span>';
            $table_data[$value->idAsset]['pr_path'] = $value->pr_path;

            $table_data[$value->idAsset]['Action'] = '
                <a href="' . base_url('index.php/asset_controllers/asset/auditTrial?i=' . $value->idAsset) . '"  target="_blank" title="Audit Trial" data-id="' . $value->idAsset . '">
                        <i class="feather icon-eye" ></i> 
                </a> 
                <a href="javascript:void(0)" onclick="getDelete(this)" data-id="' . $value->idAsset . '">
                        <i class="feather icon-trash"></i>
                </a>';

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
        $totalsearchData['ftag'] = $searchData['ftag'];
        $totalsearchData['prno'] = $searchData['prno'];
        $totalsearchData['paedsid'] = $searchData['paedsid'];
        $totalsearchData['writeOffNod'] = $searchData['writeOffNod'];
        $totalsearchData['dateTo'] = $searchData['dateTo'];
        $totalsearchData['dateFrom'] = $searchData['dateFrom'];
        $totalsearchData['search'] = (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != '' ? $_REQUEST['search']['value'] : '');
        $totalrecords = $M->getCntTotalAsset($totalsearchData);
        $result["recordsTotal"] = $totalrecords[0]->cnttotal;
        $result["recordsFiltered"] = $totalrecords[0]->cnttotal;
        $result["data"] = $result_table_data;

        echo json_encode($result, true);
    }

    function auditTrial()
    {
        if (isset($_GET['i']) && $_GET['i'] != '') {
            $data = array();
            /*==========Log=============*/
            $Custom = new Custom();
            $trackarray = array("action" => "View LineListing Dashboard",
                "result" => "View LineListing Dashboard page. Fucntion: dashboard/index()");
//        $Custom->trackLogs($trackarray, "user_logs");
            /*==========Log=============*/
            $MSettings = new MSettings();
            $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'asset_controllers/asset/auditTrial', 0);

            $searchData = array();
            $searchData['id'] = $_GET['i'];

            $M = new MAsset();
            $data['asset_data'] = $M->getassetById($searchData);
            $asset_audit = $M->getAuditTrialById($searchData);
            $audit = array();
            foreach ($asset_audit as $k => $a) {
                $audit[$a->FormName][] = $a;
            }


            $data['asset_audit'] = $audit;
            $data['all_asset_audit'] = $asset_audit;
            $this->load->view('include/header');
            $this->load->view('include/top_header');
            $this->load->view('include/sidebar');
            $this->load->view('asset_views/audit_trial', $data);
            $this->load->view('include/customizer');
            $this->load->view('include/footer');
        } else {
            $this->load->view('page-invalid-id');
        }

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
}

?>