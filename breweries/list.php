<h3>Browse Breweries</h3>

<form class="navbar-search pull-left">
    <input id="brewery-search" type="text" class="search-query"
           placeholder="Search for Breweries">
</form>

<table id="brewery-table" class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $cb = getCouchbaseHandle();
        $breweries = $cb->view("brewery", "by_name", array("stale" => "true"));

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
    </tbody>
</table>
