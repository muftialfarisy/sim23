<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Print_controller extends CI_Controller
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
        $this->load->model('Progress_model');
    }


    public function index()
    {
        $this->load->view('produksi/print');
    }
    public function readPrint()
    {
        header('Content-type: application/json');
        if ($this->Progress_model->readPrint()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->Progress_model->readPrint()->result() as $print) {
                $data[] = array(
                    'id' => $print->id,
                    'print' => $print->print,
                    'waktu_print' => $print->waktu_print,
                    'status_print' => $print->status_print,
                    'alasan_print' => $print->alasan_print,
                    'action' => '<button class="btn btn-sm btn-success" onclick="editPrint(' . $print->id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $print->id . ')">Hapus</button>'
                );
            }
        } else {
            $data = array();
        }
        $print = array(
            'data' => $data
        );
        echo json_encode($print);
    }
    public function add()
    {

        $username = $this->input->post('username');
        $validasi = $this->User_model->getUsername($username);
        if ($validasi->num_rows() > 0) {
            echo json_encode(array("error" => "Username Sudah Ada!!"));
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'jabatan' => $this->input->post('jabatan'),
                'divisi' => $this->input->post('divisi')
            );
            $this->User_model->create($data);
            echo json_encode('sukses');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->User_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit_print()
    {
        $id = $this->input->post('id');
        $data = array(
            'print' => $this->input->post('print'),
            // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'waktu_print' => $this->input->post('waktu_print'),
            'status_print' => $this->input->post('status_print'),
            'alasan_print' => $this->input->post('alasan_print')
        );
        if ($this->Progress_model->updatePrint($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_user()
    {
        $id = $this->input->post('id');
        $user = $this->Progress_model->getUser($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_estimasi_print()
    {
        $urutan_order = $this->input->post('urutan_order');
        $user = $this->Progress_model->get_estimasi_print($urutan_order);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
