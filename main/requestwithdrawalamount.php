<?php
include "main/session.php";
?>
<form id="adduser" onsubmit="event.preventDefault();sendForm('', '', 'insertrequestwithdrawal', 'resultid', 'adduser');return 0;">

    <div>
        <h5 class="m-0 font-14 py-1 px-0 mt-2 font-weight-700">Enter Amount</h5>
    </div>
    <div class="input-group add-fund-input mb-3">
        <span style="font-weight: 500;" class="input-group-text font-18">₹</span>
        <input style="font-weight: 500;" name="amount" data-bvalidator="required" type="text" class="form-control font-18" value="1000">
    </div>
    <div>
        <h5 class="m-0 font-14 py-1 px-0 mt-2 font-weight-700">Remark</h5>
    </div>
    <div class="input-group add-fund-input mb-3">
        <input type="text" style="font-weight: 500;" xdata-bvalidator="required" name="remark" class="form-control font-18">
    </div>
    <h5 style="margin-top: 30px !important; margin-bottom: 3px !important;" class="card-title my-3 text-danger">Important*</h5>
    <ul class="mb-0 font-12" style="padding-left: 15px !important">
        <li>Your withdrewal request will be rewiew by our team.</li>
        <li>Withdrawal amount will credited in your saved bank acount within 24hrs after reviewed by our team</li>
        <li>Please don't change your Bank details when you requested to withdrewal amount.</li>

    </ul>
    <div class="modal-body">
        <button style="background-color: #057c7c; color: #fff;" class="btn w-100 ">Send Withdrawal Request</button>
    </div>
    <div id="resultid"></div>
</form>
<script>
    $("#modalfooterbtn").css('display', 'none')
</script>