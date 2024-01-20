<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>
<div class="page-body">
    <div class="container-xl">

        <div class="card card-default">
            <div class="card-header">
                <h3>Sent Mails</h3>

            </div>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">

                <div class="w-full ">

                    <table id="example2" class="table w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">S.No.</th>
                                <th class="px-4 py-3">Date & Time</th>
                                <th class="px-4 py-3">Sent To</th>
                                <th class="px-4 py-3">Subject</th>
                                <th class="px-4 py-3">View Message</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y text-s dark:divide-gray-700 dark:bg-gray-800">

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
$pagetitle = "Eagle Eye Tradings: Pending Approval";
$contentheader = "";
$pageheader = "";
include "templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/sentmaildata.php",
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
    });
</script>