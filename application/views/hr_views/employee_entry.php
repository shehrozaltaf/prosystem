<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/forms/wizard/bs-stepper.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/forms/form-validation.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/forms/form-wizard.min.css">
<!-- BEGIN: Content-->

<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/file-uploaders/dropzone.min.css">

<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/css/plugins/forms/form-file-uploader.min.css">

<script src="<?php echo base_url() ?>assets/vendors/js/extensions/dropzone.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/scripts/forms/form-file-uploader.min.js"></script>
<style>
    .avatar-preview {
        width: 250px;
        height: 250px;
        position: relative;
        border: 6px solid #F8F8F8;
    }

    .avatar-preview > div {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
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
                        <h2 class="content-header-title float-left mb-0">Add Employee Information</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Employee Information</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <section class="vertical-wizard">

                <div class="bs-stepper vertical modern-verticals-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">1</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Personal Information</span>
                                    <span class="bs-stepper-subtitle">Add Personal Information</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#personal-info-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Contact Details</span>
                                    <span class="bs-stepper-subtitle">Add Contact Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#address-step-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Emergency Contact</span>
                                    <span class="bs-stepper-subtitle">Add Emergency Contact</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#social-links-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">4</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Employment Details</span>
                                    <span class="bs-stepper-subtitle">Add Employment Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#hiring_status">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">5</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Status of Hiring Formalities</span>
                                    <span class="bs-stepper-subtitle">Add Status of Hiring Formalities</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#documents">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">6</span>
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
                                <h5 class="mb-0">Personal Information</h5>
                                <small class="text-muted">Enter Personal Information</small>
                            </div>

                            <form id="myForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="empno">Employee Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="empno"
                                                       class="form-control numericOnly required"
                                                       maxlength="6"
                                                       placeholder="Employee Number"
                                                       name="empno"
                                                       value=""
                                                       autocomplete="empno_add"
                                                       onfocusout="chkEmpNo()"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="offemail">Official Email<br/>(without aku.edu)</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text"
                                                           id="offemail"
                                                           name="offemail"
                                                           class="form-control required"
                                                           maxlength="70"
                                                           placeholder="Official Email"
                                                           autocomplete="offemail_add"
                                                           required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">@aku.edu</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="empname">Full Name <br>(Use Capital Letters)</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                       id="empname"
                                                       name="empname"
                                                       class="form-control required"
                                                       maxlength="70"
                                                       placeholder="Full Name"
                                                       onkeypress="return lettersOnly_WithSpace();"
                                                       style="text-transform: uppercase;"
                                                       autocomplete="empname_add"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="cnicno">CNIC Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="cnicno"
                                                       class="form-control required" placeholder="CNIC NO"
                                                       name="cnicno" required autocomplete="cnicno_add">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="cnicexdt">CNIC Expiry Date</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="cnicexdt"
                                                       class="form-control mypickadat2"
                                                       placeholder="CNIC NO Expiry Date"
                                                       name="cnicexdt" autocomplete="cnicexdt_add">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="dob">Date of Birth</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="dob" required
                                                       placeholder="Date of Birth"
                                                       class="form-control mypickadat_dob  required"
                                                       name="dob" autocomplete="dob_add">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="degree">Highest Qualification <br/>Degree / Field</label>
                                            </div>
                                            <div class="col-sm-3 col-form-label">
                                                <select class="select2 form-control  required" id="degree" name="degree"
                                                        required>
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($degree) && $degree != '') {
                                                        foreach ($degree as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->degree . '" value="' . $v->id . '">' . $v->degree . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 col-form-label">
                                                <select class="select2 form-control required" id="field" name="field"
                                                        required>
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($field) && $field != '') {
                                                        foreach ($field as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->field . '" value="' . $v->id . '">' . $v->field . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;

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
                                <button class="btn btn-primary btn-next tagNextBtn">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                </button>
                            </div>
                        </div>
                        <div id="personal-info-vertical" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Contact Details</h5>
                                <small>Enter Contact Details.</small>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="resaddr">Residential Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="resaddr" class="form-control required"
                                                       placeholder="Residential Address"
                                                       required autocomplete="resaddr_add"
                                                       name="resaddr" maxlength="200" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="peremail">Personal Email</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="peremail" class="form-control required"
                                                       placeholder="Personal Email"
                                                       required autocomplete="peremail_add"
                                                       name="peremail" maxlength="100" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="landline">Landline Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="tel" id="landline" required
                                                       onkeypress="return numeralsOnly();"
                                                       placeholder="Landline Number"
                                                       class="form-control" name="landline"
                                                       maxlength="15" autocomplete="landline_add">
                                                <small>
                                                    <input type="checkbox" value="1" id="chk_landline"
                                                           name="chk_landline" autocomplete="chk_landline_add"
                                                           data-oldval="0">
                                                    Not Available
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="cellno1">Mobile Number (Primary)</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="tel" id="cellno1" maxlength="11"
                                                       placeholder="Mobile Number (Primary)"
                                                       class="form-control required" name="cellno1"
                                                       onkeypress="return numeralsOnly();"
                                                       autocomplete="cellno1_add" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="cellno2">Mobile Number (Alternate)</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="tel" id="cellno2" maxlength="11"
                                                       class="form-control required" name="cellno2"
                                                       placeholder="Mobile Number (Alternate)"
                                                       onkeypress="return numeralsOnly();"
                                                       autocomplete="cellno2_add" required
                                                >
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
                                <h5 class="mb-0">Emergency Contact</h5>
                                <small>Enter Emergency Contact.</small>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="personnme">Person Name</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="personnme" maxlength="70"

                                                       class="form-control required" name="personnme"
                                                       placeholder="Person Name"
                                                       style="text-transform: uppercase;"
                                                       autocomplete="personnme_add"
                                                       onkeypress="return lettersOnly_WithSpace();" required
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="emcellno">Mobile Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="tel" id="emcellno" maxlength="11"
                                                       class="form-control required" name="emcellno"
                                                       autocomplete="emcellno_add"
                                                       onkeypress="return numeralsOnly();"
                                                       placeholder="Mobile Number" required
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="emlandno">Landline No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="tel" id="emlandno" maxlength="8"
                                                       class="form-control" name="emlandno"
                                                       onkeypress="return numeralsOnly();"
                                                       placeholder="Landline No." autocomplete="emlandno_add"
                                                >
                                                <small>
                                                    <input type="checkbox" value="1" id="chk_emlandno"
                                                           name="chk_emlandno" autocomplete="chk_emlandno_add"
                                                           data-oldval="0">
                                                    Not Available
                                                </small>
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
                        <div id="social-links-vertical" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Employment Details</h5>
                                <small>Enter Employment Details.</small>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="ddlemptype">Employment Type</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required" id="ddlemptype"
                                                        autocomplete="ddlemptype_add" name="ddlemptype" required>
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($employeeType) && $employeeType != '') {
                                                        foreach ($employeeType as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->emptype . '" value="' . $v->id . '">' . $v->emptype . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="ddlcategory">Job Category</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required" id="ddlcategory"
                                                        autocomplete="ddlcategory_add"
                                                        name="ddlcategory" required>
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($category) && $category != '') {
                                                        foreach ($category as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->category . '" value="' . $v->id . '">' . $v->category . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="gncno">GNC Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="gncno"
                                                       placeholder="GNC Number" autocomplete="gncno_add"
                                                       class="form-control required" name="gncno" required
                                                >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="ddlband">Band</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required" id="ddlband"
                                                        autocomplete="ddlband_add"  onchange="changeBand()"
                                                        required name="ddlband">
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($band) && $band != '') {
                                                        foreach ($band as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->band . '" value="' . $v->id . '">' . $v->band . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="titdesi">Title / Designation</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required" id="titdesi"
                                                        autocomplete="titdesi_add"
                                                        required name="titdesi">
                                                    <option value="0" readonly selected></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="rehiredt">Hire / Rehire Date</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="rehiredt" required
                                                       placeholder="Hire / Rehire Date" autocomplete="rehiredt_add"
                                                       class="form-control mypickadat required" name="rehiredt"
                                                >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="conexpiry">Contract Expiry</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="conexpiry" required
                                                       placeholder="Contract Expiry" autocomplete="conexpiry_add"
                                                       class="form-control mypickadat2 required" name="conexpiry"
                                                >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="workproj">Working Project</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required" id="workproj"
                                                        autocomplete="workproj_add"
                                                        required name="workproj">
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($proj) && $proj != '') {
                                                        foreach ($proj as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->proj_name . '" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="chargproj">Charging Project</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required" id="chargproj"
                                                        autocomplete="chargproj_add"
                                                        required name="chargproj">
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($proj) && $proj != '') {
                                                        foreach ($proj as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->proj_name . '" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="ddlloc">Location</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required" id="ddlloc"
                                                        autocomplete="ddlloc_add"
                                                        onchange="changeLocation('ddlloc','ddlloc_sub')"
                                                        required name="ddlloc">
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($location) && $location != '') {
                                                        foreach ($location as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->location . '" value="' . $v->id . '">' . $v->location . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="ddlloc_sub">Sub Location</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required"
                                                        id="ddlloc_sub"
                                                        name="ddlloc_sub" autocomplete="ddlloc_sub" required>
                                                    <option value="0" readonly selected></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="supernme">Supervisor Name</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required" id="supernme"
                                                        autocomplete="supernme_add"
                                                        required name="supernme">
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($supervisor) && $supervisor != '') {
                                                        foreach ($supervisor as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->empname . '" value="' . $v->empno . '">'
                                                                . $v->empname . ' (' . $v->empno . ' - ' . $v->desig . ')</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="hiresalary">Hiring Salary</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="hiresalary" required
                                                       class="form-control required" name="hiresalary"
                                                       onkeypress="return numeralsOnly();" MaxLength="7"
                                                       placeholder="Hiring Salary" autocomplete="hiresalary_add">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="ddlhardship">Hardship Allowance</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control select2 required" id="ddlhardship"
                                                        autocomplete="ddlhardship_add"
                                                        required name="ddlhardship">
                                                    <option value="0" readonly selected></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="amount">Amount</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="amount" autocomplete="amount_add" MaxLength="6"
                                                       required class="form-control required" name="amount"
                                                       placeholder="Amount" onkeypress="return numeralsOnly();">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="benefits">Benefits</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control select2 required" id="benefits"
                                                        autocomplete="benefits_add"
                                                        required name="benefits">
                                                    <option value="0" readonly selected></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
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
                        <div id="hiring_status" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Status of Hiring Formalities</h5>
                                <small>Status of Hiring Formalities.</small>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="peme">PEME</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control select2 required" id="peme"
                                                        autocomplete="peme_add"
                                                        required name="peme">
                                                    <option value="0" readonly selected></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="gop">General Orientation Program</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control select2 required" id="gop"
                                                        autocomplete="gop_add"
                                                        required name="gop">
                                                    <option value="0" readonly selected></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="gopdt">GOP Date</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="gopdt" required
                                                       class="form-control mypickadat required" name="gopdt"
                                                       placeholder="GOP Date" autocomplete="gopdt_add">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="entity">Entity</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required" id="entity"
                                                        autocomplete="entity_add"
                                                        required name="entity">
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($entity) && $entity != '') {
                                                        foreach ($entity as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->entity . '" value="' . $v->id . '">' . $v->entity . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="dept">Department</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control required" id="dept"
                                                        autocomplete="dept_add"
                                                        required name="dept">
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($dept) && $dept != '') {
                                                        foreach ($dept as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->dept . '" value="' . $v->id . '">' . $v->dept . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="cardissue">ID Card Issued</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control select2 required" id="cardissue"
                                                        autocomplete="cardissue_add"
                                                        required name="cardissue">
                                                    <option value="0" readonly selected></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="letterapp">Letter of Appointment Received</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control select2 required" id="letterapp"
                                                        autocomplete="letterapp_add"
                                                        required name="letterapp">
                                                    <option value="0" readonly selected></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="confirmation">Confirmation</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control select2 required" id="confirmation"
                                                        autocomplete="confirmation_add"
                                                        required name="confirmation">
                                                    <option value="0" readonly selected></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="status">Status</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control select2 required" id="status"
                                                        autocomplete="status_add"
                                                        required name="status">
                                                    <?php
                                                    $html_options_Q = '<option value="0" readonly selected></option>';
                                                    if (isset($status) && $status != '') {
                                                        foreach ($status as $v) {
                                                            $html_options_Q .= '<option data-text="' . $v->status . '" value="' . $v->id . '">' . $v->status . '</option>';
                                                        }
                                                    }
                                                    echo $html_options_Q;
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="remarks">Remarks</label>
                                            </div>
                                            <div class="col-sm-9">
                                             <textarea id="remarks" rows="5" required autocomplete="remarks_add"
                                                       class="form-control" name="remarks"
                                                       placeholder="Remarks"></textarea>
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
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        Upload Picture
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="file" class="custom-file-input" required
                                               id="pic" name="pic" accept="image/jpeg">
                                        <label class="custom-file-label"
                                               for="pic">Choose Picture</label>

                                        <div class="avatar-upload hide">
                                            <div class="avatar-preview">
                                                <div id="imagePreview">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Upload Documents</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" class="dropzone dropzone-area" id="dpz-remove-thumbs">
                                            <div class="fallback">
                                                <input type="file" id="files" name="files[]" multiple/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 offset-md-12 d-flex justify-content-between">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>

                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-submitDraft btn-submit mybtn mr-1"
                                            data-status="draft" id="btn-submitDraft">Save
                                        Draft
                                    </button>
                                    <button class="btn btn-success btn-submit mybtn" id="btn-submit"
                                            data-status="save">Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Vertical Wizard -->
        </div>
    </div>
</div>
<input type="text" id="entryType" name="entryType">
<!-- END: Content-->
<script src="<?php echo base_url() ?>assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/forms/validation/jquery.validate.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/scripts/forms/form-wizard.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/scripts/jquery.inputmask.bundle.js"></script>


<script>
    $(document).ready(function () {
        mydate();
        mydate2();
        mydate_dob();
        $("#cnicno").inputmask("99999-9999999-9");
        $("#dob").inputmask("99-99-9999");
        $("#gncno").inputmask("9999/9999");
        $("#cnicexdt").inputmask("99-99-9999");
        $("#rehiredt").inputmask("99-99-9999");
        $("#conexpiry").inputmask("99-99-9999");
        $("#gopdt").inputmask("99-99-9999");
        $("#peremail").inputmask("email");
        $("#offemail").inputmask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]",
            greedy: false,
            onBeforePaste: function (pastedValue, opts) {
                pastedValue = pastedValue.toLowerCase();
                return pastedValue.replace("mailto:", "");
            },
            definitions: {
                '*': {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                    casing: "lower"
                }
            }
        });

        $(".numericOnly").ForceNumericOnly();
        $('#dpz-remove-thumbs').dropzone({
            url: "<?php echo base_url('index.php/hr_controllers/Employee_entry/addRecord'); ?>",
            uploadMultiple: true,
            parallelUploads: 25,
            maxFiles: 25,
            autoProcessQueue: false,
            addRemoveLinks: true,
            // acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
            init: function () {

                dzClosure = this;
                $('.btn-submit').on('click', function (e) {
                    var entryType = $(this).attr('data-status');
                    $('#entryType').val(entryType);
                    var flag = 0;
                    if (entryType == 'save') {
                        var inps = $('.bs-stepper-content').find('.required');
                        $.each(inps, function (i, v) {
                            var va = $(v).val();
                            if (va == '' || va == undefined || va == 0) {
                                $(v).parents('.content').addClass('active');
                                var side = $(v).parents('.content').attr('id');
                                $('.' + side).addClass('active').removeClass('crossed');
                                $(v).addClass('error');
                                flag = 1;
                            } else {
                                $(v).removeClass('error');
                            }
                        });
                        $('.bs-stepper-content').find('.active').removeClass('active');
                        $('.bs-stepper-header').find('.active').removeClass('active');
                    }
                    var empno = $('#empno').val();
                    if (empno != '' && empno != undefined && flag == 0) {
                        if (dzClosure.getQueuedFiles().length > 0) {
                            dzClosure.processQueue();
                        } else {
                            mySubmitData();
                        }
                    } else {
                        toastMsg('Error', 'Invalid Emp Detailsss', 'error');
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
                                console.log(response);
                                if (response[0] == 'Success') {
                                    toastMsg(response[0], response[1], 'success');
                                    $('.res_heading').html(response[0]).css('color', 'green');
                                    $('.res_msg').html(response[1]).css('color', 'green');
                                    setTimeout(function () {
                                        window.location.href='<?php echo base_url('index.php/hr_controllers/searchemployee')?>';
                                    }, 1000)
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
                    form_data.append('empno', $('#empno').val());
                    form_data.append('offemail', $('#offemail').val());
                    form_data.append('empname', $('#empname').val());
                    form_data.append('cnicno', $('#cnicno').val());
                    form_data.append('cnicexdt', $('#cnicexdt').val());
                    form_data.append('dob', $('#dob').val());
                    form_data.append('degree', $('#degree').val());
                    form_data.append('field', $('#field').val());
                    form_data.append('resaddr', $('#resaddr').val());
                    form_data.append('peremail', $('#peremail').val());
                    form_data.append('chk_landline', $('#chk_landline').val());
                    form_data.append('landline', $('#landline').val());
                    form_data.append('cellno1', $('#cellno1').val());
                    form_data.append('cellno2', $('#cellno2').val());
                    form_data.append('personnme', $('#personnme').val());
                    form_data.append('emcellno', $('#emcellno').val());
                    form_data.append('emlandno', $('#emlandno').val());
                    form_data.append('chk_emlandno', $('#chk_emlandno').val());
                    form_data.append('ddlemptype', $('#ddlemptype').val());
                    form_data.append('ddlcategory', $('#ddlcategory').val());
                    form_data.append('gncno', $('#gncno').val());
                    form_data.append('ddlband', $('#ddlband').val());
                    form_data.append('titdesi', $('#titdesi').val());
                    form_data.append('rehiredt', $('#rehiredt').val());
                    form_data.append('conexpiry', $('#conexpiry').val());
                    form_data.append('workproj', $('#workproj').val());
                    form_data.append('chargproj', $('#chargproj').val());
                    form_data.append('ddlloc', $('#ddlloc').val());
                    form_data.append('ddlloc_sub', $('#ddlloc_sub').val());
                    form_data.append('supernme', $('#supernme').val());
                    form_data.append('hiresalary', $('#hiresalary').val());
                    form_data.append('ddlhardship', $('#ddlhardship').val());
                    form_data.append('amount', $('#amount').val());
                    form_data.append('benefits', $('#benefits').val());
                    form_data.append('peme', $('#peme').val());
                    form_data.append('gop', $('#gop').val());
                    form_data.append('gopdt', $('#gopdt').val());
                    form_data.append('entity', $('#entity').val());
                    form_data.append('dept', $('#dept').val());
                    form_data.append('cardissue', $('#cardissue').val());
                    form_data.append('letterapp', $('#letterapp').val());
                    form_data.append('confirmation', $('#confirmation').val());
                    form_data.append('status', $('#status').val());
                    form_data.append('remarks', $('#remarks').val());
                    form_data.append('pic', $('#pic')[0].files[0]);
                    form_data.append('entryType', $('#entryType').val());
                });
            },
        });
    });

    function mySubmitData() {
        var flag = 0;
        var entryType = $('#entryType').val();
        if (entryType == 'save') {
            var inps = $('.bs-stepper-content').find('.required');
            $.each(inps, function (i, v) {
                var va = $(v).val();
                if (va == '' || va == undefined || va == 0) {
                    $(v).parents('.content').addClass('active');
                    var side = $(v).parents('.content').attr('id');
                    $('.' + side).addClass('active').removeClass('crossed');
                    $(v).addClass('error');
                    flag = 1;
                } else {
                    $(v).removeClass('error');
                }
            });
            $('.bs-stepper-content').find('.active').removeClass('active');
            $('.bs-stepper-header').find('.active').removeClass('active');
        }

        var empno = $('#empno').val();
        if (empno != '' && empno != undefined) {
            if (flag == 0) {
                console.log('mySubmitData');
                dzClosure.processQueue();
                var form_data = new FormData();
                form_data.append('empno', $('#empno').val());
                form_data.append('offemail', $('#offemail').val());
                form_data.append('empname', $('#empname').val());
                form_data.append('cnicno', $('#cnicno').val());
                form_data.append('cnicexdt', $('#cnicexdt').val());
                form_data.append('dob', $('#dob').val());
                form_data.append('degree', $('#degree').val());
                form_data.append('field', $('#field').val());

                form_data.append('resaddr', $('#resaddr').val());
                form_data.append('peremail', $('#peremail').val());
                form_data.append('chk_landline', $('#chk_landline').val());
                form_data.append('landline', $('#landline').val());
                form_data.append('cellno1', $('#cellno1').val());
                form_data.append('cellno2', $('#cellno2').val());

                form_data.append('personnme', $('#personnme').val());
                form_data.append('emcellno', $('#emcellno').val());
                form_data.append('emlandno', $('#emlandno').val());
                form_data.append('chk_emlandno', $('#chk_emlandno').val());

                form_data.append('ddlemptype', $('#ddlemptype').val());
                form_data.append('ddlcategory', $('#ddlcategory').val());
                form_data.append('gncno', $('#gncno').val());
                form_data.append('ddlband', $('#ddlband').val());
                form_data.append('titdesi', $('#titdesi').val());
                form_data.append('rehiredt', $('#rehiredt').val());
                form_data.append('conexpiry', $('#conexpiry').val());
                form_data.append('workproj', $('#workproj').val());
                form_data.append('chargproj', $('#chargproj').val());
                form_data.append('ddlloc', $('#ddlloc').val());
                form_data.append('ddlloc_sub', $('#ddlloc_sub').val());
                form_data.append('supernme', $('#supernme').val());
                form_data.append('hiresalary', $('#hiresalary').val());
                form_data.append('ddlhardship', $('#ddlhardship').val());
                form_data.append('amount', $('#amount').val());
                form_data.append('benefits', $('#benefits').val());

                form_data.append('peme', $('#peme').val());
                form_data.append('gop', $('#gop').val());
                form_data.append('gopdt', $('#gopdt').val());
                form_data.append('entity', $('#entity').val());
                form_data.append('dept', $('#dept').val());
                form_data.append('cardissue', $('#cardissue').val());
                form_data.append('letterapp', $('#letterapp').val());
                form_data.append('confirmation', $('#confirmation').val());
                form_data.append('status', $('#status').val());
                form_data.append('remarks', $('#remarks').val());
                form_data.append('pic', $('#pic')[0].files[0]);
                form_data.append('entryType', $('#entryType').val());
                showloader();
                $('.mybtn').addClass('hide').attr('disabled', 'disabled');
                CallAjax('<?php echo base_url('index.php/hr_controllers/Employee_entry/addRecord'); ?>', form_data, 'POST', function (result) {
                    console.log(result);
                    hideloader();
                    $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                    try {
                        var response = JSON.parse(result);
                        if (response[0] == 'Success') {
                            toastMsg(response[0], response[1], 'success');
                            $('.res_heading').html(response[0]).css('color', 'green');
                            $('.res_msg').html(response[1]).css('color', 'green');
                            setTimeout(function () {
                                window.location.href='<?php echo base_url('index.php/hr_controllers/searchemployee')?>';
                            }, 1000);
                        } else {
                            toastMsg(response[0], response[1], 'error');
                            $('.res_heading').html(response[0]).css('color', 'red');
                            $('.res_msg').html(response[1]).css('color', 'red');
                        }
                    } catch (e) {
                    }
                }, true);
            } else {
                toastMsg('Error', 'Invalid Data', 'error');
            }
        } else {
            toastMsg('Error', 'Invalid Emp No', 'error');
        }

    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            $('.avatar-upload').hide();
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
                $('.avatar-upload').show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#pic").change(function () {
        readURL(this);
    });

    $(document).on('click', '#chk_landline', function () {
        if ($('#chk_landline').prop('checked') == true) {
            $('#landline').val('999999999999999');
            $('#landline').prop('disabled', 'disabled');
        } else {
            $('#landline').val('');
            $('#landline').removeAttr('disabled');
        }
    });

    $(document).on('click', '#chk_emlandno', function () {
        if ($('#chk_emlandno').prop('checked') == true) {
            $('#emlandno').val('999999999999999');
            $('#emlandno').prop('disabled', 'disabled');
        } else {
            $('#emlandno').val('');
            $('#emlandno').removeAttr('disabled');
        }
    });

    function changeBand() {
        var data = {};
        data['bandid'] = $('#ddlband').val();
        $('#titdesi').html('');
        CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/getDesignation'); ?>', data, 'POST', function (result) {
            if (result != '' && JSON.parse(result).length > 0) {
                var a = JSON.parse(result);
                try {
                    if (a[0].error == 2) {
                        toastMsg('Error', 'Invalid Band Id', 'error');
                    } else if (a[0].error == 3) {
                        toastMsg('Error', 'No Designation for this band', 'warning');
                    } else {
                        var htmlQ = '<option value="0" selected readonly disabled>&nbsp</option>';
                        $.each(a, function (i, v) {
                            htmlQ += '<option value="' + v.id + '">' + v.desig + '</option>';
                        });
                        $('#titdesi').html(htmlQ);
                    }
                } catch (e) {
                }
            } else {
                toastMsg('Error', 'Something went wrong', 'error');
            }
        });
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
            selectYears: 20,
            selectMonths: true,
            min: new Date(2010, 12, 1),
            clear: ' ',
            format: 'dd-mm-yyyy'
        });
    }

    function mydate_dob() {
        $('.mypickadat_dob').pickadate({
            selectYears: 60,
            selectMonths: true,
            max: new Date(2010, 12, 1),
            clear: '',
            editable: true,
            format: 'dd-mm-yyyy'
        });
    }

    function chkEmpNo() {
        var data = {};
        data['empno'] = $("#empno").val();
        $("#empno").removeClass('error');
        if (data['empno'] != '' && data['empno'] != undefined) {
            CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/getEmployeeEmpNo'); ?>', data, 'POST', function (result) {
                if (result != '' && result != null) {
                    var hidden_id = $("#hidden_id").val();
                    var a = JSON.parse(result);
                    try {
                        if (a[0].error == 1) {
                            toastMsg('Error', 'Employee number already exists', 'error');
                            $("#empno").addClass('error').focus();

                            $('#cmdUpdateSaveDraft').css('display', 'none');
                            $('#cmdSummary').css('display', 'none');
                            $('#cmdAddSaveDraft').css('display', 'none');
                            $('#cmdAddData').css('display', 'none');

                        } else {
                            if (hidden_id != '' && hidden_id != undefined) {
                                $('#cmdUpdateSaveDraft').removeAttr('style');
                                $('#cmdSummary').removeAttr('style');
                            } else {
                                $('#cmdAddSaveDraft').removeAttr('style');
                                $('#cmdAddData').removeAttr('style');
                            }
                        }
                    } catch (e) {
                    }
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            });
        }
    }

    function lettersOnly_WithSpace(evt) {
        var iserr = true;
        evt = (evt) ? evt : event;
        var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));
        if (charCode > 31 && (charCode < 65 || charCode > 90) &&
            (charCode < 97 || charCode > 122) && charCode != 32) {
            toastMsg('Error', 'Please enter string value', 'error');
            iserr = false;
        }
        return iserr;
    }

    function numeralsOnly(evt) {
        evt = (evt) ? evt : event;
        var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));

        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            toastMsg('Error', 'Please enter Numeric value', 'error');
            return false;
        }
        return true;
    }

</script>