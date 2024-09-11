<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// AUTH ADMIN
$routes->get('/', 'AuthAdmin::index');
$routes->post('/(?i)check-login-admin', 'AuthAdmin::check_login');
$routes->get('/(?i)register', 'AuthAdmin::register');
$routes->post('/(?i)save-register', 'AuthAdmin::save_register');
$routes->get('/(?i)logout-admin', 'AuthAdmin::logout');

// BERANDA ADMIN
$routes->get('/(?i)home-admin', 'HomeAdmin::index');

// PENGUMUMAN ADMIN
$routes->get('/(?i)pengumuman-admin', 'PengumumanAdmin::index');
$routes->post('/(?i)pengumuman-admin', 'PengumumanAdmin::index');
$routes->get('/(?i)pengumuman-admin/(?i)create', 'PengumumanAdmin::create');
$routes->post('/(?i)pengumuman-admin/(?i)save', 'PengumumanAdmin::save');
$routes->get('/(?i)pengumuman-admin/(?i)edit/(:num)', 'PengumumanAdmin::edit/$1');
$routes->post('/(?i)pengumuman-admin/(?i)update/(:num)', 'PengumumanAdmin::update/$1');
$routes->post('/(?i)pengumuman-admin/(?i)post/(:num)', 'PengumumanAdmin::post/$1');
$routes->post('/(?i)pengumuman-admin/(?i)draft/(:num)', 'PengumumanAdmin::draft/$1');
$routes->delete('/(?i)pengumuman-admin/(?i)delete/(:num)', 'PengumumanAdmin::delete/$1');
$routes->get('/(?i)pengumuman-admin/(:num)', 'PengumumanAdmin::details/$1');

// KUESIONER ADMIN
$routes->get('/(?i)kuesioner-admin', 'KuesionerAdmin::index');
$routes->post('/(?i)kuesioner-admin', 'KuesionerAdmin::index');
$routes->post('/(?i)kuesioner-admin/(?i)ajax', 'KuesionerAdmin::ajax');
$routes->delete('/(?i)kuesioner-admin/(?i)delete/(:num)', 'KuesionerAdmin::delete/$1');
$routes->get('/(?i)kuesioner-admin/(:num)', 'KuesionerAdmin::details/$1');
$routes->get('/(?i)kuesioner-admin/(?i)belumisi', 'KuesionerAdmin::belumisi');
$routes->get('/(?i)kuesioner-admin/(?i)databelumisi', 'KuesionerAdmin::databelumisi');
$routes->post('/(?i)kuesioner-admin/(?i)databelumisi', 'KuesionerAdmin::databelumisi');

// ALUMNI ADMIN
$routes->get('/(?i)alumni-admin', 'AlumniAdmin::index');
$routes->post('/(?i)alumni-admin', 'AlumniAdmin::index');
$routes->post('/(?i)alumni-admin/(?i)ajax', 'AlumniAdmin::ajax');
$routes->get('/(?i)alumni-admin/(?i)create', 'AlumniAdmin::create');
$routes->post('/(?i)alumni-admin/(?i)save', 'AlumniAdmin::save');
$routes->get('/(?i)alumni-admin/(?i)edit/(:num)', 'AlumniAdmin::edit/$1');
$routes->post('/(?i)alumni-admin/(?i)update/(:num)', 'AlumniAdmin::update/$1');
$routes->get('/(?i)alumni-admin/(?i)activation', 'AlumniAdmin::activation');
$routes->post('/(?i)alumni-admin/(?i)activate/(:num)', 'AlumniAdmin::activate/$1');
$routes->post('/(?i)alumni-admin/(?i)deny/(:num)', 'AlumniAdmin::deny/$1');
$routes->post('/(?i)alumni-admin/(?i)deactivate/(:num)', 'AlumniAdmin::deactivate/$1');
$routes->post('/(?i)alumni-admin/(?i)resetpassword/(:num)', 'AlumniAdmin::resetpassword/$1');
$routes->delete('/(?i)alumni-admin/(?i)delete/(:num)', 'AlumniAdmin::delete/$1');
$routes->get('/(?i)alumni-admin/(:num)', 'AlumniAdmin::details/$1');

// ADMIN
$routes->get('/(?i)admin', 'Admin::index');
$routes->post('/(?i)admin', 'Admin::index');
$routes->get('/(?i)admin/(?i)create', 'Admin::create');
$routes->post('/(?i)admin/(?i)save', 'Admin::save');
$routes->get('/(?i)admin/(?i)edit/(:num)', 'Admin::edit/$1');
$routes->post('/(?i)admin/(?i)update/(:num)', 'Admin::update/$1');
$routes->post('/(?i)admin/(?i)activate/(:num)', 'Admin::activate/$1');
$routes->post('/(?i)admin/(?i)deactivate/(:num)', 'Admin::deactivate/$1');
$routes->post('/(?i)admin/(?i)resetpassword/(:num)', 'Admin::resetpassword/$1');
$routes->delete('/(?i)admin/(?i)delete/(:num)', 'Admin::delete/$1');
$routes->get('/(?i)admin/(:num)', 'Admin::details/$1');

// PROFIL ADMIN
$routes->get('/(?i)profil-admin', 'ProfilAdmin::index');
$routes->post('/(?i)profil-admin', 'ProfilAdmin::index');
$routes->get('/(?i)profil-admin/(?i)edit', 'ProfilAdmin::edit');
$routes->post('/(?i)profil-admin/(?i)update', 'ProfilAdmin::update');
$routes->post('/(?i)profil-admin/(?i)delprofilephoto', 'ProfilAdmin::delprofilephoto');

// CHANGE PASSWORD ADMIN
$routes->get('/(?i)changepassword-admin', 'ChangePasswordAdmin::index');
$routes->post('/(?i)changepassword-admin/(?i)update', 'ChangePasswordAdmin::update');
