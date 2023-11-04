<?php
include "main/session.php";
$fundadded = $obj->selectfieldwhere("fundrequest", 'sum(amount)', "userid=" . $employeeid . " and status = 1");
$fundadded = empty($fundadded) ? 0 : $fundadded;
$fundwithdraw = $obj->selectfieldwhere("withdrawalrequests", 'sum(amount)', "userid=" . $employeeid . " and status = 1");
$fundwithdraw = empty($fundwithdraw) ? 0 : $fundwithdraw;
?>
<div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
        <div class="card">
            <div class="card-body" style="padding: 15px 20px;">
                <div class="row">
                    <div class="col-5 card-title">
                        <span class="fw-medium d-block mb-1">Fund Available</span>

                    </div>

                    <div class="col-7" style="text-align: center;
            border-left: 1px solid lightgray; display: flex; align-items: center; justify-content: center;">
                        <button style="font-size: 12px; margin-right: 5px;" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenterAddFund">Add</button>
                        <button style="font-size: 12px;" type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalCenterWithdrawal">Withdraw</button>
                    </div>
                    <h3 class="card-title mb-0">₹14,628</h3>



                </div>


            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
        <div class="card">
            <div class="card-body" style="padding: 15px 20px;">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <span class="fw-medium d-block mb-1">Total Deposit</span>
                    <div>
                        <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="Overall Deposits from the start.">
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
                    <span class="fw-medium d-block mb-1">Total Withdrawal</span>
                    <div>
                        <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="Overall Withdrawal from the start.">
                            <i class='bx bx-message-rounded-error'></i>
                        </button>
                    </div>
                </div>

                <h3 class="card-title mb-0">₹14,628</h3>

            </div>
        </div>
    </div>





</div>




<!----------------- Withdrawal & Deposit table -->


<div class="row">

    <!-- ----------deposit table----- -->

    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
        <div class="card">


            <div class="card-body" style="padding: 15px 20px;">
                <h3 class="card-title">Deposits</h3>

                <div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-borderless mb-0">
                            <!-- <thead>
                      <tr>
                        <th>Date & Time</th>
                        <th>Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead> -->
                            <tbody class="table-border-bottom-0">
                                <tr>

                                    <td>19 Oct, 2023 15:01</span></td>
                                    <td>₹ 5000</td>
                                    <td><button type="button" class="btn-sm py-0 btn btn-outline-warning">Pending</button></td>
                                </tr>



                                <tr>

                                    <td>19 Oct, 2023 15:01</span></td>
                                    <td>₹ 5000</td>
                                    <td><button type="button" class="btn py-0 btn-sm btn-outline-success">Success</button></td>
                                </tr>

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

    <!-- ------------------withdrawal table--------- -->

    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
        <div class="card">

            <div class="card-body" style="padding: 15px 20px;">
                <h3 class="card-title">Withdrawals</h3>
                <div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover mb-0 table-borderless">
                            <!-- <thead>
                      <tr>
                        <th>Date & Time</th>
                        <th>Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead> -->
                            <tbody class="table-border-bottom-0">
                                <tr>

                                    <td>19 Oct, 2023 15:01</span></td>
                                    <td>₹ 5000</td>
                                    <td><button type="button" class="btn-sm btn btn-outline-warning py-0">Pending</button></td>
                                </tr>



                                <tr>

                                    <td>19 Oct, 2023 15:01</span></td>
                                    <td>₹ 5000</td>
                                    <td><button type="button" class="btn-sm btn btn-outline-success py-0">Success</button></td>
                                </tr>

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