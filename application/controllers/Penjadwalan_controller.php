<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjadwalan_controller extends CI_Controller
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
        $this->load->model('Penjadwalan_model');
    }

    public function index()
    {
               $mesin_jaket = $this->Penjadwalan_model->getUsernames2();

        $data['mesin_jaket'] = $mesin_jaket;
        $this->load->view('Mesin/penjadwalan',$data);
    }
    public function read()
    {
        $jabatan = $this->session->userdata('jabatan');
        header('Content-type: application/json');
        if ($this->Penjadwalan_model->read()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->Penjadwalan_model->read()->result() as $pesanan) {
                $tanggal_pesanan = new DateTime($pesanan->tanggal_pesanan);
                $tgl = $tanggal_pesanan->format('d-m-Y');
                $dateline =  $pesanan->dateline;
                $finishing = $pesanan->finishing;
                $day1  = date('d-m-Y', strtotime($tgl . '+'  . $dateline . 'days'));
                // $day2 = date('d-m-Y', strtotime($tgl . ' + 5 days'));
                if($finishing == null){
                    $day2 = "";
                    
                }
                else{
                    if($finishing == 0){
                    $day2 = date('d-m-Y', strtotime($tgl . '+'  . $finishing . 'days'));
                    }
                    else{
                        $day2 = date('d-m-Y', strtotime($tgl . '+'  . $finishing-1 . 'days'));
                    }
                }
                // if ($jabatan == "admin") {
                //     $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $pesanan->id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $pesanan->id . ')">Delete</button>';
                // } else {
                //     $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $pesanan->id . ')" hidden>Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $pesanan->id . ')" hidden>Delete</button>';
                // }
                $data[] = array(
                    'id' => $this->session->userdata('id'),
                    'urutan_order' => $pesanan->urutan_order,
                    'nama_pelanggan' => $pesanan->nama_pelanggan,
                    'tema_desain' => $pesanan->tema_desain,
                    'tanggal_pesanan' => $tgl,
                    'invoice' => $pesanan->invoice,
                    'produk' => $pesanan->produk,
                    'jumlah' => $pesanan->jumlah,
                    'bahan_baku' => $pesanan->bahan_baku,
                    // 'dateline' => $pesanan->dateline,
                    'dateline' => $day1,
                    // 'finishing' => $pesanan->finishing,
                    'finishing' => $day2,
                    'action' =>      '<button class="btn btn-sm btn-success" onclick="edit(' . $pesanan->id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $pesanan->id . ')">Delete</button>'
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
            'urutan_order' =>  $this->input->post('urutan_order'),
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'tema_desain' => $this->input->post('tema_desain'),
            'tanggal_pesanan' => $this->input->post('tanggal_pesanan'),
            'invoice' => $this->input->post('invoice'),
            'produk' => $this->input->post('produk'),
            'jumlah' => $this->input->post('jumlah'),
            'bahan_baku' => $this->input->post('bahan_baku'),
            'dateline' => $this->input->post('dateline'),
            // 'finishing' => $this->input->post('finishing')
        );

        $this->Penjadwalan_model->create($data);
        echo json_encode('sukses');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->Penjadwalan_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $urutan_order =$this->input->post('urutan_order');
        $data = array(
            'urutan_order' => $this->input->post('urutan_order'),
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'tema_desain' => $this->input->post('tema_desain'),
            'tanggal_pesanan' => $this->input->post('tanggal_pesanan'),
            'invoice' => $this->input->post('invoice'),
            'produk' => $this->input->post('produk'),
            'jumlah' => $this->input->post('jumlah'),
            'bahan_baku' => $this->input->post('bahan_baku'),
            'dateline' => $this->input->post('dateline'),
            'finishing' => $this->input->post('finishing')
        );
        if ($this->Penjadwalan_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_pesanan()
    {
        $id = $this->input->post('id');
        $user = $this->Penjadwalan_model->getPesanan($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
        public function jadwal()
    {
        header('Content-type: application/json');
        $estimasi2 = $this->Penjadwalan_model->getJadwal();

        echo json_encode($estimasi2);
        // }
    }

}
