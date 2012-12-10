<?php
$cb = getCouchbaseHandle();
$beer = $cb->get($id);
releaseCouchbaseHandle($cb);

$obj = json_decode($beer);
?>

<h3>Show Details for <?= $type ?> "<?= $obj->name ?>"</h3>
<table class="table table-striped">
    <tbody>
        <?php
        foreach (get_object_vars($obj) as $key => $value) {
            ?>
            <tr>
                <td><strong><?= $key ?></strong></td>
                <td>
                    <?php
                    if (is_array($value)) {
                        foreach ($value as $v) {
                            echo "$v<br/>";
                        }
                    } else if (is_a($value, stdClass)) {
                        echo "@@ todo fixme a class";
                    } else {
                        echo $value;
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>
