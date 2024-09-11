<?php

namespace App\Models;

use CodeIgniter\Model;

class KuesionerModelProfil extends Model
{
    protected $table = 'kuesioner';
    protected $primaryKey = 'id_alumni';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'nama_alumni',
        'nim_alumni',
        'alamat_rumah',
        'tgl_lulus',
        'email'
    ];
}
