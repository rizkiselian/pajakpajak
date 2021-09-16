<?php
$no = 1;
  foreach ($dataPerusahaan as $val) {
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $val['npwpd']; ?></td>
      <td><?php echo $val['nama_usaha']; ?></td>
      <td><?php echo $val['alamat']; ?></td>
      <td><?php echo $val['nama_kelurahan']; ?></td>
      <td><?php echo $val['nama_kecamatan']; ?></td>
      <td><?php echo $val['nama_kategori']; ?></td>
      <td class="text-center" style="min-width:300px;">
        <button class="btn btn-info detail-dataPerusahaan" data-id="<?php echo $val['id']; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
        <button class="btn btn-warning update-dataPerusahaan" data-id="<?php echo $val['id']; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-perusahaan" data-id="<?php echo $val['id']; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>