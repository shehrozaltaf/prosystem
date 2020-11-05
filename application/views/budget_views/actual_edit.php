<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Actual</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Actual</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="basic-select2">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <?php $mydata = $data[0]; ?>
                                        <input type="hidden" id="idActual" name="idActual"
                                               autocomplete="idActual" required
                                               value="<?php echo(isset($mydata->idActual) && $mydata->idActual != '' ? $mydata->idActual : '') ?>">

                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="proj_code" class="label-control">Project Code</label>
                                                <select name="proj_code" id="proj_code" class="form-control select2"
                                                        autocomplete="proj_code" required>
                                                    <option value="0" readonly>Select Project</option>
                                                    <?php if (isset($project) && $project != '') {

                                                        foreach ($project as $k => $p) {
                                                            echo ' <option value="' . $p->proj_code . '" 
                                                                ' . (isset($mydata->proj_code) && $mydata->proj_code == $p->proj_code ? 'selected' : '') . '>' . $p->proj_code . '(' . $p->proj_name . ')</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="empl_code" class="label-control">Employee Code</label>
                                                <input type="text" class="form-control" id="empl_code"
                                                       name="empl_code"
                                                       autocomplete="empl_code" required
                                                       value="<?php echo(isset($mydata->empl_code) && $mydata->empl_code != '' ? $mydata->empl_code : '') ?>">

                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-4">
                                            <div class="form-group">
                                                <label for="actl_pctg" class="label-control">Percentage</label>
                                                <input type="text" class="form-control" id="actl_pctg"
                                                       name="actl_pctg"
                                                       autocomplete="actl_pctg" required
                                                       value="<?php echo(isset($mydata->actl_pctg) && $mydata->actl_pctg != '' ? $mydata->actl_pctg : '') ?>">


                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-4">
                                            <div class="form-group">
                                                <label for="actl_month" class="label-control">Month</label>

                                                <select name="actl_month" id="actl_month" class="form-control select2"
                                                        autocomplete="actl_month" required>
                                                    <option value="0" readonly disabled selected>Select Month</option>
                                                    <option value="01" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 1 ? 'selected' : '') ?>>
                                                        January
                                                    </option>
                                                    <option value="02" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 2 ? 'selected' : '') ?>>February</option>
                                                    <option value="03" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 3 ? 'selected' : '') ?>>March</option>
                                                    <option value="04" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 4 ? 'selected' : '') ?>>April</option>
                                                    <option value="05" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 5 ? 'selected' : '') ?>>May</option>
                                                    <option value="06" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 6 ? 'selected' : '') ?>>June</option>
                                                    <option value="07" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 7 ? 'selected' : '') ?>>July</option>
                                                    <option value="08" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 8 ? 'selected' : '') ?>>August</option>
                                                    <option value="09" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 9 ? 'selected' : '') ?>>September</option>
                                                    <option value="10" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 10 ? 'selected' : '') ?>>October</option>
                                                    <option value="11" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 11 ? 'selected' : '') ?>>November</option>
                                                    <option value="12" <?php echo(isset($mydata->actl_month) && $mydata->actl_month == 12 ? 'selected' : '') ?>>December</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-4">
                                            <div class="form-group">
                                                <label for="actl_year" class="label-control">Year</label>
                                                <select name="actl_year" id="actl_year" class="form-control select2"
                                                        autocomplete="actl_year" required>
                                                    <option value="0" readonly>Select Year</option>
                                                    <?php
                                                    for ($year = date('Y'); $year >= 2000; $year--) {
                                                        echo ' <option value="' . $year . '" '.(isset($mydata->actl_year) && $mydata->actl_year == $year ? 'selected' : '').'>' . $year . '</option>';
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-primary mybtn"
                                                    onclick="updateData()">
                                                Save
                                            </button>
                                        </div>
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
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->


<script>

    function updateData() {
        var data = {};
        data['idActual'] = $('#idActual').val();
        data['proj_code'] = $('#proj_code').val();
        data['empl_code'] = $('#empl_code').val();
        data['actl_pctg'] = $('#actl_pctg').val();
        data['actl_month'] = $('#actl_month').val();
        data['actl_year'] = $('#actl_year').val();
        var vd = validateData(data);
        if (vd) {
            showloader();
            $('.mybtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/budget_controllers/Actual/updateData'); ?>', data, 'POST', function (result) {
                hideloader();
                $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        toastMsg(response[0], response[1], 'success');
                        $('.res_heading').html(response[0]).css('color', 'green');
                        $('.res_msg').html(response[1]).css('color', 'green');
                        setTimeout(function () {
                            window.location.href = '<?php echo base_url('index.php/budget_controllers/Actual') ?>';
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