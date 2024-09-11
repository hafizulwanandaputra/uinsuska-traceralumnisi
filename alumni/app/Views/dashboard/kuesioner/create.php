<?= $this->extend('dashboard/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/kuesioner'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2">Isi Kuesioner</h1>
    </div>

    <?= form_open_multipart('/kuesioner/save'); ?>
    <?= csrf_field(); ?>

    <h3 class="display-6">Data Pribadi</h3>

    <!-- Nomor HP -->
    <div class="mb-3">
        <label for="nomor_hp" class="form-label">Nomor HP*</label>
        <select class="form-select <?= (validation_show_error('nomor_hp')) ? 'is-invalid' : ''; ?>" id="nomor_hp" name="nomor_hp" aria-label="Nomor HP">
            <option value="">-- Pilih Nomor HP --</option>
            <?php if (session()->get('nomor_hp') != NULL) : ?>
                <option value="<?= session()->get('nomor_hp'); ?>" <?= (old('nomor_hp') == session()->get('nomor_hp')) ? 'selected' : ''; ?>>+<?= session()->get('nomor_hp'); ?></option>
            <?php endif; ?>
            <?php if (session()->get('nomor_hp_2') != NULL) : ?>
                <option value="<?= session()->get('nomor_hp_2'); ?>" <?= (old('nomor_hp') == session()->get('nomor_hp_2')) ? 'selected' : ''; ?>>+<?= session()->get('nomor_hp_2'); ?></option>
            <?php endif; ?>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('nomor_hp'); ?>
        </div>
    </div>

    <!-- TAHUN MASUK -->
    <div class="mb-3">
        <label for="thn_masuk" class="form-label">Tahun Masuk*</label>
        <input type="number" min="0" class="form-control <?= (validation_show_error('thn_masuk')) ? 'is-invalid' : ''; ?>" id="thn_masuk" name="thn_masuk" value="<?= old('thn_masuk'); ?>" autocomplete="off" placeholder="YYYY">
        <div class="invalid-feedback">
            <?= validation_show_error('thn_masuk'); ?>
        </div>
    </div>

    <!-- IPK -->
    <div class="mb-3">
        <label for="ipk" class="form-label">IPK*</label>
        <input type="number" min="0" max="4" step="any" class="form-control <?= (validation_show_error('ipk')) ? 'is-invalid' : ''; ?>" id="ipk" name="ipk" value="<?= old('ipk'); ?>" autocomplete="off" placeholder="Indeks Prestasi Kumulatif (0.00-4.00)">
        <div class="invalid-feedback">
            <?= validation_show_error('ipk'); ?>
        </div>
    </div>
    <hr>
    <h3 class="display-6">Pekerjaan Saat Ini</h3>

    <!-- BEKERJA -->
    <div class="mb-3">
        <label for="bekerja" class="col-xl-3 col-form-label">Apakah saat ini anda sudah bekerja?*<br><small>Form di bawah akan muncul ketika memilih "Sudah"</small></label>
        <div class="col-lg">
            <select class="form-select <?= (validation_show_error('bekerja')) ? 'is-invalid' : ''; ?>" id="bekerja" name="bekerja" aria-label="Apakah saat ini anda sudah bekerja?">
                <option value="">-- Pilih --</option>
                <option value="0" <?= (old('bekerja') == '0') ? 'selected' : ''; ?>>Belum</option>
                <option value="1" <?= (old('bekerja') == '1') ? 'selected' : ''; ?>>Sudah</option>
                <option value="2" <?= (old('bekerja') == '2') ? 'selected' : ''; ?>>Melanjutkan Kuliah</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error('bekerja'); ?>
            </div>
        </div>
    </div>

    <div id="hidden_div" style="<?= (old('bekerja') == '1') ? 'display: block;' : 'display: none;'; ?>">
        <!-- JENIS -->
        <div class="mb-3">
            <label for="jenis" class="form-label">Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang?*</label>
            <input type="text" class="form-control <?= (validation_show_error('jenis')) ? 'is-invalid' : ''; ?>" id="jenis" name="jenis" value="<?= old('jenis'); ?>" autocomplete="off" placeholder="menggunakan Datalist" list="listJenis">
            <datalist id="listJenis">
                <option value="Instansi pemerintah ">
                <option value="BUMN multinasional (ex: pertamina, telkom, dll)">
                <option value="BUMN nasional (ex: PT.Hutama Karya, PT.Berdikari, dll)">
                <option value="Organisasi non-profit/Lembaga Swadaya Masyarakat ">
                <option value="Perusahaan Swasta Multinasional (ex: Microsoft, Danone, dll)">
                <option value="Perusahaan Swasta Nasional (ex: PT.Sampoerna, Unilever, dll)">
                <option value="Wiraswasta/perusahaan sendiri">
            </datalist>
            <div class="invalid-feedback">
                <?= validation_show_error('jenis'); ?>
            </div>
        </div>

        <!-- NAMA KANTOR -->
        <div class="mb-3">
            <label for="nama_kantor" class="form-label">Nama Kantor*</label>
            <input type="text" class="form-control <?= (validation_show_error('nama_kantor')) ? 'is-invalid' : ''; ?>" id="nama_kantor" name="nama_kantor" value="<?= old('nama_kantor'); ?>" autocomplete="off" placeholder="Wajib diisi jika sudah bekerja">
            <div class="invalid-feedback">
                <?= validation_show_error('nama_kantor'); ?>
            </div>
        </div>

        <!-- NAMA PIMPINAN -->
        <div class="mb-3">
            <label for="nama_pimpinan" class="form-label">Nama Pimpinan*</label>
            <input type="text" class="form-control <?= (validation_show_error('nama_pimpinan')) ? 'is-invalid' : ''; ?>" id="nama_pimpinan" name="nama_pimpinan" value="<?= old('nama_pimpinan'); ?>" autocomplete="off" placeholder="Wajib diisi jika sudah bekerja">
            <div class="invalid-feedback">
                <?= validation_show_error('nama_pimpinan'); ?>
            </div>
        </div>

        <!-- EMAIL PIMPINAN -->
        <div class="mb-3">
            <label for="email_pimpinan" class="form-label">Email Pimpinan*</label>
            <input type="email" class="form-control <?= (validation_show_error('email_pimpinan')) ? 'is-invalid' : ''; ?>" id="email_pimpinan" name="email_pimpinan" value="<?= old('email_pimpinan'); ?>" autocomplete="off" placeholder="Wajib diisi jika sudah bekerja">
            <div class="invalid-feedback">
                <?= validation_show_error('email_pimpinan'); ?>
            </div>
        </div>

        <!-- BIDANG -->
        <div class="mb-3">
            <label for="bidang" class="form-label">Pekerjaan saat ini bergerak dibidang?*</label>
            <input type="text" class="form-control <?= (validation_show_error('bidang')) ? 'is-invalid' : ''; ?>" id="bidang" name="bidang" value="<?= old('bidang'); ?>" autocomplete="off" placeholder="Wajib diisi jika sudah bekerja">
            <div class="invalid-feedback">
                <?= validation_show_error('bidang'); ?>
            </div>
        </div>

        <!-- TAHUN MULAI KERJA -->
        <div class="mb-3">
            <label for="thn_mulai_kerja" class="form-label">Tahun mulai bekerja*</label>
            <input type="number" min="0" class="form-control <?= (validation_show_error('thn_mulai_kerja')) ? 'is-invalid' : ''; ?>" id="thn_mulai_kerja" name="thn_mulai_kerja" value="<?= old('thn_mulai_kerja'); ?>" autocomplete="off" placeholder="Wajib diisi jika sudah bekerja">
            <div class="invalid-feedback">
                <?= validation_show_error('thn_mulai_kerja'); ?>
            </div>
        </div>

        <!-- NOMOR TELEPON PIMPINAN -->
        <div class="mb-3">
            <label for="no_telp_pimpinan" class="form-label">No.Telpon/HP Pimpinan</label>
            <div class="input-group">
                <span class="input-group-text bg-gradient">+</span>
                <input type="number" class="form-control nomor" id="no_telp_pimpinan" name="no_telp_pimpinan" value="<?= old('no_telp_pimpinan'); ?>" autocomplete="off" placeholder="Contoh: 62812345678987">
            </div>
        </div>

        <!-- WEBSITE KANTOR -->
        <div class="mb-3">
            <label for="website_kantor" class="form-label">Website kantor</label>
            <input type="text" class="form-control" id="website_kantor" name="website_kantor" value="<?= old('website_kantor'); ?>" autocomplete="off">
        </div>

        <!-- ALAMAT KANTOR -->
        <div class="mb-3">
            <label for="alamat_kantor" class="form-label">Alamat kantor/Perusahaan*</label>
            <input type="text" class="form-control <?= (validation_show_error('alamat_kantor')) ? 'is-invalid' : ''; ?>" id="alamat_kantor" name="alamat_kantor" value="<?= old('alamat_kantor'); ?>" autocomplete="off" placeholder="Wajib diisi jika sudah bekerja">
            <div class="invalid-feedback">
                <?= validation_show_error('alamat_kantor'); ?>
            </div>
        </div>

        <!-- PENGHASILAN -->
        <div class="mb-3">
            <label for="penghasilan" class="form-label">Penghasilan per bulan saat ini?*</label>
            <select class="form-select <?= (validation_show_error('penghasilan')) ? 'is-invalid' : ''; ?>" id="penghasilan" name="penghasilan" aria-label="Penghasilan per bulan saat ini?">
                <option value="">-- Pilih --</option>
                <option value="1" <?= (old('penghasilan') == '1') ? 'selected' : ''; ?>>Dibawah Rp1.000.000</option>
                <option value="2" <?= (old('penghasilan') == '2') ? 'selected' : ''; ?>>Antara Rp1.000.000,- - Rp1.500.000,-</option>
                <option value="3" <?= (old('penghasilan') == '3') ? 'selected' : ''; ?>>Antara Rp1.500.000,- - Rp3.000.000,-</option>
                <option value="4" <?= (old('penghasilan') == '4') ? 'selected' : ''; ?>>Antara Rp3.000.000,- - Rp5.000.000,-</option>
                <option value="5" <?= (old('penghasilan') == '5') ? 'selected' : ''; ?>>Diatas Rp5.000.000,-</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error('penghasilan'); ?>
            </div>
        </div>

        <!-- STATUS -->
        <div class="mb-3">
            <label for="status" class="form-label">Status Pekerjaan*</label>
            <select class="form-select <?= (validation_show_error('status')) ? 'is-invalid' : ''; ?>" id="status" name="status" aria-label="Status Pekerjaan">
                <option value="">-- Pilih --</option>
                <option value="1" <?= (old('status') == '1') ? 'selected' : ''; ?>>PNS</option>
                <option value="2" <?= (old('status') == '2') ? 'selected' : ''; ?>>Pegawai Kontrak</option>
                <option value="3" <?= (old('status') == '3') ? 'selected' : ''; ?>>Honorer</option>
                <option value="4" <?= (old('status') == '4') ? 'selected' : ''; ?>>Direktur</option>
                <option value="5" <?= (old('status') == '5') ? 'selected' : ''; ?>>Manajer</option>
                <option value="6" <?= (old('status') == '6') ? 'selected' : ''; ?>>Staff</option>
                <option value="7" <?= (old('status') == '7') ? 'selected' : ''; ?>>Magang</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error('status'); ?>
            </div>
        </div>

        <!-- SESUAI ILMU -->
        <div class="mb-3">
            <label for="sesuai_ilmu" class="form-label">Menurut Anda apakah pekerjaan Anda saat ini berhubungan dengan program studi Anda?*</label>
            <select class="form-select <?= (validation_show_error('sesuai_ilmu')) ? 'is-invalid' : ''; ?>" id="sesuai_ilmu" name="sesuai_ilmu" aria-label="Menurut Anda apakah pekerjaan Anda saat ini berhubungan dengan program studi Anda?">
                <option value="">-- Pilih --</option>
                <option value="1" <?= (old('sesuai_ilmu') == '1') ? 'selected' : ''; ?>>Rendah</option>
                <option value="2" <?= (old('sesuai_ilmu') == '2') ? 'selected' : ''; ?>>Sedang</option>
                <option value="3" <?= (old('sesuai_ilmu') == '3') ? 'selected' : ''; ?>>Tinggi</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error('sesuai_ilmu'); ?>
            </div>
        </div>

        <!-- DAPAT KERJA -->
        <div class="mb-3">
            <label for="dapat_kerja" class="form-label">Kapan Anda mendapatkan pekerjaan saat ini?*</label>
            <select class="form-select <?= (validation_show_error('dapat_kerja')) ? 'is-invalid' : ''; ?>" id="dapat_kerja" name="dapat_kerja" aria-label="Kapan Anda mendapatkan pekerjaan saat ini?">
                <option value="">-- Pilih --</option>
                <option value="1" <?= (old('dapat_kerja') == '1') ? 'selected' : ''; ?>>Dibawah 3 bulan setelah lulus kuliah</option>
                <option value="2" <?= (old('dapat_kerja') == '2') ? 'selected' : ''; ?>>3 - 6 bulan setelah lulus kuliah</option>
                <option value="3" <?= (old('dapat_kerja') == '3') ? 'selected' : ''; ?>>6 - 18 bulan setelah lulus kuliah</option>
                <option value="4" <?= (old('dapat_kerja') == '4') ? 'selected' : ''; ?>>Diatas 18 bulan setelah lulus kuliah</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error('dapat_kerja'); ?>
            </div>
        </div>

        <!-- TINGKAT PENDIDIKAN -->
        <div class="mb-3">
            <label for="tingkat_pendidikan" class="form-label">Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?*</label>
            <select class="form-select <?= (validation_show_error('tingkat_pendidikan')) ? 'is-invalid' : ''; ?>" id="tingkat_pendidikan" name="tingkat_pendidikan" aria-label="Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?">
                <option value="">-- Pilih --</option>
                <option value="1" <?= (old('tingkat_pendidikan') == '1') ? 'selected' : ''; ?>>Setingkat lebih tinggi</option>
                <option value="2" <?= (old('tingkat_pendidikan') == '2') ? 'selected' : ''; ?>>Tingkat yang sama</option>
                <option value="3" <?= (old('tingkat_pendidikan') == '3') ? 'selected' : ''; ?>>Setingkat lebih rendah</option>
                <option value="4" <?= (old('tingkat_pendidikan') == '4') ? 'selected' : ''; ?>>Tidak perlu pendidikan tinggi</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error('tingkat_pendidikan'); ?>
            </div>
        </div>

        <!-- KERJA PERTAMA SETELAH LULUS -->
        <div class="mb-3">
            <label for="kerja_stlh_lulus" class="form-label">Apakah ini pekerjaan pertama setelah lulus?*</label>
            <div class="d-flex justify-content-evenly align-items-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input <?= (validation_show_error('kerja_stlh_lulus')) ? 'is-invalid' : ''; ?>" type="radio" name="kerja_stlh_lulus" id="kerja_stlh_lulus1" value="1" <?= (old('kerja_stlh_lulus') == '1') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="kerja_stlh_lulus1">
                        Ya
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input <?= (validation_show_error('kerja_stlh_lulus')) ? 'is-invalid' : ''; ?>" type="radio" name="kerja_stlh_lulus" id="kerja_stlh_lulus2" value="0" <?= (old('kerja_stlh_lulus') == '0') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="kerja_stlh_lulus2">
                        Tidak
                    </label>
                </div>
            </div>
            <?php if (validation_show_error('kerja_stlh_lulus')) : ?>
                <div class="invalid-feedback d-block">
                    <?= validation_show_error('kerja_stlh_lulus'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <hr>
    <h3 class="display-6">Kegiatan Pendidikan dan Pengalaman Pembelajaran</h3>

    <!-- TEMPAT TINGGAL -->
    <div class="mb-3">
        <label for="tempat_tinggal" class="form-label">Selama kuliah, kebanyakan Anda tinggal di?*</label>
        <select class="form-select <?= (validation_show_error('tempat_tinggal')) ? 'is-invalid' : ''; ?>" id="tempat_tinggal" name="tempat_tinggal" aria-label="Selama kuliah, kebanyakan Anda tinggal di?">
            <option value="">-- Pilih --</option>
            <option value="1" <?= (old('tempat_tinggal') == '1') ? 'selected' : ''; ?>>Sendiri</option>
            <option value="2" <?= (old('tempat_tinggal') == '2') ? 'selected' : ''; ?>>Bersama Orang Tua</option>
            <option value="3" <?= (old('tempat_tinggal') == '3') ? 'selected' : ''; ?>>Bersama Saudara</option>
            <option value="0" <?= (old('tempat_tinggal') == '0') ? 'selected' : ''; ?>>Lainnya</option>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('tempat_tinggal'); ?>
        </div>
    </div>

    <!-- UANG KULIAH -->
    <div class="mb-3">
        <label for="uang_kuliah" class="form-label">Siapa yang terutama membayar uang kuliah Anda?*</label>
        <select class="form-select <?= (validation_show_error('uang_kuliah')) ? 'is-invalid' : ''; ?>" id="uang_kuliah" name="uang_kuliah" aria-label="Siapa yang terutama membayar uang kuliah Anda?">
            <option value="">-- Pilih --</option>
            <option value="1" <?= (old('uang_kuliah') == '1') ? 'selected' : ''; ?>>Beasiswa</option>
            <option value="2" <?= (old('uang_kuliah') == '2') ? 'selected' : ''; ?>>Sebagian Beasiswa</option>
            <option value="3" <?= (old('uang_kuliah') == '3') ? 'selected' : ''; ?>>Orang Tua / Keluarga</option>
            <option value="4" <?= (old('uang_kuliah') == '4') ? 'selected' : ''; ?>>Biaya Sendiri</option>
            <option value="0" <?= (old('uang_kuliah') == '0') ? 'selected' : ''; ?>>Lainnya</option>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('uang_kuliah'); ?>
        </div>
    </div>

    <!-- ORGANISASI -->
    <div class="mb-3">
        <label for="anggota_org" class="form-label">Selama kuliah, apakah Anda menjadi anggota dari suatu organisasi baik di dalam atau di luar kampus?*</label>
        <div class="d-flex justify-content-evenly align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input <?= (validation_show_error('anggota_org')) ? 'is-invalid' : ''; ?>" type="radio" name="anggota_org" id="anggota_org1" value="1" <?= (old('anggota_org') == '1') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="anggota_org1">
                    Ya
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input <?= (validation_show_error('anggota_org')) ? 'is-invalid' : ''; ?>" type="radio" name="anggota_org" id="anggota_org2" value="0" <?= (old('anggota_org') == '0') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="anggota_org2">
                    Tidak
                </label>
            </div>
        </div>
        <?php if (validation_show_error('anggota_org')) : ?>
            <div class="invalid-feedback d-block">
                <?= validation_show_error('anggota_org'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- AKTIF ORGANISASI -->
    <div class="mb-3">
        <label for="aktif_org" class="form-label">Seberapa aktif Anda di organisasi tersebut?</label>
        <select class="form-select <?= (validation_show_error('aktif_org')) ? 'is-invalid' : ''; ?>" id="aktif_org" name="aktif_org" aria-label="Seberapa aktif Anda di organisasi tersebut?">
            <option value="">-- Pilih --</option>
            <option value="1" <?= (old('aktif_org') == '1') ? 'selected' : ''; ?>>Pasif</option>
            <option value="2" <?= (old('aktif_org') == '2') ? 'selected' : ''; ?>>Cukup Aktif</option>
            <option value="3" <?= (old('aktif_org') == '3') ? 'selected' : ''; ?>>Sedang</option>
            <option value="4" <?= (old('aktif_org') == '4') ? 'selected' : ''; ?>>Aktif</option>
            <option value="5" <?= (old('aktif_org') == '5') ? 'selected' : ''; ?>>Sangat Aktif</option>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('aktif_org'); ?>
        </div>
    </div>

    <!-- IKUT KURSUS -->
    <div class="mb-3">
        <label for="ikut_kursus" class="form-label">Pada saat Anda kuliah di perguruan tinggi, apakah Anda mengambil kursus atau pendidikan tambahan?*</label>
        <div class="d-flex justify-content-evenly align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input <?= (validation_show_error('ikut_kursus')) ? 'is-invalid' : ''; ?>" type="radio" name="ikut_kursus" id="ikut_kursus1" value="1" <?= (old('ikut_kursus') == '1') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="ikut_kursus1">
                    Ya
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input <?= (validation_show_error('ikut_kursus')) ? 'is-invalid' : ''; ?>" type="radio" name="ikut_kursus" id="ikut_kursus2" value="0" <?= (old('ikut_kursus') == '0') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="ikut_kursus2">
                    Tidak
                </label>
            </div>
        </div>
        <?php if (validation_show_error('ikut_kursus')) : ?>
            <div class="invalid-feedback d-block">
                <?= validation_show_error('ikut_kursus'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- KURSUS -->
    <div class="mb-3">
        <label for="kursus" class="form-label">Kursus apa yang anda ambil untuk pendidikan tambahan?</label>
        <input type="text" class="form-control" id="kursus" name="kursus" value="<?= old('kursus'); ?>" autocomplete="off">
    </div>

    <!-- SARAN -->
    <div class="mb-3">
        <label for="saran" class="form-label">Saran, kesan, dan komentar untuk pengembangan Program Studi Sistem Informasi</label>
        <input type="text" class="form-control" id="saran" name="saran" value="<?= old('saran'); ?>" autocomplete="off" placeholder="Opsional">
    </div>

    <hr>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <button class="btn btn-primary bg-gradient" type="submit"><i class="fa-solid fa-plus"></i> Tambah</button>
    </div>
    <?= form_close(); ?>
</main>
</div>
</div>
<script>
    document.getElementById('bekerja').addEventListener('change', function() {
        var style = this.value == 1 ? 'block' : 'none';
        document.getElementById('hidden_div').style.display = style;
    });
</script>
<?= $this->endSection(); ?>