<?php
include "main/session.php";
$id = $_GET['hakuna'];
?>
<form id="adduser" onsubmit="event.preventDefault();sendForm('id', '<?= $id ?>', 'insertinvestmentamount', 'resultid', 'adduser');return 0;">
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Amount</span>
        <input name="amount" type="number" step='any' data-bvalidator="required,digit" step="any" class="form-control" placeholder="Enter Amount" />
    </label>
    <!-- <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Mobile</span>
        <input name="mobile" type="number" data-bvalidator="required,digit" step="any" class="form-control" placeholder="Enter Mobile" />
    </label> -->
    <!-- <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Date</span>
        <input id="date" data-bvalidator="required" onfocus="setcalenderlimit(this.id,'')" name="date" class="form-control" placeholder="Date" /></label> -->
    <!-- <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Transaction ID</span>
        <input name="transactionid" data-bvalidator="required" step="any" class="form-control" placeholder="Enter Transaction ID" />
    </label> -->
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Payment Method</span>
        <input name="paymentmethod" type="file" data-bvalidator="required" step="any" class="form-control" placeholder="Payment Method" />
    </label>
    <div>
        <button type="submit" id="modalsubmit" class="btn btn-primary w-full px-3 py-1 mt-6 text-sm font-medium d-none">
            Submit
        </button>
    </div>
    <div id="resultid"></div>
</form>