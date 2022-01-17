<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="ICS | Inventory Control System" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Administrador</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->username; ?></a>
            </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <!-- menu-open -->
                    <a href="<?= base_url("dashboard") ?>" class="nav-link <?= ($page == 'Dashboard/index') ? 'active' : '' ?>">
                        <!-- active -->
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Tablero
                        </p>
                    </a>
                </li>

                <li class="nav-item <?= ($page == 'Productos/add' || $page == 'Productos/index') ? 'menu-open' : '' ?>">
                    <!-- menu-open -->
                    <a href="#" class="nav-link <?= ($page == 'Productos/add' || $page == 'Productos/index') ? 'active' : '' ?>">
                        <!-- active -->
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Productos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('productos') ?>" class="nav-link <?= ($page == 'Productos/index') ? 'active' : '' ?>">
                                <!-- active -->
                                <i class="far fa-circle nav-icon"></i>
                                <p>Todos los productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('productos/add') ?>" class="nav-link <?= ($page == 'Productos/add') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Añadir producto</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script>
    $(document).ready(function() {

    })
</script>