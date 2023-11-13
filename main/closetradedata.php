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
$join = "inner join closetradedetail on closetradedetail.tradeid =stocktransaction.id ";
$return['recordsTotal'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status = 1 and stocktransaction.userid = $id and tradestatus='Close'");
$return['recordsFiltered'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status = 1 and stocktransaction.userid = $id and tradestatus='Close' $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "stocktransaction $join",
    "stocktransaction.id,stocktransaction.symbol,stocktransaction.qty,stocktransaction.price,closetradedetail.price as cprice,stocktransaction.totalamount,stocktransaction.trademethod,stocktransaction.added_on,stocktransaction.mktlot,borrowedprcnt,profitprcnt,totalprofit,profitamount,closetradedetail.added_on as closeon,datetime,closetime,stoplossamt,stoplosstriggred,targettriggred,aitrade",
    "stocktransaction.status = 1 and stocktransaction.userid = $id and tradestatus='Close' $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $row['symbol'];
    $n[] = changedateformatespecito(empty($row['datetime']) ? $row['added_on'] : $row['datetime'], "Y-m-d H:i:s", "d M, Y H:i");
    $n[] =  changedateformatespecito(empty($row['closetime']) ? $row['closeon'] : $row['closetime'], "Y-m-d H:i:s", "d M, Y H:i");
    $n[] = $row['mktlot'];
    $n[] = $row['qty'];
    $n[] = $row['trademethod'] === 'Buy' ? $row['price'] : $row['cprice'];
    $n[] = $row['trademethod'] === 'Sell' ? $row['price'] : $row['cprice'];
    $n[] = $currencysymbol . round($row['totalamount'], 2);
    $n[] = $row['trademethod'];
    // $n[] = !empty($row['stoplossamt']) ? $currencysymbol . $row['stoplossamt'] : '';
    // $n[] = $row['stoplosstriggred'];
    // $n[] = !empty($row['target']) ? $currencysymbol . $row['target'] : '';
    // $n[] = $row['targettriggred'];
    $profitprcnt = $row['profitprcnt'];
    $color = $profitprcnt >= 0 ? "text-success" : 'text-danger';
    $n[] = "<strong class='$color'>" . $profitprcnt . "</strong>";
    $profitloss =  empty($row['totalprofit']) ? 0 : round($row['totalprofit'], 2);
    $row['borrowedprcnt'] = empty($row['borrowedprcnt']) ? 0 : $row['borrowedprcnt'];
    $n[] = "<strong class='$color'>" . $currencysymbol . $profitloss . "</strong>";
    $n[] = '<strong class="badge bg-label-danger">Closed</strong>';
    $tradername = '';
    if (empty($row['datetime'])) {
        $tradername =  'You';
    } elseif ($row['aitrade'] === 'Yes') {
        $tradername =  'AI Mode';
    } else {
        $tradername =  'Advisor';
    }
    $n[] = $tradername;
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
