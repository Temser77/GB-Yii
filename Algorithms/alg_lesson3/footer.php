<?php

function footer($n) {
    if($n==0)
        return;
    echo $n;
    footer($n-1);
}

footer(7);