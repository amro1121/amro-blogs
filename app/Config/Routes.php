<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::register');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->post('logout', 'AuthController::logout');
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('forgot-password', 'PasswordResetController::forgotPassword');
$routes->post('forgot-password', 'PasswordResetController::forgotPassword');
$routes->get('reset-password/(:any)', 'PasswordResetController::resetPassword/$1');
$routes->post('reset-password/(:any)', 'PasswordResetController::resetPassword/$1');
$routes->get('posts/create', 'PostController::create', ['filter' => 'auth']);
$routes->post('posts', 'PostController::store', ['filter' => 'auth']);


