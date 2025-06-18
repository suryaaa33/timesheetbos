<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->setAutoRoute(false); // karena kita pakai manual routing

#client
$routes->get('/client', 'Client::index');
$routes->post('/client/store', 'Client::store');
$routes->get('/client/edit/(:num)', 'Client::edit/$1');     // Redirect ke index dgn ?edit_id
$routes->post('/client/update/(:num)', 'Client::update/$1');
$routes->post('/client/delete/(:num)', 'Client::delete/$1');



$routes->get('/project', 'Project::index');
$routes->post('/project/store', 'Project::store');
$routes->get('/project/edit/(:num)', 'Project::edit/$1');     // Redirect ke index dgn ?edit_id
$routes->post('/project/update/(:num)', 'Project::update/$1');
$routes->post('/project/delete/(:num)', 'Project::delete/$1');



$routes->get('/employee', 'Employee::index');
$routes->post('/employee/store', 'Employee::store');
$routes->get('/employee/edit/(:num)', 'Employee::edit/$1');
$routes->post('/employee/update/(:num)', 'Employee::update/$1');
$routes->get('/employee/delete/(:num)', 'Employee::delete/$1');



$routes->get('/menu', 'Menu::index');
$routes->post('/menu/store', 'Menu::store');
$routes->get('/menu/edit/(:num)', 'Menu::edit/$1');
$routes->post('/menu/update/(:num)', 'Menu::update/$1');
$routes->get('/menu/delete/(:num)', 'Menu::delete/$1');



$routes->get('/role', 'Role::index');

$routes->get('/roledetail', 'Roledetail::index');

$routes->get('/sheet', 'Sheet::index');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/cobadashboard', 'Cobadashboard::index');

$routes->get('/login', 'Login::index');