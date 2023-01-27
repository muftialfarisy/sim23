<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjadwalan_model extends CI_Model
{

    private $table = 'pesanan';
    private $rata = 'rata_mesin_jersey';
    private $sorting = 'mesin_sorting';
    private $mesin = 'mesin_jersey';

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


    public function getPesanan($id)
    {
        $this->db->select('*,pesanan.id as pesanan_id,estimasi.ci as ci');
        $this->db->join('estimasi', 'pesanan.urutan_order = estimasi.urutan_order');
        $this->db->where('pesanan.id', $id);
        return $this->db->get($this->table);
    }

    public function search($search = "")
    {
        $this->db->like('kategori', $search);
        return $this->db->get($this->table)->result();
    }
       function getUsernames2()
    {

        $this->db->select('*');
        // $this->db->where('urutan_order', 'order 1');
        $records = $this->db->get('estimasi');
        $users = $records->result_array();
        return $users;
    }
          function getJadwal()
    {
        $this->db->select('*');
    $records = $this->db->get('pesanan');
        $users = $records->result_array();
        return $users;
    }
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */