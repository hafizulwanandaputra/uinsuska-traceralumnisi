<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    protected $useTimestamps = false;
    protected $allowedFields = ['nim_alumni', 'nama_alumni', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat_rumah', 'nomor_hp', 'nomor_hp_2', 'email', 'pekerjaan', 'tgl_lulus', 'kuesioner', 'ijazah', 'sk_lulus', 'foto_alumni', 'transkrip_nilai'];
}
