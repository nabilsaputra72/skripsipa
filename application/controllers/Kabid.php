<?php
class Kabid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaduan_model');
        // Izinkan kabid (2) dan superadmin (3)
        if (!in_array($this->session->userdata('role_id'), [2, 3])) {
            show_error('Akses ditolak.', 403);
        }
    }

    public function index()
    {
        redirect('kabid/persetujuan_pengaduan');
    }

    public function persetujuan_pengaduan()
    {
        $data['judul'] = 'Persetujuan Tindak Lanjut Pengaduan';
        $data['user'] = $this->session->userdata();

        // Total per kategori
        $data['total_pengaduan'] = [
            'harus_segera' => $this->db->where('id_kategori_pengaduan', 1)->count_all_results('pengaduan'),
            'prioritas' => $this->db->where('id_kategori_pengaduan', 2)->count_all_results('pengaduan'),
            'pengaduan_biasa' => $this->db->where('id_kategori_pengaduan', 3)->count_all_results('pengaduan'),
            'belum_ditentukan' => $this->db->where('id_kategori_pengaduan', 6)->count_all_results('pengaduan'),
        ];

        // Gabungkan semua pengaduan, urutkan sesuai kategori
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
            p.id_kategori_pengaduan,
            p.disetujui_kabid
        ');
        $this->db->from('pengaduan p');
        $this->db->join('kabupaten_kota kk', 'p.id_kabupaten_kota = kk.id_kabupaten_kota', 'left');
        $this->db->join('jenis_barang_jasa jb', 'p.id_jenis_barang_jasa = jb.id_jenis_barang_jasa', 'left');
        $this->db->join('kategori_pengaduan kp', 'p.id_kategori_pengaduan = kp.id_kategori_pengaduan', 'left');
        $this->db->join('jenis_tuntutan jt', 'p.id_jenis_tuntutan = jt.id_jenis_tuntutan', 'left');
        $this->db->join('status_pengaduan sp', 'p.id_status = sp.id_status', 'left');
        $this->db->order_by('FIELD(p.id_kategori_pengaduan, 1,2,3,6)');
        $this->db->order_by('p.tgl_pengaduan', 'DESC');
        $data['pengaduan'] = $this->db->get()->result_array();

        // Pengaduan belum disetujui Kabid
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
            p.id_kategori_pengaduan,
            p.disetujui_kabid,
            GROUP_CONCAT(fp.file_path) AS bukti_pendukung
        ');
        $this->db->from('pengaduan p');
        $this->db->join('kabupaten_kota kk', 'p.id_kabupaten_kota = kk.id_kabupaten_kota', 'left');
        $this->db->join('jenis_barang_jasa jb', 'p.id_jenis_barang_jasa = jb.id_jenis_barang_jasa', 'left');
        $this->db->join('kategori_pengaduan kp', 'p.id_kategori_pengaduan = kp.id_kategori_pengaduan', 'left');
        $this->db->join('jenis_tuntutan jt', 'p.id_jenis_tuntutan = jt.id_jenis_tuntutan', 'left');
        $this->db->join('status_pengaduan sp', 'p.id_status = sp.id_status', 'left');
        $this->db->join('file_pendukung fp', 'p.id_pengaduan = fp.id_pengaduan', 'left');
        $this->db->where('p.disetujui_kabid', 0);
        $this->db->group_by('p.id_pengaduan');
        $this->db->order_by('FIELD(p.id_kategori_pengaduan, 1,2,3,6)');
        $this->db->order_by('p.tgl_pengaduan', 'DESC');
        $data['pengaduan_belum'] = $this->db->get()->result_array();

        // Pengaduan sudah disetujui Kabid
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
            p.id_kategori_pengaduan,
            p.disetujui_kabid,
            GROUP_CONCAT(fp.file_path) AS bukti_pendukung
        ');
        $this->db->from('pengaduan p');
        $this->db->join('kabupaten_kota kk', 'p.id_kabupaten_kota = kk.id_kabupaten_kota', 'left');
        $this->db->join('jenis_barang_jasa jb', 'p.id_jenis_barang_jasa = jb.id_jenis_barang_jasa', 'left');
        $this->db->join('kategori_pengaduan kp', 'p.id_kategori_pengaduan = kp.id_kategori_pengaduan', 'left');
        $this->db->join('jenis_tuntutan jt', 'p.id_jenis_tuntutan = jt.id_jenis_tuntutan', 'left');
        $this->db->join('status_pengaduan sp', 'p.id_status = sp.id_status', 'left');
        $this->db->join('file_pendukung fp', 'p.id_pengaduan = fp.id_pengaduan', 'left');
        $this->db->where('p.disetujui_kabid', 1);
        $this->db->group_by('p.id_pengaduan');
        $this->db->order_by('FIELD(p.id_kategori_pengaduan, 1,2,3,6)');
        $this->db->order_by('p.tgl_pengaduan', 'DESC');
        $data['pengaduan_sudah'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kabid/persetujuan_pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function setujui($id_pengaduan)
    {
        $this->db->update('pengaduan', ['disetujui_kabid' => 1], ['id_pengaduan' => $id_pengaduan]);
        $this->session->set_flashdata('success', 'Pengaduan telah disetujui untuk ditindaklanjuti.');
        redirect('kabid/persetujuan_pengaduan');
    }

    public function laporan_pengaduan()
    {
        // Siapkan data grafik/laporan jika perlu
        $data['judul'] = 'Laporan Pengaduan';
        $data['user'] = $this->session->userdata();

        // Grafik bulanan
        $bulan = $this->input->get('bulan') ?? date('n');
        $tahun = $this->input->get('tahun') ?? date('Y');
        $this->db->select('
            DATE_FORMAT(tgl_pengaduan, "%d") AS tanggal,
            COUNT(CASE WHEN id_kategori_pengaduan = 3 THEN 1 END) AS pengaduan_biasa,
            COUNT(CASE WHEN id_kategori_pengaduan = 2 THEN 1 END) AS prioritas,
            COUNT(CASE WHEN id_kategori_pengaduan = 1 THEN 1 END) AS harus_segera
        ');
        $this->db->from('pengaduan');
        $this->db->where('MONTH(tgl_pengaduan)', $bulan);
        $this->db->where('YEAR(tgl_pengaduan)', $tahun);
        $this->db->group_by('DATE(tgl_pengaduan)');
        $this->db->order_by('DATE(tgl_pengaduan)', 'ASC');
        $data['grafik_pengaduan'] = $this->db->get()->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kabid/laporan_pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function kepuasan()
    {
        $this->load->model('Kepuasan_model');
        $data['user'] = $this->session->userdata();
        
        $data['judul'] = 'Kepuasan Masyarakat';
        $data['statistik'] = $this->Kepuasan_model->get_statistik_kepuasan();
        $data['komentar'] = $this->Kepuasan_model->get_komentar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kabid/kepuasan', $data);
        $this->load->view('templates/footer');
    }
}