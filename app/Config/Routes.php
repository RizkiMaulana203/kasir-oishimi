<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->get('/', 'Home::index');
$routes->get('/', 'User::index');
$routes->get('/', 'Level::index');
$routes->get('/', 'Food::index');
$routes->get('/', 'Order::index');
$routes->get('user/user_edit', ' User::user_edit/$1');
$routes->get('user/user_update', ' User::user_update/$1');
$routes->get('level/level_edit', 'level::level_edit/$1');
$routes->get('level/level_update', ' Level::level_update/$1');
$routes->get('transaksi/transaksi_edit', ' transaksi::transaksi_edit/$1');
$routes->get('transaksi/transaksi_update', ' transaksi::transaksi_update/$1');
$routes->get('detail_/detail__edit', ' detail_::detail__edit/$1');
$routes->get('detail_/detail__update', ' detail_::detail__update/$1');
$routes->get('order/order_bayar_new/(:num)', 'Order::order_bayar_new/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
