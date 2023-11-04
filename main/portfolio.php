<?php
include "session.php";
// Total Fund
$current_time = date("H:i");
$fundadded = $obj->selectfieldwhere("fundrequest", 'sum(amount)', "userid=" . $employeeid . " and status = 1");
$fundadded = empty($fundadded) ? 0 : $fundadded;
$fundwithdraw = $obj->selectfieldwhere("withdrawalrequests", 'sum(amount)', "userid=" . $employeeid . " and status = 1");
$fundwithdraw = empty($fundwithdraw) ? 0 : $fundwithdraw;
$aistat = $obj->selectfieldwhere("users", 'aitrading', 'id=' . $employeeid . '');

//Today Profit
$todayprofit = $obj->selectfieldwhere("closetradedetail", "sum(totalprofit)", "date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) and userid=$employeeid and status = 1");
$todayprofit = empty($todayprofit) ? 0 : $todayprofit;

//Overall Profit
$completedtotalprofit = $obj->selectfieldwhere("closetradedetail", "sum(totalprofit)", "userid=$employeeid and totalprofit > 0");

//Overall Loss
$completedtotalloss = $obj->selectfieldwhere("closetradedetail", "sum(totalprofit)", "userid=$employeeid and totalprofit < 0");
$completedtotalloss = empty($completedtotalloss) ? 0 : $completedtotalloss;

// Invested Amount
$investamt = $obj->selectfieldwhere("stocktransaction", "sum(totalamount)", "userid=$employeeid and status = 0 and tradestatus = 'Open'");
$investamt = empty($investamt) ? 0 : $investamt;

$totalstocktraded = $obj->selectfieldwhere(
    "stocktransaction",
    "group_concat(distinct(stockid))",
    "status = 0 and userid = $employeeid and tradestatus='Open' and stockid != '' and stockid is not null"
);

if (!empty($totalstocktraded)) {
    $fetchshare = $obj->selectextrawhereupdate('userstocks', "Exch,ExchType,Symbol,Expiry,StrikePrice,OptionType", "userid='" . $employeeid . "' and status = 1 and id in (" . $totalstocktraded . ")");
    $rowfetch = mysqli_fetch_all($fetchshare, 1);
    $stockdata = $obj->fivepaisaapi($rowfetch);
}
$stockdata = isset($stockdata) && $stockdata !== 'Error fetching candle data:' ? $stockdata : [];
// echo "<pre>";
// print_r($stockdata);
// die;
$totalprofit = $completedtotalprofit;
$totalloss = $completedtotalloss;
$result = $obj->selectextrawhereupdate(
    "stocktransaction",
    "*",
    "status = 0 and userid = $employeeid and tradestatus='Open' and stockid != '' and stockid is not null"
);
// print_r(mysqli_fetch_all($result, MYSQLI_ASSOC));
// die;

if (!empty($stockdata)) {
    while ($row = $obj->fetch_assoc($result)) {
        $symbol = $row['symbol'];
        $excg = $row['exchange'];
        $token = $obj->selectfieldwhere("userstocks", "symboltoken", "id=" . $row['stockid'] . "");

        $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg, $token) {
            if ($data['Token'] == $token) {
                return $data;
            }
        });
        $keys = array_keys($pricedata)[0];
        //Adding Invested Amount

        // Adding Profit on Total Share
        $profitloss = ($pricedata[$keys]['LastRate'] - $row['price']) * $row['qty'] * $row['mktlot'];
        if ($row['trademethod'] === 'Sell') {
            if ($profitloss <= 0) {
                $profitloss = abs($profitloss);
            } else {
                $profitloss = -$profitloss;
            }
        }
        if ($profitloss > 0) {
            $totalprofit = $totalprofit + $profitloss;
        } else {
            $totalloss = $totalloss + ($profitloss);
        }
    }
}

// Today Shares Only
$result2 = $obj->selectextrawhereupdate(
    "stocktransaction",
    "*",
    "date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip')) and status = 0 and userid = $employeeid and tradestatus='Open' and stockid != '' and stockid is not null"
);

if (!empty($stockdata)) {
    while ($row = $obj->fetch_assoc($result2)) {
        $symbol = $row['symbol'];
        $excg = $row['exchange'];
        $token = $obj->selectfieldwhere("userstocks", "symboltoken", "id=" . $row['stockid'] . "");
        $pricedata = array_filter($stockdata, function ($data) use ($symbol, $excg, $token) {
            if ($data['Token'] == $token) {
                return $data;
            }
        });
        $keys = array_keys($pricedata)[0];
        //Adding Invested Amount

        // Adding Profit on Total Share
        $profitloss = ($pricedata[$keys]['LastRate'] - $row['price']) * $row['qty'] * $row['mktlot'];
        if ($row['trademethod'] === 'Sell') {
            if ($profitloss <= 0) {
                $profitloss = abs($profitloss);
            } else {
                $profitloss = -$profitloss;
            }
        }
        $todayprofit = $todayprofit + $profitloss;
    }
}

