<?php
include "main/session.php";
// print_r($_POST);
$trademethod = $obj->selectfieldwhere("stocktransaction", "trademethod", "id=" . $_POST['tradeid'] . "");
$borrowedamt = $obj->selectfieldwhere("stocktransaction", "borrowedamt", "id=" . $_POST['tradeid'] . "");
$borrowedamt = empty($borrowedamt) ? 0 : $borrowedamt;
$borrowedprcnt = $obj->selectfieldwhere("stocktransaction", "borrowedprcnt", "id=" . $_POST['tradeid'] . "");
$xx['added_by'] = $employeeid;
$xx['added_on'] = date("Y-m-d H:i:s");
$xx['updated_by'] = $employeeid;
$xx['updated_on'] = date("Y-m-d H:i:s");
$xx['status'] = 1;
// $xx['symbol'] = $_POST['symbol'];
// $xx['exchange'] = $_POST['exchange'];
$xx['qty'] = $_POST['qty'];
$xx['price'] = $_POST['price'];
$lot = $obj->selectfieldwhere("stocktransaction", "mktlot", "id=" . $_POST['tradeid'] . "");
if ($borrowedamt > 0) {
    $profitAndLoss = $lot * $_POST['qty'] * ($_POST['price'] - $_POST['oldprice']);
    if ($_POST['oldprice'] > 0) {
        $xx['profitprcnt'] = round($profitAndLoss / ($_POST['oldprice'] * $lot * $_POST['qty']) * 100, 2);
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
        $xx['profitamount'] = round($profitAndLoss, 2);
    }
} else {
    $xx['profitamount'] = $lot * $_POST['qty'] * ($_POST['price'] - $_POST['oldprice']);
    if ($_POST['oldprice'] > 0) {
        $xx['profitprcnt'] = round($xx['profitamount'] / ($_POST['oldprice'] * $lot * $_POST['qty']) * 100, 2);
    } else {
        $xx['profitprcnt'] = 0;
    }
    $xx['totalprofit'] = $xx['profitamount'];
    if ($trademethod === 'Sell') {
        if ($xx['profitamount'] <= 0) {
            $xx['profitamount'] = round(abs($xx['profitamount']), 2);
            $xx['totalprofit'] = $xx['profitamount'];
            $xx['profitprcnt'] = abs($xx['profitprcnt']);
        } else {
            $xx['profitamount'] = -$xx['profitamount'];
            $xx['totalprofit'] = $xx['profitamount'];
            $xx['profitprcnt'] = -$xx['profitprcnt'];
        }
    }
}
$xx['userid'] = $employeeid;
$xx['tradeid'] = $_POST['tradeid'];
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
            $useramt = $_POST['amountpaid'] + $xx['totalprofit'] - $borrowedamt;
        } else {
            $useramt = $_POST['amountpaid'] - $borrowedamt + $xx['totalprofit'];
        }
        // $useramount = $useramt + $xx['profitamount'];
        $kk['investmentamount'] = $investmentamount + $useramt;
        $user = $obj->update("users", $kk, $employeeid);
        if ($user > 0) {
            $obj->saveactivity("Customer Closed Trade", "$kk[investmentamount]", $close, $employeeid, "User", "Customer Closed Trade");
            echo "Redirect : Trade Closed Succesfully  URLportfolio";
        } else {
            echo "<div class='alert alert-danger'>Some Error Occured Please please try after sometime!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Some Error Occured Please please try after sometime</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Some Error Occured please try after sometime</div>";
}
