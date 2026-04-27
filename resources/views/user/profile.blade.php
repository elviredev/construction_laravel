@extends('front.layouts.master')

@section('banner')
  <section class="tmp-breadcrumb-area bg-image banner-bg" style="background-image: url({{ asset('uploads/front/banner.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-content-main text-center">
            <h1 class="title text-white fw-bold display-4 mb-3">Profile</h1>

            <nav aria-label="breadcrumb">
              <ul class="breadcrumb justify-content-center align-items-center mb-0">
                <li class="breadcrumb-item"><i class="fa-solid fa-house text-primary-orange"></i>
                  <a href="{{ route('home') }}" class="text-white text-decoration-none opacity-75">
                    Home
                  </a>
                </li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">
                  Profile
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
  <section class="user-dashboard-section-start py-5">
    <div class="container">
      <div class="row g-5">
        <!-- Sidebar Column -->
        <div class="col-lg-3">
          <div class="user-infor-left-sidebar-dashboard">
            <div class="dashboard-menu-section">
              <nav class="dashboard-mainmenu">
                @include('user.sidebar')
              </nav>
            </div>
          </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
          <div class="dash-board-content-area-wrappper">

            <div class="single-card-dashboard shadow-sm bg-white p-4 rounded mb-5">
              <h3 class="border-bottom pb-3 mb-4 fw-600">Edit Profile</h3>

              <form action="{{ route('profile_update') }}" method="POST">
                @csrf

                <div class="mb-4">
                  <label class="form-label fw-semibold">Name *</label>
                  <input type="text" name="name" class="form-control" value="{{ auth()->user()?->name }}">
                </div>
                <div class="mb-4">
                  <label class="form-label fw-semibold">Email *</label>
                  <input type="email" name="email" class="form-control" value="{{ auth()->user()?->email }}">
                </div>

                <div class="mb-4">
                  <label class="form-label fw-semibold">New Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-4">
                  <label class="form-label fw-semibold">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control">
                </div>
                <button type="submit" class="primary-btns hover-icon-reverse">
                  <span class="btn-text-content">
                    <span class="btn-icon-wrapper">
                      <span class="btn-text">Save Changes</span>
                    </span>
                  </span>
                </button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection