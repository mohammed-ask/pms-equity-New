<?php
include "main/session.php";
$id = $_POST['id'];
unset($_POST['id']);
$fund['added_on'] = date('Y-m-d H:i:s');
// $fund['added_by'] = $employeeid;
$fund['updated_on'] = date('Y-m-d H:i:s');
// $fund['updated_by'] = $employeeid;
$fund['amount'] = $_POST['amount'];
// $fund['transactionid'] = $_POST['transactionid'];
$path = 'main/uploads/receipts';
$fund['paymentmethod'] = $obj->uploadfilenew($path, $_FILES, "paymentmethod",  array("jpg", "jpeg", "png"));
// $fund['paymentmethod'] = $_POST['paymentmethod'];
// $fund['mobile'] = $_POST['mobile'];
$fund['approvedon'] = date("Y-m-d H:i:s");
$fund['approvedby'] = $employeeid;
// $fund['remark'] = $_POST['remark'];
// $fund['date'] = changedateformate($_POST['date']);
$fund['userid'] = $id;
$fund['status'] = 1;
$fid = $obj->insertnew('fundrequest', $fund);
$obj->saveactivity("Fund added by Admin", "", $fid, $fid, "Admin", "Fund added by Admin");

$oldamt = $obj->selectfieldwhere('users', 'investmentamount', 'id=' . $id . '');
$oldamt = (empty($oldamt)) ? 0 : $oldamt;
$newamt = $oldamt + $fund['amount'];
$xx['investmentamount'] = $newamt;
$ures = $obj->update('users', $xx, $id);
if ($ures == 1) {
    echo "Redirect : Fund has been added! URLusers";
}
