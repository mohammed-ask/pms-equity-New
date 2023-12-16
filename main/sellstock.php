<?php
include "main/session.php";
$mrkt = $obj->marketstatus();
$mrkt = $mrkt === 'Error fetching:' ? [] : $mrkt;
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
// $mrkt = 'Open';
$token = $_GET['hakuna'];
$exchange = $_GET['what'];
$id = $obj->selectfieldwhere("userstocks", "id", "symboltoken = '" . $token . "' and status = 1 and userid='$employeeid'");
$lot = $obj->selectfieldwhere("userstocks", "mktlot", "symboltoken = '" . $token . "'  and status = 1 and userid='$employeeid'");
$rowfetch = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "symboltoken = '" . $token . "'  and status = 1 and userid='$employeeid'")->fetch_assoc();
$stockdata = $obj->fivepaisaapi(array($rowfetch));
if ($stockdata === 'Error fetching candle data:') {
    echo "<div class='alert alert-danger'>Something went wrong! Please Try Again or check if token is valid</div>";
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
<form class="row" id="buystock">
    <input type="hidden" name="symbol" value="<?= $stockdata['Symbol'] ?>" id="">
    <input type="hidden" name="exchange" value="<?= $stockdata['Exch'] ?>" id="">
    <input type="hidden" name="exchangetype" value="<?= $stockdata['ExchType'] ?>" id="">
    <input type="hidden" name="stockid" value="<?= $id ?>" id="">
    <input type="hidden" name="totalamount" id="totalamount" value="<?= $lot * $stockdata['LastRate'] ?>">
    <input type="hidden" data-bvalidator='required' readonly name="lot" type="number" id="lot" onclick="this.select();" value="<?= $lot ?>" class="form-control form-control-sm">
    <div class="row mt-2">
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



    <div class="row mt-3" style="padding-right: 0px;">
        <?php
        if (!empty($mrkt)) { ?>
            <div class="col" style="padding-right: 0px;">
                <?php if ($stockdata['Exch'] === 'N' || $stockdata['Exch'] === 'B') { ?>
                    <button style="width: 100%; background-color: rgb(213, 9, 9); border-color: rgb(213, 9, 9);" <?php echo $investmentamount > 0 && $nsemarket[0]['MarketStatus'] === 'Open' ? null : 'disabled'; ?> class="btn btn-danger w-100 my-3" onclick="<?php echo $investmentamount > 0 && $nsemarket[0]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertsellstock\', \'resultid\', \'sellstock\')' : ''; ?>">SELL</button>
                <?php } elseif ($stockdata['Exch'] === 'M') { ?>
                    <button style="width: 100%; background-color: rgb(213, 9, 9); border-color: rgb(213, 9, 9);" <?php echo $investmentamount > 0 && $commoditymrkt[5]['MarketStatus'] === 'Open' ? null : 'disabled'; ?> class="btn btn-danger w-100 my-3" onclick="<?php echo $investmentamount > 0 && $commoditymrkt[5]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertsellstock\', \'resultid\', \'sellstock\')' : ''; ?>">SELL</button>
                <?php } ?>
                <div id="resultid"></div>
                <!-- <div class="col"> <button type="submit" class="btn btn-primary" style="width: 100%; background-color: rgb(213, 9, 9); border-color: rgb(213, 9, 9);">Sell</button>
                    </div> -->
            </div>
        <?php } ?>
    </div>

    <div class="row mt-3 mb-1" style="padding-right: 0px;">

        <div class="col-4 high-low"><span>Req. Fund<br></span> <span id="reqfund" style="color: rgb(54, 53, 53);">₹<?= number_format($lot * $stockdata['LastRate'], 2)  ?></span></div>
        <div class="col-4 high-low" style="text-align: center;"><span>Margin<br></span> <span style="color: rgb(54, 53, 53);"><?= $usermargin ?>x</span></div>
        <div class="col-4 high-low" style="text-align: right; padding-right:0px;"><span>Avail. Fund<br></span> <span style="color: rgb(54, 53, 53);">₹<?= round($investmentamount) ?></span></div>
    </div>
</form>

<script>
    $("#modalfooterbtn").css('display', 'none')
    // check if current day is a weekday (Monday to Friday)
    <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
        // check if current time is between 9 am to 4 pm
        if ($hour >= 9 && $hour < 24) { ?>
            myinterval = setInterval(() => {
                $('#stockdetails').html()
                $.post("main/getlivemarketdatasingle.php", {
                        token: '<?= $token ?>',
                        exchange: '<?= $exchange ?>'
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

    function sumfund() {
        var qty = $("#qty").val();
        var price = $("#Price").val()
        var lot = $("#lot").val()
        limit = <?= $usermargin; ?>;
        require = parseInt(lot) * parseInt(qty) * parseFloat(price)
        $("#reqfund").html("₹" + require.toFixed(2))
        $("#totalamount").val(require)
    }

    $('#sliderid').change(function() {
        if ($(this).is(':checked')) {
            $('#stoplossPrice').removeAttr('readonly');
        } else {
            $('#stoplossPrice').attr('readonly', true);
        }
    })

    $('#tsliderid').change(function() {
        if ($(this).is(':checked')) {
            $('#targetPrice').removeAttr('readonly');
        } else {
            $('#targetPrice').attr('readonly', true);
        }
    })
</script>