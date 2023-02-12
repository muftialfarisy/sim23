let url,
	jahit = $("#jahit").DataTable({
		responsive: true,
		scrollX: true,
		ajax: readJahitUrl,
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
				data: "jahit",
			},
			{
				data: "waktu_jahit",
			},
			{
				data: "status_jahit",
			},
			{
				data: "alasan_jahit",
			},
			{
				data: "action",
			},
		],
	});

function reloadTable() {
	jahit.ajax.reload();
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
		url: editjahitUrl,
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
}

function editjahit(id) {
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
			$('[name="jahit"]').val(res.jahit);
			$('[name="waktu_jahit"]').val(res.waktu_jahit);
			$('[name="status_jahit"]').val(res.status_jahit);
			// $('[name="status_jahit"]').val(res.status_jahit);
			$('[name="alasan_jahit"]').val(res.alasan_jahit);
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
$("#waktu_jahit").change(function () {
	let waktu_jahit = $('[name="waktu_jahit"]').val();
	let urutan_order = $('[name="urutan_order"]').val();
	$.ajax({
		url: getEstimasiUrl,
		type: "post",
		dataType: "json",
		data: {
			urutan_order: urutan_order,
		},
		success: (res) => {
			let jahit_sebelum = parseFloat(res.jahit_sebelum);
			let jahit_sesudah = parseFloat(res.jahit_sesudah);
			let overdeck_sebelum = parseFloat(res.overdeck_sebelum);
			let overdeck_sesudah = parseFloat(res.overdeck_sesudah);
			let obras_sebelum = parseFloat(res.obras_sebelum);
			let obras_sesudah = parseFloat(res.obras_sesudah);
			let total_estimasi = jahit_sesudah - jahit_sebelum;
			let total_estimasi2 = overdeck_sesudah - overdeck_sebelum;
			let total_estimasi3 = obras_sesudah - obras_sebelum;
			if (
				waktu_jahit > total_estimasi &&
				waktu_jahit > total_estimasi2 &&
				waktu_jahit > total_estimasi3
			) {
				$('[name="status_jahit"]').val("tidak tepat waktu");
			} else if (
				waktu_jahit <= total_estimasi &&
				waktu_jahit <= total_estimasi2 &&
				waktu_jahit <= total_estimasi3
			) {
				$('[name="status_jahit"]').val("tepat waktu");
			}
		},
		error: (err) => {
			console.log(err);
		},
	});
});
// $('[name="kendala"]').change(function () {
// 	let kendala = document.querySelector('input[name="kendala"]:checked').value;
// 	if (kendala == "iya") {
// 		document.getElementById("alasan_jahit").disabled = false;
// 	} else {
// 		document.getElementById("alasan_jahit").disabled = true;
// 	}
// });

jahit.on("order.dt search.dt", () => {
	jahit
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
