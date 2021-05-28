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
                        <h2 class="content-header-title float-left mb-0">Band</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">General Settings</a>
                                </li>
                                <li class="breadcrumb-item active">Band
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
                                <h4 class="card-title">Band</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                            <tr>
                                                <th>SNo</th>
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
                    <h4 class="modal-title white" id="myModalLabel_add">Add Band</h4>
                </div>
                <div class="modal-body">
                    <div class="form-Band">
                        <label for="BandName">Band: </label>
                        <input type="text" class="form-control BandName" id="BandName">
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
                    <h4 class="modal-title white" id="myModalLabel_edit">Edit Band</h4>
                    <input type="hidden" id="edit_idBand" name="edit_idBand">
                </div>
                <div class="modal-body">
                    <div class="form-Band">
                        <label for="edit_BandName">Band: </label>
                        <input type="text" class="form-control edit_BandName" id="edit_BandName">
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
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete Band</h4>
                    <input type="hidden" id="delete_idBand" name="delete_idBand">
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
        $('#BandName').css('border', '1px solid #babfc7');
        var data = {};
        data['BandName'] = $('#BandName').val();
        if (data['BandName'] == '' || data['BandName'] == undefined) {
            $('#BandName').css('border', '1px solid red');
            toastMsg('Band', 'Invalid Band Name', 'error');
        } else {
            showloader();
            $('.mybtn').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/general_settings/Band/addBandData'); ?>', data, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Successfully inserted', 'success');
                    $('#addModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (result == 3) {
                    toastMsg('Band', 'Invalid Band Name', 'error');
                } else if (result == 4) {
                    toastMsg('Band', 'Band Name already exist', 'error');
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
            CallAjax('<?php echo base_url('index.php/general_settings/Band/getBandEdit')?>', data, 'POST', function (result) {
                if (result != '' && JSON.parse(result).length > 0) {
                    var a = JSON.parse(result);
                    try {
                        $('#edit_idBand').val(data['id']);
                        $('#edit_BandName').val(a[0]['band']);
                    } catch (e) {
                    }
                    $('#editModal').modal('show');
                } else {
                    toastMsg('Band', 'Invalid Band', 'error');
                }
            });
        }
    }

    function editData() {
        $('#edit_BandName').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idBand'] = $('#edit_idBand').val();
        data['BandName'] = $('#edit_BandName').val();
        if (data['idBand'] == '' || data['idBand'] == undefined || data['idBand'].length < 1) {
            flag = 1;
            return false;
        }
        if (data['BandName'] == '' || data['BandName'] == undefined || data['BandName'].length < 1) {
            $('#edit_BandName').css('border', '1px solid red');
            toastMsg('Band', 'Invalid Band Name', 'error');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?php echo base_url('index.php/general_settings/Band/editBandData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    $('#editModal').modal('hide');
                    toastMsg('Band', 'Successfully Edited', 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Band', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Band', 'Invalid Band', 'error');
                } else if (res == 4) {
                    toastMsg('Band', 'Band Name already exist', 'error');
                } else {
                    toastMsg('Band', 'Invalid Band', 'error');
                }
            });
        }
    }

    function getDelete(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idBand').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idBand'] = $('#delete_idBand').val();
        if (data['idBand'] == '' || data['idBand'] == undefined || data['idBand'] == 0) {
            toastMsg('Band', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/general_settings/Band/deleteBandData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    $('#deleteModal').modal('hide');
                    toastMsg('Band', 'Successfully Deleted', 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Band', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Band', 'Invalid Band', 'error');
                } else if (res == 4) {
                    toastMsg('Band', 'Band Name already exist', 'error');
                } else {
                    toastMsg('Band', 'Invalid Band', 'error');
                }

            });
        }
    }
</script>