<?php
//error_reporting(E_ALL);
define("CATALOG", TRUE);
session_start();

$routes = array(
	array('url' => '#^$|^\?#', 'view' => 'index'),
	array('url' => '#^product/(?P<id>[a-z0-9-]+)#i', 'view' => 'product'),
	array('url' => '#^category/(?P<id>\d+)#i', 'view' => 'category'),
	array('url' => '#^add_comment#i', 'view' => 'add_comment'),
	array('url' => '#^login#i', 'view' => 'login'),
	array('url' => '#^logout#i', 'view' => 'logout'),
	array('url' => '#^forgot#i', 'view' => 'forgot'),
    array('url' => '#^reg#i', 'view' => 'reg'),
    array('url' => '#^search#i', 'view' => 'search'),
);

// $url = str_replace('/catalog/', '', $_SERVER['REQUEST_URI']);
$url = ltrim($_SERVER['REQUEST_URI'], '/');

foreach ($routes as $route) {
	if( preg_match($route['url'], $url, $match) ){
		$view = $route['view'];
		break;
	}
}

if( empty($match) ){
	include 'views/404.php';
	exit;
}

extract($match);
// $id - ID категории
// $product_alias - alias продукта
// $view - вид для подключения
require_once 'config.php';
require_once "controllers/{$view}_controller.php";