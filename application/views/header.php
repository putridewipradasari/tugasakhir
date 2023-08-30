<header class="main-header">

  <!-- Logo -->
  <a href="assets/admin/index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>DAM</b>RI</span>
    <!-- logo for regular state and mobile devices -->
    <img src="<?php echo base_url('assets/simbol.png'); ?>" width='35' height='40'>
    <span class="logo-lg"><b>Admin</b>LTE</span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->



    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image"> -->
            <i class="fa fa-key"></i>
            <span class="hidden-xs"><?php echo  $this->session->userdata('userdata')->nama; ?></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <!-- User image -->
            <li class="user-header">
              <!-- <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image"> -->

              <p>
                <?php echo  $this->session->userdata('userdata')->nama; ?>
                <!--small>Member since Nov. 2012</small-->
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <!--div class="pull-left">
                  <a href="<--?php echo base_url('Profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div-->
              <div class="pull-right">
                <a href="<?php echo base_url('Auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url('Auth/logout'); ?>" class="fa fa-power-off"> Logout</a>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <!--li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li-->
      </ul>
    </div>

  </nav>
</header>