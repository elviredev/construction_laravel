@extends('front.layouts.master')

@section('banner')
  <section class="tmp-breadcrumb-area bg-image banner-bg" style="background-image: url({{ asset('uploads/front/banner.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-content-main text-center">
            <h1 class="title text-white fw-bold display-4 mb-3">Services</h1>

            <nav aria-label="breadcrumb">
              <ul class="breadcrumb justify-content-center align-items-center mb-0">
                <li class="breadcrumb-item"><i class="fa-solid fa-house text-primary-orange"></i>
                  <a href="{{ route('home') }}"
                  class="text-white text-decoration-none opacity-75">Home</a>
                </li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">
                  Services
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
  <section class="services-section px-3">
    <div class="container py-24">
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

{{--        <div class="col-lg-12">--}}
{{--          {{ $services->links('pagination::custom') }}--}}
{{--        </div>--}}
      </div>
    </div>
  </section>
@endsection