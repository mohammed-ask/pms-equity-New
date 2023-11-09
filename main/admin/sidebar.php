<!-- Sidebar -->
<aside class="navbar navbar-vertical navbar-expand-lg navbar-transparent">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark mt-3">
      <a href="#">
        <img src="../main\images\pmslogo.png" width="110" height="32" alt="Tabler" class="navbar-brand-image">
      </a>
    </h1>
    <div class="navbar-nav flex-row d-lg-none">
      <div class="nav-item d-none d-lg-flex me-3">

      </div>
      <div class="d-none d-lg-flex">
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
        <div class="nav-item dropdown d-none d-md-flex me-3">

        </div>
      </div>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown">
          <span class="avatar avatar-sm" style="background-image: url(../main/images/user.jpeg)"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a data-bs-toggle="modal" data-bs-target="#modal-report" onclick='dynamicmodal("none", "adminprofile", "", "Admin Profile")' class="dropdown-item">Profile</a>
          <a href="logout" class="dropdown-item">Logout</a>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="sidebar-menu">
      <ul class="navbar-nav pt-lg-3">
        <li class="nav-item">
          <a class="nav-link" href="index">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
              </svg>
            </span>
            <span class="nav-link-title">
              Home
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aitraders">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19.494 9.05a8.14 8.14 0 0 0-4.544-4.544C14.713 3.088 13.485 2 12 2S9.287 3.088 9.05 4.506A8.136 8.136 0 0 0 4.506 9.05C3.088 9.287 2 10.515 2 12s1.088 2.713 2.506 2.95a8.14 8.14 0 0 0 4.544 4.544C9.287 20.912 10.515 22 12 22s2.713-1.088 2.95-2.506a8.14 8.14 0 0 0 4.544-4.544C20.912 14.713 22 13.485 22 12s-1.088-2.713-2.506-2.95zM12 4a1 1 0 0 1 1 1c0 .06-.023.11-.034.167a1.015 1.015 0 0 1-.083.279c-.014.027-.034.049-.051.075a1.062 1.062 0 0 1-.16.209c-.04.037-.09.062-.136.092-.054.036-.104.078-.165.103-.115.047-.239.075-.371.075s-.256-.028-.371-.075c-.061-.024-.111-.066-.165-.103-.046-.03-.096-.055-.136-.092a1.062 1.062 0 0 1-.16-.209c-.017-.026-.037-.048-.051-.075a1.026 1.026 0 0 1-.083-.279C11.023 5.11 11 5.06 11 5a1 1 0 0 1 1-1zm-7 7c.06 0 .11.023.167.034.099.017.194.041.279.083.027.014.049.034.075.051.075.047.149.097.209.16.037.04.062.09.092.136.036.054.078.104.103.165.047.115.075.239.075.371s-.028.256-.075.371c-.024.061-.066.111-.103.165-.03.046-.055.096-.092.136-.06.063-.134.113-.209.16-.026.017-.048.037-.075.051a1.026 1.026 0 0 1-.279.083C5.11 12.977 5.06 13 5 13a1 1 0 0 1 0-2zm7 9a1 1 0 0 1-1-1c0-.06.023-.11.034-.167.017-.099.041-.194.083-.279.014-.027.034-.049.051-.075.047-.075.097-.149.16-.209.04-.037.09-.062.136-.092.054-.036.104-.078.165-.103.115-.047.239-.075.371-.075s.256.028.371.075c.061.024.111.066.165.103.046.03.096.055.136.092.063.06.113.134.16.209.017.026.037.048.051.075.042.085.066.181.083.279.011.057.034.107.034.167a1 1 0 0 1-1 1zm2.583-2.512c-.006-.011-.017-.019-.022-.029a3.007 3.007 0 0 0-.996-1.007c-.054-.033-.109-.06-.166-.09a2.902 2.902 0 0 0-.486-.205c-.064-.021-.128-.044-.194-.061-.233-.057-.471-.096-.719-.096s-.486.039-.718.097c-.066.017-.13.039-.195.061a2.928 2.928 0 0 0-.485.205c-.056.029-.112.057-.166.09a3.007 3.007 0 0 0-.996 1.007c-.006.011-.017.019-.022.029a6.15 6.15 0 0 1-2.905-2.905c.011-.006.019-.017.029-.022a3.007 3.007 0 0 0 1.007-.996c.033-.054.061-.11.09-.166.083-.154.15-.316.205-.485.021-.065.044-.129.061-.195.056-.234.095-.472.095-.72s-.039-.486-.097-.718a2.568 2.568 0 0 0-.061-.194 2.902 2.902 0 0 0-.205-.486c-.03-.057-.057-.112-.09-.166A3.007 3.007 0 0 0 6.54 9.44c-.01-.006-.018-.017-.028-.023a6.15 6.15 0 0 1 2.905-2.905c.006.01.017.018.022.029.248.411.588.755.996 1.007.054.033.11.061.166.09.155.083.316.15.486.205.064.021.128.044.194.061.233.057.47.096.719.096a2.94 2.94 0 0 0 .912-.158c.17-.055.331-.122.486-.205.056-.029.112-.057.166-.09.408-.252.748-.596.996-1.007.006-.011.017-.019.022-.029a6.15 6.15 0 0 1 2.905 2.905c-.011.006-.019.017-.029.022a3.007 3.007 0 0 0-1.007.996c-.033.054-.061.11-.09.166-.083.155-.15.316-.205.486-.021.064-.044.128-.061.194A3.07 3.07 0 0 0 16 12a2.94 2.94 0 0 0 .158.912c.055.17.122.331.205.486.029.056.057.112.09.166.252.408.596.748 1.007.996.011.006.019.017.029.022a6.145 6.145 0 0 1-2.906 2.906zM19 13c-.06 0-.11-.023-.167-.034a1.015 1.015 0 0 1-.279-.083c-.027-.014-.049-.034-.075-.051a1.062 1.062 0 0 1-.209-.16c-.037-.04-.062-.09-.092-.136-.036-.054-.078-.104-.103-.165-.047-.115-.075-.239-.075-.371s.028-.256.075-.371c.024-.061.066-.111.103-.165.03-.046.055-.096.092-.136.06-.063.134-.113.209-.16.026-.017.048-.037.075-.051.085-.042.181-.066.279-.083.057-.011.107-.034.167-.034a1 1 0 0 1 0 2z"></path>
              </svg>
            </span>
            <span class="nav-link-title">
              AI Traders
            </span>
          </a>
        </li>
        <?php if (in_array(4, $permissions) || in_array(14, $permissions) || in_array(43, $permissions)) { ?>
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-user" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
              <span class="nav-link-icon d-md-none d-lg-inline-block"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Users Overview
              </span>
            </a>
            <div class="dropdown-menu ">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                  <?php if (in_array(4, $permissions)) { ?>
                    <a class="dropdown-item" href="users">
                      Users List
                    </a>
                  <?php } ?>
                  <?php if (in_array(43, $permissions)) { ?>
                    <a class="dropdown-item" href="employeeusers">
                      Employee Users
                    </a>
                  <?php } ?>
                  <?php if (in_array(14, $permissions)) { ?>
                    <a class="dropdown-item" href="userlogindetails">
                      Login Time Detail
                    </a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </li>
        <?php } ?>
        <?php if (in_array(8, $permissions) || in_array(18, $permissions)) { ?>
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-role" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
              <span class="nav-link-icon d-md-none d-lg-inline-block"> <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                  <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                  <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                  <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Role Management
              </span>
            </a>
            <div class="dropdown-menu ">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                  <a class="dropdown-item" href="viewrole">
                    Roles
                  </a>
                </div>

              </div>
            </div>
          </li>
        <?php } ?>
        <?php if (in_array(22, $permissions) || in_array(23, $permissions)) { ?>
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-role" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
              <span class="nav-link-icon d-md-none d-lg-inline-block"> <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                  <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                  <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                  <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Positions </span>
            </a>
            <div class="dropdown-menu ">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                  <?php if (in_array(22, $permissions)) { ?>
                    <a class="dropdown-item" href="todaytransactions">
                      Today's Positions
                    </a>
                  <?php } ?>
                  <?php if (in_array(23, $permissions)) { ?>
                    <a class="dropdown-item" href="alltransactions">
                      All Positions
                    </a>
                  <?php } ?>
                  <?php if (in_array(23, $permissions)) { ?>
                    <a class="dropdown-item" href="closetrades">
                      Close Positions
                    </a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </li>
        <?php } ?>
        <?php if (in_array(15, $permissions) || in_array(16, $permissions) || in_array(17, $permissions)) { ?>
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-mail" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                  <path d="M3 7l9 6l9 -6"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Email
              </span>
            </a>
            <div class="dropdown-menu ">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                  <?php if (in_array(15, $permissions)) { ?>
                    <a class="dropdown-item" href="composemail">
                      Compose Mail
                    </a>
                  <?php } ?>
                  <?php if (in_array(16, $permissions)) { ?>
                    <a class="dropdown-item" href="viewinbox">
                      Inbox
                    </a>
                  <?php } ?>
                  <?php if (in_array(17, $permissions)) { ?>
                    <a class="dropdown-item" href="sentmails">
                      Sent Mail
                    </a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </li>
        <?php } ?>
        <?php if (in_array(24, $permissions)) { ?>
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-mail" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
              <span class="nav-link-icon d-md-none d-lg-inline-block"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                  <path d="M12 7v5l3 3"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Pending Approvals
              </span>
            </a>
            <div class="dropdown-menu ">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                  <?php if (in_array(24, $permissions) || in_array(45, $permissions) || in_array(46, $permissions)) {
                  ?>
                    <a class="dropdown-item" href="pendingapproval">
                      Pending User
                    </a>
                  <?php }
                  ?>
                  <?php if (in_array(45, $permissions)) {
                  ?>
                    <a class="dropdown-item" href="pendingactivation">
                      Pending Activiation
                    </a>
                  <?php }
                  ?>
                  <?php if (in_array(46, $permissions)) {
                  ?>
                    <a class="dropdown-item" href="pendingplan">
                      Pending Plan Membership
                    </a>
                  <?php }
                  ?>
                </div>
              </div>
            </div>
          </li>
        <?php } ?>
        <?php if (in_array(12, $permissions)) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="allinvestment">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-badge" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M17 17v-13l-5 3l-5 -3v13l5 3z"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Investment
              </span>
            </a>
          </li>
        <?php } ?>
        <?php if (in_array(29, $permissions)) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="withdrawalrequest">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-badge" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M17 17v-13l-5 3l-5 -3v13l5 3z"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Withdrawal Requests
              </span>
            </a>
          </li>
        <?php } ?>
        <?php if (in_array(12, $permissions)) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="employeelist">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Employees
              </span>
            </a>
          </li>
        <?php } ?>
        <?php if (in_array(12, $permissions)) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="settings">
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments-horizontal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M14 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                  <path d="M4 6l8 0"></path>
                  <path d="M16 6l4 0"></path>
                  <path d="M8 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                  <path d="M4 12l2 0"></path>
                  <path d="M10 12l10 0"></path>
                  <path d="M17 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                  <path d="M4 18l11 0"></path>
                  <path d="M19 18l1 0"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Settings
              </span>
            </a>
          </li>
        <?php } ?>
        <!-- <li class="nav-item active dropdown">
          <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
              </svg>
            </span>
            <span class="nav-link-title">
              Layout
            </span>
          </a>
          <div class="dropdown-menu show">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item" href="https://preview.tabler.io/layout-horizontal.html">
                  Horizontal
                </a>
                <a class="dropdown-item" href="https://preview.tabler.io/layout-boxed.html">
                  Boxed
                  <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                </a>
                <a class="dropdown-item" href="https://preview.tabler.io/layout-vertical.html">
                  Vertical
                </a>
              </div>

            </div>
          </div>
        </li> -->
      </ul>
    </div>
  </div>
</aside>