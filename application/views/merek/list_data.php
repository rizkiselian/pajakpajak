<?php
  $no=1;
  foreach ($dataMerek as $merek) {
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td style="min-width:230px;"><?php echo $merek->merek; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataMerek" data-id="<?php echo $merek->id_merek; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-merek" data-id="<?php echo $merek->id_merek; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>