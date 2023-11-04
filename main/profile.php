<?php
include "main/session.php";
$rowprofile = $obj->selectextrawhere("users", "id=" . $employeeid . "")->fetch_assoc();
ob_start();
?>
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

<div class="row">
    <div class="col-md-12">

        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 1MB</p>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-6 col-md-12 mt-3">

                        <div>
                            <h3 class="card-title" style="font-size: 14px !important;"><span style="color: rgb(59, 51, 51);"> <span><i class='bx bx-user'></i></span> Name: </span><span style="margin-left: 5px;">Shubham Kumar</span></h3>
                        </div>
                        <div>
                            <h3 class="card-title" style="font-size: 14px !important;"><span style="color: rgb(59, 51, 51);"> <span><i class='bx bx-phone-call'></i></span> Phone no: </span><span style="margin-left: 5px;">08756234768</span></h3>
                        </div>
                        <div>
                            <h3 class="card-title mb-0" style="font-size: 14px !important;"><span style="color: rgb(59, 51, 51);;"> <span><i class='bx bx-envelope'></i></span> Email: </span><span style="margin-left: 8px;">shubhamkumar087@gmail.com</span></h3>
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
                        <div class="card-title d-flex align-items-start justify-content-between">

                            <h6>Bank Details</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" data-bs-toggle="modal" data-bs-target="#modalCenterEditBank">
                                    <i class='bx bxs-edit'></i>
                                </button>

                            </div>
                        </div>
                        <span class="fw-bold d-block mb-1">Bank Name: <span class="fw-medium" style="margin-left: 5px;">HDFC Bank</span> </span>
                        <span class="fw-bold d-block mb-1">IFS Code: <span class="fw-medium" style="margin-left: 23px;">HDFC00087767</span> </span>
                        <span class="fw-bold d-block mb-1">Account no. <span class="fw-medium" style="margin-left: 8px;">67384652689986</span> </span>
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
                                        <input class="form-check-input float-end" type="checkbox" role="switch">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex mb-3">
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
                                        <input class="form-check-input float-end" type="checkbox" role="switch">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Change Password</h5>
            <div class="card-body">

                <form id="formAccountDeactivation" onsubmit="return false">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 form-password-toggle mt-2 mb-3">
                            <label class="form-label" for="basic-default-password32">Current Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 form-password-toggle mt-2 mb-3">
                            <label class="form-label" for="basic-default-password32">New Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading mb-1">OTP verification is required to change your current password.</h6>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Change Password</button>
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
</script>