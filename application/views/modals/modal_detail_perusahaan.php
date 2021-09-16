<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Jenis Kelamin</th>
            <th>Posisi</th>
          </tr>
        </thead>
        <tbody id="data-perusahaan">
          <?php
            foreach ($dataPerusahaan as $pegawai) {
              ?>
              <tr>
                <td style="min-width:230px;"><?php echo $pegawai['nik']; ?></td>
                <td><?php echo $pegawai['no_izin_usaha']; ?></td>
                <td><?php echo $pegawai['tgl_usaha']; ?></td>
                <td><?php echo $pegawai['titik_koordinat']; ?></td>
              </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>