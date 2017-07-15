<?php
function add_product(){
    global $connection;
    $path = '../uploads/';
// Массив допустимых значений типа файла
    $types = array('image/gif', 'image/png', 'image/jpeg');
// Максимальный размер файла
    $size = 1024000;
    $fot = $path . $_FILES['uploadfile']['name'];
    $data = escape_data();

// Обработка запроса
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Проверяем тип файла
        if (!in_array($_FILES['uploadfile']['type'], $types))
            die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');

        // Проверяем размер файла
        if ($_FILES['uploadfile']['size'] > $size)
            die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');

        // Загрузка файла и вывод сообщения
        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $fot))
            echo '<a href="' . $fot . '">';
        }
    $query = "INSERT INTO news (parent, title, description, text, keywords, author, image_url) 
              VALUES ('{$data['parent']}','{$data['title']}','{$data['description']}', '{$data['text']}',
              '{$data['keywords']}', '{$data['author']}','{$_FILES['uploadfile']['name']}' )";
    $res = mysqli_query($connection, $query) or die(mysqli_error($connection));
    if(htmlspecialchars(mysqli_affected_rows($connection) > 0)){
        $_SESSION['res']['ok'] = 'Статья добавлена';
    }else{
        $_SESSION['res']['error'] = 'Ошибка добавления статьи!';
    }
}
