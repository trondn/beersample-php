<?php
if (count($_SERVER["argv"]) == 0) {
    include "beers/list.php";
} else {
    $cmd = getParamValue("cmd");
    $id = getParamValue("id");
    $name = getParamValue("name");
    $type = getParamValue("type");

    if ($cmd == "show") {
        include "common/show.php";
    } else if ($cmd == "delete") {
        include "common/delete.php";
    } else if ($cmd == "edit") {
        include "beers/edit.php";
    } else if ($cmd == "save") {
        include "beers/save.php";
    } else {
        echo "<h3>INTERNAL ERROR</H3>";
    }
}
?>
