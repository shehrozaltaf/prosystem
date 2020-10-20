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
                                                <label for="inventory_type" class="label-control">Type</label>
                                                <select class="select2 form-control"
                                                        autocomplete="inventory_type"
                                                        id="inventory_type" required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php if (isset($inventory_type) && $inventory_type != '') {
                                                        foreach ($inventory_type as $k => $t) {
                                                            echo '<option value="' . $t->type_value . '" >' . $t->type_name . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="model" class="label-control">Model</label>
                                                <input type="text" class="form-control" id="model" name="model"
                                                       autocomplete="model" required>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="product_no" class="label-control">Product No.</label>
                                                <input type="text" class="form-control" id="product_no"
                                                       name="product_no"
                                                       autocomplete="product_no" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="serial_no" class="label-control">Serial No.</label>
                                                <input type="text" class="form-control" id="serial_no" name="serial_no"
                                                       autocomplete="serial_no" required>
                                            </div>
                                        </div>


                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="proj_code" class="label-control">Project/Budget Code</label>
                                                <select class="select2 form-control proj_code"
                                                        autocomplete="proj_code"
                                                        id="proj_code" required>
                                                    <option value="0" readonly disabled selected></option>
                                                    <?php if (isset($project) && $project != '') {
                                                        foreach ($project as $k => $p) {
                                                            echo '<option value="' . $p->proj_code . '">' . $p->proj_code . ' (' . $p->proj_name . ')</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="po_num" class="label-control">PO No</label>
                                                <input type="text" class="form-control" id="po_num" name="po_num"
                                                       autocomplete="po_num" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="pr_num" class="label-control">PR No</label>
                                                <input type="text" class="form-control" id="pr_num" name="pr_num"
                                                       autocomplete="pr_num" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="dor" class="label-control">DOR</label>
                                                <input type="text" class="form-control" id="dor" name="dor"
                                                       autocomplete="dor" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="dop" class="label-control">Date of Purchase</label>
                                                <input type="text" class="form-control mypickadat" id="dop" name="dop"
                                                       autocomplete="dop" value="<?php echo date('d-m-Y') ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="status" class="label-control">Status</label>
                                                <select class="select2 form-control status"
                                                        autocomplete="status"
                                                        id="status" required>
                                                    <option value="0" readonly disabled>Status</option>
                                                    <?php if (isset($status) && $status != '') {
                                                        foreach ($status as $k => $s) {
                                                            echo '<option value="' . $s->status_value . '" ' . ($s->status_value == 'OK' ? 'selected' : '') . '>' . $s->status_name . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="tagable" class="label-control">Tagable</label>
                                                <select class="select2 form-control tagable"
                                                        autocomplete="tagable"
                                                        onchange="tagableToggle()"
                                                        id="tagable" required>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6 ftagDiv">
                                            <div class="form-group">
                                                <label for="ftag" class="label-control">FTag</label>
                                                <input type="text" class="form-control" id="ftag" name="ftag"
                                                       autocomplete="ftag" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6 aaftagDiv hide">
                                            <div class="form-group">
                                                <label for="aaftag" class="label-control">AAFTag</label>
                                                <input type="text" class="form-control" id="aaftag" name="aaftag"
                                                       autocomplete="aaftag" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="remarks" class="label-control">Remarks/Comments</label>
                                                <textarea id="remarks" name="remarks" class="form-control" cols="30"
                                                          rows="7"
                                                          autocomplete="remarks" required></textarea>
                                            </div>
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