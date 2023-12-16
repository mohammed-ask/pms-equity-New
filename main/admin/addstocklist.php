<?php
include "main/session.php";

?>
<form id="adduser" onsubmit="event.preventDefault();sendForm('', '', 'insertstocklist', 'resultid', 'adduser');return 0;">

    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input name="Symbol" data-bvalidator="required" class="form-control" placeholder="stock Name" />
    </label>
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Expiry Date</span>
        <input id="date" data-bvalidator="required" onfocus="setcalenderlimit(this.id,'')" name="expiredate" class="form-control" placeholder="Expire Date" />
    </label>
    <div>
        <button type="submit" id="modalsubmit" class="w-full px-3 py-1 mt-6 text-sm font-medium d-none">
            Submit
        </button>
    </div>
    <div id="resultid"></div>
</form>