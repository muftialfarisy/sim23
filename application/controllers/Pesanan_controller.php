<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_controller extends CI_Controller
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
        $this->load->model('Pesanan_model');
    }

    public function index()
    {
        $this->load->view('Pesanan/pesanan');
    }
    public function read()
    {
        $jabatan = $this->session->userdata('jabatan');
        header('Content-type: application/json');
        if ($this->Pesanan_model->read()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->Pesanan_model->read()->result() as $pesanan) {
                if ($jabatan == "admin") {
                    $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $pesanan->id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $pesanan->id . ')">Delete</button>';
                } else {
                    $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $pesanan->id . ')" hidden>Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $pesanan->id . ')" hidden>Delete</button>';
                }
                $data[] = array(
                    'id' => $this->session->userdata('id'),
                    'nama_pelanggan' => $pesanan->nama_pelanggan,
                    'tema_desain' => $pesanan->tema_desain,
                    'tanggal_pesanan' => $pesanan->tanggal_pesanan,
                    'invoice' => $pesanan->invoice,
                    'produk' => $pesanan->produk,
                    'jumlah' => $pesanan->jumlah,
                    'bahan_baku' => $pesanan->bahan_baku,
                    'action' => $action
                );
            }
        } else {
            $data = array();
        }
        $pesanan = array(
            'data' => $data
        );
        echo json_encode($pesanan);
    }
    public function add()
    {
        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'tema_desain' => $this->input->post('tema_desain'),
            'tanggal_pesanan' => $this->input->post('tanggal_pesanan'),
            'invoice' => $this->input->post('invoice'),
            'produk' => $this->input->post('produk'),
            'jumlah' => $this->input->post('jumlah'),
            'bahan_baku' => $this->input->post('bahan_baku')
        );
        $this->Pesanan_model->create($data);
        echo json_encode('sukses');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->Pesanan_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'tema_desain' => $this->input->post('tema_desain'),
            'tanggal_pesanan' => $this->input->post('tanggal_pesanan'),
            'invoice' => $this->input->post('invoice'),
            'produk' => $this->input->post('produk'),
            'jumlah' => $this->input->post('jumlah'),
            'bahan_baku' => $this->input->post('bahan_baku')
        );
        if ($this->Pesanan_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_pesanan()
    {
        $id = $this->input->post('id');
        $user = $this->Pesanan_model->getPesanan($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
