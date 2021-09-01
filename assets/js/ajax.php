<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	window.onload = function() {
		tampilPegawai();
		tampilKecamatan();
		tampilDesa();
		tampilKategori();
		tampilKlasifikasi();
		tampilTipekamar();
		tampilTipehiburan();
		tampilJenisreklame();
		tampilJenis();
		<?php
		if ($this->session->flashdata('msg') != '') {
			echo "effect_msg();";
		}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
		$("#btn-tambah").attr("disabled", false);
		$("#btn-edit").attr("disabled", false);
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	function tampilPegawai() {
		$.get('<?php echo base_url('Pegawai/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pegawai').html(data);
			refresh();
		});
	}

	var id_pegawai;
	$(document).on("click", ".konfirmasiHapus-pegawai", function() {
		id_pegawai = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPegawai", function() {
		var id = id_pegawai;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPegawai();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPegawai", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pegawai').modal('show');
		})
	})

	$('#form-tambah-pegawai').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pegawai").reset();
				$('#tambah-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pegawai', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pegawai").reset();
				$('#update-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-pegawai').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-pegawai').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Merek
	function tampilMerek() {
		$.get('<?php echo base_url('Merek/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-merek').html(data);
			refresh();
		});
	}

	var id_merek;
	$(document).on("click", ".konfirmasiHapus-merek", function() {
		id_merek = $(this).attr("data-id_merek");
	})
	$(document).on("click", ".hapus-dataMerek", function() {
		var id = id_merek;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Merek/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKota();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataMerek", function() {
		var id = $(this).attr("data-id_merek");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Merek/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-merek').modal('show');
		})
	})

	$(document).on("click", ".detail-dataMerek", function() {
		var id = $(this).attr("data-id_merek");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Merek/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
			$('#detail-merek').modal('show');
		})
	})

	$('#form-tambah-merek').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Merek/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilMerek();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-merek").reset();
				$('#tambah-merek').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-merek', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Merek/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-merek").reset();
				$('#update-merek').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-merek').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-merek').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Kota
	function tampilKota() {
		$.get('<?php echo base_url('Kota/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kota').html(data);
			refresh();
		});
	}

	var id_kota;
	$(document).on("click", ".konfirmasiHapus-kota", function() {
		id_kota = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKota", function() {
		var id = id_kota;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKota();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kota').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
			$('#detail-kota').modal('show');
		})
	})

	$('#form-tambah-kota').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kota").reset();
				$('#tambah-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kota', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kota").reset();
				$('#update-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kota').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Kecamatan
	function tampilKecamatan() {
		$.get('<?php echo base_url('Master/tampil_kecamatan'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kecamatan').html(data);
			refresh();
		});
	}

	//Desa
	function tampilDesa() {
		$.get('<?php echo base_url('Master/tampil_desa'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-desa').html(data);
			refresh();
		});
	}

	//Kategori
	function tampilKategori() {
		$.get('<?php echo base_url('Master/tampil_kategori'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kategori').html(data);
			refresh();
		});
	}

	//Klasifikasi
	function tampilKlasifikasi() {
		$.get('<?php echo base_url('Master/tampilKlasifikasi'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-klasifikasi').html(data);
			refresh();
		});
	}

	var id_klasifikasi;
	$(document).on("click", ".konfirmasiHapus-klasifikasi", function() {
		id_klasifikasi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKlasifikasi", function() {
		var id = id_klasifikasi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/deleteKlasifikasi'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKlasifikasi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKlasifikasi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/updateKlasifikasi'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-klasifikasi').modal('show');
		})
	})

	$('#form-tambah-klasifikasi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesTambahKlasifikasi'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKlasifikasi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-klasifikasi").reset();
				$('#tambah-klasifikasi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-klasifikasi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesUpdateKlasifikasi'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKlasifikasi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-klasifikasi").reset();
				$('#update-klasifikasi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-klasifikasi').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-klasifikasi').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Tipe kamar
	function tampilTipekamar() {
		$.get('<?php echo base_url('Master/tampilTipekamar'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-tipekamar').html(data);
			refresh();
		});
	}

	var id_tipekamar;
	$(document).on("click", ".konfirmasiHapus-tipekamar", function() {
		id_tipekamar = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataTipekamar", function() {
		var id = id_tipekamar;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/deleteTipekamar'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTipekamar();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTipekamar", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/updateTipekamar'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-tipekamar').modal('show');
		})
	})

	$('#form-tambah-tipekamar').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesTambahTipekamar'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTipekamar();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-tipekamar").reset();
				$('#tambah-tipekamar').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-tambah").attr("disabled", true);
			}			
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-tipekamar', function(e){
		var data = $(this).serialize();
		
		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesUpdateTipekamar'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTipekamar();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-tipekamar").reset();
				$('#update-tipekamar').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-edit").attr("disabled", true);
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-tipekamar').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-tipekamar').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Posisi
	function tampilPosisi() {
		$.get('<?php echo base_url('Posisi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-posisi').html(data);
			refresh();
		});
	}

	var id_posisi;
	$(document).on("click", ".konfirmasiHapus-posisi", function() {
		id_posisi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPosisi", function() {
		var id = id_posisi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPosisi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-posisi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
			$('#detail-posisi').modal('show');
		})
	})

	$('#form-tambah-posisi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-posisi").reset();
				$('#tambah-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-posisi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-posisi").reset();
				$('#update-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-posisi').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-posisi').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Tipe hiburan
	function tampilTipehiburan() {
		$.get('<?php echo base_url('Master/tampilTipehiburan'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-tipehiburan').html(data);
			refresh();
		});
	}

	var id_tipehiburan;
	$(document).on("click", ".konfirmasiHapus-tipehiburan", function() {
		id_tipehiburan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataTipehiburan", function() {
		var id = id_tipehiburan;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/deleteTipehiburan'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTipehiburan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTipehiburan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/updateTipehiburan'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-tipehiburan').modal('show');
		})
	})

	$('#form-tambah-tipehiburan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesTambahTipehiburan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTipehiburan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-tipehiburan").reset();
				$('#tambah-tipehiburan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-tambah").attr("disabled", true);
			}			
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-tipehiburan', function(e){
		var data = $(this).serialize();
		
		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesUpdateTipehiburan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTipehiburan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-tipehiburan").reset();
				$('#update-tipehiburan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-edit").attr("disabled", true);
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-tipehiburan').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-tipehiburan').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	// Jenis Reklame
	function tampilJenisreklame() {
		$.get('<?php echo base_url('Master/tampilJenisreklame'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-jenisreklame').html(data);
			refresh();
		});
	}

	var id_jenisreklame;
	$(document).on("click", ".konfirmasiHapus-jenisreklame", function() {
		id_jenisreklame = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataJenisreklame", function() {
		var id = id_jenisreklame;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/deleteJenisreklame'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilJenisreklame();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataJenisreklame", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/updateJenisreklame'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-jenisreklame').modal('show');
		})
	})

	$('#form-tambah-jenisreklame').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesTambahJenisreklame'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJenisreklame();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-jenisreklame").reset();
				$('#tambah-jenisreklame').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-tambah").attr("disabled", true);
			}			
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-jenisreklame', function(e){
		var data = $(this).serialize();
		
		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesUpdateJenisreklame'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJenisreklame();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-jenisreklame").reset();
				$('#update-jenisreklame').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-edit").attr("disabled", true);
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-jenisreklame').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-jenisreklame').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	// Jenis 
	function tampilJenis() {
		$.get('<?php echo base_url('Master/tampilJenis'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-jenis').html(data);
			refresh();
		});
	}

	var id_jenis;
	$(document).on("click", ".konfirmasiHapus-jenis", function() {
		id_jenis = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataJenis", function() {
		var id = id_jenis;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/deleteJenis'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilJenis();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataJenis", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/updateJenis'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-jenis').modal('show');
		})
	})

	$('#form-tambah-jenis').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesTambahJenis'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJenis();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-jenis").reset();
				$('#tambah-jenis').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-tambah").attr("disabled", true);
			}			
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-jenis', function(e){
		var data = $(this).serialize();
		
		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesUpdateJenis'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJenis();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-jenis").reset();
				$('#update-jenis').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-edit").attr("disabled", true);
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-jenis').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-jenis').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	
</script>