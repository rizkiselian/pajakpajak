<div class="col-md-offset-1 col-md-10 col-md-offset-1 well" style="background-color: #eceff4; color: black;">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Tipe Kamar</h3>

  <form id="form-tambah-tipekamar" method="POST">

    <div class="col-sm-12">
      <div class="form-group">
        <label for="tipekamar">Tipe Kamar</label>
        <input type="text" class="form-control" placeholder="Tipe Kamar" name="tipekamar" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="jumlahunit">Jumlah Unit</label>
        <input type="text" class="form-control" placeholder="Jumlah Unit" name="jumlahunit" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="tarif">Tarif Kamar</label>
        <input type="text" class="form-control" placeholder="Tarif Kamar" name="tarif" aria-describedby="sizing-addon2" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" aria-describedby="sizing-addon2" autocomplete="off">
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
