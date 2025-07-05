<?php
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="card mt-4">
        <div class="card-body">
            <p>
                <strong>Backup terakhir:</strong>
                <?= $last_backup ? $last_backup : '<span class="text-danger">Belum pernah backup</span>'; ?>
            </p>
            <form action="<?= base_url('admin/do_backup_database'); ?>" method="post">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-download"></i> Backup Database Sekarang
                </button>
            </form>
            <div class="small text-muted mt-2">
                File backup akan otomatis terdownload dan tersimpan di folder <code>uploads/</code> server.
            </div>
        </div>
    </div>
</div>