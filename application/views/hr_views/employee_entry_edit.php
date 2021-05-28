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
                        <h2 class="content-header-title float-left mb-0">Edit Employee Information</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Employee Information</li>
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
                                    <span class="bs-stepper-subtitle">Edit Personal Information</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#personal-info-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Contact Details</span>
                                    <span class="bs-stepper-subtitle">Edit Contact Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#Editress-step-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Emergency Contact</span>
                                    <span class="bs-stepper-subtitle">Edit Emergency Contact</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#social-links-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">4</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Employment Details</span>
                                    <span class="bs-stepper-subtitle">Edit Employment Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#hiring_status">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">5</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Status of Hiring Formalities</span>
                                    <span class="bs-stepper-subtitle">Edit Status of Hiring Formalities</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#documents">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">6</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Documents</span>
                                    <span class="bs-stepper-subtitle">Edit Documents</span>
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
                                                       disabled="disabled"
                                                       class="form-control numericOnly" maxlength="6"
                                                       placeholder="Employee Number"
                                                       name="empno"
                                                       autocomplete="empno_Edit"
                                                       required
                                                       value="<?php echo(isset($editemp[0]->empno) ? $editemp[0]->empno : '') ?>">
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
                                                    <?php
                                                    if (isset($editemp[0]->offemail) && $editemp[0]->offemail != '') {
                                                        $empExp = explode('@', $editemp[0]->offemail);
                                                        $offEmail = $empExp[0];
                                                    } else {
                                                        $offEmail = '';
                                                    }
                                                    ?>
                                                    <input type="text"
                                                           id="offemail"
                                                           name="offemail"
                                                           class="form-control required"
                                                           maxlength="70"
                                                           placeholder="Official Email"
                                                           autocomplete="offemail_add"
                                                           value="<?php echo $offEmail ?>"
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
                                                <input type="text" id="empname"
                                                       class="form-control" maxlength="70"
                                                       placeholder="Full Name" name="empname"
                                                       onkeypress="return lettersOnly_WithSpace();"
                                                       style="text-transform: uppercase;" required
                                                       autocomplete="empname_Edit"
                                                       value="<?php echo(isset($editemp[0]->empname) && $editemp[0]->empname != '' ? $editemp[0]->empname : '') ?>"
                                                >
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
                                                       class="form-control" placeholder="CNIC NO"
                                                       name="cnicno" required autocomplete="cnicno_Edit"
                                                       value="<?php echo(isset($editemp[0]->cnicno) && $editemp[0]->cnicno != '' ? $editemp[0]->cnicno : '') ?>"
                                                >
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
                                                       class="form-control mypickadat_dob"
                                                       name="dob" autocomplete="dob_Edit"
                                                       value="<?php echo(isset($editemp[0]->dob) && $editemp[0]->dob != '' ? date('d-m-Y', strtotime($editemp[0]->dob)) : '') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="degree">Highest Qualification <br/>Degree / Field</label>
                                            </div>

                                            <div class="col-sm-3 col-form-label">
                                                <?php
                                                $html_options_Q = '<option value="0" readonly disabled selected></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($degree) && $degree != '') {
                                                    foreach ($degree as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->degree) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->degree;
                                                            $html_options_Q .= '<option selected="selected" data-text="' . $v->degree . '" value="' . $v->id . '">' . $v->degree . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->degree . '" value="' . $v->id . '">' . $v->degree . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="degree"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="degree">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;
                                                ?>
                                            </div>
                                            <div class="col-sm-3 col-form-label">
                                                <?php

                                                $html_options_Q = '<option value="0" readonly disabled selected></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';

                                                if (isset($field) && $field != '') {
                                                    foreach ($field as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->fieldID) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->field;
                                                            $html_options_Q .= '<option selected="selected" data-text="' . $v->field . '" value="' . $v->id . '">' . $v->field . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->field . '" value="' . $v->id . '">' . $v->field . '</option>';
                                                        }
                                                    }
                                                }

                                                $htmlQ .= '<select class="select2 form-control" id="field"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="field">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;
                                                ?>
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
                                                <label for="resaddr">Residential Editress</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="resaddr" class="form-control"
                                                       placeholder="Residential Address"
                                                       required autocomplete="resaddr_Edit"
                                                       name="resaddr" maxlength="200"
                                                       value="<?php echo(isset($editemp[0]->resaddr) && $editemp[0]->resaddr != '' ? $editemp[0]->resaddr : '') ?>"
                                                >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="peremail">Personal Email</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="peremail" class="form-control"
                                                       placeholder="Personal Email"
                                                       required autocomplete="peremail_Edit"
                                                       name="peremail" maxlength="100"
                                                       value="<?php echo(isset($editemp[0]->peremail) && $editemp[0]->peremail != '' ? $editemp[0]->peremail : '') ?>"
                                                >
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
                                                       onkeypress="return numeralsOnly_phone();"
                                                       placeholder="Landline Number"
                                                       class="form-control" name="landline"
                                                       maxlength="15" autocomplete="landline_Edit"
                                                       value="<?php echo((isset ($editemp[0]->landlineccode) ? $editemp[0]->landlineccode : '') . (isset($editemp[0]->landline) ? $editemp[0]->landline : '')) ?>">
                                                <small>
                                                    <input type="checkbox" value="1" id="chk_landline"
                                                           name="chk_landline" autocomplete="chk_landline_Edit"
                                                        <?php echo(isset($editemp[0]->chk_landline) && $editemp[0]->chk_landline == 1 ? 'checked="checked"' : '') ?>
                                                           data-oldval="<?php echo(isset($editemp[0]->chk_landline) ? $editemp[0]->chk_landline : '0') ?>"
                                                           class="">
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
                                                <input type="tel" id="cellno1" maxlength="11" required
                                                       placeholder="Mobile Number (Primary)"
                                                       class="form-control" name="cellno1"
                                                       onkeypress="return numeralsOnly();"
                                                       autocomplete="cellno1_Edit"
                                                       value="<?php echo((isset($editemp[0]->cellno1) && $editemp[0]->cellno1 != '' ? $editemp[0]->cellno1 : '')) ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="cellno2">Mobile Number (Alternate)</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="tel" id="cellno2" maxlength="11" required
                                                       class="form-control" name="cellno2"
                                                       placeholder="Mobile Number (Alternate)"
                                                       onkeypress="return numeralsOnly();"
                                                       autocomplete="cellno2_Edit"
                                                       value="<?php echo((isset($editemp[0]->cellno2) && $editemp[0]->cellno2 != '' ? $editemp[0]->cellno2 : '')) ?>"
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
                        <div id="Editress-step-vertical" class="content">
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
                                                       required
                                                       class="form-control" name="personnme"
                                                       placeholder="Person Name"
                                                       style="text-transform: uppercase;"
                                                       autocomplete="personnme_Edit"
                                                       onkeypress="return lettersOnly_WithSpace();"
                                                       value="<?php echo(isset($editemp[0]->personnme) && $editemp[0]->personnme != '' ? $editemp[0]->personnme : '') ?>"
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
                                                <input type="tel" id="emcellno" maxlength="11" required
                                                       class="form-control" name="emcellno" autocomplete="emcellno_Edit"
                                                       onkeypress="return numeralsOnly();"
                                                       placeholder="Mobile Number"
                                                       value="<?php echo((isset($editemp[0]->emcellno) && $editemp[0]->emcellno != '' ? $editemp[0]->emcellno : '')) ?>"
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
                                                <input type="tel" id="emlandno" maxlength="8" required
                                                       class="form-control" name="emlandno"
                                                       onkeypress="return numeralsOnly();"
                                                       placeholder="Landline No." autocomplete="emlandno_Edit"
                                                       value="<?php echo((isset($editemp[0]->emlandno) && $editemp[0]->emlandno != '' ? $editemp[0]->emlandno : '')) ?>"
                                                >
                                                <small>
                                                    <input type="checkbox" value="1" id="chk_emlandno"
                                                           name="chk_emlandno" autocomplete="chk_emlandno_Edit"
                                                        <?php echo(isset($editemp[0]->chk_emlandno) && $editemp[0]->chk_emlandno == 1 ? 'checked="checked"' : '') ?>
                                                           data-oldval="<?php echo(isset($editemp[0]->chk_emlandno) ? $editemp[0]->chk_emlandno : '0') ?>"
                                                           class="">
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
                                                <?php
                                                $html_options_Q = '<option value="0" readonly selected disabled></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($employeeType) && $employeeType != '') {
                                                    foreach ($employeeType as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->ddlemptype) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->emptype;
                                                            $html_options_Q .= '<option data-text="' . $v->emptype . '" selected="selected" value="' . $v->id . '">' . $v->emptype . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->emptype . '" value="' . $v->id . '">' . $v->emptype . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="ddlemptype"  autocomplete="ddlemptype_Edit"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="ddlemptype">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="ddlcategory">Job Category</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0" readonly selected disabled></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($category) && $category != '') {
                                                    foreach ($category as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->ddlcategory) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->category;
                                                            $html_options_Q .= '<option data-text="' . $v->category . '" selected="selected" value="' . $v->id . '">' . $v->category . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->category . '" value="' . $v->id . '">' . $v->category . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="ddlcategory" autocomplete="ddlcategory_Edit"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="ddlcategory">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;
                                                ?>

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
                                                       placeholder="GNC Number" autocomplete="gncno_Edit"
                                                       class="form-control" name="gncno" required
                                                       value="<?php echo(isset($editemp[0]->gncno) && $editemp[0]->gncno != '' ? $editemp[0]->gncno : '') ?>"
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
                                                <?php
                                                $html_options_Q = '<option value="0" readonly selected disabled></option>';
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
                                                $htmlQ .= '<select class="select2 form-control" id="ddlband" autocomplete="ddlband_Edit"
                                                                     onchange="changeBand()"   required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="ddlband">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;
                                                ?>
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
                                                        required name="titdesi"
                                                        data-oldval="<?php echo(isset($editemp[0]->titdesi) && $editemp[0]->titdesi != '' ? $editemp[0]->titdesi : '0') ?>"
                                                        data-oldLabel="<?php echo(isset($editemp[0]->titdesi) && $editemp[0]->titdesi != '' ? $editemp[0]->titdesi : '0') ?>">
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
                                                       placeholder="Hire / Rehire Date" autocomplete="rehiredt_Edit"
                                                       class="form-control mypickadat" name="rehiredt"
                                                       value="<?php echo(isset($editemp[0]->rehiredt) && $editemp[0]->rehiredt != '' ? date('d-m-Y', strtotime($editemp[0]->rehiredt)) : '') ?>"
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
                                                       placeholder="Contract Expiry" autocomplete="conexpiry_Edit"
                                                       class="form-control mypickadat" name="conexpiry"
                                                       value="<?php echo(isset($editemp[0]->conexpiry) && $editemp[0]->conexpiry != '' ? date('d-m-Y', strtotime($editemp[0]->conexpiry)) : '') ?>"
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
                                                <?php
                                                $html_options_Q = '<option value="0" readonly selected disabled></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($proj) && $proj != '') {
                                                    foreach ($proj as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->proj_code === $editemp[0]->workproj) {
                                                            $oldValQ = $v->proj_code;
                                                            $oldLabelQ = $v->proj_name;
                                                            $html_options_Q .= '<option data-text="' . $v->proj_name . '" selected="selected" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->proj_name . '" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="workproj" autocomplete="workproj_Edit"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="workproj">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="chargproj">Charging Project</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0" readonly selected disabled></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($proj) && $proj != '') {
                                                    foreach ($proj as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->proj_code === $editemp[0]->chargproj) {
                                                            $oldValQ = $v->proj_code;
                                                            $oldLabelQ = $v->proj_name;
                                                            $html_options_Q .= '<option data-text="' . $v->proj_name . '" selected="selected" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->proj_name . '" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="chargproj" autocomplete="chargproj_Edit"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="chargproj">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="ddlloc">Location</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0" readonly selected disabled></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($location) && $location != '') {
                                                    foreach ($location as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->ddlloc) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->location;
                                                            $html_options_Q .= '<option data-text="' . $v->location . '" selected="selected" value="' . $v->id . '">' . $v->location . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->location . '" value="' . $v->id . '">' . $v->location . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="ddlloc"   autocomplete="ddlloc_Edit"
                                                 onchange="changeLocation(\'ddlloc\',\'ddlloc_sub\')"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="ddlloc">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="ddlloc_sub">Sub Location</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control"
                                                        id="ddlloc_sub"
                                                        data-oldval="<?php echo(isset($editemp[0]->ddlloc_sub) && $editemp[0]->ddlloc_sub != '' ? $editemp[0]->ddlloc_sub : '') ?>"
                                                        data-oldLabel="<?php echo(isset($editemp[0]->ddlloc_sub) && $editemp[0]->ddlloc_sub != '' ? $editemp[0]->ddlloc_sub : '') ?>"
                                                        name="ddlloc_sub" autocomplete="ddlloc_sub" required>
                                                    <option value="0" readonly disabled></option>
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
                                                <?php
                                                $html_options_Q = '<option value="0" readonly selected disabled></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';

                                                if (isset($supervisor) && $supervisor != '') {
                                                    foreach ($supervisor as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->empno === $editemp[0]->supernme) {
                                                            $oldValQ = $v->empno;
                                                            $oldLabelQ = $v->empname;
                                                            $html_options_Q .= '<option data-text="' . $v->empname . '" selected="selected" value="' . $v->empno . '">' . $v->empname . ' (' . $v->empno . ')</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->empname . '" value="' . $v->empno . '">' . $v->empname . ' (' . $v->empno . ')</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="supernme" autocomplete="supernme_Edit"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="supernme">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;
                                                ?>
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
                                                       class="form-control" name="hiresalary"
                                                       onkeypress="return numeralsOnly();" MaxLength="7"
                                                       placeholder="Hiring Salary" autocomplete="hiresalary_Edit"
                                                       data-oldval="<?php echo(isset($editemp[0]->hiresalary) ? $this->encrypt->decode($editemp[0]->hiresalary) : '') ?>"
                                                       value="<?php echo(isset($editemp[0]->hiresalary) ? $this->encrypt->decode($editemp[0]->hiresalary) : '') ?>"
                                                >

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
                                                        data-oldval="<?php echo(isset($editemp[0]->ddlhardship) && $editemp[0]->ddlhardship != '' ? $editemp[0]->ddlhardship : '') ?>"
                                                        data-oldLabel="<?php echo(isset($editemp[0]->ddlhardship) && $editemp[0]->ddlhardship != '' ? $editemp[0]->ddlhardship : '') ?>"
                                                        required name="ddlhardship">
                                                    <?php
                                                    echo '<option value="0" data-text="0" readonly ' . (!isset($editemp[0]->ddlhardship) || $editemp[0]->ddlhardship == "" ? "selected" : "") . '></option>
                                                    <option value="Yes" data-text="Yes" ' . ($editemp[0]->ddlhardship == "Yes" ? "selected" : "") . '>Yes</option>
                                                    <option value="No" data-text="No" ' . ($editemp[0]->ddlhardship == "No" ? "selected" : "") . '>No</option>';
                                                    ?>
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
                                                       data-oldval="<?php echo(isset($editemp[0]->amount) && $editemp[0]->amount != '' ? $editemp[0]->amount : '') ?>"
                                                       value="<?php echo(isset($editemp[0]->amount) && $editemp[0]->amount != '' ? $editemp[0]->amount : '') ?>"
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
                                                        autocomplete="benefits_Edit"
                                                        data-oldval="<?php echo(isset($editemp[0]->benefits) && $editemp[0]->benefits != '' ? $editemp[0]->benefits : '') ?>"
                                                        data-oldLabel="<?php echo(isset($editemp[0]->benefits) && $editemp[0]->benefits != '' ? $editemp[0]->benefits : '') ?>"
                                                        required name="benefits">
                                                    <?php
                                                    echo '<option value="0" data-text="0" readonly ' . (!isset($editemp[0]->benefits) || $editemp[0]->benefits == "" ? "selected" : "") . '></option>
                                                    <option value="Yes" data-text="Yes" ' . ($editemp[0]->benefits == "Yes" ? "selected" : "") . '>Yes</option>
                                                    <option value="No" data-text="No" ' . ($editemp[0]->benefits == "No" ? "selected" : "") . '>No</option>';
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
                                                        autocomplete="peme_Edit"
                                                        data-oldval="<?php echo(isset($editemp[0]->peme) && $editemp[0]->peme != '' ? $editemp[0]->peme : '') ?>"
                                                        data-oldLabel="<?php echo(isset($editemp[0]->peme) && $editemp[0]->peme != '' ? $editemp[0]->peme : '') ?>"
                                                        required name="peme">
                                                    <?php
                                                    echo '<option value="0" data-text="0" readonly ' . (!isset($editemp[0]->peme) || $editemp[0]->peme == "" ? "selected" : "") . '></option>
                                                    <option value="Yes" data-text="Yes" ' . ($editemp[0]->peme == "Yes" ? "selected" : "") . '>Yes</option>
                                                    <option value="No" data-text="No" ' . ($editemp[0]->peme == "No" ? "selected" : "") . '>No</option>';
                                                    ?>
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
                                                        autocomplete="gop_Edit"
                                                        data-oldval="<?php echo(isset($editemp[0]->gop) && $editemp[0]->gop != '' ? $editemp[0]->gop : '') ?>"
                                                        data-oldLabel="<?php echo(isset($editemp[0]->gop) && $editemp[0]->gop != '' ? $editemp[0]->gop : '') ?>"
                                                        required name="gop">
                                                    <?php
                                                    echo '<option value="0" data-text="0" readonly ' . (!isset($editemp[0]->gop) || $editemp[0]->gop == "" ? "selected" : "") . '></option>
                                                    <option value="Yes" data-text="Yes" ' . ($editemp[0]->gop == "Yes" ? "selected" : "") . '>Yes</option>
                                                    <option value="No" data-text="No" ' . ($editemp[0]->gop == "No" ? "selected" : "") . '>No</option>';
                                                    ?>
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
                                                       class="form-control mypickadat" name="gopdt"
                                                       placeholder="GOP Date" autocomplete="gopdt_Edit"
                                                       value="<?php echo(isset($editemp[0]->gopdt) && $editemp[0]->gopdt != '' ? date('d-m-Y', strtotime($editemp[0]->gopdt)) : '') ?>"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="entity">Entity</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php

                                                $html_options_Q = '<option value="0" readonly selected disabled></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($entity) && $entity != '') {
                                                    foreach ($entity as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->entity) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->entity;
                                                            $html_options_Q .= '<option data-text="' . $v->entity . '" selected="selected" value="' . $v->id . '">' . $v->entity . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->entity . '" value="' . $v->id . '">' . $v->entity . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="entity" autocomplete="entity_Edit"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="entity">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="dept">Department</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0" readonly selected disabled></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($dept) && $dept != '') {
                                                    foreach ($dept as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->dept) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->dept;
                                                            $html_options_Q .= '<option data-text="' . $v->dept . '" selected="selected" value="' . $v->id . '">' . $v->dept . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->dept . '" value="' . $v->id . '">' . $v->dept . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="dept" autocomplete="dept_Edit"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="dept">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;

                                                ?>
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
                                                        autocomplete="cardissue_Edit"
                                                        data-oldval="<?php echo(isset($editemp[0]->cardissue) && $editemp[0]->cardissue != '' ? $editemp[0]->cardissue : '') ?>"
                                                        data-oldLabel="<?php echo(isset($editemp[0]->cardissue) && $editemp[0]->cardissue != '' ? $editemp[0]->cardissue : '') ?>"
                                                        required name="cardissue">
                                                    <?php
                                                    echo '<option value="0" data-text="0" readonly ' . (!isset($editemp[0]->cardissue) || $editemp[0]->cardissue == "" ? "selected" : "") . '></option>
                                                    <option value="Yes" data-text="Yes" ' . ($editemp[0]->cardissue == "Yes" ? "selected" : "") . '>Yes</option>
                                                    <option value="No" data-text="No" ' . ($editemp[0]->cardissue == "No" ? "selected" : "") . '>No</option>';
                                                    ?>
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
                                                        autocomplete="letterapp_Edit"
                                                        data-oldval="<?php echo(isset($editemp[0]->letterapp) && $editemp[0]->letterapp != '' ? $editemp[0]->letterapp : '') ?>"
                                                        data-oldLabel="<?php echo(isset($editemp[0]->letterapp) && $editemp[0]->letterapp != '' ? $editemp[0]->letterapp : '') ?>"
                                                        required name="letterapp">
                                                    <?php
                                                    echo '<option value="0" data-text="0" readonly ' . (!isset($editemp[0]->letterapp) || $editemp[0]->letterapp == "" ? "selected" : "") . '></option>
                                                    <option value="Yes" data-text="Yes" ' . ($editemp[0]->letterapp == "Yes" ? "selected" : "") . '>Yes</option>
                                                    <option value="No" data-text="No" ' . ($editemp[0]->letterapp == "No" ? "selected" : "") . '>No</option>';
                                                    ?>
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
                                                        autocomplete="confirmation_Edit"
                                                        data-oldval="<?php echo(isset($editemp[0]->confirmation) && $editemp[0]->confirmation != '' ? $editemp[0]->confirmation : '') ?>"
                                                        data-oldLabel="<?php echo(isset($editemp[0]->confirmation) && $editemp[0]->confirmation != '' ? $editemp[0]->confirmation : '') ?>"
                                                        required name="confirmation">
                                                    <?php
                                                    echo '<option value="0" data-text="0" readonly ' . (!isset($editemp[0]->confirmation) || $editemp[0]->confirmation == "" ? "selected" : "") . '></option>
                                                    <option value="Yes" data-text="Yes" ' . ($editemp[0]->confirmation == "Yes" ? "selected" : "") . '>Yes</option>
                                                    <option value="No" data-text="No" ' . ($editemp[0]->confirmation == "No" ? "selected" : "") . '>No</option>';
                                                    ?>
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
                                                <?php
                                                $html_options_Q = '<option value="0" readonly></option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($status) && $status != '') {
                                                    foreach ($status as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id == $editemp[0]->status) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->status;
                                                            $html_options_Q .= '<option data-text="' . $v->status . '" selected="selected" value="' . $v->id . '">' . $v->status . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->status . '" value="' . $v->id . '">' . $v->status . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="form-control select2" id="status" autocomplete="status_Edit"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="status">';
                                                $htmlQ .= $html_options_Q;
                                                $htmlQ .= '</select>';
                                                echo $htmlQ;

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="remarks">Remarks</label>
                                            </div>
                                            <div class="col-sm-9">
 <textarea id="remarks" rows="5" required autocomplete="remarks_Edit"
           class="form-control" name="remarks"
           placeholder="Remarks"
 ><?php echo(isset($editemp[0]->remarks) ? $editemp[0]->remarks : '') ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-next">
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
                                        <?php if (isset($editemp) && isset($editemp[0]->pic)) {
                                            echo '<span>Replace Picture</span>';
                                        } else {
                                            echo '<span>Upload Picture</span>';
                                        } ?>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="file" class="custom-file-input" required
                                               id="pic" name="pic" accept="image/jpeg">
                                        <label class="custom-file-label"
                                               for="pic">Choose Picture</label>
                                        <?php if (isset($editemp) && isset($editemp[0]->pic)) { ?>
                                        <div class="avatar-upload  ">
                                            <div class="avatar-preview">
                                                <div id="imagePreview"
                                                     style='background-image: url("<?php echo (isset($editemp[0]->pic) && $editemp[0]->pic!=''?base_url($editemp[0]->pic):base_url('assets/images/profile/dummy.jpg')) ?>")'>
                                                </div>
                                            </div>
                                        </div>
                                        <?php    } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><?php if (isset($editemp) && isset($editemp[0]->pic)) {
                                                echo 'Edit Documents';
                                            } else {
                                                echo 'Upload Documents';
                                            }
                                            ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" class="dropzone dropzone-area" id="dpz-remove-thumbs"
                                        >
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
                                            data-status="draft" id="btn-submitDraft">Update
                                        Draft
                                    </button>
                                    <button class="btn btn-success btn-submit mybtn" id="btn-submit"
                                            data-status="save">Update
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
        changeBand();
        changeLocation('ddlloc', 'ddlloc_sub');
        setTimeout(function () {
            var ddlloc_sub=$('#ddlloc_sub').attr('data-oldval');
            $('#ddlloc_sub').val(ddlloc_sub).select2({"val":ddlloc_sub});
        },1000);
        $(".numericOnly").ForceNumericOnly();

        $('#dpz-remove-thumbs').dropzone({
            url: "<?php echo base_url('index.php/hr_controllers/Employee_entry/editData'); ?>",
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            clickable: true,
            thumbnailWidth: 150,
            thumbnailHeight: 150,
            autoProcessQueue: false,
            acceptedFiles: ".png, .jpeg, .jpg, .doc, .docx, .pdf, .csv, .xls, .xlsx",
            addRemoveLinks: true,
            removedfile: function (file) {
                var name = file.name;
                var empno = $('#empno').val();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('index.php/hr_controllers/Employee_entry/deleteDoc'); ?>",
                    data: "empno=" + empno + "&file=" + name,
                    dataType: 'html',
                    success: function (res) {
                        if (res == 1) {
                            toastMsg('Success', 'File successfully deleted', 'success');
                            var _ref;
                            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                        } else if (res == 4) {
                            toastMsg('Error', 'Invalid Employee No', 'error');
                        } else if (res == 3) {
                            toastMsg('Error', 'Invalid File', 'error');
                        } else {
                            toastMsg('Error', 'Error in deleting file', 'error');
                        }
                    }
                });
            },

            init: function () {
                var empno = $('#empno').val();
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
                dzClosure.on('sending', function (data, xhr, form_data) {
                    xhr.onload = () => {
                        if (xhr.statushr >= 200 && xhr.statushr < 300) {
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
                                        // window.location.reload();
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

                    form_data.append('empno',empno);
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
                    form_data.append('statushr.php', $('#status').val());
                    form_data.append('remarks', $('#remarks').val());
                    form_data.append('pic', $('#pic')[0].files[0]);
                    form_data.append('entryType', $('#entryType').val());
                });
                thisDropzone = this;
                $.get("<?php echo base_url('index.php/hr_controllers/Employee_entry/getEmpDocs?e='); ?>" + empno, function (data) {
                    $.each(data, function (key, value) {
                        var mockFile = {name: value.name, size: value.size};
                        thisDropzone.displayExistingFile(mockFile, "<?php echo base_url() ?>assets/uploads/hrUploads/" + empno + "/docs/" + value.name);
                    });
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
                form_data.append('statushr.php', $('#status').val());
                form_data.append('remarks', $('#remarks').val());
                form_data.append('pic', $('#pic')[0].files[0]);
                form_data.append('entryType', $('#entryType').val());
                showloader();
                $('.mybtn').addClass('hide').attr('disabled', 'disabled');
                CallAjax('<?php echo base_url('index.php/hr_controllers/Employee_entry/editData'); ?>', form_data, 'POST', function (result) {
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
                                //window.location.href='<?php //echo base_url('index.php/hr_controllers/searchemployee')?>//';
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
                        var titdesi = $('#titdesi').attr('data-oldval');
                        var htmlQ = '<option value="0" ' + (titdesi == 0 ? 'selected' : '') + ' readonly disabled>&nbsp</option>';
                        $.each(a, function (i, v) {
                            htmlQ += '<option value="' + v.id + '" ' + (titdesi == v.id ? 'selected' : '') + '>' + v.desig + '</option>';
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


    function EditData() {
        $('#myForm').find('.is-invalid').removeClass('is-invalid');
        $('#myForm').find('.error').removeClass('error');
        var myformData = new FormData($("#myForm")[0]);
        if (validateData(myformData) && !checkValues()) {
            showloader();
            CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/EditRecord'); ?>', myformData, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Record Saved Successfully', 'success');
                    setTimeout(function () {
                        // window.location.reload();
                    }, 500);
                } else if (result == 4) {
                    toastMsg('Page', 'Duplicate Page URL', 'error');
                } else if (result.indexOf('Invalid', 1) != -1) {
                    toastMsg('Invalid Field', 'Field not found', 'error');
                } else if (result == 3) {
                    toastMsg('Page', 'Invalid Page Name', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            }, true);
        } else {
            toastMsg('Error', 'Invalid Data', 'error');
        }

    }

    function EditData_SaveDraft() {
        $('#myForm').find('.is-invalid').removeClass('is-invalid');
        $('#myForm').find('.error').removeClass('error');
        var myformData = new FormData($("#myForm")[0]);
        var empno = $('#empno').val();
        var empname = $('#empname').val();
        var flag = 0;
        if (empno == undefined || empno == '') {
            flag = 1;
            toastMsg('Error', 'Invalid Employee No', 'error');
        }
        if (empname == undefined || empname == '') {
            flag = 1;
            toastMsg('Error', 'Invalid Employee Name', 'error');
        }
        if (flag == 0) {
            showloader();
            CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/EditRecord'); ?>', myformData, 'POST', function (result) {
                hideloader();
                if (result == 1) {
                    toastMsg('Success', 'Record Saved Successfully', 'success');
                    setTimeout(function () {
                        // window.location.reload();
                    }, 500);
                } else if (result == 4) {
                    toastMsg('Page', 'Duplicate Page URL', 'error');
                } else if (result.indexOf('Invalid', 1) != -1) {
                    toastMsg('Invalid Field', 'Field not found', 'error');
                } else if (result == 3) {
                    toastMsg('Page', 'Invalid Page Name', 'error');
                } else {
                    toastMsg('Error', 'Something went wrong', 'error');
                }
            }, true);
        } else {
            toastMsg('Error', 'Invalid Data', 'error');
        }

    }

    function checkValues() {
        var iserror = false;
        var re = /^[A-Za-z]+$/;
        if (re.test($("#empno").val())) {
            ShowError($("#empno"), "Employee number must be numeric");
            iserror = true;
        } else {
            if ($("#empno").val().length != 6) {
                ShowError($("#empno"), "Employee no must be 6 digits");
                iserror = true;
            }
        }

        var re = /^[A-Za-z ]+$/;
        if (!re.test($("#empname").val())) {
            ShowError($("#empname"), "Employee name must be string");
            iserror = true;
        }

        if ($("#cnicno").val().indexOf("_") != -1) {
            ShowError($("#cnicno"), "CNIC must be 13 digits");
            iserror = true;
        }

        var start_dt = new Date().getDate() + "-" + parseInt(new Date().getMonth() + 1) + "-" + new Date().getFullYear();
        var start_dt1 = start_dt.split('-');
        var parts = $("#dob").val().split('-');

        if (isNaN(Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) == true) {
            ShowError($("#dob"), "Invalid date");
            iserror = true;
        } else {
            var end_dt = parts[1] + '-' + parts[0] + '-' + parts[2];
            if (Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy") > Date.parse(start_dt1[1] + '-' + start_dt1[0] + '-' + start_dt1[2], "mm-dd-yyyy")) {
                ShowError($("#dob"), "Birth date cannot be greater than current date");
                iserror = true;
            }
        }

        var re = /^[0-9]+$/;
        if (!re.test($("#cellno1").val())) {
            ShowError($("#cellno1"), "Cell Number 1 must be numeric");
            iserror = true;
        }
        if ($("#cellno2").val() == "" && $("#cellno2").val() == null && $("#cellno2").val() == 'null' && $("#cellno2").val() == undefined && $("#cellno2").val() == 'undefined') {
            var re = /^[0-9]+$/;
            if (!re.test($("#cellno2").val())) {
                ShowError($("#cellno2"), "Cell Number 2 must be numeric");
                iserror = true;
            }
        }


        var re = /^[A-Za-z ]+$/;
        if (!re.test($("#personnme").val())) {
            ShowError($("#personnme"), "Person name cannot contains special characters");
            iserror = true;
        }

        var re = /^[0-9]+$/;
        if (!re.test($("#emcellno").val())) {
            ShowError($("#emcellno"), "Emergency cell number must be numeric");
            iserror = true;
        }

        var re = /^[0-9]+$/;
        if (!re.test($("#emlandno").val())) {
            ShowError($("#emlandno"), "Person landline number must be numeric");
            iserror = true;
        }

        if ($("#gncno").val().indexOf("_") != -1) {
            ShowError($("#gncno"), "Please enter complete GNC number");
            iserror = true;
        }

        if ($("#rehiredt").val() != "") {
            var start_dt = new Date().getDate() + "-" + parseInt(new Date().getMonth() + 1) + "-" + new Date().getFullYear();
            var start_dt1 = start_dt.split('-');
            var parts = $("#rehiredt").val().split('-');
            if (isNaN(Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) == true) {
                ShowError($("#rehiredt"), "Invalid date");
                iserror = true;
            } else {
                var dtdob = $("#dob").val().split('-');
                if (Date.parse(dtdob[1] + '-' + dtdob[0] + '-' + dtdob[2], "mm-dd-yyyy") > Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) {
                    ShowError($("#rehiredt"), "Rehire date cannot be less than date of birth");
                    iserror = true;
                }
            }
        }

        if ($("#conexpiry").val() != "") {
            var start_dt = new Date().getDate() + "-" + parseInt(new Date().getMonth() + 1) + "-" + new Date().getFullYear();
            var start_dt1 = start_dt.split('-');
            var parts = $("#conexpiry").val().split('-');

            if (isNaN(Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) == true) {
                ShowError($("#conexpiry"), "Invalid date");
                iserror = true;
            }
        }

        if ($("#gopdt").val() != "") {

            var start_dt = new Date().getDate() + "-" + parseInt(new Date().getMonth() + 1) + "-" + new Date().getFullYear();
            var start_dt1 = start_dt.split('-');

            var parts = $("#gopdt").val().split('-');

            if (isNaN(Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) == true) {
                ShowError($("#gopdt"), "Invalid date");
                iserror = true;
            } else {

                var dtrehiredt = $("#rehiredt").val().split('-');

                if (Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy") < Date.parse(dtrehiredt[1] + '-' + dtrehiredt[0] + '-' + dtrehiredt[2], "mm-dd-yyyy")) {
                    ShowError($("#gopdt"), "GOP date cannot be less than rehire date");
                    iserror = true;
                }


            }
        }

        if ($("#remarks").val() == "" && $("#remarks").val() == null
            && $("#remarks").val() == 'null' && $("#remarks").val() == undefined && $("#remarks").val() == 'undefined') {

            var re = /[^\w\s]/gi;

            if (re.test($("#remarks").val())) {
                ShowError($("#remarks"), "Remarks cannot contains special characters");
                iserror = true;
            }
        }

        if (iserror === true) {
            toastMsg('Error', 'Invalid Data', 'error');
        }

        return iserror;
    }

    function ShowError(id, msg) {
        id.removeClass('error').removeClass('is-invalid');
        id.removeClass('error').removeClass('is-invalid').parent('div').append("");
        var error = '<div id="lblerr_' + id.attr("id") + '" class="invalid-feedback">' + msg + '</div>';
        $("#lblerr_" + id.attr("id")).remove();
        id.EditClass('error').EditClass('is-invalid').parent('div').append(error);
    }


</script>