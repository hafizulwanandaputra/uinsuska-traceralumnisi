<?php

namespace App\Models;

use CodeIgniter\Model;

class DelProfilModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = false;
    protected $allowedFields = ['foto_user'];
}
