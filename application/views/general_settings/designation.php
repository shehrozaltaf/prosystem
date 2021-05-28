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
                        <h2 class="content-header-title float-left mb-0">Designation</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">General Settings</a>
                                </li>
                                <li class="breadcrumb-item active">Designation
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
                                <h4 class="card-title">Designation</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Designation</th>
                                                <th>Band</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $SNo = 0;
                                            if (isset($myData) && $myData != '') {
                                                foreach ($myData as $data) {
                                                    $SNo++; ?>
                                                    <tr>
                                                        <td><?php echo $SNo ?></td>
                                                        <td><?php echo $data->desig ?></td>
                                                        <td><?php echo $data->band ?></td>
                                                        <td data-id="<?php echo $data->id ?>">
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
                                                <th>SNo</th>
                                                <th>Designation</th>
                                                <th>Band</th>
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
<?php


if (isset($permission[0]->CanAdd) && $permission[0]->CanAdd == 1) { ?>
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
                    <h4 class="modal-title white" id="myModalLabel_add">Add Designation</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="DesignationName">Designation: </label>
                        <input type="text" class="form-control DesignationName" id="DesignationName">
                    </div>
                    <div class="form-group">
                        <label for="Band">Band: </label>
                        <select id="Band" name="Band"
                                class="form-control select2 Band">
                            <option value="0">Select Band</option>
                            <?php if (isset($Band) && $Band != '') {
                                foreach ($Band as $ban) {
                                    echo '<option value="' . $ban->id . '">' . $ban->band . '</option>';
                                }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger mybtn" onclick="addData()">Add
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
                    <h4 class="modal-title white" id="myModalLabel_edit">Edit Designation</h4>
                    <input type="hidden" id="edit_idDesignation" name="edit_idDesignation">
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_DesignationName">Designation: </label>
                        <input type="text" class="form-control edit_DesignationName" id="edit_DesignationName">
                    </div>
                    <div class="form-group">
                        <label for="edit_Band">Band: </label>
                        <select id="edit_Band" name="edit_Band"
                                class="form-control select2 edit_Band">
                            <option value="0">Select Band</option>
                            <?php if (isset($Band) && $Band != '') {
                                foreach ($Band as $ban) {
                                    echo '<option value="' . $ban->id . '">' . $ban->band . '</option>';
                                }
                            } ?>
                        </select>
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
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel_delete"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete Designation</h4>
                    <input type="hidden" id="delete_idDesignation" name="delete_idDesignation">
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
<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
<script src="<?php echo base_url() ?>assets/js/scripts/datatables/datatable.js"></script>
<!-- END: Page JS-->

<script>

    $(document).ready(function () {
        $('.addbtn').click(function () {
            $('#addModal').modal('show');
        });
    });

    function addData() {
        $('#DesignationName').css('border', '1px solid #babfc7');
        var data = {};
        data['DesignationName'] = $('#DesignationName').val();
        data['Band'] = $('#Band').val();
        if (data['DesignationName'] == '' || data['DesignationName'] == undefined) {
            $('#DesignationName').css('border', '1px solid red');
            toastMsg('Designation', 'Invalid Designation Name', 'error');
            return false;
        }
        if (data['Band'] == '' || data['Band'] == undefined || data['Band'] == 0) {
            $('#Band').css('border', '1px solid red');
            toastMsg('Band', 'Invalid Band', 'error');
        } else {
            showloader();
            $('.mybtn').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/general_settings/Designation/addDesignationData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    $('#addModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (result == 3) {
                    toastMsg('Designation', 'Invalid Designation Name', 'error');
                } else if (result == 4) {
                    toastMsg('Designation', 'Designation Name already exist', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }

    function getEdit(obj) {
        var data = {};
        data['id'] = $(obj).parent('td').attr('data-id');
        if (data['id'] != '' && data['id'] != undefined) {
            CallAjax('<?php echo base_url('index.php/general_settings/Designation/getDesignationEdit')?>', data, 'POST', function (result) {
                if (result != '' && JSON.parse(result).length > 0) {
                    var a = JSON.parse(result);
                    try {
                        $('#edit_idDesignation').val(data['id']);
                        $('#edit_DesignationName').val(a[0]['desig']);
                        $('#edit_Band').val(a[0]['band']);
                        setTimeout(function () {
                            $('#edit_Band').val(a[0]['band']).select2();
                        }, 500);
                    } catch (e) {
                    }
                    $('#editModal').modal('show');
                } else {
                    toastMsg('Designation', 'Invalid Designation', 'error');
                }
            });
        }
    }

    function editData() {
        $('#edit_DesignationName').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idDesignation'] = $('#edit_idDesignation').val();
        data['DesignationName'] = $('#edit_DesignationName').val();
        data['Band'] = $('#edit_Band').val();
        if (data['idDesignation'] == '' || data['idDesignation'] == undefined || data['idDesignation'].length < 1) {
            flag = 1;
            return false;
        }
        if (data['DesignationName'] == '' || data['DesignationName'] == undefined || data['DesignationName'].length < 1) {
            $('#edit_DesignationName').css('border', '1px solid red');
            toastMsg('Designation', 'Invalid Designation Name', 'error');
            flag = 1;
            return false;
        }
        if (data['Band'] == '' || data['Band'] == undefined || data['Band'].length < 1 || data['Band'] == 0) {
            $('#edit_Band').css('border', '1px solid red');
            toastMsg('Band', 'Invalid Band', 'error');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?php echo base_url('index.php/general_settings/Designation/editDesignationData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    $('#editModal').modal('hide');
                    toastMsg('Designation', 'Successfully Edited', 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Designation', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Designation', 'Invalid Designation', 'error');
                } else if (res == 4) {
                    toastMsg('Designation', 'Designation Name already exist', 'error');
                } else {
                    toastMsg('Designation', 'Invalid Designation', 'error');
                }
            });
        }
    }

    function getDelete(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idDesignation').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idDesignation'] = $('#delete_idDesignation').val();
        if (data['idDesignation'] == '' || data['idDesignation'] == undefined || data['idDesignation'] == 0) {
            toastMsg('Designation', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/general_settings/Designation/deleteDesignationData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    $('#deleteModal').modal('hide');
                    toastMsg('Designation', 'Successfully Deleted', 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Designation', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Designation', 'Invalid Designation', 'error');
                } else {
                    toastMsg('Designation', 'Invalid Designation', 'error');
                }

            });
        }
    }
</script>