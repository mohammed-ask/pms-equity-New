<?php
include "main/session.php";
$rownominee = $obj->selectextrawhere('nominee', "userid=$employeeid and status = 1")->fetch_assoc();
?>
<form id="addfund">
    <div class="row">
        <div class="col-6">
            <label class="form-label mb-0" for="Price">Name</label>
            <input data-bvalidator="required" readonly class="form-control form-control-sm" id="" value="<?= isset($rownominee['name']) ? $rownominee['name'] : '' ?>" name="name" placeholder="Nominee Name">
        </div>
        <div class="col-6">
            <label class="form-label mb-0" for="Price">Date of Birth</label>
            <input data-bvalidator="required,gap18year" data-bvalidator-msg-gap18year="Nominee Should be minimum 18 year Old" onfocus="setcalenderlimit(this.id,'')" readonly class="form-control form-control-sm" id="date" value="<?= isset($rownominee['name']) ? changedateformatespecito($rownominee['dob'], "Y-m-d", "d/m/Y") : '' ?>" name="dob" placeholder="DOB">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <label class="form-label mb-0" for="Price">Relation</label>
            <input data-bvalidator="required" readonly class="form-control form-control-sm" id="" value="<?= isset($rownominee['name']) ? $rownominee['relation'] : '' ?>" name="name" placeholder="Nominee Name">

        </div>
        <div class="col-6">
            <label class="form-label mb-0" for="Price">Aadhar No.</label>
            <input data-bvalidator="required,maxlength[12],minlength[12]" value="<?= isset($rownominee['name']) ? $rownominee['adharno'] : '' ?>" readonly class="form-control form-control-sm" id="" name="adharno" placeholder="Aadhar No">
            <input type="text" name="userid" hidden value="<?= $id ?>">
        </div>
    </div>
    <!-- <button class="mt-3 px-4 py-2  text-sm  bg-blue  rounded-lg " onclick="event.preventDefault();sendForm('id', '<?= isset($rownominee['id']) ? $rownominee['id'] : '' ?>', 'editnominee', 'resultid', 'addfund')">Submit</button> -->
    <div class="col-md-12" id="resultid"></div>
</form>
<script>
    $("#modalfooterbtn").css('display', 'none')
    $('select').select2()
</script>