<nav>
  <div class="row">
    <div class="col-md-6">
      @yield('current_page')
    </div>
    <div class="col-md-6 text-right">
      <a href="{{ route('incharges.inbox') }}" class="{{ request()->routeIs('incharges.inbox') ? 'active' : '' }}">Inbox</a>
      <a href="{{ route('incharges.profile', Auth::user()->id) }}" class="{{ request()->routeIs('incharges.profile') ? 'active' : '' }}">My profile</a>
      <a href="{{ route('incharges.users') }}" class="{{ request()->routeIs('incharges.users') ? 'active' : '' }}">Users</a>
      <a href="" data-target="#logout" data-toggle="modal">Logout</a>
    </div>
  </div>
</nav>
<hr class="linya" />
