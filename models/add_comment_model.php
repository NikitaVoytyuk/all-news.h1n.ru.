<?php defined("CATALOG") or die("Access denied");

/**
* добавление комментария
**/
function add_comment(){
	global $connection;
	$comment_author = trim(mysqli_real_escape_string($connection, $_POST['commentAuthor']));
	$comment_text = trim(mysqli_real_escape_string($connection, $_POST['commentText']));
	$parent = (int)$_POST['parent'];
	$comment_product = (int)$_POST['productId'];
	$is_admin = isset($_SESSION['auth']['is_admin']) ? $_SESSION['auth']['is_admin'] : 0;

	// если нет ID товара
	if(!$comment_product){
		$res = array('answer' => 'Неизвестный продукт!');
		return json_encode($res);
	}

	// если не заполнены поля
	if(empty($comment_author) OR empty($comment_text)){
		$res = array('answer' => 'Все поля обязательны к заполнению');
		return json_encode($res);
	}

	$query = "INSERT INTO comments (comment_author, comment_text, parent, comment_product, is_admin)
				VALUES ('$comment_author', '$comment_text', $parent, $comment_product, $is_admin)";
	$res = mysqli_query($connection, $query);
	if(mysqli_affected_rows($connection) > 0){
		$comment_id = mysqli_insert_id($connection);
		$comment_html = get_last_comment($comment_id);
		return $comment_html;
	}else{
		$res = array('answer' => 'Ошибка добавления комментария');
		return json_encode($res);
	}
}

/**
* получение добавленного комментария
**/
function get_last_comment($comment_id){
	global $connection;
	$query = "SELECT * FROM comments WHERE comment_id = $comment_id";
	$res = mysqli_query($connection, $query);
	$comment = mysqli_fetch_assoc($res);
	ob_start();
	include 'views/new_comment.php';
	$comment_html = ob_get_clean();
	$res = array('answer' => 'Комментарий добавлен!', 'code' => $comment_html, 'id' => $comment_id);
	return json_encode($res);
}

/**
 * Лайки
 */

/*function get_likes(){
    global $connection;
    $id = (int)$_POST['comment_id'];
    $action = $_POST['action'];

    $query = mysqli_query($connection,"SELECT comment_id FROM comments WHERE comment_id = '$id'");
    $count = mysqli_num_rows($query);

    if ($count == 0) {
        $query = mysqli_query($connection,"SELECT comment_id, likes, dislikes FROM comments 
                                                      WHERE comments_id = '$id'");
        $row = mysqli_fetch_array($query);
        $nowPlus = $row['likes']; $nowMinus = $row['dislikes'];

        if ($row['comment_id']=='') {
            mysqli_query($connection,"INSERT INTO comments (comment_id, likes, dislikes) 
                                                  VALUES ( '$id',  '0',  '0');");
            $nowPlus = 0; $nowMinus = 0;
        }

        if ($action == 'plus') {
            $nowPlus = $nowPlus + 1;
            $upR = mysqli_query($connection,"UPDATE comments  SET likes = likes+1 WHERE comment_id = '$id'");
        } else {
            $nowMinus = $nowMinus + 1;
            $upR = mysqli_query($connection,"UPDATE comments SET dislikes = dislikes+1 WHERE comment_id = '$id'");
        }

        mysqli_query($connection,"INSERT INTO comments (comments_id) VALUES ( '$id' )");

        echo ($nowPlus-$nowMinus);
    } else {
        echo 'Повторное голосование!';
    }
}

function callrating ($comment_id, $typethumb = '', $liked = '') {
    global $connection;
    $result = mysqli_query($connection,"SELECT likes, dislikes FROM comments WHERE icomment_id = (int)$comment_id");
    $row = mysqli_fetch_array($result);*/?><!--
<div class="rating <?/*=$typethumb*/?>">
		<a class="rate plus" id="pid_<?/*=$comment_id*/?>" href="#"></a>
		<div id="rateresult-<?/*=$comment_id*/?>"><?/*=$row['likes']-$row['dislikes']*/?></div>
<?php /*if ($liked == '') { */?>
    <a class="rate minus" id="pid_<?/*=$comment_id*/?>" href="#"></a>
<?php /*} else {
    echo $liked;
} */?>
</div>
    --><?php
/*    return $row;
}*/

