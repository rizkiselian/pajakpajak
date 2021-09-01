<div class="col-md-offset-1 col-md-10 col-md-offset-1 well" style="background-color: #59b1f1; color: white;">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pegawai</h3>
      <form method="POST" id="form-update-klasifikasi">
        <input type="hidden" name="id" value="<?php echo $dataKlasifikasi->id_klasifikasi; ?>">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <!-- <i class="glyphicon glyphicon-user"></i> -->
          </span>
          <input type="text" class="form-control" placeholder="Nama Klasifikasi" name="nama_klasifikasi" aria-describedby="sizing-addon2" value="<?php echo $dataKlasifikasi->nama; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <!-- <i class="glyphicon glyphicon-home"></i> -->
          </span>
          <select name="id_kategori" class="form-control select2"  aria-describedby="sizing-addon2">
            <?php
            foreach ($dataKategori as $dk) {
              ?>
              <option value="<?php echo $dk->id; ?>" <?php if($dk->id == $dataKlasifikasi->id_kategori){echo "selected='selected'";} ?>><?php echo $dk->nama_kategori; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>