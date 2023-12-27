<?php
include "main/session.php";
?>
<form class="row gy-2 gx-3 align-items-end" id="addfund">
    <div class="row">
        <div class="col-6">
            <label class="form-label mb-0" for="Price">Name</label>
            <input data-bvalidator="required" class="form-control form-control-sm" id="" name="name" placeholder="Nominee Name">
        </div>
        <div class="col-6">
            <label class="form-label mb-0" for="Price">Date of Birth</label>
            <input data-bvalidator="required,gap18year" data-bvalidator-msg-gap18year="Nominee Should be minimum 18 year Old" onfocus="setcalenderlimit(this.id,'')" class="form-control form-control-sm" id="date" name="dob" placeholder="DOB">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label class="form-label mb-0" for="Price">Relation</label>
            <select data-bvalidator="required" class="form-control form-control-sm" id="" name="relation" placeholder="Nominee Relation">
                <option value="">Select Relation</option>
                <option value="Mother">Mother</option>
                <option value="Father">Father</option>
                <option value="Children">Children</option>
                <option value="Spouse">Spouse</option>
                <option value="Brother">Brother</option>
                <option value="Sister">Sister</option>
            </select>
        </div>
        <div class="col-6">
            <label class="form-label mb-0" for="Price">Aadhar No.</label>
            <input data-bvalidator="required,maxlength[12],minlength[12]" class="form-control form-control-sm" id="" name="adharno" placeholder="Aadhar No">
        </div>
    </div>
    <button style="background-color: #057c7c;" class="btn btn-success w-100 my-3" onclick="event.preventDefault();sendForm('', '', 'insertnominee', 'resultid', 'addfund')">Submit</button>
    <div class="col-md-12" id="resultid"></div>
</form>
<script>
    $("#modalfooterbtn").css('display', 'none')
    // $('select').select2()
</script>