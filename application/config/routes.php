<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['forgot-password']                = 'auth/forgot_password';
$route['forgot-password/send']           = 'auth/send_reset_link';
$route['reset-password/(:any)/(:any)']   = 'auth/reset_password/$1/$2';    // selector/token
$route['reset-password/submit']          = 'auth/reset_password_submit';
$route['operations/create'] = 'operations/create';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


