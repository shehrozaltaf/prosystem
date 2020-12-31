<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Report</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Report</li>
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
                                                <label for="prjn_month" class="label-control">Month</label>
                                                <select name="prjn_month" id="prjn_month" class="form-control select2"
                                                        autocomplete="prjn_month" required onchange="changeMY()">
                                                    <option value="0" readonly disabled selected></option>
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
                                                <label for="prjn_year" class="label-control">Year</label>
                                                <select name="prjn_year" id="prjn_year"
                                                        class="form-control prjn_year select2" rowNo="0"
                                                        autocomplete="prjn_year" required onchange="changeMY()">
                                                    <option value="0" readonly disabled selected></option>
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
                                                        autocomplete="bdgt_code" required>
                                                    <option value="0" readonly disabled selected></option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class=" ">
                                        <button type="button" class="btn btn-primary mybtn" onclick="getReport()">
                                            Get Report
                                        </button>
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
    $(document).ready(function () {
    });

    function changeMY() {
        var data = {};
        data['month'] = $('#prjn_month').val();
        data['year'] = $('#prjn_year').val();
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
        data['prjn_month'] = $("#prjn_month").val();
        data['prjn_year'] = $("#prjn_year").val();
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
            $('.myPercentage').html('Max: ' + $("#bdgt_code option:selected").attr("data-per") + '%');
            CallAjax('<?php echo base_url('index.php/budget_controllers/Budget/getEmployees'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' ';
                        $.each(response[1], function (i, v) {
                            post += '<li class="list-group-item" data-empNo="' + v.empno + '">' +
                                '<div class="media">' +
                                ' <img src="<?php echo base_url()?>' + v.pic + '" ' +
                                'class="rounded-circle mr-2"  height="50" width="50">' +
                                '<div class="media-body mt-0"">' +
                                '<h5 class="mt-0">' + v.empname + '</h5>' +
                                ' <p class="mt-0 ml-2"><small>Employee No:</small> ' + v.empno + '<br>' +
                                ' <small>Designation:</small> ' + v.desig +
                                '<input type="text" name="perc" maxlength="3" value="100"   onfocusout="validatePercentage(this)" class="form-control perc hide" placeholder="Percentage">' +
                                '</p>' +
                                ' </div>' +
                                '</div>' +
                                '</li>';
                        });
                        $('.selectedEmpList').html('');
                        $('.empList').html(post);
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

    function getReport() {
        var flag=0;
        var data = {};
        data['prjn_month'] = $("#prjn_month").val();
        data['prjn_year'] = $("#prjn_year").val();
        data['proj_code'] = $('#proj_code').val();
        data['bdgt_code'] = $("#bdgt_code").val();
        var url = '<?php echo base_url('index.php/budget_controllers/Reports/getExcel?r=1') ?>';
        if (data['prjn_month'] != '' && data['prjn_month'] != undefined && data['prjn_month'] != null) {
            url += '&m=' + data['prjn_month'];
        }
        if (data['prjn_year'] != '' && data['prjn_year'] != undefined && data['prjn_year'] != null) {
            url += '&y=' + data['prjn_year'];
        }
        if (data['proj_code'] != '' && data['proj_code'] != undefined && data['proj_code'] != null) {
            url += '&p=' + data['proj_code'];
        }
        if (data['bdgt_code'] != '' && data['bdgt_code'] != undefined && data['bdgt_code'] != null) {
            url += '&b=' + data['bdgt_code'];
        }
        if (flag == 0) {
            window.open(url, '_blank');
        } else {
            toastMsg('Error', 'Something went wrong', 'error');
        }
    }

</script>