@extends('front.layouts.master')

@section('content')
  <!-- ========= Hero section start ======== -->
  <section class="hero-slider-section">
    <div class="hero-slider owl-carousel owl-theme">
      @foreach($sliders as $slider)
        <div class="hero-slide-item banner-five-main-wrapper bg-style"
      style="background-image: url('{{ $slider->image ? asset('uploads/admin/'.$slider->image) : asset('uploads/front/slider-default.jpg') }}');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7 text-white">
              <h1 class="mb-4 hero-slider-title">{{ $slider->title }}</h1>
              <p class="hero-slide-paragraph">{!! nl2br($slider->text) !!}</p>
              @if($slider->button_link && $slider->button_text)
              <div>
                <a href="{{ $slider->button_link }}" class="primary-btns hover-icon-reverse">
                  <span class="btn-text-content">
                    <span class="btn-icon-wrapper">
                      <span class="btn-text">{{ $slider->button_text }}</span>
                      <span class="btn-icon-hover">
                        <i class="fa-solid fa-arrow-right"></i>
                      </span>
                    </span>
                  </span>
                </a>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- ========= Hero section end ======== -->

  <!-- ========= About section end ======== -->
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
        @foreach($services as $service)
          <div class="col-md-6 col-lg-4">
            <div class="service-card p-4 h-100">
              <div class="card-icon mb-4">
                <img src="{{ asset('uploads/admin/' .$service->icon) }}" alt="Icon" width="55">
              </div>
              <h3 class="card-title">{{ $service->title }}</h3>
              <p class="card-text">{{ $service->short_description }}</p>

              <a href="{{ route('service', $service->slug) }}" class="read-more-btn">
                <span class="ms-3">Read More</span>
                <div class="arrow-circle">
                  <span class="arrow-icon">↗</span>
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- ========= service section end ======== -->



  <!-- ========= Works Process section start ======== -->
  <section class="works-process-area px-3">
    <div class="container">
      <div class="row align-items-center mb-5">
        <div class="col-lg-6 col-md-7">
          <span class="sub-title">OUR WORKS</span>
          <h2 class="main-title">Building Your Future <br> with Expert Craftsmanship</h2>
        </div>
        <div class="col-lg-5 offset-lg-1 col-md-5 mt-3 mt-md-0">
          <p class="description mb-0">
            Our skilled team evaluates every site carefully and
            provides professional construction planning tailored to your project.
          </p>
        </div>
      </div>

      <div class="row g-4">

        <!-- item 1 -->
        <div class="col-md-6 col-xl-4">
          <div class="process-card position-relative overflow-hidden rounded-3 shadow-sm">
            <div class="card-bg-img" style="background-image: url('{{ asset('uploads/front/worker-1.png') }}')"></div>
            <div class="card-content-normal p-4">
              <h6 class="text-accent-orange">Prime Construction</h6>
              <h3 class="title works-title h5 fw-bold">A Showcase of Our Building Projects</h3>
            </div>
            <div class="card-content-hover p-4 d-flex flex-column justify-content-end">
              <h6 class="text-accent-orange">Prime Construction</h6>
              <h3 class="title works-title h4 fw-bold mb-3">A Showcase of Our Building Projects</h3>
              <div>
                <a href="contact.html" class="primary-btns hover-icon-reverse">
                  <span class="btn-text-content">
                    <span class="btn-icon-wrapper">
                        <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                        <span class="btn-text">View Details</span>
                    </span>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- item 2 -->
        <div class="col-md-6 col-xl-4">
          <div class="process-card position-relative overflow-hidden rounded-3 shadow-sm">
            <div class="card-bg-img" style="background-image: url('{{ asset('uploads/front/worker-2.png') }}')"></div>
            <div class="card-content-normal p-4">
              <h6 class="text-accent-orange-light">Prime Construction</h6>
              <h3 class="title works-title h5 fw-bold">A Development from Our Core Projects</h3>
            </div>
            <div class="card-content-hover p-4 d-flex flex-column justify-content-end">
              <h6 class="text-accent-orange">Prime Construction</h6>
              <h3 class="title works-title h4 fw-bold mb-3">A Development from Our Core Projects</h3>
              <div>
                <a href="contact.html" class="primary-btns hover-icon-reverse">
                  <span class="btn-text-content">
                    <span class="btn-icon-wrapper">
                      <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                      <span class="btn-text">View Details</span>
                    </span>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- item 3 -->
        <div class="col-md-6 col-xl-4">
          <div class="process-card position-relative overflow-hidden rounded-3 shadow-sm">
            <div class="card-bg-img" style="background-image: url('{{ asset('uploads/front/worker-3.png') }}')"></div>
            <div class="card-content-normal p-4">
              <h6 class="text-accent-orange">Prime Construction</h6>
              <h3 class="title works-title h5 fw-bold">An Installation from Our Major Builds</h3>
            </div>
            <div class="card-content-hover p-4 d-flex flex-column justify-content-end">
              <h6 class="text-accent-orange">Prime Construction</h6>
              <h3 class="title works-title h4 fw-bold mb-3">An Installation from Our Major Builds
              </h3>
              <div>
                <a href="contact.html" class="primary-btns secondary-btns hover-icon-reverse">
                  <span class="btn-text-content">
                    <span class="btn-icon-wrapper">
                      <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                      <span class="btn-text">View Details</span>
                    </span>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ========= Works Process section End ======== -->

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


  <!-- =========  Teams section Start ======== -->
  <section class="team-area px-3">
    <div class="container py-24">
      <div class="row mb-5 text-center">
        <div class="col-12">
          <p class="sub-title">OUR TEAM</p>
          <h2 class="main-title">Our Expert Team</h2>
        </div>
      </div>

      <div class="row g-4">
        <!-- item 1 -->
        <div class="col-xl-3 col-md-4 ">
          <div class="team-card-v2">
            <div class="image-section">
              <a href="team-details.html">
                <img src="{{ asset('uploads/front/team_member-1.png') }}" class="img-fluid w-100"
                alt="Michael Roberts">
              </a>
              <div class="social-wrapper">
                <ul class="list-unstyled mb-0 d-flex justify-content-center gap-2">
                  <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="content-area position-relative content-area-padding">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h5 class="title mb-2">
                    <a href="team-details.html"
                    class="title text-reset text-decoration-none fw-bold">Sarah
                      Williams</a>
                  </h5>
                  <p class="designation text-muted mb-1">Civil Engineer</p>
                </div>
                <a href="team-details.html"
                class="team-arrow-icon text-decoration-none text-reset">
                  <div class="arrow-circle">
                    <span class="arrow-icon">↗</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- item 2 -->
        <div class="col-xl-3 col-md-4 ">
          <div class="team-card-v2">
            <div class="image-section">
              <a href="team-details.html">
                <img src="{{ asset('uploads/front/team_member-3.png') }}" class="img-fluid w-100"
                alt="Michael Roberts">
              </a>
              <div class="social-wrapper">
                <ul class="list-unstyled mb-0 d-flex justify-content-center gap-2">
                  <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="content-area position-relative content-area-padding">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h5 class="title mb-2">
                    <a href="team-details.html"
                    class="title text-reset text-decoration-none fw-bold">Sarah
                      Williams</a>
                  </h5>
                  <p class="designation text-muted mb-1">Civil Engineer</p>
                </div>
                <a href="team-details.html"
                class="team-arrow-icon text-decoration-none text-reset">
                  <div class="arrow-circle">
                    <span class="arrow-icon">↗</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- item 3 -->
        <div class="col-xl-3 col-md-4 ">
          <div class="team-card-v2">
            <div class="image-section">
              <a href="team-details.html">
                <img src="{{ asset('uploads/front/team_member-6.png') }}" class="img-fluid w-100"
                alt="Michael Roberts">
              </a>
              <div class="social-wrapper">
                <ul class="list-unstyled mb-0 d-flex justify-content-center gap-2">
                  <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="content-area position-relative content-area-padding">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h5 class="title mb-2">
                    <a href="team-details.html"
                    class="title text-reset text-decoration-none fw-bold">Sarah
                      Williams</a>
                  </h5>
                  <p class="designation text-muted mb-1">Civil Engineer</p>
                </div>
                <a href="team-details.html"
                class="team-arrow-icon text-decoration-none text-reset">
                  <div class="arrow-circle">
                    <span class="arrow-icon">↗</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- item 4 -->
        <div class="col-xl-3 col-md-4 d-none d-xl-block">
          <div class="team-card-v2">
            <div class="image-section">
              <a href="team-details.html">
                <img src="{{ asset('uploads/front/team_member-7.png') }}" class="img-fluid w-100"
                alt="Michael Roberts">
              </a>
              <div class="social-wrapper">
                <ul class="list-unstyled mb-0 d-flex justify-content-center gap-2">
                  <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="content-area position-relative content-area-padding">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h5 class="title mb-2">
                    <a href="team-details.html"
                    class="title text-reset text-decoration-none fw-bold">Sarah
                      Williams</a>
                  </h5>
                  <p class="designation text-muted mb-1">Civil Engineer</p>
                </div>
                <a href="team-details.html"
                class="team-arrow-icon text-decoration-none text-reset">
                  <div class="arrow-circle">
                    <span class="arrow-icon">↗</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- =========  Teams section end ======== -->

  <!-- =========  our up coming events section start ======== -->
  <section class="up-coming-events px-3">
    <div class="container py-24">
      <div class="row align-items-center mb-5">
        <div class="col-lg-6 col-md-7">
          <span class="sub-title">UP COMING EVENTS</span>
          <h2 class="main-title">Upcoming Events.</h2>
        </div>
        <div class="col-md-6 text-md-end">
          <a href="{{ route('events') }}" class="primary-btns hover-icon-reverse">
            <span class="btn-text-content">
              <span class="btn-icon-wrapper">
                  <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                  <span class="btn-text">View Details</span>
              </span>
            </span>
          </a>
        </div>
      </div>

      <div class="row justify-content-center align-items-center">
        <div class="col-12">
          <div class="owl-carousel event-carousel owl-theme">

            @foreach($events as $event)
              <div class="item">
                <div class="single-event-card shadow-sm border rounded-4 overflow-hidden bg-white">
                  <div class="thumbnail position-relative overflow-hidden">
                    <a href="{{ route('event', $event->slug) }}">
                      <img
                      src="{{ asset('uploads/admin/'. $event->image) }}"
                      class="img-fluid w-100 object-fit-cover"
                      style="height: 266px;"
                      alt="event"
                      >
                    </a>
                  </div>
                  <div class="content p-4">
                    <div class="d-flex gap-3 mb-3 text-muted small">
                      <span>
                        <i class="fa-solid fa-location-dot text-primary me-1"></i>
                        {{ $event->event_location }}
                      </span>
                      <span>
                        <i class="fa-solid fa-calendar-day text-primary me-1"></i>
                        {{ $event->event_date }}
                      </span>
                    </div>
                    <a href="{{ route('event', $event->slug) }}" class="text-decoration-none text-dark">
                      <h4 class="title fw-bold mb-4">{{ $event->title }}</h4>
                    </a>
                    <a href="{{ route('event', $event->slug) }}" class="primary-btns hover-icon-reverse">
                      <span class="btn-text-content">
                        <span class="btn-icon-wrapper">
                          <span class="btn-icon"><i
                            class="fa-solid fa-arrow-right"></i>
                          </span>
                          <span class="btn-text">View Details</span>
                        </span>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- =========  our up coming events section end ======== -->

  <!-- =========  Last news section start ======== -->
  <section class="blogs-section px-3">
    <div class="container py-24">
      <div class="row align-items-center mb-5">
        <div class="col-lg-6 col-md-7">
          <span class="sub-title">OUR BLOGS</span>
          <h2 class="main-title">Our Latest News</h2>
        </div>
        <div class="col-md-6 text-md-end">
          <a href="blogs.html" class="primary-btns hover-icon-reverse">
            <span class="btn-text-content">
              <span class="btn-icon-wrapper">
                <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                <span class="btn-text">View all Blogs</span>
              </span>
            </span>
          </a>
        </div>
      </div>
      <!-- blogs -->
      <div class="row justify-content-center align-items-center">
        <div class="col-12">
          <section class="tmp-blog-area2 inner">
            <div class="container">
              <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div
                  class="card h-100 border-0 shadow-sm blog-card-style-two rounded-3 overflow-hidden">
                    <div class="image-section position-relative">
                      <a href="blog-details.html">
                        <img src="{{ asset('uploads/front/blog-1.png') }}" class="card-img-top img-fluid"
                        alt="Safety Workshops">
                      </a>
                    </div>
                    <div class="card-body p-4">
                      <ul class="list-inline mb-3 d-flex gap-3 text-muted small">
                        <li class="list-inline-item"><i
                          class="fa-regular fa-user me-1 text-primary"></i> By Author
                        </li>
                        <li class="list-inline-item"><i
                          class="fa-light fa-comments me-1 text-primary"></i>
                          Comments(08)</li>
                      </ul>
                      <h4 class="card-title fw-bold mb-4">
                        <a href="blog-details.html"
                        class="text-decoration-none text-dark hover-primary">Construction
                          Safety Workshops: Empowering Workers.</a>
                      </h4>
                      <div class="button-area mt-auto">
                        <a href="blog-details.html"
                        class="btn btn-link p-0 text-decoration-none fw-bold text-primary">
                          READ MORE <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div
                  class="card h-100 border-0 shadow-sm blog-card-style-two rounded-3 overflow-hidden">
                    <div class="image-section position-relative">
                      <a href="blog-details.html">
                        <img src="{{ asset('uploads/front/blog-2.png') }}" class="card-img-top img-fluid"
                        alt="Safety Workshops">
                      </a>
                    </div>
                    <div class="card-body p-4">
                      <ul class="list-inline mb-3 d-flex gap-3 text-muted small">
                        <li class="list-inline-item"><i
                          class="fa-regular fa-user me-1 text-primary"></i> By Author
                        </li>
                        <li class="list-inline-item"><i
                          class="fa-light fa-comments me-1 text-primary"></i>
                          Comments(08)</li>
                      </ul>
                      <h4 class="card-title fw-bold mb-4">
                        <a href="blog-details.html"
                        class="text-decoration-none text-dark hover-primary">Construction
                          Safety Workshops: Empowering Workers.</a>
                      </h4>
                      <div class="button-area mt-auto">
                        <a href="blog-details.html"
                        class="btn btn-link p-0 text-decoration-none fw-bold text-primary">
                          READ MORE <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div
                  class="card h-100 border-0 shadow-sm blog-card-style-two rounded-3 overflow-hidden">
                    <div class="image-section position-relative">
                      <a href="blog-details.html">
                        <img src="{{ asset('uploads/front/blog-3.png') }}" class="card-img-top img-fluid"
                        alt="Safety Workshops">
                      </a>
                    </div>
                    <div class="card-body p-4">
                      <ul class="list-inline mb-3 d-flex gap-3 text-muted small">
                        <li class="list-inline-item"><i
                          class="fa-regular fa-user me-1 text-primary"></i> By Author
                        </li>
                        <li class="list-inline-item"><i
                          class="fa-light fa-comments me-1 text-primary"></i>
                          Comments(08)</li>
                      </ul>
                      <h4 class="card-title fw-bold mb-4">
                        <a href="blog-details.html"
                        class="text-decoration-none text-dark hover-primary">Construction
                          Safety Workshops: Empowering Workers.</a>
                      </h4>
                      <div class="button-area mt-auto">
                        <a href="blog-details.html"
                        class="btn btn-link p-0 text-decoration-none fw-bold text-primary">
                          READ MORE <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
  <!-- =========  Last news section end ======== -->
@endsection