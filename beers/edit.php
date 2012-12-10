<?php
$cb = getCouchbaseHandle();
$beer = $cb->get($id);
releaseCouchbaseHandle($cb);
$obj = json_decode($beer);
?>

<h3><?= $obj->name ?></h3>

<form method="post" action="<?= getContext() ?>/beers?cmd=save&id=<?= urlencode($id) ?>">
    <fieldset>
        <legend>General Info</legend>
        <div class="span12">
            <div class="span6">
                <label>Name</label>
                <input type="text" name="beer_name" placeholder="The name of the beer." value="<?= $obj->name ?>">

                <label>Description</label>
                <input type="text" name="beer_description" placeholder="A short description." value="<?= $obj->description ?>">
            </div>
            <div class="span6">
                <label>Style</label>
                <input type="text" name="beer_style" placeholder="Bitter? Sweet? Hoppy?" value="<?= $obj->style ?>">

                <label>Category</label>
                <input type="text" name="beer_category" placeholder="Ale? Stout? Lager?" value="<?= $obj->category ?>">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Details</legend>
        <div class="span12">
            <div class="span6">
                <label>Alcohol (ABV)</label>
                <input type="text" name="beer_abv" placeholder="The beer's ABV" value="<?= $obj->abv ?>">

                <label>Bitterness (IBU)</label>
                <input type="text" name="beer_ibu" placeholder="The beer's IBU" value="<?= $obj->ibu ?>">
            </div>
            <div class="span6">
                <label>Beer Color (SRM)</label>
                <input type="text" name="beer_srm" placeholder="The beer's SRM" value="<?= $obj->srm ?>">

                <label>Universal Product Code (UPC)</label>
                <input type="text" name="beer_upc" placeholder="The beer's UPC" value="<?= $obj->upc ?>">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Brewery</legend>
        <div class="span12">
            <div class="span6">
                <label>Brewery</label>
                <input type="text" name="beer_brewery_id" placeholder="The brewery" value="<?= $obj->brewery_id ?>">
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
