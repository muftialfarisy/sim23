<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progress_model extends CI_Model
{

    private $table = 'progress';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function read()
    {
        // $this->db->where('role','2');
        return $this->db->get($this->table);
    }
    public function readPrint()
    {
        $this->db->select('id,print,waktu_print,status_print,alasan_print');
        // $this->db->where('role','2');
        return $this->db->get($this->table);
    }

    public function updatePrint($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    public function deletePrint($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
    public function readPress()
    {
        $this->db->select('id,press,waktu_press,status_press,alasan_press');
        $this->db->where('print', 'Selesai Dikerjakan');
        return $this->db->get($this->table);
    }

    public function updatePress($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    public function readCutting()
    {
        $this->db->select('id,cutting,waktu_cutting,status_cutting,alasan_cutting');
        $this->db->where('press', 'Selesai Dikerjakan');
        return $this->db->get($this->table);
    }

    public function updateCutting($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    public function readJahit()
    {
        $this->db->select('id,jahit,waktu_jahit,status_jahit,alasan_jahit');
        $this->db->where('cutting', 'Selesai Dikerjakan');
        return $this->db->get($this->table);
    }

    public function updateJahit($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }


    public function getUser($id)
    {
        $this->db->select('produksi.*,progress.*,,progress.id as idd,estimasi.*');
        $this->db->join('produksi', 'progress.produksi_id = produksi.id');
        $this->db->join('estimasi', 'produksi.urutan_order = estimasi.urutan_order');
        $this->db->where('progress.id', $id);
        return $this->db->get($this->table);
    }
    public function get_estimasi_print($urutan_order)
    {
        $this->db->select('produksi.*,progress.*,estimasi.*');
        $this->db->join('produksi', 'progress.produksi_id = produksi.id');
        $this->db->join('estimasi', 'produksi.urutan_order = estimasi.urutan_order');
        $this->db->where('estimasi.urutan_order', $urutan_order);
        return $this->db->get($this->table);
    }
    public function get_estimasi_press($urutan_order)
    {
        $this->db->select('produksi.*,progress.*,estimasi.*');
        $this->db->join('produksi', 'progress.produksi_id = produksi.id');
        $this->db->join('estimasi', 'produksi.urutan_order = estimasi.urutan_order');
        $this->db->where('estimasi.urutan_order', $urutan_order);
        return $this->db->get($this->table);
    }
    public function get_estimasi_cutting($urutan_order)
    {
        $this->db->select('produksi.*,progress.*,estimasi.*');
        $this->db->join('produksi', 'progress.produksi_id = produksi.id');
        $this->db->join('estimasi', 'produksi.urutan_order = estimasi.urutan_order');
        $this->db->where('estimasi.urutan_order', $urutan_order);
        return $this->db->get($this->table);
    }
    public function get_estimasi_jahit($urutan_order)
    {
        $this->db->select('produksi.*,progress.*,estimasi.*');
        $this->db->join('produksi', 'progress.produksi_id = produksi.id');
        $this->db->join('estimasi', 'produksi.urutan_order = estimasi.urutan_order');
        $this->db->where('estimasi.urutan_order', $urutan_order);
        return $this->db->get($this->table);
    }
    // public function getUser($id)
    // {
    //     $this->db->select('*');
    //     $this->db->where('id', $id);
    //     return $this->db->get($this->table);
    // }
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
