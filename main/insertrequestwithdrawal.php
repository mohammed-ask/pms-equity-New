<?php
include "main/session.php";
$oldrequest = $obj->selectfieldwhere("withdrawalrequests", "count(id)", "status = 0 and userid = " . $employeeid . "");
$message = $obj->selectfieldwhere("users", "message", "id = " . $employeeid . "");
$message = empty($message) ? "Sorry! Can't Request Withdrawl at this time" : $message;
$starttime = $obj->selectfieldwhere("users", "startdatetime", "id = " . $employeeid . "");
$endtime = $obj->selectfieldwhere("users", "enddatetime", "id = " . $employeeid . "");
$start = empty($starttime) ? '' : strtotime($starttime);
$end = empty($endtime) ? '' : strtotime($endtime);
$current = time();
$hour = date("H");
$withlimit = $obj->selectfieldwhere("users", 'withdrawlimit', 'id="' . $employeeid . '"');
if ($withlimit <  $_POST['amount']) {
    echo "<div class='alert alert-warning'>Cannot withdraw more than $withlimit</div>";
    die;
}
if (!empty($start) && !empty($end) && $current >= $start && $current <= $end) {
    echo "<div  class='alert alert-danger'>$message</div>";
} else {
    $amount = $obj->selectfieldwhere("users", "investmentamount", "id=" . $employeeid . "");
    if ($_POST['amount'] > $amount) {
        echo "<div  class='alert alert-danger'>Insufficient Funds: We regret to inform you that the requested withdrawal cannot be processed due to insufficient funds in your wallet.</div>";
        die;
    } elseif ($oldrequest > 0) {
        echo "<div  class='alert alert-danger'>Request Pending: We apologize, but a previous request is already pending. Please wait for the current request to be processed.</div>";
        die;
    } else {
        $xx['userid'] = $employeeid;
        $xx['added_on'] = date('Y-m-d H:i:s');
        $xx['added_by'] = $employeeid;
        $xx['updated_on'] = date('Y-m-d H:i:s');
        $xx['updated_by'] = $employeeid;
        $xx['status'] = 0;
        $xx['amount'] = $_POST['amount'];
        $xx['remark'] = $_POST['remark'];
        $wr = $obj->insertnew("withdrawalrequests", $xx);
        $obj->saveactivity("Added Withdrawal Request", "", $wr, $xx['userid'], "User", "Added Withdrawal Request");
    }
    if (is_integer($wr) && $wr > 0) {
        echo "Redirect : Withdrawal request submitted! Amount will reflect in registered bank account after verification. URLfund";
    } else {
        echo "Some Error Occured";
    }
}
