<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthAdminModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_lengkap', 'username', 'password', 'foto_user', 'type', 'active'];
    public function login($username)
    {
        return $this->db->table('user')->where([
            'username' => $username
        ])->get()->getRowArray();
    }
}
