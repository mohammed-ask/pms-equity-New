<?php
include "./session.php";
$symbol = $_POST['symbol'];
$exchange = $_POST['exchange'];
$token = $_POST['token'];
$chkifexist = $obj->selectfieldwhere("watchliststock", "count(id)", "exchange='" . $exchange . "' and symbol = '" . $symbol . "' and status = 1");
if ($chkifexist > 0) {
    $delete = $obj->deletewhere("watchliststock", "exchange='" . $exchange . "' and symbol = '" . $symbol . "' and status = 1");
    if ($delete > 0) {
        echo "Deleted";
    } else {
        echo "Failed";
    }
} else {

    $id = $obj->selectfieldwhere("userstocks", "id", "Exch='" . $exchange . "' and Symbol = '" . $symbol . "' and status = 1");
    $xx['userstockid'] = $id;
    $xx['userid'] = $employeeid;
    $xx['symbol'] = $symbol;
    $xx['exchange'] = $exchange;
    $xx['token'] = $token;
    $xx['added_on'] = date("Y-m-d H:i:s");
    $xx['updated_by'] = $employeeid;
    $xx['added_by'] = $employeeid;
    $xx['updated_on'] = date("Y-m-d H:i:s");
    $xx['status'] = 1;
    $watch = $obj->insertnew("watchliststock", $xx);
    if ($watch > 0) {
        echo "Success";
    } else {
        echo "Something went wrong";
    }
}
