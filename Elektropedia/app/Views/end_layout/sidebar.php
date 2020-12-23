<?php if (in_groups('Admin')) : ?>
    <!-- Admin Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-bolt"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Elektropedia</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - User -->

        <div class="sidebar-heading">
            User Management
        </div>

        <!-- Nav Item - My Profile -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/user'); ?>">
                <i class="fas fa-users"></i>
                <span>Daftar User</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Transaksi
        </div>

        <!-- Nav Item - Menu Penjualan -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-receipt"></i>
                <span>Penjualan</span>
            </a>
        </li>

        <!-- Nav Item - Menu Verifikasi Pembayaran -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-cash-register"></i>
                <span>Verikasi Pembayaran</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Produk
        </div>

        <!-- Nav Item - Menu Produk -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/produk/daftarProduk">
                <i class="fas fa-laptop"></i>
                <span>Produk</span>
            </a>
        </li>


        <!-- Nav Item - Kategori Collapse Menu -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Kategori</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Daftar Kategori:</h6>
                    <a class="collapse-item" href="">Laptop</a>
                    <a class="collapse-item" href="">Smartphones</a>
                    <a class="collapse-item" href="">Cameras</a>
                    <a class="collapse-item" href="">Accessories</a>
                </div>
            </div>
        </li> -->

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href=" <?= base_url(); ?>/produk/create">
                <i class="fas fa-fw fa-plus-circle"></i>
                <span>Tambah Produk</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
<?php elseif (in_groups('User')) : ?>
    <!-- User Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-bolt"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Elektropedia</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Profile
        </div>

        <!-- Nav Item - Menu Penjualan -->
        <li class="nav-item">
            <a class="nav-link" href="/user/profile/<?= user()->username ?>">
                <i class="fas fa-user"></i>
                <span>My Profile</span>
            </a>
        </li>

        <!-- Nav Item - Menu Verifikasi Pembayaran -->
        <li class="nav-item">
            <a class="nav-link" href="/user/edit/<?= user_id(); ?>">
                <i class="fas fa-user-edit"></i>
                <span>Edit Profile</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Transaksi
        </div>

        <!-- Nav Item - Menu Produk -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-receipt"></i>
                <span>Pemesanan</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
<?php endif ?>