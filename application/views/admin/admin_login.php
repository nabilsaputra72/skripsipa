<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Login Page">
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

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .login-image {
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.9) 0%, rgba(58, 12, 163, 0.9) 100%), 
                        url('https://source.unsplash.com/random/600x800/?office,admin') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 2rem;
        }

        .login-image-content {
            text-align: center;
        }

        .login-image i {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .login-image h2 {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .login-form {
            padding: 3rem;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .login-header h1 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .login-header p {
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

        .btn-login {
            background-color: var(--primary);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .alert-warning {
            border-radius: 8px;
            padding: 12px 20px;
            background-color: #fff3cd;
            border-color: #ffeeba;
            color: #856404;
        }

        @media (max-width: 992px) {
            .login-image {
                display: none;
            }
            
            .login-form {
                padding: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card login-card">
                    <div class="row no-gutters">
                        <!-- Login Image Section -->
                        <div class="col-lg-6 login-image">
                            <div class="login-image-content">
                                <i class="fas fa-lock-shield"></i>
                                <h2>Admin Dashboard</h2>
                                <p>Manage your system with secure access</p>
                            </div>
                        </div>
                        
                        <!-- Login Form Section -->
                        <div class="col-lg-6">
                            <div class="login-form">
                                <div class="login-header">
                                    <i class="fas fa-user-shield"></i>
                                    <h1>Admin Login</h1>
                                    <p>Please enter your credentials</p>
                                </div>

                                <?php if ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-warning"><?= $this->session->flashdata('error'); ?></div>
                                <?php endif; ?>

                                <!-- Form Login -->
                                <form class="user" method="post" action="<?= base_url('admin/login'); ?>">
                                    <div class="form-group">
                                        <i class="fas fa-user"></i>
                                        <input type="text" name="username" class="form-control form-control-user" 
                                               placeholder="Masukkan Username Anda" required>
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-key"></i>
                                        <input type="password" name="password" class="form-control form-control-user" 
                                               placeholder="Masukkan Password Anda" required>
                                    </div>
                                    <button type="submit" class="btn btn-login btn-block">
                                        <i class="fas fa-sign-in-alt me-2"></i> Login
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
</body>

</html>