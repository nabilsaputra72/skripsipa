<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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

        .search-form {
            position: relative;
        }

        .search-form .form-control {
            border-radius: 30px;
            padding-left: 45px;
            border: 1px solid #e0e0e0;
        }

        .search-form .input-group-append {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 4;
        }

        .search-form .btn {
            border-radius: 30px;
            padding: 8px 20px;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            border-radius: 30px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: var(--primary);
            color: white;
            border: none;
            font-weight: 500;
            padding: 15px;
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
            text-transform: uppercase;
        }

        .badge-danger {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger);
        }

        .badge-warning {
            background-color: rgba(255, 193, 7, 0.1);
            color: #856404;
        }

        .badge-success {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success);
        }

        .badge-info {
            background-color: rgba(23, 162, 184, 0.1);
            color: var(--info);
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

        .btn-warning {
            background-color: rgba(255, 193, 7, 0.1);
            border-color: rgba(255, 193, 7, 0.1);
            color: #856404;
        }

        .btn-warning:hover {
            background-color: var(--warning);
            border-color: var(--warning);
            color: white;
        }

        .btn-secondary {
            background-color: rgba(108, 117, 125, 0.1);
            border-color: rgba(108, 117, 125, 0.1);
            color: var(--gray);
        }

        .alert {
            border-radius: 8px;
            padding: 12px 15px;
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

        .status-badge {
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
        }

        .status-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: #856404;
        }

        .status-approved {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success);
        }

        .status-rejected {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger);
        }

        .text-ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }

        .modal-content {
            border: none;
            border-radius: 10px;
        }

        .modal-header {
            background-color: var(--primary);
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .modal-title {
            font-weight: 500;
        }

        @media (max-width: 768px) {
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
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1><i class="fas fa-list"></i> <?= $judul; ?></h1>
                </div>
                <div class="col-md-6">
                    <!-- Search Form -->
                    <form method="get" action="<?= base_url('admin/daftar_pengaduan'); ?>" class="search-form">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Cari NIK, Nama, No Telp, Toko..." 
                                   value="<?= $this->input->get('search'); ?>">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-between mb-4">
            <a href="<?= base_url('admin/klasifikasi_pengaduan_batch'); ?>" class="btn btn-primary">
                <i class="fas fa-sync-alt"></i> Klasifikasi Ulang Pengaduan
            </a>
        </div>

        <!-- Complaint Table -->
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Pelapor</th>
                                <th>Tanggal</th>
                                <th>Toko</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pengaduan)) : ?>
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <i class="fas fa-exclamation-circle fa-2x text-muted mb-3"></i>
                                        <p class="text-muted">Tidak ada data pengaduan</p>
                                    </td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($pengaduan as $num => $p) : ?>
                                    <tr>
                                        <td><?= $num + 1; ?></td>
                                        <td><?= $p['nik']; ?></td>
                                        <td>
                                            <div class="font-weight-bold"><?= $p['nama_pelapor']; ?></div>
                                            <small class="text-muted"><?= $p['no_telp_pelapor']; ?></small>
                                        </td>
                                        <td><?= date('d M Y', strtotime($p['tgl_pengaduan'])); ?></td>
                                        <td class="text-ellipsis"><?= $p['nama_toko']; ?></td>
                                        <td>
                                            <?php
                                            $badge = 'success';
                                            if ($p['id_kategori_pengaduan'] == 1) $badge = 'danger';
                                            elseif ($p['id_kategori_pengaduan'] == 2) $badge = 'warning';
                                            elseif ($p['id_kategori_pengaduan'] == 3) $badge = 'info';
                                            ?>
                                            <span class="badge badge-<?= $badge ?>">
                                                <?= $p['kategori_pengaduan']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if (isset($p['disetujui_kabid']) && $p['disetujui_kabid'] != 1): ?>
                                                <span class="status-badge status-pending">
                                                    <i class="fas fa-clock"></i> Menunggu Persetujuan
                                                </span>
                                            <?php else: ?>
                                                <span class="status-badge status-approved">
                                                    <?= $p['status_pengaduan']; ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <!-- Detail Button -->
                                                <button type="button" class="btn btn-info btn-sm detail-pengaduan" 
                                                        data-id="<?= $p['id_pengaduan']; ?>"
                                                        data-all='<?= json_encode($p); ?>'>
                                                    <i class="fas fa-eye"></i>
                                                </button>

                                                <!-- Print Button -->
                                                <a href="<?= base_url('admin/cetak_pengaduan/' . $p['id_pengaduan']); ?>" 
                                                   class="btn btn-success btn-sm">
                                                   <i class="fas fa-print"></i>
                                                </a>

                                                <!-- Status Update Button -->
                                                <?php if (isset($p['disetujui_kabid']) && $p['disetujui_kabid'] == 1): ?>
                                                    <button type="button" class="btn btn-warning btn-sm update-status" 
                                                            data-id="<?= $p['id_pengaduan']; ?>" 
                                                            data-status="<?= $p['id_status']; ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-secondary btn-sm" disabled>
                                                        <i class="fas fa-ban"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals (keep your existing modal code) -->
    <!-- Modal Update Status -->
    <div class="modal fade" id="modalUpdateStatus" tabindex="-1" role="dialog" aria-labelledby="modalUpdateStatusLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form method="post" action="<?= base_url('admin/update_status_pengaduan'); ?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalUpdateStatusLabel">Update Status Pengaduan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id_pengaduan" id="id_pengaduan">
              <div class="form-group">
                <label for="id_status">Status Pengaduan</label>
                <select class="form-control" name="id_status" id="id_status" required>
                  <?php foreach ($status_list as $status): ?>
                    <option value="<?= $status['id_status']; ?>"><?= $status['status']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
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

    <!-- JavaScript -->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            // Make table rows more interactive
            $('tbody tr').hover(
                function() {
                    $(this).css('cursor', 'pointer');
                }
            );

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

            // Status update button click handler
            $(document).on("click", ".update-status", function() {
                const id = $(this).data('id');
                const status = $(this).data('status');
                $("#modalUpdateStatus #id_pengaduan").val(id);
                $("#modalUpdateStatus #id_status").val(status);
                $("#modalUpdateStatus").modal('show');
            });
        });
    </script>
</body>
</html>