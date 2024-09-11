<?= $this->extend('dashboard/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kuesioner Anda</h1>
        <?php if (!empty($kuesioner)) : ?>
            <a class="btn btn-primary btn-sm bg-gradient" href="<?= base_url('/kuesioner/edit'); ?>" role="button"><i class="fa-solid fa-pen-to-square"></i> Edit Kuesioner</a>
        <?php endif; ?>
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
    <?php if (!empty($kuesioner)) : ?>
        <?php foreach ($kuesioner as $jawaban) : ?>
            <h3 class="display-6">Informasi Pribadi</h3>

            <!-- NAMA ALUMNI -->
            <div class="mb-3 row">
                <label for="nama_alumni" class="col-xl-3 col-form-label"><strong>Nama Alumni</strong></label>
                <div class="col-lg">
                    <input type="text" readonly class="form-control-plaintext" id="nama_alumni" name="nama_alumni" value="<?= $jawaban['nama_alumni']; ?>">
                </div>
            </div>

            <!-- NIM ALUMNI -->
            <div class="mb-3 row">
                <label for="nim_alumni" class="col-xl-3 col-form-label"><strong>Nomor Induk Mahasiswa</strong></label>
                <div class="col-lg">
                    <input type="number" readonly class="form-control-plaintext date" id="nim_alumni" name="nim_alumni" value="<?= $jawaban['nim_alumni']; ?>">
                </div>
            </div>

            <!-- ALAMAT -->
            <div class="mb-3 row">
                <label for="alamat_rumah" class="col-xl-3 col-form-label"><strong>Alamat Rumah</strong></label>
                <div class="col-lg">
                    <input type="text" readonly class="form-control-plaintext date" id="alamat_rumah" name="alamat_rumah" value="<?= $jawaban['alamat_rumah']; ?>">
                </div>
            </div>

            <!-- TANGGAL LULUS -->
            <div class="mb-3 row">
                <label for="tgl_lulus" class="col-xl-3 col-form-label"><strong>Tanggal Lulus</strong></label>
                <div class="col-lg">
                    <input type="text" readonly class="form-control-plaintext date" id="tgl_lulus" name="tgl_lulus" value="<?= strftime("%e %B %Y", strtotime($jawaban['tgl_lulus'])); ?>">
                </div>
            </div>

            <hr>
            <h3 class="display-6">Kontak</h3>

            <!-- NOMOR HP -->
            <div class="mb-3 row">
                <label for="nomor_hp" class="col-xl-3 col-form-label"><strong>Nomor HP</strong></label>
                <div class="col-lg">
                    <input type="text" readonly class="form-control-plaintext date" id="nomor_hp" name="nomor_hp" value="<?= ($jawaban['nomor_hp'] != NULL) ? '+' . $jawaban['nomor_hp'] : ''; ?>">
                </div>
            </div>

            <!-- EMAIL -->
            <div class="mb-3 row">
                <label for="email" class="col-xl-3 col-form-label"><strong>Email</strong></label>
                <div class="col-lg">
                    <input type="text" readonly class="form-control-plaintext date" id="email" name="email" value="<?= ($jawaban['email'] != NULL) ? $jawaban['email'] : ''; ?>">
                </div>
            </div>

            <hr>
            <h3 class="display-6">Kuesioner</h3>
            <h3>Data Utama</h3>
            <div class="row row-cols-1 row-cols-sm-2">
                <div class="col">
                    Tanggal Pengisian
                    <blockquote class="blockquote">
                        <?= strftime("%e %B %Y, %H.%M.%S", strtotime($jawaban['tgl_isi'])); ?>
                    </blockquote>
                </div>
                <div class="col">
                    Perubahan Terakhir
                    <blockquote class="blockquote">
                        <?= strftime("%e %B %Y, %H.%M.%S", strtotime($jawaban['tgl_ubah'])); ?>
                    </blockquote>
                </div>
                <div class="col">
                    Tahun masuk
                    <blockquote class="blockquote">
                        <?= $jawaban['thn_masuk']; ?>
                    </blockquote>
                </div>
                <div class="col">
                    Indeks Prestasi Kumulatif (IPK)
                    <blockquote class="blockquote">
                        <?= number_format($jawaban['ipk'], 2, ",", "."); ?>
                    </blockquote>
                </div>
            </div>
            <h3>Pekerjaan Saat Ini</h3>
            <div class="row row-cols-1 row-cols-sm-2">
                <div class="col">
                    Apakah saat ini Anda sudah bekerja?
                    <blockquote class="blockquote">
                        <?php if ($jawaban['bekerja'] == 0) : ?>
                            Belum
                        <?php elseif ($jawaban['bekerja'] == 1) : ?>
                            Sudah
                        <?php elseif ($jawaban['bekerja'] == 2) : ?>
                            Melanjutkan Kuliah
                        <?php endif; ?>
                    </blockquote>
                </div>
                <?php if ($jawaban['bekerja'] == 1) : ?>
                    <div class="col">
                        Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang?
                        <blockquote class="blockquote">
                            <?= $jawaban['jenis']; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Nama Kantor
                        <blockquote class="blockquote">
                            <?= $jawaban['nama_kantor']; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Nama Pimpinan
                        <blockquote class="blockquote">
                            <?= $jawaban['nama_pimpinan']; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Email Pimpinan
                        <blockquote class="blockquote">
                            <a href="mailto:<?= $jawaban['email_pimpinan']; ?>" class="text-decoration-none" target="_blank"><?= $jawaban['email_pimpinan']; ?></a>
                        </blockquote>
                    </div>
                    <div class="col">
                        Pekerjaan saat ini bergerak dibidang?
                        <blockquote class="blockquote">
                            <?= $jawaban['bidang']; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Tahun mulai bekerja
                        <blockquote class="blockquote">
                            <?= $jawaban['thn_mulai_kerja']; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        No.Telpon/HP Pimpinan
                        <blockquote class="blockquote">
                            <?php if (!empty($jawaban['no_telp_pimpinan'])) : ?>
                                <a href="tel:<?= $jawaban['no_telp_pimpinan']; ?>" class="text-decoration-none" target="_blank">+<?= $jawaban['no_telp_pimpinan']; ?></a>
                            <?php else : ?>
                                Tidak ada
                            <?php endif; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Website kantor
                        <blockquote class="blockquote">
                            <?php if (!empty($jawaban['website_kantor'])) : ?>
                                <a href="<?= $jawaban['website_kantor']; ?>" class="text-decoration-none" target="_blank"><?= $jawaban['website_kantor']; ?></a>
                            <?php else : ?>
                                Tidak ada
                            <?php endif; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Alamat kantor/Perusahaan
                        <blockquote class="blockquote">
                            <?= $jawaban['alamat_kantor']; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Penghasilan per bulan saat ini?
                        <blockquote class="blockquote">
                            <?php if ($jawaban['penghasilan'] == 1) : ?>
                                Dibawah Rp1.000.000
                            <?php elseif ($jawaban['penghasilan'] == 2) : ?>
                                Antara Rp1.000.000,- - Rp1.500.000,-
                            <?php elseif ($jawaban['penghasilan'] == 3) : ?>
                                Antara Rp1.500.000,- - Rp3.000.000,-
                            <?php elseif ($jawaban['penghasilan'] == 4) : ?>
                                Antara Rp3.000.000,- - Rp5.000.000,-
                            <?php elseif ($jawaban['penghasilan'] == 5) : ?>
                                Diatas Rp5.000.000,-
                            <?php endif; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Status Pekerjaan
                        <blockquote class="blockquote">
                            <?php if ($jawaban['status'] == 1) : ?>
                                PNS
                            <?php elseif ($jawaban['status'] == 2) : ?>
                                Pegawai Kontrak
                            <?php elseif ($jawaban['status'] == 3) : ?>
                                Honorer
                            <?php elseif ($jawaban['status'] == 4) : ?>
                                Direktur
                            <?php elseif ($jawaban['status'] == 5) : ?>
                                Manajer
                            <?php elseif ($jawaban['status'] == 6) : ?>
                                Staff
                            <?php elseif ($jawaban['status'] == 7) : ?>
                                Magang
                            <?php endif; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Menurut Anda apakah pekerjaan Anda saat ini berhubungan dengan program studi Anda?
                        <blockquote class="blockquote">
                            <?php if ($jawaban['sesuai_ilmu'] == 1) : ?>
                                Rendah
                            <?php elseif ($jawaban['sesuai_ilmu'] == 2) : ?>
                                Sedang
                            <?php elseif ($jawaban['sesuai_ilmu'] == 3) : ?>
                                Tinggi
                            <?php endif; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Kapan Anda mendapatkan pekerjaan saat ini?
                        <blockquote class="blockquote">
                            <?php if ($jawaban['dapat_kerja'] == 1) : ?>
                                Dibawah 3 bulan setelah lulus kuliah
                            <?php elseif ($jawaban['dapat_kerja'] == 2) : ?>
                                3 - 6 bulan setelah lulus kuliah
                            <?php elseif ($jawaban['dapat_kerja'] == 3) : ?>
                                6 - 18 bulan setelah lulus kuliah
                            <?php elseif ($jawaban['dapat_kerja'] == 4) : ?>
                                Diatas 18 bulan setelah lulus kuliah
                            <?php endif; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?
                        <blockquote class="blockquote">
                            <?php if ($jawaban['tingkat_pendidikan'] == 1) : ?>
                                Setingkat lebih tinggi
                            <?php elseif ($jawaban['tingkat_pendidikan'] == 2) : ?>
                                Tingkat yang sama
                            <?php elseif ($jawaban['tingkat_pendidikan'] == 3) : ?>
                                Setingkat lebih rendah
                            <?php elseif ($jawaban['tingkat_pendidikan'] == 4) : ?>
                                Tidak perlu pendidikan tinggi
                            <?php endif; ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        Apakah ini pekerjaan pertama setelah lulus?
                        <blockquote class="blockquote">
                            <?php if ($jawaban['kerja_stlh_lulus'] == 0) : ?>
                                Tidak
                            <?php elseif ($jawaban['kerja_stlh_lulus'] == 1) : ?>
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
                        <?php if ($jawaban['tempat_tinggal'] == 0) : ?>
                            Lainnya
                        <?php elseif ($jawaban['tempat_tinggal'] == 1) : ?>
                            Sendiri
                        <?php elseif ($jawaban['tempat_tinggal'] == 2) : ?>
                            Bersama Orang Tua
                        <?php elseif ($jawaban['tempat_tinggal'] == 3) : ?>
                            Bersama Saudara
                        <?php endif; ?>
                    </blockquote>
                </div>
                <div class="col">
                    Siapa yang terutama membayar uang kuliah Anda?
                    <blockquote class="blockquote">
                        <?php if ($jawaban['uang_kuliah'] == 0) : ?>
                            Lainnya
                        <?php elseif ($jawaban['uang_kuliah'] == 1) : ?>
                            Beasiswa
                        <?php elseif ($jawaban['uang_kuliah'] == 2) : ?>
                            Sebagian Beasiswa
                        <?php elseif ($jawaban['uang_kuliah'] == 3) : ?>
                            Orang Tua / Keluarga
                        <?php elseif ($jawaban['uang_kuliah'] == 4) : ?>
                            Biaya Sendiri
                        <?php endif; ?>
                    </blockquote>
                </div>
                <div class="col">
                    Selama kuliah, apakah Anda menjadi anggota dari suatu organisasi baik di dalam atau di luar kampus?
                    <blockquote class="blockquote">
                        <?php if ($jawaban['anggota_org'] == 0) : ?>
                            Tidak
                        <?php elseif ($jawaban['anggota_org'] == 1) : ?>
                            Ya
                        <?php endif; ?>
                    </blockquote>
                </div>
                <div class="col">
                    Seberapa aktif Anda di organisasi tersebut?
                    <blockquote class="blockquote">
                        <?php if ($jawaban['aktif_org'] == 1) : ?>
                            Pasif
                        <?php elseif ($jawaban['aktif_org'] == 2) : ?>
                            Cukup Aktif
                        <?php elseif ($jawaban['aktif_org'] == 3) : ?>
                            Sedang
                        <?php elseif ($jawaban['aktif_org'] == 4) : ?>
                            Aktif
                        <?php elseif ($jawaban['aktif_org'] == 5) : ?>
                            Sangat Aktif
                        <?php else : ?>
                            Tidak ada
                        <?php endif; ?>
                    </blockquote>
                </div>
                <div class="col">
                    Pada saat Anda kuliah di perguruan tinggi, apakah Anda mengambil kursus atau pendidikan tambahan?
                    <blockquote class="blockquote">
                        <?php if ($jawaban['ikut_kursus'] == 0) : ?>
                            Tidak
                        <?php elseif ($jawaban['ikut_kursus'] == 1) : ?>
                            Ya
                        <?php endif; ?>
                    </blockquote>
                </div>
                <div class="col">
                    Kursus apa yang anda ambil untuk pendidikan tambahan?
                    <blockquote class="blockquote">
                        <?= ($jawaban['kursus'] == NULL) ? 'Tidak ada' : $jawaban['kursus']; ?>
                    </blockquote>
                </div>
            </div>
            <div>
                Saran, kesan, dan komentar untuk pengembangan Program Studi Sistem Informasi
                <blockquote class="blockquote">
                    <?= ($jawaban['saran'] == NULL) ? 'Tidak ada' : $jawaban['saran']; ?>
                </blockquote>
            </div>

            <hr>
            <div class="d-grid gap-2 mb-3">
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete" class="btn btn-danger btn-lg bg-gradient" onclick="$('#modal-delete #delete').attr('action', '<?= base_url('/kuesioner/delete/' . $jawaban['id_kuesioner']); ?>')"><i class="fa-solid fa-trash"></i> Hapus</button>
            </div>
            <div class="modal modal-sheet p-4 py-md-5 fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-2 bg-gradient-header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25)!important;">
                        <div class="modal-body p-4 text-center">
                            <h5>Hapus Kuesioner Anda?</h5>
                            <span>Anda harus mengisi ulang kuesioner Anda setelah menghapus kuesioner ini.</span>
                        </div>
                        <form class="modal-footer flex-nowrap p-0" id="delete" action="<?= base_url('/kuesioner/delete/' . $jawaban['id_kuesioner']); ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">Ya</button>
                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">Tidak</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="alert alert-info bg-gradient-header" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
                <div class="w-100 ms-3">
                    Klik "Isi Kuesioner" untuk memulai pengisian kuesioner"
                </div>
            </div>
        </div>
        <div class="d-grid gap-2">
            <a class="btn btn-primary btn-lg bg-gradient" href="<?= base_url('/kuesioner/create'); ?>" role="button"><i class="fa-solid fa-list-check"></i> Isi Kuesioner</a>
        </div>
    <?php endif; ?>
</main>
</div>
</div>
<?= $this->endSection(); ?>