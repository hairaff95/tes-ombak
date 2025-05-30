<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->group('produk', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
});


$routes->group('kategori', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'KategoriController::index');           
    $routes->post('create', 'KategoriController::create');         
    $routes->post('edit/(:any)', 'KategoriController::edit/$1'); 
    $routes->get('delete/(:any)', 'KategoriController::delete/$1'); 
});


$routes->get('keranjang', 'TransaksiController::index', ['filter' => 'auth']);
$routes->get('Contact', 'ContactController::index', ['filter' => 'auth']); 

// $routes->get('nama file baru di View/errors', 'PageController::index', ['filter' => 'auth']);

