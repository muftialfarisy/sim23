<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desain_model extends CI_Model
{

    private $table = 'produksi';
    private $progress = 'progress';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function addProgress($progress)
    {
        return $this->db->insert($this->progress, $progress);
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

    function getImage($id)
    {
        $this->db->select('gambar_desain');
        // $this->db->where('gambar_desain', null);
        $this->db->where('id', $id);
        return $this->db->get($this->table);
    }
    public function getUser($id)
    {
        $this->db->select('*');
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
