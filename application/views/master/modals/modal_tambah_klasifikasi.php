<div class="col-md-offset-1 col-md-10 col-md-offset-1 well" style="background-color: #59b1f1; color: white;">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Pegawai</h3>

  <form id="form-tambah-klasifikasi" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <!-- <i class="glyphicon glyphicon-user"></i> -->
      </span>
      <input type="text" class="form-control" placeholder="Nama Klasifikasi" name="nama_klasifikasi" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <!-- <i class="glyphicon glyphicon-home"></i> -->
      </span>
      <select name="id_kategori" class="form-control select2" aria-describedby="sizing-addon2">
        <option>Kategori</option>
        <?php
        foreach ($dataKategori as $dk) {
          ?>
          <option value="<?php echo $dk->id; ?>">
            <?php echo $dk->nama_kategori; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>