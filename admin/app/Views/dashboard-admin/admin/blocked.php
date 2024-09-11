<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
    </div>
    <div class="alert alert-danger bg-gradient-header" role="alert">
        <div class="d-flex align-items-start">
            <div style="width: 12px; text-align: center;">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
            <div class="w-100 ms-3">
                Halaman ini hanya bisa diakses oleh master admin!
            </div>
        </div>
    </div>
</main>
</div>
</div>
<?= $this->endSection(); ?>