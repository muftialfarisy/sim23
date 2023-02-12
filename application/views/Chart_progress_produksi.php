<div>
    <select class="form-control" name="nama_customer" id="nama_customer">
        <option>pilih</option>
        <?php

        $hasil = $this->db->select('*')
            ->from('produksi')
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
<canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>


<script>
    let desain;
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
            url: '<?php echo base_url("Chart_progress_controller/get_produksi"); ?>',
            // url: produksiUrl,
            type: "post",
            dataType: "json",
            data: {
                customer: $("#nama_customer").val(),
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
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    function chart(res) {
        desain = parseInt(res.desain);
        print = parseInt(res.print);
        cutting = parseInt(res.cutting);
        press = parseInt(res.press);
        jahit = parseInt(res.jahit);
        overdeck = parseInt(res.overdeck);
        obras = parseInt(res.obras);
        qc = parseInt(res.qc);
        var donutChartCanvas = $('#donutChart2').get(0).getContext('2d')
        var donutData = {
            labels: [

                'desain %',
                'print %',
                'cutting %',
                'press %',
                'jahit %',
                'overdeck %',
                'obras %',
                'qc %',
            ],
            datasets: [{
                data: [
                    desain, print, cutting, press, jahit, overdeck, obras, qc

                ],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#33FF55', '#DAFF33', '#33FFEC', '#229389', '#226293', '#C30BFF', '#F50BFF', '#FF0B6F', '#FFAA0B', '#A8FF0B', '#0F2B66', '#696E76'],
            }]
        }
        console.log(desain)
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    }
</script>