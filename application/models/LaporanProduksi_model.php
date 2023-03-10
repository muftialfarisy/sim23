<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanProduksi_model extends CI_Model
{

    private $table = 'produksi';
    private $bahan = 'bahan';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function read()
    {
        $this->db->select('produksi.id as idd,produksi.tanggal_order,produksi.dateline,produksi.no_po,produksi.invoice_po,produksi.customer,produksi.tema_design,produksi.jumlah_pesanan,produksi.produk,produksi.bahan,produksi.jumlah_produk,produksi.desain,progress.print as print,progress.cutting as cutting,progress.press as press,progress.jahit as jahit ,progress.overdeck as overdeck,progress.obras as obras,qc.status as qc,produksi.status as status,bahan.id,bahan.nama_bahan as bahann');
        $this->db->from($this->table);
        $this->db->join('bahan', 'produksi.id_bahan = bahan.id');
        $this->db->join('progress', 'produksi.id = progress.produksi_id');
        $this->db->join('qc', 'produksi.id = qc.produksi_id');
        // return $this->db->get($this->table);
        return $this->db->get();
    }
    // public function read()
    // {
    //     $this->db->select('produksi.id as idd,produksi.tanggal_order,produksi.dateline,produksi.no_po,produksi.invoice_po,produksi.customer,produksi.tema_design,produksi.jumlah_pesanan,produksi.produk,produksi.bahan,produksi.jumlah_produk,produksi.desain,produksi.print,produksi.cutting,produksi.press,produksi.jahit,produksi.overdeck,produksi.obras,produksi.qc,produksi.status,bahan.id,bahan.nama_bahan as bahann');
    //     $this->db->from($this->table);
    //     $this->db->join('bahan', 'produksi.id_bahan = bahan.id');
    //     // return $this->db->get($this->table);
    //     return $this->db->get();
    // }
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

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
    public function getProduksi($id)
    {
        $this->db->select('produksi.id as idd,produksi.tanggal_order,produksi.dateline,produksi.no_po,produksi.invoice_po,produksi.customer,produksi.tema_design,produksi.jumlah_pesanan,produksi.produk,produksi.bahan,produksi.jumlah_produk,produksi.desain,produksi.print,produksi.cutting,produksi.press,produksi.jahit,produksi.overdeck,produksi.obras,produksi.qc,produksi.status,bahan.id as id_bahan,bahan.nama_bahan as bahann');
        // $this->db->select('produksi.*,bahan.*,bahan.nama_bahan as bahann');
        $this->db->join('bahan', 'bahan.id = produksi.id_bahan');
        $this->db->where('produksi.id', $id);
        return $this->db->get($this->table);
    }
    public function getBahan($id)
    {
        $this->db->select('*');
        $this->db->join('bahan', 'bahan.id = produksi.id_bahan');
        $this->db->where('produksi.id', $id);
        return $this->db->get($this->table);
    }
    public function getBahann($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        // $this->db->where('nama_bahan', $bahan);
        return $this->db->get($this->bahan);
    }
    public function get_detail($id)
    {
        $this->db->select('produksi.id as idd,produksi.tanggal_order,produksi.dateline,produksi.no_po,produksi.invoice_po,produksi.customer,produksi.tema_design,produksi.jumlah_pesanan,produksi.produk,produksi.bahan,produksi.jumlah_produk,produksi.desain,progress.print as print,progress.cutting as cutting,progress.press as press,progress.jahit as jahit ,progress.overdeck as overdeck,progress.obras as obras,progress.waktu_print,progress.waktu_press,progress.waktu_cutting,progress.waktu_jahit,progress.waktu_overdeck,progress.waktu_obras,progress.status_print,progress.status_press,progress.status_cutting,progress.status_jahit,progress.status_overdeck,progress.status_obras,progress.alasan_print,progress.alasan_press,progress.alasan_cutting,progress.alasan_jahit,progress.alasan_overdeck,progress.alasan_obras,qc.desain as qc_desain,qc.print as qc_print,qc.cutting as qc_cutting,qc.press as qc_press,qc.jahit as qc_jahit,qc.overdeck as qc_overdeck,qc.obras as qc_obras,qc.jumlah_diterima as jumlah_diterima,qc.jumlah_ditolak as jumlah_ditolak,qc.alasan as alasan_qc,qc.status as status_qc,produksi.status as status,bahan.id,bahan.nama_bahan as bahann');
        $this->db->from($this->table);
        $this->db->join('bahan', 'produksi.id_bahan = bahan.id');
        $this->db->join('progress', 'produksi.id = progress.produksi_id');
        $this->db->join('qc', 'produksi.id = qc.produksi_id');
        $this->db->where('produksi.id', $id);
        // return $this->db->get($this->table);
        // return $this->db->get();
        return $this->db->get()->row();
    }

    public function search($search = "")
    {
        $this->db->like('kategori', $search);
        return $this->db->get($this->table)->result();
    }
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */
