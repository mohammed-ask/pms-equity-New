<?php
include "main/session.php";
$opentime = $obj->selectfieldwhere("stocktransaction", "datetime", "id=" . $_POST['id'] . "");
$closetime = changedateformatespecito($_POST['closetime'], "d/m/Y H:i:s", "Y-m-d H:i:s");
if ($closetime < $opentime) {
    echo '<div class="alert alert-danger">Closetime can\'t be smaller than opentime</div>';
    die;
}
$trademethod = $obj->selectfieldwhere("stocktransaction", "trademethod", "id=" . $_POST['id'] . "");
$borrowedamt = $obj->selectfieldwhere("stocktransaction", "borrowedamt", "id=" . $_POST['id'] . "");
$borrowedamt = empty($borrowedamt) ? 0 : $borrowedamt;
$borrowedprcnt = $obj->selectfieldwhere("stocktransaction", "borrowedprcnt", "id=" . $_POST['id'] . "");
$investmentamount = $obj->selectfieldwhere("users", "investmentamount", "id=" . $_POST['userid'] . "");
$xx['added_by'] = $employeeid;
$xx['added_on'] = date("Y-m-d H:i:s");
$xx['updated_by'] = $employeeid;
$xx['updated_on'] = date("Y-m-d H:i:s");
$xx['status'] = 1;
// $xx['symbol'] = $_POST['symbol'];
// $xx['exchange'] = $_POST['exchange'];
$xx['qty'] = $_POST['qty'];
$xx['price'] = $_POST['cprice'];
$row['mktlot'] = $obj->selectfieldwhere("stocktransaction", "mktlot", "id=" . $_POST['id'] . "");
if ($borrowedamt > 0) {
    $profitAndLoss = $row['mktlot'] * $_POST['qty'] * ($_POST['cprice'] - $_POST['oldprice']);
    if ($_POST['oldprice'] > 0) {
        $xx['profitprcnt'] = round($profitAndLoss / ($_POST['oldprice'] * $row['mktlot'] * $_POST['qty']) * 100, 2);
    } else {
        $xx['profitprcnt'] = 0;
    }
    if ($trademethod === 'Sell') {
        if ($profitAndLoss <= 0) {
            $profitAndLoss = abs($profitAndLoss);
            $xx['profitprcnt'] = abs($xx['profitprcnt']);
        } else {
            $profitAndLoss = -$profitAndLoss;
            $xx['profitprcnt'] = -$xx['profitprcnt'];
        }
    }
    if ($profitAndLoss >= 0) {
        $custshare = 100 - $borrowedprcnt;
        $xx['totalprofit'] = round($profitAndLoss, 2);
        $xx['profitamount'] = round($profitAndLoss * $custshare / 100, 2);
    } else {
        $xx['totalprofit'] = round($profitAndLoss, 2);
        $xx['profitamount'] = $profitAndLoss;
    }
} else {
    $xx['profitamount'] = $row['mktlot'] * $_POST['qty'] * ($_POST['cprice'] - $_POST['oldprice']);
    if ($_POST['oldprice'] > 0) {
        $xx['profitprcnt'] = round($xx['profitamount'] / ($_POST['oldprice'] * $row['mktlot'] * $_POST['qty']) * 100, 2);
    } else {
        $xx['profitprcnt'] = 0;
    }
    $xx['totalprofit'] = $xx['profitamount'];
    if ($trademethod === 'Sell') {
        if ($xx['profitamount'] <= 0) {
            $xx['profitamount'] = abs($xx['profitamount']);
            $xx['totalprofit'] = $xx['profitamount'];
            $xx['profitprcnt'] = abs($xx['profitprcnt']);
        } else {
            $xx['profitamount'] = -$xx['profitamount'];
            $xx['totalprofit'] = $xx['profitamount'];
            $xx['profitprcnt'] = -$xx['profitprcnt'];
        }
    }
}
// $xx['profitamount'] = $_POST['qty'] * ($_POST['cprice'] - $_POST['oldprice']);
$xx['userid'] = $_POST['userid'];
$xx['tradeid'] = $_POST['id'];
$xx['closetime'] = changedateformatespecito($_POST['closetime'], "d/m/Y H:i:s", "Y-m-d H:i:s");
$xx['profitsettled'] = $xx['profitamount'] <= 0 ? 1 : 0;
// $xx['type'] = $_POST['type'];
// $xx['limit'] = $_POST['limit'];
// $xx['tradestatus'] = '';
$close = $obj->insertnew("closetradedetail", $xx);
if ($close > 0) {
    $yy["tradestatus"] = 'Close';
    $yy['status'] = 1;
    $trade = $obj->update("stocktransaction", $yy, $xx['tradeid']);
    if ($trade > 0) {
        if ($xx['totalprofit'] >= 0) {
            $useramt = $_POST['amountpaid'] + $xx['totalprofit']  - $borrowedamt;
        } else {
            $useramt = $_POST['amountpaid'] - $borrowedamt + $xx['totalprofit'];
        }
        // $useramount = $useramt + $xx['profitamount'];
        $kk['investmentamount'] = $investmentamount + $useramt;
        $user = $obj->update("users", $kk, $_POST['userid']);
        $obj->saveactivity("Position Closed by Admin", "$kk[investmentamount]", $close, $xx['userid'], "User", "Position Closed by Admin");
        if ($user > 0) {
            echo "Redirect : Trade Closed Succesfully  URLindex";
        } else {
            echo "<div class='alert alert-danger'>Some Error Occured Please Retry after some time.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Some Error Occured Please Retry after some time.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Some Error Occured Please Retry after some time.</div>";
}
