<nav id="main-nav" class="navbar navbar-expand-lg navbar-dark {{ request()->routeIs('home') ? 'home-navigation' : 'main-navigation' }} py-3">
  <div class="container">

    @if(request()->routeIs('home'))
      <a class="navbar-brand" href="{{ route('home') }}">
        <img class="logo-default" src="{{ asset('uploads/front/logo-white.png') }}" alt="Construction">
        <img class="logo-sticky" src="{{ asset('uploads/front/logo.png') }}" alt="Construction">
      </a>
    @else
      <a class="navbar-brand" href="{{ route('home') }}">
        <img class="logo-sticky" src="{{ asset('uploads/front/logo.png') }}" alt="Construction">
      </a>
    @endif

    <button class="navbar-toggler  border-0 shadow-none" type="button" data-bs-toggle="offcanvas"
    data-bs-target="#drawer-navigation">
      <i class="fa-solid fa-bars toggler-icon-style"></i>
    </button>

    <div class="collapse navbar-collapse gap-3" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center gap-2">
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="service.html">Services</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown">Pages</a>
          <ul class="dropdown-menu border-0">
            <li><a class="dropdown-item" href="events.html">Our Event</a></li>
            <li><a class="dropdown-item" href="team-member.html">Team Member</a></li>
            <li><a class="dropdown-item" href="projects.html">Projects</a></li>
            <li><a class="dropdown-item" href="shop.html">Shop</a></li>
            <li><a class="dropdown-item" href="{{ route('gallery') }}">Gallery</a></li>
            <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="blogs.html">Blogs</a></li>
        <li class="nav-item me-3"><a class="nav-link" href="contact.html">Contact</a></li>
        <li class="nav-item me-4">
          <div class="text-white cursor-pointer position-relative">
            <a href="cart.html">
              <i class="fa-solid fa-cart-plus" id="drawer-cart-icon"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger fs-10">
                  10
                </span>
            </a>
          </div>
        </li>
      </ul>

      <a href="{{ route('login') }}" class="primary-btns hover-icon-reverse d-md-none d-lg-none d-xl-block">
          <span class="btn-text-content">
            <span class="btn-icon-wrapper">
               <span class="btn-text">Login</span>
            </span>
          </span>
      </a>
    </div>
  </div>
</nav>