<?php
require_once 'main_controller.php';
require_once "models/{$view}_model.php";
require_once "../models/{$view}_model.php";

if( !isset($id) ) $id = null;

// ID дочерних категорий
$ids = cats_id($categories, $id);
$ids = !$ids ? $id : rtrim($ids, ",");
/*=========Пагинация==========*/

// кол-во товаров на страницу
$perpage = 6;

// общее кол-во товаров
$count_goods = count_goods($ids);

// необходимое кол-во страниц
$count_pages = ceil($count_goods / $perpage);
// минимум 1 страница
if( !$count_pages ) $count_pages = 1;

// получение текущей страницы
if( isset($_GET['page']) ){
    $page = (int)$_GET['page'];
    if( $page < 1 ) $page = 1;
}else{
    $page = 1;
}

// если запрошенная страница больше максимума
if( $page > $count_pages ) $page = $count_pages;

// начальная позиция для запроса
$start_pos = ($page - 1) * $perpage;

$pagination = pagination($page, $count_pages);

/*=========Пагинация==========*/

$products = get_products($ids, $start_pos, $perpage);

require_once "views/{$view}.php";