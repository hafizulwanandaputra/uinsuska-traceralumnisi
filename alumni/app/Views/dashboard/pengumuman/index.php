<?= $this->extend('dashboard/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengumuman</h1>
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
    <?php if (empty($pengumuman)) : ?>
        <div class="py-3 text-center">
            <?php if ($keyword) : ?>
                <p>Pengumuman yang Anda cari tidak ditemukan"</p>
            <?php else : ?>
                <p>Pengumuman kosong.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php $i = 1 + (1 * ($currentPage - 1)); ?>
    <div class="accordion" id="accordionPengumuman">
        <?php foreach ($pengumuman as $isipengumuman) : ?>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-gradient-header collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $isipengumuman['id_pengumuman']; ?>" aria-expanded="false" aria-controls="flush-collapse<?= $isipengumuman['id_pengumuman']; ?>">
                        <div>
                            <h5><?= $isipengumuman['judul']; ?></h5>
                            <small>
                                Diposting: <span class="date"><?= strftime("%e %B %Y, %H.%M.%S", strtotime($isipengumuman['tgl_posting'])); ?></span>
                            </small>
                        </div>
                    </button>
                </h2>
                <div id="flush-collapse<?= $isipengumuman['id_pengumuman']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionPengumuman">
                    <div class="accordion-body">
                        <?= $isipengumuman['isi']; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="d-flex justify-content-center justify-content-lg-end mt-3 overflow-auto w-100">
        <?= $pager->links('pengumuman', 'styled'); ?>
    </div>
</main>
</div>
</div>
<?= $this->endSection(); ?>