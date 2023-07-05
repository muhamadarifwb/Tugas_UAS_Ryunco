  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin/dashboard') ?>" class="brand-link">
      <img src="<?php echo base_url() ?>assets/upload/image/206022.jpg"  class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ryunco</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <!-- Menu Dashboard -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link">
              <i class="fas fa-tachometer-alt"></i>
              <p>DASHBOARD</p>
            </a>
          </li>

          <!-- Menu Dashboard -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/transaksi') ?>" class="nav-link">
              <i class="fa fa-check text-aqua"></i>
              <p>TRANSAKSI</p>
            </a>
          </li>

          <!-- Menu Produk -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Produk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/produk') ?>" class="nav-link">
                  <i class="fa fa-table"></i>
                  <p>Data Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/produk/tambah') ?>" class="nav-link">
                  <i class="fa fa-plus"></i>
                  <p>Tambah Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/kategori') ?>" class="nav-link">
                  <i class="fa fa-tags"></i>
                  <p>Kategori Produk</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- Menu Rekening -->
          <!-- Menu Dashboard -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/rekening') ?>" class="nav-link">
            <i class="fa-solid fa-dollar-sign" style="color: #ffffff;"></i>
              <p>DATA REKENING</p>
            </a>
          </li>

          <!-- Menu User -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/user') ?>" class="nav-link">
                  <i class="fa fa-table"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/user/tambah') ?>" class="nav-link">
                  <i class="fa fa-plus"></i>
                  <p>Tambah User</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu Konfigurasi -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                KONFIGURASI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi') ?>" class="nav-link">
                  <i class="fa fa-home"></i>
                  <p>Konfigurasi Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/logo') ?>" class="nav-link">
                  <i class="fa fa-image"></i>
                  <p>Konfigurasi Logo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/icon') ?>" class="nav-link">
                  <i class="fa fa-image"></i>
                  <p>Konfigurasi Icon</p>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">