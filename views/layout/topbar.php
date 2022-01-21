        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <?php $alerts = Utils::showAlerts(); ?>
                        <?php $numrows = mysqli_num_rows($alerts); ?> 
                        <!-- Nav Item - Alerts -->
                        <div class="alertsData">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->            
                                    <?php if($numrows>0): 
                                        echo "<span class='badge badge-danger badge-counter'>".$numrows."</span>"; 
                                        endif;?>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Notifications
                                    </h6>
                                        <?php if($numrows==0): 
                                            echo "<a class='dropdown-item d-flex align-items-center text-secondary'>Nothing to see here...</a>";
                                        endif;?>
                                        <?php $i = 1; foreach($alerts as $ale): ?>
                                            <?php 
                                                if($ale["slastatus"]=='Out of Time'):
                                                    echo "<a class='dropdown-item d-flex align-items-center bg-warning text-light'>".
                                                    $ale["subject"].": ".$ale["issue"]." issue of ".$ale["campaign"].", last modified by ".
                                                    $ale["user"]." was completed out of time.</a>";
                                                elseif($ale["slastatus"]=='Not Completed'):
                                                    echo "<a class='dropdown-item d-flex align-items-center bg-danger text-light'>".
                                                    $ale["subject"].": ".$ale["issue"]." issue of ".$ale["campaign"].", last modified by ".
                                                    $ale["user"]." was not completed on time.</a>";                                                     
                                                endif;
                                            ?>
                                        <?php $i++; endforeach; ?>                                       
                                        <a class="dropdown-item text-center small bg-light text-gray-500">Last 5 minutes</a>
                                </div>
                            </li>
                        </div>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['fullname']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?=base_url?>assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?=base_url?>profile-user">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"> 
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

<script>
setInterval(function(){
    $('.alertsData').load('plugins/alerts.php',
    function(){
    });
}, 30000);
</script>

<script>
   /* setInterval(function(){ 
    }, 360000);*/
</script>