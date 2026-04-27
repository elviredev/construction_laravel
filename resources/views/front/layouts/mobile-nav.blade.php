<div class="offcanvas offcanvas-end  text-white drawer-nav-style" tabindex="-1" id="drawer-navigation">
  <div class="offcanvas-header border-bottom border-secondary">
    <img src="{{ asset('uploads/front/logo-white.png') }}" class="filter-invert h-60px" alt="Kiddos" />
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
    aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column fw-bold text-uppercase">
      <li class="nav-item"><a class="nav-link text-white py-3"
        href="{{ route('home') }}">Home</a></li>
      <li class="mobile-nav-item nav-item">
        <a class="nav-link text-white py-3 d-flex justify-content-between align-items-center p-3 cursor-pointer"
        data-bs-toggle="collapse" data-bs-target="#mobileCategoryWrapper" role="button"
        aria-expanded="false">
          Pages
          <i class="fa-solid fa-angle-down small transition-icon"></i>
        </a>
        <div class="collapse" id="mobileCategoryWrapper">
          <div class="accordion accordion-flush" id="categoryAccordionMobile">
            <ul class="list-unstyled mb-0 ms-3 ps-3">
              <li><a class="text-decoration-none text-white d-block py-2 hover-pink-text small"
                href="events.html">Our Event</a></li>
              <li><a class="text-decoration-none text-white d-block py-2 hover-pink-text small"
                href="team-member.html">Team Member</a></li>
              <li><a class="text-decoration-none text-white d-block py-2 hover-pink-text small"
                href="projects.html">Projects</a></li>
              <li><a class="text-decoration-none text-white d-block py-2 hover-pink-text small"
                href="shop.html">Shop</a></li>
              <li><a class="text-decoration-none text-white d-block py-2 hover-pink-text small"
                href="gallery.html">Gallery</a></li>
              <li><a class="text-decoration-none text-white d-block py-2 hover-pink-text small"
                href="faq.html">FAQ</a></li>
            </ul>
          </div>
        </div>
      </li>
      <li class="nav-item"><a class="nav-link text-white py-3" href="{{ route('about') }}">About Us</a></li>
      <li class="nav-item"><a class="nav-link text-white py-3" href="service.html">Services</a></li>
      <li class="nav-item"><a class="nav-link text-white py-3" href="blogs.html">Blogs</a></li>
      <li class="nav-item me-3"><a class="nav-link text-white py-3" href="contact.html">Contact</a>
      </li>
    </ul>
  </div>
</div>