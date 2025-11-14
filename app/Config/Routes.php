<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/batteries', 'Batteries::index');
$routes->get('/batteries/show/(:num)', 'Batteries::show/$1');
$routes->get('/batteries/new', 'Batteries::new');
$routes->post('/batteries/create', 'Batteries::create');
$routes->get('/batteries/edit/(:num)', 'Batteries::edit/$1');
$routes->post('/batteries/update/(:num)', 'Batteries::update/$1');
$routes->post('/batteries/delete/(:num)', 'Batteries::delete/$1');
$routes->get('/inventory', 'Inventory::index');
$routes->post('/inventory/update/(:num)', 'Inventory::update/$1');
$routes->get('/shipments', 'Shipments::index');
$routes->post('/shipments/send/(:num)', 'Shipments::send/$1');
$routes->get('/products', 'Products::index');
