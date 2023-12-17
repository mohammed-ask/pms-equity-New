<?php
include "session.php";
$watchlistsym = [];
$sexchange = [];
$expiredstock = $obj->selectfieldwhere("userstocks", "group_concat(distinct(id))", "userid='" . $employeeid . "' and STR_TO_DATE(Expiry, '%Y%m%d') < date(CONVERT_TZ(NOW(),'+00:00','$timeskip'))  and Expiry != '' and Expiry is not null and status = 1");
if (!empty($expiredstock)) {
    $obj->deletewhere("userstocks", "id in (" . $expiredstock . ")");
    $obj->deletewhere("watchliststock", "userstockid in (" . $expiredstock . ")");
}
$wexch = $obj->selectfieldwhere("watchliststock", "group_concat(distinct(exchange))", "userid='" . $employeeid . "' and status = 1");
if (!empty($wexch)) {
    $sexchange = explode(",", $wexch);
}
$wsymbol = $obj->selectfieldwhere("watchliststock", "group_concat(distinct(symbol))", "userid='" . $employeeid . "' and status = 1");
if (!empty($wsymbol)) {
    $watchlistsym = explode(",", $wsymbol);
}
$fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "' and status = 1");
$rowfetch = mysqli_fetch_all($fetchshare, 1);
// print_r($rowfetch);
array_push($rowfetch, ["Exch" => "N", "ExchType" => "C", "Symbol" => "NIFTY", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "B", "ExchType" => "C", "Symbol" => "SENSEX", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""]);
// echo "<pre>";
// print_r($rowfetch);
// echo "</pre>";
$stockdata = $obj->fivepaisaapi($rowfetch);
// echo "<pre>";
// print_r($stockdata);
// echo "</pre>";
// die;
$stockdata = $stockdata == 'Error fetching candle data:' ? [] : $stockdata;
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
if ($marketmaintanance) {
    include "maintenance.php";
?>
<?php } else { ?>


    <div class="" id="userstock">

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


        <div class="row">
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
        </div><!--end row-->
        <div class="search-stock"> <button type="button" class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "searchstock","", "Search Stock by Symbol")'><i class='bx bxs-file-find'></i>Add Stocks</button>
        </div>
    </div>
<?php
}
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Live Market - PMS Equity";
$contentheader = "";
$pageheader = "";
$watchliststocks = $wstocks;
include "main/templete.php"; ?>
<script>
    let myinterval = null;
    // check if current day is a weekday (Monday to Friday)
    <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
        // check if current time is between 9 am to 4 pm
        if ($hour >= 9 && $hour < 24) { ?>
            setInterval(() => {
                console.log('counting market')
                $('#userstock').html()
                $.post("main/getlivemarketdata.php", {
                        wexcg: '<?= implode(",", $sexchange) ?>',
                        wsymbol: '<?= implode(",", $watchlistsym) ?>'
                    },

                    function(data) {
                        $('#userstock').html(data)
                        // let sidedata = $('#sidebarcolumn').html()
                        // $("#watchlist_2").html(sidedata)
                    },
                );
            }, <?= $apiinterval ?>)
    <?php }
    } ?>

    $('#myModal').on('hidden.bs.modal', function() {
        // refresh current page
        clearInterval(myinterval)
    })

    function removestock(token, excg) {
        let text = "Are you sure you want to remove this stock";
        if (confirm(text) == true) {
            $.post("main/removestock.php", {
                    token: token,
                    exchange: excg
                },
                function(data) {
                    if (data === 'Success') {
                        window.location.reload()
                    } else if ('Failed') {
                        alertify.alert("Can't remove this stock, Your position is still open")
                    }
                },
            );
        } else {
            text = "You canceled!";
        }
    }

    function addtowatchlist(symbol, excg, token) {
        $.post("main/addtowatchlist.php", {
                symbol: symbol,
                exchange: excg,
                token: token,
            },
            function(data) {
                if (data === 'Success') {
                    window.location.reload()
                } else if (data === 'Deleted') {
                    window.location.reload()
                } else {
                    alertify.alert('result', 'Some Error Occured', function() {
                        window.location.reload()
                    })
                }
            },
        );
    }

    function removewatchlist(symbol, excg) {
        $.post("main/removefromwatchlist.php", {
                symbol: symbol,
                exchange: excg
            },
            function(data) {
                if (data === 'Deleted') {
                    window.location.reload()
                } else {
                    alertify.alert('result', 'Some Error Occured', function() {
                        window.location.reload()
                    })
                }
            },
        );
    }
</script>