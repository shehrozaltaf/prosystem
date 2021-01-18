<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Add Asset</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Asset</li>
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
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="model" class="label-control">Purchase Request Id</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="model" name="model"
                                                           autocomplete="model" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="idCategory" class="label-control">Equipment
                                                        Category</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control" autocomplete="idCategory"
                                                            id="idCategory" required>
                                                        <option value="0" readonly disabled selected></option>
                                                        <?php if (isset($category) && $category != '') {
                                                            foreach ($category as $k => $c) {
                                                                echo '<option value="' . $c->idCategory . '" >' . $c->category . '</option>';
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="desc" class="label-control">Description</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea id="desc" name="desc" class="form-control" cols="30"
                                                              rows="7" autocomplete="desc" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="model_no" class="label-control">Model</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="model_no"
                                                           name="model_no"
                                                           autocomplete="model_no" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="product_no"
                                                           class="label-control">Product
                                                        No.</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                           id="product_no"
                                                           name="product_no"
                                                           autocomplete="product_no" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="tag_no"
                                                           class="label-control">Tag
                                                    </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                           id="tag_no"
                                                           name="tag_no"
                                                           autocomplete="product_no" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="po_no"
                                                           class="label-control">PO
                                                        No.</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="po_no"
                                                           name="po_no"
                                                           autocomplete="po_no" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="po_no"
                                                           class="label-control">Cost</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="po_no"
                                                           name="po_no"
                                                           autocomplete="po_no" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="idCurrency"
                                                           class="label-control">Currency</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control"
                                                            autocomplete="idCurrency"
                                                            id="idCurrency" required>
                                                        <option value="0" readonly disabled selected></option>
                                                        <?php if (isset($currency) && $currency != '') {
                                                            foreach ($currency as $k => $cr) {
                                                                echo '<option value="' . $cr->idCurrency . '" >' . $cr->currency . '</option>';
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="sop">Source of
                                                        Purchase</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control" id="sop"
                                                            name="sop">
                                                        <option value="0">All Source of Purchase</option>
                                                        <?php
                                                        if (isset($sop) && $sop != '') {
                                                            foreach ($sop as $k => $sp) {
                                                                echo '<option value="' . $sp->sop_value . '">' . $sp->sop_name . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="emp">Employee</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control" id="emp"
                                                            name="emp">
                                                        <option value="0"></option>
                                                        <?php
                                                        if (isset($employee) && $employee != '') {
                                                            foreach ($employee as $k => $e) {
                                                                echo '<option value="' . $e->empno . '">(' . $e->empno . ') ' . $e->empname . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="emp">Responsbile Person
                                                        Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control" id="emp"
                                                            name="emp">
                                                        <option value="0"></option>
                                                        <?php
                                                        if (isset($employee) && $employee != '') {
                                                            foreach ($employee as $k => $e) {
                                                                echo '<option value="' . $e->empno . '">(' . $e->empno . ') ' . $e->empname . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label
                                                            for="project">Project</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control" id="project"
                                                            name="project">
                                                        <option value="0">All Projects</option>
                                                        <?php
                                                        if (isset($project) && $project != '') {
                                                            foreach ($project as $k => $v) {
                                                                echo '<option value="' . $v->proj_code . '">(' . $v->proj_code . ') ' . $v->proj_sn . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="dor"
                                                           class="label-control">OU</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="dor"
                                                           name="dor"
                                                           autocomplete="dor" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="dor"
                                                           class="label-control">Account</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="dor"
                                                           name="dor"
                                                           autocomplete="dor" required></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="dor"
                                                           class="label-control">Dept
                                                    </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="dor"
                                                           name="dor"
                                                           autocomplete="dor" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="dor"
                                                           class="label-control">Fund
                                                    </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="dor"
                                                           name="dor"
                                                           autocomplete="dor" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label
                                                            for="project">Project</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control" id="project"
                                                            name="project">
                                                        <option value="0">All Projects</option>
                                                        <?php
                                                        if (isset($project) && $project != '') {
                                                            foreach ($project as $k => $v) {
                                                                echo '<option value="' . $v->proj_code . '">(' . $v->proj_code . ') ' . $v->proj_sn . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="dor"
                                                           class="label-control">Prog </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="dor"
                                                           name="dor"
                                                           autocomplete="dor" required></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="location">Location</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control" id="location"
                                                            name="location">
                                                        <option value="0"></option>
                                                        <?php
                                                        if (isset($location) && $location != '') {
                                                            foreach ($location as $k => $v) {
                                                                echo '<option value="' . $v->id . '">' . $v->location . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="sublocation">Sub
                                                        Location</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control"
                                                            id="sublocation"
                                                            name="sublocation">
                                                        <option value="0"></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="sublocation">Verification
                                                        Status</label></div>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control"
                                                            id="sublocation"
                                                            name="sublocation">
                                                        <option value="0"></option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="dop"
                                                           class="label-control">Last
                                                        Verification Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control mypickadat"
                                                           id="dop" name="dop"
                                                           autocomplete="dop"
                                                           value="<?php echo date('d-m-Y') ?>"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="dop"
                                                           class="label-control">Due
                                                        Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control mypickadat"
                                                           id="dop" name="dop"
                                                           autocomplete="dop"
                                                           value="<?php echo date('d-m-Y') ?>"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="dop"
                                                           class="label-control">Purchase
                                                        Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control mypickadat"
                                                           id="dop" name="dop"
                                                           autocomplete="dop"
                                                           value="<?php echo date('d-m-Y') ?>"
                                                           required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="status"
                                                           class="label-control">Status</label>
                                                </div>
                                                <div class="col-sm-9">
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
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="dor" class="label-control">Writ
                                                        Off
                                                        Form </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="dor"
                                                           name="dor"
                                                           autocomplete="dor" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="dor" class="label-control">Writ
                                                        Off
                                                        Date </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="dor"
                                                           name="dor"
                                                           autocomplete="dor" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label"><label for="remarks"
                                                                                            class="label-control">Remarks/Comments</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <textarea id="remarks" name="remarks"
                                                          class="form-control"
                                                          cols="30"
                                                          rows="7"
                                                          autocomplete="remarks" required>

                                                </textarea>
                                                </div>
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
        data['Asset_type'] = $('#Asset_type').val();
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
            CallAjax('<?php echo base_url('index.php/Asset_controllers/Add_asset/insertData'); ?>', data, 'POST', function (result) {
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