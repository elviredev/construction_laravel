@extends('front.layouts.master')

@section('banner')
  <section class="tmp-breadcrumb-area bg-image banner-bg" style="background-image: url({{ asset('uploads/front/banner.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-content-main text-center">
            <h1 class="title text-white fw-bold display-4 mb-3">{{ $service->title }}</h1>

            <nav aria-label="breadcrumb">
              <ul class="breadcrumb justify-content-center align-items-center mb-0">
                <li class="breadcrumb-item"><i class="fa-solid fa-house text-primary-orange"></i>
                  <a href="{{ route('home') }}"
                  class="text-white text-decoration-none opacity-75">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{ route('services') }}"
                  class="text-white text-decoration-none opacity-75">Services</a>
                </li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">
                  {{ $service->title }}
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
  <section class="service-details-section service-section-gap">
    <div class="container">
      <div class="row g-5">
        <!-- Sidebar Area -->
        <div class="col-lg-4 order-2 order-lg-1">
          <div class="left-sidebar">

            <!-- Widget: Service List -->
            <div class="single-wrapper service-list mb-4">
              <h2 class="title-main">All Services</h2>
              <ul class="list-unstyled p-0 m-0">
                @foreach ($allServices as $item)
                  <li>
                    <a
                      href="{{ route('service', $item->slug) }}"
                      class="{{ $service->slug === $item->slug ? 'active' : '' }}"
                    >
                      {{ $item->title }}
                      <span>
                        <i class="fa-solid fa-arrow-right"></i>
                      </span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>

            <!-- Widget: Emergency Contact -->
            @if($service->phone_text || $service->phone_number)
              <div class="single-wrapper contact-area mb-4 p-4">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-box">
                    <i class="fa-solid fa-phone"></i>
                  </div>
                  <div class="text">
                    <p class="mb-0 text-muted small fw-bold">{{ $service->phone_text }}</p>
                    <a
                      href="tel:{{ $service->phone_number }}"
                      class="phone h5 fw-bold text-dark text-decoration-none"
                    >
                      {{ $service->phone_number }}
                    </a>
                  </div>
                </div>
              </div>
            @endif

            <!-- Widget: Quick Contact Form -->
            <div class="single-wrapper contact-area p-4 mb-4">
              <div class="content-quick-contact-service">
                <h2 class="title h5 fw-bold mb-4">Get a free consultation?</h2>
                <form action="{{ route('service_contact') }}" method="POST">
                  @csrf

                  <input type="hidden" name="service_title" value="{{ $service->title }}">
                  <div class="single-quick-action mb-3">
                    <i class="fa-regular fa-face-smile"></i>
                    <input type="text" name="name" class="form-control" placeholder="Your Name *" required value="{{ old('name') }}">
                  </div>
                  <div class="single-quick-action mb-3">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" name="email" class="form-control" placeholder="Your Email *" value="{{ old('email') }}">
                  </div>
                  <div class="single-quick-action mb-4">
                    <i class="fa-regular fa-message"></i>
                    <textarea class="form-control" name="message" placeholder="Your Message *" rows="3" required>{{ old('message') }}</textarea>
                  </div>
                  <button type="submit" class="tmp-btn btn-primary w-100 hover-icon-reverse">
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text">Send Message</span>
                        <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                    </span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Main Content Area -->
        <div class="col-lg-8 order-1 order-lg-2">
          <div class="right-content-area checkout-padding-shadow p-0">
            <div
              class="image-section"
              style="background-image: url({{ asset('uploads/admin/' .$service->image) }});"
            ></div>

            <div class="p-4 p-md-5 pt-0">
              <div class="description">
                {!! $service->description !!}
              </div>

              <!-- Accordion Area -->
              @if($service->faqs->isNotEmpty())
                <div class="faq-content-area">
                  <div class="accordion" id="accordionExample">

                    <h3 class="fw-bold mb-3">Service FAQs</h3>

                    @foreach($service->faqs as $faq)
                    <div class="accordion-item mb-3 border rounded-3 overflow-hidden">
                      <h2 class="accordion-header">
                        <button class="accordion-button fw-bold py-3 {{ $loop->first ? '' : 'collapsed' }}" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}">
                          <i class="fa-solid fa-hard-hat me-3 text-primary"></i> {{ $faq->question }}
                        </button>
                      </h2>
                      <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                      data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-light">
                          <p class="desc mb-4">{{ $faq->answer }}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              @endif
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection








