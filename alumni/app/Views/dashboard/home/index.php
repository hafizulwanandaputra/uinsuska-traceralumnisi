<?= $this->extend('dashboard/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Beranda</h1>
    </div>
    <div class="alert alert-primary bg-gradient-header text-center" role="alert">
        <h3 class="display-6">Selamat datang, <?= session()->get('nama_alumni'); ?></h3>
        <span class="fs-4">Anda login sebagai Alumni</span>
    </div>
    <?php if (session()->get('kuesioner') == 0) : ?>
        <div class="alert alert-danger bg-gradient-header" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 48px; text-align: center; font-size: 32px;">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>
                <div class="w-100 p-2">
                    <h4>Anda belum mengisi kuesioner!</h4>
                    <span>Klik "Isi Kuesioner" untuk mengisi kuesioner Anda</span>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-success bg-gradient-header" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 48px; text-align: center; font-size: 32px;">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div class="w-100 p-2">
                    <h4>Anda sudah mengisi kuesioner!</h4>
                    <span>Klik "Lihat Kuesioner" untuk melihat jawaban kuesioner Anda</span>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->get('kuesioner') == 0) : ?>
        <div class="d-grid gap-2">
            <a class="btn btn-primary btn-lg bg-gradient" href="<?= base_url('/kuesioner/create'); ?>" role="button"><i class="fa-solid fa-list-check"></i> Isi Kuesioner</a>
        </div>
    <?php else : ?>
        <div class="d-grid gap-2">
            <a class="btn btn-primary btn-lg bg-gradient" href="<?= base_url('/kuesioner'); ?>" role="button"><i class="fa-solid fa-list-check"></i> Lihat Kuesioner</a>
        </div>
    <?php endif; ?>
</main>
</div>
</div>
<?= $this->endSection(); ?>