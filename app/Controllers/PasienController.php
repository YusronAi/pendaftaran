<?php

namespace App\Controllers;

use App\Models\pasienModel;
use App\Models\daftarModel;

class PasienController extends BaseController
{
    protected $pasienModel;
    protected $daftarModel;

    public function __construct()
    {
        $this->pasienModel = new pasienModel();
        $this->daftarModel = new daftarModel();
    }

    public function pasien()
    {
        $pasien = $this->pasienModel->AllData();
        $data = [
            'title' => 'Data Pasien',
            'pasien' => $pasien
        ];

        return view('pasien/pasien', $data);
    }

    public function save()
    {
        $this->pasienModel->save([
            'no_rm' => $this->request->getVar('no_rm'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'umur' => $this->request->getVar('umur'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        return redirect()->to('/daftar');
    }

    public function ubahPasien($id)
    {
        $pasien = $this->pasienModel->cari($id);
        $data = [
            'title' => 'Ubah Pasien',
            'pasien' => $pasien
        ];

        return view('pasien/update', $data);
    }

    public function updatePasien($id)
    {
        $this->pasienModel->save([
            'id_pasien' => $id,
            'no_rm' => $this->request->getVar('no_rm'),
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'umur' => $this->request->getVar('umur'),
            'alamat' => $this->request->getVar('alamat'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/pasien');
    }

    public function hapusPasien($id)
    {
        $this->pasienModel->where('id_pasien', $id)->delete();

        return redirect()->to('/pasien');
    }

    public function daftar()
    {
        $pasien = $this->daftarModel->GetPasien();
        $poli = $this->daftarModel->GetPoli();
        $dokter = $this->daftarModel->GetDokter();
        $data = [
            'title' => 'Daftar',
            'pasien' => $pasien,
            'poli' => $poli,
            'dokter' => $dokter
        ];

        return view('home/daftar', $data);
    }

    public function saveDaftar()
    {
        $this->daftarModel->save([
            'tgl_daftar' => $this->request->getVar('tgl_daftar'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'id_poli' => $this->request->getVar('id_poli'),
            'id_dokter' => $this->request->getVar('id_dokter'),
            'kasus' => $this->request->getVar('kasus'),
            'biaya' => $this->request->getVar('biaya')
        ]);

        return redirect()->to('/laporan');
    }
}
