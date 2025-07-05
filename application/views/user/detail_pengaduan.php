<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Detail pengaduan konsumen">
  <meta name="author" content="">

  <title>Detail Pengaduan</title>

  <!-- Custom fonts -->
  <link href="http://localhost/pengaduan1/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <!-- Custom styles -->
  <link href="http://localhost/pengaduan/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    :root {
      --primary: #4e73df;
      --secondary: #858796;
      --success: #1cc88a;
      --warning: #f6c23e;
      --danger: #e74a3b;
      --light: #f8f9fc;
    }
    body {
      font-family: 'Nunito', sans-serif;
      background-color: #f5f7fb;
    }
    .detail-card {
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      border: none;
      overflow: hidden;
    }
    .card-header {
      background: linear-gradient(135deg, var(--primary) 0%, #224abe 100%);
      color: white;
      padding: 1.5rem;
      border-bottom: none;
    }
    .status-badge {
      font-size: 0.85rem;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      font-weight: 600;
    }
    .detail-item {
      padding: 1.25rem;
      border-bottom: 1px solid #e3e6f0;
    }
    .detail-item:last-child {
      border-bottom: none;
    }
    .detail-label {
      font-weight: 600;
      color: var(--secondary);
      margin-bottom: 0.25rem;
    }
    .detail-value {
      font-size: 1.05rem;
    }
    .file-badge {
      background-color: #e3e6f0;
      border-radius: 6px;
      padding: 0.5rem 1rem;
      display: inline-flex;
      align-items: center;
      margin-right: 0.5rem;
      margin-bottom: 0.5rem;
    }
    .file-badge i {
      margin-right: 0.5rem;
      color: var(--primary);
    }
    .section-title {
      position: relative;
      padding-left: 1rem;
      font-weight: 700;
      color: var(--primary);
    }
    .section-title:before {
      content: '';
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      height: 70%;
      width: 4px;
      background-color: var(--primary);
      border-radius: 4px;
    }
    .btn-edit {
      background-color: var(--warning);
      border-color: var(--warning);
      font-weight: 600;
      padding: 0.5rem 1.5rem;
      border-radius: 8px;
    }
    .btn-edit:hover {
      background-color: #e0b22e;
      border-color: #e0b22e;
    }
    /* Tambahan untuk rainbow (warna-warni) */
    .bg-rainbow {
      background: linear-gradient(90deg, #ff9800, #f44336, #9c27b0, #2196f3, #4caf50, #ffeb3b, #00bcd4);
      color: #fff !important;
    }
  </style>
</head>

<body>
  <?php
  // Mapping warna sesuai id_status
  $status_colors = [
      1 => 'success',    // Diterima - hijau
      2 => 'warning',    // Diverifikasi - kuning
      3 => 'primary',    // Diproses - biru
      4 => 'secondary',  // Diklarifikasi - abu-abu
      5 => 'info',       // Mediasi - tosca
      6 => 'danger',     // Diteruskan ke BPSK - merah
      7 => 'gradient-info'     // Selesai - warna warni (custom CSS)
  ];
  $status_class = isset($pengaduan['id_status'], $status_colors[$pengaduan['id_status']]) ? $status_colors[$pengaduan['id_status']] : 'secondary';
  ?>

  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="h3 font-weight-bold text-gray-800">
        <i class="fas fa-file-alt mr-2"></i>Detail Pengaduan
      </h2>
      <a href="#" class="btn btn-link text-gray-800">
        <i class="fas fa-arrow-left mr-1"></i> Kembali
      </a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <div class="card detail-card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">ID Pengaduan: #<?= $pengaduan['id_pengaduan'] ?></h4>
        <span class="status-badge bg-<?= $status_class ?>">
          <?= isset($status_pengaduan['status']) ? $status_pengaduan['status'] : 'Status tidak tersedia' ?>
        </span>
      </div>
      
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-item">
              <div class="detail-label">Tanggal Pengaduan</div>
              <div class="detail-value"><?= date('d F Y', strtotime($pengaduan['tgl_pengaduan'])) ?></div>
            </div>
            <div class="detail-item">
              <div class="detail-label">Nama Pelapor</div>
              <div class="detail-value"><?= $pengaduan['nama_pelapor'] ?></div>
            </div>
            <div class="detail-item">
              <div class="detail-label">No. Telepon Pelapor</div>
              <div class="detail-value"><?= $pengaduan['no_telp_pelapor'] ?></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="detail-item">
              <div class="detail-label">Nama Toko</div>
              <div class="detail-value"><?= $pengaduan['nama_toko'] ?></div>
            </div>
            <div class="detail-item">
              <div class="detail-label">Alamat Pelaku Usaha</div>
              <div class="detail-value"><?= $pengaduan['alamat_pelaku_usaha'] ?></div>
            </div>
            <div class="detail-item">
              <div class="detail-label">No. Telepon Pelaku Usaha</div>
              <div class="detail-value"><?= $pengaduan['no_telp_pelaku_usaha'] ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="card detail-card h-100">
          <div class="card-body">
            <h5 class="section-title mb-4">Detail Laporan</h5>
            <div class="detail-item">
              <div class="detail-label">Jenis Barang/Jasa</div>
              <div class="detail-value"><?= isset($jenis_barang_jasa['jenis_barang_jasa']) ? $jenis_barang_jasa['jenis_barang_jasa'] : 'Tidak tersedia' ?></div>
            </div>
            <div class="detail-item">
              <div class="detail-label">Jenis Tuntutan</div>
              <div class="detail-value"><?= isset($jenis_tuntutan['tuntutan']) ? $jenis_tuntutan['tuntutan'] : 'Tidak tersedia' ?></div>
            </div>
            <div class="detail-item">
              <div class="detail-label">Isi Laporan</div>
              <div class="detail-value"><?= $pengaduan['isi_laporan'] ?></div>
            </div>
            <div class="detail-item">
              <div class="detail-label">Kerugian Masyarakat</div>
              <div class="detail-value"><?= $pengaduan['kerugian_masyarakat'] ?></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="card detail-card h-100">
          <div class="card-body">
            <h5 class="section-title mb-4">File Pendukung</h5>
            <?php if (!empty($file_pendukung)): ?>
              <div class="d-flex flex-wrap">
                <?php foreach ($file_pendukung as $file): ?>
                  <a href="<?= base_url($file['file_path']) ?>" target="_blank" class="file-badge">
                    <i class="fas fa-paperclip"></i>
                    <?= basename($file['file_path']) ?>
                  </a>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <div class="text-center py-4">
                <i class="far fa-folder-open fa-3x text-gray-400 mb-3"></i>
                <p class="text-muted">Tidak ada file pendukung</p>
              </div>
            <?php endif; ?>
            <?php if ($pengaduan['id_status'] < 2): ?>
              <div class="mt-4 pt-3 border-top text-right">
                <a href="<?= base_url('user/edit_pengaduan/' . $pengaduan['id_pengaduan']) ?>" class="btn btn-edit">
                  <i class="fas fa-edit mr-1"></i> <span style="font-weight:bold; color:#222;">Edit Pengaduan</span>
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <?php
    // Cek jika status selesai dan user belum pernah menilai
    $sudah_nilai = false;
    if (isset($pengaduan['id_nik'])) {
        $sudah_nilai = $this->db->where('id_nik', $pengaduan['id_nik'])
                                ->where('id_pengaduan', $pengaduan['id_pengaduan'])
                                ->count_all_results('kepuasan') > 0;
    }
    ?>
    <?php if ($pengaduan['id_status'] == 7 && !$sudah_nilai): ?>
    <div class="card mt-4">
      <div class="card-body">
        <h5 class="mb-3">Beri Penilaian Kepuasan Anda</h5>
        <form action="<?= base_url('user/simpan_kepuasan/' . $pengaduan['id_pengaduan']) ?>" method="post">
          <div class="mb-3">
            <label class="form-label">Kepuasan (Bintang):</label>
            <div id="star-rating">
              <?php for($i=5;$i>=1;$i--): ?>
                <input type="radio" name="nilai" id="star<?= $i ?>" value="<?= $i ?>" required>
                <label for="star<?= $i ?>">★</label>
              <?php endfor; ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="komentar" class="form-label">Komentar/Saran (opsional):</label>
            <textarea name="komentar" id="komentar" class="form-control" rows="2"></textarea>
          </div>
          <button type="submit" class="btn btn-success">Kirim Penilaian</button>
        </form>
      </div>
    </div>
    <style>
    #star-rating { direction: rtl; unicode-bidi: bidi-override; }
    #star-rating input { display: none; }
    #star-rating label {
      font-size: 2rem; color: #ccc; cursor: pointer;
    }
    #star-rating input:checked ~ label,
    #star-rating label:hover,
    #star-rating label:hover ~ label {
      color: #ffc107;
    }
    </style>
    <?php endif; ?>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="http://localhost/pengaduan/assets/vendor/jquery/jquery.min.js"></script>
  <script src="http://localhost/pengaduan/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://localhost/pengaduan/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="http://localhost/pengaduan/assets/js/sb-admin-2.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.btn-ubah').click(function(e) {
        e.preventDefault()
        var cbLen = $('input[type="checkbox"]:checked').length;
        var cb = $('input[type="checkbox"]:checked');

        if (cbLen != 1) {
          alert('Pilih salah satu data yang ingin diubah')
        } else {
          $('#modal-ubah').modal()
          $('.modal-body #id').val(cb.data('id'))
          $('.modal-body #judul').val(cb.data('judul'))
          $('.modal-body #isi').val(cb.data('isi'))
        }
      })
    })
  </script>
</body>
</html>