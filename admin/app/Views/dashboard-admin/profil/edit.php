<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/profil-admin'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2">Edit Profil Anda</h1>
    </div>
    <?= form_open_multipart('/profil-admin/update'); ?>
    <?= csrf_field(); ?>
    <input type="hidden" name="fotoLama" value="<?= session()->get('foto_user'); ?>">
    <!-- NAMA LENGKAP -->
    <div class="mb-3 row">
        <label for="nama_lengkap" class="col-xl-3 col-form-label"><strong>Nama Lengkap</strong></label>
        <div class="col-lg">
            <input type="text" class="form-control <?= (validation_show_error('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" value="<?= (old('nama_lengkap')) ? old('nama_lengkap') : htmlspecialchars(session()->get('nama_lengkap')); ?>">
            <div class="invalid-feedback">
                <?= validation_show_error('nama_lengkap'); ?>
            </div>
        </div>
    </div>
    <!-- NAMA PENGGUNA -->
    <div class="mb-3 row">
        <label for="username" class="col-xl-3 col-form-label"><strong>Nama Pengguna</strong></label>
        <div class="col-lg">
            <input type="text" class="form-control <?= (validation_show_error('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : htmlspecialchars(session()->get('username')); ?>">
            <div class="invalid-feedback">
                <?= validation_show_error('username'); ?>
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="foto_user" class="col-xl-3 col-form-label"><strong>Foto Profil</strong></label>
        <div class="col-lg">
            <div class="input-group">
                <input class="form-control <?= (validation_show_error('foto_user')) ? 'is-invalid' : ''; ?> profilephoto" type="file" id="foto_user" name="foto_user" onchange="previewImg()">
                <label class="input-group-text bg-gradient" for="inputGroupFile01">JPG, JPEG, PNG, MAKS 2 MB</label>
            </div>
            <?php if (validation_show_error('foto_user')) : ?>
                <div class="invalid-feedback d-block">
                    <?= validation_show_error('foto_user'); ?>
                </div>
            <?php endif; ?>
            <div class="overflow-auto">
                <img src="<?= (session()->get('foto_user') == NULL) ? env('ALUMNI') . 'images/profile/blank.jpg' : env('ALUMNI') . 'images/profile/' . session()->get('foto_user'); ?>" class="img-thumbnail rounded mt-3 img-preview" width="192px">
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <button class="btn btn-primary bg-gradient" type="submit"><i class="fa-solid fa-user-pen"></i> Edit</button>
    </div>
    <?= form_close(); ?>
</main>
</div>
</div>
<?= $this->endSection(); ?>