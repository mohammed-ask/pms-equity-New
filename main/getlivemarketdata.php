<?php
include "./session.php";
$watchlistsym = explode(",", $_POST['wsymbol']);
$sexchange = explode(",", $_POST['wexcg']);
$fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "' and status = 1");
$rowfetch = mysqli_fetch_all($fetchshare, 1);
array_push($rowfetch, ["Exch" => "N", "ExchType" => "C", "Symbol" => "NIFTY", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "B", "ExchType" => "C", "Symbol" => "SENSEX", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""]);

$stockdata = $obj->fivepaisaapi($rowfetch);
$marketdata = array_filter($stockdata, function ($data) {
    if ($data['Symbol'] === 'NIFTY' || $data['Symbol'] === 'SENSEX') {
        return $data;
    }
});
$stockdata = array_filter($stockdata, function ($data) {
    if ($data['Token'] !== 999920000 && $data['Token'] !== 999901) {
        return $data;
    }
});
$wstocks = array_filter($stockdata, function ($data) use ($watchlistsym, $sexchange) {
    if (in_array($data['Symbol'], $watchlistsym) && in_array($data['Exch'], $sexchange))
        return $data;
});
?>
<div class="national-data">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12 mt-2 mb-2">
                <div class="page-title-box d-inline-block d-md-flex justify-content-start justify-content-md-between align-items-center">
                    <div class="my-md-0 m-subheader">
                        <?php foreach ($marketdata as $mdata) {  ?>
                            <div class="nifty-50 d-inline-block me-3 nifty-sensex-border">
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
</div>
<?php
foreach ($stockdata as $data) { ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <a href="#" class="">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center">
                            <h6 class="m-0 text-uppercase font-13"><?= $obj->selectfieldwhere("userstocks", "Symbol", "symboltoken='" . $data['Token'] . "' and userid = '" . $employeeid . "'") ?></h6>
                            <p class="text-uppercase font-10 mb-0"><?php $exc = $data['Exch'] == 'B' ? ' BSE' : ' NSE';
                                                                    echo  $exc  ?></p>
                        </div>
                        <div>
                            <h6 class="m-0 text-uppercase font-11">₹<?= $data['LastRate'] ?> <?php if ($data['ChgPcnt'] > 0) { ?>
                                    <i class="fa-solid fa-arrow-trend-up text-success"></i>
                                <?php } else { ?>
                                    <i class="fa-solid fa-arrow-trend-down text-danger"></i>
                                <?php } ?>
                            </h6>
                            <div class="d-inline-block font-10"><span <?= $data['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>><?= $data['Chg'] ?></span> <span <?= $data['ChgPcnt'] > 0 ? "class='text-success'" : "class='text-danger'" ?>>(<?= round($data['ChgPcnt'], 2) ?>%)</span></div>
                        </div>
                        <div>
                            <i class="fa fa-times" style="color:grey" aria-hidden="true" onclick="removestock('<?= $data['Symbol'] ?>','<?= $data['Exch']  ?>')"></i>
                        </div>
                    </div><!-- end /div -->
                </a> <!--end-->
                <hr class="hr-dashed">
                <div class="row mt-3 text-center">
                    <!-- <div class="col-6 col-md-4 border-end">
                        <p class="mb-1 text-muted">Open</p>
                        <span>₹144.45</span>
                    </div> -->
                    <div class="col-6 col-md-4 border-end">
                        <p class="mb-1 text-muted">High</p>
                        <span><?= $currencysymbol ?><?= $data['High'] ?></span>
                    </div>
                    <div class="col-6 col-md-4 border-end">
                        <p class="mb-1 text-muted">Low</p>
                        <span><?= $currencysymbol ?><?= $data['Low'] ?></span>
                    </div>
                    <div class="col-6 col-md-4">
                        <p class="mb-1 text-muted">Close</p>
                        <span><?= $currencysymbol ?><?= $data['PClose'] ?></span>
                    </div>
                </div>

                <hr class="hr-dashed">

                <div class="d-flex justify-content-between">
                    <div class="action-icons">
                        <ul class="list-inline">
                            <li class="list-inline-item align-self-center mx-0 bg-success" style="padding: 3px 8px 3px 8px !important;
                                                    font-weight: 500 !important; margin-right: 10px !important;">
                                <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $data["Token"] ?>", "buystock","<?= $data["Exch"] ?>", "Buy Stock")'><i class=""></i> Buy</a>
                            </li><!--end /li-->
                            <li class="list-inline-item align-self-center mx-0 bg-danger" style="padding: 3px 8px 3px 8px !important;
                                                    font-weight: 500 !important; margin-right: 10px !important;">
                                <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $data["Token"] ?>", "sellstock","<?= $data["Exch"] ?>", "Sell Stock")'>Sell</a>
                            </li><!--end /li-->
                            <li <?= (in_array($data['Symbol'], $watchlistsym) && in_array($data['Exch'], $sexchange)) ?  "style='background-color:#0073cf;cursor:pointer'" : "style='cursor:pointer'" ?> class="list-inline-item align-self-center mx-0">

                                <i <?= (in_array($data['Symbol'], $watchlistsym) && in_array($data['Exch'], $sexchange)) ?  "style='color:white'" : "" ?> onclick="addtowatchlist('<?= $data['Symbol'] ?>','<?= $data['Exch']  ?>','<?= $data['Token']  ?>')" class="fa-solid fa-plus email-action-icons-item"></i>
                            </li><!--end /li-->
                        </ul><!--end /ul-->

                    </div> <!--end action-icons-->

                    <div>
                        <a href="viewchart?token=<?= $data['Token'] ?>&exchangetype=<?= $data['ExchType'] ?>&exchange=<?= $data['Exch'] ?>">
                            <p class="mb-0 text-muted">View Chart <span><i class="fa-solid fa-arrow-right"></i></span></p>
                        </a>
                    </div>
                </div>

            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
<?php } ?>
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
                                    <a onclick="removewatchlist('<?= $wdata['Token'] ?>','<?= $wdata['Exch']  ?>')"><i class="fa-regular fa-trash-can email-action-icons-item"></i></a>
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