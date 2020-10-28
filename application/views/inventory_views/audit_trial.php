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
                                        <a href="app-user-edit.html" class="btn btn-primary mr-1 waves-effect waves-light"><i class="feather icon-edit-1"></i> Edit</a>
                                        <button class="btn btn-outline-danger waves-effect waves-light"><i class="feather icon-trash-2"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- account end -->

                    <?php if (isset($inventory_audit) && $inventory_audit != '') {
                        foreach ($inventory_audit as $k => $a) { ?>

                            <div class="col-md-6 col-12 ">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title mb-2">Audit - <?php echo ucfirst($k); ?></div>
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