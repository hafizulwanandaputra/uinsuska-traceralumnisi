<?= $this->extend('auth/templates/regadmin'); ?>
<?= $this->section('content'); ?>
<nav class="navbar navbar-expand-md fixed-top bg-gradient bg-body-secondary border-bottom" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
    <div class="container">
        <span class="navbar-brand me-0 py-md-1 fs-6 text-start lh-1"><span style="font-weight: 300;">Tracer Study</span><br><span style="font-weight: 500;">Sistem Informasi</span></span>
        <div class="vr d-none d-md-block mx-3"></div>
        <button class="navbar-toggler bg-gradient" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar" aria-controls="navbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="navbar" aria-labelledby="navbarLabel">
            <div class="offcanvas-header py-2 bg-gradient border-bottom">
                <h5 class="offcanvas-title fs-6 lh-1" id="navbarLabel">
                    <span style="font-weight: 300;">Tracer Study</span><br><span style="font-weight: 500;">Sistem Informasi</span>
                </h5>
                <button type="button" class="btn btn-danger btn-sm bg-gradient ps-0 pe-0 pt-0 pb-0" data-bs-dismiss="offcanvas" aria-label="Close"><span data-feather="x" class="mb-0" style="width: 30px; height: 30px;"></span></button>
            </div>
            <div class="offcanvas-body">
                <div class="navbar-nav justify-content-start align-items-center flex-grow-1">
                    <div class="border borrder-2 border-primary rounded-pill me-0 me-md-2 mb-2 mb-md-0 profile" style="background-image: url('<?= (session()->get('foto_alumni') == NULL) ? base_url() . '/images/profile/blank.jpg' : (base_url() . '/images/profile/alumni/' . session()->get('foto_alumni')); ?>'); background-color: #cccccc; aspect-ratio: 1/1; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;"></div>
                    <span class="lh-1"><?= session()->get('nama_alumni'); ?></span>
                </div>
                <hr class="d-block d-md none">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-danger bg-gradient" data-bs-toggle="modal" data-bs-target="#logoff1">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="modal modal-sheet p-4 py-md-5 fade" id="logoff1" tabindex="-1" aria-labelledby="logoff1" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0">Akhiri Sesi Anda?</h5>
            </div>
            <div class="modal-footer flex-nowrap p-0">
                <a class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end" href="<?= base_url('/logout'); ?>">Ya</a>
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <main>
        <div class="text-center" style="padding-top: 6rem;">
            <h3 class="display-6">Halo, <?= session()->get('nama_alumni'); ?></h3>
            <h3 class="fs-2">Selamat Datang di Sistem Informasi Tracer Study</h3>
            <p class="fs-5">PROGRAM STUDI SISTEM INFORMASI<br>FAKULTAS SAINS DAN TEKNOLOGI<br>UNIVERSITAS ISLAM NEGERI SULTAN SYARIF KASIM RIAU</p>
            <p class="lead">Silakan lengkapi informasi di bawah ini!</p>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <?= form_open_multipart('/activate'); ?>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="nomor_hp" class="form-label">Nomor HP*</label>
                        <div class="input-group">
                            <span class="input-group-text bg-gradient">+</span>
                            <input type="number" class="form-control nomor <?= (validation_show_error('nomor_hp')) ? 'is-invalid' : ''; ?>" id="nomor_hp" name="nomor_hp" value="<?= (old('nomor_hp')) ? old('nomor_hp') : session()->get('nomor_hp'); ?>" autocomplete="off" placeholder="Contoh: 62812345678987">
                            <span class="input-group-text bg-gradient">+</span>
                            <input type="number" class="form-control nomor" id="nomor_hp_2" name="nomor_hp_2" value="<?= (old('nomor_hp_2')) ? old('nomor_hp_2') : session()->get('nomor_hp_2'); ?>" autocomplete="off" placeholder="(Opsional) Contoh: 62812345678987">
                        </div>
                        <?php if (validation_show_error('nomor_hp')) : ?>
                            <div class="invalid-feedback d-block">
                                <?= validation_show_error('nomor_hp'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-12">
                        <label for="alamat_rumah" class="form-label">Alamat Rumah*</label>
                        <input type="text" class="form-control nomor <?= (validation_show_error('alamat_rumah')) ? 'is-invalid' : ''; ?>" id="alamat_rumah" name="alamat_rumah" value="<?= (old('alamat_rumah')) ? old('alamat_rumah') : session()->get('alamat_rumah'); ?>" autocomplete="off">
                        <div class="invalid-feedback">
                            <?= validation_show_error('alamat_rumah'); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control nomor <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : session()->get('email'); ?>" autocomplete="off">
                        <div class="invalid-feedback">
                            <?= validation_show_error('email'); ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Pekerjaan*</label>
                        <input type="text" class="form-control <?= (validation_show_error('pekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" value="<?= (old('pekerjaan')) ? old('pekerjaan') : session()->get('pekerjaan'); ?>" autocomplete="off" placeholder="menggunakan Datalist" list="listPekerjaan">
                        <datalist id="listPekerjaan">
                            <?php foreach ($listpekerjaan as $pekerjaan) : ?>
                                <option value="<?= $pekerjaan; ?> ">
                                <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback">
                            <?= validation_show_error('pekerjaan'); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="tgl_lulus" class="form-label">Tanggal Lulus*</label>
                        <input type="date" class="form-control <?= (validation_show_error('tgl_lulus')) ? 'is-invalid' : ''; ?>" id="tgl_lulus" name="tgl_lulus" value="<?= (old('tgl_lulus')) ? old('tgl_lulus') : session()->get('tgl_lulus'); ?>" autocomplete="off">
                        <div class="invalid-feedback">
                            <?= validation_show_error('tgl_lulus'); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="ijazah" class="form-label">Ijazah* <span class="badge rounded-pill text-bg-info bg-gradient border border-info">PDF, MAKS 2 MB</span></label>
                        <input class="form-control <?= (validation_show_error('ijazah')) ? 'is-invalid' : ''; ?>" type="file" id="ijazah" name="ijazah">
                        <div class="invalid-feedback">
                            <?= validation_show_error('ijazah'); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="sk_lulus" class="form-label">Surat Keterangan Lulus (jika ada) <span class="badge rounded-pill text-bg-info bg-gradient border border-info">PDF, MAKS 2 MB</span></label>
                        <input class="form-control <?= (validation_show_error('sk_lulus')) ? 'is-invalid' : ''; ?>" type="file" id="sk_lulus" name="sk_lulus">
                        <div class="invalid-feedback">
                            <?= validation_show_error('sk_lulus'); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="transkrip_nilai" class="form-label">Transkrip Nilai Akademik* <span class="badge rounded-pill text-bg-info bg-gradient border border-info">PDF, MAKS 2 MB</span></label>
                        <input class="form-control <?= (validation_show_error('transkrip_nilai')) ? 'is-invalid' : ''; ?>" type="file" id="transkrip_nilai" name="transkrip_nilai">
                        <div class="invalid-feedback">
                            <?= validation_show_error('transkrip_nilai'); ?>
                        </div>
                    </div>

                    <small>* wajib diisi</small>
                </div>
                <hr>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary bg-gradient btn-lg btn-block" type="submit"><i class="fa-solid fa-file-arrow-up"></i> UNGGAH FILE DAN KIRIM</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </main>

    <footer class="text-center">
        <div style="font-size: 9pt;">
            <hr>
            <p class="text-center">&copy; 2023 <?= (date('Y') !== "2023") ? "- " . date('Y') : ''; ?> Program Studi Sistem Informasi UIN Suska Riau<br>Made with <a class="text-decoration-none" href="https://getbootstrap.com/" target="_blank">Bootstrap</a></p>
        </div>
    </footer>
</div>
<?= $this->endSection(); ?>