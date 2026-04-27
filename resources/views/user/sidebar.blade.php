<ul>
  <li>
    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <i class="fa-regular fa-user"></i> Dashboard
    </a>
  </li>
  <li>
    <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">
      <i class="fa-regular fa-pen-to-square"></i> Profile
    </a>
  </li>
  <li>
    <a href=""><i class="fa-regular fa-bag-shopping"></i> My Orders
    </a>
  </li>
  <li>
    <a href="">
      <i class="fa-regular fa-heart"></i> Wishlist
    </a>
  </li>
  <li>
    <div class="text-danger">
      <form action="{{ route('logout') }}" method="POST" >
        @csrf
        <button class="text-danger d-inline" type="submit" style="background: none; border: none; padding: 0.5rem 1rem; cursor: pointer; font-size: 1rem;">
          <i class="fa-solid fa-right-from-bracket me-3"></i>Logout
        </button>
      </form>
    </div>
  </li>
</ul>