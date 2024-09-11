<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    protected $useTimestamps = false;
    protected $allowedFields = ['nim_alumni', 'nama_alumni', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tgl_lahir', 'nomor_hp', 'nomor_hp_2', 'aktif', 'tgl_lulus', 'kuesioner', 'ijazah', 'sk_lulus', 'transkrip_nilai', 'password'];
    public function login($nim_alumni)
    {
        return $this->db->table('alumni')->where([
            'nim_alumni' => $nim_alumni
        ])->get()->getRowArray();
    }
}
