<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    private $table = 'mesin_jaket';
    private $estimasi = 'estimasi';
    private $pesanan = 'pesanan';
    private $produksi = 'produksi';
    private $progress = 'progress';
    private $penggunaan_bahan = 'penggunaan_bahan';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }


    public function read()
    {
        $this->db->select('*');
        // $this->db->where('role','2');
        return $this->db->get($this->estimasi);
    }
    public function getPenggunaanBahan()
    {
        $this->db->select('penggunaan_bahan.id as idd,penggunaan_bahan.jenis_produk,penggunaan_bahan.nama_bahan,penggunaan_bahan.jumlah_pesanan,penggunaan_bahan.jumlah_bahan,penggunaan_bahan.total_bahan,penggunaan_bahan.status,bahan.id,bahan.nama_bahan as bahann,bahan.jumlah as jumlah,bahan.id as idd_bahan');
        $this->db->from($this->table);
        $this->db->join('bahan', 'penggunaan_bahan.id_bahan = bahan.id');
        // return $this->db->get($this->table);
        return $this->db->get();
    }
    public function get_progress_produksi()
    {
        $this->db->select('produksi.id as idd,produksi.tanggal_order,produksi.dateline,produksi.no_po,produksi.invoice_po,produksi.customer,produksi.tema_design,produksi.jumlah_pesanan,produksi.produk,produksi.bahan,produksi.jumlah_produk,produksi.desain,progress.print as print,progress.cutting as cutting,progress.press as press,progress.jahit as jahit ,progress.overdeck as overdeck,progress.obras as obras,qc.status as qc,produksi.status as status,bahan.id,bahan.nama_bahan as bahann');
        $this->db->from($this->produksi);
        $this->db->join('bahan', 'produksi.id_bahan = bahan.id');
        $this->db->join('progress', 'produksi.id = progress.produksi_id');
        $this->db->join('qc', 'produksi.id = qc.produksi_id');
        // return $this->db->get($this->table);
        return $this->db->get();
    }
    // public function get_progress_produksi()
    // {
    //     $this->db->select('*');
    //     // $this->db->where('role','2');
    //     return $this->db->get($this->produksi);
    // }
    function getUsernames()
    {

        $this->db->select('*');
        // $this->db->where('urutan_order', 'order 1');
        $records = $this->db->get('estimasi');
        $users = $records->result_array();
        return $users;
    }
    function getUsernames2()
    {

        $this->db->select('*');
        // $this->db->where('urutan_order', 'order 1');
        $records = $this->db->get('estimasi');
        $users = $records->result_array();
        return $users;
    }
    function getOrder($urutan_order)
    {

        $this->db->select('*');
        $this->db->where('urutan_order', $urutan_order);
        $records = $this->db->get('estimasi');
        $users = $records->result_array();
        return $users;
        // $this->db->select('*');
        // $this->db->where('urutan_order', $urutan_order);
        // return $this->db->get($this->estimasi);
    }
    function getJadwal()
    {
        $this->db->select('*');
        $records = $this->db->get('pesanan');
        $users = $records->result_array();
        return $users;
    }
    function updateProduksi($data)
    {
        $this->db->where('notifikasi', 1);
        return $this->db->update($this->produksi, $data);
    }
    function updatePenggunaanBahan($data)
    {
        $this->db->where('notifikasi', 2);
        return $this->db->update($this->produksi, $data);
    }
    function getProduksi($nama_customer)
    {
        $this->db->select('*');
        // $this->db->where('urutan_order', "order 4");
        // $this->db->where('customer', $nama_customer);
        return $this->db->get($this->produksi);
    }
    function getProgress($nama_customer)
    {
        $this->db->select('produksi.id as idd,produksi.tanggal_order,produksi.dateline,produksi.no_po,produksi.invoice_po,produksi.customer as customer,produksi.tema_design,produksi.jumlah_pesanan,produksi.produk,produksi.bahan,produksi.jumlah_produk,produksi.desain,progress.print as print,progress.cutting as cutting,progress.press as press,progress.jahit as jahit ,progress.overdeck as overdeck,progress.obras as obras,qc.status as qc,produksi.status as status,bahan.id,bahan.nama_bahan as bahann');
        $this->db->from($this->produksi);
        $this->db->join('bahan', 'produksi.id_bahan = bahan.id');
        $this->db->join('progress', 'progress.produksi_id = produksi.id');
        $this->db->join('qc', 'produksi.id = qc.produksi_id');
        // $this->db->where('customer', "bang rachman");
        $this->db->where('produksi.customer', $nama_customer);
        // return $this->db->get($this->progress);
        return $this->db->get();
    }
}


/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */
