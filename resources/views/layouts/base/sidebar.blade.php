<nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
      <span class="align-middle">Cargo APP</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-header">
        Pages
      </li>

      <li class="sidebar-item {{ Request::Is('dashboard*') ? 'active' : '' }}">
        <a class="sidebar-link" href="/dashboard">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </a>
      </li>

      <li class="sidebar-item {{ request()->is('customers*') ? 'active' : '' }}">
        <a class="sidebar-link" href="/customers">
          <i class="align-middle" data-feather="users"></i> <span class="align-middle">Customers</span>
        </a>
      </li>

      <li class="sidebar-item {{ request()->is('armadas*') ? 'active' : '' }}">
        <a class="sidebar-link" href="/armadas">
          <i class="align-middle" data-feather="users"></i> <span class="align-middle">Aramada</span>
        </a>
      </li>
    </ul>

  </div>
</nav>
