<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
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
                $this->load->view('Login/login');
            } else {
                redirect('dashboard');
            }
        }
    }
    public function lupapassview()
    {
        $this->load->view('Login/forgot');
    }
    public function lupapass()
    {
        $email = $this->input->post('email');
        if ($this->Login_model->getEmail($email)->num_rows() > 0) {
            $data = array(
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            );
            if ($this->Login_model->update($email, $data)) {
                echo json_encode('sukses');
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