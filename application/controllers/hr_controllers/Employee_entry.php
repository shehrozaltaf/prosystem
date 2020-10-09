<?php

defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();

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

    function index()
    {
        $data = array();

        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', uri_string());
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View Dashboard Users Page",
            "result" => "View Dashboard Users page. Fucntion: index()");
        $Custom->trackLogs($trackarray, "user_logs");

        $data['employeeType'] = $Custom->selectAllQuery('hr_emptype', 'id');
        $data['category'] = $Custom->selectAllQuery('hr_category', 'id');
        $data['qualification'] = $Custom->selectAllQuery('hr_qualification', 'id');
        $data['band'] = $Custom->selectAllQuery('hr_band', 'id');
        $data['designation'] = $Custom->selectAllQuery('hr_desig', 'id');
        $data['location'] = $Custom->selectAllQuery('hr_location', 'id');

        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/employee_entry', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    /*function getEmpType($table)
    {
        $MEmployeeEntry = new MEmployeeEntry();
        $employeeType = $MEmployeeEntry->getEmp$_POST($table);
        echo $employeeType;

        /*$html='';
        foreach ($employeeType as $v){
            $html.='<option value="'.$v->id.'">'.$v->emptype.'</option>';
        }
        echo $html;*/
    //}


    /*Setting Page, User Rights*/
    function getMenuData()
    {
        $this->load->model('msettings');
        $idGroup = $_SESSION['login']['idGroup'];
        $Menu = '';
        $Msetting = new MSettings();
        $getDataRights = $Msetting->getUserRights($idGroup, '1', '');
        if (isset($getDataRights) && count($getDataRights) >= 1) {

            $myresult = array();
            foreach ($getDataRights as $key => $value) {
                if (isset($value->idParent) && $value->idParent != '' && array_key_exists(strtolower($value->idParent), $myresult)) {
                    $mykey = strtolower($value->idParent);
                    $myresult[strtolower($mykey)]->myrow_options[] = $value;
                } else {
                    $mykey = strtolower($value->idPages);
                    $myresult[strtolower($mykey)] = $value;
                }
            }
            foreach ($myresult as $pages) {
                if ($pages->isParent == 1) {
                    $Menu .= '<li class=" nav-item   ' . $pages->menuClass . ' has-sub">
                                      <a href="javascript:void(0)"> 
                                         <i class="feather ' . $pages->menuIcon . '"></i>
                                          <span class="menu-title" data-i18n="' . $pages->pageName . '">' . $pages->pageName . '</span>
                                       </a>
                                       <ul class="menu-content"> ';
                    if (isset($pages->myrow_options) && $pages->myrow_options != '') {
                        foreach ($pages->myrow_options as $options) {
                            $Menu .= ' <li class="' . $options->menuClass . '">
                                        <a href="' . base_url('index.php/' . $options->pageUrl) . '">
                                            <i class="feather ' . $options->menuIcon . '"></i>
                                            <span class="menu-item" data-i18n="' . $options->pageName . '">' . $options->pageName . '</span> 
                                        </a>
                                      </li>';
                        }
                    }
                    $Menu .= ' </ul></li>';
                } else {
                    $Menu .= '<li class=" nav-item ' . $pages->menuClass . '">
                                    <a href="' . base_url('index.php/' . $pages->pageUrl) . '" class="">
                                        <i class="feather ' . $pages->menuIcon . '"></i>
                                        <span class="menu-title" data-i18n="' . $pages->pageName . '">' . $pages->pageName . '</span>
                                    </a>
                              </li>';
                }
            }
        } else {
            $Menu = '';
        }
        $Menu .= ' <li class=" nav-item">
                <a href="javascript:void(0)" onclick="logout()">
                    <i class="feather icon-power"></i>
                    <span class="menu-title" data-i18n="Logout">Logout</span>
                </a>
            </li>';
        echo $Menu;
    }


    function addRecord()
    {
        ob_end_clean();
        $flag = 0;
        $formArray = array();

        foreach ($_POST as $k => $v) {
            if (!isset($v) || $v == '') {

                if (!isset($v) && $k === "cellno2" || $v == '' && $k === "cellno2" ||
                    !isset($v) && $k === "remarks" || $v == '' && $k === "remarks" ||
                    !isset($v) && $k === "landlineccode" || $v == '' && $k === "landlineccode" || $v == 'NULL' && $k === "landlineccode" || $v == 'undefined' && $k === "landlineccode" ||
                    !isset($v) && $k === "cellno1ccode" || $v == '' && $k === "cellno1ccode" || $v == 'NULL' && $k === "cellno1ccode" || $v == 'undefined' && $k === "cellno1ccode" ||
                    !isset($v) && $k === "cellno2ccode" || $v == '' && $k === "cellno2ccode" || $v == 'NULL' && $k === "cellno2ccode" || $v == 'undefined' && $k === "cellno2ccode" ||
                    !isset($v) && $k === "emcellnoccode" || $v == '' && $k === "emcellnoccode" || $v == 'NULL' && $k === "emcellnoccode" || $v == 'undefined' && $k === "emcellnoccode" ||
                    !isset($v) && $k === "emlandnoccode" || $v == '' && $k === "emlandnoccode" || $v == 'NULL' && $k === "emlandnoccode" || $v == 'undefined' && $k === "emlandnoccode"
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
                } else {
                    $formArray[$k] = $v;
                }
            }
        }


        if ($flag == 0) {

            $Custom = new Custom();


            /*$formArray['ddlemptype'] = $_POST['ddlemptype'];
            $formArray['ddlcategory'] = $_POST['ddlcategory'];
            $formArray['empno'] = $_POST['empno'];
            $formArray['empname'] = $_POST['empname'];
            $formArray['cnicno'] = $_POST['cnicno'];
            $formArray['dob'] = date('Y-m-d', $_POST['dob']);
            $formArray['qual'] = $_POST['qual'];
            $formArray['landline'] = $_POST['landline'];
            $formArray['cellno1'] = $_POST['cellno1'];
            $formArray['personnme'] = $_POST['personnme'];
            $formArray['emcellno'] = $_POST['emcellno'];
            $formArray['emlandno'] = $_POST['emlandno'];
            $formArray['resaddr'] = $_POST['resaddr'];
            $formArray['gncno'] = $_POST['gncno'];
            $formArray['ddlband'] = $_POST['ddlband'];
            $formArray['titdesi'] = $_POST['titdesi'];
            $formArray['rehiredt'] = date('Y-m-d', $_POST['rehiredt']);
            $formArray['conexpiry'] = date('Y-m-d', $_POST['conexpiry']);
            $formArray['workproj'] = $_POST['workproj'];
            $formArray['chargproj'] = $_POST['chargproj'];
            $formArray['ddlloc'] = $_POST['ddlloc'];
            $formArray['supernme'] = $_POST['supernme'];
            $formArray['hiresalary'] = $_POST['hiresalary'];
            $formArray['ddlhardship'] = $_POST['ddlhardship'];
            $formArray['amount'] = $_POST['amount'];
            $formArray['benefits'] = $_POST['benefits'];
            $formArray['peme'] = $_POST['peme'];
            $formArray['gop'] = $_POST['gop'];
            $formArray['gopdt'] = date('m-d-Y', strtotime($_POST['gopdt']));
            $formArray['cardissue'] = $_POST['cardissue'];
            $formArray['letterapp'] = $_POST['letterapp'];
            $formArray['confirmation'] = $_POST['confirmation'];
            $formArray['status'] = $_POST['status'];*/


            /*if (isset($_POST['cellno2']) && $_POST['cellno2'] == '') {
                $formArray['cellno2'] = null;
            } else {
                $formArray['cellno2'] = $_POST['cellno2'];
            }*/


            /*if (isset($_POST['remarks']) && $_POST['remarks'] == '') {
                $formArray['remarks'] = null;
            } else {
                $formArray['remarks'] = $_POST['remarks'];
            }*/


            /*$formArray['pic'] = $_POST['pic'];
            $formArray['doc'] = $_POST['doc'];*/


            //array_push($formArray, $_FILES["pic"]["name"], $_FILES["doc"]["name"]);

            //echo var_dump($_FILES);

            //die();


            if (isset($_FILES["imgfile"]["name"])) {
                $formArray["pic"] = "assets/emppic/" . $_FILES["imgfile"]["name"];
            } else {
                $formArray["pic"] = null;
            }


            if (isset($_FILES["docfile"]["name"])) {
                $formArray["doc"] = "assets/docs/" . $_FILES["docfile"]["name"];
            } else {
                $formArray["doc"] = null;
            }


            if (isset($_SESSION['login']['idUser'])) {
                $formArray["userid"] = $_SESSION['login']['idUser'];
            } else {
                $formArray["userid"] = null;
            }


            date_default_timezone_set('Asia/Karachi');

            $now = new DateTime();
            $formArray["entrydate"] = $now->format('Y-m-d H:i:s');


            $InsertData = $Custom->Insert($formArray, 'id', 'employee', 'N');


            if (isset($_FILES["imgfile"]["name"])) {
                $config['upload_path'] = 'assets/emppic';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';

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
                $this->upload->initialize($config2);
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

        } else {
            $InsertData = 3;
        }

        echo $InsertData;
    }


    function editRecord()
    {
        ob_end_clean();
        $flag = 0;
        $formArray = array();


        foreach ($_POST as $k => $v) {
            if (!isset($v) || $v == '') {

                if (!isset($v) && $k === "cellno2" || $v == '' && $k === "cellno2" ||
                    !isset($v) && $k === "remarks" || $v == '' && $k === "remarks" ||
                    !isset($v) && $k === "landlineccode" || $v == '' && $k === "landlineccode" || $v == 'NULL' && $k === "landlineccode" || $v == 'undefined' && $k === "landlineccode" ||
                    !isset($v) && $k === "cellno1ccode" || $v == '' && $k === "cellno1ccode" || $v == 'NULL' && $k === "cellno1ccode" || $v == 'undefined' && $k === "cellno1ccode" ||
                    !isset($v) && $k === "cellno2ccode" || $v == '' && $k === "cellno2ccode" || $v == 'NULL' && $k === "cellno2ccode" || $v == 'undefined' && $k === "cellno2ccode" ||
                    !isset($v) && $k === "emcellnoccode" || $v == '' && $k === "emcellnoccode" || $v == 'NULL' && $k === "emcellnoccode" || $v == 'undefined' && $k === "emcellnoccode" ||
                    !isset($v) && $k === "emlandnoccode" || $v == '' && $k === "emlandnoccode" || $v == 'NULL' && $k === "emlandnoccode" || $v == 'undefined' && $k === "emlandnoccode" ||

                    !isset($v) && $k === "dt_ddlemptype" || $v == '' && $k === "dt_ddlemptype" || $v == 'NULL' && $k === "dt_ddlemptype" || $v == 'undefined' && $k === "dt_ddlemptype" ||
                    !isset($v) && $k === "dt_dob" || $v == '' && $k === "dt_dob" || $v == 'NULL' && $k === "dt_dob" || $v == 'undefined' && $k === "dt_dob"
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
                } else {
                    $formArray[$k] = $v;
                }
            }
        }


        if ($flag == 0) {

            $Custom = new Custom();


            /*$formArray['ddlemptype'] = $_POST['ddlemptype'];
            $formArray['ddlcategory'] = $_POST['ddlcategory'];
            $formArray['empno'] = $_POST['empno'];
            $formArray['empname'] = $_POST['empname'];
            $formArray['cnicno'] = $_POST['cnicno'];
            $formArray['dob'] = date('Y-m-d', $_POST['dob']);
            $formArray['qual'] = $_POST['qual'];
            $formArray['landline'] = $_POST['landline'];
            $formArray['cellno1'] = $_POST['cellno1'];
            $formArray['personnme'] = $_POST['personnme'];
            $formArray['emcellno'] = $_POST['emcellno'];
            $formArray['emlandno'] = $_POST['emlandno'];
            $formArray['resaddr'] = $_POST['resaddr'];
            $formArray['gncno'] = $_POST['gncno'];
            $formArray['ddlband'] = $_POST['ddlband'];
            $formArray['titdesi'] = $_POST['titdesi'];
            $formArray['rehiredt'] = date('Y-m-d', $_POST['rehiredt']);
            $formArray['conexpiry'] = date('Y-m-d', $_POST['conexpiry']);
            $formArray['workproj'] = $_POST['workproj'];
            $formArray['chargproj'] = $_POST['chargproj'];
            $formArray['ddlloc'] = $_POST['ddlloc'];
            $formArray['supernme'] = $_POST['supernme'];
            $formArray['hiresalary'] = $_POST['hiresalary'];
            $formArray['ddlhardship'] = $_POST['ddlhardship'];
            $formArray['amount'] = $_POST['amount'];
            $formArray['benefits'] = $_POST['benefits'];
            $formArray['peme'] = $_POST['peme'];
            $formArray['gop'] = $_POST['gop'];
            $formArray['gopdt'] = date('m-d-Y', strtotime($_POST['gopdt']));
            $formArray['cardissue'] = $_POST['cardissue'];
            $formArray['letterapp'] = $_POST['letterapp'];
            $formArray['confirmation'] = $_POST['confirmation'];
            $formArray['status'] = $_POST['status'];*/


            /*if (isset($_POST['cellno2']) && $_POST['cellno2'] == '') {
                $formArray['cellno2'] = null;
            } else {
                $formArray['cellno2'] = $_POST['cellno2'];
            }*/


            /*if (isset($_POST['remarks']) && $_POST['remarks'] == '') {
                $formArray['remarks'] = null;
            } else {
                $formArray['remarks'] = $_POST['remarks'];
            }*/


            /*$formArray['pic'] = $_POST['pic'];
            $formArray['doc'] = $_POST['doc'];*/


            //array_push($formArray, $_FILES["pic"]["name"], $_FILES["doc"]["name"]);

            //echo var_dump($_FILES);
            //die();


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


            date_default_timezone_set('Asia/Karachi');


            $now = new DateTime();
            $formArray["entrydate"] = $now->format('Y-m-d H:i:s');


            $id = $_SESSION['id'];

            $Mempmdel = new Mempmodel();

            $old_data = $Mempmdel->getEmployeeData($id);

            $this->AuditTrials();


            if (isset($_POST['results'])) {
                foreach ($_POST['results'] as $v) {

                    if ($v['summaryFldid'] == "qual" ||
                        $v['summaryFldid'] == "ddlemptype" ||
                        $v['summaryFldid'] == "ddlcategory" ||
                        $v['summaryFldid'] == "ddlband" ||
                        $v['summaryFldid'] == "titdesi" ||
                        $v['summaryFldid'] == "ddlloc" ||
                        $v['summaryFldid'] == "ddlhardship" ||
                        $v['summaryFldid'] == "benefits" ||
                        $v['summaryFldid'] == "peme" ||
                        $v['summaryFldid'] == "gop" ||
                        $v['summaryFldid'] == "entity" ||
                        $v['summaryFldid'] == "dept" ||
                        $v['summaryFldid'] == "cardissue" ||
                        $v['summaryFldid'] == "letterapp" ||
                        $v['summaryFldid'] == "confirmation" ||
                        $v['summaryFldid'] == "status"
                    ) {

                        $formArray[$v['summaryFldid']] = $v['summaryFldNewVal'];
                    } else {
                        $formArray[$v['summaryFldid']] = $v['summaryNewVal'];
                    }


                    //$formArray[$v['summaryFldNewVal']] = $v['summaryFldNewVal'];
                    //$formArray["FieldName"] = $v['summaryFldName'];
                    //$formArray["OldValue"] = $v['summaryOldVal'];
                    //$formArray["NewValue"] = $v['summaryNewVal'];
                    //$formArray["effdt"] = date('Y-m-d', strtotime($v['SummaryEftDate']));

                    unset($formArray['results']);

                    $EditData = $Custom->Edit($formArray, 'id', $id, 'employee');
                }
            }


            if (isset($_FILES["imgfile"]["name"])) {
                $config['upload_path'] = 'assets/emppic';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';

                $this->load->library('upload', $config);

                unlink('assets/emppic/' . $_FILES["imgfile"]["name"]);

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


                $this->upload->initialize($config2);
                $this->load->library('upload', $config2);

                unlink('assets/docs/' . $_FILES["docfile"]["name"]);


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

        date_default_timezone_set('Asia/Karachi');
        $now = new DateTime();


        if (isset($_POST['results']) && $_POST['results'] != '') {
            foreach ($_POST['results'] as $k => $v) {

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
                $ins_data["Fieldid"] = $v['summaryFldid'];
                $ins_data["FieldName"] = $v['summaryFldName'];

                if ($v['summaryFldid'] == "qual" ||
                    $v['summaryFldid'] == "ddlemptype" ||
                    $v['summaryFldid'] == "ddlcategory" ||
                    $v['summaryFldid'] == "ddlband" ||
                    $v['summaryFldid'] == "titdesi" ||
                    $v['summaryFldid'] == "ddlloc" ||
                    $v['summaryFldid'] == "ddlhardship" ||
                    $v['summaryFldid'] == "benefits" ||
                    $v['summaryFldid'] == "peme" ||
                    $v['summaryFldid'] == "gop" ||
                    $v['summaryFldid'] == "entity" ||
                    $v['summaryFldid'] == "dept" ||
                    $v['summaryFldid'] == "cardissue" ||
                    $v['summaryFldid'] == "letterapp" ||
                    $v['summaryFldid'] == "confirmation" ||
                    $v['summaryFldid'] == "status"
                ) {
                    $ins_data["OldValue"] = $v['summaryFldOldVal'];
                    $ins_data["NewValue"] = $v['summaryFldNewVal'];
                } else {
                    $ins_data["OldValue"] = $v['summaryOldVal'];
                    $ins_data["NewValue"] = $v['summaryNewVal'];
                }

                $ins_data["effdt"] = date('Y-m-d', strtotime($v['SummaryEftDate']));

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


    function addRecord_SaveDraft()
    {
        ob_end_clean();

        $formArray = array();
        foreach ($_POST as $k => $v) {
            if (!isset($v) || $v == '') {

                $formArray[$k] = null;

            } else {

                if ($k === 'dob' && !isset($v) || $k === 'dob' && $v == '' ||
                    $k === 'rehiredt' && !isset($v) || $k === 'rehiredt' && $v == '' ||
                    $k === 'conexpiry' && !isset($v) || $k === 'conexpiry' && $v == '' ||
                    $k === 'gopdt' && !isset($v) || $k === 'gopdt' && $v == '') {

                    $formArray[$k] = date('Y-m-d', strtotime($v));

                } else {

                    $formArray[$k] = $v;

                }
            }
        }

        //array_push($formArray, $_FILES["imgfile"]["name"], $_FILES["docfile"]["name"]);


        $formArray["pic"] = $_FILES["imgfile"]["name"];
        $formArray["doc"] = $_FILES["docfile"]["name"];


        $Custom = new Custom();
        $InsertData = $Custom->Insert($formArray, 'id', 'employee', 'N');


        if (isset($_FILES["imgfile"]["name"])) {
            $config['upload_path'] = 'assets/emppic';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';

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
            $this->upload->initialize($config2);
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


    public function upload()
    {
        if (isset($_FILES["file"]["name"])) {
            $config['upload_path'] = 'assets/emppic';
            $config['allowed_types'] = 'jpg|jpeg|gif|png|pdf|xls|xlsx|csv|doc|docx|txt|rar|zip';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                $file = '';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $file = 'assets/emppic/' . $data['upload_data']['file_name'];
            }


            /*if ($this->upload->do_upload("pic")) {

                echo "2";

                $data = array('upload_data' => $this->upload->data());

                echo "3";

                //$title = $this->input->post('title');
                //$image = $error['upload_data']['pic'];

                //$error = $this->upload_model->save_upload($title, $image);

                //echo json_encode($data);

            } else {
                $error = array('error1' => $this->upload->display_errors());

                echo "4";
                exit();

                //echo json_encode($error);
            }*/

        }
    }


    public function getEmployeeEdit($id)
    {
        $Custom = new Custom();

        $data['employeeType'] = $Custom->selectAllQuery('hr_emptype', 'id');
        $data['category'] = $Custom->selectAllQuery('hr_category', 'id');
        $data['qualification'] = $Custom->selectAllQuery('hr_qualification', 'id');
        $data['band'] = $Custom->selectAllQuery('hr_band', 'id');
        $data['designation'] = $Custom->selectAllQuery('hr_desig', 'id');
        $data['location'] = $Custom->selectAllQuery('hr_location', 'id');


        $Mempmdel = new Mempmodel();

        $data['editemp'] = $Mempmdel->getDataFromTableByID($id, 'hr_employee');


        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/employee_entry', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');

        //echo json_encode($data, true);
    }

    public function getSupervisorName($supernme)
    {

        $Mempmdel = new Mempmodel();

        $data['datasuper'] = $Mempmdel->getSupervisorName($supernme, 'hr_employee');


        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('hr_views/employee_entry', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');

        //echo json_encode($data, true);
    }

}