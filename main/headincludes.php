 <title><?php
        if (isset($pagetitle) && (!empty($pagetitle))) {
          echo $pagetitle;
        } else {
          echo $defaultpagetitle;
        }
        ?></title>
 <!-- Shubham Template -->
 <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

 <title>PMS Equity- The Real Earning Start Here</title>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
 <meta content="" name="author">
 <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->




 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

 <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

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
 <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
 <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
 <script src="main/dist/userstuff/assets/js/config.js"></script>

 <!-- file upload -->

 <link rel="stylesheet" href="main/dist/userstuff/assets/vendor/css/file-upload.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">





 <!-- App favicon -->
 <link rel="shortcut icon" href="main\dist\userstuff\assets\img\logo\eagle-eye-icon.svg">
 <link rel="stylesheet" href="main/dist/userstuff/assets\vendor\css\app-email.css">


 <!-- <link href="main/dist/usercss/selectr.min.css" rel="stylesheet" type="text/css"> -->

 <!-- App css -->
 <!-- <link href="main/dist/usercss/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
 <!-- <link href="main/dist/usercss/icons.min.css" rel="stylesheet" type="text/css"> -->
 <!-- <link href="main/dist/usercss/app.min.css" rel="stylesheet" type="text/css"> -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- <link href="main/dist/usercss/style.css" rel="stylesheet" type="text/css"> -->

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="main/plugins/fontawesome-free/css/all.min.css">
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <!-- iCheck -->
 <link rel="stylesheet" href="main/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 <!-- overlayScrollbars -->
 <link rel="stylesheet" href="main/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="main/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="main/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 <link rel="stylesheet" href="main/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
 <link rel="stylesheet" href="main/plugins/jquery-ui/jquery-ui.css">
 <!-- Select2 -->
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
 <!-- Default theme -->
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
 <link rel="stylesheet" href="main/plugins/select2/css/select2.min.css?ver=<?php echo time(); ?>">
 <link rel="stylesheet" href="main/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
 <link rel="stylesheet" href="main/dist/css/bvalidator.css">
 <link rel="stylesheet" href="main/dist/css/jquery-ui-timepicker-addon.css">
 <!-- summernote -->

 <!-- summernote -->
 <link rel="stylesheet" href="main/plugins/summernote/summernote-bs4.min.css">

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

 <!-- <style>
   .modal {
     --bs-modal-margin: 0 !important
   }
 </style> -->
 <?php
  if (isset($extracss)) {
    echo $extracss;
  } ?>