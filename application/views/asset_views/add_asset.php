<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/forms/wizard/bs-stepper.min.css">
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo base_url() ?><!--assets/vendors/css/forms/select/select2.min.css">-->
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo base_url() ?><!--assets/vendors/css/forms/wizard/bs-stepper.min.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/forms/form-validation.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/forms/form-wizard.min.css">
<!-- BEGIN: Content-->
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
                                    <span class="bs-stepper-title">Inventory Details</span>
                                    <span class="bs-stepper-subtitle">Setup Inventory Details</span>
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
                                <h5 class="mb-0">Inventory Details</h5>
                                <small class="text-muted">Enter Your Inventory Details.</small>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="pr_reqId" class="label-control">Purchase Request Id</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="pr_reqId" name="pr_reqId"
                                                       autocomplete="pr_reqId" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="idCategory" class="label-control">Equipment
                                                    Category</label>
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
                                                <label for="desc" class="label-control">Description</label>
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
                                                       autocomplete="model" required>
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
                                                       autocomplete="product_no" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="tag_no"
                                                       class="label-control">Tag
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                       id="tag_no"
                                                       name="tag_no"
                                                       autocomplete="tag_no" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="po_no"
                                                       class="label-control">PO
                                                    No.</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="po_no"
                                                       name="po_no"
                                                       autocomplete="po_no" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="cost"
                                                       class="label-control">Cost</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cost"
                                                       name="cost"
                                                       autocomplete="cost" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="idCurrency"
                                                       class="label-control">Currency</label>
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
                                                    Purchase</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="idSourceOfPurchase"
                                                        name="idSourceOfPurchase" autocomplete="idSourceOfPurchase"
                                                        required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php
                                                    if (isset($sop) && $sop != '') {
                                                        foreach ($sop as $k => $sp) {
                                                            echo '<option value="' . $sp->sopValue . '">' . $sp->sopName . '</option>';
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
                                <button class="btn btn-primary btn-prev" disabled>
                                    <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
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
                                                <label for="emp_no">Employee</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="emp_no"
                                                        name="emp_no" autocomplete="emp_no" required>
                                                    <option value="0" readonly disabled selected></option>
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
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="resp_person_name">Responsbile Person
                                                    Name</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="resp_person_name"
                                                        name="resp_person_name" autocomplete="resp_person_name"
                                                        required>
                                                    <option value="0" readonly disabled selected></option>
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
                                                <label for="proj">Project</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="proj"
                                                        name="proj" autocomplete="proj" required>
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
                                                       class="label-control">OU</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ou"
                                                       name="ou"
                                                       autocomplete="ou" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="account"
                                                       class="label-control">Account</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="account"
                                                       name="account"
                                                       autocomplete="account" required></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="dept"
                                                       class="label-control">Dept
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="dept"
                                                       name="dept"
                                                       autocomplete="dept" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="fund" class="label-control">Fund
                                                </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="fund"
                                                       name="fund"
                                                       autocomplete="fund" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="proj_code">Project</label>
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
                                                <label for="prog"
                                                       class="label-control">Prog </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="prog"
                                                       name="prog"
                                                       autocomplete="prog" required></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="idLocation">Location</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control" id="idLocation"
                                                        name="idLocation" required>
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
                                                    Location</label>
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
                                                    <option value="0" readonly disabled selected></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
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
                                                <input type="text" class="form-control mypickadat"
                                                       id="due_date" name="due_date"
                                                       autocomplete="due_date"
                                                       value="<?php echo date('d-m-Y') ?>"
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
                                                       class="label-control">Status</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control status" name="status"
                                                        autocomplete="status"
                                                        id="status" required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php if (isset($status) && $status != '') {
                                                        foreach ($status as $k => $s) {
                                                            echo '<option value="' . $s->status_value . '" ' . ($s->status_value == 'OK' ? 'selected' : '') . '>' . $s->status_name . '</option>';
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
                                                       autocomplete="writOff_formNo" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="wo_date" class="label-control">Writ
                                                    Off
                                                    Date </label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="wo_date"
                                                       name="wo_date"
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
                                                          autocomplete="remarks" required>

                                                </textarea>
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
                                                    <option value="0" readonly disabled selected></option>
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
                                <button class="btn btn-success btn-submit">Submit</button>
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
<script>
    $(document).ready(function () {
        mydate();
        tagableToggle();
        $(".numericOnly").ForceNumericOnly();
        /*  $("#product_no").ForceNumericOnly();
          $("#serial_no").ForceNumericOnly();
          $("#po_num").ForceNumericOnly();
          $("#pr_num").ForceNumericOnly();*/
    });

    function tagableToggle() {
        var tagable = $('#tagable').val();
        if (tagable == 2) {
            $('.aaftagDiv').addClass('show').removeClass('hide').find('input').attr('required', 'required');
            $('.ftagDiv').addClass('hide').removeClass('show').find('input').removeAttr('required', 'required');
        } else {
            $('.ftagDiv').addClass('show').removeClass('hide').find('input').attr('required', 'required');
            $('.aaftagDiv').addClass('hide').removeClass('show').find('input').removeAttr('required', 'required');
        }
    }

    function mydate() {
        $('.mypickadat').pickadate({
            selectYears: true,
            selectMonths: true,
            min: new Date(2019, 12, 1),
            max: true,
            format: 'dd-mm-yyyy'
        });
    }

    function insertData() {
        var data = {};
        data['Asset_type'] = $('#Asset_type').val();
        data['model'] = $('#model').val();
        data['product_no'] = $('#product_no').val();
        data['serial_no'] = $('#serial_no').val();
        data['proj_code'] = $('#proj_code').val();
        data['po_num'] = $('#po_num').val();
        data['pr_num'] = $('#pr_num').val();
        data['dor'] = $('#dor').val();
        data['dop'] = $('#dop').val();
        data['status'] = $('#status').val();
        data['tagable'] = $('#tagable').val();
        data['ftag'] = $('#ftag').val();
        data['aaftag'] = $('#aaftag').val();
        data['remarks'] = $('#remarks').val();
        var vd = validateData(data);
        if (vd) {
            showloader();
            $('.mybtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/Asset_controllers/Add_asset/insertData'); ?>', data, 'POST', function (result) {
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
    }

</script>