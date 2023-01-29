let url,
	user = $("#produksi").DataTable({
		responsive: true,
		scrollX: true,
		ajax: readUrl,
		columnDefs: [
			{
				searcable: false,
				orderable: true,
				targets: 0,
			},
		],
		order: [[1, "asc"]],
		columns: [
			{
				data: null,
			},
			{
				data: "tanggal_order",
			},
			{
				data: "dateline",
			},
			{
				data: "no_po",
			},
			{
				data: "invoice_po",
			},
			{
				data: "customer",
			},
			{
				data: "tema_design",
			},
			{
				data: "jumlah_pesanan",
			},
			{
				data: "produk",
			},
			{
				data: "bahan",
			},
			{
				data: "jumlah_produk",
			},
			{
				data: "action",
			},
		],
	});

function reloadTable() {
	user.ajax.reload();
}

function addData() {
	$.ajax({
		url: addUrl,
		type: "post",
		dataType: "json",
		data: $("#form").serialize(),
		success: () => {
			$(".modal").modal("hide");
			Swal.fire("Sukses", "Sukses Menambahkan Data", "success");
			reloadTable();
		},
		error: (err) => {
			console.log(err);
		},
	});
}

function remove(id) {
	Swal.fire({
		title: "Apakah Anda Yakin?",
		text: "Kamu Tidak Bisa Mengembalikan Data, Yang Terhapus",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya, Hapus!",
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: deleteUrl,
				type: "POST",
				data: {
					id: id,
				},
				cache: false,
				dataType: "json",
				success: function (respone) {
					if (respone.status == true) {
						// reload_table();
						// Swal.fire("Hapus!", "Data telah terhapus .", "Berhasil");
						Swal.fire("data gagal dihapus");
					} else {
						// Toast.fire({
						// 	title: "Hapus Gagal!!.",
						// });
						// Swal.fire("data gagal dihapus");
						Swal.fire("Hapus!", "Data telah terhapus .", "Berhasil");
						reloadTable();
					}
				},
			});
		} else if (result.dismiss === Swal.DismissReason.cancel) {
			Swal("Cancelled", "Your imaginary file is safe :)", "error");
		}
	});
}
// function remove(id) {
// 	Swal.fire({
// 		title: "Hapus",
// 		text: "Hapus data ini?",
// 		type: "warning",
// 		showCancelButton: true,
// 	}).then(() => {
// 		$.ajax({
// 			url: deleteUrl,
// 			type: "post",
// 			dataType: "json",
// 			data: {
// 				user_id: id,
// 			},
// 			success: () => {
// 				Swal.fire("Sukses", "Sukses Menghapus Data", "success");
// 				reloadTable();
// 			},
// 			error: (err) => {
// 				console.log(err);
// 			},
// 		});
// 	});
// }

function editData() {
	$.ajax({
		url: editUrl,
		type: "post",
		dataType: "json",
		data: $("#form").serialize(),
		success: () => {
			$(".modal").modal("hide");
			Swal.fire("Sukses", "Sukses Mengedit Data", "success"), reloadTable();
		},
		error: (err) => {
			console.log(err);
		},
	});
}
// function ganti_id() {
// 	var id = $(this).val();
// 	// $.ajax({
// 	// 	url: getBahannUrl,
// 	// 	type: "post",
// 	// 	dataType: "json",
// 	// 	data: {
// 	// 		id: id,
// 	// 	},
// 	// 	success: (res) => {
// 	// 		$('[name="bahan"]').val(res.nama_bahan);
// 	// 	},
// 	// 	error: (err) => {
// 	// 		console.log(err);
// 	// 	},
// 	// });
// 	console.log(id);
// }
function add() {
	$("#no_po").change(function () {
		var no_po = $("#no_po").val();
		$.ajax({
			url: getPesananUrl,
			type: "post",
			dataType: "json",
			data: {
				no_po: no_po,
			},
			success: (res) => {
				$('[name="tanggal_order"]').val(res.tanggal_pesanan);
				$('[name="dateline"]').val(res.dateline);
				$('[name="customer"]').val(res.nama_pelanggan);
				$('[name="tema_design"]').val(res.tema_desain);
				$('[name="invoice_po"]').val(res.invoice);
				$('[name="jumlah_pesanan"]').val(res.jumlah);
				$('[name="produk"]').val(res.produk);
				$('[name="bahan"]').val(res.bahan_baku);
				$('[name="jumlah_produk"]').val(res.jumlah);
			},
			error: (err) => {
				console.log(err);
			},
		});
	});
	url = "add";
	$(".modal-title").html("Add Data");
	$('.modal button[type="submit"]').html("Add");
}

function edit(id) {
	$.ajax({
		url: getProduksiUrl,
		type: "post",
		dataType: "json",
		data: {
			id: id,
		},
		success: (res) => {
			$('[name="id"]').val(res.id);
			$('[name="id_bahan"]').val(res.bahan);
			$('[name="tanggal_order"]').val(res.tanggal_order);
			$('[name="dateline"]').val(res.dateline);
			$('[name="no_po"]').val(res.no_po);
			$('[name="invoice_po"]').val(res.invoice_po);
			$('[name="customer"]').val(res.customer);
			$('[name="tema_design"]').val(res.tema_design);
			$('[name="jumlah_pesanan"]').val(res.jumlah_pesanan);
			$('[name="produk"]').val(res.produk);
			$('[name="bahan"]').val(res.bahan);
			$('[name="jumlah_bahan"]').val(res.jumlah_bahan);
			$('[name="jumlah_produk"]').val(res.jumlah_produk);
			$(".modal").modal("show");
			$(".modal-title").html("Edit Data");
			$('.modal button[type="submit"]').html("Edit");
			url = "edit";
		},
		error: (err) => {
			console.log(err);
		},
	});
}
user.on("order.dt search.dt", () => {
	user
		.column(0, {
			search: "applied",
			order: "applied",
		})
		.nodes()
		.each((el, err) => {
			el.innerHTML = err + 1;
		});
});
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
$("#form").validate({
	rules: {
		nama_pesanan: "required",
		tanggal_pesanan: "required",
		produk: "required",
		jumlah: "required",
		bahan_baku: "required",
	},
	messages: {
		nama: "Masukkan Nama Pesanan",
		tanggal_pesanan: "Masukkan tanggal pesanan",
		produk: "Masukkan Nama Produk",
		jumlah: "Masukkan jumlah pesanan",
		bahan_baku: "Masukkan Nama Bahan Baku",
	},
	errorElement: "em",
	errorPlacement: function (error, element) {
		error.addClass("invalid-feedback");

		if (element.prop("type") === "checkbox") {
			error.insertAfter(element.next("label"));
		} else {
			error.insertAfter(element);
		}
	},
	highlight: function (element, errorClass, validClass) {
		$(element).addClass("is-invalid").removeClass("is-valid");
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).addClass("is-valid").removeClass("is-invalid");
	},
	submitHandler: () => {
		"edit" == url ? editData() : addData();
	},
});
// $("#form").validate({
// 	errorElement: "span",
// 	errorPlacement: (err, el) => {
// 		err.addClass("invalid-feedback"), el.closest(".form-group").append(err);
// 	},
// 	submitHandler: () => {
// 		"edit" == url ? editData() : addData();
// 	},
// });
$(".modal").on("hidden.bs.modal", () => {
	$("#form")[0].reset();
	$("#form").validate().resetForm();
});
