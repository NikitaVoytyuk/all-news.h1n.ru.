<?php defined("CATALOG") or die("Access denied");

require_once 'main_controller.php';
require_once "models/{$view}_model.php";


if( !isset($id) ) $id = null;

$get_one_product = get_one_product($id);
// получаем ID категории
$news_id = $get_one_product['parent'];

// ID товара
$id = $get_one_product['id'];
// кол-во комментариев
$count_comments = count_comments($id);
// получаем комментарии к товару
$get_comments = get_comments($id);
// строим дерево
$comments_tree = map_tree($get_comments);
// получаем HTML-код комментариев
$comments = categories_to_string($comments_tree, 'comments_template.php');

//include 'libs/breadcrumbs.php';
if (isset($get_one_product['text'])){
    $text = $get_one_product['text'];
    $row[] = '';
    $text = explode(".",$get_one_product['text']);
    $text=array_slice($text,0,5);
    $low_text=implode(".",$text);
}
// счетчик просмотров

if(isset($get_one_product['views'])){
    $view_now = rand(0,5);
    $views = $get_one_product['views'] + $view_now;
    count_views($views, $id);
}

//получаем таги
$get_tags = get_tags($id);

$get_news_for_tags = get_news_for_tags();


/*$view_now = rand(0,5);
$views = $views + $view_now;*/


require_once "views/{$view}.php";
