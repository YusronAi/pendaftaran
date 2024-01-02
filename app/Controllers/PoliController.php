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
            'title' => 'Data Poliklinik',
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
}
