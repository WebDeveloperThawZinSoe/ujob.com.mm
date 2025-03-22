<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/backend/images/logofc.png')}}">
    <link href="{{asset('/')}}assets/css/style.css?version=4.1" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <title>UJob.com.mm</title>
    @yield('style')
  </head>
  <body>
    <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="text-center"><img src="{{asset('assets/imgs/template/loading.gif')}}" alt="UJob"></div>
        </div>
      </div>
    </div>

    @include('frontend.layouts.parts.header')

    <main class="main">
      
      @yield('breadcrumb')

      @yield('content')

    </main>

    @include('frontend.layouts.parts.footer')

    
    <script src="{{asset('/')}}assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{asset('/')}}assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{asset('/')}}assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{asset('/')}}assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}assets/js/plugins/waypoints.js"></script>
    <script src="{{asset('/')}}assets/js/plugins/wow.js"></script>
    <script src="{{asset('/')}}assets/js/plugins/magnific-popup.js"></script>
    <script src="{{asset('/')}}assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{asset('/')}}assets/js/plugins/select2.min.js"></script>
    <script src="{{asset('/')}}assets/js/plugins/isotope.js"></script>
    <script src="{{asset('/')}}assets/js/plugins/scrollup.js"></script>
    <script src="{{asset('/')}}assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{asset('/')}}assets/js/main.js?v=4.1"></script>
    
    @yield('script')
  </body>
</html>