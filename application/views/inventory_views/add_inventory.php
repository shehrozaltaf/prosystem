<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Add Inventory</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Inventory</li>
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
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inventory_type" class="label-control">Type</label>
                                                <select class="select2 form-control"
                                                        autocomplete="inventory_type"
                                                        id="inventory_type" required>
                                                    <option value="0" readonly disabled selected>Type</option>
                                                    <?php if (isset($inventory_type) && $inventory_type != '') {
                                                        foreach ($inventory_type as $k => $t) {
                                                            echo '<option value="' . $t . '" >' . $t . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="model" class="label-control">Model</label>
                                                <input type="text" class="form-control" id="model" name="model"
                                                       autocomplete="model" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="ftag" class="label-control">FTag</label>
                                                <input type="text" class="form-control" id="ftag" name="ftag"
                                                       autocomplete="ftag" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="product_no" class="label-control">Product No.</label>
                                                <input type="text" class="form-control" id="product_no"
                                                       name="product_no"
                                                       autocomplete="product_no" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="serial_no" class="label-control">Serial No.</label>
                                                <input type="text" class="form-control" id="serial_no" name="serial_no"
                                                       autocomplete="serial_no" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="dop" class="label-control">DoP</label>
                                                <input type="text" class="form-control mypickadat" id="dop" name="dop"
                                                       autocomplete="dop" value="<?php echo date('d-m-Y') ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="status" class="label-control">Status</label>
                                                <select class="select2 form-control status"
                                                        autocomplete="status"
                                                        id="status" required>
                                                    <option value="0" readonly disabled>Status</option>
                                                    <?php if (isset($status) && $status != '') {
                                                        foreach ($status as $k => $s) {
                                                            echo '<option value="' . $s . '" ' . ($s == 'OK' ? 'selected' : '') . '>' . $s . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="remarks" class="label-control">Remarks</label>
                                                <textarea id="remarks" name="remarks" class="form-control" cols="30"
                                                          rows="7"
                                                          autocomplete="remarks" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <button type="button" class="btn btn-primary mybtn" onclick="insertData()">
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
    });

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
        data['ftag'] = $('#ftag').val();
        data['product_no'] = $('#product_no').val();
        data['serial_no'] = $('#serial_no').val();
        data['dop'] = $('#dop').val();
        data['status'] = $('#status').val();
        data['remarks'] = $('#remarks').val();
        var vd = validateData(data);
        if (vd) {
            showloader();
            $('.mybtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/inventory_controllers/Add_asset/insertData'); ?>', data, 'POST', function (result) {
                hideloader();
                $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                console.log(result);
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