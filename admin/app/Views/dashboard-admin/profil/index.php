<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil Anda</h1>
        <a class="btn btn-primary btn-sm bg-gradient" href="<?= base_url('/profil-admin/edit'); ?>" role="button"><i class="fa-solid fa-user-pen"></i> Edit Profil</a>
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
    <div class="d-flex justify-content-center mb-3">
        <div class="img-thumbnail rounded-pill" style="background-image: url('<?= (session()->get('foto_user') == NULL) ? env('ALUMNI') . 'images/profile/blank.jpg' : env('ALUMNI') . 'images/profile/' . session()->get('foto_user'); ?>'); background-color: #cccccc; width: 256px; aspect-ratio: 1/1; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;">
        </div>
    </div>
    <hr>
    <!-- NAMA LENGKAP -->
    <div class="mb-3 row">
        <label for="nama_lengkap" class="col-xl-3 col-form-label"><strong>Nama Lengkap</strong></label>
        <div class="col-lg">
            <input type="text" disabled readonly class="form-control-plaintext" id="nama_lengkap" name="nama_lengkap" value="<?= session()->get('nama_lengkap'); ?>">
        </div>
    </div>
    <!-- NAMA PENGGUNA -->
    <div class="mb-3 row">
        <label for="username" class="col-xl-3 col-form-label"><strong>Nama Pengguna</strong></label>
        <div class="col-lg">
            <input type="text" disabled readonly class="form-control-plaintext" id="username" name="username" value="<?= session()->get('username'); ?>">
        </div>
    </div>
    <!-- JENIS PENGGUNA -->
    <div class="mb-3 row">
        <label for="type" class="col-xl-3 col-form-label"><strong>Jenis Pengguna</strong></label>
        <div class="col-lg">
            <input type="text" disabled readonly class="form-control-plaintext" id="type" name="type" value="<?php if (session()->get('type') == 1) {
                                                                                                                    echo 'Master Admin';
                                                                                                                } else if (session()->get('type') == 2) {
                                                                                                                    echo 'Admin';
                                                                                                                } ?>">
        </div>
    </div>
    <?php if (session()->get('foto_user') != NULL) : ?>
        <div class="d-grid gap-2 mb-3">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete" class="btn btn-danger btn-lg bg-gradient" onclick="$('#modal-delete #delete').attr('action', '<?= base_url('/profil-admin/delprofilephoto'); ?>')"><i class="fa-solid fa-trash"></i> Hapus Foto Profil</button>
        </div>
        <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                    <div class="modal-body p-4 text-center">
                        <h5 class="mb-0">Hapus Foto Profil Anda?</h5>
                    </div>
                    <form class="modal-footer flex-nowrap p-0" id="delete" action="<?= base_url('/profil-admin/delprofilephoto'); ?>" method="post">
                        <input type="hidden" name="_method" value="POST">
                        <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>
</div>
</div>
<?= $this->endSection(); ?>