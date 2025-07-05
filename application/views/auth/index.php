<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Layanan Pengaduan Online">
    <meta name="author" content="">

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
            --gradient-start: #3a0ca3;
            --gradient-end: #4361ee;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            min-height: 100vh;
            display: flex !important;
            align-items: center;
            justify-content: center;
        }

        .form-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .form-image {
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.9) 0%, rgba(58, 12, 163, 0.9) 100%), 
                        url('https://source.unsplash.com/random/600x800/?complaint,help') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 2rem;
        }

        .form-image-content {
            text-align: center;
        }

        .form-image i {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .form-image h2 {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .form-content {
            padding: 3rem;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .form-header h1 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: #6c757d;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 20px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group i {
            position: absolute;
            top: 15px;
            left: 15px;
            color: #6c757d;
        }

        .form-group input {
            padding-left: 40px !important;
        }

        .btn-submit {
            background-color: var(--primary);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 8px;
            padding: 12px 20px;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeeba;
            color: #856404;
        }

        .input-hint {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 0.25rem;
            display: block;
        }

        @media (max-width: 992px) {
            .form-image {
                display: none;
            }
            
            .form-content {
                padding: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card form-card">
                    <div class="row no-gutters">
                        <!-- Form Image Section -->
                        <div class="col-lg-6 form-image">
                            <div class="form-image-content">
                                <i class="fas fa-comment-dots"></i>
                                <h2>Layanan Pengaduan</h2>
                                <p>Sampaikan keluhan Anda dengan mudah dan cepat</p>
                            </div>
                        </div>
                        
                        <!-- Form Content Section -->
                        <div class="col-lg-6">
                            <div class="form-content">
                                <div class="form-header">
                                    <i class="fas fa-headset"></i>
                                    <h1>Layanan Pengaduan Online</h1>
                                    <p>Silakan isi form berikut</p>
                                </div>

                                <!-- Flash Message -->
                                <?php if ($this->session->flashdata('message')): ?>
                                    <div class="alert alert-<?= $this->session->flashdata('message_type') ?: 'success' ?>">
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Form -->
                                <form class="user" method="post" action="<?= base_url('auth/handle_form'); ?>">
                                    <div class="form-group">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" name="email" class="form-control" 
                                               placeholder="Masukkan Email Anda" required>
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-id-card"></i>
                                        <input type="text" name="nik" class="form-control"
                                            placeholder="Masukkan NIK Anda"
                                            pattern="63[0-9]{14}" maxlength="16" minlength="16"
                                            title="NIK harus 16 digit angka dan diawali 63 (Kalimantan Selatan)" required>
                                        <span class="input-hint">Format: 63xxxxxxxxxxxxxx (16 digit)</span>
                                    </div>
                                    <button type="submit" class="btn btn-submit btn-block">
                                        <i class="fas fa-paper-plane me-2"></i> Kirim Data Diri
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <script>
        // Add input validation feedback
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('invalid', function() {
                this.classList.add('is-invalid');
            });
            
            input.addEventListener('input', function() {
                if (this.checkValidity()) {
                    this.classList.remove('is-invalid');
                }
            });
        });
    </script>
</body>

</html>