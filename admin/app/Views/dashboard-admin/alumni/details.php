<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/alumni-admin'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2"><?= $alumni['nama_alumni']; ?></h1>
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
        <div class="img-thumbnail rounded-pill" style="background-image: url('<?= ($alumni['foto_alumni'] == NULL) ? env('ALUMNI') . 'images/profile/blank.jpg' : env('ALUMNI') . 'images/profile/alumni/' . $alumni['foto_alumni']; ?>'); background-color: #cccccc; width: 256px; aspect-ratio: 1/1; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;">
        </div>
    </div>
    <hr>
    <h3 class="display-6">Informasi Pribadi</h3>

    <!-- NAMA ALUMNI -->
    <div class="mb-3 row">
        <label for="nama_alumni" class="col-xl-3 col-form-label"><strong>Nama</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="nama_alumni" name="nama_alumni" value="<?= $alumni['nama_alumni']; ?>">
        </div>
    </div>

    <!-- NIM ALUMNI -->
    <div class="mb-3 row">
        <label for="nim_alumni" class="col-xl-3 col-form-label"><strong>Nomor Induk Mahasiswa</strong></label>
        <div class="col-lg">
            <input type="number" readonly class="form-control-plaintext date" id="nim_alumni" name="nim_alumni" value="<?= $alumni['nim_alumni']; ?>">
        </div>
    </div>

    <!-- TEMPAT DAN TANGGAL LAHIR -->
    <div class="mb-3 row">
        <label for="tgl_lahir" class="col-xl-3 col-form-label"><strong>Tempat dan Tanggal Lahir</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext date" id="tgl_lahir" name="tgl_lahir" value="<?= $alumni['tempat_lahir'] . ', ' . strftime("%e %B %Y", strtotime($alumni['tgl_lahir'])); ?>">
        </div>
    </div>

    <!-- AGAMA -->
    <div class="mb-3 row">
        <label for="agama" class="col-xl-3 col-form-label"><strong>Agama</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="agama" name="agama" value="<?= $alumni['agama']; ?>">
        </div>
    </div>

    <!-- JENIS KELAMIN -->
    <div class="mb-3 row">
        <label for="jenis_kelamin" class="col-xl-3 col-form-label"><strong>Jenis Kelamin</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="jenis_kelamin" name="jenis_kelamin" value="<?= ($alumni['jenis_kelamin'] == 'P') ? 'Perempuan' : (($alumni['jenis_kelamin'] == 'L') ? 'Laki-Laki' : ''); ?>">
        </div>
    </div>

    <!-- PEKERJAAN -->
    <div class="mb-3 row">
        <label for="pekerjaan" class="col-xl-3 col-form-label"><strong>Pekerjaan</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="pekerjaan" name="pekerjaan" value="<?= ($alumni['pekerjaan'] != NULL) ? $alumni['pekerjaan'] : '-'; ?>">
        </div>
    </div>

    <!-- ALAMAT RUMAH -->
    <div class="mb-3 row">
        <label for="alamat_rumah" class="col-xl-3 col-form-label"><strong>Alamat Rumah</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="alamat_rumah" name="alamat_rumah" value="<?= ($alumni['alamat_rumah'] != NULL) ? $alumni['alamat_rumah'] : '-'; ?>">
        </div>
    </div>

    <hr>
    <h3 class="display-6">Kontak</h3>

    <!-- NOMOR HP 1 -->
    <div class="mb-3 row">
        <label for="nomor_hp" class="col-xl-3 col-form-label"><strong>Nomor HP 1</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext date" id="nomor_hp" name="nomor_hp" value="<?= ($alumni['nomor_hp'] != NULL) ? '+' . $alumni['nomor_hp'] : '-'; ?>">
        </div>
    </div>

    <!-- NOMOR HP 2 -->
    <div class="mb-3 row">
        <label for="nomor_hp_2" class="col-xl-3 col-form-label"><strong>Nomor HP 2</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext date" id="nomor_hp_2" name="nomor_hp_2" value="<?= ($alumni['nomor_hp_2'] != NULL) ? '+' . $alumni['nomor_hp_2'] : '-'; ?>">
        </div>
    </div>

    <!-- EMAIL -->
    <div class="mb-3 row">
        <label for="email" class="col-xl-3 col-form-label"><strong>Email</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="email" name="email" value="<?= ($alumni['email'] != NULL) ? $alumni['email'] : '-'; ?>">
        </div>
    </div>

    <hr>
    <h3 class="display-6">Status Alumni</h3>

    <!-- AKUN AKTIF -->
    <div class="mb-3 row">
        <label for="tgl_lulus" class="col-xl-3 col-form-label"><strong>Akun Aktif</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="tgl_lulus" name="tgl_lulus" value="<?= ($alumni['aktif'] == 1) ? 'Aktif' : 'Tidak aktif'; ?>">
        </div>
    </div>

    <!-- TANGGAL LULUS -->
    <div class="mb-3 row">
        <label for="tgl_lulus" class="col-xl-3 col-form-label"><strong>Tanggal Lulus</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="tgl_lulus" name="tgl_lulus" value="<?= ($alumni['tgl_lulus'] != NULL) ? strftime("%e %B %Y", strtotime($alumni['tgl_lulus'])) : 'Belum Lulus'; ?>">
        </div>
    </div>

    <hr>
    <h3 class="display-6">Administrasi Alumni</h3>

    <!-- IJAZAH -->
    <div class="mb-3 row">
        <label for="ijazah" class="col-xl-3 col-form-label"><strong>Ijazah</strong></label>
        <div class="col-lg">
            <div class="input-group">
                <input type="text" disabled readonly class="form-control" id="ijazah" name="ijazah" value="<?= $alumni['ijazah']; ?>">
                <a class="btn btn-primary bg-gradient <?= ($alumni['ijazah'] == NULL) ? 'disabled' : '' ?>" <?= ($alumni['ijazah'] == NULL) ? 'aria-disabled="true"' : 'href="' . env('ALUMNI') . 'files/ijazah/' . $alumni['ijazah'] . '"' ?> role="button" target="_blank"><i class="fa-solid fa-file"></i></a>
            </div>
        </div>
    </div>

    <!-- SKL -->
    <div class="mb-3 row">
        <label for="sk_lulus" class="col-xl-3 col-form-label"><strong>Surat Keterangan Lulus</strong></label>
        <div class="col-lg">
            <div class="input-group">
                <input type="text" disabled readonly class="form-control" id="sk_lulus" name="sk_lulus" value="<?= $alumni['sk_lulus']; ?>">
                <a class="btn btn-primary bg-gradient <?= ($alumni['sk_lulus'] == NULL) ? 'disabled' : '' ?>" <?= ($alumni['sk_lulus'] == NULL) ? 'aria-disabled="true"' : 'href="' . env('ALUMNI') . '/files/sk_lulus/' . $alumni['sk_lulus'] . '"' ?> role="button" target="_blank"><i class="fa-solid fa-file"></i></a>
            </div>
        </div>
    </div>

    <!-- TNA -->
    <div class="mb-3 row">
        <label for="transkrip_nilai" class="col-xl-3 col-form-label"><strong>Transkrip Nilai Akademik</strong></label>
        <div class="col-lg">
            <div class="input-group">
                <input type="text" disabled readonly class="form-control" id="transkrip_nilai" name="transkrip_nilai" value="<?= $alumni['transkrip_nilai']; ?>">
                <a class="btn btn-primary bg-gradient <?= ($alumni['transkrip_nilai'] == NULL) ? 'disabled' : '' ?>" <?= ($alumni['transkrip_nilai'] == NULL) ? 'aria-disabled="true"' : 'href="' . env('ALUMNI') . '/files/transkrip_nilai/' . $alumni['transkrip_nilai'] . '"' ?> role="button" target="_blank"><i class="fa-solid fa-file"></i></a>
            </div>
        </div>
    </div>

    <hr>
    <div class="d-grid gap-2 d-lg-flex justify-content-lg-end mb-3">
        <?php if ($alumni['nomor_hp'] != NULL) : ?>
            <div class="d-grid gap-2 d-lg-flex">
                <a class="btn btn-success bg-gradient" href="https://wa.me/<?= $alumni['nomor_hp']; ?>" role="button" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp Nomor 1</a>
            </div>
        <?php endif; ?>
        <?php if ($alumni['nomor_hp_2'] != NULL) : ?>
            <div class="d-grid gap-2 d-lg-flex">
                <a class="btn btn-success bg-gradient" href="https://wa.me/<?= $alumni['nomor_hp_2']; ?>" role="button" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp Nomor 2</a>
            </div>
        <?php endif; ?>
        <?php if ($alumni['email'] != NULL) : ?>
            <div class="d-grid gap-2 d-lg-flex">
                <a class="btn btn-secondary bg-gradient" href="mailto:<?= $alumni['email']; ?>" role="button" target="_blank"><i class="fa-solid fa-envelope"></i> Kirim Email</a>
            </div>
        <?php endif; ?>
        <div class="d-grid gap-2 d-lg-flex">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-resetpassword" class="btn btn-secondary bg-gradient" onclick="$('#modal-resetpassword #resetpassword').attr('action', '<?= base_url('/alumni-admin/resetpassword/' . $alumni['id_alumni']); ?>')"><i class="fa-solid fa-key"></i> Reset Kata Sandi</button>
        </div>
        <div class="d-grid gap-2 d-lg-flex">
            <a class="btn btn-primary bg-gradient" href="<?= base_url('alumni-admin/edit/' . $alumni['id_alumni']); ?>" role="button"><i class="fa-solid fa-user-pen"></i> Edit</a>
        </div>
        <div class="d-grid gap-2 d-lg-flex">
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete" class="btn btn-danger bg-gradient" onclick="$('#modal-delete #delete').attr('action', '<?= base_url('/alumni-admin/delete/' . $alumni['id_alumni']); ?>')"><i class="fa-solid fa-trash"></i> Hapus</button>
        </div>
    </div>
    <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-resetpassword" tabindex="-1" aria-labelledby="modal-resetpassword" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Reset Kata Sandi "<?= $alumni['nama_alumni']; ?>"?</h5>
                </div>
                <form class="modal-footer flex-nowrap p-0" id="resetpassword" action="" method="post">
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
                    <h5 class="mb-0">Hapus "<?= $alumni['nama_alumni']; ?>"?</h5>
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