<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get_all_users_with_roles()
    {
        $this->db->select('user.*, roles.role_name, roles.role_level');
        $this->db->from('user');
        $this->db->join('roles', 'user.role_id = roles.id_roles');
        return $this->db->get()->result_array();
    }

    public function get_all_roles()
    {
        return $this->db->get('roles')->result_array();
    }

    public function insert_user($data)
    {
        return $this->db->insert('user', $data);
    }

    public function get_all_pengguna()
    {
        // Ambil data dari tabel datapenduduk
        $data_penduduk = $this->db->get('datapenduduk')->result_array();

        // Ambil data dari tabel user
        $this->db->select('user.*, roles.role_name');
        $this->db->from('user');
        $this->db->join('roles', 'user.role_id = roles.id_roles');
        $data_user = $this->db->get()->result_array();

        // Gabungkan data dari kedua tabel
        return array_merge($data_penduduk, $data_user);
    }

    public function fetch_pengguna()
    {
    $query = $this->db->get('user'); // Ambil data dari tabel user
    return [
        "data" => $query->result_array()
    ];
    }

    public function delete_pengguna($id)
    {
    $this->db->where('id', $id);
    $this->db->delete('user');
    }
}
