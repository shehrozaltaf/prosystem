<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Upload Data</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active">Upload</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="basic-select2" id="dropzone-examples">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <!-- <form method="post" id="upload_form" enctype="multipart/form-data">
                                         <div class="col-md-6" align="right">Select File</div>
                                         <div class="col-md-6">
                                             <input type="file" name="file" id="csv_file" />
                                         </div>
                                         <br /><br /><br />
                                         <div class="col-md-12" align="center">
                                             <input type="submit" name="upload_file" id="upload_file" class="btn btn-primary" value="Upload" />
                                         </div>
                                     </form>-->
                                    <form id="document_form" method="post"
                                          onsubmit="return false" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <h4 class="card-title">Table</h4>
                                                <div class="form-group">
                                                    <select class="select2 form-control idTable" id="idTable"
                                                            name="idTable" required onchange="requiredField()">
                                                        <option value="0" readonly disabled selected>Table Type
                                                        </option>
                                                        <option value="project">Project</option>
                                                        <option value="b_budget">Budget</option>
                                                        <option value="b_actual">Actual - Budget</option>
                                                        <option value="b_projected">Projected - Budget</option>
                                                        <option value="devices">Inventory - Add Asset</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <h4 class="card-title">Upload File
                                                    <small class="danger font-small-2">Note: Only CSV allowed</small>
                                                </h4>
                                                <p></p>
                                                <div class="form-group">
                                                    <!--                                                        <input type="file" class="form-control" -->
                                                    <!--                                                               id="document_file" name="document_file" required>-->
                                                    <input type="file" class="form-control"
                                                           name="file" id="csv_file" required>
                                                </div>
                                            </div>
                                        </div>


                                        <?php if (isset($permission[0]->CanAdd) && $permission[0]->CanAdd == 1) { ?>

                                            <!--   <div class="col-md-12" >
                                                   <input type="submit" name="upload_file" id="upload_file"
                                                          class="btn btn-primary" value="Upload"/>
                                               </div>-->

                                            <button type="submit" class="btn btn-primary mybtn" name="upload_file"
                                                    id="upload_file">
                                                Submit
                                            </button>
                                        <?php } ?>

                                        <div class="row danger requiredFieldDiv hide mt-1">
                                            <div class="col-12 col-sm-12">
                                                <h6 class="danger">Required Fields</h6>
                                                <ul class="required_ul">
                                                </ul>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="row m-1">
                                        <div class="col-sm-12">
                                            <h4 class="res_heading" style="color: green;"></h4>
                                            <p class="res_msg" style="color: green;"></p>
                                        </div>
                                    </div>

                                    <div class="table-responsive" id="process_area">

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
<script>
    var total_selection = 0;
    var column_data = [];
    $(document).ready(function () {
        $('#document_form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('index.php/Upload_data/upload') ?>",
                method: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('.res_heading').html('');
                    $('.res_msg').html('');

                    if (data.error != '') {
                        $('.res_heading').html('Error').css('color', 'red');
                        $('.res_msg').html(data.error).css('color', 'red');
                    } else {
                        $('#process_area').html(data.output);
                        setTimeout(function () {
                            chkCol(this);
                        }, 500);
                    }
                }
            });
        });

    });


    function chkCol(obj) {
        var flag = 0;
        var head = [];
        var thead = $('.myTable').find('thead').find('select');
        $.each(thead, function (i, v) {
            var mykeysVal = $(v).val();
            if (mykeysVal != '' && mykeysVal != undefined) {
                if (head.indexOf(mykeysVal) == '-1') {
                    head.push(mykeysVal);
                    $(v).css('border', '1px solid black');
                } else {
                    $(v).css('border', '1px solid red');
                    toastMsg('Error', 'You have already define ' + v + ' column', 'error');
                    flag = 1;
                    return false;
                }
            } else {
                $(v).css('border', '1px solid red');
                toastMsg('Table', 'Invalid Table', 'error');
                flag = 1;
                return false;
            }
        });
        if (flag == 0 && head.length >= 1) {
            $('#import').attr('disabled', false);
        } else {
            $('#import').attr('disabled', 'disabled');
        }
    }

    function requiredField() {
        $('.requiredFieldDiv').addClass('hide').find('ul').html('');
        var idTable = $('#idTable').val();
        var html = '';
        if (idTable == 'project') {
            html += '<li>proj_code</li>';
            html += '<li>proj_name</li>';
            html += '<li>proj_priv</li>';
            html += '<li>proj_sn</li>';
        } else if (idTable == 'b_actual') {
            html += '<li>proj_code</li>';
            html += '<li>empl_code</li>';
            html += '<li>actl_pctg</li>';
            html += '<li>actl_month</li>';
            html += '<li>actl_year</li>';
        } else if (idTable == 'b_budget') {
            html += '<li>proj_code</li>';
            html += '<li>bdgt_code</li>';
            html += '<li>bdgt_posi</li>';
            html += '<li>bdgt_band</li>';
            html += '<li>bdgt_amnt</li>';
            html += '<li>bdgt_pctg</li>';
            html += '<li>bdgt_month</li>';
            html += '<li>bdgt_year</li>';
        } else if (idTable == 'b_projected') {
            html += '<li>proj_code</li>';
            html += '<li>empl_code</li>';
            html += '<li>prjn_pctg</li>';
            html += '<li>prjn_month</li>';
            html += '<li>prjn_year</li>';
        } else if (idTable == 'devices') {
            html += '<li>inventory_type</li>';
            html += '<li>model</li>';
            html += '<li>product</li>';
            html += '<li>serial</li>';
            html += '<li>dop</li>';
            html += '<li>username</li>';
            html += '<li>loc</li>';
            html += '<li>remarks</li>';
            html += '<li>status</li>';
            html += '<li>newEntry</li>';
            html += '<li>expiryDateTime</li>';
            html += '<li>tagable</li>';
            html += '<li>ftag</li>';
            html += '<li>aaftag</li>';
        } else {
            html = '';
        }
        $('.requiredFieldDiv').removeClass('hide').find('ul').html(html);
    }

    function submitData() {

        $('#idTable').css('border', '1px solid #babfc7');
        $('#document_file').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};

        var head = [];
        var thead = $('.myTable').find('thead').find('select');
        $.each(thead, function (i, v) {
            var mykeysVal = $(v).val();
            if (mykeysVal != '' && mykeysVal != undefined) {
                head.push(mykeysVal);
            } else {
                $(v).css('border', '1px solid red');
                toastMsg('Table', 'Invalid Table', 'error');
                flag = 1;
                return false;
            }

        });

        var body_keys = [];
        var body = $('.myTable').find('tbody').find('tr');
        $.each(body, function (m, n) {
            var body_val = [];
            $.each($(n).find('td'), function (p, q) {
                var myBodyVal = $(q).text();
                body_val.push(myBodyVal);
            });
            body_keys.push(body_val);
        });
        data['head'] = head;
        data['body'] = body_keys;
        data['idTable'] = $('#idTable').val();

        if (data['idTable'] == '' || data['idTable'] == undefined) {
            $('#idTable').css('border', '1px solid red');
            toastMsg('Table', 'Invalid Table', 'error');
            flag = 1;
            return false;
        }

        if (flag == 0) {
            $('.res_heading').html('');
            $('.res_msg').html('');
            $('.myImpBtn').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/Upload_data/addExcelData')?>', data, 'POST', function (result) {
                $('.myImpBtn').removeAttr('disabled', 'disabled');
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        toastMsg(response[0], response[1].message, 'success');
                        $('.res_heading').html(response[0]).css('color', 'green');
                        $('.res_msg').html(response[1]).css('color', 'green');
                        setTimeout(function () {
                            // window.location.reload();
                        }, 1500)
                    } else {
                        toastMsg(response[0], response[1].message, 'error');
                        $('.res_heading').html(response[0]).css('color', 'red');
                        $('.res_msg').html(response[1].message).css('color', 'red');
                    }
                } catch (e) {
                }
            });

        } else {
            toastMsg('Error', 'Invalid Data', 'error');
        }


    }


</script>