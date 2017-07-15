<?php
require_once 'main_controller.php';
require_once "models/{$view}_model.php";


if( isset($_GET['term']) ){
    $result_search = search_autocomplete();
    exit( json_encode($result_search) );
}elseif( isset($_GET['search']) && $_GET['search'] ){
    /*=========Пагинация==========*/

    // кол-во товаров на страницу
    $perpage = $options['pagination'];

    // общее кол-во товаров
    $count_goods = count_search();

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
    $result_search = search($start_pos, $perpage);

}
else{
    $result_search = 'А что вы ищете?';
}


require_once "views/{$view}.php";