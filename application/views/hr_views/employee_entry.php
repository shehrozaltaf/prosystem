<style>
    .invalid-feedback {
        position: absolute;
    }

    .container {
        /* display: inline-block; */
        position: relative;
        cursor: pointer;
        margin-top: -52px;
        margin-right: -555px;
        /* font-size: 14px; */
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
        position: relative;
        opacity: 0;
        cursor: pointer;
        /* height: 0; */
        /* width: 0; */
        margin-right: 700px;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: -15px;
        height: 25px;
        width: 25px;
        background-color: #eee;
        /* margin: 0px -10px; */
        /* padding: 0px 13px; */
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

</style>
<script>
    $(document).on('click', '#chk_landline', function () {
        if ($('#chk_landline').prop('checked') == true) {
            $('#landline').val('999999999999999');
            $('#landline').prop('disabled', 'disabled');
        } else {
            $('#landline').val('');
            $('#landline').removeAttr('disabled');
        }
    });

    $(document).on('click', '#chk_emrlandline', function () {
        if ($('#chk_emrlandline').prop('checked') == true) {
            $('#emlandno').val('99999999');
            $('#emlandno').prop('disabled', 'disabled');
        } else {
            $('#emlandno').val('');
            $('#emlandno').removeAttr('disabled');
        }
    });

</script>
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
                                    <h4 class="card-title">Personal Information</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span id="lbl_empno">Employee Number</span>
                                                            </div>
                                                            <div class="col-md-10">

                                                                <?php if (isset($editemp[0]->empno)) { ?>

                                                                    <input type="text" id="empno" disabled="disabled"
                                                                           class="form-control" maxlength="6"
                                                                           placeholder="Employee Number" name="empno"
                                                                           onkeypress="return numeralsOnly();"
                                                                           required
                                                                           value="<?php echo($editemp[0]->empno) ?>">

                                                                <?php } else { ?>

                                                                    <input type="text" id="empno"
                                                                           class="form-control" maxlength="6"
                                                                           placeholder="Employee Number" name="empno"
                                                                           onkeypress="return numeralsOnly();"
                                                                           required value="">

                                                                <?php } ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span id="lbl_empname">Full Name <br>(Use Capital Letters)</span>
                                                            </div>
                                                            <div class="col-md-10">
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
                                                            <div class="col-md-2">
                                                                <span id="lbl_cnicno">CNIC Number</span>
                                                            </div>
                                                            <div class="col-md-10">
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
                                                            <div class="col-md-2">
                                                                <span id="lbl_dob">Date of Birth</span>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" id="dob" required
                                                                       placeholder="Date of Birth"
                                                                       class="form-control" name="dob"
                                                                       value="<?php echo(isset($editemp[0]->dob) ? $editemp[0]->dob : '') ?>">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span id="lbl_qual">Highest Qualification</span>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <?php
                                                                $html_options_Q = '<option value="0">Highest Qualification</option>';
                                                                $htmlQ = '';
                                                                $oldLabelQ = '';
                                                                $oldValQ = '';
                                                                if (isset($qualification) && $qualification != '') {
                                                                    foreach ($qualification as $v) {
                                                                        if ($v->id === $editemp[0]->qual) {
                                                                            $oldValQ = $v->id;
                                                                            $oldLabelQ = $v->qualification;
                                                                            $html_options_Q .= '<option selected="selected" data-text="' . $v->qualification . '" value="' . $v->id . '">' . $v->qualification . '</option>';
                                                                        } else {
                                                                            $html_options_Q .= '<option data-text="' . $v->qualification . '" value="' . $v->id . '">' . $v->qualification . '</option>';
                                                                        }
                                                                    }
                                                                }
                                                                $htmlQ .= '<select class="select2 form-control" id="qual"
                                                                        required  data-oldval="' . $oldValQ . '" data-oldLabel="' . $oldLabelQ . '" name="qual">';
                                                                $htmlQ .= $html_options_Q;
                                                                $htmlQ .= '</select>';
                                                                echo $htmlQ;
                                                                ?>

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
                                                            <span id="lbl_resaddr">Residential Address</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="resaddr" class="form-control"
                                                                   required
                                                                   name="resaddr" maxlength="200"
                                                                   value="<?php echo(isset($editemp[0]->resaddr) ? $editemp[0]->resaddr : '') ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_landline">Landline Number</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="tel" id="landline" required
                                                                   onkeypress="return numeralsOnly();"
                                                                   class="form-control" name="landline" maxlength="15"
                                                                   value="<?php echo($editemp[0]->landlineccode . $editemp[0]->landline) ?>">


                                                            <!--<div class="form-group">
                                                                <label for="checklist"
                                                                       class="label-control ">Reviewed</label>
                                                                <input id="chk_landline" name="chk_landline"
                                                                       type="checkbox" name="checklist"
                                                                >
                                                            </div>-->

                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="container">Not Available
                                                        <input id="chk_landline" name="chk_landline"
                                                               type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_cellno1">Mobile Number (Primary)</span>
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
                                                            <span id="lbl_cellno2">Mobile Number (Alternate)</span>
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
                                    <h4 class="card-title">Emergency Contact</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_personnme">Person Name</span>
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
                                                            <span id="lbl_emcellno">Mobile Number</span>
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
                                                            <span id="lbl_emlandno">Landline No.</span>
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
                                                <div>
                                                    <label class="container">Not Available
                                                        <input id="chk_emrlandline" name="chk_emrlandline"
                                                               type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
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
                                    <h4 class="card-title">Employment Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_ddlemptype">Employment Type</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php
                                                            $html_options_Q = '<option value="0">Employment Type</option>';
                                                            $htmlQ = '';
                                                            $oldLabelQ = '';
                                                            $oldValQ = '';
                                                            if (isset($employeeType) && $employeeType != '') {
                                                                foreach ($employeeType as $v) {
                                                                    if ($v->id === $editemp[0]->ddlemptype) {
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
                                                        <div class="col-md-2">
                                                            <span id="lbl_ddlcategory">Job</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php
                                                            $html_options_Q = '<option value="0">Job</option>';
                                                            $htmlQ = '';
                                                            $oldLabelQ = '';
                                                            $oldValQ = '';
                                                            if (isset($category) && $category != '') {
                                                                foreach ($category as $v) {
                                                                    if ($v->id === $editemp[0]->ddlcategory) {
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
                                                        <div class="col-md-2">
                                                            <span id="lbl_gncno">GNC Number</span>
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
                                                            <span id="lbl_ddlband">Band</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php
                                                            $html_options_Q = '<option value="0">Band</option>';
                                                            $htmlQ = '';
                                                            $oldLabelQ = '';
                                                            $oldValQ = '';
                                                            if (isset($band) && $band != '') {
                                                                foreach ($band as $v) {
                                                                    if ($v->id === $editemp[0]->ddlband) {
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
                                                        <div class="col-md-2">
                                                            <span id="lbl_titdesi">Title / Designation</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php
                                                            $html_options_Q = '<option value="0">Designation</option>';
                                                            $htmlQ = '';
                                                            $oldLabelQ = '';
                                                            $oldValQ = '';
                                                            if (isset($designation) && $designation != '') {
                                                                foreach ($designation as $v) {
                                                                    if ($v->id === $editemp[0]->titdesi) {
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
                                                        <div class="col-md-2">
                                                            <span id="lbl_rehiredt">Hire / Rehire Date</span>
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
                                                            <span id="lbl_workproj">Working Project</span>
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
                                                            <span id="lbl_chargproj">Charging Project</span>
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
                                                            <span id="lbl_ddlloc">Location</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php
                                                            $html_options_Q = '<option value="0">Location</option>';
                                                            $htmlQ = '';
                                                            $oldLabelQ = '';
                                                            $oldValQ = '';
                                                            if (isset($location) && $location != '') {
                                                                foreach ($location as $v) {
                                                                    if ($v->id === $editemp[0]->ddlloc) {
                                                                        $oldValQ = $v->id;
                                                                        $oldLabelQ = $v->location;
                                                                        $html_options_Q .= '<option data-text="' . $v->location . '" selected="selected" value="' . $v->id . '">' . $v->location . '</option>';
                                                                    } else {
                                                                        $html_options_Q .= '<option data-text="' . $v->location . '" value="' . $v->id . '">' . $v->location . '</option>';
                                                                    }
                                                                }
                                                            }
                                                            $htmlQ .= '<select class="select2 form-control" id="ddlloc"
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
                                                        <div class="col-md-2">
                                                            <span id="lbl_supernme">Supervisor Name</span>
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
                                                            <span id="lbl_hiresalary">Hiring Salary</span>
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
                                                            <span id="lbl_ddlhardship">Hardship Allowance</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php if ($editemp[0]->ddlhardship === 1) {
                                                                echo '<select id="ddlhardship" data-oldval="1" data-oldlabel="Yes" name="ddlhardship" required class="form-control">';
                                                                echo '<option data-text="" value="0">Hardship Allowance</option>';
                                                                echo '<option data-text="Yes" selected="selected" value="1">Yes</option>';
                                                                echo '<option data-text="No" value="2">No</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->ddlhardship === 2) {
                                                                echo '<select id="ddlhardship" data-oldval="2" data-oldlabel="No" name="ddlhardship" required class="form-control">';
                                                                echo '<option data-text="" value="0">Hardship Allowance</option>';
                                                                echo '<option data-text="Yes" value="1">Yes</option>';
                                                                echo '<option data-text="No" selected="selected" value="2">No</option>';
                                                                echo '</select>';
                                                            } else {
                                                                echo '<select id="ddlhardship" data-oldval="" data-oldlabel="" name="ddlhardship" required class="form-control">';
                                                                echo '<option data-text="" selected="selected" value="0">Hardship Allowance</option>';
                                                                echo '<option data-text="Yes" value="1">Yes</option>';
                                                                echo '<option data-text="No" value="2">No</option>';
                                                                echo '</select>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_amount">Amount</span>
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
                                                            <span id="lbl_benefits">Benefits</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php if ($editemp[0]->benefits === 1) {
                                                                echo '<select id="benefits" name="benefits" data-oldval="1" data-oldlabel="Yes" required class="form-control">';
                                                                echo '<option data-text="" value="0">Benefits</option>';
                                                                echo '<option data-text="Yes" selected="selected" value="1">Yes</option>';
                                                                echo '<option data-text="No" value="2">No</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->benefits === 2) {
                                                                echo '<select id="benefits" name="benefits" data-oldval="2" data-oldlabel="No" required class="form-control">';
                                                                echo '<option data-text="" value="0">Benefits</option>';
                                                                echo '<option data-text="Yes" value="1">Yes</option>';
                                                                echo '<option data-text="No" selected="selected" value="2">No</option>';
                                                                echo '</select>';
                                                            } else {
                                                                echo '<select id="benefits" name="benefits" data-oldval="" data-oldlabel="" required class="form-control">';
                                                                echo '<option data-text="" selected="selected" value="0">Benefits</option>';
                                                                echo '<option data-text="Yes" value="1">Yes</option>';
                                                                echo '<option data-text="No" value="2">No</option>';
                                                                echo '</select>';
                                                            }
                                                            ?>
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
                                    <h4 class="card-title">Status of Hiring Formalities</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_peme">PEME</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php if ($editemp[0]->peme === 1) {
                                                                echo '<select id="peme" name="peme" data-oldval="1" data-oldlabel="Yes" required class="form-control">';
                                                                echo '<option value="0" data-text="">PEME</option>';
                                                                echo '<option selected="selected" value="1" data-text="Yes">Yes</option>';
                                                                echo '<option value="2" data-text="No">No</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->peme === 2) {
                                                                echo '<select id="peme" name="peme" data-oldval="2" data-oldlabel="No" required class="form-control">';
                                                                echo '<option value="0" data-text="">PEME</option>';
                                                                echo '<option value="1" data-text="Yes">Yes</option>';
                                                                echo '<option selected="selected" value="2" data-text="No">No</option>';
                                                                echo '</select>';
                                                            } else {
                                                                echo '<select id="peme" name="peme" data-oldval="" data-oldlabel="" required class="form-control">';
                                                                echo '<option selected="selected" value="0" data-text="">PEME</option>';
                                                                echo '<option value="1" data-text="Yes">Yes</option>';
                                                                echo '<option value="2" data-text="No">No</option>';
                                                                echo '</select>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_gop">General Orientation Program</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php if ($editemp[0]->gop === 1) {
                                                                echo '<select id="gop" name="gop" data-oldval="1" data-oldlabel="Yes" required class="form-control">';
                                                                echo '<option value="0" data-text="">General Orientation Program</option>';
                                                                echo '<option selected="selected" value="1" data-text="Yes">Yes</option>';
                                                                echo '<option value="2" data-text="No">No</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->gop === 2) {
                                                                echo '<select id="gop" name="gop" data-oldval="2" data-oldlabel="No" required class="form-control">';
                                                                echo '<option value="0" data-text="">General Orientation Program</option>';
                                                                echo '<option value="1" data-text="Yes">Yes</option>';
                                                                echo '<option selected="selected" value="2" data-text="No">No</option>';
                                                                echo '</select>';
                                                            } else {
                                                                echo '<select id="gop" name="gop" data-oldval="" data-oldlabel="" required class="form-control">';
                                                                echo '<option selected="selected" value="0" data-text="">General Orientation Program</option>';
                                                                echo '<option value="1" data-text="Yes">Yes</option>';
                                                                echo '<option value="2" data-text="No">No</option>';
                                                                echo '</select>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_gopdt">GOP Date</span>
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
                                                            <span id="lbl_entity">Entity</span>
                                                        </div>
                                                        <div class="col-md-10">

                                                            <?php

                                                            if ($editemp[0]->entity === 1) {
                                                                echo '<select id="entity" name="entity" data-oldval="1" data-oldlabel="IDRL" required class="form-control">';
                                                                echo '<option value="0" data-text="">Entity</option>';
                                                                echo '<option selected="selected" value="1" data-text="IDRL">IDRL</option>';
                                                                echo '<option value="2" data-text="NRL">NRL</option>';
                                                                echo '<option value="3" data-text="DMU">DMU</option>';
                                                                echo '<option value="4" data-text="Admin Project Management">Admin Project Management</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->entity === 2) {
                                                                echo '<select id="entity" name="entity" data-oldval="2" data-oldlabel="NRL" required class="form-control">';
                                                                echo '<option value="0" data-text="">Entity</option>';
                                                                echo '<option value="1" data-text="IDRL">IDRL</option>';
                                                                echo '<option selected="selected" value="2" data-text="NRL">NRL</option>';
                                                                echo '<option value="3" data-text="DMU">DMU</option>';
                                                                echo '<option value="4" data-text="Admin Project Management">Admin Project Management</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->entity === 3) {
                                                                echo '<select id="entity" name="entity" data-oldval="3" data-oldlabel="DMU" required class="form-control">';
                                                                echo '<option value="0" data-text="">Entity</option>';
                                                                echo '<option value="1" data-text="IDRL">IDRL</option>';
                                                                echo '<option value="2" data-text="NRL">NRL</option>';
                                                                echo '<option selected="selected" value="3" data-text="DMU">DMU</option>';
                                                                echo '<option value="4" data-text="Admin Project Management">Admin Project Management</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->entity === 4) {
                                                                echo '<select id="entity" name="entity" data-oldval="4" data-oldlabel="Admin Project Management" required class="form-control">';
                                                                echo '<option value="0" data-text="">Entity</option>';
                                                                echo '<option value="1" data-text="IDRL">IDRL</option>';
                                                                echo '<option value="2" data-text="NRL">NRL</option>';
                                                                echo '<option value="3" data-text="DMU">DMU</option>';
                                                                echo '<option selected="selected" value="4" data-text="Admin Project Management">Admin Project Management</option>';
                                                                echo '</select>';
                                                            } else {
                                                                echo '<select id="entity" name="entity" data-oldval="" data-oldlabel="" required class="form-control">';
                                                                echo '<option selected="selected" value="0" data-text="">Entity</option>';
                                                                echo '<option value="1" data-text="IDRL">IDRL</option>';
                                                                echo '<option value="2" data-text="NRL">NRL</option>';
                                                                echo '<option value="3" data-text="DMU">DMU</option>';
                                                                echo '<option value="4" data-text="Admin Project Management">Admin Project Management</option>';
                                                                echo '</select>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_dept">Department</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php if ($editemp[0]->dept === 1) {
                                                                echo '<select id="dept" name="dept" data-oldval="1" data-oldlabel="Paeds" required class="form-control">';
                                                                echo '<option value="0" data-text="">Department</option>';
                                                                echo '<option selected="selected" value="1" data-text="Paeds">Paeds</option>';
                                                                echo '<option value="2" data-text="Obgyn">Obgyn</option>';
                                                                echo '<option value="3" data-text="COE">COE</option>';
                                                                echo '<option value="4" data-text="IGHD">IGHD</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->dept === 2) {
                                                                echo '<select id="dept" name="dept" data-oldval="2" data-oldlabel="Obgyn" required class="form-control">';
                                                                echo '<option value="0" data-text="">Department</option>';
                                                                echo '<option value="1" data-text="Paeds">Paeds</option>';
                                                                echo '<option selected="selected" value="2" data-text="Obgyn">Obgyn</option>';
                                                                echo '<option value="3" data-text="COE">COE</option>';
                                                                echo '<option value="4" data-text="IGHD">IGHD</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->dept === 3) {
                                                                echo '<select id="dept" name="dept" data-oldval="3" data-oldlabel="COE" required class="form-control">';
                                                                echo '<option value="0" data-text="">Department</option>';
                                                                echo '<option value="1" data-text="Paeds">Paeds</option>';
                                                                echo '<option value="2" data-text="Obgyn">Obgyn</option>';
                                                                echo '<option selected="selected" value="3" data-text="COE">COE</option>';
                                                                echo '<option value="4" data-text="IGHD">IGHD</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->dept === 4) {
                                                                echo '<select id="dept" name="dept" data-oldval="4" data-oldlabel="IGHD" required class="form-control">';
                                                                echo '<option value="0" data-text="">Department</option>';
                                                                echo '<option value="1" data-text="Paeds">Paeds</option>';
                                                                echo '<option value="2" data-text="Obgyn">Obgyn</option>';
                                                                echo '<option value="3" data-text="COE">COE</option>';
                                                                echo '<option selected="selected" value="4" data-text="IGHD">IGHD</option>';
                                                                echo '</select>';
                                                            } else {
                                                                echo '<select id="dept" name="dept" data-oldval="" data-oldlabel="" required class="form-control">';
                                                                echo '<option selected="selected" value="0" data-text="">Department</option>';
                                                                echo '<option value="1" data-text="Paeds">Paeds</option>';
                                                                echo '<option value="2" data-text="Obgyn">Obgyn</option>';
                                                                echo '<option value="3" data-text="COE">COE</option>';
                                                                echo '<option value="4" data-text="IGHD">IGHD</option>';
                                                                echo '</select>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_cardissue">ID Card Issued</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php if ($editemp[0]->cardissue === 1) {
                                                                echo '<select id="cardissue" name="cardissue" data-oldval="1" data-oldlabel="Yes" required class="form-control">';
                                                                echo '<option value="0" data-text="">ID Card Issued</option>';
                                                                echo '<option selected="selected" value="1" data-text="Yes">Yes</option>';
                                                                echo '<option value="2" data-text="No">No</option>';
                                                                echo '</select>';
                                                            } else if ($editemp[0]->cardissue === 2) {
                                                                echo '<select id="cardissue" name="cardissue" data-oldval="2" data-oldlabel="No" required class="form-control">';
                                                                echo '<option value="0" data-text="">ID Card Issued</option>';
                                                                echo '<option value="1" data-text="Yes">Yes</option>';
                                                                echo '<option selected="selected" value="2" data-text="No">No</option>';
                                                                echo '</select>';
                                                            } else {
                                                                echo '<select id="cardissue" name="cardissue" data-oldval="" data-oldlabel="" required class="form-control">';
                                                                echo '<option selected="selected" value="0" data-text="">ID Card Issued</option>';
                                                                echo '<option value="1" data-text="Yes>Yes</option>';
                                                                echo '<option value="2" data-text="No">No</option>';
                                                                echo '</select>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_letterapp">Letter Of Appointment Received</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php if ($editemp[0]->letterapp === 1) {
                                                                echo '<select id="letterapp" name="letterapp" data-oldval="1" data-oldlabel="Yes" required class="form-control">';
                                                                echo '<option value="0" data-text="">Letter Of Appointment Received';
                                                                echo '<option selected="selected" value="1" data-text="Yes">Yes</option>';
                                                                echo '<option value="2" data-text="No">No</option>';
                                                            } else if ($editemp[0]->letterapp === 2) {
                                                                echo '<select id="letterapp" name="letterapp" data-oldval="2" data-oldlabel="No" required class="form-control">';
                                                                echo '<option value="0" data-text="">Letter Of Appointment Received';
                                                                echo '<option value="1" data-text="Yes">Yes</option>';
                                                                echo '<option selected="selected" value="2" data-text="No">No</option>';
                                                            } else {
                                                                echo '<select id="letterapp" name="letterapp" data-oldval="" data-oldlabel="" required class="form-control">';
                                                                echo '<option selected="selected" value="0" data-text="">Letter Of Appointment Received';
                                                                echo '<option value="1" data-text="Yes">Yes</option>';
                                                                echo '<option value="2" data-text="No">No</option>';
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
                                                            <span id="lbl_confirmation">Confirmation</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php if ($editemp[0]->confirmation === 1) {
                                                                echo '<select id="confirmation" name="confirmation" data-oldval="1" data-oldlabel="Yes" required class="form-control">';
                                                                echo '<option value="0" data-text="">Confirmation</option>';
                                                                echo '<option selected="selected" value="1" data-text="Yes">Yes</option>';
                                                                echo '<option value="2" data-text="No">No</option>';
                                                            } else if ($editemp[0]->confirmation === 2) {
                                                                echo '<select id="confirmation" name="confirmation" data-oldval="2" data-oldlabel="No" required class="form-control">';
                                                                echo '<option value="0" data-text="">Confirmation</option>';
                                                                echo '<option value="1" data-text="Yes">Yes</option>';
                                                                echo '<option selected="selected" value="2" data-text="No">No</option>';
                                                            } else {
                                                                echo '<select id="confirmation" name="confirmation" data-oldval="" data-oldlabel="" required class="form-control">';
                                                                echo '<option selected="selected" value="0" data-text="">Confirmation</option>';
                                                                echo '<option value="1" data-text="Yes">Yes</option>';
                                                                echo '<option value="2" data-text="No">No</option>';
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_status">Status</span>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <?php if ($editemp[0]->status === 1) {
                                                                echo '<select id="status" name="status" data-oldval="1" data-oldlabel="Active" required class="form-control">';
                                                                echo '<option value="0" data-text="">Status</option>';
                                                                echo '<option selected="selected" value="1" data-text="Active">Active</option>';
                                                                echo '<option value="2" data-text="InActive">InActive</option>';
                                                            } else if ($editemp[0]->status === 2) {
                                                                echo '<select id="status" name="status" data-oldval="2" data-oldlabel="InActive" required class="form-control">';
                                                                echo '<option value="0" data-text="">Status</option>';
                                                                echo '<option value="1" data-text="Active">Active</option>';
                                                                echo '<option selected="selected" value="2" data-text="InActive">InActive</option>';
                                                            } else {
                                                                echo '<select id="status" name="status" data-oldval="" data-oldlabel="" required class="form-control">';
                                                                echo '<option selected="selected" value="0" data-text="">Status</option>';
                                                                echo '<option value="1" data-text="Active">Active</option>';
                                                                echo '<option value="2" data-text="InActive">InActive</option>';
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <span id="lbl_remarks">Remarks</span>
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

        //input.addEventListener("countrychange", function () {
        // do something with iti.getSelectedCountryData()
        //alert($('.iti__selected-dial-code').text());
        //});

        /*input.addEventListener("open:countrydropdown", function () {
            // triggered when the user opens the dropdown
        });

        input.addEventListener("close:countrydropdown", function () {
            // triggered when the user closes the dropdown
        });*/

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
                    formData.append('imgfile', $("#lbl_pic").html());
                }


                if ($("#doc").val() != "") {
                    formData.append('docfile', $('#doc')[0].files[0], $('#empname').val() + "_" + $('#empno').val() + "_doc." + ext[1]);
                } else {
                    formData.append('docfile', $("#lbl_doc").html());
                }


                var arr = $('.iti__selected-dial-code').text().split('+');
                //console.log("+" + arr[0] + "+" arr[1] + "+" + arr[2] + "+" + arr[3] + "+" + arr[4] + "+" + arr[5]);

                formData.append('landlineccode', "+" + arr[1]);
                formData.append('cellno1ccode', "+" + arr[2]);
                formData.append('cellno2ccode', "+" + arr[3]);
                formData.append('emcellnoccode', "+" + arr[4]);
                formData.append('emlandnoccode', "+" + arr[5]);


                var str = "<table width='100%'><tr><th width='25%'>Field Name</th><th width='30%'>Previous Value</th><th width='30%'>Current Value</th><th width='15%'>Eff Date</th></tr>";

                if (old_array != "") {

                    $.each(old_array[0], function (key, value) {
                        //console.log(key + " - " + value + "   ***   " + formData.get(key));

                        if (key != "userid" && key != "entrydate" && key != "id" && key != "empno") {

                            if (key == "pic") {

                                if (value != $("#lbl_pic").text()) {

                                    str += "<tr class='summaryRow' data-key='" + "pic" + "'>" +
                                        "<td class='summaryFldName'>" + "Pic" + "</td>";


                                    str += "<td class='summaryOldVal'>" + value + "</td>" +
                                        "<td class='summaryNewVal'>assets/emppic/" + $("#lbl_pic").text() + "</td>" +
                                        "<td class='summaryFldOldVal' style='display:none;'></td>" +
                                        "<td class='summaryFldNewVal' style='display:none;'></td>" +
                                        "<td class='SummaryEftDate'><input id='dt_" + key + "' name='dt_" + key + "' type='text' class='form-control pickadate-short-string' /></td>" +
                                        "</tr>";


                                    isaudit = true;
                                }

                            } else if (key == "doc") {

                                if (value != $("#lbl_doc").text()) {

                                    str += "<tr class='summaryRow' data-key='" + "doc" + "'>" +
                                        "<td class='summaryFldName'>" + "Doc" + "</td>";


                                    str += "<td class='summaryOldVal'>" + value + "</td>" +
                                        "<td class='summaryNewVal'>assets/docs/" + $("#lbl_doc").text() + "</td>" +
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


    function editData() {
        var data = [];
        var results = [];
        var flag = 0;

        var formData = new FormData($("#frm")[0]);
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


        /*for (var [key, value] of formData.entries()) {
            console.log(key + " - " + value);
        }*/

        formData.append('results', JSON.stringify(results));


        if (flag == 0) {
            // showloader();
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
        } else {
            toastMsg('Error', 'Something went wrong', 'error');
        }

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

                formData.append('landlineccode','+92');
                formData.append('cellno1ccode','+92');
                formData.append('emcellnoccode','+92');
                formData.append('emlandnoccode','+92');


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

        $("#lblerr_landline").remove();
        $("#lblerr_cellno1").remove();
        $("#lblerr_emcellno").remove();
        $("#lblerr_emlandno").remove();


        for (var i of submitedData.entries()) {

            if (i[0] != "remarks" && i[0] != "cellno2" && i[0] != "chk_landline" && i[0] != "chk_emrlandline") {

                if (i[0] != "pic" && i[0] != "doc") {

                    if (i[0] == "landline") {

                        var inp = $('#' + i[0]);


                        if (inp.val() == "" || inp.val() == "undefined" || inp.val() == "0" || inp.val() == "undefined" || inp.val() == "NULL" || inp.val() == "null" || inp.val() == null) {

                            $("#lblerr_landline").remove();
                            inp.after('<span id="lblerr_landline" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field1</span>');
                            flag = 1;
                        }

                        if ($('.iti__selected-dial-code').text() == "") {

                            $("#lblerr_landline").remove();
                            inp.after('<span id="lblerr_landline" style="width: 100%; margin-top: 0.25rem; font-size: smaller; color: #ea5455; position: absolute;">Required field2</span>');
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