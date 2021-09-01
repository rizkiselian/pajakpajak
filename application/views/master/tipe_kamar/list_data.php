<?php
$no = 1;
  foreach ($dataTipekamar as $val) {
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $val['tipekamar']; ?></td>
      <td><?php echo $val['jumlahunit']; ?></td>
      <td><?php echo $val['tarif']; ?></td>
      <td><?php echo $val['keterangan']; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataTipekamar" data-id="<?php echo $val['id']; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-tipekamar" data-id="<?php echo $val['id']; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>