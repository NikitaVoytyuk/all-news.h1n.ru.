<?php
/**
 * изменение тегов
 * */
function update_tags(){
    global $connection;
    $id = (int) $_GET['title'];
    $tags = $_GET['keywords'];
    $query = "UPDATE news SET keywords = '$tags' WHERE id = $id";
    $res = mysqli_query($connection, $query);
    if(mysqli_affected_rows($connection) > 0){
        return true;
    }else{
        return false;
    }
}

/**
 * удаление новости
 * */

function del_product(){
    global $connection;
    $id = (int) $_GET['id'];
    $query = "DELETE FROM news WHERE id = $id";
    $res = mysqli_query($connection, $query);
    if(mysqli_affected_rows($connection) > 0){
        return true;
    }else{
        return false;
    }
}

/**
 * Получение отдельного товара
 */
function get_one_product($product_id){
    global $connection;
    $product_id = (int)$product_id;
    $query = "SELECT * FROM news WHERE id = $product_id";
    $res = mysqli_query($connection, $query);
    return mysqli_fetch_assoc($res);
}

function edit_product(){
    global $connection;
    $data = escape_data();
    $query = "UPDATE news SET title = '{$data['title']}',description = '{$data['description']}', keywords = '{$data['keywords']}', text = '{$data['text']}' WHERE id = {$data['id']}";
    $res = mysqli_query($connection, $query);
    if(htmlspecialchars(mysqli_affected_rows($connection) > 0)){
        $_SESSION['res']['ok'] = 'Товар обновлен';
    }else{
        $_SESSION['res']['error'] = 'Ошибка редактирования товара! Возможно вы ничего не меняли';
    }
}
