<style>
    .invalid-feedback {
        position: absolute;
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
                        <h2 class="content-header-title float-left mb-0">Employee Information</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="employee_entry">Employee Information</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form method="post" id="frm" enctype="multipart/form-data">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Employee Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Employee Type</span>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <select class="select2 form-control" id="ddlemptype"
                                                                        name="ddlemptype" required>
                                                                    <option value="0">Employee Type</option>

                                                                    <?php

                                                                    if (isset($employeeType) && $employeeType != '') {
                                                                        foreach ($employeeType as $v) {

                                                                            if ($v->id === $editemp[0]->ddlemptype) {
                                                                                echo '<option selected="selected" value="' . $v->id . '">' . $v->emptype . '</option>';
                                                                            } else {
                                                                                echo '<option value="' . $v->id . '">' . $v->emptype . '</option>';
                                                                            }
                                                                        }
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Category</span>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <select class="select2 form-control" id="ddlcategory"
                                                                        name="ddlcategory" required>
                                                                    <option value="0">Category</option>
                                                                    <?php
                                                                    if (isset($category) && $category != '') {
                                                                        foreach ($category as $v) {

                                                                            if ($v->id === $editemp[0]->ddlcategory) {
                                                                                echo '<option selected="selected" value="' . $v->id . '">' . $v->category . '</option>';
                                                                            } else {
                                                                                echo '<option value="' . $v->id . '">' . $v->category . '</option>';
                                                                            }
                                                                        }
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Employee ID</span>
                                                            </div>
                                                            <div class="col-md-10">

                                                                <?php if (isset($editemp[0]->empno)) { ?>

                                                                    <input type="text" id="empno" disabled="disabled"
                                                                           class="form-control" maxlength="6"
                                                                           placeholder="Employee ID" name="empno"
                                                                           onkeypress="return numeralsOnly();"
                                                                           required
                                                                           value="<?php echo($editemp[0]->empno) ?>">

                                                                <?php } else { ?>

                                                                    <input type="text" id="empno"
                                                                           class="form-control" maxlength="6"
                                                                           placeholder="Employee ID" name="empno"
                                                                           onkeypress="return numeralsOnly();"
                                                                           required
                                                                           value="<?php echo($editemp[0]->empno) ?>">

                                                                <?php } ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Full Name (Capital Letters)</span>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" id="empname"
                                                                       class="form-control" maxlength="70"
                                                                       placeholder="Full Name" name="empname"
                                                                       onkeypress="return lettersOnly_WithSpace();"
                                                                       style="text-transform: uppercase;" required
                                                                       value="<?php echo($editemp[0]->empname) ?>"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>CNIC No</span>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" id="cnicno"
                                                                       class="form-control"
                                                                       name="cnicno" required
                                                                       value="<?php echo($editemp[0]->cnicno) ?>"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Birth Date</span>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" id="dob" required
                                                                       class="form-control" name="dob"
                                                                       value="<?php echo($editemp[0]->dob) ?>">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Qualification</span>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <select class="select2 form-control" id="qual" required
                                                                        name="qual">
                                                                    <option value="0">Qualification</option>
                                                                    <?php
                                                                    if (isset($qualification) && $qualification != '') {
                                                                        foreach ($qualification as $v) {

                                                                            if ($v->id === $editemp[0]->qual) {
                                                                                echo '<option selected="selected" value="' . $v->id . '">' . $v->qualification . '</option>';
                                                                            } else {
                                                                                echo '<option value="' . $v->id . '">' . $v->qualification . '</option>';
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->

                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Contact Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Landline #</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="tel" id="landline" required
                                                                   onkeypress="return numeralsOnly();"
                                                                   class="form-control" name="landline" maxlength="15"
                                                                   value="<?php echo($editemp[0]->landlineccode . $editemp[0]->landline) ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Cell No.1</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="tel" id="cellno1" maxlength="11" required
                                                                   class="form-control" name="cellno1"
                                                                   onkeypress="return numeralsOnly();"
                                                                   value="<?php echo($editemp[0]->cellno1ccode . $editemp[0]->cellno1) ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Cell No.2</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="tel" id="cellno2" maxlength="11" required
                                                                   class="form-control" name="cellno2"
                                                                   onkeypress="return numeralsOnly();"
                                                                   value="<?php echo($editemp[0]->cellno2ccode . $editemp[0]->cellno2) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->


                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">For Emergency</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Person Name</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="personnme" maxlength="70" required
                                                                   class="form-control" name="personnme"
                                                                   style="text-transform: uppercase;"
                                                                   onkeypress="return lettersOnly_WithSpace();"
                                                                   value="<?php echo($editemp[0]->personnme) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Cell No.1</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="tel" id="emcellno" maxlength="11" required
                                                                   class="form-control" name="emcellno"
                                                                   onkeypress="return numeralsOnly();"
                                                                   value="<?php echo($editemp[0]->emcellnoccode . $editemp[0]->emcellno) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Person Landline No.</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="tel" id="emlandno" maxlength="8" required
                                                                   class="form-control" name="emlandno"
                                                                   onkeypress="return numeralsOnly();"
                                                                   value="<?php echo($editemp[0]->emlandnoccode . $editemp[0]->emlandno) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->


                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">General Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Residential Address</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="resaddr" class="form-control"
                                                                   required
                                                                   name="resaddr" maxlength="200"
                                                                   value="<?php echo($editemp[0]->resaddr) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>GNC #</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="gncno"
                                                                   class="form-control" name="gncno" required
                                                                   value="<?php echo($editemp[0]->gncno) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Band</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="select2 form-control" required
                                                                    id="ddlband" name="ddlband">
                                                                <option value="0">Band</option>
                                                                <?php
                                                                if (isset($band) && $band != '') {
                                                                    foreach ($band as $v) {

                                                                        if ($v->id === $editemp[0]->ddlband) {
                                                                            echo '<option selected="selected" value="' . $v->id . '">' . $v->band . '</option>';
                                                                        } else {
                                                                            echo '<option value="' . $v->id . '">' . $v->band . '</option>';
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Title / Designation</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="select2 form-control" required
                                                                    id="titdesi" name="titdesi">
                                                                <option value="0">Designation</option>
                                                                <?php
                                                                if (isset($designation) && $designation != '') {
                                                                    foreach ($designation as $v) {

                                                                        if ($v->id === $editemp[0]->titdesi) {
                                                                            echo '<option selected="selected" value="' . $v->id . '">' . $v->desig . '</option>';
                                                                        } else {
                                                                            echo '<option value="' . $v->id . '">' . $v->desig . '</option>';
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Hire / Rehire Date</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="rehiredt" required
                                                                   class="form-control" name="rehiredt"
                                                                   value="<?php echo($editemp[0]->rehiredt) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Contract Expiry</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="conexpiry" required
                                                                   class="form-control" name="conexpiry"
                                                                   value="<?php echo($editemp[0]->conexpiry) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Working Project</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="workproj" MaxLength="70" required
                                                                   class="form-control" name="workproj"
                                                                   value="<?php echo($editemp[0]->workproj) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Charging Project</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="chargproj" required
                                                                   class="form-control" name="chargproj"
                                                                   value="<?php echo($editemp[0]->chargproj) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Location</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="select2 form-control" required
                                                                    id="ddlloc" name="ddlloc">
                                                                <option value="0">Location</option>
                                                                <?php
                                                                if (isset($location) && $location != '') {
                                                                    foreach ($location as $v) {

                                                                        if ($v->id === $editemp[0]->ddlloc) {
                                                                            echo '<option selected="selected" value="' . $v->id . '">' . $v->location . '</option>';
                                                                        } else {
                                                                            echo '<option value="' . $v->id . '">' . $v->location . '</option>';
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Supervisor Name</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="supernme" maxlength="70" required
                                                                   class="form-control" name="supernme"
                                                                   style="text-transform: uppercase;"
                                                                   onkeypress="return lettersOnly_WithSpace();"
                                                                   value="<?php echo($editemp[0]->supernme) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Hiring Salary</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="hiresalary" maxlength="7" required
                                                                   class="form-control" name="hiresalary"
                                                                   onkeypress="return numeralsOnly();"
                                                                   value="<?php echo($editemp[0]->hiresalary) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Hardship Allowance</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select id="ddlhardship" name="ddlhardship" required
                                                                    class="form-control">
                                                                <?php if ($editemp[0]->ddlhardship === 1) {
                                                                    echo '<option value="0">Hardship Allowance</option>';
                                                                    echo '<option selected="selected" value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                } else if ($editemp[0]->ddlhardship === 2) {
                                                                    echo '<option value="0">Hardship Allowance</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option selected="selected" value="2">No</option>';
                                                                } else {
                                                                    echo '<option selected="selected" value="0">Hardship Allowance</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Amount</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="amount" MaxLength="6" required
                                                                   class="form-control" name="amount"
                                                                   onkeypress="return numeralsOnly();"
                                                                   value="<?php echo($editemp[0]->amount) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Benefits</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select id="benefits" name="benefits" required
                                                                    class="form-control">
                                                                <?php if ($editemp[0]->benefits === 1) {
                                                                    echo '<option value="0">Benefits</option>';
                                                                    echo '<option selected="selected" value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                } else if ($editemp[0]->benefits === 2) {
                                                                    echo '<option value="0">Benefits</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option selected="selected" value="2">No</option>';
                                                                } else {
                                                                    echo '<option selected="selected" value="0">Benefits</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>PEME</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select id="peme" name="peme" required
                                                                    class="form-control">
                                                                <?php if ($editemp[0]->peme === 1) {
                                                                    echo '<option value="0">PEME</option>';
                                                                    echo '<option selected="selected" value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                } else if ($editemp[0]->peme === 2) {
                                                                    echo '<option value="0">PEME</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option selected="selected" value="2">No</option>';
                                                                } else {
                                                                    echo '<option selected="selected" value="0">PEME</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>General Orientation Program</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select id="gop" name="gop" required
                                                                    class="form-control">
                                                                <?php if ($editemp[0]->gop === 1) {
                                                                    echo '<option value="0">General Orientation Program</option>';
                                                                    echo '<option selected="selected" value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                } else if ($editemp[0]->gop === 2) {
                                                                    echo '<option value="0">General Orientation Program</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option selected="selected" value="2">No</option>';
                                                                } else {
                                                                    echo '<option selected="selected" value="0">General Orientation Program</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>GOP Date</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="gopdt" required
                                                                   class="form-control" name="gopdt"
                                                                   value="<?php echo($editemp[0]->gopdt) ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Entity</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select id="entity" name="entity" required
                                                                    class="form-control">
                                                                <?php if ($editemp[0]->entity === 1) {
                                                                    echo '<option value="0">Entity</option>';
                                                                    echo '<option selected="selected" value="1">IDRL</option>';
                                                                    echo '<option value="2">NRL</option>';
                                                                    echo '<option value="3">DMU</option>';
                                                                    echo '<option value="4">Admin Project Management</option>';
                                                                } else if ($editemp[0]->entity === 2) {
                                                                    echo '<option value="0">Entity</option>';
                                                                    echo '<option value="1">IDRL</option>';
                                                                    echo '<option selected="selected" value="2">NRL</option>';
                                                                    echo '<option value="3">DMU</option>';
                                                                    echo '<option value="4">Admin Project Management</option>';
                                                                } else if ($editemp[0]->entity === 3) {
                                                                    echo '<option value="0">Entity</option>';
                                                                    echo '<option value="1">IDRL</option>';
                                                                    echo '<option value="2">NRL</option>';
                                                                    echo '<option selected="selected" value="3">DMU</option>';
                                                                    echo '<option value="4">Admin Project Management</option>';
                                                                } else if ($editemp[0]->entity === 4) {
                                                                    echo '<option value="0">Entity</option>';
                                                                    echo '<option value="1">IDRL</option>';
                                                                    echo '<option value="2">NRL</option>';
                                                                    echo '<option value="3">DMU</option>';
                                                                    echo '<option selected="selected" value="4">Admin Project Management</option>';
                                                                } else {
                                                                    echo '<option selected="selected" value="0">Entity</option>';
                                                                    echo '<option value="1">IDRL</option>';
                                                                    echo '<option value="2">NRL</option>';
                                                                    echo '<option value="3">DMU</option>';
                                                                    echo '<option value="4">Admin Project Management</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Department</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select id="dept" name="dept" required
                                                                    class="form-control">
                                                                <?php if ($editemp[0]->dept === 1) {
                                                                    echo '<option value="0">Department</option>';
                                                                    echo '<option selected="selected" value="1">Paeds</option>';
                                                                    echo '<option value="2">Obgyn</option>';
                                                                    echo '<option value="3">COE</option>';
                                                                    echo '<option value="4">IGHD</option>';
                                                                } else if ($editemp[0]->dept === 2) {
                                                                    echo '<option value="0">Department</option>';
                                                                    echo '<option value="1">Paeds</option>';
                                                                    echo '<option selected="selected" value="2">Obgyn</option>';
                                                                    echo '<option value="3">COE</option>';
                                                                    echo '<option value="4">IGHD</option>';
                                                                } else if ($editemp[0]->dept === 3) {
                                                                    echo '<option value="0">Department</option>';
                                                                    echo '<option value="1">Paeds</option>';
                                                                    echo '<option value="2">Obgyn</option>';
                                                                    echo '<option selected="selected" value="3">COE</option>';
                                                                    echo '<option value="4">IGHD</option>';
                                                                } else if ($editemp[0]->dept === 4) {
                                                                    echo '<option value="0">Department</option>';
                                                                    echo '<option value="1">Paeds</option>';
                                                                    echo '<option value="2">Obgyn</option>';
                                                                    echo '<option value="3">COE</option>';
                                                                    echo '<option selected="selected" value="4">IGHD</option>';
                                                                } else {
                                                                    echo '<option selected="selected" value="0">Department</option>';
                                                                    echo '<option value="1">Paeds</option>';
                                                                    echo '<option value="2">Obgyn</option>';
                                                                    echo '<option value="3">COE</option>';
                                                                    echo '<option value="4">IGHD</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>ID Card Issued</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select id="cardissue" name="cardissue" required
                                                                    class="form-control">
                                                                <?php if ($editemp[0]->cardissue === 1) {
                                                                    echo '<option value="0">ID Card Issued</option>';
                                                                    echo '<option selected="selected" value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                } else if ($editemp[0]->cardissue === 2) {
                                                                    echo '<option value="0">ID Card Issued</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option selected="selected" value="2">No</option>';
                                                                } else {
                                                                    echo '<option selected="selected" value="0">ID Card Issued</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Letter Of Appointment Received</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select id="letterapp" name="letterapp" required
                                                                    class="form-control">
                                                                <?php if ($editemp[0]->letterapp === 1) {
                                                                    echo '<option value="0">Letter Of Appointment Received';
                                                                    echo '<option selected="selected" value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                } else if ($editemp[0]->letterapp === 2) {
                                                                    echo '<option value="0">Letter Of Appointment Received';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option selected="selected" value="2">No</option>';
                                                                } else {
                                                                    echo '<option selected="selected" value="0">Letter Of Appointment Received';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                }
                                                                ?>
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Confirmation</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select id="confirmation" name="confirmation" required
                                                                    class="form-control">
                                                                <?php if ($editemp[0]->confirmation === 1) {
                                                                    echo '<option value="0">Confirmation</option>';
                                                                    echo '<option selected="selected" value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                } else if ($editemp[0]->confirmation === 2) {
                                                                    echo '<option value="0">Confirmation</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option selected="selected" value="2">No</option>';
                                                                } else {
                                                                    echo '<option selected="selected" value="0">Confirmation</option>';
                                                                    echo '<option value="1">Yes</option>';
                                                                    echo '<option value="2">No</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Status</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select id="status" name="status" required
                                                                    class="form-control">
                                                                <?php if ($editemp[0]->status === 1) {
                                                                    echo '<option value="0">Status</option>';
                                                                    echo '<option selected="selected" value="1">Active</option>';
                                                                    echo '<option value="2">InActive</option>';
                                                                } else if ($editemp[0]->status === 2) {
                                                                    echo '<option value="0">Status</option>';
                                                                    echo '<option value="1">Active</option>';
                                                                    echo '<option selected="selected" value="2">InActive</option>';
                                                                } else {
                                                                    echo '<option selected="selected" value="0">Status</option>';
                                                                    echo '<option value="1">Active</option>';
                                                                    echo '<option value="2">InActive</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Remarks</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <textarea id="remarks" rows="5" required
                                                                      class="form-control" name="remarks"
                                                                      placeholder="Remarks"
                                                            ><?php echo($editemp[0]->remarks) ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Upload Pic</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="file" class="custom-file-input" required
                                                                   id="pic" name="pic" accept="image/jpeg">

                                                            <?php if (isset($editemp[0]->pic)) {
                                                                echo '<label class="custom-file-label" id="lbl_pic" name="lbl_pic"
                                                                   for="inputGroupFile01">' . $editemp[0]->pic . '</label>';
                                                            } else {
                                                                echo '<label class="custom-file-label" id="lbl_pic" name="lbl_pic"
                                                                   for="inputGroupFile01">Choose Pic</label>';
                                                            }
                                                            ?>


                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span>Upload Docs</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="file" class="custom-file-input" required
                                                                   id="doc" name="doc" accept="application/pdf">

                                                            <?php if (isset($editemp[0]->doc)) {

                                                                echo '<label class="custom-file-label" id="lbl_doc" name="lbl_doc"
                                                                   for="inputGroupFile01">' . $editemp[0]->doc . '</label>';

                                                            } else {
                                                                echo '<label class="custom-file-label" id="lbl_doc" name="lbl_doc"
                                                                   for="inputGroupFile01">Choose PDF</label>';
                                                            }

                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 offset-md-12">
                                                    <button type="button" class="btn btn-primary mr-1 mb-1"
                                                            onclick="addData_SaveDraft();">Save Draft
                                                    </button>

                                                    <?php

                                                    if (isset($editemp[0]->id)) {
                                                        $_SESSION['id'] = $editemp[0]->id;
                                                        ?>

                                                        <button type="button" onclick="showSummary();"
                                                                class="btn btn-primary mr-1 mb-1">Update
                                                        </button>

                                                    <?php } else { ?>

                                                        <button type="button" onclick="addData();"
                                                                class="btn btn-primary mr-1 mb-1">Save
                                                        </button>

                                                    <?php } ?>

                                                    <button id="cmdCancel" name="cmdCancel" type="button"
                                                            class="btn btn-outline-warning mr-1 mb-1">Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- // Basic Horizontal form layout section end -->
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="auditModal" tabindex="-1" role="dialog" aria-labelledby="auditModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="auditModalLabel">Summary of Changes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="tblaudit"></span>
            </div>
            <div class="modal-footer">
                <button id="cmdconfirm" type="button" class="btn grey btn-primary" onclick="editData();"
                        data-dismiss="modal">Confirm
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--<div class="modal fade text-left" id="auditModal" tabindex="-1" role="dialog" aria-labelledby="auditModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title white" id="auditModalLabel">Audit Trial Data</h5>
            </div>
            <div class="modal-body ">
                <span id="tblaudit"></span>
            </div>
            <div class="modal-footer">
                <button id="cmdconfirm" type="button" class="btn grey btn-primary" onclick="editData();"
                        data-dismiss="modal">Confirm
                </button>
                <button type="button" class="btn grey btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>-->

<!-- END: Content-->

<script>

    var formData;

    $(document).on("blur", "#amount", function (e) {
        if ($("#amount").val() == "") {
        } else {
            $("#amount").val(parseFloat($("#amount").val(), 6).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        }
    });


    $(document).on("blur", "#hiresalary", function (e) {
        if ($("#hiresalary").val() == "") {
        } else {
            $("#hiresalary").val(parseFloat($("#hiresalary").val(), 6).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        }
    });

    $(document).on("change", "#pic", function () {
        $('#lbl_pic').html($('#pic')[0].files[0].name);
    });


    $(document).on("change", "#doc", function () {
        $('#lbl_doc').html($('#doc')[0].files[0].name);
    });


    $(document).on("click", "#cmdCancel", function () {
        window.location.href = '<?php echo base_url('index.php/employee_entry'); ?>';
    });


    $(document).ready(function () {

        $("#cnicno").inputmask("99999-9999999-9");
        $("#dob").inputmask("99-99-9999");
        //$("#landline").inputmask("999-999-99999999");
        $("#gncno").inputmask("9999/9999");
        $("#rehiredt").inputmask("99-99-9999");
        $("#conexpiry").inputmask("99-99-9999");
        $("#chargproj").inputmask("AAAAA-9999");
        $("#gopdt").inputmask("99-99-9999");

        setPhone("#landline");
        setPhone("#cellno1");
        setPhone("#cellno2");
        setPhone("#emcellno");
        setPhone("#emlandno");

    });


    function setPhone(phone) {

        var input = document.querySelector(phone);
        window.intlTelInput(input, {
            allowDropdown: true,
            autoHideDialCode: false,
            //autoPlaceholder: "off",
            //dropdownContainer: document.body,
            //excludeCountries: ["us"],
            //formatOnDisplay: true,
            //geoIpLookup: function (callback) {
            //    $.get("http://ipinfo.io", function () {
            //    }, "jsonp").always(function (resp) {
            //        var countryCode = (resp && resp.country) ? resp.country : "";
            //        callback(countryCode);
            //    });
            //},
            //hiddenInput: "full_number",
            //initialCountry: "auto",
            localizedCountries: {'de': 'Deutschland'},
            //nationalMode: true,
            //onlyCountries: ['pk', 'gb', 'ch', 'ca', 'do'],
            placeholderNumberType: "MOBILE",
            preferredCountries: ['pk', 'jp'],
            separateDialCode: true
        });

        input.addEventListener("countrychange", function () {
            // do something with iti.getSelectedCountryData()
            //alert($('.iti__selected-dial-code').text());
        });

        input.addEventListener("open:countrydropdown", function () {
            // triggered when the user opens the dropdown
        });

        input.addEventListener("close:countrydropdown", function () {
            // triggered when the user closes the dropdown
        });

    }

    function lettersOnly_WithSpace(evt) {
        evt = (evt) ? evt : event;
        var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));

        if (charCode > 31 && (charCode < 65 || charCode > 90) &&
            (charCode < 97 || charCode > 122) && charCode != 32) {
            alert("Please enter string value ");
            return false;
        }
        return true;
    }


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


    function getEmpType_Ajax() {
        CallAjax('<?php echo base_url('index.php/Employee_entry/getEmpType'); ?>', {}, 'POST', function (result) {
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
        $('#qual').css('border', '1px solid #babfc7');
        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        $('#qual').css('border', '1px solid #babfc7');
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
                }


                if ($("#doc").val() != "") {
                    formData.append('docfile', $('#doc')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_doc." + ext[1]);
                }


                var arr = $('.iti__selected-dial-code').text().split('+');
                //console.log(arr[0] + "=" + arr[1] + "=" + arr[2] + "=" + arr[3] + "=" + arr[4] + "=" + arr[5]);

                formData.append('landlineccode', "+" + arr[1]);
                formData.append('cellno1ccode', "+" + arr[2]);
                formData.append('cellno2ccode', "+" + arr[3]);
                formData.append('emcellnoccode', "+" + arr[4]);
                formData.append('emlandnoccode', "+" + arr[5]);


                CallAjax('<?php echo base_url('index.php/employee_entry/addRecord'); ?>', formData, 'POST', function (result) {
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

    }


    function showSummary() {

        $('#ddlemptype').css('border', '1px solid #babfc7');
        $('#ddlcategory').css('border', '1px solid #babfc7');
        $('#empno').css('border', '1px solid #babfc7');
        $('#empname').css('border', '1px solid #babfc7');
        $('#qual').css('border', '1px solid #babfc7');
        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        $('#qual').css('border', '1px solid #babfc7');
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


        var old_array = <?php echo json_encode($editemp); ?>;


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


                var arr = $('.iti__selected-dial-code').text().split('+');
                //console.log("+" + arr[0] + "+" arr[1] + "+" + arr[2] + "+" + arr[3] + "+" + arr[4] + "+" + arr[5]);

                formData.append('landlineccode', "+" + arr[1]);
                formData.append('cellno1ccode', "+" + arr[2]);
                formData.append('cellno2ccode', "+" + arr[3]);
                formData.append('emcellnoccode', "+" + arr[4]);
                formData.append('emlandnoccode', "+" + arr[5]);


                var str = "<table width='100%'><tr><th width='30%'>Field Name</th><th width='35%'>Previous Value</th><th width='35%'>Current Value</th><th width='30%'>Effec Date</th></tr>";


                if (formData.get("ddlemptype") != old_array[0].ddlemptype) {

                    if (old_array[0].ddlemptype == "0") {
                        str += "<tr><td>Employee Type</td><td>Employee Type</td><td></td>";
                    } else if (old_array[0].ddlemptype == "1") {
                        str += "<tr><td>Employee Type</td><td>Payroll</td><td><input type='text' /></td>";
                    } else if (old_array[0].ddlemptype == "2") {
                        str += "<tr><td>Employee Type</td><td>Service Contract</td>";
                    } else if (old_array[0].ddlemptype == "3") {
                        str += "<tr><td>Employee Type</td><td>Consultancy Contract</td>";
                    }

                    if (formData.get("ddlemptype") == "0") {
                        str += "<td>Employee Type</td>";
                    } else if (formData.get("ddlemptype") == "1") {
                        str += "<td>Payroll</td>";
                    } else if (formData.get("ddlemptype") == "2") {
                        str += "<td>Service Contract</td>";
                    } else if (formData.get("ddlemptype") == "3") {
                        str += "<td>Consultancy Contract</td>";
                    }

                    str += "</tr>";

                    isaudit = true;
                }


                if (formData.get("ddlcategory") != old_array[0].ddlcategory) {

                    if (old_array[0].ddlcategory == "0") {
                        str += "<tr><td>Category</td><td>Category</td>";
                    } else if (old_array[0].ddlcategory == "1") {
                        str += "<tr><td>Category</td><td>Academic</td>";
                    } else if (old_array[0].ddlemptype == "2") {
                        str += "<tr><td>Category</td><td>Administration</td>";
                    } else if (old_array[0].ddlemptype == "3") {
                        str += "<tr><td>Category</td><td>Allied Health</td>";
                    }

                    if (formData.get("ddlcategory") == "0") {
                        str += "<td>Category</td>";
                    } else if (formData.get("ddlcategory") == "1") {
                        str += "<td>Academic</td>";
                    } else if (formData.get("ddlcategory") == "2") {
                        str += "<td>Administration</td>";
                    } else if (formData.get("ddlcategory") == "3") {
                        str += "<td>Allied Health</td>";
                    }

                    str += "</tr>";

                    isaudit = true;
                }


                if (formData.get("empname") != old_array[0].empname) {
                    str += "<tr><td>Employee Name</td><td>" + old_array[0].empname + "</td><td>" + formData.get("empname") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("cnicno") != old_array[0].cnicno) {
                    str += "<tr><td>CNIC No</td><td>" + old_array[0].cnicno + "</td><td>" + formData.get("cnicno") + "</td></tr>";
                    isaudit = true;
                }

                if (formData.get("dob") != old_array[0].dob) {
                    str += "<tr><td>Birth Date</td><td>" + old_array[0].dob + "</td><td>" + formData.get("dob") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("qual") != old_array[0].qual) {

                    if (old_array[0].qual == "0") {
                        str += "<tr><td>Qualification</td><td>Qualification</td>";
                    } else if (old_array[0].qual == "1") {
                        str += "<tr><td>MATRIC</td><td>MATRIC</td>";
                    } else if (old_array[0].qual == "2") {
                        str += "<tr><td>INTERMEDIATE</td><td>INTERMEDIATE</td>";
                    } else if (old_array[0].qual == "3") {
                        str += "<tr><td>BACHELOR OF ARTS</td><td>BACHELOR OF ARTS</td>";
                    } else if (old_array[0].qual == "4") {
                        str += "<tr><td>BACHELOR OF SCIENCE</td><td>BACHELOR OF SCIENCE</td>";
                    } else if (old_array[0].qual == "5") {
                        str += "<tr><td>BACHELOR OF COMMERCE</td><td>BACHELOR OF COMMERCE</td>";
                    }

                    if (formData.get("qual") == "0") {
                        str += "<td>Qualification</td>";
                    } else if (formData.get("qual") == "1") {
                        str += "<td>MATRIC</td>";
                    } else if (formData.get("qual") == "2") {
                        str += "<td>INTERMEDIATE</td>";
                    } else if (formData.get("qual") == "3") {
                        str += "<td>BACHELOR OF ARTS</td>";
                    } else if (formData.get("qual") == "4") {
                        str += "<td>BACHELOR OF SCIENCE</td>";
                    } else if (formData.get("qual") == "5") {
                        str += "<td>BACHELOR OF COMMERCE</td>";
                    }

                    str += "</tr>";

                    isaudit = true;
                }


                if (formData.get("landlineccode") != old_array[0].landlineccode) {
                    str += "<tr><td>Country Code Landline</td><td>" + old_array[0].landlineccode + "</td><td>" + formData.get("landlineccode") + "</td></tr>";
                    isaudit = true;
                }

                if (formData.get("landline") != old_array[0].landline) {
                    str += "<tr><td>Landline No</td><td>" + old_array[0].landline + "</td><td>" + formData.get("landline") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("cellno1ccode") != old_array[0].cellno1ccode) {
                    str += "<tr><td>Country Code Cell1</td><td>" + old_array[0].cellno1ccode + "</td><td>" + formData.get("cellno1ccode") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("cellno1") != old_array[0].cellno1) {
                    str += "<tr><td>Cell No. 1</td><td>" + old_array[0].cellno1 + "</td><td>" + formData.get("cellno1") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("cellno2ccode") != old_array[0].cellno2ccode) {
                    str += "<tr><td>Country Code Cell2</td><td>" + old_array[0].cellno2ccode + "</td><td>" + formData.get("cellno2ccode") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("cellno2") != old_array[0].cellno2) {

                    if (formData.get("cellno2") != "" && old_array[0].cellno2 != null) {
                        str += "<tr><td>Cell No. 2</td><td>" + old_array[0].cellno2 + "</td><td>" + formData.get("cellno2") + "</td></tr>";
                        isaudit = true;
                    }
                }

                if (formData.get("personnme") != old_array[0].personnme) {
                    str += "<tr><td>Person Name</td><td>" + old_array[0].personnme + "</td><td>" + formData.get("personnme") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("emcellnoccode") != old_array[0].emcellnoccode) {
                    str += "<tr><td>Country Code Emergency Cell</td><td>" + old_array[0].emcellnoccode + "</td><td>" + formData.get("emcellnoccode") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("emcellno") != old_array[0].emcellno) {
                    str += "<tr><td>Person Name (For Emergency)</td><td>" + old_array[0].emcellno + "</td><td>" + formData.get("emcellno") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("emlandnoccode") != old_array[0].emlandnoccode) {
                    str += "<tr><td>Country Code Emergency Landline</td><td>" + old_array[0].emlandnoccode + "</td><td>" + formData.get("emlandnoccode") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("emlandno") != old_array[0].emlandno) {
                    str += "<tr><td>Person</td><td>" + old_array[0].emlandno + "</td><td>" + formData.get("emlandno") + "</td></tr>";
                    isaudit = true;
                }

                if (formData.get("resaddr") != old_array[0].resaddr) {
                    str += "<tr><td>Residential Address</td><td>" + old_array[0].resaddr + "</td><td>" + formData.get("resaddr") + "</td></tr>";
                    isaudit = true;
                }

                if (formData.get("gncno") != old_array[0].gncno) {
                    str += "<tr><td>GNC No</td><td>" + old_array[0].gncno + "</td><td>" + formData.get("gncno") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("ddlband") != old_array[0].ddlband) {

                    if (old_array[0].ddlband == "0") {
                        str += "<tr><td>Band</td><td>Band</td>";
                    } else if (old_array[0].ddlband == "1") {
                        str += "<tr><td>AD1</td><td>AD1</td>";
                    } else if (old_array[0].ddlband == "2") {
                        str += "<tr><td>AD2</td><td>AD2</td>";
                    } else if (old_array[0].ddlband == "3") {
                        str += "<tr><td>AD3</td><td>AD3</td>";
                    } else if (old_array[0].ddlband == "4") {
                        str += "<tr><td>AD4</td><td>AD4</td>";
                    } else if (old_array[0].ddlband == "5") {
                        str += "<tr><td>AD5</td><td>AD5</td>";
                    } else if (old_array[0].ddlband == "6") {
                        str += "<tr><td>AD6</td><td>AD6</td>";
                    } else if (old_array[0].ddlband == "7") {
                        str += "<tr><td>AD7</td><td>AD7</td>";
                    } else if (old_array[0].ddlband == "8") {
                        str += "<tr><td>AD8</td><td>AD8</td>";
                    } else if (old_array[0].ddlband == "9") {
                        str += "<tr><td>AC1</td><td>AC1</td>";
                    } else if (old_array[0].ddlband == "10") {
                        str += "<tr><td>AC2</td><td>AC2</td>";
                    } else if (old_array[0].ddlband == "11") {
                        str += "<tr><td>AC3</td><td>AC3</td>";
                    } else if (old_array[0].ddlband == "12") {
                        str += "<tr><td>AC4</td><td>AC4</td>";
                    } else if (old_array[0].ddlband == "13") {
                        str += "<tr><td>AC5</td><td>AC5</td>";
                    } else if (old_array[0].ddlband == "14") {
                        str += "<tr><td>AC6</td><td>AC6</td>";
                    } else if (old_array[0].ddlband == "15") {
                        str += "<tr><td>AH1</td><td>AH1</td>";
                    } else if (old_array[0].ddlband == "16") {
                        str += "<tr><td>AH2</td><td>AH2</td>";
                    } else if (old_array[0].ddlband == "17") {
                        str += "<tr><td>AH3</td><td>AH3</td>";
                    }

                    if (formData.get("ddlband") == "0") {
                        str += "<td>Band</td>";
                    } else if (formData.get("ddlband") == "1") {
                        str += "<td>AD1</td>";
                    } else if (formData.get("ddlband") == "2") {
                        str += "<td>AD2</td>";
                    } else if (formData.get("ddlband") == "3") {
                        str += "<td>AD3</td>";
                    } else if (formData.get("ddlband") == "4") {
                        str += "<td>AD4</td>";
                    } else if (formData.get("ddlband") == "5") {
                        str += "<td>AD5</td>";
                    } else if (formData.get("ddlband") == "6") {
                        str += "<td>AD6</td>";
                    } else if (formData.get("ddlband") == "7") {
                        str += "<td>AD7</td>";
                    } else if (formData.get("ddlband") == "8") {
                        str += "<td>AD7</td>";
                    } else if (formData.get("ddlband") == "9") {
                        str += "<td>AD8</td>";
                    } else if (formData.get("ddlband") == "10") {
                        str += "<td>AC1</td>";
                    } else if (formData.get("ddlband") == "11") {
                        str += "<td>AC2</td>";
                    } else if (formData.get("ddlband") == "12") {
                        str += "<td>AC3</td>";
                    } else if (formData.get("ddlband") == "13") {
                        str += "<td>AC4</td>";
                    } else if (formData.get("ddlband") == "14") {
                        str += "<td>AC5</td>";
                    } else if (formData.get("ddlband") == "15") {
                        str += "<td>AC6</td>";
                    } else if (formData.get("ddlband") == "16") {
                        str += "<td>AH1</td>";
                    } else if (formData.get("ddlband") == "17") {
                        str += "<td>AH2</td>";
                    } else if (formData.get("ddlband") == "18") {
                        str += "<td>AH3</td>";
                    }


                    str += "</tr>";

                    isaudit = true;
                }


                if (formData.get("titdesi") != old_array[0].titdesi) {
                    str += "<tr><td>Title / Designation</td><td>" + old_array[0].titdesi + "</td><td>" + formData.get("titdesi") + "</td></tr>";
                    isaudit = true;
                }

                if (formData.get("rehiredt") != old_array[0].rehiredt) {
                    str += "<tr><td>Rehire Date</td><td>" + old_array[0].rehiredt + "</td><td>" + formData.get("rehiredt") + "</td></tr>";
                    isaudit = true;
                }

                if (formData.get("conexpiry") != old_array[0].conexpiry) {
                    str += "<tr><td>Contract Expiry Date</td><td>" + old_array[0].conexpiry + "</td><td>" + formData.get("conexpiry") + "</td></tr>";
                    isaudit = true;
                }

                if (formData.get("workproj") != old_array[0].workproj) {
                    str += "<tr><td>Working Project</td><td>" + old_array[0].workproj + "</td><td>" + formData.get("workproj") + "</td></tr>";
                    isaudit = true;
                }

                if (formData.get("chargproj") != old_array[0].chargproj) {
                    str += "<tr><td>Charging Project</td><td>" + old_array[0].chargproj + "</td><td>" + formData.get("chargproj") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("ddlloc") != old_array[0].ddlloc) {

                    if (old_array[0].ddlloc == "0") {
                        str += "<tr><td>Location</td><td>Location</td>";
                    } else if (old_array[0].ddlband == "1") {
                        str += "<tr><td>Karachi</td><td>Karachi</td>";
                    } else if (old_array[0].ddlband == "2") {
                        str += "<tr><td>Matiari</td><td>Matiari</td>";
                    } else if (old_array[0].ddlband == "3") {
                        str += "<tr><td>Dadu</td><td>Dadu</td>";
                    } else if (old_array[0].ddlband == "4") {
                        str += "<tr><td>Thatta</td><td>Thatta</td>";
                    } else if (old_array[0].ddlband == "5") {
                        str += "<tr><td>Jamshoro</td><td>Jamshoro</td>";
                    }

                    if (formData.get("ddlband") == "0") {
                        str += "<td>Location</td>";
                    } else if (formData.get("ddlband") == "1") {
                        str += "<td>Karachi</td>";
                    } else if (formData.get("ddlband") == "2") {
                        str += "<td>Matiari</td>";
                    } else if (formData.get("ddlband") == "3") {
                        str += "<td>Dadu</td>";
                    } else if (formData.get("ddlband") == "4") {
                        str += "<td>Thatta</td>";
                    } else if (formData.get("ddlband") == "5") {
                        str += "<td>Jamshoro</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (formData.get("supernme") != old_array[0].supernme) {
                    str += "<tr><td>Supervisor Name</td><td>" + old_array[0].supernme + "</td><td>" + formData.get("supernme") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("hiresalary") != old_array[0].hiresalary) {
                    str += "<tr><td>Hiring Salary</td><td>" + old_array[0].hiresalary + "</td><td>" + formData.get("hiresalary") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("ddlhardship") != old_array[0].ddlhardship) {

                    if (old_array[0].ddlhardship == "0") {
                        str += "<tr><td>Harship Allowance</td><td>Harship Allowance</td>";
                    } else if (old_array[0].ddlhardship == "1") {
                        str += "<tr><td>Yes</td><td>Yes</td>";
                    } else if (old_array[0].ddlhardship == "2") {
                        str += "<tr><td>No</td><td>No</td>";
                    }


                    if (formData.get("ddlhardship") == "0") {
                        str += "<td>Harship Allowance</td>";
                    } else if (formData.get("ddlhardship") == "1") {
                        str += "<td>Yes</td>";
                    } else if (formData.get("ddlhardship") == "2") {
                        str += "<td>No</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (formData.get("amount") != old_array[0].amount) {
                    str += "<tr><td>Amount</td><td>" + old_array[0].amount + "</td><td>" + formData.get("amount") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("benefits") != old_array[0].benefits) {

                    if (old_array[0].benefits == "0") {
                        str += "<tr><td>Harship Allowance</td><td>Benefits</td>";
                    } else if (old_array[0].benefits == "1") {
                        str += "<tr><td>Yes</td><td>Yes</td>";
                    } else if (old_array[0].benefits == "2") {
                        str += "<tr><td>No</td><td>No</td>";
                    }


                    if (formData.get("benefits") == "0") {
                        str += "<td>Benefits</td>";
                    } else if (formData.get("benefits") == "1") {
                        str += "<td>Yes</td>";
                    } else if (formData.get("benefits") == "2") {
                        str += "<td>No</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (formData.get("peme") != old_array[0].peme) {

                    if (old_array[0].peme == "0") {
                        str += "<tr><td>PEME</td><td>PEME</td>";
                    } else if (old_array[0].peme == "1") {
                        str += "<tr><td>Yes</td><td>Yes</td>";
                    } else if (old_array[0].peme == "2") {
                        str += "<tr><td>No</td><td>No</td>";
                    }


                    if (formData.get("peme") == "0") {
                        str += "<td>PEME</td>";
                    } else if (formData.get("peme") == "1") {
                        str += "<td>Yes</td>";
                    } else if (formData.get("peme") == "2") {
                        str += "<td>No</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (formData.get("gop") != old_array[0].gop) {

                    if (old_array[0].gop == "0") {
                        str += "<tr><td>General Orientation Program</td><td>General Orientation Program</td>";
                    } else if (old_array[0].gop == "1") {
                        str += "<tr><td>Yes</td><td>Yes</td>";
                    } else if (old_array[0].gop == "2") {
                        str += "<tr><td>No</td><td>No</td>";
                    }


                    if (formData.get("gop") == "0") {
                        str += "<td>General Orientation Program</td>";
                    } else if (formData.get("gop") == "1") {
                        str += "<td>Yes</td>";
                    } else if (formData.get("gop") == "2") {
                        str += "<td>No</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (formData.get("gopdt") != old_array[0].gopdt) {
                    str += "<tr><td>GOP Date</td><td>" + old_array[0].gopdt + "</td><td>" + formData.get("gopdt") + "</td></tr>";
                    isaudit = true;
                }


                if (formData.get("entity") != old_array[0].entity) {

                    if (old_array[0].entity == "0") {
                        str += "<tr><td>Entity</td><td>Entity</td>";
                    } else if (old_array[0].entity == "1") {
                        str += "<tr><td>IDRL</td><td>IDRL</td>";
                    } else if (old_array[0].entity == "2") {
                        str += "<tr><td>NRL</td><td>NRL</td>";
                    } else if (old_array[0].entity == "3") {
                        str += "<tr><td>DMU</td><td>DMU</td>";
                    } else if (old_array[0].entity == "4") {
                        str += "<tr><td>Admin Project Management</td><td>Admin Project Management</td>";
                    }


                    if (formData.get("entity") == "0") {
                        str += "<td>Entity</td>";
                    } else if (formData.get("entity") == "1") {
                        str += "<td>IDRL</td>";
                    } else if (formData.get("entity") == "2") {
                        str += "<td>NRL</td>";
                    } else if (formData.get("entity") == "3") {
                        str += "<td>DMU</td>";
                    } else if (formData.get("entity") == "4") {
                        str += "<td>Admin Project Management</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (formData.get("dept") != old_array[0].dept) {

                    if (old_array[0].dept == "0") {
                        str += "<tr><td>Department</td><td>Department</td>";
                    } else if (old_array[0].dept == "1") {
                        str += "<tr><td>Paeds</td><td>Paeds</td>";
                    } else if (old_array[0].dept == "2") {
                        str += "<tr><td>Obgyn</td><td>Obgyn</td>";
                    } else if (old_array[0].dept == "3") {
                        str += "<tr><td>DMU</td><td>DMU</td>";
                    } else if (old_array[0].dept == "4") {
                        str += "<tr><td>IGHD</td><td>IGHD</td>";
                    }


                    if (formData.get("dept") == "0") {
                        str += "<td>Department</td>";
                    } else if (formData.get("dept") == "1") {
                        str += "<td>Paeds</td>";
                    } else if (formData.get("dept") == "2") {
                        str += "<td>Obgyn</td>";
                    } else if (formData.get("dept") == "3") {
                        str += "<td>COE</td>";
                    } else if (formData.get("dept") == "4") {
                        str += "<td>IGHD</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (formData.get("cardissue") != old_array[0].cardissue) {

                    if (old_array[0].cardissue == "0") {
                        str += "<tr><td>ID Card Issued</td><td>ID Card Issued</td>";
                    } else if (old_array[0].cardissue == "1") {
                        str += "<tr><td>Yes</td><td>Yes</td>";
                    } else if (old_array[0].cardissue == "2") {
                        str += "<tr><td>No</td><td>No</td>";
                    }


                    if (formData.get("cardissue") == "0") {
                        str += "<td>ID Card Issued</td>";
                    } else if (formData.get("cardissue") == "1") {
                        str += "<td>Yes</td>";
                    } else if (formData.get("cardissue") == "2") {
                        str += "<td>No</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (formData.get("letterapp") != old_array[0].letterapp) {

                    if (old_array[0].letterapp == "0") {
                        str += "<tr><td>Letter Of Appointment Received</td><td>Letter Of Appointment Received</td>";
                    } else if (old_array[0].letterapp == "1") {
                        str += "<tr><td>Yes</td><td>Yes</td>";
                    } else if (old_array[0].letterapp == "2") {
                        str += "<tr><td>No</td><td>No</td>";
                    }


                    if (formData.get("letterapp") == "0") {
                        str += "<td>Letter Of Appointment Received</td>";
                    } else if (formData.get("letterapp") == "1") {
                        str += "<td>Yes</td>";
                    } else if (formData.get("letterapp") == "2") {
                        str += "<td>No</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (formData.get("confirmation") != old_array[0].confirmation) {

                    if (old_array[0].confirmation == "0") {
                        str += "<tr><td>Confirmation</td><td>Confirmation</td>";
                    } else if (old_array[0].confirmation == "1") {
                        str += "<tr><td>Yes</td><td>Yes</td>";
                    } else if (old_array[0].confirmation == "2") {
                        str += "<tr><td>No</td><td>No</td>";
                    }


                    if (formData.get("confirmation") == "0") {
                        str += "<td>Confirmation</td>";
                    } else if (formData.get("confirmation") == "1") {
                        str += "<td>Yes</td>";
                    } else if (formData.get("confirmation") == "2") {
                        str += "<td>No</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (formData.get("status") != old_array[0].status) {

                    if (old_array[0].status == "0") {
                        str += "<tr><td>Status</td><td>Status</td>";
                    } else if (old_array[0].status == "1") {
                        str += "<tr><td>Active</td><td>Yes</td>";
                    } else if (old_array[0].status == "2") {
                        str += "<tr><td>InActive</td><td>No</td>";
                    }


                    if (formData.get("status") == "0") {
                        str += "<td>Status</td>";
                    } else if (formData.get("status") == "1") {
                        str += "<td>Active</td>";
                    } else if (formData.get("status") == "2") {
                        str += "<td>InActive</td>";
                    }

                    str += "</tr>";
                    isaudit = true;
                }


                if (old_array[0].remarks == null && formData.get("remarks") == "") {

                } else {
                    if (formData.get("remarks") != old_array[0].remarks) {
                        str += "<tr><td>Remarks</td><td>" + old_array[0].remarks + "</td><td>" + formData.get("remarks") + "</td></tr>";
                        isaudit = true;
                    }
                }


                if ($("#lbl_pic").html() != old_array[0].pic) {
                    str += "<tr><td>Picture</td><td>" + old_array[0].pic + "</td><td>" + "assets/emppic/" + $("#lbl_pic").html() + "</td></tr>";
                    isaudit = true;
                }


                if ($("#lbl_doc").html() != old_array[0].doc) {
                    str += "<tr><td>Documents</td><td>" + old_array[0].doc + "</td><td>" + "assets/docs/" + $("#lbl_doc").html() + "</td></tr>";
                    isaudit = true;
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
                }

            }

        }

    }


    function editData() {

        CallAjax('<?php echo base_url('index.php/employee_entry/editRecord'); ?>', formData, 'POST', function (result) {
            //hideloader();

            if (result == 1) {
                toastMsg('Success', 'Record Saved Successfully', 'success');

                //$('#addModal').modal('hide');
                setTimeout(function () {
                    window.location.href = '<?php echo base_url('index.php/employee_entry') ?>';
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


    function editData_original() {

        $('#ddlemptype').css('border', '1px solid #babfc7');
        $('#ddlcategory').css('border', '1px solid #babfc7');
        $('#empno').css('border', '1px solid #babfc7');
        $('#empname').css('border', '1px solid #babfc7');
        $('#qual').css('border', '1px solid #babfc7');
        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        $('#qual').css('border', '1px solid #babfc7');
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


                CallAjax('<?php echo base_url('index.php/employee_entry/editRecord'); ?>', formData, 'POST', function (result) {
                    //hideloader();

                    if (result == 1) {
                        toastMsg('Success', 'Record Saved Successfully', 'success');

                        //$('#addModal').modal('hide');
                        setTimeout(function () {
                            window.location.href = '<?php echo base_url('index.php/employee_entry') ?>';
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

        for (var i of submitedData.entries()) {

            if (i[0] != "remarks" && i[0] != "cellno2") {

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


                    if (inpVal == '' || inpVal == 'Choose Pic' || inpVal == 'Choose PDF' || inpVal == undefined
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

        $('#empno').css('border', '1px solid #babfc7');
        $('#empname').css('border', '1px solid #babfc7');
        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        $('#qual').css('border', '1px solid #babfc7');
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


        $("#lblerr_" + $("#empno").attr("id")).remove();
        $("#lblerr_" + $("#empname").attr("id")).remove();
        $("#lblerr_" + $("#cnicno").attr("id")).remove();
        $("#lblerr_" + $("#dob").attr("id")).remove();
        $("#lblerr_" + $("#cellno1").attr("id")).remove();
        $("#lblerr_" + $("#cellno2").attr("id")).remove();
        $("#lblerr_" + $("#personnme").attr("id")).remove();
        $("#lblerr_" + $("#emcellno").attr("id")).remove();
        $("#lblerr_" + $("#emlandno").attr("id")).remove();
        $("#lblerr_" + $("#gncno").attr("id")).remove();
        $("#lblerr_" + $("#rehiredt").attr("id")).remove();
        $("#lblerr_" + $("#conexpiry").attr("id")).remove();
        $("#lblerr_" + $("#chargproj").attr("id")).remove();
        $("#lblerr_" + $("#supernme").attr("id")).remove();
        $("#lblerr_" + $("#gopdt").attr("id")).remove();
        $("#lblerr_" + $("#remarks").attr("id")).remove();


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


        if ($("#chargproj").val().indexOf("_") != -1) {
            ShowError($("#chargproj"), "Charging project must be 10 digits");
            iserror = true;
        }


        var re = /^[A-Za-z ]+$/;

        if (!re.test($("#supernme").val())) {
            ShowError($("#supernme"), "Supervisor name cannot contains special characters");
            iserror = true;
        }


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

        if ($("#remarks").val() == "" && $("#remarks").val() == null && $("#remarks").val() == 'null' && $("#remarks").val() == undefined && $("#remarks").val() == 'undefined') {

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
        $('#qual').css('border', '1px solid #babfc7');
        $('#cnicno').css('border', '1px solid #babfc7');
        $('#dob').css('border', '1px solid #babfc7');
        $('#qual').css('border', '1px solid #babfc7');
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


            CallAjax('<?php echo base_url('index.php/employee_entry/addRecord'); ?>', formData, 'POST', function (result) {
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


        if (iserror == false) {


            // formData.append('data', $("#frm")[0]);


            if ($("#pic").val() != "") {
                formData.append('imgfile', $('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_img." + imgext[1]);
                // formData['pic']=$('#pic')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "." + ext[1];
            }


            if ($("#doc").val() != "") {
                formData.append('docfile', $('#doc')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_doc." + ext[1]);
            }


            CallAjax('<?php echo base_url('index.php/employee_entry/addRecord_SaveDraft'); ?>', formData, 'POST', function (result) {
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