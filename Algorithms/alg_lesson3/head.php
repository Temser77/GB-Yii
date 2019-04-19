<?php

function head($n) {
    if($n==0)
        return;
    head($n-1);
   echo $n;
}

head(7);