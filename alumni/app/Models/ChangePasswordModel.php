<?php

namespace App\Models;

use CodeIgniter\Model;

class ChangePasswordModel extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    protected $useTimestamps = false;
    protected $allowedFields = ['password'];
}
