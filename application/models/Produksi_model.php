<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi_model extends CI_Model
{

    private $table = 'produksi';
    private $pesanan = 'pesanan';
    private $bahan = 'bahan';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function read()
    {
        $this->db->select('produksi.id as idd,produksi.tanggal_order,produksi.dateline,produksi.no_po,produksi.invoice_po,produksi.customer,produksi.tema_design,produksi.jumlah_pesanan,produksi.produk,produksi.bahan,produksi.jumlah_produk,produksi.urutan_order,bahan.id,bahan.nama_bahan as bahann,pesanan.xs,pesanan.s,pesanan.m,pesanan.l,pesanan.xl,pesanan.xxl');
        $this->db->from($this->table);
        $this->db->join('bahan', 'produksi.id_bahan = bahan.id');
        $this->db->join('pesanan', 'produksi.invoice_po = pesanan.no_po');
        // return $this->db->get($this->table);
        return $this->db->get();
    }
    // public function read()
    // {
    //     // $this->db->where('role','2');
    //     return $this->db->get($this->table);
    // }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
    public function getProduksi($id)
    {
        // $this->db->select('*');
        $this->db->where('id', $id);
        return $this->db->get($this->table);
    }
    public function getPesanan($no_po)
    {
        // $this->db->select('*');
        $this->db->where('no_po', $no_po);
        return $this->db->get($this->pesanan);
    }
    public function getBahan($id)
    {
        $this->db->select('*');
        $this->db->join('bahan', 'bahan.id = produksi.id_bahan');
        $this->db->where('produksi.id', $id);
        return $this->db->get($this->table);
    }
    public function getBahann($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        // $this->db->where('nama_bahan', $bahan);
        return $this->db->get($this->bahan);
    }
    // public function getBahan($id)
    // {
    //     // $this->db->select('*');
    //     $this->db->where('id', $id);
    //     return $this->db->get($this->table);
    // }

    public function search($search = "")
    {
        $this->db->like('kategori', $search);
        return $this->db->get($this->table)->result();
    }
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */
