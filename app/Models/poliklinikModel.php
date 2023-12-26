<?php

namespace App\Models;

use CodeIgniter\Model;

class poliklinikModel extends Model
{
    protected $table = 'poliklinik';
    protected $primaryKey = 'id_poli';
    protected $allowedFields = ['nama_poli'];

    public function AllData()
    {
        return $this->db->table('poliklinik')->get()->getResultArray();
    }

    public function cari ($id)
    {
        return $this->table('poliklinik')->like('id_poli', $id)->first();
    }
}