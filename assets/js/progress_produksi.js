let url,
	user = $("#progress").DataTable({
		// responsive: true,
		scrollX: true,
		ajax: progressProduksi,
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
				data: "tanggal_order",
			},
			{
				data: "customer",
			},
			{
				data: "tema_design",
			},
			{
				data: "progress",
			},
			{
				data: "dateline",
			},
		],
	});

function reloadTable() {
	user.ajax.reload();
}
