<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progress_controller extends CI_Controller
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

    // public function index()
    // {
    //     $this->load->view('User/user');
    // }
    public function viewPrint()
    {
        $this->load->view('produksi/print');
    }
    public function viewPress()
    {
        $this->load->view('produksi/press');
    }
    public function viewCutting()
    {
        $this->load->view('produksi/cutting');
    }
    public function viewJahit()
    {
        $this->load->view('produksi/jahit');
    }
    // public function read()
    // {
    //     header('Content-type: application/json');
    //     if ($this->User_model->read()->num_rows() > 0) {
    //         // var_dump($this->user_model->read()->result());
    //         foreach ($this->User_model->read()->result() as $user) {
    //             $data[] = array(
    //                 'id' => $this->session->userdata('id'),
    //                 'nama' => $user->nama,
    //                 'username' => $user->username,
    //                 'email' => $user->email,
    //                 'alamat' => $user->alamat,
    //                 'jabatan' => $user->jabatan,
    //                 'divisi' => $user->divisi,
    //                 'action' => '<button class="btn btn-sm btn-success" onclick="edit(' . $user->id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $user->id . ')">Delete</button>'
    //             );
    //         }
    //     } else {
    //         $data = array();
    //     }
    //     $user = array(
    //         'data' => $data
    //     );
    //     echo json_encode($user);
    // }
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
                    'action' => '<button class="btn btn-sm btn-success" onclick="editPrint(' . $print->id . ')">Edit</button>'
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
            // var_dump($data);
            echo json_encode('sukses');
        }
    }
    public function readPress()
    {
        header('Content-type: application/json');
        if ($this->Progress_model->readPress()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->Progress_model->readPress()->result() as $press) {
                $data[] = array(
                    'id' => $press->id,
                    'press' => $press->press,
                    'waktu_press' => $press->waktu_press,
                    'status_press' => $press->status_press,
                    'alasan_press' => $press->alasan_press,
                    'action' => '<button class="btn btn-sm btn-success" onclick="editpress(' . $press->id . ')">Edit</button>'
                );
            }
        } else {
            $data = array();
        }
        $press = array(
            'data' => $data
        );
        echo json_encode($press);
    }
    public function edit_press()
    {
        $id = $this->input->post('id');
        $data = array(
            'press' => $this->input->post('press'),
            // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'waktu_press' => $this->input->post('waktu_press'),
            'status_press' => $this->input->post('status_press'),
            'alasan_press' => $this->input->post('alasan_press')
        );
        if ($this->Progress_model->updatePress($id, $data)) {
            // var_dump($data);
            echo json_encode('sukses');
        }
    }
    public function readCutting()
    {
        header('Content-type: application/json');
        if ($this->Progress_model->readCutting()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->Progress_model->readCutting()->result() as $cutting) {
                $data[] = array(
                    'id' => $cutting->id,
                    'cutting' => $cutting->cutting,
                    'waktu_cutting' => $cutting->waktu_cutting,
                    'status_cutting' => $cutting->status_cutting,
                    'alasan_cutting' => $cutting->alasan_cutting,
                    'action' => '<button class="btn btn-sm btn-success" onclick="editcutting(' . $cutting->id . ')">Edit</button>'
                );
            }
        } else {
            $data = array();
        }
        $cutting = array(
            'data' => $data
        );
        echo json_encode($cutting);
    }
    public function edit_cutting()
    {
        $id = $this->input->post('id');
        $data = array(
            'cutting' => $this->input->post('cutting'),
            // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'waktu_cutting' => $this->input->post('waktu_cutting'),
            'status_cutting' => $this->input->post('status_cutting'),
            'alasan_cutting' => $this->input->post('alasan_cutting')
        );
        if ($this->Progress_model->updateCutting($id, $data)) {
            // var_dump($data);
            echo json_encode('sukses');
        }
    }
    public function readJahit()
    {
        header('Content-type: application/json');
        if ($this->Progress_model->readJahit()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->Progress_model->readJahit()->result() as $jahit) {
                $data[] = array(
                    'id' => $jahit->id,
                    'jahit' => $jahit->jahit,
                    'waktu_jahit' => $jahit->waktu_jahit,
                    'status_jahit' => $jahit->status_jahit,
                    'alasan_jahit' => $jahit->alasan_jahit,
                    'action' => '<button class="btn btn-sm btn-success" onclick="editjahit(' . $jahit->id . ')">Edit</button>'
                );
            }
        } else {
            $data = array();
        }
        $jahit = array(
            'data' => $data
        );
        echo json_encode($jahit);
    }
    public function edit_jahit()
    {
        $id = $this->input->post('id');
        $data = array(
            'jahit' => $this->input->post('jahit'),
            'overdeck' => $this->input->post('overdeck'),
            'obras' => $this->input->post('obras'),
            // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'waktu_jahit' => $this->input->post('waktu_jahit'),
            'status_jahit' => $this->input->post('status_jahit'),
            'waktu_overdeck' => $this->input->post('waktu_jahit'),
            'status_overdeck' => $this->input->post('status_jahit'),
            'waktu_obras' => $this->input->post('waktu_jahit'),
            'status_obras' => $this->input->post('status_jahit'),
            'alasan_jahit' => $this->input->post('alasan_jahit'),
            'alasan_overdeck' => $this->input->post('alasan_jahit'),
            'alasan_obras' => $this->input->post('alasan_jahit'),
        );
        if ($this->Progress_model->updateCutting($id, $data)) {
            // var_dump($data);
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
    public function get_estimasi_press()
    {
        $urutan_order = $this->input->post('urutan_order');
        $user = $this->Progress_model->get_estimasi_press($urutan_order);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_estimasi_cutting()
    {
        $urutan_order = $this->input->post('urutan_order');
        $user = $this->Progress_model->get_estimasi_cutting($urutan_order);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_estimasi_jahit()
    {
        $urutan_order = $this->input->post('urutan_order');
        $user = $this->Progress_model->get_estimasi_jahit($urutan_order);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
