<?php
function is_login()
{
    $ci = get_instance();
    if ($ci->session->userdata('username')) {
        if ($ci->session->userdata('role_id') != 1) {
            redirect('tambah-pengaduan');
        } else {
            redirect('data-pengaduan');
        }
    }
}
