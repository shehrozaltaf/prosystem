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
        $data['inventory_type'] = array('MM', 'UP', 'SP', 'SC', 'TB', 'MT', 'GS', 'PR', 'SW', 'RT', 'NS', 'LT', 'DT', 'PD', 'AP', 'DS');
        $data['status'] = array('OK', 'RETURNED TO AGENCY', 'RETIRED', 'STOLEN', 'NOT WORKING', 'NA');


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
        if (!isset($_POST['ftag']) || $_POST['ftag'] == '' || $_POST['ftag'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid FTAG');
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

        if ($flag == 0) {
            $Custom = new Custom();
            $insertArray = array();
            $insertArray['inventory_type'] = $_POST['inventory_type'];
            $insertArray['model'] = $_POST['model'];
            $insertArray['ftag'] = $_POST['ftag'];
            $insertArray['product'] = $_POST['product_no'];
            $insertArray['serial'] = $_POST['serial_no'];
            $insertArray['dop'] = date('Y-m-d', strtotime($_POST['dop']));
            $insertArray['status'] = $_POST['status'];
            $insertArray['remarks'] = $_POST['remarks'];
            $insertArray['loc'] = 'PRO';
            $insertArray['username'] = 'STOREPRO';
            $insertArray['createdBy'] = $_SESSION['login']['idUser'];
            $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
            $InsertData = $Custom->Insert($insertArray, 'id', 'i_paedsinventory', 'N');
            if ($InsertData) {
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