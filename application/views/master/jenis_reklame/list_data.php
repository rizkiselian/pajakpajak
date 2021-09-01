<?php
$no = 1;
  foreach ($dataJenisreklame as $val) {
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $val['nama']; ?></td>
      <td><?php echo $val['nilaijual']; ?></td>
      <td><?php echo $val['indeks_1']; ?></td>
      <td><?php echo $val['indeks_2']; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataJenisreklame" data-id="<?php echo $val['id']; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-jenisreklame" data-id="<?php echo $val['id']; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>