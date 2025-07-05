<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function get_pengaduan_stats()
    {
        // Hitung jumlah pengaduan dengan status 0 (dalam antrian)
        $pengaduan_antrian = $this->db->where('status_pengaduan', 0)->count_all_results('pengaduan');
        log_message('debug', 'Query Pengaduan Dalam Antrian: ' . $this->db->last_query());

        // Hitung jumlah pengaduan dengan status 1 (selesai)
        $pengaduan_selesai = $this->db->where('status_pengaduan', 1)->count_all_results('pengaduan');
        log_message('debug', 'Query Pengaduan Selesai: ' . $this->db->last_query());

        // Hitung total pengaduan
        $total_pengaduan = $pengaduan_antrian + $pengaduan_selesai;
        log_message('debug', 'Total Pengaduan: ' . $total_pengaduan);

        // Hitung tingkat penyelesaian
        $tingkat_penyelesaian = $total_pengaduan > 0 ? round(($pengaduan_selesai / $total_pengaduan) * 100, 2) : 0;
        log_message('debug', 'Tingkat Penyelesaian: ' . $tingkat_penyelesaian);

        return [
            'pengaduan_antrian' => $pengaduan_antrian,
            'pengaduan_selesai' => $pengaduan_selesai,
            'tingkat_penyelesaian' => $tingkat_penyelesaian
        ];
    }
}
