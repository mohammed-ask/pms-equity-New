<?php
include "./session.php";
$token = $_POST['token'];
$rowfetch = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "symboltoken = '" . $token . "'  and status = 1")->fetch_assoc();
$stockdata = $obj->fivepaisaapi(array($rowfetch));
$stockdata = $stockdata[0];
?>
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
<input type="hidden" value="<?= $stockdata['LastRate'] ?>" id="closingprice">

<!-- <div>
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
</div> -->