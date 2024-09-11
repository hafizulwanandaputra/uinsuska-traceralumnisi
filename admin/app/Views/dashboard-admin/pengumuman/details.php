<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/pengumuman-admin'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2"><?= $pengumuman['judul']; ?></h1>
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
    <?php if ($pengumuman['posted'] == 0) : ?>
        <div class="alert alert-warning bg-gradient-header" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="w-100 ms-3">
                    Pengumuman ini belum diposting!
                </div>
            </div>
        </div>
    <?php endif; ?>
    <p class="date">Diposting: <?= strftime("%e %B %Y, %H.%M.%S", strtotime($pengumuman['tgl_posting'])); ?></p>
    <?= $pengumuman['isi']; ?>
    <hr>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-end mb-3">
        <?php if ($pengumuman['posted'] == 0) : ?>
            <div class="d-grid gap-2 d-sm-flex">
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-post" class="btn btn-success bg-gradient" onclick="$('#modal-post #post').attr('action', '<?= base_url('/pengumuman-admin/post/' . $pengumuman['id_pengumuman']); ?>')"><i class="fa-solid fa-paper-plane"></i> Posting</button>
            </div>
        <?php elseif ($pengumuman['posted'] == 1) : ?>
            <div class="d-grid gap-2 d-sm-flex">
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-draft" class="btn btn-warning bg-gradient" onclick="$('#modal-draft #draft').attr('action', '<?= base_url('/pengumuman-admin/draft/' . $pengumuman['id_pengumuman']); ?>')"><i class="fa-solid fa-xmark"></i> Draf</button>
            </div>
        <?php endif; ?>
        <div class="d-grid gap-2 d-sm-flex">
            <a class="btn btn-primary bg-gradient" href="<?= base_url('pengumuman-admin/edit/' . $pengumuman['id_pengumuman']); ?>" role="button"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
        </div>
        <div class="d-grid gap-2 d-sm-flex">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete" class="btn btn-danger bg-gradient" onclick="$('#modal-delete #delete').attr('action', '<?= base_url('/pengumuman-admin/delete/' . $pengumuman['id_pengumuman']); ?>')"><i class="fa-solid fa-trash"></i> Hapus</button>
        </div>
    </div>
    <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-post" tabindex="-1" aria-labelledby="modal-post" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Posting "<?= $pengumuman['judul']; ?>"</h5>
                </div>
                <form class="modal-footer flex-nowrap p-0" id="post" action="" method="post">
                    <input type="hidden" name="_method" value="POST">
                    <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</a>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-draft" tabindex="-1" aria-labelledby="modal-draft" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Draf "<?= $pengumuman['judul']; ?>"?</h5>
                </div>
                <form class="modal-footer flex-nowrap p-0" id="draft" action="" method="post">
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
                    <h5 class="mb-0">Hapus "<?= $pengumuman['judul']; ?>"?</h5>
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