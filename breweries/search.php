<?php
$value = getParamValue("value");
$cb = getCouchbaseHandle();
$breweries = $cb->view("brewery", "by_name", array("stale" => "true",
        "startkey" => $value,
    "endkey" => $value . "\uefff"));

foreach ($breweries["rows"] as $b) {
    $id = htmlentities(urlencode($b["id"]));
    $text = $b["value"];
    $name = htmlentities(urlencode($text));
    $params = "id=$id&name=$name&type=brewery"
    ?>
    <tr>
        <td><a href="<?= getContext() ?>/breweries?cmd=show&<?= $params ?>"><?= $text ?></a></td>
        <td><a class="btn btn-small btn-danger"
               href="<?= getContext() ?>/breweries?cmd=delete&<?= $params ?>">Delete</a>
        </td>
    </tr>
    <?php
}
?>
