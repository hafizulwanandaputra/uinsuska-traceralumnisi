<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// BERANDA
$routes->get('/', 'Web::index');
$routes->get('/(?i)about', 'Web::about');

// AUTH ALUMNI
$routes->get('/(?i)login', 'Auth::index');
$routes->post('/(?i)check-login', 'Auth::check_login');
$routes->get('/(?i)activation', 'Auth::activation');
$routes->post('/(?i)activate', 'Auth::activate');
$routes->get('/(?i)logout', 'Auth::logout');

// BERANDA ALUMNI
$routes->get('/(?i)home', 'Home::index');
$routes->post('/(?i)home', 'Home::index');

// PENGUMUMAN ALUMNI
$routes->get('/(?i)pengumuman', 'Pengumuman::index');
$routes->post('/(?i)pengumuman', 'Pengumuman::index');

// KUESIONER ALUMNI
$routes->get('/(?i)kuesioner', 'Kuesioner::index');
$routes->post('/(?i)kuesioner', 'Kuesioner::index');
$routes->get('/(?i)kuesioner/(?i)create', 'Kuesioner::create');
$routes->post('/(?i)kuesioner/(?i)save', 'Kuesioner::save');
$routes->get('/(?i)kuesioner/(?i)edit', 'Kuesioner::edit');
$routes->post('/(?i)kuesioner/(?i)update/(:num)', 'Kuesioner::update/$1');
$routes->delete('/(?i)kuesioner/(?i)delete/(:num)', 'Kuesioner::delete/$1');

// PROFIL ALUMNI
$routes->get('/(?i)profil', 'Profil::index');
$routes->post('/(?i)profil', 'Profil::index');
$routes->get('/(?i)profil/(?i)edit', 'Profil::edit');
$routes->post('/(?i)profil/(?i)update', 'Profil::update');
$routes->post('/(?i)profil/(?i)delprofilephoto', 'Profil::delprofilephoto');

// CHANGE PASSWORD ALUMNI
$routes->get('/(?i)changepassword', 'ChangePassword::index');
$routes->post('/(?i)changepassword/(?i)update', 'ChangePassword::update');
