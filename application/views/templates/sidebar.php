<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center py-4" href="<?= base_url(); ?>">
    <div class="sidebar-brand-icon">
      <i class="fas fa-shield-alt fa-2x"></i>
    </div>
    <div class="sidebar-brand-text mx-3">
      <span class="font-weight-bold">Pengaduan</span><br>
      <small class="text-white-50">Management System</small>
    </div>
  </a>

  <!-- Divider with subtle gradient -->
  <hr class="sidebar-divider my-0" style="border-top: 1px solid rgba(255,255,255,0.1);">

  <!-- User Profile Mini Card -->
  <div class="sidebar-user d-flex align-items-center px-3 py-3">
    <div class="sidebar-user-avatar">
      <i class="fas fa-user-circle fa-2x text-white-50"></i>
    </div>
    <div class="sidebar-user-details ml-2">
      <div class="text-white font-weight-bold"><?= $this->session->userdata('nama'); ?></div>
      <div class="text-white-50 small">
        <?php 
          $role = '';
          if($this->session->userdata('role_id') == 1) $role = 'Admin';
          elseif($this->session->userdata('role_id') == 2) $role = 'Kabid';
          elseif($this->session->userdata('role_id') == 3) $role = 'Superadmin';
          echo $role;
        ?>
      </div>
    </div>
  </div>

  <!-- Divider with subtle gradient -->
  <hr class="sidebar-divider my-0" style="border-top: 1px solid rgba(255,255,255,0.1);">

  <!-- Heading with subtle animation -->
  <div class="sidebar-heading px-3 mt-3 mb-1 text-uppercase font-weight-bold" style="letter-spacing: 0.1em; font-size: 0.7rem; color: rgba(255,255,255,0.6);">
    <span>Navigation</span>
  </div>

  <?php if ($this->session->userdata('role_id') == 1): ?>
    <!-- Menu Admin -->
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/data_masyarakat'); ?>">
        <div class="sidebar-icon bg-primary text-white rounded-circle p-2 mr-3">
          <i class="fas fa-users fa-fw"></i>
        </div>
        <span>Data Masyarakat</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/daftar_pengaduan'); ?>">
        <div class="sidebar-icon bg-info text-white rounded-circle p-2 mr-3">
          <i class="fas fa-list fa-fw"></i>
        </div>
        <span>Daftar Pengaduan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/kategori_pengaduan'); ?>">
        <div class="sidebar-icon bg-success text-white rounded-circle p-2 mr-3">
          <i class="fas fa-layer-group fa-fw"></i>
        </div>
        <span>Kategori Pengaduan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/cetak_laporan'); ?>">
        <div class="sidebar-icon bg-warning text-white rounded-circle p-2 mr-3">
          <i class="fas fa-print fa-fw"></i>
        </div>
        <span>Cetak Laporan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/ubah_password'); ?>">
        <div class="sidebar-icon bg-secondary text-white rounded-circle p-2 mr-3">
          <i class="fas fa-key fa-fw"></i>
        </div>
        <span>Ubah Password</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="#" data-toggle="modal" data-target="#logoutModal">
        <div class="sidebar-icon bg-danger text-white rounded-circle p-2 mr-3">
          <i class="fas fa-sign-out-alt fa-fw"></i>
        </div>
        <span>Logout</span>
      </a>
    </li>
  <?php elseif ($this->session->userdata('role_id') == 2): ?>
    <!-- Menu Kabid -->
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('kabid/persetujuan_pengaduan'); ?>">
        <div class="sidebar-icon bg-warning text-white rounded-circle p-2 mr-3">
          <i class="fas fa-check-circle fa-fw"></i>
        </div>
        <span>Persetujuan Pengaduan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('kabid/laporan_pengaduan'); ?>">
        <div class="sidebar-icon bg-info text-white rounded-circle p-2 mr-3">
          <i class="fas fa-chart-bar fa-fw"></i>
        </div>
        <span>Laporan Pengaduan</span>
      </a>
    </li>
    <li class="nav-item">
  <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('kabid/kepuasan'); ?>">
    <div class="sidebar-icon" style="background: linear-gradient(135deg, #ffb347 0%, #ffcc33 100%); color: #fff; border-radius: 50%; padding: 0.7rem 0.9rem; margin-right: 1rem;">
      <i class="fas fa-smile-beam fa-fw"></i>
    </div>
    <span>
      Kepuasan Masyarakat
      <span class="badge badge-pill" style="background: linear-gradient(90deg, #ffb347 0%, #ffcc33 100%); color: #fff; font-size: 0.8em; margin-left: 8px;">
        <i class="fas fa-star"></i>
      </span>
    </span>
  </a>
