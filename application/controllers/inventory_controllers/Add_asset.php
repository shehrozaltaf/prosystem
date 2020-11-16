<?php

class Add_asset extends CI_controller
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
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'inventory_controllers/Add_asset');
        $data['inventory_type'] = $Custom->selectAllQuery('i_inventory_type', 'id', 'status');
        $data['status'] = $Custom->selectAllQuery('i_status', 'id', 'status');
        $data['project'] = $Custom->selectAllQuery('project', 'idProject', 'isActive');


        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('inventory_views/add_inventory', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }


    function insertData()
    {
        $flag = 0;
        if (!isset($_POST['inventory_type']) || $_POST['inventory_type'] == '' || $_POST['inventory_type'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Inventory Type');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['model']) || $_POST['model'] == '' || $_POST['model'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Model');
            $flag = 1;
            echo json_encode($result);
            exit();
        }

        if (!isset($_POST['product_no']) || $_POST['product_no'] == '' || $_POST['product_no'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Product');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['serial_no']) || $_POST['serial_no'] == '' || $_POST['serial_no'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Serial No');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['proj_code']) || $_POST['proj_code'] == '' || $_POST['proj_code'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Project/Budget Code');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['po_num']) || $_POST['po_num'] == '' || $_POST['po_num'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid PO Number');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['pr_num']) || $_POST['pr_num'] == '' || $_POST['pr_num'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid PR Number');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['dor']) || $_POST['dor'] == '' || $_POST['dor'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid DoR');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['dop']) || $_POST['dop'] == '' || $_POST['dop'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid DoP');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if (!isset($_POST['status']) || $_POST['status'] == '' || $_POST['status'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Status');
            $flag = 1;
            echo json_encode($result);
            exit();
        }

        if (!isset($_POST['tagable']) || $_POST['tagable'] == '' || $_POST['tagable'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Tagable');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if ((!isset($_POST['ftag']) || $_POST['ftag'] == '' || $_POST['ftag'] == '0') && $_POST['tagable'] == 1) {
            $result = array('0' => 'Error', '1' => 'Invalid FTAG');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if ((!isset($_POST['aaftag']) || $_POST['aaftag'] == '' || $_POST['aaftag'] == '0') && $_POST['tagable'] == 2) {
            $result = array('0' => 'Error', '1' => 'Invalid AAFTAG');
            $flag = 1;
            echo json_encode($result);
            exit();
        }

        if ($flag == 0) {
            $Custom = new Custom();
            $insertArray = array();
            $insertArray['inventory_type'] = $_POST['inventory_type'];
            $insertArray['model'] = $_POST['model'];
            $insertArray['product'] = $_POST['product_no'];
            $insertArray['serial'] = $_POST['serial_no'];
            $insertArray['proj_code'] = $_POST['proj_code'];
            $insertArray['po_num'] = $_POST['po_num'];
            $insertArray['pr_num'] = $_POST['pr_num'];
            $insertArray['dor'] = $_POST['dor'];
            $insertArray['dop'] = date('Y-m-d', strtotime($_POST['dop']));
            $insertArray['status'] = $_POST['status'];
            $insertArray['tagable'] = $_POST['tagable'];
            $insertArray['ftag'] = $_POST['ftag'];
            $insertArray['aaftag'] = $_POST['aaftag'];
            $insertArray['remarks'] = $_POST['remarks'];
            $insertArray['loc'] = 'PRO';
            $insertArray['username'] = 'STOREPRO';
            $insertArray['isActive'] = 1;
            $insertArray['createdBy'] = $_SESSION['login']['idUser'];
            $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($insertArray, 'id', 'i_paedsinventory', 'Y');
            if ($InsertData) {

                $Custom->insrt_AT($InsertData, 'inventory_type', 'inventory_type', 'Inventory Type', 'New Entry', $insertArray['inventory_type']);
                $Custom->insrt_AT($InsertData, 'inventory_model', 'inventory_model', 'Model', 'New Entry', $insertArray['model']);
                $Custom->insrt_AT($InsertData, 'product', 'product', 'Product', 'New Entry', $insertArray['product']);
                $Custom->insrt_AT($InsertData, 'serial', 'serial', 'Serial', 'New Entry', $insertArray['serial']);
                $Custom->insrt_AT($InsertData, 'project', 'proj_code', 'Project Code', 'New Entry', $insertArray['proj_code']);
                $Custom->insrt_AT($InsertData, 'location', 'loc', 'Location', 'New Entry', $insertArray['loc']);
                $Custom->insrt_AT($InsertData, 'username', 'username', 'username', 'New Entry', $insertArray['username']);

                $result = array('0' => 'Success', '1' => 'Successfully Inserted');
            } else {
                $result = array('0' => 'Error', '1' => 'Error in Inserting Data');
            }
            echo json_encode($result);
        }

    }


    /*function validateData($arr)
    {
        foreach ($arr as $k => $v) {
            if (!isset($v) || $v == '' || $v == '0') {
                $result = array('0' => 'Error', '1' => $k);
                return json_encode($result);
            }
        }
        return true;
    }*/

}

?>