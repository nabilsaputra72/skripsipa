<?php
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-print"></i> Cetak Laporan Pengaduan</h1>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="alert alert-info">
        <i class="fas fa-info-circle"></i> Silahkan pilih range tanggal untuk menemukan list data pengaduan yang ingin dicetak sebagai laporan.
    </div>
    <form method="get" action="<?= base_url('admin/cetak_laporan'); ?>">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="tanggal_awal">Dari Tanggal:</label>
                <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" required value="<?= isset($tanggal_awal) ? $tanggal_awal : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="tanggal_akhir">Sampai Tanggal:</label>
                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required value="<?= isset($tanggal_akhir) ? $tanggal_akhir : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="nik">Filter NIK <small class="text-muted">(Opsional)</small>:</label>
                <select class="form-control" id="nik" name="nik">
                    <option value="">-- Pilih Semua --</option>
                    <?php foreach ($datapenduduk as $dp) : ?>
                        <option value="<?= $dp['nik']; ?>" <?= (isset($nik) && $nik == $dp['nik']) ? 'selected' : '' ?>>
                            <?= $dp['nik']; ?> - <?= $dp['email']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cek</button>
        <button type="submit" formaction="<?= base_url('admin/export_laporan'); ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> Excel</button>
        <button type="submit" formaction="<?= base_url('admin/kirim_laporan_kabid'); ?>" class="btn btn-info">
            <i class="fas fa-paper-plane"></i> Kirim ke Kabid
        </button>
    </form>
    <hr>
    <div id="result">
        <?php if (!empty($data_pengaduan)) : ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Pengaduan</th>
                            <th>Tanggal</th>
                            <th>NIK</th>
                            <th>Kabupaten/Kota</th>
                            <th>Nama Pelapor</th>
                            <th>No. Telp Pelapor</th>
                            <th>Nama Toko</th>
                            <th>Alamat Pelaku Usaha</th>
                            <th>No. Telp Pelaku Usaha</th>
                            <th>Jenis Barang/Jasa</th>
                            <th>Kategori Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>Kerugian</th>
                            <th>Jenis Tuntutan</th>
                            <th>Status</th>
                            <th>Bukti Pendukung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_pengaduan as $row): ?>
                            <tr>
                                <td><?= $row['id_pengaduan']; ?></td>
                                <td><?= $row['tgl_pengaduan']; ?></td>
                                <td><?= $row['nik']; ?></td>
                                <td><?= $row['kabupaten_kota']; ?></td>
                                <td><?= $row['nama_pelapor']; ?></td>
                                <td><?= $row['no_telp_pelapor']; ?></td>
                                <td><?= $row['nama_toko']; ?></td>
                                <td><?= $row['alamat_pelaku_usaha']; ?></td>
                                <td><?= $row['no_telp_pelaku_usaha']; ?></td>
                                <td><?= $row['jenis_barang_jasa']; ?></td>
                                <td> <?= $row['kategori_pengaduan'] == 'Harus Segera Diselesaikan' ? 'Urgent' : $row['kategori_pengaduan']; ?></td>
                                <td><?= $row['isi_laporan']; ?></td>
                                <td><?= $row['kerugian_masyarakat']; ?></td>
                                <td><?= $row['jenis_tuntutan']; ?></td>
                                <td><?= $row['status_pengaduan']; ?></td>
                                <td>
                                    <?php if (!empty($row['bukti_pendukung'])): ?>
                                        <?php foreach (explode(',', $row['bukti_pendukung']) as $file): ?>
                                            <a href="<?= base_url(trim($file)); ?>" target="_blank"><?= basename($file); ?></a><br>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        Tidak ada
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center">Data tidak ditemukan!</p>
        <?php endif; ?>
    </div>
</div>