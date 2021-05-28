<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/forms/wizard/bs-stepper.min.css">
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo base_url() ?><!--assets/vendors/css/forms/select/select2.min.css">-->
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo base_url() ?><!--assets/vendors/css/forms/wizard/bs-stepper.min.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/forms/form-validation.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/forms/form-wizard.min.css">
<!-- BEGIN: Content-->

<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/file-uploaders/dropzone.min.css">

<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/css/plugins/forms/form-file-uploader.min.css">

<script src="<?php echo base_url() ?>assets/vendors/js/extensions/dropzone.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/scripts/forms/form-file-uploader.min.js"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Add Asset</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Asset</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <section class="vertical-wizard">

                <div class="bs-stepper vertical vertical-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">1</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Asset Details</span>
                                    <span class="bs-stepper-subtitle">Setup Asset Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#personal-info-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Employee Info</span>
                                    <span class="bs-stepper-subtitle">Add Employee Info</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#address-step-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Project/Location</span>
                                    <span class="bs-stepper-subtitle">Add Project/Location</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#social-links-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">4</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Verification/Writ Off</span>
                                    <span class="bs-stepper-subtitle">Add Verification/Writ Off</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#documents">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">5</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Documents</span>
                                    <span class="bs-stepper-subtitle">Add Documents</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <div id="account-details-vertical" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Asset Details</h5>
                                <small class="text-muted">Enter Your Asset Details.</small>
                                <br>
                                <small class="text-danger">PAEDSID
                                    <span class="paeds_id">0<?php echo(isset($maxAssetId[0]->maxAssetId) && $maxAssetId[0]->maxAssetId != '' ? $maxAssetId[0]->maxAssetId : '') ?></span>
                                </small>
                            </div>

                            <form id="myForm">
                                <div class="row">
                                    <!--                                    <input type="file" id='files' name="files[]" multiple><br>-->
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="pr_reqId" class="label-control">Purchase Request Id</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control numericOnly" id="pr_reqId"
                                                       name="pr_reqId" maxlength="6" minlength="3"
                                                       autocomplete="pr_reqId">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="idCategory" class="label-control">Equipment
                                                    Category <span class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" autocomplete="idCategory"
                                                        id="idCategory" required>
                                                    <option value="0" label="Pl" readonly disabled selected></option>
                                                    <?php if (isset($category) && $category != '') {
                                                        foreach ($category as $k => $c) {
                                                            echo '<option value="' . $c->idCategory . '" >' . $c->category . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="desc" class="label-control">Description <span
                                                            class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                    <textarea id="desc" name="desc" class="form-control" cols="30"
                                                              rows="7" autocomplete="desc" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="model" class="label-control">Model</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="model"
                                                       name="model"
                                                       autocomplete="model">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="product_no"
                                                       class="label-control">Product
                                                    No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                       id="product_no"
                                                       name="product_no"
                                                       autocomplete="product_no">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="gri_no"
                                                       class="label-control">GRI
                                                    No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                       id="gri_no"
                                                       name="gri_no"
                                                       autocomplete="gri_no">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="serial_no"
                                                       class="label-control">Serial
                                                    No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                       id="serial_no"
                                                       name="serial_no"
                                                       autocomplete="serial_no">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="tag_no"
                                                       class="label-control">Tag <span class="requried_label">*</span>
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                       id="tag_no"
                                                       onfocusout="chkTagNo()"
                                                       name="tag_no"
                                                       autocomplete="tag_no" required>
                                                <small>
                                                    <input type="checkbox" value="1" id="paeds_tagID"
                                                              name="paeds_tagID" class="" onclick="changeTagPaedID()">
                                                    Paeds ID
                                                </small>
                                            </div>


                                        </div>


                                    </div>


                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="po_no"
                                                       class="label-control">PO
                                                    No. <span class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control numericOnly" id="po_no"
                                                       name="po_no"
                                                       autocomplete="po_no" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="cost"
                                                       class="label-control">Cost <span class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control numericOnly" id="cost"
                                                       name="cost"
                                                       autocomplete="cost" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="idCurrency"
                                                       class="label-control">Currency <span
                                                            class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" name="idCurrency"
                                                        autocomplete="idCurrency"
                                                        id="idCurrency" required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php if (isset($currency) && $currency != '') {
                                                        foreach ($currency as $k => $cr) {
                                                            echo '<option value="' . $cr->idCurrency . '" >' . $cr->currency . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="idSourceOfPurchase">Source of
                                                    Purchase <span class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="idSourceOfPurchase"
                                                        name="idSourceOfPurchase" autocomplete="idSourceOfPurchase"
                                                        required>
                                                    <option value="0" readonly disabled selected></option>
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
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev " disabled>
                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous/Submit</span>
                                </button>
                                <button class="btn btn-primary btn-next tagNextBtn" onclick="chkTagNo()">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                </button>
                            </div>

                        </div>
                        <div id="personal-info-vertical" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Employee Info</h5>
                                <small>Enter Your Employee Info.</small>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="emp_no">Employee <span
                                                            class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="emp_no"
                                                        name="emp_no" autocomplete="emp_no" required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php
                                                    if (isset($employee) && $employee != '') {
                                                        foreach ($employee as $k => $e) {
                                                            echo '<option value="' . $e->empno . '">(' . $e->empno . ') ' . $e->empname . ' - ' . $e->desig . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="resp_person_name">Responsbile Person Name <span class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="resp_person_name"
                                                        name="resp_person_name" autocomplete="resp_person_name"
                                                        required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php
                                                    if (isset($employee) && $employee != '') {
                                                        foreach ($employee as $k => $e) {
                                                            echo '<option value="' . $e->empno . '">(' . $e->empno . ') ' . $e->empname . ' - ' . $e->desig . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                </button>
                            </div>
                        </div>
                        <div id="address-step-vertical" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Project/Location</h5>
                                <small>Enter Your Project/Location Information.</small>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="proj_code">Project <span
                                                            class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="proj_code"
                                                        name="proj_code" autocomplete="proj_code" required>
                                                    <option value="0" readonly disabled selected></option>
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
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="ou"
                                                       class="label-control">OU <span
                                                            class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control numericOnly" id="ou"
                                                       name="ou"
                                                       autocomplete="ou" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="account"
                                                       class="label-control">Account <span
                                                            class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control numericOnly" id="account"
                                                       name="account"
                                                       autocomplete="accounts" required></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="dept"
                                                       class="label-control">Dept <span class="requried_label">*</span>
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control numericOnly" id="dept"
                                                       name="dept"
                                                       autocomplete="dept" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="fund" class="label-control">Fund <span
                                                            class="requried_label">*</span>
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control numericOnly" id="fund"
                                                       name="fund"
                                                       autocomplete="fund" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="prog"
                                                       class="label-control">Prog <span class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control  numericOnly" id="prog"
                                                       name="prog"
                                                       autocomplete="prog" required></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="idLocation">Location <span
                                                            class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="idLocation"
                                                        name="idLocation"
                                                        onchange="changeLocation('idLocation','idSubLocation')"
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="idSubLocation">Sub
                                                    Location <span class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control"
                                                        id="idSubLocation"
                                                        name="idSubLocation" autocomplete="idSubLocation" required>
                                                    <option value="0" readonly disabled selected></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="prog"
                                                       class="label-control">Area <span class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="area"
                                                       name="area"
                                                       autocomplete="area" required></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                </button>
                            </div>
                        </div>
                        <div id="social-links-vertical" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Verification/Writ Off</h5>
                                <small>Enter Your Verification/Writ Off Information.</small>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="verification_status">Verification
                                                    Status</label></div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control"
                                                        id="verification_status"
                                                        name="verification_status" autocomplete="verification_status"
                                                        required>
                                                    <option value="0" readonly disabled></option>
                                                    <option value="Yes" selected>Yes</option>
                                                    <option value="No">No</option>
                                                    <option value="Pending">Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="last_verify_date"
                                                       class="label-control">Last
                                                    Verification Date</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control mypickadat"
                                                       id="last_verify_date" name="last_verify_date"
                                                       autocomplete="last_verify_date"
                                                       value="<?php echo date('d-m-Y') ?>"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="due_date"
                                                       class="label-control">Due
                                                    Date</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control mypickadat2"
                                                       id="due_date" name="due_date"
                                                       autocomplete="due_date"
                                                       value="<?php echo date('d-m-Y', strtotime('+1 years')) ?>"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="pur_date"
                                                       class="label-control">Purchase
                                                    Date</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control mypickadat"
                                                       id="pur_date" name="pur_date"
                                                       autocomplete="pur_date"
                                                       value="<?php echo date('d-m-Y') ?>"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="status"
                                                       class="label-control">Status <span
                                                            class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control status" name="status"
                                                        autocomplete="status" onchange="chkStatus(this)"
                                                        id="status" required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php if (isset($status) && $status != '') {
                                                        foreach ($status as $k => $s) {
                                                            echo '<option value="' . $s->id . '" ' . ($s->status_value == 'OK' ? 'selected' : '') . '>' . $s->status_name . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="writOff_formNo" class="label-control">Writ
                                                    Off
                                                    Form </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="writOff_formNo"
                                                       name="writOff_formNo" disabled
                                                       autocomplete="writOff_formNo" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="wo_date" class="label-control">Writ Off Date </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control mypickadat" id="wo_date"
                                                       name="wo_date" disabled
                                                       autocomplete="wo_date" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label"><label for="remarks"
                                                                                        class="label-control">Remarks/Comments</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea id="remarks" name="remarks"
                                                          class="form-control"
                                                          cols="30"
                                                          rows="7"
                                                          autocomplete="remarks"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                </button>
                            </div>
                        </div>
                        <div id="documents" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Documents</h5>
                                <small>Upload Documents.</small>
                            </div>
                            <!-- remove thumbnail file upload starts -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Images</h4>
                                        </div>
                                        <div class="card-body">
                                            <!--<form action="#" class="dropzone dropzone-area" id="dpz-remove-thumb">
                                                <div class="dz-message">Drop files here or click to upload images.</div>
                                            </form>-->

                                            <form action="#" class="dropzone dropzone-area" id="dpz-remove-thumbs"
                                            >
                                                <div class="fallback">
                                                    <input type="file" id="files" name="files[]" multiple/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- remove thumbnail file upload ends -->

                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-success btn-submit mybtn" id="btn-submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Vertical Wizard -->
        </div>
    </div>
</div>
<!-- END: Content-->
<script src="<?php echo base_url() ?>assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/forms/validation/jquery.validate.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/scripts/forms/form-wizard.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/scripts/jquery.inputmask.bundle.js"></script>
<script>
    $(document).ready(function () {
        $("#ou").inputmask("999");
        $("#account").inputmask("999999");
        $("#dept").inputmask("99999");
        $("#fund").inputmask("999");
        $("#prog").inputmask("9999");
        mydate();
        mydate2();
        $(".numericOnly").ForceNumericOnly();
        // Dropzone.autoDiscover = false;
        $('#dpz-remove-thumbs').dropzone({
            url: "<?php echo base_url('index.php/asset_controllers/Add_asset/insertData'); ?>",
            uploadMultiple: true,
            parallelUploads: 25,
            maxFiles: 25,
            autoProcessQueue: false,
            addRemoveLinks: true,
            // acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
            init: function () {
                dzClosure = this;

                $('#btn-submit').on('click', function (e) {
                    console.log('processQueue');
                    if (dzClosure.getQueuedFiles().length > 0) {
                        dzClosure.processQueue();
                    } else {
                        mySubmitData();
                    }
                });

                // My project only has 1 file hence not sendingmultiple
                dzClosure.on('sending', function (data, xhr, form_data) {
                    xhr.onload = () => {
                        if (xhr.status >= 200 && xhr.status < 300) {
                            const response = JSON.parse(xhr.responseText);
                            hideloader();
                            $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                            try {
                                if (response[0] == 'Success') {
                                    toastMsg(response[0], response[1], 'success');
                                    $('.res_heading').html(response[0]).css('color', 'green');
                                    $('.res_msg').html(response[1]).css('color', 'green');
                                } else {
                                    toastMsg(response[0], response[1], 'error');
                                    $('.res_heading').html(response[0]).css('color', 'red');
                                    $('.res_msg').html(response[1]).css('color', 'red');
                                }
                            } catch (e) {
                            }
                        }
                    };

                    console.log('sending');
                    form_data.append('pr_reqId', $('#pr_reqId').val());
                    form_data.append('idCategory', $('#idCategory').val());
                    form_data.append('desc', $('#desc').val());
                    form_data.append('model', $('#model').val());
                    form_data.append('product_no', $('#product_no').val());
                    form_data.append('gri_no', $('#gri_no').val());
                    form_data.append('serial_no', $('#serial_no').val());
                    form_data.append('tag_no', $('#tag_no').val());
                    form_data.append('po_no', $('#po_no').val());
                    form_data.append('cost', $('#cost').val());
                    form_data.append('idCurrency', $('#idCurrency').val());
                    form_data.append('idSourceOfPurchase', $('#idSourceOfPurchase').val());
                    form_data.append('emp_no', $('#emp_no').val());
                    form_data.append('resp_person_name', $('#resp_person_name').val());
                    form_data.append('ou', $('#ou').val());
                    form_data.append('account', $('#account').val());
                    form_data.append('dept', $('#dept').val());
                    form_data.append('fund', $('#fund').val());
                    form_data.append('proj_code', $('#proj_code').val());
                    form_data.append('prog', $('#prog').val());
                    form_data.append('idLocation', $('#idLocation').val());
                    form_data.append('idSubLocation', $('#idSubLocation').val());
                    form_data.append('area', $('#area').val());
                    form_data.append('verification_status', $('#verification_status').val());
                    form_data.append('last_verify_date', $('#last_verify_date').val());
                    form_data.append('due_date', $('#due_date').val());
                    form_data.append('pur_date', $('#pur_date').val());
                    form_data.append('status.php', $('#status').val());
                    form_data.append('writOff_formNo', $('#writOff_formNo').val());
                    form_data.append('wo_date', $('#wo_date').val());
                    form_data.append('remarks', $('#remarks').val());
                });

                /*dzClosure.on('complete', function (result) {


                    toastMsg('success', 'Successfully Inserted', 'success');
                    $('.res_heading').html('success').css('color', 'green');
                    $('.res_msg').html('Image Successfully Inserted').css('color', 'green');

                    console.log(result);
                    console.log('completed');
                    hideloader();
                    $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                    try {
                        var response = JSON.parse(result);
                        if (response[0] == 'Success') {
                            toastMsg(response[0], response[1], 'success');
                            $('.res_heading').html(response[0]).css('color', 'green');
                            $('.res_msg').html(response[1]).css('color', 'green');
                            setTimeout(function () {
                                // window.location.reload();
                            }, 1500)
                        } else {
                            toastMsg(response[0], response[1], 'error');
                            $('.res_heading').html(response[0]).css('color', 'red');
                            $('.res_msg').html(response[1]).css('color', 'red');
                        }
                    } catch (e) {
                    }
                })*/
            },
        });
    });

    function chkStatus(obj) {
        var status = $('#status').val();
        if (status == 1 || status == 2 || status == 4 || status == 5 || status == 6 || status == 7 || status == 8) {
            $('#writOff_formNo').val('').attr('disabled', 'disabled');
            $('#wo_date').val('').attr('disabled', 'disabled');
        } else {
            $('#writOff_formNo').removeAttr('disabled', 'disabled');
            $('#wo_date').removeAttr('disabled', 'disabled');
        }
    }




    function mySubmitData() {
        console.log('mySubmitData');
        dzClosure.processQueue();

        var form_data = new FormData();

        /*  var totalfiles = document.getElementById('file').files.length;
          for (var index = 0; index < totalfiles; index++) {
              form_data.append("file[]", document.getElementById('file').files[index]);
          }*/

        form_data.append('pr_reqId', $('#pr_reqId').val());
        form_data.append('idCategory', $('#idCategory').val());
        form_data.append('desc', $('#desc').val());
        form_data.append('model', $('#model').val());
        form_data.append('product_no', $('#product_no').val());
        form_data.append('gri_no', $('#gri_no').val());
        form_data.append('serial_no', $('#serial_no').val());
        form_data.append('tag_no', $('#tag_no').val());
        form_data.append('po_no', $('#po_no').val());
        form_data.append('cost', $('#cost').val());
        form_data.append('idCurrency', $('#idCurrency').val());
        form_data.append('idSourceOfPurchase', $('#idSourceOfPurchase').val());
        form_data.append('emp_no', $('#emp_no').val());
        form_data.append('resp_person_name', $('#resp_person_name').val());
        form_data.append('ou', $('#ou').val());
        form_data.append('account', $('#account').val());
        form_data.append('dept', $('#dept').val());
        form_data.append('fund', $('#fund').val());
        form_data.append('proj_code', $('#proj_code').val());
        form_data.append('prog', $('#prog').val());
        form_data.append('idLocation', $('#idLocation').val());
        form_data.append('idSubLocation', $('#idSubLocation').val());
        form_data.append('area', $('#area').val());
        form_data.append('verification_status', $('#verification_status').val());
        form_data.append('last_verify_date', $('#last_verify_date').val());
        form_data.append('due_date', $('#due_date').val());
        form_data.append('pur_date', $('#pur_date').val());
        form_data.append('status.php', $('#status').val());
        form_data.append('writOff_formNo', $('#writOff_formNo').val());
        form_data.append('wo_date', $('#wo_date').val());
        form_data.append('remarks', $('#remarks').val());
        showloader();
        $('.mybtn').addClass('hide').attr('disabled', 'disabled');
        CallAjax('<?php echo base_url('index.php/asset_controllers/Add_asset/insertData'); ?>', form_data, 'POST', function (result) {
            console.log(result);
            hideloader();
            $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
            try {
                var response = JSON.parse(result);
                if (response[0] == 'Success') {
                    toastMsg(response[0], response[1], 'success');
                    $('.res_heading').html(response[0]).css('color', 'green');
                    $('.res_msg').html(response[1]).css('color', 'green');
                    $('.paeds_id').text('0' + response[2]);
                } else {
                    toastMsg(response[0], response[1], 'error');
                    $('.res_heading').html(response[0]).css('color', 'red');
                    $('.res_msg').html(response[1]).css('color', 'red');
                }
            } catch (e) {
            }
        }, true);

    }

    function changeTagPaedID() {
        $('#tag_no').removeClass('error');
        $('.tagNextBtn').removeAttr('disabled');
        if ($('#paeds_tagID').prop("checked") == true) {
            var paeds_id = $('.paeds_id').text().trim();
            $('#tag_no').val('PAEDSID ' + paeds_id).attr('disabled', 'disabled');
        } else if ($('#paeds_tagID').prop("checked") == false) {
            $('#tag_no').val('').removeAttr('disabled', 'disabled');
        }
    }

    function chkTagNo() {
        var data = {};
        data['tag_no'] = $('#tag_no').val();
        $('#tag_no').removeClass('error');
        $('.tagNextBtn').removeAttr('disabled');
        if (data['tag_no'] != '' && data['tag_no'] != undefined) {
            CallAjax('<?php echo base_url('index.php/asset_controllers/Add_asset/chkTag')?>', data, 'Post', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        $('#tag_no').removeClass('error');
                        $('.tagNextBtn').removeAttr('disabled');
                        return true;
                        // toastMsg(response[0], response[1], 'success');
                    } else {
                        $('.tagNextBtn').attr('disabled','disabled');
                        $('#tag_no').addClass('error');
                        toastMsg(response[0], response[1], 'error');
                        return false;
                    }
                } catch (e) {
                }
            })
        } else {
            $('.tagNextBtn').attr('disabled','disabled');
            $('#tag_no').addClass('error');
            toastMsg('Error', 'Invalid Tag No', 'error');
            return false;
        }
    }

    function mydate() {
        $('.mypickadat').pickadate({
            selectYears: true,
            selectMonths: true,
            min: new Date(2010, 12, 1),
            max: true,
            clear: ' ',
            format: 'dd-mm-yyyy'
        });
    }

    function mydate2() {
        $('.mypickadat2').pickadate({
            selectYears: true,
            selectMonths: true,
            min: new Date(2010, 12, 1),
            clear: ' ',
            format: 'dd-mm-yyyy'
        });
    }

    /*function insertData() {
        var data = {};
        data['pr_reqId'] = $('#pr_reqId').val();
        data['idCategory'] = $('#idCategory').val();
        data['desc'] = $('#desc').val();
        data['model'] = $('#model').val();
        data['product_no'] = $('#product_no').val();
        data['serial_no'] = $('#serial_no').val();
        data['tag_no'] = $('#tag_no').val();
        data['po_no'] = $('#po_no').val();
        data['cost'] = $('#cost').val();
        data['idCurrency'] = $('#idCurrency').val();
        data['idSourceOfPurchase'] = $('#idSourceOfPurchase').val();
        data['emp_no'] = $('#emp_no').val();
        data['resp_person_name'] = $('#resp_person_name').val();
        data['proj'] = $('#proj').val();
        data['ou'] = $('#ou').val();
        data['account'] = $('#account').val();
        data['dept'] = $('#dept').val();
        data['fund'] = $('#fund').val();
        data['proj_code'] = $('#proj_code').val();
        data['prog'] = $('#prog').val();
        data['idLocation'] = $('#idLocation').val();
        data['idSubLocation'] = $('#idSubLocation').val();
        data['verification_status'] = $('#verification_status').val();
        data['last_verify_date'] = $('#last_verify_date').val();
        data['due_date'] = $('#due_date').val();
        data['pur_date'] = $('#pur_date').val();
        data['status'] = $('#status').val();
        data['writOff_formNo'] = $('#writOff_formNo').val();
        data['wo_date'] = $('#wo_date').val();
        data['remarks'] = $('#remarks').val();
        var vd = validateData(data);
        if (vd) {
            showloader();
            $('.mybtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('< ?php echo base_url('index.php/asset_controllers/Add_asset/insertData'); ?>', data, 'POST', function (result) {
                hideloader();
                $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        toastMsg(response[0], response[1], 'success');
                        $('.res_heading').html(response[0]).css('color', 'green');
                        $('.res_msg').html(response[1]).css('color', 'green');
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500)
                    } else {
                        toastMsg(response[0], response[1], 'error');
                        $('.res_heading').html(response[0]).css('color', 'red');
                        $('.res_msg').html(response[1]).css('color', 'red');
                    }
                } catch (e) {
                }
            });
        } else {
            toastMsg('Error', 'Invalid Data', 'error');
        }
    }*/

</script>