<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- user Account -->
      <li class="dropdown user user-menu">
        <a href="" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo base_url() ?>assets/upload/image/206022.jpg" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $this->session->userdata('nama') ?></span>
        </a>
        <ul class="dropdown-menu">
          <li class="user-header">
            <img src="<?php echo base_url() ?>assets/upload/image/206022.jpg" class="img-circle" alt="User Image">
            <p><?php echo $this->session->userdata('nama') ?> - <?php echo $this->session->userdata('akses_level') ?><small><?php echo date('d M Y') ?></small></p>
          </li>
          
          </li>
          <!-- menu Footer -->
          <li class="user-footer">
            <div class="pull-left">
              <a href="" class="btn btn-default btn-flat">profile</a>
            </div>
            <div class="pull-right">
              <a href="<?php echo base_url('login/logout') ?>" class="btn btn-default btn-flat">sign out</a>
            </div>
          </li>
        </ul>
      </li>
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->