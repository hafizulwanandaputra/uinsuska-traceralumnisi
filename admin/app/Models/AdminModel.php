<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_lengkap', 'username', 'password', 'foto_user', 'type', 'active'];
    public function getAdmin($id = false)
    {
        if ($id == false) {
            return $this->paginate(24, 'user');
        }
        $builder = $this->table('user');
        $builder->where('id_user', $id);
        return $builder->first();
    }
    public function search($keyword)
    {
        $builder = $this->table('user');
        $builder->where('id_user !=', session()->get('id_user'));
        $builder->like('nama_lengkap', $keyword);
        $builder->orLike('username', $keyword);
        return $builder;
    }
}
