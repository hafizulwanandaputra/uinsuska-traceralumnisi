<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniAdminModel extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    protected $useTimestamps = false;
    protected $allowedFields = ['nim_alumni', 'nama_alumni', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat_rumah', 'nomor_hp', 'nomor_hp_2', 'email', 'pekerjaan', 'aktif', 'tgl_lulus', 'kuesioner', 'ijazah', 'sk_lulus', 'transkrip_nilai', 'foto_alumni', 'password'];

    public function getAlumni($id)
    {
        $builder = $this->table('alumni');
        $builder->where('id_alumni', $id);
        return $builder->first();
    }
    public function getUnactivatedAlumni()
    {
        $builder = $this->table('alumni');
        $builder->where('aktif', 0);
        $builder->where('ijazah !=', NULL);
        $builder->where('transkrip_nilai !=', NULL);
        return $builder->countAllResults();
    }
    public function getBelumIsiKuesioner()
    {
        $builder = $this->table('alumni');
        $builder->where('aktif', 1);
        $builder->where('kuesioner', 0);
        return $builder->countAllResults();
    }
}
