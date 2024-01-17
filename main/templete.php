<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="main/dist/userstuff/assets/" data-template="vertical-menu-template-free">

<head>
    <?php include 'headincludes.php' ?>
    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255) url(main/images/loader.gif) no-repeat center center;
            z-index: 10000;
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include 'sidebar.php' ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include "headerbar.php" ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->



                    <div class="container-xxl flex-grow-1 container-p-y margin-for-app">

                        <?php echo $pagemaincontent ?>

                    </div>
                    <!-- / Content -->



                    <!-- ----------------------------Mobile Navigation-------------------------------- -->

                    <div class="mobile-navbar">
                        <ul>
                            <li class="<?= $_SERVER['REQUEST_URI'] === '/dashboard' ? 'active' : '' ?>">
                                <a href="dashboard">
                                    <i class='bx bx-home icon'></i>
                                    <i class='bx bxs-home activeIcon'></i>
                                    <div class="app-navbar-name"><span>Home</span></div>
                                </a>

                            </li>
                            <li class="<?= $_SERVER['REQUEST_URI'] === '/portfolio' ? 'active' : '' ?>">
                                <a href="portfolio">
                                    <i class='bx bx-folder-open icon'></i>
                                    <i class='bx bxs-folder-open activeIcon'></i>
                                    <div class="app-navbar-name"><span>Portfolio</span></div>
                                </a>
                            </li>
                            <li class="<?= $_SERVER['REQUEST_URI'] === '/market' ? 'active' : '' ?>">
                                <a href="market">
                                    <i class='bx bx-bar-chart-square'></i>
                                    <i class='bx bxs-bar-chart-square activeIcon'></i>
                                    <div class="app-navbar-name"><span>Market</span></div>
                                </a>
                            </li>
                            <li class="<?= $_SERVER['REQUEST_URI'] === '/fund' ? 'active' : '' ?>">
                                <a href="fund">
                                    <i class='bx bx-wallet icon'></i>
                                    <i class='bx bxs-wallet activeIcon'></i>
                                    <div class="app-navbar-name"><span>Fund</span></div>
                                </a>
                            </li>
                            <li class="<?= $_SERVER['REQUEST_URI'] === '/mail' ? 'active' : '' ?>">
                                <a href="mail">
                                    <i class='bx bx-message-rounded-dots icon'></i>
                                    <i class='bx bxs-message-rounded-dots activeIcon'></i>
                                    <div class="app-navbar-name"><span>Message</span></div>
                                    <span></span>
                                </a>
                            </li>
                            <!-- <div class="mobile-indicator"></div> -->
                        </ul>
                    </div>


                    <!-- <script>
                        const navBar = document.querySelector(".mobile-navbar")
                        allLi = document.querySelectorAll("li");

                        allLi.forEach((li, index) => {
                            li.addEventListener("click", e => {
                                e.preventDefault(); //preventing from submitting
                                navBar.querySelector(".active").classList.remove("active");
                                li.classList.add("active");

                                const indicator = document.querySelector(".mobile-indicator");
                                indicator.style.transform = `translateX(calc(${index * 90}px))`;
                            });
                        });
                    </script> -->



                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Modal Template -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="modalCenterTitle"></h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modaldata">

                        <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div> -->
                    </div>
                    <div class="p-0">
                        <button type="button" class="btn btn-success w-10 my-3" id="modalfooterbtn" onclick="$('#modalsubmit').click();">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php include 'footerincludes.php' ?>

</body>

</html>
<script>
    // Hide the preloader when the entire page has finished loading
    $(window).on('load', function() {
        console.log('hellloooo')
        $('#overlay').fadeOut('slow', function() {
            console.log('helllooooppppp')
            $(this).remove();
        });
    });
    // addoverlay()
    // setTimeout(() => {
    //     removeoverlay()
    // }, 1000);
</script>