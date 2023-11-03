<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>
<div class="page-body">
    <div class="container-xl">

        <div class="card card-default">
            <div class="card-header">
                <h3>Pending Investment</h3>

            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">

                <div class="w-full ">

                    <table id="example2" class="table w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">S.No.</th>
                                <th class="px-4 py-3">Client Name</th>
                                <th class="px-4 py-3">Mobile No.</th>
                                <th class="px-4 py-3">Fund</th>
                                <th class="px-4 py-3">Transaction Id</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Amount</th>
                                <!-- <th class="px-4 py-3">Remark</th> -->
                                <th class="px-4 py-3">Payment Method</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        <div class="card card-default">
            <div class="card-header">
                <h3>All Investment</h3>

            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">

                <div class="w-full ">

                    <table id="example3" class="table w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">S.No.</th>
                                <th class="px-4 py-3">Client Name</th>
                                <th class="px-4 py-3">Mobile No.</th>
                                <th class="px-4 py-3">Transaction Id</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Amount</th>
                                <!-- <th class="px-4 py-3">Remark</th> -->
                                <th class="px-4 py-3">Payment Method</th>
                                <!-- <th class="px-4 py-3">Action</th> -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "PMS Equity: All Investment";
$contentheader = "";
$pageheader = "";
include "templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/pendinginvestmentdata.php",
            "processing": true,
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
            ]
        });
        $('#example3').DataTable({
            "ajax": "../main/admin/allinvestmentdata.php",
            "processing": true,
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
            ]
        })
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
            } else if (status === 'block') {
                $(this).parents('.tr').find('.showbtn').css({
                    "display": "none",
                });
            }

        })
    });
</script>