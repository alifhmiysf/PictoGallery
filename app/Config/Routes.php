<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/pictogallery/homepage', 'PostController::index'); // Menampilkan beranda

$routes->group('/pictogallery/homepage/post', function ($routes) {
    $routes->post('create', 'PostController::create'); // Membuat postingan
    $routes->get('unggahan', 'PostController::postingan'); // Menampilkan daftar postingan
});

$routes->group('/pictogallery/auth', function ($routes){
    $routes->get('login', 'AuthController::index'); // Menampilkan halaman login
    $routes->get('register', 'AuthController::register'); // Menampilkan halaman registrasi
});

$routes->get('landingpage', 'Home::index'); // Menampilkan halaman landing

$routes->get('/', 'Home::index'); // Menampilkan halaman utama
$routes->get('/pictogallery/album', 'PostController::postingan'); // Menampilkan daftar album

$routes->get('/pictogallery/profile', 'Home::profile' ); // Menampilkan halaman profil
$routes->get('/pictogallery/profile-settings', 'Home::settings' ); // Menampilkan halaman pengaturan profil

$routes->post('authcontroller/valid_register', 'AuthController::valid_register'); // Validasi registrasi
$routes->post('authcontroller/valid_login', 'AuthController::valid_login'); // Validasi login

$routes->get('auth/confirmRegistration/(:segment)', 'AuthController::confirmRegistration/$1'); // Konfirmasi registrasi

$routes->post('postcontroller/update/(:segment)', 'PostController::update/$1'); // Menangani pembaruan postingan
$routes->get('postcontroller/hapus/(:num)', 'PostController::hapus/$1'); // Menangani penghapusan postingan


$routes->post('tambah-album', 'AlbumController::tambahAlbum');
$routes->post('album/editalbum', 'AlbumController::editAlbum');
$routes->get('album/delete/(:segment)', 'AlbumController::deleteAlbum/$1');
$routes->get('pictogallery/album/detail/(:num)', 'AlbumController::detail/$1');

$routes->post('album/hapusFotoDariAlbum', 'AlbumController::hapusFotoDariAlbum');


$routes->post('/simpan-foto', 'AlbumController::simpanFoto');

$routes->post('LikeController/like/(:any)', 'LikeController::like/$1');
$routes->post('LikeController/unlike/(:num)', 'LikeController::unlike/$1');


$routes->post('comment/create/(:num)', 'CommentController::create/$1');
$routes->get('/pictogallery/auth/signOut', 'AuthController::signOut');




$routes->post('comment/update/(:num)', 'CommentController::update/$1');

    $routes->post('comment/delete/(:num)', 'CommentController::delete/$1');


    $routes->post('edit-account', 'Home::edit_account');
    $routes->post('/update-password', 'Home::updatePassword');
