<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaanBahan_controller extends CI_Controller
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
        $this->load->model('PenggunaanBahan_model');
    }

    public function index()
    {
        $this->load->view('Bahan/penggunaan_bahan');
    }
    public function read()
    {
        $jabatan = $this->session->userdata('jabatan');
        header('Content-type: application/json');
        if ($this->PenggunaanBahan_model->read()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->PenggunaanBahan_model->read()->result() as $bahan) {
                $status = $bahan->status;
                if ($status == 1) {
                    $status1 = "<p style='color: blue;'>pengajuan</p>";
                    // $status1 = "Pengajuan";
                } else if ($status == 2) {
                    $status1 = "<p style='color: red;'>Tidak Tersedia</p>";
                    // $status1 = "Tidak Tersedia";
                } else {
                    $status1 = "<p style='color: green;'>Tersedia</p>";

                    // $status1 = "Tersedia";
                }
                if ($jabatan == "kepala_produksi") {
                    $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $bahan->idd . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $bahan->idd . ')">Delete</button>';
                } else {
                    $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $bahan->idd . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $bahan->idd . ')" hidden>Delete</button>';
                }
                $data[] = array(
                    'id' => $bahan->idd,
                    // 'id' => $this->session->userdata('id'),
                    'jenis_produk' => $bahan->jenis_produk,
                    'nama_bahan' => $bahan->bahann,
                    'jumlah_pesanan' => $bahan->jumlah_pesanan,
                    'jumlah_bahan' => $bahan->jumlah_bahan,
                    'total_bahan' => $bahan->total_bahan,
                    'status' => $status1,
                    'action' => $action
                );
            }
        } else {
            $data = array();
        }
        $bahan = array(
            'data' => $data
        );
        echo json_encode($bahan);
    }
    public function add()
    {
        $data = array(
            'id_bahan' => $this->input->post('nama_bahan'),
            'jenis_produk' => $this->input->post('jenis_produk'),
            'nama_bahan' => $this->input->post('nama_bahan'),
            'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            'jumlah_bahan' => $this->input->post('jumlah_bahan'),
            'total_bahan' => $this->input->post('total_bahan'),
            'status' => $this->input->post('status'),
            'notifikasi' => 3
        );
        $this->PenggunaanBahan_model->create($data);
        echo json_encode('sukses');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->PenggunaanBahan_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $jabatan = $this->session->userdata('jabatan');
        $id = $this->input->post('id');
        $id_bahan = $this->input->post('id_bahan');
        $status = $this->input->post('status');
        $total_bahan =  $this->input->post('total_bahan');
        $jumlah_bahan =  $this->input->post('jumlahbahan');
        $total = $jumlah_bahan - $total_bahan;
        if($status == 3){
            $notifikasi = 2;
        }else if ($status == 1){
            $notifikasi = 3;
        }
        // if ($status == 3) {
        //     $data = array(
        //         'jenis_baju' => $this->input->post('jenis_baju'),
        //         'nama_bahan' => $this->input->post('nama_bahan'),
        //         'kg' => $this->input->post('kg'),
        //         'jumlah_baju' => $this->input->post('jumlah_baju'),
        //         'status' => $this->input->post('status')
        //     );
        //     $bahan = array(
        //         'jumlah' => $total
        //     );
        //     // $this->PenggunaanBahan_model->update($id, $data);
        //     // $this->PenggunaanBahan_model->update_bahan($id_bahan, $bahan);
        //     // echo json_encode('sukses');

        //     if ($this->PenggunaanBahan_model->update($id, $data) && $this->PenggunaanBahan_model->update_bahan($id_bahan, $bahan)) {
        //         echo json_encode('sukses');
        //     }
        // } 
        // else if ($status == 1 || $status == 2) {
        //     $data = array(
        //         'jenis_baju' => $this->input->post('jenis_baju'),
        //         'nama_bahan' => $this->input->post('nama_bahan'),
        //         'kg' => $this->input->post('kg'),
        //         'jumlah_baju' => $this->input->post('jumlah_baju'),
        //         'status' => $this->input->post('status')

        //     );
        //     if ($this->PenggunaanBahan_model->update($id, $data)) {
        //         echo json_encode('sukses');
        //     }
        // }
        $data = array(
            'id_bahan' => $this->input->post('nama_bahan'),
            'jenis_produk' => $this->input->post('jenis_produk'),
            'nama_bahan' => $this->input->post('nama_bahan'),
            'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            'jumlah_bahan' => $this->input->post('jumlah_bahan'),
            'total_bahan' => $this->input->post('total_bahan'),
            'status' => $this->input->post('status'),
            'notifikasi' => $notifikasi

        );
        $bahan = array(
            'jumlah' => $total
        );
        // if ($jabatan == "kepala_produksi") {
        if ($status == 3) {
            if (($this->PenggunaanBahan_model->update($id, $data)) && ($this->PenggunaanBahan_model->update_bahan($id_bahan, $bahan))) {
                echo json_encode('sukses');
            }
        } else {
            if ($this->PenggunaanBahan_model->update($id, $data)) {
                echo json_encode('sukses');
            }
        }
    }

    public function get_bahan()
    {
        $id = $this->input->post('id');
        $user = $this->PenggunaanBahan_model->getBahan($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_bahann()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_bahan', true);

        // $user = $this->PenggunaanBahan_model->getBahan($nama);
        // // $user = $this->PenggunaanBahan_model->getBahan($id);
        // if ($user->row()) {
        //     echo json_encode($user->row());
        //     var_dump($user);
        // }
        $data = $this->PenggunaanBahan_model->getBahann($id);
        echo json_encode($data);
    }
}
