@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<section class="section-box">
  <div class="breacrumb-cover">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="mb-10">Checkout Success</h2>
          {{-- <p class="font-lg color-text-paragraph-2">Pricing built to suits teams of all sizes.</p> --}}
        </div>
        <div class="col-lg-6 text-lg-end">
          <ul class="breadcrumbs mt-40">
            <li><a class="home-icon" href="/">Home</a></li>
            <li>Checkout Success</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('content')


<section class="section-box mt-90">
  <div class="container">
    
    <div class="row justify-content-center">
        <div class="col-lg-4 mb-15">
            <div class="box-step">
              <h1 class="number-element">🎉</h1>
              <h4 class="mb-20">Checkout Success</h4>
              <p class="text-center text-muited">You're Checkout Process is success. We will contact soon.</p>
              <a href="/" class="btn btn-default mr-15 btn-apply-now " style="margin-top: 20px;">Home </a>
            </div>
        </div>
    </div>

  </div>
</section>
  
@endsection

@section('script')

@endsection