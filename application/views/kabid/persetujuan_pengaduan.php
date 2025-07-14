<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?></title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --secondary: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
            --gray: #6c757d;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
        }

        .page-header {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0;
        }

        .page-header i {
            color: var(--primary);
            margin-right: 10px;
        }

        .stat-card {
            color: white;
            border-radius: 10px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: -10px;
            right: -10px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
        }

        .stat-card .card-title {
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .stat-card .card-text {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0;
        }

        .stat-card i {
            position: absolute;
            bottom: 15px;
            right: 15px;
            font-size: 2.5rem;
            opacity: 0.2;
        }

        .stat-urgent { background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%); }
        .stat-priority { background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%); }
        .stat-normal { background: linear-gradient(135deg, #17a2b8 0%, #138496 100%); }
        .stat-undetermined { background: linear-gradient(135deg, #6c757d 0%, #495057 100%); }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 10px 10px 0 0 !important;
            font-weight: 600;
            padding: 1rem 1.5rem;
        }

        .card-header-warning {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
            color: white;
        }

        .card-header-success {
            background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
            color: white;
        }

        .table-responsive {
            border-radius: 10px;
            overflow-x: auto;
            width: 100%;
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background-color: var(--primary);
            color: white;
            border: none;
            font-weight: 500;
            padding: 15px;
            position: sticky;
            top: 0;
        }

        .table tbody tr {
            transition: all 0.2s;
        }

        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }

        .table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
            border-top: 1px solid #f0f0f0;
        }

        .badge {
            font-weight: 500;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
        }

        .badge-urgent {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger);
        }

        .badge-priority {
            background-color: rgba(255, 193, 7, 0.1);
            color: #856404;
        }

        .badge-normal {
            background-color: rgba(23, 162, 184, 0.1);
            color: var(--info);
        }

        .badge-undetermined {
            background-color: rgba(108, 117, 125, 0.1);
            color: var(--gray);
        }

        .btn-group .btn {
            margin-right: 5px;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 0.85rem;
            transition: all 0.2s;
        }

        .btn-group .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-info {
            background-color: rgba(23, 162, 184, 0.1);
            border-color: rgba(23, 162, 184, 0.1);
            color: var(--info);
        }

        .btn-info:hover {
            background-color: var(--info);
            border-color: var(--info);
            color: white;
        }

        .btn-secondary {
            background-color: rgba(108, 117, 125, 0.1);
            border-color: rgba(108, 117, 125, 0.1);
            color: var(--gray);
        }

        .btn-success {
            background-color: rgba(40, 167, 69, 0.1);
            border-color: rgba(40, 167, 69, 0.1);
            color: var(--success);
        }

        .btn-success:hover {
            background-color: var(--success);
            border-color: var(--success);
            color: white;
        }

        .file-link {
            display: inline-block;
            margin-right: 8px;
            margin-bottom: 5px;
            padding: 3px 8px;
            background-color: rgba(67, 97, 238, 0.1);
            border-radius: 4px;
            color: var(--primary);
            font-size: 0.8rem;
            transition: all 0.2s;
        }

        .file-link:hover {
            background-color: var(--primary);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .text-ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }

        @media (max-width: 768px) {
            .stat-card {
                margin-bottom: 15px;
            }
            
            .table-responsive {
                border: 1px solid #f0f0f0;
                border-radius: 10px;
            }
            
            .table thead {
                display: none;
            }
            
            .table tbody tr {
                display: block;
                margin-bottom: 15px;
                border: 1px solid #f0f0f0;
                border-radius: 8px;
            }
            
            .table tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border: none;
                border-bottom: 1px solid #f0f0f0;
            }
            
            .table tbody td:before {
                content: attr(data-label);
                font-weight: 600;
                color: var(--dark);
                margin-right: 15px;
            }
            
            .text-ellipsis {
                max-width: 150px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid py-4">
        <!-- Page Header -->
        <div class="page-header">
            <h1><i class="fas fa-list"></i> <?= $judul; ?></h1>
        </div>

        <!-- Stat Cards -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card stat-urgent">
                    <div class="card-body">
                        <h5 class="card-title">Urgent</h5>
                        <p class="card-text"><?= $total_pengaduan['harus_segera']; ?> Pengaduan</p>
                        <i class="fas fa-fire"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card stat-priority">
                    <div class="card-body">
                        <h5 class="card-title">Prioritas</h5>
                        <p class="card-text"><?= $total_pengaduan['prioritas']; ?> Pengaduan</p>
                        <i class="fas fa-exclamation"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card stat-normal">
                    <div class="card-body">
                        <h5 class="card-title">Pengaduan Biasa</h5>
                        <p class="card-text"><?= $total_pengaduan['pengaduan_biasa']; ?> Pengaduan</p>
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card stat-undetermined">
                    <div class="card-body">
                        <h5 class="card-title">Belum Ditentukan</h5>
                        <p class="card-text"><?= $total_pengaduan['belum_ditentukan']; ?> Pengaduan</p>
                        <i class="fas fa-question"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengaduan Belum Disetujui -->
        <div class="card">
            <div class="card-header card-header-warning">
                <i class="fas fa-clock mr-2"></i> Pengaduan Belum Disetujui
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Tanggal</th>
                                <th>Pelapor</th>
                                <th>Toko</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Bukti</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengaduan_belum as $num => $p) : ?>
                                <tr>
                                    <td><?= $num + 1; ?></td>
                                    <td><?= $p['nik']; ?></td>
                                    <td><?= date('d M Y', strtotime($p['tgl_pengaduan'])); ?></td>
                                    <td>
                                        <div class="font-weight-bold"><?= $p['nama_pelapor']; ?></div>
                                        <small class="text-muted"><?= $p['no_telp_pelapor']; ?></small>
                                    </td>
                                    <td class="text-ellipsis"><?= $p['nama_toko']; ?></td>
                                    <td>
                                        <?php
                                        $badge_class = '';
                                        if ($p['id_kategori_pengaduan'] == 1) $badge_class = 'badge-urgent';
                                        elseif ($p['id_kategori_pengaduan'] == 2) $badge_class = 'badge-priority';
                                        elseif ($p['id_kategori_pengaduan'] == 3) $badge_class = 'badge-normal';
                                        else $badge_class = 'badge-undetermined';
                                        ?>
                                        <span class="badge <?= $badge_class; ?>">
                                            <?= $p['kategori_pengaduan'] == 'Harus Segera Diselesaikan' ? 'Urgent' : $p['kategori_pengaduan']; ?>
                                        </span>
                                    </td>
                                    <td><?= $p['status_pengaduan']; ?></td>
                                    <td>
                                        <?php if (!empty($p['bukti_pendukung'])) : ?>
                                            <?php foreach (explode(',', $p['bukti_pendukung']) as $file) : ?>
                                                <a href="<?= base_url($file); ?>" target="_blank" class="file-link">
                                                    <i class="fas fa-paperclip"></i> <?= basename($file); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <span class="text-muted">Tidak ada</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm detail-pengaduan"
                                                data-all='<?= json_encode($p); ?>'>
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="<?= base_url('admin/cetak_pengaduan/'.$p['id_pengaduan']); ?>" 
                                               class="btn btn-secondary btn-sm" target="_blank">
                                               <i class="fas fa-print"></i>
                                            </a>
                                            <a href="<?= base_url('kabid/setujui/'.$p['id_pengaduan']); ?>" 
                                               class="btn btn-success btn-sm" 
                                               onclick="return confirm('Setujui pengaduan ini?')">
                                               <i class="fas fa-check"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pengaduan Sudah Disetujui -->
        <div class="card mt-4">
            <div class="card-header card-header-success">
                <i class="fas fa-check-circle mr-2"></i> Pengaduan Sudah Disetujui
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Tanggal</th>
                                <th>Pelapor</th>
                                <th>Toko</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Bukti</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengaduan_sudah as $num => $p) : ?>
                                <tr>
                                    <td><?= $num + 1; ?></td>
                                    <td><?= $p['nik']; ?></td>
                                    <td><?= date('d M Y', strtotime($p['tgl_pengaduan'])); ?></td>
                                    <td>
                                        <div class="font-weight-bold"><?= $p['nama_pelapor']; ?></div>
                                        <small class="text-muted"><?= $p['no_telp_pelapor']; ?></small>
                                    </td>
                                    <td class="text-ellipsis"><?= $p['nama_toko']; ?></td>
                                    <td>
                                        <?php
                                        $badge_class = '';
                                        if ($p['id_kategori_pengaduan'] == 1) $badge_class = 'badge-urgent';
                                        elseif ($p['id_kategori_pengaduan'] == 2) $badge_class = 'badge-priority';
                                        elseif ($p['id_kategori_pengaduan'] == 3) $badge_class = 'badge-normal';
                                        else $badge_class = 'badge-undetermined';
                                        ?>
                                        <span class="badge <?= $badge_class; ?>">
                                            <?= $p['kategori_pengaduan']; ?>
                                        </span>
                                    </td>
                                    <td><?= $p['status_pengaduan']; ?></td>
                                    <td>
                                        <?php if (!empty($p['bukti_pendukung'])) : ?>
                                            <?php foreach (explode(',', $p['bukti_pendukung']) as $file) : ?>
                                                <a href="<?= base_url($file); ?>" target="_blank" class="file-link">
                                                    <i class="fas fa-paperclip"></i> <?= basename($file); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <span class="text-muted">Tidak ada</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm detail-pengaduan"
                                                data-all='<?= json_encode($p); ?>'>
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="<?= base_url('admin/cetak_pengaduan/'.$p['id_pengaduan']); ?>" 
                                               class="btn btn-secondary btn-sm" target="_blank">
                                               <i class="fas fa-print"></i>
                                            </a>
                                            <span class="badge badge-success align-self-center">
                                                <i class="fas fa-check"></i> Disetujui
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Pengaduan -->
    <div class="modal fade" id="modalDetailPengaduan" tabindex="-1" role="dialog" aria-labelledby="modalDetailPengaduanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailPengaduanLabel">Detail Pengaduan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="detail_id">
        <div class="form-group">
          <label for="detail_nik">NIK</label>
          <input type="text" class="form-control" id="detail_nik" readonly>
        </div>
        <div class="form-group">
          <label for="detail_tgl">Tanggal Pengaduan</label>
          <input type="text" class="form-control" id="detail_tgl" readonly>
        </div>
        <div class="form-group">
          <label for="detail_kabupaten">Kabupaten/Kota</label>
          <input type="text" class="form-control" id="detail_kabupaten" readonly>
        </div>
        <div class="form-group">
          <label for="detail_nama">Nama Pelapor</label>
          <input type="text" class="form-control" id="detail_nama" readonly>
        </div>
        <div class="form-group">
          <label for="detail_telp">No Telpon Pelapor</label>
          <input type="text" class="form-control" id="detail_telp" readonly>
        </div>
        <div class="form-group">
          <label for="detail_toko">Nama Toko</label>
          <input type="text" class="form-control" id="detail_toko" readonly>
        </div>
        <div class="form-group">
          <label for="detail_alamat">Alamat Pelaku Usaha</label>
          <input type="text" class="form-control" id="detail_alamat" readonly>
        </div>
        <div class="form-group">
          <label for="detail_telpusaha">No Telpon Pelaku Usaha</label>
          <input type="text" class="form-control" id="detail_telpusaha" readonly>
        </div>
        <div class="form-group">
          <label for="detail_barang">Jenis Barang/Jasa</label>
          <input type="text" class="form-control" id="detail_barang" readonly>
        </div>
        <div class="form-group">
          <label for="detail_kategori">Kategori Pengaduan</label>
          <input type="text" class="form-control" id="detail_kategori" readonly>
        </div>
        <div class="form-group">
          <label for="detail_isi">Isi Kronologi Pengaduan</label>
          <textarea class="form-control" id="detail_isi" rows="3" readonly></textarea>
        </div>
        <div class="form-group">
          <label for="detail_kerugian">Kerugian Konsumen</label>
          <input type="text" class="form-control" id="detail_kerugian" readonly>
        </div>
        <div class="form-group">
          <label for="detail_tuntutan">Jenis Tuntutan Konsumen</label>
          <input type="text" class="form-control" id="detail_tuntutan" readonly>
        </div>
        <div class="form-group">
          <label for="detail_status">Status Pengaduan</label>
          <input type="text" class="form-control" id="detail_status" readonly>
        </div>
        <div class="form-group">
          <label for="detail_bukti">Bukti Pendukung</label>
          <div id="detail_bukti"></div>
        </div>
      </div>
    </div>
  </div>
