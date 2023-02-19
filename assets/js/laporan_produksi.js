let url,
	user = $("#produksi").DataTable({
		// responsive: true,
		scrollX: true,
		scrollY: true,
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
				data: "desain",
			},
			{
				data: "print",
			},
			{
				data: "cutting",
			},
			{
				data: "press",
			},
			{
				data: "jahit",
			},
			{
				data: "overdeck",
			},
			{
				data: "obras",
			},
			{
				data: "qc",
			},
			{
				data: "status",
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
			Swal.fire("Sukses", "Data berhasil di simpan", "success");
			reloadTable();
		},
		error: (err) => {
			console.log(err);
		},
	});
}

function remove(id) {
	Swal.fire({
		title: "Are you sure?",
		// text: "Kamu Tidak Bisa Mengembalikan Data, Yang Terhapus",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "OK",
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
						Swal.fire("Hapus!", "Data berhasil di hapus .", "Berhasil");
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
			Swal.fire("Sukses", "Data berhasil di update", "success"), reloadTable();
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
			$('[name="id"]').val(res.idd);
			$('[name="id_bahan"]').val(res.id_bahan);
			$('[name="tanggal_order"]').val(res.tanggal_order);
			$('[name="dateline"]').val(res.dateline);
			$('[name="no_po"]').val(res.no_po);
			$('[name="invoice_po"]').val(res.invoice_po);
			$('[name="customer"]').val(res.customer);
			$('[name="tema_design"]').val(res.tema_design);
			$('[name="jumlah_pesanan"]').val(res.jumlah_pesanan);
			$('[name="produk"]').val(res.produk);
			$('[name="bahan"]').val(res.bahann);
			$('[name="jumlah_bahan"]').val(res.jumlah_bahan);
			$('[name="jumlah_produk"]').val(res.jumlah_produk);
			$('[name="desain"]').val(res.desain);
			$('[name="print"]').val(res.print);
			$('[name="cutting"]').val(res.cutting);
			$('[name="press"]').val(res.press);
			$('[name="jahit"]').val(res.jahit);
			$('[name="overdeck"]').val(res.overdeck);
			$('[name="obras"]').val(res.obras);
			$('[name="qc"]').val(res.qc);
			$('[name="status"]').val(res.status);
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
function detail(id) {
	console.log(id);
	$.ajax({
		url: detailUrl,
		type: "post",
		dataType: "json",
		data: {
			id: id,
		},
		success: (res) => {
			$('[name="tanggal_order"]').val(res.tanggal_order);
			$('[name="dateline"]').val(res.dateline);
			$('[name="no_po"]').val(res.no_po);
			$('[name="invoice_po"]').val(res.invoice_po);
			$('[name="customer"]').val(res.customer);
			$('[name="tema_design"]').val(res.tema_design);
			$('[name="jumlah_pesanan"]').val(res.jumlah_pesanan);
			$('[name="produk"]').val(res.produk);
			$('[name="bahan"]').val(res.bahann);
			$('[name="jumlah_bahan"]').val(res.jumlah_bahan);
			$('[name="jumlah_produk"]').val(res.jumlah_produk);
			$('[name="desain"]').val(res.desain);
			$('[name="print"]').val(res.print);
			$('[name="cutting"]').val(res.cutting);
			$('[name="press"]').val(res.press);
			$('[name="jahit"]').val(res.jahit);
			$('[name="overdeck"]').val(res.overdeck);
			$('[name="obras"]').val(res.obras);
			$('[name="qc"]').val(res.qc);
			$('[name="waktu_desain"]').val(res.waktu_desain);
			$('[name="waktu_print"]').val(res.waktu_print);
			$('[name="waktu_cutting"]').val(res.waktu_cutting);
			$('[name="waktu_press"]').val(res.waktu_press);
			$('[name="waktu_jahit"]').val(res.waktu_jahit);
			$('[name="waktu_overdeck"]').val(res.waktu_overdeck);
			$('[name="waktu_obras"]').val(res.waktu_obras);
			$('[name="waktu_qc"]').val(res.waktu_qc);
			$('[name="status_desain"]').val(res.status_desain);
			$('[name="status_print"]').val(res.status_print);
			$('[name="status_cutting"]').val(res.status_cutting);
			$('[name="status_press"]').val(res.status_press);
			$('[name="status_jahit"]').val(res.status_jahit);
			$('[name="status_overdeck"]').val(res.status_overdeck);
			$('[name="status_obras"]').val(res.status_obras);
			$('[name="alasan_desain"]').val(res.alasan_desain);
			$('[name="alasan_print"]').val(res.alasan_print);
			$('[name="alasan_cutting"]').val(res.alasan_cutting);
			$('[name="alasan_press"]').val(res.alasan_press);
			$('[name="alasan_jahit"]').val(res.alasan_jahit);
			$('[name="alasan_overdeck"]').val(res.alasan_overdeck);
			$('[name="alasan_obras"]').val(res.alasan_obras);
			$('[name="alasan_qc"]').val(res.alasan_qc);
			$('[name="qc_desain"]').val(res.qc_desain);
			$('[name="qc_print"]').val(res.qc_print);
			$('[name="qc_cutting"]').val(res.qc_cutting);
			$('[name="qc_press"]').val(res.qc_press);
			$('[name="qc_jahit"]').val(res.qc_jahit);
			$('[name="qc_overdeck"]').val(res.qc_overdeck);
			$('[name="qc_obras"]').val(res.qc_obras);
			$('[name="jumlah_diterima"]').val(res.jumlah_diterima);
			$('[name="jumlah_ditolak"]').val(res.jumlah_ditolak);
			$('[name="alasan_qc"]').val(res.alasan_qc);
			$('[name="status_qc"]').val(res.status_qc);
			$('[name="status"]').val(res.status);
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
