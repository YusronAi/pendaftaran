<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\UserModel;

class userController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('user/login', $data);
    }

    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        if ($username) {
            $user = $this->userModel->search($username)->first();

            if ($user) {
                if ($password == $user['password']) {
                    $set = session();
                    $set->set('login', $user);
                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('pesan', 'Password Salah!');
                    return redirect()->to('/login');
                }
            } else {
                session()->setFlashdata('pesan', 'Akun tidak ditemukan');
                return redirect()->to('/login');
            }
        }
    }

    public function registrasi()
    {
        $data = [
            'title' => 'Registrasi Akun'
        ];

        return view('user/register', $data);
    }

    public function register()
    {
        $fileFoto = $this->request->getFile('foto');

        $fileFoto->move('img');
        $fileName = $fileFoto->getName();
        if (!$this->validate([
            'username' => 'required|is_unique[user.username]'
        ])) {
            session()->setFlashdata('pesan', 'Data sudah ada atau isi kurang komplit');

            return redirect()->to('/registrasi');
        }

        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'no_telephone' => $this->request->getVar('no_telephone'),
            'foto' => $fileName,
            'role' => $this->request->getVar('role'),
        ]);

        session()->setFlashdata('pesan', 'Register Berhasil');
        return redirect()->to('/login');
    }

    public function logout()
    {
        $set = session();

        $set->remove('login');
        $set->destroy();

        return redirect()->to('/login');
    }
}
