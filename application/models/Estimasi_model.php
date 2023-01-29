<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estimasi_model extends CI_Model
{

    private $table = 'estimasi';
    private $sorting = 'mesin_sorting';
    private $jersey = 'mesin_jersey';
    private $jaket = 'mesin_jaket';
    private $pesanan = 'pesanan';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
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

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    // public function getAll($urutan_order)
    // {
    //     $this->db->select('*');
    //     $this->db->where('urutan_order', $urutan_order);
    //     // return $this->db->get();
    //     return $this->db->get($this->pesanan);
    // }
    public function getAll($urutan_order)
    {
        $this->db->select('*,pesanan.produk as produk');
        // $this->db->select('estimasi.tanggal_order,estimasi.urutan_order,estimasi.print_sebelum,mesin_sorting.printer as mesin_printer');
        // $this->db->where('id', $id);
        // $this->db->from($this->sorting);
        $this->db->join('pesanan', 'mesin_sorting.urutan_order = pesanan.urutan_order');
        $this->db->where('mesin_sorting.urutan_order', $urutan_order);
        // return $this->db->get();
        return $this->db->get($this->sorting);
    }
    public function getAll2($urutan_order)
    {
        $this->db->select('*');
        // $this->db->select('estimasi.tanggal_order,estimasi.urutan_order,estimasi.print_sebelum,mesin_sorting.printer as mesin_printer');
        // $this->db->where('id', $id);
        // $this->db->from($this->sorting);
        // $this->db->join('mesin_sorting', 'estimasi.urutan_order = mesin_sorting.urutan_order');
        // $this->db->where('urutan_order', $urutan_order);
        // return $this->db->get();
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get($this->table);
    }
    public function getHitung($urutan_order)
    {
        $this->db->select('*');
        $this->db->where('urutan_order', $urutan_order);
        return $this->db->get($this->jersey);
    }
    public function getHitung2($urutan_order)
    {
        $this->db->select('*');
        // $this->db->where('urutan_order', "order 4");
        $this->db->where('urutan_order', $urutan_order);
        return $this->db->get($this->jaket);
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
        function getEstimasi()
    {

        $this->db->select('*');
        // $this->db->where('urutan_order', 'order 1');
        $records = $this->db->get('estimasi');
        $users = $records->result_array();
        return $users;
    }
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */