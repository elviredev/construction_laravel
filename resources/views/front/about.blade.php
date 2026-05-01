@extends('front.layouts.master')

@section('banner')
<section class="tmp-breadcrumb-area bg-image banner-bg" style="background-image: url({{ asset('uploads/front/banner.png') }});">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-content-main text-center">
          <h1 class="title text-white fw-bold display-4 mb-3">About Us</h1>

          <nav aria-label="breadcrumb">
            <ul class="breadcrumb justify-content-center align-items-center mb-0">
              <li class="breadcrumb-item"><i class="fa-solid fa-house text-primary-orange"></i>
                <a href="{{ route('home') }}"
                class="text-white text-decoration-none opacity-75">Home</a>
              </li>
              <li class="breadcrumb-item active text-white fw-bold" aria-current="page">
                About Us
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<!-- ========= About section start ======== -->
<section class="px-3 overflow-hidden">
  <div class="container py-24">
    <div class="row align-items-center g-5">
      <div class="col-md-5">
        <div class="position-relative about-img-wrapper">
          <img
          loading="lazy"
          src="{{ asset('uploads/front/shape-01.svg') }}" alt="shape"
          class="position-absolute about-shape1">

          <img
          loading="lazy"
          src="{{ asset('uploads/admin/'.$aboutItem?->image) }}"
          class="img-fluid rounded-3 position-relative z-1"
          alt="construction_image">

          <img
          loading="lazy"
          src="{{ asset('uploads/front/shape-02.svg') }}" alt="shape"
          class="position-absolute about-shape2">

          <div
          class="counter-badge position-absolute bg-white shadow p-4 rounded-3 d-flex align-items-center z-2">
            <div>
              <h3 class="h2 fw-bold mb-0 text-primary">{{ $aboutItem?->experience_year }}</h3>
              <p class="small text-muted mb-0">{{ $aboutItem?->experience_text }}</p>
            </div>
          </div>

          <a href="https://www.youtube.com/watch?v={{ $aboutItem?->youtube_id }}"
          class="glightbox video-play-btn about-play-btns  mb-4 me-4 z-30 text-decoration-none">
              <span class="play-icon shadow-lg">
                <i class="fa-solid fa-play"></i>
              </span>
          </a>
        </div>
      </div>

      <div class="col-md-7">
        <div class="section-title">
          <p class="text-primary fw-bold text-uppercase mb-2">{{ $aboutItem?->subtitle }}</p>
          <h2 class="main-title fw-600 mb-4">{!! nl2br(e($aboutItem?->title)) !!}</h2>
          <p class="description">{!! nl2br(e($aboutItem?->text)) !!}</p>
        </div>

        <div class="">
          <div class="d-flex align-items-center mb-30">
            <div class="call-icon bg-light p-3 rounded-circle me-3 border">
              <i class="fa-solid fa-phone-volume text-primary fs-4"></i>
            </div>
            <div>
              <p class="text-muted mb-2">{{ $aboutItem?->phone_text }}</p>
              <a href="tel:{{ $aboutItem?->phone_number }}"
              class="h6 fw-bold text-decoration-none text-dark">{{ $aboutItem?->phone_number }}</a>
            </div>
          </div>
          <a href="{{ $aboutItem?->button_link }}" class="primary-btns hover-icon-reverse">
              <span class="btn-text-content">
                <span class="btn-icon-wrapper">
                  <span class="btn-icon">
                    <i class="fa-solid fa-phone"></i>
                  </span>
                  <span class="btn-text">{{ $aboutItem?->button_text }}</span>
                </span>
              </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ========= About section end ======== -->

<!-- ========= service section start ======== -->
<section class="services-section px-3">
  <div class="container py-24">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 col-md-7">
        <span class="sub-title">OUR SERVICES —</span>
        <h2 class="main-title">Our Recently <br> Completed Services</h2>
      </div>
      <div class="col-lg-5 offset-lg-1 col-md-5 mt-3 mt-md-0">
        <p class="description mb-0">
          Safety is at the core of everything we do. We maintain strict safety protocols and
          provide ongoing training to our team to ensure a safe working environment. Our
          commitment to safety.
        </p>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="service-card p-4 h-100">
          <div class="card-icon mb-4">
            <img src="{{ asset('uploads/front/30.svg') }}" alt="Icon" width="55">
          </div>
          <h3 class="card-title">Modern Building Solutions</h3>
          <p class="card-text">We deliver innovative construction services that ensure strong
            foundations, durable structures, and efficient project execution.</p>

          <a href="service-details.html" class="read-more-btn">
            <span class="ms-3">Read More</span>
            <div class="arrow-circle">
              <span class="arrow-icon">↗</span>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="service-card p-4 h-100 position-relative">
          <div class="popular-ribbon">Popular</div>
          <div class="card-icon mb-4">
            <img src="{{ asset('uploads/front/30.svg') }}" alt="Icon" width="55">
          </div>
          <h3 class="card-title">Residential Construction</h3>
          <p class="card-text">We build high-quality homes with modern design, long-lasting
            materials, and complete attention to every detail of your project.</p>

          <a href="service-details.html" class="read-more-btn">
            <span class="ms-3">Read More</span>
            <div class="arrow-circle">
              <span class="arrow-icon">↗</span>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="service-card p-4 h-100">
          <div class="card-icon mb-4">
            <img src="{{ asset('uploads/front/30.svg') }}" alt="Icon" width="55">
          </div>
          <h3 class="card-title">Commercial Project Build</h3>
          <p class="card-text">Our team handles commercial building projects with strategic planning,
            quality materials, and an efficient construction process.</p>

          <a href="service-details.html" class="read-more-btn">
            <span class="ms-3">Read More</span>
            <div class="arrow-circle">
              <span class="arrow-icon">↗</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ========= service section end ======== -->

<!-- =========  Testimonials section Start ======== -->
<section class="testimonial-area py-5 bg-white position-relative">
  <div class="container py-24">
    <div class="row mb-5 text-center">
      <div class="col-12">
        <p class="sub-title">OUR TESTIMONIAL</p>
        <h2 class="main-title">Chosen by Industry Leaders <br> Worldwide</h2>
      </div>
    </div>

    <div class="slider-container-relative position-relative px-md-5">
      <div class="owl-carousel owl-theme testimonial-slider-3">
        @foreach($testimonials as $testimonial)
          <div class="item  border shadow-sm px-40">
            <div class="testimonial-card py-50 m-2 bg-white h-100">
              <div class="author-info d-flex align-items-center mb-4">
                <img src="{{ $testimonial->image ? asset('uploads/admin/'.$testimonial->image) : asset('uploads/front/user-1.jpg') }}"
                class="rounded-circle me-3 border-2 border-white shadow-sm size-60"
                alt="author">
                <div>
                  <h4 class="mb-0 fw-bold">{{ $testimonial->name }}</h4>
                  <p class="text-muted mb-0">{{ $testimonial->designation }}</p>
                </div>
              </div>
              <p class="testimonial-text text-muted mb-3 flex-grow-1">
                {{ \Illuminate\Support\Str::words($testimonial->comment, 40, '...') }}
              </p>
              <div class="star-rating text-warning small mt-auto">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                class="fas fa-star"></i><i class="fas fa-star"></i><i
                class="fas fa-star"></i>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </div>
</section>
<!-- =========  Testimonials section end ======== -->
@endsection