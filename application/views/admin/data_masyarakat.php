<?php
?>
<!-- filepath: application/views/admin/data_masyarakat.php -->
<div class="container-fluid">
    <h1 class="h3 my-1 text-gray-800"><i class="fa fa-fw fa-users"></i> <?= isset($judul) ? $judul : 'Data Masyarakat'; ?></h1>
    <div class="card mt-4">
        <div class="card-header">
            <h5>Data Pengguna Masyarakat</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-masyarakat" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Email</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pengguna_masyarakat)) : ?>
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data!</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($pengguna_masyarakat as $num => $p) : ?>
                                <tr>
                                    <td><?= $num + 1; ?></td>
                                    <td><?= $p['nik']; ?></td>
                                    <td><?= $p['email']; ?></td>
                                    <td><?= $p['created_at']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>