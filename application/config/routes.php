<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';


// admin Routes
$route['admin'] = 'admin/user/dashboard';

$route['admin/category'] = 'admin/category/category_index';
 
$route['admin/category'] = 'admin/category/category_data_edit';


$route['admin/subcategory'] = 'admin/subcategory/subcategory_index';

$route['admin/blog'] = 'admin/blog/blog_index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 