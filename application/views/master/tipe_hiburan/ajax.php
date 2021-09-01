<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": true
	});

	window.onload = function() {
		tampilTipehiburan();
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


	
</script>