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
                        <h2 class="content-header-title float-left mb-0">Department</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Department</a></li>
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
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Department</th>
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
                                                        <td class="mycol"
                                                            data-txt="<?php echo $v->dept ?>"><?php echo $v->dept ?></td>
                                                        <td data-id="<?php echo $v->id ?>">
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
                                            <tfoot>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Department</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-fab-wrapper">
                            <button id="cmdadd" name="cmdadd"
                                    class="md-fab md-fab-accent md-fab-wave-light waves-effect waves-button waves-light">
                                <i class="feather icon-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="addLocationModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLocationModalLabel">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="dept" class="label-control">Department</label>
                <input type="text" class="form-control" id="dept" maxlength="120" name="dept"
                       style="text-transform: uppercase;"
                       onkeypress="return lettersOnly_WithSpace();"
                       autocomplete="dept" required>
            </div>
            <div class="modal-footer">
                <button id="cmdconfirm" type="button" class="btn grey btn-primary" onclick="addDept();">Save
                </button>
                <button id="cmdUpdate" type="button" class="btn grey btn-primary" onclick="editDept();">Update
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel_delete"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel_delete">Delete Dept</h4>
                <input type="hidden" id="delete_idActual" name="delete_idActual">
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

    function lettersOnly_WithSpace(evt) {

        var iserr = true;

        evt = (evt) ? evt : event;
        var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));

        if (charCode > 31 && (charCode < 65 || charCode > 90) &&
            (charCode < 97 || charCode > 122) && charCode != 32) {
            alert("Please enter string value ");
            iserr = false;
        }

        return iserr;
    }

    $(document).on("click", "#cmdadd", function () {
        $('#cmdconfirm').css('display', 'block');
        $('#cmdUpdate').css('display', 'none');

        $("#dept").val("");
        $("#cmdconfirm").text("Save");
        $("#addLocationModal").modal('show');
        $("#addLocationModalLabel").text("Add Department");
    });

    let data = [];

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


    function getEdit(obj) {

        $('#cmdconfirm').css('display', 'none');
        $('#cmdUpdate').css('display', 'block');

        data.push({"id": $(obj).parent('td').attr('data-id')});
        let loc = $(obj).parent('td').prev('td').attr('data-txt');

        $("#cmdconfirm").text("Update");

        $("#dept").val(loc);
        $("#addLocationModal").modal('show');
        $("#addLocationModalLabel").text("Update Department");

        /*if (data['id'] != '' && data['id'] != undefined) {
            window.location.href =  "EmpLocation/getLocationEdit/" + data['id'];
        }*/
    }

    function getDelete(obj) {
        let id = $(obj).parent('td').attr('data-id');
        $('#delete_idActual').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        let data = [];
        data['idActual'] = $('#delete_idActual').val();
        if (data['idActual'] == '' || data['idActual'] == undefined || data['idActual'] == 0) {
            toastMsg('Group', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/hr_controllers/EmpDept/deleteData')?>', data, 'POST', function (res) {
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


    function addDept() {
        let addData = {};
        addData["id"] = "0";
        addData["dept"] = $('#dept').val();

        if ($('#dept').val() == '' || $('#dept').val() == undefined || $('#dept').val() == 0 ||
            $('#dept').val() == null ||
            $('#dept').val() == 'NULL'
        ) {
            toastMsg('Group', 'Please enter department', 'error');
            $('#dept').focus();
            return false;
        } else {

            CallAjax('<?php echo base_url('index.php/hr_controllers/EmpDept/getDeptAlreadyExists'); ?>', addData, 'POST', function (result) {

                if (result != '' && result != null) {
                    let a = JSON.parse(result);

                    try {
                        if (a[0] != null) {
                            toastMsg('Error', 'Department already exists', 'error');
                            $("#dept").focus();
                        } else {

                            CallAjax('<?php echo base_url('index.php/hr_controllers/EmpDept/addDept')?>', addData, 'POST', function (res) {
                                if (res == 1) {
                                    //$('#deleteModal').modal('hide');
                                    toastMsg('Group', 'Record Successfully', 'success');
                                    setTimeout(function () {
                                        //window.location.reload();
                                        window.location.href = '<?php echo base_url('index.php/hr_controllers/EmpDept')?>';
                                    }, 500);
                                } else if (res == 2) {
                                    toastMsg('Group', 'Something went wrong', 'error');
                                } else if (res == 3) {
                                    toastMsg('Group', 'Invalid Department', 'error');
                                }

                            });

                        }
                    } catch (e) {
                    }
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }

            });

        }
    }


    function editDept() {
        /*data.push({"location": $('#location').val()});
        console.log(data);*/
        let editData = {};
        editData["id"] = data[0].id;
        editData["dept"] = $('#dept').val();

        if (editData == '' || editData == undefined || editData == 0 ||
            editData == null ||
            editData == 'NULL'
        ) {
            toastMsg('Group', 'Please enter department', 'error');
            $('#dept').focus();
            return false;
        } else {


            CallAjax('<?php echo base_url('index.php/hr_controllers/EmpDept/getDeptAlreadyExists'); ?>', editData, 'POST', function (result) {

                if (result != '' && result != null) {
                    let a = JSON.parse(result);

                    try {
                        if (a[0] != null) {
                            toastMsg('Error', 'Department already exists', 'error');
                            $("#dept").focus();
                        } else {

                            CallAjax('<?php echo base_url('index.php/hr_controllers/EmpDept/editDept')?>', editData, 'POST', function (res) {

                                if (res == 1) {
                                    //$('#deleteModal').modal('hide');
                                    toastMsg('Group', 'Record Successfully', 'success');
                                    setTimeout(function () {
                                        data = {};
                                        //window.location.reload();
                                        window.location.href = '<?php echo base_url('index.php/hr_controllers/EmpDept')?>';
                                    }, 500);
                                } else if (res == 2) {
                                    toastMsg('Group', 'Something went wrong', 'error');
                                } else if (res == 3) {
                                    toastMsg('Group', 'Invalid Department', 'error');
                                }

                            });

                        }
                    } catch (e) {
                    }
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }

            });


        }
    }

</script>