<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    // Total Produk
    public function total_produk() 
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('produk');
        $query = $this->db->get();
        return $query->row();
    }

    // Total Pelanggan
    public function total_pelanggan() 
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('pelanggan');
        $query = $this->db->get();
        return $query->row();
    }

    // Total Transaksi
    public function total_header_transaksi() 
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('header_transaksi');
        $query = $this->db->get();
        return $query->row();
    }

    // Total Nilai Transaksi
    public function total_transaksi() 
    {
        $this->db->select('SUM(transaksi.total_harga) AS total');
        $this->db->from('transaksi');
        $query = $this->db->get();
        return $query->row();
    }

    // Total Rekening
    public function total_rekening() 
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('rekening');
        $query = $this->db->get();
        return $query->row();
    }

}

/* End of file Dashboard_model.php */
 ?>