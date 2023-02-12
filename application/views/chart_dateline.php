<div>
    <select class="form-control" name="nama_customer" id="nama_customer">
        <option>pilih</option>
        <?php

        $hasil = $this->db->select('produksi.id as idd,produksi.tanggal_order,produksi.dateline,produksi.no_po,produksi.invoice_po,produksi.customer,produksi.tema_design,produksi.jumlah_pesanan,produksi.produk,produksi.bahan,produksi.jumlah_produk,produksi.desain,progress.print as print,progress.cutting as cutting,progress.press as press,progress.jahit as jahit ,progress.overdeck as overdeck,progress.obras as obras,qc.status as qc,produksi.status as status,bahan.id,bahan.nama_bahan as bahann')
            ->from('produksi')
            ->join('bahan', 'produksi.id_bahan = bahan.id')
            ->join('progress', 'produksi.id = progress.produksi_id')
            ->join('qc', 'produksi.id = qc.produksi_id')
            ->get()
            ->result();
        foreach ($hasil as $hasil_produksi) {
            $id = $hasil_produksi->id;
            $customer = $hasil_produksi->customer;
            ?>
            <option value="<?php echo $customer ?>"><?php echo $customer ?></option>
        <?php } ?>
    </select>
</div>
<!-- <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
<div style="margin-top :30px;">

    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>


<script>
    let desain2;
    let print;
    let cutting;
    let press;
    let jahit;
    let overdeck;
    let obras;
    let qc;
    let nama_customer;
    $("#nama_customer").change(function() {
        nama_customer = $("#nama_customer").val();
        console.log(nama_customer);
        $.ajax({
            url: '<?php echo base_url("Dashboard_controller/get_progress"); ?>',
            // url: produksiUrl,
            type: "post",
            dataType: "json",
            data: {
                customer: nama_customer,
                // customer: $("#nama_customer").val(),
            },
            success: (res) => {

                chart(res)
                console.log(res.customer)
            },
            error: (err) => {
                console.log(err);
            },
        });
    });

    function chart(res) {
        desain2 = parseInt(res.desain);
        print = res.print;
        let total_print;
        if (print == "Selesai Dikerjakan") {
            total_print = 100;
        } else if (cutting == "Sedang Dikerjakan") {
            total_print = 50;

        } else {
            total_print = 0;

        }
        cutting = res.cutting;
        let total_cutting;
        if (cutting == "Selesai Dikerjakan") {
            total_cutting = 100;
        } else if (cutting == "Sedang Dikerjakan") {
            total_cutting = 50;

        } else {
            total_cutting = 0;

        }
        press = res.press;
        let total_press;
        if (press == "Selesai Dikerjakan") {
            total_press = 100;
        } else if (press == "Sedang Dikerjakan") {
            total_press = 50;

        } else {
            total_press = 0;

        }
        jahit = res.jahit;
        let total_jahit;
        if (jahit == "Selesai Dikerjakan") {
            total_jahit = 100;
        } else if (jahit == "Sedang Dikerjakan") {
            total_jahit = 50;

        } else {
            total_jahit = 0;

        }
        overdeck = res.overdeck;
        let total_overdeck;
        if (overdeck == "Selesai Dikerjakan") {
            total_overdeck = 100;
        } else if (overdeck == "Sedang Dikerjakan") {
            total_overdeck = 50;

        } else {
            total_overdeck = 0;

        }
        obras = res.obras;
        let total_obras;
        if (obras == "Selesai Dikerjakan") {
            total_obras = 100;
        } else if (obras == "Sedang Dikerjakan") {
            total_obras = 50;

        } else {
            total_obras = 0;

        }
        qc = res.qc;
        let total_qc;
        if (qc == "diterima") {
            total_qc = 100;
        } else if (qc == "ditolak") {
            total_qc = 50;

        } else {
            total_qc = 0;

        }
        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true,
                    }
                }]
            }
        }
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
            labels: ['Desain', 'Print', 'Cutting', 'Press', 'Jahit', 'Obras', 'Overdeck', 'QC'],
            datasets: [{
                label: ['Desain'],
                data: [desain2, total_print, total_cutting, total_press, total_jahit, total_obras, total_overdeck, total_qc],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };


        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: areaChartOptions
        })
    }
    // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    // var lineChartOptions = $.extend(true, {}, areaChartOptions)
    // var lineChartData = $.extend(true, {}, areaChartData)
    // lineChartData.datasets[0].fill = false;
    // lineChartData.datasets[1].fill = false;
    // lineChartOptions.datasetFill = false

    // var lineChart = new Chart(lineChartCanvas, {
    //     type: 'line',
    //     data: lineChartData,
    //     options: lineChartOptions
    // })
</script>