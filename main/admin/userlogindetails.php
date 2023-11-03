<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>

<div class="page-body">

    <!-- New Table -->


    <div class="container-xl">
        <div class="card card-default">
            <div class="card-header">
                <h3>Users Login Detail</h3>

            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">

                <div class="w-full ">

                    <table id="example2" class="table w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">S.No.</th>
                                <th class="px-4 py-3">User Name</th>
                                <th class="px-4 py-3">IP Address</th>
                                <th class="px-4 py-3">Login Date & Time</th>

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
$pagetitle = "PMS Equity: User Login Detail";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/logindata.php",
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