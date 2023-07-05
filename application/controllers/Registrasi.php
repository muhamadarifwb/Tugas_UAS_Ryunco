<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class Registrasi extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
    }

    
    public function index()
    {

        $valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan', 'Nama lengkap','required',
                array( 'required'       => '%s harus diisi'));

        $valid->set_rules('email', 'Email','required|valid_email|is_unique[pelanggan.email]',
                array( 'required'       => '%s harus diisi',
                        'valid_email'   => '%s tidak valid',
                        'is_unique'     => '%s Sudah Terdaftar'
                    ));

        $valid->set_rules('password','Password','required',
                array( 'required'  => '%s harus diisi'));

        if($valid->run()===FALSE) {

        $data = array( 'title' => 'Registrasi Pelanggan',
                        'isi'   => 'registrasi/list'

                    );
        $this->load->view('layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            $data = array(  'status_pelanggan'      => 'Pending',
                            'nama_pelanggan'        => $i->post('nama_pelanggan'),
                            'email'                 => $i->post('email'),
                            'password'              => SHA1($i->post('password')),
                            'telephon'              => $i->post('telephon'),
                            'alamat'                => $i->post('alamat'),
                            'tanggal_daftar'        => date('Y-m-d H:i:s')
                        );
            $this->pelanggan_model->tambah($data);
            // create Session Login Pelanggan
            $this->session->set_userdata('email',$i->post('email'));
            $this->session->set_userdata('nama_pelanggan',$i->post('nama_pelanggan'));
            // end
            $this->session->set_flashdata('success', 'Registrasi berhasil');
            redirect(base_url('registrasi/success'), 'refresh');
            
        }
    }

    public function success()
    {
        $data = array( 'title'  => 'Registrasi Berhasil',
                        'isi'   => 'registrasi/success'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
/** End of file Registrasi.php **/ ?>