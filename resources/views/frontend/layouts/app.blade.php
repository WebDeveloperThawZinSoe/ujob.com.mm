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
    <title>UJob.com.mm</title>
    <style>
        
        .tawk-min-container .tawk-button-circle.tawk-button-large{
            margin-bottom: 300px !important;
        }
    </style>
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
    
<script type="text/javascript">
  var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
  (function () {
    var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/66b281fb1601a2195ba18112/1i4kkngc5';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
  })();
</script>

    <!-- Hosting Expire Date : 18 March 2026 -->
  </body>
</html>