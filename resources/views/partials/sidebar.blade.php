<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light shadow-right accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a style="box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);" class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
    <div class="sidebar-brand-icon rotate-n-15">
      <i style="color: #486EDB;" class="fas fa-cubes fa-2x"></i>
    </div>
    <div class="sidebar-brand-text text-black mx-3">Raharcons</div>
  </a>

  <!-- Divider -->
  <hr style="border-top: 1px solid #eaecf4;" class="sidebar-divider" >

  <div class="sidebar-heading text-gray-600">
    Menu
  </div>

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ ($title === "Dashboard") ? 'active' : '' }}">
    <a class="nav-link text-black" href="/dashboard">
      <i class="fas fa-fw fa-wave-square"></i>
      <span style="font-size: 14px;">Dashboard</span>
    </a>
  </li>

  <!-- Nav Item - Project Detail -->
  <li class="nav-item {{ ($title === "Project") ? 'active' : '' }}">
    <a class="nav-link text-black" href="/project">
      <i class="fas fa-fw fa-folder"></i>      
      <span style="font-size: 14px;">Project</span>
    </a>
  </li>

  @if(auth()->user()->level != 1)
  <!-- Nav Item - Request Detail -->
  <li class="nav-item {{ ($title === "Request") ? 'active' : '' }}">
    <a class="nav-link text-black" href="{{  route('request.index') }}">
      <i class="fas fa-fw fa-comments"></i>      
      <span style="font-size: 14px;">Request</span>
    </a>
  </li>
  @endif

  @if(auth()->user()->level == 2)
  <!-- Nav Item - Data User -->
  <li class="nav-item {{ ($title === "Data User") ? 'active' : '' }}">
    <a class="nav-link text-black" href="/user">
      <i class="fas fa-fw fa-user"></i>      
      <span style="font-size: 14px;">Data User</span>
    </a>
  </li>
  @endif

  <!-- Divider -->
  <hr style="border-top: 1px solid #eaecf4;" class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->