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
                    <?php
                    if ($usermail !== 'yashraj12@gmail.com') { ?>
                        <div class="col-7" style="text-align: center;
            border-left: 1px solid lightgray; display: flex; align-items: center; justify-content: center;">
                            <button style="font-size: 12px; margin-right: 5px;" type="button" class="btn btn-outline-success" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "addfund","", "")'>Add</button>
                            <button style="font-size: 12px;" type="button" class="btn btn-outline-danger" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "requestwithdrawalamount", "", "Request Amount Withdrawal")'>Withdraw</button>
                        </div>
                    <?php } ?>
                    <h3 class="card-title mb-0">₹<?= round($investmentamount) ?></h3>



                </div>


            </div>
        </div>
    </div>
    <?php
    if ($usermail !== 'yashraj12@gmail.com') { ?>
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

                    <h3 class="card-title mb-0">₹<?= round($fundadded) ?></h3>

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

                    <h3 class="card-title mb-0">₹<?= round($fundwithdraw) ?></h3>

                </div>
            </div>
        </div>
    <?php } ?>
</div>




<!----------------- Withdrawal & Deposit table -->

<?php
if ($usermail !== 'yashraj12@gmail.com') { ?>
    <div class="row">

        <!-- ----------deposit table----- -->

        <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
            <div class="card">


                <div class="card-body" style="padding: 15px 20px;">
                    <h3 class="card-title">Deposits</h3>

                    <div>
                        <div class="table-responsive text-nowrap" style="height:350px;">
                            <table id="example1" class="table table-hover table-borderless mb-0">
                                <thead class="d-none">
                                    <tr class="sticky-table-header">
                                        <th>Date & Time</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <!-- <tr>

                                    <td>19 Oct, 2023 15:01</span></td>
                                    <td>₹ 5000</td>
                                    <td><button type="button" class="btn-sm py-0 btn btn-outline-warning">Pending</button></td>
                                </tr>



                                <tr>

                                    <td>19 Oct, 2023 15:01</span></td>
                                    <td>₹ 5000</td>
                                    <td><button type="button" class="btn py-0 btn-sm btn-outline-success">Success</button></td>
                                </tr>

                                </tr> -->


                                </tbody>
                            </table>
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
                        <div class="table-responsive text-nowrap" style="height:350px;">
                            <table id="example2" class="table table-hover mb-0 table-borderless">
                                <thead class="d-none">
                                    <tr class="sticky-table-header">
                                        <th>Date & Time</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <!-- <tr>

                                    <td>19 Oct, 2023 15:01</span></td>
                                    <td>₹ 5000</td>
                                    <td><button type="button" class="btn-sm btn btn-outline-warning py-0">Pending</button></td>
                                </tr>



                                <tr>

                                    <td>19 Oct, 2023 15:01</span></td>
                                    <td>₹ 5000</td>
                                    <td><button type="button" class="btn-sm btn btn-outline-success py-0">Success</button></td>
                                </tr>

                                </tr> -->


                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>
            </div>
        </div>



    </div>
<?php } ?>
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Fund- Eagle Eye Tradings";
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
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
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
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
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