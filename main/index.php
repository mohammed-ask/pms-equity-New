<?php
include './main/function.php';
include './main/conn.php';
$rowinfo = $obj->selectextrawhereupdate("personal_detail", "phone,email,address_1,address_2,city,pincode,state", "status=11")->fetch_assoc();
if ($mainpagemaintanance) { ?>
    <!doctype html>
    <title>Site Maintenance</title>
    <style>
        body {
            text-align: center;
            padding: 150px;
        }

        h1 {
            font-size: 50px;
        }

        body {
            font: 20px Helvetica, sans-serif;
            color: #333;
        }

        article {
            display: block;
            text-align: left;
            width: 650px;
            margin: 0 auto;
        }

        a {
            color: #dc8100;
            text-decoration: none;
        }

        a:hover {
            color: #333;
            text-decoration: none;
        }
    </style>

    <article>
        <h1>We&rsquo;ll be back soon!</h1>
        <div>
            <p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href="mailto:#">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
            <p>&mdash; The Team</p>
        </div>
    </article>
<?php } else { ?>
    <!DOCTYPE html>

    <html lang="en" class="light-style layout-navbar-fixed layout-wide" dir="ltr" data-theme="theme-default" data-assets-path="main/dist/landingmain/dist/landingassets/" data-template="front-pages">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

        <title>Eagle Eye Tradings</title>







        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="#">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
        <link href="main/dist/landingassets/css/css2" rel="stylesheet">


        <link rel="stylesheet" href="main/dist/landingassets/css/boxicons.css">


        <!-- Core CSS -->


        <link rel="stylesheet" href="main/dist/landingassets/css/demo.css">
        <link rel="stylesheet" href="main/dist/landingassets/css/front-page.css">
        <!-- Vendors CSS -->

        <link rel="stylesheet" href="main/dist/landingassets/css/nouislider.css">
        <link rel="stylesheet" href="main/dist/landingassets/css/swiper.css">

        <!-- Page CSS -->

        <link rel="stylesheet" href="main/dist/landingassets/css/front-page-landing.css">

        <!-- Helpers -->
        <script src="main/dist/landingassets/js/helpers.js.download"></script>
        <style type="text/css">
            .layout-menu-fixed .layout-navbar-full .layout-menu,
            .layout-menu-fixed-offcanvas .layout-navbar-full .layout-menu {
                top: 85.1875px !important;
            }

            .layout-page {
                padding-top: 85.1875px !important;
            }

            .content-wrapper {
                padding-bottom: 0px !important;
            }
        </style>

        <script src="main/dist/landingassets/js/front-config.js.download"></script>
        <link rel="stylesheet" type="text/css" href="main/dist/landingassets/css/core.css" class="template-customizer-core-css">
        <link rel="stylesheet" type="text/css" href="main/dist/landingassets/css/theme-default.css" class="template-customizer-theme-css">

        <script type="text/javascript" src="main/dist/landingassets/js/api.min.js.download" async="" data-user="252882" data-account="269977"></script>
        <script async="" src="main/dist/landingassets/js/modules.de67af192337ace6bbe5.js.download" charset="utf-8"></script>
        <link rel="stylesheet" href="main/dist/landingassets/css/api.min.css" id="omapi-css" media="all">
    </head>

    <body>


        <script src="main/dist/landingassets/js/dropdown-hover.js.download"></script>
        <script src="main/dist/landingassets/js/mega-dropdown.js.download"></script>

        <!-- Navbar: Start -->
        <nav class="layout-navbar shadow-none py-0 navbar-active">
            <div class="container">
                <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4 ">
                    <!-- Menu logo wrapper: Start -->
                    <div class="navbar-brand app-brand demo d-flex py-0 m-0">
                        <!-- Mobile menu toggle: Start-->
                        <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="tf-icons bx bx-menu bx-sm align-middle"></i>
                        </button>
                        <!-- Mobile menu toggle: End-->
                        <a href="#" class="app-brand-link">
                            <span class="app-brand-logo demo">

                                <img width="150px" src="main/dist/landingassets/img/eagle-eye.svg" alt="">

                            </span>

                    </div>
                    <!-- Menu logo wrapper: End -->
                    <!-- Menu wrapper: Start -->
                    <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                        <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="tf-icons bx bx-x bx-sm"></i>
                        </button>
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link fw-medium" aria-current="page" href="#landingHero">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium" href="#landingFeatures">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium active" href="#landingReviews">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium" href="#landingFAQ">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium" href="#landingContact">Contact
                                    us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="landing-menu-overlay d-lg-none"></div>
                    <!-- Menu wrapper: End -->
                    <!-- Toolbar: Start -->
                    <ul class="navbar-nav flex-row align-items-center ms-auto">

                        <!-- navbar button: Start -->



                        <li>
                            <a href="login" class="btn btn-primary"><span class="tf-icons bx bx-user me-md-1"></span><span class="d-none d-md-block">Login/Register</span></a>
                        </li>
                        <!-- navbar button: End -->
                    </ul>
                    <!-- Toolbar: End -->
                </div>
            </div>
        </nav>
        <!-- Navbar: End -->


        <!-- Sections:Start -->


        <div data-bs-spy="scroll" class="scrollspy-example">
            <!-- Hero: Start -->
            <section id="hero-animation">
                <div id="landingHero" class="section-py landing-hero position-relative">
                    <div class="container">
                        <div class="hero-text-box text-center">
                            <h1 class="text-primary hero-title display-4 fw-bold">Eagle Eye Tradings – Smart Trading Platform <br> Where AI Meets Trading Excellence!</h1>
                            <h2 class="hero-sub-title h6 mb-4 pb-1">
                                Ready to elevate your trading experience? <br class="d-none d-lg-block">
                                Sign up now and experience the future of share market trading!
                            </h2>
                            <div class="landing-hero-btn d-inline-block position-relative">
                                <span class="hero-btn-item position-absolute d-none d-md-flex text-heading">Join our platform
                                    <img src="main/dist/landingassets/img/Join-community-arrow.png" alt="Join community arrow" class="scaleX-n1-rtl"></span>
                                <a href="register" class="btn btn-primary">Get Started</a>
                            </div>
                        </div>
                        <div id="heroDashboardAnimation" class="hero-animation-img">
                            <a href="#" target="_blank">
                                <div id="heroAnimationImg" class="position-relative hero-dashboard-img" style="transform: perspective(1200px) scale(1) rotateX(0deg) rotateY(0deg);">
                                    <img src="main/dist/landingassets/img/hero-dashboard-light.png" alt="hero dashboard" class="animation-img">
                                    <img src="main/dist/landingassets/img/hero-elements-light.png" alt="hero elements" class="position-absolute hero-elements-img animation-img top-0 start-0" style="transform: translateZ(0px);">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="landing-hero-blank"></div>
            </section>
            <!-- Hero: End -->

            <!-- Useful features: Start -->
            <section id="landingFeatures" class="section-py landing-features">
                <div class="container">
                    <div class="text-center mb-3 pb-1">
                        <span class="badge bg-label-primary">Platform Features</span>
                    </div>
                    <h3 class="text-center mb-1">
                        <span class="section-title">Embark on your trading journey with confidence.
                    </h3>
                    <p class="text-center mb-3 mb-md-5 pb-3">
                        Eagle Eye Tradings is not just a trading platform; it's your partner in financial success.
                    </p>
                    <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
                        <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                            <div class="text-center mb-3">
                                <img src="main/dist/landingassets/img/laptop.png" alt="laptop charging">
                            </div>
                            <h5 class="mb-3">User-Friendly Interface</h5>
                            <p class="features-icon-description">
                                Our intuitive interface is designed to make trading easy for everyone.
                            </p>
                        </div>
                        <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                            <div class="text-center mb-3">
                                <img src="main/dist/landingassets/img/rocket.png" alt="transition up">
                            </div>
                            <h5 class="mb-3">Real-Time Market Data</h5>
                            <p class="features-icon-description">
                                Stay ahead of the curve with up-to-the-minute market data at your fingertips.
                            </p>
                        </div>
                        <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                            <div class="text-center mb-3">
                                <img src="main/dist/landingassets/img/paper.png" alt="edit">
                            </div>
                            <h5 class="mb-3">Security & Reliability</h5>
                            <p class="features-icon-description">
                                Your security is our top priority and ensure a safe trading environment.
                            </p>
                        </div>
                        <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                            <div class="text-center mb-3">
                                <img src="main/dist/landingassets/img/check.png" alt="3d select solid">
                            </div>
                            <h5 class="mb-3">Smart Algorithms</h5>
                            <p class="features-icon-description">
                                Dip your toes into AI trading with a simplified interface.
                            </p>
                        </div>
                        <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                            <div class="text-center mb-3">
                                <img src="main/dist/landingassets/img/user.png" alt="lifebelt">
                            </div>
                            <h5 class="mb-3">Automated Trading</h5>
                            <p class="features-icon-description">Save time and reduce human error with our automated trading features.</p>
                        </div>
                        <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                            <div class="text-center mb-3">
                                <img src="main/dist/landingassets/img/keyboard.png" alt="google docs">
                            </div>
                            <h5 class="mb-3">Risk Management</h5>
                            <p class="features-icon-description">AI is not just about profit; it's about managing risks effectively.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Useful features: End -->

            <!-- Real customers reviews: Start -->
            <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
                <!-- What people say slider: Start -->
                <div class="container">
                    <div class="row align-items-center gx-0 gy-4 g-lg-5">
                        <div class="col-md-6 col-lg-5 col-xl-3">
                            <div class="mb-3 pb-1">
                                <span class="badge bg-label-primary">Real Customers Reviews</span>
                            </div>
                            <h3 class="mb-1"><span class="section-title">What people say</span></h3>
                            <p class="mb-3 mb-md-5">
                                See what our customers have to<br class="d-none d-xl-block">
                                say about their experience.
                            </p>
                            <div class="landing-reviews-btns d-flex align-items-center gap-3">
                                <button id="reviews-previous-btn" class="btn btn-label-primary reviews-btn" type="button">
                                    <i class="bx bx-chevron-left bx-sm"></i>
                                </button>
                                <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn" type="button">
                                    <i class="bx bx-chevron-right bx-sm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7 col-xl-9">
                            <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                                <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden" id="swiper-reviews">
                                    <div class="swiper-wrapper" id="swiper-wrapper-83cbd5dac2cc6d18" aria-live="off" style="cursor: grab; transition-duration: 0ms; transform: translate3d(-276.667px, 0px, 0px);">






                                        <div class="swiper-slide swiper-slide-prev" role="group" aria-label="4 / 6" data-swiper-slide-index="3" style="width: 250.667px; margin-right: 26px;">
                                            <div class="card h-100">
                                                <div class="card-body text-body d-flex flex-column justify-content-between h-100">

                                                    <p>
                                                        Eagle Eye Trading Platform is a game-changer! The user interface is sleek, and I love the real-time market analytics. The platform has significantly improved my trading experience. Highly recommended!
                                                    </p>
                                                    <div class="text-warning mb-3">
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bx-star bx-sm"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar me-2 avatar-sm">
                                                            <img src="main/dist/landingassets/img/user-review.png" alt="Avatar" class="rounded-circle">
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">Shanti Sishodhiya</h6>
                                                            <p class="small text-muted mb-0">Jaipur, Rajeshthan</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="5 / 6" data-swiper-slide-index="4" style="width: 250.667px; margin-right: 26px;">
                                            <div class="card h-100">
                                                <div class="card-body text-body d-flex flex-column justify-content-between h-100">

                                                    <p>
                                                        “Impressed with the wide range of investment options. The platform is user-friendly, and the educational resources are excellent for both beginners and experienced traders. A solid choice for anyone serious about investing.”
                                                    </p>
                                                    <div class="text-warning mb-3">
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar me-2 avatar-sm">
                                                            <img src="main/dist/landingassets/img/user-review.png" alt="Avatar" class="rounded-circle">
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">Dhramendra Patel</h6>
                                                            <p class="small text-muted mb-0">Surat, Gujrat</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="6 / 6" data-swiper-slide-index="5" style="width: 250.667px; margin-right: 26px;">
                                            <div class="card h-100">
                                                <div class="card-body text-body d-flex flex-column justify-content-between h-100">

                                                    <p>
                                                        "Eagle Eye is my go-to for trading. The platform's security features are top-notch, and the responsive customer support team ensures a smooth experience. Their diverse offerings set them apart from others."
                                                    </p>
                                                    <div class="text-warning mb-3">
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bx-star bx-sm"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar me-2 avatar-sm">
                                                            <img src="main/dist/landingassets/img/user-review.png" alt="Avatar" class="rounded-circle">
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">Gourav Patidar</h6>
                                                            <p class="small text-muted mb-0">Delhi, India</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="1 / 6" data-swiper-slide-index="0" style="width: 250.667px; margin-right: 26px;">
                                            <div class="card h-100">
                                                <div class="card-body text-body d-flex flex-column justify-content-between h-100">

                                                    <p>
                                                        “I appreciate Eagle Eye's advanced trading tools. The algorithmic trading features are robust, making it easy to execute complex strategies. Definitely a platform for those who enjoy diving deep into analytics.”
                                                    </p>
                                                    <div class="text-warning mb-3">
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar me-2 avatar-sm">
                                                            <img src="main/dist/landingassets/img/user-review.png" alt="Avatar" class="rounded-circle">
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">Rachit Ojha</h6>
                                                            <p class="small text-muted mb-0">Pune, India</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="2 / 6" data-swiper-slide-index="1" style="width: 250.667px; margin-right: 26px;">
                                            <div class="card h-100">
                                                <div class="card-body text-body d-flex flex-column justify-content-between h-100">

                                                    <p>
                                                        “Eagle Eye offers a comprehensive suite of options trading tools. The platform's options analytics are detailed, helping me make informed decisions. If you're into options trading, this is the platform for you.”
                                                    </p>
                                                    <div class="text-warning mb-3">
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar me-2 avatar-sm">
                                                            <img src="main/dist/landingassets/img/user-review.png" alt="Avatar" class="rounded-circle">
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">Ruchi Jain</h6>
                                                            <p class="small text-muted mb-0">Mumbai, India</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="3 / 6" data-swiper-slide-index="2" style="width: 250.667px; margin-right: 26px;">
                                            <div class="card h-100">
                                                <div class="card-body text-body d-flex flex-column justify-content-between h-100">

                                                    <p>
                                                        "For day traders like myself, speed and accuracy matter. Eagle Eye delivers on both fronts. The fast execution of trades and real-time market data make it an ideal platform for active traders. Thumbs up!"
                                                    </p>
                                                    <div class="text-warning mb-3">
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                        <i class="bx bxs-star bx-sm"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar me-2 avatar-sm">
                                                            <img src="main/dist/landingassets/img/user-review.png" alt="Avatar" class="rounded-circle">
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">Venu Srinivasan</h6>
                                                            <p class="small text-muted mb-0">Chennai, India</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-83cbd5dac2cc6d18"></div>
                                    <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-83cbd5dac2cc6d18"></div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- What people say slider: End -->
                <hr class="m-0">
                <!-- Logo slider: Start -->

                <!-- Logo slider: End -->
            </section>
            <!-- Real customers reviews: End -->

            <!-- Our great team: Start -->
            <!-- <section id="landingTeam" class="section-py landing-team">
      <div class="container">
        <div class="text-center mb-3 pb-1">
          <span class="badge bg-label-primary">Our Great Team</span>
        </div>
        <h3 class="text-center mb-1"><span class="section-title">Supported</span> by Real People</h3>
        <p class="text-center mb-md-5 pb-3">Who is behind these great-looking interfaces?</p>
        <div class="row gy-5 mt-2">
          <div class="col-lg-3 col-sm-6">
            <div class="card mt-3 mt-lg-0 shadow-none">
              <div class="bg-label-primary position-relative team-image-box">
                <img
                  src="main/dist/landingassets/img/team-member-1.png"
                  class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                  alt="human image">
              </div>
              <div class="card-body border border-label-primary border-top-0 text-center">
                <h5 class="card-title mb-0">Sophie Gilbert</h5>
                <p class="text-muted mb-0">Project Manager</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card mt-3 mt-lg-0 shadow-none">
              <div class="bg-label-info position-relative team-image-box">
                <img
                  src="main/dist/landingassets/img/team-member-2.png"
                  class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                  alt="human image">
              </div>
              <div class="card-body border border-label-info border-top-0 text-center">
                <h5 class="card-title mb-0">Paul Miles</h5>
                <p class="text-muted mb-0">UI Designer</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card mt-3 mt-lg-0 shadow-none">
              <div class="bg-label-danger position-relative team-image-box">
                <img
                  src="main/dist/landingassets/img/team-member-3.png"
                  class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                  alt="human image">
              </div>
              <div class="card-body border border-label-danger border-top-0 text-center">
                <h5 class="card-title mb-0">Nannie Ford</h5>
                <p class="text-muted mb-0">Development Lead</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card mt-3 mt-lg-0 shadow-none">
              <div class="bg-label-success position-relative team-image-box">
                <img
                  src="main/dist/landingassets/img/team-member-4.png"
                  class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                  alt="human image">
              </div>
              <div class="card-body border border-label-success border-top-0 text-center">
                <h5 class="card-title mb-0">Chris Watkins</h5>
                <p class="text-muted mb-0">Marketing Manager</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
            <!-- Our great team: End -->

            <!-- Pricing plans: Start -->
            <section id="landingPricing" class="section-py bg-body landing-pricing">
                <div class="container">
                    <div class="text-center mb-3 pb-1">
                        <span class="badge bg-label-primary">Platform Deals in</span>
                    </div>
                    <h3 class="text-center mb-1"><span class="section-title">Diversified Trading Hub:</span> Navigating the Markets with Confidence</h3>
                    <p class="text-center mb-4 pb-3">
                        Unlock Opportunities Across Equity, Commodity, and Derivative Markets on Our Advanced Trading Platform
                    </p>

                    <div class="row gy-4 pt-lg-3">
                        <!-- Basic Plan: Start -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="text-center">
                                        <img src="main/dist/landingassets/img/paper-airplane.png" alt="paper airplane icon" class="mb-4 pb-2 scaleX-n1-rtl">
                                        <h4 class="mb-3">Equity</h4>
                                        <span class="h6">Equity trading involves buying and selling company stocks or shares on stock exchanges.</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Basic Plan: End -->

                        <!-- Favourite Plan: Start -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="text-center">
                                        <img src="main/dist/landingassets/img/paper-airplane.png" alt="paper airplane icon" class="mb-4 pb-2 scaleX-n1-rtl">
                                        <h4 class="mb-3">Commodity</h4>
                                        <span class="h6">Commodity trading involves the buying and selling of physical goods like gold, oil, agricultural products, etc.</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Favourite Plan: End -->

                        <!-- Standard Plan: Start -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="text-center">
                                        <img src="main/dist/landingassets/img/paper-airplane.png" alt="paper airplane icon" class="mb-4 pb-2 scaleX-n1-rtl">
                                        <h4 class="mb-3">Derivative</h4>
                                        <span class="h6">Derivatives are financial contracts, derived from an underlying asset, include futures and options.</span>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Standard Plan: End -->
                    </div>
                </div>
            </section>
            <!-- Pricing plans: End -->

            <!-- Fun facts: Start -->
            <section id="landingFunFacts" class="section-py landing-fun-facts">
                <div class="container">
                    <div class="row gy-3">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card border border-label-primary shadow-none">
                                <div class="card-body text-center">
                                    <img src="main/dist/landingassets/img/laptop.png" alt="laptop" class="mb-2">
                                    <h5 class="h2 mb-1">35k+</h5>
                                    <p class="fw-medium mb-0">
                                        Cliets
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card border border-label-success shadow-none">
                                <div class="card-body text-center">
                                    <img src="main/dist/landingassets/img/user-success.png" alt="laptop" class="mb-2">
                                    <h5 class="h2 mb-1">6.5k+</h5>
                                    <p class="fw-medium mb-0">
                                        Active Clients
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card border border-label-info shadow-none">
                                <div class="card-body text-center">
                                    <img src="main/dist/landingassets/img/diamond-info.png" alt="laptop" class="mb-2">
                                    <h5 class="h2 mb-1">4.8/5</h5>
                                    <p class="fw-medium mb-0">
                                        Google Ratings
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card border border-label-warning shadow-none">
                                <div class="card-body text-center">
                                    <img src="main/dist/landingassets/img/check-warning.png" alt="laptop" class="mb-2">
                                    <h5 class="h2 mb-1">100%</h5>
                                    <p class="fw-medium mb-0">
                                        Secure & Reliable
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Fun facts: End -->

            <!-- FAQ: Start -->
            <section id="landingFAQ" class="section-py bg-body landing-faq">
                <div class="container">
                    <div class="text-center mb-3 pb-1">
                        <span class="badge bg-label-primary">FAQ</span>
                    </div>
                    <h3 class="text-center mb-1">Frequently asked <span class="section-title">questions</span></h3>
                    <p class="text-center mb-5 pb-3">Browse through these FAQs to find answers to commonly asked questions.</p>
                    <div class="row gy-5">
                        <div class="col-lg-5">
                            <div class="text-center">
                                <img src="main/dist/landingassets/img/faq-boy-with-logos.png" alt="faq boy with logos" class="faq-image">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="accordion" id="accordionExample">
                                <div class="card accordion-item active">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                                            What is Eagle Eye Trading Platform?
                                        </button>
                                    </h2>

                                    <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            The Eagle Eye Trading Platform is an advanced online trading platform designed for traders and investors. It provides a user-friendly interface for buying and selling various financial instruments. The platform also offers real-time market data, AI Trading Mode, technical analysis tools, and other features to assist users in making informed trading decisions.
                                        </div>
                                    </div>
                                </div>
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                                            What markets can I trade on Eagle Eye Trading Platform?
                                        </button>
                                    </h2>
                                    <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Eagle Eye Trading Platform typically supports a wide range of financial markets, including equities, commodities, and derivatives. Users can trade on major stock exchanges and access NSE & BSE markets through the platform.
                                        </div>
                                    </div>
                                </div>
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                                            How secure is Eagle Eye Trading Platform?
                                        </button>
                                    </h2>
                                    <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Security is a top priority for Eagle Eye Trading Platform. The platform employs robust security measures such as encryption protocols to protect user data and transactions. Additionally, it may offer two-factor authentication for added account security. Users are encouraged to follow best practices, such as using strong passwords and keeping their login credentials confidential, to enhance their account security.
                                        </div>
                                    </div>
                                </div>
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFour" aria-expanded="false" aria-controls="accordionFour">
                                            How do I fund my account and withdraw funds on Eagle Eye Trading Platform?
                                        </button>
                                    </h2>
                                    <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Funding and withdrawing funds on Eagle Eye Trading Platform can usually be done through website & app in Fund section. Common options include bank transfers, internet banking, UPI, and electronic payment systems. Users can access the funding and withdrawal features through the platform's interface, where they can securely manage their financial transactions.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- FAQ: End -->

            <!-- CTA: Start -->
            <section id="landingCTA" class="section-py landing-cta p-lg-0 pb-0">
                <div class="container">
                    <div class="row align-items-center gy-5 gy-lg-0">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h6 class="h2 text-primary fw-bold mb-1">Ready to Get Started?</h6>
                            <p class="fw-medium mb-4">Seamless Beginnings Await: Dive into Easy Prosperity. Ready to Get Started with Effortless Wealth Building?</p>
                            <a href="register" class="btn btn-primary">Get Started</a>
                        </div>
                        <div class="col-lg-6 pt-lg-5 text-center text-lg-end">
                            <img src="main/dist/landingassets/img/cta-dashboard.png" alt="cta dashboard" class="img-fluid">
                        </div>
                    </div>
                </div>
            </section>
            <!-- CTA: End -->

            <!-- Contact Us: Start -->
            <section id="landingContact" class="section-py bg-body landing-contact">
                <div class="container">
                    <div class="text-center mb-3 pb-1">
                        <span class="badge bg-label-primary">Contact US</span>
                    </div>
                    <h3 class="text-center mb-1"><span class="section-title">Get in Touch with Us</h3>
                    <p class="text-center mb-4 mb-lg-5 pb-md-3">We're here to assist you. just write us a message</p>
                    <div class="row gy-4">
                        <div class="col-lg-5">
                            <div class="contact-img-box position-relative border p-2 h-100">
                                <img src="main/dist/landingassets/img/contact-customer-service.png" alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl img-fluid">
                                <div class="pt-3 px-4 pb-1">
                                    <div class="row gy-3 gx-md-4">
                                        <div class="col-12 mt-4">
                                            <div class="d-flex align-items-center">
                                                <div class="badge bg-label-primary rounded p-2 me-2"><i class="bx bx-envelope bx-sm"></i></div>
                                                <div>
                                                    <p class="mb-0">Email</p>
                                                    <h5 class="mb-0">
                                                        <a href="mailto:<?= $rowinfo['email'] ?>" class="text-heading"><?= $rowinfo['email'] ?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 my-4">
                                            <div class="d-flex align-items-center">
                                                <div class="badge bg-label-success rounded p-2 me-2">
                                                    <i class="bx bx-phone-call bx-sm"></i>
                                                </div>
                                                <div>
                                                    <p class="mb-0">Phone</p>
                                                    <h5 class="mb-0"><a href="tel:<?= $rowinfo['phone'] ?>" class="text-heading"><?= $rowinfo['phone'] ?></a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-1">Send a message</h4>
                                    <p class="mb-4">
                                        Ready to build wealth? Your investment in our platform is promising.<br class="d-none d-lg-block">
                                        Start now for a prosperous financial journey with confidence and assurance.
                                    </p>
                                    <form id="contact" onsubmit="event.preventDefault();sendForm('', '', 'insertmessage', 'resultid', 'contact');return 0;">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <label class="form-label" for="contact-form-fullname">Full Name</label>
                                                <input data-bvalidator='required' name="name" type="text" class="form-control" id="contact-form-fullname" placeholder="enter your name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="contact-form-email">Email</label>
                                                <input data-bvalidator='required' type="text" name="email" id="contact-form-email" class="form-control" placeholder="your email">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label" for="contact-form-message">Message</label>
                                                <textarea data-bvalidator='required' name="message" id="contact-form-message" class="form-control" rows="9" placeholder="Write a message..."></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Send inquiry</button>
                                            </div>
                                        </div>
                                        <div id="resultid"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Contact Us: End -->
        </div>

        <!-- / Sections:End -->



        <!-- Footer: Start -->
        <footer class="landing-footer bg-body footer-text">
            <div class="footer-top">
                <div class="container">
                    <div class="row gx-0 gy-4 g-md-5">
                        <div class="col-lg-5">
                            <a href="#" class="app-brand-link mb-3">
                                <span class="app-brand-logo demo">

                                    <img width="250px" src="main/dist/landingassets/img/eagle-eye.svg" alt="">

                                </span>

                            </a>
                            <p class="footer-text footer-logo-description mb-4">
                                Eagle Eye Tradings, your gateway to Smart Trading! Elevate your trading experience with Eagle Eye Tradings.<br>
                            <div style="color:#fff;"><span style="font-weight:800;     text-decoration: underline;
">Address:</span> <span><?= $rowinfo['address_1'] ?></span> </div>
                            </p>
                            <!-- <form class="footer-form">
              <label for="footer-email" class="small">Subscribe to newsletter</label>
              <div class="d-flex mt-1">
                <input type="email" class="form-control rounded-0 rounded-start-bottom rounded-start-top"
                  id="footer-email" placeholder="Your email">
                <button type="submit" class="btn btn-primary shadow-none rounded-0 rounded-end-bottom rounded-end-top">
                  Subscribe
                </button>
              </div>
            </form> -->
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <h6 class="footer-title mb-4">Features</h6>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <a class="footer-link">User-friendly</a>
                                </li>
                                <li class="mb-3">
                                    <a class="footer-link">Real-Time Data</a>
                                </li>
                                <li class="mb-3">
                                    <a class="footer-link">AI Trading <span class="badge rounded bg-primary ms-2 px-2">New</span></a>
                                </li>
                                <li class="mb-3">
                                    <a class="footer-link">Risk Management</a>
                                </li>
                                <li class="mb-3">
                                    <a class="footer-link">Automated Trading</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <h6 class="footer-title mb-4">Quick Links</h6>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <a href="#landingHero" class="footer-link">Home</a>
                                </li>
                                <li class="mb-3">
                                    <a href="login" class="footer-link">Login</a>
                                </li>
                                <li class="mb-3">
                                    <a href="register" class="footer-link">Register</a>
                                </li>
                                <li class="mb-3">
                                    <a href="#landingContact" class="footer-link">Contact us</a>
                                </li>

                                <li class="mb-3">
                                    <a href="#landingFAQ" class="footer-link">FAQs</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <h6 class="footer-title mb-4">Download our app</h6>
                            <a href="main\dist\landingassets\app\Eagle-Eye-Tradings.apk" download="Eagle Eye Trading Apk" class="d-block footer-link mb-3 pb-2"><img src="main/dist/landingassets/img/apple-icon.png" alt="apple icon"></a>
                            <a href="https://play.google.com/store/apps/details?id=com.eagleeyetrading" class="d-block footer-link" target="_blank"><img src="main/dist/landingassets/img/google-play-icon.png" alt="google play icon"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom py-3">
                <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
                    <div class="mb-2 mb-md-0">
                        <span class="footer-text">©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </span>
                        <a class="fw-medium text-white footer-link">Eagle Eye Tradings,</a>
                        <span class="footer-text"> India's Leading Trading Platform</span>
                    </div>

                </div>
            </div>
        </footer>
        <!-- Footer: End -->



        <!-- Core JS -->
        <!-- build:js main/dist/landingassets/vendor/js/core.js -->
        <script src="main/dist/landingassets/js/popper.js.download"></script>
        <script src="main/dist/landingassets/js/bootstrap.js.download"></script>

        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="main/dist/landingassets/js/nouislider.js.download"></script>
        <script src="main/dist/landingassets/js/swiper.js.download"></script>

        <!-- Main JS -->
        <script src="main/dist/landingassets/js/front-main.js.download"></script>


        <!-- Page JS -->
        <script src="main/dist/landingassets/js/front-page-landing.js.download"></script>
        <script src="main/dist/js/jquery.min.js"></script>
        <script src="main/dist/js/customfunction.js"></script>
        <script src="main/dist/js/jquery.bvalidator-yc.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script type="text/javascript" id="">
            console.log("TS:GTM Worked!");
        </script>
        <script type="text/javascript" id="">
            (function(b, c, d) {
                var a = b.createElement("script");
                a.type = "text/javascript";
                a.src = "https://a.omappapi.com/app/js/api.min.js";
                a.async = !0;
                a.dataset.user = c;
                a.dataset.account = d;
                b.getElementsByTagName("head")[0].appendChild(a)
            })(document, 252882, 269977);
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
<?php } ?>