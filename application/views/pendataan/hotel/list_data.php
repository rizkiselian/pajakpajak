<?php
$no = 1;
foreach ($dataHotel as $val) {
  ?>
  <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $val['npwpd']; ?></td>
    <td><?php echo $val['nama_usaha']; ?></td>
    <td><?php echo $val['alamat']; ?></td>
    <td><?php echo $val['nama_kec']; ?></td>
    <td><?php echo $val['nama_kel']; ?></td>
    <td class="text-center" style="min-width:70px;">
      <a href="<?= base_url('pendataan-hotel-detail/'.$val['npwpd']) ?>" type="button" class="btn btn-info glyphicon glyphicon-info-sign" title="Detail Pajak"></a>
    </td>
  </tr>
  <?php
}
?>