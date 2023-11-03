<?php
$pstatus = $obj->selectfieldwhere('fundrequest', 'count(id)', "userid=" . $employeeid . " and paidfor = 'Membership' and status = 1");
$paypending = $obj->selectfieldwhere('fundrequest', 'count(id)', "userid=" . $employeeid . " and paidfor = 'Membership' and status = 0"); ?>

<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="dashboard">
                <img src="main\images\logo\Global.png" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
                <div class="btn-list">
                    <?php
                    if (empty($pstatus) && empty($paypending) && $membershipstatus === 'No') { ?>
                        <a data-bs-toggle="offcanvas" href="#offcanvasEnd99" role="button" aria-controls="offcanvasEnd99" class="btn py-2" target="_blank" rel="noreferrer">
                            <!-- Download SVG icon from    -->
                            <svg xmlns="http://www.w3.org/2000/svg" style="color: #db0b0b; stroke-width: 2px;" class="icon icon-tabler icon-tabler-shield-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17.67 17.667a12 12 0 0 1 -5.67 3.333a12 12 0 0 1 -8.5 -15c.794 .036 1.583 -.006 2.357 -.124m3.128 -.926a11.997 11.997 0 0 0 3.015 -1.95a12 12 0 0 0 8.5 3a12 12 0 0 1 -1.116 9.376"></path>
                                <path d="M3 3l18 18"></path>
                            </svg>
                            Activate Your Account
                        </a>
                    <?php } elseif (!empty($pstatus) || $membershipstatus === 'Yes') { ?>
                        <a class="btn py-2" target="_blank" rel="noreferrer">

                            <svg xmlns="http://www.w3.org/2000/svg" style="color: green; stroke-width: 2px;" class="icon icon-tabler icon-tabler-shield-star" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M11.143 20.743a12 12 0 0 1 -7.643 -14.743a12 12 0 0 0 8.5 -3a12 12 0 0 0 8.5 3c.504 1.716 .614 3.505 .343 5.237"></path>
                                <path d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z"></path>
                            </svg>
                            Account is Active
                        </a>
                    <?php } elseif (!empty($paypending)) { ?>
                        <a role="button" class="btn py-2" target="_blank" rel="noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" style="color: #fed000; stroke-width: 2px;" class="icon icon-tabler icon-tabler-clock-exclamation" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M20.986 12.502a9 9 0 1 0 -5.973 7.98"></path>
   <path d="M12 7v5l3 3"></path>
   <path d="M19 16v3"></path>
   <path d="M19 22v.01"></path>
</svg>
                        
                            Pending for Activation
                        </a>
                    <?php } ?>

                </div>
            </div>
            <div class="d-md-flex" style="display:flex; margin-right:10px;">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                    </svg>
                </a>
                <div class="nav-item d-md-flex me-3">
                    <a href="email" class="nav-link px-0">
                        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-cog" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 19h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v5"></path>
                            <path d="M3 7l9 6l9 -6"></path>
                            <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M19.001 15.5v1.5"></path>
                            <path d="M19.001 21v1.5"></path>
                            <path d="M22.032 17.25l-1.299 .75"></path>
                            <path d="M17.27 20l-1.3 .75"></path>
                            <path d="M15.97 17.25l1.3 .75"></path>
                            <path d="M20.733 20l1.3 .75"></path>
                        </svg>
                        <span class="badge bg-red"></span>
                    </a>

                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(<?= empty($avatarpath) ? 'main/images/user.jpeg' : $avatarpath ?>)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div><?= $username ?></div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                    <a href="account" class="dropdown-item">Settings</a>
                    <a href="logout" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>