<?php
require_once 'main_controller.php';
require_once "models/{$view}_model.php";


$get_last_news = get_last_news();

$get_last_news_par1 = get_last_news_par1();
$get_last_news_par2 = get_last_news_par2();
$get_last_news_par5 = get_last_news_par5();
$get_last_news_par6 = get_last_news_par6();
$get_last_news_par7 = get_last_news_par7();

$get_commentators = get_commentors();
require_once "views/{$view}.php";