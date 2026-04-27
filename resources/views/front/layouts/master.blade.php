<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="">
  <title>Construction - Building and Construction HTML Template</title>

  <link rel="icon" type="image/png" href="{{ asset('uploads/front/favicon.png') }}">
  <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;700&family=Rubik:wght@400;700&display=swap" rel="stylesheet">

  @include('front.layouts.styles')
</head>

<body>
  <header>
    <!-- top bar -->
    @include('front.layouts.topbar')
    <!-- navbar -->
    @include('front.layouts.navbar')
    <!-- mobile nav -->
    @include('front.layouts.mobile-nav')

    @yield('banner')
  </header>

  <main>
    @yield('content')
  </main>

<!-- Footer section -->
@include('front.layouts.footer')

<!-- All Javascripts -->
@include('front.layouts.scripts')
</body>

</html>
