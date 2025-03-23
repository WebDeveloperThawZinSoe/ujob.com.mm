@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
 <!-- hero -->
 <section class="section-box">
    <div id="banner-hero" class="banner-hero hero-2 hero-3 " style="background-image: url('./assets/imgs/page/homepage2/banner.png');">
      <div class="banner-inner">
        <div class="block-banner">
          <h1 class="text-42 color-white wow animate__animated animate__fadeInUp">
            <!-- UJOB.<span class="color-green">COM.MM</span> -->
            <br class="d-none d-lg-block">YOUR DREAM JOB AT YOUR FINGERTIPS!
          </h1>
          <div class="font-lg font-regular color-white mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">With our extensive network of top employers and a wide range of job opportunities across various industries, to help you land your dream job.</div>
          <div class="form-find mt-40 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
            <form method="get" action="{{route('frontend.jobs')}}">
              <input name="title" class="form-input input-keysearch mr-10" type="text" placeholder="Your keyword... ">
              <div class="box-industry">
                <select class="form-input mr-10 select-active input-industry" name="category_id">
                  <option value="">Job Category</option>
                    @foreach ($categories as $data)
                    <option value="{{$data->id}}" {{ request('category_id') == $data->id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
              </div>
              <select class="form-input mr-10 select-active" name="location_id">
                <option value="">Location</option>
                    @foreach ($locations as $data)
                    <option value="{{$data->id}}" {{ request('location_id') == $data->id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
              </select>
              
              <button class="btn btn-default btn-find font-sm">Search</button>
            </form>
          </div>
          {{-- <div class="list-tags-banner mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".3s"><strong>Popular Searches:</strong><a href="#">Designer</a>, <a href="#">Web</a>, <a href="#">IOS</a>, <a href="#">Developer</a>, <a href="#">PHP</a>, <a href="#">Senior</a>, <a href="#">Engineer</a></div> --}}
        </div>
      </div>
      <div class="container mt-60">
        <div class="box-swiper mt-50">
          <div class="swiper-container swiper-group-4 swiper">
            <div class="swiper-wrapper pb-25 pt-5">

              @foreach ($categories as $data)
                <div class="swiper-slide hover-up"><a href="{{route('frontend.jobs')}}/?category_id={{$data->id}}">
                  <div class="item-logo">
                    <div class="text-info-right" style="width: 100%;">
                      <h4 style="text-align: center;">{{$data->name}}</h4>
                      <p class="font-xs" style="text-align: center;">{{$data->jobs->count()}}<span> Jobs Available</span></p>
                    </div>
                  </div></a>
                </div>
              @endforeach
              
            </div>
            <div class="swiper-pagination swiper-pagination-style-border"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@section('content')
@include('frontend.layouts.parts.ads', [
      'ads' => $ads,
      'location' => 'home page header'
    ])

<!-- job list -->
<section class="section-box mt-70">
  <div class="container">
    <div class="text-center">
      <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Highlight Jobs</h2>
      <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Find Your Next Career Move: Featured Job Listings Just for You</p>
      
    </div>
    <div class="mt-50">
      <div class="row">
        
        @foreach ($jobs as $data)
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card-grid-2 grid-bd-16 hover-up">
              <div class="card-block-info pt-25">
                <h6><a href="{{route('frontend.jobs-detail', $data->id)}}">{{$data->title}}</a></h6>
                <div class="mt-5"><span class="card-briefcase mr-15">{{$data->job_type}}</span><span class="card-time">{{ $data->created_at->diffForHumans() }}</span></div>
                <div class="mt-10 border-bottom">
                  
                </div>
                <div class="card-2-bottom mt-20">
                  <div class="row">
                    <div class="col-lg-7 col-md-7">
                      <div class="d-flex"><img class="img-rounded" src="{{asset('profile/'.$data->employer->user->image)}}" alt="jobBox" width="100px">
                        <div class="info-right-img">
                          <h6 class="color-brand-1 lh-14">{{$data->employer->company_name}}</h6><span class="card-location font-xxs pl-15 color-text-paragraph-2">{{$data->location->name}}</span>
                        </div>
                      </div>
                    </div>
                    @if($data->salary != null)
                    <div class="col-lg-5 col-md-5 text-end"><span class="card-text-price">{{ number_format($data->salary) }}</span> &nbsp;<span class="text-muted">Month</span></div>
                    @else  
                    <div class="col-lg-5 col-md-5 text-end"><span class="card-text-price">Negotiate</span></div>

                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
      </div>

      <div class="row mt-40 mb-60">
        <div class="col-lg-12"> 
          <div class="text-center"><a class="btn btn-brand-1  mt--30 hover-up" href="/jobs">View More Jobs</a></div>
        </div>
      </div>

    </div>
  </div>
</section>

  <!-- Profile create -->
  <section class="section-box mt-50 mb-30 bg-border-3 pt-100 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-6"><img class="bdrd-10" src="assets/imgs/page/homepage5/img-profile.png" alt="jobBox"></div>
        <div class="col-lg-6">
          <div class="pl-30">
            <h5 class="color-brand-2 mb-15 mt-15">Create Profile</h5>
            <h2 class="color-brand-1 mt-0 mb-15">Create Your Personal Account Profile</h2>
            <p class="font-lg color-text-paragraph-2">Work Profile is a personality assessment that measures an individual's work personality through their workplace traits, social and emotional traits; as well as the values and aspirations that drive them forward.</p>
            <div class="mt-20"><a href="/register" class="btn btn-default">Create Profile</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- location -->
  <section class="section-box mt-110 ">
    <div class="section-box wow animate__animated animate__fadeIn mt-70">
      <div class="container">
        <div class="text-center">
          <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Jobs by Location</h2>
          <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Find your favourite jobs and get the benefits of yourself</p>
        </div>
        <div class="box-swiper mt-50">
          <div class="swiper-container swiper-group-5 swiper">
            <div class="swiper-wrapper pb-70 pt-5">
              <div class="swiper-slide hover-up"><a href="{{route('frontend.jobs')}}/?category_id=3">
                  <div class="item-logo">
                    <div class="image-left"><img alt="jobBox" src="{{asset('assets/imgs/codicon_location.svg')}}"></div>
                    <div class="text-info-right">
                      <h4>Nay Pyi Taw</h4>
                      <p class="font-xs">{{ $locations->where('id', 3)->first()->jobs->count() }}<span> Vacancy</span></p>
                    </div>
                  </div></a>
              </div>
              <div class="swiper-slide hover-up"><a href="{{route('frontend.jobs')}}/?category_id=4">
                  <div class="item-logo">
                    <div class="image-left"><img alt="jobBox" src="{{asset('assets/imgs/codicon_location.svg')}}"></div>
                    <div class="text-info-right">
                      <h4>Yangon</h4>
                      <p class="font-xs">{{ $locations->where('id', 1)->first()->jobs->count() }}<span> Vacancy</span></p>
                    </div>
                  </div></a>
              </div>
              <div class="swiper-slide hover-up"><a href="{{route('frontend.jobs')}}/?category_id=5">
                  <div class="item-logo">
                    <div class="image-left"><img alt="jobBox" src="{{asset('assets/imgs/codicon_location.svg')}}"></div>
                    <div class="text-info-right">
                      <h4>Bago</h4>
                      <p class="font-xs">{{ $locations->where('id', 5)->first()->jobs->count() }}<span> Vacancy</span></p>
                    </div>
                  </div></a>
              </div>
              <div class="swiper-slide hover-up">
                <a href="{{route('frontend.jobs')}}/?category_id=6">
                  <div class="item-logo">
                    <div class="image-left"><img alt="jobBox" src="{{asset('assets/imgs/codicon_location.svg')}}"></div>
                    <div class="text-info-right">
                      <h4>Chin</h4>
                      <p class="font-xs">{{ $locations->where('id', 6)->first()->jobs->count() }}<span> Vacancy</span></p>
                    </div>
                  </div></a>
              </div>
              <div class="swiper-slide hover-up">
                <a href="{{route('frontend.jobs')}}/?category_id=1">
                  <div class="item-logo">
                    <div class="image-left"><img alt="jobBox" src="{{asset('assets/imgs/codicon_location.svg')}}"></div>
                    <div class="text-info-right">
                      <h4>Ayeyawady</h4>
                      <p class="font-xs">{{ $locations->where('id', 4)->first()->jobs->count() }}<span> Vacancy</span></p>
                    </div>
                  </div></a>
              </div>
              <div class="swiper-slide hover-up">
                <a href="{{route('frontend.jobs')}}/?category_id=2">
                  <div class="item-logo">
                    <div class="image-left"><img alt="jobBox" src="{{asset('assets/imgs/codicon_location.svg')}}"></div>
                    <div class="text-info-right">
                      <h4>Mandalay</h4>
                      <p class="font-xs">{{ $locations->where('id', 2)->first()->jobs->count() }}<span> Vacancy</span></p>
                    </div>
                  </div></a>
              </div>
            </div>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
  </section>


  <!-- Guide -->
  <section class="section-box bg-15 pt-50 pb-50 mt-80">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center mb-30"><img class="img-job-search mt-20" src="assets/imgs/page/homepage3/img-job-search.png" alt="jobBox"></div>
        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
          <h2 class="mb-40">Job search for people passionate about startup</h2>
          <div class="box-checkbox mb-30">
            <h6>Create an account</h6>
            <p class="font-md color-text-paragraph-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec justo a quam varius maximus. Maecenas sodales tortor quis tincidunt commodo.</p>
          </div>
          <div class="box-checkbox mb-30">
            <h6>Search for Jobs</h6>
            <p class="font-md color-text-paragraph-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec justo a quam varius maximus. Maecenas sodales tortor quis tincidunt commodo.</p>
          </div>
          <div class="box-checkbox mb-30">
            <h6>Save &amp; Apply</h6>
            <p class="font-md color-text-paragraph-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec justo a quam varius maximus. Maecenas sodales tortor quis tincidunt commodo.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Blog -->
  <section class="section-box mt-50 mb-50">
    <div class="container">
      <div class="text-center">
        <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">News and Blog</h2>
        <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Get the latest news, updates and tips</p>
      </div>
    </div>
    <div class="container">
      <div class="mt-50">
        <div class="box-swiper style-nav-top">
          <div class="swiper-container swiper-group-3 swiper">
            <div class="swiper-wrapper pb-70 pt-5">
              @foreach ($articles as $item)
              <div class="swiper-slide">
                <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                  <div class="text-center card-grid-3-image">
                    <a href="{{route('frontend.blog-detail', $item->id)}}"><figure><img alt="jobBox" src="{{ asset('articles'). '/' . $item->asset }}"></figure></a>
                  </div>
                  <div class="card-block-info">
                    <div class="tags mb-15"><a class="btn btn-tag" href="{{route('frontend.blog-detail', $item->id)}}">Blog</a></div>
                    <h5><a href="{{route('frontend.blog-detail', $item->id)}}">{{ $item->title }}</a></h5>
                    {{-- <p class="mt-10 color-text-paragraph font-sm">{{ Str::limit($item->description, 20) }}</p> --}}
                    <div class="card-2-bottom mt-20">
                      <div class="row">
                        <div class="col-lg-6 col-6">
                          <div class="d-flex">
                            <div class="info-right-img"><span class="font-xs color-text-paragraph-2">{{ \Carbon\Carbon::parse($item->date)->format('Y-m-d') }}</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

              
              
              
            </div>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
        <div class="text-center"><a class="btn btn-brand-1 btn-icon-load mt--30 hover-up" href="{{route('frontend.blog')}}">Load More Posts</a></div>
      </div>
    </div>
  </section>

    @include('frontend.layouts.parts.ads', [
      'ads' => $ads,
      'location' => 'home page bottom'
    ])

      
  <!-- company -->
  <div class="section-box mt-70">
    <div class="container">
      <div class="box-trust">
        <div class="row">
          <div class="left-trust col-lg-2 col-md-3 col-sm-3 col-3">
            <h4 class="color-text-paragraph-2">Trusted by</h4>
          </div>
          <div class="right-logos col-lg-10 col-md-9 col-sm-9 col-9">
            <div class="box-swiper">
              <div class="swiper-container swiper-group-7 swiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/page/homepage3/microsoft.svg" alt="jobBox"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/page/homepage3/sony.svg" alt="jobBox"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/page/homepage3/acer.svg" alt="jobBox"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/page/homepage3/nokia.svg" alt="jobBox"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/page/homepage3/asus.svg" alt="jobBox"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/page/homepage3/casio.svg" alt="jobBox"></a></div>
                  <div class="swiper-slide"><a href="#"><img src="assets/imgs/page/homepage3/dell.svg" alt="jobBox"></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

@endsection

@section('script')
<script>
  const backgrounds = [
'assets/imgs/image1.png',
'assets/imgs/image2.png',
'assets/imgs/image3.png',
// Add more image paths as needed
];

let currentIndex = 0;

function changeBackground() {
setTimeout(() => {
    currentIndex = (currentIndex + 1) % backgrounds.length;
    const newBackground = backgrounds[currentIndex];
    document.getElementById('banner-hero').style.backgroundImage = `url('${newBackground}')`;
}, 1000); // Adjust the transition duration accordingly
}

setInterval(changeBackground, 5000);
</script>
@endsection