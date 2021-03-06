<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ route('manage-home')}}">
    <img src="{{ asset('img/brand/manage.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
    Hello {{ Auth::user()->name }} !

  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item {{{ ( isset($page) && $page=='posts'? 'active' : '') }}}">
        <a class="nav-link" href="{{ route('manage-posts') }}">Mes posts</a>
      </li>
      <li class="nav-item {{{ ( isset($page) && $page=='bars'? 'active' : '') }}}">
        <a class="nav-link" href="{{ route('manage-bars') }}">Mes bars</a>
      </li>
      <li class="nav-item {{{ ( isset($page) && $page=='events'? 'active' : '') }}}">
        <a class="nav-link" href="{{ route('manage-events') }}">Mes évenements</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item" style="margin-top: 3px;">
        <a class="nav-link" href="{{ route('home') }}">Retour au site</a>
      </li>
      @if (Route::has('login'))
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
          <img src="{{ Auth::user()->getFirstMedia('avatar-user')->getUrl() }}" class="avatar img-responsive">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <h6 class="dropdown-header"></h6>
          <a class="dropdown-item" href="{{ route('profile', \Auth::user()->name) }}"><span class="icon icon-user"></span> Profile</a>
          <a class="dropdown-item" href="{{ route('logout') }}"><span class="icon icon-exit"></span> Logout</a>
        </div>
      </li>
      @endauth
      @endif
    </ul>
  </div>
</nav>