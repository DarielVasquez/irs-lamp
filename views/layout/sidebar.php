    <!-- Body -->
    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url?>dashboard-index">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url?>dashboard-index">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
                        aria-expanded="true" aria-controls="collapseAdmin">
                        <i class="fas fa-fw fa-user-edit"></i>
                        <span>User Actions</span>
                    </a>
                    <div id="collapseAdmin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">User Action Screens:</h6>
                            <a class="collapse-item" href="<?=base_url?>entries-tables">Entries</a>
                            <a class="collapse-item" href="<?=base_url?>events-tables">Events</a>
                            <div class="collapse-divider"></div>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>Administrator</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Administrator Screens:</h6>
                            <a class="collapse-item" href="<?=base_url?>campaigns-tables">Campaigns</a>
                            <a class="collapse-item" href="<?=base_url?>lob-tables">Line of Business</a>
                            <a class="collapse-item" href="<?=base_url?>issues-tables">Issues</a>
                            <a class="collapse-item"  href="<?=base_url?>entry_types-tables">Entry Types</a>
                            <a class="collapse-item"  href="<?=base_url?>locations-tables">Locations</a>
                            <a class="collapse-item"  href="<?=base_url?>status-tables">Status</a>
                            <a class="collapse-item"  href="<?=base_url?>issue_types-tables">Issue Types</a>
                            <a class="collapse-item"  href="<?=base_url?>users-tables">Users</a>
                            <div class="collapse-divider"></div>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->