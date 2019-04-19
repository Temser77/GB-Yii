<?php

function f($num)
{

    $first = 0;
    $second = 1;

    for ($i = 0; $i < $num; $i++) {
        if ($i <= 1) {
            $next = $i;
        } else {
            $next = $first + $second;
            $first = $second;
            $second = $next;
        }

        echo $next . " ";


    }

}


f(10);