<?php

// 1. Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.

if (empty($_GET['dir'])) {
    $path = '/';
} else {
    $path = $_GET['dir'] . '/';
}
$dir = new DirectoryIterator($path);
foreach ($dir as $item) {
    echo "<a href='Lesson1.php?dir=$path$item'>$item</a><br>";
}


// 2. Попробовать определить, на каком объеме данных применение итераторов становится выгоднее,
// чем использование чистого foreach.


/*$myArray = array();
for ($i = 0; $i < 1000000; $i++) {
    $myArray[] = "item$i";
}

$timeArray1 = time();
echo "$timeArray1<br>";

foreach ($myArray as $value) {
    $a = md5($value);
}

$timeArray2 = time();
echo "$timeArray2<br>";

$iter = new ArrayIterator($myArray);
while($iter->valid()) {
    $b = md5($iter->current());
    $iter->next();
}

$timeArray3 = time();
echo "$timeArray3<br>";

$timeArray = $timeArray2 - $timeArray1;
$timeIter = $timeArray3 - $timeArray2;

echo "<p>Время отработки foreach $timeArray </p><br>";
echo "<p>Время отработки итератора $timeIter </p><br>";*/

// 3.*Создать PHP-демон, который принимает от пользователя сообщения.
// Создать отдельный интерфейс с кнопкой, возвращающей самое старое сообщение
// на экран и удаляющее его. Базы данных, файлы и иные хранилища не использовать.

/*
$queue = new SplQueue;
$socket = stream_socket_server("tcp://0.0.0.0:1666");
while ($connection = stream_socket_accept($socket, -1)) {
    fwrite($connection, 'Hello');
    $data = fread($connection, 1024);
    if ($data == 0) {
        $lastMessage = $queue->dequeue();
    } else {
        $queue->enqueue($data);
        fwrite($connection, "\r\ndata saved!\r\n");
    }
    fclose($connection);
}*/
