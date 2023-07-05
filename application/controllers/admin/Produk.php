<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        // load Model
        parent::__construct(); 
        $this->load->model('produk_model');

        $this->load->model('kategori_model');
        
        // protect Halaman
         $this->simple_login->cek_login();
    }

    // load Data Produk
    public function index()
    {
        $produk = $this->produk_model->listing();
        $data = array( 'title'  => 'Data Produk',
                        'produk'  => $produk,
                        'isi'   => 'admin/produk/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // gambar
    public function gambar($id_produk)
    {
        $produk = $this->produk_model->detail($id_produk);
        $gambar = $this->produk_model->gambar($id_produk);

        // validasi input
        $valid = $this->form_validation;

        $valid->set_rules('judul_gambar', 'Judul/Nama Gambar','required',
                array( 'required'       => '%s harus diisi'));

        if($valid->run()) {
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400'; //KB(kilobyte)
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('gambar')){

            
        
        $data = array( 'title'      => 'Tambah Gambar Produk: '.$produk->nama_produk,
                        '$produk'   => $$produk,
                        'gambar'    => $gambar,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/produk/gambar'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

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

            $data = array(  'id_produk'     => $id_produk,
                            'judul_gambar'  => $i->post('judul_gambar'),
                            'gambar'        => $upload_gambar['upload_data']['file_name'],
                        );
            $this->produk_model->tambah_gambar($data);
            $this->session->set_flashdata('success', 'Data Gambar telah Ditambahkan');
            redirect(base_url('admin/produk/gambar/' .$id_produk), 'refresh');
            
        }}

        $data = array( 'title'  => 'Tambah Gambar Produk: '.$produk->nama_produk,
                        'produk'  => $produk,
                        'gambar'  => $gambar,
                        'isi'   => 'admin/produk/gambar'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Tambah Data Produk
    public function tambah()
    {
        // Ambil data Kategori
        $kategori = $this->kategori_model->listing();

        // validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk', 'Nama Produk','required',
                array( 'required'       => '%s harus diisi'));

        $valid->set_rules('kode_produk', 'Kode Produk','required|is_unique[produk.kode_produk]',
                array( 'required'       => '%s harus diisi',
                        'is_unique'     => '%s sudah ada. Buat kode produk Baru'));

        if($valid->run()) {
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400'; //KB(kilobyte)
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('gambar')){

            
        
        $data = array( 'title'  => 'Tambah Data Produk',
                        'kategori'  => $kategori,
                        'error'     => $this->upload->display_errors(),
                        'isi'   => 'admin/produk/tambah'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

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
            // slug Produk
            $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

            $data = array(  'id_user'       => $this->session->userdata('id_user'),
                            'id_kategori'   => $i->post('id_kategori'),
                            'kode_produk'   => $i->post('kode_produk'),
                            'nama_produk'   => $i->post('nama_produk'),
                            'slug_produk'   => $slug_produk,
                            'keterangan'    => $i->post('keterangan'),
                            'keywords'      => $i->post('keywords'),
                            'harga'         => $i->post('harga'),
                            'harga_beli'    => $i->post('harga_beli'),
                            // 'harga_diskon'              => $i->post('harga_diskon'),
                            // 'tanggal_mulai_diskon'      => date('Y-m-d',strtotime($i->post('tanggal_mulai_diskon'))),
                            // 'tanggal_selesai_diskon'    => date('Y-m-d',strtotime($i->post('tanggal_selesai_diskon'))),
                            'stok_minimal'              => $i->post('stok_minimal'),
                            'stok'          => $i->post('stok'),
                            'gambar'        => $upload_gambar['upload_data']['file_name'],
                            'berat'         => $i->post('berat'),
                            'ukuran'        => $i->post('ukuran'),
                            'status_produk' => $i->post('status_produk'),
                            'tanggal_post'  => date('Y-m-d H:i:s')
                        );
            $this->produk_model->tambah($data);
            $this->session->set_flashdata('success', 'Data telah Ditambahkan');
            redirect(base_url('admin/produk'), 'refresh');
            
        }}

        $data = array( 'title'  => 'Tambah Data Produk',
                        'kategori'  => $kategori,
                        'isi'   => 'admin/produk/tambah'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Edit Data Produk
    public function edit($id_produk)
    {
        // ambil Data Produk
        $produk     = $this->produk_model->detail($id_produk);

        // Amnil Data Kategori
        $kategori   = $this->kategori_model->listing();

        // validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk', 'Nama Produk','required',
                array( 'required'       => '%s harus diisi'));

        $valid->set_rules('kode_produk', 'Kode Produk','required',
                array( 'required'       => '%s harus diisi'));    

        if($valid->run()) {
            // Check Jika Gambar diganti
            if(!empty($_FILES['gambar']['name'])) {
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400'; //KB(kilobyte)
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('gambar')){

            
        
        $data = array(  'title'     => 'Edit Data Produk: '.$produk->nama_produk,
                        'kategori'  => $kategori,
                        'produk'    => $produk,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/produk/edit'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

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
            // slug Produk
            $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

            $data = array(  'id_produk'     => $id_produk,
                            'id_user'       => $this->session->userdata('id_user'),
                            'id_kategori'   => $i->post('id_kategori'),
                            'kode_produk'   => $i->post('kode_produk'),
                            'nama_produk'   => $i->post('nama_produk'),
                            'slug_produk'   => $slug_produk,
                            'keterangan'    => $i->post('keterangan'),
                            'keywords'      => $i->post('keywords'),
                            'harga'         => $i->post('harga'),
                            'harga_beli'    => $i->post('harga_beli'),
                            // 'harga_diskon'              => $i->post('harga_diskon'),
                            // 'tanggal_mulai_diskon'      => date('Y-m-d',strtotime($i->post('tanggal_mulai_diskon'))),
                            // 'tanggal_selesai_diskon'    => date('Y-m-d',strtotime($i->post('tanggal_selesai_diskon'))),
                            'stok_minimal'              => $i->post('stok_minimal'),
                            'stok'          => $i->post('stok'),
                            'gambar'        => $upload_gambar['upload_data']['file_name'],
                            'berat'         => $i->post('berat'),
                            'ukuran'        => $i->post('ukuran'),
                            'status_produk' => $i->post('status_produk'),
                        );
            $this->produk_model->edit($data);
            $this->session->set_flashdata('success', 'Data telah DiEdit');
            redirect(base_url('admin/produk'), 'refresh');
            
        }}else{
            // edit Produk Tanpa Ganti gambar
            $i = $this->input;
            // slug Produk
            $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

            $data = array(  'id_produk'     => $id_produk,
                            'id_user'       => $this->session->userdata('id_user'),
                            'id_kategori'   => $i->post('id_kategori'),
                            'kode_produk'   => $i->post('kode_produk'),
                            'nama_produk'   => $i->post('nama_produk'),
                            'slug_produk'   => $slug_produk,
                            'keterangan'    => $i->post('keterangan'),
                            'keywords'      => $i->post('keywords'),
                            'harga'         => $i->post('harga'),
                            'harga_beli'    => $i->post('harga_beli'),
                            // 'harga_diskon'              => $i->post('harga_diskon'),
                            // 'tanggal_mulai_diskon'      => date('Y-m-d',strtotime($i->post('tanggal_mulai_diskon'))),
                            // 'tanggal_selesai_diskon'    => date('Y-m-d',strtotime($i->post('tanggal_selesai_diskon'))),
                            'stok_minimal'              => $i->post('stok_minimal'),
                            'stok'          => $i->post('stok'),
                            // jika gambar tidak diganti
                            // 'gambar'        => $upload_gambar['upload_data']['file_name'],
                            'berat'         => $i->post('berat'),
                            'ukuran'        => $i->post('ukuran'),
                            'status_produk' => $i->post('status_produk'),
                        );
            $this->produk_model->edit($data);
            $this->session->set_flashdata('success', 'Data telah DiEdit');
            redirect(base_url('admin/produk'), 'refresh');
        }}

        $data = array( 'title'  => 'Edit Data Produk: '.$produk->nama_produk,
                        'kategori'  => $kategori,
                        'produk'    => $produk,
                        'isi'   => 'admin/produk/edit'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

    }

    // Delete Data Produk
    public function delete($id_produk)
    {
        // proses Hapus Gamabar
        $produk = $this->produk_model->detail($id_produk);

        unlink('./assets/upload/image/'.$produk->gambar);
        unlink('./assets/upload/image/thumbs/'.$produk->gambar);
        // End Proses Hapus
        $data = array( 'id_produk' => $id_produk);
        $this->produk_model->delete($data);
        $this->session->set_flashdata('success', 'Data telah DiHapus');
        redirect(base_url('admin/produk'), 'refresh');
    }

    // Delete Gambar Data Produk
    public function delete_gambar($id_produk,$id_gambar)
    {
        // proses Hapus Gamabar
        $gambar = $this->produk_model->detail_gambar($id_gambar);

        unlink('./assets/upload/image/'.$gambar->gambar);
        unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
        // End Proses Hapus
        $data = array( 'id_gambar' => $id_gambar);
        $this->produk_model->delete_gambar($data);
        $this->session->set_flashdata('success', 'Data Gambar telah DiHapus');
        redirect(base_url('admin/produk/gambar/'.$id_produk), 'refresh');
    }
}
