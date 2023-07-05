<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        // load Model
        parent::__construct(); 
        $this->load->model('user_model'); 
        // protect Halaman
         $this->simple_login->cek_login();
    }

    // load Data User
    public function index()
    {
        $user = $this->user_model->listing();
        $data = array( 'title'  => 'Data User',
                        'user'  => $user,
                        'isi'   => 'admin/user/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Tambah Data User
    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama lengkap','required',
                array( 'required'       => '%s harus diisi'));

        $valid->set_rules('email', 'Email','required|valid_email',
                array( 'required'       => '%s harus diisi',
                        'valid_email'   => '%s tidak valid'));
        
        $valid->set_rules('username', 'Username','required|min_length[6]|max_length[32]|is_unique[users.username]',
                array( 'required'       => '%s harus diisi',
                        'min_length'    => '%s minimal 6 karakter',
                        'max_length'    => '%s maximal 32 karakter',
                        'is_unique'     => '%s sudah ada. Buat username baru.'));

        $valid->set_rules('password','Password','required',
                array( 'required'  => '%s harus diisi'));

        if($valid->run()===FALSE) {
        
        $data = array( 'title'  => 'Tambah Data User',
                        'isi'   => 'admin/user/tambah'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            $data = array(  'nama'          => $i->post('nama'),
                            'email'         => $i->post('email'),
                            'username'      => $i->post('username'),
                            'password'      => SHA1($i->post('password')),
                            'akses_level'   => $i->post('akses_level'),
                        );
            $this->user_model->tambah($data);
            $this->session->set_flashdata('success', 'Data telah Ditambahkan');
            redirect(base_url('admin/user'), 'refresh');
            
        }
    }

    // Edit Data User
    public function edit($id_user)
    {
        $user = $this->user_model->detail($id_user);

        // validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama lengkap','required',
                array( 'required'       => '%s harus diisi'));

        $valid->set_rules('email', 'Email','required|valid_email',
                array( 'required'       => '%s harus diisi',
                        'valid_email'   => '%s tidak valid'));
        
        $valid->set_rules('password','Password','required',
                array( 'required'  => '%s harus diisi'));

        if($valid->run()===FALSE) {
        
        $data = array( 'title'  => 'Edit Data User',
                        'user'  => $user,
                        'isi'   => 'admin/user/edit'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            $data = array(  'id_user'       => $id_user,
                            'nama'          => $i->post('nama'),
                            'email'         => $i->post('email'),
                            'username'      => $i->post('username'),
                            'password'      => SHA1($i->post('password')),
                            'akses_level'   => $i->post('akses_level'),
                        );
            $this->user_model->edit($data);
            $this->session->set_flashdata('success', 'Data telah Diedit');
            redirect(base_url('admin/user'), 'refresh');
            
        }
    }

    // Delete Data User
    public function delete($id_users)
    {
        $data = array( 'id_user' => $id_users);
        $this->user_model->delete($data);
        $this->session->set_flashdata('success', 'Data telah DiHapus');
        redirect(base_url('admin/user'), 'refresh');
    }
}
