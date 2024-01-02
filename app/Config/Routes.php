<?php

use App\Controllers\Home;
use CodeIgniter\Controller;
use App\Controllers\PasienController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/pasien', 'PasienController::pasien');
    $routes->post('/pasien', 'PasienController::pasien');
    $routes->post('/save-pasien', 'PasienController::save');
    $routes->get('/laporan', 'DaftarController::dataDaftar');
    $routes->post('/laporan', 'DaftarController::dataDaftar');
    $routes->get('/daftar', 'PasienController::daftar');
    $routes->post('/save-daftar', 'PasienController::saveDaftar');

    $routes->get('/ubah-pasien/(:num)', 'PasienController::ubahPasien/$1');
    $routes->post('/update-pasien/(:num)', 'PasienController::updatePasien/$1');
    $routes->get('/hapus-pasien/(:any)', 'PasienController::hapusPasien/$1');

    $routes->get('/dokter', 'DokterController::dokter');
    $routes->get('/input-dokter', 'DokterController::input');
    $routes->post('/save-dokter', 'DokterController::save');

    $routes->get('/hapus-dokter/(:any)', 'DokterController::hapusDokter/$1');
    $routes->get('/ubah-dokter/(:any)', 'DokterController::ubahDokter/$1');
    $routes->post('/update-dokter/(:any)', 'DokterController::updateDokter/$1');
    
    $routes->get('/hapus-daftar/(:any)', 'DaftarController::hapus/$1');
    $routes->get('/edit-daftar/(:any)', 'DaftarController::edit/$1');
    $routes->post('/update-daftar/(:any)', 'DaftarController::update/$1');


    $routes->get('/poliklinik', 'PoliController::poli');
    $routes->get('/hapus-poli/(:any)', 'PoliController::hapusPoli/$1');
    $routes->get('/input-poli', 'PoliController::input');
    $routes->post('/save-poli', 'PoliController::save');
    $routes->get('/ubah-poli/(:any)', 'PoliController::ubahPoli/$1');
    $routes->post('/update-poli/(:any)', 'PoliController::updatePoli/$1');

    $routes->get('/cetak/(:any)', 'DaftarController::cetak/$1');
});

$routes->get('/login', 'userController::login');
$routes->post('/auth', 'userController::auth');
$routes->get('/logout', 'userController::logout');
$routes->get('/registrasi', 'userController::registrasi');
$routes->post('/register', 'userController::register');
