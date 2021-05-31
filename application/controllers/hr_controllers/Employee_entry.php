<?php error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
date_default_timezone_set('Asia/Karachi');

class Employee_entry extends CI_controller
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

    /*shehroz*/
    function index()
    {
        $data = array();

        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'hr_controllers/employee_entry');
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Dashboard Users Page",
            "result" => "View Dashboard Users page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");

        $data['employeeType'] = $Custom->selectAllQuery('hr_emptype', 'id');
        $data['CategoryHR'] = $Custom->selectAllQuery('hr_category', 'id');
        $data['degree'] = $Custom->selectAllQuery('hr_degree', 'id');
        $data['field'] = $Custom->selectAllQuery('hr_field', 'id');
        $data['band'] = $Custom->selectAllQuery('hr_band', 'id');
        $data['location'] = $Custom->selectAllQuery('location', 'id');
        $data['entity'] = $Custom->selectAllQuery('hr_entity', 'id');
        $data['dept'] = $Custom->selectAllQuery('hr_dept', 'id');
        $data['status'] = $Custom->selectAllQuery('hr_status', 'id');
        $data['proj'] = $Custom->selectAllQuery('project', 'idProject');
        $Mempmodel = new Mempmodel();
        $data['supervisor'] = $Mempmodel->getDataSupervisor();
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/employee_entry', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function getEmployeeEdit($id)
    {
        $data = array();

        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'hr_controllers/employee_entry');
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Dashboard Users Page",
            "result" => "View Dashboard Users page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");

        $data['employeeType'] = $Custom->selectAllQuery('hr_emptype', 'id');
        $data['CategoryHR'] = $Custom->selectAllQuery('hr_category', 'id');
        $data['degree'] = $Custom->selectAllQuery('hr_degree', 'id');
        $data['field'] = $Custom->selectAllQuery('hr_field', 'id');
        $data['band'] = $Custom->selectAllQuery('hr_band', 'id');
        $data['location'] = $Custom->selectAllQuery('location', 'id');
        $data['entity'] = $Custom->selectAllQuery('hr_entity', 'id');
        $data['dept'] = $Custom->selectAllQuery('hr_dept', 'id');
        $data['status'] = $Custom->selectAllQuery('hr_status', 'id');
        $data['proj'] = $Custom->selectAllQuery('project', 'idProject');
        $Mempmodel = new Mempmodel();
        $data['supervisor'] = $Mempmodel->getDataSupervisor();

        $data['editemp'] = $Mempmodel->getEmployeeDataByEmpNo($id);
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/employee_entry_edit', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function getEmployeeEmpNo()
    {
        if (isset($_POST['empno']) && $_POST['empno'] != '') {
            $Mempmodel = new Mempmodel();
            $empno = $_POST['empno'];
            $getEmp = $Mempmodel->getEmployeeDataByEmpNo($empno);
            if (isset($getEmp) && $getEmp != null) {
                $results = array(['error' => 1]);
            } else {
                $results = array(['error' => 3]);
            }
        } else {
            $results = array(['error' => 2]);
        }

        echo json_encode($results);
    }

    function addRecord()
    {

        $flag = 0;
        if (!isset($_POST['empno']) || $_POST['empno'] == '' || $_POST['empno'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Emp No', '2' => '0');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if ($flag == 0) {
            $empno = $_POST['empno'];
            $Mempmodel = new Mempmodel();
            $getEmp = $Mempmodel->getEmployeeDataByEmpNo($empno);
            if (isset($getEmp[0]->empno) || count($getEmp) >= 1) {
                $result = array('0' => 'Error', '1' => 'Duplicate Emp No', '2' => '0');
            } else {
                $Custom = new Custom();
                $insertArray = array();
                $insertArray['empno'] = $empno;
                $insertArray['offemail'] = (isset($_POST['offemail']) && $_POST['offemail'] != '' ? $_POST['offemail'] . '@aku.edu' : '');
                $insertArray['empname'] = (isset($_POST['empname']) && $_POST['empname'] != '' ? $_POST['empname'] : '');
                $insertArray['cnicno'] = (isset($_POST['cnicno']) && $_POST['cnicno'] != '' ? $_POST['cnicno'] : '');
                $insertArray['cnicexdt'] = (isset($_POST['cnicexdt']) && $_POST['cnicexdt'] != '' ? date('Y-m-d', strtotime($_POST['cnicexdt'])) : '');
                $insertArray['dob'] = (isset($_POST['dob']) && $_POST['dob'] != '' ? date('Y-m-d', strtotime($_POST['dob'])) : '');
                $insertArray['degree'] = (isset($_POST['degree']) && $_POST['degree'] != '' ? $_POST['degree'] : '');
                $insertArray['field'] = (isset($_POST['field']) && $_POST['field'] != '' ? $_POST['field'] : '');

                $insertArray['resaddr'] = (isset($_POST['resaddr']) && $_POST['resaddr'] != '' ? $_POST['resaddr'] : '');
                $insertArray['peremail'] = (isset($_POST['peremail']) && $_POST['peremail'] != '' ? $_POST['peremail'] : '');
                $insertArray['chk_landline'] = (isset($_POST['chk_landline']) && $_POST['chk_landline'] != '' ? $_POST['chk_landline'] : '');
                $insertArray['landline'] = (isset($_POST['landline']) && $_POST['landline'] != '' ? $_POST['landline'] : '');
                $insertArray['cellno1'] = (isset($_POST['cellno1']) && $_POST['cellno1'] != '' ? $_POST['cellno1'] : '');
                $insertArray['cellno2'] = (isset($_POST['cellno2']) && $_POST['cellno2'] != '' ? $_POST['cellno2'] : '');

                $insertArray['personnme'] = (isset($_POST['personnme']) && $_POST['personnme'] != '' ? $_POST['personnme'] : '');
                $insertArray['emcellno'] = (isset($_POST['emcellno']) && $_POST['emcellno'] != '' ? $_POST['emcellno'] : '');
                $insertArray['emlandno'] = (isset($_POST['emlandno']) && $_POST['emlandno'] != '' ? $_POST['emlandno'] : '');
                $insertArray['chk_emlandno'] = (isset($_POST['chk_emlandno']) && $_POST['chk_emlandno'] != '' ? $_POST['chk_emlandno'] : '');

                $insertArray['ddlemptype'] = (isset($_POST['ddlemptype']) && $_POST['ddlemptype'] != '' ? $_POST['ddlemptype'] : '');
                $insertArray['ddlcategory'] = (isset($_POST['ddlcategory']) && $_POST['ddlcategory'] != '' ? $_POST['ddlcategory'] : '');
                $insertArray['gncno'] = (isset($_POST['gncno']) && $_POST['gncno'] != '' ? $_POST['gncno'] : '');
                $insertArray['ddlband'] = (isset($_POST['ddlband']) && $_POST['ddlband'] != '' ? $_POST['ddlband'] : '');
                $insertArray['titdesi'] = (isset($_POST['titdesi']) && $_POST['titdesi'] != '' ? $_POST['titdesi'] : '');
                $insertArray['rehiredt'] = (isset($_POST['rehiredt']) && $_POST['rehiredt'] != '' ? date('Y-m-d', strtotime($_POST['rehiredt'])) : '');
                $insertArray['conexpiry'] = (isset($_POST['conexpiry']) && $_POST['conexpiry'] != '' ? date('Y-m-d', strtotime($_POST['conexpiry'])) : '');
                $insertArray['workproj'] = (isset($_POST['workproj']) && $_POST['workproj'] != '' ? $_POST['workproj'] : '');
                $insertArray['chargproj'] = (isset($_POST['chargproj']) && $_POST['chargproj'] != '' ? $_POST['chargproj'] : '');
                $insertArray['ddlloc'] = (isset($_POST['ddlloc']) && $_POST['ddlloc'] != '' ? $_POST['ddlloc'] : '');
                $insertArray['ddlloc_sub'] = (isset($_POST['ddlloc_sub']) && $_POST['ddlloc_sub'] != '' ? $_POST['ddlloc_sub'] : '');
                $insertArray['supernme'] = (isset($_POST['supernme']) && $_POST['supernme'] != '' ? $_POST['supernme'] : '');
                $insertArray['hiresalary'] = (isset($_POST['hiresalary']) && $_POST['hiresalary'] != '' ? $this->encrypt->encode($_POST['hiresalary']) : '');
                $insertArray['ddlhardship'] = (isset($_POST['ddlhardship']) && $_POST['ddlhardship'] != '' ? $_POST['ddlhardship'] : '');
                $insertArray['amount'] = (isset($_POST['amount']) && $_POST['amount'] != '' ? $_POST['amount'] : '');
                $insertArray['benefits'] = (isset($_POST['benefits']) && $_POST['benefits'] != '' ? $_POST['benefits'] : '');

                $insertArray['peme'] = (isset($_POST['peme']) && $_POST['peme'] != '' ? $_POST['peme'] : '');
                $insertArray['gop'] = (isset($_POST['gop']) && $_POST['gop'] != '' ? $_POST['gop'] : '');
                $insertArray['gopdt'] = (isset($_POST['gopdt']) && $_POST['gopdt'] != '' ? date('Y-m-d', strtotime($_POST['gopdt'])) : '');
                $insertArray['entity'] = (isset($_POST['entity']) && $_POST['entity'] != '' ? $_POST['entity'] : '');
                $insertArray['dept'] = (isset($_POST['dept']) && $_POST['dept'] != '' ? $_POST['dept'] : '');
                $insertArray['cardissue'] = (isset($_POST['cardissue']) && $_POST['cardissue'] != '' ? $_POST['cardissue'] : '');
                $insertArray['letterapp'] = (isset($_POST['letterapp']) && $_POST['letterapp'] != '' ? $_POST['letterapp'] : '');
                $insertArray['confirmation'] = (isset($_POST['confirmation']) && $_POST['confirmation'] != '' ? $_POST['confirmation'] : '');
                $insertArray['status'] = (isset($_POST['status']) && $_POST['status'] != '' ? $_POST['status'] : '');
                $insertArray['remarks'] = (isset($_POST['remarks']) && $_POST['remarks'] != '' ? $_POST['remarks'] : '');
                $insertArray['entryType'] = (isset($_POST['entryType']) && $_POST['entryType'] != '' ? $_POST['entryType'] : '');
                $pic_location = EMPLOYEE_LOC . $empno . '/profilepic/';
                $insertArray['pic'] = (isset($_FILES["pic"]["name"]) && $_FILES["pic"]["name"] != '' ? $pic_location . $_FILES["pic"]["name"] : '');

                $insertArray['isActive'] = 1;
                $insertArray['createdBy'] = $_SESSION['login']['idUser'];
                $insertArray['createdDateTime'] = date('Y-m-d H:i:s');
                $InsertData = $Custom->Insert($insertArray, 'id', 'hr_employee', 'Y');
                if ($InsertData) {
                    $result = array('0' => 'Success', '1' => 'Successfully Inserted', '2' => $empno);

                    if (isset($_FILES["pic"]["name"])) {
                        if (!is_dir($pic_location)) {
                            mkdir($pic_location, 0777, TRUE);
                        }
                        $config['upload_path'] = $pic_location;
                        $config['allowed_types'] = 'jpg|jpeg|gif|png';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('pic')) {
                            $result = array('0' => 'Error', '1' => 'Data Added, but' . $this->upload->display_errors(), '2' => $empno);
                        }
                    }

                    if (isset($_FILES) && isset($_FILES['file']) && $_FILES['file'] != '') {
                        $upload_location = EMPLOYEE_LOC . $empno . '/docs/';
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
                                    if (isset($insertArray['empno']) && $insertArray['empno'] != '') {
                                        $empno = $insertArray['empno'];
                                    } else {
                                        $empno = $InsertData;
                                    }
                                    $filename = $empno.'_'.date('d_m_Y_H_i_s') . '.' . $ext;
                                    $newName = $Mempmodel->file_newname($upload_location, $filename);
                                    $path = $upload_location . $newName;
                                    if (move_uploaded_file($_FILES['file']['tmp_name'][$index], $path)) {
                                        $files_arr[] = $path;
                                        $fileUpload = array();
                                        $fileUpload['id_hr_employee'] = $InsertData;
                                        $fileUpload['empno'] = $empno;
                                        $fileUpload['docPath'] = $upload_location . $filename;
                                        $fileUpload['docName'] = $filename;
                                        $fileUpload['isActive'] = 1;
                                        $fileUpload['createdBy'] = $_SESSION['login']['idUser'];
                                        $fileUpload['createdDateTime'] = date('Y-m-d H:i:s');
                                        $inst_docs = $Custom->Insert($fileUpload, 'id', 'hr_employee_docs', 'N');
                                        if (!$inst_docs) {
                                            $result = array('0' => 'Error', '1' => 'Data Inserted, but documents not uploaded', '2' => $empno);
                                        }
                                    }
                                }
                            }
                        }
                    }
//                $Custom->insrt_AT($InsertData, 'inventory_type', 'inventory_type', 'Inventory Type', 'New Entry', $insertArray['inventory_type']);

                } else {
                    $result = array('0' => 'Error', '1' => 'Error in Inserting Data', '2' => '0');
                }
            }

            echo json_encode($result);
        }

    }

    function getDesignation()
    {
        if (isset($_POST['bandid']) && $_POST['bandid'] != '') {
            $Mempmodel = new Mempmodel();
            $bandid = $_POST['bandid'];
            $getDesignation = $Mempmodel->getDesignation($bandid);
            if (isset($getDesignation) && count($getDesignation) >= 1) {
                $results = $getDesignation;
            } else {
                $results = array(['error' => 3]);
            }
        } else {
            $results = array(['error' => 2]);
        }

        echo json_encode($results);
    }

    function getEmpDocs()
    {
        $result = array();
        if (isset($_GET['e']) && $_GET['e'] != '') {
            $Mempmodel = new Mempmodel();
            $searchdata = array();
            $searchdata['empno'] = $_GET['e'];
            $storeFolder = 'assets/uploads/hrUploads/' . $searchdata['empno'] . '/docs/';
            $docs = $Mempmodel->getEmpDocsByEmpNo($searchdata);
            if (isset($docs) && $docs != '') {
                foreach ($docs as $d) {
                    $obj['name'] = $d->docName;
                    $obj['size'] = filesize($storeFolder . '/' . $d->docName);
                    $result[] = $obj;
                }
            }
        }
        header('Content-type: text/json');
        header('Content-type: application/json');
        echo json_encode($result);
    }

    function deleteDoc()
    {
        $Custom = new Custom();
        $editArr = array();
        $where = array();
        if (isset($_POST['empno']) && $_POST['empno'] != '') {
            $where['empno'] = $_POST['empno'];
            if (isset($_POST['file']) && $_POST['file'] != '') {
                $where['docName'] = $_POST['file'];
                $editArr['isActive'] = 0;
                $editArr['deleteBy'] = $_SESSION['login']['idUser'];
                $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
                $editData = $Custom->Edit_multi_where($editArr, $where, 'hr_employee_docs');
                if ($editData) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 3;
            }
        } else {
            echo 4;
        }
    }

    function deleteEmp()
    {
        $Custom = new Custom();
        $editArr = array();
        if (isset($_POST['idEmp']) && $_POST['idEmp'] != '') {
            $idEmp= $_POST['idEmp'];
            $editArr['isActive'] = 0;
            $editArr['deleteBy'] = $_SESSION['login']['idUser'];
            $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'id', $idEmp, 'hr_employee');
            $trackarray = array("action" => "Delete Employee -> Function: deleteEmp() ",
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

    /*Edit Record*/

    function editData()
    {
        $flag = 0;
        if (!isset($_POST['empno']) || $_POST['empno'] == '' || $_POST['empno'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Emp No', '2' => '0');
            $flag = 1;
            echo json_encode($result);
            exit();
        }
        if ($flag == 0) {
            $empno = $_POST['empno'];
            /*$MAsset = new MAsset();
            $searchdata = array();
             $searchdata['idAsset'] = $empno;
             $asset = $MAsset->getAssetById($searchdata);*/
            $Custom = new Custom();
            $editArray = array();
            $editArray['offemail'] = (isset($_POST['offemail']) && $_POST['offemail'] != '' ? $_POST['offemail'] . '@aku.edu' : '');
            $editArray['empname'] = (isset($_POST['empname']) && $_POST['empname'] != '' ? $_POST['empname'] : '');
            $editArray['cnicno'] = (isset($_POST['cnicno']) && $_POST['cnicno'] != '' ? $_POST['cnicno'] : '');
            $editArray['cnicexdt'] = (isset($_POST['cnicexdt']) && $_POST['cnicexdt'] != '' ? date('Y-m-d', strtotime($_POST['cnicexdt'])) : '');
            $editArray['dob'] = (isset($_POST['dob']) && $_POST['dob'] != '' ? date('Y-m-d', strtotime($_POST['dob'])) : '');
            $editArray['degree'] = (isset($_POST['degree']) && $_POST['degree'] != '' ? $_POST['degree'] : '');
            $editArray['field'] = (isset($_POST['field']) && $_POST['field'] != '' ? $_POST['field'] : '');

            $editArray['resaddr'] = (isset($_POST['resaddr']) && $_POST['resaddr'] != '' ? $_POST['resaddr'] : '');
            $editArray['peremail'] = (isset($_POST['peremail']) && $_POST['peremail'] != '' ? $_POST['peremail'] : '');
            $editArray['chk_landline'] = (isset($_POST['chk_landline']) && $_POST['chk_landline'] != '' ? $_POST['chk_landline'] : '');
            $editArray['landline'] = (isset($_POST['landline']) && $_POST['landline'] != '' ? $_POST['landline'] : '');
            $editArray['cellno1'] = (isset($_POST['cellno1']) && $_POST['cellno1'] != '' ? $_POST['cellno1'] : '');
            $editArray['cellno2'] = (isset($_POST['cellno2']) && $_POST['cellno2'] != '' ? $_POST['cellno2'] : '');

            $editArray['personnme'] = (isset($_POST['personnme']) && $_POST['personnme'] != '' ? $_POST['personnme'] : '');
            $editArray['emcellno'] = (isset($_POST['emcellno']) && $_POST['emcellno'] != '' ? $_POST['emcellno'] : '');
            $editArray['emlandno'] = (isset($_POST['emlandno']) && $_POST['emlandno'] != '' ? $_POST['emlandno'] : '');
            $editArray['chk_emlandno'] = (isset($_POST['chk_emlandno']) && $_POST['chk_emlandno'] != '' ? $_POST['chk_emlandno'] : '');

            $editArray['ddlemptype'] = (isset($_POST['ddlemptype']) && $_POST['ddlemptype'] != '' ? $_POST['ddlemptype'] : '');
            $editArray['ddlcategory'] = (isset($_POST['ddlcategory']) && $_POST['ddlcategory'] != '' ? $_POST['ddlcategory'] : '');
            $editArray['gncno'] = (isset($_POST['gncno']) && $_POST['gncno'] != '' ? $_POST['gncno'] : '');
            $editArray['ddlband'] = (isset($_POST['ddlband']) && $_POST['ddlband'] != '' ? $_POST['ddlband'] : '');
            $editArray['titdesi'] = (isset($_POST['titdesi']) && $_POST['titdesi'] != '' ? $_POST['titdesi'] : '');
            $editArray['rehiredt'] = (isset($_POST['rehiredt']) && $_POST['rehiredt'] != '' ? date('Y-m-d', strtotime($_POST['rehiredt'])) : '');
            $editArray['conexpiry'] = (isset($_POST['conexpiry']) && $_POST['conexpiry'] != '' ? date('Y-m-d', strtotime($_POST['conexpiry'])) : '');
            $editArray['workproj'] = (isset($_POST['workproj']) && $_POST['workproj'] != '' ? $_POST['workproj'] : '');
            $editArray['chargproj'] = (isset($_POST['chargproj']) && $_POST['chargproj'] != '' ? $_POST['chargproj'] : '');
            $editArray['ddlloc'] = (isset($_POST['ddlloc']) && $_POST['ddlloc'] != '' ? $_POST['ddlloc'] : '');
            $editArray['ddlloc_sub'] = (isset($_POST['ddlloc_sub']) && $_POST['ddlloc_sub'] != '' ? $_POST['ddlloc_sub'] : '');
            $editArray['supernme'] = (isset($_POST['supernme']) && $_POST['supernme'] != '' ? $_POST['supernme'] : '');
            $editArray['hiresalary'] = (isset($_POST['hiresalary']) && $_POST['hiresalary'] != '' ? $this->encrypt->encode($_POST['hiresalary']) : '');
            $editArray['ddlhardship'] = (isset($_POST['ddlhardship']) && $_POST['ddlhardship'] != '' ? $_POST['ddlhardship'] : '');
            $editArray['amount'] = (isset($_POST['amount']) && $_POST['amount'] != '' ? $_POST['amount'] : '');
            $editArray['benefits'] = (isset($_POST['benefits']) && $_POST['benefits'] != '' ? $_POST['benefits'] : '');

            $editArray['peme'] = (isset($_POST['peme']) && $_POST['peme'] != '' ? $_POST['peme'] : '');
            $editArray['gop'] = (isset($_POST['gop']) && $_POST['gop'] != '' ? $_POST['gop'] : '');
            $editArray['gopdt'] = (isset($_POST['gopdt']) && $_POST['gopdt'] != '' ? date('Y-m-d', strtotime($_POST['gopdt'])) : '');
            $editArray['entity'] = (isset($_POST['entity']) && $_POST['entity'] != '' ? $_POST['entity'] : '');
            $editArray['dept'] = (isset($_POST['dept']) && $_POST['dept'] != '' ? $_POST['dept'] : '');
            $editArray['cardissue'] = (isset($_POST['cardissue']) && $_POST['cardissue'] != '' ? $_POST['cardissue'] : '');
            $editArray['letterapp'] = (isset($_POST['letterapp']) && $_POST['letterapp'] != '' ? $_POST['letterapp'] : '');
            $editArray['confirmation'] = (isset($_POST['confirmation']) && $_POST['confirmation'] != '' ? $_POST['confirmation'] : '');
            $editArray['status'] = (isset($_POST['status']) && $_POST['status'] != '' ? $_POST['status'] : '');
            $editArray['remarks'] = (isset($_POST['remarks']) && $_POST['remarks'] != '' ? $_POST['remarks'] : '');
            $editArray['entryType'] = (isset($_POST['entryType']) && $_POST['entryType'] != '' ? $_POST['entryType'] : '');
            $pic_location = EMPLOYEE_LOC . $empno . '/profilepic/';
            $editArray['pic'] = (isset($_FILES["pic"]["name"]) && $_FILES["pic"]["name"] != '' ? $pic_location . $_FILES["pic"]["name"] : '');

            $editArray['updatedBy'] = $_SESSION['login']['idUser'];
            $editArray['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArray, 'empno', $empno, 'hr_employee');
            if ($editData) {
                /*foreach ($editArray as $ek => $e) {
                    foreach ($asset[0] as $k => $a) {
                        if (trim($ek) == trim($k) && $e != $a) {
                            $insertArray_at = array();
                            $insertArray_at['FormID'] = $idAsset;
                            $insertArray_at['FormName'] = $ek;
                            $insertArray_at['Fieldid'] = $ek;
                            $insertArray_at['FieldName'] = $ek;
                            $insertArray_at['OldValue'] = $a;
                            $insertArray_at['NewValue'] = $e;
                            $insertArray_at['isActive'] = 1;
                            $insertArray_at['createdBy'] = $_SESSION['login']['idUser'];
                            $insertArray_at['createdDateTime'] = date('Y-m-d H:i:s');
                            $Custom->Insert($insertArray_at, 'id', 'a_AuditTrials', 'N');
                        }
                    }
                }*/
                $result = array('0' => 'Success', '1' => 'Successfully Edited', '2' => $empno);

                if (isset($_FILES["pic"]["name"])) {
                    if (!is_dir($pic_location)) {
                        mkdir($pic_location, 0777, TRUE);
                    }
                    $config['upload_path'] = $pic_location;
                    $config['allowed_types'] = 'jpg|jpeg|gif|png';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('pic')) {
                        $result = array('0' => 'Error', '1' => 'Data Edited, but' . $this->upload->display_errors(), '2' => $empno);
                    }
                }
                if (isset($_FILES) && isset($_FILES['file']) && $_FILES['file'] != '') {
                    $upload_location = EMPLOYEE_LOC . $empno . '/docs/';
                    if (!is_dir($upload_location)) {
                        mkdir($upload_location, 0777, TRUE);
                    }
                    $Mempmodel = new Mempmodel();
                    $countfiles = count($_FILES['file']['name']);
                    $files_arr = array();
                    for ($index = 0; $index < $countfiles; $index++) {
                        if (isset($_FILES['file']['name'][$index]) && $_FILES['file']['name'][$index] != '') {
                            $filename = $_FILES['file']['name'][$index];
                            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                            $valid_ext = array("png", "jpeg", "jpg", "doc", "docx", "pdf", "csv", "xls", "xlsx");
                            if (in_array($ext, $valid_ext)) {
                                $filename = $empno.'_'.date('d_m_Y_H_i_s') . '.' . $ext;
                                $newName = $Mempmodel->file_newname($upload_location, $filename);
                                $path = $upload_location . $newName;
                                if (move_uploaded_file($_FILES['file']['tmp_name'][$index], $path)) {
                                    $files_arr[] = $path;
                                    $fileUpload = array();
                                    $fileUpload['id_hr_employee'] = $empno;
                                    $fileUpload['empno'] = $empno;
                                    $fileUpload['docPath'] = $upload_location . $filename;
                                    $fileUpload['docName'] = $filename;
                                    $fileUpload['isActive'] = 1;
                                    $fileUpload['createdBy'] = $_SESSION['login']['idUser'];
                                    $fileUpload['createdDateTime'] = date('Y-m-d H:i:s');
                                    $inst_docs = $Custom->Insert($fileUpload, 'id', 'hr_employee_docs', 'N');
                                    if (!$inst_docs) {
                                        $result = array('0' => 'Error', '1' => 'Data Edited, but documents not uploaded', '2' => $empno);
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                $result = array('0' => 'Error', '1' => 'Error in Editing Data', '2' => '0');
            }

        }
        echo json_encode($result);
    }


    /*Javed Bhai*/


    function editRecord2()
    {
        ob_end_clean();
        $flag = 0;
        $formArray = array();
        foreach ($_POST as $k => $v) {
            if (!isset($v) || $v == '') {
                if (!isset($v) && $k === "cellno2" || $v == '' && $k === "cellno2" ||
                    !isset($v) && $k === "remarks" || $v == '' && $k === "remarks" ||
                    !isset($v) && $k === "offemail" || $v == '' && $k === "offemail" ||
                    !isset($v) && $k === "peremail" || $v == '' && $k === "peremail" ||
                    !isset($v) && $k === "landlineccode" || $v == '' && $k === "landlineccode" || $v == 'NULL' && $k === "landlineccode" || $v == 'undefined' && $k === "landlineccode" ||
                    !isset($v) && $k === "cellno1ccode" || $v == '' && $k === "cellno1ccode" || $v == 'NULL' && $k === "cellno1ccode" || $v == 'undefined' && $k === "cellno1ccode" ||
                    !isset($v) && $k === "cellno2ccode" || $v == '' && $k === "cellno2ccode" || $v == 'NULL' && $k === "cellno2ccode" || $v == 'undefined' && $k === "cellno2ccode" ||
                    !isset($v) && $k === "emcellnoccode" || $v == '' && $k === "emcellnoccode" || $v == 'NULL' && $k === "emcellnoccode" || $v == 'undefined' && $k === "emcellnoccode" ||
                    !isset($v) && $k === "emlandnoccode" || $v == '' && $k === "emlandnoccode" || $v == 'NULL' && $k === "emlandnoccode" || $v == 'undefined' && $k === "emlandnoccode" ||
                    !isset($v) && $k === "degree" || $v == '' && $k === "degree" || $v == 'NULL' && $k === "degree" || $v == 'undefined' && $k === "degree" ||
                    !isset($v) && $k === "field" || $v == '' && $k === "field" || $v == 'NULL' && $k === "field" || $v == 'undefined' && $k === "field"
                ) {
                    $formArray[$k] = null;
                } else {
                    $flag = 1;
                    echo json_encode('Invalid ' . $k);
                    return false;
                }
            } else {
                if ($k === 'dob' || $k === 'rehiredt' || $k === 'conexpiry' || $k === 'gopdt') {
                    $formArray[$k] = date('Y-m-d', strtotime($v));
                } else if ($k === 'empname') {
                    $formArray[$k] = ucwords($v);
                } else if ($k === 'hiresalary') {
                    $formArray[$k] = $this->encrypt->encode($v);
                    //$formArray[$k] = md5($v);
                } else {
                    $formArray[$k] = $v;
                }
            }
        }

        if ($flag == 0) {
            $Custom = new Custom();
            if (isset($_FILES["imgfile"]["name"])) {
                $formArray["pic"] = "assets/emppic/" . $_FILES["imgfile"]["name"];
            } else {
                if (!isset($formArray["pic"])) {
                    $formArray["pic"] = null;
                }
            }


            if (isset($_FILES["docfile"]["name"])) {
                $formArray["doc"] = "assets/docs/" . $_FILES["docfile"]["name"];
            } else {
                if (!isset($formArray["doc"])) {
                    $formArray["doc"] = null;
                }
            }
            if (isset($_SESSION['login']['idUser'])) {
                $formArray["userid"] = $_SESSION['login']['idUser'];
            } else {
                $formArray["userid"] = null;
            }
            $now = new DateTime();
            $formArray["entrydate"] = $now->format('Y-m-d H:i:s');

            $id = $_SESSION['id'];
            $this->AuditTrials();
            if (isset($_POST['results'])) {
                foreach (json_decode($_POST['results']) as $v) {

                    if ($v->summaryFldid == "ddlemptype" ||
                        $v->summaryFldid == "ddlcategory" ||
                        $v->summaryFldid == "ddlband" ||
                        $v->summaryFldid == "titdesi" ||
                        $v->summaryFldid == "ddlloc" ||
                        $v->summaryFldid == "ddlhardship" ||
                        $v->summaryFldid == "benefits" ||
                        $v->summaryFldid == "peme" ||
                        $v->summaryFldid == "gop" ||
                        $v->summaryFldid == "entity" ||
                        $v->summaryFldid == "dept" ||
                        $v->summaryFldid == "cardissue" ||
                        $v->summaryFldid == "letterapp" ||
                        $v->summaryFldid == "confirmation" ||
                        $v->summaryFldid == "status" ||
                        $v->summaryFldid == "degree" ||
                        $v->summaryFldid == "field" ||
                        $v->summaryFldid == "supernme" ||
                        $v->summaryFldid == "workproj" ||
                        $v->summaryFldid == "chargproj"
                    ) {

                        $formArray[$v->summaryFldid] = $v->summaryFldNewVal;

                    } else if ($v->summaryFldid == "conexpiry") {

                        $formArray[$v->summaryFldid] = date('Y-m-d', strtotime($v->summaryNewVal));

                    } else if ($v->summaryFldid == "pic" || $v->summaryFldid == "doc") {


                    } else {

                        $formArray[$v->summaryFldid] = $v->summaryNewVal;

                    }

                    unset($formArray['results']);

                    $EditData = $Custom->Edit($formArray, 'id', $id, 'hr_employee');
                }
            }


            if (isset($_FILES["imgfile"]["name"])) {
                $config['upload_path'] = 'assets/emppic';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                //unlink('assets/emppic/' . $_FILES["pic"]["name"]);

                if (!$this->upload->do_upload('imgfile')) {
                    $file = null;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $file = 'assets/emppic/' . $data['upload_data']['file_name'];
                }

            }


            if (isset($_FILES["docfile"]["name"])) {
                $config2['upload_path'] = 'assets/docs';
                $config2['allowed_types'] = 'pdf';
                $config2['overwrite'] = TRUE;


                if (isset($_FILES["imgfile"]["name"])) {
                    $this->upload->initialize($config2);
                }


                $this->load->library('upload', $config2);

                //unlink('assets/docs/' . $_FILES["doc"]["name"]);


                if (!$this->upload->do_upload('docfile')) {
                    /*$error = array('error' => $this->upload->display_errors());
                    echo "<pre>";
                    print_r($error);*/
                    $file = null;
                } else {

                    $data = array('upload_data' => $this->upload->data());
                    $file = 'assets/docs/' . $data['upload_data']['file_name'];
                }
            }


            /*$trackarray = array("action" => "Add Employee -> Function: addRecord() ",
                "result" => $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");*/

        } else {
            $EditData = 3;
        }

        echo $EditData;
    }

    function AuditTrials()
    {
        $Custom = new Custom();

        //date_default_timezone_set('Asia/Karachi');
        $now = new DateTime();


        if (isset($_POST['results']) && $_POST['results'] != '') {
            foreach (json_decode($_POST['results']) as $k => $v) {

                $ins_data = array();
                $ins_data["FormID"] = $_SESSION['id'];
                $ins_data["VisitID"] = "0";
                $ins_data["FormName"] = "empentry";
                /*$ins_data["EntryDate"] = $now->format('Y-m-d');
                $ins_data["EntryTime"] = $now->format('H:i:s');*/
                $ins_data["EntryDate"] = date('Y-m-d');
                $ins_data["EntryTime"] = date('H:i:s');
                $ins_data["ComputerName"] = gethostname();
                $ins_data["LoginUserName"] = $_SESSION['login']['idUser'];
                $ins_data["Fieldid"] = $v->summaryFldid;
                $ins_data["FieldName"] = $v->summaryFldName;

                if ($v->summaryFldid == "ddlemptype" ||
                    $v->summaryFldid == "ddlcategory" ||
                    $v->summaryFldid == "ddlband" ||
                    $v->summaryFldid == "titdesi" ||
                    $v->summaryFldid == "ddlloc" ||
                    $v->summaryFldid == "ddlhardship" ||
                    $v->summaryFldid == "benefits" ||
                    $v->summaryFldid == "peme" ||
                    $v->summaryFldid == "gop" ||
                    $v->summaryFldid == "entity" ||
                    $v->summaryFldid == "dept" ||
                    $v->summaryFldid == "cardissue" ||
                    $v->summaryFldid == "letterapp" ||
                    $v->summaryFldid == "confirmation" ||
                    $v->summaryFldid == "status" ||
                    $v->summaryFldid == "degree" ||
                    $v->summaryFldid == "field" ||
                    $v->summaryFldid == "supernme"
                ) {
                    $ins_data["OldValue"] = $v->summaryFldOldVal;
                    $ins_data["NewValue"] = $v->summaryFldNewVal;
                } else {
                    $ins_data["OldValue"] = $v->summaryOldVal;
                    $ins_data["NewValue"] = $v->summaryNewVal;
                }

                $ins_data["effdt"] = date('Y-m-d', strtotime($v->SummaryEftDate));

                $InsertData = $Custom->Insert($ins_data, 'ID', 'hr_AuditTrials', 'N');
            }
        } else {
            echo 2;
        }


        //echo $olddata['cnicno'] . "<br>";
        //echo $newdata['cnicno'];

        /*if ($newdata["ddlemptype"] != $olddata["ddlemptype"]) {

            $effdt = date('d-m-Y', strtotime($newdata["dt_ddlemptype"]));

            $ins_data["FormID"] = $_SESSION['id'];
            $ins_data["VisitID"] = "0";
            $ins_data["FormName"] = "empentry";
            $ins_data["EntryDate"] = $now->format('Y-m-d');
            $ins_data["EntryTime"] = $now->format('H:i:s');
            $ins_data["ComputerName"] = gethostname();
            $ins_data["LoginUserName"] = $_SESSION['login']['idUser'];
            $ins_data["FieldName"] = "ddlemptype";
            $ins_data["OldValue"] = $olddata["ddlemptype"];
            $ins_data["NewValue"] = $newdata["ddlemptype"];
            $ins_data["effdt"] = $effdt;

            $InsertData = $Custom->Insert($ins_data, 'ID', 'tblAuditTrials', 'N');


        } else {

        }*/


        /*********** old code audit   ***/

//        foreach ($olddata as $k => $v) {
//            //echo $v;
//            //echo $k;
//
//            if ($k == "dob" || $k == "conexpiry" || $k == "rehiredt" || $k == "gopdt") {
//
//                $mydt = date('d-m-Y', strtotime($newdata[$k]));
//
//
//                if ($k == "dt_dob") {
//                    $effdt = date('d-m-Y', strtotime($newdata['dt_dob']));
//                }
//
//                if ($v != $mydt) {
//                    //echo $newdata[$k];
//
//                    $ins_data["FormID"] = $_SESSION['id'];
//                    $ins_data["VisitID"] = "0";
//                    $ins_data["FormName"] = "empentry";
//                    $ins_data["EntryDate"] = $now->format('Y-m-d');
//                    $ins_data["EntryTime"] = $now->format('H:i:s');
//                    $ins_data["ComputerName"] = gethostname();
//                    $ins_data["LoginUserName"] = $_SESSION['login']['idUser'];
//                    $ins_data["FieldName"] = $k;
//                    $ins_data["OldValue"] = $olddata[$k];
//                    $ins_data["NewValue"] = $mydt;
//                    $ins_data["effdt"] = $effdt;
//
//                    //$InsertData = $Custom->Insert($ins_data, 'ID', 'tblAuditTrials', 'N');
//                }
//
//            } else {
//                if ($k != "empno") {
//                    if ($olddata[$k] != $newdata[$k]) {
//                        //echo $newdata[$k];
//
//                        if ($newdata[$k] == "dt_ddlemptype") {
//                            $effdt = date('d-m-Y', strtotime($newdata['dt_ddlemptype']));
//                        }
//
//
//                        $ins_data["FormID"] = $_SESSION['id'];
//                        $ins_data["VisitID"] = "0";
//                        $ins_data["FormName"] = "empentry";
//                        $ins_data["EntryDate"] = $now->format('Y-m-d');
//                        $ins_data["EntryTime"] = $now->format('H:i:s');
//                        $ins_data["ComputerName"] = gethostname();
//                        $ins_data["LoginUserName"] = $_SESSION['login']['idUser'];
//                        $ins_data["FieldName"] = $k;
//                        $ins_data["OldValue"] = $olddata[$k];
//                        $ins_data["NewValue"] = $newdata[$k];
//                        $ins_data["effdt"] = $effdt;
//
//                        //$InsertData = $Custom->Insert($ins_data, 'ID', 'tblAuditTrials', 'N');
//
//                    }
//                }
//            }
//        }

        /*********** old code audit   ***/

    }

    function bulkupdate()
    {
        ob_end_clean();
        $flag = 0;
        $formArray = array();

        $olddata = array();


        foreach ($_POST as $k => $v) {
            if (!isset($v) || $v == '') {

                if (!isset($v) && $k === "workproj" || $v == '' && $k === "workproj" || $v == 'NULL' && $k === "workproj" || $v == 'undefined' && $k === "workproj" ||
                    !isset($v) && $k === "ddlloc" || $v == '' && $k === "ddlloc" || $v == 'NULL' && $k === "ddlloc" || $v == 'undefined' && $k === "ddlloc" ||
                    !isset($v) && $k === "supernme" || $v == '' && $k === "supernme" || $v == 'NULL' && $k === "supernme" || $v == 'undefined' && $k === "supernme" ||
                    !isset($v) && $k === "status" || $v == '' && $k === "status" || $v == 'NULL' && $k === "status" || $v == 'undefined' && $k === "status"
                ) {
                    $formArray[$k] = null;
                } else {
                    $flag = 1;
                    echo json_encode('Invalid ' . $k);
                    return false;
                }

            } else {

                if ($k === 'conexpiry' || $k === 'SummaryEftDate') {
                    $formArray[$k] = date('Y-m-d', strtotime($v));
                } else {
                    $formArray[$k] = $v;
                }
            }
        }


        /*print_r($formArray);
        die();*/


        if ($flag == 0) {

            $Custom = new Custom();
            $Mempmodel = new Mempmodel();

            //date_default_timezone_set('Asia/Karachi');


            //$olddata['results'] =  $Mempmodel->getEmployeeDataByEmpNo('111111');

            //print_r($olddata);
            //die();


            $this->AuditTrials_BulkUpd();


            if (isset($_POST['data']) && $_POST['data'] != '') {

                $js = json_decode($_POST['data']);

                //foreach (json_decode($_POST['data']) as $k => $v) {
                foreach ($js->results as $kk => $v) {


                    /*echo "<pre>";
                    echo print_r($v->summaryFldid);
                    echo "</pre>";
                    die();*/


                    if ($v->summaryFldid == "conexpiry") {
                        $formArray[$v->summaryFldid] = date('Y-m-d', strtotime($v->summaryVal));
                    } else {
                        $formArray[$v->summaryFldid] = $v->summaryVal;
                    }


                    /*$formArray['workproj'] = $v->summaryVal;
                    $formArray['ddlloc'] = $v->summaryVal;
                    $formArray['supernme'] = $v->summaryVal;
                    //$formArray['conexpiry'] = date('Y-d-m', $v[3]->summaryVal);
                    $formArray['conexpiry'] = date('Y-m-d', strtotime($v->summaryVal));
                    $formArray['status'] = $v->summaryVal;*/


                    unset($formArray['data']);


                    //echo $v[$v->empno]->empno;


                    //$formArray[$v->summaryFldid] = $v->summaryFldNewVal;

                    //$formArray[$v['summaryFldNewVal']] = $v['summaryFldNewVal'];
                    //$formArray["FieldName"] = $v['summaryFldName'];
                    //$formArray["OldValue"] = $v['summaryOldVal'];
                    //$formArray["NewValue"] = $v['summaryNewVal'];
                    //$formArray["effdt"] = date('Y-m-d', strtotime($v['SummaryEftDate']));


                    $EditData = $Custom->Edit($formArray, 'empno', $v->empno, 'hr_employee');

                    $_SESSION['id'] = '';
                }
            }

            /*echo "<pre>";
            echo print_r(json_decode($formArray['data']));
            echo "</pre>";*/


            /*$trackarray = array("action" => "Add Employee -> Function: addRecord() ",
                "result" => $InsertData, "PostData" => $formArray);
            $Custom->trackLogs($trackarray, "user_logs");*/

        } else {
            $EditData = 3;
        }


        echo $EditData;
    }

    function AuditTrials_BulkUpd()
    {
        $Custom = new Custom();

        //date_default_timezone_set('Asia/Karachi');


        /*echo "<pre>";
        echo print_r($_POST['data']);
        echo "</pre>";
        die();*/


        if (isset($_POST['data']) && $_POST['data'] != '') {

            $js = json_decode($_POST['data']);


            foreach ($js->results as $kk => $v) {

                $ins_data = array();
                $ins_data["FormID"] = $v->empno;
                $ins_data["VisitID"] = "0";
                $ins_data["FormName"] = "empentry";
                /*$ins_data["EntryDate"] = $now->format('Y-m-d');
                $ins_data["EntryTime"] = $now->format('H:i:s');*/
                $ins_data["EntryDate"] = date('Y-m-d');
                $ins_data["EntryTime"] = date('H:i:s');
                $ins_data["ComputerName"] = gethostname();
                $ins_data["LoginUserName"] = $_SESSION['login']['idUser'];
                $ins_data["Fieldid"] = $v->summaryFldid;
                $ins_data["FieldName"] = $v->summaryFldName;

                if ($v->summaryFldid == "conexpiry") {
                    $ins_data["OldValue"] = date('Y-m-d', strtotime($v->summaryOldVal));
                    $ins_data["NewValue"] = date('Y-m-d', strtotime($v->summaryVal));
                } else {
                    $ins_data["OldValue"] = $v->summaryOldVal;
                    $ins_data["NewValue"] = $v->summaryVal;
                }

                $ins_data["effdt"] = date('Y-m-d', strtotime($v->SummaryEftDate));
                $InsertData = $Custom->Insert($ins_data, 'id', 'hr_AuditTrials', 'N');
            }
        } else {
            echo 2;
        }
    }

    function addRecord_SaveDraft2()
    {
        ob_end_clean();

        $formArray = array();

        foreach ($_POST as $k => $v) {
            if (!isset($v) || $v == '') {

                $formArray[$k] = null;

            } else {
                /*if (($k == 'dob' && !isset($v) && $v == '') ||
                    ($k == 'rehiredt' && !isset($v) || $k == 'rehiredt' && $v == '') ||
                    ($k == 'conexpiry' && !isset($v) || $k == 'conexpiry' && $v == '') ||
                    ($k == 'gopdt' && !isset($v) || $k == 'gopdt' && $v == ''))*/

                if (($k == 'dob' || $k == 'rehiredt' || $k == 'conexpiry' || $k == 'gopdt') &&
                    isset($v) && $v != '') {

                    $formArray[$k] = date('Y-m-d', strtotime($v));

                } else if ($k == 'empname') {
                    $formArray[$k] = ucwords($v);
                } else if ($k == 'hiresalary') {
                    $formArray[$k] = $this->encrypt->encode($v);
                } else {
                    $formArray[$k] = $v;
                }
            }
        }


        //array_push($formArray, $_FILES["imgfile"]["name"], $_FILES["docfile"]["name"]);


        if (isset($_FILES["imgfile"]["name"])) {
            $formArray["pic"] = "assets/emppic/" . $_FILES["imgfile"]["name"];
        } else {
            if (!isset($formArray["pic"])) {
                $formArray["pic"] = null;
            }
        }


        if (isset($_FILES["docfile"]["name"])) {
            $formArray["doc"] = "assets/docs/" . $_FILES["docfile"]["name"];
        } else {
            if (!isset($formArray["doc"])) {
                $formArray["doc"] = null;
            }
        }


        $Custom = new Custom();


        if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

            $id = $_SESSION['id'];

            $this->AuditTrials();

            unset($formArray['results']);

            $InsertData = $Custom->Edit($formArray, 'id', $id, 'hr_employee');

            $_SESSION['id'] = '';

        } else {
            $InsertData = $Custom->Insert($formArray, 'id', 'hr_employee', 'N');
        }


        if (isset($_FILES["imgfile"]["name"])) {
            $config['upload_path'] = 'assets/emppic';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('imgfile')) {
                $file = null;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $file = 'assets/emppic/' . $data['upload_data']['file_name'];
            }

        }


        if (isset($_FILES["docfile"]["name"])) {
            $config2['upload_path'] = 'assets/docs';
            $config2['allowed_types'] = 'pdf';
            $config2['overwrite'] = TRUE;


            if (isset($_FILES["imgfile"]["name"])) {
                $this->upload->initialize($config2);
            }


            $this->load->library('upload', $config2);

            if (!$this->upload->do_upload('docfile')) {
                /*$error = array('error' => $this->upload->display_errors());
                echo "<pre>";
                print_r($error);*/
                $file = null;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $file = 'assets/docs/' . $data['upload_data']['file_name'];
            }
        }


        /*$trackarray = array("action" => "Add Employee -> Function: addRecord() ",
            "result" => $InsertData, "PostData" => $formArray);
        $Custom->trackLogs($trackarray, "user_logs");*/


        if ($InsertData) {
            $result = 1;
        } else {
            $result = 3;
        }

        echo $result;
    }
}
