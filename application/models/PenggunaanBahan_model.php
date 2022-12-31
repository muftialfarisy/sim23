<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaanBahan_model extends CI_Model
{

    private $table = 'penggunaan_bahan';
    private $bahan = 'bahan';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function read()
    {
        $this->db->select('penggunaan_bahan.id as idd,penggunaan_bahan.jenis_produk,penggunaan_bahan.nama_bahan,penggunaan_bahan.jumlah_pesanan,penggunaan_bahan.jumlah_bahan,penggunaan_bahan.total_bahan,penggunaan_bahan.status,bahan.id,bahan.nama_bahan as bahann,bahan.jumlah as jumlah,bahan.id as idd_bahan');
        $this->db->from($this->table);
        $this->db->join('bahan', 'penggunaan_bahan.id_bahan = bahan.id');
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
    public function update_bahan($id_bahan, $bahan)
    {
        $this->db->where('id', $id_bahan);
        return $this->db->update($this->bahan, $bahan);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
    public function getBahan($id)
    {
        // $this->db->select('penggunaan_bahan.jenis_baju,penggunaan_bahan.nama_bahan,penggunaan_bahan.jumlah_baju,penggunaan_bahan.kg,penggunaan_bahan.status,bahan.id,bahan.nama_bahan as bahan,bahan.jumlah as jumlah,bahan.id as idd_bahan');
        // $this->db->join('bahan', 'penggunaan_bahan.id_bahan = bahan.id ');
        $this->db->select('*');

        $this->db->where('id', $id);
        return $this->db->get($this->table);
    }
    public function getBahann($nama)
    {
        // $this->db->select('*');
        // $query = $this->db->get_where('id', $nama);
        // $this->db->where('id', $id);
        // return $this->db->get($this->bahan);
        // $query = $this->db->get('bahan');
        // return $query;
        // $query = $this->db->get_where('bahan', array('id' => $nama));
        // return $query;
        // return $this->db->get($this->bahan);
        $this->db->select('*');
        $this->db->where('id', $nama);
        return $this->db->get($this->bahan)->row();
    }

    public function search($search = "")
    {
        $this->db->like('kategori', $search);
        return $this->db->get($this->table)->result();
    }
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */