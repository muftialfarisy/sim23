<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bahan_controller extends CI_Controller
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
        $this->load->model('Bahan_model');
    }

    public function index()
    {
        $this->load->view('Bahan/bahan');
    }
    public function read()
    {
        header('Content-type: application/json');
        if ($this->Bahan_model->read()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->Bahan_model->read()->result() as $bahan) {
                $data[] = array(
                    'id' => $this->session->userdata('id'),
                    'nama_bahan' => $bahan->nama_bahan,
                    'jumlah' => $bahan->jumlah,
                    'action' => '<button class="btn btn-sm btn-success" onclick="edit(' . $bahan->id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $bahan->id . ')">Hapus</button>'
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
            'nama_bahan' => $this->input->post('nama_bahan'),
            'jumlah' => $this->input->post('jumlah')
        );
        $this->Bahan_model->create($data);
        echo json_encode('sukses');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->Bahan_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama_bahan' => $this->input->post('nama_bahan'),
            'jumlah' => $this->input->post('jumlah')
        );
        if ($this->Bahan_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_bahan()
    {
        $id = $this->input->post('id');
        $user = $this->Bahan_model->getBahan($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
