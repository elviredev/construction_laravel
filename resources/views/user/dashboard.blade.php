@extends('front.layouts.master')

@section('banner')
  <section class="tmp-breadcrumb-area bg-image banner-bg" style="background-image: url({{ asset('uploads/front/banner.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-content-main text-center">
            <h1 class="title text-white fw-bold display-4 mb-3">Dashboard</h1>

            <nav aria-label="breadcrumb">
              <ul class="breadcrumb justify-content-center align-items-center mb-0">
                <li class="breadcrumb-item"><i class="fa-solid fa-house text-primary-orange"></i>
                  <a href="{{ route('home') }}" class="text-white text-decoration-none opacity-75">
                    Home
                  </a>
                </li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">
                  Dashboard
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

        <!-- Content Column -->
        <div class="col-lg-9">
          <div class="dash-board-content-section-wrappper">
            <div class="single-card-dashboard">
              <h3 class="title with-border-bottom">Welcome {{ auth()->user()?->name }} !</h3>

              <!-- Info Row -->
              <div class="row single-contact-information align-items-center">
                <div class="col-lg-4">
                  <div class="profile-info">Registration Date and Time</div>
                </div>
                <div class="col-lg-8">
                  <div class="profile-info">
                    {{  auth()->user()?->created_at->format('d M Y - H:i') }}
                  </div>
                </div>
              </div>

              <!-- Info Row -->
              <div class="row single-contact-information align-items-center mt-2">
                <div class="col-lg-4">
                  <div class="profile-info">Name</div>
                </div>
                <div class="col-lg-8">
                  <div class="profile-info">{{ auth()->user()?->name }}</div>
                </div>
              </div>

              <!-- Info Row -->
              <div class="row single-contact-information align-items-center mt-2">
                <div class="col-lg-4">
                  <div class="profile-info">Email</div>
                </div>
                <div class="col-lg-8">
                  <div class="profile-info text-primary">{{ auth()->user()?->email }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