</li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="#" data-toggle="modal" data-target="#logoutModal">
        <div class="sidebar-icon bg-danger text-white rounded-circle p-2 mr-3">
          <i class="fas fa-sign-out-alt fa-fw"></i>
        </div>
        <span>Logout</span>
      </a>
    </li>
  <?php elseif ($this->session->userdata('role_id') == 3): ?>
    <!-- Menu Superadmin -->
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/pengguna'); ?>">
        <div class="sidebar-icon bg-primary text-white rounded-circle p-2 mr-3">
          <i class="fas fa-users fa-fw"></i>
        </div>
        <span>Kelola Pengguna</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/daftar_pengaduan'); ?>">
        <div class="sidebar-icon bg-info text-white rounded-circle p-2 mr-3">
          <i class="fas fa-list fa-fw"></i>
        </div>
        <span>Daftar Pengaduan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/kategori_pengaduan'); ?>">
        <div class="sidebar-icon bg-success text-white rounded-circle p-2 mr-3">
          <i class="fas fa-layer-group fa-fw"></i>
        </div>
        <span>Kategori Pengaduan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/cetak_laporan'); ?>">
        <div class="sidebar-icon bg-warning text-white rounded-circle p-2 mr-3">
          <i class="fas fa-print fa-fw"></i>
        </div>
        <span>Cetak Laporan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('kabid/persetujuan_pengaduan'); ?>">
        <div class="sidebar-icon bg-warning text-white rounded-circle p-2 mr-3">
          <i class="fas fa-check-circle fa-fw"></i>
        </div>
        <span>Persetujuan Pengaduan</span>
      </a>
    </li>
    <li class="nav-item">
    <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('kabid/kepuasan'); ?>">
      <div class="sidebar-icon" style="background: linear-gradient(135deg, #ffb347 0%, #ffcc33 100%); color: #fff; border-radius: 50%; padding: 0.7rem 0.9rem; margin-right: 1rem;">
        <i class="fas fa-smile-beam fa-fw"></i>
      </div>
      <span>
        Kepuasan Masyarakat
        <span class="badge badge-pill" style="background: linear-gradient(90deg, #ffb347 0%, #ffcc33 100%); color: #fff; font-size: 0.8em; margin-left: 8px;">
          <i class="fas fa-star"></i>
        </span>
      </span>
    </a>
  </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('kabid/laporan_pengaduan'); ?>">
        <div class="sidebar-icon bg-info text-white rounded-circle p-2 mr-3">
          <i class="fas fa-chart-bar fa-fw"></i>
        </div>
        <span>Laporan Pengaduan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/ubah_password'); ?>">
        <div class="sidebar-icon bg-secondary text-white rounded-circle p-2 mr-3">
          <i class="fas fa-key fa-fw"></i>
        </div>
        <span>Ubah Password</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="<?= base_url('admin/backup_database'); ?>">
        <div class="sidebar-icon bg-warning text-white rounded-circle p-2 mr-3">
          <i class="fas fa-database fa-fw"></i>
        </div>
        <span>Backup Database</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center py-3" href="#" data-toggle="modal" data-target="#logoutModal">
        <div class="sidebar-icon bg-danger text-white rounded-circle p-2 mr-3">
          <i class="fas fa-sign-out-alt fa-fw"></i>
        </div>
        <span>Logout</span>
      </a>
    </li>
  <?php endif; ?>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block" style="border-top: 1px solid rgba(255,255,255,0.1);">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline py-3">
    <button class="btn btn-circle" id="sidebarToggle" style="background: rgba(255,255,255,0.1); color: white;">
      <i class="fas fa-angle-double-left"></i>
    </button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Modern Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-gradient-primary text-white border-0">
        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <div class="d-flex align-items-center">
          <div class="mr-3">
            <i class="fas fa-question-circle fa-3x text-primary"></i>
          </div>
          <div>
            <h5 class="font-weight-bold mb-1">Anda yakin ingin keluar?</h5>
            <p class="text-muted mb-0">Pastikan semua pekerjaan Anda sudah disimpan.</p>
          </div>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button class="btn btn-light" type="button" data-dismiss="modal">
          <i class="fas fa-times mr-2"></i>Batal
        </button>
        <a class="btn btn-primary" href="<?= base_url('admin/logout') ?>">
          <i class="fas fa-sign-out-alt mr-2"></i>Logout
        </a>
      </div>
    </div>
  </div>
</div>