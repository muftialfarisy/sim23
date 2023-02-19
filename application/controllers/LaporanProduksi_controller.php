<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanProduksi_controller extends CI_Controller
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
        $this->load->model('LaporanProduksi_model');
    }

    public function index()
    {
        $this->load->view('Produksi/laporan_produksi');
    }
    public function read()
    {
        header('Content-type: application/json');
        $jabatan = $this->session->userdata('jabatan');
        if ($this->LaporanProduksi_model->read()->num_rows() > 0) {
            // var_dump($this->user_model->read()->result());
            foreach ($this->LaporanProduksi_model->read()->result() as $produksi) {
                $id = $produksi->idd;
                $tanggal = new DateTime($produksi->tanggal_order);
                $dateline = new DateTime($produksi->dateline);
                $get_status = $produksi->status;
                if ($get_status == "Belum Dikerjakan") {
                    $status = "Belum Dikerjakan";
                } else if ($get_status == "Dikerjakan") {
                    $status = '<p style ="color: blue">Dikerjakan</p>';
                } else if ($get_status == "Tepat Waktu") {
                    $status = '<p style ="color: green";>Tepat Waktu</p>';
                } else if ($get_status == "Terlambat") {
                    $status = '<p style ="color: red";>Terlambat</p>';
                }
                if ($jabatan == "operasional_produksi") {
                    $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $produksi->idd . ')">Edit</button>';
                } else if ($jabatan == "kepala_produksi") {
                    $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $produksi->idd . ')"hidden>Edit</button> <a class="btn btn-sm btn-success" target="_blank" rel="noopener noreferrer" href="' . site_url('LaporanProduksi_controller/detail/') . $produksi->idd . '">Detail</a>';
                    // $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $produksi->idd . ')"hidden>Edit</button> <button class="btn btn-sm btn-success"><a href="produksi_detail" style="color:white;" onclick="detail(' . $produksi->idd . ')">Detail</a></button>';
                } else {
                    $action = '<button class="btn btn-sm btn-success" onclick="edit(' . $produksi->idd . ')"hidden>Edit</button>';
                }
                $desain = $produksi->desain;
                if ($desain == 100) {
                    $status_desain = "Selesai Dikerjakan";
                };
                $data[] = array(
                    'id' => $produksi->id,
                    // 'id' => $this->session->userdata('id'),
                    'tanggal_order' => $tanggal->format('d-m-Y'),
                    'dateline' => $dateline->format('d-m-Y'),
                    'no_po' => $produksi->no_po,
                    'invoice_po' => $produksi->invoice_po,
                    'customer' => $produksi->customer,
                    'tema_design' => $produksi->tema_design,
                    'jumlah_pesanan' => $produksi->jumlah_pesanan,
                    'produk' => $produksi->produk,
                    'bahan' => $produksi->bahann,
                    'jumlah_produk' => $produksi->jumlah_produk,
                    'desain' => $status_desain,
                    'print' => $produksi->print,
                    'cutting' => $produksi->cutting,
                    'press' => $produksi->press,
                    'jahit' => $produksi->jahit,
                    'overdeck' => $produksi->overdeck,
                    'obras' => $produksi->obras,
                    'qc' => $produksi->qc,
                    'status' => $status,
                    // 'status' => $produksi->status,
                    'action' => $action
                    // 'action' => '<button class="btn btn-sm btn-success" onclick="edit(' . $id . ')">Edit</button> <button class="btn btn-sm btn-danger" onclick="remove(' . $id . ')">Delete</button>'
                );
            }
        } else {
            $data = array();
        }
        $produksi = array(
            'data' => $data
        );
        echo json_encode($produksi);
    }
    public function viewDetail()
    {
        $this->load->view('Produksi/laporan_produksi_detail');
    }
    public function add()
    {
        $data = array(
            'id_bahan' => $this->input->post('bahan'),
            'tanggal_order' => $this->input->post('tanggal_order'),
            'dateline' => $this->input->post('dateline'),
            'no_po' => $this->input->post('no_po'),
            'invoice_po' => $this->input->post('invoice_po'),
            'customer' => $this->input->post('customer'),
            'tema_design' => $this->input->post('tema_design'),
            'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            'produk' => $this->input->post('produk'),
            'bahan' => $this->input->post('bahan'),
            'jumlah_produk' => $this->input->post('jumlah_produk'),
        );
        $this->LaporanProduksi_model->create($data);
        echo json_encode('sukses');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->LaporanProduksi_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            // 'id_bahan' => $this->input->post('bahan'),
            // 'tanggal_order' => $this->input->post('tanggal_order'),
            // 'dateline' => $this->input->post('dateline'),
            // 'no_po' => $this->input->post('no_po'),
            // 'invoice_po' => $this->input->post('invoice_po'),
            // 'customer' => $this->input->post('customer'),
            // 'tema_design' => $this->input->post('tema_design'),
            // 'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
            // 'produk' => $this->input->post('produk'),
            // 'bahan' => $this->input->post('bahan'),
            // 'jumlah_produk' => $this->input->post('jumlah_produk'),
            // 'desain' => $this->input->post('desain'),
            // 'print' => $this->input->post('print'),
            // 'cutting' => $this->input->post('cutting'),
            // 'press' => $this->input->post('press'),
            // 'jahit' => $this->input->post('jahit'),
            // 'overdeck' => $this->input->post('overdeck'),
            // 'obras' => $this->input->post('obras'),
            // 'qc' => $this->input->post('qc'),
            'status' => $this->input->post('status'),

        );
        if ($this->LaporanProduksi_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function get_produksi()
    {
        $id = $this->input->post('id');
        $user = $this->LaporanProduksi_model->getProduksi($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_bahan()
    {
        $id = $this->input->post('id');
        $bahan = $this->input->post('bahan');
        $user = $this->LaporanProduksi_model->getBahan($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_bahann()
    {
        $id = $this->input->post('id');
        // $bahan = $this->input->post('bahan');
        $user = $this->LaporanProduksi_model->getBahann($id);
        // $user = $this->Produksi_model->getBahann($bahan);
        // $user = $this->Produksi_model->getBahann($id, $bahan);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function get_detail()
    {
        $user = $this->LaporanProduksi_model->get_detail();
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }
    public function detail($id)
    {
        // $where = implode(',', $barcode);
        // $produk = $this->db->query("select * from produk where id='$id'")->row();
        $produk = $this->LaporanProduksi_model->get_detail($id);
        $desain =  $produk->desain;
        $print =  $produk->print;
        if ($print == "Selesai Dikerjakan") {
            $total_print = 100;
        } else if ($print == "Sedang Dikerjakan") {
            $total_print = 50;
        } else {
            $total_print = 0;
        }
        $press =  $produk->press;
        if ($press == "Selesai Dikerjakan") {
            $total_press = 100;
        } else if ($press == "Sedang Dikerjakan") {
            $total_press = 50;
        } else {
            $total_press = 0;
        }
        $cutting =  $produk->cutting;
        if ($cutting == "Selesai Dikerjakan") {
            $total_cutting = 100;
        } else if ($cutting == "Sedang Dikerjakan") {
            $total_cutting = 50;
        } else {
            $total_cutting = 0;
        }
        $jahit =  $produk->jahit;
        if ($jahit == "Selesai Dikerjakan") {
            $total_jahit = 100;
        } else if ($jahit == "Sedang Dikerjakan") {
            $total_jahit = 50;
        } else {
            $total_jahit = 0;
        }
        $overdeck =  $produk->overdeck;
        if ($overdeck == "Selesai Dikerjakan") {
            $total_overdeck = 100;
        } else if ($overdeck == "Sedang Dikerjakan") {
            $total_overdeck = 50;
        } else {
            $total_overdeck = 0;
        }
        $obras =  $produk->obras;
        if ($obras == "Selesai Dikerjakan") {
            $total_obras = 100;
        } else if ($obras == "Sedang Dikerjakan") {
            $total_obras = 50;
        } else {
            $total_obras = 0;
        }
        if ($desain == 100) {
            $status_desain = "Selesai Dikerjakan";
        }
        $qc = $produk->status_qc;
        if ($qc == "diterima") {
            $total_qc = 100;
        } else if ($qc == "Sedang Dikerjakan") {
            $total_qc = 50;
        } else {
            $total_qc = 0;
        }
        $progress = ((int) $desain +  $total_print +  $total_cutting +  $total_press + $total_jahit +  $total_overdeck +  $total_obras +  $total_qc) / 8;
        $data = array(
            'tanggal_order' => $produk->tanggal_order,
            'dateline' => $produk->dateline,
            'no_po' => $produk->no_po,
            'invoice_po' => $produk->invoice_po,
            'customer' => $produk->customer,
            'tema_design' => $produk->tema_design,
            'produk' => $produk->produk,
            'bahan' => $produk->bahan,
            'jumlah_produk' => $produk->jumlah_produk,
            'status' => $produk->status,
            'desain' => $status_desain,
            'desain2' => $produk->desain,
            'print' => $produk->print,
            'cutting' => $produk->cutting,
            'press' => $produk->press,
            'jahit' => $produk->jahit,
            'overdeck' => $produk->overdeck,
            'obras' => $produk->obras,
            // 'waktu_desain' => $produk->waktu_desain,
            'waktu_print' => $produk->waktu_print,
            'waktu_press' => $produk->waktu_press,
            'waktu_cutting' => $produk->waktu_cutting,
            'waktu_jahit' => $produk->waktu_jahit,
            'waktu_overdeck' => $produk->waktu_overdeck,
            'waktu_obras' => $produk->waktu_obras,
            // 'status_desain' => $produk->status_desain,
            'status_print' => $produk->status_print,
            'status_press' => $produk->status_press,
            'status_cutting' => $produk->status_cutting,
            'status_jahit' => $produk->status_jahit,
            'status_overdeck' => $produk->status_overdeck,
            'status_obras' => $produk->status_obras,
            // 'alasan_desain' => $produk->alasan_desain,
            'alasan_print' => $produk->alasan_print,
            'alasan_press' => $produk->alasan_press,
            'alasan_cutting' => $produk->alasan_cutting,
            'alasan_jahit' => $produk->alasan_jahit,
            'alasan_overdeck' => $produk->alasan_overdeck,
            'alasan_obras' => $produk->alasan_obras,
            'alasan_qc' => $produk->alasan_qc,
            'qc_desain' => $produk->qc_desain,
            'qc_print' => $produk->qc_print,
            'qc_press' => $produk->qc_press,
            'qc_cutting' => $produk->qc_cutting,
            'qc_jahit' => $produk->qc_jahit,
            'qc_overdeck' => $produk->qc_overdeck,
            'qc_obras' => $produk->qc_obras,
            'status_qc' => $produk->status_qc,
            'jumlah_diterima' => $produk->jumlah_diterima,
            'jumlah_ditolak' => $produk->jumlah_ditolak,
            'progress' => $progress,
            'total_print' => $total_print,
            'total_press' => $total_press,
            'total_cutting' => $total_cutting,
            'total_jahit' => $total_jahit,
            'total_overdeck' => $total_overdeck,
            'total_obras' => $total_obras,
            'total_qc' => $total_qc,

        );
        $this->load->view('Produksi/laporan_produksi_detail', $data);
        // $this->load->view('includes/Script');
    }
}
