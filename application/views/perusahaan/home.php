<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-2 pull-right">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-perusahaan"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr style="background-color: #337cb1; color: white;">
          <th width="50px">No</th>
          <th>NPWPD</th>
          <th>Nama Usaha</th>
          <th>Alamat</th>
          <th>Desa</th>
          <th>Kecamatan</th>
          <th>Kategori</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-perusahaan">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_perusahaan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPerusahaan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>