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
                        <h2 class="content-header-title float-left mb-0">Title / Designation</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Title / Designation</a>
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
                                <h4 class="card-title"></h4>
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
                                            if (isset($data) && $data != '') {
                                                foreach ($data as $v) {
                                                    $SNo++; ?>
                                                    <tr>
                                                        <td><?php echo $SNo ?></td>
                                                        <td class="mycol"
                                                            data-txt="<?php echo $v->desig ?>"><?php echo $v->desig ?></td>
                                                        <td class="mycolband"
                                                            data-bandid="<?php echo $v->bandid ?>"
                                                            data-bandtxt="<?php echo $v->band ?>"><?php echo $v->band ?></td>
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
                <h5 class="modal-title" id="addLocationModalLabel">Add Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="location" class="label-control">Designation</label>
                <input type="text" class="form-control" id="designation" maxlength="80" name="designation"
                       style="text-transform: capitalize;"
                       onkeypress="return lettersOnly_WithSpace();"
                       autocomplete="designation" required>
                <label for="band" class="label-control">Band</label>
                <?php
                $html_options_Q = '<option value="0">&nbsp;</option>';
                $htmlQ = '';
                $oldLabelQ = '';
                $oldValQ = '';
                if (isset($band) && $band != '') {
                    foreach ($band as $v) {
                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->ddlband) {
                            $oldValQ = $v->id;
                            $oldLabelQ = $v->band;
                            $html_options_Q .= '<option data-text="' . $v->band . '" selected="selected" value="' . $v->id . '">' . $v->band . '</option>';
                        } else {
                            $html_options_Q .= '<option data-text="' . $v->band . '" value="' . $v->id . '">' . $v->band . '</option>';
                        }
                    }
                }
                $htmlQ .= '<select class="select2 form-control" id="ddlband"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="ddlband">';
                $htmlQ .= $html_options_Q;
                $htmlQ .= '</select>';
                echo $htmlQ;
                ?>
            </div>
            <div class="modal-footer">
                <button id="cmdconfirm" type="button" class="btn grey btn-primary" onclick="addDesignation();">Save
                </button>
                <button id="cmdUpdate" type="button" class="btn grey btn-primary" onclick="editDesignation();">Update
                </button>
                <button type="button" id="cmdCancel" name="cmdCancel" class="btn btn-primary" data-dismiss="modal">
                    Close
                </button>
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
                <h4 class="modal-title white" id="myModalLabel_delete">Delete Designation</h4>
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

    $(document).on("click", "#cmdCancel", function () {
        data = [];
    });

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

        $("#location").val("");
        $("#cmdconfirm").text("Save");
        $("#addLocationModal").modal('show');
        $("#addLocationModalLabel").text("Add Designation");
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

        let bandid = $(obj).parent('td').prev('td').attr('data-bandid');
        let band = $(obj).parent('td').prev('td').attr('data-bandtxt');
        let desig = $(obj).parent('td').prev('td').prev('td').attr('data-txt');

        data.push({"ddlband": $(obj).parent('td').prev('td').attr('data-bandid')});

        $("#ddlband option").each(function () {
            if ($(this).text() == band) {
                $("#ddlband").val($(this).val()).trigger('change');
            }
        });


        $("#cmdconfirm").text("Update");

        $("#ddlband").val(band);
        $("#designation").val(desig);

        $("#addLocationModal").modal('show');
        $("#addLocationModalLabel").text("Update Designation");

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
            CallAjax('<?php echo base_url('index.php/hr_controllers/EmpDesig/deleteData')?>', data, 'POST', function (res) {
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


    function addDesignation() {
        let addData = {};
        addData["id"] = "0";
        addData["ddlband"] = $('#ddlband').val();
        addData["desig"] = $('#designation').val();


        if ($('#designation').val() == '' || $('#designation').val() == undefined ||
            $('#designation').val() == 0 || $('#designation').val() == null ||
            $('#designation').val() == 'NULL'
        ) {

            toastMsg('Group', 'Please enter designation', 'error');
            $('#designation').focus();
            return false;

        } else if ($("#ddlband").val() == "" || $("#ddlband").val() == undefined ||
            $("#ddlband").val() == "0" || $("#ddlband").val() == null ||
            $("#ddlband").val() == "NULL"
        ) {
            toastMsg('Group', 'Please select band', 'error');
            $('#ddlband').select2('focus');
            return false;

        } else {

            CallAjax('<?php echo base_url('index.php/hr_controllers/EmpDesig/getDesignationAlreadyExists'); ?>', addData, 'POST', function (result) {

                if (result != '' && result != null) {
                    let a = JSON.parse(result);

                    try {
                        if (a[0] != null) {
                            toastMsg('Error', 'Designation already exists', 'error');
                            $("#designation").focus();
                        } else {

                            CallAjax('<?php echo base_url('index.php/hr_controllers/EmpDesig/addDesignation')?>', addData, 'POST', function (res) {
                                if (res == 1) {
                                    //$('#deleteModal').modal('hide');
                                    toastMsg('Group', 'Record Successfully', 'success');
                                    setTimeout(function () {
                                        //window.location.reload();
                                        window.location.href = '<?php echo base_url('index.php/hr_controllers/EmpDesig')?>';
                                    }, 500);
                                } else if (res == 2) {
                                    toastMsg('Group', 'Something went wrong', 'error');
                                } else if (res == 3) {
                                    toastMsg('Group', 'Invalid Designation', 'error');
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


    function editDesignation() {
        /*data.push({"location": $('#location').val()});
        console.log(data);*/
        let editData = {};
        editData["id"] = data[0].id;
        editData["ddlband"] = $('#ddlband').val();
        editData["desig"] = $('#designation').val();


        if ($('#designation').val() == '' || $('#designation').val() == undefined ||
            $('#designation').val() == 0 || $('#designation').val() == null ||
            $('#designation').val() == 'NULL'
        ) {

            toastMsg('Group', 'Please enter designation', 'error');
            $('#designation').focus();
            return false;

        } else if (data[1].ddlband == "" || data[1].ddlband == undefined ||
            data[1].ddlband == "0" || data[1].ddlband == null ||
            data[1].ddlband == "NULL"
        ) {

            toastMsg('Group', 'Please select band', 'error');
            $('#ddlband').select2('focus');
            return false;
        } else {


            CallAjax('<?php echo base_url('index.php/hr_controllers/EmpDesig/getDesignationAlreadyExists'); ?>', editData, 'POST', function (result) {

                if (result != '' && result != null) {
                    let a = JSON.parse(result);

                    try {
                        if (a[0] != null) {
                            toastMsg('Error', 'Designation already exists', 'error');
                            $("#designation").focus();
                        } else {

                            CallAjax('<?php echo base_url('index.php/hr_controllers/EmpDesig/editDesignation')?>', editData, 'POST', function (res) {

                                if (res == 1) {
                                    //$('#deleteModal').modal('hide');
                                    toastMsg('Group', 'Record Successfully', 'success');
                                    setTimeout(function () {
                                        data = {};
                                        //window.location.reload();
                                        window.location.href = '<?php echo base_url('index.php/hr_controllers/EmpDesig')?>';
                                    }, 500);
                                } else if (res == 2) {
                                    toastMsg('Group', 'Something went wrong', 'error');
                                } else if (res == 3) {
                                    toastMsg('Group', 'Invalid Designation', 'error');
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