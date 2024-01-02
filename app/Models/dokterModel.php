<?php

namespace App\Models;

use CodeIgniter\Model;

class dokterModel extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $allowedFields = ['nama_dokter', 'alamat_dokter', 'telephone', 'tarif'];

    public function AllData()
    {
        return $this->db->table('dokter')->get()->getResultArray();
    }

    public function cari ($id)
    {
        return $this->table('dokter')->where('id_dokter', $id)->first();
    }
}