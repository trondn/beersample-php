<?php
$cb = getCouchbaseHandle();
$beer = $cb->get($id);
$obj = json_decode($beer);

/* Insert the updated values */
$obj->name = $_POST["beer_name"];
$obj->description = $_POST["beer_description"];
$obj->style = $_POST["beer_style"];
$obj->category = $_POST["beer_category"];
$obj->abv = $_POST["beer_abv"];
$obj->ibu = $_POST["beer_ibu"];
$obj->srm = $_POST["beer_srm"];
$obj->upc = $_POST["beer_upc"];
$obj->brewery_id = $_POST["beer_brewery_id"];

if ($cb->set($id, json_encode($obj))) {
    echo "<h3>\"" . $obj->name . "\" successfully updated</h3>";
} else {
    ?>
    <h3>Failed to update "<?= $obj->name ?>"</h3>
    <p>
        <?= $cb->getResultMessage() ?>
    </p>
    <?php
}

releaseCouchbaseHandle($cb);
?>
