<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <!-- Container wrapper -->
    <div class="container">

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <!-- <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="" height="15" alt="Logo" loading="lazy" />
            </a> -->
            <a href="<?php echo site_url("Page/index"); ?>" class="btn btn-dark">
                <h4 style="color:white">Home</h4>
            </a>
        </div>
        <!-- Collapsible wrapper -->

        <?php if (isset($_SESSION['training_system'])) { ?>
            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <div class="content">
                    <a href="<?php echo site_url('User/schedule') ?>" class="m-1" style="color: white">
                        <i class="fa fa-calendar"></i> Schedule
                    </a>
                    <a href="<?php echo site_url('User/attendance') ?>" class="m-1" style="color: white">
                        <i class="fa fa-user"></i> Attendance
                    </a>
                    <a href="<?php echo site_url('User/logged_session') ?>" class="m-1" style="color: white">
                        <i class="fa fa-history"></i> Logged Session
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button onclick="myProfile()" class="dropbtn btn btn-dark"><i class="fa fa-user"></i> Profile <i class="fa fa-caret-down" aria-hidden="true"></i></button>
                    <div id="my-dropdown" class="dropdown-content">
                        <a href="<?php echo site_url('User/profile') ?>">
                            <i class="fa fa-user-circle-o"></i> My Profile
                        </a>
                        <a href="<?php echo site_url('Logout/index') ?>">
                            <i class="fa fa-sign-out"></i> Log Out
                        </a>
                    </div>
                </div>

            </div>
            <!-- Right elements -->
        <?php } else { ?>
            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <a class="btn btn-dark" href="<?php echo site_url("Login/index") ?>">
                    <h6 style="color:white">Log in</h6>
                </a>
                <a class="btn btn-dark" href="<?php echo site_url("Register/index") ?>">
                    <h6 style="color:white">Register</h6>
                </a>
            </div>
            <!-- Right elements -->
        <?php } ?>
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->