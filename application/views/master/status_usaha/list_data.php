<?php
$no = 1;
  foreach ($dataStatususaha as $val) {
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $val['nama_usaha']; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataStatususaha" data-id="<?php echo $val['id']; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-statususaha" data-id="<?php echo $val['id']; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>