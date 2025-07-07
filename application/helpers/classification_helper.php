<?php
function classify_pengaduan($isi_laporan, $kerugian_masyarakat, $nama_toko = null, $isi_laporan_tambahan = null, $kerugian_tambahan = null)
{
    $CI =& get_instance();

    if ($isi_laporan_tambahan === 'ancaman_kesehatan' || $kerugian_tambahan === 'gt_10jt' || $kerugian_tambahan === 'kerugian_kesehatan') {
        return 1; // Harus Segera Diselesaikan
    }
    if ($isi_laporan_tambahan === 'kerugian_materil' || $kerugian_tambahan === 'gt_5jt') {
        return 2; // Prioritas
    }
    if ($isi_laporan_tambahan === 'kerugian_sosial' || $kerugian_tambahan === 'kerugian_sosial') {
        // Cek isi laporan, jika ada kata kunci tertentu, bisa masuk kategori 2 (Prioritas), selain itu kategori 3 (Biasa)
        if (preg_match('/(kerugian massal|berdampak sosial|kerugian komunitas)/i', $isi_laporan)) {
            return 2; // Prioritas
        }
        return 3; // Pengaduan Biasa
    }
    if ($kerugian_tambahan === 'lt_5jt') {
        return 3; // Pengaduan Biasa
    }

    // 1. Jika nama_toko dilaporkan lebih dari dua kali, kategori 1
    if ($nama_toko) {
        $count = $CI->db->where('nama_toko', $nama_toko)->count_all_results('pengaduan');
        if ($count > 2) {
            return 1; // Harus Segera Diselesaikan
        }
    }

    // 4. Kategori 1: Harus Segera Diselesaikan (perluas regex)
    if (
        preg_match('/kerugian.*(> ?20 ?juta|lebih dari 20 ?juta|berdampak massal|kerugian massal|lebih dari 10 orang)/i', $kerugian_masyarakat) ||
        preg_match('/ancaman kesehatan|ancaman serius|keselamatan|kadaluarsa|kesehatan terancam|keracunan|penipuan/i', $isi_laporan)
    ) {
        return 1;
    }

    // 3. Kategori 2: Prioritas
    if (
        preg_match('/kerugian.*(5 ?juta.*20 ?juta|Rp ?5.*20 ?juta)/i', $kerugian_masyarakat) ||
        preg_match('/gangguan aktivitas|tidak kooperatif|servis berbayar|tidak mengganti komponen|aset|kendaraan bermasalah|servis tidak ada/i', $isi_laporan)
    ) {
        return 2;
    }

    // 2. Kategori 3: Pengaduan Biasa
    if (
        (
            preg_match('/kerugian.*(<|kurang dari|dibawah|di bawah|di bawah Rp ?5 ?juta|< ?5 ?juta)/i', $kerugian_masyarakat) ||
            preg_match('/individu|tidak berulang/i', $isi_laporan)
        ) ||
        preg_match('/menolak.*(ganti|perbaiki).*kelalaian konsumen/i', $isi_laporan) ||
        preg_match('/setelah 3 bulan.*rusak/i', $isi_laporan)
    ) {
        return 3;
    }

    // 5. Default: Belum Ditentukan
    return 6;
}