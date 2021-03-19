<?php

class Add_asset extends CI_controller
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
        $trackarray = array("action" => "View Add_asset",
            "result" => "View Add_asset page. Fucntion: Add_asset/index()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'asset_controllers/Add_asset');
        $data['category'] = $Custom->selectAllQuery('category', 'idCategory', 'isActive');
        $data['currency'] = $Custom->selectAllQuery('currency', 'idCurrency', 'isActive');
        $data['sop'] = $Custom->selectAllQuery('a_sourceOfPurchase', 'idSop', 'status');
        $data['employee'] = $Custom->getEmpAllDetails('');
        $data['location'] = $Custom->selectAllQuery('location', 'id');
        $data['project'] = $Custom->selectAllQuery('project', 'idProject');
        $data['status'] = $Custom->selectAllQuery('a_status', 'id', 'status');
        $MAsset = new MAsset();
        $data['maxAssetId'] = $MAsset->getAssetLastId();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('asset_views/add_asset', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function testUpload3()
    {

        $config = array(
            'upload_path' => 'assets/uploads/excelsUpload',
            'allowed_types' => 'jpg|gif|png',
            'overwrite' => 1,
        );

        $this->load->library('upload', $config);

        $images = array();
        $files = $_FILES;
        $title = 't';
        foreach ($files['file'] as $key => $image) {
            $_FILES['images[]']['name'] = $files['file'] ['name'][$key];
            $_FILES['images[]']['type'] = $files['file'] ['type'][$key];
            $_FILES['images[]']['tmp_name'] = $files['file'] ['tmp_name'][$key];
            $_FILES['images[]']['error'] = $files['file'] ['error'][$key];
            $_FILES['images[]']['size'] = $files['file'] ['size'][$key];

            $fileName = $title . '_' . $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
            } else {
                return false;
            }
        }

        return $images;


    }

    function testUpload()
    {
        $countfiles = count($_FILES['file']['name']);
        $upload_location = "assets/uploads/assetUploads/";
        $files_arr = array();
        for ($index = 0; $index < $countfiles; $index++) {
            if (isset($_FILES['file']['name'][$index]) && $_FILES['file']['name'][$index] != '') {
                $filename = $_FILES['file']['name'][$index];
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $valid_ext = array("png", "jpeg", "jpg");
                if (in_array($ext, $valid_ext)) {
                    $path = $upload_location . $filename;
                    if (move_uploaded_file($_FILES['file']['tmp_name'][$index], $path)) {
                        $files_arr[] = $path;
                    }
                }
            }
        }
        echo json_encode($files_arr);
    }

    function chkTag()
    {
        if (isset($_POST['tag_no']) && $_POST['tag_no'] != '' && $_POST['tag_no'] != 'undefined') {
            $tag_no = $_POST['tag_no'];
            $MAsset = new MAsset();
            $chkTagNo = $MAsset->chkTagNo($tag_no);
            if (isset($chkTagNo[0]->tag_no) || count($chkTagNo) >= 1) {
                $result = array('0' => 'Error', '1' => 'Duplicate Tag No');
            } else {
                $result = array('0' => 'Success', '1' => '');
            }
        } else {
            $result = array('0' => 'Error', '1' => 'Invalid Tag No');
        }
        echo json_encode($result);
    }

    function insertData()
    {
        $flag = 0;
        if (!isset($_POST['tag_no']) || $_POST['tag_no'] == '' || $_POST['tag_no'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Tag No', '2' => '0');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if ($flag == 0) {
            $tag_no = $_POST['tag_no'];
            $MAsset = new MAsset();
            $chkTagNo = $MAsset->chkTagNo($tag_no);
            if (isset($chkTagNo[0]->tag_no) || count($chkTagNo) >= 1) {
                $result = array('0' => 'Error', '1' => 'Duplicate Tag No', '2' => '0');
            } else {
                $Custom = new Custom();
                $insertArray = array();
                $insertArray['pr_no'] = $_POST['pr_reqId'];
                $insertArray['idCategory'] = $_POST['idCategory'];
                $insertArray['desc'] = $_POST['desc'];
                $insertArray['model'] = $_POST['model'];
                $insertArray['product_no'] = $_POST['product_no'];
                $insertArray['gri_no'] = $_POST['gri_no'];
                $insertArray['serial_no'] = $_POST['serial_no'];
                $insertArray['tag_no'] = $tag_no;
                $insertArray['po_no'] = $_POST['po_no'];
                $insertArray['cost'] = $_POST['cost'];
                $insertArray['idCurrency'] = $_POST['idCurrency'];
                $insertArray['idSourceOfPurchase'] = $_POST['idSourceOfPurchase'];
                $insertArray['emp_no'] = $_POST['emp_no'];
                $insertArray['resp_person_name'] = $_POST['resp_person_name'];
                $insertArray['ou'] = $_POST['ou'];
                $insertArray['account'] = $_POST['account'];
                $insertArray['dept'] = $_POST['dept'];
                $insertArray['fund'] = $_POST['fund'];
                $insertArray['proj_code'] = $_POST['proj_code'];
                $insertArray['prog'] = $_POST['prog'];
                $insertArray['idLocation'] = $_POST['idLocation'];
                $insertArray['idSubLocation'] = $_POST['idSubLocation'];
                $insertArray['area'] = $_POST['area'];
                $insertArray['verification_status'] = $_POST['verification_status'];
                $insertArray['last_verify_date'] = date('Y-m-d', strtotime($_POST['last_verify_date']));
                $insertArray['due_date'] = date('Y-m-d', strtotime($_POST['due_date']));
                $insertArray['pur_date'] = date('Y-m-d', strtotime($_POST['pur_date']));
                $insertArray['status'] = $_POST['status'];
                $insertArray['writOff_formNo'] = $_POST['writOff_formNo'];
                $insertArray['wo_date'] = date('Y-m-d', strtotime($_POST['wo_date']));
                $insertArray['remarks'] = $_POST['remarks'];
                $insertArray['isActive'] = 1;
                $insertArray['createdBy'] = $_SESSION['login']['idUser'];
                $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
                $insertArray['entry_date'] = date('Y-m-d H:i:s');
                $InsertData = $Custom->Insert($insertArray, 'idAsset', 'a_asset', 'Y');
                if ($InsertData) {

                    if (isset($_FILES) && isset($_FILES['file']) && $_FILES['file'] != '') {
                        $upload_location = "assets/uploads/assetUploads/" . $InsertData . '/';
                        if (!is_dir($upload_location)) {
                            mkdir($upload_location, 0777, TRUE);
                        }

                        $countfiles = count($_FILES['file']['name']);
                        $files_arr = array();
                        for ($index = 0; $index < $countfiles; $index++) {
                            if (isset($_FILES['file']['name'][$index]) && $_FILES['file']['name'][$index] != '') {
                                $filename = $_FILES['file']['name'][$index];
                                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                                $valid_ext = array("png", "jpeg", "jpg", "doc", "docx", "pdf", "csv", "xls", "xlsx");
                                if (in_array($ext, $valid_ext)) {
                                    if (isset( $insertArray['tag_no']) && $insertArray['tag_no'] != '') {
                                        $tag = $insertArray['tag_no'];
                                    } else {
                                        $tag = $InsertData;
                                    }
                                    $filename = $tag . '.' . $ext;
                                    $newName=$MAsset->file_newname($upload_location, $filename);
                                    $path = $upload_location . $newName;
                                    if (move_uploaded_file($_FILES['file']['tmp_name'][$index], $path)) {
                                        $files_arr[] = $path;
                                        $fileUpload = array();
                                        $fileUpload['idAsset'] = $InsertData;
                                        $fileUpload['docPath'] = $upload_location . $filename;
                                        $fileUpload['docName'] = $filename;
                                        $fileUpload['isActive'] = 1;
                                        $fileUpload['createdBy'] = $_SESSION['login']['idUser'];
                                        $fileUpload['createdDateTime'] = date('Y-m-d H:i:s');
                                        $Custom->Insert($fileUpload, 'idAssetImage', 'a_asset_docs', 'Y');
                                    }
                                }
                            }
                        }
                    }


//                $Custom->insrt_AT($InsertData, 'inventory_type', 'inventory_type', 'Inventory Type', 'New Entry', $insertArray['inventory_type']);

                    $result = array('0' => 'Success', '1' => 'Successfully Inserted', '2' => $InsertData + 1);
                } else {
                    $result = array('0' => 'Error', '1' => 'Error in Inserting Data', '2' => '0');
                }
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