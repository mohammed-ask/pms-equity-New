<?php
include './main/function.php';
include './main/conn.php';
$plan = $obj->selectextrawhere("plan", "status =1 limit 6");

?>
<!DOCTYPE html>

<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->

    <link rel="icon" href="main/images/logo/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="main/images/logo/favicon.png" type="image/x-icon">




    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <!-- <link href="./Global Wizard Investment Advisor-Intraday Trading Tips-Free Intraday Tips-Intraday Stock Tips_files/css2" rel="stylesheet"> -->

    <!-- Font Awesome -->

    <link rel="stylesheet" href="main/dist/indexcss/font-awesome.min.css">

    <!-- Bootstrap Select CSS -->

    <link rel="stylesheet" href="main/dist/indexcss/bootstrap-select.min.css">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="main/dist/indexcss/bootstrap.min.css">

    <!-- Owl Carousel CSS -->

    <link rel="stylesheet" href="main/dist/indexcss/owl.carousel.min.css">

    <link rel="stylesheet" href="main/dist/indexcss/owl.theme.default.min.css">

    <!-- Animate CSS -->

    <link rel="stylesheet" href="main/dist/indexcss/animate.min.css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="main/dist/indexcss/custom.min.css">

    <!-- Jquery -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.2/css/all.min.css" integrity="sha512-NicFTMUg/LwBeG8C7VG+gC4YiiRtQACl98QdkmfsLy37RzXdkaUAuPyVMND0olPP4Jn8M/ctesGSB2pgUBDRIw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="main/dist/indexcss/parsley.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" async="" src="main/dist/indexjs/recaptcha__en.js.download" crossorigin="anonymous" integrity="sha384-bPGPp3F76oplmIWtwkyKzLqEL/SHRM2WY01hYjmEh4dQ/PAlqx+Z/KgDxg33uhOa"></script>
    <script src="main/dist/indexjs/api.js.download"></script>
    <script src="main/dist/indexjs/jquery-3.6.0.min.js.download"></script>

    <title>Global Wizard</title>


<style>

.checked {
  color: orange;
}

</style>
</head>
<div class="topPd" data-new-gr-c-s-check-loaded="14.1119.0" data-gr-ext-installed="">

    <header class="mainHeader">

        <div class="mainHeader_top">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-sm-7">

                        <ul class="list-none contact-icons d-flex justify-content-center justify-content-sm-start">

                            <li>

                                <a href="mailto:<?= $companyemailid ?>">

                                    <em class="fa fa-envelope mr-1"></em>

                                    <?= $companyemailid ?>
                                </a>

                            </li>

                            <li>

                                <a href="tel:+91-<?= $companyphone ?>">

                                    <em class="fa fa-phone mr-1"></em>

                                    +91-<?= $companyphone ?>
                                </a>

                            </li>

                        </ul>

                    </div>

                    <div class="col-sm-5">

                        <div class="d-flex align-items-center justify-content-center justify-content-sm-end">


                            <button type="button" style="margin-right: 10px;" onclick="window.location.href='login'" class="btn btn-primary" fdprocessedid="4unrra">Login</button>

                            <button type="button" onclick="window.location.href='register'" class="btn btn-primary" fdprocessedid="4unrra">Sign Up</button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="mainHeader_down">

            <div class="container">

                <nav class="navbar p-0 navbar-expand-xl navbar-light">

                    <a class="navbar-brand p-0 mr-0" href="index.html"><img src="main\images\logo\Global.png" alt="logo"></a>

                    <button class="navbar-toggler menu-icon" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="menu-icon_line menu-icon_line-left"></span>

                        <span class="menu-icon_line"></span>

                        <span class="menu-icon_line menu-icon_line-right"></span>

                    </button>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item <?= $_SERVER['REQUEST_URI'] === '/index' || $_SERVER['REQUEST_URI'] === '' ? 'active' : '' ?>">

                                <a class="nav-link" href="index">Home</a>

                            </li>

                            <li class="nav-item <?= $_SERVER['REQUEST_URI'] === '/aboutus' ? 'active' : '' ?>">

                                <a class="nav-link" href="aboutus">About</a>

                            </li>



                            <li class="nav-item <?= $_SERVER['REQUEST_URI'] === '/pricing' ? 'active' : '' ?>">

                                <a class="nav-link" href="pricing">Pricing</a>

                            </li>

                            <li class="nav-item <?= $_SERVER['REQUEST_URI'] === '/contact' ? 'active' : '' ?>">

                                <a class="nav-link" href="contact">Contact</a>

                            </li>



                        </ul>

                    </div>

                </nav>

            </div>

        </div>

    </header>
</div>