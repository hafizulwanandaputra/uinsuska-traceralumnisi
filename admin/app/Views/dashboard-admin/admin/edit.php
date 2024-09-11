<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/admin'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2">Edit "<?= $admin['nama_lengkap']; ?>"</h1>
    </div>

    <?= form_open_multipart('/admin/update/' . $admin['id_user']); ?>
    <?= csrf_field(); ?>
    <!-- NAMA LENGKAP -->
    <div class="mb-3 row">
        <label for="nama_lengkap" class="col-xl-3 col-form-label">Nama Lengkap</label>
        <div class="col-lg">
            <input type="text" class="form-control <?= (validation_show_error('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" value="<?= (old('nama_lengkap')) ? htmlspecialchars(old('nama_lengkap')) : htmlspecialchars($admin['nama_lengkap']); ?>" autocomplete="off" placeholder="Nama lengkap pengguna" autofocus>
            <div class="invalid-feedback">
                <?= validation_show_error('nama_lengkap'); ?>
            </div>
        </div>
    </div>

    <!-- NAMA PENGGUNA -->
    <div class="mb-3 row">
        <label for="username" class="col-xl-3 col-form-label">Nama Pengguna</label>
        <div class="col-lg">
            <input type="text" class="form-control <?= (validation_show_error('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : htmlspecialchars($admin['username']); ?>" autocomplete="off" placeholder="Nama pengguna">
            <div class="invalid-feedback">
                <?= validation_show_error('username'); ?>
            </div>
        </div>
    </div>

    <!-- JENIS PENGGUNA -->
    <div class="mb-3 row">
        <label for="type" class="col-xl-3 col-form-label">Jenis Pengguna</label>
        <div class="col-lg">
            <select class="form-select <?= (validation_show_error('type')) ? 'is-invalid' : ''; ?>" id="type" name="type" aria-label="type">
                <option value="">-- Pilih Jenis Pengguna --</option>
                <option value="1" <?= ($admin['type'] == 1) ? 'selected' : '' ?>>Master Admin</option>
                <option value="2" <?= ($admin['type'] == 2) ? 'selected' : '' ?>>Admin</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error('type'); ?>
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