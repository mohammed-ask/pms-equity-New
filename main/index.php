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
    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8) url(main/images/loader.gif) no-repeat center center;
            z-index: 10000;
        }
    </style>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="preconnect" href="https://fonts.gstatic.com">

        <title>Investment Planning and Management Made Simple with PMS Equity</title>

        <!-- Bootstrap core CSS -->
        <link href="main/dist/indexcss/bootstrap.min.css" rel="stylesheet">

        <!-- fontawesome icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="main/dist/indexcss/fontawesome.css">
        <link rel="stylesheet" href="main/dist/indexcss/home-page.css">

        <!-- Veriables css -->
        <link href="main/dist/indexcss/variables.css" rel="stylesheet">

        <link rel="stylesheet" href="dist/css/bvalidator.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

        <!-- ----------------favicoin-------------------->
        <link rel="icon" href="main/images/logo/favicon.svg" type="image/svg+xml">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P9108ZJ253"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-P9108ZJ253');
</script>

    </head>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <body>

        <!-- ***** Preloader Start ***** -->

        <div class="loading-container">
            <div class="loading">
                <div class="loading-rect"></div>
                <div class="loading-rect"></div>
                <div class="loading-rect"></div>
                <div class="loading-rect"></div>
            </div>
        </div>

        <!-- ***** Preloader End ***** -->

        <!-- ***** Header Area Start ***** -->
        <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="index" class="logo">
                                <img src="main/images/logo/PMS Equity white logo svg.svg" style="width:200px" />

                            </a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <?php
                                if (isset($_POST['postData'])) {
                                    // $postData = json_decode($_POST['postData'], true);
                                    // Display the button
                                    echo '<button class="btn btn-sm"> Button</button>';
                                }
                                ?>
                                <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                                <li class="scroll-to-section"><a href="#about">About Us</a></li>
                                <li class="scroll-to-section"><a href="#services">Services</a></li>
                                <li class="scroll-to-section"><a href="#contact">Contact Us</a></li>
                                <li class="scroll-to-section">
                                    <div class="head-button"><a href="login">Login</a></div>
                                </li>
                            </ul>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ***** Header Area End ***** -->

        <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 align-self-center">
                                <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                    <!-- <h6>Welcome to Space Dynamic</h6> -->
                                    <h2>Making Your <br>Life Easy & <br>Wealthy</h2>
                                    <p style="font-size: 20px; font-weight: 500;">We help you invest, manage and grow your money! <br>Get smart planning and investment all<br> at single click.</p>

                                    <div><span class="banner-create-button"><a href="register">Create Account</a></span> <span class="main-red-button"><a href="login">Login <i class="fa-solid fa-right-to-bracket"></i></a></span></div>
                                </div>
                            </div>
                            <div class="col-lg-6 p-0">
                                <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <img src="main/dist/indeximage/home-page-image.gif" width="100%" alt="team meeting">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ----------------------app Section -->
 
 <section id="cta" class="mt-5">
            <div class="container" data-aos="zoom-out" style="border: 1px solid lightblue; border-radius: 10px; padding: 20px 35px;">

                <div class="row g-5">

                <div class="col-lg-4 col-md-6 order-first d-flex align-items-center">
                        <div class="img">
                            <img src="main\dist\indeximage\mobile-app-mockup.png" alt="" class="img-fluid" style="width: 55%; margin-left:80px;">
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                        <h3 style="font-weight:800;">Trade Smarter with  <br> PMS EQuity Mobile App</h3>

                        <h5 class="d-flex align-items-center mt-4" style="font-weight:700;">Convenience on the Go</h5>
                        <p>Our trading app allows you to access your investments and make trades anytime, anywhere, putting the power of the market in your pocket.</p>

                        <h5 class="d-flex align-items-center mt-4" style="font-weight:700;">AI Trade Mode</h5>
                        <p>Unlock the future of trading with our AI Trade Mode, which provides you with intelligent, data-driven trading suggestions and strategies, enhancing your decision-making and boosting your trading success..</p>
<div class="row mt-3">
    <div class="col-6"><a target="_blank" href="https://play.google.com/store/apps/details?id=com.pmsequity"><img class="download-img" src="main\dist\indeximage\playstore-coming-soon.png" alt="Download From Playstore"></a></div>
    <div class="col-6"><a class="margin-for-deshboard" href="main/dist/download-app/PMS-EQuity.apk" Download="PMS EQuity"><img class="download-img" src="main\dist\indeximage\direct-download.png" alt=""></a></div>
