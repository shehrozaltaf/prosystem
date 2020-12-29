<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Projected</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Projected</li>
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

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="search_proj_code" class="label-control">Project Code</label>
                                                <select name="search_proj_code" id="search_proj_code"
                                                        class="form-control select2"
                                                        autocomplete="search_proj_code" required
                                                        onchange="chngeProject_Band(this)">
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php if (isset($project) && $project != '') {
                                                        foreach ($project as $k => $p) {
                                                            echo ' <option value="' . $p->proj_code . '">' . $p->proj_code . ' (' . $p->proj_name . ')</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="search_bdgt_code" class="label-control">Budget Code</label>
                                                <select name="search_bdgt_code" id="search_bdgt_code"
                                                        class="form-control select2"
                                                        autocomplete="search_bdgt_code" required >
                                                    <option value="0" readonly disabled selected></option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="search_desig" class="label-control">Designation</label>
                                                <select name="search_desig" id="search_desig"
                                                        class="form-control select2"
                                                        autocomplete="search_desig" required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php if (isset($hr_desig) && $hr_desig != '') {
                                                        foreach ($hr_desig as   $d) {
                                                            echo ' <option value="' . $d->id . '">' . $d->desig . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="search_emp_code" class="label-control">Employee</label>
                                                <select name="search_emp_code" id="search_emp_code"
                                                        class="form-control select2"
                                                        autocomplete="search_emp_code" required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php if (isset($hr_employee) && $hr_employee != '') {
                                                        foreach ($hr_employee as $ke => $e) {
                                                            echo ' <option value="' . $e->empno . '">' . $e->empno . ' (' . $e->empname . ')</option>';
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

            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Projected</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="my_table_inventory"  style="width:100%" class="table table-striped dataex-html5-selectors">
                                            <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Project Code</th>
                                                <th>Employee</th>
                                                <th>Percentage</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tfoot>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Project Code</th>
                                                <th>Employee</th>
                                                <th>Percentage</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-fab-wrapper">
                            <a class="md-fab md-fab-accent md-fab-wave-light waves-effect waves-button waves-light"
                               href="<?php echo base_url() ?>index.php/budget_controllers/Projected/addProjected_view">
                                <i class="feather icon-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel_delete"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel_delete">Delete Projected</h4>
                <input type="hidden" id="delete_idPrjn" name="delete_idPrjn">
            </div>
            <div class="modal-body">
                <p>Are you sure, you want to delete this?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="deleteData()">Delete
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="copyModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel_copy"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel_copy">Clone Projected</h4>
                <input type="hidden" id="copy_idPrjn" name="copy_idPrjn">
            </div>
            <div class="modal-body">
                <p>Are you sure, you want to clone this?</p>
                <div class="col">
                    <div class="form-group">
                        <label for="copy_proj_code" class="label-control">Project Code</label>
                        <input type="text" id="copy_proj_code" class="form-control" name="copy_proj_code" readonly
                               disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="copy_emp_code" class="label-control">Employer Code</label>
                        <input type="text" id="copy_emp_code" class="form-control" name="copy_emp_code" readonly
                               disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="copy_bdgt_code" class="label-control">Budget Code</label>
                        <input type="text" id="copy_bdgt_code" class="form-control" name="copy_bdgt_code" readonly
                               disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="copy_prjn_pctg" class="label-control">Percentage</label>
                        <input type="text" id="copy_prjn_pctg" class="form-control" name="copy_prjn_pctg" readonly
                               disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="copy_prjn_month" class="label-control"> Clone Month-Year</label>
                        <select name="copy_prjn_month" id="copy_prjn_month" class="form-control select2"
                                autocomplete="copy_prjn_month" required>
                            <option value="0" readonly disabled selected></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="cloneData()">Clone
                </button>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
<!--<script src="--><?php //echo base_url() ?><!--assets/js/scripts/datatables/datatable.js"></script>-->
<!-- END: Page JS-->

<script>
    $(document).ready(function () {
        validateNum('prjn_pctg');
        validateNumByClass('perc');
        getData();
        /* $('.dataex-html5-selectors').DataTable({
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
         });*/
    });


    function getData() {
        var data = {};
        data['proj_code'] = $('#search_proj_code').val();
        data['bdgt_code'] = $('#search_bdgt_code').val();
        data['desig'] = $('#search_desig').val();
        data['emp_code'] = $('#search_emp_code').val();
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
                "url": "<?php echo base_url() . 'index.php/budget_controllers/Projected/getProjected' ?>",
                "method": "POST",
                "data": data
            },
            columns: [
                {"data": "proj_code"},
                {"data": "bdgt_code"},
                {"data": "empl_code"},
                {"data": "prjn_pctg"},
                {"data": "prjn_month"},
                {"data": "prjn_year"},
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


    function chngeProject_Band(obj) {
        var data = {};
        data['proj_code'] = $('#search_proj_code').val();
        if (data['proj_code'] != '' && data['proj_code'] != undefined) {
            $('#search_bdgt_code').html('');
            CallAjax('<?php echo base_url('index.php/budget_controllers/Project/getBands'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' <option value="0" data-band="0" readonly disabled selected>Select Position</option>';
                        $.each(response[1], function (i, v) {
                            post += '<option value="' + v.bdgt_code + '" data-per="' + v.bdgt_pctg + '" data-band="' + v.bdgt_band + '">' + v.bdgt_code +
                                ' (' + v.desig + ' - Amount: ' + v.bdgt_amnt +
                                ' percentage: ' + v.bdgt_pctg + '% - Band: ' + v.band + ')</option>';
                        });
                        $('#search_bdgt_code').html(post);
                    } else {
                        toastMsg(response[0], response[1], 'error');
                    }
                } catch (e) {
                }
            });
        } else {
            toastMsg('Error', 'Invalid Project', 'error');
        }
    }

    function getDelete(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idPrjn').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idPrjn'] = $('#delete_idPrjn').val();
        if (data['idPrjn'] == '' || data['idPrjn'] == undefined || data['idPrjn'] == 0) {
            toastMsg('Group', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/budget_controllers/Projected/deleteData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    $('#deleteModal').modal('hide');
                    toastMsg('Group', 'Successfully Deleted', 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Group', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Group', 'Invalid Group', 'error');
                }

            });
        }
    }

    function getCopy(obj) {
        var id = $(obj).parent('td').attr('data-id');
        var proj_code = $(obj).parent('td').attr('data-projcode');
        var emp_code = $(obj).parent('td').attr('data-empcode');
        var bdgtcode = $(obj).parent('td').attr('data-bdgtcode');
        var monthyear = $(obj).parent('td').attr('data-my');
        var prjn_pctg = $(obj).parent('td').attr('data-prjn_pctg');
        chngeBand_Month_Year(proj_code, bdgtcode, monthyear);
        $('#copy_idPrjn').val(id);
        $('#copy_proj_code').val(proj_code);
        $('#copy_emp_code').val(emp_code);
        $('#copy_bdgt_code').val(bdgtcode);
        $('#copy_prjn_pctg').val(prjn_pctg);

        $('#copyModal').modal('show');
    }

    function cloneData() {
        var data = {};
        data['idPrjn'] = $('#copy_idPrjn').val();
        data['proj_code'] = $('#copy_proj_code').val();
        data['bdgt_code'] = $('#copy_bdgt_code').val();
        data['empl_code'] = $('#copy_emp_code').val();
        data['prjn_month'] = $('#copy_prjn_month').val();
        data['prjn_pctg'] = $('#copy_prjn_pctg').val();
        if (data['idPrjn'] == '' || data['idPrjn'] == undefined || data['idPrjn'] == 0) {
            toastMsg('Group', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/budget_controllers/Projected/cloneData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    $('#copyModal').modal('hide');
                    toastMsg('Success', 'Successfully Cloned', 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Error', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Error', 'Invalid Group', 'error');
                }

            });
        }
    }

    function chngeBand_Month_Year(proj_code, bdgt_code, monthyear) {
        var data = {};
        data['proj_code'] = proj_code;
        data['bdgt_code'] = bdgt_code;
        if (data['bdgt_code'] != '' && data['bdgt_code'] != undefined && data['proj_code'] != '' && data['proj_code'] != undefined) {
            CallAjax('<?php echo base_url('index.php/budget_controllers/Budget/getBand_Month_Year'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' <option value="0" readonly disabled selected>Select Month-Year</option>';
                        $.each(response[1], function (i, v) {
                            post += '<option value="' + v + '" ' + (v == monthyear ? ' readonly="" disabled="" ' : '') + '>' + v + '</option>';
                        });
                        $('#copy_prjn_month').html(post);
                    } else {
                        toastMsg(response[0], response[1], 'error');
                    }
                } catch (e) {
                }
            });
        } else {
            toastMsg('Error', 'Invalid Band Id', 'error');
        }
    }
</script>