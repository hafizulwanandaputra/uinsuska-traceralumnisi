<?= $this->extend('dashboard/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil Anda</h1>
        <a class="btn btn-primary btn-sm bg-gradient" href="<?= base_url('/profil/edit'); ?>" role="button"><i class="fa-solid fa-user-pen"></i> Edit Profil</a>
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
        <div class="img-thumbnail rounded-pill" style="background-image: url('<?= (session()->get('foto_alumni') == NULL) ? base_url() . 'images/profile/blank.jpg' : base_url() . 'images/profile/alumni/' . session()->get('foto_alumni'); ?>'); background-color: #cccccc; width: 256px; aspect-ratio: 1/1; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;">
        </div>
    </div>
    <hr>
    <h3 class="display-6">Informasi Pribadi</h3>

    <!-- NAMA ALUMNI -->
    <div class="mb-3 row">
        <label for="nama_alumni" class="col-xl-3 col-form-label"><strong>Nama</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="nama_alumni" name="nama_alumni" value="<?= session()->get('nama_alumni'); ?>">
        </div>
    </div>

    <!-- NIM ALUMNI -->
    <div class="mb-3 row">
        <label for="nim_alumni" class="col-xl-3 col-form-label"><strong>Nomor Induk Mahasiswa</strong></label>
        <div class="col-lg">
            <input type="number" readonly class="form-control-plaintext date" id="nim_alumni" name="nim_alumni" value="<?= session()->get('nim_alumni'); ?>">
        </div>
    </div>

    <!-- TEMPAT DAN TANGGAL LAHIR -->
    <div class="mb-3 row">
        <label for="tgl_lahir" class="col-xl-3 col-form-label"><strong>Tempat dan Tanggal Lahir</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext date" id="tgl_lahir" name="tgl_lahir" value="<?= session()->get('tempat_lahir') . ', ' . strftime("%e %B %Y", strtotime(session()->get('tgl_lahir'))); ?>">
        </div>
    </div>

    <!-- AGAMA -->
    <div class="mb-3 row">
        <label for="agama" class="col-xl-3 col-form-label"><strong>Agama</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="agama" name="agama" value="<?= session()->get('agama'); ?>">
        </div>
    </div>

    <!-- JENIS KELAMIN -->
    <div class="mb-3 row">
        <label for="jenis_kelamin" class="col-xl-3 col-form-label"><strong>Jenis Kelamin</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="jenis_kelamin" name="jenis_kelamin" value="<?= (session()->get('jenis_kelamin') == 'P') ? 'Perempuan' : ((session()->get('jenis_kelamin') == 'L') ? 'Laki-Laki' : ''); ?>">
        </div>
    </div>

    <!-- PEKERJAAN -->
    <div class="mb-3 row">
        <label for="pekerjaan" class="col-xl-3 col-form-label"><strong>Pekerjaan</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="pekerjaan" name="pekerjaan" value="<?= (session()->get('pekerjaan') != NULL) ? session()->get('pekerjaan') : '-'; ?>">
        </div>
    </div>

    <!-- ALAMAT RUMAH -->
    <div class="mb-3 row">
        <label for="alamat_rumah" class="col-xl-3 col-form-label"><strong>Alamat Rumah</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="alamat_rumah" name="alamat_rumah" value="<?= (session()->get('alamat_rumah') != NULL) ? session()->get('alamat_rumah') : '-'; ?>">
        </div>
    </div>

    <hr>
    <h3 class="display-6">Kontak</h3>

    <!-- NOMOR HP 1 -->
    <div class="mb-3 row">
        <label for="nomor_hp" class="col-xl-3 col-form-label"><strong>Nomor HP 1</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext date" id="nomor_hp" name="nomor_hp" value="<?= (session()->get('nomor_hp') != NULL) ? '+' . session()->get('nomor_hp') : '-'; ?>">
        </div>
    </div>

    <!-- NOMOR HP 2 -->
    <div class="mb-3 row">
        <label for="nomor_hp_2" class="col-xl-3 col-form-label"><strong>Nomor HP 2</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext date" id="nomor_hp_2" name="nomor_hp_2" value="<?= (session()->get('nomor_hp_2') != NULL) ? '+' . session()->get('nomor_hp_2') : '-'; ?>">
        </div>
    </div>

    <!-- EMAIL -->
    <div class="mb-3 row">
        <label for="email" class="col-xl-3 col-form-label"><strong>Email</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="email" name="email" value="<?= (session()->get('email') != NULL) ? session()->get('email') : '-'; ?>">
        </div>
    </div>

    <hr>
    <h3 class="display-6">Status Alumni</h3>

    <!-- TANGGAL LULUS -->
    <div class="mb-3 row">
        <label for="tgl_lulus" class="col-xl-3 col-form-label"><strong>Tanggal Lulus</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="tgl_lulus" name="tgl_lulus" value="<?= strftime("%e %B %Y", strtotime(session()->get('tgl_lulus'))); ?>">
        </div>
    </div>

    <hr>
    <h3 class="display-6">Administrasi Alumni</h3>

    <!-- IJAZAH -->
    <div class="mb-3 row">
        <label for="ijazah" class="col-xl-3 col-form-label"><strong>Ijazah</strong></label>
        <div class="col-lg">
            <div class="input-group">
                <input type="text" disabled readonly class="form-control" id="ijazah" name="ijazah" value="<?= session()->get('ijazah'); ?>">
                <a class="btn btn-primary bg-gradient <?= (session()->get('ijazah') == NULL) ? 'disabled' : '' ?>" <?= (session()->get('ijazah') == NULL) ? 'aria-disabled="true"' : 'href="' . base_url() . 'files/ijazah/' . session()->get('ijazah') . '"' ?> role="button" target="_blank"><i class="fa-solid fa-file"></i></a>
            </div>
        </div>
    </div>

    <!-- SKL -->
    <div class="mb-3 row">
        <label for="sk_lulus" class="col-xl-3 col-form-label"><strong>Surat Keterangan Lulus</strong></label>
        <div class="col-lg">
            <div class="input-group">
                <input type="text" disabled readonly class="form-control" id="sk_lulus" name="sk_lulus" value="<?= session()->get('sk_lulus'); ?>">
                <a class="btn btn-primary bg-gradient <?= (session()->get('sk_lulus') == NULL) ? 'disabled' : '' ?>" <?= (session()->get('sk_lulus') == NULL) ? 'aria-disabled="true"' : 'href="' . base_url() . '/files/sk_lulus/' . session()->get('sk_lulus') . '"' ?> role="button" target="_blank"><i class="fa-solid fa-file"></i></a>
            </div>
        </div>
    </div>

    <!-- TNA -->
    <div class="mb-3 row">
        <label for="transkrip_nilai" class="col-xl-3 col-form-label"><strong>Transkrip Nilai Akademik</strong></label>
        <div class="col-lg">
            <div class="input-group">
                <input type="text" disabled readonly class="form-control" id="transkrip_nilai" name="transkrip_nilai" value="<?= session()->get('transkrip_nilai'); ?>">
                <a class="btn btn-primary bg-gradient <?= (session()->get('transkrip_nilai') == NULL) ? 'disabled' : '' ?>" <?= (session()->get('transkrip_nilai') == NULL) ? 'aria-disabled="true"' : 'href="' . base_url() . '/files/transkrip_nilai/' . session()->get('transkrip_nilai') . '"' ?> role="button" target="_blank"><i class="fa-solid fa-file"></i></a>
            </div>
        </div>
    </div>
    <hr>
    <?php if (session()->get('foto_alumni') != NULL) : ?>
        <div class="d-grid gap-2 mb-3">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete" class="btn btn-danger btn-lg bg-gradient" onclick="$('#modal-delete #delete').attr('action', '<?= base_url('/profil/delprofilephoto'); ?>')"><i class="fa-solid fa-trash"></i> Hapus Foto Profil</button>
        </div>
        <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                    <div class="modal-body p-4 text-center">
                        <h5 class="mb-0">Hapus Foto Profil Anda?</h5>
                    </div>
                    <form class="modal-footer flex-nowrap p-0" id="delete" action="<?= base_url('/profil/delprofilephoto'); ?>" method="post">
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