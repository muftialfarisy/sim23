<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desain_controller extends CI_Controller
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
        $this->load->model('Desain_model');
    }

    public function index()
    {
        $this->load->view('Produksi/desain');
    }
    public function read()
    {
        header('Content-type: application/json');
        if ($this->Desain_model->read()->num_rows() > 0) {
            // var_dump($this->Desain_model->read()->result());
            foreach ($this->Desain_model->read()->result() as $desain) {
                $data[] = array(
                    'id' => $desain->id,
                    'no_po' => $desain->no_po,
                    'customer' => $desain->customer,
                    'tema_design' => $desain->tema_design,
                    'gambar_desain' => $desain->gambar_desain,
                    'action' => '<button class="btn btn-sm btn-success" onclick="edit(' . $desain->id . ')">Tambah Gambar</button>'
                );
            }
        } else {
            $data = array();
        }
        $desain = array(
            'data' => $data
        );
        echo json_encode($desain);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->Desain_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $id2 = str_replace('.', '', $id);
        $nama = str_replace('.', '', $this->input->post('customer'));
        $config['upload_path']   = FCPATH . '/design/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; //mencegah upload backdor
        $config['max_size']      = '10000';
        $config['max_width']     = '5000';
        $config['max_height']    = '5000';
        $config['file_name']     = $nama;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('userfile')) {
            // saat gagal, tampilkan pesan error
            $gambar = $this->upload->data();
            $data = array(
                'gambar_desain' => $gambar['file_name']
            );
            $progress = array(
                'produksi_id' =>  $this->input->post('id')
            );
            $cek = $this->Desain_model->getImage($id)->row();
            if ($cek == null) {
                // $this->Desain_model->update($id, $data);
                // echo json_encode('sukses');
                if ($this->Desain_model->update($id, $data) && $this->Desain_model->addProgress($progress)) {
                    echo json_encode('sukses');
                }
                // var_dump("berhasil");
            } else {
                //hapus gambar yg ada diserver
                array_map('unlink', glob(FCPATH . "design/$cek->gambar_desain"));
                if ($this->Desain_model->update($id, $data)) {
                    echo json_encode('sukses');
                }
                // $this->Desain_model->update($id, $data);
                // echo json_encode('sukses ubah gambar');
                // var_dump("gagal");
            }
        }
        // else {
        //     echo json_encode('gagal');
        // }
    }
    public function get_user()
    {
        $id = $this->input->post('id');
        $user = $this->Desain_model->getUser($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
