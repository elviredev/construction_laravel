@extends('front.layouts.master')

@section('banner')
  <section class="tmp-breadcrumb-area bg-image banner-bg" style="background-image: url({{ asset('uploads/front/banner.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-content-main text-center">
            <h1 class="title text-white fw-bold display-4 mb-3">Reset Password</h1>

            <nav aria-label="breadcrumb">
              <ul class="breadcrumb justify-content-center align-items-center mb-0">
                <li class="breadcrumb-item"><i class="fa-solid fa-house text-primary-orange"></i>
                  <a href="{{ route('home') }}" class="text-white text-decoration-none opacity-75">
                    Home
                  </a>
                </li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">
                  Reset Password
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
  <section class="auth-section py-5 bg-light">
    <div class="container">
      <div class="row g-4 justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="auth-card p-5 h-100 bg-white shadow-sm border-0">
            <form action="{{ route('reset_password_submit',[$token,$email]) }}" method="POST">
              @csrf

              <div class="mb-3">
                <input type="password" name="password" class="form-control custom-input" placeholder="Your Password">
              </div>
              <div class="mb-3">
                <input type="password" name="confirm_password" class="form-control custom-input" placeholder="Confirm Your Password">
              </div>
              <button type="submit" class="btn btn-primary w-100 py-3 auth-btn mb-4">
                Submit <i class="fa-solid fa-arrow-right-long ms-2"></i>
              </button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
