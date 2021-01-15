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
                                                    <th>Supervisor Name</th>
                                                    <th>Working Project</th>
                                                    <th>Charging Project</th>
                                                    <th>Location</th>
                                                    <th>Contract Expiry</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Check</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $sno = 0;

                                                $_SESSION['id'] = '';

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
                                                            <td style="text-transform: uppercase;">
                                                                <?php echo $rows->EmployeeName ?>
                                                            </td>
                                                            <td class="auditcol_supernme"
                                                                style="text-transform: uppercase;"
                                                                data-key="<?php echo $rows->SupervisorName ?>"
                                                                data-oldval="<?php echo $rows->SupervisorCode ?>">
                                                                <?php echo $rows->SupervisorName ?>
                                                            </td>
                                                            <td class="auditcol_workproj"
                                                                style="text-transform: capitalize;"
                                                                data-key="<?php echo $rows->WorkingProject ?>"
                                                                data-oldval="<?php echo $rows->WorkProjectCode ?>">
                                                                <?php echo $rows->WorkingProject ?>
                                                            </td>
                                                            <td class="auditcol_chargproj"
                                                                style="text-transform: capitalize;"
                                                                data-key="<?php echo $rows->ChargingProject ?>"
                                                                data-oldval="<?php echo $rows->ChargeProjectCode ?>">
                                                                <?php echo $rows->ChargingProject ?>
                                                            </td>
                                                            <td class="auditcol_ddlloc"
                                                                data-key="<?php echo $rows->Location ?>"
                                                                data-oldval="<?php echo $rows->LocationCode ?>">
                                                                <?php echo $rows->Location ?>
                                                            </td>
                                                            <td class="auditcol_conexpiry"
                                                                data-key="<?php echo $rows->ContractExpiry ?>"
                                                                data-oldval="<?php echo date('d-m-Y', strtotime($rows->ConExpiry)) ?>">
                                                                <?php echo $rows->ContractExpiry ?>
                                                            </td>
                                                            <td class="auditcol_status"
                                                                data-key="<?php echo $rows->Status ?>"
                                                                data-oldval="<?php echo $rows->StatusCode ?>">
                                                                <?php echo $rows->Status ?>
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
                                                                       data-oldval="<?php echo $rows->id ?>"
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
                                                        id="btn-Upd" class="btn bg-secondary white addbtn">Update
                                                    Selected Employees
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
                            <th width='30%'>Current Value</th>
                            <th width='30%'>Eff Date</th>
                        </tr>
                        <tr class="summaryRow">
                            <td class='summaryFldid summaryFldid_workproj'
                                data-key="workproj" data-fldnme="Working Project">Working Project
                            </td>
                            <td class='summaryNewVal'>
                                <select id="upd_bulkProject" name="upd_bulkProject" class=" select2"
                                        onchange="changeModalVal(this)">
                                    <!--<select id="upd_bulkProject" name="upd_bulkProject" class=" select2">-->
                                    <option>Select Project</option>
                                    <?php
                                    if (isset($project) && $project != '') {
                                        foreach ($project as $k => $v) {
                                            echo '<option class="auditcol1" data-oldkey="' . $v->proj_name . '" data-newval="' . $v->proj_code . '" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class='SummaryEftDate'>
                                <input id='dt_eff_project' name='dt_eff_project' type='text' value=""
                                       class='form-control pickadate-short-string'/>
                            </td>
                        </tr>
                        <tr class="summaryRow">
                            <td class='summaryFldid summaryFldid_ddlloc' data-key="ddlloc" data-fldnme="Location">
                                Location
                            </td>
                            <td class='summaryNewVal'>
                                <select id="upd_bulklocation" name="upd_bulklocation" class=" select2"
                                        onchange="changeModalVal(this)">
                                    <!--<select id="upd_bulkLocation" name="upd_bulkLocation" class=" select2">-->
                                    <option>Select Location</option>
                                    <?php
                                    if (isset($location) && $location != '') {
                                        foreach ($location as $k => $v) {
                                            echo '<option class="auditcol1" data-oldkey="' . $v->location . '" data-newval="' . $v->id . ' " value="' . $v->id . '">' . $v->location . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class='SummaryEftDate'>
                                <input id='dt_eff_location' name='dt_eff_location' type='text' value=""
                                       class='form-control pickadate-short-string'/>
                            </td>
                        </tr>
                        <tr class="summaryRow">
                            <td class='summaryFldid summaryFldid_supernme' data-key="supernme" data-fldnme="Supervisor">
                                Supervisor
                            </td>
                            <td class='summaryNewVal'>
                                <select id="upd_bulksupervisor" name="upd_bulksupervisor" class=" select2"
                                        onchange="changeModalVal(this)">
                                    <!--<select id="upd_bulksupervisor" name="upd_bulksupervisor" class=" select2">-->
                                    <option>Select Supervisor</option>
                                    <?php
                                    if (isset($emp) && $emp != '') {
                                        foreach ($emp as $k => $v) {
                                            echo '<option class="auditcol1" data-oldkey="' . $v->empname . '" data-newval="' . $v->empno . '" value="' . $v->empno . '">' . $v->empname . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class='SummaryEftDate'>
                                <input id='dt_eff_supervisor' name='dt_eff_supervisor' type='text' value=""
                                       class='form-control pickadate-short-string'/>
                            </td>
                        </tr>
                        <tr class="summaryRow">
                            <td class='summaryFldid summaryFldid_conexpiry' data-key="conexpiry"
                                data-fldnme="Contract Expiry">Contract Expiry
                            </td>
                            <td class='summaryNewVal'>
                                <input id='dt_conexpiry' name='dt_conexpiry' type='text' value=""
                                       class='form-control pickadate-short-string' onchange="changeModalVal(this)"/>
                                <!--<input id='dt_conexpiry' name='dt_conexpiry' type='text' value=""
                                       class='form-control pickadate-short-string'/>-->
                            </td>
                            <td class='SummaryEftDate'>
                                <input id='dt_eff_conexpiry' name='dt_eff_conexpiry' type='text' value=""
                                       class='form-control pickadate-short-string'/>
                            </td>
                        </tr>
                        <tr class="summaryRow">
                            <td class='summaryFldid summaryFldid_status' data-key="status" data-fldnme="Status">Status
                            </td>
                            <td class='summaryNewVal'>
                                <select id="upd_bulkstatus" name="upd_bulkstatus" class=" select2"
                                        onchange="changeModalVal(this)">
                                    <!--<select id="upd_bulkstatus" name="upd_bulkstatus" class=" select2">-->
                                    <option>Select Status</option>
                                    <?php
                                    if (isset($status) && $status != '') {
                                        foreach ($status as $k => $v) {
                                            echo '<option class="auditcol1" data-oldkey="' . $v->status . '" data-newval="' . $v->id . '" value="' . $v->id . '">' . $v->status . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class='SummaryEftDate'>
                                <input id='dt_eff_status' name='dt_eff_status' type='text' value=""
                                       class='form-control pickadate-short-string'/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updBtnSave()">Save</button>
                </div>
                <br/><br/>
                <div class="modal-header bg-primary white">
                    <p>Summary of Changes (Bulk Update)</p>
                </div>
                <div class="modal-body">
                    <table id="tblaudit" width='100%'>
                        <thead>
                        <tr>
                            <th width='16%'>Emp No</th>
                            <th width='16%'>Working Project</th>
                            <th width='16%'>Location</th>
                            <th width='16%'>Supervisor</th>
                            <th width='16%'>Contract Expiry</th>
                            <th width='15%'>Status</th>
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

    let audit_str = '';
    let audit_str_pro = '';
    let audit_str_loc = '';
    let audit_str_sup = '';
    let audit_str_conex = '';
    let audit_str_sta = '';

    let oldEmpData = '';

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

    /*$(document).on('blur', '#dt_conexpiry', function () {
        changeModalVal("#dt_conexpiry");
    });*/

    function updBtnModal() {
        let employees = [];
        let employees_no = '';
        let count = $('.fgtr').find('.checkboxes');
        let counter = 0;
        let empHtml = '';

        oldEmpData = '';

        let str = '';

        for (let i = 0; i < count.length; i++) {
            employees_no = $(count[i]).attr('data-emp');
            if ($(count[i]).is(':checked')) {

                oldEmpData += "<tr><td>" + employees_no + "</td>"
                    + "<td>" + $(count[i]).parents('tr').find('.auditcol_workproj').attr('data-key') + "</td>"
                    + "<td>" + $(count[i]).parents('tr').find('.auditcol_ddlloc').attr('data-key') + "</td>"
                    + "<td>" + $(count[i]).parents('tr').find('.auditcol_supernme').attr('data-key') + "</td>"
                    + "<td>" + $(count[i]).parents('tr').find('.auditcol_conexpiry').attr('data-key') + "</td>"
                    + "<td>" + $(count[i]).parents('tr').find('.auditcol_status').attr('data-key') + "</td>"
                    + "</tr>";


                employees.push({'employees_no': employees_no});
                counter++;
            }
        }


        console.log(oldEmpData);


        if (employees.length >= 1) {
            $.each(employees, function (i, v) {
                if (i == 0) {
                    empHtml += v.employees_no;
                } else {
                    empHtml += ', ' + v.employees_no;
                }
            });
            str += '<p>Employee: <span  class="danger">' + empHtml + '</span><br/><span>Number of selected employees: ' + counter + '</span></p>';
            $(".model_htmlcontent").html(str);

            $(".tblaudit_body").html(oldEmpData);

            $("#editEmpModal").modal('show');
            pickDate();
        } else {
            toastMsg('Employee', 'Please select Employee', 'error');
        }
    }

    function updBtnSave() {

        let data = {};
        let employees = [];
        let employees_no = '';
        let results = [];
        let flag = 0;

        let isinputgiven = false;

        let count = $('.fgtr').find('.checkboxes');

        for (let i = 0; i < count.length; i++) {
            employees_no = $(count[i]).attr('data-emp');
            let summaryID = $(count[i]).attr('data-oldval');

            if ($(count[i]).is(':checked')) {

                employees.push({'employees_no': employees_no});

                $(".summaryRow").each(function () {

                    let summaryVal;
                    let summaryFldid = $(this).find('.summaryFldid').attr('data-key');


                    if (summaryFldid == "conexpiry") {
                        summaryVal = $(this).find('.summaryNewVal').find('input').val();
                    } else {

                        if ($(this).find('.summaryNewVal').find('option:selected').attr("data-newval") == "undefined"
                            || $(this).find('.summaryNewVal').find('option:selected').attr("data-newval") == undefined
                            || $(this).find('.summaryNewVal').find('option:selected').attr("data-newval") == ""
                            || $(this).find('.summaryNewVal').find('option:selected').attr("data-newval") == "null"
                            || $(this).find('.summaryNewVal').find('option:selected').attr("data-newval") == "NULL"
                        ) {
                            summaryVal = "";
                        } else {
                            summaryVal = $(this).find('.summaryNewVal').find('option:selected').attr("data-newval");
                        }
                    }

                    let summaryOldVal = $(count[i]).parents('tr').find('.auditcol_' + summaryFldid).attr('data-oldval');

                    let summaryFldName = $(this).find('.summaryFldid').attr('data-fldnme');

                    if (summaryFldName == null || summaryFldName == undefined) {
                        $(this).find('.summaryFldName').addClass('error');
                        flag = 1;
                        return false;
                    }

                    let SummaryEftDate = $(this).find('.SummaryEftDate').find('input').val();


                    if (summaryFldid == "conexpiry") {


                        if (Date.parse(summaryVal) != Date.parse(summaryOldVal)) {

                            if (summaryVal != "") {

                                //console.log("summaryVal - " + summaryVal + " summaryFldid - " + summaryFldid + " summaryFldName - " + summaryFldName + " summaryOldVal - " + summaryOldVal + " SummaryEftDate - " + SummaryEftDate);

                                isinputgiven = true;

                                results.push({
                                    'empno': employees_no,
                                    'summaryFldid': summaryFldid,
                                    'summaryFldName': summaryFldName,
                                    'summaryVal': summaryVal,
                                    'summaryOldVal': summaryOldVal,
                                    'summaryID': summaryID,
                                    'SummaryEftDate': SummaryEftDate
                                });

                            }
                        }

                    } else {

                        if (parseInt(summaryVal) != parseInt(summaryOldVal)) {

                            if (summaryVal != "") {

                                //console.log("summaryVal - " + summaryVal + " summaryFldid - " + summaryFldid + " summaryFldName - " + summaryFldName + " summaryOldVal - " + summaryOldVal + " SummaryEftDate - " + SummaryEftDate);

                                isinputgiven = true;

                                results.push({
                                    'empno': employees_no,
                                    'summaryFldid': summaryFldid,
                                    'summaryFldName': summaryFldName,
                                    'summaryVal': summaryVal,
                                    'summaryOldVal': summaryOldVal,
                                    'summaryID': summaryID,
                                    'SummaryEftDate': SummaryEftDate
                                });

                            }
                        }

                    }

                });

            }
        }



        if (isinputgiven == true) {

            if (employees.length >= 1) {
                $('#btn-Edit').css('display', 'none');

                //results.push({'empno': employees});

                /*$.each(results[1], function (k, v) {
                    console.log("key = " + results[k] + " value = " + v);
                });*/


                let formData = new FormData();

                /*data['empno'] = employees;
                data['results'] = results;*/

                data['results'] = results;
                formData.append('data', JSON.stringify(data));


                CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/bulkupdate'); ?>', formData, "POST", function (result) {
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


    function changeModalVal(obj) {

        /*let audit_Fldid = $(obj).parents('.summaryRow').find('.summaryFldid').attr('data-key');
        //alert(audit_Fldid);
        let audit_FldNme = $(obj).parents('.summaryRow').find('.summaryFldid').attr('data-fldnme');
        //alert(audit_FldNme);

        //let audit_OldVal = $(obj).find('.auditcol').attr('data-key');

        //console.log(audit_Fldid + " - " + audit_FldNme + " - " + audit_OldVal);

        if (audit_Fldid == 'conexpiry') {

            //let audit_OldVal = $(obj).parents('.summaryRow').attr('data-key');

            let audit_OldVal = $('.auditcol_' + audit_Fldid).attr('data-key');
            let audit_NewVal = $('.auditcol_').find('input').val();
            let row_key = "audit_row_" + audit_Fldid;

            //alert(audit_OldVal);

            console.log(audit_OldVal);

        } else {

            let audit_OldVal = $('.auditcol_' + audit_Fldid).attr('data-key');

            //let audit_NewVal = $(obj).find('option:selected').text();

            let row_key = "audit_row_" + audit_Fldid;
            let td = "<td id='audit_fldid' style='display:none;'>" + audit_Fldid + "</td>" +
                "<td id='audit_fldnme'>" + audit_FldNme + "</td>" +
                "<td id='audit_oldval'>" + audit_OldVal + "</td>";


            if ($('#' + row_key).html()) {
                $('#' + row_key).html(td);
            } else {
                audit_str_pro = "<tr id='" + row_key + "' class='audit_row_project'>" + td + "</tr>";
                $('.tblaudit_body').append(audit_str_pro);
            }

        }*/
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
                    $('.updBtn').removeClass('hide').addClass('show');
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                    $('.updBtn').removeClass('show').addClass('hide');
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
