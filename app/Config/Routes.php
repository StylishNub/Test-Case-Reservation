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
$routes->get('/list/edit_region/(:segment)', 'Admin::edit_region/$1');
$routes->post('/edit_region/save_edit_region/(:segment)', 'Admin::save_edit_region/$1');
$routes->get('/list/delete_region/(:segment)','Admin::delete_region/$1');


$routes->get('/region_vehicles', 'Admin::region_vehicles');
$routes->get('/manajemen_vehicle', 'Admin::manajemen_vehicle');
$routes->get('/manajemen_vehicle/tambah_vehicle', 'Admin::tambah_vehicle');
$routes->post('/tambah_vehicle/save', 'Admin::save');
$routes->get('/manajemen_vehicle/detail_vehicle/(:segment)', 'Admin::detail_vehicle/$1');
$routes->get('/manajemen_vehicle/edit_vehicle/(:segment)', 'Admin::edit_vehicle/$1');
$routes->post('/edit_vehicle/save_edit_vehicle', 'Admin::save_edit_vehicle');
$routes->get('/manajemen_vehicle/delete_vehicle/(:segment)','Admin::delete_vehicle/$1');

$routes->get('/reservation_list', 'Admin::reservation_list');
$routes->get('/reservation_list/tambah_reservasi', 'Admin::tambah_reservasi');
$routes->post('/tambah_reservasi/save_reservation', 'Admin::save_reservation');
$routes->get('/reservation_list/edit_reservation/(:segment)', 'Admin::edit_reservation/$1');
$routes->post('/edit_reservation/save_edit_reservation/(:segment)', 'Admin::save_edit_reservation/$1');
$routes->get('/reservation_list/delete_reservation/(:segment)','Admin::delete_reservation/$1');

$routes->get('/driver_list', 'Admin::driver_list');
$routes->get('/driver_list/driver_add', 'Admin::driver_add');
$routes->post('/driver_add/save_driver', 'Admin::save_driver');
$routes->get('/driver_list/driver_edit/(:segment)', 'Admin::driver_edit/$1');
$routes->post('/driver_edit/save_edit_driver', 'Admin::save_edit_driver');
$routes->get('/driver_list/delete_driver/(:segment)','Admin::delete_driver/$1');



$routes->get('/home', 'Approval::index');
$routes->get('/index/update_status/(:num)/(:alpha)', 'Approval::update_status/$1/$2');
$routes->get('/detail_reservasi', 'Approval::detail_reservasi');
$routes->get('/detail_reservasi/export_excel', 'Approval::export_excel');
$routes->get('/article', 'Approval::article');
$routes->get('/detail_artikel/(:segment)','Approval::detail_artikel/$1');

