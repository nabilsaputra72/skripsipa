<?php
class Kepuasan_model extends CI_Model {
    public function get_statistik_kepuasan() {
        $result = $this->db->select('nilai, COUNT(*) as jumlah')
                           ->group_by('nilai')
                           ->order_by('nilai')
                           ->get('kepuasan')->result_array();
        $stat = [1=>0,2=>0,3=>0,4=>0,5=>0];
        foreach($result as $row) $stat[$row['nilai']] = $row['jumlah'];
        return $stat;
    }
    public function get_komentar() {
        return $this->db->select('nilai, komentar, tanggal')
                        ->where('komentar !=', '')
                        ->order_by('tanggal', 'DESC')
                        ->get('kepuasan')->result_array();
    }
}