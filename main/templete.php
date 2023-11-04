<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="main/dist/userstuff/assets/" data-template="vertical-menu-template-free">

<head>
    <?php include 'headincludes.php' ?>
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
                            <li class="active">
                                <a href="#">
                                    <i class='bx bx-home icon'></i>
                                    <i class='bx bxs-home activeIcon'></i>
                                    <div class="app-navbar-name"><span>Home</span></div>
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <i class='bx bx-folder-open icon'></i>
                                    <i class='bx bxs-folder-open activeIcon'></i>
                                    <div class="app-navbar-name"><span>Portfolio</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class='bx bx-bar-chart-alt-2' style="border: 1px solid; border-radius: 10px; padding: 5px; background: #7d2ae826;"></i>
                                    <i class='bx bxs-bar-chart-alt-2 activeIcon'></i>
                                    <div class="app-navbar-name" style="margin-top: 50px;"><span>Market</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class='bx bx-wallet icon'></i>
                                    <i class='bx bxs-wallet activeIcon'></i>
                                    <div class="app-navbar-name"><span>Fund</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class='bx bx-envelope-open icon'></i>
                                    <i class='bx bxs-envelope-open activeIcon'></i>
                                    <div class="app-navbar-name"><span>Email</span></div>
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
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now" style="display: none;">
        <a href="#" target="_blank" class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php include 'footerincludes.php' ?>

</body>

</html>