<?php
include "./session.php";
$fetchshare = $obj->selectextrawhereupdate('userstocks inner join watchliststock on watchliststock.userstockid = userstocks.id', "Exch,ExchType,userstocks.Symbol,Expiry,StrikePrice,OptionType", "userstocks.userid='" . $employeeid . "' and userstocks.status = 1 and watchliststock.status = 1");
$rowfetch = mysqli_fetch_all($fetchshare, 1);
array_push($rowfetch, ["Exch" => "N", "ExchType" => "C", "Symbol" => "NIFTY", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "B", "ExchType" => "C", "Symbol" => "SENSEX", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "N", "ExchType" => "C", "Symbol" => "ZOMATO", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "N", "ExchType" => "C", "Symbol" => "INFY", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "N", "ExchType" => "C", "Symbol" => "M&M", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "N", "ExchType" => "C", "Symbol" => "RELIANCE", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""]);

$stockdata = $obj->fivepaisaapi2($rowfetch);
$marketdata = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] === 'NIFTY' || $data['Symbol'] === 'SENSEX') {
        return $data;
    }
});
$wstocks = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] !== 'NIFTY' && $data['Symbol'] !== 'SENSEX') {
        return $data;
    }
});

$primarystock = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] === 'ZOMATO' || $data['Symbol'] === 'INFY' || $data['Symbol'] === 'M&M' || $data['Symbol'] === 'RELIANCE') {
        return $data;
    }
});
$primarystock = array_values($primarystock);

/* @var $obj db */
?>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12 mt-2 mb-2">
            <div class="page-title-box d-inline-block d-md-flex justify-content-start justify-content-md-between align-items-center">
                <div class="my-md-0 m-subheader">
                    <?php foreach ($marketdata as $mdata) {  ?>
                        <div class="nifty-50 d-inline-block nifty-sensex-border">
                            <div class="font-11 fw-semibold"><?= $mdata['Symbol'] ?></div>
                            <div class="d-inline-block font-11"><?= $mdata['LastRate'] ?> <span <?= $mdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $mdata['Chg'] ?> </span>
                                <span <?= $mdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($mdata['ChgPcnt'], 2) ?>%)</span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="primarystocks" style="display: none;">
    <div class="row">

        <div class="col-6">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body">
                    <div>
                        <div class="font-11 fw-semibold"><?= $primarystock[0]['Symbol'] ?></div>
                        <div class="d-inline-block font-11"><span>₹</span> <?= $primarystock[0]['LastRate'] ?> <div <?= $primarystock[0]['Chg'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $primarystock[0]['Chg'] ?> <span <?= $primarystock[0]['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($primarystock[0]['ChgPcnt'], 2) ?>%)</span> </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body">

                    <div>
                        <div class="font-11 fw-semibold"><?= $primarystock[1]['Symbol'] ?></div>
                        <div class="d-inline-block font-11"><span>₹</span> <?= $primarystock[1]['LastRate'] ?> <div <?= $primarystock[1]['Chg'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $primarystock[1]['Chg'] ?> <span <?= $primarystock[1]['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($primarystock[1]['ChgPcnt'], 2) ?>%)</span> </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-6">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body">
                    <div>
                        <div class="font-11 fw-semibold"><?= $primarystock[2]['Symbol'] ?></div>
                        <div class="d-inline-block font-11"><span>₹</span> <?= $primarystock[2]['LastRate'] ?> <div <?= $primarystock[2]['Chg'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $primarystock[2]['Chg'] ?> <span <?= $primarystock[2]['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($primarystock[2]['ChgPcnt'], 2) ?>%)</span> </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body">

                    <div>
                        <div class="font-11 fw-semibold"><?= $primarystock[3]['Symbol'] ?></div>
                        <div class="d-inline-block font-11"><span>₹</span> <?= $primarystock[3]['LastRate'] ?> <div <?= $primarystock[3]['Chg'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $primarystock[3]['Chg'] ?> <span <?= $primarystock[3]['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($primarystock[3]['ChgPcnt'], 2) ?>%)</span> </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<div id="sidebarcolumn" style="display: none;">
    <?php
    $i = 0;
    foreach ($wstocks as $wdata) { ?>
        <div class="accordion-item border-top-0">
            <div class="accordion-header" id="heading<?= $i ?>">
                <a class="accordion-button d-block py-2 px-3 collapsed" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center">
                            <h6 class="m-0 text-uppercase font-11">
                                <?= $wdata['Symbol'] ?></h6>
                            <p class="text-uppercase font-10 mb-0">
                                <?php $exc = $wdata['Exch'] == 'B' ? ' BSE' : ' NSE';
                                echo  $exc  ?></p>
                        </div>
                        <div>
                            <h6 class="m-0 text-uppercase font-11">
                                ₹<?= $wdata['LastRate'] ?><?php if ($wdata['ChgPcnt'] > 0) { ?>
                                <i class="fa-solid fa-arrow-trend-up text-success"></i>
                            <?php } else { ?>
                                <i class="fa-solid fa-arrow-trend-down text-danger"></i>
                            <?php } ?>
                            </h6>
                            <div class="d-inline-block font-10">
                                <span <?= $wdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $wdata['Chg'] ?></span>
                                <span <?= $wdata['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($wdata['ChgPcnt'], 2) ?>%)</span>
                            </div>
                        </div>
                    </div><!-- end /div -->
                </a>
            </div>
            <div id="collapse<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $i ?>" data-bs-parent="#watchlist_2">
                <div class="accordion-body">
                    <div class="d-flex justify-content-between">
                        <div class="action-icons">
                            <ul class="list-inline">
                                <li class="list-inline-item align-self-center mx-0 bg-success">
                                    <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $wdata["Symbol"] ?>", "buystock","<?= $wdata["Exch"] ?>", "Buy Stock")'><i class="fa-solid fa-b text-white email-action-icons-item"></i></a>
                                </li><!--end /li-->
                                <li class="list-inline-item align-self-center mx-0 bg-danger">
                                    <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $wdata["Symbol"] ?>", "sellstock","<?= $wdata["Exch"] ?>", "Sell Stock")'><i class="fa-solid fa-s text-white email-action-icons-item"></i></a>
                                </li><!--end /li-->
                                <li class="list-inline-item align-self-center mx-0">
                                    <a href="details.html"><i class="fa-solid fa-sliders email-action-icons-item"></i></a>
                                </li><!--end /li-->
                                <li class="list-inline-item align-self-center mx-0">
                                    <a onclick="removewatchlist('<?= $wdata['Symbol'] ?>','<?= $wdata['Exch']  ?>')"><i class="fa-regular fa-trash-can email-action-icons-item"></i></a>
                                </li><!--end /li-->
                            </ul><!--end /ul-->
                        </div> <!--end action-icons-->
                        <!-- <div>
                                                                    <p class="mb-0 text-muted">Avg.
                                                                        Traded Price : <span class="fw-semibold text-dark">₹148.00</span>
                                                                    </p>
                                                                </div> -->
                    </div>

                </div><!--end accordion-body-->
            </div>
        </div>
    <?php $i++;
    } ?>
</div>