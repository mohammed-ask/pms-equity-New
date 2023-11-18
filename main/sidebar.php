<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span>
        <img width="100%" src="main\dist\userstuff\assets\img\logo\eagle-eye.svg" alt="">
      </span>

    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->

    <li class="<?= $_SERVER['REQUEST_URI'] === '/dashboard' ? 'menu-item active open' : 'menu-item open' ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboards">Dashboards</div>
        <!-- <div class="badge bg-danger rounded-pill ms-auto"></div> -->
      </a>
      <ul class="menu-sub">
        <li class="menu-item c">
          <a href="dashboard" class="menu-link">
            <div data-i18n="Analytics">Overview</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="portfolio" class="menu-link">
            <div data-i18n="eCommerce">AI Trading</div>
            <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">New</div>
          </a>
        </li>


      </ul>
    </li>


    <!-- Cards -->

    <li class="<?= $_SERVER['REQUEST_URI'] === '/market' ? 'menu-item active' : 'menu-item' ?>">
      <a href="market" class="menu-link">
        <i class="menu-icon tf-icons bx bx-bar-chart-alt"></i>
        <div data-i18n="Basic">Live Market</div>
      </a>
    </li>

    <li class="<?= $_SERVER['REQUEST_URI'] === '/portfolio' ? 'menu-item active' : 'menu-item' ?>">
      <a href="portfolio" class="menu-link">
        <i class="menu-icon tf-icons bx bx-briefcase-alt-2"></i>
        <div data-i18n="Basic">Portfolio</div>
      </a>
    </li>

    <li class="<?= $_SERVER['REQUEST_URI'] === '/mail' ? 'menu-item active' : 'menu-item' ?>">
      <a href="mail" class="menu-link">
        <i class="menu-icon tf-icons bx bx-mail-send"></i>
        <div data-i18n="Basic">Email</div>
      </a>
    </li>

    <li class="<?= $_SERVER['REQUEST_URI'] === '/fund' ? 'menu-item active' : 'menu-item' ?>">
      <a href="fund" class="menu-link">
        <i class="menu-icon tf-icons bx bx-wallet"></i>
        <div data-i18n="Basic">Fund</div>
      </a>
    </li>

    <!-- Components -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Profile Section</span></li>

    <li class="<?= $_SERVER['REQUEST_URI'] === '/profile' ? 'menu-item active' : 'menu-item' ?>">
      <a href="profile" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-user"></i>
        <div data-i18n="Basic">Profile</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="logout" class="menu-link">
        <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
        <div data-i18n="Basic">Logout</div>
      </a>
    </li>

  </ul>
</aside>