<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('status') !== 'login') {
        //     redirect('/');
        // }
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $mesin_jaket = $this->Dashboard_model->getUsernames2();

        $data['mesin_jaket'] = $mesin_jaket;

        $this->load->view('Dashboard2');
        //    $penggunaan_bahan = $this->Dashboard_model->getPenggunaanBahan();

        // $data['penggunaan_bahan'] = $penggunaan_bahan;

        // $this->load->view('Chart_penggunaan_bahan', $data);
    }
    public function update_produksi()
    {
        $data = array(
            'notifikasi' => 0,
        );
        if ($this->Dashboard_model->updateProduksi($data)) {
            echo json_encode('sukses');
        }
    }
    public function update_penggunaan_bahan()
    {

        $data = array(
            'notifikasi' => 0,
        );

        if ($this->Dashboard_model->updatePenggunaanBahan($data)) {
            echo json_encode('sukses');
        }
    }
    // public function read()
    // {
    //     header('Content-type: application/json');
    //     foreach ($this->Dashboard_model->read()->result() as $dashboard) {
    //         $data[] = array(
    //             'id' => $dashboard->id,
    //             'urutan_order' => $dashboard->urutan_order,
    //         );
    //     }
    //     $dashboard = array(
    //         'data' => $data
    //     );
    //     echo json_encode($dashboard);
    // }
    public function read()
    {
        header('Content-type: application/json');
        $estimasi = $this->Dashboard_model->getUsernames();
        // if ($estimasi->row()) {
        // echo json_encode($estimasi->row());
        echo json_encode($estimasi);
        // }
    }
    public function jadwal()
    {
        header('Content-type: application/json');
        $estimasi2 = $this->Dashboard_model->getJadwal();

        echo json_encode($estimasi2);
        // }
    }
    public function order()
    {
        header('Content-type: application/json');
        $urutan_order = $this->input->post('urutan_order');
        $estimasi = $this->Dashboard_model->getOrder($urutan_order);
        echo json_encode($estimasi);
    }
    public function progress_produksi()
    {
        header('Content-type: application/json');
        // var_dump($this->user_model->read()->result());
        foreach ($this->Dashboard_model->get_progress_produksi()->result() as $user) {
            $desain = $user->desain;
            $print = $user->print;
            $cutting = $user->cutting;
            $press = $user->press;
            $jahit = $user->jahit;
            $overdeck = $user->overdeck;
            $obras = $user->obras;
            $qc = $user->qc;
            $progress = ((int) $desain + (int) $print + (int) $cutting + (int) $press + (int) $jahit + (int) $overdeck + (int) $obras + (int) $qc) / 8;
            $data[] = array(
                'id' => $user->id,
                'tanggal_order' => $user->tanggal_order,
                'customer' => $user->customer,
                'tema_design' => $user->tema_design,
                'dateline' => $user->dateline,
                'progress' =>  ceil($progress) . "%",
            );
        }
        $user = array(
            'data' => $data
        );
        echo json_encode($user);
    }
    public function get_produksi()
    {
        $id = $this->input->post('id');
        $user = $this->Dashboard_model->getProduksi();
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    // public function order()
    // {
    //     header('Content-type: application/json');
    //     $urutan_order = $this->input->post('urutan_order');
    //     $estimasi = $this->Dashboard_model->getOrder($urutan_order);
    //     if ($estimasi->row()) {
    //         echo json_encode($estimasi->row());
    //         // echo json_encode($estimasi->result());
    //     }
    // }
}
