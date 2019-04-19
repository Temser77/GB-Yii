<?php

// 1. Реализовать вывод меню на основе ​Closure table​.

// берем данные из БД
$sqlconnection = new PDO('mysql:host=localhost;dbname=gb-yii;charset=utf8', 'root', '');
$query = "SELECT * FROM categories JOIN category_links ON categories.id = category_links.cid;";
$q = $sqlconnection->prepare($query);
$q->execute();
$cats = $q->fetchall(PDO::FETCH_ASSOC);



// строим иерархическую структуру
function buildTree($cats, $id = 1, $level = 0)
{
    $result = [];
    foreach ($cats as $row) {
        if (((int)$row['pid'] == $id) && ((int)$row['level'] - $level == 1)) {
            $result[$row['name']] = buildTree($cats, (int)$row['id'], (int)$row['level']);
        }
    }
    return $result;
}

//$rebuildArray = buildTree($cats);

// вывподим иерархическую структуру в html в виде списка
function renderTree(array $tree) {
    $result = "<ul>";
    foreach ($tree as $name => $branch) {
        if (count($branch) > 0) {
            $result .= "<li>" . $name . renderTree($branch) . "</li>";
        } else {
            $result .= "<li>" . $name . "</li>";
        }
    }
    $result .= "</ul>";
    return $result;
}

// TODO РАСКОММЕНТИРОВАТЬ
//echo renderTree($rebuildArray);



// 3* Реализовать вывод меню на основе Nested sets​.

//берем данные из БД
$query2 = "SELECT * FROM nested_sets;";
$q2 = $sqlconnection->prepare($query2);
$q2->execute();
$nest = $q2->fetchall(PDO::FETCH_ASSOC);
$nestMaxRight = count($nest) * 2;

// строим иерархическую структуру
function treeFromNest($nest, $right, $left=1, $depth=1) {
    $result =[];
    foreach ($nest as $row) {
        if (((int)$row['left'] > $left) && ((int)$row['right'] < $right ) && ((int)$row['depth'] - $depth == 1)) {
            $result[$row['name']] = treeFromNest($nest, (int)$row['right'], (int)$row['left'], (int)$row['depth']);
        }
    }
    return $result;
}

// вывподим иерархическую структуру в html в виде списка
//$rebuildArrayNest = treeFromNest($nest, $nestMaxRight);

// TODO РАСКОММЕНТИРОВАТЬ
// echo renderTree($rebuildArrayNest);



// 2. Дано слово, состоящее только из строчных латинских букв. Проверить, является ли оно
// палиндромом. При решении этой задачи нельзя пользоваться циклами.

function isPalindrome($string)
{
    $length = mb_strlen($string);
    if ($length == 1) {
        return 'YES';
    }
    if ($string[0] != $string[$length - 1]) {
        return 'NO';
    } else {
        $newstring = mb_substr($string, 1, $length - 2);
        return isPalindrome($newstring);
    }
}


//echo isPalindrome('ТОПОТ');


