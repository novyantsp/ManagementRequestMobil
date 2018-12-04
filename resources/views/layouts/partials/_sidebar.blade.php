<ul class="sidebar navbar-nav">
  <li class="nav-item {{ request()->is('admin') ? ' active' : '' }}">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item {{ request()->is('admin/addunit') ? ' active' : '' }}">
    <a class="nav-link" href="{{ route('admin.addunit') }}">
      <i class="fas fa-fw fa-plus-square"></i>
      <span>Tambah Unit</span></a>
  </li>
  <li class="nav-item {{ request()->is('admin/listunit') ? ' active' : '' }}">
    <a class="nav-link" href="{{ route('admin.showunit') }}">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Daftar Unit</span></a>
  </li>
  <li class="nav-item {{ request()->is('admin/listrequest') ? ' active' : '' }}">
    <a class="nav-link" href="{{ route('admin.listrequest') }}">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Daftar Request</span></a>
  </li>
  <li class="nav-item {{ request()->is('admin/listuser') ? ' active' : '' }}">
    <a class="nav-link" href="{{ route('admin.showuser') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>Daftar User</span></a>
  </li>
</ul>
