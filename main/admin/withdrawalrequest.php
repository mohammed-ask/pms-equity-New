<?php
include "main/session.php";
/* @var $obj db */
ob_start();
?>
<div class="page-body">
    <div class="container-xl">

        <!-- <div class="flex my-4 items-center justify-between">
            <h3 class="my-0 font-semibold text-gray-700 dark:text-gray-200">Withdrawal Requests</h3>
        </div> -->
        <div class="card card-default">
            <div class="card-header">
                <h3>Withdrawal Requests</h3>

            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">

                <div class="w-full ">

                    <table id="example2" class="table w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-3 py-2">S.No.</th>
                                <th class="px-3 py-2">Client Name</th>
                                <th class="px-3 py-2">Mobile No.</th>
                                <th class="px-3 py-2">Available Fund</th>
                                <th class="px-3 py-2">Date</th>
                                <th class="px-3 py-2">Amount</th>
                                <th class="px-3 py-2">Remark</th>
                                <th class="px-3 py-2">Status</th>
                                <th class="px-3 py-2">Bank Details</th>
                                <th class="px-3 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">
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
$pagetitle = "Eagle Eye Tradings: Withdrawal Request";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/withdrawalrequestdata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 50,
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
                // bottom: 0,
                // left: 160,
                top: 'auto',
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