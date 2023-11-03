<?php
include "main/session.php";
$fundadded = $obj->selectfieldwhere("fundrequest", 'sum(amount)', "userid=" . $employeeid . " and status = 1");
$fundadded = empty($fundadded) ? 0 : $fundadded;
$fundwithdraw = $obj->selectfieldwhere("withdrawalrequests", 'sum(amount)', "userid=" . $employeeid . " and status = 1");
$fundwithdraw = empty($fundwithdraw) ? 0 : $fundwithdraw;
?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="bg-light text-center p-2 d-flex justify-content-between align-items-center rounded border">
                    <div class="text-start">
                        <h5 class="font-18 m-0">₹<?= round($investmentamount) ?></h5>
                        <p class="mb-0 fw-semibold">Total Funds</p>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "addfund","", "")'>Add Funds</button>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "requestwithdrawalamount", "", "Request Amount Withdrawal")'>Withdraw Funds</button>
                    </div>

                </div>
            </div><!--end col-->

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 mb-mt-4-mob">
                        <div class="bg-light text-center p-2 d-flex justify-content-between align-items-center rounded border">
                            <div class="flex text-start">
                                <span>
                                    <h5 class="font-18 m-0 mt-1">₹<?= round($fundadded) ?></h5>
                                </span>
                                <span>
                                    <h6 class="m-0 fw-semibold">Total Added</h6>
                                </span>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light text-center p-2 d-flex justify-content-between align-items-center rounded border">
                            <div class="flex text-start">

                                <span>
                                    <h5 class="font-18 m-0 mt-1">₹<?= round($fundwithdraw) ?></h5>
                                </span>
                                <span>
                                    <h6 class="m-0 fw-semibold">Total Withdrawal</h6>
                                </span>


                            </div>

                            <div>

                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div>


        </div><!--end row-->



    </div><!--end card-body-->
</div><!--end card-->


<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="card-title">Transaction History</h4>
            </div><!--end col-->
            <div class="col-auto">
                <ul class="nav nav-tabs tab-nagative-m" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#Added" role="tab" aria-selected="true">Added</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Withdraw" role="tab" aria-selected="false">Withdrawal</a>
                    </li>
                </ul>
            </div><!--end col-->
        </div> <!--end row-->
    </div><!--end card-header-->
    <div class="card-body">
        <div class="tab-content" id="Amount_history">
            <div class="tab-pane fade show active" id="Added" role="tabpanel" aria-labelledby="Added-tab">
                <div class="table-responsive dash-social">
                    <table id="example1" class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Transaction ID</th>
                                <th>Peyment Method</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr><!--end tr-->
                        </thead>

                        <tbody>
                            <!-- <tr>
                                <td>12</td>
                                <td>01 Jan 2021</td>
                                <td>01:30PM</td>
                                <td>c12b001a15f9bd46ef1c6551386c6a2bcda1ab3eae5091fba</td>
                                <td>Google Pay</td>
                                <td>₹843.21</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div><!--end tab-pane-->
            <div class="tab-pane fade" id="Withdraw" role="tabpanel" aria-labelledby="Withdraw-tab">
                <div class="table-responsive dash-social">
                    <table id="example2" class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Transaction ID</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr><!--end tr-->
                        </thead>

                        <tbody>
                            <!-- <tr>
                                <td>01</td>
                                <td>14 Jan 2021</td>
                                <td>12:05PM</td>
                                <td>c12b001a15f9bd46ef1c6551386c6a2bcda1ab3eae5091fba</td>

                                <td>₹521.36</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div><!--end tab-pane-->
        </div><!--end tab-content-->
    </div><!--end card-body-->
</div><!--end card-->
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Fund- PMS Equity";
$contentheader = "";
$pageheader = "";
include "main/templete.php";
?>
<script>
    $(function() {
        $('#example1').DataTable({
            "ajax": "main/funddata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
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
        });

        $('#example2').DataTable({
            "ajax": "main/withdrawdata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
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

        function recalculateDataTableResponsiveSize() {
            $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
        }

        $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
            recalculateDataTableResponsiveSize();
            // var id = $(e.target).attr("href").substr(1);
            // window.location.hash = id;
        });
    });
</script>