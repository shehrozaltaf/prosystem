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

                    <!--<li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>-->
                    <!--<li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                    class="ficon feather icon-search"></i></a>-->
                        <div class="search-input">
                            <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                            <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
                                   data-search="template-list">
                            <div class="search-input-close"><i class="feather icon-x"></i></div>
                            <ul class="search-list search-list-main"></ul>
                        </div>
                    </li>

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link" href="<?php echo base_url() ?>" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600"><?php
                                    if (isset($_SESSION['login']['full_name']) && $_SESSION['login']['full_name'] != '') {
                                        echo "Welcome: " . ucwords($_SESSION['login']['full_name']);
                                    } else {
                                        echo 'Welcome2';
                                    }
                                    ?></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?php echo base_url() ?>">
                                <i class="feather icon-user"></i> Edit Profile
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