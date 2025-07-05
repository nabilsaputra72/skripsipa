<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 my-1 text-gray-800"><i class="fa fa-fw fa-users"></i> <?= isset($judul) ? $judul : 'Kelola Pengguna'; ?></h1>

    <!-- Tabel Pengguna Masyarakat -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>Pengguna Masyarakat</h5>
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

    <!-- Tabel Pengguna Admin -->
    <?php if ($this->session->userdata('role_id') == 3): ?>
    <div class="card mt-4">
        <div class="card-header">
            <h5>Pengguna Admin, Kabid, Superadmin</h5>
        </div>
        <div class="card-body">
            <!-- Tombol Tambah Pengguna -->
        <div class="mb-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPengguna">
                <i class="fa fa-plus"></i> Tambah Pengguna
            </button>
        </div>
            <div class="table-responsive">
                <table id="table-admin" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pengguna_admin)) : ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data!</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($pengguna_admin as $num => $p) : ?>
                                <tr>
                                    <td><?= $num + 1; ?></td>
                                    <td><?= $p['nama_pegawai']; ?></td>
                                    <td><?= $p['username']; ?></td>
                                    <td><?= $p['password']; ?></td>
                                    <td><?= $p['role_name']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm edit-pengguna" 
                                           data-id="<?= $p['id_user']; ?>" 
                                           data-nama="<?= $p['nama_pegawai']; ?>" 
                                           data-username="<?= $p['username']; ?>" 
                                           data-role="<?= $p['role_id']; ?>">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm" data-id="<?= $p['id_user']; ?>" id="hapus-pengguna">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal Hapus Data Pengguna -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title">Hapus <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/hapus_pengguna'); ?>" method="post">
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yakin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit Pengguna -->
<div class="modal fade" id="modalPengguna" tabindex="-1" role="dialog" aria-labelledby="modalPenggunaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/edit_pengguna'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPenggunaLabel">Edit Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_user" name="id_user">
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            <option value="1">Admin</option>
                            <option value="2">Kabid</option>
                            <option value="3">Superadmin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password (Opsional)</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="modalTambahPengguna" tabindex="-1" role="dialog" aria-labelledby="modalTambahPenggunaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/tambah_pengguna'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahPenggunaLabel">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            <option value="1">Admin</option>
                            <option value="2">Kabid</option>
                            <option value="3">Superadmin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $(document).ready(function() {
        /*
            saat user klik tombol hapus dengan id (#hapus-pengguna),
            isi value dari field yang memiliki class (modal-body) id (id),
            dengan value dari attribute data-id
        */
        $(document).on("click", "#hapus-pengguna", function() {
            const id = $(this).data('id');
            $(".modal-body #id").val(id);
            $("#modalHapus").modal('show');
        });

        // Saat tombol Edit diklik
        $(document).on("click", ".edit-pengguna", function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const username = $(this).data('username');
            const role = $(this).data('role');

            // Isi data ke dalam modal
            $("#modalPengguna #id_user").val(id);
            $("#modalPengguna #nama_pegawai").val(nama);
            $("#modalPengguna #username").val(username);
            $("#modalPengguna #role_id").val(role);

            // Kosongkan field password (karena opsional)
            $("#modalPengguna #password").val('');

            // Tampilkan modal
            $("#modalPengguna").modal('show');
        });

        // Validasi tambahan untuk form tambah pengguna
        $('#modalTambahPengguna form').on('submit', function(e) {
            const password = $('#password').val();
            if (password.length < 0) { // Pastikan password tidak kosong
                alert('Password tidak boleh kosong.');
                e.preventDefault();
            }
        });
    });
</script>

</body>

</html>

<link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<script>
    $(document).ready(function(){

     load_data();

     function load_data(query)
     {
      $.ajax({
       url:"<?php echo base_url(); ?>admin/fetch_pengguna",
       method:"POST",
       data:{query:query},
       success:function(data){
        $('#result').html(data);
       }
      })
     }

     $('#search_text').keyup(function(){
      var search = $(this).val();
      if(search != '')
      {
       load_data(search);
      }
      else
      {
       load_data();
      }
     });
    });
</script>
<?php $this->load->view('templates/footer'); ?>