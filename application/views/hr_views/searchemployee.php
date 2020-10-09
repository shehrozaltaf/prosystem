<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">

<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/fixedHeader.bootstrap.min.css">


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Employee Search</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="searchemployee">Employee Search</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form method="post" id="frm" name="frm">
                <section id="column-selectors">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped childTable" id="empTable">
                                                <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Employee Type</th>
                                                    <th>Category</th>
                                                    <th>Employee No</th>
                                                    <th>Employee Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $sno = 0;

                                                if (isset($datatbl) && $datatbl != '') {
                                                    foreach ($datatbl as $key => $rows) {
                                                        $sno++;
                                                        ?>

                                                        <tr>
                                                            <td>
                                                                <?php echo $sno ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rows->EmployeeType ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rows->EmployeeCategory ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rows->EmployeeNo ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rows->EmployeeName ?>
                                                            </td>
                                                            <td data-id="<?php echo $rows->id ?>">
                                                                <?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
                                                                    <a href="javascript:void(0)"
                                                                       onclick="getEdit(this)"><i
                                                                                class="feather icon-edit"></i> </a>
                                                                <?php } ?>
                                                                <?php if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) { ?>
                                                                    <a href="javascript:void(0)"
                                                                       onclick="getDelete(this)">
                                                                        <i class="feather icon-trash"></i>
                                                                    </a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>


<?php if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) { ?>
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_delete"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete Page</h4>
                    <input type="hidden" id="delete_idPage" name="delete_idPage">
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

<!-- END: Content-->
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
<!--<script src="--><?php //echo base_url() ?><!--assets/js/scripts/datatables/datatable.js"></script>-->
<!-- END: Page JS-->

<script>
    $(document).ready(function () {

        $('#empTable').DataTable({
            dom: 'Bfrtip',
            displayLength: 15,
            select: 'single',
            altEditor: true,
            filter: true,
            fixedHeader: true,
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


    function getEdit(obj) {
        var data = {};
        data['id'] = $(obj).parent('td').attr('data-id');

        if (data['id'] != '' && data['id'] != undefined) {
            window.location.href = "employee_entry/getEmployeeEdit/" + data['id'];
        }
    }


    function editData() {
        $('#edit_pageName').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idPage'] = $('#edit_idPage').val();
        data['pageName'] = $('#edit_pageName').val();
        if (data['idPage'] == '' || data['idPage'] == undefined || data['idPage'].length < 1) {
            flag = 1;
            return false;
        }
        if (data['pageName'] == '' || data['pageName'] == undefined || data['pageName'].length < 1) {
            $('#edit_pageName').css('border', '1px solid red');
            toastMsg('Page', 'Invalid Page Name', 'error');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?php echo base_url('index.php/Settings/editPageData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    $('#editModal').modal('hide');
                    toastMsg('Page', 'Successfully Edited', 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Page', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Page', 'Invalid Page', 'error');
                }
            });
        }
    }


    function getDelete(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idPage').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idPage'] = $('#delete_idPage').val();
        if (data['idPage'] == '' || data['idPage'] == undefined || data['idPage'] == 0) {
            toastMsg('Page', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/Settings/deletePageData')?>', data, 'POST', function (res) {

                if (res == 1) {
                    toastMsg('Page', 'Successfully Deleted', 'success');
                    $('#deleteModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Page', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Page', 'Invalid Page', 'error');
                }

            });
        }
    }

</script>