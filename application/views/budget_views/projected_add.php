<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/css/extensions/dragula.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/extensions/drag-and-drop.css">

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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
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
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="bdgt_code" class="label-control">Budget Code</label>
                                                <select name="bdgt_code" id="bdgt_code" class="form-control select2"
                                                        autocomplete="bdgt_code" required
                                                        onchange="chngeBand_Emp(this)">
                                                    <option value="0" readonly disabled selected></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="prjn_month" class="label-control">Month-Year</label>
                                                <select name="prjn_month" id="prjn_month" class="form-control select2"
                                                        autocomplete="prjn_month" required>
                                                    <option value="0" readonly disabled selected></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Select Employees
                                </h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p>Drag and drop employees from right side to left side to select in the budget.</p>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <h4 class="my-1">Selected</h4>
                                            <ul class="list-group list-group-flush selectedEmpList"
                                                id="multiple-list-group-a">
                                                <!-- <li class="list-group-item">
                                                     <div class="media">
                                                         <div class="media-body">
                                                             <h5 class="mt-0">Mary S. Navarre</h5>
                                                             Chupa chups tiramisu apple pie biscuit sweet roll bonbon
                                                             macaroon.
                                                         </div>
                                                     </div>
                                                 </li> -->
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <h4 class="my-1">Employees</h4>
                                            <ul class="list-group list-group-flush empList" id="multiple-list-group-b">
                                                <!--<li class="list-group-item empList">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h5 class="mt-0">Mary S. Navarre</h5>
                                                            Chupa chups tiramisu apple pie biscuit sweet roll bonbon
                                                            macaroon.
                                                        </div>
                                                    </div>
                                                </li>-->

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
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
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

<script src="<?php echo base_url() ?>assets/vendors/js/extensions/dragula.min.js"></script>
<!--<script src=".--><?php //echo base_url() ?><!--assets/js/scripts/extensions/drag-drop.js"></script>-->
<script>
    $(document).ready(function () {
        validateNum('prjn_pctg');
        // dragula([document.getElementById('multiple-list-group-a'), document.getElementById('multiple-list-group-b')]);
        dragula([document.getElementById('multiple-list-group-a'), document.getElementById('multiple-list-group-b')])
            .on('drop', function (el) {
                if ($(el).parents('ul').hasClass('selectedEmpList')) {
                    $(el).find('.perc').addClass('show').removeClass('hide');
                } else {
                    $(el).find('.perc').addClass('hide').removeClass('show');
                }
            });
    });

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
                            post += '<option value="' + v.bdgt_code + '" data-per="' + v.bdgt_pctg + '" data-band="' + v.bdgt_band + '">' + v.bdgt_code +
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
            $('.myPercentage').html('Max: ' + $("#bdgt_code option:selected").attr("data-per") + '%');
            chngeBand_Month_Year();
            CallAjax('<?php echo base_url('index.php/budget_controllers/Budget/getEmployees'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' ';
                        $.each(response[1], function (i, v) {
                            post += '<li class="list-group-item">' +
                                '<div class="media">' +
                                ' <img src="<?php echo base_url()?>' + v.pic + '" ' +
                                'class="rounded-circle mr-2"  height="50" width="50">' +
                                '<div class="media-body mt-0"">' +
                                '<h5 class="mt-0">' + v.empname + '</h5>' +
                                ' <p class="mt-0 ml-2"><small>Employee No:</small> ' + v.empno + '<br>' +
                                ' <small>Designation:</small> ' + v.desig + '' +
                                '<input type="text" name="perc" class="form-control perc hide" placeholder="Percentage">' +
                                '</p>' +
                                ' </div>' +
                                '</div>' +
                                '</li>';
                        });
                        $('.empList').html(post);
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

    function chngeBand_Month_Year() {
        var data = {};
        data['proj_code'] = $('#proj_code').val();
        data['bdgt_code'] = $('#bdgt_code').val();
        if (data['bdgt_code'] != '' && data['bdgt_code'] != undefined && data['proj_code'] != '' && data['proj_code'] != undefined) {
            CallAjax('<?php echo base_url('index.php/budget_controllers/Budget/getBand_Month_Year'); ?>', data, 'POST', function (result) {
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        var post = ' <option value="0" readonly disabled selected>Select Month-Year</option>';
                        $.each(response[1], function (i, v) {
                            post += '<option value="' + v + '" >' + v + '</option>';
                        });
                        $('#prjn_month').html(post);
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
        data['prjn_pctg'] = $('#prjn_pctg').val();
        data['prjn_month'] = $('#prjn_month').val();
        data['prjn_year'] = $('#prjn_year').val();
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