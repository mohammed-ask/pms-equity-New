<?php
include "./session.php";
$token = $_POST['token'];
$rowfetch = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "symboltoken = '" . $token . "'  and status = 1")->fetch_assoc();
$stockdata = $obj->fivepaisaapi(array($rowfetch));
$stockdata = $stockdata[0];
?>
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
    <input type="hidden" value="<?= $stockdata['LastRate'] ?>" id="closingprice">
</div>