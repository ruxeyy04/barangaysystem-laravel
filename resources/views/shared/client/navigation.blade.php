<nav>
  <div class="row">
    <div class="col-md-6">
      @yield('current_page')
    </div>
    <div class="col-md-6 text-right">
      <a href="{{ route('clients.index') }}" class="{{ request()->routeIs('clients.index') ? 'active' : '' }}">Service</a>
      <a href="{{ route('clients.inbox', Auth::user()->id) }}" class="{{ request()->routeIs('clients.inbox') ? 'active' : '' }}">Inbox</a>
      <a href="{{ route('clients.profile', Auth::user()->id) }}" class="{{ request()->routeIs('clients.profile') ? 'active' : '' }}">My profile</a>
      <a href="" data-target="#logout" data-toggle="modal">Logout</a>
    </div>
  </div>
</nav>
<hr class="linya" />
