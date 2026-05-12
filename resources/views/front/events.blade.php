@extends('front.layouts.master')

@section('banner')
  <section class="tmp-breadcrumb-area bg-image banner-bg" style="background-image: url({{ asset('uploads/front/banner.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-content-main text-center">
            <h1 class="title text-white fw-bold display-4 mb-3">Our Events</h1>

            <nav aria-label="breadcrumb">
              <ul class="breadcrumb justify-content-center align-items-center mb-0">
                <li class="breadcrumb-item"><i class="fa-solid fa-house text-primary-orange"></i>
                  <a href="{{ route('home') }}"
                  class="text-white text-decoration-none opacity-75">Home</a>
                </li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">
                  Our Events
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
  <section class="up-coming-events px-3">
    <div class="container py-24">
      <div class="row g-4">

        @foreach($events as $event)
          <div class="col-md-6 col-lg-4">
          <div class="item h-100">
            <div class="single-event-card shadow-sm border rounded-4 overflow-hidden bg-white">
              <div class="thumbnail position-relative overflow-hidden">
                <a href="{{ route('event', $event->slug) }}">
                  <img
                    src="{{ asset('uploads/admin/' . $event->image) }}"
                    class="img-fluid w-100 object-fit-cover"
                    style="height: 266px"
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
                      <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                      <span class="btn-text">View Details</span>
                    </span>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        {{-- <div class="col-lg-12">
          {{ $events->links('pagination::custom') }}
        </div> --}}

      </div>
    </div>
  </section>
@endsection