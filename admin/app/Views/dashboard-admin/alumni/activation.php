<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/alumni-admin'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2">Aktivasi Alumni <small><span class="badge text-bg-info border border-info bg-gradient"><?= $unactivatedalumni; ?></span></h1>
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
    <?php if (empty($alumni)) : ?>
        <div class="alert alert-success bg-gradient-header" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div class="w-100 ms-3">
                    Tidak ada alumni yang akan aktivasi.
                </div>
            </div>
        </div>
    <?php endif; ?>
    <ul class="list-group">
        <?php foreach ($alumni as $aktivasialumni) : ?>
            <li class="list-group-item">
                <?= $aktivasialumni['nama_alumni']; ?> <span class="badge rounded-pill text-bg-primary border-primary bg-gradient">Lulus pada <?= strftime("%e %B %Y", strtotime($aktivasialumni['tgl_lulus'])); ?></span>
                <br>
                <small>
                    <?= $aktivasialumni['nim_alumni']; ?> • <?= $aktivasialumni['tempat_lahir']; ?>, <?= strftime("%e %B %Y", strtotime($aktivasialumni['tgl_lahir'])); ?> • <?= $aktivasialumni['agama']; ?>
                    <br>
                    Beralamat di <?= $aktivasialumni['alamat_rumah']; ?>
                    <br>
                    Bekerja sebagai <?= $aktivasialumni['pekerjaan']; ?>
                </small>
                <div>
                    <!-- IJAZAH -->
                    <div class="row">
                        <label for="ijazah" class="col-xl-3 col-form-label"><small>Ijazah</small></label>
                        <div class="col-lg">
                            <div class="input-group">
                                <input type="text" disabled readonly class="form-control form-control-sm" id="ijazah" name="ijazah" value="<?= $aktivasialumni['ijazah']; ?>">
                                <a class="btn btn-primary btn-sm bg-gradient" href="<?= env('ALUMNI') . 'files/ijazah/' . $aktivasialumni['ijazah']; ?>" role="button" target="_blank"><i class="fa-solid fa-file"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- SKL -->
                    <div class="row">
                        <label for="sk_lulus" class="col-xl-3 col-form-label"><small>Surat Keterangan Lulus</small></label>
                        <div class="col-lg">
                            <div class="input-group">
                                <input type="text" disabled readonly class="form-control form-control-sm" id="sk_lulus" name="sk_lulus" value="<?= ($aktivasialumni['sk_lulus'] == NULL) ? 'Tidak ada file SKL' : $aktivasialumni['sk_lulus']; ?>">
                                <a class="btn btn-primary btn-sm bg-gradient <?= ($aktivasialumni['sk_lulus'] == NULL) ? 'disabled' : '' ?>" href="<?= env('ALUMNI') . '/files/sk_lulus/' . $aktivasialumni['sk_lulus']; ?>" role="button" target="_blank"><i class="fa-solid fa-file"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- TNA -->
                    <div class="row">
                        <label for="transkrip_nilai" class="col-xl-3 col-form-label"><small>Transkrip Nilai Akademik</small></label>
                        <div class="col-lg">
                            <div class="input-group">
                                <input type="text" disabled readonly class="form-control form-control-sm" id="transkrip_nilai" name="transkrip_nilai" value="<?= $aktivasialumni['transkrip_nilai']; ?>">
                                <a class="btn btn-primary btn-sm bg-gradient" href="<?= env('ALUMNI') . '/files/transkrip_nilai/' . $aktivasialumni['transkrip_nilai']; ?>" role="button" target="_blank"><i class="fa-solid fa-file"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-grid gap-2 d-lg-flex justify-content-lg-end mb-2">
                    <?php if ($aktivasialumni['nomor_hp'] != NULL) : ?>
                        <div class="d-grid gap-2 d-lg-flex">
                            <a class="btn btn-secondary btn-sm bg-gradient" href="https://wa.me/<?= $aktivasialumni['nomor_hp']; ?>" role="button" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp Nomor 1</a>
                        </div>
                    <?php endif; ?>
                    <?php if ($aktivasialumni['nomor_hp_2'] != NULL) : ?>
                        <div class="d-grid gap-2 d-lg-flex">
                            <a class="btn btn-secondary btn-sm bg-gradient" href="https://wa.me/<?= $aktivasialumni['nomor_hp']; ?>" role="button" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp Nomor 2</a>
                        </div>
                    <?php endif; ?>
                    <?php if ($aktivasialumni['email'] != NULL) : ?>
                        <div class="d-grid gap-2 d-lg-flex">
                            <a class="btn btn-secondary btn-sm bg-gradient" href="mailto:<?= $aktivasialumni['email']; ?>" role="button" target="_blank"><i class="fa-solid fa-envelope"></i> Email</a>
                        </div>
                    <?php endif; ?>
                    <div class="d-grid gap-2 d-lg-flex" action="<?= base_url('/alumni-admin/deny/' . $aktivasialumni['id_alumni']); ?>" method="post">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-deny-<?= $aktivasialumni['id_alumni']; ?>" class="btn btn-danger btn-sm bg-gradient" onclick="$('#modal-deny-<?= $aktivasialumni['id_alumni']; ?> #deny-<?= $aktivasialumni['id_alumni']; ?>').attr('action', '<?= base_url('/alumni-admin/deny/' . $aktivasialumni['id_alumni']); ?>')"><i class="fa-solid fa-user-xmark"></i> Tolak</button>
                    </div>
                    <div class="d-grid gap-2 d-lg-flex" action="<?= base_url('/alumni-admin/activate/' . $aktivasialumni['id_alumni']); ?>" method="post">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-activate-<?= $aktivasialumni['id_alumni']; ?>" class="btn btn-success btn-sm bg-gradient" onclick="$('#modal-activate-<?= $aktivasialumni['id_alumni']; ?> #activate-<?= $aktivasialumni['id_alumni']; ?>').attr('action', '<?= base_url('/alumni-admin/activate/' . $aktivasialumni['id_alumni']); ?>')"><i class="fa-solid fa-user-check"></i> Aktifkan akun</button>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php foreach ($alumni as $aktivasialumni) : ?>
        <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-deny-<?= $aktivasialumni['id_alumni']; ?>" tabindex="-1" aria-labelledby="modal-deny-<?= $aktivasialumni['id_alumni']; ?>" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                    <div class="modal-body p-4 text-center">
                        <h5>Tolak "<?= $aktivasialumni['nama_alumni']; ?>"?</h5>
                        <span>Menolak aktivasi hanya menghapus file-file yang sudah diunggah dan tanggal lulus yang sudah dimasukkan oleh yang bersangkutan.</span>
                    </div>
                    <form class="modal-footer flex-nowrap p-0" id="deny-<?= $aktivasialumni['id_alumni']; ?>" action="" method="post">
                        <input type="hidden" name="_method" value="POST">
                        <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-activate-<?= $aktivasialumni['id_alumni']; ?>" tabindex="-1" aria-labelledby="modal-activate-<?= $aktivasialumni['id_alumni']; ?>" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                    <div class="modal-body p-4 text-center">
                        <h5 class="mb-0">Aktifkan "<?= $aktivasialumni['nama_alumni']; ?>"?</h5>
                    </div>
                    <form class="modal-footer flex-nowrap p-0" id="activate-<?= $aktivasialumni['id_alumni']; ?>" action="" method="post">
                        <input type="hidden" name="_method" value="POST">
                        <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</main>
</div>
</div>
<?= $this->endSection(); ?>