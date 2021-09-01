<div class="col-md-offset-1 col-md-10 col-md-offset-1 well" style="background-color: #eceff4; color: black;">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Jenis</h3>

  <form id="form-tambah-jenis" method="POST">

    <div class="col-sm-12">
      <div class="form-group">
        <label for="nama_jenis">Nama Jenis</label>
        <input type="text" class="form-control" placeholder="Nama Jenis" name="nama_jenis" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%;">
          <?php
          foreach ($dataKategori as $val) {
            ?>
            <option value="<?php echo $val['id']; ?>">
              <?php echo $val['nama_kategori']; ?>
            </option>
            <?php
          }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <hr>
        <button type="submit" id="btn-tambah" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    
});
</script>