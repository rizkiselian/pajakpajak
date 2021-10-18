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
      <!-- <li class="header">LIST MENU</li> -->
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
          <li <?php if($subpage=='Status Kepemilikan'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>status-kepemilikan"><i class="fa fa-angle-right"></i> Status Kepemilikan</a>
          </li>
          <li <?php if($subpage=='Status Usaha'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>status-usaha"><i class="fa fa-angle-right"></i> Status Usaha</a>
          </li>

        </ul>
      </li>

    <li class="treeview <?php if($page=='data_wajib_pajak'){echo "active";} ?>">
        <a href="">
          <i class="fa fa-book"></i> 
          <span>Data Wajib Pajak</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if($subpage=='Perusahaan'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>Perusahaan/"><i class="fa fa-angle-right"></i> Perusahaan</a>
          </li>
          <li <?php if($subpage=='Izin Usaha'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>Izin_usaha"><i class="fa fa-angle-right"></i> Izin Usaha</a>
          </li>
          <li <?php if($subpage=='WPP'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>wpp"><i class="fa fa-angle-right"></i> Wajib Pajak Perorangan</a>
          </li>

        </ul>
      </li>

    </ul>
    <!-- /.sidebar-menu -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">PENDATAAN</li>

      <li class="treeview <?php if($page=='Pendataan'){echo "active";} ?>">
        <a href="">
          <i class="glyphicon glyphicon-th-list"></i> 
          <span>Pendataan Pajak (SA)</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

          <li <?php if($subpage=='Pendataan Hotel'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>pendataan-hotel/"><i class="fa fa-angle-right"></i> Pajak Hotel</a>
          </li>

          <li <?php if($subpage=='Pendataan Restoran'){echo "class=\"active\"";} ?>>
            <a href="<?php echo base_url(); ?>pendataan-restoran/"><i class="fa fa-angle-right"></i> Pajak Restoran</a>
          </li>

        </ul>
      </li>

    </ul>
    <!-- /.sidebar-menu -->

  </section>
  <!-- /.sidebar -->
</aside>