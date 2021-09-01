<?php
  $no = 1;
  foreach ($dataDesa as $desa) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $desa['nama_kec']; ?></td>
      <td><?php echo $desa['nama_kelurahan']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>