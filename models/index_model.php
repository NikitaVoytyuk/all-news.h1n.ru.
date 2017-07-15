<?php

function get_last_news(){
    global $connection;
    $query = "SELECT id, title, image_url from news ORDER BY id DESC LIMIT 5";
    $res = mysqli_query($connection, $query);
    $last_news = array();
    while($row = mysqli_fetch_assoc($res)){
        $last_news[] = $row;
    }
    return $last_news;
}

function get_all_last_news(){
    global $connection;
    $query = "(SELECT id, title FROM news WHERE parent = 1 ORDER BY id DESC LIMIT 5)
                    UNION 
              (SELECT id, title FROM news WHERE parent = 2 ORDER BY id DESC LIMIT 5) 
                    UNION 
              (SELECT id, title FROM news WHERE parent = 5 ORDER BY id DESC LIMIT 5) 
                    UNION 
              (SELECT id, title FROM news WHERE parent = 6 ORDER BY id DESC LIMIT 5) 
                    UNION 
              (SELECT id, title FROM news WHERE parent = 7 ORDER BY id DESC LIMIT 5)";
    $res = mysqli_query($connection, $query);
    $last_all_news = array();
    while($row = mysqli_fetch_assoc($res)){
        $last_news[] = $row;
    }
    return $last_all_news;
}

function get_last_news_par1(){
    global $connection;
    $query = "SELECT * from news WHERE parent = 1 ORDER BY id DESC LIMIT 5";
    $res = mysqli_query($connection, $query);
    $last_news_par1 = array();
    while($row = mysqli_fetch_assoc($res)){
        $last_news_par1[] = $row;
    }
    return $last_news_par1;
}

function get_last_news_par2(){
    global $connection;
    $query = "SELECT * from news WHERE parent = 2 ORDER BY id DESC LIMIT 5";
    $res = mysqli_query($connection, $query);
    $last_news_par1 = array();
    while($row = mysqli_fetch_assoc($res)){
        $last_news_par1[] = $row;
    }
    return $last_news_par1;
}
function get_last_news_par5(){
    global $connection;
    $query = "SELECT * from news WHERE parent = 5 ORDER BY id DESC LIMIT 5";
    $res = mysqli_query($connection, $query);
    $last_news_par1 = array();
    while($row = mysqli_fetch_assoc($res)){
        $last_news_par1[] = $row;
    }
    return $last_news_par1;
}
function get_last_news_par6(){
    global $connection;
    $query = "SELECT * from news WHERE parent = 6 ORDER BY id DESC LIMIT 5";
    $res = mysqli_query($connection, $query);
    $last_news_par1 = array();
    while($row = mysqli_fetch_assoc($res)){
        $last_news_par1[] = $row;
    }
    return $last_news_par1;
}
function get_last_news_par7(){
    global $connection;
    $query = "SELECT * from news WHERE parent = 7 ORDER BY id DESC LIMIT 5";
    $res = mysqli_query($connection, $query);
    $last_news_par1 = array();
    while($row = mysqli_fetch_assoc($res)){
        $last_news_par1[] = $row;
    }
    return $last_news_par1;
}

function get_commentors(){
    global $connection;
    $query = "SELECT comment_author, COUNT(*) count 
                  FROM comments GROUP BY comment_author 
                    ORDER BY count DESC LIMIT 5";
    $res = mysqli_query($connection, $query);
    $commentators = array();
    while($row = mysqli_fetch_assoc($res)){
        $commentators[] = $row;
    }
    return $commentators;
}