<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/pages/data-list-view.css">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Inventory System</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Inventory</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="basic-select2">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="username">User/Emp Id</label>
                                                <input type="text" class="form-control" id="username" name="username">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="ftag">FTAG/AAFTAG</label>
                                                <input type="text" class="form-control" id="ftag" name="ftag">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="dateTo">Date To (DoP)</label>
                                                <input type="text" class="form-control mypickadat" id="dateTo"
                                                       name="dateTo">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="dateFrom">Date From (DoP)</label>
                                                <input type="text" class="form-control mypickadat" id="dateFrom"
                                                       name="dateFrom">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <select class="select2 form-control" id="location" name="location">
                                                    <option value="0">All Locations</option>
                                                    <?php
                                                    if (isset($location) && $location != '') {
                                                        foreach ($location as $k => $v) {
                                                            echo '<option value="' . $v->id . '">' . $v->location . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="project">Project</label>
                                                <select class="select2 form-control" id="project" name="project">
                                                    <option value="0">All Projects</option>
                                                    <?php
                                                    if (isset($project) && $project != '') {
                                                        foreach ($project as $k => $v) {
                                                            echo '<option value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="select2 form-control" id="status" name="status">
                                                    <option value="0" selected>All Status</option>
                                                    <?php if (isset($status) && $status != '') {
                                                        foreach ($status as $k => $s) {
                                                            echo '<option value="' . $s->status_value . '" >' . $s->status_name . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" ">
                                        <button type="button" class="btn btn-primary" onclick="getData()">Get
                                            Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="data-list-view" class="hide main_content_div data-list-view-header">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Inventory</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard cardHtml">
                                    <div class="table-responsive">
                                        <table id="my_table_inventory" style="width:100%"
                                               class="table table-striped table-bordered show-child-rows display">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Type</th>
                                                <th>Model</th>
                                                <th>Product</th>
                                                <th>Serial</th>
                                                <th>DOP</th>
                                                <th>AAFTAG</th>
                                                <th>Username</th>
                                                <th>Location</th>
                                                <!--                                                <th>Remarks</th>-->
                                                <th>Status</th>
                                                <th>Expiry</th>
                                                <th>Settings</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Type</th>
                                                <th>Model</th>
                                                <th>Product</th>
                                                <th>Serial</th>
                                                <th>DOP</th>
                                                <th>AAFTAG</th>
                                                <th>Username</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Expiry</th>
                                                <th>Settings</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>


                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="add-new-data-sidebar">
                    <div class="overlay-bg"></div>
                    <div class="add-new-data">
                        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                            <div>
                                <h4 class="text-uppercase">List View Data</h4>
                            </div>
                            <div class="hide-data-sidebar">
                                <i class="feather icon-x"></i>
                            </div>
                        </div>
                        <div class="data-items pb-3">
                            <div class="data-fields px-2 mt-3">
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <input type="hidden" id="expiry_id" name="expiry_id">
                                        <div class="form-group">
                                            <label for="expiryDateTime" class="label-control">Expire Date</label>
                                            <input type="text" class="form-control mypickadat" id="expiryDateTime"
                                                   name="expiryDateTime"
                                                   autocomplete="expiryDateTime" required>

                                            <input type="hidden" class="form-control" id="oldExpiryDateTime"
                                                   name="oldExpiryDateTime"
                                                   autocomplete="oldExpiryDateTime" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                            <div class="add-data-btn">
                                <button class="btn btn-primary" onclick="saveExpiry()">Save</button>
                            </div>
                            <div class="cancel-data-btn">
                                <button class="btn btn-outline-danger">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<!-- END: Content-->
<?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
    <!--<div class="modal fade text-left" id="expiryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_expiry"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_expiry">Expire Date</h4>
                    <input type="hidden" id="expiry_id" name="expiry_id">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group">
                                <label for="expiryDateTime" class="label-control">Expire Date</label>
                                <input type="text" class="form-control mypickadat" id="expiryDateTime"
                                       name="expiryDateTime"
                                       autocomplete="expiryDateTime" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="saveExpiry()">Save
                    </button>
                </div>
            </div>
        </div>
    </div>-->
<?php } ?>
<?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
    <div class="modal fade text-left" id="assignCustodianModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel_assignCustodian"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_assignCustodian">Assign Custodian</h4>
                    <input type="hidden" id="assignCustodian_id" name="assignCustodian_id">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group">
                                <label for="custodian_location" class="label-control">Locations</label>
                                <select class="select2 form-control" id="custodian_location" name="custodian_location">
                                    <?php
                                    if (isset($location) && $location != '') {
                                        foreach ($location as $k => $v) {
                                            echo '<option value="' . $v->id . '">' . $v->location . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="custodian_location_old" name="custodian_location_old">
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <div class="form-group">
                                <label for="custodian_project" class="label-control">Project</label>
                                <select class="select2 form-control" id="custodian_project" name="custodian_project">
                                    <?php
                                    if (isset($project) && $project != '') {
                                        foreach ($project as $k => $v) {
                                            echo '<option value="' . $v->proj_code . '">' . $v->proj_name . '(' . $v->proj_code . ')</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="custodian_project_old" name="custodian_project_old">
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <div class="form-group">
                                <label for="custodian_emp" class="label-control">Owner/Employee</label>
                                <select class="select2 form-control" id="custodian_emp" name="custodian_emp">
                                    <?php
                                    if (isset($employees) && $employees != '') {
                                        foreach ($employees as $k => $e) {
                                            echo '<option value="' . $e->empno . '">' . $e->empname . '(' . $e->empno . ')</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="custodian_emp_old" name="custodian_emp_old">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger myCustodianbtn" onclick="saveCustodian()">Save
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
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete Inventory</h4>
                    <input type="hidden" id="delete_idInventory" name="delete_idInventory">
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

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>


<script src="<?php echo base_url() ?>assets/js/scripts/ui/data-list-view.js"></script>
<script>

    $(document).ready(function () {
        mydate();
        getData();
    });


    function mydate() {
        $('.mypickadat').pickadate({
            selectYears: true,
            selectMonths: true,
            min: new Date(2019, 12, 1),
            max: false,
            format: 'dd-mm-yyyy'
        });
    }

    function getExpiry(obj) {
        var id = $(obj).attr('data-id');
        var va = $(obj).attr('data-expiry');
        if (id != '' && id != undefined) {
            $('#expiryDateTime').val(va);
            $('#expiry_id').val(id);
            if (va == '' || va == undefined) {
                $('#oldExpiryDateTime').val('0');
            } else {
                $('#oldExpiryDateTime').val(va);
            }

            $(".add-new-data").addClass("show");
            $(".overlay-bg").addClass("show");
        } else {
            toastMsg('Error', 'Invalid Data', 'error');
            return false;
        }
    }

    /*function getExpiry(obj) {
        var id = $(obj).attr('data-id');
        var va = $(obj).attr('data-expiry');
        if (id != '' && id != undefined) {
            $('#expiryDateTime').val(va);
            $('#expiry_id').val(id);
            $('#expiryModal').modal('show');
        } else {
            toastMsg('Error', 'Invalid Data', 'error');
            return false;
        }
    }*/

    function saveExpiry() {
        var data = {};
        data['expiry_id'] = $('#expiry_id').val();
        data['expiryDateTime'] = $('#expiryDateTime').val();
        data['oldExpiryDateTime'] = $('#oldExpiryDateTime').val();
        if (data['expiry_id'] == '' || data['expiry_id'] == undefined || data['expiry_id'] == 0 ||
            data['expiryDateTime'] == '' || data['expiryDateTime'] == undefined || data['expiryDateTime'] == 0) {
            toastMsg('Error', 'Invalid Expiry Date Time', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/inventory_controllers/Inventory/setExpiry')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('Success', 'Successfully set Expiry Date Time', 'success');
                    $('#expiryModal').modal('hide');
                    $(".add-new-data").removeClass("show");
                    $(".overlay-bg").removeClass("show");
                    setTimeout(function () {
                        getData()
                    }, 500);
                } else if (res == 3) {
                    toastMsg('Error', 'Invalid Asset Id', 'error');
                } else if (res == 4) {
                    toastMsg('Error', 'Expiry date updated but audit trial not updated', 'warning');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }

    function getCustodianData(obj) {
        var data = {};
        data['id'] = $(obj).attr('data-id');
        if (data['id'] != '' && data['id'] != undefined) {
            CallAjax('<?php echo base_url('index.php/inventory_controllers/Inventory/getCustodianData')?>', data, 'POST', function (result) {
                if (result != '' && JSON.parse(result).length > 0) {
                    var a = JSON.parse(result);
                    try {
                        $('#assignCustodian_id').val(data['id']);
                        $('#custodian_location').val(a[0]['loc']).attr('selected', 'selected').trigger('change');
                        $('#custodian_location_old').val(a[0]['loc']);
                        $('#custodian_project').val(a[0]['proj_code']).attr('selected', 'selected').trigger('change');
                        $('#custodian_project_old').val(a[0]['proj_code']);
                        $('#custodian_emp').val(a[0]['username']).attr('selected', 'selected').trigger('change');
                        $('#custodian_emp_old').val(a[0]['username']);
                    } catch (e) {
                    }
                    $('#assignCustodianModal').modal('show');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        } else {
            toastMsg('Error', 'Invalid Data', 'error');
        }
    }

    function saveCustodian() {
        var data = {};
        data['assignCustodian_id'] = $('#assignCustodian_id').val();
        data['custodian_location'] = $('#custodian_location').val();
        data['custodian_location_old'] = $('#custodian_location_old').val();
        data['custodian_project'] = $('#custodian_project').val();
        data['custodian_project_old'] = $('#custodian_project_old').val();
        data['custodian_emp'] = $('#custodian_emp').val();
        data['custodian_emp_old'] = $('#custodian_emp_old').val();
        var vd = validateData(data);
        if (vd) {
            showloader();
            $('.myCustodianbtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/inventory_controllers/Inventory/saveCustodianData')?>', data, 'POST', function (res) {
                hideloader();
                $('.myCustodianbtn').removeClass('hide').removeAttr('disabled', 'disabled');

                try {
                    var response = JSON.parse(res);
                    console.log(response);
                    if (response[0] == 'Success') {
                        $('#assignCustodianModal').modal('hide');
                        toastMsg(response[0], response[1], 'success');
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500)
                    } else {
                        toastMsg(response[0], response[1], 'error');
                    }
                } catch (e) {
                }
            });
        } else {
            toastMsg('Error', 'Invalid Data', 'error');
        }
    }

    function format(d) {
        var html = '';
        html += '<p>FTAG: ' + (d.ftag != '' && d.ftag != undefined && d.aadop != null ? d.ftag : '') + '</p>';
        html += '<p>AADop: ' + (d.aadop != '' && d.aadop != undefined && d.aadop != null ? d.aadop : '') + '</p>';
        html += '<p>New Entry: ' + (d.newEntry != '' && d.newEntry != undefined && d.newEntry != null ? d.newEntry : '') + '</p>';
        html += '<p>Remarks: ' + (d.remarks != '' && d.remarks != undefined && d.remarks != null ? d.remarks : '') + '</p>';
        html += '<p>Status: ' + (d.statushr != '' && d.statushr != undefined && d.statushr != null ? d.statushr : '') + '</p>';
        /* $.each(d.subChild, function (i, v) {
            html += '<p>FTAG: ' + (v.ftag != '' && v.ftag != undefined && v.aadop != null ? v.ftag : '') + '</p>';
            html += '<p>AADop: ' + (v.aadop != '' && v.aadop != undefined && v.aadop != null ? v.aadop : '') + '</p>';
             html += '<p>New Entry: ' + (v.newEntry != '' && v.newEntry != undefined && v.newEntry != null ? v.newEntry : '') + '</p>';
             html += '<p>Remarks: ' + (v.remarks != '' && v.remarks != undefined && v.remarks != null ? v.remarks : '') + '</p>';
             html += '<p>Status: ' + (v.status != '' && v.status != undefined && v.status != null ? v.status : '') + '</p>';
         });*/
        return html;
    }

    function getData() {
        var data = {};
        data['username'] = $('#username').val();
        data['ftag'] = $('#ftag').val();
        data['dateTo'] = $('#dateTo').val();
        data['dateFrom'] = $('#dateFrom').val();
        data['location'] = $('#location').val();
        data['project'] = $('#project').val();
        data['statushr.php'] = $('#status').val();
        showloader();
        $('.main_content_div').addClass('hide');
        var columnDefs = [
            {
                targets: 0,
                className: 'control',
                orderable: false
            }
        ];
        var responsive = {
            details: {
                type: 'column'
            }
        };
        var dt = $('#my_table_inventory').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            columnDefs: columnDefs,
            responsive: {
                details: false
            },
            lengthMenu: [25, 50, 75, 100],
            pageLength: 25,
            iDisplayLength: 25,
            dom: 'Bfrtip',
            ajax: {
                "url": "<?php echo base_url() . 'index.php/inventory_controllers/Inventory/getInventory' ?>",
                "method": "POST",
                "data": data
            },
            columns: [
                {
                    "width": "3%",
                    "class": "details-control",
                    "orderable": false,
                    "data": null,
                    "defaultContent": ""
                },
                {"data": "inventory_type"},
                {"data": "model"},
                {"data": "product"},
                {"data": "serial"},
                {"data": "dop"},
                {"data": "aaftag"},
                {"data": "username"},
                {"data": "loc"},
                // {"data": "remarks"},
                {"data": "statushr.php"},
                {"data": "expiryDateTime"},
                {"data": "Settings"},
                {"data": "Action"}
            ],
            order: [
                [1, 'desc']
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });

        // Array to track the ids of the details displayed rows
        var detailRows = [];
        $('#my_table_inventory tbody').on('click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);
            if (row.child.isShown()) {
                tr.removeClass('details');
                row.child.hide();
                // Remove from the 'open' array
                detailRows.splice(idx, 1);
            } else {
                tr.addClass('details');
                row.child(format(row.data())).show();
                // Add to the 'open' array
                if (idx === -1) {
                    detailRows.push(tr.attr('id'));
                }
            }
        });

        // On each draw, loop over the `detailRows` array and show any child rows
        dt.on('draw', function () {
            $.each(detailRows, function (i, id) {
                $('#' + id + ' td.details-control').trigger('click');
            });
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-outline-primary mr-1');
        setTimeout(function () {
            hideloader();
            $('.main_content_div').removeClass('hide');
        }, 500);
    }

    function getDelete(obj) {
        var id = $(obj).attr('data-id');
        $('#delete_idInventory').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idInventory'] = $('#delete_idInventory').val();
        if (data['idInventory'] == '' || data['idInventory'] == undefined || data['idInventory'] == 0) {
            toastMsg('Inventory', 'Invalid Id', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/inventory_controllers/Inventory/deleteInventory')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('Inventory', 'Successfully Deleted', 'success');
                    $('#deleteModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 3) {
                    toastMsg('Inventory', 'Invalid Inventory Id', 'error');
                } else {
                    toastMsg('Inventory', 'Something went wrong', 'error');
                }
            });
        }
    }

</script>