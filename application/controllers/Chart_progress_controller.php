<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart_progress_controller extends CI_Controller
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

        $this->load->view('Chart_progress_produksi');
    }
    public function get_produksi()
    {
        $id = $this->input->post('nama_customer');
        $user = $this->Dashboard_model->getProduksi($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
}
