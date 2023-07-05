<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        // load data model user
        $this->CI->load->model('user_model');
    }

    // Fungsi Login
    public function login($username,$password)
    {
        $check = $this->CI->user_model->login($username,$password);
        // Check Data user,create session login
        if($check) {
            $id_user        = $check->id_user;
            $nama           = $check->nama;
            $akses_level    = $check->akses_level;
            // crete session
            $this->CI->session->set_userdata('id_user', $id_user);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('akses_level', $akses_level);
            // redirect Ke admin
            redirect(base_url('admin/dashboard'), 'refresh');
        }else{
            // jika tidak ada ,maka Login
            $this->CI->session->set_flashdata('warning', 'Usernama Atau Password salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    // Fungsi Cek Login
    public function cek_login()
    {
        // memeriksa session atau belum
        if($this->CI->session->userdata('username') == "") {
            $this->CI->session->set_flashdata('warning', 'Anda Belum Login');
            redirect(base_url('login'), 'refresh');
        }
    }

    // fungsi Logout
    public function logout()
    {
        // membuang semua session pada saat login
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('akses_level');
        // redirect Ke login
        $this->CI->session->set_flashdata('success', 'Anda Berhasil Logout');
            redirect(base_url('login'), 'refresh');
    }
}
