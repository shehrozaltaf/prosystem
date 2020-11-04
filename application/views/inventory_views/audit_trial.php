<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/pages/app-user.css">

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Inventory</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Inventory Information</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- page users view start -->
            <section class="page-users-view">
                <div class="row">
                    <!-- account start -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Information</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                        <table>
                                            <tr>
                                                <td class="font-weight-bold">inventory_type</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->inventory_type) && $inventory_data[0]->inventory_type != '' ? $inventory_data[0]->inventory_type : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">model</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->model) && $inventory_data[0]->model != '' ? $inventory_data[0]->model : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">ftag</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->ftag) && $inventory_data[0]->ftag != '' ? $inventory_data[0]->ftag : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">product</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->product) && $inventory_data[0]->product != '' ? $inventory_data[0]->product : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">serial</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->serial) && $inventory_data[0]->serial != '' ? $inventory_data[0]->serial : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">proj_code</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->proj_code) && $inventory_data[0]->proj_code != '' ? $inventory_data[0]->proj_code : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">po_num</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->po_num) && $inventory_data[0]->po_num != '' ? $inventory_data[0]->po_num : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">pr_num</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->pr_num) && $inventory_data[0]->pr_num != '' ? $inventory_data[0]->pr_num : '') ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-5">
                                        <table class="ml-0 ml-sm-0 ml-lg-0">
                                            <tr>
                                                <td class="font-weight-bold">dop</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->dop) && $inventory_data[0]->dop != '' ? $inventory_data[0]->dop : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">aaftag</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->aaftag) && $inventory_data[0]->aaftag != '' ? $inventory_data[0]->aaftag : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">username</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->username) && $inventory_data[0]->username != '' ? $inventory_data[0]->username : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">loc</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->loc) && $inventory_data[0]->loc != '' ? $inventory_data[0]->loc : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">status</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->status) && $inventory_data[0]->status != '' ? $inventory_data[0]->status : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">remarks</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->remarks) && $inventory_data[0]->remarks != '' ? $inventory_data[0]->remarks : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">dor</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->dor) && $inventory_data[0]->dor != '' ? $inventory_data[0]->dor : '') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">tagable</td>
                                                <td>
                                                    <?php echo(isset($inventory_data[0]->tagable) && $inventory_data[0]->tagable != '' ? $inventory_data[0]->tagable : '') ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" id="idInventory" name="idInventory"
                                               value="<?php echo(isset($inventory_data[0]->id) && $inventory_data[0]->id != '' ? $inventory_data[0]->id : '') ?>">
                                        <?php if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) { ?>
                                            <a href="app-user-edit.html"
                                               class="btn btn-primary mr-1 waves-effect waves-light"><i
                                                        class="feather icon-edit-1"></i> Edit</a>
                                        <?php }
                                        if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) { ?>
                                            <button class="btn btn-outline-danger waves-effect waves-light"
                                                    onclick="getDelete(this)">
                                                <i class="feather icon-trash-2"></i> Delete
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- account end -->

                    <div class="col-md-12 col-12 ">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title mb-2">Audit Report</div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped dataex-html5-selectors">
                                    <thead>

                                    <tr>
                                        <th>Form Name</th>
                                        <th>Fieldid</th>
                                        <th>FieldName</th>
                                        <th>OldValue</th>
                                        <th>NewValue</th>
                                        <th>createdBy</th>
                                        <th>createdDateTime</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (isset($all_inventory_audit) && $all_inventory_audit != '') {

                                        foreach ($all_inventory_audit as $k => $a) {
                                            echo '<tr> 
                                                <td>' . $a->FormName . '</td> 
                                                <td>' . $a->Fieldid . '</td>
                                                <td>' . $a->FieldName . '</td>
                                                <td>' . $a->OldValue . '</td>
                                                <td>' . $a->NewValue . '</td> 
                                                <td>' . $a->username . '</td>
                                                <td>' . date('d-m-Y', strtotime($a->createdDateTime)) . '</td>
                                            </tr>';
                                        }
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Form Name</th>
                                        <th>Fieldid</th>
                                        <th>FieldName</th>
                                        <th>OldValue</th>
                                        <th>NewValue</th>
                                        <th>createdBy</th>
                                        <th>createdDateTime</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>


                    <?php if (isset($inventory_audit) && $inventory_audit != '') {
                        foreach ($inventory_audit as $k => $a) { ?>

                            <div class="col-md-6 col-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title mb-2"><?php echo ucfirst($k); ?> - Audit</div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-responsive table-bordered ">
                                            <?php if (isset($a) && $a != '') {
                                                foreach ($a as $kk => $aa) {
                                                    echo '<tr>
                                                <td class="font-weight-bold">New Value</td>
                                                <td>' . $aa->NewValue . '</td>
                                                  <td class="font-weight-bold">Old Value</td>
                                                <td>' . $aa->OldValue . '</td>
                                            </tr>';
                                                }
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
                    <!-- information start -->

                    <!-- information start -->
                    <!-- social links end -->
                    <!-- <div class="col-md-6 col-12 ">
                         <div class="card">
                             <div class="card-header">
                                 <div class="card-title mb-2">Social Links</div>
                             </div>
                             <div class="card-body">
                                 <table>
                                     <tr>
                                         <td class="font-weight-bold">Twitter</td>
                                         <td>https://twitter.com/adoptionism744
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Facebook</td>
                                         <td>https://www.facebook.com/adoptionism664
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Instagram</td>
                                         <td>https://www.instagram.com/adopt-ionism744/
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Github</td>
                                         <td>https://github.com/madop818
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">CodePen</td>
                                         <td>https://codepen.io/adoptism243
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Slack</td>
                                         <td>@adoptionism744
                                         </td>
                                     </tr>
                                 </table>
                             </div>
                         </div>
                     </div>-->
                    <!-- social links end -->
                </div>
            </section>
            <!-- page users view end -->

        </div>
    </div>
</div>


<?php if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) { ?>
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_delete"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title white" id="myModalLabel_delete">Delete Inventory</h4>
                    <input type="hidden" id="delete_idInventory" name="delete_idInventory">
                </div>
                <div class="modal-body">
                    <p>Are you sure, you want to delete this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="deleteData()">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dataex-html5-selectors').DataTable({
            dom: 'Bfrtip',
            "displayLength": 50,
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    text: 'JSON',
                    action: function (e, dt, button, config) {
                        var data = dt.buttons.exportData();

                        $.fn.dataTable.fileSave(
                            new Blob([JSON.stringify(data)]),
                            'Export.json'
                        );
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });
    });

    function getDelete(obj) {
        var id = $('#idInventory').val();
        if (id != '' && id != undefined && id != 0) {
            $('#deleteModal').modal('show');
        } else {
            toastMsg('Inventory', 'Invalid Id', 'error');
            return false;
        }

    }

    function deleteData() {
        var data = {};
        data['idInventory'] = $('#idInventory').val();
        if (data['idInventory'] == '' || data['idInventory'] == undefined || data['idInventory'] == 0) {
            toastMsg('Inventory', 'Invalid Id', 'error');
            return false;
        } else {
            CallAjax('<?php echo base_url('index.php/inventory_controllers/Inventory/deleteInventory')?>', data, 'POST', function (res) {
                if (res == 1) {
                    toastMsg('Inventory', 'Successfully Deleted', 'success');
                    $('#deleteModal').modal('hide');
                    setTimeout(function () {
                        window.location.href = '<?php echo base_url('index.php/inventory_controllers/Inventory') ?>';
                    }, 500);
                } else if (res == 3) {
                    toastMsg('Inventory', 'Invalid Inventory Id', 'error');
                } else {
                    toastMsg('Inventory', 'Something went wrong', 'error');
                }
            });
        }
    }

</script>