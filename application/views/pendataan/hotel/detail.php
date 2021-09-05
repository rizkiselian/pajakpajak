<!-- Main content -->
<div class="row">
  <div class="col-md-3">

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border" style="background-color: #3c8dbc">
        <h3 class="profile-username text-center" style="color: #FFF"><strong><?= $dataHotel['npwpd']?></strong></h3>
      </div><!-- /.box-header -->

      <div class="box-body">
        <strong>Nama Usaha</strong>
        <p class="text-muted">
          <?= $dataHotel['nama_usaha']?>
        </p>

        <strong>Alamat</strong>
        <p class="text-muted">
          <?= $dataHotel['alamat']?>
        </p>

        <strong>Kecamatan - Desa</strong>
        <p class="text-muted">
          <?= $dataHotel['nama_kec']." - ".$dataHotel['nama_kel'] ?>
        </p>

        <strong>Kategori</strong>
        <p class="text-muted">
          <?= $dataHotel['nama_kat'] ?>
        </p>

        <strong>NIK</strong>
        <p class="text-muted">
          <?= $dataHotel['nik'] ?>
        </p>

        <strong>Titik Koordinat</strong>
        <p class="text-muted">
          <?= $dataHotel['titik_koordinat'] ?>
        </p>

        <strong>Luas Bumi Usaha (m2)</strong>
        <p class="text-muted">
          <?= $dataHotel['luas_bumi_tempat'] ?>
        </p>

        <strong>Luas Bangunan Usaha</strong>
        <p class="text-muted">
          <?= $dataHotel['luas_bangunan'] ?>
        </p>

      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->

  <div class="col-md-9">
    <div class="msg" style="display:none;">
      <?php echo $this->session->flashdata('msg'); ?>
    </div>
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Tipe, Jumlah dan Tarif Hotel</a></li>
        <li><a href="#fotoprofil" data-toggle="tab"><i>Occupancy</i></a></li>
        <li><a href="#password" data-toggle="tab">Fasilitas Parkir</a></li>
        <li><a href="#fotoprofil" data-toggle="tab">Surat Izin Usaha</a></li>
        <li><a href="#password" data-toggle="tab">Data Wajib Pajak</a></li>
      </ul>

      <div class="tab-content">

        <div class="active tab-pane" id="settings">

          <!-- /.box-header -->
          <div class="box-body">
            <table id="list-data" class="table table-bordered table-striped">
              <thead>
                <tr style="background-color: #337cb1; color: white;">
                  <th width="50px">No</th>
                  <th>Tipe Kamar</th>
                  <th>Jumlah Unit</th>
                  <th>Keterangan</th>
                  <th>Tarif</th>
                  <th style="text-align: center;">Aksi</th>
                </tr>
              </thead>
              <tbody id="data-tipekamar">

              </tbody>
            </table>
          </div>

        </div>

        <div class="tab-pane" id="fotoprofil">
          <form class="form-horizontal" action="<?php echo base_url('Profile/ubah_fotoprofil') ?>" method="POST">

            <div class="form-group">
              <label for="inputFoto" class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" placeholder="Foto" name="foto">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="password">
          <form class="form-horizontal" action="<?php echo base_url('Profile/ubah_password') ?>" method="POST">
            <div class="form-group">
              <label for="passLama" class="col-sm-2 control-label">Password Lama</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Password Lama" name="passLama">
              </div>
            </div>
            <div class="form-group">
              <label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
              </div>
            </div>
            <div class="form-group">
              <label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>

  </div>

</div><!-- /.row -->
