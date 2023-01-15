<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    private $table = 'mesin_jaket';
    private $estimasi = 'estimasi';
    private $pesanan = 'pesanan';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }


    public function read()
    {
        $this->db->select('*');
        // $this->db->where('role','2');
        return $this->db->get($this->estimasi);
    }
    function getUsernames()
    {

        $this->db->select('*');
        // $this->db->where('urutan_order', 'order 1');
        $records = $this->db->get('estimasi');
        $users = $records->result_array();
        return $users;
    }
    function getUsernames2()
    {

        $this->db->select('*');
        // $this->db->where('urutan_order', 'order 1');
        $records = $this->db->get('estimasi');
        $users = $records->result_array();
        return $users;
    }
    function getOrder($urutan_order)
    {

        $this->db->select('*');
        $this->db->where('urutan_order', $urutan_order);
        $records = $this->db->get('estimasi');
        $users = $records->result_array();
        return $users;
        // $this->db->select('*');
        // $this->db->where('urutan_order', $urutan_order);
        // return $this->db->get($this->estimasi);
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