<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

function __construct() 
    {
    parent::__construct();
    
    $this->load->model('pelanggan_model');

    

    }

    public function index()
    {
        // validasi
		$this->form_validation->set_rules('email','email','required', 
        array( 'required'  => '%s harus diisi'));

        $this->form_validation->set_rules('password','Password','required', 
            array( 'required'  => '%s harus diisi'));

        if($this->form_validation->run())
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // proses ke simple_login
        $this->simple_pelanggan->login($email,$password);
    }
        $data = array( 'title'  => 'Login Pelanggan',
                        'isi'   => 'masuk/list'
    
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // logout
    public function logout()
    {
        $this->simple_pelanggan->logout();
    }
}
/** End of file Masuk.php **/ ?>