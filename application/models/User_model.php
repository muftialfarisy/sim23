<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    private $table = 'user';

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

    public function getUser($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        return $this->db->get($this->table);
    }
    public function getUsername($username)
    {
        // $this->db->select('*');
        $this->db->where('username', $username);
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