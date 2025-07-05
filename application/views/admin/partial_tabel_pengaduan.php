<!-- filepath: c:\xampp74\htdocs\pengaduan\application\views\admin\partial_tabel_pengaduan.php -->
<div class="table-responsive">
    <table id="table-pengaduan" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Tanggal Pengaduan</th>
                <th>Kabupaten/Kota</th>
                <th>Nama Pelapor</th>
                <th>No Telpon Pelapor</th>
                <th>Nama Toko</th>
                <th>Alamat Pelaku Usaha</th>
                <th>Jenis Barang/Jasa</th>
                <th>Kategori Pengaduan</th>
                <th>Isi Kronologi Pengaduan</th>
                <th>Kerugian Konsumen</th>
                <th>Jenis Tuntutan Konsumen</th>
                <th>Status Pengaduan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($pengaduan)) : ?>
                <tr>
                    <td colspan="14" class="text-center">Tidak ada data pengaduan yang ditemukan!</td>
                </tr>
            <?php else : ?>
                <?php foreach ($pengaduan as $num => $p) : ?>
                    <tr>
                        <td><?= $num + 1; ?></td>
                        <td><?= $p['nik']; ?></td>
                        <td><?= $p['tgl_pengaduan']; ?></td>
                        <td><?= $p['kabupaten_kota']; ?></td>
                        <td><?= $p['nama_pelapor']; ?></td>
                        <td><?= $p['no_telp_pelapor']; ?></td>
                        <td><?= $p['nama_toko']; ?></td>
                        <td><?= $p['alamat_pelaku_usaha']; ?></td>
                        <td><?= $p['jenis_barang_jasa']; ?></td>
                        <td><?= $p['kategori_pengaduan']; ?></td>
                        <td><?= $p['isi_laporan']; ?></td>
                        <td><?= $p['kerugian_masyarakat']; ?></td>
                        <td><?= $p['jenis_tuntutan']; ?></td>
                        <td><?= $p['status_pengaduan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>