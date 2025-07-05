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

        .card-body {
            padding: 1.5rem;
        }

        .stat-card {
            color: white;
            border-radius: 10px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-card .card-title {
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .stat-card .card-text {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0;
        }

        .stat-card i {
            font-size: 2.5rem;
            opacity: 0.2;
            position: absolute;
            right: 20px;
            bottom: 20px;
        }

        .stat-undetermined { background-color: #6c757d; }
        .stat-normal { background-color: #17a2b8; }
        .stat-priority { background-color: #ffc107; }
        .stat-urgent { background-color: #dc3545; }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #e0e0e0;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
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

        .badge-undetermined {
            background-color: rgba(108, 117, 125, 0.1);
            color: var(--gray);
        }

        .badge-normal {
            background-color: rgba(23, 162, 184, 0.1);
            color: var(--info);
        }

        .badge-priority {
            background-color: rgba(255, 193, 7, 0.1);
            color: #856404;
        }

        .badge-urgent {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger);
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
            
            .form-row > .col-md-6 {
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid py-4">
        <!-- Page Header - No changes to structure -->
        <div class="page-header">
            <h1 class="h3 mb-0"><i class="fa fa-fw fa-list"></i> <?= $judul; ?></h1>
        </div>

        <!-- Stat Cards - Same data variables used -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card stat-undetermined">
                    <div class="card-body">
                        <h5 class="card-title">Belum Ditentukan</h5>
                        <p class="card-text"><?= $total_pengaduan['belum_ditentukan']; ?> Pengaduan</p>
                        <i class="fas fa-question"></i>
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
                <div class="stat-card stat-priority">
                    <div class="card-body">
                        <h5 class="card-title">Prioritas</h5>
                        <p class="card-text"><?= $total_pengaduan['prioritas']; ?> Pengaduan</p>
                        <i class="fas fa-exclamation"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card stat-urgent">
                    <div class="card-body">
                        <h5 class="card-title">Harus Segera Diselesaikan</h5>
                        <p class="card-text"><?= $total_pengaduan['harus_segera']; ?> Pengaduan</p>
                        <i class="fas fa-fire"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Filter - Same form structure and functionality -->
        <div class="card">
            <div class="card-body">
                <form method="get" action="<?= base_url('admin/kategori_pengaduan'); ?>">
                    <div class="form-group">
                        <label for="kategori_id">Pilih Kategori</label>
                        <select class="form-control" id="kategori_id" name="kategori_id" onchange="this.form.submit()">
                            <?php 
                            $kategori_urut = [
                                6 => 'Belum Ditentukan',
                                3 => 'Pengaduan Biasa',
                                2 => 'Prioritas',
                                1 => 'Harus Segera Diselesaikan'
                            ];
                            foreach ($kategori_urut as $id => $nama) : ?>
                                <option value="<?= $id; ?>" <?= isset($_GET['kategori_id']) && $_GET['kategori_id'] == $id ? 'selected' : ''; ?>>
                                    <?= $nama; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Chart Section - Same chart data and functionality -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Grafik Pengaduan Per Bulan</h5>
                <form method="get" action="<?= base_url('admin/kategori_pengaduan'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bulan">Pilih Bulan</label>
                                <select class="form-control" id="bulan" name="bulan" onchange="this.form.submit()">
                                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                                        <option value="<?= $i; ?>" <?= (isset($_GET['bulan']) && $_GET['bulan'] == $i) || (!isset($_GET['bulan']) && $i == 5) ? 'selected' : ''; ?>>
                                            <?= date('F', mktime(0, 0, 0, $i, 10)); ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun">Pilih Tahun</label>
                                <select class="form-control" id="tahun" name="tahun" onchange="this.form.submit()">
                                    <option value="2025" <?= (isset($_GET['tahun']) && $_GET['tahun'] == 2025) || !isset($_GET['tahun']) ? 'selected' : ''; ?>>2025</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="chart-container">
                    <canvas id="grafikPengaduan"></canvas>
                </div>
            </div>
        </div>

        <!-- Complaint Table - Same data structure and columns -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table-pengaduan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Tanggal</th>
                                <th>Kabupaten/Kota</th>
                                <th>Pelapor</th>
                                <th>Telpon</th>
                                <th>Toko</th>
                                <th>Alamat Usaha</th>
                                <th>Barang/Jasa</th>
                                <th>Kategori</th>
                                <th>Kronologi</th>
                                <th>Kerugian</th>
                                <th>Tuntutan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pengaduan)) : ?>
                                <tr>
                                    <td colspan="14" class="text-center py-4">
                                        <i class="fas fa-exclamation-circle text-muted"></i>
                                        <p class="text-muted mt-2">Belum ada data pengaduan untuk kategori ini!</p>
                                    </td>
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
                                        <td>
                                            <?php
                                            $badge_class = '';
                                            if (isset($p['id_kategori_pengaduan'])) {
                                                if ($p['id_kategori_pengaduan'] == 1) $badge_class = 'badge-urgent';
                                                elseif ($p['id_kategori_pengaduan'] == 2) $badge_class = 'badge-priority';
                                                elseif ($p['id_kategori_pengaduan'] == 3) $badge_class = 'badge-normal';
                                                else $badge_class = 'badge-undetermined';
                                            } else {
                                                $badge_class = 'badge-undetermined';
                                            }
                                            ?>
                                            <span class="badge <?= $badge_class; ?>">
                                                <?= isset($p['kategori_pengaduan']) ? $p['kategori_pengaduan'] : 'Belum Ditentukan'; ?>
                                            </span>
                                        </td>
                                        <td class="text-ellipsis"><?= $p['isi_laporan']; ?></td>
                                        <td><?= $p['kerugian_masyarakat']; ?></td>
                                        <td><?= $p['jenis_tuntutan']; ?></td>
                                        <td><?= $p['status_pengaduan']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js - Same chart implementation -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('grafikPengaduan').getContext('2d');
            const data = <?= json_encode($grafik_pengaduan); ?>;

            const labels = data.map(item => item.tanggal);
            const pengaduanBiasa = data.map(item => item.pengaduan_biasa);
            const prioritas = data.map(item => item.prioritas);
            const harusSegera = data.map(item => item.harus_segera);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Pengaduan Biasa',
                            data: pengaduanBiasa,
                            backgroundColor: 'rgba(23, 162, 184, 0.7)',
                            borderColor: 'rgba(23, 162, 184, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Prioritas',
                            data: prioritas,
                            backgroundColor: 'rgba(255, 193, 7, 0.7)',
                            borderColor: 'rgba(255, 193, 7, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Harus Segera Diselesaikan',
                            data: harusSegera,
                            backgroundColor: 'rgba(220, 53, 69, 0.7)',
                            borderColor: 'rgba(220, 53, 69, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ' + context.raw + ' Pengaduan';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>