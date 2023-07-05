<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        // Halaman Protect simple pelanggan
        $this->simple_pelanggan->cek_login();
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        $this->load->model('rekening_model');
        
        
        
    }

    public function index()
    {
        // ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = array(  'title'             => 'Halaman Dashboard Pelanggan',
                        'header_transaksi'  => $header_transaksi,
                        'isi'               => 'dashboard/list'
                    );
        
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function belanja()
    {
        // ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = array( 'title'              => 'Riwayat Belanja',
                        'header_transaksi'  => $header_transaksi,
                        'isi'               => 'dashboard/belanja'
                    );
        
        $this->load->view('layout/wrapper', $data, FALSE);
        
    }

    // detail
    public function detail($kode_transaksi)
    {
        // ambil data login id_pelanggan dari session
        $id_pelanggan     = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);

        // proteck pelanggan akses transaksi
        if($header_transaksi->id_pelanggan != $id_pelanggan) {
            $this->session->$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
            redirect(base_url('masuk'));
            
        }

        $data = array(  'title'             => 'Halaman Dashboard Pelanggan',
                        'header_transaksi'  => $header_transaksi,
                        'transaksi'         => $transaksi,
                        'isi'               => 'dashboard/detail'
                    );
        
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function profile()
    {
        // ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $pelanggan     = $this->pelanggan_model->detail($id_pelanggan);

        $valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan', 'Nama lengkap','required',
                array( 'required'       => '%s harus diisi'));
        
        $valid->set_rules('alamat', 'Alamat Lengkap','required',
                array( 'required'       => '%s harus diisi'));

        $valid->set_rules('telephon', ' No Telephon','required',
                array( 'required'       => '%s harus diisi'));


        if($valid->run()===FALSE) {

        $data = array(  'title'             => 'Profile Saya',
                        'pelanggan'         => $pelanggan,
                        'isi'               => 'dashboard/profile'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            // jika ganti password lebih dari 6 maka diupdate
            if(strlen($i->post('password')) >= 6) {
                $data = array(  'id_pelanggan'      => $id_pelanggan,
                                'nama_pelanggan'        => $i->post('nama_pelanggan'),
                                'password'              => SHA1($i->post('password')),
                                'telephon'              => $i->post('telephon'),
                                'alamat'                => $i->post('alamat'),
                            );
            }else{
                $data = array(  'id_pelanggan'      => $id_pelanggan,
                                'nama_pelanggan'        => $i->post('nama_pelanggan'),
                                'telephon'              => $i->post('telephon'),
                                'alamat'                => $i->post('alamat'),
                            );
            }
            $this->pelanggan_model->edit($data);
            $this->session->set_flashdata('success', 'Update Profile Berhasil');
            redirect(base_url('dashboard/profile'), 'refresh');
            
        }
    }

    public function konfirmasi($kode_transaksi)
    {
        $header_transaksi   = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $rekening           = $this->rekening_model->listing();

        // validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_bank', 'Nama Bank','required',
                array( 'required'       => '%s harus diisi'));

        $valid->set_rules('rekening_pembayaran', 'Nomor Rekening','required',
                array( 'required'       => '%s harus diisi'));  
                
        $valid->set_rules('rekening_pelanggan', 'Nama Pemilik Rekening','required',
                array( 'required'       => '%s harus diisi'));

        $valid->set_rules('tanggal_bayar', 'Tanggal Pembayaran','required',
                array( 'required'       => '%s harus diisi'));

        $valid->set_rules('jumlah_bayar', 'Jumlah Pembayar','required',
                array( 'required'       => '%s harus diisi'));

        if($valid->run()) {

            // Check Jika Gambar diganti
            if(!empty($_FILES['bukti_bayar']['name'])) {
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400'; //KB(kilobyte)
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('bukti_bayar')){
        
        $data = array(  'title'             => 'Konfirmasi Pembayaran',
                        'header_transaksi'  => $header_transaksi,
                        'rekening'          =>$rekening,
                        'error'             => $this->upload->display_errors(),
                        'isi'               => 'dashboard/konfirmasi'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);

    }else{
        $upload_gambar = array('upload_data' => $this->upload->data());

        // create thumnail image
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
        // lokasi folder thumbnail
        $config['new_image']        = './assets/upload/image/thumbs/';
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 250; //pixel
        $config['height']           = 250; //pixel
        $config['thumb_marker']      = '';
        
        $this->load->library('image_lib', $config);
        
        $this->image_lib->resize();
        // End Create Thumbnail image

        $i = $this->input;
        
        $data = array(  'id_header_transaksi'     => $header_transaksi->id_header_transaksi,
                        'status_bayar'            => 'Konfirmasi',
                        'jumlah_bayar'            => $i->post('jumlah_bayar'),
                        'rekening_pembayaran'     => $i->post('rekening_pembayaran'),
                        'rekening_pelanggan'      => $i->post('rekening_pelanggan'),
                        'bukti_bayar'             => $upload_gambar['upload_data']['file_name'],
                        'id_rekening'             => $i->post('id_rekening'),
                        'tanggal_bayar'           => $i->post('tanggal_bayar'),
                        'nama_bank'               => $i->post('nama_bank'),
                    );
        $this->header_transaksi_model->edit($data);
        $this->session->set_flashdata('success', 'Konfirmasi Pembayaran Berhasil');
        redirect(base_url('dashboard'), 'refresh');
        
    }}else{
        // edit Produk Tanpa Ganti gambar
        $i = $this->input;
        
        $data = array(  'id_header_transaksi'     => $header_transaksi->id_header_transaksi,
                        'status_bayar'            => 'Konfirmasi',
                        'jumlah_bayar'            => $i->post('jumlah_bayar'),
                        'rekening_pembayaran'     => $i->post('rekening_pembayaran'),
                        'rekening_pelanggan'      => $i->post('rekening_pelanggan'),
                        // 'bukti_bayar'             => $upload_gambar['upload_data']['file_name'],
                        'id_rekening'             => $i->post('id_rekening'),
                        'tanggal_bayar'           => $i->post('tanggal_bayar'),
                        'nama_bank'               => $i->post('nama_bank'),
                    );
        $this->header_transaksi_model->edit($data);
        $this->session->set_flashdata('success', 'Konfirmasi Pembayaran Berhasil');
        redirect(base_url('dashboard'), 'refresh');
    }}
        $data = array(  'title'             => 'Konfirmasi Pembayaran',
                            'header_transaksi'  => $header_transaksi,
                            'rekening'          =>$rekening,
                            'isi'               => 'dashboard/konfirmasi'
                        );
            $this->load->view('layout/wrapper', $data, FALSE);
    }
}
/** End of file Dashboard.php **/ ?>