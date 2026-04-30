@extends('front.layouts.master')

@section('banner')
  <section class="tmp-breadcrumb-area bg-image banner-bg" style="background-image: url({{ asset('uploads/front/banner.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-content-main text-center">
            <h1 class="title text-white fw-bold display-4 mb-3">Gallery</h1>

            <nav aria-label="breadcrumb">
              <ul class="breadcrumb justify-content-center align-items-center mb-0">
                <li class="breadcrumb-item"><i class="fa-solid fa-house text-primary-orange"></i>
                  <a href="{{ route('home') }}"
                  class="text-white text-decoration-none opacity-75">Home</a>
                </li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">
                  Gallery
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
  <section class="photo-gallery-section py-5">
    <div class="container py-lg-5">
      <div class="row g-4">
        <!-- item -->
        @foreach($photos as $photo)
          <div class="col-lg-3 col-md-6">
            <div
            class="process-card position-relative overflow-hidden rounded-3 shadow-sm"
            style="background-image: url({{ asset('uploads/admin/'.$photo->image) }});">
              <a
              href="{{ asset('uploads/admin/'.$photo->image) }}"
              class="glightbox gallery-popup-link"
              data-gallery="gallery1"
              aria-label="Open gallery image"
              ></a>
              <div class="card-content-hover p-4 d-flex flex-column justify-content-end">
                <a href="#" class="title h4 fw-bold text-white mb-2">
                  {{ $photo->caption }}
                </a>
              </div>
            </div>
          </div>
        @endforeach

        {{-- <div class="col-lg-12">
          {{ $photos->links('vendor.pagination.custom') }}
        </div> --}}

      </div>
    </div>
  </section>
@endsection