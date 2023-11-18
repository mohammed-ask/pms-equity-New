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
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="main/dist/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="main/dist/js/init-alpine.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="main/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="main/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="main/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="main/dist/css/bvalidator.css">
  <link rel="stylesheet" href="main/dist/css/select2.min.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

  <link rel="shortcut icon" href="main/images/logo/favicon.svg">

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
            <div style="padding-left: 55px;">
        <img width="70%" src="main\dist\userstuff\assets\img\logo\eagle-eye.svg" alt="">
    </div>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Forgot Password ?</h4>
            <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>

            <form method="post" onsubmit="event.preventDefault();sendForm('', '', 'checkforgetpassword', 'resultid', 'loginform','Login');return 0;" id="loginform">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" data-bvalidator='required' name='email' class="form-control" id="email" name="email-username" placeholder="Enter your email" autofocus />
              </div>
              <div id="resultid"></div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Send Reset Link</button>
              </div>
            </form>

            <div class="text-center">
              <a href="login" class="d-flex align-items-center justify-content-center">
                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                Back to login
              </a>
            </div>
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