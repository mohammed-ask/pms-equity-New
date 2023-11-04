<?php
include "main/session.php";
/* @var $obj db */
ob_start();
?>
<div class="container px-6 mx-auto grid">
    <div class="flex my-4 items-center justify-between">
        <h4>Request Withdrawal</h4>

        <button @click="openModal" onclick='dynamicmodal("", "requestwithdrawalamount", "", "Request Amount Withdrawal")' class="my-6 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Request Withdrawal
        </button>

    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full overflow-x-auto">

            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">S.No.</th>
                        <th class="px-4 py-3">Client Name</th>
                        <th class="px-4 py-3">Mobile No.</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Remark</th>
                        <th class="px-4 py-3">Payment Method</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">01</td>
                        <td class=" px-4 py-3 font-semibold">Suresh Yadav</td>
                        <td class=" px-4 py-3">7845639860</td>
                        <td class=" px-4 py-3">20/06/2022 12:00 am</td>
                        <td class=" px-4 py-3 font-semibold">2000</td>
                        <td class=" px-4 py-3">Need Urgent</td>
                        <td class=" px-4 py-3">Google Pay</td>
                        <td class=" px-4 py-3"><span class="px-4 py-2 leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100" aria-label="view">
                                <span class="w-5 h-5" fill="currentColor">Approved</span>

                            </span></td>

                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">02</td>
                        <td class=" px-4 py-3 font-semibold">Suresh Yadav</td>
                        <td class=" px-4 py-3">7845639860</td>
                        <td class=" px-4 py-3">20/06/2022 12:00 am</td>
                        <td class=" px-4 py-3 font-semibold">2000</td>
                        <td class=" px-4 py-3">Need Urgent</td>
                        <td class=" px-4 py-3">Google Pay</td>
                        <td class=" px-4 py-3"><span class="px-4 py-2 leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100" aria-label="view">
                                <span class="w-5 h-5" fill="currentColor">Disapproved</span>

                            </span></td>

                    </tr>


                </tbody>
            </table>
        </div>
    </div>

    <br>
</div>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Indiastock: Request Withdrawal";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/employeelistdata.php",
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