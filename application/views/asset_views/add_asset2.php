<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/forms/wizard/bs-stepper.min.css">
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

            <!-- Vertical Wizard -->
            <section class="vertical-wizard">
                <div class="bs-stepper vertical vertical-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">1</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Account Details</span>
                                    <span class="bs-stepper-subtitle">Setup Account Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#personal-info-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Personal Info</span>
                                    <span class="bs-stepper-subtitle">Add Personal Info</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#address-step-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Address</span>
                                    <span class="bs-stepper-subtitle">Add Address</span>
                                </span>
                            </button>
                        </div>
                        <div class="step" data-target="#social-links-vertical">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">4</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Social Links</span>
                                    <span class="bs-stepper-subtitle">Add Social Links</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <div id="account-details-vertical" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Account Details</h5>
                                <small class="text-muted">Enter Your Account Details.</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-username">Username</label>
                                    <input type="text" id="vertical-username" class="form-control"
                                           placeholder="johndoe"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-email">Email</label>
                                    <input
                                            type="email"
                                            id="vertical-email"
                                            class="form-control"
                                            placeholder="john.doe@email.com"
                                            aria-label="john.doe"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-password-toggle col-md-6">
                                    <label class="form-label" for="vertical-password">Password</label>
                                    <input
                                            type="password"
                                            id="vertical-password"
                                            class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    />
                                </div>
                                <div class="form-group form-password-toggle col-md-6">
                                    <label class="form-label" for="vertical-confirm-password">Confirm Password</label>
                                    <input
                                            type="password"
                                            id="vertical-confirm-password"
                                            class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    />
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-secondary btn-prev" disabled>
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
                                <h5 class="mb-0">Personal Info</h5>
                                <small>Enter Your Personal Info.</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-first-name">First Name</label>
                                    <input type="text" id="vertical-first-name" class="form-control"
                                           placeholder="John"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-last-name">Last Name</label>
                                    <input type="text" id="vertical-last-name" class="form-control" placeholder="Doe"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-country">Country</label>
                                    <select class="select2 w-100" id="vertical-country">
                                        <option label=" "></option>
                                        <option>UK</option>
                                        <option>USA</option>
                                        <option>Spain</option>
                                        <option>France</option>
                                        <option>Italy</option>
                                        <option>Australia</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-language">Language</label>
                                    <select class="select2 w-100" id="vertical-language" multiple>
                                        <option>English</option>
                                        <option>French</option>
                                        <option>Spanish</option>
                                    </select>
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
                        <div id="address-step-vertical" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Address</h5>
                                <small>Enter Your Address.</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-address">Address</label>
                                    <input
                                            type="text"
                                            id="vertical-address"
                                            class="form-control"
                                            placeholder="98  Borough bridge Road, Birmingham"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-landmark">Landmark</label>
                                    <input type="text" id="vertical-landmark" class="form-control"
                                           placeholder="Borough bridge"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="pincode2">Pincode</label>
                                    <input type="text" id="pincode2" class="form-control" placeholder="658921"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="city2">City</label>
                                    <input type="text" id="city2" class="form-control" placeholder="Birmingham"/>
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
                        <div id="social-links-vertical" class="content">
                            <div class="content-header">
                                <h5 class="mb-0">Social Links</h5>
                                <small>Enter Your Social Links.</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-twitter">Twitter</label>
                                    <input type="text" id="vertical-twitter" class="form-control"
                                           placeholder="https://twitter.com/abc"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-facebook">Facebook</label>
                                    <input type="text" id="vertical-facebook" class="form-control"
                                           placeholder="https://facebook.com/abc"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-google">Google+</label>
                                    <input type="text" id="vertical-google" class="form-control"
                                           placeholder="https://plus.google.com/abc"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="vertical-linkedin">Linkedin</label>
                                    <input type="text" id="vertical-linkedin" class="form-control"
                                           placeholder="https://linkedin.com/abc"/>
                                </div>
                            </div>
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

            <section class="basic-select2">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">






                                    </div>

                                    <div class="">
                                        <button type="button" class="btn btn-primary mybtn btn-block"
                                                onclick="insertData()">
                                            Insert Asset
                                        </button>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-12">
                                            <h4 class="res_heading" style="color: green;"></h4>
                                            <p class="res_msg" style="color: green;"></p>
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
<!-- END: Content-->
<script src="<?php echo base_url() ?>assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
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