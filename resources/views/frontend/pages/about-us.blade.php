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
<!-- <section class="section-box mt-50">
    <div class="post-loop-grid">
        <div class="container">
            <div class="text-center">
                <h6 class="f-18 color-text-mutted text-uppercase">Our company</h6>
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">About Our Company</h2>
                <p class="font-sm color-text-paragraph wow animate__animated animate__fadeInUp w-lg-50 mx-auto">JZ
                    Myanmar Company Limited was established with a visionary goal: to
                    transform the recruitment landscape in Myanmar. As the creators and
                    operators of ujob.com.mm, the nation’s premier online job portal, we are
                    committed to seamlessly connecting job seekers with ideal career
                    opportunities, while providing employers with an efficient, cost-effective, and
                    automated recruitment platform. Our extensive service offerings span across a
                    wide range of job categories from executive and professional roles to clerical
                    positions ensuring that there is an opportunity suited for everyone.</p>
            </div>
            <div class="row mt-70">
                <div class="col-lg-6 col-md-12 col-sm-12"><img src="assets/imgs/page/about/img-about2.png" alt="joxBox">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h3 class="mt-15">Our Commitment</h3>
                    <div class="mt-20">
                        <p class="font-md color-text-paragraph mt-20">At JZ Myanmar Company Limited, we are dedicated to
                            making job discovery
                            effortless. Our mission is to bridge the gap between skilled job seekers and
                            the employers who need them, fostering a dynamic and thriving job market
                            in Myanmar. Through ujob.com.mm, we provide unmatched convenience,
                            efficiency, and success in the recruitment process for both job seekers and
                            employers alike.
                        </p>

                    </div>
                    <h3 class="mt-15">Contact Us</h3>
                    <div class="mt-20">
                        <p class="font-md color-text-paragraph mt-20">Whether you are embarking on a new career path or
                            seeking top-tier talent,
                            ujob.com.mm offers the advanced tools and opportunities to help you
                            achieve your goals.

                        </p>
                        <p><b>JZ Myanmar Company Limited</b></p>
                        <p><b>Website: www.ujob.com.mm Your dream job is just a click away at
                                ujob.com.mm – where opportunity meets talent.
                            </b></p>
                    </div>
                    <div class="mt-30"><a class="btn btn-brand-1" href="{{asset('about.pdf')}}">Read More Detail & Our
                            Service >>> </a></div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Include Bootstrap and Font Awesome if not already -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<section class="section-box py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">About Us</h2>
      <p class="text-muted">Learn more about our mission, vision, and what we offer to job seekers and employers in Myanmar.</p>
    </div>

    <div class="row gy-4">
      <!-- Our Mission -->
      <div class="col-lg-6">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-3"><i class="fas fa-bullseye me-2 text-primary"></i>Our Mission</h4>
            <p class="card-text">
              At <strong>Ujob.com.mm</strong>, our mission is to empower job seekers across Myanmar by connecting them with meaningful career opportunities and helping companies find the right talent. We’re committed to building a platform that makes the job search process efficient and accessible for everyone.
            </p>
          </div>
        </div>
      </div>

      <!-- Who We Are -->
      <div class="col-lg-6">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-3"><i class="fas fa-users me-2 text-success"></i>Who We Are</h4>
            <p class="card-text">
              <strong>Ujob.com.mm</strong> is an emerging job portal dedicated to bridging the gap between talented professionals and forward-thinking employers. Founded with a passion for improving the employment landscape in Myanmar, we aim to be a trusted resource for job seekers and companies alike.
            </p>
          </div>
        </div>
      </div>

      <!-- What We Offer -->
      <div class="col-lg-12">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-3"><i class="fas fa-briefcase me-2 text-info"></i>What We Offer</h4>
            <ul class="list-unstyled">
              <li><i class="fas fa-check-circle text-success me-2"></i><strong>Easy-to-Use Platform:</strong> Navigate job listings quickly and efficiently.</li>
              <li><i class="fas fa-check-circle text-success me-2"></i><strong>Smart Job Alerts & Filters:</strong> Find opportunities tailored to your skills and goals.</li>
              <li><i class="fas fa-check-circle text-success me-2"></i><strong>Career Support Resources:</strong> Resume tips, career advice, and more.</li>
              <li><i class="fas fa-check-circle text-success me-2"></i><strong>Growing Employer Network:</strong> Diverse job listings from verified companies.</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Our Vision -->
      <div class="col-lg-12">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-3"><i class="fas fa-eye me-2 text-warning"></i>Our Vision</h4>
            <p class="card-text">
              We envision a future where every job seeker in Myanmar can discover a pathway to success. As we continue to grow, our goal is to become a comprehensive career partner—supporting growth, learning, and development in an ever-changing job market.
            </p>
          </div>
        </div>
      </div>

      <!-- Why Choose Us -->
      <div class="col-lg-12">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-3"><i class="fas fa-star me-2 text-danger"></i>Why Choose Ujob.com.mm?</h4>
            <ul class="list-unstyled">
              <li><i class="fas fa-check-circle text-primary me-2"></i><strong>Authenticity:</strong> Genuine job opportunities with verified listings.</li>
              <li><i class="fas fa-check-circle text-primary me-2"></i><strong>Innovation:</strong> Continuously updated features for better job search experience.</li>
              <li><i class="fas fa-check-circle text-primary me-2"></i><strong>Community:</strong> Building connections between job seekers and employers.</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Join Us -->
      <div class="col-lg-12">
        <div class="card  shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-3"><i class="fas fa-handshake me-2"></i>Join Us on Our Journey</h4>
            <p class="card-text">
              While we’re just getting started, we invite you to be part of our growing community. Explore job listings, take advantage of career resources, and join us in transforming the employment landscape in Myanmar—one opportunity at a time.
             
            </p>
            <a class="btn btn-primary" href="{{asset('about.pdf')}}">Read More Detail & Our
            Service > </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')

@endsection