<div class="col-md-offset-1 col-md-10 col-md-offset-1 well" style="background-color: #eceff4; color: black;">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Jenis</h3>

  <form id="form-tambah-jenis" method="POST">

    <div class="col-sm-12">
      <div class="form-group">
        <label for="npwpd">NPWPD</label>
        <input type="text" class="form-control" placeholder="NPWPD" name="npwpd" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="nama_usaha">Nama usaha</label>
        <input type="text" class="form-control" placeholder="Nama Usaha" name="nama_usaha" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="id_desa">Desa</label>
        <select name="id_desa" class="form-control" aria-describedby="sizing-addon2" style="width: 100%;">
          <?php
          foreach ($dataDesa as $val) {
            ?>
            <option value="<?php echo $val['id_kelurahan']; ?>">
              <?php echo $val['nama_kelurahaan']; ?>
            </option>
            <?php
          }
          ?>
        </select>
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="id_kecamatan">Kecamatan</label>
        <select name="id_dkecamatan" class="form-control" aria-describedby="sizing-addon2" style="width: 100%;">
          <?php
          foreach ($dataKecamatan as $val) {
            ?>
            <option value="<?php echo $val['id_kecamatan']; ?>">
              <?php echo $val['nama_kecamatan']; ?>
            </option>
            <?php
          }
          ?>
        </select>
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

    <div class="col-sm-12">
      <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" placeholder="NIK" name="nik" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="no_izin_usaha">No Izi Usaha</label>
        <input type="text" class="form-control" placeholder="No Izin Usaha" name="no_izin_usaha" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="tgl_usaha">Tanggal Usaha</label>
        <input type="date" class="form-control" placeholder="Tanggal Usaha" name="tgl_usaha" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="titik_koordinat">Titik Koordinat</label>
        <input type="text" class="form-control" placeholder="Titik Koordinat" name="titik_koordinat" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="luas_bumi_tempat">Luas Bumi/ Tempat</label>
        <input type="text" class="form-control" placeholder="Luas Bumi/ Tempat" name="luas_bumi_tempat" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="luas_bangunan">Luas Bangunan</label>
        <input type="text" class="form-control" placeholder="Luas Bangunan" name="luas_bangunan" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="id_surat_izin">ID Surat Izin</label>
        <input type="text" class="form-control" placeholder="ID Surat Izin" name="id_surat_izin" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="sifat_usaha">Sifat Usaha</label>
        <input type="text" class="form-control" placeholder="Sifat Usaha" name="sifat_usaha" aria-describedby="sizing-addon2" autocomplete="off">
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