<?php
include "main/session.php";
$mrkt = $obj->marketstatus();
// $mrkt[0]['MarketStatus'] = 'Open';
// $mrkt[5]['MarketStatus'] = 'Open';
$token = $_GET['hakuna'];
$exchange = $_GET['what'];
$id = $obj->selectfieldwhere("userstocks", "id", "symboltoken = '" . $token . "' and userid='$employeeid' and status = 1");
$lot = $obj->selectfieldwhere("userstocks", "mktlot", "symboltoken = '" . $token . "'  and status = 1 and userid='$employeeid'");
$rowfetch = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "symboltoken = '" . $token . "'  and status = 1 and userid='$employeeid'")->fetch_assoc();
$stockdata = $obj->fivepaisaapi(array($rowfetch));
if ($stockdata === 'Error fetching candle data:') {
    echo "<div class='alert alert-danger'>Something went wrong! Please Try Again or check if token is valid</div>";
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
    <form class="row gy-2 gx-3 align-items-end" id="buystock">
        <input type="hidden" name="symbol" value="<?= $stockdata['Symbol'] ?>" id="">
        <input type="hidden" name="exchange" value="<?= $stockdata['Exch'] ?>" id="">
        <input type="hidden" name="exchangetype" value="<?= $stockdata['ExchType'] ?>" id="">
        <input type="hidden" name="stockid" value="<?= $id ?>" id="">
        <input type="hidden" name="totalamount" id="totalamount" value="<?= $lot * $stockdata['LastRate'] ?>">
        <div class="col-3">
            <label class="form-label" for="Quantity">Lot</label>
            <input data-bvalidator='required' readonly name="lot" type="number" id="lot" onclick="this.select();" value="<?= $lot ?>" class="form-control form-control-sm">
        </div>
        <div class="col-4">
            <label class="form-label" for="Quantity">Lot/Quantity</label>
            <input data-bvalidator='required' name="qty" type="number" id="qty" onkeyup="sumfund()" onclick="this.select();" value="1" class="form-control form-control-sm">
        </div>
        <div class="col-5">
            <label class="form-label" for="Price">Price</label>
            <input type="text" readonly name="price" value="<?= $stockdata['LastRate'] ?>" class="form-control form-control-sm" id="Price">
        </div>
        <div style='display:none'>
        <label class="form-label" for="Quantity">Stop Loss</label>
        <div style="margin-left:3px;margin-right:3px" class="row ">
            <div class="col-5">
                <input type="text" readonly name="stoploss" value="<?= round(($stockdata['LastRate'] - $stockdata['LastRate'] * 8 / 100), 2) ?>" class="form-control form-control-sm" id="stoplossPrice">
            </div>
            <label class="switch">
                <input type="checkbox" id="sliderid" name='stoplossenabled' class="setactive" value="Yes">
                <span class="slider round"></span>
            </label>
        </div>
        <label class="form-label" for="Quantity">Target</label>
        <div style="margin-left:3px;margin-right:3px" class="row ">
            <div class="col-5">
                <input type="text" readonly name="target" value="<?= round(($stockdata['LastRate'] + $stockdata['LastRate'] * 10 / 100), 2) ?>" class="form-control form-control-sm" id="targetPrice">
            </div>
            <label class="switch">
                <input type="checkbox" id="tsliderid" name='targetenabled' class="setactive" value="Yes">
                <span class="slider round"></span>
            </label>
        </div>
        </div>
        <!-- <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="buy_limit">
                <label class="form-check-label" for="buy_limit">
                    Limit
                </label>
            </div>
        </div> -->
        <?php if ($stockdata['Exch'] === 'N' || $stockdata['Exch'] === 'B') { ?>
            <button <?php echo $investmentamount > 0 && $mrkt[0]['MarketStatus'] === 'Open'  ? null : 'disabled'; ?> class="btn btn-success w-100 my-3" onclick="<?php echo $investmentamount > 0 && $mrkt[0]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertbuystock\', \'resultid\', \'buystock\')' : ''; ?>">BUY</button>
        <?php } elseif ($stockdata['Exch'] === 'M') { ?>
            <button <?php echo $investmentamount > 0 && $mrkt[5]['MarketStatus'] === 'Open'  ? null : 'disabled'; ?> class="btn btn-success w-100 my-3" onclick="<?php echo $investmentamount > 0 && $mrkt[5]['MarketStatus'] === 'Open' ? 'event.preventDefault();sendForm(\'\', \'\', \'insertbuystock\', \'resultid\', \'buystock\')' : ''; ?>">BUY</button>
        <?php } ?>
        <div id="resultid"></div>
    </form>
    <div class="mt-3">
        <!-- <a class="" data-bs-toggle="collapse" href="user-index.htmlSL_Option" aria-expanded="false" aria-controls="collapseExample">
            Stop Loss <i class="fa-regular fa-circle-down"></i>
        </a> -->
        <div class="collapse" id="SL_Option">
            <form class="row gy-2 gx-3 align-items-center mt-1">
                <div class="col-auto">
                    <label class="form-label" for="Trigger_Price">Trigger Price</label>
                    <input type="text" class="form-control form-control-sm" id="Trigger_Price">
                </div>
                <div class="col-auto align-self-end">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="buy_SL">
                        <label class="form-check-label" for="buy_SL">
                            Stop Loss
                        </label>
                    </div>
                </div>
            </form>
        </div> <!--end collapse-->
    </div> <!--end /div-->

    <div class="row">
        <div class="col-6">
            <small class="text-muted d-block">Require Fund</small>
            <small id="reqfund">₹<?= number_format($lot * $stockdata['LastRate'], 2)  ?></small>

        </div><!--end col-->


        <div class="col-6" style="text-align: right;">
            <div id="profile-tooltip-id">
                <small class="text-muted d-block">Available Fund</small>
            </div>
            <small>₹<?= round($investmentamount) ?></small>
            <br> <small style="color:green">Margin/Limit: <?= $usermargin ?>x</small>
        </div><!--end col-->

        <!-- <div class="col-2">
            <div style="display: flex;flex-direction:row" id="profile-tooltip-id">
                <small class="text-muted d-block">Limit</small>
                
            </div>
            <small style="color:green">Margin Available : <?= $usermargin ?>x</small>
        </div> -->
        <!--end col-->

    </div><!--end row-->
</div><!--end modal-body-->
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