<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      
      <div class="sidebar-brand-text mx-3">Finance Tracker </div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('categories') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Category</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('finance') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Finance</span></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="/profile">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Profile</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    
  </ul>