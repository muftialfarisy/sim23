let url,
	user = $("#mesin").DataTable({
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
		columns: [
			{
				data: null,
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
				data: "total_cutting",
			},
			{
				data: "total_qc",
			},
			{
				data: "waktu_total",
			},
			{
				data: "action",
			},
		],
	});

function reloadTable() {
	user.ajax.reload();
}
$("#desain").change(function () {
	let desain = parseFloat($("#desain").val());
	let rata_desain = parseFloat($("#rata_desain").val());
	// let rata = rata_desain2 + desain2 / 9;
	// let rata2 = parseFloat(rata).toFixed(2);
	let rata = (rata_desain + desain) / 9;
	$("#rata_desain").val(rata);
});
$("#print").change(function () {
	let print = parseFloat($("#print").val());
	let rata_print = parseFloat($("#rata_print").val());
	let rata = (rata_print + print) / 9;
	$("#rata_print").val(rata);
});
$("#cutting").change(function () {
	let cutting = parseFloat($("#cutting").val());
	let rata_cutting = parseFloat($("#rata_cutting").val());
	let rata = (rata_cutting + cutting) / 9;
	$("#rata_cutting").val(rata);
});
$("#press").change(function () {
	let press = parseFloat($("#press").val());
	let rata_press = parseFloat($("#rata_press").val());
	let rata = (rata_press + press) / 9;
	$("#rata_press").val(rata);
});
$("#jahit").change(function () {
	let jahit = parseFloat($("#jahit").val());
	let rata_jahit = parseFloat($("#rata_jahit").val());
	let rata = (rata_jahit + jahit) / 9;
	$("#rata_jahit").val(rata);
});
$("#overdeck").change(function () {
	let overdeck = parseFloat($("#overdeck").val());
	let rata_overdeck = parseFloat($("#rata_overdeck").val());
	let rata = (rata_overdeck + overdeck) / 9;
	$("#rata_overdeck").val(rata);
});
$("#obras").change(function () {
	let obras = parseFloat($("#obras").val());
	let rata_obras = parseFloat($("#rata_obras").val());
	let rata = (rata_obras + obras) / 9;
	$("#rata_obras").val(rata);
});
$("#qc").change(function () {
	let qc = parseFloat($("#qc").val());
	let rata_qc = parseFloat($("#rata_qc").val());
	let rata = (rata_qc + qc) / 9;
	$("#rata_qc").val(rata);
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
	url = "add";
	$(".modal-title").html("Add Data");
	$('.modal button[type="submit"]').html("Add");
	// $.ajax({
	// 	url: getRataUrl,
	// 	type: "post",
	// 	dataType: "json",
	// 	// data: {
	// 	// 	id: id,
	// 	// },
	// 	success: (res) => {
	// 		$('[name="id"]').val(res.id);
	// 		$('[name="no"]').val(res.NO);
	// 		$('[name="rata_desain"]').val(res.desain);
	// 		$('[name="rata_print"]').val(res.print);
	// 		$('[name="rata_cutting"]').val(res.cutting);
	// 		$('[name="rata_press"]').val(res.press);
	// 		$('[name="rata_jahit"]').val(res.jahit);
	// 		$('[name="rata_overdeck"]').val(res.overdeck);
	// 		$('[name="rata_obras"]').val(res.obras);
	// 		$('[name="rata_qc"]').val(res.qc);
	// 	},
	// 	error: (err) => {
	// 		console.log(err);
	// 	},
	// });
}

function edit(id) {
	$.ajax({
		url: getMesinUrl,
		type: "post",
		dataType: "json",
		data: {
			id: id,
		},
		success: (res) => {
			$('[name="id"]').val(res.id);
			$('[name="no"]').val(res.NO);
			$('[name="desain"]').val(res.desain);
			$('[name="print"]').val(res.print);
			$('[name="cutting"]').val(res.cutting);
			$('[name="press"]').val(res.press);
			$('[name="jahit"]').val(res.jahit);
			$('[name="overdeck"]').val(res.overdeck);
			$('[name="obras"]').val(res.obras);
			$('[name="qc"]').val(res.qc);
			$('[name="rata_desain"]').val(res.rata_desain);
			$('[name="rata_print"]').val(res.rata_print);
			$('[name="rata_cutting"]').val(res.rata_cutting);
			$('[name="rata_press"]').val(res.rata_press);
			$('[name="rata_jahit"]').val(res.rata_jahit);
			$('[name="rata_overdeck"]').val(res.rata_overdeck);
			$('[name="rata_obras"]').val(res.rata_obras);
			$('[name="rata_qc"]').val(res.rata_qc);
			$('[name="total_cutting"]').val(res.rata_cutting * res.jumlah_pesanan);
			$total_cutting = parseFloat($("#total_cutting").val());
			$('[name="total_qc"]').val(res.rata_qc * res.jumlah_pesanan);
			$total_qc = parseFloat($("#total_qc").val());
			$cut = $total_cutting.toFixed(2);
			$qc = $total_qc.toFixed(2);
			$rata_desain = parseFloat($('[name="rata_desain"]').val());
			$rata_desain2 = $rata_desain.toFixed(2);
			$waktu_total = $total_cutting + $total_qc + $rata_desain;
			$total_desain = $rata_desain2 * res.jumlah_pesanan;
			$('[name="waktu_total"]').val($waktu_total);
			// $total_cutting = parseInt($("#total_cutting").val());
			// $('[name="total_qc"]').val(res.rata_qc * res.jumlah_pesanan);
			// $total_qc = parseInt($("#total_qc").val());
			// $('[name="waktu_total"]').val(
			// 	$total_cutting + $total_qc + res.jumlah_pesanan
			// );
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
