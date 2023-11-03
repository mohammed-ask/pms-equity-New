<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up - Global Wizard
    </title>
    <script defer="" data-api="/stats/api/event" data-domain="preview.tabler.io" src="main/dist/userjs/script.js.download"></script>

    <link rel="icon" href="main/images/logo/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="main/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS files -->
    <link href="main/dist/usercss/global-wizard.min.css" rel="stylesheet">
    <link href="main/dist/usercss/global-wizard-flags.min.css" rel="stylesheet">
    <link href="main/dist/usercss/global-wizard-payments.min.css" rel="stylesheet">
    <link href="main/dist/usercss/global-wizard-vendors.min.css" rel="stylesheet">
    <link href="main/dist/usercss/demo.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="main/dist/css/tailwind.output.css" /> -->
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
    <!-- <script src="main/dist/js/init-alpine.js"></script> -->
    <link rel="stylesheet" href="main/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="main/plugins/jquery-ui/jquery-ui.css">

    <link rel="stylesheet" href="main/dist/css/bvalidator.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />



    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

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
            margin-top: 30px;
            font-size: 13px;
            font-weight: 700;
            counter-reset: container-dabba 0;
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

        .main {
            padding: 40px;
        }

        .main small {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2px;
            height: 30px;
            width: 30px;
            background-color: #ccc;
            border-radius: 50%;
            color: yellow;
            font-size: 19px;
        }

        .text {
            margin-top: 20px;
        }

        .congrats {
            text-align: center;
        }

        .text p {
            margin-top: 10px;
            font-size: 13px;
            font-weight: 700;
            color: #cbced4;
        }

        .input-text {
            margin: 30px 0;
            display: flex;
            gap: 20px;
        }

        .input-text .input-div {
            width: 100%;
            position: relative;

        }



        input[type="text"] {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #0054a6;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        input[type="number"] {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #0917c6;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        input[type="email"] {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #0917c6;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        input[type="date"] {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #0917c6;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        select {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #0917c6;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        .input-text .input-div span {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 13px;
            transition: all 0.5s;
        }

        .input-div input:focus~span,
        .input-div input:valid~span {
            top: -20px;
            left: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .input-div span {
            top: -15px;
            left: 6px;
            font-size: 10px;
        }

        .buttons button {
            height: 40px;
            width: 100px;
            border: none;
            border-radius: 5px;
            background-color: #0054a6;
            font-size: 12px;
            color: #fff;
            cursor: pointer;
        }

        .button_space {
            display: flex;
            gap: 20px;

        }

        .button_space button:nth-child(1) {
            background-color: #fff;
            color: #0917c6;
            border: 1px solid #0917c6;
        }

        .user_card {
            margin-top: 20px;
            margin-bottom: 40px;
            height: 200px;
            width: 100%;
            border: 1px solid #c7d3d9;
            border-radius: 10px;
            display: flex;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
        }

        .user_card span {
            height: 80px;
            width: 100%;
            background-color: #dfeeff;
        }

        .circle {
            position: absolute;
            top: 40px;
            left: 60px;
        }

        .circle span {
            height: 70px;
            width: 70px;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #fff;
            border-radius: 50%;
        }

        .circle span img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .social {
            display: flex;
            position: absolute;
            top: 100px;
            right: 10px;
        }

        .social span {
            height: 30px;
            width: 30px;
            border-radius: 7px;
            background-color: #fff;
            border: 1px solid #cbd6dc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 10px;
            color: #cbd6dc;

        }

        .social span i {
            cursor: pointer;
        }

        .heart {
            color: red !important;
        }

        .share {
            color: red !important;
        }

        .user_name {
            position: absolute;
            top: 110px;
            margin: 10px;
            padding: 0 30px;
            display: flex;
            flex-direction: column;
            width: 100%;

        }

        .user_name h3 {
            color: #4c5b68;
        }

        .detail {
            /*margin-top:10px;*/
            display: flex;
            justify-content: space-between;
            margin-right: 50px;
        }

        .detail p {
            font-size: 12px;
            font-weight: 700;

        }

        .detail p a {
            text-decoration: none;
            color: blue;
        }






        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
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
            background-color: #cde6ff !important;
            padding: 0px !important;
        }

        .alertify .ajs-dialog {

            padding: 15px 0px 0 0px !important;
            max-width: 400px !important;
            border-radius: 15px !important;
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
            background-color: #0054a6;
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

        .alertify .ajs-footer {
            border-radius: 0 0 15px 15px;
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
            background: #0917c6;
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
    </style>
</head>

<body data-new-gr-c-s-check-loaded="14.1119.0" data-gr-ext-installed="">
    <script src="main/dist/userjs/demo-theme.min.js.download"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="#" class="navbar-brand navbar-brand-autodark">
                    <img src="main\images\logo\Global.png" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                </a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Create your account</h2>
                    <form id="fdata" action="#" method="get" autocomplete="off" novalidate="">

                        <!-- ------------------------------------- first step start ------------------------------------------>

                        <div class="main active">

                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input name="username" id="username" required require type="text" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="Enter Name" autocomplete="off" fdprocessedid="obmv5h">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input id="email" name="email" required require type="email" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="your@email.com" autocomplete="off" fdprocessedid="obmv5h">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile No.</label>
                                <input id="mobileno" name="mobileno" required require type="text" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="Enter Phone No." autocomplete="off" fdprocessedid="obmv5h">
                            </div>

                            <div class="row">
                                <div class="mb-2 col-6">
                                    <label class="form-label">
                                        Password
                                    </label>
                                    <div class="input-group input-group-flat">
                                        <input style="padding: 0.578rem 0.75rem;" id="password" name="password" required require type="password" class="form-control" placeholder="Your password" autocomplete="off" fdprocessedid="cllljp">
                                        <!-- <span class="input-group-text">
                                           
                                        </span> -->
                                    </div>
                                </div>

                                <div class="mb-2 col-6">
                                    <label class="form-label">
                                        Confirm Password
                                    </label>
                                    <div class="input-group input-group-flat">
                                        <input style="padding: 0.578rem 0.75rem;" id="comfirmpass" name="confirmpass" required require type="password" class="form-control" placeholder="Re-Enter password" autocomplete="off" fdprocessedid="cllljp">
                                        <!-- <span class="input-group-text">
                                        </span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="buttons mt-3">
                                <button class="next_button w-100">Next Step</button>
                            </div>
                        </div>

                        <!-- ------------------------------------- first step compeleted ------------------------------------------>

                        <!-- ------------------------------------- Second step Started ------------------------------------------>

                        <div class="main">
                            <div class="mb-3">
                                <label class="form-label">Broker ID (if available)</label>
                                <input id="employeeref" name="employeeref" type="text" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="(optional)" autocomplete="off" fdprocessedid="obmv5h">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Full Address</label>
                                <input id="address" name="address" required require type="text" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="Enter Full Address" autocomplete="off" fdprocessedid="obmv5h">
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">Aadhar Number</label>
                                    <input id="adharno" name="adharno" required require type="number" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="Enter Aadhar No. without spaces" autocomplete="off" fdprocessedid="obmv5h">
                                </div>

                                <div class="mb-3 col-6">
                                    <label class="form-label">PAN Number</label>
                                    <input id="panno" name="panno" required require type="text" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="Enter 10 digit pan no." autocomplete="off" fdprocessedid="obmv5h">
                                </div>


                            </div>
                            <div class="row">

                                <div class="mb-3 col-6">
                                    <label class="form-label">Date of birth</label>
                                    <input name="dob" id="dob" required require type="date" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="" autocomplete="off" fdprocessedid="obmv5h">
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label">Bank Name</label>
                                    <input id="bankname" name="bankname" required require type="text" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="Eg. BOI, HDFC, SBI" autocomplete="off" fdprocessedid="obmv5h">
                                </div>
                            </div>
                            <div class="row">

                                <div class="mb-3 col-6">
                                    <label class="form-label">Account Numer</label>
                                    <input id="accountno" name="accountno" required require type="number" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="Enter bank a/c no." autocomplete="off" fdprocessedid="obmv5h">
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label">IFSC</label>
                                    <input name="ifsc" id="ifsc" required require type="text" class="form-control" style="padding: 0.578rem 0.75rem;" placeholder="Enter 10 digit pan no." autocomplete="off" fdprocessedid="obmv5h">
                                </div>
                            </div>

                            <div class="buttons button_space mt-3">
                                <button class="back_button w-100">Back</button>
                                <button class="next_button w-100">Next Step</button>
                            </div>
                        </div>

                        <!-- ------------------------------------- Second step compeleted ------------------------------------------>


                        <!-- ------------------------------------- third step Started ------------------------------------------>

                        <div class="main">
                            <h3 class="h3 text-center m-0">Upload Documents</h3>
                            <p class="m-0 text-center mb-3" style="font-size: 12px; color: #a70000;">(Png, jpg, jpeg & Pdf Supported Only, Max-Size: 1 MB)*</p>

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label class="form-label">Aadhar Card (Front)</label>
                                    <input hidden value="Aadhar Card Front" name="name[]">
                                    <input type="file" name="path[]" class="form-control" placeholder="Upload clear image" autocomplete="off" fdprocessedid="obmv5h">
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label">Aadhar Card (Back)</label>
                                    <input hidden value="Aadhar Card Back" name="name[]">
                                    <input type="file" name="path[]" class="form-control" placeholder="Upload clear image" autocomplete="off" fdprocessedid="obmv5h">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label class="form-label">PAN Card</label>
                                    <input hidden value="PAN card" name="name[]">
                                    <input type="file" name="path[]" class="form-control" placeholder="Upload clear image" autocomplete="off" fdprocessedid="obmv5h">
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label">Passbook/Cheque</label>
                                    <input hidden value="Passbook" name="name[]">
                                    <input type="file" name="path[]" class="form-control" placeholder="Upload clear image" autocomplete="off" fdprocessedid="obmv5h">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label class="form-label">Passport Size Photo</label>
                                    <input hidden value="Passport Size Photo" name="name[]">
                                    <input type="file" name="path[]" class="form-control" placeholder="Upload clear image" autocomplete="off" fdprocessedid="obmv5h">
                                </div>
                                <div class="mb-3 col-6">
                                    <label class="form-label">Signature</label>
                                    <input hidden value="Signature" name="name[]">
                                    <input type="file" name="path[]" class="form-control" placeholder="Upload clear image" autocomplete="off" fdprocessedid="obmv5h">
                                </div>
                            </div>
                            <div class="buttons button_space mt-3">
                                <button class="back_button w-100">Back</button>
                                <button class="next_button w-100" id="otp_button">Next Step</button>
                            </div>

                        </div>

                        <div class="main">
                            <div class="card-body">
                                <h2 class="card-title card-title-lg text-center mb-4">Authenticate Your Account</h2>
                                <p class="my-4 text-center">Please confirm your account by entering the authorization code sent to your Mail
                                <div class="my-5">
                                    <div class="row g-4">
                                        <div class="col">
                                            <div class="row g-2">
                                                <div class="col">
                                                    <input name="otp[]" id="otp" required require type="text" class="form-control form-control-lg text-center py-3" maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input="" fdprocessedid="i4fe2">
                                                </div>
                                                <div class="col">
                                                    <input name="otp[]" id="otp" required require type="text" class="form-control form-control-lg text-center py-3" maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input="" fdprocessedid="scnzf2">
                                                </div>
                                                <div class="col">
                                                    <input name="otp[]" id="otp" required require type="text" class="form-control form-control-lg text-center py-3" maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input="" fdprocessedid="8cs6ou">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row g-2">
                                                <div class="col">
                                                    <input name="otp[]" id="otp" required require type="text" class="form-control form-control-lg text-center py-3" maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input="" fdprocessedid="hak2vr">
                                                </div>
                                                <div class="col">
                                                    <input name="otp[]" id="otp" required require type="text" class="form-control form-control-lg text-center py-3" maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input="" fdprocessedid="8oh1">
                                                </div>
                                                <div class="col">
                                                    <input name="otp[]" id="otp" required require type="text" class="form-control form-control-lg text-center py-3" maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input="" fdprocessedid="js5utrc">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="text-align: center; font-size: 16px; font-weight: 700; color: #1d00d1;" id="timer"></div>
                                    </div>
                                </div>
                                <!-- <div class="my-4">
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input">
                                        Dont't ask for codes again on this device
                                    </label>
                                </div> -->
                                <!-- <div class="form-footer">
                                    <div class="btn-list flex-nowrap">
                                        <a href="#" class="btn w-100">
                                            Cancel
                                        </a>
                                        <a href="#" class="btn btn-primary w-100">
                                            Verify
                                        </a>
                                    </div>
                                </div> -->
                                <div class="buttons button_space">
                                    <button class="back_button w-100">Back</button>
                                    <button id="subotp" class="submit_button w-100">Verify</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="hr-text">or</div>
                <div class="text-center mt-3 mb-3" style="font-size: 15px;">
                    Already have account Account? <span style="font-weight: 600;"><a href="login" tabindex="-1">Sign In</a></span>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    <!-- ------------------------------Script for Next & Previus Button------------------------ -->

    <!-- <script>
    let currentStep = 1;
    showStep(currentStep);

    function showStep(stepNumber) {
      const steps = document.getElementsByClassName('step');
      for (let i = 0; i < steps.length; i++) {
        steps[i].classList.remove('active');
      }
      steps[stepNumber - 1].classList.add('active');
    }

    function nextStep(stepNumber) {
      if (stepNumber > currentStep) {
        currentStep = stepNumber;
        showStep(currentStep);
      }
    }

    function prevStep(stepNumber) {
      if (stepNumber < currentStep) {
        currentStep = stepNumber;
        showStep(currentStep);
      }
    }

    const form = document.getElementById('multi-step-form');
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      alert('Form submitted successfully!');
    });
  </script> -->

    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="main/dist/userjs/global-wizard.min.js.download" defer=""></script>
    <script src="main/dist/userjs/demo.min.js.download" defer=""></script>
    <script src="main/plugins/jquery/jquery.min.js"></script>
    <script src="main/plugins/jquery-ui/jquery-ui.min.js"></script>

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

        var back_click = document.querySelectorAll(".back_button");
        back_click.forEach(function(back_click_form) {
            back_click_form.addEventListener('click', function() {
                formnumber--;
                updateform();
                progress_backward();
                contentchange();
            });
        });

        var username = document.querySelector("#username");

        var otpclick = document.querySelectorAll("#otp_button");
        otpclick.forEach(function(otpclick_form) {

            otpclick_form.addEventListener('click', function() {
                var email = $("#email").val()
                var username = $("#username").val()
                if ($("#password").val() === '' || $("#password").val() !== $("#comfirmpass").val()) {
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
                    alert('Mobile number must be 10 digits')
                    vaildate_input.classList.add('warning');
                }
                if (vaildate_input.id === 'adharno' && vaildate_input.value.length != 12) {
                    validate = false
                    alert('Aadhar number must be 12 digits')
                    vaildate_input.classList.add('warning');
                }
                if (vaildate_input.id === 'dob') {
                    var inputDate = new Date(vaildate_input.value);
                    inputDate.setFullYear(inputDate.getFullYear() + 18);
                    if (currentDate < inputDate) {
                        validate = false
                        alert('Age must be 18 years or above')
                        vaildate_input.classList.add('warning');
                    }
                }
                if (vaildate_input.id === 'comfirmpass' && vaildate_input.value !== password) {
                    validate = false
                    vaildate_input.classList.add('warning');
                }
                if (vaildate_input.files) {
                    var file = vaildate_input.files[0];
                    if (file.size > 1024 * 1024) {
                        alert('Please select an image file smaller than 1 MB.');
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
</body>

</html>