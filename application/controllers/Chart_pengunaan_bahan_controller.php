<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart_pengunaan_bahan_controller extends CI_Controller
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
        $penggunaan_bahan = $this->Dashboard_model->getPenggunaanBahan();

        $penggunaan_bahan['penggunaan_bahan'] = $penggunaan_bahan;

        $this->load->view('Chart_penggunaan_bahan', $penggunaan_bahan);
    }
}
