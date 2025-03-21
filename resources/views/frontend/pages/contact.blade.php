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
            <h2 class="mb-10">Contact us</h2>
            <p class="font-lg color-text-paragraph-2">Get the latest news, updates and tips</p>
          </div>
          <div class="col-lg-6 text-lg-end">
            <ul class="breadcrumbs mt-40">
              <li><a class="home-icon" href="#">Home</a></li>
              <li>Contact us</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-box mt-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-40"><span class="font-md color-brand-2 mt-20 d-inline-block">Contact us</span>
          <h2 class="mt-5 mb-10">Get in touch</h2>
          <p class="font-md color-text-paragraph-2">The right move at the right time saves your investment. live<br class="d-none d-lg-block"> the dream of expanding your business.</p>
          <form class="contact-form-style mt-30" id="contact-form" action="#" method="post">
            <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
              <div class="col-lg-6 col-md-6">
                <div class="input-style mb-20">
                  <input class="font-sm color-text-paragraph-2" name="name" placeholder="Enter your name" type="text">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="input-style mb-20">
                  <input class="font-sm color-text-paragraph-2" name="company" placeholder="Comapy (optioanl)" type="text">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="input-style mb-20">
                  <input class="font-sm color-text-paragraph-2" name="email" placeholder="Your email" type="email">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="input-style mb-20">
                  <input class="font-sm color-text-paragraph-2" name="phone" placeholder="Phone number" type="tel">
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="textarea-style mb-30">
                  <textarea class="font-sm color-text-paragraph-2" name="message" placeholder="Tell us about yourself"></textarea>
                </div>
                <button class="submit btn btn-send-message" type="submit">Send message</button>
                <label class="ml-20">
                  <input class="float-start mr-5 mt-6" type="checkbox"> By clicking contact us button, you agree our terms and policy,
                </label>
              </div>
            </div>
          </form>
          <p class="form-messege"></p>
        </div>
        <div class="col-lg-4 ">
          <div class="sidebar-border mt-30">
            <div class="sidebar-heading">
              <h4>UJob.com.mm</h4>
            </div>
            <div class="sidebar-list-job">
              
              <ul class="ul-disc">
                <li>Address : address here</li>
                <li>Phone : 09423242424</li>
                <li>Email : info@ujob.com.mm</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection

@section('script')

@endsection