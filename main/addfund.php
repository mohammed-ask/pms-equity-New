<?php
include "main/session.php";
?>

<div style="text-align: center; font-weight: 600; margin-bottom: 15px;"><span class="card-title">Pay Using Internet Banking, Mobile Banking Apps & UPI Options</span></div>
<div class="nav-align-top mb-4">
    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-upi" aria-controls="navs-pills-justified-home" aria-selected="true">
                <span class="d-sm-block"> Pay Using
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 466" width="40" id="upi">
                        <path fill="#c2c2c2" d="M98.1 340.7h6.3l-5.9 24.5c-.9 3.6-.7 6.4.5 8.2 1.2 1.8 3.4 2.7 6.7 2.7 3.2 0 5.9-.9 8-2.7 2.1-1.8 3.5-4.6 4.4-8.2l5.9-24.5h6.4l-6 25.1c-1.3 5.4-3.6 9.5-7 12.2-3.3 2.7-7.7 4.1-13.1 4.1-5.4 0-9.1-1.3-11.1-4s-2.4-6.8-1.1-12.2l6-25.2zm31.4 40.3 10-41.9 19 24.6c.5.7 1 1.4 1.5 2.2.5.8 1 1.7 1.6 2.7l6.7-27.9h5.9l-10 41.8-19.4-25.1-1.5-2.1c-.5-.8-.9-1.5-1.2-2.4l-6.7 28h-5.9zm44.2 0 9.6-40.3h6.4l-9.6 40.3h-6.4zm15.5 0 9.6-40.3h21.9l-1.3 5.6h-15.5l-2.4 10H217l-1.4 5.7h-15.5l-4.5 18.9h-6.4zm29 0 9.6-40.3h6.4l-9.6 40.3h-6.4zm15.5 0 9.6-40.3h21.9l-1.3 5.6h-15.5l-2.4 10.1h15.5l-1.4 5.7h-15.5l-3.1 13H257l-1.4 5.9h-21.9zm29.3 0 9.6-40.3h8.6c5.6 0 9.5.3 11.6.9 2.1.6 3.9 1.5 5.3 2.9 1.8 1.8 3 4.1 3.5 6.8.5 2.8.3 6-.5 9.5-.9 3.6-2.2 6.7-4 9.5-1.8 2.8-4.1 5-6.8 6.8-2 1.4-4.2 2.3-6.6 2.9-2.3.6-5.8.9-10.4.9H263zm7.8-6h5.4c2.9 0 5.2-.2 6.8-.6 1.6-.4 3-1.1 4.3-2 1.8-1.3 3.3-2.9 4.5-4.9 1.2-1.9 2.1-4.2 2.7-6.8.6-2.6.8-4.8.5-6.7-.3-1.9-1-3.6-2.2-4.9-.9-1-2-1.6-3.5-2-1.5-.4-3.8-.6-7.1-.6h-4.6l-6.8 28.5zm59.7-12.1-4.3 18.1h-6l9.6-40.3h9.7c2.9 0 4.9.2 6.2.5 1.3.3 2.3.8 3.1 1.6 1 .9 1.7 2.2 2 3.8.3 1.6.2 3.3-.2 5.2-.5 1.9-1.2 3.7-2.3 5.3-1.1 1.6-2.4 2.9-3.8 3.8-1.2.7-2.5 1.3-3.9 1.6-1.4.3-3.6.5-6.4.5h-3.7zm1.7-5.4h1.6c3.5 0 6-.4 7.4-1.2 1.4-.8 2.3-2.2 2.8-4.2.5-2.1.2-3.7-.8-4.5-1.1-.9-3.3-1.3-6.6-1.3H335l-2.8 11.2zm40.1 23.5-2-10.4h-15.6l-7 10.4H341l29-41.9 9 41.9h-6.7zm-13.8-15.9h10.9l-1.8-9.2c-.1-.6-.2-1.3-.2-2-.1-.8-.1-1.6-.1-2.5-.4.9-.8 1.7-1.3 2.5-.4.8-.8 1.5-1.2 2.1l-6.3 9.1zm29.7 15.9 4.4-18.4-8-21.8h6.7l5 13.7c.1.4.2.8.4 1.4.2.6.3 1.2.5 1.8l1.2-1.8c.4-.6.8-1.1 1.2-1.6l11.7-13.5h6.4L399 362.5l-4.4 18.4h-6.4zm60.9-19.9c0-.3.1-1.2.3-2.6.1-1.2.2-2.1.3-2.9-.4.9-.8 1.8-1.3 2.8-.5.9-1.1 1.9-1.8 2.8l-15.4 21.5-5-21.9c-.2-.9-.4-1.8-.5-2.6-.1-.8-.2-1.7-.2-2.5-.2.8-.5 1.7-.8 2.7-.3.9-.7 1.9-1.2 2.9l-9 19.8h-5.9l19.3-42 5.5 25.4c.1.4.2 1.1.3 2 .1.9.3 2.1.5 3.5.7-1.2 1.6-2.6 2.8-4.4.3-.5.6-.8.7-1.1l17.4-25.4-.6 42h-5.9l.5-20zm10.6 19.9 9.6-40.3h21.9l-1.3 5.6h-15.5l-2.4 10.1h15.5l-1.4 5.7h-15.5l-3.1 13H483l-1.4 5.9h-21.9zm29.2 0 10-41.9 19 24.6c.5.7 1 1.4 1.5 2.2.5.8 1 1.7 1.6 2.7l6.7-27.9h5.9l-10 41.8-19.4-25.1-1.5-2.1c-.5-.8-.9-1.5-1.2-2.4l-6.7 28h-5.9zm65.1-34.8-8.3 34.7h-6.4l8.3-34.7h-10.4l1.3-5.6h27.2l-1.3 5.6H554zm6.7 26.7 5.7-2.4c.1 1.8.6 3.2 1.7 4.1 1.1.9 2.6 1.4 4.6 1.4 1.9 0 3.5-.5 4.9-1.6 1.4-1.1 2.3-2.5 2.7-4.3.6-2.4-.8-4.5-4.2-6.3-.5-.3-.8-.5-1.1-.6-3.8-2.2-6.2-4.1-7.2-5.9-1-1.8-1.2-3.9-.6-6.4.8-3.3 2.5-5.9 5.2-8 2.7-2 5.7-3.1 9.3-3.1 2.9 0 5.2.6 6.9 1.7 1.7 1.1 2.6 2.8 2.9 4.9l-5.6 2.6c-.5-1.3-1.1-2.2-1.9-2.8-.8-.6-1.8-.9-3-.9-1.7 0-3.2.5-4.4 1.4-1.2.9-2 2.1-2.4 3.7-.6 2.4 1.1 4.7 5 6.8.3.2.5.3.7.4 3.4 1.8 5.7 3.6 6.7 5.4 1 1.8 1.2 3.9.6 6.6-.9 3.8-2.8 6.8-5.7 9.1-2.9 2.2-6.3 3.4-10.3 3.4-3.3 0-5.9-.8-7.7-2.4-2-1.6-2.9-3.9-2.8-6.8zm47.1 8.1 9.6-40.3h6.4l-9.6 40.3h-6.4zm15.6 0 10-41.9 19 24.6c.5.7 1 1.4 1.5 2.2.5.8 1 1.7 1.6 2.7l6.7-27.9h5.9l-10 41.8-19.4-25.1-1.5-2.1c-.5-.8-.9-1.5-1.2-2.4l-6.7 28h-5.9zm65.1-34.8-8.3 34.7h-6.4l8.3-34.7h-10.4l1.3-5.6h27.2l-1.3 5.6h-10.4zm6.9 34.8 9.6-40.3h22l-1.3 5.6h-15.5l-2.4 10.1h15.5l-1.4 5.7h-15.5l-3.1 13h15.5l-1.4 5.9h-22zm39.5-18.1-4.3 18h-6l9.6-40.3h8.9c2.6 0 4.6.2 5.9.5 1.4.3 2.5.9 3.3 1.7 1 1 1.6 2.2 1.9 3.8.3 1.5.2 3.2-.2 5.1-.8 3.2-2.1 5.8-4.1 7.6-2 1.8-4.5 2.9-7.5 3.3l9.1 18.3h-7.2l-8.7-18h-.7zm1.6-5.1h1.2c3.4 0 5.7-.4 7-1.2 1.3-.8 2.2-2.2 2.7-4.3.5-2.2.3-3.8-.7-4.7-1-.9-3.1-1.4-6.3-1.4h-1.2l-2.7 11.6zm18.9 23.2 9.6-40.3h21.9l-1.3 5.6h-15.5l-2.4 10h15.5l-1.4 5.7h-15.5l-4.5 18.9h-6.4zm52.8 0-2-10.4h-15.6l-7 10.4h-6.7l29-41.9 9 41.9h-6.7zm-13.9-15.9h10.9l-1.8-9.2c-.1-.6-.2-1.3-.2-2-.1-.8-.1-1.6-.1-2.5-.4.9-.8 1.7-1.3 2.5-.4.8-.8 1.5-1.2 2.1l-6.3 9.1zm62.2-14.6c-1.4-1.6-3.1-2.8-4.9-3.5-1.8-.8-3.8-1.2-6.1-1.2-4.3 0-8.1 1.4-11.5 4.2-3.4 2.8-5.6 6.5-6.7 11-1 4.3-.6 7.9 1.4 10.8 1.9 2.8 4.9 4.2 8.9 4.2 2.3 0 4.6-.4 6.9-1.3 2.3-.8 4.6-2.1 7-3.8l-1.8 7.4c-2 1.3-4.1 2.2-6.3 2.8-2.2.6-4.4.9-6.8.9-3 0-5.7-.5-8-1.5s-4.2-2.5-5.7-4.5c-1.5-1.9-2.4-4.2-2.8-6.8-.4-2.6-.3-5.4.5-8.4.7-3 1.9-5.7 3.5-8.3 1.6-2.6 3.7-4.9 6.1-6.8 2.4-2 5-3.5 7.8-4.5s5.6-1.5 8.5-1.5c2.3 0 4.4.3 6.4 1 1.9.7 3.7 1.7 5.3 3.1l-1.7 6.7zm.6 30.5 9.6-40.3h21.9l-1.3 5.6h-15.5l-2.4 10.1h15.5l-1.4 5.7H868l-3.1 13h15.5L879 381h-21.9z"></path>
                        <path fill="#c2c2c2" d="M740.7 305.6h-43.9l61-220.3h43.9l-61 220.3zM717.9 92.2c-3-4.2-7.7-6.3-14.1-6.3H462.6l-11.9 43.2h219.4l-12.8 46.1H481.8v-.1h-43.9l-36.4 131.5h43.9l24.4-88.2h197.3c6.2 0 12-2.1 17.4-6.3 5.4-4.2 9-9.4 10.7-15.6l24.4-88.2c1.9-6.6 1.3-11.9-1.7-16.1zm-342 199.6c-2.4 8.7-10.4 14.8-19.4 14.8H130.2c-6.2 0-10.8-2.1-13.8-6.3-3-4.2-3.7-9.4-1.9-15.6l55.2-198.8h43.9l-49.3 177.6h175.6l49.3-177.6h43.9l-57.2 205.9z"></path>
                        <path fill="#098041" d="M877.5 85.7 933 196.1 816.3 306.5z"></path>
                        <path fill="#e97626" d="M838.5 85.7 894 196.1 777.2 306.5z"></path>
                    </svg>


                </span>
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-bank" aria-controls="navs-pills-justified-profile" aria-selected="false">
                <span class="d-sm-block">Bank Details</span>
            </button>
        </li>
    </ul>
    <div class="tab-content p-2">


        <div class="tab-pane fade show active" id="navs-pills-justified-upi" role="tabpanel">


            <div class="row">

                <div class="col-6">
                    <!-- <div><img style="border: 1px solid lightgrey; border-radius: 5px;" width="100%" src="<?= $qrimage ?>" alt="qr"></div> -->

                </div>
                <div class="col-6">

                    <div><img style="border-radius: 5px;" width="100%" src="main/dist/userstuff/assets\img\dashboard/upi-options.png" alt="upi-options"></div>


                </div>

            </div>




        </div>


        <div class="tab-pane fade py-1 pl-1" id="navs-pills-justified-bank" role="tabpanel" style="padding-left: 5px;">

            <div>
                <div class="row">

                    <div class="col-6 high-low"><span>Bank Name<br></span> <span style="color: rgb(54, 53, 53);"><?= $bankname ?></span></div>

                    <div class="col-6 high-low"><span>Holder Name<br></span> <span style="color: rgb(54, 53, 53);"><?= $bankaccountname ?></span></div>

                    <div class="col-6 high-low mt-2"><span>Account no.<br></span> <span style="color: rgb(54, 53, 53);"><?= $bankaccountno ?></span></div>

                    <div class="col-6 high-low mt-2"><span>IFSC<br></span> <span style="color: rgb(54, 53, 53);"><?= $bankifsccode ?></span></div>

                </div>
                <hr style="margin: 0.5rem 0;">
                <div class="row">
                    <div class="high-low"><span>UPI ID: </span> <span style="color: rgb(54, 53, 53);"><?= $upiid ?></span></div>
                </div>


            </div>

        </div>

    </div>
