<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/uploads/avatar/<?php echo $userdata['foto']; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata['username']; ?></p>
        <!-- Status -->
        <small><i class="fa fa-circle text-success"></i> Online</small>
      </div>
    </div>

    <br>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      <li class="treeview <?php if($page=='Master'){echo "active";} ?>">
        <a href="">
          <i class="fa fa-gears"></i> 
          <span>Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if($subpage=='Kecamatan'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>kecamatan/"><i class="fa fa-angle-right"></i> Kecamatan</a>
          </li>
          <li <?php if($subpage=='Desa'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>desa"><i class="fa fa-angle-right"></i> Desa</a>
          </li>
          <li <?php if($subpage=='Kategori'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>kategori"><i class="fa fa-angle-right"></i> Kategori</a>
          </li>
          <li <?php if($subpage=='Klasifikasi'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>klasifikasi"><i class="fa fa-angle-right"></i> Klasifikasi</a>
          </li>
          <li <?php if($subpage=='Tipekamar'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>tipe-kamar"><i class="fa fa-angle-right"></i> Tipe Kamar</a>
          </li>
          <li <?php if($subpage=='Tipehiburan'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>tipe-hiburan"><i class="fa fa-angle-right"></i> Tipe Hiburan</a>
          </li>
          <li <?php if($subpage=='Jenisreklame'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>jenis-reklame"><i class="fa fa-angle-right"></i> Jenis Reklame</a>
          </li>
          <li <?php if($subpage=='Jenis'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>jenis"><i class="fa fa-angle-right"></i> Jenis</a>
          </li>

        </ul>
      </li>
      
      <!-- <li <?php if ($page == 'pegawai') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pegawai'); ?>">
          <i class="fa fa-user"></i>
          <span>Data Pegawai</span>
        </a>
      </li> -->
<!-- 
      <li <?php if ($page == 'merek') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Merek'); ?>">
          <i class="fa fa-user"></i>
          <span>Merek Kendaraan</span>
        </a>
      </li>

      <li <?php if ($page == 'jenis_kendaraan') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Jenis-Kendaraan'); ?>">
          <i class="fa fa-user"></i>
          <span>Jenis Kendaraan</span>
        </a>
      </li>

      <li <?php if ($page == 'posisi') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Posisi'); ?>">
          <i class="fa fa-briefcase"></i>
          <span>Data Posisi</span>
        </a>
      </li>
      
      <li <?php if ($page == 'kota') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kota'); ?>">
          <i class="fa fa-location-arrow"></i>
          <span>Data Kota</span>
        </a>
      </li> -->

      

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>