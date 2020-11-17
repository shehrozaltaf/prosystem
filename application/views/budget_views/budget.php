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
                        <h2 class="content-header-title float-left mb-0">Budget</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Budget</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Budget</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Project Code</th>
                                                <th>Budget Code</th>
                                                <th>Band</th>
                                                <th>Position</th>
                                                <th>Amount</th>
                                                <th>Percentage</th>
                                                <th>Start Month-Year</th>
                                                <th>End Month-Year</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $SNo = 0;
                                            if (isset($data) && $data != '') {
                                                foreach ($data as $v) {
                                                    $SNo++; ?>
                                                    <tr>
                                                        <td><?php echo $SNo ?></td>
                                                        <td><?php echo $v->proj_code ?></td>
                                                        <td><?php echo $v->bdgt_code ?></td>
                                                        <td><?php echo $v->band ?></td>
                                                        <td><?php echo $v->desig ?></td>
                                                        <td><?php echo $v->bdgt_amnt ?></td>
                                                        <td><?php echo (isset($v->bdgt_pctg) && $v->bdgt_pctg!=''?$v->bdgt_pctg:'0').'%' ?></td>
                                                        <td><?php echo returnM($v->bdgt_start_month) . '-' . $v->bdgt_start_year ?></td>
                                                        <td><?php echo returnM($v->bdgt_end_month) . '-' . $v->bdgt_end_year ?></td>
                                                        <td data-id="<?php echo $v->idBugt ?>">
                                                            <a href="javascript:void(0)" onclick="getDelete(this)">
                                                                <i class="feather icon-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            }
                                            function returnM($month)
                                            {
                                                if ($month == 1) {
                                                    $res = 'Jan';
                                                } elseif ($month == 2) {
                                                    $res = 'Feb';
                                                } elseif ($month == 3) {
                                                    $res = 'Mar';
                                                } elseif ($month == 4) {
                                                    $res = 'Apr';
                                                } elseif ($month == 5) {
                                                    $res = 'May';
                                                } elseif ($month == 6) {
                                                    $res = 'June';
                                                } elseif ($month == 7) {
                                                    $res = 'July';
                                                } elseif ($month == 8) {
                                                    $res = 'Aug';
                                                } elseif ($month == 9) {
                                                    $res = 'Sep';
                                                } elseif ($month == 10) {
                                                    $res = 'Oct';
                                                } elseif ($month == 11) {
                                                    $res = 'Nov';
                                                } elseif ($month == 12) {
                                                    $res = 'Dec';
                                                } else {
                                                    $res = '';
                                                }
                                                return $res;
                                            } ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Project Code</th>
                                                <th>Budget Code</th>
                                                <th>Band</th>
                                                <th>Position</th>
                                                <th>Amount</th>
                                                <th>Percentage</th>
                                                <th>Start Month-Year</th>
                                                <th>End Month-Year</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-fab-wrapper">
                            <a class="md-fab md-fab-accent md-fab-wave-light waves-effect waves-button waves-light"
                               href="<?php echo base_url() ?>index.php/budget_controllers/Budget/addBudget_view">
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
                <h4 class="modal-title white" id="myModalLabel_delete">Delete Budget</h4>
                <input type="hidden" id="delete_idBugt" name="delete_idBugt">
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
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idBugt').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idBugt'] = $('#delete_idBugt').val();
        if (data['idBugt'] == '' || data['idBugt'] == undefined || data['idBugt'] == 0) {
            toastMsg('Group', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/budget_controllers/Budget/deleteData')?>', data, 'POST', function (res) {
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
</script>