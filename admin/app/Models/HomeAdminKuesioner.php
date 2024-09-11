<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeAdminKuesioner extends Model
{
    protected $table = 'kuesioner';
    protected $primaryKey = 'id_kuesioner';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'id_alumni',
        'nama_alumni',
        'nim_alumni',
        'alamat_rumah',
        'tgl_lulus',
        'ipk',
        'nomor_hp',
        'email',
        'thn_masuk',
        'bekerja',
        'jenis',
        'nama_kantor',
        'nama_pimpinan',
        'email_pimpinan',
        'bidang',
        'thn_mulai_kerja',
        'no_telp_pimpinan',
        'website_kantor',
        'alamat_kantor',
        'penghasilan',
        'status',
        'sesuai_ilmu',
        'dapat_kerja',
        'tingkat_pendidikan',
        'kerja_stlh_lulus',
        'tempat_tinggal',
        'uang_kuliah',
        'anggota_org',
        'aktif_org',
        'ikut_kursus',
        'kursus',
        'saran',
        'tgl_isi',
        'tgl_ubah'
    ];
    public function getBekerja()
    {
        $builder = $this->table('kuesioner');
        $builder->where('bekerja', 1);
        return $builder->countAllResults();
    }
    public function getTidakBekerja()
    {
        $builder = $this->table('kuesioner');
        $builder->where('bekerja', 0);
        return $builder->countAllResults();
    }
    public function getMelanjutkanStudi()
    {
        $builder = $this->table('kuesioner');
        $builder->where('bekerja', 2);
        return $builder->countAllResults();
    }
}
