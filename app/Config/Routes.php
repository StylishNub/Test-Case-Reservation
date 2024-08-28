<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Auth::login');
$routes->post('/auth/cek_login', 'Auth::cek_login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Admin::index');
$routes->get('/list', 'Admin::list');
$routes->get('/list/tambah_region', 'Admin::tambah_region');
$routes->post('/tambah_region/save_region', 'Admin::save_region');
$routes->get('/region_vehicles', 'Admin::region_vehicles');
$routes->get('/manajemen_vehicle', 'Admin::manajemen_vehicle');
$routes->get('/manajemen_vehicle/tambah_vehicle', 'Admin::tambah_vehicle');
$routes->post('/tambah_vehicle/save', 'Admin::save');
$routes->get('/manajemen_vehicle/delete_artikel/(:segment)','Admin::delete_artikel/$1');
$routes->get('/manajemen_vehicle/detail_vehicle/(:segment)', 'Admin::detail_vehicle/$1');
$routes->get('/reservation_list', 'Admin::reservation_list');
$routes->get('/reservation_list/tambah_reservasi', 'Admin::tambah_reservasi');
$routes->post('/tambah_reservasi/save_reservation', 'Admin::save_reservation');
$routes->get('/driver_list', 'Admin::driver_list');
$routes->get('/driver_list/driver_add', 'Admin::driver_add');
$routes->post('/driver_add/save_driver', 'Admin::save_driver');


$routes->get('/home', 'User::index');
$routes->get('/index/update_status/(:num)/(:alpha)', 'User::update_status/$1/$2');
$routes->get('/detail_reservasi', 'User::detail_reservasi');
$routes->get('/detail_reservasi/export_excel', 'User::export_excel');
$routes->get('/article', 'User::article');
$routes->get('/detail_artikel/(:segment)','User::detail_artikel/$1');

