<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qc_model extends CI_Model
{

    private $table = 'produksi';
    private $qc = 'qc';

    public function create($data)
    {
        return $this->db->insert($this->qc, $data);
    }

    public function read()
    {
        // $this->db->where('role','2');
        $this->db->select('produksi.*,qc.*,qc.id as idd');
        $this->db->join('produksi', 'qc.produksi_id = produksi.id');
        return $this->db->get($this->qc);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->qc, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->qc);
    }

    public function getUser($id)
    {
        $this->db->select('produksi.*,qc.*,qc.id as idd');
        $this->db->join('produksi', 'qc.produksi_id = produksi.id');
        $this->db->where('qc.id', $id);
        return $this->db->get($this->qc);
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
