    <table id="progress" class="table table-bordered table-hover" style="width: 100%;">
        <thead>
            <tr>
                <!-- <th>No.</th> -->
                <th>Tanggal Order</th>
                <th>Customer</th>
                <th>Tema Design</th>
                <th>Total Progress</th>
                <th>Dateline</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <?php $this->load->view('includes/Script'); ?>
    <script>
        var progressProduksi = '<?php echo site_url('Dashboard_controller/progress_produksi') ?>';
    </script>
    <script src="<?php echo base_url('assets/js/progress_produksi.js') ?>"></script>