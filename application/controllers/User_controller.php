<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_controller extends CI_Controller
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
        $this->load->model('User_model');
    }

    public function index()
    {
        $this->load->view('User/user');
    }
    public function read()
    {
        header('Content-type: application/json');
        if ($this->User_model->read()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->User_model->read()->result() as $user) {
                $data[] = array(
                    'id' => $this->session->userdata('id'),
                    'nama' => $user->nama,
                    'username' => $user->username,
                    'email' => $user->email,
                    'alamat' => $user->alamat,
                    'jabatan' => $user->jabatan,
                    'divisi' => $user->divisi,
                    'action' => '<button class="btn btn-sm btn-success" onclick="edit(' . $user->id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $user->id . ')">Delete</button>'
                );
            }
        } else {
            $data = array();
        }
        $user = array(
            'data' => $data
        );
        echo json_encode($user);
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
    // public function add()
    // {
    //     $data = array(
    //         'username' => $this->input->post('username'),
    //         'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    //         'nama' => $this->input->post('nama'),
    //         'email' => $this->input->post('email'),
    //         'jabatan' => $this->input->post('jabatan')
    //     );
    //     if ($this->User_model->create($data)) {
    //         echo json_encode('sukses');
    //     }
    // }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->User_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'username' => $this->input->post('username'),
            // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'jabatan' => $this->input->post('jabatan')
        );
        if ($this->User_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_user()
    {
        $id = $this->input->post('id');
        $user = $this->User_model->getUser($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
