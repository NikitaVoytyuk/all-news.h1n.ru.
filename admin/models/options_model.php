<?php
/**
 * Массив настроек сайта для редактирования
 **/
function get_options(){
    global $connection;
    $query = "SELECT * FROM options";
    $res = mysqli_query($connection, $query);
    if($res){
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
    return false;
}

function save_options(){
    global $connection;
    $options = ['email', 'pagination', 'site_title'];
    if(!in_array($_GET['title'], $options)) return false;
    $value = mysqli_real_escape_string($connection, $_GET['val']);
    $query = "UPDATE options SET value = '$value' WHERE title = '{$_GET['title']}'";
    $res = mysqli_query($connection, $query);
    if(mysqli_affected_rows($connection) > 0){
        return true;
    }else{
        return false;
    }
}

/*function get_themes(){
    $themes_path = __DIR__ . '/../../views/';
    $dirs = scandir($themes_path);
    $themes = [];
    foreach($dirs as $item){
        if( is_dir($themes_path . $item) && $item != '.' && $item != '..' ){
            $themes[] = $item;
        }
    }
    return $themes;
}*/