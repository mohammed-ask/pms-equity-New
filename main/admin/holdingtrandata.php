<?php
include '../session.php';

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
$join = "left join closetradedetail on closetradedetail.tradeid = stocktransaction.id";
$return['recordsTotal'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status in (0) and type = 'Holding'");
$return['recordsFiltered'] = $obj->selectfieldwhere("stocktransaction $join", "count(stocktransaction.id)", "stocktransaction.status in (0) and type = 'Holding' $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "stocktransaction $join",
    "stocktransaction.id,stocktransaction.symbol,stocktransaction.qty,stocktransaction.price,closetradedetail.price as cprice,stocktransaction.totalamount,stocktransaction.trademethod,stocktransaction.added_on,stocktransaction.userid,stocktransaction.tradestatus,stocktransaction.datetime,mktlot,stoplossamt",
    "stocktransaction.status in (0) and type = 'Holding' $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = changedateformatespecito(empty($row['datetime']) ? $row['added_on'] : $row['datetime'], "Y-m-d H:i:s", "d M, Y H:i");
    $n[] = $obj->selectfieldwhere("users", "name", "id=" . $row['userid'] . "");
    $n[] = $row['symbol'];
    $n[] = $row['trademethod'];
    $n[] = $row['mktlot'];
    // $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "H:i");
    $row['cprice'] = $row['cprice'] === 0 ? '' : $row['cprice'];
    $n[] = $row['qty'];
    $n[] = $row['trademethod'] === 'Buy' ? $currencysymbol . $row['price'] : $currencysymbol . $row['cprice'];
    $n[] = $row['trademethod'] === 'Sell' ? $currencysymbol . $row['price'] : $currencysymbol . $row['cprice'];
    // $n[] = !empty($row['stoplossamt']) ? $currencysymbol . $row['stoplossamt'] : '';
    $n[] = $currencysymbol . $row['totalamount'];
    $n[] = $row['tradestatus'];
    $n[] = empty($row['datetime']) ? 'User' : 'Advisor';
    $addaction = "";
    if (in_array(38, $permissions) && $row['tradestatus'] === 'Open') {
        $addaction .= " <div style='display: inline-flex'><button class='btn' data-bs-toggle='modal' data-bs-target='#modal-report'  onclick='dynamicmodal(\"" . $row['id'] . "\", \"editstockprice\", \"\", \"Edit Stock Price\")'>
        <svg class='w-3 h-3' aria-hidden='true' fill='currentColor' viewBox='0 0 20 20'>
            <path d='M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z'>
            </path>
        </svg>
    </button>";
    }
    if ($row['tradestatus'] === 'Open' && $row['trademethod'] === 'Buy' && empty($row['stockid']) && in_array(39, $permissions)) {
        $addaction .=  "<button style='margin-left: 10px !important;'  class='btn btn-sm text-white btn-danger'  data-bs-toggle='modal' data-bs-target='#modal-report' onclick='dynamicmodal(\"" . $row['id'] . "\", \"closebrockertrade\", \"Buy\", \"Close Trade\")'>Sell</button>";
    } else if ($row['tradestatus'] === 'Open' && $row['trademethod'] === 'Sell' && empty($row['stockid']) && in_array(39, $permissions)) {
        $addaction .=  "<button style='margin-left: 10px !important;' class='btn btn-sm text-white btn-success' data-bs-toggle='modal' data-bs-target='#modal-report' onclick='dynamicmodal(\"" . $row['id'] . "\", \"closebrockertrade\", \"Sell\", \"Close Trade\")'>Buy</button></div>";
    }
    $n[] =  $addaction;
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
