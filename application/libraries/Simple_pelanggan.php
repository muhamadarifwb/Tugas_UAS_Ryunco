<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        // load data model user
        $this->CI->load->model('pelanggan_model');
    }

    // Fungsi Login
    public function login($email,$password)
    {
        $check = $this->CI->pelanggan_model->login($email,$password);
        // Check Data user,create session login
        if($check) {
            $id_pelanggan        = $check->id_pelanggan;
            $nama_pelanggan      = $check->nama_pelanggan;

            // crete session
            $this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->CI->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->CI->session->set_userdata('email', $email);
            // redirect Ke dashboard
            redirect(base_url('dashboard'), 'refresh');
        }else{
            // jika tidak ada ,maka Login
            $this->CI->session->set_flashdata('warning', 'Usernama Atau Password salah');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    // Fungsi Cek Login
    public function cek_login()
    {
        // memeriksa session atau belum
        if($this->CI->session->userdata('email') == "") {
            $this->CI->session->set_flashdata('warning', 'Anda Belum Login');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    // fungsi Logout
    public function logout()
    {
        // membuang semua session pada saat login
        $this->CI->session->unset_userdata('id_pelanggan');
        $this->CI->session->unset_userdata('nama_pelanggan');
        $this->CI->session->unset_userdata('email');

        // redirect Ke login
        $this->CI->session->set_flashdata('success', 'Anda Berhasil Logout');
            redirect(base_url('masuk'), 'refresh');
    }
}
