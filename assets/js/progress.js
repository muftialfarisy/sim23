let url,
	printt = $("#print").DataTable({
		responsive: true,
		scrollX: true,
		ajax: readPrintUrl,
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
				data: "print",
			},
			{
				data: "waktu_print",
			},
			{
				data: "status_print",
			},
			{
				data: "alasan_print",
			},
			{
				data: "action",
			},
		],
	});

function reloadTable() {
	printt.ajax.reload();
}

function addDataPrint() {
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

function editDataPrint() {
	$.ajax({
		url: editPrintUrl,
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

function add() {
	url = "add";
	$(".modal-title").html("Add Data");
	$('.modal button[type="submit"]').html("Add");
}

function editPrint(id) {
	$.ajax({
		url: getUserUrl,
		type: "post",
		dataType: "json",
		data: {
			id: id,
		},
		success: (res) => {
			$('[name="id"]').val(id);
			$('[name="urutan_order"]').val(res.urutan_order);
			$('[name="print"]').val(res.print);
			$('[name="waktu_print"]').val(res.waktu_print);
			$('[name="status_print"]').val(res.status_print);
			// $('[name="status_print"]').val(res.status_print);
			$('[name="alasan"]').val(res.alasan);
			$(".modal").modal("show");
			$(".modal-title").html("Edit Data");
			$('.modal button[type="submit"]').html("Edit");
			url = "editPrint";
		},
		error: (err) => {
			console.log(err);
		},
	});
}
$("#waktu_print").change(function () {
	let waktu_print = $('[name="waktu_print"]').val();
	let urutan_order = $('[name="urutan_order"]').val();
	$.ajax({
		url: getEstimasiUrl,
		type: "post",
		dataType: "json",
		data: {
			urutan_order: urutan_order,
		},
		success: (res) => {
			$('[name="id"]').val(res.id);
			let print_sebelum = parseFloat(res.print_sebelum);
			let print_sesudah = parseFloat(res.print_sesudah);
			let total_estimasi = print_sesudah - print_sebelum;
			if (waktu_print > total_estimasi) {
				$('[name="status_print"]').val("tidak tepat waktu");
			} else if (waktu_print <= total_estimasi) {
				$('[name="status_print"]').val("tepat waktu");
			}
		},
		error: (err) => {
			console.log(err);
		},
	});
});

printt.on("order.dt search.dt", () => {
	printt
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
		nama: "required",
		email: {
			required: true,
			email: true,
		},
		username: {
			required: true,
			// minlength: 6,
		},
		password: {
			required: true,
			minlength: 6,
			// value: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/,
		},
	},
	messages: {
		nama: "Masukkan Nama User",
		email: "Masukkan alamat email yang benar",
		username: {
			required: "Masukkan Username",
			// minlength: "Username minimal 6 karakter",
		},
		password: {
			required: "Masukkan Passowrd",
			minlength: "password minimal 6 karakter",
			// value: "password minimal  mengandung minimal 1 angka,dan 1 huruf kapital",
		},
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
		"editPrint" == url ? editDataPrint() : addDataPrint();
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
