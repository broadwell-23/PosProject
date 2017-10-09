<!-- top header -->
<header class="header navbar">

  <div class="brand visible-xs">
    <!-- toggle offscreen menu -->
    <div class="toggle-offscreen">
      <a href="#" class="hamburger-icon visible-xs" data-toggle="offscreen" data-move="ltr">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>
    <!-- /toggle offscreen menu -->

    <!-- logo -->
    <div class="brand-logo">
      <img src="images/logo-dark.png" height="15" alt="">
    </div>
    <!-- /logo -->

    <!-- toggle chat sidebar small screen-->
    <div class="toggle-chat">
      <a href="javascript:;" class="hamburger-icon v2 visible-xs" data-toggle="layout-chat-open">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>
    <!-- /toggle chat sidebar small screen-->
  </div>

  <ul class="nav navbar-nav hidden-xs">
    <li>
      <p class="navbar-text">
        @yield('title')
      </p>
    </li>
  </ul>

  <ul class="nav navbar-nav navbar-right hidden-xs">
    <li>
      <a href="javascript:;" data-toggle="dropdown">
        <img src="images/avatar.jpg" class="header-avatar img-circle ml10" alt="user" title="user">
        <span class="pull-left">Samuel Perkins</span>
      </a>
      <ul class="dropdown-menu">
        <li>
          <a href="/logout">Logout</a>
        </li>
      </ul>

    </li>
  </ul>
</header>
<!-- /top header -->