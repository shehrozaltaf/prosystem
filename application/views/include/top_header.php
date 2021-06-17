<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                        class="ficon feather icon-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link" href="<?php echo base_url() ?>" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600"><?php
                                    if (isset($_SESSION['login']['full_name']) && $_SESSION['login']['full_name']!='') {
                                        echo 'Welcome '.ucwords($_SESSION['login']['full_name']);
                                    }else{
                                        echo 'Welcome';
                                    }
                                    ?></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?php echo base_url() ?>">
                                <i class="feather icon-user"></i> Edit Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="changePassword()">
                                <i class="feather icon-lock"></i>
                                Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="logout()">
                                <i class="feather icon-power"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->

<div class="modal fade text-left" id="paswordModal" tabindex="-1" role="dialog"
     aria-labelledby=""
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="">Change Password</h4>
                <input type="hidden" id="delete_idActual" name="delete_idActual">
            </div>
            <div class="modal-body">
                <p>Are you sure, change password?</p>
            </div>
            <div class="col-sm-6 col-6">
                <div class="form-group">
                    <label for="current_password" class="label-control">Currnet Password</label>
                    <input type="text" class="form-control" id="current_password" name="current_password"
                           autocomplete="current_password" required>
                </div>
            </div>
            <div>
            </div>
            <div class="col-sm-6 col-6">
                <div class="form-group">
                    <label for="new_password" class="label-control">New Password</label>
                    <input type="text" class="form-control" id="new_password" name="new_password"
                           autocomplete="new_password" required>
                </div>
            </div>
            <div>
            </div>
            <div class="col-sm-6 col-6">
                <div class="form-group">
                    <label for="confirm_password" class="label-control">Confirm Password</label>
                    <input type="text" class="form-control" id="confirm_password" name="confirm_password"
                           autocomplete="confirm_password" required>
                </div>
            </div>
            <div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="">Change Password
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function changePassword(obj) {
        var id = $(obj).parent('td').attr('data-id');
        $('#delete_idActual').val(id);
        $('#paswordModal').modal('show');
    }
</script>