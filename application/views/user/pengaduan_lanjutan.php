<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan - Lanjutan</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --secondary: #4cc9f0;
            --success: #28a745;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 2rem;
            color: var(--dark);
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .form-container:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }

        .form-header h2 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
        }

        .form-body {
            padding: 2rem;
        }

        .alert {
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            border-left: 4px solid var(--success);
            color: var(--success);
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            border-left: 4px solid var(--danger);
            color: var(--danger);
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            background-color: white;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
        }

        .form-text {
            display: block;
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: var(--gray);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.8rem 2rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .btn-submit i {
            margin-right: 0.5rem;
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 2.5rem;
            color: var(--gray);
        }

        .file-input {
            padding: 0.5rem;
        }

        .file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .file-input::before {
            content: 'Pilih File';
            display: inline-block;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            outline: none;
            white-space: nowrap;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .file-input:hover::before {
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .form-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="form-header">
            <h2><i class="fas fa-comment-dots mr-2"></i>Form Pengaduan - Lanjutan</h2>
        </div>
        
        <div class="form-body">
            <!-- Flash Messages -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle mr-2"></i><?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle mr-2"></i><?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?= base_url('user/simpan_pengaduan'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="nik" value="<?= $this->session->userdata('nik'); ?>">
                <input type="hidden" name="tgl_pengaduan" value="<?= date('Y-m-d H:i:s'); ?>">
                <input type="hidden" name="nama_pelapor" value="<?= $this->input->post('nama_pelapor'); ?>">
                <input type="hidden" name="no_telp_pelapor" value="<?= $this->input->post('no_telp_pelapor'); ?>">
                <input type="hidden" name="alamat_pelaku_usaha" value="<?= $this->input->post('alamat_pelaku_usaha'); ?>">
                <input type="hidden" name="kabupaten_kota" value="<?= $this->input->post('kabupaten_kota'); ?>">

                <div class="form-group">
                    <label for="nama_toko" class="form-label">Nama Toko</label>
                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" required>
                    <i class="fas fa-store input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="no_telp_pelaku_usaha" class="form-label">No Telepon Pelaku Usaha</label>
                    <input type="text" class="form-control" id="no_telp_pelaku_usaha" name="no_telp_pelaku_usaha" required>
                    <i class="fas fa-phone input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="id_jenis_barang_jasa" class="form-label">Jenis Barang/Jasa</label>
                    <select class="form-control" id="id_jenis_barang_jasa" name="id_jenis_barang_jasa" required>
                        <option value="">Pilih Jenis Barang/Jasa</option>
                        <?php foreach ($jenis_barang_jasa as $jenis): ?>
                            <option value="<?= $jenis['id_jenis_barang_jasa']; ?>"><?= $jenis['jenis_barang_jasa']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="isi_laporan" class="form-label">Isi Laporan</label>
                    <textarea class="form-control" id="isi_laporan" name="isi_laporan" required placeholder="Isi kronologi kejadian sejelas mungkin, cantumkan kerugian yang dialami (jika ada)"></textarea>
                    <small class="form-text">Isi kronologi kejadian sejelas mungkin, cantumkan kerugian yang dialami (jika ada).</small>
                    
                    <div class="mt-3">
                        <label class="form-label">Pilih pelengkap isi laporan:</label>
                        <select class="form-control" name="isi_laporan_tambahan" id="isi_laporan_tambahan" required onchange="toggleIsiLainnya(this)">
                            <option value="">-- Pilih --</option>
                            <option value="ancaman_kesehatan">Ancaman kesehatan</option>
                            <option value="kerugian_materil">Kerugian materil</option>
                            <option value="kerugian_sosial">Kerugian sosial</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        <input type="text" class="form-control mt-2" name="isi_laporan_lainnya" id="isi_laporan_lainnya" style="display:none;" placeholder="Isi pelengkap lainnya">
                    </div>
                </div>

                <div class="form-group">
                    <label for="kerugian_masyarakat" class="form-label">Kerugian Masyarakat</label>
                    <textarea class="form-control" id="kerugian_masyarakat" name="kerugian_masyarakat" required placeholder="Isi jumlah, nominal, ataupun bentuk kerugian yang dialami"></textarea>
                    <small class="form-text">Isi jumlah, nominal, ataupun bentuk kerugian yang dialami.</small>
                    
                    <div class="mt-3">
                        <label class="form-label">Pilih pelengkap kerugian:</label>
                        <select class="form-control" name="kerugian_tambahan" id="kerugian_tambahan" required>
                            <option value="">-- Pilih --</option>
                            <option value="lt_5jt">Rp 0 - 5.000.000,00</option>
                            <option value="gt_5jt">Rp 5.000.000,00 - 10.000.000,00</option>
                            <option value="gt_10jt">Rp 10.000.000,00 ke atas</option>
                            <option value="kerugian_kesehatan">Kerugian kesehatan</option>
                            <option value="kerugian_sosial">Kerugian sosial</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_jenis_tuntutan" class="form-label">Jenis Tuntutan</label>
                    <select class="form-control" name="id_jenis_tuntutan" id="id_jenis_tuntutan" required>
                        <!-- Opsi akan diisi oleh JS -->
                        <option value="">-- Pilih tuntutan --</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="file_pendukung" class="form-label">Bukti Pendukung</label>
                    <input type="file" class="form-control file-input" id="file_pendukung" name="file_pendukung[]" multiple>
                </div>

                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script>
        // Fungsi untuk menampilkan/menyembunyikan field "Lainnya"
        function toggleIsiLainnya(sel) {
            document.getElementById('isi_laporan_lainnya').style.display = sel.value === 'lainnya' ? 'block' : 'none';
            updateTuntutan();
        }

        // Data opsi tuntutan
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

        // Fungsi untuk memperbarui opsi tuntutan berdasarkan pilihan
        function updateTuntutan() {
            const isi = document.getElementById('isi_laporan_tambahan').value;
            const kerugian = document.getElementById('kerugian_tambahan').value;
            const select = document.getElementById('id_jenis_tuntutan');
            
            // Kosongkan dropdown
            select.innerHTML = '';
            
            // Tambahkan opsi default
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = '-- Pilih tuntutan --';
            select.appendChild(defaultOption);
            
            // Tambahkan opsi berdasarkan kondisi
            if ((isi === 'ancaman_kesehatan' || kerugian === 'kerugian_kesehatan')) {
                tuntutanOptions.kesehatan.forEach(opt => {
                    const option = document.createElement('option');
                    option.value = opt.value;
                    option.textContent = opt.text;
                    select.appendChild(option);
                });
            } else if ((isi === 'kerugian_materil' && (kerugian === 'gt_10jt' || kerugian === 'gt_5jt' || kerugian === 'lt_5jt'))) {
                tuntutanOptions.uang.forEach(opt => {
                    const option = document.createElement('option');
                    option.value = opt.value;
                    option.textContent = opt.text;
                    select.appendChild(option);
                });
            } else if (isi === 'kerugian_sosial' || kerugian === 'kerugian_sosial') {
                tuntutanOptions.sosial.forEach(opt => {
                    const option = document.createElement('option');
                    option.value = opt.value;
                    option.textContent = opt.text;
                    select.appendChild(option);
                });
            }
        }

        // Event listeners untuk dropdown
        document.getElementById('isi_laporan_tambahan').addEventListener('change', updateTuntutan);
        document.getElementById('kerugian_tambahan').addEventListener('change', updateTuntutan);

        // Inisialisasi awal
        updateTuntutan();
    </script>
</body>
</html>