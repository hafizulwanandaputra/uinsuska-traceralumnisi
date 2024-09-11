<?= $this->extend('dashboard/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Kata Sandi</h1>
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
    <div class="alert alert-info bg-gradient-header" role="alert">
        <div class="d-flex align-items-start">
            <div style="width: 12px; text-align: center;">
                <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="w-100 ms-3">
                Kata sandi minimal 6 karakter
            </div>
        </div>
    </div>
    <?= form_open_multipart('/changepassword/update'); ?>
    <div class="mb-3 row">
        <label for="current_password" class="col-xl-3 col-form-label">Kata Sandi Lama</label>
        <div class="col-lg">
            <input type="password" class="form-control <?= (validation_show_error('current_password')) ? 'is-invalid' : ''; ?>" id="current_password" name="current_password">
            <div class="invalid-feedback">
                <?= validation_show_error('current_password'); ?>
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="new_password1" class="col-xl-3 col-form-label">Kata Sandi Baru</label>
        <div class="col-lg">
            <input type="password" class="form-control <?= (validation_show_error('new_password1')) ? 'is-invalid' : ''; ?>" id="new_password1" name="new_password1">
            <div class="invalid-feedback">
                <?= validation_show_error('new_password1'); ?>
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="new_password2" class="col-xl-3 col-form-label">Konfirmasi Kata Sandi</label>
        <div class="col-lg">
            <input type="password" class="form-control <?= (validation_show_error('new_password2')) ? 'is-invalid' : ''; ?>" id="new_password2" name="new_password2">
            <div class="invalid-feedback">
                <?= validation_show_error('new_password2'); ?>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <button class="btn btn-primary bg-gradient" type="submit"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
    </div>
    <?= form_close(); ?>
</main>
</div>
</div>
<?= $this->endSection(); ?>