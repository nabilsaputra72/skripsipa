<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('classification_helper');
        $this->load->helper('fonnte');
        $this->load->model('Admin_model'); // Pastikan model Admin_model dimuat
        $this->load->library('form_validation'); // Pastikan library form_validation dimuat
        $this->load->library('session'); // Pastikan library session dimuat

        // Jangan blokir akses ke halaman login
        $allowed = ['login', 'logout'];
        if (!in_array($this->router->fetch_method(), $allowed)) {
            if (!in_array($this->session->userdata('role_id'), [1, 2, 3])) {
                redirect('auth');
            }
        }
    }

    public function index()
    {
        // Ambil data user dan role
        $data['users'] = $this->Admin_model->get_all_users_with_roles();
        $data['roles'] = $this->Admin_model->get_all_roles();

        $data['judul'] = 'Kelola Pengguna';
        // Redirect ke halaman pengguna
        redirect('admin/pengguna');
    }

    public function tambah_pengguna()
    {
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/pengguna');
        } else {
            $data = [
                'nama_pegawai' => $this->input->post('nama_pegawai'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Tetap hash password
                'role_id' => $this->input->post('role_id')
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('success', 'Pengguna berhasil ditambahkan.');
            redirect('admin/pengguna');
        }
    }

    public function login()
    {
        // Hapus session masyarakat jika ada
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('email');

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login Admin';
            $this->load->view('admin/admin_login', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            if (!$user) {
                // Username tidak ditemukan di tabel user
                $this->session->set_flashdata('error', 'Akun anda belum tersedia, segera hubungi admin sistem');
                redirect('admin/login');
            } elseif (!password_verify($password, $user['password'])) {
                // Password salah
                $this->session->set_flashdata('error', 'Username atau Password Salah');
                redirect('admin/login');
            } else {
                // Login berhasil
                $this->session->set_userdata([
                    'id_user' => $user['id_user'],
                    'nama_pegawai' => $user['nama_pegawai'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'logged_in' => true
                ]);
                if ($user['role_id'] == 2) {
        // Jika Kabid, redirect ke halaman persetujuan tindak lanjut
        redirect('kabid/persetujuan_pengaduan');
    } else {
        // Jika Admin/Superadmin, redirect ke pengguna
        redirect('admin/daftar_pengaduan');
        }
            }
        }
    }

    public function pengguna()
    {
        // Ambil data dari tabel datapenduduk
        $data_penduduk = $this->db->select('nik, email, created_at')
                                  ->from('datapenduduk')
                                  ->get()
                                  ->result_array();

        // Ambil data dari tabel user
        $data_user = $this->db->select('user.*, roles.role_name')
                              ->from('user')
                              ->join('roles', 'user.role_id = roles.id_roles')
                              ->get()
                              ->result_array();

        // Tambahkan judul halaman ke variabel data
        $data['judul'] = 'Kelola Pengguna';

        // Ambil data user dari session
        $data['user'] = $this->session->userdata();

        // Validasi apakah username tersedia di session
        if (!isset($data['user']['username']) || empty($data['user']['username'])) {
            log_message('error', 'Username tidak tersedia di session.');
            $data['user']['username'] = 'Guest'; // Tambahkan fallback
            $data['user']['nama_pegawai'] = 'Guest'; // Tambahkan fallback
        } else {
            // Ambil data user dari database
            $user_data = $this->db->get_where('user', ['username' => $data['user']['username']])->row_array();
            if ($user_data) {
                $data['user']['nama_pegawai'] = $user_data['nama_pegawai'];
            }
        }

        // Debugging untuk memastikan data diteruskan
        log_message('debug', 'Data yang diteruskan ke view: ' . json_encode($data));

        // Siapkan data pengguna untuk view
        $data['pengguna_masyarakat'] = $data_penduduk;
        $data['pengguna_admin'] = $data_user;

        // Muat view dengan variabel $data
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data); // Pastikan $data diteruskan
        $this->load->view('admin/pengguna', $data); // Pastikan $data diteruskan
        $this->load->view('templates/footer');
    }

    public function fetch_pengguna()
    {
        $data = $this->Admin_model->fetch_pengguna(); // Ambil data pengguna untuk DataTables
        echo json_encode($data);
    }

    public function hapus_pengguna()
    {
        $id_user = $this->input->post('id');
        log_message('debug', 'Fungsi hapus_pengguna dipanggil dengan ID: ' . $id_user);
        $this->db->delete('user', ['id_user' => $id_user]);
        $this->session->set_flashdata('success', 'Pengguna berhasil dihapus.');
        redirect('admin/pengguna');
    }

    public function edit_pengguna()
    {
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/pengguna');
        } else {
            $id_user = $this->input->post('id_user');
            $data = [
                'nama_pegawai' => $this->input->post('nama_pegawai'),
                'username' => $this->input->post('username'),
                'role_id' => $this->input->post('role_id')
            ];

            // Periksa apakah password diisi
            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            // Update data pengguna
            $this->db->update('user', $data, ['id_user' => $id_user]);
            $this->session->set_flashdata('success', 'Pengguna berhasil diubah.');
            redirect('admin/pengguna');
        }
    }

    public function logout()
    {
        // Hapus semua data session
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama_pegawai');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('email');

        // Set pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success">Anda telah berhasil log out.</div>');

        // Redirect ke halaman login
        redirect('admin/login');
    }

    public function daftar_pengaduan()
    {
        // Ambil parameter pencarian dari input GET
        $search = $this->input->get('search');

        // Query untuk mengambil data pengaduan
        $this->db->select('
            p.id_pengaduan,
            p.id_nik AS nik,
            p.tgl_pengaduan,
            kk.nama_kabupaten_kota AS kabupaten_kota,
            p.nama_pelapor,
            p.no_telp_pelapor,
            p.nama_toko,
            p.alamat_pelaku_usaha,
            p.no_telp_pelaku_usaha,
            jb.jenis_barang_jasa,
            kp.kategori AS kategori_pengaduan,
            p.isi_laporan,
            p.kerugian_masyarakat,
            jt.tuntutan AS jenis_tuntutan,
            sp.status AS status_pengaduan,
            p.id_status,
            p.id_kategori_pengaduan,
            p.disetujui_kabid,
            GROUP_CONCAT(fp.file_path) AS bukti_pendukung
        ');
        $this->db->from('pengaduan p'); // Pastikan tabel ditentukan di sini
        $this->db->join('datapenduduk dp', 'p.id_nik = dp.nik', 'left');
        $this->db->join('kabupaten_kota kk', 'p.id_kabupaten_kota = kk.id_kabupaten_kota', 'left');
        $this->db->join('jenis_barang_jasa jb', 'p.id_jenis_barang_jasa = jb.id_jenis_barang_jasa', 'left');
        $this->db->join('kategori_pengaduan kp', 'p.id_kategori_pengaduan = kp.id_kategori_pengaduan', 'left');
        $this->db->join('jenis_tuntutan jt', 'p.id_jenis_tuntutan = jt.id_jenis_tuntutan', 'left');
        $this->db->join('status_pengaduan sp', 'p.id_status = sp.id_status', 'left');
        $this->db->join('file_pendukung fp', 'p.id_pengaduan = fp.id_pengaduan', 'left');
        $this->db->order_by('FIELD(p.id_kategori_pengaduan, 1,2,3,6)');
        $this->db->order_by('p.tgl_pengaduan', 'DESC');
        

        // Tambahkan kondisi pencarian jika ada input pencarian
        if (!empty($search)) {
            $this->db->group_start(); // Mulai grup kondisi pencarian
            $this->db->like('p.id_nik', $search);
            $this->db->or_like('p.nama_pelapor', $search);
            $this->db->or_like('p.no_telp_pelapor', $search);
            $this->db->or_like('p.nama_toko', $search);
            $this->db->group_end(); // Akhiri grup kondisi pencarian
        }

        $this->db->group_by('p.id_pengaduan'); // Pastikan GROUP BY diterapkan setelah kondisi pencarian
        $query = $this->db->get(); // Jalankan query

        if (!$query) {
            echo $this->db->last_query(); // Debug query
            print_r($this->db->error());  // Debug error
            exit;
        }

        $data_pengaduan = $query->result_array();

        // Tambahkan data ke variabel $data untuk diteruskan ke view
        $data['judul'] = 'Daftar Pengaduan';
        $data['pengaduan'] = $data_pengaduan;
        $data['search'] = $search; // Tambahkan parameter pencarian untuk ditampilkan di view

        // Jika tidak ada pencarian, tampilkan halaman lengkap
        $data['judul'] = 'Daftar Pengaduan';
        $data['pengaduan'] = $data_pengaduan;

        // Tambahkan data session user
        $data['user'] = $this->session->userdata();
        $data['status_list'] = $this->db->get('status_pengaduan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/daftar_pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function detail_pengaduan($id_pengaduan)
    {
        // Query untuk mengambil data pengaduan berdasarkan ID
        $this->db->select('
            p.id_pengaduan,
            p.id_nik AS nik,
            p.tgl_pengaduan,
            kk.nama_kabupaten_kota AS kabupaten_kota,
            p.nama_pelapor,
            p.no_telp_pelapor,
            p.nama_toko,
            p.alamat_pelaku_usaha,
            p.no_telp_pelaku_usaha,
            jb.jenis_barang_jasa,
            kp.kategori AS kategori_pengaduan,
            p.isi_laporan,
            p.kerugian_masyarakat,
            jt.tuntutan AS jenis_tuntutan,
            sp.status_name AS status_pengaduan,
            GROUP_CONCAT(fp.file_path) AS bukti_pendukung
        ');
        $this->db->from('pengaduan p');
        $this->db->join('kabupaten_kota kk', 'p.id_kabupaten_kota = kk.id_kabupaten_kota', 'left');
        $this->db->join('jenis_barang_jasa jb', 'p.id_jenis_barang_jasa = jb.id_jenis_barang_jasa', 'left');
        $this->db->join('kategori_pengaduan kp', 'p.id_kategori_pengaduan = kp.id_kategori_pengaduan', 'left');
        $this->db->join('jenis_tuntutan jt', 'p.id_jenis_tuntutan = jt.id_jenis_tuntutan', 'left');
        $this->db->join('status_pengaduan sp', 'p.id_status = sp.id_status', 'left');
        $this->db->join('file_pendukung fp', 'p.id_pengaduan = fp.id_pengaduan', 'left');
        $this->db->where('p.id_pengaduan', $id_pengaduan);
        $this->db->group_by('p.id_pengaduan');
        $query = $this->db->get();

        if (!$query) {
            echo $this->db->last_query(); // Debug query
            print_r($this->db->error());  // Debug error
            exit;
        }

        $pengaduan = $query->row_array();

        if (!$pengaduan) {
            show_404(); // Tampilkan halaman 404 jika data tidak ditemukan
        }

        $data['judul'] = 'Detail Pengaduan';
        $data['pengaduan'] = $pengaduan;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function update_status_pengaduan()
    {
        // Izinkan admin (1) dan superadmin (3)
        if (!in_array($this->session->userdata('role_id'), [1, 3])) {
            show_error('Anda tidak memiliki akses untuk melakukan aksi ini.', 403);
        }

        $id_pengaduan = $this->input->post('id_pengaduan');
        $id_status = $this->input->post('id_status');

        // Validasi input
        if (empty($id_pengaduan) || empty($id_status)) {
            $this->session->set_flashdata('error', 'ID pengaduan dan status harus diisi.');
            redirect('admin/daftar_pengaduan');
        }

        // Ambil data pengaduan
        $pengaduan = $this->db->get_where('pengaduan', ['id_pengaduan' => $id_pengaduan])->row_array();
        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Data pengaduan tidak ditemukan.');
            redirect('admin/daftar_pengaduan');
        }

        // Cek apakah sudah disetujui Kabid
        if (!isset($pengaduan['disetujui_kabid']) || $pengaduan['disetujui_kabid'] != 1) {
            $this->session->set_flashdata('status_error', 'Pengaduan belum disetujui Kabid. Tidak dapat mengubah status.');
            redirect('admin/daftar_pengaduan');
        }

        // Update status pengaduan
        $this->db->where('id_pengaduan', $id_pengaduan);
        $update = $this->db->update('pengaduan', ['id_status' => $id_status]);

        if ($update) {
            $this->session->set_flashdata('success', 'Status pengaduan berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status pengaduan.');
            redirect('admin/daftar_pengaduan');
        }

        // Kirim WhatsApp ke pelapor
        // Ambil nomor telepon pelapor dan status baru
        $no_telp_pelapor = $pengaduan['no_telp_pelapor'];
        $status_pengaduan = $this->db->get_where('status_pengaduan', ['id_status' => $id_status])->row_array();
        $status_text = isset($status_pengaduan['status']) ? $status_pengaduan['status'] : 'Status tidak diketahui';
        $link_detail = base_url('user/lihat_pengaduan/' . $id_pengaduan);

        $message = "Status pengaduan Anda telah diperbarui menjadi: *$status_text*.\n\nSilakan cek detail pengaduan Anda di link berikut:\n$link_detail";

        send_fonnte_message($no_telp_pelapor, $message);

        redirect('admin/daftar_pengaduan');
    }

    public function kategori_pengaduan()
    {
        // Ambil semua kategori dari tabel kategori_pengaduan
        $data['kategori'] = $this->db->get('kategori_pengaduan')->result_array();

        // Hitung jumlah pengaduan berdasarkan kategori
        $data['total_pengaduan'] = [
            'belum_ditentukan' => $this->db->where('id_kategori_pengaduan', 6)->count_all_results('pengaduan'),
            'pengaduan_biasa' => $this->db->where('id_kategori_pengaduan', 3)->count_all_results('pengaduan'),
            'prioritas' => $this->db->where('id_kategori_pengaduan', 2)->count_all_results('pengaduan'),
            'harus_segera' => $this->db->where('id_kategori_pengaduan', 1)->count_all_results('pengaduan'),
        ];

        // Ambil data pengaduan berdasarkan kategori (default: Belum Ditentukan)
        $kategori_id = $this->input->get('kategori_id') ?? 6; // Default kategori_id = 6 (Belum Ditentukan)
        $this->db->select('
            p.id_pengaduan,
            p.id_nik AS nik,
            p.tgl_pengaduan,
            kk.nama_kabupaten_kota AS kabupaten_kota,
            p.nama_pelapor,
            p.no_telp_pelapor,
            p.nama_toko,
            p.alamat_pelaku_usaha,
            p.no_telp_pelaku_usaha,
            jb.jenis_barang_jasa,
            kp.kategori AS kategori_pengaduan,
            p.isi_laporan,
            p.kerugian_masyarakat,
            jt.tuntutan AS jenis_tuntutan,
            sp.status AS status_pengaduan,
            p.id_status
        ');
        $this->db->from('pengaduan p');
        $this->db->join('kabupaten_kota kk', 'p.id_kabupaten_kota = kk.id_kabupaten_kota', 'left');
        $this->db->join('jenis_barang_jasa jb', 'p.id_jenis_barang_jasa = jb.id_jenis_barang_jasa', 'left');
        $this->db->join('kategori_pengaduan kp', 'p.id_kategori_pengaduan = kp.id_kategori_pengaduan', 'left');
        $this->db->join('jenis_tuntutan jt', 'p.id_jenis_tuntutan = jt.id_jenis_tuntutan', 'left');
        $this->db->join('status_pengaduan sp', 'p.id_status = sp.id_status', 'left');
        $this->db->where('p.id_kategori_pengaduan', $kategori_id);
        $data['pengaduan'] = $this->db->get()->result_array();

        // Ambil data untuk grafik
        $bulan = $this->input->get('bulan') ?? 5; // Default bulan Mei
        $tahun = $this->input->get('tahun') ?? 2025; // Default tahun 2025

        $this->db->select('
            DATE_FORMAT(tgl_pengaduan) AS tanggal,
            COUNT(CASE WHEN id_kategori_pengaduan = 3 THEN 1 END) AS pengaduan_biasa,
            COUNT(CASE WHEN id_kategori_pengaduan = 2 THEN 1 END) AS prioritas,
            COUNT(CASE WHEN id_kategori_pengaduan = 1 THEN 1 END) AS harus_segera
        ');
        $this->db->from('pengaduan');
        $this->db->where('MONTH(tgl_pengaduan)', $bulan);
        $this->db->where('YEAR(tgl_pengaduan)', $tahun);
        $this->db->group_by('DATE(tgl_pengaduan)');
        $this->db->order_by('DATE(tanggal)', 'ASC');
        $data['grafik_pengaduan'] = $this->db->get()->result_array();

        // Tambahkan judul halaman
        $data['judul'] = 'Kategori Pengaduan';

        // Tambahkan data session user
        $data['user'] = $this->session->userdata();

        // Load view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kategori_pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function klasifikasi_pengaduan_batch()
    {
        // Ambil pengaduan yang belum diklasifikasikan (kategori default: 6)
        $pengaduan = $this->db->get_where('pengaduan', ['id_kategori_pengaduan' => 6])->result_array();

        foreach ($pengaduan as $p) {
            // Panggil fungsi classify_pengaduan dari helper
            $kategori = classify_pengaduan(
                $p['isi_laporan'],
                $p['kerugian_masyarakat'],
                isset($p['nama_toko']) ? $p['nama_toko'] : null
            );

            // Update kategori pengaduan di database
            $this->db->update('pengaduan', ['id_kategori_pengaduan' => $kategori], ['id_pengaduan' => $p['id_pengaduan']]);
            log_message('debug', 'Query Update: ' . $this->db->last_query());
        }

        $this->session->set_flashdata('success', 'Klasifikasi pengaduan selesai.');
        redirect('admin/daftar_pengaduan');
    }

    public function cetak_pengaduan($id_pengaduan)
    {
        // Aktifkan output buffering
        ob_start();

        // Pastikan library PDF dimuat
        $this->load->library('pdf');

        // Ambil data pengaduan berdasarkan ID
        $this->db->select('
            p.id_pengaduan,
            p.id_nik AS nik,
            p.tgl_pengaduan,
            kk.nama_kabupaten_kota AS kabupaten_kota,
            p.nama_pelapor,
            p.no_telp_pelapor,
            p.nama_toko,
            p.alamat_pelaku_usaha,
            p.no_telp_pelaku_usaha,
            jb.jenis_barang_jasa,
            kp.kategori AS kategori_pengaduan,
            p.isi_laporan,
            p.kerugian_masyarakat,
            jt.tuntutan AS jenis_tuntutan,
            sp.status AS status_pengaduan
        ');
        $this->db->from('pengaduan p');
        $this->db->join('kabupaten_kota kk', 'p.id_kabupaten_kota = kk.id_kabupaten_kota', 'left');
        $this->db->join('jenis_barang_jasa jb', 'p.id_jenis_barang_jasa = jb.id_jenis_barang_jasa', 'left');
        $this->db->join('kategori_pengaduan kp', 'p.id_kategori_pengaduan = kp.id_kategori_pengaduan', 'left');
        $this->db->join('jenis_tuntutan jt', 'p.id_jenis_tuntutan = jt.id_jenis_tuntutan', 'left');
        $this->db->join('status_pengaduan sp', 'p.id_status = sp.id_status', 'left');
        $this->db->where('p.id_pengaduan', $id_pengaduan);
        $pengaduan = $this->db->get()->row_array();

        if (!$pengaduan) {
            show_404(); // Tampilkan halaman 404 jika data tidak ditemukan
        }

        // Ambil file pendukung
        $file_pendukung = $this->db->get_where('file_pendukung', ['id_pengaduan' => $id_pengaduan])->result_array();

        // Load view untuk PDF
        $data['pengaduan'] = $pengaduan;
        $data['file_pendukung'] = $file_pendukung;

        // Nama file PDF
        $filename = 'Laporan (' . $pengaduan['nik'] . ').pdf';

        // Generate PDF
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = $filename;

        // Render PDF dan kirim ke browser
        $this->pdf->load_view('admin/cetak_pengaduan', $data);

        // Hentikan output buffering
        ob_end_clean();
    }

    public function cetak_laporan()
    {
        $this->db->select('nik, email');
        $this->db->from('datapenduduk');
        $query = $this->db->get();
        $datapenduduk = $query->result_array();

        // Ambil filter dari GET
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $nik = $this->input->get('nik');

        $data_pengaduan = [];
        if ($tanggal_awal && $tanggal_akhir) {
            $this->db->select('
                p.id_pengaduan,
                p.id_nik AS nik,
                p.tgl_pengaduan,
                kk.nama_kabupaten_kota AS kabupaten_kota,
                p.nama_pelapor,
                p.no_telp_pelapor,
                p.nama_toko,
                p.alamat_pelaku_usaha,
                p.no_telp_pelaku_usaha,
                jb.jenis_barang_jasa,
                kp.kategori AS kategori_pengaduan,
                p.isi_laporan,
                p.kerugian_masyarakat,
                jt.tuntutan AS jenis_tuntutan,
                sp.status AS status_pengaduan,
                p.id_status,
                GROUP_CONCAT(fp.file_path) AS bukti_pendukung
            ');
            $this->db->from('pengaduan p');
            $this->db->join('datapenduduk dp', 'p.id_nik = dp.nik', 'left');
            $this->db->join('kabupaten_kota kk', 'p.id_kabupaten_kota = kk.id_kabupaten_kota', 'left');
            $this->db->join('jenis_barang_jasa jb', 'p.id_jenis_barang_jasa = jb.id_jenis_barang_jasa', 'left');
            $this->db->join('kategori_pengaduan kp', 'p.id_kategori_pengaduan = kp.id_kategori_pengaduan', 'left');
            $this->db->join('jenis_tuntutan jt', 'p.id_jenis_tuntutan = jt.id_jenis_tuntutan', 'left');
            $this->db->join('status_pengaduan sp', 'p.id_status = sp.id_status', 'left');
            $this->db->join('file_pendukung fp', 'p.id_pengaduan = fp.id_pengaduan', 'left');
            $this->db->where('p.tgl_pengaduan >=', $tanggal_awal);
            $this->db->where('p.tgl_pengaduan <=', $tanggal_akhir);
            if (!empty($nik)) {
                $this->db->where('p.id_nik', $nik);
            }
            $this->db->group_by('p.id_pengaduan');
            $query = $this->db->get();
            $data_pengaduan = $query->result_array();
        }

        $data['user'] = $this->session->userdata();
        $data['judul'] = 'Cetak Laporan Pengaduan';
        $data['datapenduduk'] = $datapenduduk;
        $data['data_pengaduan'] = $data_pengaduan;
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['nik'] = $nik;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cetak_laporan', $data);
        $this->load->view('templates/footer');
    }

    public function export_laporan()
    {

        // Ambil input dari form
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $nik = $this->input->get('nik');

        // Query data pengaduan berdasarkan rentang tanggal dan NIK (jika ada)
        $this->db->select('
            p.id_pengaduan,
            p.tgl_pengaduan,
            p.id_nik AS nik,
            dp.email AS nama_pelapor, 
            p.nama_toko,
            p.alamat_pelaku_usaha,
            p.isi_laporan,
            p.kerugian_masyarakat,
            sp.status AS status_pengaduan
        ');
        $this->db->from('pengaduan p');
        $this->db->join('datapenduduk dp', 'p.id_nik = dp.nik', 'left');
        $this->db->join('status_pengaduan sp', 'p.id_status = sp.id_status', 'left');
        $this->db->where('p.tgl_pengaduan >=', $tanggal_awal);
        $this->db->where('p.tgl_pengaduan <=', $tanggal_akhir);

        if (!empty($nik)) {
            $this->db->where('p.id_nik', $nik);
        }

        $query = $this->db->get();
        if (!$query) {
            echo $this->db->last_query(); // Debug query
            print_r($this->db->error());  // Debug error
            exit;
        }

        $pengaduan = $query->result_array();

        // Buat file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'ID Pengaduan');
        $sheet->setCellValue('B1', 'Tanggal Pengaduan');
        $sheet->setCellValue('C1', 'NIK');
        $sheet->setCellValue('D1', 'Nama Pelapor');
        $sheet->setCellValue('E1', 'Nama Toko');
        $sheet->setCellValue('F1', 'Alamat Pelaku Usaha');
        $sheet->setCellValue('G1', 'Isi Laporan');
        $sheet->setCellValue('H1', 'Kerugian Konsumen');
        $sheet->setCellValue('I1', 'Status Pengaduan');

        // Isi data
        $row = 2;
        foreach ($pengaduan as $p) {
            $sheet->setCellValue('A' . $row, $p['id_pengaduan']);
            $sheet->setCellValue('B' . $row, $p['tgl_pengaduan']);
            $sheet->setCellValue('C' . $row, $p['nik']);
            $sheet->setCellValue('D' . $row, $p['nama_pelapor']);
            $sheet->setCellValue('E' . $row, $p['nama_toko']);
            $sheet->setCellValue('F' . $row, $p['alamat_pelaku_usaha']);
            $sheet->setCellValue('G' . $row, $p['isi_laporan']);
            $sheet->setCellValue('H' . $row, $p['kerugian_masyarakat']);
            $sheet->setCellValue('I' . $row, $p['status_pengaduan']);
            $row++;
        }

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan_Pengaduan_' . date('YmdHis') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function kirim_laporan_kabid()
    {
    // Ambil input dari form
    $tanggal_awal = $this->input->get('tanggal_awal');
    $tanggal_akhir = $this->input->get('tanggal_akhir');
    $nik = $this->input->get('nik');

    // Query data pengaduan berdasarkan rentang tanggal dan NIK (jika ada)
    $this->db->select('
        p.id_pengaduan,
        p.tgl_pengaduan,
        p.id_nik AS nik,
        dp.email AS nama_pelapor, 
        p.nama_toko,
        p.alamat_pelaku_usaha,
        p.isi_laporan,
        p.kerugian_masyarakat,
        sp.status AS status_pengaduan
    ');
    $this->db->from('pengaduan p');
    $this->db->join('datapenduduk dp', 'p.id_nik = dp.nik', 'left');
    $this->db->join('status_pengaduan sp', 'p.id_status = sp.id_status', 'left');
    $this->db->where('p.tgl_pengaduan >=', $tanggal_awal);
    $this->db->where('p.tgl_pengaduan <=', $tanggal_akhir);

    if (!empty($nik)) {
        $this->db->where('p.id_nik', $nik);
    }

    $query = $this->db->get();
    $pengaduan = $query->result_array();

    // Buat file Excel
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header kolom
    $sheet->setCellValue('A1', 'ID Pengaduan');
    $sheet->setCellValue('B1', 'Tanggal');
    $sheet->setCellValue('C1', 'NIK');
    $sheet->setCellValue('D1', 'Nama Pelapor');
    $sheet->setCellValue('E1', 'Nama Toko');
    $sheet->setCellValue('F1', 'Alamat Pelaku Usaha');
    $sheet->setCellValue('G1', 'Isi Laporan');
    $sheet->setCellValue('H1', 'Kerugian');
    $sheet->setCellValue('I1', 'Status');

    // Isi data
    $row = 2;
    foreach ($pengaduan as $p) {
        $sheet->setCellValue('A' . $row, $p['id_pengaduan']);
        $sheet->setCellValue('B' . $row, $p['tgl_pengaduan']);
        $sheet->setCellValue('C' . $row, $p['nik']);
        $sheet->setCellValue('D' . $row, $p['nama_pelapor']);
        $sheet->setCellValue('E' . $row, $p['nama_toko']);
        $sheet->setCellValue('F' . $row, $p['alamat_pelaku_usaha']);
        $sheet->setCellValue('G' . $row, $p['isi_laporan']);
        $sheet->setCellValue('H' . $row, $p['kerugian_masyarakat']);
        $sheet->setCellValue('I' . $row, $p['status_pengaduan']);
        $row++;
    }

    // Simpan file Excel ke uploads/Laporan_Pengaduan.xlsx (replace file lama)
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $filename = FCPATH . 'uploads/Laporan_Pengaduan.xlsx';
    $writer->save($filename);

    $this->session->set_flashdata('success', 'Laporan berhasil dikirim ke Kabid.');
    redirect('admin/cetak_laporan');
    }

    public function preview_laporan_xlsx()
    {
        $file = FCPATH . 'uploads/Laporan_Pengaduan.xlsx';

        if (!file_exists($file)) {
            echo '<div class="alert alert-warning">Belum ada laporan yang dikirim oleh admin.</div>';
            return;
        }

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $html = '<div class="table-responsive"><table class="table table-bordered table-striped" style="border:1px solid #ccc;">';
        foreach ($sheet->toArray() as $i => $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $tag = $i == 0 ? 'th' : 'td';
                $html .= "<$tag style=\"border:1px solid #ccc;\">" . htmlspecialchars($cell) . "</$tag>";
            }
            $html .= '</tr>';
        }
        $html .= '</table></div>';

        echo $html;
    }

    public function ubah_password()
    {
        // Ambil data user dari session
        $id_user = $this->session->userdata('id_user');
        if (!$id_user) {
            redirect('admin/login');
        }

        // Ambil data user dari database
        $this->db->select('user.*, roles.role_name');
        $this->db->from('user');
        $this->db->join('roles', 'user.role_id = roles.id_roles', 'left');
        $this->db->where('user.id_user', $id_user);
        $user = $this->db->get()->row_array();

        $data['judul'] = 'Ubah Password';
        $data['user'] = $user;

        // Jika form disubmit
        if ($this->input->post()) {
            $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[6]');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/ubah_password', $data);
                $this->load->view('templates/footer');
            } else {
                $password_baru = $this->input->post('password_baru');
                $this->db->where('id_user', $id_user);
                $this->db->update('user', ['password' => password_hash($password_baru, PASSWORD_DEFAULT)]);
                $this->session->set_flashdata('success', 'Password berhasil diubah.');
                redirect('ubah_password');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_password', $data);
            $this->load->view('templates/footer');
        }
    }

    public function backup_database()
    {
        // Hanya superadmin
        if ($this->session->userdata('role_id') != 3) {
            show_error('Akses ditolak.', 403);
        }

        $data['judul'] = 'Backup Database';
        $data['last_backup'] = null;

        // Cek file backup terakhir
        $backup_dir = FCPATH . 'uploads/';
        $backup_files = glob($backup_dir . 'backup_dbpengaduan_*.sql');
        if ($backup_files) {
            rsort($backup_files); // Urutkan terbaru dulu
            $last_file = basename($backup_files[0]);
            // Ekstrak tanggal dari nama file
            if (preg_match('/backup_dbpengaduan_(\d{4}-\d{2}-\d{2})_\d{2}-\d{2}-\d{2}\.sql/', $last_file, $m)) {
                $data['last_backup'] = date('d-m-Y', strtotime($m[1]));
            }
        }

        $data['user'] = $this->session->userdata();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/backup_database', $data);
        $this->load->view('templates/footer');
    }

    public function do_backup_database()
    {
        if ($this->session->userdata('role_id') != 3) {
            show_error('Akses ditolak.', 403);
        }

        $this->load->dbutil();
        $prefs = [
            'format'      => 'txt',
            'filename'    => 'dbpengaduan.sql'
        ];
        $backup =& $this->dbutil->backup($prefs);

        $tanggal = date('Y-m-d_H-i-s');
        $backup_name = "backup_dbpengaduan_{$tanggal}.sql";
        $save_path = FCPATH . "uploads/{$backup_name}";

        // Simpan file ke server
        $this->load->helper('file');
        write_file($save_path, $backup);

        // Download ke user
        $this->load->helper('download');
        force_download($backup_name, $backup);
    }

    public function data_masyarakat()
    {
        if ($this->session->userdata('role_id') != 1) {
            show_error('Akses ditolak.', 403);
        }
        $data['judul'] = 'Data Masyarakat';
        $data['user'] = $this->session->userdata();
        $data['pengguna_masyarakat'] = $this->db->get('datapenduduk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_masyarakat', $data);
        $this->load->view('templates/footer');
    }
}