<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{

    private $table = 'pesanan';
    private $rata = 'rata_mesin_jersey';
    private $sorting = 'mesin_sorting';
    private $mesin = 'mesin_jersey';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function create_order($order)
    {
        return $this->db->insert($this->mesin, $order);
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

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
    public function delete_order($urutan_order)
    {
        $this->db->where('urutan_order', $urutan_order);
        return $this->db->delete($this->order);
    }
    public function delete_sorting($urutan_order)
    {
        $this->db->where('urutan_order', $urutan_order);
        return $this->db->delete($this->sorting);
    }

    public function getMesin()
    {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('NO', 9);
        $this->db->limit(1);
        return $this->db->get($this->rata);
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