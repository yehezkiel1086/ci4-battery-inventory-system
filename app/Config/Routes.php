<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/batteries', 'Batteries::index');
$routes->get('/inventory', 'Inventory::index');
$routes->get('/shipments', 'Shipments::index');
$routes->get('/products', 'Products::index');

