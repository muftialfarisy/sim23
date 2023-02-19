let hasil_produk;
let total_waktu;
let noo = [];
let tasks = [];
let tasks2 = [];
let jadwal = [];
let urutan;
let url,
	user = $("#estimasi").DataTable({
		// responsive: true,
		scrollX: true,
		ajax: readUrl,
		columnDefs: [
			{
				searcable: true,
				orderable: true,
				targets: 0,
			},
		],
		// order: [[1, "asc"]],
		// rowGroup: {
		// 	dataSrc: ["tanggal_order"],
		// },
		columns: [
			{
				data: null,
			},
			{
				data: "tanggal_order",
			},
			{
				data: "urutan_order",
			},
			{
				data: "print_sebelum",
			},
			{
				data: "press_sebelum",
			},
			{
				data: "jahit_sebelum",
			},
			{
				data: "overdeck_sebelum",
			},
			{
				data: "obras_sebelum",
			},
			{
				data: "print_sesudah",
			},
			{
				data: "press_sesudah",
			},
			{
				data: "jahit_sesudah",
			},
			{
				data: "overdeck_sesudah",
			},
			{
				data: "obras_sesudah",
			},
			{
				data: "ci",
			},
			{
				data: "dateline",
			},
			{
				data: "lateness",
			},
			{
				data: "nj",
			},
			{
				data: "action",
			},
		],
	});

