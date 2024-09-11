<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengumuman <small><span class="badge text-bg-info border border-info bg-gradient"><?= $totalpengumuman; ?></span></small></h1>
        <a class="btn btn-primary btn-sm bg-gradient" href="<?= base_url('/pengumuman-admin/create'); ?>" role="button"><i class="fa-solid fa-plus"></i> Buat Pengumuman</a>
    </div>
    <form action="" method="post">
        <div class="input-group mb-3">
            <input class="form-control" type="search" placeholder="Cari Pengumuman" name="keyword" id="keyword" aria-label="Search" autocomplete="off">
            <button class="btn btn-success bg-gradient" type="submit" id="submit" name="submit" data-toggle="tooltip" data-placement="top" title="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>
    <?php if ($keyword) : ?>
        <div class="alert alert-primary bg-gradient-header" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="w-100 ms-3">
                    Menampilkan data untuk pencarian "<strong><?= $keyword; ?></strong>"
                </div>
            </div>
        </div>
    <?php endif; ?>
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
    <?php if (empty($pengumuman)) : ?>
        <?php if ($keyword) : ?>
            <div class="alert alert-danger bg-gradient-header" role="alert">
                <div class="d-flex align-items-start">
                    <div style="width: 12px; text-align: center;">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <div class="w-100 ms-3">
                        Pengumuman yang Anda cari tidak ditemukan!
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="alert alert-info bg-gradient-header" role="alert">
                <div class="d-flex align-items-start">
                    <div style="width: 12px; text-align: center;">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <div class="w-100 ms-3">
                        Pengumuman kosong. klik "Buat Pengumuman" untuk membuat pengumuman.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <ul class="list-group">
        <?php foreach ($pengumuman as $isipengumuman) : ?>
            <li class="list-group-item list-group-item-action <?= ($isipengumuman['posted'] == 0) ? 'list-group-item-warning' : '' ?>">
                <div>
                    <?= $isipengumuman['judul']; ?> <?= ($isipengumuman['posted'] == 0) ? '<span class="badge text-bg-warning border border-warning bg-gradient">Belum diposting</span>' : '' ?></span>
                    <br>
                    <small>
                        Diposting: <span class="date"><?= strftime("%e %B %Y, %H.%M.%S", strtotime($isipengumuman['tgl_posting'])); ?></span>
                    </small>
                </div>
                <hr>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-end mb-2">
                    <a class="btn btn-info btn-sm bg-gradient" href="<?= base_url('/pengumuman-admin/' . $isipengumuman['id_pengumuman']); ?>" role="button"><i class="fa-solid fa-circle-info"></i> Detail</a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete-<?= $isipengumuman['id_pengumuman']; ?>" class="btn btn-danger btn-sm bg-gradient" onclick="$('#modal-delete-<?= $isipengumuman['id_pengumuman']; ?> #delete-<?= $isipengumuman['id_pengumuman']; ?>').attr('action', '<?= base_url('/pengumuman-admin/delete/' . $isipengumuman['id_pengumuman']); ?>')"><i class="fa-solid fa-trash"></i> Hapus</button>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php foreach ($pengumuman as $isipengumuman) : ?>
        <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-delete-<?= $isipengumuman['id_pengumuman']; ?>" tabindex="-1" aria-labelledby="modal-delete-<?= $isipengumuman['id_pengumuman']; ?>" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                    <div class="modal-body p-4 text-center">
                        <h5 class="mb-0">Hapus "<?= $isipengumuman['judul']; ?>"?</h5>
                    </div>
                    <form class="modal-footer flex-nowrap p-0" id="delete-<?= $isipengumuman['id_pengumuman']; ?>" action="" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="d-flex justify-content-center justify-content-lg-end mt-3 overflow-auto w-100">
        <?= $pager->links('pengumuman', 'styled'); ?>
    </div>
</main>
</div>
</div>
<?= $this->endSection(); ?>