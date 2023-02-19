<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qc_controller extends CI_Controller
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
        $this->load->model('Qc_model');
    }

    public function index()
    {
        $this->load->view('Produksi/qc');
    }
    public function read()
    {
        header('Content-type: application/json');
        if ($this->Qc_model->read()->num_rows() > 0) {
            // var_dump($this->Qc_model->read()->result());
            foreach ($this->Qc_model->read()->result() as $qc) {
                $data[] = array(
                    'id' => $qc->id,
                    'no_po' => $qc->no_po,
                    'customer' => $qc->customer,
                    'tema_design' => $qc->tema_design,
                    'desain' => $qc->desain,
                    'print' => $qc->print,
                    'cutting' => $qc->cutting,
                    'press' => $qc->press,
                    'jahit' => $qc->jahit,
                    'overdeck' => $qc->overdeck,
                    'obras' => $qc->obras,
                    'jumlah_diterima' => $qc->jumlah_diterima,
                    'jumlah_ditolak' => $qc->jumlah_ditolak,
                    'alasan' => $qc->alasan,
                    'status' => $qc->status,
                    'action' => ' <button class="btn btn-sm btn-success" onclick="edit(' . $qc->idd . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $qc->id . ')">Hapus</button>'
                );
            }
        } else {
            $data = array();
        }
        $qc = array(
            'data' => $data
        );
        echo json_encode($qc);
    }
    public function add()
    {


        $data = array(
            'produksi_id' => $this->input->post('produksi_id'),
            'desain' => $this->input->post('desain'),
            'print' => $this->input->post('print'),
            'cutting' => $this->input->post('cutting'),
            'press' => $this->input->post('press'),
            'jahit' => $this->input->post('jahit'),
            'obras' => $this->input->post('obras'),
            'overdeck' => $this->input->post('overdeck'),
            'jumlah_diterima' => $this->input->post('jumlah_diterima'),
            'jumlah_ditolak' => $this->input->post('jumlah_ditolak'),
            'alasan' => $this->input->post('alasan'),
            'status' => $this->input->post('status')
        );
        $this->Qc_model->create($data);
        echo json_encode('sukses');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->Qc_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'produksi_id' => $this->input->post('produksi_id'),
            'desain' => $this->input->post('desain'),
            'print' => $this->input->post('print'),
            'cutting' => $this->input->post('cutting'),
            'press' => $this->input->post('press'),
            'jahit' => $this->input->post('jahit'),
            'obras' => $this->input->post('obras'),
            'overdeck' => $this->input->post('overdeck'),
            'jumlah_diterima' => $this->input->post('jumlah_diterima'),
            'jumlah_ditolak' => $this->input->post('jumlah_ditolak'),
            'alasan' => $this->input->post('alasan'),
            'status' => $this->input->post('status')
        );
        if ($this->Qc_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_user()
    {
        $id = $this->input->post('id');
        $user = $this->Qc_model->getUser($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
