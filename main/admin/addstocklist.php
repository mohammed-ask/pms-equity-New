<?php
include "main/session.php";

?>
<form id="adduser" onsubmit="event.preventDefault();sendForm('', '', 'insertstocklist', 'resultid', 'adduser');return 0;">
<div class="row">
    <label class="col-lg-6 col-lg-6 block text-sm  mb-3" style="margin-bottom: 5px; font-size:13px;">
        <span class="text-gray-700 dark:text-gray-400">Stock Name(with Expiry & Strike Price)</span>
        <input name="Symbol" data-bvalidator="required" class="form-control" style="font-size:12px;" placeholder="BANKNIFTY 25 JAN 2024 CE 36500.00" />
    </label>
    <label class="col-lg-6 col-lg-6 block text-sm  mb-3" style="margin-bottom: 5px; font-size:13px;">
        <span class="text-gray-700 dark:text-gray-400">Expiry Date (Delete Automatically on)</span>
        <input id="date" data-bvalidator="required" onfocus="setcalenderlimit(this.id,'')" name="expiredate" class="form-control" style="font-size:12px;" placeholder="Expire Date" />
    </label></div>
    <div>
        <button type="submit" id="modalsubmit" class="w-full px-3 py-1 mt-6 text-sm font-medium d-none">
            Submit
        </button>
    </div>
    <div id="resultid"></div>
</form>