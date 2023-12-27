<?php
include "main/session.php";
?>
<form class="row gy-2 gx-3 align-items-end" id="addtax2">
    <div class="col-lg-4 col-md-12">
        <label for="defaultFormControlInput" class="form-label">Bank Name</label>
        <input type="text" data-bvalidator="required" name="bankname" class="form-control" id="defaultFormControlInput" placeholder="bank name" aria-describedby="defaultFormControlHelp">
    </div>

    <div class="col-lg-5 col-md-12">
        <label for="defaultFormControlInput" class="form-label">Account No.</label>
        <input type="number" data-bvalidator="required" name="accountno" class="form-control" id="defaultFormControlInput" placeholder="new account no" aria-describedby="defaultFormControlHelp">
    </div>

    <div class="col-lg-3 col-md-12">
        <label for="defaultFormControlInput" class="form-label">IFSC</label>
        <input type="text" data-bvalidator="required" name="ifsc" class="form-control" id="defaultFormControlInput" placeholder="IFSC" aria-describedby="defaultFormControlHelp">
    </div>
    <!-- <div class="col-12">
        <label class="form-label" for="Quantity">Bank Name</label>
        <input type="text" data-bvalidator="required" name="bankname" class="form-control form-control-sm" id="">
    </div>
    <div class="col-12">
        <label class="form-label" for="Quantity">Account No.</label>
        <input type="text" data-bvalidator="required" name="accountno" class="form-control form-control-sm" id="">
    </div>
    <div class="col-12">
        <label class="form-label" for="Quantity">IFSC</label>
        <input type="text" data-bvalidator="required" name="ifsc" class="form-control form-control-sm" id="">
    </div> -->
    <button class="btn btn-primary" id="modalsubmit" onclick="event.preventDefault();sendForm('', '', 'insertbank', 'resultid2', 'addtax2')">Send For Approval</button>
    <div class="col-md-12" id="resultid2"></div>
</form>
<script>
    $("#modalfooterbtn").css('display', 'none')
</script>