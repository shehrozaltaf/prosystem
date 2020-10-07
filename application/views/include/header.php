<?php error_reporting(0); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="<?php echo PROJECT_NAME ?>">
    <meta name="keywords" content="<?php echo PROJECT_NAME ?>">
    <meta name="author" content="Javed Ahmed Khan">
    <title><?php echo PROJECT_NAME ?></title>
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">


    <script src="<?php echo base_url() ?>assets/build/js/intlTelInput.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/build/css/intlTelInput.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/build/css/demo.css">


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/css/extensions/toastr.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/themes/semi-dark-layout.css">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url() ?>assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/extensions/toastr.css">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <!-- END: Custom CSS-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url() ?>assets/vendors/js/vendors.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts/jquery.maskedinput.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts/jquery.inputmask.bundle.js"></script>
    <!-- BEGIN Vendor JS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url() ?>assets/vendors/css/forms/select/select2.min.css">


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url() ?>assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url() ?>assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core/app.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url() ?>assets/js/scripts/modal/components-modal.js"></script>
    <!-- END: Page JS-->


    <!-- begin chameleon-admin-template -->

    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url() ?>assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/vendors/js/forms/toggle/switchery.min.js"
            type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url() ?>assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
            type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
            type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/vendors/js/forms/extended/card/jquery.card.js"
            type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url() ?>assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/core/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts/customizer.min.js" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url() ?>assets/js/scripts/form-inputmask.min.js"
            type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts/form-maxlength.min.js"
            type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts/form-card.min.js"
            type="text/javascript"></script>
    <!-- END: Page JS-->

    <!-- end chameleon-admin-template -->

    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url() ?>assets/vendors/css/pickers/pickadate/pickadate.css">


    <script src="<?php echo base_url() ?>assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/js/pickers/pickadate/legacy.js"></script>

    <!--    <script src="-->
    <?php //echo base_url() ?><!--assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  "
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
