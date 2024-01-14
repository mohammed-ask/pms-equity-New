<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create account - PMS Equity</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="main\dist\userstuff\assets\img\logo\eagle-eye-icon.svg" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="main/dist/userstuff/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="main/dist/userstuff/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="main/dist/userstuff/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="main/dist/userstuff/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="main/dist/userstuff/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="main/dist/userstuff/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="main/dist/userstuff/assets/vendor/js/helpers.js"></script>

    <script src="main/dist/userstuff/assets/js/config.js"></script>

    <!-- file upload -->

    <link rel="stylesheet" href="main/dist/userstuff/assets/vendor/css/file-upload.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <!-- ------------------------Additional only for signup------------------------- -->

    <link rel="stylesheet" href="main/dist/userstuff/assets\signup/page-auth.css">
    <link rel="stylesheet" href="main/dist/userstuff/assets\signup/typeahead.css">
    <link rel="stylesheet" href="main/dist/userstuff/assets\signup/bs-stepper.css">






    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="main/dist/css/tailwind.output.css" /> -->
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
    <!-- <script src="main/dist/js/init-alpine.js"></script> -->
    <link rel="stylesheet" href="main/plugins/fontawesome-free/css/all.min.css">
    <!-- <link rel="stylesheet" href="main/plugins/jquery-ui/jquery-ui.css"> -->
    <link rel="stylesheet" href="main/plugins/select2/css/select2.min.css?ver=<?php echo time(); ?>">
    <link rel="stylesheet" href="main/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="main/dist/css/bvalidator.css"> -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    <link rel="shortcut icon" href="main/images/logo/favicon.svg">

    <!-- <link rel="stylesheet" href="main/dist/css/adminlte.min.css"> -->

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');

        * {
            padding: 0;
            margin: 0;
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8) url(main/images/loader.gif) no-repeat center center;
            z-index: 10000;
        }

        .container-dabba {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #eee;
        }

        .container-dabba .card {
            height: 500px;
            width: 800px;
            background-color: #fff;
            position: relative;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
            border-radius: 20px;
        }

        .container-dabba .card .form {
            width: 100%;
            height: 100%;

            display: flex;
        }

        .container-dabba .card .left-side {
            width: 35%;
            background-color: #00AAAA;
            height: 100%;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            padding: 20px 30px;
            box-sizing: border-box;

        }

        /*left-side-start*/
        .left-heading {
            color: #fff;

        }

        .steps-content {
            margin-top: 30px;
            color: #fff;
        }

        .steps-content p {
            font-size: 12px;
            margin-top: 15px;
        }

        .progress-bar {
            list-style: none;
            /*color:#fff;*/
            margin-top: -15px;
            font-size: 13px;
            font-weight: 700;
            counter-reset: container-dabba 0;
            background-color: transparent;
            text-align: left;
        }

        .progress-bar li {
            position: relative;
            margin-left: 40px;
            margin-top: 40px;
            counter-increment: container-dabba 1;
            color: #065b5b;
        }

        .progress-bar li::before {
            content: counter(container-dabba);
            line-height: 25px;
            text-align: center;
            position: absolute;
            height: 25px;
            width: 25px;
            border: 1px solid #048e8e;
            border-radius: 50%;
            left: -40px;
            top: -5px;
            z-index: 10;
            background-color: #00AAAA;


        }


        .progress-bar li::after {
            content: '';
            position: absolute;
            height: 80px;
            width: 2px;
            background-color: #048e8e;
            z-index: 1;
            left: -27px;
            top: -60px;
        }


        .progress-bar li.active::after {
            background-color: #fff;

        }

        .progress-bar li:first-child:after {
            display: none;
        }

        /*.progress-bar li:last-child:after{*/
        /*  display:none;  */
        /*}*/
        .progress-bar li.active::before {
            color: #fff;
            border: 1px solid #fff;
        }

        .progress-bar li.active {
            color: #fff;
        }

        .d-none {
            display: none;
        }

        /*left-side-end*/
        .container-dabba .card .right-side {
            width: 65%;
            background-color: #fff;
            height: 100%;
            border-radius: 20px;
        }

        /*right-side-start*/
        .main {
            display: none;
        }

        .active {
            display: block;
        }



        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142;
            }
        }










        .warning {
            border: 1px solid red !important;
        }


        /*right-side-end*/
        @media (max-width:750px) {
            .container-dabba {
                height: scroll;


            }

            .container-dabba .card {
                max-width: 350px;
                height: auto !important;
                margin: 30px 0;
            }

            .container-dabba .card .right-side {
                width: 100%;

            }

            .input-text {
                display: block;
            }

            .input-text .input-div {
                margin-top: 20px;

            }

            .container-dabba .card .left-side {

                display: none;
            }

            .container-dabba .card {

                border-radius: 10px !important;
            }

            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }

        /* --------------------alertify---------------- */

        .alertify .ajs-header {
            display: none;

        }


        .alertify .ajs-footer {
            /* padding: 4px; */
            margin-left: 0px !important;
            margin-right: 0px !important;
            min-height: 35px !important;
            background-color: #00aaaa2e !important;
            padding: 0px !important;
        }

        .alertify .ajs-dialog {

            padding: 15px 0px 0 0px !important;
            max-width: 400px !important;
            border-radius: 5px !important;
        }

        .alertify .ajs-footer .ajs-buttons.ajs-primary .ajs-button {
            margin: 0px !important;
        }

        .alertify .ajs-commands {
            margin: -12px 10px 0 0 !important;
        }

        .alertify .ajs-footer .ajs-buttons .ajs-button.ajs-ok {
            color: #fff !important;
            border: 1px dotted #fff;
            border-radius: 5px;
            /* margin-right: 10px !important; */
            margin: 5px 6px 5px 10px !important;
            background-color: #00aaaa;
        }

        .alertify .ajs-dimmer {

            transition-timing-function: ease-in;
            transition-duration: 500ms !important;
        }

        .alertify .ajs-modal {

            transition-timing-function: ease-out;
            transition-duration: 500ms !important;
        }



        .form-control[type=file]:not(:disabled):not([readonly]) {
            cursor: pointer;
        }




        /* file upload css */


        .file-input {
            display: inline-block;
            text-align: left;
            padding: 0;
            width: 100%;
            position: relative;
            border-radius: 3px;
            font-size: 12px;
        }

        .file-input>[type='file'] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            z-index: 10;
            cursor: pointer;
        }

        .file-input>.button {
            display: inline-block;
            cursor: pointer;
            background: #00aaaa;
            padding: 6px 11px;
            border-radius: 2px;
            margin-right: 0px;
            color: white;
        }

        .file-input>p {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 11px;
        }


        .file-input:hover>.button {
            background: #057c7c;
            color: white;
        }

        .file-input>.label {
            color: #333;
            white-space: nowrap;
            opacity: 1;
            border: 1px solid #00aaaa;
            padding: 5px 20px 7px 15px;
            border-radius: 3px;
        }

        .file-input.-chosen>.label {
            opacity: 1;
            border: 1px solid #00aaaa;
            padding: 5px 3px 7px 15px;
            border-radius: 3px;
        }

        @media (max-width:750px) {
            .file-input {
                margin-top: 15px;
            }

            .file-input>.label {

                padding-right: 50px;
            }

            .file-input.-chosen>.label {

                padding-right: 40px;

            }

            .m-input-text {

                margin: 0;
            }

            .m2-input-text {

                margin-bottom: 20px;
            }

        }



        /*  ----------------------------------Browser alert start------------------------------------------ */

        .browser-d-none {
            display: none !important;
        }


        .browser-model-content {
            border-radius: 0.7em;
            border: none;

            text-align: center;
        }

        .modal-dialog-broswer {
            max-width: 325px;
            margin: 0rem auto;
            top: 40%;
        }

        .modal-footer-browser {
            border-top: none !important;
            padding: 0px 7px 15px 3px;
            justify-content: center;
            gap: 15px;
        }

        .browser-btn-primary {
            color: #231515;
            background-color: #ffffff;
            border-color: #070809;

        }

        .browser-btn-secondary {

            background-color: #6c757d00;
            border-color: #6c757d;
            padding: 0.3rem 1.3rem;
            font-size: 14px;
            font-weight: 500;
            color: #696cff;
            border: none;

        }

        .browser-btn {

            padding: 0.3rem 1.3rem;
            font-size: 14px;
            font-weight: 500;
            background-color: #696cff;
            color: white;
            border: none;

        }


        /*  ----------------------------------Browser alert End------------------------------------------ */
    </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P9108ZJ253"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-P9108ZJ253');
    </script>

