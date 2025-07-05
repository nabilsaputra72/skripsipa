<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan</title>
    
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

        .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
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
            <h2><i class="fas fa-comment-dots mr-2"></i>Form Pengaduan</h2>
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

            <form method="POST" action="<?= base_url('user/pengaduan_lanjutan'); ?>">
                <input type="hidden" name="nik" value="<?= $this->session->userdata('nik'); ?>">

                <div class="form-group">
                    <label for="tgl_pengaduan" class="form-label">Tanggal Pengaduan</label>
                    <input type="date" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" value="<?= date('Y-m-d'); ?>" readonly>
                    <i class="fas fa-calendar input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" required>
                    <i class="fas fa-user input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="no_telp_pelapor" class="form-label">No Telepon Pelapor</label>
                    <input type="text" class="form-control" id="no_telp_pelapor" name="no_telp_pelapor" 
                           placeholder="+62xxxxxxxxxxx" required 
                           pattern="^\+62[0-9]{9,13}$" 
                           title="Nomor telepon harus diawali dengan +62 dan diikuti 9-13 digit angka">
                    <i class="fas fa-phone input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="alamat_pelaku_usaha" class="form-label">Alamat Pelaku Usaha</label>
                    <input type="text" class="form-control" id="alamat_pelaku_usaha" name="alamat_pelaku_usaha" required>
                    <i class="fas fa-map-marker-alt input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="kabupaten_kota" class="form-label">Kabupaten/Kota</label>
                    <select class="form-control" id="kabupaten_kota" name="kabupaten_kota" required>
                        <option value="">Pilih Kabupaten/Kota</option>
                        <?php foreach ($kabupaten_kota as $kabupaten): ?>
                            <option value="<?= $kabupaten['id_kabupaten_kota']; ?>"><?= $kabupaten['nama_kabupaten_kota']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-arrow-right mr-2"></i>Berikutnya
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script>
        document.getElementById('no_telp_pelapor').addEventListener('input', function (e) {
            const input = e.target.value;
            const pattern = /^\+62[0-9]{0,13}$/;
            
            if (!pattern.test(input)) {
                e.target.setCustomValidity('Nomor telepon harus diawali dengan +62 dan diikuti maksimal 13 digit angka.');
            } else {
                e.target.setCustomValidity('');
            }
            
            // Visual feedback
            if (pattern.test(input)) {
                e.target.style.borderColor = '#28a745';
                e.target.style.boxShadow = '0 0 0 3px rgba(40, 167, 69, 0.2)';
            } else {
                e.target.style.borderColor = '#dc3545';
                e.target.style.boxShadow = '0 0 0 3px rgba(220, 53, 69, 0.2)';
            }
        });
    </script>
</body>
</html>