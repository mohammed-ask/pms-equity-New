<?php
include "main/session.php";
$mrkt = $obj->marketstatus();
// $mrkt[0]['MarketStatus'] = 'Open';
// $mrkt[5]['MarketStatus'] = 'Open';
$id = $_GET['hakuna'];
$rowtran = $obj->selectextrawhere("stocktransaction", "id=" . $id . "")->fetch_assoc();
$token = $obj->selectfieldwhere("userstocks", 'symboltoken', "id=" . $rowtran['stockid'] . " and status = 1");
$lot = $obj->selectfieldwhere("userstocks", "mktlot", "symboltoken = '" . $token . "'  and status = 1");
$rowfetch = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "id=" . $rowtran['stockid'] . "")->fetch_assoc();
$stockdata = $obj->fivepaisaapi(array($rowfetch));
if ($stockdata === 'Error fetching candle data:') {
    echo "<div class='alert alert-danger'>Something went wrong! Please try again or check if token is valid</div>";
    die;
}
$stockdata = $stockdata[0];
?>
<div class="modal-header" id="stockdetails">
    <div>
        <h6 class="modal-title m-0 mb-n1" id="BuyStocksLabel"><?= $stockdata['Symbol'] ?></h6>
        <span class="font-10 d-block mb-1"><?php $exc = $stockdata['Exch'] == 'B' ? ' BSE' : ' NSE';
                                            echo  $exc  ?></span>
        <span class="border border-success px-1 rounded text-success">B</span>
    </div>
    <div>
        <h6 class="m-0 text-uppercase font-16 fw-bold">₹<?= $stockdata['LastRate'] ?> <?php if ($stockdata['ChgPcnt'] > 0) { ?>
                <i class="fa-solid fa-arrow-trend-up text-success"></i>
            <?php } else { ?>
                <i class="fa-solid fa-arrow-trend-down text-danger"></i>
            <?php } ?>
        </h6>
        <div class="d-inline-block font-10"><span <?= $stockdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $stockdata['Chg'] ?></span> <span <?= $stockdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($stockdata['ChgPcnt'], 2) ?>%)</span></div>
        <div class="text-success">Live <span><i class="fa-regular fa-circle-dot"></i></span></div>
    </div>
    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
</div>
<div class="modal-body">
    <form class="row gy-2 gx-3 align-items-end" id="close">
        <input type="hidden" name="symbol" value="<?= $stockdata['Symbol'] ?>" id="">
        <input type="hidden" name="exchange" value="<?= $stockdata['Exch'] ?>" id="">
        <input type="hidden" name="oldprice" value="<?= $rowtran['price'] ?>" id="">
        <input type="hidden" name="tradeid" value="<?= $rowtran['id'] ?>" id="">
        <input type="hidden" name="amountpaid" value="<?= $rowtran['totalamount'] ?>" id="">
        <input type="hidden" name="limit" value="<?= $rowtran['limit'] ?>" id="">
        <input type="hidden" name="type" value="<?= $rowtran['type'] ?>" id="">
        <!-- <input type="hidden" name="totalamount" id="totalamount" value=""> -->
        <div class="col-3">
            <label class="form-label" for="Quantity">Lot</label>
            <input data-bvalidator='required' readonly type="number" id="lot" onclick="this.select();" value="<?= $lot ?>" class="form-control form-control-sm">
        </div>
        <div class="col-4">
            <label class="form-label" for="Quantity">Quantity</label>
            <input data-bvalidator='required' readonly name="qty" type="number" id="qty" onkeyup="sumfund()" onclick="this.select();" value="<?= $rowtran['qty'] ?>" class="form-control form-control-sm">
        </div>
        <div class="col-5">
            <label class="form-label" for="Price">Price</label>
            <input type="text" readonly name="price" value="<?= $stockdata['LastRate'] ?>" class="form-control form-control-sm" id="Price">
        </div>
        <?php
        if ($_GET['what'] === 'Sell') {
            if ($stockdata['Exch'] === 'N' || $stockdata['Exch'] === 'B') { ?>
                <button <?php echo  $mrkt[0]['MarketStatus'] === 'Open'  ? null : 'disabled'; ?> class="btn btn-success w-100 my-3" onclick="<?php echo $mrkt[0]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertclosetrade\', \'resultid\', \'close\')' : ''; ?>">BUY</button>
            <?php } elseif ($stockdata['Exch'] === 'M') { ?>
                <button <?php echo  $mrkt[5]['MarketStatus'] === 'Open'  ? null : 'disabled'; ?> class="btn btn-success w-100 my-3" onclick="<?php echo $mrkt[5]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertclosetrade\', \'resultid\', \'close\')' : ''; ?>">BUY</button>
            <?php }
        } else if ($_GET['what'] === 'Buy') {
            if ($stockdata['Exch'] === 'N' || $stockdata['Exch'] === 'B') { ?>
                <button <?php echo  $mrkt[0]['MarketStatus'] === 'Open'  ? null : 'disabled'; ?> class="btn btn-danger w-100 my-3" onclick="<?php echo $mrkt[0]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertclosetrade\', \'resultid\', \'close\')' : ''; ?>">SELL</button>
            <?php } elseif ($stockdata['Exch'] === 'M') {  ?>
                <button <?php echo  $mrkt[5]['MarketStatus'] === 'Open'  ? null : 'disabled'; ?> class="btn btn-danger w-100 my-3" onclick="<?php echo $mrkt[5]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertclosetrade\', \'resultid\', \'close\')' : ''; ?>">SELL</button>
        <?php }
        } ?>
        <div id="resultid"></div>
    </form>
    <div class="row">
        <div class="col">
            <small class="text-muted d-block">Profit/Loss</small>
            <?php
            $profitloss = ($stockdata['LastRate'] - $rowtran['price']) * $rowtran['qty'] * $lot;
            if ($rowtran['trademethod'] === 'Sell') {
                if ($profitloss <= 0) {
                    $profitloss = abs($profitloss);
                } else {
                    $profitloss = -$profitloss;
                }
            }
            ?>
            <small id="reqfund">₹<?= round($profitloss, 2) ?></small>
        </div>
        <!-- <div class="col-auto">
            <small class="text-muted d-block">Available Fund</small>
            <small>₹<?= round($investmentamount) ?></small>
        </div> -->
        <!--end col-->
    </div><!--end row-->
</div>
<script>
    $("#modalfooterbtn").css('display', 'none')
    <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
        // check if current time is between 9 am to 4 pm
        if ($hour >= 9 && $hour < 24) { ?>
            myinterval = setInterval(() => {
                $('#stockdetails').html()
                $.post("main/getlivemarketdatasingle.php", {
                        token: '<?= $token ?>',
                    },
                    function(data) {
                        $('#stockdetails').html(data)
                        price = $("#closingprice").val();
                        $("#Price").val(price)
                    },
                );
            }, <?= $apiinterval ?>)
    <?php }
    } ?>
</script>