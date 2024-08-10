<nav>
  <div class="row">
    <div class="col-md-6">
      @yield('current_page')
    </div>
    <div class="col-md-6 text-right">
      <a href="{{ route('admins.inbox') }}" class="{{ request()->routeIs('admins.inbox') ? 'active' : '' }}">Inbox</a>
      <a href="{{ route('admins.profile', Auth::user()->id) }}" class="{{ request()->routeIs('admins.profile') ? 'active' : '' }}">My profile</a>
      <a href="{{ route('admins.users') }}" class="{{ request()->routeIs('admins.users') ? 'active' : '' }}">Users</a>
      <a href="{{ route('admins.incharges') }}" class="{{ request()->routeIs('admins.incharges') ? 'active' : '' }}">Incharge</a>
      <a href="" data-target="#logout" data-toggle="modal">Logout</a>
    </div>
  </div>
</nav>
<hr class="linya" />