<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeAdminModel extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    protected $useTimestamps = false;
    protected $allowedFields = ['nim_alumni', 'nama_alumni', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tgl_lahir', 'nomor_hp', 'nomor_hp_2', 'aktif', 'tgl_lulus', 'kuesioner', 'ijazah', 'sk_lulus', 'transkrip_nilai', 'password'];
    public function getAllAlumni()
    {
        return $this->db->table('alumni')->countAll();
    }
    public function getGraduatedAlumni()
    {
        $builder = $this->table('alumni');
        $builder->where('tgl_lulus !=', NULL, FALSE);
        $builder->where('aktif', 1);
        return $builder->countAllResults();
    }
    public function getUngraduatedAlumni()
    {
        $builder = $this->table('alumni');
        $builder->where('tgl_lulus', NULL);
        $builder->where('aktif', 0);
        return $builder->countAllResults();
    }
    public function getIsiKuesioner()
    {
        $builder = $this->table('alumni');
        $builder->where('tgl_lulus !=', NULL, FALSE);
        $builder->where('kuesioner', 1);
        $builder->where('aktif', 1);
        return $builder->countAllResults();
    }
    public function getBelumIsiKuesioner()
    {
        $builder = $this->table('alumni');
        $builder->where('tgl_lulus !=', NULL, FALSE);
        $builder->where('kuesioner', 0);
        $builder->where('aktif', 1);
        return $builder->countAllResults();
    }
}
