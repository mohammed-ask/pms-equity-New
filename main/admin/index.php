<?php
include "main/session.php";
/* @var $obj db */
ob_start();
if (in_array(34, $permissions)) {
    $activeclient = $obj->selectfieldwhere("users", "count(id)", "status =1 and activate='Yes' and type=2 and id != 26");
    $pendinguser = $obj->selectfieldwhere("users", "count(id)", "status =0");
    $totalinv = $obj->selectfieldwhere("users", "sum(investmentamount)", "status =1 and id != 26");
    $opentradeamt = $obj->selectfieldwhere("stocktransaction", "sum(totalamount)", "status =0 and tradestatus='Open' and userid != 26");
    $openposition = $obj->selectfieldwhere("stocktransaction", "count(id)", "status =0 and tradestatus='Open' and userid != 26");
?>


    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <!-- <h2 class="page-title">
                  Dashboard
                </h2> -->
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <!-- <span class="d-none d-sm-inline">
                        <a href="#" class="btn">
                            New view
                        </a>
                    </span> -->
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block py-2" data-bs-toggle="modal" data-bs-target="#modal-report" onclick='dynamicmodal("none", "addplan", "Unlink", "Add New Plan")'>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg style="display: inline; " xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Add Position
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-primary text-white avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                            <span style="font-weight: 600;"><?= $activeclient ?></span>
                                            </div>
                                            <div class="" style="font-weight: 500;">
                                            <a style="color: #182433;" href="users">Active Client</a>
                                            </div>
                                        </div>

                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                                    <path d="M15 19l2 2l4 -4"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                <span style="font-weight: 600;"><?= $totalinv ?></span>
                                            </div>
                                            <div class="" style="font-weight: 500;">
                                                Total Investment
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                        <div class="col">
                                            <div class="font-weight-medium">
                                            <span style="font-weight: 600;"><?= $pendinguser ?></span> 
                                            </div>
                                            <div class="" style="font-weight: 500;">
                                            <a style="color: #182433;" href="pendingapproval">Pending Users</a>
                                            </div>
                                        </div>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-code" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M8 9h8"></path>
                                                    <path d="M8 13h6"></path>
                                                    <path d="M11.012 19.193l-3.012 1.807v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6"></path>
                                                    <path d="M20 21l2 -2l-2 -2"></path>
                                                    <path d="M17 17l-2 2l2 2"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                <span style="font-weight: 600;"><?= $openposition ?></span>
                                            </div>
                                            <div class="" style="font-weight: 500;">
                                                Open positions
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex flex-column">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Open Stock List</h3>
                            </div>

                            <div class="table-responsive fixTableHead" style="height: 400px;">
                                <table id="example1" class="table w-full whitespace-no-wrap">
                                    <thead>
                                        <tr class="text-sm font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-3 py-2">S.No.</th>
                                            <th class="px-3 py-2">Stock Name</th>
                                            <th class="px-3 py-2">Lot</th>
                                            <th class="px-3 py-2">Price</th>
                                            <!-- <th class="px-3 py-2">Stop Loss</th> -->
                                            <th class="px-3 py-2">Lot/Qty</th>
                                            <th class="px-3 py-2">Total</th>
                                            <th class="px-3 py-2">Date & Time</th>
                                            <th class="px-3 py-2">User</th>
                                            <th class="px-3 py-2">Status</th>
                                            <th class="px-3 py-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    </tbody>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
}
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Global Wizard: Admin Dashboard";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>
<script>
    var table = $('#example1').DataTable({
        "ajax": "../main/admin/opentradedata.php",
        "processing": false,
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
    var table = $('#example2').DataTable({
        "ajax": "../main/admin/carryfortradedata.php",
        "processing": false,
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
</script>