<?php

namespace App\Controllers;

use App\Models\dokterModel;

class DokterController extends BaseController
{
    protected $dokterModel;

    public function __construct()
    {
        $this->dokterModel = new dokterModel();
    }

    public function dokter()
    {
        $dokter = $this->dokterModel;
        $data = [
            'title' => 'Data Dokter',
            'dokter' => $dokter->paginate(9),
            'pager' => $dokter->pager
        ];

        return view('dokter/dokter', $data);
    }

    public function input () {
        $data = [
            'title' => 'Input Dokter'
        ];

        return view('dokter/input', $data);
    }

    public function save()
    {
        $this->dokterModel->save([
            'nama_dokter' => $this->request->getVar('nama_dokter'),
            'alamat_dokter' => $this->request->getVar('alamat_dokter'),
            'telephone' => $this->request->getVar('telephone'),
            'tarif' => $this->request->getVar('tarif')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/dokter');
    }

    public function ubahDokter($id)
    {
        $dokter = $this->dokterModel->cari($id);
        $data = [
            'title' => 'Ubah Dokter',
            'dokter' => $dokter
        ];

        return view('dokter/update', $data);
    }

    public function updateDokter($id)
    {
        $this->dokterModel->save([
            'id_dokter' => $id,
            'nama_dokter' => $this->request->getVar('nama_dokter'),
            'alamat_dokter' => $this->request->getVar('alamat_dokter'),
            'telephone' => $this->request->getVar('telephone'),
            'tarif' => $this->request->getVar('tarif'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/dokter');
    }

    public function hapusDokter($id)
    {
        $this->dokterModel->where('id_dokter', $id)->delete();
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/dokter');
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
