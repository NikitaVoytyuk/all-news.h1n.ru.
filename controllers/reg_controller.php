<?php defined("CATALOG") or die("Access denied");

require_once 'main_controller.php';
require_once "models/{$view}_model.php";

if(isset($_POST['val'])){
    echo access_field();
    exit;
}

if(isset($_POST['reg'])){
    registration();
    redirect();
}


require_once "views/{$view}.php";
