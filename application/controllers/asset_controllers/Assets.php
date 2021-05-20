<?php defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '512M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
ini_set('sqlsrv.ClientBufferMaxKBSize', '524288'); // Setting to 512M
ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');
ini_set('max_input_vars', '1000000');

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
        $MSettings = new MSettings();
        $permission = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'asset_controllers/Assets');

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
        $searchData['area'] = (isset($_REQUEST['area']) && $_REQUEST['area'] != '' && $_REQUEST['area'] != '0' ? $_REQUEST['area'] : 0);
        $searchData['verification_status'] = (isset($_REQUEST['verification_status']) && $_REQUEST['verification_status'] != '' && $_REQUEST['verification_status'] != '0' ? $_REQUEST['verification_status'] : 0);
        $searchData['status'] = (isset($_REQUEST['status']) && $_REQUEST['status'] != '' && $_REQUEST['status'] != '0' ? $_REQUEST['status'] : 0);
        $searchData['tag_pr'] = (isset($_REQUEST['tag_pr']) && $_REQUEST['tag_pr'] != '' && $_REQUEST['tag_pr'] != '0' ? $_REQUEST['tag_pr'] : 0);
        $searchData['idAsset'] = (isset($_REQUEST['idAsset']) && $_REQUEST['idAsset'] != '' && $_REQUEST['idAsset'] != '0' ? $_REQUEST['idAsset'] : 0);
        $searchData['writeOffNo'] = (isset($_REQUEST['writeOffNo']) && $_REQUEST['writeOffNo'] != '' && $_REQUEST['writeOffNo'] != '0' ? $_REQUEST['writeOffNo'] : 0);
        $searchData['dateTo'] = (isset($_REQUEST['dateTo']) && $_REQUEST['dateTo'] != '' ? $_REQUEST['dateTo'] : 0);
        $searchData['dateFrom'] = (isset($_REQUEST['dateFrom']) && $_REQUEST['dateFrom'] != '' ? $_REQUEST['dateFrom'] : 0);
        $searchData['start'] = (isset($_REQUEST['start']) && $_REQUEST['start'] != '' && $_REQUEST['start'] != 0 ? $_REQUEST['start'] : 0);
        $searchData['length'] = (isset($_REQUEST['length']) && $_REQUEST['length'] != '' ? $_REQUEST['length'] : '');
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
            $table_data[$value->idAsset]['pr_no'] = $value->pr_no;
            $table_data[$value->idAsset]['model'] = $value->model;
            $table_data[$value->idAsset]['product_no'] = $value->product_no;
            $table_data[$value->idAsset]['gri_no'] = $value->gri_no;
            $table_data[$value->idAsset]['serial_no'] = $value->serial_no;
            $table_data[$value->idAsset]['po_no'] = $value->po_no;
            $table_data[$value->idAsset]['cost'] = $value->cost;
            $table_data[$value->idAsset]['idCurrency'] = $value->currency;
            $table_data[$value->idAsset]['idSourceOfPurchase'] = $value->idSourceOfPurchase;
            $table_data[$value->idAsset]['sopName'] = $value->sopName;
            $table_data[$value->idAsset]['resp_person_name'] = $value->resp_person_name;
            $table_data[$value->idAsset]['res_person_empname'] = $value->resp_person_name . ' - ' . $value->res_person_empname;
            $table_data[$value->idAsset]['ou'] = $value->ou;
            $table_data[$value->idAsset]['account'] = $value->account;
            $table_data[$value->idAsset]['dept'] = $value->dept;
            $table_data[$value->idAsset]['fund'] = $value->fund;
            $table_data[$value->idAsset]['prog'] = $value->prog;
            $table_data[$value->idAsset]['area'] = $value->area;
            $table_data[$value->idAsset]['verification_status'] = $value->verification_status;
            $table_data[$value->idAsset]['last_verify_date'] = (isset($value->last_verify_date) && $value->last_verify_date != '' ? date('d/m/y', strtotime($value->last_verify_date)) : '-');
            $table_data[$value->idAsset]['due_date'] = (isset($value->due_date) && $value->due_date != '' ? date('d/m/y', strtotime($value->due_date)) : '-');
            $table_data[$value->idAsset]['pur_date'] = (isset($value->pur_date) && $value->pur_date != '' ? date('d/m/y', strtotime($value->pur_date)) : '-');
            $table_data[$value->idAsset]['writOff_formNo'] = $value->writOff_formNo;
            $table_data[$value->idAsset]['wo_date'] = (isset($value->wo_date) && $value->wo_date != '' ? date('d/m/y', strtotime($value->wo_date)) : '-');
            $table_data[$value->idAsset]['remarks'] = $value->remarks;
            $table_data[$value->idAsset]['category'] = $value->category;
            $table_data[$value->idAsset]['desc'] = $value->description;
            $table_data[$value->idAsset]['tag'] = $value->tag_no;
            $table_data[$value->idAsset]['emp'] = '<a href="' . base_url() . 'index.php/hr_controllers/searchemployee/EmpDetail?emp=' . $value->emp_no . '"  target="_blank">' . $value->emp_no . ' - ' . $value->empname . '</a>';
            $table_data[$value->idAsset]['proj'] = $value->proj_code . ' - ' . $value->proj_name;
            $table_data[$value->idAsset]['loc'] = $value->location;
            $table_data[$value->idAsset]['sub_loc'] = $value->location_sub;
            $table_data[$value->idAsset]['status'] = '<span class="label mystatus btn btn-sm btn-' . $statusClass . ' waves-effect waves-light" 
             onclick="changeStatus(this)" data-id="' . $value->idAsset . '" data-status="' . $value->status . '"  data-status_name="' . $value->status_name . '">' . $value->status_name . '</span>';
            $table_data[$value->idAsset]['pr_path'] = $value->pr_path;

            $searchdata_docs = array();
            $searchdata_docs['idAsset'] = $value->idAsset;
            $docs = $M->getAssetDocsByIdAsset($searchdata_docs);
            $table_data[$value->idAsset]['document'] = (isset($docs[0]->docPath) && $docs[0]->docPath != '' ?
                '<a data-ur="' . base_url($docs[0]->docPath) . '" href="' . base_url() . 'index.php/OpenFile?a=' . $value->idAsset . '&doc=' . $docs[0]->docName . '"
                 target="_blank">' . $docs[0]->docName . '</a>' : '');

            if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) {
                $edit = '<a href="' . base_url('index.php/asset_controllers/Assets/editAsset?a=' . $value->idAsset) . '"  target="_blank" title="Asset Edit" data-id="' . $value->idAsset . '">
                             <i class="feather icon-edit" ></i> 
                       </a> ';
            } else {
                $edit = '';
            }

            if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) {
                $delete = '<a href="javascript:void(0)" onclick="getDelete(this)" data-id="' . $value->idAsset . '">
                                <i class="feather icon-trash"></i>
                            </a>';
            } else {
                $delete = '';
            }
            $table_data[$value->idAsset]['Action'] = '
                <a href="' . base_url('index.php/asset_controllers/Assets/assetDetail?a=' . $value->idAsset) . '"  target="_blank" title="Asset Details" data-id="' . $value->idAsset . '">
                        <i class="feather icon-eye" ></i> 
                </a> 
                
                  ' . $edit . $delete;

            $table_data[$value->idAsset]['check'] = '<input type="checkbox" class="checkboxes" 
                data-id="' . $value->idAsset . '"  
                data-oldval="' . $value->idAsset . '" 
                name="check_asset" 
                id="check_asset_' . $key . '"  value="1" 
                onclick="updBtnToggle()" />
                <a href="' . base_url('index.php/asset_controllers/Assets/assetDetail?a=' . $value->idAsset) . '"  target="_blank" title="Asset Details" data-id="' . $value->idAsset . '">
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

        $totalsearchData['project'] = $searchData['project'];
        $totalsearchData['emp'] = $searchData['emp'];
        $totalsearchData['category'] = $searchData['category'];
        $totalsearchData['sop'] = $searchData['sop'];
        $totalsearchData['idLocation'] = $searchData['idLocation'];
        $totalsearchData['idSubLocation'] = $searchData['idSubLocation'];
        $totalsearchData['area'] = $searchData['area'];
        $totalsearchData['status'] = $searchData['status'];
        $totalsearchData['verification_status'] = $searchData['verification_status'];
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
            $editArr['writOff_formNo'] = (isset($_POST['writOff_formNo']) && $_POST['writOff_formNo'] != '' ? $_POST['writOff_formNo'] : '');
            $editArr['wo_date'] = (isset($_POST['wo_date']) && $_POST['wo_date'] != '' ? date('Y-m-d', strtotime($_POST['wo_date'])) : '');
            $editArr['statusChangedBy'] = $_SESSION['login']['idUser'];
            $editArr['statusDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArr, 'idAsset', $id, 'a_asset');
            $trackarray = array("action" => "Status asset -> Function: changeStatus() ",
                "result" => $editData, "PostData" => $editArr);
            $Custom->trackLogs($trackarray, "user_logs");
            if ($editData) {
                $result = 1;
                if (isset($_FILES['status_doc']['name']) && $_FILES['status_doc']['name'] != '') {
                    $upload_location = ASSET_LOC . $id . '/';
                    if (!is_dir($upload_location)) {
                        mkdir($upload_location, 0777, TRUE);
                    }

                    $filename = $_FILES['status_doc']['name'];
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $valid_ext = array("png", "jpeg", "jpg", "doc", "docx", "pdf", "csv", "xls", "xlsx");
                    if (in_array($ext, $valid_ext)) {
                        $filename = $id . '_' . date('d_m_Y_H_i_s') . '.' . $ext;
                        $MAsset = new MAsset();
                        $newName = $MAsset->file_newname($upload_location, $filename);
                        $path = $upload_location . $newName;
                        if (move_uploaded_file($_FILES['status_doc']['tmp_name'], $path)) {
                            $files_arr[] = $path;
                            $fileUpload = array();
                            $fileUpload['idAsset'] = $id;
                            $fileUpload['docPath'] = $upload_location . $filename;
                            $fileUpload['docName'] = $filename;
                            $fileUpload['isActive'] = 1;
                            $fileUpload['createdBy'] = $_SESSION['login']['idUser'];
                            $fileUpload['createdDateTime'] = date('Y-m-d H:i:s');
                            $Custom->Insert($fileUpload, 'idAssetImage', 'a_asset_docs', 'N');
                            $result = 1;
                        } else {
                            $result = 5;
                        }
                    } else {
                        $result = 4;
                    }
                }

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
            $audit = array();
            $asset_audit = $M->getAuditTrialById($searchData);
            foreach ($asset_audit as $k => $a) {
                $audit[$a->FormName][] = $a;
            }
            $data['asset_audit'] = $audit;
            $data['all_audit'] = $asset_audit;
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
        if (isset($_POST['emp_no']) && $_POST['emp_no'] != '') {
            $editArr['emp_no'] = $_POST['emp_no'];
        }
        if (isset($_POST['resp_person_name']) && $_POST['resp_person_name'] != '') {
            $editArr['resp_person_name'] = $_POST['resp_person_name'];
        }
        if (isset($_POST['verification_status']) && $_POST['verification_status'] != '') {
            $editArr['verification_status'] = $_POST['verification_status'];
        }
        if (isset($_POST['last_verify_date']) && $_POST['last_verify_date'] != '') {
            $editArr['last_verify_date'] = date('Y-m-d', strtotime($_POST['last_verify_date']));
        }
        if (isset($_POST['due_date']) && $_POST['due_date'] != '') {
            $editArr['due_date'] = date('Y-m-d', strtotime($_POST['due_date']));
        }
        if (isset($_POST['area']) && $_POST['area'] != '') {
            $editArr['area'] = $_POST['area'];
        }
        $Custom = new Custom();
        if (isset($_POST['assets']) && $_POST['assets'] != '' && count($_POST['assets']) >= 1) {
            $MAsset = new MAsset();
            foreach ($_POST['assets'] as $asset) {
                $searchdata = array();
                $searchdata['idAsset'] = $asset;
                $asset_data = $MAsset->getAssetById($searchdata);
                $editData = $Custom->Edit($editArr, 'idAsset', $asset, 'a_asset');

                if ($editData) {
                    foreach ($editArr as $ek => $e) {
                        foreach ($asset_data[0] as $k => $a) {
                            if (trim($ek) == trim($k) && $e != $a) {
                                $insertArray_at = array();
                                $insertArray_at['FormID'] = $asset;
                                $insertArray_at['FormName'] = $ek;
                                $insertArray_at['Fieldid'] = $ek;
                                $insertArray_at['FieldName'] = $ek;
                                $insertArray_at['OldValue'] = $a;
                                $insertArray_at['NewValue'] = $e;
                                $insertArray_at['isActive'] = 1;
                                $insertArray_at['createdBy'] = $_SESSION['login']['idUser'];
                                $insertArray_at['createdDateTime'] = date('Y-m-d H:i:s');
                                $InsertData_at = $Custom->Insert($insertArray_at, 'id', 'a_AuditTrials', 'N');
                            }
                        }
                    }
                    if ($InsertData_at) {
                        $result = 1;
                    } else {
                        $result = 4;
                    }
                } else {
                    $result = 2;
                }

            }


            /*if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }*/
        } else {
            $result = 3;
        }
        echo $result;

    }

    function bulkupdate2()
    {
        $at_array = array();
        $i = -1;
        $editArr = array();
        if (isset($_POST['status']) && $_POST['status'] != '') {
            $editArr['status'] = $_POST['status'];
            $i++;
            $at_array[$i]['FormName'] = 'Status';
            $at_array[$i]['Fieldid'] = 'status';
            $at_array[$i]['FieldName'] = 'Status';
            $at_array[$i]['NewValue'] = $editArr['status'];

        }
        if (isset($_POST['writOff_formNo']) && $_POST['writOff_formNo'] != '') {
            $editArr['writOff_formNo'] = $_POST['writOff_formNo'];
            $i++;
            $at_array[$i]['FormName'] = 'Writ Off Form';
            $at_array[$i]['Fieldid'] = 'writOff_formNo';
            $at_array[$i]['FieldName'] = 'Writ Off Form';
            $at_array[$i]['NewValue'] = $editArr['writOff_formNo'];
        }
        if (isset($_POST['wo_date']) && $_POST['wo_date'] != '') {
            $editArr['wo_date'] = $_POST['wo_date'];
            $i++;
            $at_array[$i]['FormName'] = 'Writ Off Date';
            $at_array[$i]['Fieldid'] = 'wo_date';
            $at_array[$i]['FieldName'] = 'Writ Off Date';
            $at_array[$i]['NewValue'] = $editArr['wo_date'];
        }
        if (isset($_POST['idLocation']) && $_POST['idLocation'] != '') {
            $editArr['idLocation'] = $_POST['idLocation'];
            $i++;
            $at_array[$i]['FormName'] = 'Location';
            $at_array[$i]['Fieldid'] = 'idLocation';
            $at_array[$i]['FieldName'] = 'Location';
            $at_array[$i]['NewValue'] = $editArr['idLocation'];
        }
        if (isset($_POST['idSubLocation']) && $_POST['idSubLocation'] != '') {
            $editArr['idSubLocation'] = $_POST['idSubLocation'];
            $i++;
            $at_array[$i]['FormName'] = 'Sub Location';
            $at_array[$i]['Fieldid'] = 'idSubLocation';
            $at_array[$i]['FieldName'] = 'Sub Location';
            $at_array[$i]['NewValue'] = $editArr['idSubLocation'];
        }
        if (isset($_POST['emp_no']) && $_POST['emp_no'] != '') {
            $editArr['emp_no'] = $_POST['emp_no'];
            $i++;
            $at_array[$i]['FormName'] = 'Employee';
            $at_array[$i]['Fieldid'] = 'emp_no';
            $at_array[$i]['FieldName'] = 'Employee';
            $at_array[$i]['NewValue'] = $editArr['emp_no'];
        }
        if (isset($_POST['resp_person_name']) && $_POST['resp_person_name'] != '') {
            $editArr['resp_person_name'] = $_POST['resp_person_name'];
            $i++;
            $at_array[$i]['FormName'] = 'Responsbile Person';
            $at_array[$i]['Fieldid'] = 'resp_person_name';
            $at_array[$i]['FieldName'] = 'Responsbile Person';
            $at_array[$i]['NewValue'] = $editArr['resp_person_name'];
        }
        if (isset($_POST['verification_status']) && $_POST['verification_status'] != '') {
            $editArr['verification_status'] = $_POST['verification_status'];
            $i++;
            $at_array[$i]['FormName'] = 'Vertification';
            $at_array[$i]['Fieldid'] = 'verification_status';
            $at_array[$i]['FieldName'] = 'Vertification';
            $at_array[$i]['OldValue'] = 'No value';
            $at_array[$i]['NewValue'] = $editArr['verification_status'];
        }
        if (isset($_POST['last_verify_date']) && $_POST['last_verify_date'] != '') {
            $editArr['last_verify_date'] = date('Y-m-d', strtotime($_POST['last_verify_date']));
            $i++;
            $at_array[$i]['FormName'] = 'Last Verification Date';
            $at_array[$i]['Fieldid'] = 'last_verify_date';
            $at_array[$i]['FieldName'] = 'Last Verification Date';
            $at_array[$i]['NewValue'] = $editArr['last_verify_date'];
        }
        if (isset($_POST['due_date']) && $_POST['due_date'] != '') {
            $editArr['due_date'] = date('Y-m-d', strtotime($_POST['due_date']));
            $i++;
            $at_array[$i]['FormName'] = 'Due Date';
            $at_array[$i]['Fieldid'] = 'due_date';
            $at_array[$i]['FieldName'] = 'Due Date';
            $at_array[$i]['NewValue'] = $editArr['due_date'];
        }
        if (isset($_POST['area']) && $_POST['area'] != '') {
            $editArr['area'] = $_POST['area'];
            $i++;
            $at_array[$i]['FormName'] = 'Area';
            $at_array[$i]['Fieldid'] = 'area';
            $at_array[$i]['FieldName'] = 'Area';
            $at_array[$i]['NewValue'] = $editArr['area'];
        }
        $Custom = new Custom();
        if (isset($_POST['assets']) && $_POST['assets'] != '' && count($_POST['assets']) >= 1) {
            foreach ($_POST['assets'] as $asset) {
                $editData = $Custom->Edit($editArr, 'idAsset', $asset, 'a_asset');
                if ($editData) {
                    foreach ($at_array as $at) {
                        $insertArray_at = array();
                        $insertArray_at['FormID'] = $asset;
                        $insertArray_at['FormName'] = $at['FormName'];
                        $insertArray_at['Fieldid'] = $at['Fieldid'];
                        $insertArray_at['FieldName'] = $at['FieldName'];
                        $insertArray_at['OldValue'] = $at['OldValue'];
                        $insertArray_at['NewValue'] = $at['NewValue'];
                        $insertArray_at['isActive'] = 1;
                        $insertArray_at['createdBy'] = $_SESSION['login']['idUser'];
                        $insertArray_at['createdDateTime'] = date('Y-m-d H:i:s');
                        $InsertData_at = $Custom->Insert($insertArray_at, 'id', 'a_AuditTrials', 'N');
                    }

                    if ($InsertData_at) {
                        $result = 1;
                    } else {
                        $result = 4;
                    }
                } else {
                    $result = 2;
                }

            }


            /*if ($editData) {
                $result = 1;
            } else {
                $result = 2;
            }*/
        } else {
            $result = 3;
        }
        echo $result;

    }

    function getPDF()
    {
        if (isset($_REQUEST['f']) && $_REQUEST['f'] != '' && $_REQUEST['f'] != 0) {
            $searchData = array();
            $searchData['project'] = (isset($_REQUEST['project']) && $_REQUEST['project'] != '' && $_REQUEST['project'] != '0' ? $_REQUEST['project'] : 0);
            $searchData['emp'] = (isset($_REQUEST['emp']) && $_REQUEST['emp'] != '' && $_REQUEST['emp'] != '0' ? $_REQUEST['emp'] : 0);
            $searchData['category'] = (isset($_REQUEST['category']) && $_REQUEST['category'] != '' && $_REQUEST['category'] != '0' ? $_REQUEST['category'] : 0);
            $searchData['sop'] = (isset($_REQUEST['sop']) && $_REQUEST['sop'] != '' && $_REQUEST['sop'] != '0' ? $_REQUEST['sop'] : 0);
            $searchData['idLocation'] = (isset($_REQUEST['location']) && $_REQUEST['location'] != '' && $_REQUEST['location'] != '0' ? $_REQUEST['location'] : 0);
            $searchData['idSubLocation'] = (isset($_REQUEST['sublocation']) && $_REQUEST['sublocation'] != '' && $_REQUEST['sublocation'] != '0' ? $_REQUEST['sublocation'] : 0);
            $searchData['area'] = (isset($_REQUEST['area']) && $_REQUEST['area'] != '' && $_REQUEST['area'] != '0' ? $_REQUEST['area'] : 0);
            $searchData['verification_status'] = (isset($_REQUEST['verification_status']) && $_REQUEST['verification_status'] != '' && $_REQUEST['verification_status'] != '0' ? $_REQUEST['verification_status'] : 0);
            $searchData['status'] = (isset($_REQUEST['status']) && $_REQUEST['status'] != '' && $_REQUEST['status'] != '0' ? $_REQUEST['status'] : 0);
            $searchData['tag_pr'] = (isset($_REQUEST['tag_pr']) && $_REQUEST['tag_pr'] != '' && $_REQUEST['tag_pr'] != '0' ? $_REQUEST['tag_pr'] : 0);
            $searchData['idAsset'] = (isset($_REQUEST['idAsset']) && $_REQUEST['idAsset'] != '' && $_REQUEST['idAsset'] != '0' ? $_REQUEST['idAsset'] : 0);
            $searchData['writeOffNo'] = (isset($_REQUEST['writeOffNo']) && $_REQUEST['writeOffNo'] != '' && $_REQUEST['writeOffNo'] != '0' ? $_REQUEST['writeOffNo'] : 0);
            $searchData['dateTo'] = (isset($_REQUEST['dateTo']) && $_REQUEST['dateTo'] != '' ? $_REQUEST['dateTo'] : 0);
            $searchData['dateFrom'] = (isset($_REQUEST['dateFrom']) && $_REQUEST['dateFrom'] != '' ? $_REQUEST['dateFrom'] : 0);
            $searchData['search'] = (isset($_REQUEST['search']) && $_REQUEST['search'] != '' ? $_REQUEST['search'] : '');
            $searchData['start'] = 0;
            $searchData['length'] = 50000;

            $M = new MAsset();
            $asset_data = $M->getAsset($searchData);
            $this->load->library('tcpdf');
            $project_name = 'Department of Paediatrics and Child Health';
            $short_title = ' Inventory (Capital Items)';
            $title = $project_name . $short_title;
            $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF - 8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('PRO System Inventory');
            $pdf->SetTitle($title);
            $pdf->SetSubject($title);
            $pdf->SetKeywords($title);
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetTopMargin(1);
            $pdf->setPrintHeader(false);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            if (@file_exists(dirname(__FILE__) . ' / lang / eng . php')) {
                require_once(dirname(__FILE__) . ' / lang / eng . php');
            }

            $pdf->setFontSubsetting(true);
            $pdf->SetFont('freeserif', '', 8);
            $style = "<style> 
                        h3{text-align: center; font-size: 16px;color: #002D57;}
                        h5{text-align: center; font-size: 13px;}  
                        th {font-weight: bold;} 
                     </style>";
            $Mainheader = "<div class='head'>
                                    <h3 class='mainheading'>" . $project_name . "</h3>
                                    <h5 class='subheading'>" . $short_title . "</h5>
                                    <h5 class='subheading'>" . date('M, Y') . "</h5>
                               </div>";
            $pdf->AddPage();
            $pdf->writeHTML($style . $Mainheader, true, false, true, false, 'centre');


            $tbl = '<table cellspacing="0" cellpadding="3" border="1">
                                            <tr align="center">
                                                <th width="4%">ID</th> 
                                                <th width="15%">Category</th> 
                                                <th width="15%">Description</th> 
                                                <th width="6%">Tag No</th> 
                                                <th width="7%">Emp No</th> 
                                                <th width="7%">Emp Name</th> 
                                                <th width="7%">Location</th> 
                                                <th width="7%">Sub Location</th> 
                                                <th width="7%">Area</th> 
                                                <th width="7%">Status</th> 
                                                <th width="7%">Verification Status [Y/N]</th> 
                                                <th width="11%">Remarks</th>  
                                            </tr> ';
            foreach ($asset_data as $data) {
                $tbl .= '<tr> 
                               <td> ' . (isset($data->idAsset) && $data->idAsset != '' ? $data->idAsset : '') . '</td> 
                               <td> ' . (isset($data->category) && $data->category != '' ? $data->category : '') . '</td> 
                               <td> ' . (isset($data->description) && $data->description != '' ? $data->description : '') . '</td> 
                               <td> ' . (isset($data->tag_no) && $data->tag_no != '' ? $data->tag_no : '') . '</td> 
                               <td> ' . (isset($data->emp_no) && $data->emp_no != '' ? $data->emp_no : '') . '</td> 
                               <td> ' . (isset($data->empname) && $data->empname != '' ? $data->empname : '') . '</td> 
                               <td> ' . (isset($data->location) && $data->location != '' ? $data->location : '') . '</td> 
                               <td> ' . (isset($data->location_sub) && $data->location_sub != '' ? $data->location_sub : '') . '</td> 
                               <td> ' . (isset($data->area) && $data->area != '' ? $data->area : '') . '</td> 
                               <td> ' . (isset($data->status_name) && $data->status_name != '' ? $data->status_name : '') . '</td> 
                               <td> </td> 
                               <td> </td> 
                          </tr> ';
            }
            $tbl .= '</table>';
            $pdf->writeHTML($style . $tbl, true, false, true, true, '');
            ob_end_clean();
            $pdf->Output('pro_asset.pdf', 'I');
        } else {
            echo 'Invalid Asset, Please select Asset';
        }
    }

    function getExcel()
    {
        if (isset($_REQUEST['f']) && $_REQUEST['f'] != '' && $_REQUEST['f'] != 0) {
            ob_end_clean();
            $fileName = 'assets_pro_system_' . time() . '.xlsx';
            $this->load->library('excel');

            $searchData = array();
            $searchData['project'] = (isset($_REQUEST['project']) && $_REQUEST['project'] != '' && $_REQUEST['project'] != '0' ? $_REQUEST['project'] : 0);
            $searchData['emp'] = (isset($_REQUEST['emp']) && $_REQUEST['emp'] != '' && $_REQUEST['emp'] != '0' ? $_REQUEST['emp'] : 0);
            $searchData['category'] = (isset($_REQUEST['category']) && $_REQUEST['category'] != '' && $_REQUEST['category'] != '0' ? $_REQUEST['category'] : 0);
            $searchData['sop'] = (isset($_REQUEST['sop']) && $_REQUEST['sop'] != '' && $_REQUEST['sop'] != '0' ? $_REQUEST['sop'] : 0);
            $searchData['idLocation'] = (isset($_REQUEST['location']) && $_REQUEST['location'] != '' && $_REQUEST['location'] != '0' ? $_REQUEST['location'] : 0);
            $searchData['idSubLocation'] = (isset($_REQUEST['sublocation']) && $_REQUEST['sublocation'] != '' && $_REQUEST['sublocation'] != '0' ? $_REQUEST['sublocation'] : 0);
            $searchData['area'] = (isset($_REQUEST['area']) && $_REQUEST['area'] != '' && $_REQUEST['area'] != '0' ? $_REQUEST['area'] : 0);
            $searchData['verification_status'] = (isset($_REQUEST['verification_status']) && $_REQUEST['verification_status'] != '' && $_REQUEST['verification_status'] != '0' ? $_REQUEST['verification_status'] : 0);
            $searchData['status'] = (isset($_REQUEST['status']) && $_REQUEST['status'] != '' && $_REQUEST['status'] != '0' ? $_REQUEST['status'] : 0);
            $searchData['tag_pr'] = (isset($_REQUEST['tag_pr']) && $_REQUEST['tag_pr'] != '' && $_REQUEST['tag_pr'] != '0' ? $_REQUEST['tag_pr'] : 0);
            $searchData['idAsset'] = (isset($_REQUEST['idAsset']) && $_REQUEST['idAsset'] != '' && $_REQUEST['idAsset'] != '0' ? $_REQUEST['idAsset'] : 0);
            $searchData['writeOffNo'] = (isset($_REQUEST['writeOffNo']) && $_REQUEST['writeOffNo'] != '' && $_REQUEST['writeOffNo'] != '0' ? $_REQUEST['writeOffNo'] : 0);
            $searchData['dateTo'] = (isset($_REQUEST['dateTo']) && $_REQUEST['dateTo'] != '' ? $_REQUEST['dateTo'] : 0);
            $searchData['dateFrom'] = (isset($_REQUEST['dateFrom']) && $_REQUEST['dateFrom'] != '' ? $_REQUEST['dateFrom'] : 0);
            $searchData['search'] = (isset($_REQUEST['search']) && $_REQUEST['search'] != '' ? $_REQUEST['search'] : '');
            $searchData['start'] = 0;
            $searchData['length'] = 50000;

            $M = new MAsset();
            $asset_data = $M->getAsset($searchData);

            $objPHPExcel = new    PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'PAEDS ID');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Category');
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Description');
            $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Model');
            $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Product No');
            $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'GRI No');
            $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Serial No');
            $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Tag No');
            $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'PO No');
            $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Cost');
            $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Currency');
            $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Source Of Purchase');
            $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'PR No');
            $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Employee No');
            $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Employee Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Responsbile Person Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Proj Code');
            $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'OU');
            $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Account');
            $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Department');
            $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Fund');
            $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Prog');
            $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Location');
            $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Sub Location');
            $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Area');
            $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Verification Status');
            $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Last Verify Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Due Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Pur Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Status');
            $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'WritOff Form No');
            $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'WritOff Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Remarks');
            $objPHPExcel->getActiveSheet()->getStyle("A1:AAZ1")->getFont()->setBold(true);
            $rowCount = 1;
            foreach ($asset_data as $data) {
                $rowCount++;
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, (isset($data->idAsset) && $data->idAsset != '' ? $data->idAsset : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, (isset($data->category) && $data->category != '' ? $data->category : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, (isset($data->description) && $data->description != '' ? $data->description : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, (isset($data->model) && $data->model != '' ? $data->model : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, (isset($data->product_no) && $data->product_no != '' ? $data->product_no : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, (isset($data->gri_no) && $data->gri_no != '' ? $data->gri_no : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, (isset($data->serial_no) && $data->serial_no != '' ? $data->serial_no : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, (isset($data->tag_no) && $data->tag_no != '' ? $data->tag_no : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, (isset($data->po_no) && $data->po_no != '' ? $data->po_no : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, (isset($data->cost) && $data->cost != '' ? $data->cost : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, (isset($data->currency) && $data->currency != '' ? $data->currency : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, (isset($data->sopName) && $data->sopName != '' ? $data->sopName : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, (isset($data->pr_no) && $data->pr_no != '' ? $data->pr_no : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, (isset($data->emp_no) && $data->emp_no != '' ? $data->emp_no : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, (isset($data->empname) && $data->empname != '' ? $data->empname : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, (isset($data->resp_person_name) && $data->resp_person_name != '' ? $data->resp_person_name . ' - ' . (isset($data->res_person_empname) && $data->res_person_empname != '' ? $data->res_person_empname : '') : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, (isset($data->proj_code) && $data->proj_code != '' ? $data->proj_code : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, (isset($data->OU) && $data->OU != '' ? $data->OU : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, (isset($data->account) && $data->account != '' ? $data->account : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, (isset($data->dept) && $data->dept != '' ? $data->dept : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, (isset($data->fund) && $data->fund != '' ? $data->fund : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, (isset($data->prog) && $data->prog != '' ? $data->prog : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, (isset($data->location) && $data->location != '' ? $data->location : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, (isset($data->location_sub) && $data->location_sub != '' ? $data->location_sub : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, (isset($data->area) && $data->area != '' ? $data->area : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, (isset($data->verification_status) && $data->verification_status != '' ? $data->verification_status : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, (isset($data->last_verify_date) && $data->last_verify_date != '' ? $data->last_verify_date : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, (isset($data->due_date) && $data->due_date != '' ? $data->due_date : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, (isset($data->pur_date) && $data->pur_date != '' ? $data->pur_date : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, (isset($data->status_name) && $data->status_name != '' ? $data->status_name : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, (isset($data->writOff_formNo) && $data->writOff_formNo != '' ? $data->writOff_formNo : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, (isset($data->wo_date) && $data->wo_date != '' ? $data->wo_date : ''));
                $objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, (isset($data->remarks) && $data->remarks != '' ? $data->remarks : ''));
            }

            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="' . $fileName . '"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');
        } else {
            echo 'Invalid Asset, Please select Asset';
        }
    }


    /*=============================Edit Asset====================================*/

    function editAsset()
    {
        if (isset($_GET['a']) && $_GET['a'] != '') {
            $idAsset = $_GET['a'];
        } else {
            $idAsset = '0';
        }
        $data = array();
        /*==========Log=============*/
        $Custom = new Custom();
        $trackarray = array("action" => "View editAsset",
            "result" => "View editAsset page. Fucntion: Asset/editAsset()");
        $Custom->trackLogs($trackarray, "user_logs");
        /*==========Log=============*/
        $MSettings = new MSettings();
        $data['permission'] = $MSettings->getUserRights($_SESSION['login']['idGroup'], '', 'asset_controllers/Assets');
        $data['category'] = $Custom->selectAllQuery('category', 'idCategory', 'isActive');
        $data['currency'] = $Custom->selectAllQuery('currency', 'idCurrency', 'isActive');
        $data['sop'] = $Custom->selectAllQuery('a_sourceOfPurchase', 'idSop', 'status');
        $data['employee'] = $Custom->getEmpAllDetails('');
        $data['location'] = $Custom->selectAllQuery('location', 'id');
        $data['project'] = $Custom->selectAllQuery('project', 'idProject');
        $data['status'] = $Custom->selectAllQuery('a_status', 'id', 'status');
        $MAsset = new MAsset();
        $searchdata['idAsset'] = $idAsset;
        $data['asset'] = $MAsset->getAssetById($searchdata);
        $this->load->view('include/header');
        $this->load->view('include/top_header');
        $this->load->view('include/sidebar');
        $this->load->view('asset_views/edit_asset', $data);
        $this->load->view('include/customizer');
        $this->load->view('include/footer');
    }

    function editData()
    {
        $idAsset = 0;
        if (!isset($_POST['idAsset']) || $_POST['idAsset'] == '' || $_POST['idAsset'] == '0') {
            $result = array('0' => 'Error', '1' => 'Invalid Asset ID');
        } else {
            $idAsset = $_POST['idAsset'];
            $MAsset = new MAsset();
            $searchdata = array();
            $searchdata['idAsset'] = $idAsset;
            $asset = $MAsset->getAssetById($searchdata);
            $Custom = new Custom();
            $editArray = array();
            $editArray['pr_no'] = $_POST['pr_reqId'];
            $editArray['idCategory'] = $_POST['idCategory'];
            $editArray['desc'] = $_POST['desc'];
            $editArray['model'] = $_POST['model'];
            $editArray['product_no'] = $_POST['product_no'];
            $editArray['gri_no'] = $_POST['gri_no'];
            $editArray['serial_no'] = $_POST['serial_no'];
            $editArray['po_no'] = $_POST['po_no'];
            $editArray['cost'] = $_POST['cost'];
            $editArray['idCurrency'] = $_POST['idCurrency'];
            $editArray['idSourceOfPurchase'] = $_POST['idSourceOfPurchase'];
            $editArray['emp_no'] = $_POST['emp_no'];
            $editArray['resp_person_name'] = $_POST['resp_person_name'];
            $editArray['ou'] = $_POST['ou'];
            $editArray['account'] = $_POST['account'];
            $editArray['dept'] = $_POST['dept'];
            $editArray['fund'] = $_POST['fund'];
            $editArray['proj_code'] = $_POST['proj_code'];
            $editArray['prog'] = $_POST['prog'];
            $editArray['idLocation'] = $_POST['idLocation'];
            $editArray['idSubLocation'] = $_POST['idSubLocation'];
            $editArray['area'] = $_POST['area'];
            $editArray['verification_status'] = $_POST['verification_status'];
            $editArray['last_verify_date'] = date('Y-m-d', strtotime($_POST['last_verify_date']));
            $editArray['due_date'] = date('Y-m-d', strtotime($_POST['due_date']));
            $editArray['pur_date'] = date('Y-m-d', strtotime($_POST['pur_date']));
            $editArray['status'] = $_POST['status'];
            $editArray['writOff_formNo'] = $_POST['writOff_formNo'];
            $editArray['wo_date'] = date('Y-m-d', strtotime($_POST['wo_date']));
            $editArray['remarks'] = $_POST['remarks'];
            $editArray['updatedBy'] = $_SESSION['login']['idUser'];
            $editArray['updatedDateTime'] = date('Y-m-d H:i:s');
            $editData = $Custom->Edit($editArray, 'idAsset', $idAsset, 'a_asset');
            if ($editData) {
                foreach ($editArray as $ek => $e) {
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
                }
                if (isset($_FILES) && isset($_FILES['file']) && $_FILES['file'] != '') {
                    $upload_location = ASSET_LOC . $idAsset . '/';
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
                                if (isset($asset[0]->tag_no) && $asset[0]->tag_no != '') {
                                    $tag = $asset[0]->tag_no;
                                } else {
                                    $tag = $idAsset;
                                }
                                $filename = $tag . '_' . date('d_m_Y_H_i_s') . '.' . $ext;
                                $newName = $MAsset->file_newname($upload_location, $filename);
                                $path = $upload_location . $newName;
                                if (move_uploaded_file($_FILES['file']['tmp_name'][$index], $path)) {
                                    $files_arr[] = $path;
                                    $fileUpload = array();
                                    $fileUpload['idAsset'] = $idAsset;
                                    $fileUpload['docPath'] = $upload_location . $filename;
                                    $fileUpload['docName'] = $filename;
                                    $fileUpload['isActive'] = 1;
                                    $fileUpload['createdBy'] = $_SESSION['login']['idUser'];
                                    $fileUpload['createdDateTime'] = date('Y-m-d H:i:s');
                                    $Custom->Insert($fileUpload, 'idAssetImage', 'a_asset_docs', 'Y');
                                }
                            } else {
                                $result = array('0' => 'Error', '1' => 'Invalid file extension', '2' => 0);
                            }
                        }
                    }
                }
                $result = array('0' => 'Success', '1' => 'Successfully Edited', '2' => 0);
            } else {
                $result = array('0' => 'Error', '1' => 'Error in Editing Data', '2' => '0');
            }

        }
        echo json_encode($result);
    }

    function getAssetDocs()
    {
        $result = array();
        if (isset($_GET['a']) && $_GET['a'] != '') {
            $MAsset = new MAsset();
            $searchdata = array();
            $searchdata['idAsset'] = $_GET['a'];
            $storeFolder = ASSET_LOC . $searchdata['idAsset'] . '/';
            $docs = $MAsset->getAssetDocsByIdAsset($searchdata);
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
        if (isset($_POST['idAsset']) && $_POST['idAsset'] != '') {
            $where['idAsset'] = $_POST['idAsset'];
            if (isset($_POST['file']) && $_POST['file'] != '') {
                $where['docName'] = $_POST['file'];
                $editArr['isActive'] = 0;
                $editArr['deleteBy'] = $_SESSION['login']['idUser'];
                $editArr['deletedDateTime'] = date('Y-m-d H:i:s');
                $editData = $Custom->Edit_multi_where($editArr, $where, 'a_asset_docs');
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

}

?>