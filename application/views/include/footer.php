<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; <?php echo date('Y') ?><a
                    class="text-bold-800 grey darken-2" href="http://www.aku.edu"
                    target="_blank"><?php echo PROJECT_NAME ?>,</a>All rights Reserved</span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->

<?php if (isset($permission[0]->menuClass) && $permission[0]->menuClass != '') {
    $menuactive = $permission[0]->menuClass;
} else {
    $menuactive = '';
} ?>
<input type="hidden" id="menuactive" value="<?php echo $menuactive ?>">

<script>
    $(document).ready(function () {
        getMenu();
        setTimeout(function () {
            var men = $('#menuactive').val();
            $('.' + men).addClass('active').parents('li').addClass('sidebar-group-active open');
        }, 500);

    });

    function logout() {
        CallAjax('<?php echo base_url('index.php/Login/getLogout')?>', {}, 'POST', function (res) {
            window.location.href = "<?php echo base_url() ?>";
        });
    }

    function getMenu() {
        CallAjax('<?php echo base_url('index.php/Dashboard/getMenuData') ?>', [], "POST", function (Result) {
            $('#main-menu-navigation').html(Result);
        });
    }


    function pickDate() {
        $('.pickadate-short-string').pickadate({
            selectYears: true,
            selectMonths: true,
            weekdaysShort: ['S', 'M', 'Tu', 'W', 'Th', 'F', 'S'],
            format: 'dd-mm-yyyy',
            showMonthsShort: true
        });
    }

</script>


<!-- BEGIN: Theme JS-->
<script src="<?php echo base_url() ?>assets/vendors/js/extensions/toastr.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/app-menu.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/app.js"></script>
<script src="<?php echo base_url() ?>assets/js/scripts/components.js"></script>
<!--<script src="--><?php //echo base_url() ?><!--assets/js/scripts/extensions/toastr.js"></script>-->
<!-- END: Theme JS-->

<script src="<?php echo base_url() ?>assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/scripts/forms/select/form-select2.js"></script>

</body>
<!-- END: Body-->
</html>