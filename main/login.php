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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Global Wizard </title>
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
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="main/dist/js/init-alpine.js"></script> -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="main/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="main/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="main/dist/css/adminlte.min.css"> -->
    <link rel="stylesheet" href="main/dist/css/bvalidator.css">
    <link rel="stylesheet" href="main/dist/css/select2.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    <link rel="shortcut icon" href="main/images/logo/fevicon.png">

    <style>
        /* --------------------alertify---------------- */
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
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
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form method="post" onsubmit="event.preventDefault();sendForm('', '', 'checklogin', 'resultid', 'loginform');return 0;" id="loginform">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input data-bvalidator='required' type="email" name="email" class="form-control" style="    padding: 0.578rem 0.75rem;" placeholder="your@email.com" autocomplete="off" fdprocessedid="obmv5h">
                        </div>
                        <div class="mb-2" style="position: relative;">
                            <label class="form-label">
                                Password
                                <span class="form-label-description">
                                    <a href="#">forgot password?</a>
                                </span>
                            </label>
                            <!-- <div class="input-group input-group-flat"> -->
                            <input data-bvalidator='required' type="password" class="form-control" style="    padding: 0.578rem 0.75rem;" placeholder="Your password" name="password" autocomplete="off" fdprocessedid="cllljp" id="pass">
                            <i id="eye" class="fa fa-eye" style="position: absolute; top:38px; right:10px" aria-hidden="true"></i>
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input name="rememberme" type="checkbox" class="form-check-input">
                                <span class="form-check-label">Remember me on this device</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary py-2 w-100" fdprocessedid="fwmdo">Sign in</button>
                            <div id="resultid"></div>
                        </div>
                    </form>
                </div>
                <div class="hr-text">or</div>
                <div class="text-center mt-3 mb-3" style="font-size: 15px;">
                    Don't have account yet? <span style="font-weight: 600;"><a href="register" tabindex="-1">Sign up</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="main/dist/userjs/global-wizard.min.js.download" defer=""></script>
    <script src="main/dist/userjs/demo.min.js.download" defer=""></script>
    <script src="main/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="main/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="main/dist/js/adminlte.min.js"></script>
    <script src="main/dist/js/customfunction.js"></script>
    <script src="main/dist/js/jquery.bvalidator-yc.js"></script>
    <script src="main/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
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