</div>

<div>
    <form id="addfund" class="uploader">
        <div class="col-12">
            <!-- <label class="form-label" for="Price">Amount</label> -->
            <input type="number" step="any" data-bvalidator="required" class="form-control form-control" id="" name="amount" placeholder="Amount you add in Funds">
        </div>
        <input id="file-upload" name='paymentmethod' type="file" name="fileUpload" accept="image/*" />
        <label for="file-upload" id="file-drag">

            <img id="file-image" data-bvalidator="required" src="#" alt="Preview" class="hidden">
            <div id="start">
                <i class='bx bx-cloud-upload' aria-hidden="true"></i>
                <div>Select screenshort or drag here</div>
                <div id="notimage" class="hidden">Please select an image</div>
                <span id="file-upload-btn" class="btn btn-sm btn-outline-primary">Upload Screenshort</span>
            </div>
            <div id="response" class="hidden">
                <div id="messages"></div>
                <!-- <progress class="progress" id="file-progress" value="0">
                      <span>0</span>%
                    </progress> -->
            </div>
        </label>
    </form>
</div>
<div class="modal-footer" style="  justify-content: center;">
    <button type="button" class="btn btn-primary" onclick="event.preventDefault();sendForm('', '', 'insertfund', 'resultid', 'addfund')">Submit for review</button>
    <div class="col-md-12" id="resultid"></div>
