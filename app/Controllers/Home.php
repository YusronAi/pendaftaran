<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function index(): string
    {
        $time = Time::now('Asia/Jakarta', 'id_ID')->toDateString();
        $mytime = str_replace("-","",$time);

        $data = [
            'title' => 'Registrasi Daftar Rawat Jalan',
            'h1' => 'Data Pasien Baru',
            'time' => $mytime
        ];

        return view('home/index', $data);
    }
}
