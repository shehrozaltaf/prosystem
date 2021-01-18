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
                        <h2 class="content-header-title float-left mb-0">Asset System</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Asset</li>
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
                                                <label for="project">Project</label>
                                                <select class="select2 form-control" id="project" name="project">
                                                    <option value="0">All Projects</option>
                                                    <?php
                                                    if (isset($project) && $project != '') {
                                                        foreach ($project as $k => $v) {
                                                            echo '<option value="' . $v->proj_code . '">(' . $v->proj_code . ') ' . $v->proj_sn . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="emp">Employee</label>
                                                <select class="select2 form-control" id="emp" name="emp">
                                                    <option value="0">All Employees</option>
                                                    <?php
                                                    if (isset($employee) && $employee != '') {
                                                        foreach ($employee as $k => $e) {
                                                            echo '<option value="' . $e->empno . '">(' . $e->empno . ') ' . $e->empname . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="select2 form-control" id="category" name="category">
                                                    <option value="0">All Categories</option>
                                                    <?php
                                                    if (isset($category) && $category != '') {
                                                        foreach ($category as $k => $c) {
                                                            echo '<option value="' . $c->id . '">' . $c->category . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="sop">Source of Purchase</label>
                                                <select class="select2 form-control" id="sop" name="sop">
                                                    <option value="0">All Source of Purchase</option>
                                                    <?php
                                                    if (isset($sop) && $sop != '') {
                                                        foreach ($sop as $k => $sp) {
                                                            echo '<option value="' . $sp->sop_value . '">' . $sp->sop_name . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
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
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="sublocation">Sub Location</label>
                                                <select class="select2 form-control" id="sublocation" name="sublocation">
                                                    <option value="0">All Sub Locations</option>
                                                    <?php
                                                    if (isset($location_sub) && $location_sub != '') {
                                                        foreach ($location_sub as $k => $sub) {
                                                            echo '<option value="' . $sub->id . '">' . $sub->location_sub . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="select2 form-control" id="status" name="status">
                                                    <option value="0">All Status</option>
                                                    <?php
                                                    if (isset($status) && $status != '') {
                                                        foreach ($status as $k => $s) {
                                                            echo '<option value="' . $s->status_value . '">' . $s->status_name . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="ftag">FTAG</label>
                                                <input type="text" class="form-control" id="ftag" name="ftag">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="prno">PR No</label>
                                                <input type="text" class="form-control" id="prno" name="prno">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="paedsid">Paeds ID</label>
                                                <input type="text" class="form-control" id="paedsid" name="paedsid">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="writeOffNod">Write Off Nod</label>
                                                <input type="text" class="form-control" id="writeOffNod" name="writeOffNod">
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="dateTo">Entry Date To</label>
                                                <input type="text" class="form-control mypickadat" id="dateTo"
                                                       name="dateTo">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="dateFrom">Entry Date From</label>
                                                <input type="text" class="form-control mypickadat" id="dateFrom"
                                                       name="dateFrom">
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
                                <h4 class="card-title">Asset</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard cardHtml">
                                    <div class="table-responsive">
                                        <table id="my_table_asset" style="width:100%"
                                               class="table table-striped table-bordered show-child-rows display">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>PAEDS Id</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Tag NO</th>
                                                <th>Employee</th>
                                                <th>Project</th>
                                                <th>Location</th>
                                                <th>Sub Location</th>
                                                <th>PRPath</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>PAEDS Id</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Tag NO</th>
                                                <th>Employee</th>
                                                <th>Project</th>
                                                <th>Location</th>
                                                <th>Sub Location</th>
                                                <th>PRPath</th>
                                                <th>Action</th>
                                            </tfoot>
                                        </table>


                                    </div>


                                </div>

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
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete asset</h4>
                    <input type="hidden" id="delete_idasset" name="delete_idasset">
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
        // getData();
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

    function format(d) {
        var html = '';
        html += '<p>FTAG: ' + (d.ftag != '' && d.ftag != undefined && d.aadop != null ? d.ftag : '') + '</p>';
        html += '<p>AADop: ' + (d.aadop != '' && d.aadop != undefined && d.aadop != null ? d.aadop : '') + '</p>';
        html += '<p>New Entry: ' + (d.newEntry != '' && d.newEntry != undefined && d.newEntry != null ? d.newEntry : '') + '</p>';
        html += '<p>Remarks: ' + (d.remarks != '' && d.remarks != undefined && d.remarks != null ? d.remarks : '') + '</p>';
        html += '<p>Status: ' + (d.status != '' && d.status != undefined && d.status != null ? d.status : '') + '</p>';
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
        data['project'] = $('#project').val();
        data['emp'] = $('#emp').val();
        data['category'] = $('#category').val();
        data['sop'] = $('#sop').val();
        data['location'] = $('#location').val();
        data['sublocation'] = $('#sublocation').val();
        data['status'] = $('#status').val();
        data['ftag'] = $('#ftag').val();
        data['prno'] = $('#prno').val();
        data['paedsid'] = $('#paedsid').val();
        data['writeOffNod'] = $('#writeOffNod').val();
        data['dateTo'] = $('#dateTo').val();
        data['dateFrom'] = $('#dateFrom').val();

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
        var dt = $('#my_table_asset').DataTable({
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
                "url": "<?php echo base_url() . 'index.php/asset_controllers/Assets/getAsset' ?>",
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
                {"data": "paeds_id"},
                {"data": "category"},
                {"data": "desc"},
                {"data": "tag"},
                {"data": "emp"},
                {"data": "proj"},
                {"data": "loc"},
                {"data": "sub_loc"},
                {"data": "pr_path"},
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
        $('#my_table_asset tbody').on('click', 'tr td.details-control', function () {
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
        $('#delete_idasset').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idasset'] = $('#delete_idasset').val();
        if (data['idasset'] == '' || data['idasset'] == undefined || data['idasset'] == 0) {
            toastMsg('asset', 'Invalid Id', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/asset_controllers/asset/deleteasset')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('asset', 'Successfully Deleted', 'success');
                    $('#deleteModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 3) {
                    toastMsg('asset', 'Invalid asset Id', 'error');
                } else {
                    toastMsg('asset', 'Something went wrong', 'error');
                }
            });
        }
    }

</script>