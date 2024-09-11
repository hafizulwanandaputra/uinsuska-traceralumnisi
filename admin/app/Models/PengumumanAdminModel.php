<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanAdminModel extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';
    protected $useTimestamps = true;
    protected $createdField  = 'tgl_posting';
    protected $updatedField  = 'tgl_sunting';
    protected $allowedFields = ['judul', 'isi', 'posted'];
    public function getPengumuman($id = false)
    {
        if ($id == false) {
            return $this->paginate(12, 'pengumuman');
        }
        $builder = $this->table('pengumuman');
        $builder->where('id_pengumuman', $id);
        return $builder->first();
    }
    public function search($keyword)
    {
        $builder = $this->table('pengumuman');
        $builder->like('judul', $keyword);
        return $builder;
    }
}
