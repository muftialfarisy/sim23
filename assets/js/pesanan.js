let url,
	user = $("#pesanan").DataTable({
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
				data: "urutan_order",
			},
			{
				data: "no_po",
			},
			{
				data: "nama_pelanggan",
			},
			{
				data: "tema_desain",
			},
			{
				data: "tanggal_pesanan",
			},
			// {
			// 	data: "invoice",
			// },
			{
				data: "persetujuan",
			},
			{
				data: "produk",
			},
			{
				data: "jumlah",
			},
			{
				data: "bahan_baku",
			},
			{
				data: "dateline",
			},
			// {
			// 	data: "finishing",
			// },
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
$("#jumlah").change(function () {
	let jumlah = $('[name="jumlah"]').val();
	let rata_desain = $('[name="rata_desain"]').val();
	let rata_print = $('[name="rata_print"]').val();
	let total_print = (parseFloat(rata_print) * parseFloat(jumlah)) / (4 * 1);
	let rata_cutting = $('[name="rata_cutting"]').val();
	let rata_press = $('[name="rata_press"]').val();
	let total_press = (parseFloat(rata_press) * parseFloat(jumlah)) / (4 * 1);
	let rata_jahit = $('[name="rata_jahit"]').val();
	let total_jahit = (parseFloat(rata_jahit) * parseFloat(jumlah)) / (4 * 1);
	let rata_overdeck = $('[name="rata_overdeck"]').val();
	let total_overdeck =
		(parseFloat(rata_overdeck) * parseFloat(jumlah)) / (4 * 1);
	let rata_obras = $('[name="rata_obras"]').val();
	let total_obras = (parseFloat(rata_obras) * parseFloat(jumlah)) / (4 * 1);
	let rata_qc = $('[name="rata_qc"]').val();
	let total_cutting = parseFloat(rata_cutting) * parseFloat(jumlah);
	let total_qc = parseFloat(rata_qc) * parseFloat(jumlah);
	let waktu_total = total_cutting + total_qc + parseFloat(rata_desain);
	$('[name="total_cutting"]').val(total_cutting);
	$('[name="total_qc"]').val(total_qc);
	$('[name="waktu_total"]').val(waktu_total);
	$('[name="print"]').val(total_print);
	$('[name="press"]').val(total_press);
	$('[name="jahit"]').val(total_jahit);
	console.log(total_jahit);
	$('[name="overdeck"]').val(total_overdeck);
	$('[name="obras"]').val(total_obras);
	console.log(total_obras);
});
function add() {
	document.getElementById("no_po").disabled = true;
	document.getElementById("persetujuan").disabled = true;
	$("#produk").change(function () {
		let produk = $("#produk").val();
		let no;
		if (produk == "jersey") {
			$('[name="no"]').val("9");
			no = $('[name="no"]').val();
			console.log(produk);
			$.ajax({
				url: getMesinUrl,
				type: "post",
				dataType: "json",
				// data: {
				// 	NO: no,
				// },
				success: (res) => {
					// $('[name="id"]').val(res.id);
					$('[name="rata_desain"]').val(res.desain);
					$('[name="rata_print"]').val(res.print);
					$('[name="rata_cutting"]').val(res.cutting);
					$('[name="rata_press"]').val(res.press);
					$('[name="rata_jahit"]').val(res.jahit);
					// console.log(res.jahit);
					$('[name="rata_overdeck"]').val(res.overdeck);
					$('[name="rata_obras"]').val(res.obras);
					// console.log(res.obras);

					$('[name="rata_qc"]').val(res.qc);
				},
				error: (err) => {
					console.log(err);
				},
			});
		} else {
			$('[name="no"]').val("10");
			no = $('[name="no"]').val();
			console.log(produk);

			$.ajax({
				url: getMesinJaketUrl,
				type: "post",
				dataType: "json",
				// data: {
				// 	NO: no,
				// },
				success: (res) => {
					// $('[name="id"]').val(res.id);
					$('[name="rata_desain"]').val(res.desain);
					$('[name="rata_print"]').val(res.print);
					$('[name="rata_cutting"]').val(res.cutting);
					$('[name="rata_press"]').val(res.press);
					$('[name="rata_jahit"]').val(res.jahit);
					// console.log(res.jahit);
					$('[name="rata_overdeck"]').val(res.overdeck);
					$('[name="rata_obras"]').val(res.obras);
					// console.log(res.obras);

					$('[name="rata_qc"]').val(res.qc);
				},
				error: (err) => {
					console.log(err);
				},
			});
		}
	});
	url = "add";
	$(".modal-title").html("Add Data");
	$('.modal button[type="submit"]').html("Add");
}

function edit(id) {
	document.getElementById("no_po").disabled = false;
	$.ajax({
		url: getPesananUrl,
		type: "post",
		dataType: "json",
		data: {
			id: id,
		},
		success: (res) => {
			$('[name="id"]').val(res.id);
			$('[name="urutan_order"]').val(res.urutan_order);
			$('[name="no_po"]').val(res.no_po);
			$('[name="nama_pelanggan"]').val(res.nama_pelanggan);
			$('[name="tema_desain"]').val(res.tema_desain);
			$('[name="tanggal_pesanan"]').val(res.tanggal_pesanan);
			// $('[name="invoice"]').val(res.invoice);
			$('[name="persetujuan"]').val(res.persetujuan);
			$('[name="produk"]').val(res.produk);
			let produk = res.produk;
			$('[name="jumlah"]').val(res.jumlah);
			$('[name="bahan_baku"]').val(res.bahan_baku);
			$('[name="dateline"]').val(res.dateline);
			$('[name="finishing"]').val(res.finishing);
			if (produk == "jersey") {
				$.ajax({
					url: getJerseyUrl,
					type: "post",
					dataType: "json",
					// data: {
					// 	id: id,
					// },
					success: (res) => {
						let jumlah = $('[name="jumlah"]').val();
						let rata_desain = $('[name="rata_desain"]').val(res.desain);
						let rata_print = $('[name="rata_print"]').val(res.print);
						let total_print =
							(parseFloat(rata_print) * parseFloat(jumlah)) / (4 * 1);
						let rata_cutting = $('[name="rata_cutting"]').val(res.cutting);
						let rata_press = $('[name="rata_press"]').val(res.press);
						let total_press =
							(parseFloat(rata_press) * parseFloat(jumlah)) / (4 * 1);
						let rata_jahit = $('[name="rata_jahit"]').val(res.jahit);
						let total_jahit =
							(parseFloat(rata_jahit) * parseFloat(jumlah)) / (4 * 1);
						let rata_overdeck = $('[name="rata_overdeck"]').val(res.overdeck);
						let total_overdeck =
							(parseFloat(rata_overdeck) * parseFloat(jumlah)) / (4 * 1);
						let rata_obras = $('[name="rata_obras"]').val(res.obras);
						let total_obras =
							(parseFloat(rata_obras) * parseFloat(jumlah)) / (4 * 1);
						let rata_qc = $('[name="rata_qc"]').val(res.qc);
						let total_cutting = parseFloat(rata_cutting) * parseFloat(jumlah);
						let total_qc = parseFloat(rata_qc) * parseFloat(jumlah);
						let waktu_total =
							total_cutting + total_qc + parseFloat(rata_desain);
						$('[name="total_cutting"]').val(total_cutting);
						$('[name="total_qc"]').val(total_qc);
						$('[name="waktu_total"]').val(waktu_total);
						$('[name="print"]').val(total_print);
						$('[name="press"]').val(total_press);
						$('[name="jahit"]').val(total_jahit);
						console.log(total_jahit);
						$('[name="overdeck"]').val(total_overdeck);
						$('[name="obras"]').val(total_obras);
					},
					error: (err) => {
						console.log(err);
					},
				});
			} else {
				$.ajax({
					url: getJaketUrl,
					type: "post",
					dataType: "json",
					// data: {
					// 	id: id,
					// },
					success: (res) => {
						let jumlah = $('[name="jumlah"]').val();
						let rata_desain = $('[name="rata_desain"]').val(res.desain);
						let rata_print = $('[name="rata_print"]').val(res.print);
						let total_print =
							(parseFloat(rata_print) * parseFloat(jumlah)) / (4 * 1);
						let rata_cutting = $('[name="rata_cutting"]').val(res.cutting);
						let rata_press = $('[name="rata_press"]').val(res.press);
						let total_press =
							(parseFloat(rata_press) * parseFloat(jumlah)) / (4 * 1);
						let rata_jahit = $('[name="rata_jahit"]').val(res.jahit);
						let total_jahit =
							(parseFloat(rata_jahit) * parseFloat(jumlah)) / (4 * 1);
						let rata_overdeck = $('[name="rata_overdeck"]').val(res.overdeck);
						let total_overdeck =
							(parseFloat(rata_overdeck) * parseFloat(jumlah)) / (4 * 1);
						let rata_obras = $('[name="rata_obras"]').val(res.obras);
						let total_obras =
							(parseFloat(rata_obras) * parseFloat(jumlah)) / (4 * 1);
						let rata_qc = $('[name="rata_qc"]').val(res.qc);
						let total_cutting = parseFloat(rata_cutting) * parseFloat(jumlah);
						let total_qc = parseFloat(rata_qc) * parseFloat(jumlah);
						let waktu_total =
							total_cutting + total_qc + parseFloat(rata_desain);
						$('[name="total_cutting"]').val(total_cutting);
						$('[name="total_qc"]').val(total_qc);
						$('[name="waktu_total"]').val(waktu_total);
						$('[name="print"]').val(total_print);
						$('[name="press"]').val(total_press);
						$('[name="jahit"]').val(total_jahit);
						console.log(total_jahit);
						$('[name="overdeck"]').val(total_overdeck);
						$('[name="obras"]').val(total_obras);
					},
					error: (err) => {
						console.log(err);
					},
				});
			}
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
