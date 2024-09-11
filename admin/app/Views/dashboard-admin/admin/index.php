<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin <small><span class="badge text-bg-info border border-info bg-gradient"><?= $totaladmin; ?></span></small></h1>
        <a class="btn btn-primary btn-sm bg-gradient" href="<?= base_url('/admin/create'); ?>" role="button"><i class="fa-solid fa-user-plus"></i> Tambah Admin</a>
    </div>
    <form action="" method="post">
        <div class="input-group mb-3">
            <input class="form-control" type="search" placeholder="Cari Admin" name="keyword" id="keyword" aria-label="Search" autocomplete="off">
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
    <?php if (empty($admin)) : ?>
        <?php if ($keyword) : ?>
            <div class="alert alert-danger bg-gradient-header" role="alert">
                <div class="d-flex align-items-start">
                    <div style="width: 12px; text-align: center;">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <div class="w-100 ms-3">
                        Admin yang Anda cari tidak ditemukan!
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
                        Admin kosong. klik "Tambah Admin" untuk menambahkan admin.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-6 g-2">
        <?php foreach ($admin as $isiadmin) : ?>
            <div class="col">
                <div class="card h-100 <?= ($isiadmin['active'] == 1) ? '' : 'text-warning-emphasis bg-warning-subtle border-warning-subtle' ?>">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="img-thumbnail rounded-pill" style="background-image: url('<?= ($isiadmin['foto_user'] == NULL) ? env('ALUMNI') . 'images/profile/blank.jpg' : env('ALUMNI') . 'images/profile/' . $isiadmin['foto_user']; ?>'); background-color: #cccccc; width: 100%; aspect-ratio: 1/1; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;"></div>
                        </div>
                        <h5 class="card-title"><?= $isiadmin['nama_lengkap']; ?></h5>
                        <p class="card-text">@<?= $isiadmin['username']; ?><br><small><?= ($isiadmin['type'] == 1) ? 'MASTER ADMIN' : (($isiadmin['type'] == 2) ? 'ADMIN' : '') ?></small></p>
                        <p class="card-text"><?= ($isiadmin['active'] == 1) ? '<span class="badge text-bg-success border border-success bg-gradient">Aktif</span>' : '<span class="badge text-bg-warning border border-warning bg-gradient">Tidak Aktif</span>' ?></p>
                    </div>
                    <div class="card-footer bg-gradient d-grid gap-2">
                        <div class="btn-group" role="group">
                            <a class="btn btn-info btn-lg bg-gradient" href="<?= base_url('/admin/' . $isiadmin['id_user']); ?>" role="button"><i class="fa-solid fa-circle-info"></i></a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete-<?= $isiadmin['id_user']; ?>" class="btn btn-danger btn-lg bg-gradient" onclick="$('#modal-delete-<?= $isiadmin['id_user']; ?> #delete-<?= $isiadmin['id_user']; ?>').attr('action', '<?= base_url('/admin/delete/' . $isiadmin['id_user']); ?>')"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php foreach ($admin as $isiadmin) : ?>
        <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-delete-<?= $isiadmin['id_user']; ?>" tabindex="-1" aria-labelledby="modal-delete-<?= $isiadmin['id_user']; ?>" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                    <div class="modal-body p-4 text-center">
                        <h5 class="mb-0">Hapus "<?= $isiadmin['nama_lengkap']; ?>"?</h5>
                    </div>
                    <form class="modal-footer flex-nowrap p-0" id="delete-<?= $isiadmin['id_user']; ?>" action="" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="d-flex justify-content-center justify-content-lg-end mt-3 overflow-auto w-100">
        <?= $pager->links('user', 'styled'); ?>
    </div>
</main>
</div>
</div>
<?= $this->endSection(); ?>