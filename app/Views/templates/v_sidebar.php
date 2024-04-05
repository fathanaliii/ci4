<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="fas fa-warehouse"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>GUDANG</sup></div>
    </a>
    <!-- Divider -->
    <?php if (in_groups('admin')) : ?>
        <hr class="sidebar-divider">

        <div class="sidebar-heading text-white">
            Master
        </div>

        <li class="nav-item <?= uri_string() == '' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url(''); ?>">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item <?= uri_string() == 'admin' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-user"></i>
                <span>Master User</span></a>
        </li>
    <?php endif; ?>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-white">
        Management Data 
    </div>

    <li class="nav-item <?= uri_string() == 'barang' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('barang'); ?>">
            <i class="fas fa-use"></i>
            <span>Data Barang</span></a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading text-white">
        Utility 
    </div>

    <li class="nav-item <?= uri_string() == 'utility' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('utility'); ?>">
            <i class="fas fa-database"></i>
            <span>Backup DB</span></a>
    </li> -->


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
