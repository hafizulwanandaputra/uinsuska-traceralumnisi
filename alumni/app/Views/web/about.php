<?= $this->extend('web/templates/index'); ?>
<?= $this->section('content'); ?>
<!-- JUMBOTRON -->
<div class="pb-3 bg-body-tertiary border-bottom" style="padding-top: 5rem;">
    <div class="container text-center">
        <h2 class="display-4">Tentang Sistem Informasi Tracer Study Program Studi Sistem Informasi UIN Suska Riau</h2>
    </div>
</div>
<!-- CONTENT -->
<div class="pt-4 bg-body-tertiary border-bottom" style="height: 1024px; background: linear-gradient(rgba(0, 0, 0, 0.60), rgba(0, 0, 0, 0)), url('<?= base_url('/images/web/IMG_9646-scaled.jpg'); ?>'); background-position: bottom; background-repeat: no-repeat; background-size: cover; position: relative;">
    <div class="container">
        <figure class="text-center">
            <blockquote class="text-white" style="text-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 1);">
                <p>Sistem Informasi Tracer Study Program Studi Sistem Informasi UIN Suska Riau adalah sistem <em>tracer study</em> khusus Program Studi Sistem Informasi untuk menyediakan informasi yang berguna dan penting tentang hubungan antara program studi Sistem Informasi ini dengan dunia kerja, juga digunakan untuk menilai pentingnya sebuah program studi Sistem Informasi, menyebarkan informasi-informasi kepada orang-orang yang berkepentingan (<em>stakeholders</em>), serta untuk melengkapi sesuatu yang menjadi syarat dalam melakukan akreditasi program studi Sistem Informasi.</p>
            </blockquote>
        </figure>
    </div>
</div>
<?= $this->endSection(); ?>