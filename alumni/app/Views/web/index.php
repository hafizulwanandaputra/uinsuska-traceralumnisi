<?= $this->extend('web/templates/index'); ?>
<?= $this->section('content'); ?>
<!-- JUMBOTRON -->
<div class="pb-3 mb-3 bg-body-tertiary border-bottom" style="padding-top: 24rem; background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.60)), url('<?= base_url('/images/web/Gerbang-UIN-Welcome-scaled.jpg'); ?>'); background-position: center; background-repeat: no-repeat; background-size: cover; position: relative;">
    <div class="container">
        <div class="col text-center">
            <h3 class="display-5 text-white" style="text-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 1);">Selamat Datang di Sistem Informasi Tracer Study</h3>
            <p class="fs-4 text-white">PROGRAM STUDI SISTEM INFORMASI<br>FAKULTAS SAINS DAN TEKNOLOGI<br>UNIVERSITAS ISLAM NEGERI SULTAN SYARIF KASIM RIAU</p>
        </div>
    </div>
</div>
<!-- CONTENT -->
<div class="container mb-3">
    <h3 class="display-6 text-center">Statistik Alumni</h3>
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col text-center">
            <p class="display-5 mb-0"><?= $mahasiswa; ?></p>
            <p><small>Jumlah Mahasiswa</small></p>
        </div>
        <div class="col text-center">
            <p class="display-5 mb-0"><?= $alumnilulus; ?></p>
            <p><small>Jumlah Alumni yang Lulus</small></p>
        </div>
        <div class="col text-center">
            <p class="display-5 mb-0"><?= $sudahkuesioner; ?></p>
            <p><small>Jumlah Alumni yang Mengisi Kuesioner</small></p>
        </div>
    </div>
    <hr>
    <div class="row row-cols-1 row-cols-lg-3 g-2">
        <div class="col">
            <div class="h-100">
                <div class="text-center">
                    <h5 class="card-title">Grafik Tahun Lulus</h5>
                    <div class="d-flex justify-content-center mt-3">
                        <canvas id="grafikthnlulus" style="height: 256px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="h-100">
                <div class="text-center">
                    <h5 class="card-title">Grafik Lulusan Alumni</h5>
                    <div class="d-flex justify-content-center mt-3">
                        <canvas id="grafikalumni" style="height: 256px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="h-100">
                <div class="text-center">
                    <h5 class="card-title">Grafik Isi Kuesioner</h5>
                    <div class="d-flex justify-content-center mt-3">
                        <canvas id="grafikkuesioner" style="height: 256px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h3 class="display-6 text-center">Yuk bantu kami dalam mengisi kuesioner</h3>
    <p class="text-center"><strong>Silahkan Login terlebih dahulu untuk dapat mengisi kuesioner Tracer Study</strong></p>
    <div class="d-grid gap-2">
        <a class="btn btn-primary btn-lg bg-gradient" href="<?= base_url('/login'); ?>" role="button"><i class="fa-solid fa-right-to-bracket"></i> LOGIN</a>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('chartjs'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js" integrity="sha512-SIMGYRUjwY8+gKg7nn9EItdD8LCADSDfJNutF9TPrvEo86sQmFMh6MyralfIyhADlajSxqc7G0gs7+MwWF/ogQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
        Chart.defaults.color = "#ADBABD";
        Chart.defaults.borderColor = "rgba(255,255,255,0.1)";
        Chart.defaults.backgroundColor = "rgba(255,255,0,0.1)";
        Chart.defaults.elements.line.borderColor = "rgba(255,255,0,0.4)";
    }
    Chart.defaults.font.family = '"Noto Sans", "Noto Sans Arabic", system-ui, -apple-system, sans-serif';
    const data_thnlulus = [];
    const label_thnlulus = [];
    <?php foreach ($thnlulus->getResult() as $key => $thnlulus) : ?>
        data_thnlulus.push(<?= $thnlulus->total; ?>);
        label_thnlulus.push('<?= $thnlulus->tgl_lulus; ?>');
    <?php endforeach; ?>
    const data_alumni = [];
    const label_alumni = [];
    <?php foreach ($alumni->getResult() as $key => $alumni) : ?>
        data_alumni.push(<?= $alumni->total; ?>);
        <?php if ($alumni->aktif == 1) : ?>
            label_alumni.push('Alumni yang lulus');
        <?php else : ?>
            label_alumni.push('Alumni yang belum lulus');
        <?php endif; ?>
    <?php endforeach; ?>
    const data_kuesioner = [];
    const label_kuesioner = [];
    <?php foreach ($kuesioner->getResult() as $key => $kuesioner) : ?>
        data_kuesioner.push(<?= $kuesioner->total; ?>);
        <?php if ($kuesioner->kuesioner == 1) : ?>
            label_kuesioner.push('Sudah isi kuesioner');
        <?php else : ?>
            label_kuesioner.push('Belum isi kuesioner');
        <?php endif; ?>
    <?php endforeach; ?>

    var data_isi_thnlulus = {
        labels: label_thnlulus,
        datasets: [{
            label: 'Jumlah',
            borderWidth: 1,
            data: data_thnlulus
        }]
    }
    var data_lulusan_alumni = {
        labels: label_alumni,
        datasets: [{
            label: 'Jumlah',
            borderWidth: 1,
            data: data_alumni,
        }]
    }
    var data_isi_kuesioner = {
        labels: label_kuesioner,
        datasets: [{
            label: 'Jumlah',
            borderWidth: 1,
            data: data_kuesioner,
        }]
    }

    var chart_thnlulus = new Chart('grafikthnlulus', {
        type: 'pie',
        data: data_isi_thnlulus,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            locale: 'id-ID',
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    })
    var chart_alumni = new Chart('grafikalumni', {
        type: 'pie',
        data: data_lulusan_alumni,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            locale: 'id-ID',
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    })
    var chart_kuesioner = new Chart('grafikkuesioner', {
        type: 'pie',
        data: data_isi_kuesioner,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            locale: 'id-ID',
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    })
</script>
<?= $this->endSection(); ?>