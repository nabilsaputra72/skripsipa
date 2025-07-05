<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LAPOR DESA - Layanan Pengaduan Online</title>
  <meta name="description" content="Layanan pengaduan online masyarakat desa">
  <meta name="keywords" content="pengaduan, lapor, desa, masyarakat">

  <!-- Favicon -->
  <link rel="icon" href="https://via.placeholder.com/64" type="image/png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    :root {
      --primary: #4361ee;
      --primary-dark: #3a0ca3;
      --secondary: #4cc9f0;
      --light: #f8f9fa;
      --dark: #212529;
      --success: #4bb543;
      --warning: #f1c40f;
      --danger: #e74c3c;
      --gray: #6c757d;
      --light-gray: #e9ecef;
    }

    body {
      font-family: 'Inter', sans-serif;
      color: var(--dark);
      overflow-x: hidden;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
    }

    /* Navbar */
    .navbar {
      background: rgba(255, 255, 255, 0.98);
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      padding: 15px 0;
      transition: all 0.3s ease;
    }

    .navbar.scrolled {
      padding: 10px 0;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
      height: 40px;
    }

    .nav-link {
      font-weight: 500;
      margin: 0 8px;
      position: relative;
      color: var(--dark);
    }

    .nav-link:after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: var(--primary);
      transition: width 0.3s ease;
    }

    .nav-link:hover:after,
    .nav-link.active:after {
      width: 100%;
    }

    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
      padding: 8px 20px;
      font-weight: 500;
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
    }

    .btn-outline-primary {
      color: var(--primary);
      border-color: var(--primary);
    }

    .btn-outline-primary:hover {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    /* Hero Section */
    #hero {
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      color: white;
      padding: 120px 0 80px;
      position: relative;
      overflow: hidden;
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .hero-title {
      font-size: 2.8rem;
      line-height: 1.3;
      margin-bottom: 20px;
    }

    .hero-subtitle {
      font-size: 1.2rem;
      margin-bottom: 30px;
      opacity: 0.9;
    }

    .hero-img {
      position: relative;
      z-index: 1;
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
      100% { transform: translateY(0px); }
    }

    /* Features Section */
    .feature-card {
      background: white;
      border-radius: 12px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
      border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      background: rgba(67, 97, 238, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
      color: var(--primary);
      font-size: 30px;
    }

    /* Process Section */
    .process-step {
      position: relative;
      padding-left: 90px;
      margin-bottom: 40px;
    }

    .step-number {
      position: absolute;
      left: 0;
      top: 0;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: var(--primary);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      font-weight: 700;
    }

    /* Stats Section */
    .stats-section {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      padding: 80px 0;
    }

    .stat-card {
      background: white;
      border-radius: 12px;
      padding: 30px;
      text-align: center;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      margin-bottom: 30px;
      transition: all 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .stat-number {
      font-size: 3rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 10px;
    }

    /* Contact Section */
    .contact-section {
      background-color: var(--light);
    }

    .contact-info {
      margin-bottom: 30px;
    }

    .contact-info i {
      font-size: 24px;
      color: var(--primary);
      margin-right: 15px;
    }

    /* Footer */
    .footer {
      background-color: var(--dark);
      color: white;
      padding: 60px 0 30px;
    }

    .footer-links h5 {
      margin-bottom: 20px;
      position: relative;
      padding-bottom: 10px;
    }

    .footer-links h5:after {
      content: '';
      position: absolute;
      width: 50px;
      height: 3px;
      bottom: 0;
      left: 0;
      background-color: var(--secondary);
    }

    .footer-links ul {
      list-style: none;
      padding-left: 0;
    }

    .footer-links li {
      margin-bottom: 10px;
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .footer-links a:hover {
      color: white;
      padding-left: 5px;
    }

    .social-links a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      margin-right: 10px;
      transition: all 0.3s ease;
    }

    .social-links a:hover {
      background: var(--secondary);
      transform: translateY(-3px);
    }

    /* Responsive */
    @media (max-width: 992px) {
      .hero-title {
        font-size: 2.2rem;
      }
    }

    @media (max-width: 768px) {
      #hero {
        padding: 100px 0 60px;
        text-align: center;
      }
      
      .hero-title {
        font-size: 2rem;
      }
      
      .hero-img {
        margin-top: 40px;
      }
      
      .process-step {
        padding-left: 0;
        padding-top: 80px;
        text-align: center;
      }
      
      .step-number {
        left: 50%;
        top: 0;
        transform: translateX(-50%);
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?= base_url('assets/img/ulipk.png') ?>" alt="ULIPK">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#hero">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#features">Fitur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#process">Prosedur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Kontak</a>
          </li>
          <li class="nav-item ms-lg-3">
            <a class="btn btn-outline-primary" href="<?= base_url('admin/login'); ?>">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 hero-content" data-aos="fade-right">
          <h1 class="hero-title">Iqbal Pengaduan Perlindungan Konsumen ke Dinas Perdagangan Prov Kalsel</h1>
          <p class="hero-subtitle">Dinas Perdagangan Provinsi Kalimantan Selatan siap membantu menyelesaikan keluhan Anda melalui mekanisme klarifikasi dan mediasi dengan pelaku usaha. Mari jadi konsumen cerdas yang berani mengadu untuk hak yang lebih terlindungi</p>
          <div class="d-flex flex-wrap gap-3">
            <a href="Auth" class="btn btn-light btn-lg">Tulis Pengaduan</a>
            <a href="#process" class="btn btn-outline-light btn-lg">Pelajari Prosedur</a>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <img src="<?= base_url('assets/img/welcome.svg') ?>" alt="Hero Image" class="img-fluid hero-img">
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="py-5 my-5">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2>Apa itu Pengaduan Perlindungan Konsumen?</h2>
        <p class="lead">Platform pengaduan online untuk meningkatkan pelayanan publik dalam bidang Perdagangan</p>
      </div>
      
      <div class="row">
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-chart-line"></i>
            </div>
            <h4>Meningkatkan Mutu Pelayanan</h4>
            <p>Dengan adanya sistem ini diharapkan dapat meningkatkan pelayanan terhadap masyarakat dengan lebih baik dan transparan.</p>
          </div>
        </div>
        
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-clock"></i>
            </div>
            <h4>Praktis dan Hemat Waktu</h4>
            <p>Masyarakat tidak perlu datang ke kantor dinas perdagangan prov kalsel untuk melakukan pengaduan, cukup akses secara online kapan saja.</p>
          </div>
        </div>
        
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-shield-alt"></i>
            </div>
            <h4>Terjamin Keamanannya</h4>
            <p>Data dan identitas pengadu dilindungi dengan sistem keamanan yang baik untuk privasi masyarakat.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Process Section -->
  <section id="process" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2>Prosedur Pengaduan</h2>
        <p class="lead">Langkah-langkah mudah untuk menyampaikan pengaduan Anda</p>
      </div>
      
      <div class="row">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="process-step">
            <div class="step-number">1</div>
            <h4>Lakukan penginputan NIK dan Email</h4>
            <p>Melakukan daftar data diri berupa NIK dan Email, yang nantinya pengisian laporan lebih lanjut akan dikirimkan ke alamat email yang telah di daftarkan</p>
          </div>
          
          <div class="process-step">
            <div class="step-number">2</div>
            <h4>Tulis Pengaduan</h4>
            <p>Tulis pengaduan yang sesuai dengan masalah yang Anda alami atau temui. Sertakan bukti pendukung jika diperlukan.</p>
          </div>
          
          <div class="process-step">
            <div class="step-number">3</div>
            <h4>Verifikasi Pengaduan</h4>
            <p>Pengaduan Anda akan diproses dan diverifikasi oleh petugas kami dalam waktu 1-2 hari kerja.</p>
          </div>
        </div>
        
        <div class="col-lg-6" data-aos="fade-left">
          <div class="process-step">
            <div class="step-number">4</div>
            <h4>Proses Tindak Lanjut</h4>
            <p>Setelah diverifikasi, pengaduan akan ditindaklanjuti oleh pihak terkait sesuai dengan jenis pengaduan.</p>
          </div>
          
          <div class="process-step">
            <div class="step-number">5</div>
            <h4>Beri Tanggapan</h4>
            <p>Anda akan menerima tanggapan dan solusi melalui sistem atau kontak yang Anda daftarkan.</p>
          </div>
          
          <div class="process-step">
            <div class="step-number">6</div>
            <h4>Selesai</h4>
            <p>Anda bisa melihat status pengaduan dari pesan yang sistem kirimkan nantinya</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="stats-section">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="stat-card">
            <div class="stat-number"><?= isset($stats['pengaduan_masuk']) ? $stats['pengaduan_masuk'] : 0 ?></div>
            <p>Pengaduan Masuk</p>
            <div class="progress mt-3" style="height: 8px;">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="stat-card">
            <div class="stat-number"><?= isset($stats['pengaduan_selesai']) ? $stats['pengaduan_selesai'] : 0 ?></div>
            <p>Pengaduan Selesai</p>
            <div class="progress mt-3" style="height: 8px;">
              <div class="progress-bar bg-success" role="progressbar" style="width: <?= isset($stats['tingkat_penyelesaian']) ? $stats['tingkat_penyelesaian'] : 0 ?>%" aria-valuenow="<?= isset($stats['tingkat_penyelesaian']) ? $stats['tingkat_penyelesaian'] : 0 ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="stat-card">
            <div class="stat-number"><?= isset($stats['tingkat_penyelesaian']) ? $stats['tingkat_penyelesaian'] : 0 ?>%</div>
            <p>Tingkat Penyelesaian</p>
            <div class="progress mt-3" style="height: 8px;">
              <div class="progress-bar bg-info" role="progressbar" style="width: <?= isset($stats['tingkat_penyelesaian']) ? $stats['tingkat_penyelesaian'] : 0 ?>%" aria-valuenow="<?= isset($stats['tingkat_penyelesaian']) ? $stats['tingkat_penyelesaian'] : 0 ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-5 contact-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
          <h2 class="mb-4">Hubungi Kami</h2>
          <p class="mb-5">Jika Anda memiliki pertanyaan atau membutuhkan bantuan, silakan hubungi kami melalui informasi kontak berikut.</p>
          
          <div class="contact-info">
            <div class="d-flex mb-4">
              <i class="fas fa-map-marker-alt"></i>
              <div>
                <h5>Alamat</h5>
                <p>Jl. S. Parman No.44, Antasan Besar, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70114</p>
              </div>
            </div>
            
            <div class="d-flex mb-4">
              <i class="fas fa-envelope"></i>
              <div>
                <h5>Email</h5>
                <p>dinasperdagangan.kalsel@gmail.com</p>
              </div>
            </div>
            
            <div class="d-flex">
              <i class="fas fa-phone-alt"></i>
              <div>
                <h5>Telepon</h5>
                <p>(0511) 3354219</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6" data-aos="fade-left">
  <div class="card shadow-sm">
    <div class="card-body p-0 rounded-3 overflow-hidden">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1276.735183808635!2d114.5879822!3d-3.3224978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de422c2e6c7b8e3%3A0x2e3b2e7c7b8e3e7c!2sJl.%20S.%20Parman%20No.44%2C%20Antasan%20Besar%2C%20Kec.%20Banjarmasin%20Tengah%2C%20Kota%20Banjarmasin%2C%20Kalimantan%20Selatan%2070114!5e0!3m2!1sid!2sid!4v1715432100000!5m2!1sid!2sid"
        frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  </div>
</div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h5 class="mb-4">Tentang ULIPK</h5>
          <p>Unit Layanan Informasi Perlindungan Konsumen (ULIPK) adalah sebuah website online teruntuk masyarakat memiliki permasalahan sengketa dengan pelaku usaha untuk mendapatkan hak sebagai konsumen dan dalam bentuk perlindungan dalam bidang perdagangan</p>
          <div class="social-links mt-4">
            <a href="https://web.facebook.com/p/Dinas-Perdagangan-Prov-Kalsel-100063647126557/?_rdc=1&_rdr#"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/disdagprov.kalsel/"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        
        <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
          <h5 class="mb-4">Tautan Cepat</h5>
          <ul class="footer-links">
            <li><a href="#hero">Beranda</a></li>
            <li><a href="#features">Fitur</a></li>
            <li><a href="#process">Prosedur</a></li>
            <li><a href="#contact">Kontak</a></li>
            <li><a href="<?= base_url('admin/login'); ?>">Admin</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
          <h5 class="mb-4">Berita Terkini</h5>
          <ul class="footer-links">
            <li><a href="https://disdag.kalselprov.go.id/page/wp/informasi/102/281_Melalui-Pelatihan-Akses-dan-Surveu-Pasar-Ekspor-Melalui-Internet,-Pemprov-Kalsel-Dorong-UMKM-Naik-Kelas">Melalui Pelatihan Akses dan Survey Pasar Ekspor Melalui Internet, Pemprov Kalsel Dorong UMKM Naik Kelas</a></li>
            <li><a href="https://disdag.kalselprov.go.id/page/wp/informasi/102/430_JAUHI-NARKOBA-KEJAR-MASA-DEPAN-ANDA">JAUHI NARKOBA KEJAR MASA DEPAN ANDA</a></li>
            <li><a href="https://disdag.kalselprov.go.id/page/wp///858_SURVEY-IKK">SURVEY IKK</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <h5 class="mb-4">Kontak</h5>
          <ul class="footer-links">
            <li><i class="fas fa-map-marker-alt me-2"></i> Jl. S. Parman No.44, Antasan Besar, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70114</li>
            <li><i class="fas fa-envelope me-2"></i> dinasperdagangan.kalsel@gmail.com</li>
            <li><i class="fas fa-phone-alt me-2"></i> (0511) 3354219</li>
          </ul>
        </div>
      </div>
      
      <hr class="mt-5 mb-4" style="border-color: rgba(255,255,255,0.1);">
      </div>
    </div>
  </footer>

  <!-- Back to Top -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></a>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- AOS Animation -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Custom JS -->
  <script>
    // Initialize AOS
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true
    });
    
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        document.querySelector('.navbar').classList.add('scrolled');
      } else {
        document.querySelector('.navbar').classList.remove('scrolled');
      }
    });
    
    // Back to top button
    const backToTopButton = document.querySelector('.back-to-top');
    window.addEventListener('scroll', function() {
      if (window.scrollY > 300) {
        backToTopButton.style.display = 'flex';
      } else {
        backToTopButton.style.display = 'none';
      }
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

    // Aktifkan underline menu sesuai scroll/klik
    const sections = ['#hero', '#features', '#process', '#contact'];
    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');

    function setActiveMenu() {
      let index = sections.length - 1;
      for (let i = 0; i < sections.length; i++) {
        const section = document.querySelector(sections[i]);
        if (section && window.scrollY + 80 < section.offsetTop) {
          index = i - 1;
          break;
        }
      }
      navLinks.forEach(link => link.classList.remove('active'));
      if (index >= 0) navLinks[index].classList.add('active');
      else navLinks[0].classList.add('active');
    }

    window.addEventListener('scroll', setActiveMenu);
    window.addEventListener('load', setActiveMenu);
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        navLinks.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>
</body>
</html>