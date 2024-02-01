<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->match(['get','post'],'login','UserController::login');

$routes->group('',["filter" => "auth"],function ($routes){
    $routes->get('/admin', 'AdminController::index');

    $routes->get('/pelanggan', 'Pelanggan::index');
    $routes->post('/pelanggan/store', 'Pelanggan::store');
    $routes->get('/pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
    $routes->post('/pelanggan/update', 'Pelanggan::update');
    $routes->get(' /pelanggan/delete/(:num)', 'Pelanggan::delete/$1');

    $routes->get('/produk', 'Produk::index');
    $routes->post('/produk/store', 'Produk::store');
    $routes->get('/produk/edit/(:num)', 'Produk::edit/$1');
    $routes->post('/produk/update', 'Produk::update');
    $routes->get('/produk/delete/(:num)', 'Produk::delete/$1');

    $routes->get('/user', 'User::index');
    $routes->post('/user/store', 'User::store');
    $routes->get('/user/edit/(:num)', 'User::edit/$1');
    $routes->post('/user/update', 'User::update');
    $routes->get('/user/delete/(:num)', 'User::delete/$1');

    $routes->post('/penjualan/store', 'Penjualan::store');

    $routes->get('/detail', 'Detail::index');

    $routes->get('/user', 'User::index');
});

$routes->group('', ["filter" => "auth"], function ($routes){
    $routes->get('/petugas', 'PetugasController::index');
    $routes->post('/penjualan/store', 'Penjualan::store');
    $routes->get('/detail', 'Detail::index');
});

$routes->get('dashboard','home::index');
$routes->get('logout', 'UserController::logout');



