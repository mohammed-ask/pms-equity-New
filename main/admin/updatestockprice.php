<?php
include 'main/session.php';
$oldtotal = $obj->selectfieldwhere("stocktransaction", 'totalamount', 'id=' . $_POST['id'] . '');
$investmentamount = $obj->selectfieldwhere("users", 'investmentamount', 'id=' . $_POST['userid'] . '');
$brokeramt = $obj->selectfieldwhere("stocktransaction", 'borrowedamt', 'id=' . $_POST['id'] . '');
$lot = $obj->selectfieldwhere("stocktransaction", 'mktlot', 'id=' . $_POST['id'] . '');
$usermargin = $obj->selectfieldwhere("stocktransaction", '`limit`', 'id=' . $_POST['id'] . '');

$brokeramt = empty($brokeramt) ? 0 : $brokeramt;
$investmentamount = $investmentamount + $oldtotal - $brokeramt;
$totalamount = $_POST['price'] * $_POST['qty'] * $lot;
if ($totalamount > $investmentamount * $usermargin) {
    echo "<div class='alert alert-warning'>You dont have enough fund</div>";
} else {
    $xx['price'] = $_POST['price'];
    $xx['totalamount'] = round($totalamount, 2);
    if ($totalamount > $investmentamount) {
        $xx['borrowedamt'] = round($totalamount - $investmentamount, 2);
        $xx['borrowedprcnt'] = round($xx['borrowedamt'] / $totalamount * 100, 2);
    } else {
        $xx['borrowedamt'] = 0;
        $xx['borrowedprcnt'] = 0;
    }
    $buy = $obj->update("stocktransaction", $xx, $_POST['id']);
    $remainfund = $investmentamount - $totalamount;
    $xy['investmentamount'] = $remainfund < 0 ? 0 : $remainfund;
    $user = $obj->update("users", $xy, $_POST['userid']);
    $obj->saveactivity("Stock Price Changed by admin", "$_POST[userid]", $_POST['id'], $employeeid, "Admin", "Stock Price Changed by admin");
}
echo "Redirect : Price Updated Successfully URLindex";
