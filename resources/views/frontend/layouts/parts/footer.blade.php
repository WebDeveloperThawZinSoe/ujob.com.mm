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

    <br>
    
    
    <div class="container">
      <div class="row">
        <div class=" col-md-3 col-sm-12"><a href="/"><img alt="jobBox" src="{{asset('/')}}assets/imgs/ujob/logo.svg"></a>
          <div class="mt-20 mb-20 font-xs color-text-paragraph-2">Ujob.com.mm: A job portal in Myanmar that connects job seekers with diverse opportunities. </div>
          <div class="footer-social">
    <a href="https://www.facebook.com/share/16GQHGoxp2/?mibextid=wwXIfr" target="_blank" class="me-3">
        <i class="fab fa-facebook-f fa-lg"></i>
    </a>
    <a href="https://invite.viber.com/?g2=AQAyIM8HnI%2FfPFNNOLHybbiy9bd5EZ4tnYx9%2B%2BTZYqYcc9guvcrwytLaZ7chT%2BLb" target="_blank" class="me-3">
        <i class="fab fa-viber fa-lg"></i>
    </a>
    <a href="https://www.linkedin.com/company/106683524" target="_blank">
        <i class="fab fa-linkedin-in fa-lg"></i>
    </a>
</div>

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
          <div class="col-md-6"><span class="font-xs color-text-paragraph">Copyright@2024. JZ Myanmar Co.,Ltd all right reserved.</span></div>
          <div class="col-md-6 text-md-end text-start">
            <div class="footer-social"><a class="font-xs color-text-paragraph" href="http://localhost:8000/privacy-policy">Privacy Policy</a><a class="font-xs color-text-paragraph mr-30 ml-30" href="http://localhost:8000/terms-and-conditions">Terms &amp; Conditions</a></div>
          </div>
        </div>
      </div>
    </div>
  </footer>