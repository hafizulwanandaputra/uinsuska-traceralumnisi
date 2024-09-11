<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Beranda</h1>
    </div>
    <div class="alert alert-primary bg-gradient-header text-center" role="alert">
        <h3 class="display-6">Selamat datang, <?= session()->get('nama_lengkap'); ?></h3>
        <span class="fs-4">Anda login sebagai <?= (session()->get('type') == 1) ? 'Master Admin' : ((session()->get('type') == 2) ? 'Admin' : ''); ?></span>
    </div>
    <div class="card-group mb-2">
        <div class="card">
            <h5 class="card-header h-100 bg-gradient">
                <div class="d-flex align-items-center h-100">
                    <div style="width: 24px; text-align: center;">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="w-100 ms-2 text-body">
                        Total Mahasiswa
                    </div>
                </div>
            </h5>
            <div class="card-body">
                <h1 class="display-4 date"><?= $mahasiswa; ?></h1>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header h-100 bg-gradient">
                <div class="d-flex align-items-center h-100">
                    <div style="width: 24px; text-align: center;">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div class="w-100 ms-2 text-body">
                        Total Alumni yang Lulus
                    </div>
                </div>
            </h5>
            <div class="card-body">
                <h1 class="display-4 date"><?= $alumnilulus; ?></h1>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header h-100 bg-gradient">
                <div class="d-flex align-items-center h-100">
                    <div style="width: 24px; text-align: center;">
                        <i class="fa-solid fa-list-check"></i>
                    </div>
                    <div class="w-100 ms-2 text-body">
                        Total Alumni yang Mengisi Kuesioner
                    </div>
                </div>
            </h5>
            <div class="card-body">
                <h1 class="display-4 date"><?= $sudahkuesioner; ?></h1>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-lg-3 g-2 mb-2">
        <div class="col">
            <div class="card h-100">
                <h5 class="card-header h-100 text-center bg-gradient">
                    <div class="d-flex align-items-center h-100">
                        <div class="w-100 text-body">
                            Grafik Tahun Lulus
                        </div>
                    </div>
                </h5>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <canvas id="grafikthnlulus" style="height: 256px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <h5 class="card-header h-100 text-center bg-gradient">
                    <div class="d-flex align-items-center h-100">
                        <div class="w-100 text-body">
                            Grafik Lulusan Alumni
                        </div>
                    </div>
                </h5>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <canvas id="grafikalumni" style="height: 256px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <h5 class="card-header h-100 text-center bg-gradient">
                    <div class="d-flex align-items-center h-100">
                        <div class="w-100 text-body">
                            Grafik Isi Kuesioner
                        </div>
                    </div>
                </h5>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <canvas id="grafikkuesioner" style="height: 256px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <h5 class="card-header h-100 text-center bg-gradient">
                    <div class="d-flex align-items-center h-100">
                        <div class="w-100 text-body">
                            Grafik Pekerjaan
                        </div>
                    </div>
                </h5>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <canvas id="grafikbekerja" style="height: 256px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <h5 class="card-header h-100 text-center bg-gradient">
                    <div class="d-flex align-items-center h-100">
                        <div class="w-100 text-body">
                            Grafik Kesesuaian Bidang Studi dan Pekerjaan
                        </div>
                    </div>
                </h5>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <canvas id="grafiksesuaiilmu" style="height: 256px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <h5 class="card-header h-100 text-center bg-gradient">
                    <div class="d-flex align-items-center h-100">
                        <div class="w-100 text-body">
                            Grafik Lama Waktu Hingga Pekerjaan Pertama
                        </div>
                    </div>
                </h5>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <canvas id="grafikdapatkerja" style="height: 256px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <h5 class="card-header h-100 text-center bg-gradient">
                    <div class="d-flex align-items-center h-100">
                        <div class="w-100 text-body">
                            Grafik Jenis Pekerjaan
                        </div>
                    </div>
                </h5>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <canvas id="grafikjenis" style="height: 360px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <h5 class="card-header h-100 text-center bg-gradient">
                    <div class="d-flex align-items-center h-100">
                        <div class="w-100 text-body">
                            Grafik Status Pekerjaan
                        </div>
                    </div>
                </h5>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <canvas id="grafikstatus" style="height: 360px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <h5 class="card-header h-100 text-center bg-gradient">
                    <div class="d-flex align-items-center h-100">
                        <div class="w-100 text-body">
                            Grafik Penghasilan
                        </div>
                    </div>
                </h5>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <canvas id="grafikpenghasilan" style="height: 360px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
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
    const data_bekerja = [];
    const label_bekerja = [];
    <?php foreach ($bekerja->getResult() as $key => $bekerja) : ?>
        data_bekerja.push(<?= $bekerja->total; ?>);
        <?php if ($bekerja->bekerja == 0) : ?>
            label_bekerja.push('Belum Bekerja');
        <?php elseif ($bekerja->bekerja == 1) : ?>
            label_bekerja.push('Sudah Bekerja');
        <?php elseif ($bekerja->bekerja == 2) : ?>
            label_bekerja.push('Melajutkan Studi');
        <?php endif; ?>
    <?php endforeach; ?>
    const data_sesuaiilmu = [];
    const label_sesuaiilmu = [];
    <?php foreach ($sesuaiilmu->getResult() as $key => $sesuaiilmu) : ?>
        data_sesuaiilmu.push(<?= $sesuaiilmu->total; ?>);
        <?php if ($sesuaiilmu->sesuai_ilmu == 1) : ?>
            label_sesuaiilmu.push('Rendah');
        <?php elseif ($sesuaiilmu->sesuai_ilmu == 2) : ?>
            label_sesuaiilmu.push('Sedang');
        <?php elseif ($sesuaiilmu->sesuai_ilmu == 3) : ?>
            label_sesuaiilmu.push('Tinggi');
        <?php endif; ?>
    <?php endforeach; ?>
    const data_dapatkerja = [];
    const label_dapatkerja = [];
    <?php foreach ($dapatkerja->getResult() as $key => $dapatkerja) : ?>
        data_dapatkerja.push(<?= $dapatkerja->total; ?>);
        <?php if ($dapatkerja->dapat_kerja == 1) : ?>
            label_dapatkerja.push('Dibawah 3 bulan');
        <?php elseif ($dapatkerja->dapat_kerja == 2) : ?>
            label_dapatkerja.push('3 - 6 bulan');
        <?php elseif ($dapatkerja->dapat_kerja == 3) : ?>
            label_dapatkerja.push('6 - 18 bulan');
        <?php elseif ($dapatkerja->dapat_kerja == 4) : ?>
            label_dapatkerja.push('Diatas 18 bulan');
        <?php endif; ?>
    <?php endforeach; ?>
    const data_jenis = [];
    const label_jenis = [];
    <?php foreach ($jenis->getResult() as $key => $jenis) : ?>
        data_jenis.push(<?= $jenis->total; ?>);
        label_jenis.push('<?= $jenis->jenis; ?>');
    <?php endforeach; ?>
    const data_status = [];
    const label_status = [];
    <?php foreach ($status->getResult() as $key => $status) : ?>
        data_status.push(<?= $status->total; ?>);
        <?php if ($status->status == 1) : ?>
            label_status.push('PNS');
        <?php elseif ($status->status == 2) : ?>
            label_status.push('Pegawai Kontrak');
        <?php elseif ($status->status == 3) : ?>
            label_status.push('Pegawai Kontrak');
        <?php elseif ($status->status == 4) : ?>
            label_status.push('Direktur');
        <?php elseif ($status->status == 5) : ?>
            label_status.push('Manajer');
        <?php elseif ($status->status == 6) : ?>
            label_status.push('Staff');
        <?php elseif ($status->status == 7) : ?>
            label_status.push('Magang');
        <?php endif; ?>
    <?php endforeach; ?>
    const data_penghasilan = [];
    const label_penghasilan = [];
    <?php foreach ($penghasilan->getResult() as $key => $penghasilan) : ?>
        data_penghasilan.push(<?= $penghasilan->total; ?>);
        <?php if ($penghasilan->penghasilan == 1) : ?>
            label_penghasilan.push('Dibawah Rp1 juta');
        <?php elseif ($penghasilan->penghasilan == 2) : ?>
            label_penghasilan.push('Rp1 - 1,5 juta');
        <?php elseif ($penghasilan->penghasilan == 3) : ?>
            label_penghasilan.push('Rp1,5 - 3 juta');
        <?php elseif ($penghasilan->penghasilan == 4) : ?>
            label_penghasilan.push('Rp3 - 5 juta');
        <?php elseif ($penghasilan->penghasilan == 5) : ?>
            label_penghasilan.push('Diatas Rp5 juta');
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
    var data_isi_bekerja = {
        labels: label_bekerja,
        datasets: [{
            label: 'Jumlah',
            borderWidth: 1,
            data: data_bekerja,
        }]
    }
    var data_isi_sesuaiilmu = {
        labels: label_sesuaiilmu,
        datasets: [{
            label: 'Jumlah',
            borderWidth: 1,
            data: data_sesuaiilmu
        }]
    }
    var data_isi_dapatkerja = {
        labels: label_dapatkerja,
        datasets: [{
            label: 'Jumlah',
            borderWidth: 1,
            data: data_dapatkerja
        }]
    }
    var data_isi_jenis = {
        labels: label_jenis,
        datasets: [{
            label: 'Jumlah',
            borderWidth: 1,
            data: data_jenis
        }]
    }
    var data_isi_status = {
        labels: label_status,
        datasets: [{
            label: 'Jumlah',
            borderWidth: 1,
            data: data_status
        }]
    }
    var data_isi_penghasilan = {
        labels: label_penghasilan,
        datasets: [{
            label: 'Jumlah',
            borderWidth: 1,
            data: data_penghasilan
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
    var chart_bekerja = new Chart('grafikbekerja', {
        type: 'pie',
        data: data_isi_bekerja,
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
    var chart_sesuaiilmu = new Chart('grafiksesuaiilmu', {
        type: 'pie',
        data: data_isi_sesuaiilmu,
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
    var chart_dapatkerja = new Chart('grafikdapatkerja', {
        type: 'pie',
        data: data_isi_dapatkerja,
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
    var chart_jenis = new Chart('grafikjenis', {
        type: 'bar',
        data: data_isi_jenis,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            locale: 'id-ID',
            plugins: {
                legend: {
                    display: false
                }
            },
            scale: {
                ticks: {
                    precision: 0
                }
            }
        }
    })
    var chart_status = new Chart('grafikstatus', {
        type: 'bar',
        data: data_isi_status,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            locale: 'id-ID',
            plugins: {
                legend: {
                    display: false
                }
            },
            scale: {
                ticks: {
                    precision: 0
                }
            }
        }
    })
    var chart_penghasilan = new Chart('grafikpenghasilan', {
        type: 'bar',
        data: data_isi_penghasilan,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            locale: 'id-ID',
            plugins: {
                legend: {
                    display: false
                }
            },
            scale: {
                ticks: {
                    precision: 0
                }
            }
        }
    })
</script>
<?= $this->endSection(); ?>