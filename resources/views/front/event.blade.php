@extends('front.layouts.master')

@section('banner')
  <section class="tmp-breadcrumb-area bg-image banner-bg" style="background-image: url({{ asset('uploads/front/banner.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-content-main text-center">
            <h1 class="title text-white fw-bold display-4 mb-3">{{ $event->title }}</h1>

            <nav aria-label="breadcrumb">
              <ul class="breadcrumb justify-content-center align-items-center mb-0">
                <li class="breadcrumb-item"><i class="fa-solid fa-house text-primary-orange"></i>
                  <a href="{{ route('home') }}"
                  class="text-white text-decoration-none opacity-75">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{ route('events') }}"
                  class="text-white text-decoration-none opacity-75">Events</a>
                </li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">
                  {{ $event->title }}
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
  <section class="event-details py-24">
    <div class="container py-24 pt-0 border rounded">
      <div class="row">
        <div class="col-12 position-relative">
          <div class="ratio ratio-21x9 rounded-top overflow-hidden">
            <img src="{{ asset('uploads/admin/' . $event->image) }}" class="img-fluid object-fit-cover" alt="Event Hero">
            @if($event->youtube_id)
              <div class="overlay d-flex align-items-center justify-content-center h-100 position-absolute top-0 start-0 w-100">
                <a href="https://www.youtube.com/watch?v={{ $event->youtube_id }}"
                class="glightbox video-play-btn worker-play-btns  mb-4 me-4 z-30 text-decoration-none">
                  <span class="play-icon shadow-lg">
                    <i class="fa-solid fa-play"></i>
                  </span>
                </a>
              </div>
            @endif
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-11">
          <div class="card border-0 shadow-sm info-card p-4">
            <div class="row align-items-center g-4">
              <div class="col-md-3 d-flex align-items-start">
                <div class="icon-box me-3"><i class="far fa-clock"></i></div>
                <div>
                  <h6 class="fw-bold mb-1">Date and time</h6>
                  <p class="text-muted small mb-0">{{ $event->event_date }}<br>{{ $event->event_time }}</p>
                </div>
              </div>
              <div class="col-md-3 d-flex align-items-start border-start-md">
                <div class="icon-box me-3"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <h6 class="fw-bold mb-1">Location</h6>
                  <p class="text-muted small mb-0">{!! nl2br(e($event->event_location_details)) !!}</p>
                </div>
              </div>
              @if($event->ticket_price)
                <div class="col-md-3 d-flex align-items-start border-start-md">
                  <div class="icon-box me-3"><i class="fas fa-sack-dollar"></i></div>
                  <div>
                    <h6 class="fw-bold mb-1">Price</h6>
                    <p class="mb-0"><span class="fw-bold fs-5">{{ $event->ticket_price }}</span> </p>
                  </div>
                </div>
              @endif

              @if($event->button_link || $event->button_text)
                <div class="col-md-3 text-md-end">
                  <a href="{{ $event->button_link }}" class="primary-btns hover-icon-reverse">
                    <span class="btn-text-content">
                        <span class="btn-icon-wrapper">
                            <span class="btn-icon"><i class="fa-solid fa-cart-shopping"></i></span>
                            <span class="btn-text">{{ $event->button_text }}</span>
                        </span>
                    </span>
                  </a>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5 justify-content-center">
        <div class="col-11">
          <div class="events-description-area bg-box-shadow">
            <h2 class="main-title">Event Description</h2>
            <p class="description">{!! $event->description !!}</p>
          </div>
        </div>
      </div>

      @if($event->eventFaqs->isNotEmpty())
        <div class="row justify-content-center">
          <div class="col-lg-11">
            <div class="events-faqs-area bg-box-shadow">
              <div class="accordion custom-accordion" id="accordionExample">
                <h3 class="main-title">Event FAQ'S</h3>

                @foreach($event->eventFaqs as $faq)
                  <div class="accordion-item mb-3 border rounded-3 overflow-hidden">
                    <h2 class="accordion-header">
                      <button class="accordion-button fw-bold py-3 {{ $loop->first ? '' : 'collapsed' }}" type="button"
                      data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}">
                        <i class="fa-solid fa-question-circle me-3 text-primary"></i> {{ $faq->question }}
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
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection








