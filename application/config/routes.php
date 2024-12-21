<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';
$route['404_override'] = 'findcontent';
$route['translate_uri_dashes'] = TRUE;
 
$route['admin'] = 'admin/dashboard';
$route['about-us'] = '/pages/index/about-us';
$route['contact-us'] = '/pages/index/contact-us';
$route['how-it-work'] = '/pages/index/how-it-work';
$route['Listing_map/index(:any)'] = 'listing_map/index'; 
$controllers_methods = array(
    'en' => array(
        'welcome/list' => 'welcome/list',
        'welcome' => 'welcome',
        'post' => 'post',
		'presentation' => 'presentation'
    ),
    'fr' => array(
        'bienvenu/list' => 'welcome/list',
        'bienvenu' => 'welcome',
		'post' => 'post',
		'presentation' => 'presentation'
    ),
	 'ar' => array(
        'bienvenu/list' => 'welcome/list',
        'bienvenu' => 'welcome',
		'post' => 'post',
		'presentation' => 'presentation'
    )
);


 $route['^(\w{2})/(.*)$'] = '$2';

 $route['^(\w{2})/(.*)$'] = '$2';
 $route['^(\w{2})$'] = $route['default_controller'];



/* End of file routes.php */
/* Location: ./application/config/routes.php */


$route['api/user/register'] = 'api/users/register';
$route['api/user/login'] = 'api/users/login';
$route['api/user/users'] = 'api/users/users';
$route['api/Listings/get'] = 'api/Listings/getall';



// Users Article Routes
$route['api/article/create'] = 'api/articles/createArticle';

// Deleta an Article Routes
# https://codeigniter.com/user_guide/general/routing.html#using-http-verbs-in-routes
$route['api/article/(:num)/delete']["DELETE"] = 'api/articles/deleteArticle/$1';

// Update and Article Route :: PUT API Request
$route['api/article/update']["put"] = 'api/articles/updateArticle';