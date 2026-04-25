@php
 $isAuthPage = request()->routeIs([
   'admin_login',
   'admin_forget_password',
   'admin_reset_password'
]);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <meta name="description" content="">

  @include('admin.layouts.styles')
</head>
<body class="{{ $isAuthPage ? 'login-page' : '' }}">

@if(!$isAuthPage)
  <div class="admin-wrapper">

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Mobile overlay -->
    <div id="overlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <!-- Main -->
    <div class="main-wrapper">

      <!-- Top bar -->
      @include('admin.layouts.topbar')

      <!-- Content -->
      <main class="content-area">

        @yield('content')

      </main>
    </div>
  </div>
@else
  <div class="login-wrapper">
    <div class="login-box">

      @yield('auth-content')

    </div>
  </div>
@endif

@include('admin.layouts.scripts')

</body>
</html>
