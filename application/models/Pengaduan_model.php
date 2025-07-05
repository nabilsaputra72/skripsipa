<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{
    public function get_pengaduan_stats()
    {
        // Hitung jumlah pengaduan dengan status 0 (dalam antrian)
        $pengaduan_antrian = $this->db->where('status', 0)->count_all_results('pengaduan');
        log_message('debug', 'Query Pengaduan Dalam Antrian: ' . $this->db->last_query());

        // Hitung jumlah pengaduan dengan status 1 (selesai)
        $pengaduan_selesai = $this->db->where('status', 1)->count_all_results('pengaduan');
        log_message('debug', 'Query Pengaduan Selesai: ' . $this->db->last_query());

        // Hitung total pengaduan
        $total_pengaduan = $pengaduan_antrian + $pengaduan_selesai;

        return [
            'pengaduan_antrian' => $pengaduan_antrian,
            'pengaduan_selesai' => $pengaduan_selesai,
            'total_pengaduan' => $total_pengaduan
        ];
    }

    public function get_pengaduan_belum_disetujui()
    {
        return $this->db->where('disetujui_kabid', 0)->get('pengaduan')->result_array();
    }

    public function get_pengaduan_sudah_disetujui()
    {
        return $this->db->where('disetujui_kabid', 1)->get('pengaduan')->result_array();
    }
}