<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-2 pull-right">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-status-usaha"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr style="background-color: #337cb1; color: white;">
          <th width="50px">No</th>
          <th>Status Usaha</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-status-usaha">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_status_usaha; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataStatususaha', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>