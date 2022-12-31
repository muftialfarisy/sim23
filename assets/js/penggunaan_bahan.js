let url,
	user = $("#penggunaan_bahan").DataTable({
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
				data: "jenis_produk",
			},
			{
				data: "nama_bahan",
			},
			{
				data: "jumlah_pesanan",
			},
			{
				data: "jumlah_bahan",
			},
			{
				data: "total_bahan",
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
$("#nama_bahan").change(function () {
	var id = $("#nama_bahan").val();

	$.ajax({
		url: getBahannUrl,
		type: "post",
		dataType: "json",
		data: {
			id: $("#nama_bahan").val(),
		},
		// async: true,
		dataType: "json",
		success: (res) => {
			var i;
			$("#id_bahan").val(res.id);
			$("#jumlahbahan").val(res.jumlah);
			// console.log(res.id);
		},
		error: (err) => {
			console.log(err);
		},
	});
});
$("#jenis_produk").change(function () {
	var jenis_produk = $("#jenis_produk").val();

	if (jenis_produk == "jersey") {
		$("#jumlah_bahan").val("0.25");
	} else if (jenis_produk == "jacket") {
		$("#jumlah_bahan").val("0.5");
	}
});
$("#jumlah_pesanan").keyup(function () {
	var jumlah_pesanan = $("#jumlah_pesanan").val();
	var jumlah_bahan = $("#jumlah_bahan").val();
	var total1 = jumlah_pesanan * jumlah_bahan;
	var total2 = (5 / 100) * total1 + total1;
	$("#total_bahan").val(total2);
});

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

function add() {
	$.ajax({
		url: getBahanUrl,
		type: "post",
		dataType: "json",
		data: {
			id: $("#nama_bahan").val(),
		},
		// async: true,
		dataType: "json",
		success: (res) => {
			var i;
			$("#id_bahan").val(res.idd_bahan);
			$("#jumlahbahan").val(res.jumlah);
			$(".modal-title").html("Add Data");
			$('.modal button[type="submit"]').html("Add");
			url = "add";
			// console.log(res.id);
		},
		error: (err) => {
			console.log(err);
		},
	});
}

function edit(id) {
	$.ajax({
		url: getBahanUrl,
		type: "post",
		dataType: "json",
		data: {
			id: id,
		},
		success: (res) => {
			$('[name="id"]').val(res.id);
			$('[name="jenis_produk"]').val(res.jenis_produk);
			$('[name="nama_bahan"]').val(res.nama_bahan);
			$('[name="id_bahan"]').val(res.id_bahan);
			$('[name="jumlahbahan"]').val(res.jumlah);
			// $('[name="jumlahbahan"]').val(res.jumlah_bahan);
			$('[name="jumlah_pesanan"]').val(res.jumlah_pesanan);
			$('[name="jumlah_bahan"]').val(res.jumlah_bahan);
			$('[name="total_bahan"]').val(res.total_bahan);
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
		jenis_baju: "required",
		nama_bahan: "required",
		kg: "required",
		jumlah_baju: "required",
	},
	messages: {
		jenis_baju: "Masukkan Jenis Baju",
		nama_bahan: "Masukkan Nama Bahan",
		kg: "Masukkan jumlah berat",
		jumlah_baju: "Masukkan jumlah baju",
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
