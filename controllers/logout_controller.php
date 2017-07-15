<?php defined("CATALOG") or die("Access denied");

require_once "models/main_model.php";
unset($_SESSION['auth']);
redirect();
