<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanAdmin2Model extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';
    protected $useTimestamps = false;
    protected $allowedFields = ['judul', 'posted'];
    public function getPengumuman($id)
    {
        $builder = $this->table('pengumuman');
        $builder->where('id_pengumuman', $id);
        return $builder->first();
    }
}
