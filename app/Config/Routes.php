<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'AuthController::index');
$routes->post('/login/auth', 'AuthController::login');

$routes->get('/logout', 'AuthController::logout');


$routes->get('/dashboard', 'DashboardController::index');
$routes->post('/dashboard/delete', 'DashboardController::delete');
$routes->post('/dashboard/select', 'DashboardController::select');
$routes->post('/dashboard/unselect', 'DashboardController::unselect');

$routes->get('/add', 'AddItemController::index');
$routes->post('/add/items', 'AddItemController::addItems');

$routes->get('/edit', 'EditItemController::index');
$routes->post('/edit/items', 'EditItemController::edit');



