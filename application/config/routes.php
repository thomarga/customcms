<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'dashboard';

// admin posts routes
// $route['cms-admin/post/(:any)'] = 'cms-admin/post/viewpost/$1';
$route['posts-all'] = 'post';
$route['post-new'] = 'post/add';

// admin category routes
// $route['cms-admin/category/(:any)'] = 'cms-admin/category/view';
// $route['cms-admin/category/savecategory'] = 'cms-admin/category/savecategory';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
