<?= $this->extend('dashboard/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/profil'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2">Edit Profil Anda</h1>
    </div>
    <?= form_open_multipart('/profil/update'); ?>
    <?= csrf_field(); ?>
    <input type="hidden" name="foto_alumni_lama" value="<?= session()->get('foto_alumni'); ?>">
    <input type="hidden" name="ijazah_lama" value="<?= session()->get('ijazah'); ?>">
    <input type="hidden" name="sk_lulus_lama" value="<?= session()->get('sk_lulus'); ?>">
    <input type="hidden" name="transkrip_nilai_lama" value="<?= session()->get('transkrip_nilai'); ?>">

    <!-- NIM ALUMNI -->
    <div class="mb-3 row">
        <label for="nim_alumni" class="col-xl-3 col-form-label">Nomor Induk Mahasiswa*</label>
        <div class="col-lg input-group">
            <input type="number" disabled class="form-control nomor <?= (validation_show_error('nim_alumni')) ? 'is-invalid' : ''; ?>" id="nim_alumni" name="nim_alumni" value="<?= (old('nim_alumni')) ? old('nim_alumni') : session()->get('nim_alumni'); ?>" autocomplete="off" placeholder="Contoh: 12312345678" autofocus>
            <a tabindex="0" class="btn btn btn-info bg-gradient" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Nomor Induk Mahasiswa Tidak Bisa Diubah" data-bs-content="Hanya Admin yang dapat mengubah ini."><i class="fa-solid fa-circle-info"></i></a>
        </div>
        <?php if (validation_show_error('nim_alumni')) : ?>
            <div class="invalid-feedback d-block">
                <?= validation_show_error('nim_alumni'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- NAMA ALUMNI -->
    <div class="mb-3 row">
        <label for="nama_alumni" class="col-xl-3 col-form-label">Nama*</label>
        <div class="col-lg input-group">
            <input type="text" disabled class="form-control <?= (validation_show_error('nama_alumni')) ? 'is-invalid' : ''; ?>" id="nama_alumni" name="nama_alumni" value="<?= (old('nama_alumni')) ? htmlspecialchars(old('nama_alumni')) : htmlspecialchars(session()->get('nama_alumni')); ?>" autocomplete="off" placeholder="Nama lengkap alumni">
            <a tabindex="0" class="btn btn btn-info bg-gradient" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Nama Tidak Bisa Diubah" data-bs-content="Hanya Admin yang dapat mengubah ini."><i class="fa-solid fa-circle-info"></i></a>
        </div>
        <?php if (validation_show_error('nama_alumni')) : ?>
            <div class="invalid-feedback d-block">
                <?= validation_show_error('nama_alumni'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- JENIS KELAMIN -->
    <div class="mb-3 row">
        <label for="jenis_kelamin" class="col-xl-3 col-form-label">Jenis Kelamin*</label>
        <div class="col-lg col-form-label">
            <div class="d-flex align-items-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input <?= (validation_show_error('jenis_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="L" <?= (old('jenis_kelamin')) ? ((old('jenis_kelamin') == 'L') ? 'checked' : '') : ((session()->get('jenis_kelamin') == 'L') ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="jenis_kelamin1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input <?= (validation_show_error('jenis_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P" <?= (old('jenis_kelamin')) ? ((old('jenis_kelamin') == 'P') ? 'checked' : '') : ((session()->get('jenis_kelamin') == 'P') ? 'checked' : ''); ?>>
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
                <option value="Islam" <?= (old('agama')) ? ((old('agama') == 'Islam') ? 'selected' : '') : ((session()->get('agama') == 'Islam') ? 'selected' : ''); ?>>Islam</option>
                <option value="Kristen" <?= (old('agama')) ? ((old('agama') == 'Kristen') ? 'selected' : '') : ((session()->get('agama') == 'Kristen') ? 'selected' : ''); ?>>Kristen Protestan</option>
                <option value="Katolik" <?= (old('agama')) ? ((old('agama') == 'Katolik') ? 'selected' : '') : ((session()->get('agama') == 'Katolik') ? 'selected' : ''); ?>>Kristen Katolik</option>
                <option value="Hindu" <?= (old('agama')) ? ((old('agama') == 'Hindu') ? 'selected' : '') : ((session()->get('agama') == 'Hindu') ? 'selected' : ''); ?>>Hindu</option>
                <option value="Buddha" <?= (old('agama')) ? ((old('agama') == 'Buddha') ? 'selected' : '') : ((session()->get('agama') == 'Buddha') ? 'selected' : ''); ?>>Buddha</option>
                <option value="Khonghucu" <?= (old('agama')) ? ((old('agama') == 'Khonghucu') ? 'selected' : '') : ((session()->get('agama') == 'Khonghucu') ? 'selected' : ''); ?>>Khonghucu</option>
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
                <input type="text" class="form-control nomor <?= (validation_show_error('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" value="<?= (old('tempat_lahir')) ? htmlspecialchars(old('tempat_lahir')) : htmlspecialchars(session()->get('tempat_lahir')); ?>" autocomplete="off" placeholder="Contoh: Pekanbaru">
                <input type="date" class="form-control <?= (validation_show_error('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= (old('tgl_lahir')) ? old('tgl_lahir') : session()->get('tgl_lahir'); ?>" autocomplete="off">
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
        <label for="alamat_rumah" class="col-xl-3 col-form-label">Alamat*</label>
        <div class="col-lg">
            <input type="text" class="form-control <?= (validation_show_error('alamat_rumah')) ? 'is-invalid' : ''; ?>" id="alamat_rumah" name="alamat_rumah" value="<?= (old('alamat_rumah')) ? htmlspecialchars(old('alamat_rumah')) : htmlspecialchars(session()->get('alamat_rumah')); ?>" autocomplete="off" placeholder="Rumah">
            <div class="invalid-feedback d-block">
                <?= validation_show_error('alamat_rumah'); ?>
            </div>
        </div>
    </div>

    <!-- NOMOR HP -->
    <div class="mb-3 row">
        <label for="nomor_hp" class="col-xl-3 col-form-label">Nomor HP*</label>
        <div class="col-lg">
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
    </div>

    <!-- EMAIL -->
    <div class="mb-3 row">
        <label for="email" class="col-xl-3 col-form-label">Email*</label>
        <div class="col-lg">
            <input type="email" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : htmlspecialchars(session()->get('email')); ?>" autocomplete="off" placeholder="Email Alumni">
            <div class="invalid-feedback">
                <?= validation_show_error('email'); ?>
            </div>
        </div>
    </div>

    <!-- PEKERJAAN -->
    <div class="mb-3 row">
        <label for="pekerjaan" class="col-xl-3 col-form-label">Pekerjaan*</label>
        <div class="col-lg">
            <input type="text" class="form-control <?= (validation_show_error('pekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" value="<?= (old('pekerjaan')) ? old('pekerjaan') : htmlspecialchars(session()->get('pekerjaan')); ?>" autocomplete="off" placeholder="menggunakan Datalist" list="listPekerjaan">
            <datalist id="listPekerjaan">
                <?php foreach ($listpekerjaan as $pekerjaan) : ?>
                    <option value="<?= $pekerjaan; ?> ">
                    <?php endforeach; ?>
            </datalist>
            <div class="invalid-feedback">
                <?= validation_show_error('pekerjaan'); ?>
            </div>
        </div>
    </div>

    <!-- TANGGAL LULUS -->
    <div class="mb-3 row">
        <label for="tgl_lulus" class="col-xl-3 col-form-label">Tanggal Lulus*</label>
        <div class="col-lg">
            <input type="date" class="form-control <?= (validation_show_error('tgl_lulus')) ? 'is-invalid' : ''; ?>" id="tgl_lulus" name="tgl_lulus" value="<?= (old('tgl_lulus')) ? old('tgl_lulus') : session()->get('tgl_lulus'); ?>" autocomplete="off">
            <div class="invalid-feedback d-block">
                <?= validation_show_error('tgl_lulus'); ?>
            </div>
        </div>
    </div>

    <!-- FOTO ALUMNI -->
    <div class="mb-3 row">
        <label for="foto_alumni" class="col-xl-3 col-form-label">Foto Profil</label>
        <div class="col-lg">
            <div class="input-group">
                <input class="form-control <?= (validation_show_error('foto_alumni')) ? 'is-invalid' : ''; ?>" type="file" id="foto_alumni" name="foto_alumni" onchange="previewImg()">
                <label class="input-group-text bg-gradient" for="inputGroupFile01">JPG, JPEG, PNG, MAKS 2 MB</label>
            </div>
            <?php if (validation_show_error('foto_alumni')) : ?>
                <div class="invalid-feedback d-block">
                    <?= validation_show_error('foto_alumni'); ?>
                </div>
            <?php endif; ?>
            <div class="overflow-auto">
                <img src="<?= (session()->get('foto_alumni') == NULL) ? base_url() . 'images/profile/blank.jpg' : base_url() . 'images/profile/alumni/' . session()->get('foto_alumni'); ?>" class="img-thumbnail rounded mt-3 img-preview" width="192">
            </div>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="ijazah" class="col-xl-3 col-form-label">Ijazah</label>
        <div class="col-lg">
            <div class="input-group">
                <input class="form-control <?= (validation_show_error('ijazah')) ? 'is-invalid' : ''; ?>" type="file" id="ijazah" name="ijazah">
                <label class="input-group-text bg-gradient" for="inputGroupFile01">PDF, MAKS 2 MB</label>
            </div>
            <?php if (validation_show_error('ijazah')) : ?>
                <div class="invalid-feedback d-block">
                    <?= validation_show_error('ijazah'); ?>
                </div>
            <?php endif; ?>
            <div><small>File saat ini: <?= session()->get('ijazah'); ?></small></div>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="sk_lulus" class="col-xl-3 col-form-label">Surat Keterangan Lulus</label>
        <div class="col-lg">
            <div class="input-group">
                <input class="form-control <?= (validation_show_error('sk_lulus')) ? 'is-invalid' : ''; ?>" type="file" id="sk_lulus" name="sk_lulus">
                <label class="input-group-text bg-gradient" for="inputGroupFile01">PDF, MAKS 2 MB</label>
            </div>
            <?php if (validation_show_error('sk_lulus')) : ?>
                <div class="invalid-feedback d-block">
                    <?= validation_show_error('sk_lulus'); ?>
                </div>
            <?php endif; ?>
            <div><small>File saat ini: <?= session()->get('sk_lulus'); ?></small></div>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="transkrip_nilai" class="col-xl-3 col-form-label">Transkrip Nilai Akademik</label>
        <div class="col-lg">
            <div class="input-group">
                <input class="form-control <?= (validation_show_error('transkrip_nilai')) ? 'is-invalid' : ''; ?>" type="file" id="transkrip_nilai" name="transkrip_nilai">
                <label class="input-group-text bg-gradient" for="inputGroupFile01">PDF, MAKS 2 MB</label>
            </div>
            <?php if (validation_show_error('transkrip_nilai')) : ?>
                <div class="invalid-feedback d-block">
                    <?= validation_show_error('transkrip_nilai'); ?>
                </div>
            <?php endif; ?>
            <div><small>File saat ini: <?= session()->get('transkrip_nilai'); ?></small></div>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3 py-0 my-0">
        <button class="btn btn-primary bg-gradient" type="submit"><i class="fa-solid fa-user-pen"></i> Edit</button>
    </div>
    <?= form_close(); ?>
</main>
</div>
</div>
<?= $this->endSection(); ?>