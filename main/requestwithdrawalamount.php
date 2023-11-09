<?php
include "main/session.php";
?>
<form id="adduser" onsubmit="event.preventDefault();sendForm('', '', 'insertrequestwithdrawal', 'resultid', 'adduser');return 0;">
    <div>
        <label for="defaultFormControlInput" class="form-label">Enter Amount</label>
        <input type="number" class="form-control" name="amount" data-bvalidator="required" id="defaultFormControlInput" placeholder="₹10000" aria-describedby="defaultFormControlHelp">
    </div>

    <div>
        <label for="exampleFormControlTextarea1" class="form-label">Remarks</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="remark" rows="3" placeholder="(Optional)"></textarea>
    </div>

    <div class="mt-3">

        <span style="font-size: 13px; font-weight: 600; color: #e10000;">Important!</span>
        <ul class="mb-0 font-12" style="padding-left: 15px !important; font-size: 12px;">
            <li>Your withdrawal request will be rewiew by our team.</li>
            <li>Withdrawal amount will credited in your saved bank acount within 24hrs after reviewed.</li>
            <li>Please don't change your Bank details when you requested to withdrewal amount.</li>

        </ul>

    </div>
    <div id="resultid"></div>


    </div>
    <div class="modal-footer" style="    justify-content: center;">
        <button class="btn btn-primary">Send Withdrawal Request</button>
    </div>
</form>
<!-- <form id="adduser" onsubmit="event.preventDefault();sendForm('', '', 'insertrequestwithdrawal', 'resultid', 'adduser');return 0;">

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
</form> -->
<script>
    $("#modalfooterbtn").css('display', 'none')
</script>