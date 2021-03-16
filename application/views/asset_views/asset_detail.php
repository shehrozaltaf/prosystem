<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/pages/app-user.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/pages/invoice.css">

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Asset</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Asset Information</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- page users view start -->
            <section class="page-users-view">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Information</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!--<div class="col-12 col-sm-12">
                             <iframe src="http://f48605/pro_system/assets/uploads/assetUploads/4187/Screenshot%20(6).png"></iframe>
                            </div>-->
                            <?php
                            $asset = $asset_data[0];
                            ?>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <table class="table table-borderless table-hover table-responsive">
                                    <tr>
                                        <td class="font-weight-bold">PAEDS ID</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->idAsset) && $asset->idAsset != '' ? $asset->idAsset : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Category</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->category) && $asset->category != '' ? $asset->category : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Desc</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->description) && $asset->description != '' ? $asset->description : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Model</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->model) && $asset->model != '' ? $asset->model : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Product No</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->product_no) && $asset->product_no != '' ? $asset->product_no : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">GRI No</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->gri_no) && $asset->gri_no != '' ? $asset->gri_no : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Serial No</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->serial_no) && $asset->serial_no != '' ? $asset->serial_no : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Tag No</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->tag_no) && $asset->tag_no != '' ? $asset->tag_no : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">PO No</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->po_no) && $asset->po_no != '' ? $asset->po_no : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Cost</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->cost) && $asset->cost != '' ? $asset->cost : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Currency</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->currency) && $asset->currency != '' ? $asset->currency : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Source Of Purchase</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->sopName) && $asset->sopName != '' ? $asset->sopName : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">PR No</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->pr_no) && $asset->pr_no != '' ? $asset->pr_no : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Employee</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->emp_no) && $asset->emp_no != '' ? $asset->emp_no . ' - ' . $asset->empname : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">resp_person_name</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->resp_person_name) && $asset->resp_person_name != '' ? $asset->resp_person_name : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Proj Code</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->proj_code) && $asset->proj_code != '' ? $asset->proj_code . ' - ' . $asset->proj_name : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">OU</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->ou) && $asset->ou != '' ? $asset->ou : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Account</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->account) && $asset->account != '' ? $asset->account : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Department</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->dept) && $asset->dept != '' ? $asset->dept : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Fund</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->fund) && $asset->fund != '' ? $asset->fund : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Location</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->location) && $asset->location != '' ? $asset->location : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Sub Location</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->location_sub) && $asset->location_sub != '' ? $asset->location_sub : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Area</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->area) && $asset->area != '' ? $asset->area : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Verification Status</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->verification_status) && $asset->verification_status != '' ? $asset->verification_status : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Last Verify Date</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->last_verify_date) && $asset->last_verify_date != '' ? $asset->last_verify_date : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Due Date</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->due_date) && $asset->due_date != '' ? $asset->due_date : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Pur Date</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->pur_date) && $asset->pur_date != '' ? $asset->pur_date : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Status</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->status_name) && $asset->status_name != '' ? $asset->status_name : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">WritOff Form No</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->writOff_formNo) && $asset->writOff_formNo != '' ? $asset->writOff_formNo : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">WritOff Date</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->wo_date) && $asset->wo_date != '' ? $asset->wo_date : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">remarks</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->remarks) && $asset->remarks != '' ? $asset->remarks : '') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">PR Path</td>
                                        <td class="text-primary">
                                            <?php echo(isset($asset->pr_path) && $asset->pr_path != '' ? $asset->pr_path : '') ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12">
                                <input type="hidden" id="idAsset" name="idAsset"
                                       value="<?php echo(isset($asset->idAsset) && $asset->idAsset != '' ? $asset->idAsset : '') ?>">
                                <?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
                                    <!--<a href="#"
                                       class="btn btn-primary mr-1 waves-effect waves-light"><i
                                                class="feather icon-edit-1"></i> Edit</a>-->
                                <?php }  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="page-users-view asset-docs">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-2">Asset Documents</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            if (isset($asset_data_docs) && $asset_data_docs != '') {
                                foreach ($asset_data_docs as $docs) {
                                    $fileName = $docs->docName;
                                    $file = base_url() . $docs->docPath;
                                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                                    if ($ext == 'doc') {
                                        $type = 'application/msword';
                                    } elseif ($ext == 'docx') {
                                        $type = 'application/msword';
//                                               $type='application/vnd.openxmlformats-officedocument.wordprocessingml.document';
                                    } elseif ($ext == 'csv') {
                                        $type = 'text/csv';
                                    } elseif ($ext == 'xls') {
                                        $type = 'application/vnd.ms-excel';
                                    } elseif ($ext == 'xlsx') {
                                        $type = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                                    } elseif ($ext == 'gif') {
                                        $type = 'image/gif';
                                    } elseif ($ext == 'html' || $ext == 'htm') {
                                        $type = 'text/html';
                                    } elseif ($ext == 'jpeg' || $ext == 'jpg') {
                                        $type = 'image/jpeg';
                                    } elseif ($ext == 'png') {
                                        $type = 'image/png';
                                    } elseif ($ext == 'pdf') {
                                        $type = 'application/pdf';
                                    } elseif ($ext == 'mp3') {
                                        $type = 'audio/mpeg';
                                    } elseif ($ext == 'mpeg') {
                                        $type = 'video/mpeg';
                                    } elseif ($ext == 'zip') {
                                        $type = 'application/zip';
                                    } else {
                                        $type = 'text/plain';
                                    }
                                    echo '<div class="col-4 col-sm-4 mb-3">
                                                <a class=" "
                                                   href="' . $file . '"
                                                   target="_blank">
                                                    <embed width="100%" height="100%" name="plugin"
                                                           src="' . $file . '"
                                                            type="' . $type . '" > 
                                                           <p class="  text-danger text-center">' . $fileName . '</p> 
                                                </a>
                                                 
                                            </div>';
                                }
                            } else {
                                echo '<p>No record found</p>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </section>


            <section class="page-users-view-auditTrail">
                <div class="col-md-12 col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title mb-2">Audit Report</div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>

                                <tr>
                                    <th>Feild Name</th>
                                    <th>Old Value</th>
                                    <th>New Value</th>
                                    <th>By User</th>
                                    <th>Date Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($all_audit) && $all_audit != '') {

                                    foreach ($all_audit as $k => $a) {
                                        echo '<tr> 
                                                <td>' . $a->FieldName . '</td> 
                                                <td>' . $a->OldValue . '</td>
                                                <td>' . $a->NewValue . '</td> 
                                                <td>' . $a->username . '</td>
                                                <td>' . date('d-m-Y', strtotime($a->createdDateTime)) . '</td>
                                            </tr>';
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Feild Name</th>
                                    <th>Old Value</th>
                                    <th>New Value</th>
                                    <th>By User</th>
                                    <th>Date Time</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- page users view end -->


        </div>
    </div>
</div>


<?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
    <div class="modal fade text-left" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_status"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_status">Status asset</h4>
                    <input type="hidden" id="status_idAsset" name="status_idAsset">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group">
                                <label for="change_status" class="label-control">Select Status</label>
                                <select class="select2 form-control"
                                        autocomplete="change_status"
                                        id="change_status" required>
                                    <option value="0" readonly disabled selected></option>
                                    <?php if (isset($status) && $status != '') {
                                        foreach ($status as $k => $s) {
                                            echo '<option value="' . $s->id . '">' . $s->status_name . '</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="saveStatusChange()">Save
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) { ?>
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_delete"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete asset</h4>
                    <input type="hidden" id="delete_idAsset" name="delete_idAsset">
                </div>
                <div class="modal-body">
                    <p>Are you sure, you want to delete this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="deleteData()">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>

<script type="text/JavaScript" src="<?php echo base_url() ?>assets/js/scripts/extensions/invoice.js"></script>
<script type="text/JavaScript" src="<?php echo base_url() ?>assets/js/scripts/extensions/jspdf.min.js"></script>
<!--<script src="--><?php //echo base_url() ?><!--assets/js/scripts/pages/invoice.js"></script>-->
<script>
    $(document).ready(function () {
        $(".myprintBtn").click(function () {
            $(".printcontent").print();
        });


        $('.myDownloadBtn').click(function () {
            let pdf = new jsPDF();
            let section = $('.printcontent');
            let page = function () {
                pdf.save('pagename.pdf');
            };
            pdf.addHTML(section, page);
        });


        $('.dataex-html5-selectors').DataTable({
            dom: 'Bfrtip',
            "displayLength": 50,
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    text: 'JSON',
                    action: function (e, dt, button, config) {
                        var data = dt.buttons.exportData();

                        $.fn.dataTable.fileSave(
                            new Blob([JSON.stringify(data)]),
                            'Export.json'
                        );
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });
    });

    function getDelete(obj) {
        var id = $('#idAsset').val();
        if (id != '' && id != undefined && id != 0) {
            $('#deleteModal').modal('show');
        } else {
            toastMsg('Inventory', 'Invalid Id', 'error');
            return false;
        }

    }


    function deleteData() {
        var data = {};
        data['idAsset'] = $('#delete_idAsset').val();
        if (data['idAsset'] == '' || data['idAsset'] == undefined || data['idAsset'] == 0) {
            toastMsg('Asset', 'Invalid Id Asset', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/asset_controllers/Assets/deleteAsset')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('asset', 'Successfully Deleted', 'success');
                    $('#deleteModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 3) {
                    toastMsg('asset', 'Invalid Asset Id', 'error');
                } else {
                    toastMsg('asset', 'Something went wrong', 'error');
                }
            });
        }
    }

</script>