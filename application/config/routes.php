<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'dashboard';

// admin posts routes
// $route['cms-admin/post/(:any)'] = 'cms-admin/post/viewpost/$1';
$route['cms-admin/posts-all'] = 'cms-admin/post';
$route['cms-admin/post-new'] = 'cms-admin/post/add';

// admin category routes
// $route['cms-admin/category'] = 'cms-admin/category';
// $route['cms-admin/category/savecategory'] = 'cms-admin/category/savecategory';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
