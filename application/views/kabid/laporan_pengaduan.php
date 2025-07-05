<?php ?>
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-chart-line mr-2"></i><?= $judul; ?></h1>
    </div>

    <!-- Filter Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary text-white">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-filter mr-2"></i>Filter Laporan</h6>
        </div>
        <div class="card-body">
            <form method="get" action="<?= base_url('kabid/laporan_pengaduan'); ?>" class="row g-3">
                <div class="col-md-5">
                    <label for="bulan" class="form-label">Bulan</label>
                    <select name="bulan" id="bulan" class="form-control select-custom" onchange="this.form.submit()">
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <option value="<?= $i ?>" <?= (isset($_GET['bulan']) ? $_GET['bulan'] : date('n')) == $i ? 'selected' : '' ?>>
                                <?= date('F', mktime(0,0,0,$i,10)); ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="tahun" class="form-label">Tahun</label>
                    <select name="tahun" id="tahun" class="form-control select-custom" onchange="this.form.submit()">
                        <?php
                        $tahun_sekarang = date('Y');
                        for ($t = $tahun_sekarang - 5; $t <= $tahun_sekarang + 1; $t++): ?>
                            <option value="<?= $t ?>" <?= (isset($_GET['tahun']) ? $_GET['tahun'] : $tahun_sekarang) == $t ? 'selected' : '' ?>>
                                <?= $t ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-sync-alt mr-2"></i>Refresh
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Chart Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-success text-white">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-chart-bar mr-2"></i>Grafik Pengaduan Per Bulan</h6>
        </div>
        <div class="card-body">
            <div class="chart-container" style="position: relative; height:400px; width:100%">
                <canvas id="grafikPengaduan"></canvas>
            </div>
        </div>
    </div>

    <!-- Excel Preview Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-info text-white d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold">
                <i class="fas fa-file-excel mr-2"></i>Preview Laporan XLSX dari Admin
            </h6>
            <a href="<?= base_url('admin/preview_laporan_xlsx'); ?>" class="btn btn-light btn-sm" target="_blank">
                <i class="fas fa-external-link-alt mr-2"></i>Buka di Tab Baru
            </a>
        </div>
        <div class="card-body">
            <div class="excel-preview-container">
                <iframe src="<?= base_url('admin/preview_laporan_xlsx'); ?>" class="excel-preview-frame"></iframe>
                <div class="excel-preview-overlay">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Memuat laporan...</span>
                    </div>
                    <p class="mt-2">Memuat preview laporan Excel</p>
                </div>
            </div>
            <div class="alert alert-info mt-3">
                <i class="fas fa-info-circle mr-2"></i>
                Jika belum ada data, silakan minta admin untuk mengirim laporan.
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    :root {
        --primary: #4e73df;
        --secondary: #858796;
        --success: #1cc88a;
        --info: #36b9cc;
        --warning: #f6c23e;
        --danger: #e74a3b;
        --light: #f8f9fc;
        --dark: #5a5c69;
    }

    body {
        background-color: #f8f9fc;
    }

    .card {
        border: none;
        border-radius: 0.35rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }

    .card-header {
        border-radius: 0.35rem 0.35rem 0 0 !important;
    }

    .select-custom {
        border-radius: 0.35rem;
        padding: 0.375rem 0.75rem;
        border: 1px solid #d1d3e2;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .select-custom:focus {
        border-color: #bac8f3;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .excel-preview-container {
        position: relative;
        width: 100%;
        height: 500px;
        border: 1px solid #e3e6f0;
        border-radius: 0.35rem;
        overflow: hidden;
        background-color: #f8f9fc;
    }

    .excel-preview-frame {
        width: 100%;
        height: 100%;
        border: none;
    }

    .excel-preview-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: rgba(248, 249, 252, 0.8);
        z-index: 10;
    }

    .excel-preview-overlay p {
        color: var(--dark);
        font-size: 0.9rem;
    }

    .alert-info {
        background-color: #f0f7ff;
        border-color: #cce5ff;
        color: #004085;
    }

    @media (max-width: 768px) {
        .excel-preview-container {
            height: 400px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Hide loading overlay when iframe loads
        document.querySelector('.excel-preview-frame').onload = function() {
            document.querySelector('.excel-preview-overlay').style.display = 'none';
        };

        // Chart initialization
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
                        backgroundColor: 'rgba(78, 115, 223, 0.5)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Prioritas',
                        data: prioritas,
                        backgroundColor: 'rgba(246, 194, 62, 0.5)',
                        borderColor: 'rgba(246, 194, 62, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Harus Segera Diselesaikan',
                        data: harusSegera,
                        backgroundColor: 'rgba(231, 74, 59, 0.5)',
                        borderColor: 'rgba(231, 74, 59, 1)',
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
                                return context.dataset.label + ': ' + context.raw;
                            }
                        }
                    }
                },
                scales: {
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