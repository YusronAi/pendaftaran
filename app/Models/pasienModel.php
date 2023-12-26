<?php

namespace App\Models;

use CodeIgniter\Model;

class pasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $allowedFields = ['no_rm', 'nama_pasien', 'tanggal_lahir', 'umur', 'alamat'];

    public function AllData()
    {
        return $this->db->table('pasien')->get()->getResultArray();
    }

    public function cari ($id)
    {
        return $this->table('pasien')->like('id_pasien', $id)->first();
    }
}