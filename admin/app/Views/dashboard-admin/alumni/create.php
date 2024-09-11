<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/alumni-admin'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2">Tambah Alumni</h1>
    </div>

    <?= form_open_multipart('/alumni-admin/save'); ?>
    <?= csrf_field(); ?>
    <!-- NIM ALUMNI -->
    <div class="mb-3 row">
        <label for="nim_alumni" class="col-xl-3 col-form-label">Nomor Induk Mahasiswa*</label>
        <div class="col-lg">
            <input type="number" class="form-control nomor <?= (validation_show_error('nim_alumni')) ? 'is-invalid' : ''; ?>" id="nim_alumni" name="nim_alumni" value="<?= old('nim_alumni'); ?>" autocomplete="off" placeholder="Contoh: 12312345678" autofocus>
            <div class="invalid-feedback">
                <?= validation_show_error('nim_alumni'); ?>
            </div>
        </div>
    </div>

    <!-- NAMA ALUMNI -->
    <div class="mb-3 row">
        <label for="nama_alumni" class="col-xl-3 col-form-label">Nama*</label>
        <div class="col-lg">
            <input type="text" class="form-control <?= (validation_show_error('nama_alumni')) ? 'is-invalid' : ''; ?>" id="nama_alumni" name="nama_alumni" value="<?= old('nama_alumni'); ?>" autocomplete="off" placeholder="Nama lengkap alumni">
            <div class="invalid-feedback">
                <?= validation_show_error('nama_alumni'); ?>
            </div>
        </div>
    </div>

    <!-- JENIS KELAMIN -->
    <div class="mb-3 row">
        <label for="tgl_lahir" class="col-xl-3 col-form-label">Jenis Kelamin*</label>
        <div class="col-lg col-form-label">
            <div class="d-flex align-items-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input <?= (validation_show_error('jenis_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="L" <?= (old('jenis_kelamin') == 'L') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="jenis_kelamin1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input <?= (validation_show_error('jenis_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P" <?= (old('jenis_kelamin') == 'P') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="jenis_kelamin2">
                        Perempuan
                    </label>
                </div>
            </div>
            <?php if (validation_show_error('jenis_kelamin')) : ?>
                <div class="invalid-feedback d-block">
                    <?= validation_show_error('jenis_kelamin'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- AGAMA -->
    <div class="mb-3 row">
        <label for="agama" class="col-xl-3 col-form-label">Agama*</label>
        <div class="col-lg">
            <select class="form-select <?= (validation_show_error('agama')) ? 'is-invalid' : ''; ?>" id="agama" name="agama" aria-label="Agama">
                <option value="">-- Pilih Agama --</option>
                <option value="Islam" <?= (old('agama') == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                <option value="Kristen" <?= (old('agama') == 'Kristen') ? 'selected' : ''; ?>>Kristen Protestan</option>
                <option value="Katolik" <?= (old('agama') == 'Katolik') ? 'selected' : ''; ?>>Kristen Katolik</option>
                <option value="Hindu" <?= (old('agama') == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                <option value="Buddha" <?= (old('agama') == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
                <option value="Khonghucu" <?= (old('agama') == 'Khonghucu') ? 'selected' : ''; ?>>Khonghucu</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error('agama'); ?>
            </div>
        </div>
    </div>

    <!-- KELAHIRAN -->
    <div class="mb-3 row">
        <label for="tempat_lahir" class="col-xl-3 col-form-label">Tanggal Lahir*</label>
        <div class="col-lg">
            <div class="input-group">
                <input type="text" class="form-control nomor <?= (validation_show_error('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>" autocomplete="off" placeholder="Contoh: Pekanbaru">
                <input type="date" class="form-control <?= (validation_show_error('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>" autocomplete="off">
            </div>
            <?php if (validation_show_error('tempat_lahir')) : ?>
                <div class="invalid-feedback d-block">
                    <?= validation_show_error('tempat_lahir'); ?>
                </div>
            <?php endif; ?>
            <?php if (validation_show_error('tgl_lahir')) : ?>
                <div class="invalid-feedback d-block">
                    <?= validation_show_error('tgl_lahir'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- ALAMAT -->
    <div class="mb-3 row">
        <label for="alamat_rumah" class="col-xl-3 col-form-label">Alamat</label>
        <div class="col-lg">
            <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" value="<?= old('alamat_rumah'); ?>" autocomplete="off" placeholder="Rumah">
        </div>
    </div>

    <!-- NOMOR HP -->
    <div class="mb-3 row">
        <label for="nomor_hp" class="col-xl-3 col-form-label">Nomor HP</label>
        <div class="col-lg">
            <div class="input-group">
                <span class="input-group-text bg-gradient">+</span>
                <input type="number" class="form-control nomor" id="nomor_hp" name="nomor_hp" value="<?= old('nomor_hp'); ?>" autocomplete="off" placeholder="Contoh: 62812345678987">
                <span class="input-group-text bg-gradient">+</span>
                <input type="number" class="form-control nomor" id="nomor_hp_2" name="nomor_hp_2" value="<?= old('nomor_hp_2'); ?>" autocomplete="off" placeholder="Contoh: 62812345678987">
            </div>
        </div>
    </div>

    <!-- EMAIL -->
    <div class="mb-3 row">
        <label for="email" class="col-xl-3 col-form-label">Email</label>
        <div class="col-lg">
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email'); ?>" autocomplete="off" placeholder="Email Alumni">
        </div>
    </div>

    <!-- PEKERJAAN -->
    <div class="mb-3 row">
        <label for="pekerjaan" class="col-xl-3 col-form-label">Pekerjaan</label>
        <div class="col-lg">
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= old('pekerjaan'); ?>" autocomplete="off" placeholder="menggunakan Datalist" list="listPekerjaan">
            <datalist id="listPekerjaan">
                <?php foreach ($listpekerjaan as $pekerjaan) : ?>
                    <option value="<?= $pekerjaan; ?> ">
                    <?php endforeach; ?>
            </datalist>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <button class="btn btn-primary bg-gradient" type="submit"><i class="fa-solid fa-user-plus"></i> Tambah</button>
    </div>
    <?= form_close(); ?>
</main>
</div>
</div>
<?= $this->endSection(); ?>