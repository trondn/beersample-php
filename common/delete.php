<?php
$cb = getCouchbaseHandle();
if ($cb->delete($id)) {
    echo "<h3>Successfully deleted</h3>";
} else {
    echo "<h3>Deletion failed!</h3>";
    echo "<p>" . $cb->getResultMessage() . "</p>";
}
?>
