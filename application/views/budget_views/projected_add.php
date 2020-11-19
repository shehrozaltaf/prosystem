<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Add Projected</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Projected</li>
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
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="proj_code" class="label-control">Project Code</label>
                                                <select name="proj_code" id="proj_code" class="form-control select2"
                                                        autocomplete="proj_code" required
                                                        onchange="chngeProject_Band(this)">
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php if (isset($project) && $project != '') {
                                                        foreach ($project as $k => $p) {
                                                            echo ' <option value="' . $p->proj_code . '">' . $p->proj_code . '(' . $p->proj_name . ')</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="bdgt_code" class="label-control">Budget Code</label>
                                                <select name="bdgt_code" id="bdgt_code" class="form-control select2"
                                                        autocomplete="bdgt_code" required onchange="chngeBand_Emp(this)">
                                                    <option value="0" readonly disabled selected></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="empl_code" class="label-control">Employee Code</label>
                                                <select name="empl_code" id="empl_code" class="form-control select2"
                                                        autocomplete="empl_code" required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php /* if (isset($hr_employee) && $hr_employee != '') {
                                                        foreach ($hr_employee as $e) {
                                                            echo ' <option value="' . $e->empno . '">' . $e->empname . '(' . $e->empno . ')</option>';
                                                        }
                                                    } */ ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-primary btn-block mybtn"
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
    function chngeProject_Band(obj) {
        var data = {};
        data['proj_code'] = $('#proj_code').val();
        if (data['proj_code'] != '' && data['proj_code'] != undefined) {
            CallAjax('<?php echo base_url('index.php/budget_controllers/Project/getBands'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' <option value="0" data-band="0" readonly disabled selected>Select Position</option>';
                        $.each(response[1], function (i, v) {
                            post += '<option value="' + v.bdgt_code + '" data-band="'+v.bdgt_band+'">' + v.bdgt_code +
                                ' (position: ' + v.bdgt_code + ' - Amount: ' + v.bdgt_amnt +
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

    function chngeBand_Emp(obj) {
        var data = {};
        data['bdgt_code'] = $("#bdgt_code option:selected").attr("data-band");
        if (data['bdgt_code'] != '' && data['bdgt_code'] != undefined) {
            CallAjax('<?php echo base_url('index.php/budget_controllers/Project/getEmployees'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' <option value="0" readonly disabled selected>Select Position</option>';
                        $.each(response[1], function (i, v) {
                            post += '<option value="' + v.empno + '" >' + v.empname + ' (position: ' + v.empno + ')</option>';
                        });
                        $('#empl_code').html(post);
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
        data['proj_code'] = $('#proj_code').val();
        data['empl_code'] = $('#empl_code').val();
        data['bdgt_code'] = $('#bdgt_code').val();
        /* data['prjn_pctg'] = $('#prjn_pctg').val();
         data['prjn_month'] = $('#prjn_month').val();
         data['prjn_year'] = $('#prjn_year').val();*/
        var vd = validateData(data);
        if (vd) {
            showloader();
            $('.mybtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/budget_controllers/Projected/insertData'); ?>', data, 'POST', function (result) {
                hideloader();
                $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        toastMsg(response[0], response[1], 'success');
                        $('.res_heading').html(response[0]).css('color', 'green');
                        $('.res_msg').html(response[1]).css('color', 'green');
                        setTimeout(function () {
                            window.location.href = '<?php echo base_url('index.php/budget_controllers/Projected') ?>';
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