<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/


//forms
$route['scans/new/(:any)'] = 'scans/create/$1';
$route['scans/location'] = 'scans/location';

$route['keyboards/new/(:any)'] = 'keyboards/create/$1';
$route['keyboards/location'] = 'keyboards/location';


//reports
$route['reports'] = 'reports/index';
$route['reports/deliveries'] = 'reports/deliveries';
$route['reports/revisions'] = 'reports/revisions';


//users
$route['users/register'] = 'users/register';
$route['users/login'] = 'users/login';
$route['users/profile'] = 'users/profile';
$route['users/logout'] = 'users/logout';
$route['users/index'] = 'useraccounts/index';
$route['users/(:any)'] = 'useraccounts/view/$1';


//pages
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
