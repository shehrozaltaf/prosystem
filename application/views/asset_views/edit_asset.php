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
                        <h2 class="content-header-title float-left mb-0">Edit Asset</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Asset</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <?php if (isset($asset[0]) && $asset[0] != '') {
                $a = $asset[0];
            }
            ?>

            <section class="vertical-wizard">

                <div class="bs-stepper vertical modern-verticals-wizard-example">
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
                                    <span class="bs-stepper-subtitle">Edit Employee Info</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#address-step-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Project/Location</span>
                                    <span class="bs-stepper-subtitle">Edit Project/Location</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#social-links-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">4</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Verification/Writ Off</span>
                                    <span class="bs-stepper-subtitle">Edit Verification/Writ Off</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#documents">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">5</span>
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
                                <h5 class="mb-0">Asset Details</h5>
                                <small class="text-muted">Enter Your Asset Details.</small>
                                <br>
                                <small class="text-danger">PAEDSID
                                    <span class="paeds_id">0<?php echo(isset($a->idAsset) && $a->idAsset != '' ? $a->idAsset : '') ?></span>
                                </small>
                            </div>
                            <form id="myForm">
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="pr_reqId" class="label-control">Purchase Request Id</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control numericOnly" id="pr_reqId"
                                                       name="pr_reqId"
                                                       value="<?php echo(isset($a->pr_no) && $a->pr_no != '' ? $a->pr_no : '') ?>"
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
                                                    <option value="0" label="Pl" readonly disabled></option>
                                                    <?php if (isset($category) && $category != '') {
                                                        foreach ($category as $k => $c) {
                                                            echo '<option value="' . $c->idCategory . '" 
                                                            ' . (isset($a->idCategory) && $a->idCategory == $c->idCategory ? 'selected' : '') . '>' . $c->category . '</option>';
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
                                                              rows="7" autocomplete="desc"
                                                              required><?php echo(isset($a->description) && $a->description != '' ? $a->description : '') ?></textarea>
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
                                                       value="<?php echo(isset($a->model) && $a->model != '' ? $a->model : '') ?>"
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
                                                       value="<?php echo(isset($a->product_no) && $a->product_no != '' ? $a->product_no : '') ?>"
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
                                                       value="<?php echo(isset($a->gri_no) && $a->gri_no != '' ? $a->gri_no : '') ?>"
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
                                                       value="<?php echo(isset($a->serial_no) && $a->serial_no != '' ? $a->serial_no : '') ?>"
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
                                                       name="tag_no"
                                                       value="<?php echo(isset($a->tag_no) && $a->tag_no != '' ? $a->tag_no : '') ?>"
                                                       autocomplete="tag_no" required>
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
                                                       value="<?php echo(isset($a->po_no) && $a->po_no != '' ? $a->po_no : '') ?>"
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
                                                       value="<?php echo(isset($a->cost) && $a->cost != '' ? $a->cost : '') ?>"
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
                                                    <option value="0" readonly disabled></option>
                                                    <?php if (isset($currency) && $currency != '') {
                                                        foreach ($currency as $k => $cr) {
                                                            echo '<option value="' . $cr->idCurrency . '" 
                                                            ' . (isset($a->idCurrency) && $a->idCurrency == $cr->idCurrency ? 'selected' : '') . '>' . $cr->currency . '</option>';
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
                                                            echo '<option value="' . $sp->idSop . '"
                                                            ' . (isset($a->idSourceOfPurchase) && $a->idSourceOfPurchase == $sp->idSop ? 'selected' : '') . '>' . $sp->sopName . '</option>';
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
                                <button class="btn btn-primary btn-next">
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
                                                    <option value="0" readonly disabled></option>
                                                    <?php
                                                    if (isset($employee) && $employee != '') {
                                                        foreach ($employee as $k => $e) {
                                                            echo '<option value="' . $e->empno . '" ' . (isset($a->empno) && $a->empno == $e->emp_no ? 'selected' : '') . '>(' . $e->empno . ') ' . $e->empname . ' - ' . $e->desig . '</option>';
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
                                                <label for="resp_person_name">Responsbile Person
                                                    Name <span class="requried_label">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="resp_person_name"
                                                        name="resp_person_name" autocomplete="resp_person_name"
                                                        required>
                                                    <option value="0" readonly disabled></option>
                                                    <?php
                                                    if (isset($employee) && $employee != '') {
                                                        foreach ($employee as $k => $e) {
                                                            echo '<option value="' . $e->empno . '" ' . (isset($a->resp_person_name) && $a->resp_person_name == $e->emp_no ? 'selected' : '') . '>(' . $e->empno . ') ' . $e->empname . ' - ' . $e->desig . '</option>';
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
                                                    <option value="0" readonly disabled></option>
                                                    <?php
                                                    if (isset($project) && $project != '') {
                                                        foreach ($project as $k => $v) {
                                                            echo '<option value="' . $v->proj_code . '" 
                                                            ' . (isset($a->proj_code) && $a->proj_code == $v->proj_code ? 'selected' : '') . '>(' . $v->proj_code . ') ' . $v->proj_sn . '</option>';
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
                                                       value="<?php echo(isset($a->ou) && $a->ou != '' ? $a->ou : '') ?>"
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
                                                       value="<?php echo(isset($a->account) && $a->account != '' ? $a->account : '') ?>"
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
                                                       value="<?php echo(isset($a->dept) && $a->dept != '' ? $a->dept : '') ?>"
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
                                                       value="<?php echo(isset($a->fund) && $a->fund != '' ? $a->fund : '') ?>"
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
                                                       value="<?php echo(isset($a->prog) && $a->prog != '' ? $a->prog : '') ?>"
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
                                                    <option value="0" readonly disabled></option>
                                                    <?php
                                                    if (isset($location) && $location != '') {
                                                        foreach ($location as $k => $v) {
                                                            echo '<option value="' . $v->id . '" ' . (isset($a->idLocation) && $a->idLocation == $v->id ? 'selected' : '') . '>' . $v->location . '</option>';
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
                                                <input type="hidden" id="hidden_idSubLocation"
                                                       value="<?php echo(isset($a->idSubLocation) && $a->idSubLocation != '' ? $a->idSubLocation : '') ?>">
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
                                                       value="<?php echo(isset($a->area) && $a->area != '' ? $a->area : '') ?>"
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
                                                    <?php $verification_status = array('Yes', 'No', 'Pending');
                                                    foreach ($verification_status as $ver) {
                                                        echo '<option value="' . $ver . '" ' . (isset($a->verification_status) && $a->verification_status == $ver ? 'selected' : '') . '>' . $ver . '</option>';
                                                    }
                                                    ?>
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
                                                       value="<?php echo(isset($a->last_verify_date) && $a->last_verify_date != '' ? $a->last_verify_date : '') ?>"
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
                                                       value="<?php echo(isset($a->due_date) && $a->due_date != '' ? $a->due_date : '') ?>"
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
                                                       value="<?php echo(isset($a->pur_date) && $a->pur_date != '' ? $a->pur_date : '') ?>"
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
                                                            echo '<option value="' . $s->id . '" 
                                                            ' . (isset($a->status) && $a->status == $s->id ? 'selected' : '') . ' >' . $s->status_name . '</option>';
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
                                                       name="writOff_formNo"
                                                       value="<?php echo(isset($a->writOff_formNo) && $a->writOff_formNo != '' ? $a->writOff_formNo : '') ?>"
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
                                                       name="wo_date"
                                                       value="<?php echo(isset($a->wo_date) && $a->wo_date != '' && $a->wo_date != '1970-01-01' ? $a->wo_date : '') ?>"
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
                                                          autocomplete="remarks"
                                                          required><?php echo(isset($a->remarks) && $a->remarks != '' ? $a->remarks : '') ?></textarea>
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
<input type="hidden" id="idAsset" name="idAsset"
       value="<?php echo(isset($a->idAsset) && $a->idAsset != '' ? $a->idAsset : '') ?>">
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
        changeLocation('idLocation', 'idSubLocation');
        chkStatus('');
        setTimeout(function () {
            var idSubLocation = $('#hidden_idSubLocation').val();
            $('#idSubLocation').val(idSubLocation).select2()
        }, 500);
        $(".numericOnly").ForceNumericOnly();
        // Dropzone.autoDiscover = false;
        $('#dpz-remove-thumbs').dropzone({
            url: "<?php echo base_url('index.php/asset_controllers/Assets/editData'); ?>",
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
                var idAsset = $('#idAsset').val();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('index.php/asset_controllers/Assets/deleteDoc'); ?>",
                    data: "idAsset=" + idAsset + "&file=" + name,
                    dataType: 'html',
                    success: function (res) {
                        if (res == 1) {
                            toastMsg('Success', 'File successfully deleted', 'success');
                            var _ref;
                            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                        } else if (res == 4) {
                            toastMsg('Error', 'Invalid Asset Id', 'error');
                        } else if (res == 3) {
                            toastMsg('Error', 'Invalid File', 'error');
                        } else {
                            toastMsg('Error', 'Error in deleting file', 'error');
                        }
                    }
                });
            },

            init: function () {
                var idAsset = $('#idAsset').val();
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
                    showloader();
                    $('.mybtn').addClass('hide').attr('disabled', 'disabled');
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
                                        window.location.reload();
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

                    form_data.append('idAsset', idAsset);
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
                    form_data.append('status', $('#status').val());
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
                });*/

                thisDropzone = this;
                $.get("<?php echo base_url('index.php/asset_controllers/Assets/getAssetDocs?a='); ?>" + idAsset, function (data) {
                    $.each(data, function (key, value) {
                        var mockFile = {name: value.name, size: value.size};
                        thisDropzone.displayExistingFile(mockFile, "<?php echo base_url()?>/assets/uploads/assetUploads/4195/" + value.name);
                    });
                });

            },
        });
    });

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
        var idAsset = $('#idAsset').val();
        if (idAsset != '' && idAsset != undefined) {
            dzClosure.processQueue();
            var form_data = new FormData();
            form_data.append('idAsset', idAsset);
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
            form_data.append('status', $('#status').val());
            form_data.append('writOff_formNo', $('#writOff_formNo').val());
            form_data.append('wo_date', $('#wo_date').val());
            form_data.append('remarks', $('#remarks').val());
            showloader();
            $('.mybtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/asset_controllers/Assets/editData'); ?>', form_data, 'POST', function (result) {
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
        } else {
            toastMsg('Error', 'Invalid Asset', 'error');
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


</script>