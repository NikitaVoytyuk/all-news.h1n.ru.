<?php defined("CATALOG") or die("Access denied");

/**
* Получение отдельного товара
**/
function get_one_product($product_id)
{
    global $connection;
    $query = "SELECT * FROM news WHERE id = '$product_id'";
    $res = mysqli_query($connection, $query);
    return mysqli_fetch_assoc($res);
}


/**
* Получение комментариев
**/
function get_comments($product_id){
	global $connection;
	$query = "SELECT * FROM comments WHERE comment_product = '$product_id' ORDER BY comment_id";
	$res = mysqli_query($connection, $query);
	$comments = array();
	while($row = mysqli_fetch_assoc($res)){
		$comments[$row['comment_id']] = $row;
	}
	return $comments;
}

/**
* Получение кол-ва комментариев
**/
function count_comments($product_id){
	global $connection;
	$query = "SELECT COUNT(*) FROM comments WHERE comment_product = '$product_id'";
	$res = mysqli_query($connection, $query);
    $row = mysqli_fetch_row($res);
	return $row[0];
}

/**
 * Счетчик просмотров
 */
/* Обновление счетчиков для записи с указанным id */
function UpdateCounders($id, $all, $today)
{
    /*$id = addslashes($id);
    $time = addslashes($time);
    $result = mysql_query ("UPDATE `my_log` SET `all` = '".$all."',`today` = '".$today."' WHERE `page_id` = '".$id."'");
    return $result;*/
}

/**
 * Просмотры
 */



function count_views($product_id, $views){
    global $connection;
    $query = "UPDATE news SET views = $views WHERE id = $product_id ";
    $res = mysqli_query($connection, $query);
    if(mysqli_affected_rows($connection) > 0){
        return true;
    }else{
        return false;
    }
}


/**
 * Теги
 */

function get_tags($id){
    global $connection;
    $query = "SELECT id, keywords FROM news WHERE id = $id";
    $res = mysqli_query($connection, $query);

    if(!$res || mysqli_num_rows($res) == 0) {
		return FALSE;
	}
	for($i = 0;$i < mysqli_num_rows($res); $i++) {
        $row[] = mysqli_fetch_array($res,MYSQLI_ASSOC);
    }
	return $row;
}


function get_news_for_tags(){
    global $connection;
    $query = "SELECT id, title, keywords FROM news ORDER BY keywords";
    $res = mysqli_query($connection, $query);
    return mysqli_fetch_assoc($res);
}
