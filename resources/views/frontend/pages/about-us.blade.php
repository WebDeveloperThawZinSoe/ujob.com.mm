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
          <p class="font-sm color-text-paragraph wow animate__animated animate__fadeInUp w-lg-50 mx-auto">JZ Myanmar Company Limited was established with a visionary goal: to
transform the recruitment landscape in Myanmar. As the creators and
operators of ujob.com.mm, the nation’s premier online job portal, we are
committed to seamlessly connecting job seekers with ideal career
opportunities, while providing employers with an efficient, cost-effective, and
automated recruitment platform. Our extensive service offerings span across a
wide range of job categories from executive and professional roles to clerical
positions ensuring that there is an opportunity suited for everyone.</p>
        </div>
        <div class="row mt-70">
          <div class="col-lg-6 col-md-12 col-sm-12"><img src="assets/imgs/page/about/img-about2.png" alt="joxBox"></div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <h3 class="mt-15">Our Commitment</h3>
            <div class="mt-20">
              <p class="font-md color-text-paragraph mt-20">At JZ Myanmar Company Limited, we are dedicated to making job discovery
                effortless. Our mission is to bridge the gap between skilled job seekers and
                the employers who need them, fostering a dynamic and thriving job market
                in Myanmar. Through ujob.com.mm, we provide unmatched convenience,
                efficiency, and success in the recruitment process for both job seekers and
                employers alike.
                </p>
            
            </div>
            <h3 class="mt-15">Contact Us</h3>
            <div class="mt-20">
              <p class="font-md color-text-paragraph mt-20">Whether you are embarking on a new career path or seeking top-tier talent,
ujob.com.mm offers the advanced tools and opportunities to help you
achieve your goals.

                </p>
            <p><b>JZ Myanmar Company Limited</b></p>
            <p><b>Website: www.ujob.com.mm Your dream job is just a click away at
ujob.com.mm – where opportunity meets talent.
</b></p>
            </div>
            <div class="mt-30"><a class="btn btn-brand-1" href="{{asset('about.pdf')}}">Read More Detail & Our Service >>> </a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- <section class="section-box mt-30 mb-40">
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
  </section> -->
@endsection

@section('script')

@endsection