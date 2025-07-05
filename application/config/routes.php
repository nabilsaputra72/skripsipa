<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'homepage';
$route['404_override'] = 'auth/notfound';
$route['translate_uri_dashes'] = FALSE;
$route['auth'] = 'auth/index';

$route['login'] = 'admin/login';

$route['data-pengguna'] = 'admin/pengguna';
$route['tambah-pengguna'] = 'admin/tambah_pengguna';

$route['data-pengaduan'] = 'menu/index';

$route['laporan-pengaduan'] = 'menu/laporan';

$route['daftar-pengaduan'] = 'user/read_data';
$route['tambah-pengaduan'] = 'user/tambah_data';


$route['notfound'] = 'auth/notfound';

$route['admin/edit_pengguna/(:num)'] = 'admin/edit_pengguna/$1';
$route['admin/logout'] = 'admin/logout';
$route['admin/daftar_pengaduan'] = 'admin/daftar_pengaduan';
$route['admin/cetak_laporan'] = 'admin/cetak_laporan';
$route['admin/export_laporan'] = 'admin/export_laporan';
$route['ubah_password'] = 'admin/ubah_password';
$route['admin/backup_database'] = 'admin/backup_database';
$route['admin/do_backup_database'] = 'admin/do_backup_database';
