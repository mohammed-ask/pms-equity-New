<?php
include "./session.php";
// print_r($_POST);
// die;
$symbol = $_POST['symbol'];
if (preg_match('/(\d+\s+\w+\s+\d+)/', $symbol, $matches)) {
    $expiryDate = changedateformatespecito($matches[1], "d M Y", 'Ymd');
} else {
    $expiryDate = '';
}

// Extract option type
if (preg_match('/\b(C[E]?|P[E]?)[\s\d\.]+/', $symbol, $matches)) {
    if ($matches[1] === 'CE' || $matches[1] === 'PE') {
        $optionType = $matches[1];
    } else {
        $optionType = '';
    }
} else {
    $optionType = '';
}

// Extract strike rate
if (preg_match('/(\d+\.\d+)/', $symbol, $matches)) {
    $strikeRate = $matches[1];
} else {
    $strikeRate = '';
}
// $strikerate = $_POST['strikerate'];
// $expiry = changedateformatespecito($_POST['expiry'], "d/m/Y H:i:s", 'Ymd');
$exchtype = $_POST['exchtype'];
$exch = $_POST['exch'];
$data = $obj->searchstockapiwithtoken($symbol, $exchtype, $exch);
//if ($data === 'Error fetching candle data:') { 

//  <div class="alert alert-danger">
//         Something went wrong when fetching data, Try again later.
//     </div> 

//die;
//}
$pricedata = $data === 'Error fetching candle data:' ? [] : $data;
// echo "<pre>";
// print_r($data);

if (!empty($pricedata)) {
    foreach ($pricedata as $data) {
?>
        <div class="row -auto g-3 align-items-center">
            <div class="col-sm-9">
                <div>
                    <?php
                    $exc = "";
                    if ($data['Exchange'] == 'B') {
                        $exc = ' BSE';
                    } elseif ($data['Exchange'] == 'N') {
                        $exc = ' NSE';
                    } else {
                        $exc = ' MCX';
                    }
                    echo $symbol . $exc ?>
                </div>
                <div>
                    <?= "₹" . $data['LastTradedPrice'] ?>

                </div>
            </div>
            <div class="col-sm-3">
                <button onclick="addstock('<?= $data['Exchange'] ?>','<?= $symbol ?>','<?= $data['ExchangeType'] ?>','<?= $expiryDate ?>','<?= $optionType ?>','<?= $strikeRate ?>','<?= $data['MktLot'] ?>','<?= $data['ScripCode'] ?>')" class="btn btn-success">Add Stock</button>
            </div>
        </div>
        <br>
    <?php }
} else { ?>
    <div class="alert alert-warning">
        Can't Find Stock Please Check if Symbol is Correct.
    </div>
<?php }; ?>