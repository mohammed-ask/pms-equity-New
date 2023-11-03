<?php
include 'main/session.php';
// echo $obj->getrequesttoken();
// echo $obj->getaccesstoken();
// echo $obj->getcandledata();
$obj->testapi();
// $obj->getsmartapitoken();
// $obj->fetchsmartapi();
$obj->fetchsmartapi2();

die;
// die;
// $timezone = date_default_timezone_get();
// echo "Server timezone: $timezone";
// $result = $obj->selectextrawhereupdate(
//     "stocktransaction",
//     "*",
//     "status = 0 and userid = $id and tradestatus='Open' and date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) and stockid != '' and stockid is not null $search $order limit $start, $limit"
// );
// print_r(mysqli_fetch_all());
// die;
$rowfetch = array(
    array(
        "Exch" => "N",
        "ExchType" => "D",
        "Symbol" => "BANKNIFTY 11 May 2023 PE 37000.00",
        "Expiry" => "20230511",
        "StrikePrice" => "37000",
        "OptionType" => "PE"
    )
);
$data = $obj->fivepaisaapi($rowfetch);
print_r($data);
echo 'API 1';

$data = $obj->marketstatus();
print_r($data);
echo 'API 2';

$data = $obj->searchstockapiwithtoken('TATAMOTORS', 'C', 'N');
print_r($data);
echo 'API 3';
