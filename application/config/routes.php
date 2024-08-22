<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Home';
$route['about-us'] = 'pages/index/$1';
$route['applications'] = 'pages/applications/$1';
$route['pages/wall-art'] = 'pages/wallart';
$route['pages/metal-screens-jalis'] = 'pages/metalscreens_jalis';
$route['pages/stone-inlaysmedallionsstone-borders'] = 'pages/stoneinlays';
$route['pages/stone-water-features-landscaping'] = 'pages/stonewaterfeatures';
$route['pages/metal-railings-gates'] = 'pages/metalrailings_gates';
$route['pages/metal-stone-furniture'] = 'pages/metalstone_furniture';
$route['pages/stone-ribbingflute'] = 'pages/stoneribbing_marbleflute';
$route['pages/powder-coating'] = 'pages/powdercoating';
$route['pages/fabrication'] = 'pages/fabrication';
$route['pages/installation'] = 'pages/installation';
$route['gallery'] = 'pages/gallery';
$route['patterns'] = 'pages/patterns';
$route['materials'] = 'pages/materials';
$route['faq'] = 'pages/faq';
$route['contact-us'] = 'pages/contact_us';


// admin Routes
$route['admin'] = 'admin/user/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 