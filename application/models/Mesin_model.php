<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mesin_model extends CI_Model
{

    private $table = 'mesin_jersey';
    private $rata = 'rata_mesin_jersey';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function create_rata($rata)
    {
        return $this->db->insert($this->rata, $rata);
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


    public function getMesin($id)
    {
        $this->db->select('mesin_jersey.id,mesin_jersey.NO, mesin_jersey.desain,mesin_jersey.print,mesin_jersey.cutting,mesin_jersey.press,mesin_jersey.jahit,mesin_jersey.overdeck,mesin_jersey.obras,mesin_jersey.qc, (rata_mesin_jersey.desain) as rata_desain, (rata_mesin_jersey.print) as rata_print, (rata_mesin_jersey.cutting) as rata_cutting, (rata_mesin_jersey.press) as rata_press,(rata_mesin_jersey.jahit) as rata_jahit, (rata_mesin_jersey.overdeck) as rata_overdeck, (rata_mesin_jersey.obras) as rata_obras, (rata_mesin_jersey.qc) as rata_qc, (data_rekap.jumlah_pesanan) as jumlah_pesanan');
        $this->db->from($this->table);
        $this->db->join('rata_mesin_jersey', 'mesin_jersey.no_rata = rata_mesin_jersey.NO');
        $this->db->join('data_rekap', 'mesin_jersey.no = data_rekap.NO');
        $this->db->where('mesin_jersey.id', $id);
        return $this->db->get();
        // return $this->db->get($this->table);
    }
    public function getRata($id)
    {
        // $this->db->select('id,NO,sum(desain /9) as desain, sum(print/9) as print, sum(cutting/9) as cutting, sum(press/9) as press, sum(jahit/9) as jahit, sum(overdeck/9) as overdeck, sum(obras/9) as obras, sum(qc/9) as qc');
        $this->db->select('id,NO,sum(desain) as desain, sum(print) as print, sum(cutting) as cutting, sum(press) as press, sum(jahit) as jahit, sum(overdeck) as overdeck, sum(obras) as obras, sum(qc) as qc');
        // $this->db->where('id', $id);
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