function detail(id) {
	location.href = "produksi_detail";
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
		},
		error: (err) => {
			console.log(err);
		},
	});
}
