<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/admin'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2"><?= $admin['nama_lengkap']; ?></h1>
    </div>
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success bg-gradient-header alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div class="w-100 ms-3">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger bg-gradient-header alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>
                <div class="w-100 ms-3">
                    <?= session()->getFlashdata('error'); ?>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </div>
        </div>
    <?php endif; ?>
    <?php if ($admin['active'] == 0) : ?>
        <div class="alert alert-warning bg-gradient-header" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="w-100 ms-3">
                    Akun ini belum aktif!
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center mb-3">
        <div class="img-thumbnail rounded-pill" style="background-image: url('<?= ($admin['foto_user'] == NULL) ? env('ALUMNI') . 'images/profile/blank.jpg' : env('ALUMNI') . 'images/profile/' . $admin['foto_user']; ?>'); background-color: #cccccc; width: 256px; aspect-ratio: 1/1; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;"></div>
    </div>
    <hr>
    <!-- NAMA LENGKAP -->
    <div class="mb-3 row">
        <label for="nama_lengkap" class="col-xl-3 col-form-label"><strong>Nama Lengkap</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="nama_lengkap" name="nama_lengkap" value="<?= $admin['nama_lengkap']; ?>">
        </div>
    </div>

    <!-- NAMA PENGGUNA -->
    <div class="mb-3 row">
        <label for="username" class="col-xl-3 col-form-label"><strong>Nama Pengguna</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="username" name="username" value="<?= $admin['username']; ?>">
        </div>
    </div>

    <!-- JENIS -->
    <div class="mb-3 row">
        <label for="type" class="col-xl-3 col-form-label"><strong>Jenis Pengguna</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="type" name="type" value="<?= ($admin['type'] == 1) ? 'Master Admin' : (($admin['type'] == 2) ? 'Admin' : ''); ?>">
        </div>
    </div>

    <!-- AKTIF -->
    <div class="mb-3 row">
        <label for="active" class="col-xl-3 col-form-label"><strong>Pengguna Aktif?</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="active" name="active" value="<?= ($admin['active'] == 1) ? 'Aktif' : 'Tidak Aktif'; ?>">
        </div>
    </div>
    <hr>
    <div class="d-grid gap-2 d-lg-flex justify-content-lg-end mb-3">
        <div class="d-grid gap-2 d-lg-flex">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-resetpassword" class="btn btn-secondary bg-gradient" onclick="$('#modal-resetpassword #resetpassword').attr('action', '<?= base_url('/admin/resetpassword/' . $admin['id_user']); ?>')"><i class="fa-solid fa-key"></i> Reset Kata Sandi</button>
        </div>
        <?php if ($admin['active'] == 0) : ?>
            <div class="d-grid gap-2 d-lg-flex" action="<?= base_url('/admin/activate/' . $admin['id_user']); ?>" method="post">
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-activate" class="btn btn-success bg-gradient" onclick="$('#modal-activate #activate').attr('action', '<?= base_url('/admin/activate/' . $admin['id_user']); ?>')"><i class="fa-solid fa-user-check"></i> Aktifkan akun</button>
            </div>
        <?php elseif ($admin['active'] == 1) : ?>
            <div class="d-grid gap-2 d-lg-flex" action="<?= base_url('/admin/deactivate/' . $admin['id_user']); ?>" method="post">
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-deactivate" class="btn btn-warning bg-gradient" onclick="$('#modal-deactivate #deactivate').attr('action', '<?= base_url('/admin/deactivate/' . $admin['id_user']); ?>')"><i class="fa-solid fa-user-large-slash"></i> Nonaktifkan akun</button>
            </div>
        <?php endif; ?>
        <div class="d-grid gap-2 d-lg-flex">
            <a class="btn btn-primary bg-gradient" href="<?= base_url('admin/edit/' . $admin['id_user']); ?>" role="button"><i class="fa-solid fa-user-pen"></i> Edit</a>
        </div>
        <div class="d-grid gap-2 d-lg-flex" action="<?= base_url('/admin/delete/' . $admin['id_user']); ?>" method="post">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete" class="btn btn-danger bg-gradient" onclick="$('#modal-delete #delete').attr('action', '<?= base_url('/admin/delete/' . $admin['id_user']); ?>')"><i class="fa-solid fa-trash"></i> Hapus</button>
        </div>
    </div>
    <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-resetpassword" tabindex="-1" aria-labelledby="modal-resetpassword" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Reset Kata Sandi "<?= $admin['nama_lengkap']; ?>"?</h5>
                </div>
                <form class="modal-footer flex-nowrap p-0" id="resetpassword" action="" method="post">
                    <input type="hidden" name="_method" value="POST">
                    <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</a>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-activate" tabindex="-1" aria-labelledby="modal-activate" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Aktifkan "<?= $admin['nama_lengkap']; ?>"?</h5>
                </div>
                <form class="modal-footer flex-nowrap p-0" id="activate" action="" method="post">
                    <input type="hidden" name="_method" value="POST">
                    <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</a>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-deactivate" tabindex="-1" aria-labelledby="modal-deactivate" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Nonaktifkan "<?= $admin['nama_lengkap']; ?>"?</h5>
                </div>
                <form class="modal-footer flex-nowrap p-0" id="deactivate" action="" method="post">
                    <input type="hidden" name="_method" value="POST">
                    <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</a>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Hapus "<?= $admin['nama_lengkap']; ?>"?</h5>
                </div>
                <form class="modal-footer flex-nowrap p-0" id="delete" action="" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</a>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                </form>
            </div>
        </div>
    </div>
</main>
</div>
</div>
<?= $this->endSection(); ?>