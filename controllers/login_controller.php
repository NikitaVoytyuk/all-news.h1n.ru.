<?php defined("CATALOG") or die("Access denied");

require_once "models/main_model.php";
require_once "models/{$view}_model.php";

if(isset($_POST['log_in'])){
	authorization();
	redirect();
}else{
	header("Location: " . PATH);
}

?>