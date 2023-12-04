        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Fathanalii <sup>2</sup></div>
            </a>
            <br>

            <div class="sidebar-heading">
                Dashboard
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/'); ?>">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <?php if (in_groups('admin')) : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    User Management
                </div>

                <!-- Nav Item - Myprofile -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin'); ?>">
                        <i class="fas fa-user"></i>
                        <span>Profile User</span></a>
                </li>

                <!-- Nav Item - Editprofile -->
                <li class="nav-item">
                    <a class="nav-link" href="tables.html">
                        <i class="fas fa-user-edit"></i>
                        <span>Edit Profile</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - logouts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span> Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->