<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/pages/page-profile.min.css">

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Employee Profile</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>">Employee
                                        Profile</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <div id="user-profile">
                <!-- profile header -->
                <div class="row">
                    <div class="col-12">
                        <div class="card profile-header mb-5 " style="padding-top: 150px;">
                            <?php if (isset($empDetails[0]) && $empDetails[0] != '') {
                                $empD = $empDetails[0];
                            } else {
                                $empD = '';
                            }
                            ?>
                            <div class="position-relative">
                                <!-- profile picture -->
                                <div class="profile-img-container d-flex align-items-center">
                                    <div class="profile-img">
                                        <img
                                                src="<?php echo((isset($empD->pic)) && $empD->pic != '' ? $empD->pic : base_url() . 'assets/images/profile/dummy.jpg') ?>"
                                                class="rounded img-fluid"
                                                alt="<?php echo(isset($empD->empname) && $empD->empname != '' ? $empD->empname : '') ?>"
                                        />
                                    </div>
                                    <!-- profile title -->
                                    <div class="profile-title ml-3">
                                        <h2 class="text-black-50"><?php echo(isset($empD->empname) && $empD->empname != '' ? $empD->empname : '') ?></h2>
                                        <p class="text-black-50"><?php echo(isset($empD->desig) && $empD->desig != '' ? $empD->desig : '') ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- tabs pill -->
                            <div class="profile-header-nav">
                                <!-- navbar -->
                                <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                    <button
                                            class="btn btn-icon navbar-toggler"
                                            type="button"
                                            data-toggle="collapse"
                                            data-target="#navbarSupportedContent"
                                            aria-controls="navbarSupportedContent"
                                            aria-expanded="false"
                                            aria-label="Toggle navigation"
                                    >
                                        <i data-feather="align-justify" class="font-medium-5"></i>
                                    </button>

                                    <!-- collapse  -->
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                            <ul class="nav nav-pills nav-tabs mb-0" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link font-weight-bold active" id="home-tab-fill"
                                                       data-toggle="tab"
                                                       href="#personal-info-fill" role="tab"
                                                       aria-controls="personal-info-fill"
                                                       aria-selected="true">Personal Information</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link font-weight-bold" id="profile-tab-fill"
                                                       data-toggle="tab"
                                                       href="#contact-details-fill" role="tab"
                                                       aria-controls="contact-details-fill"
                                                       aria-selected="false">Contact Details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link font-weight-bold" id="messages-tab-fill"
                                                       data-toggle="tab"
                                                       href="#emergency-contact-fill" role="tab"
                                                       aria-controls="emergency-contact-fill"
                                                       aria-selected="false">Emergency Contact</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link font-weight-bold" id="emp-details-tab-fill"
                                                       data-toggle="tab"
                                                       href="#emp-details-fill" role="tab"
                                                       aria-controls="emp-details-fill"
                                                       aria-selected="false">Employment Details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link font-weight-bold " id="settings-tab-fill"
                                                       data-toggle="tab"
                                                       href="#hiring-status-fill" role="tab"
                                                       aria-controls="hiring-status-fill"
                                                       aria-selected="false">Hiring Status</a>
                                                </li>
                                                <li class="nav-item ">
                                                    <a class="nav-link font-weight-bold" id="documents-tab-fill"
                                                       data-toggle="tab"
                                                       href="#documents-fill" role="tab" aria-controls="documents-fill"
                                                       aria-selected="false">Documents</a>
                                                </li>
                                                <li class="nav-item ">
                                                    <a class="nav-link font-weight-bold" id="assets-tab-fill"
                                                       data-toggle="tab"
                                                       href="#assets-fill" role="tab" aria-controls="assets-fill"
                                                       aria-selected="false">Assets</a>
                                                </li>
                                            </ul>
                                            <!-- edit button -->
                                            <button class="btn btn-primary">
                                                <i data-feather="edit" class="d-block d-md-none"></i>
                                                <span class="font-weight-bold d-none d-md-block">Edit</span>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ collapse  -->
                                </nav>
                                <!--/ navbar -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ profile header -->

                <!-- profile info section -->
                <section id="profile-info">
                    <div class="row">
                        <!-- left profile info section -->
                        <div class="col-lg-12 col-12 order-1 order-lg-1">
                            <div class="tab-content pt-1">
                                <div class="tab-pane active" id="personal-info-fill" role="tabpanel"
                                     aria-labelledby="home-tab-fill">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Information</div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless table-hover table-responsive">
                                                <tr>
                                                    <td class="font-weight-bold">Employee Number</td>
                                                    <td>
                                                        <?php echo(isset($empD->empno) && $empD->empno != '' ? $empD->empno : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Official Email<br/>(without aku.edu)
                                                    </td>
                                                    <td>
                                                        <?php echo(isset($empD->offemail) && $empD->offemail != '' ? $empD->offemail : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Full Name <br>(Use Capital Letters)
                                                    </td>
                                                    <td>
                                                        <?php echo(isset($empD->empname) && $empD->empname != '' ? $empD->empname : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">CNIC Number</td>
                                                    <td>
                                                        <?php echo(isset($empD->cnicno) && $empD->cnicno != '' ? $empD->cnicno : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Date of Birth</td>
                                                    <td>
                                                        <?php echo(isset($empD->dob) && $empD->dob != '' ? $empD->dob : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Highest Degree</td>
                                                    <td>
                                                        <?php echo(isset($empD->degreeName) && $empD->degreeName != '' ? $empD->degreeName : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Highest Field</td>
                                                    <td>
                                                        <?php echo(isset($empD->field) && $empD->field != '' ? $empD->field : '') ?>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="contact-details-fill" role="tabpanel"
                                     aria-labelledby="profile-tab-fill">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Contact Details</div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless table-hover table-responsive">
                                                <tr>
                                                    <td class="font-weight-bold">Residential Address</td>
                                                    <td>
                                                        <?php echo(isset($empD->resaddr) && $empD->resaddr != '' ? $empD->resaddr : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Personal Email</td>
                                                    <td>
                                                        <?php echo(isset($empD->peremail) && $empD->peremail != '' ? $empD->peremail : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Landline Number</td>
                                                    <td>
                                                        <?php echo(isset($empD->landline) && $empD->landline != '' ? $empD->landline : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Mobile Number (Primary)</td>
                                                    <td>
                                                        <?php echo(isset($empD->cellno1) && $empD->cellno1 != '' ? $empD->cellno1 : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Mobile Number (Alternate)</td>
                                                    <td>
                                                        <?php echo(isset($empD->cellno2) && $empD->cellno2 != '' ? $empD->cellno2 : '') ?>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="emergency-contact-fill" role="tabpanel"
                                     aria-labelledby="messages-tab-fill">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Emergency Contact</div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless table-hover table-responsive">
                                                <tr>
                                                    <td class="font-weight-bold">Person Name</td>
                                                    <td>
                                                        <?php echo(isset($empD->personnme) && $empD->personnme != '' ? $empD->personnme : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Mobile Number</td>
                                                    <td>
                                                        <?php echo(isset($empD->emcellno) && $empD->emcellno != '' ? $empD->emcellno : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Landline No.</td>
                                                    <td>
                                                        <?php echo(isset($empD->emlandno) && $empD->emlandno != '' ? $empD->emlandno : '') ?>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="emp-details-fill" role="tabpanel"
                                     aria-labelledby="emp-details-tab-fill">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Employment Details</div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless table-hover table-responsive">
                                                <tr>
                                                    <td class="font-weight-bold">Employment Type</td>
                                                    <td>
                                                        <?php echo(isset($empD->emptype) && $empD->emptype != '' ? $empD->emptype : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Category</td>
                                                    <td>
                                                        <?php echo(isset($empD->category) && $empD->category != '' ? $empD->category : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">GNC Number</td>
                                                    <td>
                                                        <?php echo(isset($empD->gncno) && $empD->gncno != '' ? $empD->gncno : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Band</td>
                                                    <td>
                                                        <?php echo(isset($empD->band) && $empD->band != '' ? $empD->band : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Title / Designation</td>
                                                    <td>
                                                        <?php echo(isset($empD->desig) && $empD->desig != '' ? $empD->desig : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Hire / Rehire Date</td>
                                                    <td>
                                                        <?php echo(isset($empD->rehiredt) && $empD->rehiredt != '' ? $empD->rehiredt : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Contract Expiry</td>
                                                    <td>
                                                        <?php echo(isset($empD->conexpiry) && $empD->conexpiry != '' ? $empD->conexpiry : '') ?>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td class="font-weight-bold">Working Project</td>
                                                    <td>
                                                        <?php echo(isset($empD->workingProj) && $empD->workingProj != '' ? $empD->workingProj : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Charging Project</td>
                                                    <td>
                                                        <?php echo(isset($empD->chargingProj) && $empD->chargingProj != '' ? $empD->chargingProj : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Location</td>
                                                    <td>
                                                        <?php echo(isset($empD->location) && $empD->location != '' ? $empD->location : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Sub Location</td>
                                                    <td>
                                                        <?php echo(isset($empD->location_sub) && $empD->location_sub != '' ? $empD->location_sub : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Supervisor Name</td>
                                                    <td>
                                                        <?php echo(isset($empD->supernme) && $empD->supernme != '' ? $empD->supernme : '') ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="font-weight-bold">Hiring Salary</td>
                                                    <td>
                                                        <?php if (isset($permission[0]->CanViewAllDetail) && $permission[0]->CanViewAllDetail == 1) {
                                                            echo(isset($empD->hiresalary) ? $this->encrypt->decode($empD->hiresalary) : '');
                                                        } else {
                                                            echo '';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Hardship Allowance</td>
                                                    <td>
                                                        <?php echo(isset($empD->ddlhardship) && $empD->ddlhardship != '' ? $empD->ddlhardship : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Amount</td>
                                                    <td>
                                                        <?php echo(isset($empD->amount) && $empD->amount != '' ? $empD->amount : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Benefits</td>
                                                    <td>
                                                        <?php echo(isset($empD->benefits) && $empD->benefits != '' ? $empD->benefits : '') ?>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="hiring-status-fill" role="tabpanel"
                                     aria-labelledby="hiring-status-tab-fill">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Status of Hiring Formalities</div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless table-hover table-responsive">
                                                <tr>
                                                    <td class="font-weight-bold">PEME</td>
                                                    <td>
                                                        <?php echo(isset($empD->peme) && $empD->peme != '' ? $empD->peme : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">General Orientation Program</td>
                                                    <td>
                                                        <?php echo(isset($empD->gop) && $empD->gop != '' ? $empD->gop : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">GOP Date</td>
                                                    <td>
                                                        <?php echo(isset($empD->gopdt) && $empD->gopdt != '' ? $empD->gopdt : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Entity</td>
                                                    <td>
                                                        <?php echo(isset($empD->entityName) && $empD->entityName != '' ? $empD->entityName : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Department</td>
                                                    <td>
                                                        <?php echo(isset($empD->departmentName) && $empD->departmentName != '' ? $empD->departmentName : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">ID Card Issued</td>
                                                    <td>
                                                        <?php echo(isset($empD->cardissue) && $empD->cardissue != '' ? $empD->cardissue : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Letter of Appointment Received</td>
                                                    <td>
                                                        <?php echo(isset($empD->letterapp) && $empD->letterapp != '' ? $empD->letterapp : '') ?>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td class="font-weight-bold">Confirmation</td>
                                                    <td>
                                                        <?php echo(isset($empD->confirmation) && $empD->confirmation != '' ? $empD->confirmation : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Status</td>
                                                    <td>
                                                        <?php echo(isset($empD->statusName) && $empD->statusName != '' ? $empD->statusName : '') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Remarks</td>
                                                    <td>
                                                        <?php echo(isset($empD->remarks) && $empD->remarks != '' ? $empD->remarks : '') ?>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="documents-fill" role="tabpanel"
                                     aria-labelledby="settings-tab-fill">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Documents</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <?php
                                                if (isset($emp_docs) && $emp_docs != '') {
                                                    foreach ($emp_docs as $docs) {
                                                        $fileName = $docs->docName;
                                                        $file = $docs->docPath;
                                                        $img = base_url() . 'assets/images/icons/text.png';
                                                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                                                        if ($ext == 'doc' || $ext == 'docx') {
                                                            $type = 'application/msword';
                                                            $img = base_url() . 'assets/images/icons/docs.png';
                                                        } elseif ($ext == 'csv') {
                                                            $type = 'text/csv';
                                                            $img = base_url() . 'assets/images/icons/xls.png';
                                                        } elseif ($ext == 'xls') {
                                                            $type = 'application/vnd.ms-excel';
                                                            $img = base_url() . 'assets/images/icons/xls.png';
                                                        } elseif ($ext == 'xlsx') {
                                                            $type = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                                                            $img = base_url() . 'assets/images/icons/xls.png';
                                                        } elseif ($ext == 'gif') {
                                                            $type = 'image/gif';
                                                            $img = base_url() . 'assets/images/icons/img.png';
                                                        } elseif ($ext == 'html' || $ext == 'htm') {
                                                            $type = 'text/html';
                                                        } elseif ($ext == 'jpeg' || $ext == 'jpg') {
                                                            $type = 'image/jpeg';
                                                            $img = base_url() . 'assets/images/icons/img.png';
                                                        } elseif ($ext == 'png') {
                                                            $type = 'image/png';
                                                            $img = base_url() . 'assets/images/icons/img.png';
                                                        } elseif ($ext == 'pdf') {
                                                            $type = 'application/pdf';
                                                            $img = base_url() . 'assets/images/icons/pdf.png';
                                                        } elseif ($ext == 'mp3') {
                                                            $type = 'audio/mpeg';
                                                            $img = base_url() . 'assets/images/icons/img.png';
                                                        } elseif ($ext == 'mpeg') {
                                                            $type = 'video/mpeg';
                                                            $img = base_url() . 'assets/images/icons/img.png';
                                                        } elseif ($ext == 'zip') {
                                                            $type = 'application/zip';
                                                        } else {
                                                            $type = 'text/plain';
                                                            $img = base_url() . 'assets/images/icons/text.png';
                                                        }
                                                        echo '<div class="img-container col-2"  style="width: 150px;">
                                            <a data-ur="' . $file . '" href="' . base_url() . 'index.php/OpenFile?e=' . $docs->empno . '&doc=' . $fileName . '" target="_blank">
                                                <img src="' . $img . '" class="img-fluid" alt="image">
                                                <p class="  text-danger text-center">' . $fileName . '</p> 
                                            </a>
                                        </div> ';
                                                    }
                                                } else {
                                                    echo '<p>No record found</p>';
                                                }
                                                ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="assets-fill" role="tabpanel"
                                     aria-labelledby="assets-tab-fill">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Assets</div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Tag No</th>
                                                    <th>Serial No</th>
                                                    <th>Category</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <?php
                                                if (isset($assetEmp) && $assetEmp != '') {
                                                    foreach ($assetEmp as $k_a => $assets) {
                                                        echo ' <tr>
                                                    <td>' . ($k_a + 1) . '</td>
                                                    <td>' . (isset($assets->tag_no) && $assets->tag_no != '' ? $assets->tag_no : '') . '</td>
                                                    <td>' . (isset($assets->serial_no) && $assets->serial_no != '' ? $assets->serial_no : '') . '</td>
                                                    <td>' . (isset($assets->category) && $assets->category != '' ? $assets->category : '') . '</td> 
                                                    <td>' . (isset($assets->description) && $assets->description != '' ? $assets->description : '') . '</td> 
                                                    <td>' . (isset($assets->status_name) && $assets->status_name != '' ? $assets->status_name : '') . '</td> 
                                                </tr>';
                                                    }
                                                } ?>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ left profile info section -->

                    </div>
                </section>
                <!--/ profile info section -->
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->