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
            <a href="<?php isset($_SESSION['training_system']) ?? site_url("Page/admin"); ?>">
                <h4 style="color:white">Home</h4>
            </a>
        </div>
        <!-- Collapsible wrapper -->

        <?php if (isset($_SESSION['training_system'])) { ?>
            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <a href="<?php echo site_url("Logout/index") ?>">
                    <h6>Log out</h6>
                </a>
            </div>
            <!-- Right elements -->
        <?php } else { ?>
            <!-- Right elements -->
            <!-- <div class="d-flex align-items-center">
                <a class="btn btn-light m-1" href="<?php echo site_url("Login/index") ?>"> Log in </a>
                <a class="btn btn-light m-1" href="<?php echo site_url("Register/index") ?>"> Register </a>
            </div> -->
            <!-- Right elements -->
        <?php } ?>
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->