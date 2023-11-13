<?php
include "main/session.php";
if (isset($_GET['RequestToken']) && !empty($_GET['RequestToken'])) {
    $obj->getaccesstoken();
}
$fetchshare = $obj->selectextrawhereupdate('userstocks inner join watchliststock on watchliststock.userstockid = userstocks.id', "Exch,ExchType,userstocks.Symbol,Expiry,StrikePrice,OptionType", "userstocks.userid='" . $employeeid . "' and userstocks.status = 1 and watchliststock.status = 1");
$rowfetch = mysqli_fetch_all($fetchshare, 1);
array_push($rowfetch, ["Exch" => "N", "ExchType" => "C", "Symbol" => "NIFTY", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "B", "ExchType" => "C", "Symbol" => "SENSEX", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "N", "ExchType" => "C", "Symbol" => "ZOMATO", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "N", "ExchType" => "C", "Symbol" => "INFY", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "N", "ExchType" => "C", "Symbol" => "M&M", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""], ["Exch" => "N", "ExchType" => "C", "Symbol" => "RELIANCE", "Expiry" => "", "StrikePrice" => "0", "OptionType" => ""]);
$stockdata = $obj->fivepaisaapi2($rowfetch);
$stockdata = $stockdata == 'Error fetching candle data:' ? [] : $stockdata;
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

$chartdata = $obj->getcandledata(999920000, 'N',  'C', '5m', date('Y-m-d'), date('Y-m-d'));
$data = $chartdata === "Error fetching candle data:" ? [] : $chartdata['candles'];
$chart_data = array();

foreach ($data as $row) {
    $dateString = $row[0];
    $date = DateTime::createFromFormat('Y-m-d\TH:i:s', $dateString, new DateTimeZone('UTC'));
    $utcTimestamp = $date->getTimestamp() * 1000;
    $chart_data[] = array($utcTimestamp, $row[1], $row[2], $row[3], $row[4], $row[5]);
}
/* @var $obj db */
if ($dashboardmaintanance) {
    include "maintenance.php";
?>
<?php } else { ?>
    <style>
        <?php if (isset($_POST['postData'])) { ?>.app-download-buttons {
            display: none;

        }

        <?php } ?>
    </style>
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
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Welcome back <?= $username ?>! 🎉</h5>
                            <p class="mb-4">
                                Welcome back! to <span class="fw-bold">PMS Equity,</span> Let's grow those investments together."
                            </p>

                            <a href="profile" class="btn btn-sm btn-outline-primary">View Profile</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="main/dist/userstuff/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="main/dist/userstuff/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>

                                    </div>
                                </div>
                            </div>
                            <span class="fw-medium d-block mb-1">Profit</span>
                            <h3 class="card-title mb-2">₹12,628</h3>
                            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> AMT</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="main/dist/userstuff/assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>

                                    </div>
                                </div>
                            </div>
                            <span class="fw-medium d-block mb-1">Fund</span>
                            <h3 class="card-title text-nowrap mb-2">₹4,679</h3>
                            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> AMT</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-4" style="padding-right: 0px; padding-left: 30px;">

                                <div>
                                    <label for="html5-date-input" class="col-form-label">From</label>
                                    <div>
                                        <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                                    </div>
                                </div>


                            </div>
                            <div class="col-4">
                                <div>
                                    <label for="html5-date-input" class="col-form-label">To</label>
                                    <div>
                                        <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                                    </div>
                                </div>

                            </div>
                            <div class="col-4">
                                <div>

                                    <div class="text-center">
                                        <label for="html5-date-input" class="col-form-label">Interval</label>

                                        <div class="dropdown">

                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-top: 8px;padding-bottom: 8px;">
                                                One Day
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                                <a class="dropdown-item" href="javascript:void(0);">One Day</a>
                                                <a class="dropdown-item" href="javascript:void(0);">One Week</a>
                                                <a class="dropdown-item" href="javascript:void(0);">One Month</a>
                                                <a class="dropdown-item" href="javascript:void(0);">One Year</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Five Year</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="incomeChart" style="min-height: 215px; height: 295px; padding-top: 60px;" class="px-0"></div>
                    </div>

                </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="main/dist/userstuff/assets/img/icons/unicons/loss.png" alt="Credit Card" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>

                                    </div>
                                </div>
                            </div>
                            <span class="d-block mb-1">Loss</span>
                            <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                            <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> AMT</small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="main/dist/userstuff/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>

                                    </div>
                                </div>
                            </div>
                            <span class="fw-medium d-block mb-1">Invested</span>
                            <h3 class="card-title mb-2">$14,857</h3>
                            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> AMT</small>
                        </div>
                    </div>
                </div>
                <!-- </div>
<div class="row"> -->
                <div class="col-12 mb-4">
                    <div class="card">
                        <a href="portfolio">
                            <img width="100%" src="main/dist/userstuff/assets\img\dashboard\ai-trading-dashboard.gif" alt="Credit Card" class="rounded" /></a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------------------------------mobile app comming soon banner End------------------- -->





<?php
}
$pagemaincontent = ob_get_contents();
ob_end_clean();

