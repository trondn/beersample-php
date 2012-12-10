<h3>Browse Beers</h3>

<form class="navbar-search pull-left">
    <input id="beer-search" type="text" class="search-query"
           placeholder="Search for Beers">
</form>

<table id="beer-table" class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Brewery</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $cb = getCouchbaseHandle();
        $beers = $cb->view("beer", "by_name", array("stale" => "true"));
        releaseCouchbaseHandle($cb);

        foreach ($beers["rows"] as $b) {
            $id = htmlentities(urlencode($b["id"]));
            $brewery = htmlentities(urlencode($b["key"]));
            $name = $b["value"];

            $beerlink = "id=$id&name=" . htmlentities(urlencode($name)) . "&type=beer";
            ?>

            <tr>
                <td><a href="<?= getContext() ?>/beers?cmd=show&<?= $beerlink ?>"><?= $name ?></a></td>
                <td><a href="<?= getContext() ?>/breweries?cmd=show&id=<?= $brewery ?>">To Brewery</a></td>
                <td><a class="btn btn-small btn-warning"
                       href="<?= getContext() ?>/beers?cmd=edit&<?= $beerlink ?>">Edit</a>
                    <a class="btn btn-small btn-danger"
                       href="<?= getContext() ?>/beers?cmd=delete&<?= $beerlink ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>
