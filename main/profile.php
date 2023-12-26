<?php
include "main/session.php";
$rowprofile = $obj->selectextrawhere("users", "id=" . $employeeid . "")->fetch_assoc();
ob_start();
?>
<!-- <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> -->

<div class="row">
    <div class="col-md-12">

        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="<?= empty($avatarpath) ? 'main/images/user.png' : "main/" . $avatarpath ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4 p-1" tabindex="0">
                                    <!-- <span class="d-none d-sm-block">Upload new photo</span> -->
                                    <i class="bx bx-upload d-block"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>

                                <label for="upload" class="btn btn-primary me-2 mb-4 p-1 px-2" tabindex="0">
                                    <span class=" d-sm-block">Add Nominee</span>
                                    <!-- <i class="bx bx-upload d-block d-sm-none"></i> -->
                                    <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 1MB</p>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-6 col-md-12 mt-3">

                        <div>
                            <h3 class="card-title" style="font-size: 14px !important;"><span style="color: rgb(59, 51, 51);"> <span><i class='bx bx-user'></i></span> Name: </span><span style="margin-left: 5px;"><?= $username ?></span></h3>
                        </div>
                        <div>
                            <h3 class="card-title" style="font-size: 14px !important;"><span style="color: rgb(59, 51, 51);"> <span><i class='bx bx-phone-call'></i></span> Phone no: </span><span style="margin-left: 5px;"><?= $rowprofile['mobile'] ?></span></h3>
                        </div>
                        <div>
                            <h3 class="card-title mb-0" style="font-size: 14px !important;"><span style="color: rgb(59, 51, 51);;"> <span><i class='bx bx-envelope'></i></span> Email: </span><span style="margin-left: 8px;"><?= $rowprofile['email'] ?></span></h3>
                        </div>

                    </div>




                </div>
            </div>
            <hr class="my-0" />




            <!-- /Account -->
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-0">

                            <h6>Bank Details</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "bankaccountchange","", "Change Bank Details")'>
                                    <i class='bx bxs-edit'></i>
                                </button>

                            </div>
                        </div>
                        <span class="fw-bold d-block mb-1">Bank Name: <span class="fw-medium" style="margin-left: 5px;"><?= $rowprofile['bankname'] ?></span> </span>
                        <span class="fw-bold d-block mb-1">IFS Code: <span class="fw-medium" style="margin-left: 23px;"><?= $rowprofile['ifsc'] ?></span> </span>
                        <span class="fw-bold d-block mb-1">Account no. <span class="fw-medium" style="margin-left: 8px;"><?= $rowprofile['accountno'] ?></span> </span>
                    </div>
                </div>
            </div>
       

            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex mb-3 mt-2">
                            <div class="flex-shrink-0">
                                <i style="font-size: 35px; margin-right: 10px; color: #696cff;" class='bx bxs-chevrons-right'></i>
                            </div>
                            <div class="flex-grow-1 row">
                                <div class="col-9 mb-sm-0 mb-2">
                                    <h6 class="mb-0">Carry Forward <span><button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="If enabled, today's stock purchases will automatically convert to holdings until Thursday. If disabled, today's stocks will be sold at market close.">
                                                <i class='bx bx-message-rounded-error'></i>
                                            </button></span></h6>
                                    <small class="text-muted">Carry Forward Stocks</small>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input float-end" <?= $rowprofile['carryforward'] === 'Yes' ? 'checked' : '' ?> id="carrycheck" type="checkbox" role="switch">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i style="font-size: 33px; margin-right: 14px; color: #696cff;" class='bx bxs-paper-plane'></i>
                            </div>
                            <div class="flex-grow-1 row">
                                <div class="col-9 mb-sm-0 mb-2">
                                    <h6 class="mb-0">long-Term Holding <span><button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="If enabled, you can keep your stocks as long as you want without automated selling or buying">
                                                <i class='bx bx-message-rounded-error'></i>
                                            </button></span></h6>
                                    <small class="text-muted">Long-term stocks holding</small>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input float-end" <?= $rowprofile['longholding'] === 'Yes' ? 'checked' : '' ?> id="longtermcheck" type="checkbox" role="switch">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-0">

                            <h6 style=" font-size: 16px; margin-bottom: 12px;"><span style="font-weight:700;">Nominee:</span> <span class="fw-medium" style="margin-left: 5px;">Sharma ji Ka Ladka</span> </h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" data-bs-toggle='modal' data-bs-target='#myModal' onclick='dynamicmodal("", "bankaccountchange","", "Change Bank Details")'>
                                    <i class='bx bxs-edit'></i>
                                </button>

                            </div>
                        </div>
                       
                        <span class="fw-bold d-block mb-1">Relation:<span class="fw-medium" style="margin-left: 10px;">Mother</span> </span>
                        <span class="fw-bold d-block mb-1">Date of Birth: <span class="fw-medium" style="margin-left: 8px;">12 Oct 1970</span> </span>
                        <span class="fw-bold d-block mb-1">Aadhar No. <span class="fw-medium" style="margin-left: 8px;">673846526899</span> </span>
                    </div>
                </div>
            </div> -->

        </div>

        <div class="card">
            <h5 class="card-header">Change Password</h5>
            <div class="card-body">

                <form id="addtax" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 form-password-toggle mt-2 mb-3">
                            <label class="form-label" for="basic-default-password32">Current Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" name="oldpassword" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 form-password-toggle mt-2 mb-3">
                            <label class="form-label" for="basic-default-password32">New Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" name="password" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                    </div>
                    <div id="otpinput"></div>
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading mb-1">OTP verification is required to change your current password.</h6>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" id="otp" onclick="requestotp()">Change Password</button>
                    <button type="button" class="btn btn-primary" id="formsubmit" style="display: none;" onclick="sendForm('', '', 'updateprofile', 'resultid', 'addtax')">Change Password</button>
                    <!-- <button type="submit" class="btn btn-success">Change Password</button> -->
                    <div id="resultid"></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Profile- PMS Equity";
