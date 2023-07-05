<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Rekening_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing All Rekening
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('rekening');
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail All Rekening
    public function detail($id_rekening)
    {
        $this->db->select('*');
        $this->db->from('rekening');
        $this->db->where('id_rekening', $id_rekening);
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Detail read slug Rekening
    public function read($slug_rekening)
    {
        $this->db->select('*');
        $this->db->from('rekening');
        $this->db->where('slug_rekening', $slug_rekening);
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // tambah
    public function tambah($data)
    {
        $this->db->insert('rekening', $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->update('rekening',$data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->delete('rekening',$data);
    }
}