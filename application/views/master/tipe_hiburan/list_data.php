<?php
$no = 1;
  foreach ($dataTipehiburan as $val) {
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $val['klasifikasi']; ?></td>
      <td><?php echo $val['jumlahunit']; ?></td>
      <td><?php echo $val['tarif']; ?></td>
      <td><?php echo $val['occupancy']; ?></td>
      <td><?php echo $val['keterangan']; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataTipehiburan" data-id="<?php echo $val['id']; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-tipehiburan" data-id="<?php echo $val['id']; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>