</div>

                        
                    </div>

                    
                </div>

            </div>
        </section><!-- End Call To Action Section -->




        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services" style="margin-top: 5%;">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="fa-solid fa-chart-simple"></i></div>
                            <h4>Advanced Trading</h4>
                            <p>Trade with lightening fast and advanced funding options.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="fa-solid fa-indian-rupee-sign"></i></div>
                            <h4>Long-term Gains</h4>
                            <p>Explore your funds or let us help pick the right ones for you</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"> <i class="fa-solid fa-chart-line"></i></div>
                            <h4>Worry-Free Future</h4>
                            <p>Insure your uncertainties. We've got you covered!</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="fa-solid fa-money-bill-transfer"></i></div>
                            <h4>Smart Investment</h4>
                            <p>Power of investing in your hand, wherever you are.</p>
                        </div>
                    </div>

                    <!-- End Service Item -->

                </div>

            </div>
        </section>
        <span id="about"></span>
        <!-- End Featured Services Section -->

        <!-- ======= About Section ======= -->
        <section class="about">
            <div class="container" data-aos="fade-up">

                <div class="ari-section-header" style="margin-top: 8%; margin-bottom: 3%;">
                    <h2 class="">About <b>Us</b></h2>
                    <p style="text-align:center">We want to help our clients meet their financial goals with passion and integrity.</p>
                </div>

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="main/dist/indeximage/about-pms-quity.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <h3 class="pt-0 pt-lg-5 mview">Generating wealth for you is at the heart of everything we do</h3>

                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">Our Values</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">Our Vision</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#tab3">Our Mission</a></li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="tab1">

                                <p class="fst-italic">Our mission is to become the most preferred financial solution provider in financial service arena. Our business idea and values supports our mission by offering a wide range of well designed and affordable financial products to benefit majority of day traders and investors.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="fa-solid fa-check"></i>
                                    <h4>We Value Innovation</h4>
                                </div>
                                <p>We are constantly seeking new ways to improve the experience of our clients and our people.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="fa-solid fa-check"></i>
                                    <h4>We Value Trust</h4>
                                </div>
                                <p>We build long-term personal relationships with our clients by living our values every day.</p>

                            </div>
                            <!-- End Tab 1 Content -->

                            <div class="tab-pane fade show" id="tab2">

                                <p class="fst-italic">PMS Equity Research Investment Advisor firm following regulatory norms prescribed by Government bodies.</p>

                                <p>A comprehensive, client-focused approach to financial planning ensures that the recommended program encompasses each client's financial goals, timeframes and risk tolerance. Research of Investelite specializes in investment analysis. We work closely with clients to develop customized financial strategies that incorporate asset allocation, financial management and succession planning.
                                </p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="fa-solid fa-check"></i>
                                    <h4>Our Vision</h4>
                                </div>
                                <p>To be recognized on global platform by providing a tactful knowledge to our customer so we can grow hand by hand.”Our growth depends on our costumer's growth.</p>



                            </div><!-- End Tab 2 Content -->

                            <div class="tab-pane fade show" id="tab3">

                                <p class="fst-italic">PMS Equity is a pure play financial market research and consulting company. We are differentiated by the stature of our diverse team. Our 15 years of legacy and values, shape our future, helping to strengthen our business and bring value to our clients.</p>

                                <p> The company was founded in 2006 with an objective of offering unbiased technical analysis & solutions for the trading community, by experienced professionals to create a conducive environment.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="fa-solid fa-check"></i>
                                    <h4>Our Mission</h4>
                                </div>
                                <p>We view our mission in reliable-efficient responsible delivery of financial research to our consumers and help them create wealth out of their savings.</p>

                            </div>
                            <!-- End Tab 3 Content -->

                        </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- End About Section -->

        <section class="ari-invest-simple-sc">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-once="false" data-aos-duration="1000">
                        <div class="ari-section-header">
                            <h2>Investments <span>Made Simple</span></h2>
                        </div>
                        <div class="ari-invest-simple-desc">
                            <p>Catering to all kinds of investors and traders, beginners or seasoned, with <br> the sole
                                motive of making the investment experience easy.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 invest-simple-width">
                        <div class="ari-invest-simple-pnl">
                            <div class="ari-invest-simple-img" data-aos="zoom-in" data-aos-once="false" data-aos-duration="1500">
                                <img src="main/dist/indeximage/bulb-3d.png" alt="bulb-3d" class="img-responsive">
                            </div>
                            <div class="ari-invest-simple-content" data-aos="fade-up" data-aos-once="false" data-aos-duration="1500">
                                <p>Guided Investing</p>
                                <h3>Learn with us, <br>Earn with us!</h3>
                                <h6>Platform that is easy & intuitive. Assistance that is systematic and helpful.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 invest-simple-width">
                        <div class="ari-invest-simple-pnl">
                            <div class="ari-invest-simple-img" data-aos="zoom-in" data-aos-once="false" data-aos-duration="1500">
                                <img src="main/dist/indeximage/rocket.png" alt="rocket" class="img-responsive">
                            </div>
                            <div class="ari-invest-simple-content" data-aos="fade-up" data-aos-once="false" data-aos-duration="1500">
                                <p>Do-it-Yourselfer</p>
                                <h3>Know the Market, <br> Grow with the Market</h3>
                                <h6>We do In-depth research to help you make the right decisions.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="ari-invest-simple-pnl">
                            <div class="ari-invest-simple-img" data-aos="zoom-in" data-aos-once="false" data-aos-duration="1500">
                                <img src="main/dist/indeximage/coin.png" alt="coin" class="img-responsive">
                            </div>
                            <div class="ari-invest-simple-content" data-aos="fade-up" data-aos-once="false" data-aos-duration="1500">
                                <p>Traders</p>
                                <h3>The Right Tools <br> of Trade</h3>
                                <h6>Advanced tools for Trade and higher leverage for daily needs.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ======= Call To Action Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-out">

                <div class="row g-5">

                    <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                        <h3>More Than 15+ Years, We <br>Provide Business Solutions.</h3>

                        <h5 class="d-flex align-items-center mt-4">24/7 Customer support!</h5>
                        <p>We provide excellent after sales services & our customer support department is working rigorously (day and night) to help you out.</p>

                        <h5 class="d-flex align-items-center mt-4"> Minimum Risk-More Profit</h5>
                        <p>We follow the strategies having low risk-reward ratio and highest percentage success rate to assure client's profitability.</p>


                        <span> <a href="#calltoday" class="cta-btn align-self-start">Call Today</a> </span>
                    </div>

                    <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                        <div class="img">
                            <img src="main/dist/indeximage/Stockbuy.png" alt="" class="img-fluid" style="border: 2px solid #1d6c8d;">
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Call To Action Section -->
        <span id="services"></span>

        <!-- ======= Services Section ======= -->
        <section class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-header mview-services" style="margin-top: 10%;">
                    <h2>Our <b>Services</b></h2>
                    <p>Tech that matters, Research that wins, Service you deserve.</p>
                </div>

                <div class="row gy-5" style="margin-top: 10%;">

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item servicemview">

                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                </div>
                                <span class="stretched-link">
                                    <h3>Equity</h3>
                                </span>
                                <p>PMS Equity offers a wide range of services in the equity market that are appropriate.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="service-item servicemview">

                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="fa-solid fa-coins"></i>
                                </div>
                                <span class="stretched-link">
                                    <h3>Commodity</h3>
                                </span>
                                <p> PMS Equity offers a comprehensive range of commodity market services for investors.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="service-item servicemview">

                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="fa-solid fa-diagram-project"></i>
                                </div>
                                <span class="stretched-link">
                                    <h3>Derivative</h3>
                                </span>
                                <p>PMS Equity offers a wide range of Derivative Market services that are ideal for investors.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                        <div class="service-item servicemview" style="margin-bottom: 0%;">

                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="fa-solid fa-sack-dollar"></i>
                                </div>
                                <span class="stretched-link">
                                    <h3>Forex</h3>
                                </span>
                                <p>PMS Equity offers a wide range of Forex Market services that are ideal for investors. </p>

                            </div>
                        </div>
                    </div>
                    <!--End Service Item -- -->

                </div>

            </div>
        </section>
        <!-- End Services Section -->


        <!-- counter-area -->
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <br />
                <div class="col text-center ari-section-header">
                    <h2>Superior Trading <b>Experience</b></h2>
                    <p>Get started today to really enjoy your trading experience with PMS Equity.</p>
                </div>



            </div>
            <div style="margin-top: 60px;" class="row text-center">
                <div class="col-lg-3">
                    <div class="counter">
                        <i class="fa-solid fa-users fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to="35000" data-speed="1500"></h2>
                        <p class="count-text ">Our Clients</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="counter">
                        <i class="fa-solid fa-building-user fa-2x"></i>
                        <h2 class="count-title">15+</h2>
                        <p class="count-text ">Years of Experience</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="counter">
                        <i class="fa-solid fa-user-gear fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to="4500" data-speed="1500"></h2>
                        <p class="count-text ">Active Monthly Clients</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="counter">
                        <i class="fa-solid fa-star fa-2x"></i>
                        <h2 class="count-title">4.5</h2>
                        <p class="count-text ">Google Ratings</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- counter-area-End -->

        <!-- Testimonials -->
        <section style="margin-top: 8%;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                        <div class="section-heading" style="margin-bottom: 35px;">
                            <h6>Testimonials</h6>
                            <h4 style="font-size: 28px; font-weight: 700; margin-top: 10px;">What Our Investors <b><em>Says</em></b></h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="testimonials" id="testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="text-align: left;">
                        <div>

                            <div class="item">
                                <p>“My experience with PMS Equity has been great. I tried multiple brokers, but I found the research and service at the best.”</p>
                                <h4>Gaurav Patidar</h4>
                                <span>Delhi, India</span>
                                <img src="main/dist/indeximage/quote-icon.png" alt="">
                            </div>
                            <div class="item">
                                <p>“I have been associated with PMS Equity for eight years. They are very investor friendly brokerage house and its research adds lots of value to client.”</p>
                                <h4>Venu Srinivasan</h4>
                                <span>Chennai, India</span>
                                <img src="main/dist/indeximage/quote-icon.png" alt="">
                            </div>
                            <div class="item">
                                <p>“I am really happy with my portfolio and service at PMS Equity. The team is very responsive and understands the client's requirement before recommending anything.”</p>
                                <h4>Ruchi Jain</h4>
                                <span>Mumbai, India</span>
                                <img src="main/dist/indeximage/quote-icon.png" alt="">
                            </div>
                            <div class="item">
                                <p>“Been an PMS Equity client for over 6yrs and happy with the service. I have been using their service and it keeps getting better.”</p>
                                <h4>Rachit Gupta</h4>
                                <span>Bangalore, India</span>
                                <img src="main/dist/indeximage/quote-icon.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials-End -->

        <!-- ======= Contact Section ======= -->
        <!-- <span id="contact"></span> -->
        <span id="calltoday"></span>
        <section class="contact  contact-us">

            <div class="container">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-5">

                        <div class="info">
                            <h3>Get in touch</h3>
                            <p>Ready to start building wealth? It'll be worth your investment. We promise!</p>

                            <div class="info-item d-flex">
                                <i class="fa-solid fa-location-dot flex-shrink-0"></i>
                                <div>
                                    <h4>Location:</h4>
                                    <p><?= $rowinfo['address_1'] ?></p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="fa-solid fa-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p><?= $rowinfo['email'] ?></p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="fa-solid fa-phone flex-shrink-0"></i>

                                <div>
                                    <h4>Call:</h4>
                                    <p><?= $rowinfo['phone'] ?></p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>
                    <div class="col-lg-2 mhidden">
                    </div>

                    <div class="col-lg-5 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                        <form id="contact" method="post" onsubmit="event.preventDefault();sendForm('', '', 'insertmessage', 'resultid', 'contact');return 0;">
                            <div class="row">
                            <h3 style="font-size: 24px; margin-bottom: 20px;">Fill the form</h3>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-5">
                                    <fieldset>
                                        <input data-bvalidator="required,minlength[10],maxlength[10]" type="number" name="number" id="number" placeholder="Your Mobile No." required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-7">
                                    <fieldset>
                                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                                    </fieldset>
                                </div>

                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Send Message</button>
                                    </fieldset>
                                </div>
                                <div id="resultid"></div>
                            </div>
                            <div class="contact-dec">
                                <img src="main/dist/indeximage/contact-decoration.png" alt="">
                            </div>
                        </form>
                    </div>
                    <!-- End Contact Form -->

                </div>

            </div>
        </section>
        <!-- End Contact Section -->





        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                        <p>© Copyright 2008-<script>
                                document.write(new Date().getFullYear())
                            </script> PMS Equity Co. | All Rights Reserved.
                    </div>
                </div>
            </div>

        </footer>
        <!-- Scripts -->
        <script src="main/dist/indexjs/jquery.min.js"></script>
        <script src="main/dist/indexjs/bootstrap.bundle.min.js"></script>
        <script src="main/dist/indexjs/owl-carousel.js"></script>
        <script src="main/dist/indexjs/animation.js"></script>
        <script src="main/dist/indexjs/imagesloaded.js"></script>
        <script src="main/dist/indexjs/templatemo-custom.js"></script>
        <script src="main/dist/js/customfunction.js"></script>
        <script src="main/dist/js/jquery.bvalidator-yc.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    </body>

    </html>
<?php } ?>