$contentheader = "";
$pageheader = "";
include "main/templete.php"; ?>
<script>
    $(function() {

        $("#eye").click(() => {
            iconname = $("#eye").attr("class");
            if (iconname === 'fa fa-eye') {
                $('#password').attr('type', 'text')
                $("#eye").attr('class', 'fa fa-eye-slash')

            } else {
                $('#password').attr('type', 'password')
                $("#eye").attr('class', 'fa fa-eye')
            }
        })
    });

    function requestotp() {
        event.preventDefault();
        addoverlay()
        $.post("main/otpforprofile.php",
            function(data) {
                if (data === "Success") {
                    removeoverlay()
                    $("#otpinput").append(" <div class='mt-3 row row-cols-lg-auto g-3 align-items-center'><div class='col-12'><input class='form-control' name='otp' data-bvalidator='digit,required,minlength[4],maxlength[4]' type='text' placeholder='Enter OTP' value=''></div></div>")
                    $("#formsubmit").css("display", "block")
                    $("#otp").css("display", "none")
                }
            },
        );
    }

    $('#carrycheck').on('change', function() {
        if (this.checked) {
            // Checkbox is checked, send AJAX request with value = 1
            $.ajax({
                type: 'POST',
                url: 'main/carryforwardchange.php', // Replace with your actual endpoint
                data: {
                    value: 'Yes',
                    type: 'Carryforward'
                }, // Send the value in the data object
                success: function(response) {
                    // Handle the response from the server
                    $('#result').html(response);
                }
            });
        } else {
            // Checkbox is unchecked, send AJAX request with value = 0
            $.ajax({
                type: 'POST',
                url: 'main/carryforwardchange.php', // Replace with your actual endpoint
                data: {
                    value: 'No',
                    type: 'Carryforward'

                }, // Send the value in the data object
                success: function(response) {
                    // Handle the response from the server
                    $('#result').html(response);
                }
            });
        }
    });

    $('#longtermcheck').on('change', function() {
        if (this.checked) {
            // Checkbox is checked, send AJAX request with value = 1
            $.ajax({
                type: 'POST',
                url: 'main/carryforwardchange.php', // Replace with your actual endpoint
                data: {
                    value: 'Yes',
                    type: 'Longterm'
                }, // Send the value in the data object
                success: function(response) {
                    // Handle the response from the server
                    $('#result').html(response);
                }
            });
        } else {
            // Checkbox is unchecked, send AJAX request with value = 0
            $.ajax({
                type: 'POST',
                url: 'main/carryforwardchange.php', // Replace with your actual endpoint
                data: {
                    value: 'No',
                    type: 'Longterm'
                }, // Send the value in the data object
                success: function(response) {
                    // Handle the response from the server
                    $('#result').html(response);
                }
            });
        }
    });

    $('#upload').on('change', function() {
        // Check if a file is selected
        if (this.files && this.files[0]) {
            var formData = new FormData();
            formData.append('image', this.files[0]);

            // Make an AJAX call
            $.ajax({
                url: 'main/userimage.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response, 'rr')
                    // Handle the success response from the backend
                    if (response === 'Success') {
                        window.location.href = 'profile'
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error('Error uploading image:', error);
                }
            });
        }
    });
</script>