<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Jika menggunakan Composer
require_once APPPATH . '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
    public $dompdf;
    public $filename;

    public function __construct()
    {
        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Aktifkan pemuatan gambar dari URL
        $this->dompdf = new Dompdf($options);
        $this->filename = "laporan.pdf";
    }

    public function setPaper($size, $orientation)
    {
        $this->dompdf->setPaper($size, $orientation);
    }

    public function load_view($view, $data = [])
    {
        $CI = &get_instance();
        $html = $CI->load->view($view, $data, TRUE);
        $this->dompdf->loadHtml($html);
        $this->dompdf->render();
        $this->dompdf->stream($this->filename, ["Attachment" => true]);
        exit;
    }
}