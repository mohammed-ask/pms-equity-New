<?php
include 'session.php';
$id = $employeeid;
$todayopentradeid = $obj->selectfieldwhere(
    "stocktransaction",
    "group_concat(distinct(stockid))",
    "status = 0 and userid = $id and tradestatus='Open' and date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) and stockid != '' and stockid is not null"
);
if (!empty($todayopentradeid)) {
    $fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "'  and id in (" . $todayopentradeid . ")");
    $rowfetch = mysqli_fetch_all($fetchshare, 1);
    $stockdata = $obj->fivepaisaapi($rowfetch);
    $stockdata = $stockdata == 'Error fetching candle data:' ? [] : $stockdata;
}
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
$return['recordsTotal'] = $obj->selectfieldwhere("stocktransaction", "count(stocktransaction.id)", "status = 0 and type='Intraday' and userid = $id and date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip'))");
$return['recordsFiltered'] = $obj->selectfieldwhere("stocktransaction", "count(stocktransaction.id)", "status = 0 and type='Intraday' and userid = $id and date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) $search ");
$return['draw'] = $_GET['draw'];
$result = $obj->selectextrawhereupdate(
    "stocktransaction",
    "*",
    "status = 0 and type='Intraday' and userid = $id and tradestatus='Open' and date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) and stockid != '' and stockid is not null $search $order"
);
$num = $obj->total_rows($result);
$data = array();
while ($row = $obj->fetch_assoc($result)) {
    $n = array();
    $symbol = $row['symbol'];
    $excg = $row['exchange'];
    $token = $obj->selectfieldwhere("userstocks", "symboltoken", "id=" . $row['stockid'] . "");
    $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg, $token) {
        if ($data['Token'] == $token) {
            return $data;
        }
    });
    $keys = array_keys($pricedata)[0];
    $currentrate = $pricedata[$keys]['LastRate'];
    $n[] = $row['symbol'];
    $n[] = changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "d M, Y");
    $n[] =  changedateformatespecito($row['added_on'], "Y-m-d H:i:s", "H:i");
    $n[] = $row['mktlot'];
    $n[] = $row['qty'];
    $n[] = $currencysymbol . $row['price'];
    $n[] = $currencysymbol . round($row['totalamount'], 2);
    // $n[] = round($row['totalamount'], 2);
    $n[] = $row['trademethod'];
    $n[] = $currencysymbol . $currentrate;
    // $n[] = !empty($row['stoplossamt']) ? $currencysymbol . $row['stoplossamt'] : '';
    // $n[] = !empty($row['target']) ? $currencysymbol . $row['target'] : '';
    $profitprcnt = round((($currentrate  - $row['price']) * $row['qty'] * $row['mktlot']) / ($row['price'] * $row['qty'] * $row['mktlot']) * 100, 2);
    if ($row['trademethod'] === 'Sell') {
        if ($profitprcnt <= 0) {
            $profitprcnt = abs($profitprcnt);
        } else {
            $profitprcnt = -$profitprcnt;
        }
    }
    $color = $profitprcnt >= 0 ? "text-success" : 'text-danger';
    $n[] = "<strong class='$color'>" . $profitprcnt . "</strong>";
    $profitloss =  round(($currentrate - $row['price']) * $row['qty'] * $row['mktlot'], 2);
    if ($row['trademethod'] === 'Sell') {
        if ($profitloss <= 0) {
            $profitloss = abs($profitloss);
        } else {
            $profitloss = -$profitloss;
        }
    }
    $n[] = "<strong class='$color'>" . $currencysymbol . $profitloss . "</strong>";
    if ($row['trademethod'] === 'Buy') {
        $n[] =  "<button class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal(\"" . $row['id'] . "\", \"closetrade\", \"Buy\", \"Close Trade\")'>S</button>";
    } else if ($row['trademethod'] === 'Sell') {
        $n[] =  "<button class='btn btn-sm btn-success' data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal(\"" . $row['id'] . "\", \"closetrade\", \"Sell\", \"Close Trade\")'>B</button>";
    }
    $data[] = $n;
    $i++;
}
$return['data'] = $data;
echo json_encode($return);
