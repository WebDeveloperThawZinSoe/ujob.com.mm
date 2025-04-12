<footer class="footer mt-50">
    <div class="row">
        <!-- footer ads start  -->
        @php
            $currentDate = now();
            $ads = App\Models\Advertisement::where("location","footer")->get();
            $location = "footer";
            $filteredAds = $ads->filter(function ($ad) use ($currentDate, $location) {
                return $ad->location == $location && $currentDate->between($ad->start_date, $ad->end_date);
            })->values(); // Reset the keys
         @endphp
    
    
        @if ($filteredAds->count() > 0)
        
        <div class="container mt-4">
            <div id="adsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($filteredAds as $index => $ad)
                       
                        <div class="carousel-item   {{ $index == 0 ? 'active' : '' }}">
                            <a href="{{ $ad->target_url }}">
                                <img src="{{ asset('ads/' . $ad->image_url) }}" class="d-block w-100" alt="Ad Image">
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#adsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#adsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            </div>
        
        <br> <br>
        
        @endif

        <!-- footer ads end -->
    </div>
    
    
    <div class="container">
      <div class="row">
        <div class=" col-md-3 col-sm-12"><a href="/"><img alt="jobBox" src="{{asset('/')}}assets/imgs/ujob/logo.svg"></a>
          <div class="mt-20 mb-20 font-xs color-text-paragraph-2">Ujob.com.mm: Premier job agency in Myanmar, linking job seekers with diverse opportunities. </div>
          <div class="footer-social"><a class="icon-socials icon-facebook" href="#"></a><a class="icon-socials icon-twitter" href="#"></a><a class="icon-socials icon-linkedin" href="#"></a></div>
        </div>
        <div class=" col-md-3 col-xs-6">
          <h6 class="mb-20">Resources</h6>
          <ul class="menu-footer">
            <li><a href="/">Home</a></li>
            <li><a href="/about-us">About Us</a></li>
            <li><a href="/jobs">Find Job</a></li>
            <li><a href="/companies">Companies</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
        </div>
        
        <div class=" col-md-3 col-xs-6">
          <h6 class="mb-20">Quick links</h6>
          <ul class="menu-footer">
            <li><a href="/pricing">Pricing</a></li>
            <li><a href="/register/employer">Register As Employer</a></li>
            <li><a href="/register">Register As Seeker</a></li>
            <li><a href="/login">Login</a></li>
          </ul>
        </div>
        <div class=" col-md-3 col-sm-12">
          <h6 class="mb-20">Contact Admin Team</h6>
          <p class="color-text-paragraph-2 font-xs">Need Help? Contact Our Friendly Admin Team Today</p>
          <div class="mt-15"><a class="mr-5" href="/contact"><img src="{{asset('/')}}assets/imgs/template/icons/app-store.png" alt="joxBox"></a><a href="#"><img src="{{asset('/')}}assets/imgs/template/icons/android.png" alt="joxBox"></a></div>
        </div>
      </div>
      <div class="footer-bottom mt-50">
        <div class="row">
          <div class="col-md-6"><span class="font-xs color-text-paragraph">Copyright © 2024. UJob all right reserved</span></div>
          <div class="col-md-6 text-md-end text-start">
            <div class="footer-social"><a class="font-xs color-text-paragraph" href="#">Privacy Policy</a><a class="font-xs color-text-paragraph mr-30 ml-30" href="#">Terms &amp; Conditions</a><a class="font-xs color-text-paragraph" href="#">Security</a></div>
          </div>
        </div>
      </div>
    </div>
  </footer>