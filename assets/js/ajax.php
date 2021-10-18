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
		tampilStatuskepemilikan();
		tampilStatususaha();
		tampilPerusahaan();
		tampilIzin_usaha();

		// pendataan
		tampilHotel();

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

		// Status Kepemilikan 
	function tampilStatuskepemilikan() {
		$.get('<?php echo base_url('Master/tampilStatuskepemilikan'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-status-kepemilikan').html(data);
			refresh();
		});
	}
	
	var id_status_kepemilikan;
	$(document).on("click", ".konfirmasiHapus-statuskepemilikan", function() {
		id_status_kepemilikan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataStatuskepemilikan", function() {
		var id = id_status_kepemilikan;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/deleteStatuskepemilikan'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilStatuskepemilikan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataStatuskepemilikan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/updateStatuskepemilikan'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-status-kepemilikan').modal('show');
		})
	})

	$('#form-tambah-status-kepemilikan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesTambahStatuskepemilikan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilStatuskepemilikan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-status-kepemilikan").reset();
				$('#tambah-status-kepemilikan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-tambah").attr("disabled", true);
			}			
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-status-kepemilikan', function(e){
		var data = $(this).serialize();
		
		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesUpdateStatuskepemilikan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilStatuskepemilikan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-status-kepemilikan").reset();
				$('#update-status-kepemilikan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-edit").attr("disabled", true);
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-status-kepemilikan').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-status-kepemilikan').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	// Status usaha
	function tampilStatususaha() {
		$.get('<?php echo base_url('Master/tampilStatususaha'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-status-usaha').html(data);
			refresh();
		});
	}
	
	var id_status_usaha;
	$(document).on("click", ".konfirmasiHapus-statususaha", function() {
		id_status_usaha = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataStatususaha", function() {
		var id = id_status_usaha;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/deleteStatususaha'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilStatususaha();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataStatususaha", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/updateStatususaha'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-status-usaha').modal('show');
		})
	})

	$('#form-tambah-status-usaha').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesTambahStatususaha'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilStatususaha();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-status-usaha").reset();
				$('#tambah-status-usaha').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-tambah").attr("disabled", true);
			}			
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-status-usaha', function(e){
		var data = $(this).serialize();
		
		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesUpdateStatususaha'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilStatususaha();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-status-usaha").reset();
				$('#update-status-usaha').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-edit").attr("disabled", true);
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-status-usaha').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-status-usaha').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	// Perusahaan
	function tampilPerusahaan() {
		$.get('<?php echo base_url('Perusahaan/tampilPerusahaan'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-perusahaan').html(data);
			refresh();
		});
	}
	
	var id_perusahaan;
	$(document).on("click", ".konfirmasiHapus-perusahaan", function() {
		id_perusahaan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPerusahaan", function() {
		var id = id_perusahaan;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Perusahaan/deletePerusahaan'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPerusahaan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPerusahaan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Perusahaan/updatePerusahaan'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-perusahaan').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPerusahaan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Perusahaan/detailPerusahaan'); ?>",
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
			$('#detail-perusahaan').modal('show');
		})
	})

	$('#form-tambah-perusahaan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Perusahaan/prosesTambahPerusahaan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPerusahaan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-perusahaan").reset();
				$('#tambah-perusahaan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-tambah").attr("disabled", true);
			}			
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-perusahaan', function(e){
		var data = $(this).serialize();
		
		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Perusahaan/prosesUpdatePerusahaan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPerusahaan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-perusahaan").reset();
				$('#update-perusahaan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				$("#btn-edit").attr("disabled", true);
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-perusahaan').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-perusahaan').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	// Perusahaan
	function tampilIzin_usaha() {
		$.get('<?php echo base_url('izin_usaha/tampilIzin_usaha'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-izin_usaha').html(data);
			refresh();
		});
	}

	// --------------------- pendataan -----------------------
	function tampilHotel() {
		$.get('<?php echo base_url('Pendataan/tampil_hotel'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-hotel').html(data);
			refresh();
		});
	}

</script>