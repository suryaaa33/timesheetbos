<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->setAutoRoute(false);

#client
$routes->get('/client', 'Client::index');                       
$routes->get('/client/create', 'Client::create');              
$routes->post('/client/store', 'Client::store');              
$routes->get('/client/edit/(:num)', 'Client::edit/$1');       
$routes->post('/client/update/(:num)', 'Client::update/$1');  
$routes->post('/client/delete/(:num)', 'Client::delete/$1');  



//admin
$routes->get('/project', 'Project::index');
$routes->get('/project/create', 'Project::create');
$routes->post('/project/store', 'Project::store');
$routes->get('/project/edit/(:num)', 'Project::edit/$1');     
$routes->post('/project/update/(:num)', 'Project::update/$1');
$routes->post('/project/delete/(:num)', 'Project::delete/$1');

//user
$routes->get('/dashboarduser/projects', 'DashboardUserProject::index', ['filter' => 'auth:user']);
$routes->get('/sheet/user/project/user/(:num)', 'SheetUser::sheetsByProject/$1');
$routes->get('/project/user', 'ProjectUser::index'); 




$routes->get('/employee', 'Employee::index');
$routes->get('/employee/create', 'Employee::create');
$routes->post('/employee/store', 'Employee::store');
$routes->get('/employee/edit/(:num)', 'Employee::edit/$1');
$routes->post('/employee/update/(:num)', 'Employee::update/$1');
$routes->post('/employee/delete/(:num)', 'Employee::delete/$1');




$routes->get('/menu', 'Menu::index');
$routes->get('/menu/create', 'Menu::create');
$routes->post('/menu/store', 'Menu::store');
$routes->get('/menu/edit/(:num)', 'Menu::edit/$1');
$routes->post('/menu/update/(:num)', 'Menu::update/$1');
$routes->post('/menu/delete/(:num)', 'Menu::delete/$1');



$routes->get('/role', 'Role::index');
$routes->get('/role/create', 'Role::create');
$routes->post('/role/store', 'Role::store');
$routes->get('/role/edit/(:num)', 'Role::edit/$1');
$routes->post('/role/update/(:num)', 'Role::update/$1');
$routes->post('/role/delete/(:num)', 'Role::delete/$1');


$routes->get('/roledetail', 'Roledetail::index');
$routes->get('/roledetail/create', 'Roledetail::create');
$routes->post('/roledetail/store', 'Roledetail::store');
$routes->get('/roledetail/edit/(:num)', 'Roledetail::edit/$1');
$routes->post('/roledetail/update/(:num)', 'Roledetail::update/$1');
$routes->post('/roledetail/delete/(:num)', 'Roledetail::delete/$1');



// ADMIN (READ ONLY)
$routes->get('/sheet', 'Sheet::index');             
$routes->get('/sheet/(:num)', 'Sheet::detail/$1');  

// USER (CRUD)
$routes->get('/sheet/user', 'SheetUser::index');                      
$routes->get('/sheet/user/create', 'SheetUser::create');              
$routes->post('/sheet/user/store', 'SheetUser::store');               
$routes->get('/sheet/user/edit/(:num)', 'SheetUser::edit/$1');        
$routes->post('/sheet/user/update/(:num)', 'SheetUser::update/$1');   
$routes->post('/sheet/user/delete/(:num)', 'SheetUser::delete/$1');   
$routes->get('/sheet/user/(:num)', 'SheetUser::detail/$1'); 
$routes->get('sheet/user/detail/(:num)', 'SheetUser::detail/$1');
// $routes->post('sheet/user/add/(:num)', 'SheetUser::add/$1');




$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/dashboarduser', 'Dashboarduser::index');

$routes->get('/login', 'Login::index');              // Form login
$routes->post('/login/auth', 'Login::auth');         // Proses login
$routes->get('/logout', 'Login::logout');            // Proses logout
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth:admin']);
$routes->get('/dashboarduser', 'DashboardUser::index', ['filter' => 'auth:user']);

