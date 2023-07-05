<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        // load Model
        parent::__construct(); 
        $this->load->model('kategori_model'); 
        // protect Halaman
         $this->simple_login->cek_login();
    }

    // load Data Kategori
    public function index()
    {
        $kategori = $this->kategori_model->listing();
        $data = array( 'title'  => 'Data Kategori',
                        'kategori'  => $kategori,
                        'isi'   => 'admin/kategori/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Tambah Data Kategori
    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama_kategori', 'Nama kategori','required|is_unique[kategori.nama_kategori]',
                array( 'required'       => '%s harus diisi',
                        'is_unique'     => '%s sudah ada. Buat Kategori Baru' ));

        if($valid->run()===FALSE) {
        
        $data = array( 'title'  => 'Tambah Data Kategori',
                        'isi'   => 'admin/kategori/tambah'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;

            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

            $data = array(  'slug_kategori' => $slug_kategori,
                            'nama_kategori' => $i->post('nama_kategori'),
                            'urutan'        => $i->post('urutan'),
                            
                        );
            $this->kategori_model->tambah($data);
            $this->session->set_flashdata('success', 'Data telah Ditambahkan');
            redirect(base_url('admin/kategori'), 'refresh');
            
        }
    }

    // Edit Data Kategori
    public function edit($id_kategori)
    {
        $kategori = $this->kategori_model->detail($id_kategori);

        // validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('nama_kategori', 'Nama kategori','required',
                array( 'required'       => '%s harus diisi'));

        if($valid->run()===FALSE) {
        
        $data = array( 'title'  => 'Edit Data Kategori',
                        'kategori'  => $kategori,
                        'isi'   => 'admin/kategori/edit'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;

            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

            $data = array(  'id_kategori' => $id_kategori,
                            'slug_kategori' => $slug_kategori,
                            'nama_kategori' => $i->post('nama_kategori'),
                            'urutan'        => $i->post('urutan'),
                        );
            $this->kategori_model->edit($data);
            $this->session->set_flashdata('success', 'Data telah Diedit');
            redirect(base_url('admin/kategori'), 'refresh');
            
        }
    }

    // Delete Data Kategori
    public function delete($id_kategoris)
    {
        $data = array( 'id_kategori' => $id_kategoris);
        $this->kategori_model->delete($data);
        $this->session->set_flashdata('success', 'Data telah DiHapus');
        redirect(base_url('admin/kategori'), 'refresh');
    }
}
