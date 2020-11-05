<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Project</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Project</li>
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
                                        <?php $mydata = $data[0]; ?>
                                        <input type="hidden" id="idProject" name="idProject"
                                               autocomplete="idProject" required
                                               value="<?php echo(isset($mydata->idProject) && $mydata->idProject != '' ? $mydata->idProject : '') ?>">
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="proj_code" class="label-control">Project Code</label>
                                                <input type="number" class="form-control" id="proj_code"
                                                       name="proj_code"
                                                       autocomplete="proj_code" required
                                                       value="<?php echo(isset($mydata->proj_code) && $mydata->proj_code != '' ? $mydata->proj_code : '') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="proj_name" class="label-control">Project Name</label>
                                                <input type="text" class="form-control" id="proj_name" name="proj_name"
                                                       autocomplete="proj_name" required
                                                       value="<?php echo(isset($mydata->proj_name) && $mydata->proj_name != '' ? $mydata->proj_name : '') ?>">

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="proj_priv" class="label-control">Principal
                                                    Investigator</label>
                                                <input type="text" class="form-control" id="proj_priv" name="proj_priv"
                                                       autocomplete="proj_priv" required
                                                       value="<?php echo(isset($mydata->proj_priv) && $mydata->proj_priv != '' ? $mydata->proj_priv : '') ?>">

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="proj_sn" class="label-control">Short Name</label>
                                                <input type="text" class="form-control" id="proj_sn" name="proj_sn"
                                                       autocomplete="proj_sn" required
                                                       value="<?php echo(isset($mydata->proj_sn) && $mydata->proj_sn != '' ? $mydata->proj_sn : '') ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-primary mybtn" onclick="updateData()">
                                                Edit Project
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

    function updateData() {
        var data = {};
        data['idProject'] = $('#idProject').val();
        data['proj_code'] = $('#proj_code').val();
        data['proj_name'] = $('#proj_name').val();
        data['proj_priv'] = $('#proj_priv').val();
        data['proj_sn'] = $('#proj_sn').val();
        var vd = validateData(data);
        if (vd) {
            showloader();
            $('.mybtn').addClass('hide').attr('disabled', 'disabled');
            CallAjax('<?php echo base_url('index.php/budget_controllers/Project/updateData'); ?>', data, 'POST', function (result) {
                hideloader();
                $('.mybtn').removeClass('hide').removeAttr('disabled', 'disabled');
                try {
                    var response = JSON.parse(result);
                    if (response[0] == 'Success') {
                        toastMsg(response[0], response[1], 'success');
                        setTimeout(function () {
                            window.location.href = '<?php echo base_url('index.php/budget_controllers/Project') ?>';
                        }, 1500)
                    } else {
                        toastMsg(response[0], response[1], 'error');
                    }
                } catch (e) {
                }
            });
        } else {
            toastMsg('Error', 'Invalid Data', 'error');
        }
    }

</script>