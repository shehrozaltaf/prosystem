<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/dt/css/datatable/buttons.bootstrap4.min.css">

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
                        <h2 class="content-header-title float-left mb-0">Employee System</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Employee</li>
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
                                                <label for="projects">Working Project</label>
                                                <select class="select2 form-control" id="projects" name="projects">
                                                    <option value="0">All Projects</option>
                                                    <?php
                                                    if (isset($project) && $project != '') {
                                                        foreach ($project as $k => $v) {
                                                            echo '<option value="' . $v->proj_code . '" ' . (isset($searchData['projects']) && $searchData['projects'] == $v->proj_code ? 'selected' : '') . '>(' . $v->proj_code . ') ' . $v->proj_sn . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <select class="select2 form-control" id="location" name="location">
                                                    <option value="0">All Locations</option>
                                                    <?php
                                                    if (isset($location) && $location != '') {
                                                        foreach ($location as $k => $v) {
                                                            echo '<option value="' . $v->id . '" ' . (isset($searchData['location']) && $searchData['location'] == $v->id ? 'selected' : '') . '>' . $v->location . '</option>';
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
                                                            echo '<option value="' . $sub->id . '"  ' . (isset($searchData['sublocation']) && $searchData['sublocation'] == $sub->id ? 'selected' : '') . '>' . $sub->location_sub . '</option>';
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
                                                        foreach ($category as $k => $v) {
                                                            echo '<option value="' . $v->id . '" ' . (isset($searchData['category']) && $searchData['category'] == $v->id ? 'selected' : '') . '>' . $v->category . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="entity">Entity</label>
                                                <select class="select2 form-control" id="entity" name="entity">
                                                    <option value="0">All Entity</option>
                                                    <?php
                                                    if (isset($entity) && $entity != '') {
                                                        foreach ($entity as $k => $v) {
                                                            echo '<option value="' . $v->id . '" ' . (isset($searchData['entity']) && $searchData['entity'] == $v->id ? 'selected' : '') . '>' . $v->entity . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="band">Band</label>
                                                <select class="select2 form-control" id="band" name="band">
                                                    <option value="0">All Bands</option>
                                                    <?php
                                                    if (isset($band) && $band != '') {
                                                        foreach ($band as $k => $v) {
                                                            echo '<option value="' . $v->id . '" ' . (isset($searchData['band']) && $searchData['band'] == $v->id ? 'selected' : '') . '>' . $v->band . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="designation">Designation</label>
                                                <select class="select2 form-control" id="designation"
                                                        name="designation">
                                                    <option value="0">All Designation</option>
                                                    <?php
                                                    if (isset($designation) && $designation != '') {
                                                        foreach ($designation as $k => $v) {
                                                            echo '<option value="' . $v->id . '" ' . (isset($searchData['designation']) && $searchData['designation'] == $v->id ? 'selected' : '') . '>' . $v->desig . '</option>';
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
                                                    <option value="0" selected>All Status</option>
                                                    <?php if (isset($status) && $status != '') {
                                                        foreach ($status as $k => $s) {
                                                            echo '<option value="' . $s->id . '"  ' . (isset($searchData['status']) && $searchData['status'] == $s->id ? 'selected' : '') . '>' . $s->status . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="hiredatefrom">Hire / Rehire Date From</label>
                                                <input type="text" class="form-control pickadate-short-string"
                                                       id="hiredatefrom"
                                                       name="hiredatefrom"
                                                       placeholder="Hire / Rehire Date From"
                                                       value="<?php echo(isset($searchData['hiredatefrom']) && $searchData['hiredatefrom'] != '' ? $searchData['hiredatefrom'] : '') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="hiredateto">Hire / Rehire Date To</label>
                                                <input type="text" id="hiredateto"
                                                       class="form-control pickadate-short-string"
                                                       name="hiredateto" placeholder="Hire / Rehire Date To"
                                                       value="<?php echo(isset($searchData['hiredateto']) && $searchData['hiredateto'] != '' ? $searchData['hiredateto'] : '') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="contractdatefrom">Contract Date From</label>
                                                <input type="text" class="form-control pickadate-short-string"
                                                       id="contractdatefrom"
                                                       name="contractdatefrom"
                                                       placeholder="Contract Date From"
                                                       value="<?php echo(isset($searchData['contractdatefrom']) && $searchData['contractdatefrom'] != '' ? $searchData['contractdatefrom'] : '') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="contractdateto">Contract Date To</label>
                                                <input type="text" id="contractdateto"
                                                       class="form-control pickadate-short-string"
                                                       name="contractdateto" placeholder="Contract Date To"
                                                       value="<?php echo(isset($searchData['contractdateto']) && $searchData['contractdateto'] != '' ? $searchData['contractdateto'] : '') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="form-group">
                                                <label for="empname">Employee Name/No</label>
                                                <input type="text" class="form-control" placeholder="Employee Name"
                                                       onkeypress="return lettersOnly_WithSpace();" id="empname"
                                                       name="empname"
                                                       value="<?php echo(isset($searchData['empname']) && $searchData['empname'] != '' ? $searchData['empname'] : '') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" ">
                                        <button type="button" class="btn btn-primary" onclick="getData()">Get
                                            Data
                                        </button>
                                        <button type="button"
                                                onclick="exportPDF(1)"
                                                id="btn-expPDF" class="btn btn-info white addbtn">Export PDF
                                        </button>
                                        <button type="button"
                                                onclick="exportPDF(2)"
                                                id="btn-expExcel" class="btn btn-danger white addbtn">Export Excel
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
                                <h4 class="card-title">Employee</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard cardHtml">
                                    <div class="table-responsive">
                                        <table id="my_table_asset" style="width:100%"
                                               class="table table-striped datatables-basic   table-bordered show-child-rows display">
                                            <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th width="5%">Action</th>
                                                <th width="5%">Employee No</th>
                                                <th width="10%">Name</th>
                                                <th width="5%">Type</th>
                                                <th width="5%">Category</th>
                                                <th width="5%">Supervisor</th>
                                                <th width="5%">Working Project</th>
                                                <th width="5%">Charging Project</th>
                                                <th width="5%">Location</th>
                                                <th width="5%">Sub Location</th>
                                                <th width="5%">Contract Expiry</th>
                                                <th width="5%">Status</th>
                                                <th width="5%">Document</th>

                                                <!--<th width="5%"></th>
                                                <th width="10%">Action</th>
                                                <th width="5%">Employee No</th>
                                                <th width="10%">Name</th>
                                                <th width="5%">Type</th>
                                                <th width="5%">Category</th>
                                                <th width="10%">Supervisor</th>
                                                <th width="10%">Working Project</th>
                                                <th width="10%">Charging Project</th>
                                                <th width="5%">Location</th>
                                                <th width="5%">Sub Location</th>
                                                <th width="5%">Contract Expiry</th>
                                                <th width="5%">Status</th>
                                                <th width="10%">Document</th>-->
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th width="5%"></th>
                                                <th width="5%">Action</th>
                                                <th width="5%">Employee No</th>
                                                <th width="10%">Name</th>
                                                <th width="5%">Type</th>
                                                <th width="5%">Category</th>
                                                <th width="5%">Supervisor</th>
                                                <th width="5%">Working Project</th>
                                                <th width="5%">Charging Project</th>
                                                <th width="5%">Location</th>
                                                <th width="5%">Sub Location</th>
                                                <th width="5%">Contract Expiry</th>
                                                <th width="5%">Status</th>
                                                <th width="5%">Document</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-12">
                                            <button type="button"
                                                    onclick="updBtnModal()"
                                                    id="btn-Upd" class="btn btn-danger white addbtn  updBtn hide">Update
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
                    <h4 class="modal-title white" id="myModalLabel_status">Status Employee</h4>
                    <input type="hidden" id="status_idEmp" name="status_idEmp">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group">
                                <label for="change_status" class="label-control">Select Status</label>
                                <select class="select2 form-control"
                                        autocomplete="change_status"
                                        id="change_status" required>
                                    <option value="0" readonly disabled selected></option>
                                    <?php if (isset($status) && $status != '') {
                                        foreach ($status as $k => $s) {
                                            echo '<option value="' . $s->id . '">' . $s->status . '</option>';
                                        }
                                    } ?>
                                </select>
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
    <div class="modal  fade text-left" id="editAssetModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel_editAssetModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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

                        <tr class="summaryRow emp_no_bulk">
                            <td class='summaryFldid summaryFldid_emp_no_bulk' data-key="emp_no_bulk"
                                data-fldnme="Employee">
                                Employee
                            </td>
                            <td class='summaryNewVal'>
                                <select class="select2 form-control" id="emp_no_bulk"
                                        name="emp_no_bulk" autocomplete="emp_no_bulk" required>
                                    <option value="0" readonly disabled selected></option>
                                    <?php
                                    if (isset($employee) && $employee != '') {
                                        foreach ($employee as $k => $e) {
                                            echo '<option value="' . $e->empno . '">(' . $e->empno . ') ' . $e->empname . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="summaryRow resp_person_name_bulk">
                            <td class='summaryFldid summaryFldid_resp_person_name_bulk' data-key="resp_person_name_bulk"
                                data-fldnme="Responsbile Person">
                                Responsbile Person
                            </td>
                            <td class='summaryNewVal'>
                                <select class="select2 form-control" id="resp_person_name_bulk"
                                        name="resp_person_name_bulk" autocomplete="resp_person_name_bulk">
                                    <option value="0" readonly disabled selected></option>
                                    <?php
                                    if (isset($employee) && $employee != '') {
                                        foreach ($employee as $k => $e) {
                                            echo '<option value="' . $e->empno . '">(' . $e->empno . ') ' . $e->empname . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr class="summaryRow verification_status_bulk">
                            <td class='summaryFldid summaryFldid_verification_status_bulk'
                                data-key="verification_status_bulk" data-fldnme="Vertification">
                                Vertification
                            </td>
                            <td class='summaryNewVal'>
                                <select class="select2 form-control"
                                        id="verification_status_bulk"
                                        name="verification_status_bulk" autocomplete="verification_status_bulk">
                                    <option value="0" readonly disabled></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="summaryRow last_verify_date_bulk">
                            <td class='summaryFldid summaryFldid_last_verify_date_bulk' data-key="last_verify_date_bulk"
                                data-fldnme="Last Verification Date">
                                Last Verification Date
                            </td>
                            <td class='summaryNewVal'>
                                <input type="text" class="form-control mypickadat"
                                       id="last_verify_date_bulk" name="last_verify_date_bulk"
                                       autocomplete="last_verify_date_bulk" onchange="changeVeriDueDate()"
                                       value="<?php echo date('d-m-Y') ?>">
                            </td>
                        </tr>
                        <tr class="summaryRow due_date_bulk">
                            <td class='summaryFldid summaryFldid_due_date_bulk' data-key="due_date_bulk"
                                data-fldnme="Due Date">
                                Due Date
                            </td>
                            <td class='summaryNewVal'>
                                <input type="text" class="form-control mypickadat"
                                       id="due_date_bulk" name="due_date_bulk"
                                       autocomplete="due_date_bulk"
                                       value="<?php echo date('d-m-Y', strtotime('+1 years')) ?>">
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

                        <tr class="summaryRow area_bulk">
                            <td class='summaryFldid summaryFldid_area_bulk' data-key="area_bulk"
                                data-fldnme="Area">
                                Area
                            </td>
                            <td class='summaryNewVal'>
                                <input type="text" class="form-control"
                                       id="area_bulk" name="area_bulk"
                                       autocomplete="area_bulk">
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
                    <table id="tblaudit" width='100%' border="1">
                        <thead>
                        <tr>
                            <th>PAEDS ID</th>
                            <th>Status</th>
                            <th>Employee</th>
                            <th>Responsible</th>
                            <th>Vertification</th>
                            <th>Last Verification</th>
                            <th>Due</th>
                            <th>Location</th>
                            <th>Sub Location</th>
                            <th>Area</th>
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
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete Employee</h4>
                    <input type="hidden" id="delete_idEmp" name="delete_idEmp">
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
        getData();
    });

    function format(d) {
        var html = '';
        html += '<div class="row">';
        html += '<div class="col-3">';
        html += '<h6>Information</h6>';
        html += '<p>Employee Number: <span class="text-primary">' + (d.empno != '' && d.empno != undefined && d.empno != null ? d.empno : '') + '</span></p>';
        html += '<p>Official Email: <span class="text-primary">' + (d.offemail != '' && d.offemail != undefined && d.offemail != null ? d.offemail : '') + '</span></p>';
        html += '<p>Full Name: <span class="text-primary">' + (d.empname != '' && d.empname != undefined && d.empname != null ? d.empname : '') + '</span></p>';
        html += '<p>CNIC No: <span class="text-primary">' + (d.cnicno != '' && d.cnicno != undefined && d.cnicno != null ? d.cnicno : '') + '</span></p>';
        html += '<p>Date of Birth: <span class="text-primary">' + (d.dob != '' && d.dob != undefined && d.dob != null ? d.dob : '') + '</span></p>';
        html += '<p>Highest Degree: <span class="text-primary">' + (d.degreeName != '' && d.degreeName != undefined && d.degreeName != null ? d.degreeName : '') + '</span></p>';
        html += '<p>Highest Field: <span class="text-primary">' + (d.field != '' && d.field != undefined && d.field != null ? d.field : '') + '</span></p>';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<h6>Contact Details</h6>';
        html += '<p>Residential Addres: <span class="text-primary">' + (d.resaddr != '' && d.resaddr != undefined && d.resaddr != null ? d.resaddr : '') + '</span></p>';
        html += '<p>Personal Email: <span class="text-primary">' + (d.peremail != '' && d.peremail != undefined && d.peremail != null ? d.peremail : '') + '</span></p>';
        html += '<p>Landline No: <span class="text-primary">' + (d.landline != '' && d.landline != undefined && d.landline != null ? d.landline : '') + '</span></p>';
        html += '<p>Mobile No (Primary): <span class="text-primary">' + (d.cellno1 != '' && d.cellno1 != undefined && d.cellno1 != null ? d.cellno1 : '') + '</span></p>';
        html += '<p>Mobile No (Alternate): <span class="text-primary">' + (d.cellno2 != '' && d.cellno2 != undefined && d.cellno2 != null ? d.cellno2 : '') + '</span></p>';
        html += '<p>Emergency Person Name: <span class="text-primary">' + (d.personnme != '' && d.personnme != undefined && d.personnme != null ? d.personnme : '') + '</span></p>';
        html += '<p>Emergency Mobile No: <span class="text-primary">' + (d.emcellno != '' && d.emcellno != undefined && d.emcellno != null ? d.emcellno : '') + '</span></p>';
        html += '<p>Emergency Landline No: <span class="text-primary">' + (d.emlandno != '' && d.emlandno != undefined && d.emlandno != null ? d.emlandno : '') + '</span></p>';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<h6>Employment Details</h6>';
        html += '<p>Employment Type: <span class="text-primary">' + (d.emptype != '' && d.emptype != undefined && d.emptype != null ? d.emptype : '') + '</span></p>';
        html += '<p>Category: <span class="text-primary">' + (d.category != '' && d.category != undefined && d.category != null ? d.category : '') + '</span></p>';
        html += '<p>GNC No: <span class="text-primary">' + (d.gncno != '' && d.gncno != undefined && d.gncno != null ? d.gncno : '') + '</span></p>';
        html += '<p>Band: <span class="text-primary">' + (d.band != '' && d.band != undefined && d.band != null ? d.band : '') + '</span></p>';
        html += '<p>Designation: <span class="text-primary">' + (d.desig != '' && d.desig != undefined && d.desig != null ? d.desig : '') + '</span></p>';
        html += '<p>Hire / Rehire Date: <span class="text-primary">' + (d.rehiredt != '' && d.rehiredt != undefined && d.rehiredt != null ? d.rehiredt : '') + '</span></p>';
        html += '<p>Contract Expiry: <span class="text-primary">' + (d.conexpiry != '' && d.conexpiry != undefined && d.conexpiry != null ? d.conexpiry : '') + '</span></p>';
        html += '<p>Working Project: <span class="text-primary">' + (d.workingProj != '' && d.workingProj != undefined && d.workingProj != null ? d.workingProj : '') + '</span></p>';
        html += '<p>Charging Project: <span class="text-primary">' + (d.chargingProj != '' && d.chargingProj != undefined && d.chargingProj != null ? d.chargingProj : '') + '</span></p>';
        html += '<p>Location: <span class="text-primary">' + (d.location != '' && d.location != undefined && d.location != null ? d.location : '') + '</span></p>';
        html += '<p>Sub Location: <span class="text-primary">' + (d.location_sub != '' && d.location_sub != undefined && d.location_sub != null ? d.location_sub : '') + '</span></p>';
        html += '<p>Supervisor: <span class="text-primary">' + (d.supernme != '' && d.supernme != undefined && d.supernme != null ? d.supernme : '') + '</span></p>';
        html += '<p>Hardship Allowance: <span class="text-primary">' + (d.ddlhardship != '' && d.ddlhardship != undefined && d.ddlhardship != null ? d.ddlhardship : '') + '</span></p>';
        html += '<p>Amount: <span class="text-primary">' + (d.amount != '' && d.amount != undefined && d.amount != null ? d.amount : '') + '</span></p>';
        html += '<p>Benefits: <span class="text-primary">' + (d.benefits != '' && d.benefits != undefined && d.benefits != null ? d.benefits : '') + '</span></p>';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<h6>Hiring Formalities</h6>';
        html += '<p>PEME: <span class="text-primary">' + (d.peme != '' && d.peme != undefined && d.peme != null ? d.peme : '') + '</span></p>';
        html += '<p>General Orientation Program: <span class="text-primary">' + (d.gop != '' && d.gop != undefined && d.gop != null ? d.gop : '') + '</span></p>';
        html += '<p>GOP Date: <span class="text-primary">' + (d.gopdt != '' && d.gopdt != undefined && d.gopdt != null ? d.gopdt : '') + '</span></p>';
        html += '<p>Entity: <span class="text-primary">' + (d.entityName != '' && d.entityName != undefined && d.entityName != null ? d.entityName : '') + '</span></p>';
        html += '<p>Department: <span class="text-primary">' + (d.departmentName != '' && d.departmentName != undefined && d.departmentName != null ? d.departmentName : '') + '</span></p>';
        html += '<p>ID Card Issued: <span class="text-primary">' + (d.cardissue != '' && d.cardissue != undefined && d.cardissue != null ? d.cardissue : '') + '</span></p>';
        html += '<p>Letter of Appointment Received: <span class="text-primary">' + (d.letterapp != '' && d.letterapp != undefined && d.letterapp != null ? d.letterapp : '') + '</span></p>';
        html += '<p>Confirmation: <span class="text-primary">' + (d.confirmation != '' && d.confirmation != undefined && d.confirmation != null ? d.confirmation : '') + '</span></p>';
        html += '<p>Status: <span class="text-primary">' + (d.statusName != '' && d.statusName != undefined && d.statusName != null ? d.statusName : '') + '</span></p>';
        html += '</div>';

        html += '</div>';


        return html;
    }

    function getData() {
        var data = {};
        data['projects'] = $('#projects').val();
        data['location'] = $('#location').val();
        data['sublocation'] = $('#sublocation').val();
        data['category'] = $('#category').val();
        data['entity'] = $('#entity').val();
        data['band'] = $('#band').val();
        data['designation'] = $('#designation').val();
        data['status'] = $('#status').val();
        data['empname'] = $('#empname').val();
        data['hiredatefrom'] = $('#hiredatefrom').val();
        data['hiredateto'] = $('#hiredateto').val();
        data['contractdatefrom'] = $('#contractdatefrom').val();
        data['contractdateto'] = $('#contractdateto').val();

        showloader();
        $('.main_content_div').addClass('hide');
        var dt = $('#my_table_asset').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,

            oSearch: {"sSearch": " "},
            autoFill: false,
            attr: {
                autocomplete: 'off'
            },
            initComplete: function () {
                $(this.api().table().container()).find('input[type="search"]').parent().wrap('<form>').parent().attr('autocomplete', 'off').css('overflow', 'hidden').css('margin', 'auto');
            },

            ajax: {
                "url": "<?php echo base_url() . 'index.php/hr_controllers/Searchemployee/getEmps' ?>",
                "method": "POST",
                "data": data
            },
            columns: [
                {
                    "width": "5%",
                    "class": "details-control",
                    "orderable": false,
                    "data": null,
                    "defaultContent": ""
                },
                {"data": "check", "orderable": false, "defaultContent": ""},
                {"data": "empno", "class": "empno"},
                {"data": "empname", "class": "empname"},
                {"data": "emptype", "class": "emptype"},
                {"data": "category", "class": "category"},
                {"data": "supernme", "class": "supernme"},
                {"data": "workingProj", "class": "workingProj"},
                {"data": "chargingProj", "class": "chargingProj"},
                {"data": "location", "class": "location"},
                {"data": "location_sub", "class": "location_sub"},
                {"data": "conexpiry", "class": "conexpiry"},
                {"data": "status"},
                {"data": "document"}
            ],
            order: [[2, "desc"]],
            dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 25,
            lengthMenu: [25, 50, 75, 100],
            buttons: [{
                extend: "collection",
                className: "btn btn-outline-secondary dropdown-toggle mr-2",
                text: "Export",
                buttons: [{
                    extend: "print",
                    text: "Print",
                    className: "dropdown-item",
                    exportOptions: {columns: [3, 4, 5, 6, 7, 8, 9, 10, 11]}
                }, {
                    extend: "copy",
                    text: "Copy",
                    className: "dropdown-item",
                    exportOptions: {columns: [3, 4, 5, 6, 7, 8, 9, 10, 11]}
                }]
            }],
        });
        // Array to track the ids of the details displayed rows
        var detailRows = [];
        $('#my_table_asset tbody').on('click', 'tr td.details-control', function () {
            var tr = $(this).parent('tr');
            var row = dt.row(tr);

            var idx = $.inArray(tr.attr('id'), detailRows);
            if (row.child.isShown()) {
                // Remove from the 'open' array
                tr.removeClass('details');
                row.child.hide();
                detailRows.splice(idx, 1);
            } else {
                // Add to the 'open' array
                if (row.data() != '' && row.data() != undefined) {
                    tr.addClass('details');
                    console.log(row.data());
                    row.child(format(row.data())).show();
                    if (idx === -1) {
                        detailRows.push(tr.attr('id'));
                    }
                }

            }
        });

        // On each draw, loop over the `detailRows` array and show any child rows
        dt.on('draw', function () {
            $.each(detailRows, function (i, id) {
                $('#' + id + ' td.details-control').trigger('click');
            });
        });
        setTimeout(function () {
            hideloader();
            $('.main_content_div').removeClass('hide');
        }, 500);
    }

    function exportPDF(filter) {
        var data = {};
        data['projects'] = $('#projects').val();
        data['location'] = $('#location').val();
        data['sublocation'] = $('#sublocation').val();
        data['category'] = $('#category').val();
        data['entity'] = $('#entity').val();
        data['band'] = $('#band').val();
        data['designation'] = $('#designation').val();
        data['status'] = $('#status').val();
        data['empname'] = $('#empname').val();
        data['hiredatefrom'] = $('#hiredatefrom').val();
        data['hiredateto'] = $('#hiredateto').val();
        data['contractdatefrom'] = $('#contractdatefrom').val();
        data['contractdateto'] = $('#contractdateto').val();
        data['search'] = $('#my_table_asset_filter').find('input[type="search"]').val();
        var url = '<?php echo base_url() ?>index.php/asset_controllers/Assets/';
        if (filter == 1) {
            url += 'getPDF?f=1';
        } else if (filter == 2) {
            url += 'getExcel?f=1';
        } else {
            url += 'getPDF?f=1';
        }
        if (data['project'] != '' && data['project'] != undefined && data['project'] != 0) {
            url += '&project=' + data['project'];
        }
        if (data['emp'] != '' && data['emp'] != undefined && data['emp'] != 0) {
            url += '&emp=' + data['emp'];
        }
        if (data['category'] != '' && data['category'] != undefined && data['category'] != 0) {
            url += '&category=' + data['category'];
        }
        if (data['sop'] != '' && data['sop'] != undefined && data['sop'] != 0) {
            url += '&sop=' + data['sop'];
        }
        if (data['location'] != '' && data['location'] != undefined && data['location'] != 0) {
            url += '&location=' + data['location'];
        }
        if (data['sublocation'] != '' && data['sublocation'] != undefined && data['sublocation'] != 0) {
            url += '&sublocation=' + data['sublocation'];
        }
        if (data['verification_status'] != '' && data['verification_status'] != undefined && data['verification_status'] != 0) {
            url += '&verification_status=' + data['verification_status'];
        }
        if (data['status'] != '' && data['status'] != undefined && data['status'] != 0) {
            url += '&status=' + data['status'];
        }
        if (data['tag_pr'] != '' && data['tag_pr'] != undefined && data['tag_pr'] != 0) {
            url += '&tag_pr=' + data['tag_pr'];
        }
        if (data['idAsset'] != '' && data['idAsset'] != undefined && data['idAsset'] != 0) {
            url += '&idAsset=' + data['idAsset'];
        }
        if (data['writeOffNo'] != '' && data['writeOffNo'] != undefined && data['writeOffNo'] != 0) {
            url += '&writeOffNo=' + data['writeOffNo'];
        }
        if (data['dateTo'] != '' && data['dateTo'] != undefined && data['dateTo'] != 0) {
            url += '&dateTo=' + data['dateTo'];
        }
        if (data['dateFrom'] != '' && data['dateFrom'] != undefined && data['dateFrom'] != 0) {
            url += '&dateFrom=' + data['dateFrom'];
        }
        if (data['search'] != '' && data['search'] != undefined && data['search'] != 0) {
            url += '&search=' + data['search'];
        }
        window.open(url, '_blank');
    }

    function getDelete(obj) {
        var id = $(obj).attr('data-id');
        $('#delete_idEmp').val(id);
        $('#deleteModal').modal('show');
    }

    function deleteData() {
        var data = {};
        data['idEmp'] = $('#delete_idEmp').val();
        if (data['idEmp'] == '' || data['idEmp'] == undefined || data['idEmp'] == 0) {
            toastMsg('Employee', 'Something went wrong', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/hr_controllers/Employee_entry/deleteEmp')?>', data, 'POST', function (res) {

                if (res == 1) {
                    toastMsg('Employee', 'Successfully Deleted', 'success');
                    $('#deleteModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                } else if (res == 2) {
                    toastMsg('Employee', 'Something went wrong', 'error');
                } else if (res == 3) {
                    toastMsg('Employee', 'Invalid Employee', 'error');
                }

            });
        }
    }

    function changeStatus(obj) {
        var id = $(obj).attr('data-id');
        var status = $(obj).attr('data-status');
        $('#status_idEmp').val(id);
        $("#change_status").val(status).select2("val", status);
        $('#statusModal').modal('show');
    }


    function saveStatusChange() {
        var data = {};
        data['idEmp'] = $('#status_idEmp').val();
        data['status'] = $('#change_status').val();
        if (data['idEmp'] == '' || data['idEmp'] == undefined || data['idEmp'] == 0) {
            toastMsg('Error', 'Invalid Employee', 'error');
            return false;
        } else if (data['status'] == '' || data['status'] == undefined || data['status'] == 0) {
            toastMsg('Error', 'Invalid Status', 'error');
            return false;
        } else {
            showloader();
            CallAjax('<?php echo base_url('index.php/hr_controllers/Searchemployee/changeStatus')?>', data, 'POST', function (res) {
                hideloader();
                if (res == 1) {
                    toastMsg('Success', 'Successfully Changes', 'success');
                    $('#deleteModal').modal('hide');
                } else if (res == 3) {
                    toastMsg('Erorr', 'Invalid Asset Id', 'error');
                } else {
                    toastMsg('Erorr', 'Something went wrong', 'error');
                }
            });

        }
    }

</script>
<script>

    function chkStatus(obj) {
        var status = $('#upd_bulkstatus').val();
        if (status == 1 || status == 2 || status == 4 || status == 5 || status == 6 || status == 7 || status == 8) {
            $('.writOff_formNo_bulk').addClass('hide');
            $('.wo_date_bulk').addClass('hide');
        } else {
            $('.writOff_formNo_bulk').removeClass('hide');
            $('.wo_date_bulk').removeClass('hide');
        }
    }

    function changeVeriDueDate() {
        var last_verify_date_bulk = $('#last_verify_date_bulk').val();
        var due_date_bulk = '';
        if (last_verify_date_bulk != '' && last_verify_date_bulk != undefined) {
            var a = last_verify_date_bulk.split('-');
            var y = parseInt(a[2]) + 1;
            due_date_bulk = a[0] + '-' + a[1] + '-' + y;
        } else {
            due_date_bulk = '';
        }
        $('#due_date_bulk').val(due_date_bulk);
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
                    + "<td>" + $(asset_count[i]).parents('tr').find('.empl_code').text() + "</td>"
                    + "<td>" + $(asset_count[i]).parents('tr').find('.resp_person_name_bulk').text() + "</td>"
                    + "<td>" + $(asset_count[i]).parents('tr').find('.loc').text() + "</td>"
                    + "<td>" + $(asset_count[i]).parents('tr').find('.sub_loc').text() + "</td>"
                    + "<td>" + $(asset_count[i]).parents('tr').find('.area').text() + "</td>"
                    + "<td>" + $(asset_count[i]).parents('tr').find('.area').text() + "</td>"
                    + "<td>" + $(asset_count[i]).parents('tr').find('.area').text() + "</td>"
                    + "<td>" + $(asset_count[i]).parents('tr').find('.area').text() + "</td>"
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
        data['emp_no'] = $('#emp_no_bulk').val();
        data['resp_person_name'] = $('#resp_person_name_bulk').val();
        data['verification_status'] = $('#verification_status_bulk').val();
        data['last_verify_date'] = $('#last_verify_date_bulk').val();
        data['due_date'] = $('#due_date_bulk').val();
        data['area'] = $('#area_bulk').val();

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


</script>