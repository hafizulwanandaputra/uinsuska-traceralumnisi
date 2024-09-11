<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilAdminModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_lengkap', 'username', 'foto_user'];
}
