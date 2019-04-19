<?php

$cats = [
    [
        'id' => 1,
        'name' => 'Main',
        'pid' => 0
    ],
    [
        'id' => 2,
        'name' => 'Something',
        'pid' => 0
    ],
    [
        'id' => 3,
        'name' => 'Three',
        'pid' => 2
    ],
    [
        'id' => 4,
        'name' => 'Four',
        'pid' => 1
    ],
    [
        'id' => 5,
        'name' => 'Five',
        'pid' => 3
    ],
];

function rebuildArray($cats)
{
    $result = [];

    foreach ($cats as $cat) {
        if (!isset($result[$cat['pid']])) {
            $result[$cat['pid']] = [];
        }

        $result[$cat['pid']][] = $cat;
    }
    return $result;
}

//print_r(rebuildArray($cats));

function printTree($cats, $cat = 0)
{
    $out = "<ul>";
    foreach ($cats[$cat] as $c) {
        $out .= "<li>" . $c['name'];
        if (isset($cats[$cat['id']])) {
            $out .= printTree($cats, $cat['id']);
        }
        $out .= "</li>";
    }
    $out .= "</ul>";
    return $out;
}

echo printTree(rebuildArray($cats));