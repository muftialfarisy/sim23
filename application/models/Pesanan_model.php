<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{

    private $table = 'pesanan';
    private $rata = 'rata_mesin_jersey';
    private $sorting = 'mesin_sorting';
    private $mesin = 'mesin_jersey';
    private $mesin_jaket = 'mesin_jaket';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function create_order($order)
    {
        return $this->db->insert($this->mesin, $order);
    }
    public function create_order_jaket($order)
    {
        return $this->db->insert($this->mesin_jaket, $order);
    }
    public function create_sorting($sorting)
    {
        return $this->db->insert($this->sorting, $sorting);
    }

    public function read()
    {
        // $this->db->where('role','2');
        return $this->db->get($this->table);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    public function update_jersey($urutan_order, $order)
    {
        $this->db->where('urutan_order', $urutan_order);
        return $this->db->update($this->mesin, $order);
    }
    public function update_jaket($urutan_order, $order)
    {
        $this->db->where('urutan_order', $urutan_order);
        return $this->db->update($this->mesin_jaket, $order);
    }
    public function update_shorting($urutan_order, $sorting)
    {
        $this->db->where('urutan_order', $urutan_order);
        return $this->db->update($this->sorting, $sorting);
    }


    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
    public function delete_jersey($urutan_order)
    {
        $this->db->where('urutan_order', $urutan_order);
        return $this->db->delete($this->mesin);
    }
    public function delete_jaket($urutan_order)
    {
        $this->db->where('urutan_order', $urutan_order);
        return $this->db->delete($this->mesin_jaket);
    }
    public function delete_shorting($urutan_order)
    {
        $this->db->where('urutan_order', $urutan_order);
        return $this->db->delete($this->sorting);
    }
    // public function delete($id)
    // {
    //     $this->db->where('id', $id);
    //     return $this->db->delete($this->table);
    // }

    public function getMesin()
    {
        $this->db->select('*');
        // $this->db->order_by('id', 'DESC');
        $this->db->where('NO', 9);
        // $this->db->where('NO', 9);
        // $this->db->limit(1);
        return $this->db->get($this->rata);
    }
    public function getMesinJaket()
    {
        $this->db->select('*');
        // $this->db->order_by('id', 'DESC');
        $this->db->where('NO', 10);
        // $this->db->where('NO', 9);
        // $this->db->limit(1);
        return $this->db->get($this->rata);
    }

    public function getJersey()
    {
        // $this->db->select('pesanan.id as idd,pesanan.urutan_order,pesanan.nama_pelanggan,pesanan.tema_desain,pesanan.tanggal_pesanan,pesanan.invoice,pesanan.produk,pesanan.jumlah,pesanan.bahan_baku,pesanan.dateline,pesanan.finishing,mesin_jersey.total_cutting,mesin_jersey.total_qc,mesin_jersey.waktu_total,mesin_sorting.printer,mesin_sorting.press,mesin_sorting.jahit,mesin_sorting.overdeck,mesin_sorting.obras');
        $this->db->select('mesin_jersey.*,mesin_sorting.*,rata_mesin_jersey.*');
        // $this->db->where('pesanan.id', $id);
        $this->db->where('rata_mesin_jersey.NO', 9);
        $this->db->from($this->mesin);
        // $this->db->join('mesin_jersey', 'pesanan.urutan_order = mesin_jersey.urutan_order');
        $this->db->join('mesin_sorting', 'mesin_jersey.urutan_order = mesin_sorting.urutan_order');
        $this->db->join('rata_mesin_jersey', 'mesin_jersey.NO = rata_mesin_jersey.NO');
        // return $this->db->get($this->table);
        return $this->db->get();
    }
    public function getJaket()
    {
        // $this->db->select('pesanan.id as idd,pesanan.urutan_order,pesanan.nama_pelanggan,pesanan.tema_desain,pesanan.tanggal_pesanan,pesanan.invoice,pesanan.produk,pesanan.jumlah,pesanan.bahan_baku,pesanan.dateline,pesanan.finishing,mesin_jersey.total_cutting,mesin_jersey.total_qc,mesin_jersey.waktu_total,mesin_sorting.printer,mesin_sorting.press,mesin_sorting.jahit,mesin_sorting.overdeck,mesin_sorting.obras');
        $this->db->select('mesin_jaket.*,mesin_sorting.*,rata_mesin_jersey.*');
        $this->db->where('rata_mesin_jersey.NO', 10);
        $this->db->from($this->mesin_jaket);
        // $this->db->where('pesanan.id', $id);
        // $this->db->join('mesin_jaket', 'pesanan.urutan_order = mesin_jaket.urutan_order');
        $this->db->join('mesin_sorting', 'mesin_jaket.urutan_order = mesin_sorting.urutan_order');
        $this->db->join('rata_mesin_jersey', 'mesin_jaket.NO = rata_mesin_jersey.NO');
        // return $this->db->get($this->table);
        return $this->db->get();
    }
    public function getPesanan($id)
    {
        // $this->db->select('*');
        $this->db->where('id', $id);
        return $this->db->get($this->table);
    }

    public function search($search = "")
    {
        $this->db->like('kategori', $search);
        return $this->db->get($this->table)->result();
    }
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */