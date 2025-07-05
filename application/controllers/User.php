<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('classification_helper');
        $this->load->helper('fonnte'); // Pastikan helper twilio dimuat
    }

    public function pengaduan()
    {
        $nik = $this->input->get('nik', true);

        // Validasi apakah NIK ada di database
        $penduduk = $this->db->get_where('datapenduduk', ['nik' => $nik])->row_array();
        if (!$penduduk) {
            show_error('NIK tidak valid atau tidak terdaftar.', 404);
        }

        // Simpan NIK ke session
        $this->session->set_userdata('nik', $nik);


        // Ambil data kabupaten/kota
        $data['kabupaten_kota'] = $this->db->get('kabupaten_kota')->result_array();

        // Data untuk halaman pertama
        $data['judul'] = 'Form Pengaduan';
        $data['nik'] = $nik;
        $data['email'] = $penduduk['email'];

        $this->load->view('user/pengaduan', $data);
    }

    public function pengaduan_lanjutan()
    {
        // Ambil data jenis barang/jasa dan jenis tuntutan
        $data['jenis_barang_jasa'] = $this->db->get('jenis_barang_jasa')->result_array();
        $data['jenis_tuntutan'] = $this->db->get('jenis_tuntutan')->result_array();

        // Data untuk halaman kedua
        $data['judul'] = 'Form Pengaduan Lanjutan';
        $data['nik'] = $this->input->post('nik');

        $this->load->view('user/pengaduan_lanjutan', $data);
    }

    public function simpan_pengaduan()
    {
        // Validasi input
        $this->form_validation->set_rules('id_jenis_barang_jasa', 'Jenis Barang/Jasa', 'required');
        $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required');
        $this->form_validation->set_rules('kerugian_masyarakat', 'Kerugian Masyarakat', 'required');
        $this->form_validation->set_rules('id_jenis_tuntutan', 'Jenis Tuntutan', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('user/pengaduan_lanjutan');
        }

        // Ambil NIK dari input atau session
        $nik = $this->session->userdata('nik');
        if (empty($nik)) {
            $this->session->set_flashdata('error', 'NIK tidak ditemukan. Silakan login ulang.');
            redirect('auth');
        }

        // Simpan NIK ke session jika belum ada
        if (!$this->session->userdata('nik')) {
            $this->session->set_userdata('nik', $nik);
            log_message('debug', 'NIK di session: ' . $this->session->userdata('nik'));
        }

        // Validasi apakah NIK ada di tabel datapenduduk
        $penduduk = $this->db->get_where('datapenduduk', ['nik' => $nik])->row_array();
        if (!$penduduk) {
            $this->session->set_flashdata('error', 'NIK tidak valid atau tidak terdaftar.');
            redirect('auth');
        }

        // Simpan data pengaduan ke database
        $data_pengaduan = [
            'id_nik' => $nik,
            'tgl_pengaduan' => date('Y-m-d H:i:s'),
            'id_kabupaten_kota' => $this->input->post('kabupaten_kota'),
            'nama_pelapor' => $this->input->post('nama_pelapor'),
            'no_telp_pelapor' => $this->input->post('no_telp_pelapor'),
            'nama_toko' => $this->input->post('nama_toko'),
            'alamat_pelaku_usaha' => $this->input->post('alamat_pelaku_usaha'),
            'no_telp_pelaku_usaha' => $this->input->post('no_telp_pelaku_usaha'),
            'id_jenis_barang_jasa' => $this->input->post('id_jenis_barang_jasa'),
            'isi_laporan' => $this->input->post('isi_laporan'),
            'kerugian_masyarakat' => $this->input->post('kerugian_masyarakat'),
            'id_jenis_tuntutan' => $this->input->post('id_jenis_tuntutan'),
            'id_status' => 1, // Status default: Diterima
            'id_kategori_pengaduan' => 6 // Default: Belum Ditentukan
        ];

        if (!$this->db->insert('pengaduan', $data_pengaduan)) {
            log_message('error', 'Gagal menyimpan data pengaduan: ' . $this->db->last_query());
            $this->session->set_flashdata('error', 'Gagal menyimpan pengaduan.');
            redirect('user/pengaduan_lanjutan');
        }

        // Ambil ID pengaduan yang baru disimpan
        $id_pengaduan = $this->db->insert_id();
        log_message('debug', 'Query Pengaduan: ' . $this->db->last_query());

        // Ambil data isi laporan, kerugian masyarakat, dan nama toko dari input
        $isi_laporan = $this->input->post('isi_laporan');
        $kerugian_masyarakat = $this->input->post('kerugian_masyarakat');
        $nama_toko = $this->input->post('nama_toko');
        $isi_laporan_tambahan = $this->input->post('isi_laporan_tambahan');
        $isi_laporan_lainnya = $this->input->post('isi_laporan_lainnya');
        $kerugian_tambahan = $this->input->post('kerugian_tambahan');

        // Kirim ke classify_pengaduan
        $kategori = classify_pengaduan(
            $isi_laporan,
            $kerugian_masyarakat,
            $nama_toko,
            $isi_laporan_tambahan,
            $kerugian_tambahan
        );

        // Update kategori pengaduan berdasarkan hasil klasifikasi
        $this->db->update('pengaduan', ['id_kategori_pengaduan' => $kategori], ['id_pengaduan' => $id_pengaduan]);

        // Proses upload file pendukung
        if (!empty($_FILES['file_pendukung']['name'][0])) {
        $files = $_FILES;
        $file_count = count($_FILES['file_pendukung']['name']);
        for ($i = 0; $i < $file_count; $i++) {
        $_FILES['file_pendukung']['name']     = $files['file_pendukung']['name'][$i];
        $_FILES['file_pendukung']['type']     = $files['file_pendukung']['type'][$i];
        $_FILES['file_pendukung']['tmp_name'] = $files['file_pendukung']['tmp_name'][$i];
        $_FILES['file_pendukung']['error']    = $files['file_pendukung']['error'][$i];
        $_FILES['file_pendukung']['size']     = $files['file_pendukung']['size'][$i];

        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
        $config['max_size']      = 20480; // 20MB
        $config['file_name']     = 'file_' . time() . '_' . $i;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_pendukung')) {
                $file_data = $this->upload->data();
                $data_file = [
                    'id_pengaduan' => $id_pengaduan,
                    'file_path' => 'uploads/' . $file_data['file_name'],
                    'file_type' => $file_data['file_type']
                ];

                if (!$this->db->insert('file_pendukung', $data_file)) {
                    log_message('error', 'Gagal menyimpan data file pendukung: ' . $this->db->last_query());
                }
            } else {
                log_message('error', 'Gagal mengunggah file pendukung: ' . $this->upload->display_errors());
            }
        }
        
        // Kirim pesan WhatsApp menggunakan Fonnte
            $no_telp_pelapor = $this->input->post('no_telp_pelapor');
            $link_detail_pengaduan = base_url('user/lihat_pengaduan/' . $id_pengaduan);
            $message = "Pengaduan Anda telah berhasil dikirimkan. Anda dapat memonitor status pengaduan Anda melalui link berikut: $link_detail_pengaduan";

            if (send_fonnte_message($no_telp_pelapor, $message)) {
                log_message('info', 'Pesan WhatsApp berhasil dikirim ke ' . $no_telp_pelapor);
            } else {
                log_message('error', 'Gagal mengirim pesan WhatsApp ke ' . $no_telp_pelapor);
            }

            // Redirect ke halaman detail pengaduan
            $this->session->set_flashdata('success', 'Pengaduan Anda berhasil dikirim.');
            redirect('user/lihat_pengaduan/' . $id_pengaduan);
    }
}
    

    public function lihat_pengaduan($id_pengaduan)
    {
        // Ambil data pengaduan berdasarkan ID saja, tanpa cek session nik
        $pengaduan = $this->db->get_where('pengaduan', ['id_pengaduan' => $id_pengaduan])->row_array();
        if (!$pengaduan) {
            show_error('Pengaduan tidak ditemukan.', 404);
        }

        // Ambil file pendukung terkait pengaduan
        $file_pendukung = $this->db->get_where('file_pendukung', ['id_pengaduan' => $id_pengaduan])->result_array();

        // Ambil status pengaduan
        $status_pengaduan = $this->db->get_where('status_pengaduan', ['id_status' => $pengaduan['id_status']])->row_array();

        // Ambil deskripsi jenis barang/jasa
        $jenis_barang_jasa = $this->db->get_where('jenis_barang_jasa', ['id_jenis_barang_jasa' => $pengaduan['id_jenis_barang_jasa']])->row_array();

        // Ambil jenis tuntutan
        $jenis_tuntutan = $this->db->get_where('jenis_tuntutan', ['id_jenis_tuntutan' => $pengaduan['id_jenis_tuntutan']])->row_array();

        $data = [
            'judul' => 'Detail Pengaduan',
            'pengaduan' => $pengaduan,
            'file_pendukung' => $file_pendukung,
            'status_pengaduan' => $status_pengaduan,
            'jenis_barang_jasa' => $jenis_barang_jasa,
            'jenis_tuntutan' => $jenis_tuntutan
        ];

        $this->load->view('user/detail_pengaduan', $data);
    }

    public function edit_pengaduan($id_pengaduan)
    {
        // Validasi apakah pengaduan milik pengguna yang sedang login
        $nik = $this->session->userdata('nik'); // Ambil NIK dari session
        $pengaduan = $this->db->get_where('pengaduan', ['id_pengaduan' => $id_pengaduan, 'id_nik' => $nik])->row_array();

        if (!$pengaduan || $pengaduan['id_status'] >= 2) {
            show_error('Anda tidak dapat mengubah pengaduan ini.', 403);
        }

        // Ambil data jenis barang/jasa dan jenis tuntutan
        $data['jenis_barang_jasa'] = $this->db->get('jenis_barang_jasa')->result_array();
        $data['jenis_tuntutan'] = $this->db->get('jenis_tuntutan')->result_array();
        $data['pengaduan'] = $pengaduan;

        // Ambil file pendukung
        $data['file_pendukung'] = $this->db->get_where('file_pendukung', ['id_pengaduan' => $id_pengaduan])->result_array();

        // Tambahkan variabel judul
         $data['judul'] = 'Edit Pengaduan';

        $this->load->view('user/edit_pengaduan', $data);
    }

    public function update_pengaduan($id_pengaduan)
    {
        // Validasi input
        $this->form_validation->set_rules('nama_pelapor', 'Nama Pelapor', 'required');
        $this->form_validation->set_rules('alamat_pelaku_usaha', 'Alamat Pelaku Usaha', 'required');
        $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required');
        $this->form_validation->set_rules('kerugian_masyarakat', 'Kerugian Masyarakat', 'required');

        if ($this->form_validation->run() == false) {
            $this->edit_pengaduan($id_pengaduan);
        } else {
            // Update data pengaduan
            $data_update = [
                'nama_pelapor' => $this->input->post('nama_pelapor'),
                'no_telp_pelapor' => $this->input->post('no_telp_pelapor'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_pelaku_usaha' => $this->input->post('alamat_pelaku_usaha'),
                'id_jenis_barang_jasa' => $this->input->post('id_jenis_barang_jasa'),
                'isi_laporan' => $this->input->post('isi_laporan'),
                'kerugian_masyarakat' => $this->input->post('kerugian_masyarakat'),
                'id_jenis_tuntutan' => $this->input->post('id_jenis_tuntutan')
            ];

            $this->db->where('id_pengaduan', $id_pengaduan);
            $this->db->update('pengaduan', $data_update);

            // Proses upload file pendukung jika ada
            if (!empty($_FILES['file_pendukung']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
                $config['max_size'] = 20480; // Maksimal 20MB
                $config['file_name'] = 'file_' . time(); // Nama file unik

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_pendukung')) {
                    $file_data = $this->upload->data();
                    $data_file = [
                        'id_pengaduan' => $id_pengaduan,
                        'file_path' => 'uploads/' . $file_data['file_name'],
                        'file_type' => $file_data['file_type']
                    ];

                    $this->db->insert('file_pendukung', $data_file);
                }
            }

            $this->session->set_flashdata('success', 'Pengaduan berhasil diperbarui.');
            redirect('user/lihat_pengaduan/' . $id_pengaduan);
        }
    }

    public function simpan_kepuasan($id_pengaduan)
    {
        $nilai = $this->input->post('nilai');
        $komentar = $this->input->post('komentar');

        // Ambil NIK dari pengaduan, bukan dari session
        $pengaduan = $this->db->get_where('pengaduan', ['id_pengaduan' => $id_pengaduan])->row_array();
        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Pengaduan tidak ditemukan.');
            redirect('user/lihat_pengaduan/' . $id_pengaduan);
        }
        $nik = $pengaduan['id_nik'];

        if (!$nilai) {
            $this->session->set_flashdata('error', 'Penilaian bintang wajib diisi.');
            redirect('user/lihat_pengaduan/' . $id_pengaduan);
        }

        // Cegah double entry
        $sudah = $this->db->where('id_pengaduan', $id_pengaduan)->where('id_nik', $nik)->get('kepuasan')->row();
        if ($sudah) {
            $this->session->set_flashdata('error', 'Anda sudah pernah memberi penilaian.');
            redirect('user/lihat_pengaduan/' . $id_pengaduan);
        }

        $this->db->insert('kepuasan', [
            'id_pengaduan' => $id_pengaduan,
            'id_nik' => $nik,
            'nilai' => $nilai,
            'komentar' => $komentar,
            'tanggal' => date('Y-m-d H:i:s')
        ]);
        $this->session->set_flashdata('success', 'Kepuasan Anda telah dikirim.');
        redirect('user/lihat_pengaduan/' . $id_pengaduan);
    }
}