function reloadTable() {
	user.ajax.reload();
}
$(document).ready(function () {
	chart();
	// data2();
});
function chart() {
	$.ajax({
		url: getChart,
		type: "post",
		dataType: "json",
		// data: {
		// 	urutan_order: "order 1",
		// },
		success: (res) => {
			$.each(res, function (i, value) {
				urutan = value.id;
				tanggal_order = value.tanggal_order;
				var today = new Date(tanggal_order);
				var tomorrow = new Date(today);
				var deadline = parseInt(value.dateline);
				tomorrow.setDate(today.getDate() + deadline);
				tomorrow.toLocaleDateString();
				urutan_order = value.urutan_order;
				noo = value;
				tasks.push({
					id: urutan,
					name: urutan_order,
					start: today,
					end: tomorrow,
				});
				let ganttChart = new Gantt("#gantt", tasks, {});
				ganttChart.change_view_mode("Day");
			});
		},
		error: (err) => {
			console.log(err);
		},
	});
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
$("#dateline").change(function () {
	let dateline = $("#dateline").val();
	let ci = $("#ci").val();
	let total = ci - dateline;
	$("#lateness").val(total);
	let lateness = parseInt($("#lateness").val());
	if (lateness <= 0) {
		$("#nj").val(0);
		$("#nj2").val("tepat waktu");
	} else {
		$("#nj").val(lateness);
		$("#nj2").val("terlambat");
	}
});
$("#urutan_order").change(function () {
	let urutan_order = $("#urutan_order").val();
	$tanggal_sebelum = $('[name="tanggal_order2"]').val();
	$tanggal_sekarang = $('[name="tanggal_order"]').val();
	let tgl_sekarang = $tanggal_sekarang.toString();
	$.ajax({
		url: getAllUrl,
		type: "post",
		dataType: "json",
		data: {
			urutan_order: $("#urutan_order").val(),
		},
		success: (res) => {
			hasil_produk = res.produk;
			$('[name="produk"]').val(hasil_produk);
			hitung(res);
		},
		error: (err) => {
			console.log(err);
		},
	});
	// let produk = $('[name="produk"]').val();
	// let total_sudah = $('[name="total_sudah"]').val();
	// // console.log(total_sudah);
	// if (produk == "JERSEY") {
	// 	$.ajax({
	// 		url: getHitungUrl,
	// 		type: "post",
	// 		dataType: "json",
	// 		data: {
	// 			urutan_order: urutan_order,
	// 		},
	// 		success: (res) => {
	// 			$('[name="waktu_total"]').val(res.waktu_total);
	// 			let waktu_total = parseFloat($('[name="waktu_total"]').val());
	// 			// let total =
	// 			// 	print_sesudah +
	// 			// 	press_sesudah +
	// 			// 	jahit_sesudah +
	// 			// 	overdeck_sesudah +
	// 			// 	obras_sesudah;
	// 			// $('[name="ci"]').val(total / 960);
	// 		},
	// 		error: (err) => {
	// 			console.log(err);
	// 		},
	// 	});
	// } else {
	// 	$.ajax({
	// 		url: getHitung2Url,
	// 		type: "post",
	// 		dataType: "json",
	// 		// data: {
	// 		// 	urutan_order: urutan_order,
	// 		// },
	// 		success: (res) => {
	// 			$('[name="waktu_total"]').val(res.waktu_total);
	// 		},
	// 		error: (err) => {
	// 			console.log(err);
	// 		},
	// 	});
	// }
});
function hitung(data) {
	let produk = hasil_produk;
	$tanggal_sebelum = $('[name="tanggal_order2"]').val();
	$tanggal_sekarang = $('[name="tanggal_order"]').val();
	let tgl_sekarang = $tanggal_sekarang.toString();
	console.log(tgl_sekarang);
	// let sample;
	let total_sudah = $('[name="total_sudah"]').val();
	console.log(produk);
	if (produk == "jersey") {
		console.log(1);
		$.ajax({
			url: getHitungUrl,
			type: "post",
			dataType: "json",
			data: {
				urutan_order: $("#urutan_order").val(),
			},
			success: (res) => {
				$('[name="waktu_total"]').val(res.waktu_total);
				total_waktu = res.waktu_total;
				console.log(res.waktu_total);
				//data order
				if ($tanggal_sebelum == tgl_sekarang) {
					let print_sebelum = parseFloat($('[name="print_sebelum"]').val());
					let print_sorting = parseFloat(data.printer);
					let print_sesudah = print_sebelum + print_sorting;
					$('[name="print_sesudah"]').val(print_sesudah);
					$('[name="press_sebelum"]').val();
					let press_sebelum = parseFloat($('[name="press_sebelum"]').val());
					let press_sorting = parseFloat(data.press);
					let press_sesudah = press_sebelum + press_sorting;
					$('[name="press_sesudah"]').val(press_sesudah);
					$('[name="jahit_sebelum"]').val();
					let jahit_sebelum = parseFloat($('[name="jahit_sebelum"]').val());
					let jahit_sorting = parseFloat(data.jahit);
					let jahit_sesudah = jahit_sebelum + jahit_sorting;
					$('[name="jahit_sesudah"]').val(jahit_sesudah);
					$('[name="overdeck_sebelum"]').val();
					let overdeck_sebelum = parseFloat(
						$('[name="overdeck_sebelum"]').val()
					);
					let overdeck_sorting = parseFloat(data.overdeck);
					let overdeck_sesudah = overdeck_sebelum + overdeck_sorting;
					$('[name="overdeck_sesudah"]').val(overdeck_sesudah);
					$('[name="obras_sebelum"]').val();
					let obras_sebelum = parseFloat($('[name="obras_sebelum"]').val());
					let obras_sorting = parseFloat(data.obras);
					let obras_sesudah = obras_sebelum + obras_sorting;
					$('[name="obras_sesudah"]').val(obras_sesudah);
					$('[name="produk"]').val(data.produk);
					let waktu_total = parseFloat($('[name="waktu_total"]').val());
					let sesudah_print = parseFloat($('[name="print_sesudah"]').val());
					let sesudah_press = parseFloat($('[name="press_sesudah"]').val());
					let sesudah_jahit = parseFloat($('[name="jahit_sesudah"]').val());
					let sesudah_overdeck = parseFloat(
						$('[name="overdeck_sesudah"]').val()
					);
					let sesudah_obras = parseFloat($('[name="obras_sesudah"]').val());
					$total_sudah =
						sesudah_print +
						sesudah_press +
						sesudah_jahit +
						sesudah_overdeck +
						sesudah_obras +
						waktu_total;
					let total1 =
						sesudah_print +
						sesudah_press +
						sesudah_jahit +
						sesudah_overdeck +
						sesudah_obras;
					let total2 = parseFloat(total1);
					$total_sudahh = total2 + waktu_total;
					let total_sudah = parseFloat($total_sudahh);
					$('[name="total_sudah"]').val(total_sudah);
					let ci = total_sudah / 960;
					$('[name="ci"]').val(parseFloat(ci).toFixed(2));
				} else {
					$('[name="print_sebelum"]').val(0);
					$('[name="print_sesudah"]').val(data.printer);
					$('[name="press_sebelum"]').val(data.printer);
					let press_sebelum = parseFloat($('[name="press_sebelum"]').val());
					let press_sorting = parseFloat(data.press);
					let press_sesudah = press_sebelum + press_sorting;
					$('[name="press_sesudah"]').val(press_sesudah);
					$('[name="jahit_sebelum"]').val(press_sesudah);
					let jahit_sebelum = parseFloat($('[name="jahit_sebelum"]').val());
					let jahit_sorting = parseFloat(data.jahit);
					let jahit_sesudah = jahit_sebelum + jahit_sorting;
					$('[name="jahit_sesudah"]').val(jahit_sesudah);
					$('[name="overdeck_sebelum"]').val(jahit_sesudah);
					let overdeck_sebelum = parseFloat(
						$('[name="overdeck_sebelum"]').val()
					);
					let overdeck_sorting = parseFloat(data.overdeck);
					let overdeck_sesudah = overdeck_sebelum + overdeck_sorting;
					$('[name="overdeck_sesudah"]').val(overdeck_sesudah);
					$('[name="obras_sebelum"]').val(overdeck_sesudah);
					let obras_sebelum = parseFloat($('[name="obras_sebelum"]').val());
					let obras_sorting = parseFloat(data.obras);
					let obras_sesudah = obras_sebelum + obras_sorting;
					$('[name="obras_sesudah"]').val(obras_sesudah);
					$('[name="produk"]').val(data.produk);
					let waktu_total = parseFloat($('[name="waktu_total"]').val());
					let sesudah_print = parseFloat($('[name="print_sesudah"]').val());
					let sesudah_press = parseFloat($('[name="press_sesudah"]').val());
					let sesudah_jahit = parseFloat($('[name="jahit_sesudah"]').val());
					let sesudah_overdeck = parseFloat(
						$('[name="overdeck_sesudah"]').val()
					);
					let sesudah_obras = parseFloat($('[name="obras_sesudah"]').val());
					$total_sudah =
						sesudah_print +
						sesudah_press +
						sesudah_jahit +
						sesudah_overdeck +
						sesudah_obras +
						waktu_total;
					let total1 =
						sesudah_print +
						sesudah_press +
						sesudah_jahit +
						sesudah_overdeck +
						sesudah_obras;
					let total2 = parseFloat(total1);
					$total_sudahh = total2 + waktu_total;
					let total_sudah = parseFloat($total_sudahh);
					$('[name="total_sudah"]').val(total_sudah);
					let ci = total_sudah / 960;
					$('[name="ci"]').val(parseFloat(ci).toFixed(2));
					// $('[name="ci"]').val(parseFloat(ci).toFixed(1));
				}
				//selesai data order
				// let total =
				// 	print_sesudah +
				// 	press_sesudah +
				// 	jahit_sesudah +
				// 	overdeck_sesudah +
				// 	obras_sesudah;
				// $('[name="ci"]').val(total / 960);
			},
			error: (err) => {
				console.log(err);
			},
		});
	} else {
		$.ajax({
			url: getHitung2Url,
			type: "post",
			dataType: "json",
			data: {
				urutan_order: $("#urutan_order").val(),
			},
			success: (res) => {
				$('[name="waktu_total"]').val(res.waktu_total);
				//order mulai
				if ($tanggal_sebelum == tgl_sekarang) {
					let print_sebelum = parseFloat($('[name="print_sebelum"]').val());
					let print_sorting = parseFloat(data.printer);
					let print_sesudah = print_sebelum + print_sorting;
					$('[name="print_sesudah"]').val(print_sesudah);
					$('[name="press_sebelum"]').val();
					let press_sebelum = parseFloat($('[name="press_sebelum"]').val());
					let press_sorting = parseFloat(data.press);
					let press_sesudah = press_sebelum + press_sorting;
					$('[name="press_sesudah"]').val(press_sesudah);
					$('[name="jahit_sebelum"]').val();
					let jahit_sebelum = parseFloat($('[name="jahit_sebelum"]').val());
					let jahit_sorting = parseFloat(data.jahit);
					let jahit_sesudah = jahit_sebelum + jahit_sorting;
					$('[name="jahit_sesudah"]').val(jahit_sesudah);
					$('[name="overdeck_sebelum"]').val();
					let overdeck_sebelum = parseFloat(
						$('[name="overdeck_sebelum"]').val()
					);
					let overdeck_sorting = parseFloat(data.overdeck);
					let overdeck_sesudah = overdeck_sebelum + overdeck_sorting;
					$('[name="overdeck_sesudah"]').val(overdeck_sesudah);
					$('[name="obras_sebelum"]').val();
					let obras_sebelum = parseFloat($('[name="obras_sebelum"]').val());
					let obras_sorting = parseFloat(data.obras);
					let obras_sesudah = obras_sebelum + obras_sorting;
					$('[name="obras_sesudah"]').val(obras_sesudah);
					$('[name="produk"]').val(data.produk);
					let waktu_total = parseFloat($('[name="waktu_total"]').val());
					let sesudah_print = parseFloat($('[name="print_sesudah"]').val());
					let sesudah_press = parseFloat($('[name="press_sesudah"]').val());
					let sesudah_jahit = parseFloat($('[name="jahit_sesudah"]').val());
					let sesudah_overdeck = parseFloat(
						$('[name="overdeck_sesudah"]').val()
					);
					let sesudah_obras = parseFloat($('[name="obras_sesudah"]').val());
					$total_sudah =
						sesudah_print +
						sesudah_press +
						sesudah_jahit +
						sesudah_overdeck +
						sesudah_obras +
						waktu_total;
					let total1 =
						sesudah_print +
						sesudah_press +
						sesudah_jahit +
						sesudah_overdeck +
						sesudah_obras;
					let total2 = parseFloat(total1);
					$total_sudahh = total2 + waktu_total;
					let total_sudah = parseFloat($total_sudahh);
					$('[name="total_sudah"]').val(total_sudah);
					let ci = total_sudah / 960;
					console.log("print_sesudah".$print_sesudah);
					console.log("total1".$total1);
					console.log("total2".$total2);
					console.log("total_sudahh".$total_sudahh);
					console.log("total_sudah".$total_sudah);
					console.log("ci".$ci);
					$('[name="ci"]').val(parseFloat(ci));
				} else {
					$('[name="print_sebelum"]').val(0);
					$('[name="print_sesudah"]').val(data.printer);
					$('[name="press_sebelum"]').val(data.printer);
					let press_sebelum = parseFloat($('[name="press_sebelum"]').val());
					let press_sorting = parseFloat(data.press);
					let press_sesudah = press_sebelum + press_sorting;
					$('[name="press_sesudah"]').val(press_sesudah);
					$('[name="jahit_sebelum"]').val(press_sesudah);
					let jahit_sebelum = parseFloat($('[name="jahit_sebelum"]').val());
					let jahit_sorting = parseFloat(data.jahit);
					let jahit_sesudah = jahit_sebelum + jahit_sorting;
					$('[name="jahit_sesudah"]').val(jahit_sesudah);
					$('[name="overdeck_sebelum"]').val(jahit_sesudah);
					let overdeck_sebelum = parseFloat(
						$('[name="overdeck_sebelum"]').val()
					);
					let overdeck_sorting = parseFloat(data.overdeck);
					let overdeck_sesudah = overdeck_sebelum + overdeck_sorting;
					$('[name="overdeck_sesudah"]').val(overdeck_sesudah);
					$('[name="obras_sebelum"]').val(overdeck_sesudah);
					let obras_sebelum = parseFloat($('[name="obras_sebelum"]').val());
					let obras_sorting = parseFloat(data.obras);
					let obras_sesudah = obras_sebelum + obras_sorting;
					$('[name="obras_sesudah"]').val(obras_sesudah);
					$('[name="produk"]').val(data.produk);
					let waktu_total = parseFloat($('[name="waktu_total"]').val());
					let sesudah_print = parseFloat($('[name="print_sesudah"]').val());
					let sesudah_press = parseFloat($('[name="press_sesudah"]').val());
					let sesudah_jahit = parseFloat($('[name="jahit_sesudah"]').val());
					let sesudah_overdeck = parseFloat(
						$('[name="overdeck_sesudah"]').val()
					);
					let sesudah_obras = parseFloat($('[name="obras_sesudah"]').val());
					$total_sudah =
						sesudah_print +
						sesudah_press +
						sesudah_jahit +
						sesudah_overdeck +
						sesudah_obras +
						waktu_total;
					let total1 =
						sesudah_print +
						sesudah_press +
						sesudah_jahit +
						sesudah_overdeck +
						sesudah_obras;
					let total2 = parseFloat(total1);
					$total_sudahh = total2 + waktu_total;
					let total_sudah = parseFloat($total_sudahh);
					$('[name="total_sudah"]').val(total_sudah);
					let ci = total_sudah / 960;
					$('[name="ci"]').val(parseFloat(ci).toFixed(2));
				}
				//order selesai
			},
			error: (err) => {
				console.log(err);
			},
		});
	}
	// sample(total_waktu);
}
function add() {
	$("#tanggal_order").change(function () {
		$tanggal_sebelum = $('[name="tanggal_order2"]').val();
		$tanggal_sekarang = $('[name="tanggal_order"]').val();
		let tgl_sekarang = $tanggal_sekarang.toString();
		if ($tanggal_sebelum == tgl_sekarang) {
			let urutan_order = $("#urutan_order").val();
			$.ajax({
				url: getAll2Url,
				type: "post",
				dataType: "json",
				// data: {
				// 	urutan_order: urutan_order,
				// },
				success: (res) => {
					$('[name="print_sebelum"]').val(res.print_sesudah);
					$('[name="press_sebelum"]').val(res.press_sesudah);
					$('[name="jahit_sebelum"]').val(res.jahit_sesudah);
					$('[name="overdeck_sebelum"]').val(res.overdeck_sesudah);
					$('[name="obras_sebelum"]').val(res.obras_sesudah);
				},
				error: (err) => {
					console.log(err);
				},
			});
		} else {
			let urutan_order = $("#urutan_order").val();
			$.ajax({
				url: getAllUrl,
				type: "post",
				dataType: "json",
				data: {
					urutan_order: urutan_order,
				},
				success: (res) => {
					$('[name="print_sebelum"]').val(0);
					$('[name="print_sesudah"]').val(res.printer);
					$('[name="press_sebelum"]').val(res.printer);
					let press_sebelum = parseFloat($('[name="press_sebelum"]').val());
					let press_sorting = parseFloat(res.press);
					let press_sesudah = press_sebelum + press_sorting;
					$('[name="press_sesudah"]').val(press_sesudah);
					$('[name="jahit_sebelum"]').val(press_sesudah);
					let jahit_sebelum = parseFloat($('[name="jahit_sebelum"]').val());
					let jahit_sorting = parseFloat(res.jahit);
					let jahit_sesudah = jahit_sebelum + jahit_sorting;
					$('[name="jahit_sesudah"]').val(jahit_sesudah);
					$('[name="overdeck_sebelum"]').val(jahit_sesudah);
					let overdeck_sebelum = parseFloat(
						$('[name="overdeck_sebelum"]').val()
					);
					let overdeck_sorting = parseFloat(res.overdeck);
					let overdeck_sesudah = overdeck_sebelum + overdeck_sorting;
					$('[name="overdeck_sesudah"]').val(overdeck_sesudah);
					$('[name="obras_sebelum"]').val(overdeck_sesudah);
					let obras_sebelum = parseFloat($('[name="obras_sebelum"]').val());
					let obras_sorting = parseFloat(res.obras);
					let obras_sesudah = obras_sebelum + obras_sorting;
					$('[name="obras_sesudah"]').val(obras_sesudah);
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
	$.ajax({
		url: getPesananUrl,
		type: "post",
		dataType: "json",
		data: {
			id: id,
		},
		success: (res) => {
			$('[name="id"]').val(res.id);
			$('[name="tanggal_order"]').val(res.tanggal_order);
			$('[name="urutan_order"]').val(res.urutan_order);
			$('[name="print_sebelum"]').val(res.print_sebelum);
			$('[name="press_sebelum"]').val(res.press_sebelum);
			$('[name="jahit_sebelum"]').val(res.jahit_sebelum);
			$('[name="overdeck_sebelum"]').val(res.overdeck_sebelum);
			$('[name="obras_sebelum"]').val(res.obras_sebelum);
			$('[name="print_sesudah"]').val(res.print_sesudah);
			$('[name="press_sesudah"]').val(res.press_sesudah);
			$('[name="jahit_sesudah"]').val(res.jahit_sesudah);
			$('[name="overdeck_sesudah"]').val(res.overdeck_sesudah);
			$('[name="obras_sesudah"]').val(res.obras_sesudah);
			$('[name="ci"]').val(res.ci);
			$('[name="dateline"]').val(res.dateline);
			$('[name="lateness"]').val(res.lateness);
			$('[name="nj"]').val(res.nj);
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
