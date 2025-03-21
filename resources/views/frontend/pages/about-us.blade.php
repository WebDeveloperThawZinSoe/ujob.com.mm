@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
 
@endsection
@section('content')
<section class="section-box">
    <div class="breacrumb-cover bg-img-about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="mb-10">About Us</h2>
            <p class="font-lg color-text-paragraph-2">Get the latest news, updates and tips</p>
          </div>
          <div class="col-lg-6 text-lg-end">
            <ul class="breadcrumbs mt-40">
              <li><a class="home-icon" href="/">Home</a></li>
              <li>About Us</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-box mt-50">
    <div class="post-loop-grid">
      <div class="container">
        <div class="text-center">
          <h6 class="f-18 color-text-mutted text-uppercase">Our company</h6>
          <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">About Our Company</h2>
          <p class="font-sm color-text-paragraph wow animate__animated animate__fadeInUp w-lg-50 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula ante, dictum non aliquet eu, dapibus ac quam. Morbi vel ante viverra orci tincidunt tempor eu id ipsum. Sed consectetur, risus a blandit tempor, velit magna pellentesque risus, at congue tellus dui quis nisl.</p>
        </div>
        <div class="row mt-70">
          <div class="col-lg-6 col-md-12 col-sm-12"><img src="assets/imgs/page/about/img-about2.png" alt="joxBox"></div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <h3 class="mt-15">What we can do?</h3>
            <div class="mt-20">
              <p class="font-md color-text-paragraph mt-20">Aenean sollicituin, lorem quis bibendum auctor nisi elit consequat ipsum sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet maurisorbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctora ornare odio.</p>
              <p class="font-md color-text-paragraph mt-20">Aenean sollicituin, lorem quis bibendum auctor nisi elit consequat ipsum sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet maurisorbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctora ornare odio.</p>
              <p class="font-md color-text-paragraph mt-20">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis non nisi purus. Integer sit nostra, per inceptos himenaeos.</p>
              <p class="font-md color-text-paragraph mt-20">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis non nisi purus. Integer sit nostra, per inceptos himenaeos.</p>
            </div>
            <div class="mt-30"><a class="btn btn-brand-1" href="#">Read More</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-box mt-30 mb-40">
    <div class="container">
      <h2 class="text-center mb-15 wow animate__animated animate__fadeInUp">Our Happy Customer</h2>
      <div class="font-lg color-text-paragraph-2 text-center wow animate__animated animate__fadeInUp">When it comes to choosing the right web hosting provider, we know how easy it<br class="d-none d-lg-block"> is to get overwhelmed with the number.</div>
      <div class="row mt-50">
        <div class="box-swiper">
          <div class="swiper-container swiper-group-3 swiper">
            <div class="swiper-wrapper pb-70 pt-5">
              <div class="swiper-slide">
                <div class="card-grid-6 hover-up">
                  <div class="card-text-desc mt-10">
                    <p class="font-md color-text-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae neque metus. Vivamus consectetur ultricies commodo. Pellentesque at nisl sit amet neque finibus egestas ut at magna. Cras tincidunt tortor sed eros aliquam eleifend.</p>
                  </div>
                  <div class="card-image">
                    <div class="image">
                      <figure><img alt="jobBox" src="assets/imgs/page/about/user1.png"></figure>
                    </div>
                    <div class="card-profile">
                      <h6>Mark Adair</h6><span>Businessmen</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card-grid-6 hover-up">
                  <div class="card-text-desc mt-10">
                    <p class="font-md color-text-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae neque metus. Vivamus consectetur ultricies commodo. Pellentesque at nisl sit amet neque finibus egestas ut at magna. Cras tincidunt tortor sed eros aliquam eleifend.</p>
                  </div>
                  <div class="card-image">
                    <div class="image">
                      <figure><img alt="jobBox" src="assets/imgs/page/about/user2.png"></figure>
                    </div>
                    <div class="card-profile">
                      <h6>Mark Adair</h6><span>Businessmen</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card-grid-6 hover-up">
                  <div class="card-text-desc mt-10">
                    <p class="font-md color-text-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae neque metus. Vivamus consectetur ultricies commodo. Pellentesque at nisl sit amet neque finibus egestas ut at magna. Cras tincidunt tortor sed eros aliquam eleifend.</p>
                  </div>
                  <div class="card-image">
                    <div class="image">
                      <figure><img alt="jobBox" src="assets/imgs/page/about/user3.png"></figure>
                    </div>
                    <div class="card-profile">
                      <h6>Mark Adair</h6><span>Businessmen</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination swiper-pagination3"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')

@endsection