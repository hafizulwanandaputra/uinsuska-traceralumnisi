<?php

namespace App\Models;

use CodeIgniter\Model;

class ChangePasswordAdminModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = false;
    protected $allowedFields = ['password'];
}
