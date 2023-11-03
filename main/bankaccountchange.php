<?php
include "main/session.php";
?>
<form class="row gy-2 gx-3 align-items-end" id="addtax2">
    <div class="col-12">
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
    </div>
    <button class="btn btn-success d-none" id="modalsubmit" onclick="event.preventDefault();sendForm('', '', 'insertbank', 'resultid2', 'addtax2')">Send Message</button>
    <div class="col-md-12" id="resultid2"></div>
</form>