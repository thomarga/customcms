<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'dashboard';

// admin posts routes
$route['posts-all'] = 'post';
$route['post-new'] = 'post/addpost';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
