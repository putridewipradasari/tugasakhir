<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <!-- <div class="pull-left image">
        <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo  $this->session->userdata('userdata')->nama; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div> -->
      <img src="<?php echo base_url('assets/damri.png'); ?>" width='200' height='30' alt="User Image">
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- <li class="header">MAIN NAVIGATION</li> -->
      <!--li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="assets/admin/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li class="active"><a href="assets/admin/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li-->

      <li <?= $this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
        <a href="<?php base_url() ?>Dashboard">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- <li <?= $this->uri->segment(1) == 'Data' ? 'class="active"' : '' ?>>
        <a href="<?php base_url() ?>Data">
          <i class="fa fa-files-o"></i>
          <span>Data Barang</span>
        </a>
      <li> -->
      <?php if ($this->session->userdata('userdata')->role == 'Petugas') : ?>



        <li <?= $this->uri->segment(1) == 'Aman' ? 'class="active"' : '' ?>>
          <a href="<?php base_url() ?>Aman">
            <i class="fa fa-unlock-alt"></i>
            <span>Scan Id Card</span>
          </a>
        </li>
        <!-- <li <?= $this->uri->segment(1) == 'Tamudt' ? 'class="active"' : '' ?>>
          <a href="<?php base_url() ?>Tamudt">
            <i class="fa fa-list-alt"></i>
            <span>Data Tamu</span>
          </a>
        </li> -->
      <?php elseif ($this->session->userdata('userdata')->role == 'Admin') : ?>
        <li <?= $this->uri->segment(1) == 'Qrpegawai' ? 'class="active"' : '' ?>>
          <a href="<?php base_url() ?>Qrpegawai">
            <i class="fa fa-users"></i>
            <span>Pegawai</span>
          </a>
        </li>
        <li <?= $this->uri->segment(1) == 'Honorer' ? 'class="active"' : '' ?>>
          <a href="<?php base_url() ?>Honorer">
            <i class="fa fa-files-o"></i>
            <span>Honorer</span>
          </a>
        <li>
        <li <?= $this->uri->segment(1) == 'Magang' ? 'class="active"' : '' ?>>
          <a href="<?php base_url() ?>Magang">
            <i class="fa fa-files-o"></i>
            <span>Magang</span>
          </a>
        <li>

        <li <?= $this->uri->segment(1) == 'Tamukrt' ? 'class="active"' : '' ?>>
          <a href="<?php base_url() ?>Tamukrt">
            <i class="fa fa-files-o"></i>
            <span>Kartu Tamu</span>
          </a>
        <li>
        <li <?= $this->uri->segment(1) == 'User' ? 'class="active"' : '' ?>>
          <a href="<?php base_url() ?>User">
            <i class="fa fa-users"></i>
            <span>User</span>
          </a>
        </li>
        <!-- <li <?= $this->uri->segment(1) == 'Pegawai' ? 'class="active"' : '' ?>>
          <a href="<?php base_url() ?>Pegawai">
            <i class="fa fa-users"></i>
            <span>Pegawai</span>
          </a>
        </li> -->
      <?php endif; ?>
      <li <?= $this->uri->segment(1) == 'Masuk' ? 'class="active"' : '' ?>>
        <a href="<?php base_url() ?>Masuk">
          <i class="fa  fa-indent"></i>
          <span>Kunjungan</span>
        </a>
      </li>
      <li <?= $this->uri->segment(1) == 'Tamudt' ? 'class="active"' : '' ?>>
        <a href="<?php base_url() ?>Tamudt">
          <i class="fa fa-list-alt"></i>
          <span>Data Tamu</span>
        </a>
      </li>
  </section>
  </.sidebar>
</aside>