<?php
include "main/session.php";
?>
<div>
    <h5 class="m-0 text-center font-15 py-3 px-0 font-weight-700">Pay Using Internet Banking, Mobile Banking Apps & UPI Options</h5>
</div>
<div class="border rounded">
    <div class="bg-light">
        <h5 style="padding-left:16px !important;" class="m-0 font-14 p-2"><?= "Bank: ".$bankname ?></h5>
    </div>

    <div class="row p-3" style="overflow-wrap: break-word;">

        <div class="col-4" style="border-right: 1px solid lightgray;">
            <h6 class="m-0">Holder Name</h6>
            <p class="mb-0"><?= $bankaccountname ?></p>
        </div><!--end col-->

        <div class="col-4" style="border-right: 1px solid lightgray;">
            <h6 class="m-0">Account No.</h6>
            <p class="mb-0"><?= $bankaccountno ?></p>
        </div><!--end col-->

        <div class="col-4">
            <h6 class="m-0">IFSC Code</h6>
            <p class="m-0"><?= $bankifsccode ?></p>
        </div><!--end col-->


    </div><!--end row-->
</div>
<div class="border rounded mt-3" style="overflow-wrap: break-word;">
    <div class="row p-3">
        <div class="col-4">
            <img id="scanqr-myImg" style="width:85px; max-width:90px; border: 1px solid lightgrey; padding: 3px;border-radius: 5px;" height="85px" class="m-0" src="<?= $qrimage ?>" alt="Scan QR & Pay">
            <div class="my-1" style="color: black; font-size: 10px; margin-left: 2px;"><i class="fa-solid fa-qrcode"></i> <span> Tap to zoom</span></div>
            <!-- The Modal -->
<div id="scanqr-myModal" class="scanqr-modal">
  <span class="scanqr-close">&times;</span>
  <img class="scanqr-modal-content" id="scanqr-img01">
  <div id="scanqr-caption"></div>
</div>

        </div><!--end col-->

        <div class="col-4">
            <h6 class="m-0">Scan & Pay</h6>
            <p class="mb-0">Pay Using any UPI</p>
            <img style="width: 185%; margin-top: 20%;" src="main/dist/userimages/upi-gateway.png" alt="">


        </div><!--end col-->
        <div class="col-4">
            <h6 class="m-0">Pay Using UPI ID</h6>
            <p class="mb-0"><?= $upiid ?></p>

        </div><!--end col-->

    </div><!--end row-->
</div>
<h5 style="margin-top: 30px !important; margin-bottom: 12px !important; text-align: center; font-size: 14px;" class="card-title my-3">** Pay First & Add Transaction Details Below **</h5>
<div class="modal-body">
    <form class="row gy-2 gx-3 align-items-end" id="addfund">
        <div class="col-6">
            <label class="form-label" for="Quantity">Mobile No</label>
            <input type="number" data-bvalidator="required,minlength[10],maxlength[10]" class="form-control form-control-sm" id="" name="mobile" placeholder="Mobile no. use for payment">
        </div>
        <div class="col-6">
            <label class="form-label" for="Price">Transaction Id</label>
            <input type="text" data-bvalidator="required" class="form-control form-control-sm" id="" name="transactionid" placeholder="Transaction ID or UTR">
        </div>

        <div class="col-6">
            <label class="form-label" for="Quantity">Payment Method</label>
            <input type="text" data-bvalidator="required" class="form-control form-control-sm" id="" name="paymentmethod" placeholder="Google pay, Phone Pe, Bank Transfer, or Other">
        </div>
        <div class="col-6">
            <label class="form-label" for="Price">Amount</label>
            <input type="number" step="any" data-bvalidator="required" class="form-control form-control-sm" id="" name="amount" placeholder="Amount you add in Funds">
        </div>

        <h5 style="margin-top: 30px !important; margin-bottom: 3px !important;" class="card-title my-3 text-danger">Important*</h5>
        <ul style="margin-left: 16px;" class="mb-0">
            <li>Your Payment will take 30 mins to 1hr to reflect in Your Account after reviewing by our team.</li>
            <li>You can see Credited amount in your fund section after 30mins to 1 hour after payment.</li>
            <li>There is no any hidden Charges like transaction fee, processing fee & more.</li>
        </ul>

        <button style="background-color: #057c7c;" class="btn btn-success w-100 my-3" onclick="event.preventDefault();sendForm('', '', 'insertfund', 'resultid', 'addfund')">Send Payment Details For Approval</button>
        <div class="col-md-12" id="resultid"></div>
    </form>



</div><!--end modal-body-->
<script>
    $("#modalfooterbtn").css('display', 'none')
</script>

<script>
// Get the modal
var modal = document.getElementById("scanqr-myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("scanqr-myImg");
var modalImg = document.getElementById("scanqr-img01");
var captionText = document.getElementById("scanqr-caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("scanqr-close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>