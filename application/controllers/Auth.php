<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        // Pastikan method ini berfungsi
        $data['judul'] = 'Halaman Login';
        $this->load->view('auth/index', $data);
    }

    public function save_data_penduduk()
    {
        // Validasi input
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|trim');

        if ($this->form_validation->run() == false) {
            log_message('error', 'Validasi input gagal: ' . validation_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Input tidak valid. Silakan coba lagi.</div>');
            redirect('auth');
        
        } else {
            // Ambil data dari form
            $email = htmlspecialchars($this->input->post('email', true));
            $nik = htmlspecialchars($this->input->post('nik', true));
    
            // Validasi dua digit awal harus 63
            if (substr($nik, 0, 2) !== '63') {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">NIK harus diawali dengan 63 (Kalimantan Selatan).</div>');
                redirect('auth');
            }

            // Cek apakah NIK sudah ada di database
            $existing = $this->db->get_where('datapenduduk', ['nik' => $nik])->row_array();
    
            if ($existing) {
                log_message('info', 'NIK sudah terdaftar: ' . $nik);
                $this->session->set_flashdata('message', '<div class="alert alert-warning">NIK sudah terdaftar.</div>');
            } else {
                // Simpan data ke database
                $data = [
                    'nik' => $nik,
                    'email' => $email,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                if (!$this->db->insert('datapenduduk', $data)) {
                    log_message('error', 'Gagal menyimpan data ke database: ' . $this->db->last_query());
                } else {
                    log_message('info', 'Data berhasil disimpan ke database: ' . $this->db->last_query());
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan!</div>');
                }
            }
    
            // Redirect kembali ke halaman form
            redirect('auth');
        }
    }

    public function handle_form()
    {
        $nik = $this->input->post('nik');
        $email = $this->input->post('email');

        // Daftar kode wilayah Kalimantan Selatan
        $wilayah_kalsel = [
            '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '71', '72'
        ];

        // Validasi NIK awalan 63 dan dua digit berikutnya sesuai wilayah
        if (!preg_match('/^63(\d{2})/', $nik, $matches) || !in_array($matches[1], $wilayah_kalsel)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">NIK yang anda masukkan tidak termasuk wilayah kalimantan selatan</div>');
            redirect('auth');
            return;
        }

        // Simpan data ke database jika belum ada
        $existing = $this->db->get_where('datapenduduk', ['nik' => $nik])->row_array();
        if ($existing) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning">NIK sudah terdaftar.</div>');
            redirect('auth');
            return;
        } else {
            $data = [
                'nik' => $nik,
                'email' => $email,
                'created_at' => date('Y-m-d H:i:s')
            ];
            if (!$this->db->insert('datapenduduk', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menyimpan data ke database.</div>');
                redirect('auth');
                return;
            }
        }

        // Kirim email konfirmasi
        $this->load->library('email');
        $this->email->from('nabilsaputra736@gmail.com', 'Admin');
        $this->email->to($email);
        $this->email->subject('Konfirmasi Pengaduan Anda');
        $this->email->message("
            <p>Halo,</p>
            <p>Terima kasih telah menggunakan layanan pengaduan kami.</p>
            <p>NIK Anda: <strong>$nik</strong></p>
            <p>Silakan klik link berikut untuk melanjutkan pengaduan Anda:</p>
            <a href='" . base_url('user/pengaduan?nik=' . $nik) . "'>Form Pengaduan</a>
            <p>Salam,</p>
            <p>Tim Unit Layanan Perlindungan Konsumen</p>
        ");

        if ($this->email->send()) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Email berhasil dikirim! Silakan cek email Anda.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal mengirim email. Silakan coba lagi.</div>');
            echo $this->email->print_debugger();
            exit;
        }

        // Redirect kembali ke halaman form
        redirect('auth');
    }

    public function send_email()
    {
        $email = $this->input->post('email', true);
        $nik = $this->input->post('nik', true);
    
        // Validasi input
        if (empty($email) || empty($nik)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Email dan NIK wajib diisi!</div>');
            redirect('auth');
        }
    
        // Proses pengiriman email
        $this->load->library('email');
        $this->email->from('nabilsaputra736@gmail.com', 'Admin');
        $this->email->to($email);
        $this->email->subject('Konfirmasi Pengaduan Anda');
        $this->email->message("
            <p>Halo,</p>
            <p>Terima kasih telah menggunakan layanan pengaduan kami.</p>
            <p>NIK Anda: <strong>$nik</strong></p>
            <p>Silakan klik link berikut untuk melanjutkan pengaduan Anda:</p>
            <a href='" . base_url('user/pengaduan?nik=' . $nik) . "'>Form Pengaduan</a>
            <p>Salam,</p>
            <p>LAPOR Desa</p>
        ");
    
        if ($this->email->send()) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Email berhasil dikirim! Silakan cek email Anda.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal mengirim email. Silakan coba lagi.</div>');
            echo $this->email->print_debugger();
            exit;
        }
    
        redirect('auth');
    }

    public function notfound()
    {
        $this->output->set_status_header('404');
        $data['heading'] = '404 Page Not Found';
        $data['message'] = 'The page you are looking for does not exist.';
        $this->load->view('errors/html/error_404', $data);
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('users', ['username' => $username])->row_array();

            if ($user && password_verify($password, $user['password'])) {
                $this->session->set_userdata([
                    'nik' => $user['nik'], // Simpan NIK ke session
                    'username' => $user['username'],
                    'logged_in' => true
                ]);
                redirect('user/pengaduan');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('auth/login');
            }
        }
    }
}
