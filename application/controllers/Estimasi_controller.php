<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estimasi_controller extends CI_Controller
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
        $this->load->model('Estimasi_model');
    }

    public function index()
    {
        $this->load->view('Mesin/estimasi');
    }
    public function read()
    {
        $jabatan = $this->session->userdata('jabatan');
        header('Content-type: application/json');
        if ($this->Estimasi_model->read()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->Estimasi_model->read()->result() as $estimasi) {
                $data[] = array(
                    'id' => $estimasi->id,
                    // 'id' => $this->session->userdata('id'),
                    'tanggal_order' => $estimasi->tanggal_order,
                    'urutan_order' => $estimasi->urutan_order,
                    // 'urutan_order' => $estimasi->urutan_order,
                    'print_sebelum' => $estimasi->print_sebelum,
                    'press_sebelum' => $estimasi->press_sebelum,
                    'jahit_sebelum' => $estimasi->jahit_sebelum,
                    'overdeck_sebelum' => $estimasi->overdeck_sebelum,
                    'obras_sebelum' => $estimasi->obras_sebelum,
                    'print_sesudah' => $estimasi->print_sesudah,
                    'press_sesudah' => $estimasi->press_sesudah,
                    'jahit_sesudah' => $estimasi->jahit_sesudah,
                    'overdeck_sesudah' => $estimasi->overdeck_sesudah,
                    'obras_sesudah' => $estimasi->obras_sesudah,
                    'ci' => $estimasi->ci,
                    'dateline' => $estimasi->dateline,
                    'lateness' => $estimasi->lateness,
                    'nj' => $estimasi->nj,
                    'action' => '<button class="btn btn-sm btn-success" onclick="edit(' . $estimasi->id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $estimasi->id . ')">Hapus</button>'
                );
            }
        } else {
            $data = array();
        }
        $estimasi = array(
            'data' => $data
        );
        echo json_encode($estimasi);
    }
    public function add()
    {
        $data = array(
            'tanggal_order' => $this->input->post('tanggal_order'),
            'urutan_order' => $this->input->post('urutan_order'),
            'print_sebelum' => $this->input->post('print_sebelum'),
            'press_sebelum' => $this->input->post('press_sebelum'),
            'press_sebelum' => $this->input->post('press_sebelum'),
            'jahit_sebelum' => $this->input->post('jahit_sebelum'),
            'overdeck_sebelum' => $this->input->post('overdeck_sebelum'),
            'obras_sebelum' => $this->input->post('obras_sebelum'),
            'print_sesudah' => $this->input->post('print_sesudah'),
            'press_sesudah' => $this->input->post('press_sesudah'),
            'press_sesudah' => $this->input->post('press_sesudah'),
            'jahit_sesudah' => $this->input->post('jahit_sesudah'),
            'overdeck_sesudah' => $this->input->post('overdeck_sesudah'),
            'obras_sesudah' => $this->input->post('obras_sesudah'),
            'ci' => $this->input->post('ci'),
            'dateline' => $this->input->post('dateline'),
            'lateness' => $this->input->post('lateness'),
            'nj' => $this->input->post('nj')
        );
        $this->Estimasi_model->create($data);
        echo json_encode('sukses');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->Estimasi_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'tanggal_order' => $this->input->post('tanggal_order'),
            'urutan_order' => $this->input->post('urutan_order'),
            'print_sebelum' => $this->input->post('print_sebelum'),
            'press_sebelum' => $this->input->post('press_sebelum'),
            'press_sebelum' => $this->input->post('press_sebelum'),
            'jahit_sebelum' => $this->input->post('jahit_sebelum'),
            'overdeck_sebelum' => $this->input->post('overdeck_sebelum'),
            'obras_sebelum' => $this->input->post('obras_sebelum'),
            'print_sesudah' => $this->input->post('print_sesudah'),
            'press_sesudah' => $this->input->post('press_sesudah'),
            'press_sesudah' => $this->input->post('press_sesudah'),
            'jahit_sesudah' => $this->input->post('jahit_sesudah'),
            'overdeck_sesudah' => $this->input->post('overdeck_sesudah'),
            'obras_sesudah' => $this->input->post('obras_sesudah'),
            'ci' => $this->input->post('ci'),
            'dateline' => $this->input->post('dateline'),
            'lateness' => $this->input->post('lateness'),
            'nj' => $this->input->post('nj')
        );
        if ($this->Estimasi_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_pesanan()
    {
        $id = $this->input->post('id');
        $user = $this->Estimasi_model->getPesanan($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_all()
    {
        // $id = $this->input->post('id');
        header('Content-type: application/json');
        $urutan_order = $this->input->post('urutan_order');
        $user = $this->Estimasi_model->getAll($urutan_order);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_all2()
    {
        // $id = $this->input->post('id');
        $urutan_order = $this->input->post('urutan_order');
        $user = $this->Estimasi_model->getAll2($urutan_order);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_hitung()
    {
        // $id = $this->input->post('id');
        $urutan_order = $this->input->post('urutan_order');
        $user = $this->Estimasi_model->getHitung($urutan_order);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_hitung2()
    {
        // $id = $this->input->post('id');
        $urutan_order = $this->input->post('urutan_order');
        $user = $this->Estimasi_model->getHitung2($urutan_order);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function chart()
    {
        header('Content-type: application/json');
        $estimasi = $this->Estimasi_model->getEstimasi();
        // if ($estimasi->row()) {
        // echo json_encode($estimasi->row());
        echo json_encode($estimasi);
        // }
    }
}
