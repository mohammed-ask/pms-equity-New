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
<div class="container px-6 mx-auto grid mobile-bottom-margin">

  <h2 class="my-6 font-semibold text-gray-700 dark:text-gray-200">
    Dashboard
  </h2>

  <!-- Cards -->
  <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <!-- Card -->
    <div class="flex items-center p-3 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
          </path>
        </svg>
      </div>
      <div>
        <p class="mb-2  font-medium text-gray-600 dark:text-gray-400">
          Active clients
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
          6389
        </p>
      </div>
    </div>

    <!-- Card -->
    <div class="flex items-center p-3 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
        </svg>
      </div>
      <div>
        <p class="mb-2  font-medium text-gray-600 dark:text-gray-400">
          Total investment
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
          $ 46,760.89
        </p>
      </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-3 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
          </path>
        </svg>
      </div>
      <div>
        <p class="mb-2  font-medium text-gray-600 dark:text-gray-400">
          Pending approval
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
          376
        </p>
      </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-3 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
        </svg>
      </div>
      <div>
        <p class="mb-2  font-medium text-gray-600 dark:text-gray-400">
          Open positions
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
          35
        </p>
      </div>
    </div>
  </div>
  <h3 class="my-6 text-1xl font-semibold text-gray-700 dark:text-gray-200">
    Open Stock List
  </h3>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">

    <div class="w-full ">

      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-sm font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-3 py-2">S.No.</th>
            <th class="px-3 py-2">Stock Name</th>
            <th class="px-3 py-2">Price</th>
            <th class="px-3 py-2">No. of Share</th>
            <th class="px-3 py-2">Date & Time</th>
            <th class="px-3 py-2">User</th>
            <th class="px-3 py-2">Status</th>
          </tr>
        </thead>
        <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">
          <tr class="text-gray-700 dark:text-gray-400">
            <td class=" px-3 py-2">1</td>
            <td class=" px-3 py-2  font-semibold">
              BANK NIFTY
            </td>
            <td class="px-3 py-2 ">
              863.45
            </td>
            <td class="px-3 py-2 ">
              86
            </td>
            <td class="px-3 py-2 ">
              6/10/2020 5:05 PM
            </td>
            <td class="px-3 py-2 ">
              Suyash Thakur
            </td>

            <td class="px-3 py-2">
              <div class="flex items-center space-x-4 ">

                <button class="px-3 py-2 leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                  Buy</button>

                <button class="flex items-center justify-between px-2 py-2  font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                    </path>
                  </svg>
                </button>

              </div>
            </td>

          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <h3 class="my-6 text-1xl font-semibold text-gray-700 dark:text-gray-200" style="margin-top: 4%;">
    Carry Forword Transactions
  </h3>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">

    <div class="w-full ">

      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-sm font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-3 py-2">S.No.</th>
            <th class="px-3 py-2">Stock Name</th>
            <th class="px-3 py-2">Price</th>
            <th class="px-3 py-2">No. of Share</th>
            <th class="px-3 py-2">Date & Time</th>
            <th class="px-3 py-2">User</th>
            <th class="px-3 py-2">Status</th>
          </tr>
        </thead>
        <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">
          <tr class="text-gray-700 dark:text-gray-400">
            <td class=" px-3 py-2">1</td>
            <td class=" px-3 py-2  font-semibold">
              BANK NIFTY
            </td>
            <td class="px-3 py-2 ">
              863.45
            </td>
            <td class="px-3 py-2 ">
              86
            </td>
            <td class="px-3 py-2 ">
              6/10/2020 5:05 PM
            </td>
            <td class="px-3 py-2 ">
              Suyash Thakur
            </td>

            <td class="px-3 py-2">
              <div class="flex items-center space-x-4 ">

                <button class="px-3 py-2 leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                  Buy</button>

                <button class="flex items-center justify-between px-2 py-2  font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                    </path>
                  </svg>
                </button>

              </div>
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
$pagetitle = "Indiastock: Dashboard";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>