<?php

namespace App\Controllers;

use App\Models\poliklinikModel;

class   PoliController extends BaseController
{
    protected $poliModel;

    public function __construct()
    {
        $this->poliModel = new poliklinikModel();
    }

    public function poli()
    {
        $poli = $this->poliModel->AllData();
        $data = [
            'title' => 'Data Dokter',
            'poli' => $poli
        ];

        return view('poli/poli', $data);
    }

    public function input () {
        $data = [
            'title' => 'Input Poli'
        ];

        return view('poli/input', $data);
    }

    public function save()
    {
        $this->poliModel->save([
            'nama_poli' => $this->request->getVar('nama_poli')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/poliklinik');
    }

    public function ubahPoli($id)
    {
        $poli = $this->poliModel->cari($id);
        $data = [
            'title' => 'Ubah Poliklinik',
            'poli' => $poli
        ];

        return view('poli/update', $data);
    }

    public function updatePoli($id)
    {
        $this->poliModel->save([
            'id_poli' => $id,
            'nama_poli' => $this->request->getVar('nama_poli')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/poliklinik');
    }

    public function hapusPoli($id)
    {
        $this->poliModel->where('id_poli', $id)->delete();
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/poliklinik');
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

        return redirect()->to('/pasien');
    }
}
