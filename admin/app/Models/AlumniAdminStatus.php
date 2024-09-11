<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniAdminStatus extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    protected $useTimestamps = false;
    protected $allowedFields = ['nim_alumni', 'nama_alumni', 'aktif', 'password'];

    public function getAlumni($id)
    {
        $builder = $this->table('alumni');
        $builder->where('id_alumni', $id);
        return $builder->first();
    }
}
