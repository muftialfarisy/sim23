let noo = [];
let tasks = [];
let tasks2 = [];
let jadwal = [];
let urutan;
// function read() {
// 	$.ajax({
// 		url: readUrl,
// 		type: "post",
// 		dataType: "json",
// 		// data: {
// 		// 	id: 1,
// 		// },
// 		success: (res) => {
// 			// $('[name="id"]').val(res.id);
// 			noo = res.urutan_order;
// 		},
// 		error: (err) => {
// 			console.log(err);
// 		},
// 	});
// }
// $(document).ready(function () {
// 	data1();
// 	data2();
// });
// function data1() {
// 	$.ajax({
// 		url: readUrl,
// 		type: "post",
// 		dataType: "json",
// 		// data: {
// 		// 	urutan_order: "order 1",
// 		// },
// 		success: (res) => {
// 			$.each(res, function (i, value) {
// 				urutan = value.id;
// 				tanggal_order = value.tanggal_order;
// 				var today = new Date(tanggal_order);
// 				var tomorrow = new Date(today);
// 				var deadline = parseInt(value.dateline);
// 				tomorrow.setDate(today.getDate() + deadline);
// 				tomorrow.toLocaleDateString();
// 				urutan_order = value.urutan_order;
// 				noo = value;
// 				tasks.push({
// 					id: urutan,
// 					name: urutan_order,
// 					start: today,
// 					end: tomorrow,
// 				});
// 				let ganttChart = new Gantt("#gantt", tasks, {});
// 				ganttChart.change_view_mode("Day");
// 			});
// 		},
// 		error: (err) => {
// 			console.log(err);
// 		},
// 	});
// }
// function data2() {
// 	$.ajax({
// 		url: jadwalUrl,
// 		type: "post",
// 		dataType: "json",
// 		// data: {
// 		// 	urutan_order: "order 1",
// 		// },
// 		success: (res) => {
// 			$.each(res, function (i, value) {
// 				let id = value.id;
// 				tanggal_pesanan = value.tanggal_pesanan;
// 				var today2 = new Date(tanggal_pesanan);
// 				var tomorrow2 = new Date(today2);
// 				var deadline2 = parseInt(value.finishing);
// 				tomorrow2.setDate(today2.getDate() + deadline2);
// 				tomorrow2.toLocaleDateString();
// 				urutan_order = value.urutan_order;
// 				nama_pelanggan = value.nama_pelanggan;
// 				jadwal.push({
// 					id: id,
// 					name: nama_pelanggan,
// 					start: today2,
// 					end: tomorrow2,
// 				});
// 				let ganttChart3 = new Gantt("#gantt3", jadwal, {});
// 				ganttChart3.change_view_mode("Day");
// 			});
// 		},
// 		error: (err) => {
// 			console.log(err);
// 		},
// 	});
// }
$("#urutan_order").change(function () {
	let order = $("#urutan_order").val();
	let order2 = $('[name="urutan_order"]').val();
	$.ajax({
		url: orderUrl,
		type: "post",
		dataType: "json",
		data: {
			urutan_order: order,
		},
		success: (res) => {
			// console.log(res.id);
			$.each(res, function (i, value) {
				urutan = value.id;
				tanggal_order = value.tanggal_order;
				let today = new Date(tanggal_order);
				var tomorrow = new Date(today);
				var deadline = parseInt(value.dateline);
				tomorrow.setDate(today.getDate() + deadline);
				tomorrow.toLocaleDateString();
				urutan_order = value.urutan_order;
				print_sebelum = parseInt(value.print_sebelum);
				print_sesudah = parseInt(value.print_sesudah);
				noo = value;
				//print start
				var jam = Math.floor(print_sesudah / 60);
				var menit = jam % 60;
				var detik = menit % 60;
				let h = tanggal_order + " " + jam + ":" + menit + ":" + detik;
				var jam2 = today.getHours();
				var menit2 = today.getMinutes();
				var detik2 = today.getSeconds();
				var waktu_awal =
					tanggal_order + " " + jam2 + ":" + menit2 + ":" + detik2;
				var waktu_print_sesudah =
					tanggal_order +
					" " +
					(jam + jam2) +
					":" +
					(menit + menit2) +
					":" +
					(detik + detik2);
				var waktu_print_sesudahh =
					jam + jam2 + ":" + (menit + menit2) + ":" + (detik + detik2);
				//print end
				//press start
				var waktu_print_sesudah2 = new Date(waktu_print_sesudah);
				var jam_print_sesudah = waktu_print_sesudah2.getHours();
				var menit_print_sesudah = waktu_print_sesudah2.getMinutes();
				var detik_print_sesudah = waktu_print_sesudah2.getSeconds();
				var press_sesudah = parseInt(value.press_sesudah);
				var hours_press_sesudah = Math.floor(press_sesudah / 60);
				var minutes_press_sesudah = press_sesudah % 60;
				var seconds_press_sesudah = minutes_press_sesudah % 60;
				var waktu_presss = new Date(waktu_press_sesudah);
				var jam_press = waktu_presss.getHours();
				var menit_press = waktu_presss.getMinutes();
				var detik_press = waktu_presss.getSeconds();
				$total_press =
					tanggal_order +
					" " +
					jam_press +
					"-" +
					menit_press +
					"-" +
					detik_press;
				var waktu_press_sesudah =
					tanggal_order +
					" " +
					(jam_print_sesudah + hours_press_sesudah) +
					":" +
					(menit_print_sesudah + minutes_press_sesudah) +
					":" +
					(detik_print_sesudah + seconds_press_sesudah);
				// press end
				//jahit start
				var waktu_jahit_sebelum = new Date(waktu_press_sesudah);
				var day_jahit_sebelum = today.getDay();
				var month_jahit_sebelum = today.getMonth();
				var year_jahit_sebelum = today.getFullYear();
				var hours_jahit_sebelum = waktu_jahit_sebelum.getHours();
				var minutes_jahit_sebelum = waktu_jahit_sebelum.getMinutes();
				var seconds_jahit_sebelum = waktu_jahit_sebelum.getSeconds();
				var jahit_sesudah = parseInt(value.jahit_sesudah);
				var hours_jahit_sesudah = Math.floor(jahit_sesudah / 60);
				var minutes_jahit_sesudah = hours_jahit_sesudah % 60;
				var seconds_jahit_sesudah = minutes_jahit_sesudah % 60;
				var hours_total = hours_jahit_sebelum + hours_jahit_sesudah;
				if (hours_total >= 24) {
					var total_day = day_jahit_sebelum + 1;
					var total_hour = 0;
					// console.log("lebih");
				} else {
					var total_day = day_jahit_sebelum;
					var total_hour = hours_total;
					// console.log("kurang");
				}
				var month_jahit_sebelum2 = month_jahit_sebelum + 1;
				var total_hari2 =
					month_jahit_sebelum2 + "-" + total_day + "-" + year_jahit_sebelum;
				var waktu_jahit_sesudah =
					total_hari2 +
					" " +
					total_hour +
					":" +
					(minutes_jahit_sebelum + minutes_jahit_sesudah) +
					":" +
					(seconds_jahit_sebelum + seconds_jahit_sesudah);
				var waktu_total_jahit = waktu_jahit_sesudah - waktu_press_sesudah;
				//jahit end
				//overdeck start
				var waktu_overdeck_sebelum = new Date(waktu_jahit_sesudah);
				var hours_overdeck_sebelum = waktu_overdeck_sebelum.getHours();
				var minutes_overdeck_sebelum = waktu_overdeck_sebelum.getMinutes();
				var seconds_overdeck_sebelum = waktu_overdeck_sebelum.getSeconds();
				var overdeck_sesudah = parseInt(value.overdeck_sesudah);
				var hours_overdeck_sesudah = Math.floor(overdeck_sesudah / 60);
				var minutes_overdeck_sesudah = hours_overdeck_sesudah % 60;
				var seconds_overdeck_sesudah = minutes_overdeck_sesudah % 60;
				var waktu_overdeck_sesudah =
					total_hari2 +
					" " +
					(hours_overdeck_sebelum + hours_overdeck_sesudah) +
					":" +
					(minutes_overdeck_sebelum + minutes_overdeck_sesudah) +
					":" +
					(seconds_overdeck_sebelum + seconds_overdeck_sesudah);
				//overdeck end
				if (print_sebelum == 0) {
					awal = today;
					akhir = h;
					console.log("awal " + $total_press);
					console.log("akhr " + waktu_print_sesudah2);
				} else {
					awal = h;
					akhir = waktu_press_sebelum;
				}

				let tasks2 = [
					{
						id: "1",
						name: "M1(printer)",
						start: awal,
						// start: awal,
						end: waktu_print_sesudah2,
						progress: 100,
					},
					{
						id: "2",
						name: "M2(press)",
						start: waktu_print_sesudah2,
						end: waktu_press_sesudah,
						progress: 100,
					},
					{
						id: "3",
						name: "M3(jahit)",
						start: waktu_press_sesudah,
						end: waktu_jahit_sesudah,
						progress: 100,
					},
					// {
					// 	id: "4",
					// 	name: "M4(overdeck)",
					// 	start: waktu_jahit_sesudah,
					// 	end: waktu_overdeck_sesudah,
					// 	progress: 100,
					// },
				];
				let ganttChart2 = new Gantt("#gantt2", tasks2, {});
				ganttChart2.change_view_mode("Quarter Day");
			});
		},
		error: (err) => {
			console.log(err);
		},
	});
});
