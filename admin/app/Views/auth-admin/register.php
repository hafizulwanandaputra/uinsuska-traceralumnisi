<?= $this->extend('auth-admin/templates/regadmin'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <main>
        <div class="py-2">
            <a class="btn btn-primary rounded-pill bg-gradient" href="<?= base_url(); ?>" role="button"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="pb-5 text-center">
            <h2>Pendaftaran Admin (Rahasia)</h2>
            <p class="lead">Halaman ini rahasia. Hanya digunakan saat ujicoba registrasi saja.</p>
        </div>

        <div class="row g-3">
            <div class="col-md">
                <?= form_open('/save-register'); ?>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control <?= (validation_show_error('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" value="">
                        <div class="invalid-feedback">
                            <?= validation_show_error('nama_lengkap'); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="username" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control <?= (validation_show_error('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="">
                        <div class="invalid-feedback">
                            <?= validation_show_error('username'); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="password1" class="form-label">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control <?= (validation_show_error('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
                            <input type="password" class="form-control <?= (validation_show_error('password2')) ? 'is-invalid' : ''; ?>" id="password2" name="password2" placeholder="Konfirmasi">
                            <div class="invalid-feedback">
                                <?= validation_show_error('password'); ?><br><?= validation_show_error('password2'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-grid gap-2">
                    <button class="btn btn-primary bg-gradient btn-lg btn-block" type="submit">Daftar</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </main>

    <footer class="my-5 pt-5 text-center">
        <div style="font-size: 9pt;">
            <hr>
            <p class="text-center">© 2023 Program Studi Sistem Informasi UIN Suska Riau<br><a class="text-decoration-none" href="" target="_blank">kembali ke halaman utama</a> | <a class="text-decoration-none" href="" target="_blank">login alumni</a><br>Made with <a class="text-decoration-none" href="https://getbootstrap.com/" target="_blank">Bootstrap</a></p>
        </div>
    </footer>
</div>
<?= $this->endSection(); ?>