</div>

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            // Enhanced detail button click handler
            $(document).on("click", ".detail-pengaduan", function() {
                const data = $(this).data('all');
                
                // Format date
                const formattedDate = new Date(data.tgl_pengaduan).toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });

                // Fill modal with data
                $("#detail_id").val(data.id_pengaduan);
                $("#detail_nik").val(data.nik);
                $("#detail_tgl").val(formattedDate);
                $("#detail_kabupaten").val(data.kabupaten_kota);
                $("#detail_nama").val(data.nama_pelapor);
                $("#detail_telp").val(data.no_telp_pelapor);
                $("#detail_toko").val(data.nama_toko);
                $("#detail_alamat").val(data.alamat_pelaku_usaha);
                $("#detail_telpusaha").val(data.no_telp_pelaku_usaha);
                $("#detail_barang").val(data.jenis_barang_jasa);
                $("#detail_kategori").val(data.kategori_pengaduan);
                $("#detail_isi").val(data.isi_laporan);
                $("#detail_kerugian").val(data.kerugian_masyarakat);
                $("#detail_tuntutan").val(data.jenis_tuntutan);
                $("#detail_status").val(data.status_pengaduan);

                // Handle file attachments
                const buktiContainer = $("#detail_bukti");
                buktiContainer.empty();
                if (data.bukti_pendukung) {
                    const files = data.bukti_pendukung.split(',');
                    files.forEach(file => {
                        const fileName = file.split('/').pop();
                        buktiContainer.append(`
                            <a href="<?= base_url(); ?>${file}" target="_blank" class="file-link">
                                <i class="fas fa-paperclip"></i> ${fileName}
                            </a>
                        `);
                    });
                } else {
                    buktiContainer.html('<p class="text-muted">Tidak ada bukti pendukung.</p>');
                }

                $("#modalDetailPengaduan").modal('show');
            });
        });
    </script>
</body>
</html>