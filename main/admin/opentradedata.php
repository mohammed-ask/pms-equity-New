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
$return['recordsTotal'] = $obj->selectfieldwhere("stocktransaction", "count(stocktransaction.id)", "status = 0 and type='Intraday' and tradestatus='Open'");
$return['recordsFiltered'] = $obj->selectfieldwhere("stocktransaction", "count(stocktransaction.id)", "status = 0 and type='Intraday' and tradestatus='Open' $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "stocktransaction",
    "*",
    "status = 0 and type='Intraday' and tradestatus='Open' $search $order limit $start, $limit"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $n[] = $i;
    $n[] = $row['symbol'];
    $n[] = $row['mktlot'];
    $n[] = $currencysymbol . $row['price'];
    // $n[] = !empty($row['stoplossamt']) ? $currencysymbol . $row['stoplossamt'] : '';
    $n[] = $row['qty'];
    $n[] = $currencysymbol . $row['totalamount'];
    $n[] = changedateformatespecito(empty($row['datetime']) ? $row['added_on'] : $row['datetime'], "Y-m-d H:i:s", "d M, Y H:i");
    $n[] = $obj->selectfieldwhere("users", "name", "id=" . $row['userid'] . "");
    $n[] = $row['trademethod'];
    $addaction = "";
    if (in_array(38, $permissions)) {
        $addaction = " <div style='display: inline-flex'><button style='margin-right: 10px;' class='btn' @click='openModal'  onclick='dynamicmodal(\"" . $row['id'] . "\", \"editstockprice\", \"\", \"Edit Stock Price\")'>
    <svg class='w-3 h-3' aria-hidden='true' fill='currentColor' viewBox='0 0 20 20'>
        <path d='M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z'>
        </path>
    </svg>
</button>";
    }
    if ($row['trademethod'] === 'Buy' && empty($row['stockid']) && in_array(39, $permissions)) {
        $addaction .=  "<button class='btn text-white btn-danger'  @click='openModal' onclick='dynamicmodal(\"" . $row['id'] . "\", \"closebrockertrade\", \"Buy\", \"Close Trade\")'>Sell</button>";
    } else if ($row['trademethod'] === 'Sell' && empty($row['stockid']) && in_array(39, $permissions)) {
        $addaction .=  "<button class='btn text-white btn-success' @click='openModal' onclick='dynamicmodal(\"" . $row['id'] . "\", \"closebrockertrade\", \"Sell\", \"Close Trade\")'>Buy</button></div>";
    }

    $n[] =  $addaction;
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
