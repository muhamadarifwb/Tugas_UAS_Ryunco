<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

    public function __construct()
    {
        // load Model
        parent::__construct(); 
        $this->load->model('rekening_model'); 
        // protect Halaman
         $this->simple_login->cek_login();
    }

    // load Data Rekening
    public function index()
    {
        $rekening = $this->rekening_model->listing();
        $data = array( 'title'  => 'Data Rekening',
                        'rekening'  => $rekening,
                        'isi'   => 'admin/rekening/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Tambah Data Rekening
    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama_bank', 'Nama bank','required',
                array( 'required'       => '%s harus diisi',));

        $valid->set_rules('nama_pemilik', 'Nama Pemilik','required',
                array( 'required'       => '%s harus diisi',));

        $valid->set_rules('nomor_rekening', 'Nomor Rekening','required|is_unique[rekening.nomor_rekening]',
                        array( 'required'       => '%s harus diisi',
                                'is_unique'     => '%s sudah ada. Buat Rekening Baru' ));

        if($valid->run()===FALSE) {
        
        $data = array( 'title'  => 'Tambah Data Rekening',
                        'isi'   => 'admin/rekening/tambah'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;

            $data = array(  'nama_bank'         => $i->post('nama_bank'),
                            'nomor_rekening'    => $i->post('nomor_rekening'),
                            'nama_pemilik'      => $i->post('nama_pemilik'),
                        );
            $this->rekening_model->tambah($data);
            $this->session->set_flashdata('success', 'Data telah Ditambahkan');
            redirect(base_url('admin/rekening'), 'refresh');
            
        }
    }

    // Edit Data Rekening
    public function edit($id_rekening)
    {
        $rekening = $this->rekening_model->detail($id_rekening);

        // validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('nama_bank', 'Nama bank','required',
                        array( 'required'       => '%s harus diisi',));

        if($valid->run()===FALSE) {
        
        $data = array(  'title'      => 'Edit Data Rekening',
                        'rekening'  => $rekening,
                        'isi'       => 'admin/rekening/edit'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;

            $data = array(  'id_rekening'       => $id_rekening,
                            'nama_bank'         => $i->post('nama_bank'),
                            'nomor_rekening'    => $i->post('nomor_rekening'),
                            'nama_pemilik'      => $i->post('nama_pemilik'),
                        );
            $this->rekening_model->edit($data);
            $this->session->set_flashdata('success', 'Data telah Diedit');
            redirect(base_url('admin/rekening'), 'refresh');
            
        }
    }

    // Delete Data Rekening
    public function delete($id_rekenings)
    {
        $data = array( 'id_rekening' => $id_rekenings);
        $this->rekening_model->delete($data);
        $this->session->set_flashdata('success', 'Data telah DiHapus');
        redirect(base_url('admin/rekening'), 'refresh');
    }
}
