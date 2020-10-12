<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Inventory System</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Inventory</li>
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
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="username">User</label>
                                                <input type="text" class="form-control" id="username" name="username">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="ftag">FTAG</label>
                                                <input type="text" class="form-control" id="ftag" name="ftag">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="aaftag">AAFTAG</label>
                                                <input type="text" class="form-control" id="aaftag" name="aaftag">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <select class="select2 form-control" id="location" name="location">
                                                    <option value="0">All Locations</option>
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
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="project">Project</label>
                                                <select class="select2 form-control" id="project" name="project">
                                                    <option value="0">All Projects</option>
                                                    <?php
                                                    if (isset($project) && $project != '') {
                                                        foreach ($project as $k => $v) {
                                                            echo '<option value="' . $v->proj_code . '">' . $v->proj_name . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="select2 form-control" id="status" name="status">
                                                    <option value="0">All Status</option>
                                                    <option value="OK">OK</option>
                                                    <option value="RETURNED TO AGENCY">RETURNED TO AGENCY</option>
                                                    <option value="RETIRED">RETIRED</option>
                                                    <option value="STOLEN">STOLEN</option>
                                                    <option value="NOT WORKING">NOT WORKING</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" ">
                                        <button type="button" class="btn btn-primary" onclick="getData()">Get
                                            Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="column-selectors" class="hide main_content_div">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Inventory</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard cardHtml">
                                    <div class="table-responsive">
                                        <table id="my_table_inventory" style="width:100%"
                                               class="table table-striped table-bordered show-child-rows display">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Type</th>
                                                <th>Model</th>
                                                <th>Product</th>
                                                <th>Serial</th>
                                                <th>DOP</th>
                                                <th>AAFTAG</th>
                                                <th>AAProduct</th>
                                                <th>AASerial</th>
                                                <th>Username</th>
                                                <th>Location</th>
                                                <th>Remarks</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Type</th>
                                                <th>Model</th>
                                                <th>Product</th>
                                                <th>Serial</th>
                                                <th>DOP</th>
                                                <th>AAFTAG</th>
                                                <th>AAProduct</th>
                                                <th>AASerial</th>
                                                <th>Username</th>
                                                <th>Location</th>
                                                <th>Remarks</th>
                                                <th>Status</th>
                                            </tr>
                                            </tfoot>
                                        </table>
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

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>

<script>

    function format(d) {
        var html = '';
        html += '<p>FTAG: ' + (d.ftag != '' && d.ftag != undefined && d.aadop != null ? d.ftag : '') + '</p>';
        html += '<p>AADop: ' + (d.aadop != '' && d.aadop != undefined && d.aadop != null ? d.aadop : '') + '</p>';
        html += '<p>New Entry: ' + (d.newEntry != '' && d.newEntry != undefined && d.newEntry != null ? d.newEntry : '') + '</p>';
        html += '<p>Remarks: ' + (d.remarks != '' && d.remarks != undefined && d.remarks != null ? d.remarks : '') + '</p>';
        html += '<p>Status: ' + (d.status != '' && d.status != undefined && d.status != null ? d.status : '') + '</p>';
        /* $.each(d.subChild, function (i, v) {
            html += '<p>FTAG: ' + (v.ftag != '' && v.ftag != undefined && v.aadop != null ? v.ftag : '') + '</p>';
            html += '<p>AADop: ' + (v.aadop != '' && v.aadop != undefined && v.aadop != null ? v.aadop : '') + '</p>';
             html += '<p>New Entry: ' + (v.newEntry != '' && v.newEntry != undefined && v.newEntry != null ? v.newEntry : '') + '</p>';
             html += '<p>Remarks: ' + (v.remarks != '' && v.remarks != undefined && v.remarks != null ? v.remarks : '') + '</p>';
             html += '<p>Status: ' + (v.status != '' && v.status != undefined && v.status != null ? v.status : '') + '</p>';
         });*/
        return html;
    }

    function getData() {
        var data = {};
        data['username'] = $('#username').val();
        data['ftag'] = $('#ftag').val();
        data['aaftag'] = $('#aaftag').val();
        data['location'] = $('#location').val();
        data['project'] = $('#project').val();
        data['status'] = $('#status').val();
        showloader();
        $('.main_content_div').addClass('hide');
        var columnDefs = [
            {
                targets: 0,
                className: 'control',
                orderable: false
            }
        ];
        var responsive = {
            details: {
                type: 'column'
            }
        };
        var dt = $('#my_table_inventory').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            columnDefs: columnDefs,
            responsive: {
                details: false
            },
            lengthMenu: [25, 50, 75, 100],
            pageLength: 25,
            iDisplayLength: 25,
            dom: 'Bfrtip',
            ajax: {
                "url": "<?php echo base_url() . 'index.php/inventory_controllers/Inventory/getInventory' ?>",
                "method": "GET",
                "data": data
            },
            columns: [
                {
                    "width": "3%",
                    "class": "details-control",
                    "orderable": false,
                    "data": null,
                    "defaultContent": ""
                },
                {"data": "inventory_type"},
                {"data": "model"},
                {"data": "product"},
                {"data": "serial"},
                {"data": "dop"},
                {"data": "aaftag"},
                {"data": "aaproduct"},
                {"data": "aaserial"},
                {"data": "username"},
                {"data": "loc"},
                {"data": "remarks"},
                {"data": "status"}
            ],
            order: [
                [1, 'desc']
            ],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });

        // Array to track the ids of the details displayed rows
        var detailRows = [];
        $('#my_table_inventory tbody').on('click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);
            if (row.child.isShown()) {
                tr.removeClass('details');
                row.child.hide();
                // Remove from the 'open' array
                detailRows.splice(idx, 1);
            } else {
                tr.addClass('details');
                row.child(format(row.data())).show();
                // Add to the 'open' array
                if (idx === -1) {
                    detailRows.push(tr.attr('id'));
                }
            }
        });

        // On each draw, loop over the `detailRows` array and show any child rows
        dt.on('draw', function () {
            $.each(detailRows, function (i, id) {
                $('#' + id + ' td.details-control').trigger('click');
            });
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-outline-primary mr-1');
        setTimeout(function () {
            hideloader();
            $('.main_content_div').removeClass('hide');
        }, 500);
    }

</script>