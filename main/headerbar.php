<?php
$adminemail = '';
$adminpassword = '';
if (isset($_SESSION['adminid'])) {
    $adminemail = $obj->selectfieldwhere('users', "email", 'id=' . $_SESSION['adminid'] . '');
    $adminpassword = $obj->selectfieldwhere('users', "password", 'id=' . $_SESSION['adminid'] . '');
}
?>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none app-d-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="d-xl-none"><img style="margin-top: 2px;" width="40px" src="main/dist/userstuff/assets\img\logo\eagle-eye-icon.svg" alt=""></div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <!-- <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div> -->
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <?php
            if (isset($_SESSION['adminid'])) { ?>
                <button class='btn btn-primary' style="margin-right: 15px;" onclick='redir("<?php echo $adminemail; ?>", "<?php echo $adminpassword; ?>", "<?php echo $employeeid; ?>", "email", "password", "byuser", "<?= $redirecturl ?>/admin/checkadminlogin")' aria-label='Go'>
                    Switch to Admin
                </button>
                <div id='redirect'></div>
            <?php }
            ?>
            <li class="nav-item lh-1 me-3">
                <p class="mb-0"><?= $username ?></p>

            </li>

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="<?= empty($avatarpath) ? 'main/images/user.png' : "main/" . $avatarpath ?>" alt class="w-px-40 rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <span class="dropdown-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="<?= empty($avatarpath) ? 'main/images/user.png' : "main/" . $avatarpath ?>" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-medium d-block"><?= $username ?></span>
                                    <small><span>Client Id: </span><span><?= $obj->selectfieldwhere('users', 'usercode', "id=$employeeid") ?></span></small>
                                </div>
                            </div>
                        </span>
                    </li>
                    <li>
                        <div class="dropdown-divider m-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="profile">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li> -->

                    <li>
                        <div class="dropdown-divider m-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="logout">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>