<div class="col-md-offset-1 col-md-10 col-md-offset-1 well" style="background-color: #eceff4; color: black;">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Jenis Reklame</h3>
  <form method="POST" id="form-update-jenisreklame">
    <input type="hidden" name="id" value="<?php echo $dataJenisreklame->id; ?>">

    <div class="col-sm-12">
      <div class="form-group">
        <label for="nama">Jenis Reklame</label>
        <input type="text" class="form-control" placeholder="Jenis Reklame" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataJenisreklame->nama; ?>" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="nilaijual">Nilai Jual</label>
        <input type="text" class="form-control" placeholder="Nilai Jual" name="nilaijual" aria-describedby="sizing-addon2" value="<?php echo $dataJenisreklame->nilaijual; ?>" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="indeks_1">Indeks I</label>
        <input type="text" class="form-control" placeholder="Indeks I " name="indeks_1" aria-describedby="sizing-addon2" value="<?php echo $dataJenisreklame->indeks_1; ?>" autocomplete="off">
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label for="indeks_2">Indeks II</label>
        <input type="text" class="form-control" placeholder="Indeks II" name="indeks_2" aria-describedby="sizing-addon2" value="<?php echo $dataJenisreklame->indeks_2; ?>" autocomplete="off">
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <hr>
        <button type="submit" id="btn-edit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>