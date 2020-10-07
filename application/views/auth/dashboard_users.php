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
                        <h2 class="content-header-title float-left mb-0">Dashboard Users</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Users
                                </li>
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
                                <h4 class="card-title">Users</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Contract</th>
                                                <th>District</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if (isset($user) && $user != '') {
                                                foreach ($user as $k => $u) { ?>
                                                    <tr>
                                                        <td><?php echo $u->full_name ?></td>
                                                        <td><?php echo $u->username ?></td>
                                                        <td><?php echo $u->email ?></td>
                                                        <td><?php echo $u->designation ?></td>
                                                        <td><?php echo $u->contact ?></td>
                                                        <td><?php echo $u->district ?></td>
                                                        <td data-id="<?php echo $u->id ?>">
                                                            <?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
                                                                <a href="javascript:void(0)" onclick="getEdit(this)"><i
                                                                            class="feather icon-edit"></i> </a>
                                                            <?php } ?>
                                                            <?php if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) { ?>
                                                                <a href="javascript:void(0)" onclick="getDelete(this)">
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
                                                <th>Full Name</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Contract</th>
                                                <th>District</th>
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
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<?php if (isset($permission[0]->CanAdd) && $permission[0]->CanAdd == 1) { ?>
    <div class="md-fab-wrapper addbtn">
        <a class="md-fab md-fab-accent md-fab-wave-light waves-effect waves-button waves-light"
           href="javascript:void(0)" data-uk-modal="{target:'#addModal'}" id="add">
            <i class="feather icon-plus-circle"></i>
        </a>
    </div>
    <div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_add"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_add">Add User</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fullName">Full Name: </label>
                        <input type="text" class="form-control fullName"
                               id="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="userName">User Name: </label>
                        <input type="email" class="form-control userName"
                               id="userName" required>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email: </label>
                        <input type="text" class="form-control userEmail"
                               id="userEmail" required>
                    </div>


                    <fieldset class="form-label-group position-relative has-icon-left">
                        <input type="password" class="form-control"
                               id="userPassword" name="userPassword"
                               placeholder="Password" required>
                        <div class="form-control-position toggle-password">
                            <i class="feather icon-eye-off pwdIcon"></i>
                        </div>
                        <label for="userPassword">Password</label>
                    </fieldset>

                    <div class="form-group">
                        <label for="district">District: </label>
                        <select class="form-control" id="district">
                            <option  value="0">Select District</option>
                            <?php if (isset($districts) && $districts != '') {
                                foreach ($districts as $d) {
                                    echo '<option value="' . $d->dist_id . '">' . $d->dist_id . '</option>';
                                }
                            } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="designation">Designation: </label>
                        <input type="text" class="form-control" id="designation" required>
                    </div>
                    <div class="form-group">
                        <label for="contactNo">Contact No: </label>
                        <input type="text" class="form-control" id="contactNo" required>
                    </div>
                    <div class="form-group">
                        <label for="userGroup">User Group: </label>
                        <select class="form-control" id="userGroup" required>
                            <option value="0">Select Group</option>
                            <?php if (isset($groups) && $groups != '') {
                                foreach ($groups as $g) {
                                    echo '<option value="' . $g->idGroup . '">' . $g->groupName . '</option>';
                                }
                            } ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary mybtn" onclick="addData()">Add
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
    <div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_edit"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_edit">Edit User</h4>

                    <input type="hidden" id="edit_idUser" name="edit_idUser">
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="edit_userName">User: </label>
                        <input type="text" class="form-control edit_userName" id="edit_userName">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="editData()">Edit
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
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete User</h4>
                    <input type="hidden" id="delete_idUser" name="delete_idUser">
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


<!-- BEGIN: User Vendor JS-->
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: User Vendor JS-->
<!-- BEGIN: User JS-->
<!--<script src="--><?php //echo base_url() ?><!--assets/js/scripts/datatables/datatable.js"></script>-->
<!-- END: User JS-->

<script>
    $(document).ready(function () {
        validateEmail($('#userEmail'));
        $('.addbtn').click(function () {
            $('#addModal').modal('show');
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

    function addData() {
        $('#fullName').css('border', '1px solid #babfc7');
        $('#userName').css('border', '1px solid #babfc7');
        $('#userEmail').css('border', '1px solid #babfc7');
        $('#userPassword').css('border', '1px solid #babfc7');
        $('#userGroup').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['fullName'] = $('#fullName').val();
        data['userName'] = $('#userName').val();
        data['userEmail'] = $('#userEmail').val();
        data['userPassword'] = $('#userPassword').val();
        data['district'] = $('#district').val();
        data['designation'] = $('#designation').val();
        data['contactNo'] = $('#contactNo').val();
        data['userGroup'] = $('#userGroup').val();
        if (data['fullName'] == '' || data['fullName'] == undefined) {
            $('#fullName').css('border', '1px solid red');
            flag = 1;
            toastMsg('Full Name', 'Invalid Full Name', 'error');
            return false;
        }
        if (data['userName'] == '' || data['userName'] == undefined) {
            $('#userName').css('border', '1px solid red');
            flag = 1;
            toastMsg('User Name', 'Invalid User Name', 'error');
            return false;
        }
        if (data['userEmail'] == '' || data['userEmail'] == undefined) {
            $('#userEmail').css('border', '1px solid red');
            flag = 1;
            toastMsg('Email', 'Invalid Email', 'error');
            return false;
        }
        if (data['userPassword'] == '' || data['userPassword'] == undefined) {
            $('#userPassword').css('border', '1px solid red');
            flag = 1;
            toastMsg('Password', 'Invalid Password', 'error');
            return false;
        }
        if (data['userGroup'] == '' || data['userGroup'] == undefined) {
            $('#userGroup').css('border', '1px solid red');
            flag = 1;
            toastMsg('Group', 'Invalid Group', 'error');
            return false;
        }
        if (flag == 0) {
            showloader();
            $('.mybtn').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/Users/addData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    $('#addModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (result == 4) {
                    toastMsg('User', 'Duplicate User URL', 'error');
                } else if (result == 3) {
                    toastMsg('User', 'Invalid User Name', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });

        } else {
            toastMsg('User', 'Something went wrong', 'error');
        }
    }

    function getDelete(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idUser').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idUser'] = $('#delete_idUser').val();
        if (data['idUser'] == '' || data['idUser'] == undefined || data['idUser'] == 0) {
            toastMsg('User', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/Users/deleteData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('User', 'Successfully Deleted', 'success');
                    $('#deleteModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('User', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('User', 'Invalid User', 'error');
                }

            });
        }
    }

    function getEdit(obj) {
        var data = {};
        data['id'] = $(obj).parent('td').attr('data-id');
        if (data['id'] != '' && data['id'] != undefined) {
            CallAjax('<?php echo base_url('index.php/Users/getUserEdit')?>', data, 'POST', function (result) {
                if (result != '' && JSON.parse(result).length > 0) {
                    var a = JSON.parse(result);
                    try {
                        $('#edit_idUser').val(data['id']);
                        $('#edit_userName').val(a[0]['userName']);
                    } catch (e) {
                    }
                    $('#editModal').modal('show');
                } else {
                    alert(1);
                }
            });
        }
    }

    function editData() {
        $('#edit_userName').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idUser'] = $('#edit_idUser').val();
        data['userName'] = $('#edit_userName').val();
        if (data['idUser'] == '' || data['idUser'] == undefined || data['idUser'].length < 1) {
            flag = 1;
            return false;
        }
        if (data['userName'] == '' || data['userName'] == undefined || data['userName'].length < 1) {
            $('#edit_userName').css('border', '1px solid red');
            toastMsg('User', 'Invalid User Name', 'error');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?php echo base_url('index.php/Users/editUserData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    $('#editModal').modal('hide');
                    toastMsg('User', 'Successfully Edited', 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('User', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('User', 'Invalid User', 'error');
                }
            });
        }
    }

</script>