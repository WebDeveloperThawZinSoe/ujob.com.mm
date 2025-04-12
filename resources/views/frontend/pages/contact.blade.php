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
      <div class="col-lg-6 mb-40">
        <span class="font-md color-brand-2 mt-20 d-inline-block">Get in touch</span>
        <h2 class="mt-5 mb-10">Contact Information</h2>
        <p class="font-md color-text-paragraph-2 mb-4">
          The right move at the right time saves your investment. Live the dream of expanding your business.
        </p>
        <div class="card shadow p-4 rounded-3 border-0">
          <h5 class="mb-3"><i class="fas fa-building me-2 text-primary"></i>UJob.com.mm</h5>
          <p><i class="fas fa-map-marker-alt me-2 text-danger"></i>6/35, Nawaday Garden Housing, Hlaing Thayar Township, Yangon</p>
          <p><i class="fas fa-phone me-2 text-success"></i><a href="tel:09949221468">09 949 221 468</a>, <a href="tel:09949221469">09 949 221 469 ( ၀၉ ၉၄၉ ၂၂၁ ၄၆၈ ) </a></p>
          <p><i class="fas fa-envelope me-2 text-warning"></i><a href="mailto:support@ujob.com.mm">support@ujob.com.mm</a>, <a href="mailto:inquiry@ujob.com.mm">inquiry@ujob.com.mm</a></p>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="ratio ratio-4x3 rounded-3 overflow-hidden shadow">
          <iframe
            src="https://www.google.com/maps?q=6/35%20Nawaday%20Garden%20Housing,%20Hlaing%20Thayar,%20Yangon&output=embed"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')
@endsection
