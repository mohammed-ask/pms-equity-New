<?php
include 'session.php';
/* @var $obj db */
$id = $employeeid;
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
$join = "left join closetradedetail on closetradedetail.tradeid =stocktransaction.id ";
$return['recordsTotal'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status in (1,0) and stocktransaction.userid = $id and (stocktransaction.stockid = '' || stocktransaction.stockid is null) and aitrade != 'Yes' and status = 0");
$return['recordsFiltered'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status in (1,0) and stocktransaction.userid = $id and (stocktransaction.stockid = '' || stocktransaction.stockid is null) and aitrade != 'Yes' and status = 0 $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "stocktransaction $join",
    "stocktransaction.id,stocktransaction.symbol,stocktransaction.qty,stocktransaction.price,closetradedetail.price as cprice,stocktransaction.totalamount,stocktransaction.trademethod,stocktransaction.added_on,tradestatus,closetradedetail.closetime as closeon,profitprcnt,totalprofit,mktlot,datetime",
    "stocktransaction.status in (1,0) and stocktransaction.userid = $id and (stocktransaction.stockid = '' || stocktransaction.stockid is null) and aitrade != 'Yes' and status = 0 $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $row['symbol'];
    $n[] = changedateformatespecito($row['datetime'], "Y-m-d H:i:s", "d M, Y H:i");
    $n[] = changedateformatespecito($row['closeon'], "Y-m-d H:i:s", "d M, Y H:i");
    $n[] = $row['mktlot'];
    $n[] = $row['qty'];
    $n[] = $row['trademethod'] === 'Buy' ? $currencysymbol . $row['price'] : $currencysymbol . $row['cprice'];
    $n[] = $row['trademethod'] === 'Sell' ? $currencysymbol . $row['price'] : $currencysymbol . $row['cprice'];
    $n[] = $currencysymbol . round($row['totalamount'], 2);
    $row['profitprcnt'] = empty($row['profitprcnt']) ? 0 : $row['profitprcnt'];
    $row['totalprofit'] = empty($row['totalprofit']) ? 0 : $row['totalprofit'];
    $color = $row['totalprofit'] >= 0 ? "text-success" : 'text-danger';
    $n[] = "<strong class='$color'>" . round($row['profitprcnt'], 2) . "</strong>";
    $n[] =  "<strong class='$color'>" . $currencysymbol . round($row['totalprofit'], 2) . "</strong>";
    // $n[] = round($row['totalamount'], 2);
    $n[] = $row['trademethod'];
    // $n[] = round(($row['cprice'] - $row['price']) * 100 / $row['price'], 2);
    // $n[] = round($row['cprice'] - $row['price'], 2);
    $n[] = $row['tradestatus'] === 'Close' ? '<strong class="text-warning">Closed<strong>' : '<strong class="text-success">Open<strong>';
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
