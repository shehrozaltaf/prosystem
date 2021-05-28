<?php //error_reporting(0) ?>
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/forms/wizard/bs-stepper.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/forms/form-validation.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/forms/form-wizard.min.css">


<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/file-uploaders/dropzone.min.css">

<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/css/plugins/forms/form-file-uploader.min.css">

<script src="<?php echo base_url() ?>assets/vendors/js/extensions/dropzone.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/scripts/forms/form-file-uploader.min.js"></script>


<style>
    .invalid-feedback {
        position: absolute;
    }

    #divslash {
        margin-top: 10px;
    }

</style>
<!-- BEGIN: Page JS-->
<script src="<?php echo base_url() ?>assets/js/scripts/modal/components-modal.js"></script>
<script src="<?php echo base_url() ?>assets/build/js/intlTelInput.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/build/css/intlTelInput.css">
<script src="<?php echo base_url() ?>assets/vendors/js/forms/toggle/switchery.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/scripts/jquery.maskedinput.js"></script>
<script src="<?php echo base_url() ?>assets/js/scripts/jquery.inputmask.bundle.js"></script>


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Employee Information</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>">Employee
                                        Information</a>
                                </li>
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
                                                <label id="lbl_empno">Employee Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                if (isset($editemp) && $editemp != '' && isset($editemp[0]->empno)) { ?>
                                                    <input type="text" id="empno"
                                                           disabled="disabled"
                                                           class="form-control numericOnly" maxlength="6"
                                                           placeholder="Employee Number"
                                                           name="empno"
                                                           required
                                                           value="<?php echo(isset($editemp[0]->empno) ? $editemp[0]->empno : '') ?>">
                                                    <?php
                                                } else { ?>
                                                    <input type="text" id="empno"
                                                           class="form-control numericOnly" maxlength="6"
                                                           placeholder="Employee Number"
                                                           name="empno"
                                                           onfocusout="chkEmpNo()"
                                                           required  >
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_offemail">Official Email<br/>(without aku.edu)</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="offemail"
                                                       class="form-control" maxlength="70"
                                                       placeholder="Official Email" name="offemail"
                                                       onkeypress="return ValidateEmail();"
                                                       required
                                                       value="<?php echo(isset($editemp[0]->offemail) ? $editemp[0]->offemail : '') ?>"
                                                >

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_empname">Full Name <br>(Use Capital Letters)</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="empname"
                                                       class="form-control" maxlength="70"
                                                       placeholder="Full Name" name="empname"
                                                       onkeypress="return lettersOnly_WithSpace();"
                                                       style="text-transform: uppercase;" required
                                                       value="<?php echo(isset($editemp[0]->empname) ? $editemp[0]->empname : '') ?>"
                                                >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_cnicno">CNIC Number</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="cnicno"
                                                       class="form-control" placeholder="CNIC NO"
                                                       name="cnicno" required
                                                       value="<?php echo(isset($editemp[0]->cnicno) ? $editemp[0]->cnicno : '') ?>"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_dob">Date of Birth</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="dob" required
                                                       placeholder="Date of Birth"
                                                       class="form-control mypickadat_dob"
                                                       name="dob"
                                                       value="<?php echo(isset($editemp[0]->dob) ? $editemp[0]->dob : '') ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_degree">Highest Qualification <br/>Degree / Field</label>
                                            </div>
                                            <div class="col-sm-3 col-form-label">
                                                <?php

                                                $html_options_Q = '<option value="0">&nbsp;</option>';
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

                                                $html_options_Q = '<option value="0">&nbsp;</option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';

                                                if (isset($field) && $field != '') {
                                                    foreach ($field as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->field) {
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
                                <button class="btn btn-primary btn-next">
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
                                                <label id="lbl_resaddr">Residential Address</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="resaddr" class="form-control"
                                                       placeholder="Residential Address"
                                                       required
                                                       name="resaddr" maxlength="200"
                                                       value="<?php echo(isset($editemp[0]->resaddr) ? $editemp[0]->resaddr : '') ?>"
                                                >

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_peremail">Personal Email</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="peremail" class="form-control"
                                                       placeholder="Personal Email"
                                                       required
                                                       name="peremail" maxlength="100"
                                                       value="<?php echo(isset($editemp[0]->peremail) ? $editemp[0]->peremail : '') ?>"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_landline">Landline Number</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php

                                                if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                    <input type="tel" id="landline" required
                                                           onkeypress="return numeralsOnly_phone();"
                                                           placeholder="Landline Number"
                                                           class="form-control" name="landline"
                                                           maxlength="15"
                                                           value="<?php echo((isset ($editemp[0]->landlineccode) ? $editemp[0]->landlineccode : '') . (isset($editemp[0]->landline) ? $editemp[0]->landline : '')) ?>">

                                                <?php } else { ?>

                                                    <input type="tel" id="landline" required
                                                           onkeypress="return numeralsOnly_phone();"
                                                           placeholder="Landline Number"
                                                           class="form-control" name="landline"
                                                           maxlength="15"
                                                           value="">

                                                <?php } ?>

                                                <div>

                                                    <?php if (isset($editemp)) {

                                                        if ($editemp[0]->chk_landline == 1) { ?>

                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input id="chk_landline"
                                                                           name="chk_landline"
                                                                           type="checkbox"
                                                                           checked="checked"
                                                                           class="custom-control-input"
                                                                           data-oldval="<?php echo(isset($editemp[0]->chk_landline) ? $editemp[0]->chk_landline : '') ?>">
                                                                    <label class="custom-control-label"
                                                                           for="chk_landline">Not
                                                                        Available</label>
                                                                </div>
                                                            </fieldset>

                                                        <?php } else { ?>

                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input id="chk_landline"
                                                                           name="chk_landline"
                                                                           type="checkbox"
                                                                           class="custom-control-input"
                                                                           data-oldval="<?php echo(isset($editemp[0]->chk_landline) ? $editemp[0]->chk_landline : '') ?>">
                                                                    <label class="custom-control-label"
                                                                           for="chk_landline">Not
                                                                        Available</label>
                                                                </div>
                                                            </fieldset>

                                                        <?php }

                                                    } else { ?>

                                                        <fieldset>
                                                            <div class="custom-control custom-checkbox">
                                                                <input id="chk_landline"
                                                                       name="chk_landline"
                                                                       type="checkbox"
                                                                       class="custom-control-input"
                                                                       data-oldval="0">
                                                                <label class="custom-control-label"
                                                                       for="chk_landline">Not
                                                                    Available</label>
                                                            </div>
                                                        </fieldset>

                                                    <?php } ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row" style="margin-top: -15px;">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_cellno1">Mobile Number (Primary)</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php

                                                if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                    <input type="tel" id="cellno1" maxlength="11" required
                                                           placeholder="Mobile Number (Primary)"
                                                           class="form-control" name="cellno1"
                                                           onkeypress="return numeralsOnly();"
                                                           value="<?php echo((isset($editemp[0]->cellno1ccode) ? $editemp[0]->cellno1ccode : '') . (isset($editemp[0]->cellno1) ? $editemp[0]->cellno1 : '')) ?>">

                                                <?php } else { ?>

                                                    <input type="tel" id="cellno1" maxlength="11" required
                                                           placeholder="Mobile Number (Primary)"
                                                           class="form-control" name="cellno1"
                                                           onkeypress="return numeralsOnly();"
                                                           value="">

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_cellno2">Mobile Number (Alternate)</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php

                                                if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                    <input type="tel" id="cellno2" maxlength="11" required
                                                           class="form-control" name="cellno2"
                                                           placeholder="Mobile Number (Alternate)"
                                                           onkeypress="return numeralsOnly();"
                                                           value="<?php echo((isset($editemp[0]->cellno2ccode) ? $editemp[0]->cellno2ccode : '') . (isset($editemp[0]->cellno2) ? $editemp[0]->cellno2 : '')) ?>"
                                                    >

                                                <?php } else { ?>

                                                    <input type="tel" id="cellno2" maxlength="11" required
                                                           class="form-control" name="cellno2"
                                                           placeholder="Mobile Number (Alternate)"
                                                           onkeypress="return numeralsOnly();"
                                                           value=""
                                                    >

                                                <?php } ?>
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
                                                <label id="lbl_personnme">Person Name</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php

                                                if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                    <input type="text" id="personnme" maxlength="70"
                                                           required
                                                           class="form-control" name="personnme"
                                                           placeholder="Person Name"
                                                           style="text-transform: uppercase;"
                                                           onkeypress="return lettersOnly_WithSpace();"
                                                           value="<?php echo(isset($editemp[0]->personnme) ? $editemp[0]->personnme : '') ?>"
                                                    >

                                                <?php } else { ?>

                                                    <input type="text" id="personnme" maxlength="70"
                                                           required
                                                           class="form-control" name="personnme"
                                                           placeholder="Person Name"
                                                           style="text-transform: uppercase;"
                                                           onkeypress="return lettersOnly_WithSpace();"
                                                           value=""
                                                    >

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_emcellno">Mobile Number</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php

                                                if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                    <input type="tel" id="emcellno" maxlength="11" required
                                                           class="form-control" name="emcellno"
                                                           onkeypress="return numeralsOnly();"
                                                           placeholder="Mobile Number"
                                                           value="<?php echo((isset($editemp[0]->emcellnoccode) ? $editemp[0]->emcellnoccode : '') . (isset($editemp[0]->emcellno) ? $editemp[0]->emcellno : '')) ?>"
                                                    >

                                                <?php } else { ?>

                                                    <input type="tel" id="emcellno" maxlength="11" required
                                                           class="form-control" name="emcellno"
                                                           onkeypress="return numeralsOnly();"
                                                           placeholder="Mobile Number"
                                                           value="">

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_emlandno">Landline No.</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php

                                                if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                    <input type="tel" id="emlandno" maxlength="8" required
                                                           class="form-control" name="emlandno"
                                                           onkeypress="return numeralsOnly_phone1();"
                                                           placeholder="Landline No."
                                                           value="<?php echo((isset($editemp[0]->emlandnoccode) ? $editemp[0]->emlandnoccode : '') . (isset($editemp[0]->emlandno) ? $editemp[0]->emlandno : '')) ?>"
                                                    >

                                                <?php } else { ?>

                                                    <input type="tel" id="emlandno" maxlength="8" required
                                                           class="form-control" name="emlandno"
                                                           onkeypress="return numeralsOnly_phone1();"
                                                           placeholder="Landline No."
                                                           value=""
                                                    >

                                                <?php } ?>

                                                <div>

                                                    <?php if (isset($editemp)) {

                                                        if ($editemp[0]->chk_emlandno == 1) { ?>

                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input id="chk_emlandno"
                                                                           name="chk_emlandno"
                                                                           type="checkbox"
                                                                           checked="checked"
                                                                           class="custom-control-input"
                                                                           data-oldval="<?php echo(isset($editemp[0]->chk_emlandno) ? $editemp[0]->chk_emlandno : '') ?>">
                                                                    <label class="custom-control-label"
                                                                           for="chk_emlandno">Not
                                                                        Available</label>
                                                                </div>
                                                            </fieldset>

                                                        <?php } else { ?>

                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input id="chk_emlandno"
                                                                           name="chk_emlandno"
                                                                           type="checkbox"
                                                                           class="custom-control-input"
                                                                           data-oldval="<?php echo(isset($editemp[0]->chk_emlandno) ? $editemp[0]->chk_emlandno : '') ?>">
                                                                    <label class="custom-control-label"
                                                                           for="chk_emlandno">Not
                                                                        Available</label>
                                                                </div>
                                                            </fieldset>

                                                        <?php }
                                                    } else { ?>

                                                        <fieldset>
                                                            <div class="custom-control custom-checkbox">
                                                                <input id="chk_emlandno"
                                                                       name="chk_emlandno"
                                                                       type="checkbox"
                                                                       class="custom-control-input"
                                                                       data-oldval="0">
                                                                <label class="custom-control-label"
                                                                       for="chk_emlandno">Not
                                                                    Available</label>
                                                            </div>
                                                        </fieldset>

                                                    <?php } ?>

                                                </div>
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
                                                <label id="lbl_ddlemptype">Employment Type</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0">&nbsp;</option>';
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
                                                $htmlQ .= '<select class="select2 form-control" id="ddlemptype"
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
                                                <label id="lbl_ddlcategory">Job Title</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0">&nbsp;</option>';
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
                                                $htmlQ .= '<select class="select2 form-control" id="ddlcategory"
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
                                                <label id="lbl_gncno">GNC Number</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php

                                                if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                    <input type="text" id="gncno"
                                                           placeholder="GNC Number"
                                                           class="form-control" name="gncno" required
                                                           value="<?php echo(isset($editemp[0]->gncno) ? $editemp[0]->gncno : '') ?>"
                                                    >

                                                <?php } else { ?>

                                                    <input type="text" id="gncno"
                                                           placeholder="GNC Number"
                                                           class="form-control" name="gncno" required
                                                           value=""
                                                    >

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_ddlband">Band</label>
                                            </div>
                                            <div class="col-sm-9">
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
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_titdesi">Title / Designation</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0">&nbsp;</option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($designation) && $designation != '') {
                                                    foreach ($designation as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->titdesi) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->desig;
                                                            $html_options_Q .= '<option data-text="' . $v->desig . '" selected="selected" value="' . $v->id . '">' . $v->desig . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->desig . '" value="' . $v->id . '">' . $v->desig . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="titdesi"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="titdesi">';
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
                                                <label id="lbl_rehiredt">Hire / Rehire Date</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php

                                                if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                    <input type="text" id="rehiredt" required
                                                           placeholder="Hire / Rehire Date"
                                                           class="form-control" name="rehiredt"
                                                           value="<?php echo(isset($editemp[0]->rehiredt) ? $editemp[0]->rehiredt : '') ?>"
                                                    >

                                                <?php } else { ?>

                                                    <input type="text" id="rehiredt" required
                                                           placeholder="Hire / Rehire Date"
                                                           class="form-control" name="rehiredt"
                                                           value=""
                                                    >

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_conexpiry">Contract Expiry</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php

                                                if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                    <input type="text" id="conexpiry" required
                                                           placeholder="Contract Expiry"
                                                           class="form-control" name="conexpiry"
                                                           value="<?php echo(isset($editemp[0]->conexpiry) ? $editemp[0]->conexpiry : '') ?>"
                                                    >

                                                <?php } else { ?>

                                                    <input type="text" id="conexpiry" required
                                                           placeholder="Contract Expiry"
                                                           class="form-control" name="conexpiry"
                                                           value=""
                                                    >

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_workproj">Working Project</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0">&nbsp;</option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($workproj) && $workproj != '') {
                                                    foreach ($workproj as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->proj_code === $editemp[0]->workproj) {
                                                            $oldValQ = $v->proj_code;
                                                            $oldLabelQ = $v->proj_name;
                                                            $html_options_Q .= '<option data-text="' . $v->proj_name . '" selected="selected" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->proj_name . '" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="workproj"
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
                                                <label id="lbl_chargproj">Charging Project</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0">&nbsp;</option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';
                                                if (isset($chargproj) && $chargproj != '') {
                                                    foreach ($chargproj as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->proj_code === $editemp[0]->chargproj) {
                                                            $oldValQ = $v->proj_code;
                                                            $oldLabelQ = $v->proj_name;
                                                            $html_options_Q .= '<option data-text="' . $v->proj_name . '" selected="selected" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->proj_name . '" value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="chargproj"
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
                                                <label id="lbl_ddlloc">Location</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0">&nbsp;</option>';
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
                                                $htmlQ .= '<select class="select2 form-control" id="ddlloc"  
                                                 onchange="changeLocation(\'ddlloc\',\'lbl_ddlloc_sub\')"
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
                                                <label for="lbl_ddlloc_sub">Sub Location</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control"
                                                        id="lbl_ddlloc_sub"
                                                        name="lbl_ddlloc_sub" autocomplete="lbl_ddlloc_sub" required>
                                                    <option value="0" readonly disabled selected></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_supernme">Supervisor Name</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php
                                                $html_options_Q = '<option value="0">&nbsp;</option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';

                                                if (isset($supervisor) && $supervisor != '') {
                                                    foreach ($supervisor as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->empno === $editemp[0]->supernme) {
                                                            $oldValQ = $v->empno;
                                                            $oldLabelQ = $v->empname;
                                                            $html_options_Q .= '<option data-text="' . $v->empname . '" selected="selected" value="' . $v->empno . '">' . $v->empname . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->empname . '" value="' . $v->empno . '">' . $v->empname . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="select2 form-control" id="supernme"
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
                                                <label id="lbl_hiresalary">Hiring Salary</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php

                                                if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                    <input type="text" id="hiresalary" required
                                                           class="form-control" name="hiresalary"
                                                           placeholder="Hiring Salary"
                                                           data-oldval="<?php echo(isset($editemp[0]->hiresalary) ? $this->encrypt->decode($editemp[0]->hiresalary) : '') ?>"
                                                           value="<?php echo(isset($editemp[0]->hiresalary) ? $this->encrypt->decode($editemp[0]->hiresalary) : '') ?>"
                                                    >

                                                <?php } else { ?>

                                                    <input type="text" id="hiresalary" required
                                                           class="form-control" name="hiresalary"
                                                           placeholder="Hiring Salary"
                                                           data-oldval="<?php echo(isset($editemp[0]->hiresalary) ? $this->encrypt->decode($editemp[0]->hiresalary) : '') ?>"
                                                           value=""
                                                    >

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_ddlhardship">Hardship Allowance</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php

                                                $html_options_Q = '<option value="0">&nbsp;</option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';

                                                if (isset($yesno) && $yesno != '') {
                                                    foreach ($yesno as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->ddlhardship) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->yesno;
                                                            $html_options_Q .= '<option data-text="' . $v->yesno . '" selected="selected" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->yesno . '" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="form-control" id="ddlhardship"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="ddlhardship">';
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
                                                <label id="lbl_amount">Amount</label>
                                            </div>
                                            <div class="col-sm-9">

                                                <?php
                                                if (isset($yesno) && $yesno != '') {
                                                    if (isset($editemp) && $editemp != '' && $editemp != null && $editemp[0]->ddlhardship) {

                                                        if ($editemp[0]->ddlhardship == 1) {
                                                            echo('<input type="text" id="amount" MaxLength="6" required class="form-control" name="amount" placeholder="Amount" onkeypress="return numeralsOnly();" value="' . (isset($editemp[0]->amount) ? $editemp[0]->amount : '') . '" >');
                                                        } else {
                                                            echo('<input type="text" id="amount" MaxLength="6" required class="form-control" name="amount" disabled="disabled" placeholder="Amount" value="" >');
                                                        }

                                                    } else {
                                                        echo('<input type="text" id="amount" MaxLength="6" required class="form-control" name="amount" placeholder="Amount" onkeypress="return numeralsOnly();" value="' . (isset($editemp[0]->amount) ? $editemp[0]->amount : '') . '" >');
                                                    }

                                                }

                                                ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label id="lbl_benefits">Benefits</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php


                                                $html_options_Q = '<option value="0">&nbsp;</option>';
                                                $htmlQ = '';
                                                $oldLabelQ = '';
                                                $oldValQ = '';

                                                if (isset($yesno) && $yesno != '') {
                                                    foreach ($yesno as $v) {
                                                        if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->benefits) {
                                                            $oldValQ = $v->id;
                                                            $oldLabelQ = $v->yesno;
                                                            $html_options_Q .= '<option data-text="' . $v->yesno . '" selected="selected" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                        } else {
                                                            $html_options_Q .= '<option data-text="' . $v->yesno . '" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                        }
                                                    }
                                                }
                                                $htmlQ .= '<select class="form-control" id="benefits"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="benefits">';
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
                            <div class="row">


                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label id="lbl_peme">PEME</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php

                                            $html_options_Q = '<option value="0">&nbsp;</option>';
                                            $htmlQ = '';
                                            $oldLabelQ = '';
                                            $oldValQ = '';

                                            if (isset($yesno) && $yesno != '') {
                                                foreach ($yesno as $v) {
                                                    if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->peme) {
                                                        $oldValQ = $v->id;
                                                        $oldLabelQ = $v->yesno;
                                                        $html_options_Q .= '<option data-text="' . $v->yesno . '" selected="selected" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                    } else {
                                                        $html_options_Q .= '<option data-text="' . $v->yesno . '" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                    }
                                                }
                                            }
                                            $htmlQ .= '<select class="form-control" id="peme"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="peme">';
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
                                            <label id="lbl_gop">General Orientation Program</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php

                                            $html_options_Q = '<option value="0">&nbsp;</option>';
                                            $htmlQ = '';
                                            $oldLabelQ = '';
                                            $oldValQ = '';

                                            if (isset($yesno) && $yesno != '') {
                                                foreach ($yesno as $v) {
                                                    if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->gop) {
                                                        $oldValQ = $v->id;
                                                        $oldLabelQ = $v->yesno;
                                                        $html_options_Q .= '<option data-text="' . $v->yesno . '" selected="selected" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                    } else {
                                                        $html_options_Q .= '<option data-text="' . $v->yesno . '" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                    }
                                                }
                                            }
                                            $htmlQ .= '<select class="form-control" id="gop"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="gop">';
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
                                            <label id="lbl_gopdt">GOP Date</label>
                                        </div>
                                        <div class="col-sm-9">

                                            <?php

                                            if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                <input type="text" id="gopdt" required
                                                       class="form-control" name="gopdt"
                                                       placeholder="GOP Date"
                                                       value="<?php echo(isset($editemp[0]->gopdt) ? $editemp[0]->gopdt : '') ?>"
                                                >

                                            <?php } else { ?>

                                                <input type="text" id="gopdt" required
                                                       class="form-control" name="gopdt"
                                                       placeholder="GOP Date"
                                                       value=""
                                                >

                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label id="lbl_entity">Entity</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php

                                            $html_options_Q = '<option value="0">&nbsp;</option>';
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
                                            $htmlQ .= '<select class="select2 form-control" id="entity"
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
                                            <label id="lbl_dept">Department</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php

                                            $html_options_Q = '<option value="0">&nbsp;</option>';
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
                                            $htmlQ .= '<select class="select2 form-control" id="dept"
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
                                            <label id="lbl_cardissue">ID Card Issued</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php

                                            $html_options_Q = '<option value="0">&nbsp;</option>';
                                            $htmlQ = '';
                                            $oldLabelQ = '';
                                            $oldValQ = '';

                                            if (isset($yesno) && $yesno != '') {
                                                foreach ($yesno as $v) {
                                                    if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->cardissue) {
                                                        $oldValQ = $v->id;
                                                        $oldLabelQ = $v->yesno;
                                                        $html_options_Q .= '<option data-text="' . $v->yesno . '" selected="selected" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                    } else {
                                                        $html_options_Q .= '<option data-text="' . $v->yesno . '" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                    }
                                                }
                                            }
                                            $htmlQ .= '<select class="form-control" id="cardissue"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="cardissue">';
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
                                            <label id="lbl_letterapp">Letter of Appointment Received</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php

                                            $html_options_Q = '<option value="0">&nbsp;</option>';
                                            $htmlQ = '';
                                            $oldLabelQ = '';
                                            $oldValQ = '';
                                            if (isset($yesno) && $yesno != '') {
                                                foreach ($yesno as $v) {
                                                    if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->letterapp) {
                                                        $oldValQ = $v->id;
                                                        $oldLabelQ = $v->yesno;
                                                        $html_options_Q .= '<option data-text="' . $v->yesno . '" selected="selected" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                    } else {
                                                        $html_options_Q .= '<option data-text="' . $v->yesno . '" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                    }
                                                }
                                            }
                                            $htmlQ .= '<select class="form-control" id="letterapp"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="letterapp">';
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
                                            <label id="lbl_confirmation">Confirmation</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php

                                            $html_options_Q = '<option value="0">&nbsp;</option>';
                                            $htmlQ = '';
                                            $oldLabelQ = '';
                                            $oldValQ = '';

                                            if (isset($yesno) && $yesno != '') {
                                                foreach ($yesno as $v) {
                                                    if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->confirmation) {
                                                        $oldValQ = $v->id;
                                                        $oldLabelQ = $v->yesno;
                                                        $html_options_Q .= '<option data-text="' . $v->yesno . '" selected="selected" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                    } else {
                                                        $html_options_Q .= '<option data-text="' . $v->yesno . '" value="' . $v->id . '">' . $v->yesno . '</option>';
                                                    }
                                                }
                                            }
                                            $htmlQ .= '<select class="form-control" id="confirmation"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="confirmation">';
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
                                            <label id="lbl_status">Status</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php

                                            $html_options_Q = '<option value="0">&nbsp;</option>';
                                            $htmlQ = '';
                                            $oldLabelQ = '';
                                            $oldValQ = '';

                                            if (isset($status) && $status != '') {
                                                foreach ($status as $v) {
                                                    if (isset($editemp) && $editemp != '' && $editemp != null && $v->id === $editemp[0]->status) {
                                                        $oldValQ = $v->id;
                                                        $oldLabelQ = $v->status;
                                                        $html_options_Q .= '<option data-text="' . $v->status . '" selected="selected" value="' . $v->id . '">' . $v->status . '</option>';
                                                    } else {
                                                        $html_options_Q .= '<option data-text="' . $v->status . '" value="' . $v->id . '">' . $v->status . '</option>';
                                                    }
                                                }
                                            }
                                            $htmlQ .= '<select class="form-control" id="status"
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
                                            <label id="lbl_remarks">Remarks</label>
                                        </div>
                                        <div class="col-sm-9">

                                            <?php

                                            if (isset($editemp) && $editemp != '' && $editemp != null) { ?>

                                                <textarea id="remarks" rows="5" required
                                                          class="form-control" name="remarks"
                                                          placeholder="Remarks"
                                                ><?php echo(isset($editemp[0]->remarks) ? $editemp[0]->remarks : '') ?></textarea>

                                            <?php } else { ?>

                                                <textarea id="remarks" rows="5" required
                                                          class="form-control" name="remarks"
                                                          placeholder="Remarks"></textarea>

                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">

                                            <?php

                                            if (isset($editemp) && $editemp != '' && $editemp != null) {

                                                if (isset($editemp) && isset($editemp[0]->pic)) {
                                                    echo '<span>Replace Picture</span>';
                                                } else {
                                                    echo '<span>Upload Picture</span>';
                                                }

                                            } else {
                                                echo '<span>Upload Picture</span>';
                                            }

                                            ?>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="file" class="custom-file-input" required
                                                   id="pic" name="pic" accept="image/jpeg">

                                            <?php

                                            if (isset($editemp) && $editemp != '' && $editemp != null) {

                                                if (isset($editemp) && isset($editemp[0]->pic)) {
                                                    echo '<label class="custom-file-label" id="lbl_pic" name="lbl_pic"
                                                                   for="inputGroupFile01">' . $editemp[0]->pic . '</label>';
                                                } else {
                                                    echo '<label class="custom-file-label" id="lbl_pic" name="lbl_pic"
                                                                   for="inputGroupFile01">Choose Picture</label>';
                                                }

                                            } else {
                                                echo '<label class="custom-file-label" id="lbl_pic" name="lbl_pic"
                                                                   for="inputGroupFile01">Choose Picture</label>';
                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">

                                            <?php

                                            if (isset($editemp) && $editemp != '' && $editemp != null) {

                                                if (isset($editemp) && isset($editemp[0]->pic)) {
                                                    echo '<span>Add Documents</span>';
                                                } else {
                                                    echo '<span>Upload Documents</span>';
                                                }

                                            } else {
                                                echo '<span>Upload Documents</span>';
                                            }

                                            ?>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="file" class="custom-file-input" required
                                                   id="doc" name="doc" accept="application/pdf">

                                            <?php

                                            if (isset($editemp) && $editemp != '' && $editemp != null) {

                                                if (isset($editemp) && isset($editemp[0]->doc)) {
                                                    echo '<label class="custom-file-label" id="lbl_doc" name="lbl_doc"
                                                                   for="inputGroupFile01">' . $editemp[0]->doc . '</label>';

                                                } else {
                                                    echo '<label class="custom-file-label" id="lbl_doc" name="lbl_doc"
                                                                   for="inputGroupFile01">Choose Documents</label>';
                                                }

                                            } else {
                                                echo '<label class="custom-file-label" id="lbl_doc" name="lbl_doc"
                                                                   for="inputGroupFile01">Choose Documents</label>';
                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 offset-md-12">

                                    <?php

                                    if (isset($editemp) && $editemp != '' && $editemp != null) {

                                        if (isset($editemp[0]->id)) {
                                            $_SESSION['id'] = $editemp[0]->id;
                                            ?>
                                            <button id="cmdUpdateSaveDraft" name="cmdSaveDraftSummary"
                                                    type="button" class="btn btn-primary mr-1 mb-1"
                                                    onclick="showSummary_SaveDraft();">Update Save Draft
                                            </button>

                                            <button id="cmdSummary" name="cmdSummary" type="button"
                                                    onclick="showSummary();"
                                                    class="btn btn-primary mr-1 mb-1">Update
                                            </button>

                                        <?php } else { ?>

                                            <button id="cmdAddSaveDraft" type="button"
                                                    class="btn btn-primary mr-1 mb-1"
                                                    onclick="addData_SaveDraft();">Save Draft
                                            </button>

                                            <button id="cmdAddData" type="button" onclick="addData();"
                                                    class="btn btn-primary mr-1 mb-1">Save
                                            </button>

                                        <?php }

                                    } else { ?>

                                        <button id="cmdAddSaveDraft" type="button"
                                                class="btn btn-primary mr-1 mb-1"
                                                onclick="addData_SaveDraft();">Save Draft
                                        </button>

                                        <button id="cmdAddData" type="button" onclick="addData();"
                                                class="btn btn-primary mr-1 mb-1">Save
                                        </button>

                                    <?php } ?>

                                    <button id="cmdCancel" name="cmdCancel" type="button"
                                            class="btn btn-outline-warning mr-1 mb-1">Cancel
                                    </button>
                                </div>

                            </div>

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
                                            <form action="#" class="dropzone dropzone-area" id="dpz-remove-thumbs">
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

<input type="hidden" id="hidden_id" name="hidden_id" autocomplete="hidden_id" value="<?php echo (isset($editemp[0]->id) && $editemp[0]->id!=''?$editemp[0]->id:'') ?>">
<!-- END: Content-->
<script src="<?php echo base_url() ?>assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/forms/validation/jquery.validate.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/scripts/forms/form-wizard.min.js"></script>
<script>


    $(document).ready(function () {
        mydate();
        mydate2();
        mydate_dob();
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
                    console.log('sending');
                    form_data.append('pr_reqId', $('#pr_reqId').val());
                    form_data.append('idCategory', $('#idCategory').val());
                    form_data.append('desc', $('#desc').val());
                    form_data.append('model', $('#model').val());
                    form_data.append('product_no', $('#product_no').val());
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
                    form_data.append('statushr.php', $('#status').val());
                    form_data.append('writOff_formNo', $('#writOff_formNo').val());
                    form_data.append('wo_date', $('#wo_date').val());
                    form_data.append('remarks', $('#remarks').val());
                });

                dzClosure.on('complete', function (result) {
                    toastMsg('success', 'Successfully Inserted', 'success');

                    console.log(result);
                    console.log('completed');
                    hideloader();
                    $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                    try {
                        var response = JSON.parse(result);
                        if (response[0] == 'Success') {
                            toastMsg(response[0], response[1], 'success');
                        } else {
                            toastMsg(response[0], response[1], 'error');
                        }
                    } catch (e) {
                    }
                })
            },
        });
    });

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

    function mydate_dob() {
        $('.mypickadat_dob').pickadate({
            selectYears: true,
            selectMonths: true,
            min: new Date(1960, 12, 1),
            clear: ' ',
            format: 'dd-mm-yyyy'
        });
    }

    function chkStatus(obj) {
        var status = $('#status').val();
        if (status == 1) {
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
        form_data.append('pr_reqId', $('#pr_reqId').val());
        form_data.append('idCategory', $('#idCategory').val());
        form_data.append('desc', $('#desc').val());
        form_data.append('model', $('#model').val());
        form_data.append('product_no', $('#product_no').val());
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
        form_data.append('statushr.php', $('#status').val());
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
        }, true);

    }


    function chkEmpNo(){
        var data = {};
        data['empno'] = $("#empno").val();
        $("#empno").removeClass('error');
        if(data['empno']!='' && data['empno']!=undefined){
            CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/getEmployeeEmpNo'); ?>', data, 'POST', function (result) {
                if (result != '' && result != null) {
                    var hidden_id= $("#hidden_id").val();
                    var a = JSON.parse(result);
                    try {
                        if (a[0].error ==1 ) {
                            toastMsg('Error', 'Employee number already exists', 'error');
                            $("#empno").addClass('error').focus();

                            $('#cmdUpdateSaveDraft').css('display', 'none');
                            $('#cmdSummary').css('display', 'none');
                            $('#cmdAddSaveDraft').css('display', 'none');
                            $('#cmdAddData').css('display', 'none');

                        } else {
                            if(hidden_id!='' && hidden_id!=undefined){
                                $('#cmdUpdateSaveDraft').removeAttr('style');
                                $('#cmdSummary').removeAttr('style');
                            }else{
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


</script>


<script>
    $(document).on('click', '#chk_landline', function () {
        if ($('#chk_landline').prop('checked') == true) {
            $('#landline').val('999999999999999');
            //$('#landline').prop('disabled', 'disabled');
        } else {
            $('#landline').val('');
            //$('#landline').removeAttr('disabled');
        }
    });


    $(document).on('click', '#chk_emlandno', function () {
        if ($('#chk_emlandno').prop('checked') == true) {
            $('#emlandno').val('99999999');
            //$('#emlandno').prop('disabled', 'disabled');
        } else {
            $('#emlandno').val('');
            //$('#emlandno').removeAttr('disabled');
        }
    });

    let formData;
    let iseditsavedraft = 0;

    $(document).on("change", "#pic", function () {
        $('#lbl_pic').html($('#pic')[0].files[0].name);
    });

    $(document).on("change", "#doc", function () {
        $('#lbl_doc').html($('#doc')[0].files[0].name);
    });


    $(document).on("click", "#cmdCancel", function () {
        window.location.href = '<?php echo base_url('index.php/hr_controllers/employee_entry');?>';
    });



    $(document).ready(function () {
        $("#cnicno").inputmask("99999-9999999-9");
        $("#dob").inputmask("99-99-9999");
        $("#gncno").inputmask("9999/9999");
        $("#rehiredt").inputmask("99-99-9999");
        $("#conexpiry").inputmask("99-99-9999");
        $("#gopdt").inputmask("99-99-9999");
        setPhone("#landline");
        setPhone("#cellno1");
        setPhone("#cellno2");
        setPhone("#emcellno");
        setPhone("#emlandno");
    });


    $(document).on("change", "#ddlhardship", function () {
        if ($("#ddlhardship").val() == "2") {
            $("#amount").prop("disabled", "disabled");
            $("#amount").val("");
        } else {
            $("#amount").removeAttr("disabled");
        }
    });


    $(document).on("change", "#ddlband", function () {
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
    });


    function setPhone(phone) {
        var input = document.querySelector(phone);
        window.intlTelInput(input, {
            allowDropdown: true,
            autoHideDialCode: false,
            localizedCountries: {'de': 'Deutschland'},
            placeholderNumberType: "MOBILE",
            preferredCountries: ['pk', 'jp'],
            separateDialCode: true
        });
    }

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

    function ValidateEmail(evt) {
        var iserr = true;
        evt = (evt) ? evt : event;
        var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));
        if (charCode > 31 && (charCode < 65 || charCode > 90) &&
            (charCode < 97 || charCode > 122) && charCode != 46) {
            alert("Please enter valid string value ");
            iserr = false;
        }
        return iserr;
    }


    $(document).on("blur", "#peremail", function () {
        if ($("#peremail").val() != "" || $("#peremail").val() != 'undefined') {
            if ($("#peremail").val().indexOf('.') == -1 || $("#peremail").val().indexOf('@') == -1) {
                var error = '';
                var inp = $("#peremail");
                var id = $("#peremail").attr('id');
                var inpVal = $("#peremail").val();
                inp.removeClass('error').removeClass('is-invalid');
                error = '<div id="lblerr_' + id + '" class="invalid-feedback">Invalid email address</div>';
                $("#lblerr_" + id).remove();
                inp.addClass('error').addClass('is-invalid').parent('div').append(error);
                $("#peremail").focus();
            }
        }
    });


    function numeralsOnly_decimal(evt) {
        evt = (evt) ? evt : event;
        var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));
        if (charCode > 31 && charCode != 46 && (charCode < 48 || charCode > 57)) {
            alert("Please enter Numeric value ");
            return false;
        }
        return true;
    }

    function numeralsOnly(evt) {
        evt = (evt) ? evt : event;
        var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));

        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please enter Numeric value ");
            return false;
        }
        return true;
    }


    function numeralsOnly_phone(evt) {
        evt = (evt) ? evt : event;
        var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please enter Numeric value ");
            return false;
        }
        $("#chk_landline").prop("checked", false);

        return true;
    }


    function numeralsOnly_phone1(evt) {
        evt = (evt) ? evt : event;
        var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please enter Numeric value ");
            return false;
        }
        $("#chk_emlandno").prop("checked", false);
        return true;
    }


    function getEmpType_Ajax() {
        CallAjax('<?php echo base_url('index.php/hr_controllers/Employee_entry/getEmpType'); ?>', {}, 'POST', function (result) {
            if (result != '' && JSON.parse(result).length > 0) {
                var a = JSON.parse(result);
                try {
                    var html = '';
                    $.each(a, function (i, v) {
                        html += "<option value='" + v.id + "'>" + v.emptype + "</option>";
                    })

                } catch (e) {
                }
                $('#ddlemptype').html(html);
            } else {
                toastMsg('Error', 'Error in loading Employees', 'error');
            }
        });
    }


    function addData() {
        $('#ddlemptype').css('border', '1px solid #babfc7');
        $('#ddlcategory').css('border', '1px solid #babfc7');
        $('#empno').css('border', '1px solid #babfc7');
        $('#empname').css('border', '1px solid #babfc7');
        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        $('#landline').css('border', '1px solid #babfc7');
        $('#cellno1').css('border', '1px solid #babfc7');
        $('#cellno2').css('border', '1px solid #babfc7');
        $('#personnme').css('border', '1px solid #babfc7');
        $('#emcellno').css('border', '1px solid #babfc7');
        $('#emlandno').css('border', '1px solid #babfc7');
        $('#resaddr').css('border', '1px solid #babfc7');
        $('#gncno').css('border', '1px solid #babfc7');
        $('#ddlband').css('border', '1px solid #babfc7');
        $('#titdesi').css('border', '1px solid #babfc7');
        $('#rehiredt').css('border', '1px solid #babfc7');
        $('#conexpiry').css('border', '1px solid #babfc7');
        $('#workproj').css('border', '1px solid #babfc7');
        $('#chargproj').css('border', '1px solid #babfc7');
        $('#ddlloc').css('border', '1px solid #babfc7');
        $('#supernme').css('border', '1px solid #babfc7');
        $('#hiresalary').css('border', '1px solid #babfc7');
        $('#ddlhardship').css('border', '1px solid #babfc7');
        $('#amount').css('border', '1px solid #babfc7');
        $('#benefits').css('border', '1px solid #babfc7');
        $('#peme').css('border', '1px solid #babfc7');
        $('#gop').css('border', '1px solid #babfc7');
        $('#gopdt').css('border', '1px solid #babfc7');
        $('#entity').css('border', '1px solid #babfc7');
        $('#dept').css('border', '1px solid #babfc7');
        $('#cardissue').css('border', '1px solid #babfc7');
        $('#letterapp').css('border', '1px solid #babfc7');
        $('#confirmation').css('border', '1px solid #babfc7');
        $('#status').css('border', '1px solid #babfc7');
        $('#remarks').css('border', '1px solid #babfc7');
        $('#pic').css('border', '1px solid #babfc7');
        $('#doc').css('border', '1px solid #babfc7');
        $('#degree').css('border', '1px solid #babfc7');
        $('#field').css('border', '1px solid #babfc7');
        var iserror = false;
        formData = new FormData($("#frm")[0]);
        var arr_pic = "";
        var arr_doc = "";
        var size = 0;
        var fnme = "";
        var imgext = "";
        var ext = "";
        var pic_path = "";
        var doc_path = "";
        if (validateData(formData)) {
            if (!checkValues()) {
                if ($("#pic").val() != "") {
                    arr_pic = $("#pic").val().split("\\");
                    size = parseInt($("#pic")[0].files[0].size / 1024);

                    fnme = $("#lbl_pic").html();
                    imgext = $("#pic")[0].files[0].name.split(".");
                    pic_path = '<?php echo base_url() ?>' + "assets/emppic/" + $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_img." + imgext[1];
                    if (size <= 2000) {
                        if (fnme.lastIndexOf(".jpg") != -1) {
                        } else {
                            ShowError($("#pic"), "Please select .jpg files");
                            iserror = true;
                        }

                    } else {
                        ShowError($("#pic"), "Please select 2 MB files only");
                        iserror = true;
                    }
                }


                if ($("#doc").val() != "") {
                    arr_doc = $("#doc").val().split("\\");
                    size = parseInt($("#doc")[0].files[0].size / 1024);
                    fnme = $("#lbl_doc").html();
                    ext = $("#doc")[0].files[0].name.split(".");
                    doc_path = '<?php echo base_url() ?>' + "assets/docs/" + $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_doc." + ext[1];
                    if (size <= 2000) {
                        if (fnme.lastIndexOf(".pdf") != -1) {


                        } else {
                            ShowError($("#doc"), "Please select .pdf files");
                            iserror = true;
                        }

                    } else {
                        ShowError($("#doc"), "Please select 2 MB files only");
                        iserror = true;
                    }
                }

                if ($("#pic").val() != "") {
                    formData.append('imgfile', $('#pic')[0].files[0], $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_img." + imgext[1]);
                }

                if ($("#doc").val() != "") {
                    formData.append('docfile', $('#doc')[0].files[0], $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_doc." + ext[1]);
                }

                var arr = $('.iti__selected-dial-code').text().split('+');

                formData.append('landlineccode', "+" + arr[1]);
                formData.append('cellno1ccode', "+" + arr[2]);
                formData.append('cellno2ccode', "+" + arr[3]);
                formData.append('emcellnoccode', "+" + arr[4]);
                formData.append('emlandnoccode', "+" + arr[5]);


                if ($('#chk_landline').is(':checked')) {
                    formData.append('chk_landline', "1");
                } else {
                    formData.append('chk_landline', "0");
                }


                if ($('#chk_emlandno').is(':checked')) {
                    formData.append('chk_emlandno', "1");
                } else {
                    formData.append('chk_emlandno', "0");
                }
                CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/addRecord'); ?>', formData, 'POST', function (result) {
                    //hideloader();
                    if (result == 1) {
                        toastMsg('Success', 'Record Saved Successfully', 'success');
                        //$('#addModal').modal('hide');
                        setTimeout(function () {
                            window.location.reload();
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

            }
        }

    }


    function showSummary() {

        $('#ddlemptype').css('border', '1px solid #babfc7');
        $('#ddlcategory').css('border', '1px solid #babfc7');
        $('#empno').css('border', '1px solid #babfc7');
        $('#empname').css('border', '1px solid #babfc7');

        //$('#qual').css('border', '1px solid #babfc7');

        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        $('#landline').css('border', '1px solid #babfc7');
        $('#cellno1').css('border', '1px solid #babfc7');
        $('#cellno2').css('border', '1px solid #babfc7');
        $('#personnme').css('border', '1px solid #babfc7');
        $('#emcellno').css('border', '1px solid #babfc7');
        $('#emlandno').css('border', '1px solid #babfc7');
        $('#resaddr').css('border', '1px solid #babfc7');
        $('#gncno').css('border', '1px solid #babfc7');
        $('#ddlband').css('border', '1px solid #babfc7');
        $('#titdesi').css('border', '1px solid #babfc7');
        $('#rehiredt').css('border', '1px solid #babfc7');
        $('#conexpiry').css('border', '1px solid #babfc7');
        $('#workproj').css('border', '1px solid #babfc7');
        $('#chargproj').css('border', '1px solid #babfc7');
        $('#ddlloc').css('border', '1px solid #babfc7');
        $('#supernme').css('border', '1px solid #babfc7');
        $('#hiresalary').css('border', '1px solid #babfc7');
        $('#ddlhardship').css('border', '1px solid #babfc7');
        $('#amount').css('border', '1px solid #babfc7');
        $('#benefits').css('border', '1px solid #babfc7');
        $('#peme').css('border', '1px solid #babfc7');
        $('#gop').css('border', '1px solid #babfc7');
        $('#gopdt').css('border', '1px solid #babfc7');
        $('#entity').css('border', '1px solid #babfc7');
        $('#dept').css('border', '1px solid #babfc7');
        $('#cardissue').css('border', '1px solid #babfc7');
        $('#letterapp').css('border', '1px solid #babfc7');
        $('#confirmation').css('border', '1px solid #babfc7');
        $('#status').css('border', '1px solid #babfc7');
        $('#remarks').css('border', '1px solid #babfc7');
        $('#pic').css('border', '1px solid #babfc7');
        $('#doc').css('border', '1px solid #babfc7');
        $('#degree').css('border', '1px solid #babfc7');
        $('#field').css('border', '1px solid #babfc7');

        var iserror = false;
        var isaudit = false;


        // var formData = new FormData();
        formData = new FormData($("#frm")[0]);

        var arr_pic = "";
        var arr_doc = "";
        var size = 0;
        var fnme = "";
        var imgext = "";
        var ext = "";

        var pic_path = "";
        var doc_path = "";
        var old_array = "";

        <?php if(isset($editemp)) { ?>
        old_array = <?php echo json_encode($editemp); ?>;
        <?php } ?>

        /*for (var [key, value] of formData.entries()) {
            console.log(key + " - " + value);
        }*/

        if (validateData(formData)) {

            if (!checkValues()) {


                if ($("#pic").val() != "") {

                    arr_pic = $("#pic").val().split("\\");

                    size = parseInt($("#pic")[0].files[0].size / 1024);

                    fnme = $("#lbl_pic").html();
                    imgext = $("#pic")[0].files[0].name.split(".");


                    pic_path = '<?php echo base_url() ?>' + "assets/emppic/" + $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_img." + imgext[1];


                    if (size <= 2000) {

                        if (fnme.lastIndexOf(".jpg") != -1) {

                            //var formData = new FormData();
                            //formData.append('file', $('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "." + ext[1]);


                            //var formData = new FormData($("#frm")[0]);
                            //formData.append('request', 1);

                            /*$.ajax({
                                type: 'POST',
                                url: 'employee_entry/upload',
                                data: formData,
                                success: function (status) {
                                    //var my_path = "/assets/emppic/" + status;
                                    //$("#pic").attr("src", my_path);
                                },
                                processData: false,
                                contentType: false,
                                error: function () {
                                    alert("Pic uploading error");
                                    iserror = true;
                                }
                            });*/

                        } else {
                            //$("#pic").css('border', '1px solid red');
                            //toastMsg('Pic Uploading Error', 'Please select .jpg files', 'error');

                            ShowError($("#pic"), "Please select .jpg files");
                            iserror = true;

                            //$("#lblerr_pic").html("Please select .jpg files");
                            //$("#lblerr_pic").css('visibility', 'visible');
                        }

                    } else {
                        //$("#pic").css('border', '1px solid red');
                        //toastMsg('Pic Uploading Error', 'Please select 2 MB files only', 'error');

                        ShowError($("#pic"), "Please select 2 MB files only");
                        iserror = true;

                        //$("#lblerr_pic").html("Please select 2 MB files only");
                        //$("#lblerr_pic").css('visibility', 'visible');
                    }
                }


                if ($("#doc").val() != "") {

                    arr_doc = $("#doc").val().split("\\");

                    size = parseInt($("#doc")[0].files[0].size / 1024);

                    fnme = $("#lbl_doc").html();
                    ext = $("#doc")[0].files[0].name.split(".");

                    doc_path = '<?php echo base_url() ?>' + "assets/docs/" + $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_doc." + ext[1];


                    if (size <= 2000) {

                        if (fnme.lastIndexOf(".pdf") != -1) {


                        } else {
                            //$("#doc").css('border', '1px solid red');
                            //toastMsg('Docs Uploading Error', 'Please select .pdf files', 'error');

                            ShowError($("#doc"), "Please select .pdf files");
                            iserror = true;
                        }

                    } else {
                        //$("#doc").css('border', '1px solid red');
                        //toastMsg('Docs Uploading Error', 'Please select 2 MB files only', 'error');

                        ShowError($("#doc"), "Please select 2 MB files only");
                        iserror = true;
                    }
                }


                // formData.append('data', $("#frm")[0]);


                if ($("#pic").val() != "") {
                    formData.append('imgfile', $('#pic')[0].files[0], $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_img." + imgext[1]);
                } else {

                    if ($("#lbl_pic").html() == "Choose Picture") {
                        formData.append('pic', "");
                    } else {
                        formData.append('pic', $("#lbl_pic").html());
                    }
                }


                if ($("#doc").val() != "") {
                    formData.append('docfile', $('#doc')[0].files[0], $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_doc." + ext[1]);
                } else {

                    if ($("#lbl_doc").html() == "Choose Documents") {
                        formData.append('doc', "");
                    } else {
                        formData.append('doc', $("#lbl_doc").html());
                    }
                }


                if ($('.iti__selected-dial-code').text() != '' && $('.iti__selected-dial-code').text() != undefined
                    && $('.iti__selected-dial-code').text() != 'undefined' && $('.iti__selected-dial-code').text() != null
                ) {

                    var arr = $('.iti__selected-dial-code').text().split('+');
                    //console.log($('.iti__selected-dial-code').text());
                    //console.log(arr);
                    //console.log("+" + arr[0] + "+" + arr[1] + "+" + arr[2] + "+" + arr[3] + "+" + arr[4] + "+" + arr[5]);
                    //console.log($('.iti__selected-dial-code').text() + " - " + arr + " - " + arr.length);

                    //console.log($('.iti__selected-dial-code').text(), arr.length);
                    //console.log("+" + arr[0] + "+" + arr[1] + "+" + arr[2] + "+" + arr[3] + "+" + arr[4] + "+" + arr[5]);

                    if (arr == "") {
                        formData.append('landlineccode', "+92");
                        formData.append('cellno1ccode', "+92");
                        formData.append('cellno2ccode', "+92");
                        formData.append('emcellnoccode', "+92");
                        formData.append('emlandnoccode', "+92");

                    } else {
                        formData.append('landlineccode', "+" + arr[1]);
                        formData.append('cellno1ccode', "+" + arr[2]);
                        formData.append('cellno2ccode', "+" + arr[3]);
                        formData.append('emcellnoccode', "+" + arr[4]);
                        formData.append('emlandnoccode', "+" + arr[5]);
                    }

                } else {
                    formData.append('landlineccode', "+92");
                    formData.append('cellno1ccode', "+92");
                    formData.append('cellno2ccode', "+92");
                    formData.append('emcellnoccode', "+92");
                    formData.append('emlandnoccode', "+92");

                }


                if ($('#chk_landline').is(':checked')) {
                    formData.append('chk_landline', "1");
                } else {
                    formData.append('chk_landline', "0");
                }


                if ($('#chk_emlandno').is(':checked')) {
                    formData.append('chk_emlandno', "1");
                } else {
                    formData.append('chk_emlandno', "0");
                }


                /*console.log(formData.get('landlineccode'));
                console.log(formData.get('cellno1ccode'));
                console.log(formData.get('cellno2ccode'));
                console.log(formData.get('emcellnoccode'));
                console.log(formData.get('emlandnoccode'));*/


                var str = "<table width='100%'><tr><th width='25%'>Field Name</th><th width='30%'>Previous Value</th><th width='30%'>Current Value</th><th width='15%'>Eff Date</th></tr>";

                if (old_array != "") {

                    $.each(old_array[0], function (key, value) {

                        //console.log(key + " - " + value + "   ***   " + formData.get(key) + " --- " + $('#' + key).prop("type"));


                        if (key != "userid" && key != "entrydate" && key != "id" && key != "empno") {

                            if (key == "pic") {


                                if (value != $("#lbl_pic").text()) {

                                    str += "<tr class='summaryRow' data-key='" + "pic" + "'>" +
                                        "<td class='summaryFldName'>" + "Pic" + "</td>";


                                    str += "<td class='summaryOldVal'>" + value + "</td>";

                                    if ($("#lbl_pic").text() == "Choose Picture") {
                                        str += "<td class='summaryNewVal'>" + $("#lbl_pic").text() + "</td>";
                                    } else {
                                        str += "<td class='summaryNewVal'>assets/emppic/" + $("#lbl_pic").text() + "</td>";
                                    }


                                    str += "<td class='summaryFldOldVal' style='display:none;'></td>" +
                                        "<td class='summaryFldNewVal' style='display:none;'></td>" +
                                        "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                        "</tr>";

                                    isaudit = true;
                                }


                            } else if (key == "doc") {


                                if (value != $("#lbl_doc").text()) {

                                    str += "<tr class='summaryRow' data-key='" + "doc" + "'>" +
                                        "<td class='summaryFldName'>" + "Doc" + "</td>";


                                    str += "<td class='summaryOldVal'>" + value + "</td>";

                                    if ($("#lbl_pic").text() == "Choose Documents") {
                                        str += "<td class='summaryNewVal'>" + $("#lbl_doc").text() + "</td>";
                                    } else {
                                        str += "<td class='summaryNewVal'>assets/docs/" + $("#lbl_doc").text() + "</td>";
                                    }


                                    str += "<td class='summaryFldOldVal' style='display:none;'></td>" +
                                        "<td class='summaryFldNewVal' style='display:none;'></td>" +
                                        "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                        "</tr>";

                                    isaudit = true;
                                }


                            } else if (key == "degree") {

                                let test1 = $('#' + key).attr('data-oldval');
                                let test2 = $('#' + key).find('option:selected').val();


                                if (test1 != "" && test2 != undefined ||
                                    test1 != "" && test2 != 'undefined' ||
                                    test1 != null && test2 != null ||
                                    test1 != "" && test2 != "" ||
                                    test1 != "" && test2 != 0
                                ) {

                                    if (test1 != test2) {

                                        str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                            "<td class='summaryFldName'>" + $("#lbl_" + key).text() + "</td>";

                                        str += "<td class='summaryOldVal'>" + $('#' + key).attr('data-oldlabel') + "</td>" +
                                            "<td class='summaryNewVal'>" + $('#' + key).find('option:selected').attr('data-text') + "</td>" +
                                            "<td class='summaryFldOldVal' style='display:none;'>" + $('#' + key).attr('data-oldval') + "</td>" +
                                            "<td class='summaryFldNewVal' style='display:none;'>" + $('#' + key).find('option:selected').val() + "</td>" +
                                            "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                            "</tr>";

                                        isaudit = true;
                                    }
                                }

                            } else if (key == "field") {

                                let test1 = $('#' + key).attr('data-oldval');
                                let test2 = $('#' + key).find('option:selected').val();


                                if (test1 != "" && test2 != undefined ||
                                    test1 != "" && test2 != 'undefined' ||
                                    test1 != null && test2 != null ||
                                    test1 != "" && test2 != "" ||
                                    test1 != "" && test2 != 0
                                ) {

                                    if (test1 != test2) {

                                        str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                            "<td class='summaryFldName'>" + $("#lbl_" + "degree").text() + "</td>";

                                        str += "<td class='summaryOldVal'>" + $('#' + key).attr('data-oldlabel') + "</td>" +
                                            "<td class='summaryNewVal'>" + $('#' + key).find('option:selected').attr('data-text') + "</td>" +
                                            "<td class='summaryFldOldVal' style='display:none;'>" + $('#' + key).attr('data-oldval') + "</td>" +
                                            "<td class='summaryFldNewVal' style='display:none;'>" + $('#' + key).find('option:selected').val() + "</td>" +
                                            "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                            "</tr>";

                                        isaudit = true;
                                    }
                                }

                            } else if (key == "chk_landline") {

                                let test1 = $('#' + key).attr('data-oldval');
                                let test2 = "";


                                if ($('#' + key).is(':checked')) {
                                    test2 = 1;
                                } else {
                                    test2 = 0;
                                }


                                if (test1 != test2) {

                                    str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                        "<td class='summaryFldName'>Landline No Checkbox</td>";

                                    str += "<td class='summaryOldVal'>" + $('#' + key).attr('data-oldval') + "</td>" +
                                        "<td class='summaryNewVal'>" + test2 + "</td>" +
                                        "<td class='summaryFldOldVal' style='display:none;'>" + test1 + "</td>" +
                                        "<td class='summaryFldNewVal' style='display:none;'>" + test2 + "</td>" +
                                        "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                        "</tr>";

                                    isaudit = true;
                                }

                            } else if (key == "chk_emlandno") {

                                let test1 = $('#' + key).attr('data-oldval');
                                let test2 = "";


                                if ($('#' + key).is(':checked')) {
                                    test2 = 1;
                                } else {
                                    test2 = 0;
                                }


                                if (test1 != test2) {

                                    str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                        "<td class='summaryFldName'>Emergency Landline Checkbox</td>";

                                    str += "<td class='summaryOldVal'>" + $('#' + key).attr('data-oldval') + "</td>" +
                                        "<td class='summaryNewVal'>" + test2 + "</td>" +
                                        "<td class='summaryFldOldVal' style='display:none;'>" + test1 + "</td>" +
                                        "<td class='summaryFldNewVal' style='display:none;'>" + test2 + "</td>" +
                                        "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                        "</tr>";

                                    isaudit = true;
                                }


                            } else if (key == "hiresalary") {

                                let test1 = $("#" + key).attr('data-oldval');
                                let test2 = $("#" + key).val();


                                if (test1 != test2) {

                                    str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                        "<td class='summaryFldName'>" + $("#lbl_" + key).text() + "</td>";

                                    str += "<td class='summaryOldVal'>" + test1 + "</td>" +
                                        "<td class='summaryNewVal'>" + test2 + "</td>" +
                                        "<td class='summaryFldOldVal' style='display:none;'></td>" +
                                        "<td class='summaryFldNewVal' style='display:none;'></td>" +
                                        "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                        "</tr>";

                                    isaudit = true;
                                }


                            } else {
                                //console.log(key + " - " + value + "   ***   " + formData.get(key));

                                if (formData.get(key) == "" && value == null) {
                                } else {

                                    //console.log(key + " - " + $('#' + key).prop("type"));

                                    if (formData.get(key) != value) {

                                        //str += "<tr><td>field name</td><td>" + value + "</td><td>" + formData.get(key) + "</td><td><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td></tr>";
                                        str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                            "<td class='summaryFldName'>" + $("#lbl_" + key).text() + "</td>";


                                        //console.log(formData.get(key) + " - " + $('#' + key).prop("type"));


                                        if ($('#' + key).prop("type") == "select-one") {

                                            str += "<td class='summaryOldVal'>" + $('#' + key).attr('data-oldlabel') + "</td>" +
                                                "<td class='summaryNewVal'>" + $('#' + key).find('option:selected').attr('data-text') + "</td>" +
                                                "<td class='summaryFldOldVal' style='display:none;'>" + $('#' + key).attr('data-oldval') + "</td>" +
                                                "<td class='summaryFldNewVal' style='display:none;'>" + $('#' + key).find('option:selected').val() + "</td>" +
                                                "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                                "</tr>";

                                        } else {
                                            str += "<td class='summaryOldVal'>" + value + "</td>" +
                                                "<td class='summaryNewVal'>" + formData.get(key) + "</td>" +
                                                "<td class='summaryFldOldVal' style='display:none;'></td>" +
                                                "<td class='summaryFldNewVal' style='display:none;'></td>" +
                                                "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                                "</tr>";
                                        }

                                        isaudit = true;
                                    }


                                }
                            }
                        }
                    });

                }


                /*for (var [key, value] of formData.entries()) {
                    //console.log(key, value);
                    console.log(key + " - ");

                    $.map(old_array[0], function (key, i) {

                        console.log(key);

                        /!*if (key == val) {

                            console.log("1");

                        }*!/

                    });
                }*/


                str += "</table>";


                if (isaudit == true) {
                    $("#tblaudit").html(str);
                    $("#auditModal").modal('show');
                    pickDate();
                }

            }

        }

    }


    function showSummary_SaveDraft() {

        $('#ddlemptype').css('border', '1px solid #babfc7');
        $('#ddlcategory').css('border', '1px solid #babfc7');
        $('#empno').css('border', '1px solid #babfc7');
        $('#empname').css('border', '1px solid #babfc7');

        //$('#qual').css('border', '1px solid #babfc7');

        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        $('#landline').css('border', '1px solid #babfc7');
        $('#cellno1').css('border', '1px solid #babfc7');
        $('#cellno2').css('border', '1px solid #babfc7');
        $('#personnme').css('border', '1px solid #babfc7');
        $('#emcellno').css('border', '1px solid #babfc7');
        $('#emlandno').css('border', '1px solid #babfc7');
        $('#resaddr').css('border', '1px solid #babfc7');
        $('#gncno').css('border', '1px solid #babfc7');
        $('#ddlband').css('border', '1px solid #babfc7');
        $('#titdesi').css('border', '1px solid #babfc7');
        $('#rehiredt').css('border', '1px solid #babfc7');
        $('#conexpiry').css('border', '1px solid #babfc7');
        $('#workproj').css('border', '1px solid #babfc7');
        $('#chargproj').css('border', '1px solid #babfc7');
        $('#ddlloc').css('border', '1px solid #babfc7');
        $('#supernme').css('border', '1px solid #babfc7');
        $('#hiresalary').css('border', '1px solid #babfc7');
        $('#ddlhardship').css('border', '1px solid #babfc7');
        $('#amount').css('border', '1px solid #babfc7');
        $('#benefits').css('border', '1px solid #babfc7');
        $('#peme').css('border', '1px solid #babfc7');
        $('#gop').css('border', '1px solid #babfc7');
        $('#gopdt').css('border', '1px solid #babfc7');
        $('#entity').css('border', '1px solid #babfc7');
        $('#dept').css('border', '1px solid #babfc7');
        $('#cardissue').css('border', '1px solid #babfc7');
        $('#letterapp').css('border', '1px solid #babfc7');
        $('#confirmation').css('border', '1px solid #babfc7');
        $('#status').css('border', '1px solid #babfc7');
        $('#remarks').css('border', '1px solid #babfc7');
        $('#pic').css('border', '1px solid #babfc7');
        $('#doc').css('border', '1px solid #babfc7');
        $('#degree').css('border', '1px solid #babfc7');
        $('#field').css('border', '1px solid #babfc7');

        var iserror = false;
        var isaudit = false;


        // var formData = new FormData();
        formData = new FormData($("#frm")[0]);

        var arr_pic = "";
        var arr_doc = "";
        var size = 0;
        var fnme = "";
        var imgext = "";
        var ext = "";

        var pic_path = "";
        var doc_path = "";
        var old_array = "";


        iseditsavedraft = 1;


        <?php if(isset($editemp)) { ?>
        old_array = <?php echo json_encode($editemp); ?>;
        <?php } ?>

        /*for (var [key, value] of formData.entries()) {
            console.log(key + " - " + value);
        }*/

        if ($("#pic").val() != "") {

            arr_pic = $("#pic").val().split("\\");

            size = parseInt($("#pic")[0].files[0].size / 1024);

            fnme = $("#lbl_pic").html();
            imgext = $("#pic")[0].files[0].name.split(".");


            pic_path = '<?php echo base_url() ?>' + "assets/emppic/" + $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_img." + imgext[1];


            if (size <= 2000) {

                if (fnme.lastIndexOf(".jpg") != -1) {

                    //var formData = new FormData();
                    //formData.append('file', $('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "." + ext[1]);


                    //var formData = new FormData($("#frm")[0]);
                    //formData.append('request', 1);

                    /*$.ajax({
                        type: 'POST',
                        url: 'employee_entry/upload',
                        data: formData,
                        success: function (status) {
                            //var my_path = "/assets/emppic/" + status;
                            //$("#pic").attr("src", my_path);
                        },
                        processData: false,
                        contentType: false,
                        error: function () {
                            alert("Pic uploading error");
                            iserror = true;
                        }
                    });*/

                } else {
                    //$("#pic").css('border', '1px solid red');
                    //toastMsg('Pic Uploading Error', 'Please select .jpg files', 'error');

                    ShowError($("#pic"), "Please select .jpg files");
                    iserror = true;

                    //$("#lblerr_pic").html("Please select .jpg files");
                    //$("#lblerr_pic").css('visibility', 'visible');
                }

            } else {
                //$("#pic").css('border', '1px solid red');
                //toastMsg('Pic Uploading Error', 'Please select 2 MB files only', 'error');

                ShowError($("#pic"), "Please select 2 MB files only");
                iserror = true;

                //$("#lblerr_pic").html("Please select 2 MB files only");
                //$("#lblerr_pic").css('visibility', 'visible');
            }
        }


        if ($("#doc").val() != "") {

            arr_doc = $("#doc").val().split("\\");

            size = parseInt($("#doc")[0].files[0].size / 1024);

            fnme = $("#lbl_doc").html();
            ext = $("#doc")[0].files[0].name.split(".");

            doc_path = '<?php echo base_url() ?>' + "assets/docs/" + $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_doc." + ext[1];


            if (size <= 2000) {

                if (fnme.lastIndexOf(".pdf") != -1) {


                } else {
                    //$("#doc").css('border', '1px solid red');
                    //toastMsg('Docs Uploading Error', 'Please select .pdf files', 'error');

                    ShowError($("#doc"), "Please select .pdf files");
                    iserror = true;
                }

            } else {
                //$("#doc").css('border', '1px solid red');
                //toastMsg('Docs Uploading Error', 'Please select 2 MB files only', 'error');

                ShowError($("#doc"), "Please select 2 MB files only");
                iserror = true;
            }
        }


        // formData.append('data', $("#frm")[0]);

        if ($("#pic").val() != "") {
            formData.append('imgfile', $('#pic')[0].files[0], $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_img." + imgext[1]);
        } else {

            if ($("#lbl_pic").html() == "Choose Picture") {
                formData.append('pic', "");
            } else {
                formData.append('pic', $("#lbl_pic").html());
            }
        }


        if ($("#doc").val() != "") {
            formData.append('docfile', $('#doc')[0].files[0], $('#empname').val().replace(' ', "_") + "_" + $('#empno').val() + "_doc." + ext[1]);
        } else {

            if ($("#lbl_doc").html() == "Choose Documents") {
                formData.append('doc', "");
            } else {
                formData.append('doc', $("#lbl_doc").html());
            }
        }


        if ($('.iti__selected-dial-code').text() != '' && $('.iti__selected-dial-code').text() != undefined
            && $('.iti__selected-dial-code').text() != 'undefined' && $('.iti__selected-dial-code').text() != null
        ) {

            var arr = $('.iti__selected-dial-code').text().split('+');
            //console.log($('.iti__selected-dial-code').text());
            //console.log(arr);
            //console.log("+" + arr[0] + "+" + arr[1] + "+" + arr[2] + "+" + arr[3] + "+" + arr[4] + "+" + arr[5]);
            //console.log($('.iti__selected-dial-code').text() + " - " + arr + " - " + arr.length);

            //console.log($('.iti__selected-dial-code').text(), arr.length);
            //console.log("+" + arr[0] + "+" + arr[1] + "+" + arr[2] + "+" + arr[3] + "+" + arr[4] + "+" + arr[5]);

            if (arr == "") {
                formData.append('landlineccode', "+92");
                formData.append('cellno1ccode', "+92");
                formData.append('cellno2ccode', "+92");
                formData.append('emcellnoccode', "+92");
                formData.append('emlandnoccode', "+92");

            } else {
                formData.append('landlineccode', "+" + arr[1]);
                formData.append('cellno1ccode', "+" + arr[2]);
                formData.append('cellno2ccode', "+" + arr[3]);
                formData.append('emcellnoccode', "+" + arr[4]);
                formData.append('emlandnoccode', "+" + arr[5]);
            }

        } else {
            formData.append('landlineccode', "+92");
            formData.append('cellno1ccode', "+92");
            formData.append('cellno2ccode', "+92");
            formData.append('emcellnoccode', "+92");
            formData.append('emlandnoccode', "+92");
        }


        if ($("#chk_landline").is(":checked")) {
            formData.append("chk_landline", "1");
        } else {
            formData.append("chk_landline", "0");
        }


        if ($("#chk_emlandno").is(":checked")) {
            formData.append("chk_emlandno", "1");
        } else {
            formData.append("chk_emlandno", "0");
        }

        /*console.log(formData.get('landlineccode'));
        console.log(formData.get('cellno1ccode'));
        console.log(formData.get('cellno2ccode'));
        console.log(formData.get('emcellnoccode'));
        console.log(formData.get('emlandnoccode'));*/


        let str = "<table width='100%'><tr><th width='25%'>Field Name</th><th width='30%'>Previous Value</th><th width='30%'>Current Value</th><th width='15%'>Eff Date</th></tr>";

        if (old_array != "") {

            /*for (let [key, value] of formData.entries()) {
                console.log(key + " - " + value);
            }*/

            $.each(old_array[0], function (key, value) {

                //console.log(key + " - " + value + "   ***   " + key + " - " + value + " --- " + $('#' + key).prop("type"));


                if (key != "userid" && key != "entrydate" && key != "id" && key != "empno") {

                    if (key == "pic") {


                        if (value != null || $("#lbl_pic").text() != "Choose Picture") {

                            if (value != $("#lbl_pic").text()) {

                                str += "<tr class='summaryRow' data-key='" + "pic" + "'>" +
                                    "<td class='summaryFldName'>" + "Pic" + "</td>";


                                str += "<td class='summaryOldVal'>" + value + "</td>";

                                if ($("#lbl_pic").text() == "Choose Picture") {
                                    str += "<td class='summaryNewVal'>" + $("#lbl_pic").text() + "</td>";
                                } else {
                                    str += "<td class='summaryNewVal'>assets/emppic/" + $("#lbl_pic").text() + "</td>";
                                }


                                str += "<td class='summaryFldOldVal' style='display:none;'></td>" +
                                    "<td class='summaryFldNewVal' style='display:none;'></td>" +
                                    "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                    "</tr>";

                                isaudit = true;
                            }

                        }


                    } else if (key == "doc") {


                        if (value != null || $("#lbl_doc").text() != "Choose Documents") {

                            if (value != $("#lbl_doc").text()) {

                                str += "<tr class='summaryRow' data-key='" + "doc" + "'>" +
                                    "<td class='summaryFldName'>" + "Doc" + "</td>";


                                str += "<td class='summaryOldVal'>" + value + "</td>";

                                if ($("#lbl_doc").text() == "Choose Documents") {
                                    str += "<td class='summaryNewVal'>" + $("#lbl_doc").text() + "</td>";
                                } else {
                                    str += "<td class='summaryNewVal'>assets/docs/" + $("#lbl_doc").text() + "</td>";
                                }


                                str += "<td class='summaryFldOldVal' style='display:none;'></td>" +
                                    "<td class='summaryFldNewVal' style='display:none;'></td>" +
                                    "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                    "</tr>";

                                isaudit = true;
                            }

                        }


                    } else if (key == "degree") {

                        let test1 = $('#' + key).attr('data-oldval');
                        let test2 = $('#' + key).find('option:selected').val();


                        if (test1 != "" && test2 != "0" ||
                            test1 != null && test2 != "0"
                        ) {

                            if (test1 != test2) {

                                str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                    "<td class='summaryFldName'>" + $("#lbl_" + key).text() + "</td>";

                                str += "<td class='summaryOldVal'>" + $('#' + key).attr('data-oldlabel') + "</td>" +
                                    "<td class='summaryNewVal'>" + $('#' + key).find('option:selected').attr('data-text') + "</td>" +
                                    "<td class='summaryFldOldVal' style='display:none;'>" + $('#' + key).attr('data-oldval') + "</td>" +
                                    "<td class='summaryFldNewVal' style='display:none;'>" + $('#' + key).find('option:selected').val() + "</td>" +
                                    "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                    "</tr>";

                                isaudit = true;
                            }
                        }

                    } else if (key == "field") {

                        let test1 = $('#' + key).attr('data-oldval');
                        let test2 = $('#' + key).find('option:selected').val();


                        if (test1 != "" && test2 != "0" ||
                            test1 != null && test2 != "0"
                        ) {

                            if (test1 != test2) {

                                str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                    "<td class='summaryFldName'>" + $("#lbl_" + "degree").text() + "</td>";

                                str += "<td class='summaryOldVal'>" + $('#' + key).attr('data-oldlabel') + "</td>" +
                                    "<td class='summaryNewVal'>" + $('#' + key).find('option:selected').attr('data-text') + "</td>" +
                                    "<td class='summaryFldOldVal' style='display:none;'>" + $('#' + key).attr('data-oldval') + "</td>" +
                                    "<td class='summaryFldNewVal' style='display:none;'>" + $('#' + key).find('option:selected').val() + "</td>" +
                                    "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                    "</tr>";

                                isaudit = true;
                            }
                        }

                    } else if (key == "chk_landline") {

                        let test1 = $('#' + key).attr('data-oldval');
                        let test2 = "";


                        if ($('#' + key).is(':checked')) {
                            test2 = 1;
                        } else {
                            test2 = 0;
                        }


                        if (test1 != test2) {

                            str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                "<td class='summaryFldName'>Landline No Checkbox</td>";

                            str += "<td class='summaryOldVal'>" + $('#' + key).attr('data-oldval') + "</td>" +
                                "<td class='summaryNewVal'>" + test2 + "</td>" +
                                "<td class='summaryFldOldVal' style='display:none;'>" + test1 + "</td>" +
                                "<td class='summaryFldNewVal' style='display:none;'>" + test2 + "</td>" +
                                "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                "</tr>";

                            isaudit = true;
                        }

                    } else if (key == "chk_emlandno") {

                        let test1 = $('#' + key).attr('data-oldval');
                        let test2 = "";


                        if ($('#' + key).is(':checked')) {
                            test2 = 1;
                        } else {
                            test2 = 0;
                        }


                        if (test1 != test2) {

                            str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                "<td class='summaryFldName'>Emergency Landline Checkbox</td>";

                            str += "<td class='summaryOldVal'>" + $('#' + key).attr('data-oldval') + "</td>" +
                                "<td class='summaryNewVal'>" + test2 + "</td>" +
                                "<td class='summaryFldOldVal' style='display:none;'>" + test1 + "</td>" +
                                "<td class='summaryFldNewVal' style='display:none;'>" + test2 + "</td>" +
                                "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                "</tr>";

                            isaudit = true;
                        }


                    } else if (key == "hiresalary") {

                        let test1 = $("#" + key).attr('data-oldval');
                        let test2 = $("#" + key).val();


                        if (test1 != test2) {

                            str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                "<td class='summaryFldName'>" + $("#lbl_" + key).text() + "</td>";

                            str += "<td class='summaryOldVal'>" + test1 + "</td>" +
                                "<td class='summaryNewVal'>" + test2 + "</td>" +
                                "<td class='summaryFldOldVal' style='display:none;'></td>" +
                                "<td class='summaryFldNewVal' style='display:none;'></td>" +
                                "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                "</tr>";

                            isaudit = true;
                        }


                    } else {
                        //console.log(key + " - " + value + "   ***   " + formData.get(key));

                        if (formData.get(key) == "" && value == null) {
                        } else {

                            //console.log(key + " - " + $('#' + key).prop("type"));

                            if (formData.get(key) != value) {

                                //str += "<tr><td>field name</td><td>" + value + "</td><td>" + formData.get(key) + "</td><td><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td></tr>";
                                str += "<tr class='summaryRow' data-key='" + key + "'>" +
                                    "<td class='summaryFldName'>" + $("#lbl_" + key).text() + "</td>";


                                //console.log(formData.get(key) + " - " + $('#' + key).prop("type"));


                                if ($('#' + key).prop("type") == "select-one") {

                                    str += "<td class='summaryOldVal'>" + $('#' + key).attr('data-oldlabel') + "</td>" +
                                        "<td class='summaryNewVal'>" + $('#' + key).find('option:selected').attr('data-text') + "</td>" +
                                        "<td class='summaryFldOldVal' style='display:none;'>" + $('#' + key).attr('data-oldval') + "</td>" +
                                        "<td class='summaryFldNewVal' style='display:none;'>" + $('#' + key).find('option:selected').val() + "</td>" +
                                        "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                        "</tr>";

                                } else {
                                    str += "<td class='summaryOldVal'>" + value + "</td>" +
                                        "<td class='summaryNewVal'>" + formData.get(key) + "</td>" +
                                        "<td class='summaryFldOldVal' style='display:none;'></td>" +
                                        "<td class='summaryFldNewVal' style='display:none;'></td>" +
                                        "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                        "</tr>";
                                }

                                isaudit = true;
                            }


                        }
                    }
                }
            });

        }


        /*for (var [key, value] of formData.entries()) {
            //console.log(key, value);
            console.log(key + " - ");

            $.map(old_array[0], function (key, i) {

                console.log(key);

                /!*if (key == val) {

                    console.log("1");

                }*!/

            });
        }*/


        str += "</table>";


        if (isaudit == true) {
            $("#tblaudit").html(str);
            $("#auditModal").modal('show');
            pickDate();
        }

    }


    function editData() {
        var data = [];
        var results = [];
        var flag = 0;

        $(".summaryRow").each(function () {
            var summaryFldid = $(this).attr('data-key');
            var summaryFldName = $(this).find('.summaryFldName').text();

            if (summaryFldName == null || summaryFldName == undefined) {
                $(this).find('.summaryFldName').addClass('error');
                flag = 1;
                return false;
            }

            var summaryOldVal = $(this).find('.summaryOldVal').text();
            var summaryNewVal = $(this).find('.summaryNewVal').text();
            var SummaryEftDate = $(this).find('.SummaryEftDate').find('input').val();
            var summaryFldOldVal = $(this).find('.summaryFldOldVal').text();
            var summaryFldNewVal = $(this).find('.summaryFldNewVal').text();


            results.push({
                'summaryFldid': summaryFldid,
                'summaryFldName': summaryFldName,
                'summaryOldVal': summaryOldVal,
                'summaryNewVal': summaryNewVal,
                'SummaryEftDate': SummaryEftDate,
                'summaryFldNewVal': summaryFldNewVal,
                'summaryFldOldVal': summaryFldOldVal
            });
        });


        /*$.each(results, function (i, v) {
            console.log(i + " = " + v.summaryFldNewVal);
        });*/


        /*for (var [key, value] of formData.entries()) {

            let val;
            if (value instanceof File) {
                val = value.name;
            } else {
                val = value;
            }
            console.log(key + ': ' + val);

            //console.log(key + " - " + value[0] + " - " + $('#lbl_pic').html());
        }*/

        //return false;


        formData.append('results', JSON.stringify(results));


        if (flag == 0) {
            // showloader();


            if (iseditsavedraft == 1) {

                CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/addRecord_SaveDraft'); ?>', formData, 'POST', function (result) {
                    //hideloader();
                    if (result == 1) {
                        toastMsg('Success', 'Record Saved Successfully', 'success');

                        //$('#addModal').modal('hide');
                        setTimeout(function () {
                            window.location.href = '<?php echo base_url('index.php/hr_controllers/employee_entry')?>';
                            $("#ddlemptype").focus();
                        }, 500);
                    } else if (result == 4) {
                        toastMsg('Page', 'Duplicate Page URL', 'error');
                    } else if (result.indexOf('Invalid', 1) != -1) {
                        toastMsg('Invalid Field', 'Field not found', 'error');
                        console.log(result);
                    } else if (result == 3) {
                        toastMsg('Page', 'Invalid Page Name', 'error');
                    } else {
                        toastMsg('Error', 'Something went wrong', 'error');
                    }
                }, true);

                iseditsavedraft = 0;

            } else {

                CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/editRecord'); ?>', formData, 'POST', function (result) {
                    //hideloader();
                    if (result == 1) {
                        toastMsg('Success', 'Record Saved Successfully', 'success');

                        //$('#addModal').modal('hide');
                        setTimeout(function () {
                            window.location.href = '<?php echo base_url('index.php/hr_controllers/employee_entry')?>';
                            $("#ddlemptype").focus();
                        }, 500);
                    } else if (result == 4) {
                        toastMsg('Page', 'Duplicate Page URL', 'error');
                    } else if (result.indexOf('Invalid', 1) != -1) {
                        toastMsg('Invalid Field', 'Field not found', 'error');
                        console.log(result);
                    } else if (result == 3) {
                        toastMsg('Page', 'Invalid Page Name', 'error');
                    } else {
                        toastMsg('Error', 'Something went wrong', 'error');
                    }
                }, true);
            }

        } else {
            toastMsg('Error', 'Something went wrong', 'error');
        }

    }


    function editData_original() {

        $('#ddlemptype').css('border', '1px solid #babfc7');
        $('#ddlcategory').css('border', '1px solid #babfc7');
        $('#empno').css('border', '1px solid #babfc7');
        $('#empname').css('border', '1px solid #babfc7');

        //$('#qual').css('border', '1px solid #babfc7');

        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        $('#landline').css('border', '1px solid #babfc7');
        $('#cellno1').css('border', '1px solid #babfc7');
        $('#cellno2').css('border', '1px solid #babfc7');
        $('#personnme').css('border', '1px solid #babfc7');
        $('#emcellno').css('border', '1px solid #babfc7');
        $('#emlandno').css('border', '1px solid #babfc7');
        $('#resaddr').css('border', '1px solid #babfc7');
        $('#gncno').css('border', '1px solid #babfc7');
        $('#ddlband').css('border', '1px solid #babfc7');
        $('#titdesi').css('border', '1px solid #babfc7');
        $('#rehiredt').css('border', '1px solid #babfc7');
        $('#conexpiry').css('border', '1px solid #babfc7');
        $('#workproj').css('border', '1px solid #babfc7');
        $('#chargproj').css('border', '1px solid #babfc7');
        $('#ddlloc').css('border', '1px solid #babfc7');
        $('#supernme').css('border', '1px solid #babfc7');
        $('#hiresalary').css('border', '1px solid #babfc7');
        $('#ddlhardship').css('border', '1px solid #babfc7');
        $('#amount').css('border', '1px solid #babfc7');
        $('#benefits').css('border', '1px solid #babfc7');
        $('#peme').css('border', '1px solid #babfc7');
        $('#gop').css('border', '1px solid #babfc7');
        $('#gopdt').css('border', '1px solid #babfc7');
        $('#entity').css('border', '1px solid #babfc7');
        $('#dept').css('border', '1px solid #babfc7');
        $('#cardissue').css('border', '1px solid #babfc7');
        $('#letterapp').css('border', '1px solid #babfc7');
        $('#confirmation').css('border', '1px solid #babfc7');
        $('#status').css('border', '1px solid #babfc7');
        $('#remarks').css('border', '1px solid #babfc7');
        $('#pic').css('border', '1px solid #babfc7');
        $('#doc').css('border', '1px solid #babfc7');

        var iserror = false;


        // var formData = new FormData();
        var formData = new FormData($("#frm")[0]);

        var arr_pic = "";
        var arr_doc = "";
        var size = 0;
        var fnme = "";
        var imgext = "";
        var ext = "";

        var pic_path = "";
        var doc_path = "";


        if (validateData(formData)) {

            if (!checkValues()) {


                if ($("#pic").val() != "") {

                    arr_pic = $("#pic").val().split("\\");

                    size = parseInt($("#pic")[0].files[0].size / 1024);

                    fnme = $("#lbl_pic").html();
                    imgext = $("#pic")[0].files[0].name.split(".");


                    pic_path = '<?php echo base_url() ?>' + "assets/emppic/" + $('#empname').val() + "_" + $('#empno').val() + "_img." + imgext[1];


                    if (size <= 2000) {

                        if (fnme.lastIndexOf(".jpg") != -1) {

                            //var formData = new FormData();
                            //formData.append('file', $('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "." + ext[1]);


                            //var formData = new FormData($("#frm")[0]);
                            //formData.append('request', 1);

                            /*$.ajax({
                                type: 'POST',
                                url: 'employee_entry/upload',
                                data: formData,
                                success: function (status) {
                                    //var my_path = "/assets/emppic/" + status;
                                    //$("#pic").attr("src", my_path);
                                },
                                processData: false,
                                contentType: false,
                                error: function () {
                                    alert("Pic uploading error");
                                    iserror = true;
                                }
                            });*/

                        } else {
                            //$("#pic").css('border', '1px solid red');
                            //toastMsg('Pic Uploading Error', 'Please select .jpg files', 'error');

                            ShowError($("#pic"), "Please select .jpg files");
                            iserror = true;

                            //$("#lblerr_pic").html("Please select .jpg files");
                            //$("#lblerr_pic").css('visibility', 'visible');
                        }

                    } else {
                        //$("#pic").css('border', '1px solid red');
                        //toastMsg('Pic Uploading Error', 'Please select 2 MB files only', 'error');

                        ShowError($("#pic"), "Please select 2 MB files only");
                        iserror = true;

                        //$("#lblerr_pic").html("Please select 2 MB files only");
                        //$("#lblerr_pic").css('visibility', 'visible');
                    }
                }


                if ($("#doc").val() != "") {

                    arr_doc = $("#doc").val().split("\\");

                    size = parseInt($("#doc")[0].files[0].size / 1024);

                    fnme = $("#lbl_doc").html();
                    ext = $("#doc")[0].files[0].name.split(".");

                    doc_path = '<?php echo base_url() ?>' + "assets/docs/" + $('#empname').val() + "_" + $('#empno').val() + "_doc." + ext[1];


                    if (size <= 2000) {

                        if (fnme.lastIndexOf(".pdf") != -1) {


                        } else {
                            //$("#doc").css('border', '1px solid red');
                            //toastMsg('Docs Uploading Error', 'Please select .pdf files', 'error');

                            ShowError($("#doc"), "Please select .pdf files");
                            iserror = true;
                        }

                    } else {
                        //$("#doc").css('border', '1px solid red');
                        //toastMsg('Docs Uploading Error', 'Please select 2 MB files only', 'error');

                        ShowError($("#doc"), "Please select 2 MB files only");
                        iserror = true;
                    }
                }


                // formData.append('data', $("#frm")[0]);

                if ($("#pic").val() != "") {
                    formData.append('imgfile', $('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_img." + imgext[1]);
                } else {
                    formData.append('pic', $("#lbl_pic").html());
                }


                if ($("#doc").val() != "") {
                    formData.append('docfile', $('#doc')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_doc." + ext[1]);
                } else {
                    formData.append('doc', $("#lbl_doc").html());
                }


                CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/editRecord'); ?>', formData, 'POST', function (result) {
                    //hideloader();

                    if (result == 1) {
                        toastMsg('Success', 'Record Saved Successfully', 'success');

                        //$('#addModal').modal('hide');
                        setTimeout(function () {
                            window.location.href = '<?php echo base_url('index.php/hr_controllers/employee_entry') ?>';
                            $("#ddlemptype").focus();
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

            }

        }

    }


    function validateData(submitedData) {
        var flag = 0;
        var error = '';


        $('#empno').css('border', '1px solid #babfc7');
        $('#offemail').css('border', '1px solid #babfc7');
        $('#empname').css('border', '1px solid #babfc7');
        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        //$('#qual').css('border', '1px solid #babfc7');
        $('#landline').css('border', '1px solid #babfc7');
        $('#cellno1').css('border', '1px solid #babfc7');
        $('#cellno2').css('border', '1px solid #babfc7');
        $('#personnme').css('border', '1px solid #babfc7');
        $('#emcellno').css('border', '1px solid #babfc7');
        $('#emlandno').css('border', '1px solid #babfc7');
        $('#resaddr').css('border', '1px solid #babfc7');
        $('#peremail').css('border', '1px solid #babfc7');
        $('#gncno').css('border', '1px solid #babfc7');
        $('#ddlband').css('border', '1px solid #babfc7');
        $('#titdesi').css('border', '1px solid #babfc7');
        $('#rehiredt').css('border', '1px solid #babfc7');
        $('#conexpiry').css('border', '1px solid #babfc7');
        $('#workproj').css('border', '1px solid #babfc7');
        $('#chargproj').css('border', '1px solid #babfc7');
        $('#ddlloc').css('border', '1px solid #babfc7');
        $('#supernme').css('border', '1px solid #babfc7');
        $('#hiresalary').css('border', '1px solid #babfc7');
        $('#ddlhardship').css('border', '1px solid #babfc7');
        $('#amount').css('border', '1px solid #babfc7');
        $('#benefits').css('border', '1px solid #babfc7');
        $('#peme').css('border', '1px solid #babfc7');
        $('#gop').css('border', '1px solid #babfc7');
        $('#gopdt').css('border', '1px solid #babfc7');
        $('#entity').css('border', '1px solid #babfc7');
        $('#dept').css('border', '1px solid #babfc7');
        $('#cardissue').css('border', '1px solid #babfc7');
        $('#letterapp').css('border', '1px solid #babfc7');
        $('#confirmation').css('border', '1px solid #babfc7');
        $('#status').css('border', '1px solid #babfc7');
        $('#remarks').css('border', '1px solid #babfc7');
        $('#pic').css('border', '1px solid #babfc7');
        $('#doc').css('border', '1px solid #babfc7');


        $("#lblerr_" + $("#empno").attr("id")).remove();
        $("#lblerr_" + $("#offemail").attr("id")).remove();
        $("#lblerr_" + $("#empname").attr("id")).remove();
        $("#lblerr_" + $("#cnicno").attr("id")).remove();
        $("#lblerr_" + $("#dob").attr("id")).remove();
        //$("#lblerr_" + $("#qual").attr("id")).remove();
        $("#lblerr_" + $("#landline").attr("id")).remove();
        $("#lblerr_" + $("#cellno1").attr("id")).remove();
        $("#lblerr_" + $("#cellno2").attr("id")).remove();
        $("#lblerr_" + $("#personnme").attr("id")).remove();
        $("#lblerr_" + $("#emcellno").attr("id")).remove();
        $("#lblerr_" + $("#emlandno").attr("id")).remove();
        $("#lblerr_" + $("#resaddr").attr("id")).remove();
        $("#lblerr_" + $("#peremail").attr("id")).remove();
        $("#lblerr_" + $("#gncno").attr("id")).remove();
        $("#lblerr_" + $("#ddlband").attr("id")).remove();
        $("#lblerr_" + $("#titdesi").attr("id")).remove();
        $("#lblerr_" + $("#rehiredt").attr("id")).remove();
        $("#lblerr_" + $("#conexpiry").attr("id")).remove();
        $("#lblerr_" + $("#workproj").attr("id")).remove();
        $("#lblerr_" + $("#chargproj").attr("id")).remove();
        $("#lblerr_" + $("#ddlloc").attr("id")).remove();
        $("#lblerr_" + $("#supernme").attr("id")).remove();
        $("#lblerr_" + $("#hiresalary").attr("id")).remove();
        $("#lblerr_" + $("#ddlhardship").attr("id")).remove();
        $("#lblerr_" + $("#amount").attr("id")).remove();
        $("#lblerr_" + $("#benefits").attr("id")).remove();
        $("#lblerr_" + $("#peme").attr("id")).remove();
        $("#lblerr_" + $("#gop").attr("id")).remove();
        $("#lblerr_" + $("#gopdt").attr("id")).remove();
        $("#lblerr_" + $("#entity").attr("id")).remove();
        $("#lblerr_" + $("#dept").attr("id")).remove();
        $("#lblerr_" + $("#cardissue").attr("id")).remove();
        $("#lblerr_" + $("#letterapp").attr("id")).remove();
        $("#lblerr_" + $("#confirmation").attr("id")).remove();
        $("#lblerr_" + $("#status").attr("id")).remove();
        $("#lblerr_" + $("#remarks").attr("id")).remove();
        $("#lblerr_" + $("#pic").attr("id")).remove();
        $("#lblerr_" + $("#doc").attr("id")).remove();


        for (var i of submitedData.entries()) {

            if (i[0] != "remarks" && i[0] != "cellno2" && i[0] != "chk_landline" && i[0] != "chk_emrlandline") {

                if (i[0] != "pic" && i[0] != "doc") {

                    if (i[0] == "landline") {

                        var inp = $('#' + i[0]);


                        if (inp.val() == "" || inp.val() == "undefined" || inp.val() == "0" || inp.val() == "undefined" || inp.val() == "NULL" || inp.val() == "null" || inp.val() == null) {

                            $("#lblerr_landline").remove();
                            inp.after('<span id="lblerr_landline" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field</span>');
                            flag = 1;
                        }

                        if ($('.iti__selected-dial-code').text() == "") {

                            $("#lblerr_landline").remove();
                            inp.after('<span id="lblerr_landline" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field</span>');
                            flag = 1;
                        }

                    } else if (i[0] == "cellno1") {

                        var inp = $('#' + i[0]);

                        if (inp.val() == "" || inp.val() == "undefined" || inp.val() == "0" || inp.val() == "undefined" || inp.val() == "NULL" || inp.val() == "null" || inp.val() == null) {
                            $("#lblerr_cellno1").remove();
                            inp.after('<span id="lblerr_cellno1" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field</span>');
                            flag = 1;
                        }


                        if ($('.iti__selected-dial-code').text() == "") {
                            $("#lblerr_cellno1").remove();
                            inp.after('<span id="lblerr_cellno1" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field</span>');
                            flag = 1;
                        }

                    } else if (i[0] == "emcellno") {

                        var inp = $('#' + i[0]);

                        if (inp.val() == "" || inp.val() == "undefined" || inp.val() == "0" || inp.val() == "undefined" || inp.val() == "NULL" || inp.val() == "null" || inp.val() == null) {
                            $("#lblerr_emcellno").remove();
                            inp.after('<span id="lblerr_emcellno" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field</span>');
                            flag = 1;
                        }


                        if ($('.iti__selected-dial-code').text() == "") {
                            $("#lblerr_emcellno").remove();
                            inp.after('<span id="lblerr_emcellno" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field</span>');
                            flag = 1;
                        }

                    } else if (i[0] == "emlandno") {

                        var inp = $('#' + i[0]);


                        if (inp.val() == "" || inp.val() == "undefined" || inp.val() == "0" || inp.val() == "undefined" || inp.val() == "NULL" || inp.val() == "null" || inp.val() == null) {
                            $("#lblerr_emlandno").remove();
                            inp.after('<span id="lblerr_emlandno" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field</span>');
                            flag = 1;
                        }


                        if ($('.iti__selected-dial-code').text() == "") {
                            $("#lblerr_emlandno").remove();
                            inp.after('<span id="lblerr_emlandno" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field</span>');
                            flag = 1;
                        }

                    } else if (i[0] == "peremail") {

                        var inp = $('#' + i[0]);

                        if (inp.val() == "" || inp.val() == "undefined" || inp.val() == "0" || inp.val() == "undefined" || inp.val() == "NULL" || inp.val() == "null" || inp.val() == null) {
                            $("#lblerr_peremail").remove();
                            inp.after('<span id="lblerr_peremail" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field</span>');
                            flag = 1;
                        } else {

                            if (inp.val() != "") {

                                if (inp.val().indexOf('.') == -1 || inp.val().indexOf('@') == -1) {

                                    $("#lblerr_peremail").remove();
                                    inp.after('<span id="lblerr_peremail" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Invalid personal email</span>');
                                    flag = 1;

                                }
                            }
                        }

                    } else {

                        var inp = $('#' + i[0]);
                        var id = $("#" + i[0]).attr('id');
                        var inpVal = $("#" + i[0]).val();


                        var inpLabel = inp.parent('.form-group').find('.label-control').text();
                        if (inp.attr('errorText') == '' || inp.attr('errorText') == undefined) {
                            inpLabel = 'Invalid ' + inp.parent('.form-group').find('.label-control').text();
                        }

                        inp.removeClass('error').removeClass('is-invalid');
                        if (inp.attr('required')) {
                            if (inpVal == '' || inpVal == undefined || inpVal == 'undefined' || inpVal == null || inpVal == 'null' || inpVal == 0) {
                                error = '<div id="lblerr_' + id + '" class="invalid-feedback">Required field</div>';

                                $("#lblerr_" + id).remove();
                                inp.addClass('error').addClass('is-invalid').parent('div').append(error);

                                flag = 1;
                                //toastMsg('Error', 'Required field', 'error');
                                //return false;
                            }
                        }
                    }
                } else {

                    var inp = $('#lbl_' + i[0]);
                    var id = $("#" + i[0]).attr('id');
                    var inpVal = $("#lbl_" + i[0]).text();

                    //alert(inp.val() + " - " + $("#lbl_" + id).val());


                    /*var inpLabel = inp.parent('.form-group').find('.label-control').text();
                    if (inp.attr('errorText') == '' || inp.attr('errorText') == undefined) {
                        inpLabel = 'Invalid ' + inp.parent('.form-group').find('.label-control').text();
                    }*/


                    inp.removeClass('error').removeClass('is-invalid');


                    if (inpVal == '' || inpVal == 'Choose Picture' || inpVal == 'Choose Documents' || inpVal == undefined
                        || inpVal == 'undefined' || inpVal == null
                        || inpVal == 'null') {

                        $("#lblerr_" + id).remove();
                        inp.after('<span id="lblerr_' + id + '" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455;">Required field</span>');

                        flag = 1;
                        //toastMsg('Error', 'Required field', 'error');
                        //return false;

                    }

                }
            }
        }


        if (flag == 0) {
            return true;
        } else {
            toastMsg('Error', 'Data not saved', 'error');
            return false;
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


        //var re = /^[A-Za-z ]+d/;
        var re = /^[A-Za-z ]+$/;
        //var re = /^[0-9 -()+]+$/;

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
            //console.log(Date.parse(parts[1] + '/' + parts[0] + '/' + parts[2], "dd-mm-yyyy"));
            //console.log(Date.parse(start_dt1[1] + '/' + start_dt1[0] + '/' + start_dt1[2], "dd-mm-yyyy"));

            if (Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy") > Date.parse(start_dt1[1] + '-' + start_dt1[0] + '-' + start_dt1[2], "mm-dd-yyyy")) {
                ShowError($("#dob"), "Birth date cannot be greater than current date");
                iserror = true;
            }
        }


        //var re = /^[A-Za-z]+$/;
        var re = /^[0-9]+$/;
        //var re = /^[A-Za-z ]+$/;
        //var re = /^[0-9 -()+]+$/;

        if (!re.test($("#cellno1").val())) {
            ShowError($("#cellno1"), "Cell Number 1 must be numeric");
            iserror = true;
        }


        if ($("#cellno2").val() == "" && $("#cellno2").val() == null && $("#cellno2").val() == 'null' && $("#cellno2").val() == undefined && $("#cellno2").val() == 'undefined') {

            //var re = /^[A-Za-z]+$/;
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


        //var re = /^[A-Za-z]+$/;
        var re = /^[0-9]+$/;

        if (!re.test($("#emcellno").val())) {
            ShowError($("#emcellno"), "Emergency cell number must be numeric");
            iserror = true;
        }


        //var re = /^[A-Za-z]+$/;
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
            //console.log(start_dt1);


            //var start_dt = new Date().getDate().toString().split('/');
            //console.log(start_dt1[1] + '/' + start_dt1[0] + '/' + start_dt1[2], "dd-mm-yyyy");

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
            //console.log(start_dt1);

            //var start_dt = new Date().getDate().toString().split('/');
            //console.log(start_dt1[1] + '/' + start_dt1[0] + '/' + start_dt1[2], "dd-mm-yyyy");

            var parts = $("#conexpiry").val().split('-');

            if (isNaN(Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) == true) {
                ShowError($("#conexpiry"), "Invalid date");
                iserror = true;
            }
        }


        /*if ($("#chargproj").val().indexOf("_") != -1) {
            ShowError($("#chargproj"), "Charging project must be 10 digits");
            iserror = true;
        }*/


        /*var re = /^[A-Za-z ]+$/;

        if (!re.test($("#supernme").val())) {
            ShowError($("#supernme"), "Supervisor name cannot contains special characters");
            iserror = true;
        }*/


        if ($("#gopdt").val() != "") {

            var start_dt = new Date().getDate() + "-" + parseInt(new Date().getMonth() + 1) + "-" + new Date().getFullYear();
            var start_dt1 = start_dt.split('-');
            //console.log(start_dt1);


            //var start_dt = new Date().getDate().toString().split('/');
            //console.log(start_dt1[1] + '/' + start_dt1[0] + '/' + start_dt1[2], "dd-mm-yyyy");

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
            toastMsg('Error', 'Please see range issue', 'error');
        }

        return iserror;
    }

    function ShowError(id, msg) {

        id.removeClass('error').removeClass('is-invalid');
        id.removeClass('error').removeClass('is-invalid').parent('div').append("");

        var error = '<div id="lblerr_' + id.attr("id") + '" class="invalid-feedback">' + msg + '</div>';

        $("#lblerr_" + id.attr("id")).remove();
        id.addClass('error').addClass('is-invalid').parent('div').append(error);
    }

    function addData1() {

        $('#ddlemptype').css('border', '1px solid #babfc7');
        $('#ddlcategory').css('border', '1px solid #babfc7');
        $('#empno').css('border', '1px solid #babfc7');
        $('#empname').css('border', '1px solid #babfc7');
        //$('#qual').css('border', '1px solid #babfc7');
        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        $('#landline').css('border', '1px solid #babfc7');
        $('#cellno1').css('border', '1px solid #babfc7');
        $('#cellno2').css('border', '1px solid #babfc7');
        $('#personnme').css('border', '1px solid #babfc7');
        $('#emcellno').css('border', '1px solid #babfc7');
        $('#emlandno').css('border', '1px solid #babfc7');
        $('#resaddr').css('border', '1px solid #babfc7');
        $('#gncno').css('border', '1px solid #babfc7');
        $('#ddlband').css('border', '1px solid #babfc7');
        $('#titdesi').css('border', '1px solid #babfc7');
        $('#rehiredt').css('border', '1px solid #babfc7');
        $('#conexpiry').css('border', '1px solid #babfc7');
        $('#workproj').css('border', '1px solid #babfc7');
        $('#chargproj').css('border', '1px solid #babfc7');
        $('#ddlloc').css('border', '1px solid #babfc7');
        $('#supernme').css('border', '1px solid #babfc7');
        $('#hiresalary').css('border', '1px solid #babfc7');
        $('#ddlhardship').css('border', '1px solid #babfc7');
        $('#amount').css('border', '1px solid #babfc7');
        $('#benefits').css('border', '1px solid #babfc7');
        $('#peme').css('border', '1px solid #babfc7');
        $('#gop').css('border', '1px solid #babfc7');
        $('#gopdt').css('border', '1px solid #babfc7');
        $('#cardissue').css('border', '1px solid #babfc7');
        $('#letterapp').css('border', '1px solid #babfc7');
        $('#confirmation').css('border', '1px solid #babfc7');
        $('#status').css('border', '1px solid #babfc7');
        $('#remarks').css('border', '1px solid #babfc7');
        $('#pic').css('border', '1px solid #babfc7');
        $('#doc').css('border', '1px solid #babfc7');

        /*var data = {};

        data['ddlemptype'] = $("#ddlemptype").val();
        data['ddlcategory'] = $("#ddlcategory").val();
        data['empno'] = $("#empno").val();
        data['empname'] = $("#empname").val();
        data['cnicno'] = $("#cnicno").val();
        data['dob'] = $("#dob").val();
        data['qual'] = $("#qual").val();
        data['landline'] = $("#landline").val();
        data['cellno1'] = $("#cellno1").val();
        data['cellno2'] = $("#cellno2").val();
        data['personnme'] = $("#personnme").val();
        data['emcellno'] = $("#emcellno").val();
        data['emlandno'] = $("#emlandno").val();
        data['resaddr'] = $("#resaddr").val();
        data['gncno'] = $("#gncno").val();
        data['ddlband'] = $("#ddlband").val();
        data['titdesi'] = $("#titdesi").val();
        data['rehiredt'] = $("#rehiredt").val();
        data['conexpiry'] = $("#conexpiry").val();
        data['workproj'] = $("#workproj").val();
        data['chargproj'] = $("#chargproj").val();
        data['ddlloc'] = $("#ddlloc").val();
        data['supernme'] = $("#supernme").val();
        data['hiresalary'] = $("#hiresalary").val();
        data['ddlhardship'] = $("#ddlhardship").val();
        data['amount'] = $("#amount").val();
        data['benefits'] = $("#benefits").val();
        data['peme'] = $("#peme").val();
        data['gop'] = $("#gop").val();
        data['gopdt'] = $("#gopdt").val();
        data['cardissue'] = $("#cardissue").val();
        data['letterapp'] = $("#letterapp").val();
        data['confirmation'] = $("#confirmation").val();
        data['status'] = $("#status").val();
        data['remarks'] = $("#remarks").val();
        data['pic'] = $("#pic").val();
        data['doc'] = $("#doc").val();*/


        var iserror = false;


        if ($("#ddlemptype").val() == 0) {
            $('#ddlemptype').css('border', '1px solid red');
            toastMsg('', 'Please select employee type', 'error');
            iserror = true;
            return false;
        }

        if ($("#ddlcategory").val() == 0) {
            $('#ddlcategory').css('border', '1px solid red');
            toastMsg('', 'Please select category', 'error');
            iserror = true;
            return false;
        }


        if ($("#empno").val() == "") {
            $('#empno').css('border', '1px solid red');
            toastMsg('', 'Please enter employee no', 'error');
            iserror = true;
            return false;
        }


        if ($("#empno").val() != "") {
            if ($("#empno").val().length <= 0) {
                $('#empno').css('border', '1px solid red');
                toastMsg('', 'Employee No must be greater than 0', 'error');
                iserror = true;
                return false;
            }


            if ($("#empno").val().length != 6) {
                $('#empno').css('border', '1px solid red');
                toastMsg('', 'Employee No must be 6 digits', 'error');
                iserror = true;
                return false;
            }


            var re = /^[A-Za-z]+$/;

            if (re.test($("#empno").val())) {
                $('#empno').css('border', '1px solid red');
                toastMsg('', 'Employee Number must be numeric', 'error');
                iserror = true;
                return false;
            } else {
                if ($("#empno").val().length < 6) {
                    $('#empno').css('border', '1px solid red');
                    toastMsg('', 'Employee Number must be 6 digits', 'error');
                    iserror = true;
                    return false;
                }
            }
        }


        if ($("#empname").val() == "") {
            $('#empname').css('border', '1px solid red');
            toastMsg('', 'Please enter employee name', 'error');
            iserror = true;
            return false;
        }


        if ($("#empname").val() != "") {

            //var re = /^[A-Za-z ]+d/;
            var re = /^[A-Za-z ]+$/;
            //var re = /^[0-9 -()+]+$/;


            if (!re.test($("#empname").val())) {
                $('#empname').css('border', '1px solid red');
                toastMsg('', 'Employee name must be string', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#cnicno").val() == "") {
            $('#cnicno').css('border', '1px solid red');
            toastMsg('', 'Please enter CNIC number', 'error');
            iserror = true;
            return false;
        }


        if ($("#cnicno").val() != "") {

            if ($("#cnicno").val().indexOf("_") != -1) {
                $('#cnicno').css('border', '1px solid red');
                toastMsg('', 'CNIC must be 13 digits', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#dob").val() == "") {
            $('#dob').css('border', '1px solid red');
            toastMsg('', 'Please enter date of birth', 'error');
            iserror = true;
            return false;
        }


        if ($("#dob").val() != "") {

            var start_dt = new Date().getDate() + "-" + parseInt(new Date().getMonth() + 1) + "-" + new Date().getFullYear();
            var start_dt1 = start_dt.split('-');

            var parts = $("#dob").val().split('-');


            if (isNaN(Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) == true) {
                $("#dob").css('border', '1px solid red');
                toastMsg('Date of birth', 'Invalid date', 'error');
                iserror = true;
                return false;

            } else {

                var end_dt = parts[1] + '-' + parts[0] + '-' + parts[2];
                //console.log(Date.parse(parts[1] + '/' + parts[0] + '/' + parts[2], "dd-mm-yyyy"));
                //console.log(Date.parse(start_dt1[1] + '/' + start_dt1[0] + '/' + start_dt1[2], "dd-mm-yyyy"));

                if (Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy") > Date.parse(start_dt1[1] + '-' + start_dt1[0] + '-' + start_dt1[2], "mm-dd-yyyy")) {
                    $("#dob").css('border', '1px solid red');
                    toastMsg('', 'Birth date cannot be greater than current date', 'error');
                    iserror = true;
                    return false;

                }
            }

        }


        if ($("#qual").val() == 0) {
            $('#qual').css('border', '1px solid red');
            toastMsg('', 'Please select qualification', 'error');
            iserror = true;
            return false;
        }


        if ($("#landline").val() == "") {
            $('#landline').css('border', '1px solid red');
            toastMsg('', 'Please enter landline number', 'error');
            iserror = true;
            return false;
        }


        if ($("#cellno1").val() == "") {
            $('#cellno1').css('border', '1px solid red');
            toastMsg('', 'Please enter cell phone 1', 'error');
            iserror = true;
            return false;
        }


        if ($("#cellno1").val() != "") {

            var re = /^[A-Za-z]+$/;
            //var re = /^[A-Za-z ]+$/;
            //var re = /^[0-9 -()+]+$/;

            if (re.test($("#cellno1").val())) {
                $('#cellno1').css('border', '1px solid red');
                toastMsg('', 'Cell Number 1 must be numeric', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#cellno2").val() != "") {

            var re = /^[A-Za-z]+$/;

            if (re.test($("#cellno2").val())) {
                $('#cellno1').css('border', '1px solid red');
                toastMsg('', 'Cell Number 2 must be numeric', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#personnme").val() == "") {
            $('#personnme').css('border', '1px solid red');
            toastMsg('', 'Please enter person name', 'error');
            iserror = true;
            return false;
        }


        if ($("#personnme").val() != "") {

            var re = /^[A-Za-z ]+$/;

            if (!re.test($("#personnme").val())) {
                $("#personnme").css('border', '1px solid red');
                toastMsg('', 'Person name cannot contains special characters', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#emcellno").val() == "") {
            $("#emcellno").css('border', '1px solid red');
            toastMsg('', 'Please enter emergency cell number', 'error');
            iserror = true;
            return false;
        }


        if ($("#emcellno").val() != "") {

            var re = /^[A-Za-z]+$/;

            if (re.test($("#emcellno").val())) {
                $("#emcellno").css('border', '1px solid red');
                toastMsg('', 'Emergency cell number must be numeric', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#emlandno").val() == "") {
            $("#emlandno").css('border', '1px solid red');
            toastMsg('', 'Please enter emergency landline number', 'error');
            iserror = true;
            return false;
        }


        if ($("#emlandno").val() != "") {

            var re = /^[A-Za-z]+$/;

            if (re.test($("#emlandno").val())) {
                $("#emlandno").css('border', '1px solid red');
                toastMsg('', 'Person landline number must be numeric', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#resaddr").val() == "") {
            $("#resaddr").css('border', '1px solid red');
            toastMsg('', 'Please enter residential address', 'error');
            iserror = true;
            return false;
        }


        if ($("#gncno").val() == "") {
            $("#gncno").css('border', '1px solid red');
            toastMsg('', 'Please enter GNC number', 'error');
            iserror = true;
            return false;
        }


        if ($("#gncno").val() != "") {

            if ($("#gncno").val().indexOf("_") != -1) {
                $("#gncno").css('border', '1px solid red');
                toastMsg('', 'Please enter complete GNC number', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#ddlband").val() == 0) {
            $("#ddlband").css('border', '1px solid red');
            toastMsg('', 'Please select band', 'error');
            iserror = true;
            return false;
        }


        if ($("#titdesi").val() == 0) {
            $("#titdesi").css('border', '1px solid red');
            toastMsg('', 'Please enter title designation', 'error');
            iserror = true;
            return false;
        }


        if ($("#rehiredt").val() == "") {
            $("#rehiredt").css('border', '1px solid red');
            toastMsg('', 'Please enter hire / rehire date', 'error');
            iserror = true;
            return false;
        }


        if ($("#rehiredt").val() != "") {

            var start_dt = new Date().getDate() + "-" + parseInt(new Date().getMonth() + 1) + "-" + new Date().getFullYear();
            var start_dt1 = start_dt.split('-');
            //console.log(start_dt1);


            //var start_dt = new Date().getDate().toString().split('/');
            //console.log(start_dt1[1] + '/' + start_dt1[0] + '/' + start_dt1[2], "dd-mm-yyyy");

            var parts = $("#rehiredt").val().split('-');

            if (isNaN(Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) == true) {

                $("#rehiredt").css('border', '1px solid red');
                toastMsg('Rehire date', 'Invalid date', 'error');
                iserror = true;
                return false;

            } else {

                var dtdob = $("#dob").val().split('-');

                if (Date.parse(dtdob[1] + '-' + dtdob[0] + '-' + dtdob[2], "mm-dd-yyyy") > Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) {
                    $("#rehiredt").css('border', '1px solid red');
                    toastMsg('', 'Birth date cannot be greater than rehire date', 'error');
                    iserror = true;
                    return false;
                }
            }
        }


        if ($("#conexpiry").val() == "") {
            $("#conexpiry").css('border', '1px solid red');
            toastMsg('', 'Please enter contract expiry date', 'error');
            iserror = true;
            return false;
        }


        if ($("#conexpiry").val() != "") {

            var start_dt = new Date().getDate() + "-" + parseInt(new Date().getMonth() + 1) + "-" + new Date().getFullYear();
            var start_dt1 = start_dt.split('-');
            //console.log(start_dt1);


            //var start_dt = new Date().getDate().toString().split('/');
            //console.log(start_dt1[1] + '/' + start_dt1[0] + '/' + start_dt1[2], "dd-mm-yyyy");

            var parts = $("#conexpiry").val().split('-');

            if (isNaN(Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) == true) {

                $("#conexpiry").css('border', '1px solid red');
                toastMsg('Contract expiry date', 'Invalid date', 'error');
                iserror = true;
                return false;

            }

        }


        if ($("#workproj").val() == "") {
            $("#workproj").css('border', '1px solid red');
            toastMsg('', 'Please enter working project', 'error');
            iserror = true;
            return false;
        }


        if ($("#chargproj").val() == "") {
            $("#chargproj").css('border', '1px solid red');
            toastMsg('', 'Please enter charging project', 'error');
            iserror = true;
            return false;
        }


        if ($("#chargproj").val() != "") {
            if ($("#chargproj").val().indexOf("_") != -1) {
                $("#chargproj").css('border', '1px solid red');
                toastMsg('', 'Charging project must be 10 digits', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#ddlloc").val() == 0) {
            $("#ddlloc").css('border', '1px solid red');
            toastMsg('', 'Please select location', 'error');
            iserror = true;
            return false;
        }


        if ($("#supernme").val() == "") {
            $("#supernme").css('border', '1px solid red');
            toastMsg('', 'Please enter supervisor name', 'error');
            iserror = true;
            return false;
        }


        if ($("#supernme").val() != "") {

            var re = /^[A-Za-z ]+$/;

            if (!re.test($("#supernme").val())) {
                $("#supernme").css('border', '1px solid red');
                toastMsg('', 'Supervisor name cannot contains special characters', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#hiresalary").val() == "") {
            $("#hiresalary").css('border', '1px solid red');
            toastMsg('', 'Please enter hiring salary', 'error');
            iserror = true;
            return false;
        }


        if ($("#ddlhardship").val() == 0) {
            $("#ddlhardship").css('border', '1px solid red');
            toastMsg('', 'Please select hardship allowance', 'error');
            iserror = true;
            return false;
        }


        if ($("#amount").val() == "") {
            $("#amount").css('border', '1px solid red');
            toastMsg('', 'Please enter amount', 'error');
            iserror = true;
            return false;
        }


        if ($("#benefits").val() == 0) {
            $("#benefits").css('border', '1px solid red');
            toastMsg('', 'Please select benefits', 'error');
            iserror = true;
            return false;
        }


        if ($("#peme").val() == 0) {
            $("#peme").css('border', '1px solid red');
            toastMsg('', 'Please select peme', 'error');
            iserror = true;
            return false;
        }


        if ($("#gop").val() == 0) {
            $("#gop").css('border', '1px solid red');
            toastMsg('', 'Please select GOP', 'error');
            iserror = true;
            return false;
        }


        if ($("#gopdt").val() == "") {
            $("#gopdt").css('border', '1px solid red');
            toastMsg('', 'Please enter GOP Date', 'error');
            iserror = true;
            return false;
        }


        if ($("#gopdt").val() != "") {

            var start_dt = new Date().getDate() + "-" + parseInt(new Date().getMonth() + 1) + "-" + new Date().getFullYear();
            var start_dt1 = start_dt.split('-');
            //console.log(start_dt1);


            //var start_dt = new Date().getDate().toString().split('/');
            //console.log(start_dt1[1] + '/' + start_dt1[0] + '/' + start_dt1[2], "dd-mm-yyyy");

            var parts = $("#gopdt").val().split('-');

            if (isNaN(Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy")) == true) {
                $("#gopdt").css('border', '1px solid red');
                toastMsg('', 'Invalid date', 'error');
                iserror = true;
                return false;
            } else {

                var end_dt = parts[1] + '-' + parts[0] + '-' + parts[2];
                //console.log(Date.parse(parts[1] + '/' + parts[0] + '/' + parts[2], "dd-mm-yyyy"));
                //console.log(Date.parse(start_dt1[1] + '/' + start_dt1[0] + '/' + start_dt1[2], "dd-mm-yyyy"));

                if (Date.parse(parts[1] + '-' + parts[0] + '-' + parts[2], "mm-dd-yyyy") < Date.parse(start_dt1[1] + '/' + start_dt1[0] + '/' + start_dt1[2], "mm-dd-yyyy")) {
                    $("#gopdt").css('border', '1px solid red');
                    toastMsg('', 'GOP date cannot be less than current date', 'error');
                    iserror = true;
                    return false;
                }
            }
        }


        if ($("#cardissue").val() == 0) {
            $("#cardissue").css('border', '1px solid red');
            toastMsg('', 'Please select card issue', 'error');
            iserror = true;
            return false;
        }


        if ($("#letterapp").val() == 0) {
            $("#letterapp").css('border', '1px solid red');
            toastMsg('', 'Please select letter of appointment', 'error');
            iserror = true;
            return false;
        }


        if ($("#confirmation").val() == 0) {
            $("#confirmation").css('border', '1px solid red');
            toastMsg('', 'Please select confirmation', 'error');
            iserror = true;
            return false;
        }


        if ($("#status").val() == 0) {
            $("#status").css('border', '1px solid red');
            toastMsg('', 'Please select status', 'error');
            iserror = true;
            return false;
        }


        if ($("#remarks").val() != "") {

            var re = /[^\w\s]/gi;

            if (re.test($("#remarks").val())) {
                $("#remarks").css('border', '1px solid red');
                toastMsg('', 'Remarks cannot contains special characters', 'error');
                iserror = true;
                return false;
            }
        }


        if ($("#pic").val() == "") {
            $("#pic").css('border', '1px solid red');
            toastMsg('', 'Please select pic', 'error');
            iserror = true;
            return false;
        }


        if ($("#doc").val() == "") {
            $("#doc").css('border', '1px solid red');
            toastMsg('', 'Please select documents', 'error');
            iserror = true;
            return false;
        }


        // var formData = new FormData();
        var formData = new FormData($("#frm")[0]);

        var arr_pic = "";
        var arr_doc = "";
        var size = 0;
        var fnme = "";
        var imgext = "";
        var ext = "";

        var pic_path = "";
        var doc_path = "";


        if ($("#pic").val() != "") {

            arr_pic = $("#pic").val().split("\\");

            size = parseInt($("#pic")[0].files[0].size / 1024);

            fnme = $("#lbl_pic").html();
            imgext = $("#pic")[0].files[0].name.split(".");


            pic_path = '<?php echo base_url() ?>' + "assets/emppic/" + $('#empname').val() + "_" + $('#empno').val() + "_img." + imgext[1];


            if (size <= 2000) {

                if (fnme.lastIndexOf(".jpg") != -1) {

                    //var formData = new FormData();
                    //formData.append('file', $('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "." + ext[1]);


                    //var formData = new FormData($("#frm")[0]);
                    //formData.append('request', 1);

                    /*$.ajax({
                        type: 'POST',
                        url: 'employee_entry/upload',
                        data: formData,
                        success: function (status) {
                            //var my_path = "/assets/emppic/" + status;
                            //$("#pic").attr("src", my_path);
                        },
                        processData: false,
                        contentType: false,
                        error: function () {
                            alert("Pic uploading error");
                            iserror = true;
                        }
                    });*/

                } else {
                    $("#pic").css('border', '1px solid red');
                    toastMsg('Pic Uploading Error', 'Please select .jpg files', 'error');
                    //$("#lblerr_pic").html("Please select .jpg files");
                    //$("#lblerr_pic").css('visibility', 'visible');
                    iserror = true;
                }

            } else {
                $("#pic").css('border', '1px solid red');
                toastMsg('Pic Uploading Error', 'Please select 2 MB files only', 'error');
                //$("#lblerr_pic").html("Please select 2 MB files only");
                //$("#lblerr_pic").css('visibility', 'visible');
                iserror = true;
            }
        }


        if ($("#doc").val() != "") {

            arr_doc = $("#doc").val().split("\\");

            size = parseInt($("#doc")[0].files[0].size / 1024);

            fnme = $("#lbl_doc").html();
            ext = $("#doc")[0].files[0].name.split(".");

            doc_path = '<?php echo base_url() ?>' + "assets/docs/" + $('#empname').val() + "_" + $('#empno').val() + "_doc." + ext[1];


            if (size <= 2000) {

                if (fnme.lastIndexOf(".pdf") != -1) {


                } else {
                    $("#doc").css('border', '1px solid red');
                    toastMsg('Docs Uploading Error', 'Please select .pdf files', 'error');
                    iserror = true;
                }

            } else {
                $("#doc").css('border', '1px solid red');
                toastMsg('Docs Uploading Error', 'Please select 2 MB files only', 'error');
                iserror = true;
            }
        }


        if (iserror == false) {


            // formData.append('data', $("#frm")[0]);

            if ($("#pic").val() != "") {
                formData.append('imgfile', $('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_img." + imgext[1]);
            }


            if ($("#doc").val() != "") {
                formData.append('docfile', $('#doc')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_doc." + ext[1]);
            }


            CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/addRecord'); ?>', formData, 'POST', function (result) {
                //hideloader();

                if (result == 1) {
                    toastMsg('Success', 'Record Saved Successfully', 'success');

                    //$('#addModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                        $("#ddlemptype").focus();
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


        }

    }

    function addData_SaveDraft() {

        // var formData = new FormData();
        formData = new FormData($("#frm")[0]);

        var arr_pic = "";
        var arr_doc = "";
        var size = 0;
        var fnme = "";
        var imgext = "";
        var ext = "";

        var pic_path = "";
        var doc_path = "";

        var iserror = false;


        if ($("#pic").val() != "") {

            arr_pic = $("#pic").val().split("\\");

            size = parseInt($("#pic")[0].files[0].size / 1024);

            fnme = $("#lbl_pic").html();
            imgext = $("#pic")[0].files[0].name.split(".");


            pic_path = '<?php echo base_url() ?>' + "assets/emppic/" + $('#empname').val() + "_" + $('#empno').val() + "." + imgext[1];


            if (size <= 2000) {

                if (fnme.lastIndexOf(".jpg") != -1) {


                } else {
                    toastMsg('Pic Uploading Error', 'Please select .jpg files', 'error');
                    iserror = true;
                }

            } else {
                toastMsg('Pic Uploading Error', 'Please select 2 MB files only', 'error');
                iserror = true;
            }
        }


        if ($("#doc").val() != "") {

            arr_doc = $("#doc").val().split("\\");

            size = parseInt($("#doc")[0].files[0].size / 1024);

            fnme = $("#lbl_doc").html();
            ext = $("#doc")[0].files[0].name.split(".");

            doc_path = '<?php echo base_url() ?>' + "assets/docs/" + $('#empname').val() + "_" + $('#empno').val() + "." + ext[1];


            if (size <= 2000) {

                if (fnme.lastIndexOf(".pdf") != -1) {


                } else {
                    toastMsg('Docs Uploading Error', 'Please select .pdf files', 'error');
                    iserror = true;
                }

            } else {
                toastMsg('Docs Uploading Error', 'Please select 2 MB files only', 'error');
                iserror = true;
            }
        }


        if ($('#offemail').val() != ""
            && $('#offemail').val() != null
            && $('#offemail').val() != 'undefined'
            && $('#offemail').val() != undefined
            && $('#offemail').val() != 'NULL') {


            var error = '';
            var inp = $("#offemail");
            var id = $("#offemail").attr('id');


            let pos1 = 0;
            let pos2 = 0;

            let offemail = $('#offemail').val().indexOf('.', '.');
            $('#offemail').removeClass('error').removeClass('is-invalid');
            $("#lblerr_offemail").remove();


            if ($('#offemail').val().indexOf('.') != -1) {
                pos1 = $('#offemail').val().indexOf('.');
            }


            if ($('#offemail').val().indexOf('.', pos1 + 1) != -1) {
                pos2 = $('#offemail').val().indexOf('.', pos1 + 1);
            }


            if (pos2 > pos1) {
                inp.removeClass('error').removeClass('is-invalid');

                error = '<div id="lblerr_' + id + '" class="invalid-feedback">Invalid email address</div>';
                $("#lblerr_" + id).remove();
                inp.addClass('error').addClass('is-invalid').parent('div').append(error);
                $("#offemail").focus();

                iserror = true;
            }
        }


        if ($('.iti__selected-dial-code').text() != '' && $('.iti__selected-dial-code').text() != undefined
            && $('.iti__selected-dial-code').text() != 'undefined' && $('.iti__selected-dial-code').text() != null
        ) {

            var arr = $('.iti__selected-dial-code').text().split('+');
            //console.log($('.iti__selected-dial-code').text());
            //console.log(arr);
            //console.log("+" + arr[0] + "+" + arr[1] + "+" + arr[2] + "+" + arr[3] + "+" + arr[4] + "+" + arr[5]);
            //console.log($('.iti__selected-dial-code').text() + " - " + arr + " - " + arr.length);

            //console.log($('.iti__selected-dial-code').text(), arr.length);
            //console.log("+" + arr[0] + "+" + arr[1] + "+" + arr[2] + "+" + arr[3] + "+" + arr[4] + "+" + arr[5]);

            if (arr == "") {
                formData.append('landlineccode', "+92");
                formData.append('cellno1ccode', "+92");
                formData.append('cellno2ccode', "+92");
                formData.append('emcellnoccode', "+92");
                formData.append('emlandnoccode', "+92");


                if ($('#landline').val('999999999999999')) {
                    formData.append('chk_landline', "1");
                } else {
                    formData.append('chk_landline', "0");
                }


                if ($('#emlandno').val('99999999')) {
                    formData.append('chk_emlandno', "1");
                } else {
                    formData.append('chk_emlandno', "0");
                }


            } else {
                formData.append('landlineccode', "+" + arr[1]);
                formData.append('cellno1ccode', "+" + arr[2]);
                formData.append('cellno2ccode', "+" + arr[3]);
                formData.append('emcellnoccode', "+" + arr[4]);
                formData.append('emlandnoccode', "+" + arr[5]);

                if ($('#landline').val('999999999999999')) {
                    formData.append('chk_landline', "1");
                } else {
                    formData.append('chk_landline', "0");
                }


                if ($('#emlandno').val('99999999')) {
                    formData.append('chk_emlandno', "1");
                } else {
                    formData.append('chk_emlandno', "0");
                }
            }

        } else {
            formData.append('landlineccode', "+92");
            formData.append('cellno1ccode', "+92");
            formData.append('cellno2ccode', "+92");
            formData.append('emcellnoccode', "+92");
            formData.append('emlandnoccode', "+92");


            if ($('#landline').val('999999999999999')) {
                formData.append('chk_landline', "1");
            } else {
                formData.append('chk_landline', "0");
            }


            if ($('#emlandno').val('99999999')) {
                formData.append('chk_emlandno', "1");
            } else {
                formData.append('chk_emlandno', "0");
            }
        }


        if (iserror == false) {


            // formData.append('data', $("#frm")[0]);


            /*if ($("#pic").val() != "") {
                formData.append('pic', $('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_img." + imgext[1]);
                // formData['pic']=$('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "." + ext[1];
            }


            if ($("#doc").val() != "") {
                formData.append('doc', $('#doc')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_doc." + ext[1]);
            }*/


            if ($("#pic").val() != "") {
                formData.append('imgfile', $('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_img." + imgext[1]);
            } else {

                if ($("#lbl_pic").html() == "Choose Picture") {
                    formData.append('pic', "");
                } else {
                    formData.append('pic', $("#lbl_doc").html());
                }
            }


            if ($("#doc").val() != "") {
                formData.append('docfile', $('#doc')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_doc." + ext[1]);
            } else {

                if ($("#lbl_doc").html() == "Choose Documents") {
                    formData.append('doc', "");
                } else {
                    formData.append('doc', $("#lbl_doc").html());
                }
            }


            CallAjax('<?php echo base_url('index.php/hr_controllers/employee_entry/addRecord_SaveDraft'); ?>', formData, 'POST', function (result) {
                //hideloader();

                if (result == 1) {
                    toastMsg('Success', 'Record Saved Successfully', 'success');
                    //$('#addModal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                        $("#ddlemptype").focus();
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


        }

    }

</script>