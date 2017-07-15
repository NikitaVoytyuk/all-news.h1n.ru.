<?php defined("CATALOG") or die("Access denied");

require_once 'models/main_model.php';

$options = get_options_use();
$goods = get_goods();
$goods2 = get_goods2();
//$theme = PATH . "views/{$options['theme']}/";

$categories = get_cat();
$categories_tree = map_tree($categories);
$categories_menu = categories_to_string($categories_tree);

