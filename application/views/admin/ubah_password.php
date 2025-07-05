<?php
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-key"></i> Ubah Password</h1>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <div class="form-group">
            <label>ID User</label>
            <input type="text" class="form-control" value="<?= $user['id_user']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Nama Pegawai</label>
            <input type="text" class="form-control" value="<?= $user['nama_pegawai']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" value="<?= $user['username']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="text" class="form-control" value="<?= $user['role_name']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" class="form-control" name="password_baru" required>
            <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Ubah Password</button>
    </form>
</div>