$pagemeta = "";
$pagetitle = "Your Dashboard- PMS Equity";
$contentheader = "";
$pageheader = "";
$watchliststocks = $wstocks;
include "main/templete.php"; ?>
<script src="main/dist/js/highcharts.js?ver=<?php echo time(); ?>"></script>
<script id="tradehighchart"></script>
<script>
    var chartData = <?php echo json_encode($chart_data); ?>;
    Highcharts.chart('container', {
        title: {
            text: 'Nifty Index'
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                hour: '%H:%M',
                day: '%e. %b',
                week: '%e. %b',
                month: '%b \'%y',
                year: '%Y'
            }
        },
        yAxis: {
            title: {
                text: 'Price'
            }
        },
        series: [{
            name: 'Open',
            data: chartData,
            type: 'line',
            tooltip: {
                valueDecimals: 2
            }
        }]
    });

    $("#startdate").change(function() {
        $("#tradehighchart").text("")
        startdate = $(this).val();
        enddate = $('#enddate').val();
        interval = $('.toolbar button.active').text();
        $.post("main/gethighcharttradedata.php", {
                startdate: startdate,
                enddate: enddate,
                interval: interval,
                scriptcode: 999920000,
                exch: 'N',
                type: 'C',
            },
            function(data) {
                $("#tradehighchart").text(data)
                eval(document.getElementById('tradehighchart').innerHTML);
                $('#linechartdeposit').highcharts().redraw();

            },
        );
    })
    $("#enddate").change(function() {
        $("#tradehighchart").text("")
        enddate = $(this).val();
        startdate = $('#startdate').val();
        interval = $('.toolbar button.active').text();
        $.post("main/gethighcharttradedata.php", {
                startdate: startdate,
                enddate: enddate,
                interval: interval,
                scriptcode: 999920000,
                exch: 'N',
                type: 'C',
            },
            function(data) {
                $("#tradehighchart").text(data)
                eval(document.getElementById('tradehighchart').innerHTML);
                $('#linechartdeposit').highcharts().redraw();

            },
        );
    })

    function getactive(id) {
        $("#tradehighchart").text("")
        enddate = $('#enddate').val();
        startdate = $('#startdate').val();
        interval = $('#' + id).text();
        $.post("main/gethighcharttradedata.php", {
                startdate: startdate,
                enddate: enddate,
                interval: interval,
                scriptcode: 999920000,
                exch: 'N',
                type: 'C',
            },
            function(data) {
                $("#tradehighchart").text(data)
                eval(document.getElementById('tradehighchart').innerHTML);
                $('#linechartdeposit').highcharts().redraw();

            },
        );
    }

    // check if current day is a weekday (Monday to Friday)
    <?php if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
        // check if current time is between 9 am to 4 pm
        if ($hour >= 9 && $hour < 24) { ?>
            setInterval(() => {
                console.log('counting market')
                $('.national-data').html()
                $.post("main/getlivemarketdatadashboard.php",
                    function(data) {
                        $('.national-data').html(data)
                        let pstock = $('.primarystocks').html(data)
                        let sidedata = $('#sidebarcolumn').html()
                        $("#watchlist_2").html(sidedata)
                        $("#primarystock").html(pstock)
                    },
                );
            }, <?= $apiinterval ?>)
    <?php }
    } ?>
</script>