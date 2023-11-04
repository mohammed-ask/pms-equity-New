<?php
include "./session.php";
$id = $obj->selectfieldwhere("userstocks", "id", "status =1 and symboltoken = '" . $_POST['token'] . "' and userid = '" . $employeeid . "'");
$chkifopen = $obj->selectfieldwhere("stocktransaction", "count(id)", "stockid='" . $id . "' and tradestatus = 'Open' and status = 0");
if ($chkifopen > 0) {
    echo 'Failed';
    die;
}
$delete = $obj->deletewhere("userstocks", "status =1 and symboltoken = '" . $_POST['token'] . "' and userid = '" . $employeeid . "'");
$wdelete = $obj->deletewhere("watchliststock", "status =1 and token = '" . $_POST['token'] . "' and userid = '" . $employeeid . "'");
if ($delete > 0) {
    echo "Success";
} else {
    echo "Failed";
}
