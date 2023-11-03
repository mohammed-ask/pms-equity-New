<?php
include "main/session.php";
$pendingreq = $obj->selectfieldwhere("bankaccountchange", "count(id)", "userid=" . $employeeid . " and status = 0");
if ($pendingreq > 0) {
    echo "<div class='alert alert-danger'>Request Already Pending</div>";
    die;
} else {
    $xx['added_on'] = date('Y-m-d H:i:s');
    $xx['added_by'] = $employeeid;
    $xx['updated_on'] = date('Y-m-d H:i:s');
    $xx['updated_by'] = $employeeid;
    $xx['status'] = 0;
    $xx['bankname'] = $_POST['bankname'];
    $xx['ifsc'] = $_POST['ifsc'];
    $xx['accountno'] = $_POST['accountno'];
    $xx['userid'] = $employeeid;
    $bank = $obj->insertnew("bankaccountchange", $xx);
    $obj->saveactivity("Add Bank Account Change Request", "", $bank, $bank, "User", "Add Bank Account Change Request");
    if ($bank > 0) {
        echo "Redirect : Your account update request has been received and is currently under review by our team. URLprofile";
    } else {
        echo "Something Went Wrong, please try again later";
    }
}
