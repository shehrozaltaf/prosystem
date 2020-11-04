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
                                    <div class="row" id="upload_area">
                                        <form id="upload_csv" method="post"
                                              onsubmit="return false" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-12 col-12">
                                                    <h4 class="card-title">Table</h4>
                                                    <div class="form-group">
                                                        <select class="select2 form-control idTable" id="idTable"
                                                                name="idTable" required onchange="requiredField()">
                                                            <option value="0" readonly disabled selected>Table Type
                                                            </option>
                                                            <option value="bl_randomised">bl_randomised</option>
                                                            <option value="devices">devices</option>
                                                            <option value="users">users</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-12 col-12">
                                                    <h4 class="card-title">Upload File</h4>
                                                    <div class="form-group">
                                                        <!--                                                        <input type="file" class="form-control" -->
                                                        <!--                                                               id="document_file" name="document_file" required>-->
                                                        <input type="file" class="form-control"
                                                               name="csv_file" id="csv_file" accept=".csv" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row danger requiredFieldDiv hide">
                                                <div class="col-12 col-sm-12">
                                                    <h6 class="danger">Required Fields</h6>
                                                    <ul>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-12" align="center">
                                                <input type="submit" name="upload" id="upload"
                                                       class="btn btn-primary" value="Upload"/>
                                            </div>

                                            <?php if (isset($permission[0]->CanAdd) && $permission[0]->CanAdd == 1) { ?>
                                                <!-- <button type="submit" class="btn btn-primary mybtn" onclick="addData()">
                                                     Submit
                                                 </button>-->

                                            <?php } ?>
                                        </form>

                                        <div class="row m-1">
                                            <div class="col-sm-12">
                                                <h4 class="res_heading" style="color: green;"></h4>
                                                <p class="res_msg" style="color: green;"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="csv_file_data"></div>

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
    $(document).ready(function () {
        /*$('#document_file').change(function () {
            $('#document_label').text(this.files[0].name);
        });*/

    });

    $(document).ready(function () {
        $('#upload_csv').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('index.php/Upload_data/fetchCSV') ?>",
                method: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var html = '<table class="table table-striped table-bordered">';
                    if (data.column) {
                        html += '<tr>';

                        for (var count = 0; count < data.column.length; count++) {
                            html += '<th>' +
                                '<select name="set_column_data" class="form-control set_column_data">' +
                                ' <option value="' + data.column[count] + '">' + data.column[count] + '</option>' +
                                '</select>' +
                                '</th>';
                        }
                        html += '</tr>';
                    }

                    if (data.row_data) {
                        for (var count = 0; count < data.row_data.length; count++) {
                            html += '<tr>';
                            html += '<td class="student_name" contenteditable>' + data.row_data[count].student_name + 'ssss</td>';
                            html += '<td class="student_phone" contenteditable>' + data.row_data[count].student_phone + '</td></tr>';
                        }
                    }
                    html += '<table>';
                    html += '<div align="center"><button type="button" id="import_data" class="btn btn-success">Import</button></div>';

                    $('#csv_file_data').html(html);
                    $('#upload_csv')[0].reset();
                }
            })
        });

        $(document).on('click', '#import_data', function () {
            var student_name = [];
            var student_phone = [];
            $('.student_name').each(function () {
                student_name.push($(this).text());
            });
            $('.student_phone').each(function () {
                student_phone.push($(this).text());
            });
            $.ajax({
                url: "<?php echo base_url('index.php/Upload_data/importData') ?>",
                method: "post",
                data: {student_name: student_name, student_phone: student_phone},
                success: function (data) {
                    $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
                }
            })
        });
    });


    function requiredField() {
        $('.requiredFieldDiv').addClass('hide').find('ul').html('');
        var idTable = $('#idTable').val();
        var html = '';
        if (idTable == 'bl_randomised') {
            html += '<li>uid</li>';
            html += '<li>srno</li>';
            html += '<li>uc_code</li>';
            html += '<li>hh02</li>';
            html += '<li>hh03</li>';
            html += '<li>hh07</li>';
            html += '<li>hh08</li>';
            html += '<li>hh09</li>';
            html += '<li>randDT</li>';
            html += '<li>village_code</li>';
            html += '<li>village_name</li>';
        } else if (idTable == 'devices') {
            html += '<li>imei</li>';
            html += '<li>tag</li>';
            html += '<li>appname</li>';
            html += '<li>appversion</li>';
        } else if (idTable == 'users') {
            html += '<li>username</li>';
            html += '<li>password</li>';
            html += '<li>full_name</li>';
        } else {
            html = '';
        }
        $('.requiredFieldDiv').removeClass('hide').find('ul').html(html);
    }

    function addData() {
        $('#idTable').css('border', '1px solid #babfc7');
        $('#document_file').css('border', '1px solid #babfc7');
        var flag = 0;
        var data = {};
        data['idTable'] = $('#idTable').val();
        data['document_file'] = $('#document_file').val();
        if (data['idTable'] == '' || data['idTable'] == undefined) {
            $('#idTable').css('border', '1px solid red');
            toastMsg('Table', 'Invalid Table', 'error');
            flag = 1;
            return false;
        }

        if (data['document_file'] == '' || data['document_file'] == undefined) {
            $('#document_file').css('border', '1px solid red');
            toastMsg('File', 'Invalid File', 'error');
            flag = 1;
            return false;
        }

        if (flag == 0) {
            $('.res_heading').html('');
            $('.res_msg').html('');
            $('.mybtn').attr('disabled', 'disabled');
            var formData = new FormData($("#document_form")[0]);
            CallAjax('<?php echo base_url('index.php/Upload_data/addExcelData')?>', formData, 'POST', function (result) {
                $('.mybtn').removeAttr('disabled', 'disabled');
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        toastMsg(response[0], response[1].message, 'success');
                        $('.res_heading').html(response[0]).css('color', 'green');
                        $('.res_msg').html(response[1]).css('color', 'green');
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500)
                    } else {
                        toastMsg(response[0], response[1].message, 'error');
                        $('.res_heading').html(response[0]).css('color', 'red');
                        $('.res_msg').html(response[1].message).css('color', 'red');
                    }
                } catch (e) {
                }
            }, true);
        }
    }


</script>