<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/pages/data-list-view.css">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Asset System</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Asset</li>
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
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="project">Project</label>
                                                <select class="select2 form-control" id="project" name="project">
                                                    <option value="0">All Projects</option>
                                                    <?php
                                                    if (isset($project) && $project != '') {
                                                        foreach ($project as $k => $v) {
                                                            echo '<option value="' . $v->proj_code . '">(' . $v->proj_code . ') ' . $v->proj_sn . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="emp">Employee</label>
                                                <select class="select2 form-control" id="emp" name="emp">
                                                    <option value="0">All Employees</option>
                                                    <?php
                                                    if (isset($employee) && $employee != '') {
                                                        foreach ($employee as $k => $e) {
                                                            echo '<option value="' . $e->empno . '">(' . $e->empno . ') ' . $e->empname . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="select2 form-control" id="category" name="category">
                                                    <option value="0">All Categories</option>
                                                    <?php
                                                    if (isset($category) && $category != '') {
                                                        foreach ($category as $k => $c) {
                                                            echo '<option value="' . $c->idCategory . '">' . $c->category . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="sop">Source of Purchase</label>
                                                <select class="select2 form-control" id="sop" name="sop">
                                                    <option value="0">All Source of Purchase</option>
                                                    <?php
                                                    if (isset($sop) && $sop != '') {
                                                        foreach ($sop as $k => $sp) {
                                                            echo '<option value="' . $sp->idSop . '">' . $sp->sopName . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <select class="select2 form-control" id="location" name="location"
                                                        onchange="changeLocation('location','sublocation')">
                                                    <option value="0">All Locations</option>
                                                    <?php
                                                    if (isset($location) && $location != '') {
                                                        foreach ($location as $k => $v) {
                                                            echo '<option value="' . $v->id . '">' . $v->location . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="sublocation">Sub Location</label>
                                                <select class="select2 form-control" id="sublocation"
                                                        name="sublocation">
                                                    <option value="0">All Sub Locations</option>
                                                    <?php
                                                    if (isset($location_sub) && $location_sub != '') {
                                                        foreach ($location_sub as $k => $sub) {
                                                            echo '<option value="' . $sub->id . '">' . $sub->location_sub . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="select2 form-control" id="status" name="status">
                                                    <option value="0">All Status</option>
                                                    <?php
                                                    if (isset($status) && $status != '') {
                                                        foreach ($status as $k => $s) {
                                                            echo '<option value="' . $s->id . '">' . $s->status_name . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="tag_pr">TAG / PR No</label>
                                                <input type="text" class="form-control" id="tag_pr" name="tag_pr">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="idAsset">Paeds ID Asset</label>
                                                <input type="text" class="form-control" id="idAsset" name="idAsset">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="writeOffNo">Write Off No</label>
                                                <input type="text" class="form-control" id="writeOffNo"
                                                       name="writeOffNo">
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="dateTo">Entry Date To</label>
                                                <input type="text" class="form-control mypickadat" id="dateTo"
                                                       name="dateTo">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="dateFrom">Entry Date From</label>
                                                <input type="text" class="form-control mypickadat" id="dateFrom"
                                                       name="dateFrom">
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

            <section id="data-list-view" class="hide main_content_div data-list-view-header">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Asset</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard cardHtml">
                                    <div class="table-responsive">
                                        <table id="my_table_asset" style="width:100%"
                                               class="table table-striped table-bordered show-child-rows display">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>PAEDS Id</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Tag NO</th>
                                                <th>Employee</th>
                                                <th>Project</th>
                                                <th>Location</th>
                                                <th>Sub Location</th>
                                                <th>Status</th>
                                                <th>PRPath</th>
                                                <th>Action</th>
                                                <th>Check</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>PAEDS Id</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Tag NO</th>
                                                <th>Employee</th>
                                                <th>Project</th>
                                                <th>Location</th>
                                                <th>Sub Location</th>
                                                <th>Status</th>
                                                <th>PRPath</th>
                                                <th>Action</th>
                                                <th>Check</th>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="row updBtn hide">
                                        <div class="col-sm-12">
                                            <button type="button"
                                                    onclick="updBtnModal()"
                                                    id="btn-Upd" class="btn btn-danger white addbtn">Update
                                                Selected Assets
                                            </button>
                                        </div>
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

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<!-- END: Content-->

<?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
    <div class="modal fade text-left" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_status"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_status">Status asset</h4>
                    <input type="hidden" id="status_idAsset" name="status_idAsset">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group">
                                <label for="change_status" class="label-control">Select Status</label>
                                <select class="select2 form-control" onchange="changeStatusSingle()"
                                        autocomplete="change_status"
                                        id="change_status" required>
                                    <option value="0" readonly disabled selected></option>
                                    <?php if (isset($status) && $status != '') {
                                        foreach ($status as $k => $s) {
                                            echo '<option value="' . $s->id . '">' . $s->status_name . '</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-12 hide status_writOff_formNo_div">
                            <div class="form-group">
                                <label for="status_writOff_formNo" class="label-control">Writ Off Form</label>
                                <input type="text" class="form-control" id="status_writOff_formNo"
                                       name="status_writOff_formNo"
                                       autocomplete="status_writOff_formNo" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-12 hide status_wo_date_div">
                            <div class="form-group">
                                <label for="status_wo_date" class="label-control">Writ Off Date</label>
                                <input type="text" class="form-control mypickadat" id="status_wo_date"
                                       name="status_wo_date"
                                       autocomplete="status_wo_date" required>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="saveStatusChange()">Save
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
    <div class="modal fade text-left" id="editAssetModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel_editAssetModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_editAssetModal">Edit Employees</h4>
                    <input type="hidden" id="delete_idPage" name="delete_idPage">
                </div>
                <div class="modal-body">
                    <p>Are you sure, you want to edit these employees?</p>
                    <div class="model_htmlcontent"></div>
                    <table width='100%'>
                        <tr>
                            <th width='50%'>Field</th>
                            <th width='50%'>Value</th>
                        </tr>
                        <tr class="summaryRow status">
                            <td class='summaryFldid summaryFldid_status' data-key="status" data-fldnme="Status">Status
                            </td>
                            <td class='summaryNewVal'>
                                <select class="select2 form-control" onchange="chkStatus(this)"
                                        autocomplete="upd_bulkstatus" name="upd_bulkstatus"
                                        id="upd_bulkstatus">
                                    <option value="0" readonly disabled selected></option>
                                    <?php if (isset($status) && $status != '') {
                                        foreach ($status as $k => $s) {
                                            echo '<option value="' . $s->id . '" data-oldkey="' . $s->id . '" data-newval="' . $s->id . '">' . $s->status_name . '</option>';
                                        }
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="summaryRow writOff_formNo_bulk hide">
                            <td class='summaryFldid  summaryFldid_writOff_formNo' data-key="writOff_formNo"
                                data-fldnme="Writ Off Form">Writ Off Form
                            </td>
                            <td class='summaryNewVal'>
                                <input type="text" class="form-control" id="writOff_formNo_bulk"
                                       name="writOff_formNo_bulk"
                                       autocomplete="writOff_formNo_bulk" required>
                            </td>
                        </tr>
                        <tr class="summaryRow wo_date_bulk hide">
                            <td class='summaryFldid summaryFldid_wo_date' data-key="wo_date"
                                data-fldnme="Writ Off Date">Writ Off Date
                            </td>
                            <td class='summaryNewVal'>
                                <input type="text" class="form-control mypickadat" id="wo_date_bulk"
                                       name="wo_date_bulk"
                                       autocomplete="wo_date_bulk" required>
                            </td>
                        </tr>

                        <tr class="summaryRow idLocation_bulk">
                            <td class='summaryFldid summaryFldid_status' data-key="idLocation" data-fldnme="Location">
                                Location
                            </td>
                            <td class='summaryNewVal'>
                                <select class="select2 form-control" id="idLocation_bulk"
                                        name="idLocation_bulk"
                                        onchange="changeLocation('idLocation_bulk','idSubLocation_bulk')"
                                        required>
                                    <option value="0" readonly disabled selected></option>
                                    <?php
                                    if (isset($location) && $location != '') {
                                        foreach ($location as $k => $v) {
                                            echo '<option value="' . $v->id . '">' . $v->location . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr class="summaryRow idSubLocation">
                            <td class='summaryFldid summaryFldid_status' data-key="idSubLocation"
                                data-fldnme="Sub Location">Sub Location
                            </td>
                            <td class='summaryNewVal'>
                                <select class="select2 form-control"
                                        id="idSubLocation_bulk"
                                        name="idSubLocation_bulk" autocomplete="idSubLocation_bulk" required>
                                    <option value="0" readonly disabled selected></option>
                                </select>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updBtnSave()">Save</button>
                </div>
                <br/><br/>
                <div class="m-1">
                    <h5 class=" bg-primary white  p-1">Summary of Changes (Bulk Update)</h5>
                    <table id="tblaudit" width='100%'>
                        <thead>
                        <tr>
                            <th>PAEDS ID</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Sub Location</th>
                        </tr>
                        </thead>
                        <tbody class="tblaudit_body">
                        </tbody>
                    </table>
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
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete asset</h4>
                    <input type="hidden" id="delete_idAsset" name="delete_idAsset">
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

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>


<script src="<?php echo base_url() ?>assets/js/scripts/ui/data-list-view.js"></script>
<script>

    $(document).ready(function () {
        mydate();
        getData();
    });

    function mydate() {
        $('.mypickadat').pickadate({
            selectYears: true,
            selectMonths: true,
            min: new Date(2019, 12, 1),
            max: false,
            format: 'dd-mm-yyyy'
        });
    }

    function chkStatus(obj) {
        var status = $('#upd_bulkstatus').val();
        if (status == 1) {

            $('.writOff_formNo_bulk').addClass('hide');
            $('.wo_date_bulk').addClass('hide');
        } else {
            $('.writOff_formNo_bulk').removeClass('hide');
            $('.wo_date_bulk').removeClass('hide');
        }
    }

    function updBtnToggle() {
        var assets = [];
        var assets_no = '';
        var asset_count = $('#my_table_asset').find('.checkboxes');
        for (var i = 0; i < asset_count.length; i++) {
            assets_no = $(asset_count[i]).attr('data-id');
            if ($(asset_count[i]).is(':checked')) {
                assets.push({'assets_no': assets_no});
            }
        }
        if (assets.length >= 1) {
            $('.updBtn').removeClass('hide').addClass('show');
        } else {
            $('.updBtn').removeClass('show').addClass('hide');
        }
    }

    function updBtnModal() {
        let assets = [];
        let assets_no = '';
        let asset_count = $('#my_table_asset').find('.checkboxes');
        let counter = 0;
        let empHtml = '';

        var oldAssetData = '';

        let str = '';

        for (var i = 0; i < asset_count.length; i++) {
            assets_no = $(asset_count[i]).attr('data-id');
            if ($(asset_count[i]).is(':checked')) {
                oldAssetData += "<tr><td>" + assets_no + "</td>"
                    + "<td>" + $(asset_count[i]).parents('tr').find('.mystatus').attr('data-status_name') + "</td>"
                    + "<td>" + $(asset_count[i]).parents('tr').find('.loc').text() + "</td>"
                    + "<td>" + $(asset_count[i]).parents('tr').find('.sub_loc').text() + "</td>"
                    + "</tr>";

                assets.push({'assets_no': assets_no});
                counter++;
            }
        }

        if (assets.length >= 1) {
            $.each(assets, function (i, v) {
                if (i == 0) {
                    empHtml += v.assets_no;
                } else {
                    empHtml += ', ' + v.assets_no;
                }
            });
            str += '<p>Assets: <span  class="danger">' + empHtml + '</span><br/><span>Number of selected assets: ' + counter + '</span></p>';
            $(".model_htmlcontent").html(str);

            $(".tblaudit_body").html(oldAssetData);

            $("#editAssetModal").modal('show');
            pickDate();
        } else {
            toastMsg('Asset', 'Please select Asset', 'error');
        }
    }


    function updBtnSave() {
        var data = {};
        data['status'] = $('#upd_bulkstatus').val();
        data['writOff_formNo'] = $('#writOff_formNo_bulk').val();
        data['wo_date'] = $('#wo_date_bulk').val();
        data['idLocation'] = $('#idLocation_bulk').val();
        data['idSubLocation'] = $('#idSubLocation_bulk').val();

        var assets = [];
        let count = $('#my_table_asset').find('.checkboxes');
        for (let i = 0; i < count.length; i++) {
            assets_no = $(count[i]).attr('data-id');
            if ($(count[i]).is(':checked')) {
                assets.push(assets_no);
            }
        }
        data['assets'] = assets;

        if (data['assets'].length >= 1) {
            $('#btn-Edit').css('display', 'none');
            CallAjax('<?php echo base_url('index.php/asset_controllers/Assets/bulkupdate'); ?>', data, "POST", function (result) {
                if (result == 1) {
                    toastMsg('Success', 'Successfully Changed', 'success');
                    $("#editAssetModal").modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (result == 3) {
                    toastMsg('Error', 'Invalid Asset', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });

        } else {
            toastMsg('Asset', 'Please select Asset first', 'error');
        }
    }

    function updBtnSave2() {
        var data = {};
        let assets = [];
        let assets_no = '';
        let results = [];
        let flag = 0;

        let isinputgiven = false;

        let count = $('#my_table_asset').find('.checkboxes');

        for (let i = 0; i < count.length; i++) {
            assets_no = $(count[i]).attr('data-id');
            var summaryID = $(count[i]).attr('data-oldval');
            if ($(count[i]).is(':checked')) {
                assets.push({'assets_no': assets_no});
                $(".summaryRow").each(function () {
                    let summaryVal;
                    let summaryFldid = $(this).find('.summaryFldid').attr('data-key');
                    console.log("summaryFldid - " + summaryFldid);
                    var summaryNewVal = $(this).find('.summaryNewVal').find('option:selected').attr("data-newval");
                    console.log("summaryNewVal - " + summaryNewVal);
                    if (summaryNewVal == "undefined" || summaryNewVal == undefined || summaryNewVal == "" || summaryNewVal == "null" || summaryNewVal == "NULL") {
                        summaryVal = "";
                    } else {
                        summaryVal = $(this).find('.summaryNewVal').find('option:selected').attr("data-newval");
                    }

                    let summaryOldVal = $(count[i]).parents('tr').find(summaryFldid).attr('data-oldval');
                    let summaryFldName = $(this).find('.summaryFldid').attr('data-fldnme');
                    if (summaryFldName == null || summaryFldName == undefined) {
                        $(this).find('.summaryFldName').addClass('error');
                        flag = 1;
                        return false;
                    }


                    if (parseInt(summaryVal) != parseInt(summaryOldVal)) {
                        if (summaryVal != "") {
                            console.log("summaryVal - " + summaryVal + " summaryFldid - " + summaryFldid + " summaryFldName - " + summaryFldName + " summaryOldVal - " + summaryOldVal);
                            isinputgiven = true;
                            results.push({
                                'assets_no': assets_no,
                                'summaryFldid': summaryFldid,
                                'summaryFldName': summaryFldName,
                                'summaryVal': summaryVal,
                                'summaryOldVal': summaryOldVal,
                                'summaryID': summaryID
                            });
                        }
                    }
                });
            }
        }

        if (isinputgiven == true) {
            if (assets.length >= 1) {
                $('#btn-Edit').css('display', 'none');
                let formData = new FormData();
                data['results'] = results;
                formData.append('data', JSON.stringify(data));
                CallAjax('<?php echo base_url('index.php/asset_controllers/Add_asset/bulkupdate'); ?>', formData, "POST", function (result) {
                    if (result == 1) {
                        toastMsg('Success', 'Successfully Changed', 'success');
                        setTimeout(function () {
                            $('#btn-Edit').css('display', 'block');
                            window.location.reload();
                        }, 2000);
                    } else if (result == 3) {
                        toastMsg('Error', 'Invalid Employee', 'error');
                    } else {
                        toastMsg('Error', 'Something went wrong', 'error');
                    }
                }, true);

            } else {
                toastMsg('Employee', 'Please select Employee first', 'error');
            }
        } else {
            toastMsg('Error', 'Please select at least one field', 'error');
        }
    }


    function format(d) {
        var html = '';
        html += '<div class="row">';
        html += '<div class="col-4">';
        html += '<p>PAEDS ID: <span class="text-primary">' + (d.paeds_id != '' && d.paeds_id != undefined && d.paeds_id != null ? d.paeds_id : '') + '</span></p>';
        html += '<p>Category: <span class="text-primary">' + (d.category != '' && d.category != undefined && d.category != null ? d.category : '') + '</span></p>';
        html += '<p>Desc: <span class="text-primary">' + (d.desc != '' && d.desc != undefined && d.desc != null ? d.desc : '') + '</span></p>';
        html += '<p>Model: <span class="text-primary">' + (d.model != '' && d.model != undefined && d.model != null ? d.model : '') + '</span></p>';
        html += '<p>Product No: <span class="text-primary">' + (d.product_no != '' && d.product_no != undefined && d.product_no != null ? d.product_no : '') + '</span></p>';
        html += '<p>Serial No: <span class="text-primary">' + (d.serial_no != '' && d.serial_no != undefined && d.serial_no != null ? d.serial_no : '') + '</span></p>';
        html += '<p>Tag No: <span class="text-primary">' + (d.tag_no != '' && d.tag_no != undefined && d.tag_no != null ? d.tag_no : '') + '</span></p>';
        html += '<p>PO No: <span class="text-primary">' + (d.po_no != '' && d.po_no != undefined && d.po_no != null ? d.po_no : '') + '</span></p>';
        html += '<p>Cost: <span class="text-primary">' + (d.cost != '' && d.cost != undefined && d.cost != null ? d.cost : '') + '</span></p>';
        html += '<p>Currency: <span class="text-primary">' + (d.idCurrency != '' && d.idCurrency != undefined && d.idCurrency != null ? d.idCurrency : '') + '</span></p>';
        html += '<p>Source Of Purchase: <span class="text-primary">' + (d.idSourceOfPurchase != '' && d.idSourceOfPurchase != undefined && d.idSourceOfPurchase != null ? d.idSourceOfPurchase : '') + '</span></p>';
        html += '<p>Employee: <span class="text-primary">' + (d.emp != '' && d.emp != undefined && d.emp != null ? d.emp : '') + '</span></p>';
        html += '<p>Responsible Person: <span class="text-primary">' + (d.resp_person_name != '' && d.resp_person_name != undefined && d.resp_person_name != null ? d.resp_person_name : '') + '</span></p>';
        html += '</div>';
        html += '<div class="col-4">';
        html += '<p>OU: <span class="text-primary">' + (d.ou != '' && d.ou != undefined && d.ou != null ? d.ou : '') + '</span></p>';
        html += '<p>Account: <span class="text-primary">' + (d.account != '' && d.account != undefined && d.account != null ? d.account : '') + '</span></p>';
        html += '<p>Dept: <span class="text-primary">' + (d.dept != '' && d.dept != undefined && d.dept != null ? d.dept : '') + '</span></p>';
        html += '<p>Fund: <span class="text-primary">' + (d.fund != '' && d.fund != undefined && d.fund != null ? d.fund : '') + '</span></p>';
        html += '<p>Project: <span class="text-primary">' + (d.proj != '' && d.proj != undefined && d.proj != null ? d.proj : '') + '</span></p>';
        html += '<p>Prog: <span class="text-primary">' + (d.prog != '' && d.prog != undefined && d.prog != null ? d.prog : '') + '</span></p>';
        html += '<p>Location: <span class="text-primary">' + (d.loc != '' && d.loc != undefined && d.loc != null ? d.loc : '') + '</span></p>';
        html += '<p>Sub Location: <span class="text-primary">' + (d.sub_loc != '' && d.sub_loc != undefined && d.sub_loc != null ? d.sub_loc : '') + '</span></p>';
        html += '<p>Area: <span class="text-primary">' + (d.area != '' && d.area != undefined && d.area != null ? d.area : '') + '</span></p>';
        html += '</div>';
        html += '<div class="col-4">';
        html += '<p>Verification Status: <span class="text-primary">' + (d.verification_status != '' && d.verification_status != undefined && d.verification_status != null ? d.verification_status : '') + '</span></p>';
        html += '<p>Last Verify Date: <span class="text-primary">' + (d.last_verify_date != '' && d.last_verify_date != undefined && d.last_verify_date != null ? d.last_verify_date : '') + '</span></p>';
        html += '<p>Due Date: <span class="text-primary">' + (d.due_date != '' && d.due_date != undefined && d.due_date != null ? d.due_date : '') + '</span></p>';
        html += '<p>Purchase Date: <span class="text-primary">' + (d.pur_date != '' && d.pur_date != undefined && d.pur_date != null ? d.pur_date : '') + '</span></p>';
        html += '<p>Status: <span class="text-primary">' + (d.status != '' && d.status != undefined && d.status != null ? d.status : '') + '</span></p>';
        html += '<p>WritOff formNo: <span class="text-primary">' + (d.writOff_formNo != '' && d.writOff_formNo != undefined && d.writOff_formNo != null ? d.writOff_formNo : '') + '</span></p>';
        html += '<p>WO Date: <span class="text-primary">' + (d.wo_date != '' && d.wo_date != undefined && d.wo_date != null ? d.wo_date : '') + '</span></p>';
        html += '<p>Remarks: <span class="text-primary">' + (d.remarks != '' && d.remarks != undefined && d.remarks != null ? d.remarks : '') + '</span></p>';
        html += '</div>';
        html += '</div>';


        return html;
    }

    function getData() {
        var data = {};
        data['project'] = $('#project').val();
        data['emp'] = $('#emp').val();
        data['category'] = $('#category').val();
        data['sop'] = $('#sop').val();
        data['location'] = $('#location').val();
        data['sublocation'] = $('#sublocation').val();
        data['status'] = $('#status').val();
        data['tag_pr'] = $('#tag_pr').val();
        data['idAsset'] = $('#idAsset').val();
        data['writeOffNo'] = $('#writeOffNo').val();
        data['dateTo'] = $('#dateTo').val();
        data['dateFrom'] = $('#dateFrom').val();

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
        var dt = $('#my_table_asset').DataTable({
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
                "url": "<?php echo base_url() . 'index.php/asset_controllers/Assets/getAsset' ?>",
                "method": "POST",
                "data": data
            },
            columns: [
                {
                    "width": "3%",
                    "class": "details-control",
                    "orderable": false,
                    "data": null,
                    "defaultContent": ""
                },
                {"data": "paeds_id", "class": "paeds_id"},
                {"data": "category", "class": "category"},
                {"data": "desc", "class": "desc"},
                {"data": "tag", "class": "tag"},
                {"data": "emp", "class": "empl"},
                {"data": "proj", "class": "proj"},
                {"data": "loc", "class": "loc"},
                {"data": "sub_loc", "class": "sub_loc"},
                {"data": "status"},
                {"data": "pr_path"},
                {"data": "Action"},
                {"data": "check"}
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
        $('#my_table_asset tbody').on('click', 'tr td.details-control', function () {
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


    function changeStatus(obj) {
        var id = $(obj).attr('data-id');
        var status = $(obj).attr('data-status');
        $('#status_idAsset').val(id);
        $("#change_status").val(status).select2("val", status);
        $('#statusModal').modal('show');
    }

    function changeStatusSingle() {
        var status = $('#change_status').val();
        if (status == 1) {
            $('.status_writOff_formNo_div').addClass('hide');
            $('.status_wo_date_div').addClass('hide');
        } else {
            $('.status_writOff_formNo_div').removeClass('hide');
            $('.status_wo_date_div').removeClass('hide');
        }
    }

    function saveStatusChange() {
        var data = {};
        data['idAsset'] = $('#status_idAsset').val();
        data['status'] = $('#change_status').val();
        data['writOff_formNo'] = $('#status_writOff_formNo').val();
        data['wo_date'] = $('#status_wo_date').val();
        if (data['idAsset'] == '' || data['idAsset'] == undefined || data['idAsset'] == 0) {
            toastMsg('Asset', 'Invalid Id Asset', 'error');
            return false;
        } else if (data['status'] == '' || data['status'] == undefined || data['status'] == 0) {
            toastMsg('Status', 'Invalid Status', 'error');
            return false;
        } else {
            if (data['status'] != 1 && (data['writOff_formNo'] == '' || data['writOff_formNo'] == undefined || data['writOff_formNo'] == 0)) {
                toastMsg('Writ Off Form No', 'Invalid Form No', 'error');
                return false;
            } else if (data['status'] != 1 && (data['wo_date'] == '' || data['wo_date'] == undefined || data['wo_date'] == 0)) {
                toastMsg('Writ Date', 'Invalid Writ Date', 'error');
                return false;
            } else {
                CallAjax('<?php echo base_url('index.php/asset_controllers/Assets/changeStatus')?>', data, 'POST', function (res) {
                    if (res == 1) {
                        toastMsg('asset', 'Successfully Changes', 'success');
                        $('#deleteModal').modal('hide');
                        setTimeout(function () {
                            window.location.reload();
                        }, 500);
                    } else if (res == 3) {
                        toastMsg('asset', 'Invalid Asset Id', 'error');
                    } else {
                        toastMsg('asset', 'Something went wrong', 'error');
                    }
                });
            }

        }
    }

    function getDelete(obj) {
        var id = $(obj).attr('data-id');
        $('#delete_idAsset').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idAsset'] = $('#delete_idAsset').val();
        if (data['idAsset'] == '' || data['idAsset'] == undefined || data['idAsset'] == 0) {
            toastMsg('Asset', 'Invalid Id Asset', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/asset_controllers/Assets/deleteAsset')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('asset', 'Successfully Deleted', 'success');
                    $('#deleteModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 3) {
                    toastMsg('asset', 'Invalid Asset Id', 'error');
                } else {
                    toastMsg('asset', 'Something went wrong', 'error');
                }
            });
        }
    }

</script>