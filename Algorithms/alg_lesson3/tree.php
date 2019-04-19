<?php

$folder = "X://Programs";

function myComp($path)
{

    if (!($dir = opendir($path)))
        die("The path incorrect");

    $filenames = [];

    while ($filename = readdir($dir)) {

        if ($filename != "." && $filename != "..") {

            if (is_dir("$path/$filename"))
                $filename .= '/';

            $filenames[] = $filename;

        }
    }

    closedir();
    sort($filenames);


echo '<ul>';

foreach ($filenames as $filename) {
    echo '<li>'.$filename;
    if(substr($filename, -1) == '/')
        myComp("$path/".substr($filename,0,-1));
    echo '</li>';
}


echo '</ul>';


}


myComp($folder);