<!DOCTYPE html>
<html lang="en">
<head>
  @include('frontend.includes.style')
</head>

<body>

  <!--==========================
  Header
  ============================-->
  @include('frontend.includes.navbar')
  <!-- #header -->

  @yield('content')
  
  <!--==========================
    Footer
  ============================-->
  @include('frontend.includes.footer')
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <div id="preloader"></div>

  @include('frontend.includes.script')
  
  @yield('after-script')
</body>
</html>
