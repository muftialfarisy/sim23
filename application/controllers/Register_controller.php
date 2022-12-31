<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model');
    }

    // public function landing_page()
    // {
    //     $this->load->view('/landing_page');
    // }
    public function login()
    {
        if ($this->input->post('username')) {
            $username = $this->input->post('username');
            if ($this->Login_model->getUser($username)->num_rows() > 0) {
                $data = $this->Login_model->getUser($username)->row();
                if (password_verify($this->input->post('password'), $data->password)) {
                    $userdata = array(
                        'id' => $data->id,
                        'username' => $data->username,
                        'password' => $data->password,
                        'nama' => $data->nama,
                        'email' => $data->email,
                        'status' => true,
                        'jabatan' => $data->jabatan
                    );
                    $this->session->set_userdata($userdata);
                    echo json_encode('sukses');
                } else {
                    echo json_encode('passwordsalah');
                }
            } else {
                echo json_encode('tidakada');
            }
        } else {
            if (!$this->session->userdata('status')) {
                // $this->load->view('layout/user/header');
                // $this->load->view('layout/user/footer');
                $this->load->view('Login/login');
            } else {
                redirect('dashboard');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('login');
    }
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */