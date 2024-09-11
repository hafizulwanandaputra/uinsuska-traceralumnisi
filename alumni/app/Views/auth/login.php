<?= $this->extend('auth/templates/login'); ?>
<?= $this->section('content'); ?>
<main class="card form-signin w-100 m-auto" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
    <?= form_open('check-login'); ?>
    <h1 class="h3 mb-3 fw-normal">
        Login Alumni
    </h1>
    <div class="form-floating">
        <input type="text" class="form-control username <?= (validation_show_error('nim_alumni')) ? 'is-invalid' : ''; ?>" id="floatingInput" name="nim_alumni" placeholder="nim_alumni" value="">
        <label for="floatingInput">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="w-100 ms-3">
                    Nomor Induk Mahasiswa
                </div>
            </div>
        </label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control <?= (validation_show_error('password')) ? 'is-invalid' : ''; ?>" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-key"></i>
                </div>
                <div class="w-100 ms-3">
                    Kata Sandi
                </div>
            </div>
        </label>
        <div class="invalid-feedback mb-2">
            <?= validation_show_error('nim_alumni'); ?><br><?= validation_show_error('password'); ?>
        </div>
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
    <button class="w-100 btn btn-lg btn-primary bg-gradient" type="submit">
        <i class="fa-solid fa-right-to-bracket"></i> LOGIN
    </button>
    <?= form_close(); ?>
    <!-- FOOTER -->
    <div style="font-size: 9pt;">
        <hr>
        <p class="text-center">&copy; 2023 <?= (date('Y') !== "2023") ? "- " . date('Y') : ''; ?> Program Studi Sistem Informasi UIN Suska Riau<br><a class="text-decoration-none" href="<?= base_url(); ?>">kembali ke halaman utama</a> | <a class="text-decoration-none" href="<?= env('ADMIN'); ?>">login admin</a><br>Made with <a class="text-decoration-none" href="https://getbootstrap.com/" target="_blank">Bootstrap</a></p>
    </div>
</main>
<?= $this->endSection(); ?>