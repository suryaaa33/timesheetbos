<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/client', 'Client::index');

$routes->get('/project', 'Project::index');

$routes->get('/employee', 'Employee::index');

$routes->get('/menu', 'Menu::index');

$routes->get('/role', 'Role::index');

$routes->get('/roledetail', 'Roledetail::index');

$routes->get('/sheet', 'Sheet::index');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/cobadashboard', 'Cobadashboard::index');

$routes->get('/login', 'Login::index');