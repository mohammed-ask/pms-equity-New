<?php
include "main/session.php";
$mrkt = $obj->marketstatus();
$nsemarket = array_filter($mrkt, function ($data) {
    if ($data['Exch'] === 'N' && $data['ExchType'] === 'C') {
        return $data;
    }
});
$commoditymrkt = array_filter($mrkt, function ($data) {
    if ($data['Exch'] === 'M' && $data['ExchType'] === 'D') {
        return $data;
    }
});
$nsemarket = array_values($nsemarket);
$commoditymrkt = array_values($commoditymrkt);
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
<div id="stockdetails">
    <div class="card-title d-flex align-items-start justify-content-between">
        <span class="fw-medium d-block mb-1"><?= $stockdata['Symbol'] ?> <small class="text-primary fw-medium"><br><span><?php $exc = $stockdata['Exch'] == 'B' ? ' BSE' : ' NSE';
                                                                                                                            echo  $exc  ?></span></small></span>

        <div>
            <span class="text-success fw-bold" style="padding-top: 5px; font-size: 12px;">Live</span>
            <div style="width: 10px !important; height: 10px !important;" class="spinner-grow text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>

        </div>
    </div>

    <h3 class="card-title mb-0">₹<?= $stockdata['LastRate'] ?> <span> <small <?= $stockdata['ChgPcnt'] > 0 ? "class='text-success fw-medium'" : "class='text-danger fw-medium'" ?>><i class="bx bx-down-arrow-alt"></i>
                <span>₹<?= $stockdata['Chg'] ?> (<?= round($stockdata['ChgPcnt'], 2) ?>%)</span></small></span></h3>

</div>
<div class="mt-3" style="font-size: 14px;"> <span style="font-weight: 700; margin-right: 5px;">Default Lot:</span> <?= $lot ?> </div>
<!-- <div class="modal-body"> -->
<form class="row gy-2 gx-3 align-items-end" id="close">
    <input type="hidden" name="symbol" value="<?= $stockdata['Symbol'] ?>" id="">
    <input type="hidden" name="exchange" value="<?= $stockdata['Exch'] ?>" id="">
    <input type="hidden" name="oldprice" value="<?= $rowtran['price'] ?>" id="">
    <input type="hidden" name="tradeid" value="<?= $rowtran['id'] ?>" id="">
    <input type="hidden" name="amountpaid" value="<?= $rowtran['totalamount'] ?>" id="">
    <input type="hidden" name="limit" value="<?= $rowtran['limit'] ?>" id="">
    <input type="hidden" name="type" value="<?= $rowtran['type'] ?>" id="">
    <input type="hidden" readonly name="lot" id="lot" value="<?= $lot ?>">
    <div class="row g-2 mt-2">
        <div class="col-4 mb-0">
            <label for="stock" class="form-label mb-0">Lot/Qty</label>
            <input type="text" data-bvalidator='required' name="qty" type="number" id="qty" onkeyup="sumfund()" onclick="this.select();" value="1" class="form-control p-1" />
        </div>
        <div class="col-6 mb-0">
            <label for="stock" class="form-label mb-0">Buying Price <span><button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="Selling price per Quantity/Lot">
                        <i class='bx bx-message-rounded-error'></i>
                    </button></span></label>
            <input type="text" type="text" readonly name="price" value="<?= $stockdata['LastRate'] ?>" id="Price" class="form-control p-1" placeholder="" />
        </div>
    </div>
    <!-- <input type="hidden" name="totalamount" id="totalamount" value=""> -->
    <!-- <div class="col-3">
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
    </div> -->
    <?php
    if ($_GET['what'] === 'Sell') {
        if ($stockdata['Exch'] === 'N' || $stockdata['Exch'] === 'B') { ?>
            <button <?php echo  $nsemarket[0]['MarketStatus'] === 'Open'  ? null : 'disabled'; ?> class="btn btn-success w-100 my-3" onclick="<?php echo $nsemarket[0]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertclosetrade\', \'resultid\', \'close\')' : ''; ?>">BUY</button>
        <?php } elseif ($stockdata['Exch'] === 'M') { ?>
            <button <?php echo  $commoditymrkt[0]['MarketStatus'] === 'Open'  ? null : 'disabled'; ?> class="btn btn-success w-100 my-3" onclick="<?php echo $commoditymrkt[0]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertclosetrade\', \'resultid\', \'close\')' : ''; ?>">BUY</button>
        <?php }
    } else if ($_GET['what'] === 'Buy') {
        if ($stockdata['Exch'] === 'N' || $stockdata['Exch'] === 'B') { ?>
            <button <?php echo  $nsemarket[0]['MarketStatus'] === 'Open'  ? null : 'disabled'; ?> class="btn btn-danger w-100 my-3" onclick="<?php echo $nsemarket[0]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertclosetrade\', \'resultid\', \'close\')' : ''; ?>">SELL</button>
        <?php } elseif ($stockdata['Exch'] === 'M') {  ?>
            <button <?php echo  $commoditymrkt[0]['MarketStatus'] === 'Open'  ? null : 'disabled'; ?> class="btn btn-danger w-100 my-3" onclick="<?php echo $commoditymrkt[0]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertclosetrade\', \'resultid\', \'close\')' : ''; ?>">SELL</button>
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
<!-- </div> -->
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