$totalprofit = empty($totalprofit) ? 0 : $totalprofit;
$totalprofitprcnt = 0;
$stocktotalamt = $obj->selectfieldwhere("stocktransaction", "sum(totalamount)", " userid = $employeeid and ((status in (1, 0) and tradestatus in ('Open','Close') and stockid != '' and stockid is not null) || (status = 1 and tradestatus = 'Close' and (stockid = '' || stockid is null)))");
if ($stocktotalamt != 0) {
    $totalprofitprcnt = $totalprofit * 100 / $stocktotalamt;
}

$todaystocktotalamt = $obj->selectfieldwhere("stocktransaction", "sum(totalamount)", "date(added_on) = date(CONVERT_TZ(NOW(),'+00:00','$timeskip'))  and userid = $employeeid and ((status in (1, 0) and tradestatus in ('Open','Close') and stockid != '' and stockid is not null) || (status = 1 and tradestatus = 'Close' and (stockid = '' || stockid is null)))");
$todayprofitpercent = 0;
if ($todaystocktotalamt != 0) {
    $todayprofitpercent = $todayprofit * 100 / $todaystocktotalamt;
}
if ($portfoliomaintanance) {
    include "maintenance.php";
?>
<?php } else { ?>
    <div class="row">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body" style="padding: 15px 20px;">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <span class="fw-medium d-block mb-1">Amount Invested</span>
                            <div>
                                <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="Total funds currently allocated to stock holdings.">
                                    <i class='bx bx-message-rounded-error'></i>
                                </button>
                            </div>
                        </div>



                        <h3 class="card-title mb-0">₹14,628 <span> <small class="text-success fw-medium">
                                    <span style="margin-left: 10px;"> Margin: <span>01</span></span></small></span></h3>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body" style="padding: 15px 20px;">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <span class="fw-medium d-block mb-1">Current Value</span>
                            <div>
                                <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="The net amount, including your profit & loss.">
                                    <i class='bx bx-message-rounded-error'></i>
                                </button>
                            </div>
                        </div>

                        <h3 class="card-title mb-0">₹14,628</h3>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body" style="padding: 15px 20px;">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <span class="fw-medium d-block mb-1">Today's Profit/Loss</span>
                            <div>
                                <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="Todays's Profit & Loss">
                                    <i class='bx bx-message-rounded-error'></i>
                                </button>
                            </div>
                        </div>

                        <h3 class="card-title mb-0">₹14,628 <span> <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i>
                                    <span>₹345 (24%)</span></small></span></h3>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body" style="padding: 15px 20px;">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <span class="fw-medium d-block mb-1">Overall Profit</span>
                            <div>
                                <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="Overall financial gain from the start.">
                                    <i class='bx bx-message-rounded-error'></i>
                                </button>
                            </div>
                        </div>

                        <h3 class="card-title mb-0">₹14,628 <span> <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i>
                                    <span>₹345 (24%)</span></small></span></h3>

                    </div>
                </div>
            </div>


        </div>

        <div>
            <h6 class="text-muted">Positions</h6>
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3" role="tablist">

                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-aitrade" aria-controls="navs-pills-top-messages" aria-selected="false">
                            AI Trades
                        </button>
                    </li>

                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-intraday" aria-controls="navs-pills-top-home" aria-selected="true">
                            Indraday
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-holding" aria-controls="navs-pills-top-profile" aria-selected="false">
                            Holding
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-close" aria-controls="navs-pills-top-messages" aria-selected="false">
                            Close
                        </button>
                    </li>

                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-advisor" aria-controls="navs-pills-top-messages" aria-selected="false">
                            Advisor
                        </button>
                    </li>



                </ul>



                <!-- tab content -->

                <div class="tab-content p-0">


                    <!-- ---------------AI Trades Trades-------------- -->

                    <div class="tab-pane fade show active" id="navs-pills-aitrade" role="tabpanel">

                        <div>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Stocks</th>
                                            <th>Open Time</th>
                                            <th>Close Time</th>
                                            <th>Lot</th>
                                            <th>Quantity</th>
                                            <th>Buy Price</th>
                                            <th>Sell Price</th>
                                            <th>Total</th>
                                            <th>Buy/Sell</th>
                                            <th>P&L%</th>
                                            <th>P&L Amt</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>

                                            <td <span class="fw-medium">KOTAK MAHINDRA BANK</span></td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>₹234</td>
                                            <td>₹236</td>
                                            <td>₹23690</td>
                                            <td>Buy</td>
                                            <td class="text-danger fw-medium">2%</td>
                                            <td class="text-danger fw-medium">₹239</td>
                                            <td><span class="badge bg-label-danger">Closed</span></td>


                                        </tr>
                                        <tr>

                                            <td <span class="fw-medium">KOTAK MAHINDRA BANK</span></td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>₹234</td>
                                            <td>₹236</td>
                                            <td>₹23690</td>
                                            <td>Buy</td>
                                            <td class="text-success fw-medium">2%</td>
                                            <td class="text-success fw-medium">₹239</td>
                                            <td><span class="badge bg-label-danger">Closed</span></td>

                                        </tr>


                                    </tbody>

                                </table>


                            </div>

                            <div class="demo-inline-spacing">
                                <!-- Basic Pagination -->
                                <nav aria-label="Page navigation" style="float: right; margin-top: 5px !important;">
                                    <ul class="pagination pagination-sm" style="margin-bottom: 5px !important;">
                                        <li class="page-item first">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                                        </li>
                                        <li class="page-item prev">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">2</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="javascript:void(0);">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">5</a>
                                        </li>
                                        <li class="page-item next">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                                        </li>
                                        <li class="page-item last">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                                <!--/ Basic Pagination -->
                            </div>
                        </div>


                    </div>



                    <!-- ---------------Indraday Trades-------------- -->

                    <div class="tab-pane fade" id="navs-pills-intraday" role="tabpanel">
                        <!-- table -->
                        <div>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Stocks</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Lot</th>
                                            <th>Quantity</th>
                                            <th>Buy Price</th>
                                            <th>Total</th>
                                            <th>Current Price</th>
                                            <th>Buy/Sell</th>
                                            <th>P&L%</th>
                                            <th>P&L Amt</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>

                                            <td <span class="fw-medium">KOTAK MAHINDRA BANK</span></td>
                                            <td>12, Nov 2023</td>
                                            <td>14:12</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>₹234</td>
                                            <td>₹35000</td>
                                            <td>₹236</td>
                                            <td>Buy</td>
                                            <td class="text-danger fw-medium">2%</td>
                                            <td class="text-danger fw-medium">₹2345</td>
                                            <td><button type="button" class="btn btn-sm btn-outline-danger py-0">Sell</button></td>

                                        </tr>
                                        <tr>

                                            <td <span class="fw-medium">KOTAK MAHINDRA BANK</span></td>
                                            <td>12, Nov 2023</td>
                                            <td>14:12</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>₹234</td>
                                            <td>₹35000</td>
                                            <td>₹236</td>
                                            <td>Buy</td>
                                            <td class="text-success fw-medium">2%</td>
                                            <td class="text-success fw-medium">₹2345</td>
                                            <td><button type="button" class="btn btn-sm btn-outline-success py-0">Buy</button></td>
                                        </tr>


                                    </tbody>

                                </table>


                            </div>

                            <div class="demo-inline-spacing">
                                <!-- Basic Pagination -->
                                <nav aria-label="Page navigation" style="float: right; margin-top: 5px !important;">
                                    <ul class="pagination pagination-sm" style="margin-bottom: 5px !important;">
                                        <li class="page-item first">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                                        </li>
                                        <li class="page-item prev">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">2</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="javascript:void(0);">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">5</a>
                                        </li>
                                        <li class="page-item next">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                                        </li>
                                        <li class="page-item last">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                                <!--/ Basic Pagination -->
                            </div>
                        </div>

                    </div>




                    <!-- ---------------Honding Trades-------------- -->

                    <div class="tab-pane fade" id="navs-pills-holding" role="tabpanel">


                        <!-- table -->
                        <div>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Stocks</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Lot</th>
                                            <th>Quantity</th>
                                            <th>Buy Price</th>
                                            <th>Total</th>
                                            <th>Current Price</th>
                                            <th>Buy/Sell</th>
                                            <th>P&L%</th>
                                            <th>P&L Amt</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>

                                            <td <span class="fw-medium">KOTAK MAHINDRA BANK</span></td>
                                            <td>12, Nov 2023</td>
                                            <td>14:12</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>₹234</td>
                                            <td>₹35000</td>
                                            <td>₹236</td>
                                            <td>Buy</td>
                                            <td class="text-danger fw-medium">2%</td>
                                            <td class="text-danger fw-medium">₹2345</td>
                                            <td><button type="button" class="btn btn-sm btn-outline-danger py-0">Sell</button></td>

                                        </tr>
                                        <tr>

                                            <td <span class="fw-medium">KOTAK MAHINDRA BANK</span></td>
                                            <td>12, Nov 2023</td>
                                            <td>14:12</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>₹234</td>
                                            <td>₹35000</td>
                                            <td>₹236</td>
                                            <td>Buy</td>
                                            <td class="text-success fw-medium">2%</td>
                                            <td class="text-success fw-medium">₹2345</td>
                                            <td><button type="button" class="btn btn-sm btn-outline-success py-0">Buy</button></td>
                                        </tr>


                                    </tbody>

                                </table>


                            </div>

                            <div class="demo-inline-spacing">
                                <!-- Basic Pagination -->
                                <nav aria-label="Page navigation" style="float: right; margin-top: 5px !important;">
                                    <ul class="pagination pagination-sm" style="margin-bottom: 5px !important;">
                                        <li class="page-item first">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                                        </li>
                                        <li class="page-item prev">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">2</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="javascript:void(0);">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">5</a>
                                        </li>
                                        <li class="page-item next">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                                        </li>
                                        <li class="page-item last">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                                <!--/ Basic Pagination -->
                            </div>
                        </div>



                    </div>




                    <!-- ---------------Close Trades-------------- -->

                    <div class="tab-pane fade" id="navs-pills-close" role="tabpanel">



                        <!-- table -->
                        <div>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Stocks</th>
                                            <th>Open Time</th>
                                            <th>Close Time</th>
                                            <th>Lot</th>
                                            <th>Quantity</th>
                                            <th>Buy Price</th>
                                            <th>Sell Price</th>
                                            <th>Total</th>
                                            <th>Buy/Sell</th>
                                            <th>P&L%</th>
                                            <th>P&L Amt</th>
                                            <th>Status</th>
                                            <th>Added by</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>

                                            <td <span class="fw-medium">KOTAK MAHINDRA BANK</span></td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>₹234</td>
                                            <td>₹236</td>
                                            <td>₹23690</td>
                                            <td>Buy</td>
                                            <td class="text-danger fw-medium">2%</td>
                                            <td class="text-danger fw-medium">₹239</td>
                                            <td><span class="badge bg-label-danger">Closed</span></td>
                                            <td>You</td>

                                        </tr>
                                        <tr>

                                            <td <span class="fw-medium">KOTAK MAHINDRA BANK</span></td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>₹234</td>
                                            <td>₹236</td>
                                            <td>₹23690</td>
                                            <td>Buy</td>
                                            <td class="text-success fw-medium">2%</td>
                                            <td class="text-success fw-medium">₹239</td>
                                            <td><span class="badge bg-label-danger">Closed</span></td>
                                            <td>You</td>

                                        </tr>


                                    </tbody>

                                </table>


                            </div>

                            <div class="demo-inline-spacing">
                                <!-- Basic Pagination -->
                                <nav aria-label="Page navigation" style="float: right; margin-top: 5px !important;">
                                    <ul class="pagination pagination-sm" style="margin-bottom: 5px !important;">
                                        <li class="page-item first">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                                        </li>
                                        <li class="page-item prev">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">2</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="javascript:void(0);">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">5</a>
                                        </li>
                                        <li class="page-item next">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                                        </li>
                                        <li class="page-item last">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                                <!--/ Basic Pagination -->
                            </div>
                        </div>




                    </div>



                    <!-- ---------------Advisor Trades-------------- -->


                    <div class="tab-pane fade" id="navs-pills-advisor" role="tabpanel">

                        <!-- table -->
                        <div>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Stocks</th>
                                            <th>Open Time</th>
                                            <th>Close Time</th>
                                            <th>Lot</th>
                                            <th>Quantity</th>
                                            <th>Buy Price</th>
                                            <th>Sell Price</th>
                                            <th>Total</th>
                                            <th>Buy/Sell</th>
                                            <th>P&L%</th>
                                            <th>P&L Amt</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>

                                            <td <span class="fw-medium">KOTAK MAHINDRA BANK</span></td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>₹234</td>
                                            <td>₹236</td>
                                            <td>₹23690</td>
                                            <td>Buy</td>
                                            <td class="text-danger fw-medium">2%</td>
                                            <td class="text-danger fw-medium">₹239</td>
                                            <td><span class="badge bg-label-success">Open</span></td>


                                        </tr>
                                        <tr>

                                            <td <span class="fw-medium">KOTAK MAHINDRA BANK</span></td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>19 Oct, 2023 15:01</td>
                                            <td>2</td>
                                            <td>10</td>
                                            <td>₹234</td>
                                            <td>₹236</td>
                                            <td>₹23690</td>
                                            <td>Buy</td>
                                            <td class="text-success fw-medium">2%</td>
                                            <td class="text-success fw-medium">₹239</td>
                                            <td><span class="badge bg-label-success">Open</span></td>

                                        </tr>


                                    </tbody>

                                </table>


                            </div>

                            <div class="demo-inline-spacing">
                                <!-- Basic Pagination -->
                                <nav aria-label="Page navigation" style="float: right; margin-top: 5px !important;">
                                    <ul class="pagination pagination-sm" style="margin-bottom: 5px !important;">
                                        <li class="page-item first">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                                        </li>
                                        <li class="page-item prev">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">2</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="javascript:void(0);">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">5</a>
                                        </li>
                                        <li class="page-item next">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                                        </li>
                                        <li class="page-item last">
                                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                                <!--/ Basic Pagination -->
                            </div>
                        </div>





                    </div>








                </div>
            </div>
        </div>




    </div>
<?php
}
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Portfolio- PMS Equity";
$contentheader = "";
$pageheader = "";
$extrajs = "<script src='//cdn.datatables.net/plug-ins/1.13.1/api/fnReloadAjax.js'></script>";
include "main/templete.php"; ?>
<script>
    var table = $('#example1').DataTable({
        "ajax": "main/opentradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 15,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, "desc"]
        ],
    })

    var table2 = $('#example2').DataTable({
        "ajax": "main/holdingtradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 15,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, "desc"]
        ],
    })

    // check if current day is a weekday (Monday to Friday)


    function recalculateDataTableResponsiveSize() {
        $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
    }

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        recalculateDataTableResponsiveSize();
    });


    $('#myTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // store the currently selected tab in the hash value
    // $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
    //     recalculateDataTableResponsiveSize();
    //     var id = $(e.target).attr("href").substr(1);
    //     window.location.hash = id;
    // });

    // var hash = window.location.hash;
    // $('a[href="' + hash + '"]').tab('show');
    // // store the currently selected tab in the hash value
    let todayinterval = null;
    <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
        if ($hour >= 9 && $hour < 24) { ?>
            todayinterval = setInterval(function() {
                table.ajax.reload(null, false);
            }, <?= $apiinterval ?>);
    <?php }
    } ?>
    let holdinginterval = null;

    $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
        recalculateDataTableResponsiveSize();
        var id = $(e.target).attr("href").substr(1);
        // window.location.hash = id;
        <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
            // check if current time is between 9 am to 4 pm
            if ($hour >= 9 && $hour < 24) { ?>
                if (id === 'Today') {
                    todayinterval = setInterval(function() {
                        table.ajax.reload(null, false);
                    }, <?= $apiinterval ?>);
                    clearInterval(holdinginterval)
                }
                if (id === 'Carry_Forward') {
                    holdinginterval = setInterval(function() {
                        table2.ajax.reload(null, false);
                    }, <?= $apiinterval ?>);
                    clearInterval(todayinterval)
                }
                if (id !== 'Today' && id !== 'Carry_Forward') {
                    clearInterval(todayinterval)
                    clearInterval(holdinginterval)
                }
        <?php }
        } ?>
    });

    // on load of the page: switch to the currently selected tab
    // var hash = window.location.hash;
    // $('a[href="' + hash + '"]').tab('show');

    var table3 = $('#example3').DataTable({
        "ajax": "main/closetradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 15,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, "desc"]
        ],
    })
    var table4 = $('#example4').DataTable({
        "ajax": "main/brokertradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 15,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, "desc"]
        ],
    })
    var table4 = $('#example5').DataTable({
        "ajax": "main/aitradedata.php",
        "processing": false,
        "serverSide": true,
        "pageLength": 15,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, "desc"]
        ],
    })

    // $(document).on("click", ".setactive", function() {

    //     value = $(this).val();
    //     type = $(this).data("type");
    // $.ajax({
    //     type: "post",
    //     url: "./main/setaitrading.php",
    //     data: {
    //         value: value,
    //         type: type
    //     },
    //     success: function(response) {
    //         if (response == 'Success') {
    //             location.reload(true);
    //         }
    //     }
    // });
    // })

    function givealert(stat) {
        if (stat === 'Yes') {
            alertify.alert('AI is currently handling trading operations, and it will shut down on its own at 11:30 PM.')
        } else if (stat === 'No') {
            alertify.alert('You can activate AI Trade Mode between 9:15 AM to 3:00 PM')
        }
    }
</script>