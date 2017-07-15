<?php

function escape_data($type = 'post'){
    global $connection;
    $data = [];
    if($type == 'post'){
        $data = $_POST;
    }elseif ($type == 'get'){
        $data = $_GET;
    }
    foreach($data as $k => $v){
        $data[$k] = mysqli_real_escape_string($connection, $v);
    }
    return $data;
}

function get_flash(){
    require __DIR__ . '/../../views/flash.php';
}