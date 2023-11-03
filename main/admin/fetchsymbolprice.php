<?php
include "../session.php";
$symbol = $_POST['stockName'];
$exch = $_POST['exch'];
$exchtype = $_POST['exchtype'];
$rowfetch = array(
    array(
        "Exch" => $exch,
        "ExchType" => "C",
        "Symbol" => $symbol,
        "Expiry" => "",
        "StrikePrice" => 0,
        "OptionType" => ""
    )
);
$price = $obj->searchstockapiwithtoken($symbol, $exchtype, $exch);
$data = $price[0];
// print_r($price);
// echo $symbol, $exch;
?>
<label class=" col-6 block text-sm" for="Quantity">
    <span class="text-gray-700 dark:text-gray-400">Default Lot</span>
    <input readonly data-bvalidator='required' name="lot" type="number" id="lot" onclick="this.select();" value='<?= isset($data['MktLot']) ? $data['MktLot'] : ''  ?>' class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
</label>

<label class="col-6 block text-sm" style="margin-bottom: 5px;">
    <span class="text-gray-700 dark:text-gray-400">Lot/Quantity</span>
    <input type="number" id="qty" name="qty" onkeyup="gettotalamt()" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' placeholder="Enter Lot/Quality" />
</label>

<label class="col-6 block text-sm" style="margin-bottom: 5px;">
    <span class="text-gray-700 dark:text-gray-400">Buy/Sell Price(each)</span>
    <input name="price" id="shareprice" value="<?= isset($data['LastTradedPrice']) ? $data['LastTradedPrice'] : ''  ?>" onkeyup="gettotalamt()" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Buy/Sell Price" data-bvalidator='required' />
</label>
<label class="col-6 block text-sm" style="margin-bottom: 5px;">
    <span class="text-gray-700 dark:text-gray-400">Total Amount</span>
    <input readonly name="totalamount" id="totalamt" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
</label>