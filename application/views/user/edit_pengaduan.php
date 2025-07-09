<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Edit pengaduan konsumen">
  <meta name="author" content="">

  <title><?= $judul; ?></title>

  <!-- Custom fonts -->
  <link href="http://localhost/pengaduan1/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <!-- Custom styles -->
  <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
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
    
    .edit-card {
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
    
    .form-section {
      padding: 1.5rem;
      border-bottom: 1px solid #e3e6f0;
    }
    
    .form-section:last-child {
      border-bottom: none;
    }
    
    .section-title {
      position: relative;
      padding-left: 1rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 1.5rem;
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
    
    .form-label {
      font-weight: 600;
      color: var(--secondary);
    }
    
    .form-control, .form-select {
      border-radius: 8px;
      padding: 0.75rem 1rem;
      border: 1px solid #d1d3e2;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    textarea.form-control {
      min-height: 120px;
    }
    
    .file-preview {
      background-color: #f8f9fc;
      border-radius: 8px;
      padding: 1rem;
      margin-top: 0.5rem;
    }
    
    .file-item {
      display: flex;
      align-items: center;
      padding: 0.5rem;
      background-color: white;
      border-radius: 6px;
      margin-bottom: 0.5rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }
    
    .file-item i {
      color: var(--primary);
      margin-right: 0.75rem;
      font-size: 1.25rem;
    }
    
    .file-name {
      flex-grow: 1;
      color: var(--secondary);
    }
    
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 8px;
    }
    
    .btn-secondary {
      background-color: var(--secondary);
      border-color: var(--secondary);
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 8px;
    }
    
    .btn-primary:hover {
      background-color: #3a5bc7;
      border-color: #3a5bc7;
    }
    
    .btn-secondary:hover {
      background-color: #717384;
      border-color: #717384;
    }
    
    .info-text {
      font-size: 0.85rem;
      color: #6c757d;
      margin-top: 0.25rem;
    }
    
    .dynamic-select {
      transition: all 0.3s ease;
    }
  </style>
</head>

<body>
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="h3 font-weight-bold text-gray-800">
        <i class="fas fa-edit mr-2"></i>Edit Pengaduan
      </h2>
      <a href="<?= base_url('user/lihat_pengaduan/' . $pengaduan['id_pengaduan']); ?>" class="btn btn-link text-gray-800">
        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Detail
      </a>
    </div>

    <div class="card edit-card mb-4">
      <div class="card-header">
        <h4 class="mb-0">ID Pengaduan: #<?= $pengaduan['id_pengaduan'] ?></h4>
      </div>
      
      <form method="POST" action="<?= base_url('user/update_pengaduan/' . $pengaduan['id_pengaduan']); ?>" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-section">
            <h5 class="section-title">Informasi Pelapor</h5>
            
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                <input type="text" name="nama_pelapor" id="nama_pelapor" class="form-control" 
                       value="<?= $pengaduan['nama_pelapor']; ?>" required>
              </div>
              
              <div class="col-md-6 mb-3">
                <label for="no_telp_pelapor" class="form-label">No Telepon Pelapor</label>
                <input type="text" name="no_telp_pelapor" id="no_telp_pelapor" class="form-control" 
                       value="<?= $pengaduan['no_telp_pelapor']; ?>" required>
              </div>
            </div>
          </div>
          
          <div class="form-section">
            <h5 class="section-title">Informasi Pelaku Usaha</h5>
            
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nama_toko" class="form-label">Nama Toko/Usaha</label>
                <input type="text" name="nama_toko" id="nama_toko" class="form-control" 
                       value="<?= $pengaduan['nama_toko']; ?>" required>
              </div>
              
              <div class="col-md-6 mb-3">
                <label for="alamat_pelaku_usaha" class="form-label">Alamat Pelaku Usaha</label>
                <input type="text" name="alamat_pelaku_usaha" id="alamat_pelaku_usaha" class="form-control" 
                       value="<?= $pengaduan['alamat_pelaku_usaha']; ?>" required>
              </div>
              
              <div class="col-md-6 mb-3">
                <label for="no_telp_pelaku_usaha" class="form-label">No Telepon Pelaku Usaha</label>
                <input type="text" name="no_telp_pelaku_usaha" id="no_telp_pelaku_usaha" class="form-control" 
                       value="<?= $pengaduan['no_telp_pelaku_usaha']; ?>">
              </div>
              
              <div class="col-md-6 mb-3">
                <label for="id_jenis_barang_jasa" class="form-label">Jenis Barang/Jasa</label>
                <select name="id_jenis_barang_jasa" id="id_jenis_barang_jasa" class="form-select" required>
                  <option value="">Pilih Jenis Barang/Jasa</option>
                  <?php foreach ($jenis_barang_jasa as $jenis): ?>
                    <option value="<?= $jenis['id_jenis_barang_jasa']; ?>" 
                      <?= $pengaduan['id_jenis_barang_jasa'] == $jenis['id_jenis_barang_jasa'] ? 'selected' : ''; ?>>
                      <?= $jenis['jenis_barang_jasa']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          
          <div class="form-section">
            <h5 class="section-title">Detail Laporan</h5>
            
            <div class="mb-3">
              <label for="isi_laporan" class="form-label">Isi Laporan</label>
              <textarea name="isi_laporan" id="isi_laporan" class="form-control" rows="5" required><?= $pengaduan['isi_laporan']; ?></textarea>
              <div class="info-text">Isi kronologi kejadian sejelas mungkin, cantumkan kerugian yang dialami (jika ada).</div>
              
              <div class="mt-3">
                <label class="form-label">Pelengkap Isi Laporan</label>
                <select name="isi_laporan_tambahan" id="isi_laporan_tambahan" class="form-select" required onchange="toggleIsiLainnya(this)">
                  <option value="">-- Pilih --</option>
                  <option value="ancaman_kesehatan" <?= (isset($pengaduan['isi_laporan_tambahan']) && $pengaduan['isi_laporan_tambahan'] == 'ancaman_kesehatan') ? 'selected' : '' ?>>Ancaman kesehatan</option>
                  <option value="kerugian_materil" <?= (isset($pengaduan['isi_laporan_tambahan']) && $pengaduan['isi_laporan_tambahan'] == 'kerugian_materil') ? 'selected' : '' ?>>Kerugian materil</option>
                  <option value="kerugian_sosial" <?= (isset($pengaduan['isi_laporan_tambahan']) && $pengaduan['isi_laporan_tambahan'] == 'kerugian_sosial') ? 'selected' : '' ?>>Kerugian sosial</option>
                  <option value="lainnya" <?= (isset($pengaduan['isi_laporan_tambahan']) && $pengaduan['isi_laporan_tambahan'] == 'lainnya') ? 'selected' : '' ?>>Lainnya</option>
                </select>
                <input type="text" name="isi_laporan_lainnya" id="isi_laporan_lainnya" class="form-control mt-2"
                  style="<?= (isset($pengaduan['isi_laporan_tambahan']) && $pengaduan['isi_laporan_tambahan'] == 'lainnya') ? '' : 'display:none;' ?>"
                  value="<?= isset($pengaduan['isi_laporan_lainnya']) ? $pengaduan['isi_laporan_lainnya'] : '' ?>"
                  placeholder="Isi pelengkap lainnya">
              </div>
            </div>
            
            <div class="mb-3">
              <label for="kerugian_masyarakat" class="form-label">Kerugian Masyarakat</label>
              <textarea name="kerugian_masyarakat" id="kerugian_masyarakat" class="form-control" rows="5" required><?= $pengaduan['kerugian_masyarakat']; ?></textarea>
              <div class="info-text">Isi jumlah, nominal, ataupun bentuk kerugian yang dialami.</div>
              
              <div class="mt-3">
                <label class="form-label">Kategori Kerugian</label>
                <select name="kerugian_tambahan" id="kerugian_tambahan" class="form-select" required>
                  <option value="">-- Pilih --</option>
                  <option value="gt_10jt" <?= (isset($pengaduan['kerugian_tambahan']) && $pengaduan['kerugian_tambahan'] == 'gt_10jt') ? 'selected' : '' ?>>&gt; Rp 10.000.000,00</option>
                  <option value="gt_5jt" <?= (isset($pengaduan['kerugian_tambahan']) && $pengaduan['kerugian_tambahan'] == 'gt_5jt') ? 'selected' : '' ?>>&gt; Rp 5.000.000,00</option>
                  <option value="lt_5jt" <?= (isset($pengaduan['kerugian_tambahan']) && $pengaduan['kerugian_tambahan'] == 'lt_5jt') ? 'selected' : '' ?>>&lt; Rp 5.000.000,00</option>
                  <option value="kerugian_kesehatan" <?= (isset($pengaduan['kerugian_tambahan']) && $pengaduan['kerugian_tambahan'] == 'kerugian_kesehatan') ? 'selected' : '' ?>>Kerugian kesehatan</option>
                  <option value="kerugian_sosial" <?= (isset($pengaduan['kerugian_tambahan']) && $pengaduan['kerugian_tambahan'] == 'kerugian_sosial') ? 'selected' : '' ?>>Kerugian sosial</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="form-section">
            <h5 class="section-title">Tuntutan</h5>
            
            <div class="mb-3">
              <label for="id_jenis_tuntutan" class="form-label">Jenis Tuntutan</label>
              <select name="id_jenis_tuntutan" id="id_jenis_tuntutan" class="form-select dynamic-select" required>
                <!-- Opsi akan diisi oleh JS -->
              </select>
            </div>
          </div>
          
          <div class="form-section">
            <h5 class="section-title">Dokumen Pendukung</h5>
            
            <div class="mb-3">
              <label for="file_pendukung" class="form-label">Upload File Baru</label>
              <input type="file" name="file_pendukung" id="file_pendukung" class="form-control">
              <div class="info-text">Format: PDF, JPG, PNG (Maks. 5MB)</div>
            </div>
            
            <?php if (!empty($file_pendukung)): ?>
              <div class="file-preview">
                <h6 class="font-weight-bold mb-3">File Terlampir</h6>
                <?php foreach ($file_pendukung as $file): ?>
                  <div class="file-item">
                    <i class="fas fa-paperclip"></i>
                    <div class="file-name">
                      <a href="<?= base_url($file['file_path']); ?>" target="_blank"><?= basename($file['file_path']); ?></a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        
        <div class="card-footer bg-white text-right">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save mr-1"></i> Simpan Perubahan
          </button>
          <a href="<?= base_url('user/lihat_pengaduan/' . $pengaduan['id_pengaduan']); ?>" class="btn btn-secondary">
            <i class="fas fa-times mr-1"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <script>
    function toggleIsiLainnya(sel) {
      document.getElementById('isi_laporan_lainnya').style.display = sel.value === 'lainnya' ? 'block' : 'none';
    }
    
    const tuntutanOptions = {
      uang: [
        {value: 1, text: 'Pengembalian uang'},
        {value: 2, text: 'Penggantian jenis barang dan/atau jasa yang sejenis atau setara nilainya'}
      ],
      kesehatan: [
        {value: 3, text: 'Perawatan kesehatan'},
        {value: 4, text: 'Pemberian santunan'}
      ],
      sosial: [
        {value: 1, text: 'Pengembalian uang'},
        {value: 2, text: 'Penggantian jenis barang dan/atau jasa yang sejenis atau setara nilainya'},
        {value: 3, text: 'Perawatan kesehatan'},
        {value: 4, text: 'Pemberian santunan'}
      ]
    };
    
    function updateTuntutan() {
      const isi = document.getElementById('isi_laporan_tambahan').value;
      const kerugian = document.getElementById('kerugian_tambahan').value;
      const select = document.getElementById('id_jenis_tuntutan');
      select.innerHTML = '';
      let selected = "<?= $pengaduan['id_jenis_tuntutan'] ?>";
      
      if ((isi === 'ancaman_kesehatan' || kerugian === 'kerugian_kesehatan')) {
        tuntutanOptions.kesehatan.forEach(opt => {
          let o = new Option(opt.text, opt.value);
          if (selected == opt.value) o.selected = true;
          select.add(o);
        });
      } else if ((isi === 'kerugian_materil' && (kerugian === 'gt_10jt' || kerugian === 'gt_5jt' || kerugian === 'lt_5jt'))) {
        tuntutanOptions.uang.forEach(opt => {
          let o = new Option(opt.text, opt.value);
          if (selected == opt.value) o.selected = true;
          select.add(o);
        });
      } else if (isi === 'kerugian_sosial' || kerugian === 'kerugian_sosial') {
        tuntutanOptions.sosial.forEach(opt => {
          let o = new Option(opt.text, opt.value);
          if (selected == opt.value) o.selected = true;
          select.add(o);
        });
      } else {
        let o = new Option('-- Pilih tuntutan --', '');
        o.selected = true;
        select.add(o);
      }
    }
    
    document.getElementById('isi_laporan_tambahan').addEventListener('change', updateTuntutan);
    document.getElementById('kerugian_tambahan').addEventListener('change', updateTuntutan);
    
    // Inisialisasi saat halaman load
    document.addEventListener('DOMContentLoaded', function() {
      updateTuntutan();
      
      // Jika ada nilai lainnya yang dipilih, tampilkan field input
      if (document.getElementById('isi_laporan_tambahan').value === 'lainnya') {
        document.getElementById('isi_laporan_lainnya').style.display = 'block';
      }
    });
  </script>
</body>
</html>