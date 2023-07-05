<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('konfigurasi_model');
        $this->load->model('pelanggan_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        // Load Helper random string
        $this->load->helper('string');
        

    }

    // halaman Belanja
    public function index()
    {
        $keranjang = $this->cart->contents();

        $data = array(  'title'         => 'Keranjang Belanja',
                        'keranjang'     => $keranjang,
                        'isi'           => 'belanja/list'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // success Belanja
    public function success()
    {
        $keranjang = $this->cart->contents();

        $data = array(  'title'         => 'Belanja Berhasil',
                        'keranjang'     => $keranjang,
                        'isi'           => 'belanja/success'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // checkout
    public function checkout()
    {
        // Check Pelanggan Login
        if($this->session->userdata('email')) {
            $email          = $this->session->userdata('email');
            $nama_pelanggan = $this->session->userdata('nama_pelanggan');
            $pelanggan      = $this->pelanggan_model->sudah_login($email,$nama_pelanggan);
            $keranjang = $this->cart->contents();

            $valid = $this->form_validation;

            $valid->set_rules('nama_pelanggan', 'Nama lengkap','required',
                    array( 'required'       => '%s harus diisi'));
            
            $valid->set_rules('telephon','Nomor telephon','required',
                    array( 'required'  => '%s harus diisi'));
            
            $valid->set_rules('alamat','Alamat','required',
                    array( 'required'  => '%s harus diisi'));

            $valid->set_rules('email', 'Email','required|valid_email',
                    array( 'required'       => '%s harus diisi',
                            'valid_email'   => '%s tidak valid',));

            

            if($valid->run()===FALSE) {

            $data = array(  'title'         => 'Checkout',
                            'keranjang'     => $keranjang,
                            'pelanggan'     => $pelanggan,
                            'isi'           => 'belanja/checkout'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
        // Masuk Data base
    }else{
        $i = $this->input;
        $data = array(  'id_pelanggan'      => $pelanggan->id_pelanggan,
                        'nama_pelanggan'        => $i->post('nama_pelanggan'),
                        'email'                 => $i->post('email'),
                        'telephon'              => $i->post('telephon'),
                        'alamat'                => $i->post('alamat'),
                        'kode_transaksi'        => $i->post('kode_transaksi'),
                        'tanggal_transaksi'     => $i->post('tanggal_transaksi'),
                        'jumlah_transaksi'      => $i->post('jumlah_transaksi'),
                        'status_bayar'          => 'Belum',
                        'tanggal_post'          => date('Y-m-d H:i:s')
                    );
        // proses masuk header transaksi
        $this->header_transaksi_model->tambah($data);
        // Proses masuk Ke table transaksi
        foreach($keranjang as $keranjang) {
            $sub_total = $keranjang['price'] * $keranjang['qty'];

            $data = array( 'id_pelanggan'       => $pelanggan->id_pelanggan,
                            'kode_transaksi'    => $i->post('kode_transaksi'),
                            'id_produk'         => $keranjang['id'],
                            'harga'             => $keranjang['price'],
                            'jumlah'            => $keranjang['qty'],
                            'total_harga'       => $sub_total,
                            'tanggal_transaksi' => $i->post('tanggal_transaksi')
                        );
            $this->transaksi_model->tambah($data);
        }
        // End Masuk table
        // destroy table transaksi, maka data keranjang kosong
        $this->cart->destroy();
        // end Destroy
        $this->session->set_flashdata('success', 'Checkout Berhasil');
        redirect(base_url('belanja/success'), 'refresh');
        
    }
        // end database
        }else{
            $this->session->set_flashdata('success', 'Silahkan Login Atau Registrai Terlebihdahulu');
            redirect(base_url('registrasi'),'refresh');
        }
    }
    
    

    // halaman Belanja
    public function add()
    {
        // Ambil data dari form
        $id                 = $this->input->post('id');
        $qty                = $this->input->post('qty');
        $price              = $this->input->post('price');
        $name               = $this->input->post('name');
        $option             = $this->input->post('option');
        $redirect_page      = $this->input->post('redirect_page');
        // Proses Memasukan Kekeranjang belanja
        $data = array(  'id'        => $id,
                        'qty'       => $qty,
                        'price'     => $price,
                        'name'      => $name,
                        'option'    => $option,
                    );
        $this->cart->insert($data);
        redirect($redirect_page,'refresh');                  
    }
    // Update Cart
    public function update_cart($rowid)
    {
        // Jika ada data rowid
        if($rowid) {
            $data = array ( 'rowid'     => $rowid,
                            'qty'       => $this->input->post('qty')

                        );
            $this->cart->update($data);
            redirect(base_url('belanja'),'refresh');
            
        }else{
            redirect(base_url('belanja'),'refresh');
        }
    }

    // hapus cart
    public function hapus($rowid='')
    {
        if($rowid) {
            // hapus per item
            $this->cart->remove($rowid);
            redirect(base_url('belanja'),'refresh');
        }else{
            // hapus All
            $this->cart->destroy();
            redirect(base_url('belanja'),'refresh');
        }
        
    }
    
}