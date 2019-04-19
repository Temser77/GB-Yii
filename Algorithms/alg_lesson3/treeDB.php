<?php

$connect = mysqli_connect("localhost","root","","alg");

$result = mysqli_query($connect, "select * from cats");

if(mysqli_num_rows($result)>0) {

    $cats = [];
    while($cat = mysqli_fetch_assoc($result)) {
        $cats[$cat[parent_id]][$cat[id]] = $cat;
    }

}

function build_tree($cats, $parent_id, $only_parent=false) {

    if (is_array($cats) and isset($cats[$parent_id])) {

        $tree = "<ul>";

        if ($only_parent == false) {
            foreach ($cats[$parent_id] as $cat) {

                $tree .= "<li>".$cat[name];
                $tree .= build_tree($cats, $cat[id]);
                $tree .= "</li>";

            }

        }

        elseif (is_numeric($only_parent)) {
            $cat = $cats[$parent_id][$only_parent];
            $tree .= "<li>".$cat[name];
            $tree .= build_tree($cats, $cat[id]);
            $tree .="</li>";
        }

        $tree .= "</ul>";


    }

    else
        return null;

    return $tree;


}

echo build_tree($cats, 0);