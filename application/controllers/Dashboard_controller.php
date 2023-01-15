<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller
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
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $mesin_jaket = $this->Dashboard_model->getUsernames2();

        $data['mesin_jaket'] = $mesin_jaket;

        $this->load->view('Dashboard', $data);
        // $this->load->view('Dashboard');
        // echo ($data->result());
    }
    // public function read()
    // {
    //     header('Content-type: application/json');
    //     foreach ($this->Dashboard_model->read()->result() as $dashboard) {
    //         $data[] = array(
    //             'id' => $dashboard->id,
    //             'urutan_order' => $dashboard->urutan_order,
    //         );
    //     }
    //     $dashboard = array(
    //         'data' => $data
    //     );
    //     echo json_encode($dashboard);
    // }
    public function read()
    {
        header('Content-type: application/json');
        $estimasi = $this->Dashboard_model->getUsernames();
        // if ($estimasi->row()) {
        // echo json_encode($estimasi->row());
        echo json_encode($estimasi);
        // }
    }
    public function jadwal()
    {
        header('Content-type: application/json');
        $estimasi2 = $this->Dashboard_model->getJadwal();

        echo json_encode($estimasi2);
        // }
    }
    public function order()
    {
        header('Content-type: application/json');
        $urutan_order = $this->input->post('urutan_order');
        $estimasi = $this->Dashboard_model->getOrder($urutan_order);
        echo json_encode($estimasi);
    }
    // public function order()
    // {
    //     header('Content-type: application/json');
    //     $urutan_order = $this->input->post('urutan_order');
    //     $estimasi = $this->Dashboard_model->getOrder($urutan_order);
    //     if ($estimasi->row()) {
    //         echo json_encode($estimasi->row());
    //         // echo json_encode($estimasi->result());
    //     }
    // }
}
