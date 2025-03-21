@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
 
@endsection
@section('content')
<!-- Blog Grid -->
<section class="section-box">
    <div class="breacrumb-cover">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="mb-10">Blog</h2>
            <p class="font-lg color-text-paragraph-2">Get the latest news, updates and tips</p>
          </div>
          <div class="col-lg-6 text-end">
            <ul class="breadcrumbs mt-40">
              <li><a class="home-icon" href="/">Home</a></li>
              <li>Blog</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-box mt-50">
    <div class="post-loop-grid">
      <div class="container">
        
        <div class="row mt-30">
          <div class="col-lg-12">
            <div class="row">
              @foreach ($articles as $item)
              <div class="col-lg-4 mb-30">
                <div class="card-grid-3 hover-up">
                  <div class="text-center card-grid-3-image"><a href="{{ route('frontend.blog-detail', $item->id) }}">
                      <figure><img alt="jobBox" src="{{ asset('articles'). '/' . $item->asset }}"></figure></a></div>
                  <div class="card-block-info">
                    <div class="tags mb-15"><a class="btn btn-tag" href="{{ route('frontend.blog-detail', $item->id) }}">News</a></div>
                    <h5><a href="{{ route('frontend.blog-detail', $item->id) }}">{{ $item->title }}</a></h5>
                    
                    <div class="card-2-bottom mt-20">
                      <div class="row">
                        <div class="col-lg-6 col-6">
                          <div class="d-flex">
                            <div class="info-right-img"><span class="font-xs color-text-paragraph-2">{{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}</span></div>
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
          
        </div>
      </div>
    </div>
  </section>
  <!-- end Blog Grid -->
@endsection

@section('script')

@endsection