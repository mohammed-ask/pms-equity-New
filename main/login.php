<?php
session_start();
if (isset($_SESSION['userid']) && $_SESSION['type'] == 2) {
    $employeeid = $_SESSION['userid'];
    header("location:dashboard");
}
include './main/function.php';
include './main/conn.php';
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />

    <link rel="icon" type="image/x-icon" href="main/dist/userstuff/assets/img/favicon/favicon.ico" />

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

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="main/dist/userstuff/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="main/dist/userstuff/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="main/dist/userstuff/assets/js/config.js"></script>



    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - PMS Equity</title>

    

    <!-- Google Font: Source Sans Pro -->

  
   

    <!-- <link rel="stylesheet" href="main/dist/css/select2.min.css"> -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" /> -->

    <link rel="shortcut icon" href="main/images/logo/favicon.svg">



    <style>
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
            top: 25%;
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

        @media (max-width: 600px) {
            .d-app-none {
                display: none;
            }

        }

        /*  ----------------------------------Browser alert start------------------------------------------ */

        .browser-d-none {
            display: none !important;
        }


        .browser-model-content {
            border-radius: 0rem 0rem 0.3rem 0.3rem;
            border: none;

            text-align: center;
        }

        .modal-dialog-broswer {
            max-width: 350px;
            margin: 0rem auto;
        }

        .modal-footer-browser {
            border-top: none !important;
            padding: 0px 7px 6px 3px;
            justify-content: center;
        }

        .browser-btn-primary {
            color: #231515;
            background-color: #ffffff;
            border-color: #070809;

        }

        .browser-btn-secondary {
            color: #0b0707;
            background-color: #6c757d00;
            border-color: #6c757d;

        }

        .browser-btn {

            padding: 0.3rem 1.3rem;
            font-size: 14px;
            font-weight: 500;
            background-color: #048f83;
            color: white;
            border: none;

        }


        /*  ----------------------------------Browser alert End------------------------------------------ */
    </style>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z" id="path-1"></path>
                                            <path d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z" id="path-3"></path>
                                            <path d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z" id="path-4"></path>
                                            <path d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z" id="path-5"></path>
                                        </defs>
                                        <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                                <g id="Icon" transform="translate(27.000000, 15.000000)">
                                                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                        <mask id="mask-2" fill="white">
                                                            <use xlink:href="#path-1"></use>
                                                        </mask>
                                                        <use fill="#696cff" xlink:href="#path-1"></use>
                                                        <g id="Path-3" mask="url(#mask-2)">
                                                            <use fill="#696cff" xlink:href="#path-3"></use>
                                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                                        </g>
                                                        <g id="Path-4" mask="url(#mask-2)">
                                                            <use fill="#696cff" xlink:href="#path-4"></use>
                                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                                        </g>
                                                    </g>
                                                    <g id="Triangle" transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                        <use fill="#696cff" xlink:href="#path-5"></use>
                                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                                <span class="app-brand-text demo text-body fw-bold">Sneat</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome to Sneat! 👋</h4>
                        <p class="mb-4">Please sign-in to your account and start the adventure</p>

                        <form method="post" onsubmit="event.preventDefault();sendForm('', '', 'checklogin', 'resultid', 'loginform','Login');return 0;" id="loginform">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" data-bvalidator='required' name='email' class="form-control" id="email" name="email-username" placeholder="Enter your email" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle" style="position:relative">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="auth-forgot-password-basic.html">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div>
                                <input type="password" data-bvalidator='required' id="pass" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <i id="eye" class="fa fa-eye" style="position: absolute; top:38px; right:10px" aria-hidden="true"></i>
                                <!-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> -->
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                            <div id="resultid"></div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="auth-register-basic.html">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="main/dist/userstuff/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="main/dist/userstuff/assets/vendor/libs/popper/popper.js"></script>
    <script src="main/dist/userstuff/assets/vendor/js/bootstrap.js"></script>
    <script src="main/dist/userstuff/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="main/dist/userstuff/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="main/dist/userstuff/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="main/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="main/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="main/dist/js/adminlte.min.js"></script>
    <script src="main/dist/js/customfunction.js"></script>
    <script src="main/dist/js/jquery.bvalidator-yc.js"></script>
    <script src="main/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

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
<script>
    $(function() {

        $("#eye").click(() => {
            iconname = $("#eye").attr("class");
            if (iconname === 'fa fa-eye') {
                $('#pass').attr('type', 'text')
                $("#eye").attr('class', 'fa fa-eye-slash')

            } else {
                $('#pass').attr('type', 'password')
                $("#eye").attr('class', 'fa fa-eye')
            }
        })
    });
</script>