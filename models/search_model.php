<?php
/**
 * поиск автокомплит
 **/
function search_autocomplete(){
    global $connection;
    $search = trim(mysqli_real_escape_string($connection, $_GET['term']));
    $query = "SELECT id,title FROM news WHERE title LIKE '%{$search}%' LIMIT 10";
    $query2 = "SELECT id,title FROM categories WHERE title LIKE '%{$search}%' LIMIT 10";
    $res = mysqli_query($connection, $query);
    $res2 = mysqli_query($connection, $query2);
    $result_search = array();
    while($row = mysqli_fetch_assoc($res)){
        $result_search[] = array('label' => $row['title'], 'category' => 'Title');
    }
    while($row = mysqli_fetch_assoc($res2)){
        $result_search[] = array('label' => $row['title'], 'category' => 'Category');
    }
    return $result_search;
}
/**
 * кол-во результатов поиска
 **/
function count_search(){
    global $connection;
    $search = trim(mysqli_real_escape_string($connection, $_GET['search']));
    $query = "SELECT COUNT(*) FROM news WHERE title LIKE '%{$search}%'";
    $res = mysqli_query($connection, $query);
    $count_search = mysqli_fetch_row($res);
    return $count_search[0];
}

/**
 * поиск
 **/
function search($start_pos, $perpage){
    global $connection;
    $search = trim(mysqli_real_escape_string($connection, $_GET['search']));
    $query = "SELECT id, title, image_url FROM news WHERE title LIKE '%{$search}%' LIMIT $start_pos, $perpage";
    $query2 = "SELECT id, title FROM categories WHERE title LIKE '%{$search}%' LIMIT $start_pos, $perpage";
    $res = mysqli_query($connection, $query);
   $res2 = mysqli_query($connection, $query2);
    if( !mysqli_num_rows($res) ){
        return 'Ничего не найдено';
    }
    $result_search = array();
    while($row = mysqli_fetch_assoc($res)){
        $result_search[] = $row;
    }
    while($row = mysqli_fetch_assoc($res2)){
        $result_search[] = $row;
    }
    return $result_search;
}
