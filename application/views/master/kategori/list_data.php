<?php
  $no = 1;
  foreach ($dataKategori as $val) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $val['nama_kategori']; ?></td>
    </tr>
    <?php
    $no++;
  }
?>