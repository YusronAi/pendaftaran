<?php

namespace App\Controllers;

use App\Models\daftarModel;
use App\Models\pasienModel;
use App\Models\dokterModel;
use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class PasienController extends BaseController
{
    protected $pasienModel;
    protected $daftarModel;
    protected $dokterModel;

    public function __construct()
    {
        $this->pasienModel = new pasienModel();
        $this->daftarModel = new daftarModel();
        $this->dokterModel = new dokterModel();
    }

    public function pasien()
    {
        if ($keyword = $this->request->getVar('keyword')) {
            $pasien = $this->pasienModel->search($keyword);
            if (empty($pasien)) {
                $pasien = $this->pasienModel;
            }
        } else {
            $pasien = $this->pasienModel;
        }
        $data = [
            'title' => 'Data Pasien',
            'pasien' => $pasien->paginate(1),
            'pager' => $pasien->pager
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
            'alamat' => $this->request->getVar('alamat'),
            'tgl_periksa' => $this->request->getVar('tgl_periksa'),
            'nik' => $this->request->getVar('nik'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telp' => $this->request->getVar('telp'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'agama' => $this->request->getVar('agama')
        ]);

        $id = $this->pasienModel->getInsertID();
        $rm = $this->request->getVar('no_rm');
        $noRm = $rm . $id;
        $this->pasienModel->update($id, ['no_rm' => $noRm]);

        return redirect()->to('/daftar');
    }

    public function ubahPasien($id)
    {
        $pasien = $this->pasienModel->cari($id);
        $data = [
            'title' => 'Data Detail Pasien',
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
            'tgl_periksa' => $this->request->getVar('tgl_periksa'),
            'nik' => $this->request->getVar('nik'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telp' => $this->request->getVar('telp'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'agama' => $this->request->getVar('agama')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/pasien');
    }

    public function hapusPasien($id)
    {
        $this->daftarModel->where('id_pasien', $id)->delete();
        $this->pasienModel->where('id_pasien', $id)->delete();

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
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

        $id_pasien = $this->request->getVar('id_pasien');
        $id_dokter = $this->request->getVar('id_dokter');

        $dokter = $this->dokterModel->cari($id_dokter);
        $tarif = $dokter['tarif'];

        $this->daftarModel->whereIn('id_pasien', [$id_pasien])->set([
            'biaya' => $tarif
        ])->update();

        session()->setFlashdata('pesan', 'Pasien Berhasil Didaftarkan');
        return redirect()->to('/laporan');
    }
}
