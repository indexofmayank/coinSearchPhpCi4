<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/singup', 'Home::singup');
$routes->get('/login', 'Home::login');
$routes->get('/homepage', 'Home::homepage');
$routes->get('/cryptopage', 'Home::crypto');


$routes->get('/signup', 'AuthController::signup');
$routes->post('/signup', 'AuthController::processSignup');
