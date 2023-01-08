<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mesin_controller extends CI_Controller
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
        $this->load->model('Mesin_model');
    }

    public function index()
    {
        $this->load->view('Mesin/mesin');
    }
    public function read()
    {
        $jabatan = $this->session->userdata('jabatan');
        header('Content-type: application/json');
        if ($this->Mesin_model->read()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->Mesin_model->read()->result() as $mesin) {
                $data[] = array(
                    'id' => $mesin->id,
                    // 'id' => $this->session->userdata('id'),
                    'desain' => $mesin->desain,
                    'print' => $mesin->print,
                    'cutting' => $mesin->cutting,
                    'press' => $mesin->press,
                    'jahit' => $mesin->jahit,
                    'overdeck' => $mesin->overdeck,
                    'obras' => $mesin->obras,
                    'qc' => $mesin->qc,
                    'total_cutting' => $mesin->total_cutting,
                    'total_qc' => $mesin->total_qc,
                    'waktu_total' => $mesin->waktu_total,
                    'action' => '<button class="btn btn-sm btn-success" onclick="edit(' . $mesin->id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $mesin->id . ')">Delete</button>'
                );
            }
        } else {
            $data = array();
        }
        $mesin = array(
            'data' => $data
        );
        echo json_encode($mesin);
    }
    public function add()
    {


        $data = array(
            'desain' => $this->input->post('desain'),
            'print' => $this->input->post('print'),
            'cutting' => $this->input->post('cutting'),
            'cutting' => $this->input->post('cutting'),
            'press' => $this->input->post('press'),
            'jahit' => $this->input->post('jahit'),
            'overdeck' => $this->input->post('overdeck'),
            'obras' => $this->input->post('obras'),
            'qc' => $this->input->post('qc'),
            // 'total_cutting' => $this->input->post('total_cutting'),
            // 'total_qc' => $this->input->post('total_qc'),
            // 'waktu_total' => $this->input->post('waktu_total')
        );
        $rata = array(
            'NO' => 9,
            'desain' => $this->input->post('rata_desain'),
            'print' => $this->input->post('rata_print'),
            'cutting' => $this->input->post('rata_cutting'),
            'cutting' => $this->input->post('rata_cutting'),
            'press' => $this->input->post('rata_press'),
            'jahit' => $this->input->post('rata_jahit'),
            'overdeck' => $this->input->post('rata_overdeck'),
            'obras' => $this->input->post('rata_obras'),
            'qc' => $this->input->post('rata_qc'),
        );
        if (($this->Mesin_model->create($data)) && ($this->Mesin_model->create_rata($rata))) {
            echo json_encode('sukses');
        }
        // $this->Mesin_model->create($data);
        // echo json_encode('sukses');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->Mesin_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'desain' => $this->input->post('desain'),
            'print' => $this->input->post('print'),
            'cutting' => $this->input->post('cutting'),
            'cutting' => $this->input->post('cutting'),
            'press' => $this->input->post('press'),
            'jahit' => $this->input->post('jahit'),
            'overdeck' => $this->input->post('overdeck'),
            'obras' => $this->input->post('obras'),
            'qc' => $this->input->post('qc'),
            'total_cutting' => $this->input->post('total_cutting'),
            'total_qc' => $this->input->post('total_qc'),
            'waktu_total' => $this->input->post('waktu_total')
        );
        if ($this->Mesin_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_mesin()
    {
        $id = $this->input->post('id');
        $user = $this->Mesin_model->getMesin($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_rata()
    {
        $id = $this->input->post('id');
        $user = $this->Mesin_model->getRata($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
