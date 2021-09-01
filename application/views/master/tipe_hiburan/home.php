<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-2 pull-right">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-tipehiburan"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr style="background-color: #337cb1; color: white;">
          <th width="50px">No</th>
          <th>Klasifikasi</th>
          <th>Jumlah Unit</th>
          <th>Tarif (Rp)</th>
          <th><i>Occupancy</i></th>
          <th>Keterangan</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-tipehiburan">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_tipehiburan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataTipehiburan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>

<!-- <?php include './assets/js/ajax.php'; ?> -->
<!-- <?php $this->load->view('master/tipe_hiburan/ajax'); ?> -->