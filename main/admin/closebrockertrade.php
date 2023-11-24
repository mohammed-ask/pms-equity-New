<?php
include "main/session.php";
$id = $_GET['hakuna'];
$method = $_GET['what'];
$rowtran = $obj->selectextrawhere("stocktransaction", "id=" . $id . "")->fetch_assoc();
$ExchType = $obj->selectfieldwhere("userstocks", 'ExchType', "id='" . $rowtran['stockid'] . "'");
$symbol = $rowtran['symbol'];
$exch = $rowtran['exchange'];
$exchtype = $rowtran['exchtype'];
// print_r($rowtran);
// $rowfetch = array(
//     array(
//         "Exch" => $rowtran['exchange'],
//         "ExchType" => $rowtran['exchtype'],
//         "Symbol" => $rowtran['symbol'],
//     )
// );
$price = $obj->searchstockapiwithtoken($symbol, $exchtype, $exch);

// $stockdata = $obj->fivepaisaapi($rowfetch);
// print_r($price);
$stockdata = $price[0];

?>
<form id="stock" onsubmit="event.preventDefault();sendForm('id', '<?= $id ?>', 'insertclosebrockertrade', 'resultid', 'stock');return 0;">
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">User Name</span>
        <div class="form-control"><?= $obj->selectfieldwhere('users', 'name', 'id=' . $rowtran['userid'] . '') ?></div>
    </label>
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Exchange</span>
        <div class="form-control"><?= $rowtran['exchange'] ?></div>
    </label>
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Symbol</span>
        <div class="form-control"><?= $rowtran['symbol'] ?></div>
    </label>
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Lot</span>
        <div class="form-control"><?= $rowtran['mktlot'] ?></div>
    </label>
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Quantity</span>
        <div class="form-control"><?= $rowtran['qty'] ?></div>
    </label>
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Date &
            Time</span>
        <input id="date" name="closetime" onfocus="datetimepicker(this.id)" class="form-control" placeholder="Select Date & Time" data-bvalidator='required' />
    </label>
    <label class="block text-sm mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Buy/Sell Price</span>
        <input name="qty" hidden value="<?= $rowtran['qty'] ?>" />
        <input name="userid" hidden value="<?= $rowtran['userid'] ?>" />
        <input name="cprice" data-bvalidator="required" class="form-control" value="<?= $stockdata['LastTradedPrice'] ?>" />
    </label>
    <br>
    <div>
        <input type="hidden" name="oldprice" value="<?= $rowtran['price'] ?>" id="">
        <input type="hidden" name="amountpaid" value="<?= $rowtran['totalamount'] ?>" id="">

        <button type="submit" id="modalsubmit" class="w-full px-3 py-1 mt-6 text-sm font-medium hidden">
            Sell Stock
        </button>
    </div>
    <div id="resultid"></div>
</form>
<script>
    $("#modalfooterbtn").css('background-color', 'red')
    $("#modalfooterbtn").html('Sell Stock')
</script>