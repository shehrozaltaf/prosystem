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
                        <h2 class="content-header-title float-left mb-0">Source Of Purchase</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">General Settings</a>
                                </li>
                                <li class="breadcrumb-item active">Source Of Purchase
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
                                <h4 class="card-title">Source Of Purchase</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Name</th>
                                                <th>Value</th>
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
                                                        <td><?php echo $data->sopName ?></td>
                                                        <td><?php echo $data->sopValue ?></td>
                                                        <td data-id="<?php echo $data->idSop ?>">
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
                                                <th>Name</th>
                                                <th>Value</th>
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
                    <h4 class="modal-title white" id="myModalLabel_add">Add Source Of Purchase</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="SourceOfPurchaseName">Source Of Purchase Name: </label>
                        <input type="text" class="form-control SourceOfPurchaseName" id="SourceOfPurchaseName">
                    </div>
                    <div class="form-group">
                        <label for="SourceOfPurchaseValue">Source Of Purchase Value: </label>
                        <input type="text" class="form-control SourceOfPurchaseValue" id="SourceOfPurchaseValue">
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
                    <h4 class="modal-title white" id="myModalLabel_edit">Edit SourceOfPurchase</h4>
                    <input type="hidden" id="edit_idSourceOfPurchase" name="edit_idSourceOfPurchase">
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_SourceOfPurchaseName">Source Of Purchase Name: </label>
                        <input type="text" class="form-control edit_SourceOfPurchaseName"
                               id="edit_SourceOfPurchaseName">
                    </div>
                    <div class="form-group">
                        <label for="edit_SourceOfPurchaseValue">Source Of Purchase Value: </label>
                        <input type="text" class="form-control edit_SourceOfPurchaseValue"
                               id="edit_SourceOfPurchaseValue">
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
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete Source Of Purchase</h4>
                    <input type="hidden" id="delete_idSourceOfPurchase" name="delete_idSourceOfPurchase">
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
        $('#SourceOfPurchaseName').css('border', '1px solid #babfc7');
        var data = {};
        data['SourceOfPurchaseName'] = $('#SourceOfPurchaseName').val();
        data['SourceOfPurchaseValue'] = $('#SourceOfPurchaseValue').val();
        if (data['SourceOfPurchaseName'] == '' || data['SourceOfPurchaseName'] == undefined) {
            $('#SourceOfPurchaseName').css('border', '1px solid red');
            toastMsg('Error', 'Invalid Source Of Purchase Name', 'error');
            return false;
        }
        if (data['SourceOfPurchaseValue'] == '' || data['SourceOfPurchaseValue'] == undefined) {
            $('#SourceOfPurchaseValue').css('border', '1px solid red');
            toastMsg('Error', 'Invalid Source Of Purchase Value', 'error');
        } else {
            showloader();
            $('.mybtn').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/general_settings/SourceOfPurchase/addSourceOfPurchaseData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    $('#addModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (result == 3) {
                    toastMsg('SourceOfPurchase', 'Invalid SourceOfPurchase Name', 'error');
                } else if (result == 4) {
                    toastMsg('SourceOfPurchase', 'SourceOfPurchase Name already exist', 'error');
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
            CallAjax('<?php echo base_url('index.php/general_settings/SourceOfPurchase/getSourceOfPurchaseEdit')?>', data, 'POST', function (result) {
                if (result != '' && JSON.parse(result).length > 0) {
                    var a = JSON.parse(result);
                    try {
                        $('#edit_idSourceOfPurchase').val(data['id']);
                        $('#edit_SourceOfPurchaseName').val(a[0]['sopName']);
                        $('#edit_SourceOfPurchaseValue').val(a[0]['sopValue']);
                    } catch (e) {
                    }
                    $('#editModal').modal('show');
                } else {
                    toastMsg('SourceOfPurchase', 'Invalid SourceOfPurchase', 'error');
                }
            });
        }
    }

    function editData() {
        $('#edit_SourceOfPurchaseName').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idSourceOfPurchase'] = $('#edit_idSourceOfPurchase').val();
        data['SourceOfPurchaseName'] = $('#edit_SourceOfPurchaseName').val();
        data['SourceOfPurchaseValue'] = $('#edit_SourceOfPurchaseValue').val();
        if (data['idSourceOfPurchase'] == '' || data['idSourceOfPurchase'] == undefined || data['idSourceOfPurchase'].length < 1) {
            flag = 1;
            toastMsg('SourceOfPurchase', 'Invalid Source Of Purchase', 'error');
            return false;
        }
        if (data['SourceOfPurchaseName'] == '' || data['SourceOfPurchaseName'] == undefined || data['SourceOfPurchaseName'].length < 1) {
            $('#edit_SourceOfPurchaseName').css('border', '1px solid red');
            toastMsg('SourceOfPurchase', 'Invalid Source Of Purchase Name', 'error');
            flag = 1;
            return false;
        }
        if (data['SourceOfPurchaseValue'] == '' || data['SourceOfPurchaseValue'] == undefined || data['SourceOfPurchaseValue'].length < 1) {
            $('#edit_SourceOfPurchaseValue').css('border', '1px solid red');
            toastMsg('SourceOfPurchase', 'Invalid Source Of Purchase Value', 'error');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?php echo base_url('index.php/general_settings/SourceOfPurchase/editSourceOfPurchaseData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    $('#editModal').modal('hide');
                    toastMsg('Source Of Purchase', 'Successfully Edited', 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Source Of Purchase', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Source Of Purchase', 'Invalid Source Of Purchase', 'error');
                } else if (res == 4) {
                    toastMsg('Source Of Purchase', 'Source Of Purchase Name already exist', 'error');
                } else {
                    toastMsg('Source Of Purchase', 'Invalid Source Of Purchase', 'error');
                }
            });
        }
    }

    function getDelete(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idSourceOfPurchase').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idSourceOfPurchase'] = $('#delete_idSourceOfPurchase').val();
        if (data['idSourceOfPurchase'] == '' || data['idSourceOfPurchase'] == undefined || data['idSourceOfPurchase'] == 0) {
            toastMsg('SourceOfPurchase', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/general_settings/SourceOfPurchase/deleteSourceOfPurchaseData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    $('#deleteModal').modal('hide');
                    toastMsg('Source Of Purchase', 'Successfully Deleted', 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Source Of Purchase', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Source Of Purchase', 'Invalid Source Of Purchase', 'error');
                } else {
                    toastMsg('Source Of Purchase', 'Invalid Source Of Purchase', 'error');
                }

            });
        }
    }
</script>