<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="<?= base_url() . 'assets/' ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url() . 'assets/' ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <!-- <a href="<?= site_url("dashboard") ?>" class="nav-link"> -->
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            <li class="nav-header">ANOTHER MENU</li>
            <li class="nav-item">
                <a href="<?= site_url("user") ?>" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        User Management
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url("login/logout") ?>" class="nav-link">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->