<?php
  $no = 1;
  foreach ($dataKecamatan as $kec) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kec['nama_kecamatan']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>