<?php
include "main/session.php";
/* @var $obj db */
ob_start();


?>
<style>
    #datacards a {
        color: white;
    }
</style>
<div class="container px-6 mx-auto grid">
    <div class="sidebyside">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Transaction detail Section
        </h2>

        <button onclick='dynamicmodal("none", "somepage", "Unlink", "Unlink Vehicle")' class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Stock
        </button>

    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <div class="w-full ">

            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Company Name</th>
                        <th class="px-4 py-3">Buy Price</th>
                        <th class="px-4 py-3">Sell Price</th>
                        <th class="px-4 py-3">No. of Share</th>
                        <th class="px-4 py-3">Date & Time</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">User</th>
                        <th class="px-4 py-3">Action</th>
                        <!-- <th class="px-4 py-3">User</th> -->
                        <!-- <th class="px-4 py-3">Action</th> -->

                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-4 py-3">1</td>
                        <td class=" px-4 py-3 text-sm font-semibold">
                            BANK NIFTY
                        </td>
                        <td class="px-4 py-3 text-sm">
                            863.45
                        </td>
                        <td class="px-4 py-3 text-sm">
                            86
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Buy
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020 5:05 PM
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- right col -->
</section>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "PMS Equity";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>