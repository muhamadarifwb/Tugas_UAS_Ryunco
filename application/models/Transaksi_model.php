<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Transaksi_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing All Transaksi
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Listing All Transaksi berdasaarkan Header
    public function kode_transaksi($kode_transaksi)
    {
        $this->db->select('transaksi.*,
                            produk.nama_produk,
                            produk.kode_produk');
        $this->db->from('transaksi');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail All Transaksi
    public function detail($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Detail read slug Transaksi
    public function read($slug_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('slug_transaksi', $slug_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // tambah
    public function tambah($data)
    {
        $this->db->insert('transaksi', $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi',$data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->delete('transaksi',$data);
    }
}