<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Add Actual</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Actual</li>
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
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="actl_month" class="label-control">Month</label>
                                                <select name="actl_month" id="actl_month" class="form-control select2"
                                                        autocomplete="actl_month" required onchange="changeMY()">
                                                    <option value="0" readonly disabled selected>Select Month</option>
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
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="actl_year" class="label-control">Year</label>

                                                <select name="actl_year" id="actl_year" class="form-control select2"
                                                        autocomplete="actl_year" required onchange="changeMY()">
                                                    <option value="0" readonly disabled selected>Select Year</option>
                                                    <?php
                                                    for ($year = date('Y', strtotime(" + 1 year")); $year >= 2015; $year--) {
                                                        echo ' <option value="' . $year . '">' . $year . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="proj_code" class="label-control">Project Code</label>
                                                <select name="proj_code" id="proj_code" class="form-control select2"
                                                        autocomplete="proj_code" required
                                                        onchange="chngeProject_Band(this)">
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php /* if (isset($project) && $project != '') {
                                                        foreach ($project as $k => $p) {
                                                            echo ' <option value="' . $p->proj_code . '">' . $p->proj_code . '(' . $p->proj_name . ')</option>';
                                                        }
                                                    }*/ ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="bdgt_code" class="label-control">Position No</label>
                                                <select name="bdgt_code" id="bdgt_code" class="form-control select2"
                                                        autocomplete="bdgt_code" required onchange=" chngeBand_Emp()">
                                                    <option value="0" readonly disabled selected></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="empl_code" class="label-control">Employee Code</label>
                                                <select name="empl_code" id="empl_code" class="form-control empl_code select2"
                                                        autocomplete="empl_code" required  >
                                                    <option value="0" readonly disabled selected></option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="actl_pctg" class="label-control">Percentage</label>
                                                <input type="text" class="form-control" id="actl_pctg"
                                                       name="actl_pctg"
                                                       autocomplete="actl_pctg" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-primary mybtn "
                                                    onclick="insertData()">
                                                Insert Asset
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

    function changeMY() {
        var data = {};
        data['month'] = $('#actl_month').val();
        data['year'] = $('#actl_year').val();
        if (data['month'] != '' && data['month'] != undefined && data['year'] != '' && data['year'] != undefined) {
            CallAjax('<?php echo base_url('index.php/budget_controllers/Project/getProjectByMY'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' <option value="0" data-band="0" readonly disabled selected>Select Project</option>';
                        $.each(response[1], function (i, v) {
                            post += '<option value="' + v.proj_code + '"  >' + v.proj_name + '</option>';
                        });
                        $('#proj_code').html(post);
                    } else {
                        toastMsg(response[0], response[1], 'error');
                    }
                } catch (e) {
                }
            });
        }
    }

    function chngeProject_Band(obj) {
        var data = {};
        data['month'] = $("#actl_month").val();
        data['year'] = $("#actl_year").val();
        data['proj_code'] = $('#proj_code').val();
        if (data['proj_code'] != '' && data['proj_code'] != undefined) {
            $('#bdgt_code').html('');
            CallAjax('<?php echo base_url('index.php/budget_controllers/Project/getBands'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' <option value="0" data-band="0" readonly disabled selected>Select Position</option>';
                        $.each(response[1], function (i, v) {
                            post += '<option value="' + v.bdgt_code + '" data-per="' + v.bdgt_pctg + '" data-band="' + v.bdgt_band + '">' + v.bdgt_code +
                                ' (' + v.desig + ' - Amount: ' + v.bdgt_amnt +
                                ' percentage: ' + v.bdgt_pctg + '% - Band: ' + v.band + ')</option>';
                        });
                        $('#bdgt_code').html(post);
                    } else {
                        toastMsg(response[0], response[1], 'error');
                    }
                } catch (e) {
                }
            });
        } else {
            toastMsg('Error', 'Invalid Project', 'error');
        }
    }

    function chngeBand_Emp() {
        var data = {};
        data['bdgt_code'] = $("#bdgt_code option:selected").attr("data-band");
        if (data['bdgt_code'] != '' && data['bdgt_code'] != undefined) {
            CallAjax('<?php echo base_url('index.php/budget_controllers/Budget/getEmployees'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' ';
                        var post = ' <option value="0" data-band="0" readonly disabled selected>Select Position</option>';
                        $.each(response[1], function (i, v) {
                            post += '<option value="' + v.empno + '" >' + v.empname +
                                ' (' + v.empno + ')</option>';
                        });
                        $('#empl_code').html(post);
                        validateNumByClass('perc');
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


    function insertData() {
        var data = {};
        data['actl_month'] = $('#actl_month').val();
        data['actl_year'] = $('#actl_year').val();
        data['proj_code'] = $('#proj_code').val();
        data['bdgt_code'] = $('#bdgt_code').val();
        data['empl_code'] = $('#empl_code').val();
        data['actl_pctg'] = $('#actl_pctg').val();
        var vd = validateData(data);
        if (vd) {
            showloader();
            $('.mybtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/budget_controllers/Actual/insertData'); ?>', data, 'POST', function (result) {
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