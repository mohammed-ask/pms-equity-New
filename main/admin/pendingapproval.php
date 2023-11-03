<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>
<div class="page-body">.
    <div class="container-xl">

        <!-- <div class="grid md:grid-cols-2 xl:grid-cols-2">

        <h3 class="my-6 font-semibold text-gray-700 dark:text-gray-200">
            Pending User's Approvals
        </h3>
        <div>


        </div>

    </div> -->

        <div class="card card-default">
            <div class="card-header">
                <h3>Pending User's Approvals</h3>

            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">

                <div class="w-full ">

                    <table id="example2" class="table w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-sm font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-3 py-2">S.No.</th>
                                <th class="px-3 py-2">User Name</th>
                                <th class="px-3 py-2">Email ID</th>
                                <th class="px-3 py-2">Mobile No.</th>
                                <th class="px-3 py-2">Status</th>
                                <th class="px-3 py-2">More Details</th>
                                <th class="px-3 py-2">User Docs</th>
                                <th class="px-3 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y text-s dark:divide-gray-700 dark:bg-gray-800">
                        </tbody>
                    </table>

                </div>
            </div>
        </div><br>
        <div class="card card-default">
            <div class="card-header">
                <h3>Pending Bank Approvals</h3>

            </div>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">

                <div class="w-full ">

                    <table id="example3" class="table w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-sm font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-3 py-2">S.No.</th>
                                <th class="px-3 py-2">Customer Name</th>
                                <th class="px-3 py-2">Bank Name</th>
                                <th class="px-3 py-2">Account Number</th>
                                <th class="px-3 py-2">IFSC</th>
                                <th class="px-3 py-2">Status</th>
                                <th class="px-3 py-2">Requested On</th>
                                <th class="px-3 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "PMS-Equity: Pending Approval";
$contentheader = "";
$pageheader = "";
include "templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/pendingapprovaldata.php",
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
            ]
        });
        $('#example3').DataTable({
            "ajax": "../main/admin/pendingbankapprovaldata.php",
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
            ]
        });
    });

    $(document).on("click", ".showbox", function() {
        status = $(this).parents('.tr').find('.showbtn').css("display");
        if (status === 'none') {
            $(this).parents('.tr').find('.showbtn').css({
                display: 'block',
                position: 'absolute',
                backgroundColor: 'white',
                zIndex: 30,
                width: 150,
                bottom: 0,
                left: 160,
                boxShadow: '5px 10px 10px #888888',
                padding: '10px',
            });
            $(this).attr("data-status", "show");
        } else if (status === 'block') {
            $(this).parents('.tr').find('.showbtn').css({
                "display": "none",
            });
        }

    })
</script>