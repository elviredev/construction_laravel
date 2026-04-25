<header class="topbar">
  <div class="d-flex align-items-center gap-3">
    <button onclick="toggleSidebar()" class="topbar-btn d-lg-none">
      <i class="fa-solid fa-bars"></i>
    </button>
    <div class="topbar-search hidden-mobile">
      <i class="fa-solid fa-magnifying-glass"></i>
      <input type="text" placeholder="Search…">
    </div>
  </div>
  <div class="d-flex align-items-center gap-3">
    <a href="{{ url('/') }}" class="btn-primary-custom">FrontEnd</a>
    <div class="position-relative" id="userDropdown">
      <button onclick="$('#userMenu').toggleClass('show')" class="user-dropdown-btn">
        <img src="{{ asset('uploads/admin/'.Auth::guard('admin')->user()->photo) }}" alt="{{ Auth::guard('admin')->user()->name }}">
        <span class="hidden-mobile">{{ Auth::guard('admin')->user()->name }}</span>
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div id="userMenu" class="user-dropdown-menu">
        <a href="{{ route('admin_profile') }}">
          <i class="fa-regular fa-user"></i>Profile
        </a>
        <div class="text-danger">
          <form action="{{ route('admin_logout') }}" method="POST" >
            @csrf
            <button class="text-danger d-inline" type="submit" style="background: none; border: none; padding: 0.5rem 1rem; cursor: pointer; font-size: 0.875rem;">
              <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>