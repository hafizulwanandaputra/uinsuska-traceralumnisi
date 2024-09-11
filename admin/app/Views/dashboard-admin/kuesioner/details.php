<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/kuesioner-admin'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2"><?= $kuesioner['nama_alumni']; ?></h1>
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
    <h3 class="display-6">Informasi Pribadi</h3>

    <!-- NAMA ALUMNI -->
    <div class="mb-3 row">
        <label for="nama_alumni" class="col-xl-3 col-form-label"><strong>Nama Alumni</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext" id="nama_alumni" name="nama_alumni" value="<?= $kuesioner['nama_alumni']; ?>">
        </div>
    </div>

    <!-- NIM ALUMNI -->
    <div class="mb-3 row">
        <label for="nim_alumni" class="col-xl-3 col-form-label"><strong>Nomor Induk Mahasiswa</strong></label>
        <div class="col-lg">
            <input type="number" readonly class="form-control-plaintext date" id="nim_alumni" name="nim_alumni" value="<?= $kuesioner['nim_alumni']; ?>">
        </div>
    </div>

    <!-- ALAMAT -->
    <div class="mb-3 row">
        <label for="alamat_rumah" class="col-xl-3 col-form-label"><strong>Alamat Rumah</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext date" id="alamat_rumah" name="alamat_rumah" value="<?= $kuesioner['alamat_rumah']; ?>">
        </div>
    </div>

    <!-- TANGGAL LULUS -->
    <div class="mb-3 row">
        <label for="tgl_lulus" class="col-xl-3 col-form-label"><strong>Tanggal Lulus</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext date" id="tgl_lulus" name="tgl_lulus" value="<?= strftime("%e %B %Y", strtotime($kuesioner['tgl_lulus'])); ?>">
        </div>
    </div>

    <hr>
    <h3 class="display-6">Kontak</h3>

    <!-- NOMOR HP -->
    <div class="mb-3 row">
        <label for="nomor_hp" class="col-xl-3 col-form-label"><strong>Nomor HP</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext date" id="nomor_hp" name="nomor_hp" value="<?= ($kuesioner['nomor_hp'] != NULL) ? '+' . $kuesioner['nomor_hp'] : ''; ?>">
        </div>
    </div>

    <!-- EMAIL -->
    <div class="mb-3 row">
        <label for="email" class="col-xl-3 col-form-label"><strong>Email</strong></label>
        <div class="col-lg">
            <input type="text" readonly class="form-control-plaintext date" id="email" name="email" value="<?= ($kuesioner['email'] != NULL) ? $kuesioner['email'] : ''; ?>">
        </div>
    </div>

    <hr>
    <h3 class="display-6">Kuesioner</h3>
    <h3>Data Utama</h3>
    <div class="row row-cols-1 row-cols-sm-2">
        <div class="col">
            Tanggal Pengisian
            <blockquote class="blockquote">
                <?= strftime("%e %B %Y, %H.%M.%S", strtotime($kuesioner['tgl_isi'])); ?>
            </blockquote>
        </div>
        <div class="col">
            Perubahan Terakhir
            <blockquote class="blockquote">
                <?= strftime("%e %B %Y, %H.%M.%S", strtotime($kuesioner['tgl_ubah'])); ?>
            </blockquote>
        </div>
        <div class="col">
            Tahun masuk
            <blockquote class="blockquote">
                <?= $kuesioner['thn_masuk']; ?>
            </blockquote>
        </div>
        <div class="col">
            Indeks Prestasi Kumulatif (IPK)
            <blockquote class="blockquote">
                <?= number_format($kuesioner['ipk'], 2, ",", "."); ?>
            </blockquote>
        </div>
    </div>
    <h3>Pekerjaan Saat Ini</h3>
    <div class="row row-cols-1 row-cols-sm-2">
        <div class="col">
            Apakah saat ini Anda sudah bekerja?
            <blockquote class="blockquote">
                <?php if ($kuesioner['bekerja'] == 0) : ?>
                    Belum
                <?php elseif ($kuesioner['bekerja'] == 1) : ?>
                    Sudah
                <?php elseif ($kuesioner['bekerja'] == 2) : ?>
                    Melanjutkan Kuliah
                <?php endif; ?>
            </blockquote>
        </div>
        <?php if ($kuesioner['bekerja'] == 1) : ?>
            <div class="col">
                Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang?
                <blockquote class="blockquote">
                    <?= $kuesioner['jenis']; ?>
                </blockquote>
            </div>
            <div class="col">
                Nama Kantor
                <blockquote class="blockquote">
                    <?= $kuesioner['nama_kantor']; ?>
                </blockquote>
            </div>
            <div class="col">
                Nama Pimpinan
                <blockquote class="blockquote">
                    <?= $kuesioner['nama_pimpinan']; ?>
                </blockquote>
            </div>
            <div class="col">
                Email Pimpinan
                <blockquote class="blockquote">
                    <a href="mailto:<?= $kuesioner['email_pimpinan']; ?>" class="text-decoration-none" target="_blank"><?= $kuesioner['email_pimpinan']; ?></a>
                </blockquote>
            </div>
            <div class="col">
                Pekerjaan saat ini bergerak dibidang?
                <blockquote class="blockquote">
                    <?= $kuesioner['bidang']; ?>
                </blockquote>
            </div>
            <div class="col">
                Tahun mulai bekerja
                <blockquote class="blockquote">
                    <?= $kuesioner['thn_mulai_kerja']; ?>
                </blockquote>
            </div>
            <div class="col">
                No.Telpon/HP Pimpinan
                <blockquote class="blockquote">
                    <?php if (!empty($kuesioner['no_telp_pimpinan'])) : ?>
                        <a href="tel:<?= $kuesioner['no_telp_pimpinan']; ?>" class="text-decoration-none" target="_blank">+<?= $kuesioner['no_telp_pimpinan']; ?></a>
                    <?php else : ?>
                        Tidak ada
                    <?php endif; ?>
                </blockquote>
            </div>
            <div class="col">
                Website kantor
                <blockquote class="blockquote">
                    <?php if (!empty($kuesioner['website_kantor'])) : ?>
                        <a href="<?= $kuesioner['website_kantor']; ?>" class="text-decoration-none" target="_blank"><?= $kuesioner['website_kantor']; ?></a>
                    <?php else : ?>
                        Tidak ada
                    <?php endif; ?>
                </blockquote>
            </div>
            <div class="col">
                Alamat kantor/Perusahaan
                <blockquote class="blockquote">
                    <?= $kuesioner['alamat_kantor']; ?>
                </blockquote>
            </div>
            <div class="col">
                Penghasilan per bulan saat ini?
                <blockquote class="blockquote">
                    <?php if ($kuesioner['penghasilan'] == 1) : ?>
                        Dibawah Rp1.000.000
                    <?php elseif ($kuesioner['penghasilan'] == 2) : ?>
                        Antara Rp1.000.000,- - Rp1.500.000,-
                    <?php elseif ($kuesioner['penghasilan'] == 3) : ?>
                        Antara Rp1.500.000,- - Rp3.000.000,-
                    <?php elseif ($kuesioner['penghasilan'] == 4) : ?>
                        Antara Rp3.000.000,- - Rp5.000.000,-
                    <?php elseif ($kuesioner['penghasilan'] == 5) : ?>
                        Diatas Rp5.000.000,-
                    <?php endif; ?>
                </blockquote>
            </div>
            <div class="col">
                Status Pekerjaan
                <blockquote class="blockquote">
                    <?php if ($kuesioner['status'] == 1) : ?>
                        PNS
                    <?php elseif ($kuesioner['status'] == 2) : ?>
                        Pegawai Kontrak
                    <?php elseif ($kuesioner['status'] == 3) : ?>
                        Honorer
                    <?php elseif ($kuesioner['status'] == 4) : ?>
                        Direktur
                    <?php elseif ($kuesioner['status'] == 5) : ?>
                        Manajer
                    <?php elseif ($kuesioner['status'] == 6) : ?>
                        Staff
                    <?php elseif ($kuesioner['status'] == 7) : ?>
                        Magang
                    <?php endif; ?>
                </blockquote>
            </div>
            <div class="col">
                Menurut Anda apakah pekerjaan Anda saat ini berhubungan dengan program studi Anda?
                <blockquote class="blockquote">
                    <?php if ($kuesioner['sesuai_ilmu'] == 1) : ?>
                        Rendah
                    <?php elseif ($kuesioner['sesuai_ilmu'] == 2) : ?>
                        Sedang
                    <?php elseif ($kuesioner['sesuai_ilmu'] == 3) : ?>
                        Tinggi
                    <?php endif; ?>
                </blockquote>
            </div>
            <div class="col">
                Kapan Anda mendapatkan pekerjaan saat ini?
                <blockquote class="blockquote">
                    <?php if ($kuesioner['dapat_kerja'] == 1) : ?>
                        Dibawah 3 bulan setelah lulus kuliah
                    <?php elseif ($kuesioner['dapat_kerja'] == 2) : ?>
                        3 - 6 bulan setelah lulus kuliah
                    <?php elseif ($kuesioner['dapat_kerja'] == 3) : ?>
                        6 - 18 bulan setelah lulus kuliah
                    <?php elseif ($kuesioner['dapat_kerja'] == 4) : ?>
                        Diatas 18 bulan setelah lulus kuliah
                    <?php endif; ?>
                </blockquote>
            </div>
            <div class="col">
                Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?
                <blockquote class="blockquote">
                    <?php if ($kuesioner['tingkat_pendidikan'] == 1) : ?>
                        Setingkat lebih tinggi
                    <?php elseif ($kuesioner['tingkat_pendidikan'] == 2) : ?>
                        Tingkat yang sama
                    <?php elseif ($kuesioner['tingkat_pendidikan'] == 3) : ?>
                        Setingkat lebih rendah
                    <?php elseif ($kuesioner['tingkat_pendidikan'] == 4) : ?>
                        Tidak perlu pendidikan tinggi
                    <?php endif; ?>
                </blockquote>
            </div>
            <div class="col">
                Apakah ini pekerjaan pertama setelah lulus?
                <blockquote class="blockquote">
                    <?php if ($kuesioner['kerja_stlh_lulus'] == 0) : ?>
                        Tidak
                    <?php elseif ($kuesioner['kerja_stlh_lulus'] == 1) : ?>
                        Ya
                    <?php endif; ?>
                </blockquote>
            </div>
        <?php endif; ?>
    </div>
    <h3>Kegiatan Pendidikan dan Pengalaman Pembelajaran</h3>
    <div class="row row-cols-1 row-cols-sm-2">
        <div class="col">
            Selama kuliah, kebanyakan Anda tinggal di?
            <blockquote class="blockquote">
                <?php if ($kuesioner['tempat_tinggal'] == 0) : ?>
                    Lainnya
                <?php elseif ($kuesioner['tempat_tinggal'] == 1) : ?>
                    Sendiri
                <?php elseif ($kuesioner['tempat_tinggal'] == 2) : ?>
                    Bersama Orang Tua
                <?php elseif ($kuesioner['tempat_tinggal'] == 3) : ?>
                    Bersama Saudara
                <?php endif; ?>
            </blockquote>
        </div>
        <div class="col">
            Siapa yang terutama membayar uang kuliah Anda?
            <blockquote class="blockquote">
                <?php if ($kuesioner['uang_kuliah'] == 0) : ?>
                    Lainnya
                <?php elseif ($kuesioner['uang_kuliah'] == 1) : ?>
                    Beasiswa
                <?php elseif ($kuesioner['uang_kuliah'] == 2) : ?>
                    Sebagian Beasiswa
                <?php elseif ($kuesioner['uang_kuliah'] == 3) : ?>
                    Orang Tua / Keluarga
                <?php elseif ($kuesioner['uang_kuliah'] == 4) : ?>
                    Biaya Sendiri
                <?php endif; ?>
            </blockquote>
        </div>
        <div class="col">
            Selama kuliah, apakah Anda menjadi anggota dari suatu organisasi baik di dalam atau di luar kampus?
            <blockquote class="blockquote">
                <?php if ($kuesioner['anggota_org'] == 0) : ?>
                    Tidak
                <?php elseif ($kuesioner['anggota_org'] == 1) : ?>
                    Ya
                <?php endif; ?>
            </blockquote>
        </div>
        <div class="col">
            Seberapa aktif Anda di organisasi tersebut?
            <blockquote class="blockquote">
                <?php if ($kuesioner['aktif_org'] == 1) : ?>
                    Pasif
                <?php elseif ($kuesioner['aktif_org'] == 2) : ?>
                    Cukup Aktif
                <?php elseif ($kuesioner['aktif_org'] == 3) : ?>
                    Sedang
                <?php elseif ($kuesioner['aktif_org'] == 4) : ?>
                    Aktif
                <?php elseif ($kuesioner['aktif_org'] == 5) : ?>
                    Sangat Aktif
                <?php else : ?>
                    Tidak ada
                <?php endif; ?>
            </blockquote>
        </div>
        <div class="col">
            Pada saat Anda kuliah di perguruan tinggi, apakah Anda mengambil kursus atau pendidikan tambahan?
            <blockquote class="blockquote">
                <?php if ($kuesioner['ikut_kursus'] == 0) : ?>
                    Tidak
                <?php elseif ($kuesioner['ikut_kursus'] == 1) : ?>
                    Ya
                <?php endif; ?>
            </blockquote>
        </div>
        <div class="col">
            Kursus apa yang anda ambil untuk pendidikan tambahan?
            <blockquote class="blockquote">
                <?= ($kuesioner['kursus'] == NULL) ? 'Tidak ada' : $kuesioner['kursus']; ?>
            </blockquote>
        </div>
    </div>
    <div>
        Saran, kesan, dan komentar untuk pengembangan Program Studi Sistem Informasi
        <blockquote class="blockquote">
            <?= ($kuesioner['saran'] == NULL) ? 'Tidak ada' : $kuesioner['saran']; ?>
        </blockquote>
    </div>

    <hr>
    <div class="d-grid gap-2 mb-3">
        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete" class="btn btn-danger btn-lg bg-gradient" onclick="$('#modal-delete #delete').attr('action', '<?= base_url('/kuesioner-admin/delete/' . $kuesioner['id_kuesioner']); ?>')"><i class="fa-solid fa-trash"></i> Hapus Kuesioner</button>
    </div>
    <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                <div class="modal-body p-4 text-center">
                    <h5 class="mb-0">Hapus Kuesioner dari "<?= $kuesioner['nama_alumni']; ?>"?</h5>
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