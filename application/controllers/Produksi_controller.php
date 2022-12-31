<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi_controller extends CI_Controller
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
        $this->load->model('Produksi_model');
    }

    public function index()
    {
        $this->load->view('Produksi/produksi');
    }
    public function read()
    {
        header('Content-type: application/json');
        if ($this->Produksi_model->read()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->Produksi_model->read()->result() as $produksi) {
                $id = $produksi->idd;
                $tanggal = new DateTime($produksi->tanggal_order);
                $data[] = array(
                    'id' => $this->session->userdata('id'),
                    'tanggal_order' => $tanggal->format('d-m-Y'),
                    'no_po' => $produksi->no_po,
                    'invoice_po' => $produksi->invoice_po,
                    'customer' => $produksi->customer,
                    'tema_design' => $produksi->tema_design,
                    'jumlah_pesanan' => $produksi->jumlah_pesanan,
                    'produk' => $produksi->produk,
                    'bahan' => $produksi->bahann,
                    'jumlah_produk' => $produksi->jumlah_produk,
                    'action' => '<button class="btn btn-sm btn-success" onclick="edit(' . $id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $id . ')">Delete</button>'
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
            'no_po' => $this->input->post('no_po'),
            'invoice_po' => $this->input->post('invoice_po'),
            'customer' => $this->input->post('customer'),
            'tema_design' => $this->input->post('tema_design'),
            'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            'produk' => $this->input->post('produk'),
            'bahan' => $this->input->post('bahan'),
            'jumlah_produk' => $this->input->post('jumlah_produk'),
        );
        $this->Produksi_model->create($data);
        echo json_encode('sukses');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->Produksi_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'id_bahan' => $this->input->post('id_bahan'),
            'tanggal_order' => $this->input->post('tanggal_order'),
            'no_po' => $this->input->post('no_po'),
            'invoice_po' => $this->input->post('invoice_po'),
            'customer' => $this->input->post('customer'),
            'tema_design' => $this->input->post('tema_design'),
            'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            'produk' => $this->input->post('produk'),
            'bahan' => $this->input->post('bahan'),
            'jumlah_produk' => $this->input->post('jumlah_produk'),

        );
        if ($this->Produksi_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_produksi()
    {
        $id = $this->input->post('id');
        $user = $this->Produksi_model->getProduksi($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_bahan()
    {
        $id = $this->input->post('id');
        $bahan = $this->input->post('bahan');
        $user = $this->Produksi_model->getBahan($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_bahann()
    {
        $id = $this->input->post('id');
        // $bahan = $this->input->post('bahan');
        $user = $this->Produksi_model->getBahann($id);
        // $user = $this->Produksi_model->getBahann($bahan);
        // $user = $this->Produksi_model->getBahann($id, $bahan);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
