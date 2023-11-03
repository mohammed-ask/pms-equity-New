<?php
include '../session.php';
// $id = $employeeid;
// $todayopentradeid = $obj->selectfieldwhere(
//     "stocktransaction",
//     "group_concat(distinct(stockid))",
//     "status = 0 and tradestatus='Open' and date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip'))"
// );
// if (!empty($todayopentradeid)) {
//     $fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "' and status = 1 and id in (" . $todayopentradeid . ")");
//     $rowfetch = mysqli_fetch_all($fetchshare, 1);
//     $stockdata = $obj->fivepaisaapi($rowfetch);
// }
/* @var $obj db */
$limit = $_GET['length'];
$start = $_GET['start'];
$i = 1;
$return['recordsTotal'] = 0;
$return['recordsFiltered'] = 0;
$return['draw'] = $_GET['draw'];
$return['data'] = array();
$orderdirection = "";
if (isset($_GET['order'][0]['dir'])) {
    $orderdirection = $_GET['order'][0]['dir'];
}
$oary = array('stocktransaction.id', 'stocktransaction.userid', 'stocktransaction.exchange', 'stocktransaction.symbol', 'stocktransaction.qty', 'stocktransaction.price', 'stocktransaction.totalamount', 'stocktransaction.tradestatus');
$ocoloum = "";
if (isset($_GET['order'][0]['column'])) {
    $ci = $_GET['order'][0]['column'];
    $ocoloum = $oary[$ci];
}
$order = "";
if (!empty($ocoloum)) {
    $order = " order by $ocoloum $orderdirection ";
}
$search = "";
if (isset($_GET['search']['value']) && !empty($_GET['search']['value'])) {
    $sv = $_GET['search']['value'];
    $search .= " and (stocktransaction.userid like '%$sv%' or stocktransaction.exchange like '%$sv%')";
}
if ((isset($_GET['columns'][0]["search"]["value"])) && (!empty($_GET['columns'][0]["search"]["value"]))) {
    $search .= " and stocktransaction.userid like '" . $_GET['columns'][0]["search"]["value"] . "'";
}
if ((isset($_GET['columns'][1]["search"]["value"])) && (!empty($_GET['columns'][1]["search"]["value"]))) {
    $search .= " and stocktransaction.description like '" . $_GET['columns'][1]["search"]["value"] . "'";
}
$join = "inner join closetradedetail on closetradedetail.tradeid = stocktransaction.id";
$return['recordsTotal'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status = 1");
$return['recordsFiltered'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status = 1 $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "stocktransaction $join",
    "stocktransaction.id,stocktransaction.symbol,stocktransaction.qty,stocktransaction.price,closetradedetail.price as cprice,stocktransaction.totalamount,stocktransaction.trademethod,stocktransaction.added_on,stocktransaction.userid,stocktransaction.tradestatus,datetime,closetime,closetradedetail.added_on as closeon,mktlot,totalprofit,profitprcnt,stoplossamt",
    "stocktransaction.status = 1 $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = changedateformatespecito(empty($row['datetime']) ? $row['added_on'] : $row['datetime'], "Y-m-d H:i:s", "d M, Y H:i");
    $n[] = changedateformatespecito(empty($row['closetime']) ? $row['closetime'] : $row['closeon'], "Y-m-d H:i:s", "d M, Y H:i");
    $n[] = $obj->selectfieldwhere("users", "name", "id=" . $row['userid'] . "");
    $n[] = $row['symbol'];
    $n[] = $row['mktlot'];
    // $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "H:i");
    $row['cprice'] = $row['cprice'] === 0 ? '' : $row['cprice'];
    $n[] = $row['qty'];
    $n[] = $row['trademethod'] === 'Buy' ? $currencysymbol . $row['price'] : $currencysymbol . $row['cprice'];
    $n[] = $row['trademethod'] === 'Sell' ? $currencysymbol . $row['price'] : $currencysymbol . $row['cprice'];
    $n[] = !empty($row['stoplossamt']) ? $currencysymbol . $row['stoplossamt'] : '';
    $n[] = $currencysymbol . $row['totalamount'];
    $profitprcnt = empty($row['profitprcnt']) ? 0 : round($row['profitprcnt'], 2);
    $color = $profitprcnt >= 0 ? "text-success" : 'text-danger';
    $n[] = "<strong class='$color'>" . $profitprcnt . "</strong>";
    $n[] = "<strong class='$color'>" . $currencysymbol . $row['totalprofit'] . "</strong>";
    $n[] = $row['tradestatus'];
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
