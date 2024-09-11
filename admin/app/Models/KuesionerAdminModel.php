<?php

namespace App\Models;

use CodeIgniter\Model;

class KuesionerAdminModel extends Model
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

    public function getKuesioner($id)
    {
        $builder = $this->table('kuesioner');
        $builder->where('id_kuesioner', $id);
        return $builder->first();
    }
}
