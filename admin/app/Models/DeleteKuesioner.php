<?php

namespace App\Models;

use CodeIgniter\Model;

class DeleteKuesioner extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    protected $useTimestamps = false;
    protected $allowedFields = ['kuesioner'];

    public function getAlumni($id)
    {
        $builder = $this->table('alumni');
        $builder->where('id_alumni', $id);
        return $builder->first();
    }
}
