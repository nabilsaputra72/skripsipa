<!-- filepath: c:\xampp74\htdocs\pengaduan\application\views\admin\cetak_pengaduan.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengaduan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; text-align: left; }
        h1, h2, h3 { text-align: center; }
        .page-break { page-break-before: always; }
    </style>
</head>
<body>
    <!-- Halaman Pertama: Data Pengaduan -->
    <h1>Laporan Pengaduan</h1>
    <h2>Data Pengaduan</h2>
    <table>
        <tr><th>NIK</th><td><?= $pengaduan['nik']; ?></td></tr>
        <tr><th>Nama Pelapor</th><td><?= $pengaduan['nama_pelapor']; ?></td></tr>
        <tr><th>No Telepon Pelapor</th><td><?= $pengaduan['no_telp_pelapor']; ?></td></tr>
        <tr><th>Nama Toko</th><td><?= $pengaduan['nama_toko']; ?></td></tr>
        <tr><th>Alamat Pelaku Usaha</th><td><?= $pengaduan['alamat_pelaku_usaha']; ?></td></tr>
        <tr><th>No Telepon Pelaku Usaha</th><td><?= $pengaduan['no_telp_pelaku_usaha']; ?></td></tr>
        <tr><th>Jenis Barang/Jasa</th><td><?= $pengaduan['jenis_barang_jasa']; ?></td></tr>
        <tr><th>Kategori Pengaduan</th><td><?= $pengaduan['kategori_pengaduan']; ?></td></tr>
        <tr><th>Isi Laporan</th><td><?= $pengaduan['isi_laporan']; ?></td></tr>
        <tr><th>Kerugian Konsumen</th><td><?= $pengaduan['kerugian_masyarakat']; ?></td></tr>
        <tr><th>Jenis Tuntutan</th><td><?= $pengaduan['jenis_tuntutan']; ?></td></tr>
        <tr><th>Status Pengaduan</th><td><?= $pengaduan['status_pengaduan']; ?></td></tr>
    </table>

    <!-- Halaman Kedua: Bukti Pendukung -->
    <div class="page-break"></div>
    <h2>Bukti Pendukung</h2>
    <?php if (!empty($file_pendukung)) : ?>
        <?php foreach ($file_pendukung as $file) : ?>
            <?php
                $file_path = FCPATH . $file['file_path'];
                $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                $image_url = base_url($file['file_path']);

            ?>
            <?php if (file_exists($file_path)) : ?>
                <?php if (in_array(strtolower($file_extension), ['jpg', 'jpeg', 'png'])) : ?>
                    <?php
                        $relative_path = './uploads/' . basename($file['file_path']);
                    ?>
                    <!-- Tampilkan gambar -->
                    <div class="image-preview">
                        <img src="<?= $image_url; ?>" alt="Bukti Pendukung" style="max-width: 100%; height: auto;">
                    </div>
                <?php elseif (in_array(strtolower($file_extension), ['pdf'])) : ?>
                    <!-- Tampilkan PDF -->
                    <div class="doc-preview">
                        <embed src="<?= $image_url; ?>" type="application/pdf" width="100%" height="500px">
                    </div>
                <?php else : ?>
                    <!-- Tampilkan nama file untuk dokumen lain -->
                    <div class="doc-preview">
                        <p>Dokumen Pendukung: <?= basename($file['file_path']); ?></p>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <p>File tidak ditemukan: <?= $file['file_path']; ?></p>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Tidak ada bukti pendukung.</p>
    <?php endif; ?>
</body>
</html>