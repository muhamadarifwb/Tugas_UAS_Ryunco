<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('rekening_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('konfigurasi_model');
        
    }
    
    public function index()
    {
        $header_transaksi = $this->header_transaksi_model->listing();

        $data = array( 'title'              => 'Data Transaksi',
                        'header_transaksi'  => $header_transaksi,
                        'isi'               => 'admin/transaksi/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        
    }

    // function detail
    public function detail($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);

        $data = array(  'title'             => 'Riwayat Belanja',
                        'header_transaksi'  => $header_transaksi,
                        'transaksi'         => $transaksi,
                        'isi'               => 'admin/transaksi/detail'
                    );
        
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // function cetak
    public function cetak($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site             = $this->konfigurasi_model->listing();

        $data = array(  'title'             => 'Riwayat Belanja',
                        'header_transaksi'  => $header_transaksi,
                        'transaksi'         => $transaksi,
                        'site'              => $site
                    );
        
        $this->load->view('admin/transaksi/cetak', $data, FALSE);
    }

    // function unduh PDF
    public function pdf($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site             = $this->konfigurasi_model->listing();

        $data = array(  'title'             => 'Riwayat Belanja',
                        'header_transaksi'  => $header_transaksi,
                        'transaksi'         => $transaksi,
                        'site'              => $site
                    );
        
        // $this->load->view('admin/transaksi/cetak', $data, FALSE);
        $html = $this->load->view('admin/transaksi/cetak', $data, true);
        // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output();
    }

    // function Cetak Pengiriman
    public function kirim($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site             = $this->konfigurasi_model->listing();

        $data = array(  'title'             => 'Riwayat Belanja',
                        'header_transaksi'  => $header_transaksi,
                        'transaksi'         => $transaksi,
                        'site'              => $site
                    );
        
        // $this->load->view('admin/transaksi/cetak', $data, FALSE);
        $html = $this->load->view('admin/transaksi/kirim', $data, true);
        
        
        // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();

        // setting Header dan footer
        $mpdf->SetHTMLHeader('
        <div style="text-align: left; font-weight: bold;">
            <img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height: 50px; width: auto; ">
        </div>
        ');
        $mpdf->SetHTMLFooter('
        <div style="padding: 10px 20px; background-color: black; color: white; font-size: 12px;">
            Alamat: '.$site->namaweb.' ('.$site->alamat.')<br>
            Telephone: '.$site->telephone.'
        </div>
        ');
        // End HEader and Footer

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output New Name
        $nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$kode_transaksi.'.pdf';
        $mpdf->Output($nama_file_pdf,'I');
    }
    
}
/** End of file Transaksi.php **/ ?>