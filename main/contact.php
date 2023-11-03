<?php include 'indexheader.php' ?>

<!--    main page -->

<main class="main-content">

    <section class="breadSec py-50">

        <div class="container">

            <div class="row align-items-center position-relative">

                <div class="col-md-7">

                    <div class="commonHead mb-0">

                        <h2 class="commonHead_title mt-0 text-white">Contact Us</h2>

                        <div class="line-bot bg-white"></div>

                        <p class="text-white">We Know The Secret Of Your Success</p>

                    </div>

                </div>

                <div class="col-md-5">

                    <ol class="breadcrumb justify-content-md-end">

                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="contactInfo py-80">

        <div class="container">

            <div class="commonHead text-center">

                <span class="commonHead_subtitle">Contact</span>

                <h2 class="commonHead_title">let's work together</h2>

                <div class="line-bot"></div>

                <p>It would be great to hear from you! If you got any questions. </p>

            </div>

            <div class="row justify-content-center">

                <div class="col-lg-4 col-sm-6">

                    <div class="contactInfo_box">

                        <h2>Office Address</h2>

                        <img src="main/dist/indeximage/office-map.png" alt="office-map">

                        <p><?= $companyaddress ?></p>

                    </div>

                </div>

                <div class="col-lg-4 col-sm-6">

                    <div class="contactInfo_box">

                        <h2>Call Us</h2>

                        <img src="main/dist/indeximage/telephone.png" alt="telephone">

                        <p> <a href="javascript:void(0);">+91-<?= $companyphone ?></a></p>



                    </div>

                </div>

                <div class="col-lg-4 col-sm-6">

                    <div class="contactInfo_box">

                        <h2>Email</h2>

                        <img src="main/dist/indeximage/email.png" alt="email">


                        <p><a href="javascript:void(0);"><?= $companyemailid ?></a></p>


                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="contactSec py-80">

        <div class="container-fluid">

            <div class="row align-items-center justify-content-end">
                <div class="col-6"><img class="img-fluid" src="main/dist/indeximage/contact-us.jpg" alt=""></div>
                <div class="col-md-6">

                    <div class="contactSec_form">

                        <div class="commonHead mb-4">



                            <h2 class="commonHead_title">Request A Free Consulting</h2>

                            <div class="line-bot"></div>

                            <p>It would be great to hear from you! If you got any questions.</p>

                        </div>

                        <form action="#" method="post" data-parsley-validate="" class="developer_submit_save" novalidate="">

                            <input type="hidden" name="data_param" id="data_param" value="contactus" style="opacity: -1">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <input type="text" name="name" class="form-control" placeholder="Full Name" required="" autocomplete="off" data-parsley-error-message="Name is required.">

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <input type="email" name="email" class="form-control" placeholder="Email" data-parsley-error-message="Required a valid Email id.">

                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <div class="form-group">

                                        <input type="text" name="mobile" class="form-control" placeholder="Contact Number" required="" autocomplete="off" data-parsley-error-message="Contact Number is required.">

                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <textarea name="comment" class="form-control" placeholder="Your Message" required="" autocomplete="off" data-parsley-error-message="Message is required."></textarea>

                                    </div>

                                </div>



                                <div class="col-sm-12">

                                    <button type="submit" class="btn btn-primary">Submit Now</button>

                                </div>
                                <!-- Msg -->

                                <div class="alert alert-success mt-2 ml-3" id="contact_success" style="display: none;">

                                    <strong>Success!</strong> Thank you for contacting us. Our Team will get back to you soon.

                                </div>



                                <div class="alert alert-danger mt-2 ml-3" id="contact_error" style="display: none;">

                                    <strong>Error!</strong> Something went wrong, please contact to admin.

                                </div>

                                <div class="alert alert-danger mt-2 ml-3" id="captcha_error" style="display: none;">

                                    <strong>Error!</strong> Please select Captcha to continue.

                                </div>

                                <!--  -->

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>



</main>


<?php include "indexfooter.php" ?>
<script>
    // menu toggle

    $(document).ready(function() {

        body = document.querySelector('body');

        $('.menu-icon').click(function() {

            $(body).toggleClass("menuShow");

        });

    });





    //Select

    $('.select-form').selectpicker({
        noneSelectedText: 'Select'
    });

    //Dropdown Hover

    $(document).ready(function() {

        if ($(window).width() >= 1200) {

            $(".mainHeader .mainHeader_down .dropdown").hover(

                function() {

                    $(this).addClass("show");

                    $(this).find(".dropdown-menu").addClass("show");

                },

                function() {

                    $(this).removeClass("show");

                    $(this).find(".dropdown-menu").removeClass("show");

                }

            );

        } else {

            $(".mainHeader .mainHeader_down .dropdown .dropdown-menu").on('click', function(e) {

                e.stopPropagation();

            });

        }

        $('.mainHeader_down .dropdown-menu li a').on('click', function(event) {

            if ($(window).width() <= 1199) {

                $(this).parent('li').toggleClass('active');

                $(this).parent('li').siblings().removeClass('active');

            } else {



            }

        });

    });
</script>

</html>