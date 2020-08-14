<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layout/head')
</head>
<body>
     <div class="site-wrap" id="home-section">
     @include('layout/header')
    <div class="site-section-cover overlay" style="background-image: url({{asset('images/hero_bg.jpg')}});">
       <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-10 text-center">
            @yield('title')
            </div>
          </div>
        </div>
    </div>
    @yield('content')
    
    @include('layout/footer')
  </div>
   <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.sticky.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>

    <script src="{{asset('js/main.js')}}"></script>
    
</body>
</html>