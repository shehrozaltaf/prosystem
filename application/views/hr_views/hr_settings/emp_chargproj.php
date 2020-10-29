<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Charging Project</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Charging Project</li>
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
                                                <label for="Location" class="label-control">Charging Project</label>
                                                <select class="select2 form-control location"
                                                        autocomplete="location"
                                                        id="location" required>
                                                    <option value="0" readonly disabled>Charging Project</option>
                                                    <?php if (isset($status) && $status != '') {
                                                        foreach ($status as $k => $s) {
                                                            echo '<option value="' . $s->status_value . '" ' . ($s->status_value == 'OK' ? 'selected' : '') . '>' . $s->status_name . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="">
                                            <button type="button" class="btn btn-primary mybtn btn-block"
                                                    onclick="insertData()">
                                                Insert Asset
                                            </button>
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
<script>
    $(document).ready(function () {
        mydate();
        tagableToggle();
        $("#product_no").ForceNumericOnly();
        $("#serial_no").ForceNumericOnly();
        $("#po_num").ForceNumericOnly();
        $("#pr_num").ForceNumericOnly();
    });

    function tagableToggle() {
        var tagable = $('#tagable').val();
        if (tagable == 2) {
            $('.aaftagDiv').addClass('show').removeClass('hide').find('input').attr('required', 'required');
            $('.ftagDiv').addClass('hide').removeClass('show').find('input').removeAttr('required', 'required');
        } else {
            $('.ftagDiv').addClass('show').removeClass('hide').find('input').attr('required', 'required');
            $('.aaftagDiv').addClass('hide').removeClass('show').find('input').removeAttr('required', 'required');
        }
    }

    function mydate() {
        $('.mypickadat').pickadate({
            selectYears: true,
            selectMonths: true,
            min: new Date(2019, 12, 1),
            max: true,
            format: 'dd-mm-yyyy'
        });
    }

    function insertData() {
        var data = {};
        data['inventory_type'] = $('#inventory_type').val();
        data['model'] = $('#model').val();
        data['product_no'] = $('#product_no').val();
        data['serial_no'] = $('#serial_no').val();
        data['proj_code'] = $('#proj_code').val();
        data['po_num'] = $('#po_num').val();
        data['pr_num'] = $('#pr_num').val();
        data['dor'] = $('#dor').val();
        data['dop'] = $('#dop').val();
        data['status'] = $('#status').val();
        data['tagable'] = $('#tagable').val();
        data['ftag'] = $('#ftag').val();
        data['aaftag'] = $('#aaftag').val();
        data['remarks'] = $('#remarks').val();
        var vd = validateData(data);
        if (vd) {
            showloader();
            $('.mybtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/inventory_controllers/Add_asset/insertData'); ?>', data, 'POST', function (result) {
                hideloader();
                $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        toastMsg(response[0], response[1], 'success');
                        $('.res_heading').html(response[0]).css('color', 'green');
                        $('.res_msg').html(response[1]).css('color', 'green');
                        setTimeout(function () {
                            window.location.reload();
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