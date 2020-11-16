<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Add Budget</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Budget</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
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
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="proj_code" class="label-control">Project</label>
                                                <select name="proj_code" id="proj_code" class="form-control select2"
                                                        autocomplete="proj_code" required>
                                                    <option value="0" readonly disabled selected>Select Project</option>
                                                    <?php if (isset($project) && $project != '') {

                                                        foreach ($project as $k => $p) {
                                                            echo ' <option value="' . $p->proj_code . '">' . $p->proj_code . ' (' . $p->proj_name . ')</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="bdgt_code" class="label-control">Budget Code</label>
                                                <input type="text" class="form-control" id="bdgt_code"
                                                       name="bdgt_code" maxlength="9"
                                                       autocomplete="bdgt_code" required>

                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-6 col-6">
                                             <div class="form-group">
                                                 <label for="bdgt_posi" class="label-control">Position</label>
                                                 <input type="text" class="form-control" id="bdgt_posi" name="bdgt_posi"
                                                        autocomplete="bdgt_posi" required>

                                             </div>
                                         </div>-->
                                        <!-- <div class="col-sm-6 col-6">
                                             <div class="form-group">
                                                 <label for="bdgt_band" class="label-control">Budget Band</label>
                                                 <input type="text" class="form-control" id="bdgt_band" name="bdgt_band"
                                                        autocomplete="bdgt_band" required>

                                             </div>
                                         </div>-->
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="bdgt_band" class="label-control">Band</label>
                                                <select name="bdgt_band" id="bdgt_band" class="form-control select2"
                                                        autocomplete="bdgt_band" required onchange="chngeBand()">
                                                    <option value="0" readonly disabled selected>Select Band</option>
                                                    <?php if (isset($band) && $band != '') {
                                                        foreach ($band as $b) {
                                                            echo ' <option value="' . $b->id . '">' . $b->band . '  </option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="bdgt_posi" class="label-control">Position</label>
                                                <select name="bdgt_posi" id="bdgt_posi" class="form-control select2"
                                                        autocomplete="bdgt_posi" required>
                                                    <option value="0" readonly disabled selected>Select
                                                        Position
                                                    </option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="bdgt_amnt" class="label-control">Amount</label>
                                                <input type="text" class="form-control" id="bdgt_amnt"
                                                       name="bdgt_amnt" maxlength="7" max="7"
                                                       autocomplete="bdgt_amnt" required>

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="bdgt_pctg" class="label-control">Percentage (%)</label>
                                                <input type="text" class="form-control" id="bdgt_pctg"
                                                       name="bdgt_pctg" maxlength="3" max="3"
                                                       autocomplete="bdgt_pctg" required>

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="bdgt_start_month" class="label-control">Start Month</label>
                                                <select name="bdgt_start_month" id="bdgt_start_month"
                                                        class="form-control select2"
                                                        autocomplete="bdgt_start_month" required>
                                                    <option value="0" readonly disabled selected>Start Month</option>
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="bdgt_start_year" class="label-control">Start Year</label>
                                                <select name="bdgt_start_year" id="bdgt_start_year"
                                                        class="form-control select2"
                                                        autocomplete="bdgt_start_year" required>
                                                    <option value="0" readonly disabled selected>Start Year</option>
                                                    <?php
                                                    for ($year = date('Y'); $year >= 2000; $year--) {
                                                        echo ' <option value="' . $year . '">' . $year . '</option>';
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="bdgt_end_month" class="label-control">End Month</label>
                                                <select name="bdgt_end_month" id="bdgt_end_month"
                                                        class="form-control select2"
                                                        autocomplete="bdgt_end_month" required>
                                                    <option value="0" readonly disabled selected>End Month</option>
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="bdgt_year" class="label-control">End Year</label>
                                                <select name="bdgt_year" id="bdgt_year" class="form-control select2"
                                                        autocomplete="bdgt_end_year" required>
                                                    <option value="0" readonly disabled selected>End Year</option>
                                                    <?php
                                                    for ($year = date('Y'); $year >= 2000; $year--) {
                                                        echo ' <option value="' . $year . '">' . $year . '</option>';
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-primary mybtn" onclick="insertData()">
                                                Insert Budget
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
                    </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

<script>
    function chngeBand() {
        var data = {};
        data['bdgt_band'] = $('#bdgt_band').val();
        if (data['bdgt_band'] != '' && data['bdgt_band'] != undefined) {
            CallAjax('<?php echo base_url('index.php/budget_controllers/Budget/getDesignation'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' <option value="0" readonly disabled selected>Select Position</option>';
                        $.each(response[1], function (i, v) {
                            post += '<option value="' + v.id + '">' + v.desig + '</option>';
                        });
                        $('#bdgt_posi').html(post);
                    } else {
                        toastMsg(response[0], response[1], 'error');
                    }
                } catch (e) {
                }
            });
        } else {
            toastMsg('Error', 'Invalid Band Id', 'error');
        }

    }

    $(document).ready(function () {
        validateNum('bdgt_amnt');
        validateNum('bdgt_pctg');
    });

    function insertData() {
        var data = {};
        data['proj_code'] = $('#proj_code').val();
        data['bdgt_code'] = $('#bdgt_code').val();
        data['bdgt_posi'] = $('#bdgt_posi').val();
        data['bdgt_band'] = $('#bdgt_band').val();
        data['bdgt_amnt'] = $('#bdgt_amnt').val();
        data['bdgt_pctg'] = $('#bdgt_pctg').val();
        data['bdgt_start_month'] = $('#bdgt_start_month').val();
        data['bdgt_start_year'] = $('#bdgt_start_year').val();
        data['bdgt_end_month'] = $('#bdgt_end_month').val();
        data['bdgt_end_year'] = $('#bdgt_end_year').val();
        var vd = validateData(data);
        if (vd) {
            showloader();
            $('.mybtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/budget_controllers/Budget/insertData'); ?>', data, 'POST', function (result) {
                hideloader();
                $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        toastMsg(response[0], response[1], 'success');
                        $('.res_heading').html(response[0]).css('color', 'green');
                        $('.res_msg').html(response[1]).css('color', 'green');
                        setTimeout(function () {
                            window.location.href = '<?php echo base_url('index.php/budget_controllers/Budget') ?>';
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