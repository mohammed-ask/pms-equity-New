<?php
$watchlistcount = $obj->selectfieldwhere("watchliststock", "count(id)", "userid='" . $employeeid . "' and status = 1");

?>
<div class="col-lg-3 mb-3">
    <div class="position-sticky" style="top: 120px">
        <!--   <div class="card">
            <div class="card-body">
                 <div class="stock-search">
                    <form action="user-index.html" method="get">
                        <input type="search" name="search" class="form-control top-search mb-0" placeholder="Search Stock">
                        <div class="search-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </form>
                </div> 
            </div>
        </div>-->
        <?php if (isset($watchliststocks)) { ?>
            <div class="card" style="height: 430px;">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">My Watchlist <span class="stocks-list-badge bg-soft-primary ms-1"><?= $watchlistcount ?></span></h4>
                        </div><!--end col-->
                        <!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body p-0">
                    <div class="watchlist-body" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: scroll;">
                                        <div class="simplebar-content" style="padding: 0px;">


                                            <div class="accordion" id="watchlist_2">
                                                <?php
                                                $i = 0;
                                                foreach ($watchliststocks as $wdata) { ?>
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
                                                                                <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $wdata["Token"] ?>", "buystock","<?= $wdata["Exch"] ?>", "Buy Stock")'><i class="fa-solid fa-b text-white email-action-icons-item"></i></a>
                                                                            </li><!--end /li-->
                                                                            <li class="list-inline-item align-self-center mx-0 bg-danger">
                                                                                <a style="cursor:pointer" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("<?= $wdata["Token"] ?>", "sellstock","<?= $wdata["Exch"] ?>", "Sell Stock")'><i class="fa-solid fa-s text-white email-action-icons-item"></i></a>
                                                                            </li>
                                                                            <!-- <li class="list-inline-item align-self-center mx-0">
                                                                                <a href="details.html"><i class="fa-solid fa-sliders email-action-icons-item"></i></a>
                                                                            </li> -->
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 99px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                        </div>
                    </div><!--end watchlist-body-->
                </div><!--end card-body-->
            </div><!--end card-->
        <?php } else { ?>
            <div class="position-sticky" style="top: 85px !important">
                <div  class="card top-margin-for-sidebar" style="width: 100% !important; height: 500px !important">

                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div style="    background-color: white; position: absolute; right: 0; bottom: 1.5%; width: 37px; border-radius: 10px 0px 0px 10px; height: 24px;">
                        </div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>
                            {
                                "colorTheme": "light",
                                "dateRange": "3M",
                                "exchange": "BSE",
                                "showChart": true,
                                "locale": "in",
                                "width": "100%",
                                "height": "100%",
                                "largeChartUrl": "",
                                "isTransparent": false,
                                "showSymbolLogo": false,
                                "showFloatingTooltip": false,
                                "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                                "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                                "gridLineColor": "rgba(240, 243, 250, 0)",
                                "scaleFontColor": "rgba(106, 109, 120, 1)",
                                "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                                "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                                "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                                "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                                "symbolActiveColor": "rgba(41, 98, 255, 0.12)"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->



                </div><!--end card-->

            </div><!--end sticky-->
        <?php } ?>
    </div><!--end sticky-->
</div>