</div>

<!-- <div>
    <h5 class="m-0 text-center font-15 py-3 px-0 font-weight-700">Pay Using Internet Banking, Mobile Banking Apps & UPI Options</h5>
</div>
<div class="border rounded">
    <div class="bg-light">
        <h5 style="padding-left:16px !important;" class="m-0 font-14 p-2"><?= "Bank: " . $bankname ?></h5>
    </div>

    <div class="row p-3" style="overflow-wrap: break-word;">

        <div class="col-4" style="border-right: 1px solid lightgray;">
            <h6 class="m-0">Holder Name</h6>
            <p class="mb-0"><?= $bankaccountname ?></p>
        </div>

        <div class="col-4" style="border-right: 1px solid lightgray;">
            <h6 class="m-0">Account No.</h6>
            <p class="mb-0"><?= $bankaccountno ?></p>
        </div>

        <div class="col-4">
            <h6 class="m-0">IFSC Code</h6>
            <p class="m-0"><?= $bankifsccode ?></p>
        </div>


    </div>
</div>
<div class="border rounded mt-3" style="overflow-wrap: break-word;">
    <div class="row p-3">
        <div class="col-4">
            <img id="scanqr-myImg" style="width:85px; max-width:90px; border: 1px solid lightgrey; padding: 3px;border-radius: 5px;" height="85px" class="m-0" src="<?= $qrimage ?>" alt="Scan QR & Pay">
            <div class="my-1" style="color: black; font-size: 10px; margin-left: 2px;"><i class="fa-solid fa-qrcode"></i> <span> Tap to zoom</span></div>
            <div id="scanqr-myModal" class="scanqr-modal">
                <span class="scanqr-close">&times;</span>
                <img class="scanqr-modal-content" id="scanqr-img01">
                <div id="scanqr-caption"></div>
            </div>

        </div>

        <div class="col-4">
            <h6 class="m-0">Scan & Pay</h6>
            <p class="mb-0">Pay Using any UPI</p>
            <img style="width: 185%; margin-top: 20%;" src="main/dist/userimages/upi-gateway.png" alt="">


        </div>
        <div class="col-4">
            <h6 class="m-0">Pay Using UPI ID</h6>
            <p class="mb-0"><?= $upiid ?></p>

        </div>

    </div>
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



</div> -->
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
    img.onclick = function() {
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