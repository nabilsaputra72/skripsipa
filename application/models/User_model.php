<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getJenisBarangJasa()
    {
        return $this->db->get('jenis_barang_jasa')->result_array();
    }

    public function getJenisTuntutan()
    {
        return $this->db->get('jenis_tuntutan')->result_array();
    }

    public function getPengaduanStats()
    {
        // Semua pengaduan (tanpa filter status)
        $pengaduan_masuk = $this->db->count_all('pengaduan');

        // Pengaduan Selesai: status 7
        $this->db->where('id_status', 7);
        $pengaduan_selesai = $this->db->count_all_results('pengaduan');

        $tingkat_penyelesaian = $pengaduan_masuk > 0 ? round(($pengaduan_selesai / $pengaduan_masuk) * 100, 2) : 0;

        return [
            'pengaduan_masuk' => $pengaduan_masuk,
            'pengaduan_selesai' => $pengaduan_selesai,
            'tingkat_penyelesaian' => $tingkat_penyelesaian
        ];
    }
}
