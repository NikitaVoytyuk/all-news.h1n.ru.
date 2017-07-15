<?php
include "models/{$view}_model.php";
include 'main_controller.php';

if (isset($_POST['add_product'])){
    add_product();
}

require_once "views/{$view}.php";