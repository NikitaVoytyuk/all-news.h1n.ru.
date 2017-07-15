<?php
$path = 'uploads/';
// Массив допустимых значений типа файла
$types = array('image/gif', 'image/png', 'image/jpeg');
// Максимальный размер файла
$size = 1024000;

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Проверяем тип файла
    if (!in_array($_FILES['picture']['type'], $types))
        die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');

    // Проверяем размер файла
    if ($_FILES['picture']['size'] > $size)
        die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');

    // Загрузка файла и вывод сообщения
    if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
        echo 'Что-то пошло не так';
    else
        echo 'Загрузка удачна <a href="' . $path . $_FILES['picture']['name'] . '">Посмотреть</a> ' ;
}
