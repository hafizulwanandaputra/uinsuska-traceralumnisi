<?php

namespace App\Models;

use CodeIgniter\Model;

class Activation extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    protected $useTimestamps = false;
    protected $allowedFields = ['alamat_rumah', 'nomor_hp', 'nomor_hp_2', 'email', 'pekerjaan', 'tgl_lulus', 'ijazah', 'sk_lulus', 'transkrip_nilai'];
}
