<?php

namespace App\Models;

use CodeIgniter\Model;

class daftarModel extends Model
{
    protected $table = 'daftar';
    protected $primaryKey = 'id_daftar';
    protected $allowedFields = ['tgl_daftar', 'id_pasien', 'id_poli', 'id_dokter', 'kasus', 'biaya'];

    public function GetAll()
    {
        $this->join('dokter', 'dokter.id_dokter = daftar.id_dokter', 'LEFT');
        $this->join('pasien', 'pasien.id_pasien = daftar.id_pasien', 'LEFT');
        $this->join('poliklinik', 'poliklinik.id_poli = daftar.id_poli', 'LEFT');
        $this->select('dokter.*');
        $this->select('pasien.*');
        $this->select('poliklinik.*');
        $this->select('daftar.*');
        $this->orderBy('daftar.id_daftar');
        $result = $this->findAll();

        // echo $this->db->getLastQuery();

        return $result;
    }

    public function GetDaftar($id)
    {
        $this->join('dokter', 'dokter.id_dokter = daftar.id_dokter', 'LEFT');
        $this->join('pasien', 'pasien.id_pasien = daftar.id_pasien', 'LEFT');
        $this->join('poliklinik', 'poliklinik.id_poli = daftar.id_poli', 'LEFT');
        $this->select('dokter.*');
        $this->select('pasien.*');
        $this->select('poliklinik.*');
        $this->select('daftar.*');
        $this->orderBy('daftar.id_daftar');
        $result = $this->like('id_daftar', $id);

        // echo $this->db->getLastQuery();

        return $result;
        // return $this->table('daftar')->join('pasien', 'pasien.id_pasien=daftar.id_pasien')->like('id_daftar', $id);
    }

    public function GetPasien()
    {
        return $this->db->table('pasien')->get()->getResultArray();
    }

    public function GetPoli()
    {
        return $this->db->table('poliklinik')->get()->getResultArray();
    }

    public function GetDokter()
    {
        return $this->db->table('dokter')->get()->getResultArray();
    }

    public function cari($id)
    {
        return $this->table('daftar')->like('id_daftar', $id);
    }
}
