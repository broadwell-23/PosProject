<!-- top header -->
<header class="header navbar">

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
        <img src="{{ asset('images/avatar.jpg') }}" class="header-avatar img-circle ml10" alt="user" title="user">
        <span class="pull-left">{{ Auth::user()->name }}</span>
      </a>
      <ul class="dropdown-menu">
        <li>
          <a href="{{ route('logout') }}">Logout</a>
        </li>
      </ul>

    </li>
  </ul>
</header>
<!-- /top header -->