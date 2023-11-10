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
<div class="row mb-4">
    <?php foreach ($marketdata as $mdata) {  ?>
        <div class="col-6">
            <div class="card">
                <div class="card-body" style="padding: 10px 25px;">
                    <span class="fw-medium d-block mb-1"><?= $mdata['Symbol'] ?></span>
                    <h3 class="card-title mb-0">₹<?= $mdata['LastRate'] ?> <span> <small <?= $mdata['ChgPcnt'] > 0 ? "class='text-success fw-medium'" : "class='text-danger fw-medium'" ?>><i class="bx bx-up-arrow-alt"></i> ₹<?= $mdata['Chg'] ?> (<?= round($mdata['ChgPcnt'], 2) ?>%)</small></span></h3>
                </div>
            </div>


        </div>
    <?php } ?>
</div>



<?php
foreach ($stockdata as $data) { ?>
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card">
            <div class="card-body" style="padding: 15px 20px;">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <span class="fw-medium d-block mb-1"><?= $obj->selectfieldwhere("userstocks", "Symbol", "symboltoken='" . $data['Token'] . "' and userid = '" . $employeeid . "'") ?></span>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                            <a class="dropdown-item" href="viewchart?token=<?= $data['Token'] ?>&exchangetype=<?= $data['ExchType'] ?>&exchange=<?= $data['Exch'] ?>">View Chart</a>
                            <a class="dropdown-item" onclick="removestock('<?= $data['Token'] ?>','<?= $data['Exch']  ?>')" href="javascript:void(0);">Delete</a>
                        </div>
                    </div>
                </div>

                <h3 class="card-title mb-0">₹<?= $data['LastRate'] ?> <span> <small <?= $data['ChgPcnt'] > 0 ? "class='text-success fw-medium'" : "class='text-danger fw-medium'" ?>>
                            <?php if ($data['ChgPcnt'] > 0) { ?>
                                <i class="bx bx-up-arrow-alt"></i>
                            <?php } else { ?>
                                <i class="bx bx-down-arrow-alt"></i>
                            <?php } ?>
                            <span>₹<?= $data['Chg'] ?> (<?= round($data['ChgPcnt'], 2) ?>%)</span></small></span></h3>

                <div class="row mt-2">

                    <div class="col-4 high-low"><span>High<br></span> <span style="color: rgb(54, 53, 53);"><?= $currencysymbol ?><?= $data['High'] ?></span></div>
                    <div class="col-4 high-low"><span>Low<br></span> <span style="color: rgb(54, 53, 53);"><?= $currencysymbol ?><?= $data['Low'] ?></span></div>
                    <div class="col-4 high-low"><span>Close<br></span> <span style="color: rgb(54, 53, 53);"><?= $currencysymbol ?><?= $data['PClose'] ?></span></div>

                </div>

                <div class="row mt-3">
                    <div class="col-6"> <button type="submit" class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $data["Token"] ?>", "buystock","", "Buy Stock")' style="width: 100%; background-color: #55bc1d; border-color: #55bc1d;">Buy</button></div>
                    <div class="col-6"> <button type="submit" class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $data["Token"] ?>", "sellstock","", "Sell Stock")' style="width: 100%; background-color: rgb(213, 9, 9); border-color: rgb(213, 9, 9);">Sell</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>