</head>

<body>
    <form id="fdata">

        <div class="authentication-wrapper authentication-cover">
            <div class="authentication-inner row m-0">

                <!-- Left Text -->
                <div class="d-none d-lg-flex col-lg-4 align-items-center justify-content-end p-5 pe-0">
                    <div class="w-px-400">
                        <img src="main/dist/userstuff/assets\signup/create-account-light.png" class="img-fluid" alt="multi-steps" width="600" data-app-dark-img="illustrations/create-account-dark.png" data-app-light-img="illustrations/create-account-light.png">
                    </div>
                </div>
                <div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-sm-5 p-3" style="
    background: white;
">
                    <div class="w-px-700">
                        <div id="multiStepsValidation" class="bs-stepper shadow-none linear">
                            <div class="bs-stepper-header border-bottom-0">
                                <span class="step-number d-none">1</span>
                                <div class="step active" data-target="#accountDetailsValidation">
                                    <button type="button" class="step-trigger" aria-selected="true">
                                        <span class="bs-stepper-circle"><i class="bx bx-home-alt"></i></span>
                                        <span class="bs-stepper-label mt-1">
                                            <span class="bs-stepper-title">Personal</span>
                                            <span class="bs-stepper-subtitle">Personal Details</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i class="bx bx-chevron-right"></i>
                                </div>

                                <div class="step" data-target="#personalInfoValidation">
                                    <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                        <span class="bs-stepper-circle"><i class="bx bx-user"></i></span>
                                        <span class="bs-stepper-label mt-1">
                                            <span class="bs-stepper-title">Account</span>
                                            <span class="bs-stepper-subtitle">Enter Information</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i class="bx bx-chevron-right"></i>
                                </div>
                                <div class="step" data-target="#billingLinksValidation">
                                    <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                        <span class="bs-stepper-circle"><i class="bx bx-detail"></i></span>
                                        <span class="bs-stepper-label mt-1">
                                            <span class="bs-stepper-title">Documents</span>
                                            <span class="bs-stepper-subtitle">Upload Documents</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <div class="main active">
                                    <div class="content-header mb-3">
                                        <h3 class="mb-1">Personal Information</h3>
                                        <span>Enter Your Personal Details</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-4 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsFirstName">First Name</label>
                                            <input type="text" name="firstname" require id="firstname" class="form-control" placeholder="Rakesh">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label" for="multiStepsLastName">Last Name</label>
                                            <input type="text" name="lastname" require id="lastname" class="form-control" placeholder="Sharma">
                                        </div>

                                        <div class="col-sm-4">
                                            <label class="form-label" for="select">Gender</label>
                                            <select class="form-select" name="gender" required id="gender" aria-label="Default select example">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsMobile">Mobile</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">IN (+91)</span>
                                                <input type="text" id="mobileno" name="mobileno" class="form-control multi-steps-mobile" placeholder="9095550111">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsEmail">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="rakesh.sharma@email.com" aria-label="@email.com">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 form-password-toggle fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsPass">Password</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="············" aria-describedby="multiStepsPass2">
                                                <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i class="bx bx-hide"></i></span>
                                            </div>
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6 form-password-toggle fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsConfirmPass">Set MPIN</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <input type="password" id="mpin" name="mpin" class="form-control" placeholder="············" aria-describedby="multiStepsConfirmPass2">
                                                <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"><i class="bx bx-hide"></i></span>
                                            </div>
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>





                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-label-secondary btn-prev" disabled=""> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="next_button btn btn-primary"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                                        </div>
                                    </div>
                                </div>







                                <div class="main">
                                    <div class="content-header mb-3">
                                        <h3 class="mb-1">Account Information</h3>
                                        <span>Enter Your Account Information</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-4 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsNumber">Aadhar No.</label>
                                            <input type="number" id="adharno" name="adharno" class="form-control" placeholder="8989 2267 2345">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label" for="multiSteps">Pan No.</label>
                                            <input type="text" id="panno" require name="panno" class="form-control" placeholder="YJKUK9877UN">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label" for="multiStepsExDate">DOB</label>
                                            <div class="input-group input-group-merge">
                                                <input type="date" name="dob" require id="dob" class="form-control multi-steps-exp-date">
                                            </div>
                                        </div>


                                        <div class="col-sm-4 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsNumber">Bank Name</label>
                                            <input type="text" id="bankname" require name="bankname" class="form-control" placeholder="">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label" for="multiSteps">Account No</label>
                                            <input type="text" id="accountno" require name="accountno" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label" for="multiStepsIfsc">IFSC</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" name="ifsc" require id="ifsc" class="form-control multi-steps">
                                            </div>
                                        </div>




                                        <div class="col-md-12 fv-plugins-icon-container">
                                            <label class="form-label" for="multiStepsAddress">Full Address</label>
                                            <input type="text" id="address" require name="address" class="form-control" placeholder="Address">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>




                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-primary back_button"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="next_button btn btn-primary"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                                        </div>
                                    </div>
                                </div>


                                <div class="main">
                                    <div class="content-header mb-3">
                                        <h3 class="mb-1">Upload Documents</h3>
                                        <span>Upload Required Documents</span>
                                    </div>
                                    <div class="row g-3">


                                        <div class="col-sm-4 fv-plugins-icon-container">
                                            <label class="form-label" for="formFile">Aadhar Front</label>
                                            <input hidden value="Aadhar Card Front" name="name[]">
                                            <input class="form-control" type="file" name="path[]" id="formFile">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>

                                        <div class="col-sm-4 fv-plugins-icon-container">
                                            <label class="form-label" for="formFile">Aadhar Front</label>
                                            <input hidden value="Aadhar Card Back" name="name[]">
                                            <input class="form-control" type="file" name="path[]" id="formFile">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>




                                        <div class="col-sm-4 fv-plugins-icon-container">
                                            <label class="form-label" for="formFile">Pan</label>
                                            <input hidden value="PAN card" name="name[]">
                                            <input class="form-control" type="file" name="path[]" id="formFile">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>

                                        <div class="col-sm-4 fv-plugins-icon-container">
                                            <label class="form-label" for="formFile">Passbook/Cancel Cheque</label>
                                            <input hidden value="Passbook" name="name[]">
                                            <input class="form-control" type="file" name="path[]" id="formFile">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>

                                        <div class="col-sm-4 fv-plugins-icon-container">
                                            <label class="form-label" for="formFile">Passport Size Photo</label>
                                            <input hidden value="Passport Size Photo" name="name[]">
                                            <input class="form-control" type="file" name="path[]" id="formFile">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>

                                        <div class="col-sm-4 fv-plugins-icon-container">
                                            <label class="form-label" for="formFile">Signature</label>
                                            <input hidden value="Signature" name="name[]">
                                            <input class="form-control" type="file" name="path[]" id="formFile">
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepss">Advisor ID</label>
                                            <input type="text" id="employeeref" name="employeeref" class="form-control" placeholder="(Optional)">
                                        </div>








                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-primary back_button"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button id="otp_button" class="next_button btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>


                                <div class="main">
                                    <div class="content-header mb-3">
                                        <h3 class="mb-1">Two Step Verification 💬</h3>
                                        <span>We sent a verification code to your given mail ID. Enter the code in the field below.</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
                                            <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1" autofocus="">
                                            <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                            <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                            <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                            <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                            <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                        </div>
                                        <div class="col-12 justify-content-between">
                                            <button id="subotp" class="submit_button btn btn-primary d-grid w-100 mb-3">
                                                Verify my account
                                            </button>
                                            <div class="text-center">Didn't get the code?
                                                <a href="javascript:void(0);">
                                                    Resend
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modal fade" id="modalCenterSubmit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Verification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <div class="card-body">

                            <h4 class="mb-2">Two Step Verification 💬</h4>
                            <p class="text-start mb-4">
                                We sent a verification code to your given mail ID. Enter the code in the field below.
                                <span class="fw-medium d-block mt-2">******@email.com</span>
                            </p>
                            <p class="mb-0 fw-medium">Type your 6 digit security code</p>

                            <div class="mb-3 fv-plugins-icon-container">
                                <div class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
                                    <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1" autofocus="">
                                    <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                    <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                    <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                    <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                    <input type="tel" name="otp[]" id="otp" required class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                </div>
                                <input type="hidden" name="otp" value="">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                            </div>
                            <button id="subotp" class="submit_button btn btn-primary d-grid w-100 mb-3">
                                Verify my account
                            </button>
                            <div class="text-center">Didn't get the code?
                                <a href="javascript:void(0);">
                                    Resend
                                </a>
                            </div>
                            <input type="hidden">
                        </div>



                    </div>

                </div>
            </div>
        </div> -->
    </form>

    <!-- <script>
        // Check selected custom option
        window.Helpers.initCustomOptionCheck();
    </script> -->
    <script src="main/dist/userstuff/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="main/dist/userstuff/assets/vendor/libs/popper/popper.js"></script>
    <script src="main/dist/userstuff/assets/vendor/js/bootstrap.js"></script>
    <script src="main/dist/userstuff/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="main/dist/userstuff/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="main/dist/userstuff/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <!-- <script src="main/dist/userstuff/assets/js/main.js"></script> -->

    <!-- Page JS -->
    <script src="main/dist/userstuff/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <!-- file upload -->

    <script src="main/dist/userstuff/assets/vendor/js/file-upload.js"> </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <!-- Additional  only for two-step-->

    <script src="main/dist/userstuff/assets/signup/two-step.js"> </script>



    <!-- Vendors JS -->
    <script src="main/dist/userstuff/assets\signup/cleave.js.download"></script>
    <script src="main/dist/userstuff/assets\signup/cleave-phone.js.download"></script>
    <script src="main/dist/userstuff/assets\signup/bs-stepper.js.download"></script>
    <script src="main/dist/userstuff/assets\signup/select2.js.download"></script>
    <script src="main/dist/userstuff/assets\signup/popular.min.js.download"></script>
    <script src="main/dist/userstuff/assets\signup/index.min.js.download"></script>
    <script src="main/dist/userstuff/assets\signup/index.min.js(1).download"></script>
    <script src="main/dist/userstuff/assets\signup/pages-auth-multisteps.js.download"></script>

    <script src="main/plugins/jquery/jquery.min.js"></script>
    <!-- <script src="main/plugins/jquery-ui/jquery-ui.min.js"></script> -->

    <!-- Bootstrap 4 -->
    <script src="main/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="main/dist/js/adminlte.min.js"></script>
    <script src="main/dist/js/customfunction.js?ver=<?php echo time(); ?>"></script>
    <script src="main/dist/js/jquery.bvalidator-yc.js"></script>
    <script src="main/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var inputs = document.querySelectorAll('[data-code-input]');
            // Attach an event listener to each input element
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('input', function(e) {
                    // If the input field has a character, and there is a next input field, focus it
                    if (e.target.value.length === e.target.maxLength && i + 1 < inputs.length) {
                        inputs[i + 1].focus();
                    }
                });
                inputs[i].addEventListener('keydown', function(e) {
                    // If the input field is empty and the keyCode for Backspace (8) is detected, and there is a previous input field, focus it
                    if (e.target.value.length === 0 && e.keyCode === 8 && i > 0) {
                        inputs[i - 1].focus();
                    }
                });
            }
        });

        function startTimer() {
            var timerElement = $("#timer");
            var totalTime = 75; // Total time in seconds
            var minutes, seconds;

            var timer = setInterval(function() {
                minutes = Math.floor(totalTime / 60); // Calculate minutes
                seconds = totalTime % 60; // Calculate seconds

                // Format the time as 2-digit numbers
                var formattedTime = ("0" + minutes).slice(-2) + ":" + ("0" + seconds).slice(-2);

                // Update the timer element
                timerElement.text(formattedTime);

                // Check if the timer has reached 0
                if (totalTime <= 0) {
                    clearInterval(timer); // Stop the timer
                    // Perform any desired actions when the timer finishes
                    $("#subotp").removeAttr("disabled");
                    timerElement.html("<strong style='color:green'>OTP Sent Successfully!</strong>");
                } else {
                    totalTime--; // Decrease the total time by 1 second
                }
            }, 1000); // Run the timer every second (1000 milliseconds)
        }
        var next_click = document.querySelectorAll(".next_button");
        var main_form = document.querySelectorAll(".main");
        var step_list = document.querySelectorAll(".progress-bar li");
        var num = document.querySelector(".step-number");
        let formnumber = 0;

        next_click.forEach(function(next_click_form) {
            next_click_form.addEventListener('click', function(event) {
                event.preventDefault()
                if (!validateform()) {
                    return false
                }
                formnumber++;
                updateform();
                progress_forward();
                contentchange();
            });
        });

        $('.back_button').click((e) => {
            event.preventDefault()
            formnumber--;
            updateform();
            progress_backward();
            contentchange();
        })
        // var back_click = document.querySelectorAll(".back_button");
        // back_click.forEach(function(back_click_form) {
        //     back_click_form.preventDefault()
        //     back_click_form.addEventListener('click', function() {
        //         formnumber--;
        //         alert('hii')
        //         // updateform();
        //         // progress_backward();
        //         // contentchange();
        //     });
        // });

        var username = document.querySelector("#username");

        var otpclick = document.querySelectorAll("#otp_button");
        otpclick.forEach(function(otpclick_form) {

            otpclick_form.addEventListener('click', function() {
                if (!validateform()) {
                    alertify.alert('All Images are required')
                    return false
                }
                var email = $("#email").val()
                var username = $("#username").val()
                if ($("#password").val() === '' || $("#mpin").val().length !== 6) {
                    return false
                }
                formnumber++;
                addoverlay()
                $.post("main/otpforregister.php", {
                        email: email,
                        username: username
                    },

                    function(data) {
                        if (data === "Success") {
                            removeoverlay()
                            startTimer()
                        }
                    },
                );

            });
        });

        var submit_click = document.querySelectorAll(".submit_button");
        submit_click.forEach(function(submit_click_form) {

            submit_click_form.addEventListener('click', function(event) {
                event.preventDefault();
                // console.log(validateform(), 'validateform')
                if (!validateform()) {
                    return false
                }
                formnumber++;
                addoverlay()

                var form = $("#fdata")[0]; // Replace 'yourForm' with your actual form ID
                var formData = new FormData(form);
                $.post({
                    url: "main/insertuser.php",
                    data: formData,
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response === 'Success') {
                            removeoverlay()
                            alertify.alert('result', 'Thank you for registering your account! Our team will review your request and notify you through email once your account has been approved.', function() {
                                window.location.href = 'login'
                            })
                        } else if (response === 'Failed') {
                            removeoverlay()
                            alertify.alert('result', 'Sorry! OTP did not match', function() {
                                // window.location.href = 'login'
                            })
                        } else if (response === 'Already Exists') {
                            removeoverlay()
                            alertify.alert('result', 'Sorry! Mail id already exists', function() {
                                // window.location.href = 'login'
                            })
                        } else {
                            removeoverlay()
                            alertify.alert('result', 'Sorry! Something went wrong Please try again later.', function() {
                                // window.location.href = 'login'
                            })
                        }
                    },
                });
                // updateform();
            });
        });

        var heart = document.querySelector(".fa-heart");
        heart.addEventListener('click', function() {
            heart.classList.toggle('heart');
        });


        var share = document.querySelector(".fa-share-alt");
        share.addEventListener('click', function() {
            share.classList.toggle('share');
        });



        function updateform() {
            main_form.forEach(function(mainform_number) {
                mainform_number.classList.remove('active');
            })
            main_form[formnumber].classList.add('active');
        }

        function progress_forward() {
            // step_list.forEach(list => {

            //     list.classList.remove('active');

            // }); 


            num.innerHTML = formnumber + 1;
            step_list[formnumber].classList.add('active');
        }

        function progress_backward() {
            var form_num = formnumber + 1;
            step_list[form_num].classList.remove('active');
            num.innerHTML = form_num;
        }

        var step_num_content = document.querySelectorAll(".step-number-content");

        function contentchange() {
            step_num_content.forEach(function(content) {
                content.classList.remove('active');
                content.classList.add('d-none');
            });
            step_num_content[formnumber].classList.add('active');
        }


        function validateform() {
            validate = true;
            var validate_inputs = document.querySelectorAll(".main.active input");
            validate_inputs.forEach(function(vaildate_input, index) {
                vaildate_input.classList.remove('warning');
                var currentDate = new Date();
                if (vaildate_input.hasAttribute('require')) {
                    if (vaildate_input.value.length == 0) {
                        validate = false;
                        vaildate_input.classList.add('warning');
                    }
                }
                if (vaildate_input.id === 'email' && !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(vaildate_input.value)) {
                    validate = false
                    vaildate_input.classList.add('warning');
                }
                let password = $("#password").val()
                if (vaildate_input.id === 'password' && vaildate_input.value === '') {
                    validate = false
                    vaildate_input.classList.add('warning');
                }
                if (vaildate_input.id === 'mobileno' && vaildate_input.value.length != 10) {
                    validate = false
                    alertify.alert('Mobile number must be 10 digits')
                    vaildate_input.classList.add('warning');
                }
                if (vaildate_input.id === 'adharno' && vaildate_input.value.length != 12) {
                    validate = false
                    alertify.alert('Aadhar number must be 12 digits')
                    vaildate_input.classList.add('warning');
                }
                if (vaildate_input.id === 'dob') {
                    var inputDate = new Date(vaildate_input.value);
                    inputDate.setFullYear(inputDate.getFullYear() + 18);
                    if (currentDate < inputDate) {
                        validate = false
                        alertify.alert('Age must be 18 years or above')
                        vaildate_input.classList.add('warning');
                    }
                }
                if (vaildate_input.id === 'mpin' && vaildate_input.value.length != 6) {
                    console.log(vaildate_input.id, vaildate_input.value.length, 'mpin')
                    validate = false
                    alertify.alert('MPIN must be of 6 digits')
                    vaildate_input.classList.add('warning');
                }
                if (vaildate_input.files) {
                    var file = vaildate_input.files[0];
                    if (file.size > 1024 * 1024) {
                        alertify.alert('Please select an image file smaller than 1 MB.');
                        validate = false
                    }
                    // console.log('vvp', JSON.stringify(file.size))
                }
            });
            return validate;

        }
    </script>

    <script>
        // Also see: https://www.quirksmode.org/dom/inputfile.html

        var inputs = document.querySelectorAll('.file-input')

        for (var i = 0, len = inputs.length; i < len; i++) {
            customInput(inputs[i])
        }

        function customInput(el) {
            const fileInput = el.querySelector('[type="file"]')
            const label = el.querySelector('[data-js-label]')

            fileInput.onchange =
                fileInput.onmouseout = function() {
                    if (!fileInput.value) return

                    var value = fileInput.value.replace(/^.*[\\\/]/, '')
                    el.className += ' -chosen'
                    label.innerText = value.length > 15 ? value.slice(0, 15) + '...' : value;
                }
        }
    </script>
    <div class="modal fade" id="customConfirmModal" tabindex="-1" role="dialog" aria-labelledby="customConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-broswer" role="document">
            <div class="modal-content browser-model-content">
                <div class="modal-body">
                    Are you sure you want to proceed?
                </div>
                <div class="modal-footer modal-footer-browser">
                    <button type="button" class="btn btn-secondary browser-btn browser-btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary browser-btn browser-btn-primary" onclick="handleCustomConfirm(true)">Proceed</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>