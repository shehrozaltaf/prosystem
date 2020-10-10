<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">

<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/fixedHeader.bootstrap.min.css">

<style>
    .modal td, th {
        padding: 4px 10px;
    }
</style>
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
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Employee Search</a></li>
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
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="float-right h4">
                                                    <label for="CheckAll">Check All</label>
                                                    <input type="checkbox" name="CheckAll" value="Check All"
                                                           id="CheckAll" onclick="checkAll(this)"/>
                                                </p>
                                            </div>
                                        </div>
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
                                                    <th>Check</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $sno = 0;

                                                if (isset($datatbl) && $datatbl != '') {
                                                    foreach ($datatbl as $key => $rows) {
                                                        $sno++;
                                                        ?>

                                                        <tr class="fgtr">
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
                                                            <td><input type="checkbox" class="checkboxes"
                                                                       data-emp="<?php echo $rows->EmployeeNo ?>"
                                                                       name="locked_clusters" value="1"
                                                                       onclick="updBtnToggle()"
                                                                       id="locked_clusters_<?php echo $key ?>"/></td>
                                                        </tr>
                                                    <?php }
                                                } ?>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row updBtn hide">
                                            <div class="col-sm-12">
                                                <button type="button"
                                                        onclick="updBtnModal()"
                                                        id="btn-Upd" class="btn bg-secondary white addbtn">Update All
                                                </button>
                                            </div>
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


<?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
    <div class="modal fade text-left" id="editEmpModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel_editEmpModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_editEmpModal">Edit Employees</h4>
                    <input type="hidden" id="delete_idPage" name="delete_idPage">
                </div>
                <div class="modal-body">
                    <p>Are you sure, you want to edit these employees?</p>
                    <div class="model_htmlcontent"></div>
                    <table width='100%'>
                        <tr>
                            <th width='30%'>Field Name</th>
                            <th width='30%'>Value</th>
                            <th width='30%'>Eff Date</th>
                        </tr>

                        <tr>
                            <td class='project'>Project</td>
                            <td class='summaryNewVal'>
                                <select id="upd_bulkProject" name="upd_bulkProject" class=" select2">
                                    <option>Select Project</option>
                                    <?php
                                    if (isset($project) && $project != '') {
                                        foreach ($project as $k => $v) {
                                            echo '<option value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class='SummaryEftDate'>
                                <input id='dt_' name='dt_' type='text' class='form-control pickadate-short-string'/>
                            </td>
                        </tr>
                        <tr>
                            <td class='project'>Location</td>
                            <td class='summaryNewVal'>
                                <select id="upd_bulkLocation" name="upd_bulkLocation" class=" select2">
                                    <option>Select Location</option>
                                    <?php
                                    if (isset($location) && $location != '') {
                                        foreach ($location as $k => $v) {
                                            echo '<option value="' . $v->id . '">' . $v->location . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class='SummaryEftDate'>
                                <input id='dt_' name='dt_' type='text' class='form-control pickadate-short-string'/>
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updBtnSave()">Save</button>
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

    function updBtnModal() {
        var employees = [];
        var employees_no = '';
        var count = $('.fgtr').find('.checkboxes');
        var empHtml = '';
        var str = '';
        for (var i = 0; i < count.length; i++) {
            employees_no = $(count[i]).attr('data-emp');
            if ($(count[i]).is(':checked')) {

                employees.push({'employees_no': employees_no});
            }
        }
        if (employees.length >= 1) {
            $.each(employees, function (i, v) {
                if (i == 0) {
                    empHtml += v.employees_no ;
                } else {
                    empHtml += ', ' + v.employees_no;
                }
            });
            str += '<p>Employee: <span  class="danger">' + empHtml + '</span></p>';
            $(".model_htmlcontent").html(str);
            $("#editEmpModal").modal('show');
            pickDate();
        } else {
            toastMsg('Employee', 'Please select Employee', 'error');
        }
    }

    function updBtnSave() {

        var data = {};
        var employees = [];
        var employees_no = '';
        var count = $('.fgtr').find('.checkboxes');
        for (var i = 0; i < count.length; i++) {
            employees_no = $(count[i]).attr('data-emp');
            if ($(count[i]).is(':checked')) {
                employees.push({'employees_no': employees_no});
            }
        }
        if (employees.length >= 1) {
            $('#btn-Edit').css('display', 'none');
            data['clusters'] = employees;
            /*CallAjax("< ?php echo base_url() . 'index.php/Cluster_lock/setLock' ?>", data, "POST", function (Result) {
                if (Result == 1) {
                    toastMsg('Success', 'Successfully Changed', 'success');
                    setTimeout(function () {
                        $('#btn-Edit').css('display', 'block');
                        window.location.reload();
                    }, 2000);
                } else if (Result == 3) {
                    toastMsg('Error', 'Invalid Cluster', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });*/
        } else {
            toastMsg('Cluster', 'Please select Cluster', 'error');
        }
    }

    function updBtnToggle() {
        var employees = [];
        var employees_no = '';
        var count = $('.fgtr').find('.checkboxes');
        for (var i = 0; i < count.length; i++) {
            employees_no = $(count[i]).attr('data-emp');
            if ($(count[i]).is(':checked')) {
                employees.push({'employees_no': employees_no});
            }
        }
        if (employees.length >= 1) {
            $('.updBtn').removeClass('hide').addClass('show');
        } else {
            $('.updBtn').removeClass('show').addClass('hide');
        }
    }

    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }


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