<?php
include "main/session.php";
/* @var $obj db */
ob_start();
$obj->updatewhere("mail", ["readstatus" => 1], "receiverid=" . $employeeid . "");
?>
<div class="container px-6 mx-auto grid">
    <div class="grid gap-6 mt-8 md:grid-cols-2 xl:grid-cols-2">
        <!-- Card -->

        <h3 class="my-6 text-1xl font-bold text-gray-700 dark:text-gray-200">
            Inbox
        </h3>
        <div>


        </div>

    </div>


    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full overflow-x-auto">

            <table id="example2" class="table w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">S.No.</th>
                        <th class="px-4 py-3">Date & Time</th>
                        <th class="px-4 py-3">Sender Email</th>
                        <th class="px-4 py-3">Subject</th>
                        <th class="px-4 py-3">View Message</th>
                    </tr>
                </thead>
                <tbody class=" divide-y text-s dark:divide-gray-700 dark:bg-gray-800">

                </tbody>
            </table>

        </div>
    </div>

</div>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Indiastock: Pending Approval";
$contentheader = "";
$pageheader = "";
include "templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "main/inboxdata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
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
</script>