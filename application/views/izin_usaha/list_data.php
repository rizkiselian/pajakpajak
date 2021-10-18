<?php
$no = 1;
  foreach ($dataIzin_usaha as $val) {
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $val['nomor_surat_izin']; ?></td>
      <td class="text-center" style="min-width:300px;">
        <button class="btn btn-info detail-dataIzin_usaha" data-id="<?php echo $val['id']; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
        <button class="btn btn-warning update-dataIzin_usaha" data-id="<?php echo $val['id']; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-izin_usaha" data-id="<?php echo $val['id']; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>