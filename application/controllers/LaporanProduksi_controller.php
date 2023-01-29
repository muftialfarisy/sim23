<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanProduksi_controller extends CI_Controller
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
        $this->load->model('LaporanProduksi_model');
    }

    public function index()
    {
        $this->load->view('Produksi/laporan_produksi');
    }
    public function read()
    {
        header('Content-type: application/json');
        $jabatan = $this->session->userdata('jabatan');
        if ($this->LaporanProduksi_model->read()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->LaporanProduksi_model->read()->result() as $produksi) {
                $id = $produksi->idd;
                $tanggal = new DateTime($produksi->tanggal_order);
                $dateline = new DateTime($produksi->dateline);
                $get_status = $produksi->status;
                if ($get_status == "Belum Dikerjakan") {
                    $status = "Belum Dikerjakan";
                } else if ($get_status == "Dikerjakan") {
                    $status = '<p style ="color: blue">Dikerjakan</p>';
                } else if ($get_status == "Tepat Waktu") {
                    $status = '<p style ="color: green";>Dikerjakan</p>';
                } else if ($get_status == "Terlambat") {
                    $status = '<p style ="color: red";>Terlambat</p>';
                }
                if ($jabatan == "operasional_produksi") {
                    $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $produksi->idd . ')">Edit</button>';
                } else {
                    $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $produksi->idd . ')"hidden>Edit</button>';
                }
                $data[] = array(
                    'id' => $produksi->id,
                    // 'id' => $this->session->userdata('id'),
                    'tanggal_order' => $tanggal->format('d-m-Y'),
                    'dateline' => $dateline->format('d-m-Y'),
                    'no_po' => $produksi->no_po,
                    'invoice_po' => $produksi->invoice_po,
                    'customer' => $produksi->customer,
                    'tema_design' => $produksi->tema_design,
                    'jumlah_pesanan' => $produksi->jumlah_pesanan,
                    'produk' => $produksi->produk,
                    'bahan' => $produksi->bahann,
                    'jumlah_produk' => $produksi->jumlah_produk,
                    'desain' => $produksi->desain . "%",
                    'print' => $produksi->print . "%",
                    'cutting' => $produksi->cutting . "%",
                    'press' => $produksi->press . "%",
                    'jahit' => $produksi->jahit . "%",
                    'overdeck' => $produksi->overdeck . "%",
                    'obras' => $produksi->obras . "%",
                    'qc' => $produksi->qc . "%",
                    'status' => $status,
                    // 'status' => $produksi->status,
                    'action' => $action
                    // 'action' => '<button class="btn btn-sm btn-success" onclick="edit(' . $id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $id . ')">Delete</button>'
                );
            }
        } else {
            $data = array();
        }
        $produksi = array(
            'data' => $data
        );
        echo json_encode($produksi);
    }
    public function add()
    {
        $data = array(
            'id_bahan' => $this->input->post('bahan'),
            'tanggal_order' => $this->input->post('tanggal_order'),
            'dateline' => $this->input->post('dateline'),
            'no_po' => $this->input->post('no_po'),
            'invoice_po' => $this->input->post('invoice_po'),
            'customer' => $this->input->post('customer'),
            'tema_design' => $this->input->post('tema_design'),
            'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            'produk' => $this->input->post('produk'),
            'bahan' => $this->input->post('bahan'),
            'jumlah_produk' => $this->input->post('jumlah_produk'),
        );
        $this->LaporanProduksi_model->create($data);
        echo json_encode('sukses');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->LaporanProduksi_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            // 'id_bahan' => $this->input->post('bahan'),
            // 'tanggal_order' => $this->input->post('tanggal_order'),
            // 'dateline' => $this->input->post('dateline'),
            // 'no_po' => $this->input->post('no_po'),
            // 'invoice_po' => $this->input->post('invoice_po'),
            // 'customer' => $this->input->post('customer'),
            // 'tema_design' => $this->input->post('tema_design'),
            // 'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            // 'produk' => $this->input->post('produk'),
            // 'bahan' => $this->input->post('bahan'),
            // 'jumlah_produk' => $this->input->post('jumlah_produk'),
            'desain' => $this->input->post('desain'),
            'print' => $this->input->post('print'),
            'cutting' => $this->input->post('cutting'),
            'press' => $this->input->post('press'),
            'jahit' => $this->input->post('jahit'),
            'overdeck' => $this->input->post('overdeck'),
            'obras' => $this->input->post('obras'),
            'qc' => $this->input->post('qc'),
            'status' => $this->input->post('status'),

        );
        if ($this->LaporanProduksi_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_produksi()
    {
        $id = $this->input->post('id');
        $user = $this->LaporanProduksi_model->getProduksi($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_bahan()
    {
        $id = $this->input->post('id');
        $bahan = $this->input->post('bahan');
        $user = $this->LaporanProduksi_model->getBahan($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_bahann()
    {
        $id = $this->input->post('id');
        // $bahan = $this->input->post('bahan');
        $user = $this->LaporanProduksi_model->getBahann($id);
        // $user = $this->Produksi_model->getBahann($bahan);
        // $user = $this->Produksi_model->getBahann($id, $bahan);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
