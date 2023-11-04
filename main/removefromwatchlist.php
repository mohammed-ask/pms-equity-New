<?php
include "./session.php";
$symbol = $_POST['symbol'];
$exchange = $_POST['exchange'];
$chkifexist = $obj->selectfieldwhere("watchliststock", "count(id)", "exchange='" . $exchange . "' and symbol = '" . $symbol . "' and status = 1");
if ($chkifexist > 0) {
    $delete = $obj->deletewhere("watchliststock", "exchange='" . $exchange . "' and symbol = '" . $symbol . "' and status = 1");
    if ($delete > 0) {
        echo "Deleted";
    } else {
        echo "Failed";
    }
}
