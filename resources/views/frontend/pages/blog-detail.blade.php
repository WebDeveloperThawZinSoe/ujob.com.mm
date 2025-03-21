@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<!-- Blog Detail -->
<section class="section-box">
  <div style="display:block; width: 100%;"><img style="margin: 0px auto; display:block;" src="{{asset('articles/'.$article->asset)}}"></div>
</section>
<section class="section-box">
  <div class="archive-header pt-50 text-center">
    <div class="container">
      <div class="box-white">
        <div class="max-width-single">
          <h2 class="mb-30 mt-20 text-center">{{$article->title}}</h2>
          <div class="post-meta text-muted d-flex align-items-center mx-auto justify-content-center">
            
            <div class="date"><span class="font-xs color-text-paragraph-2 mr-20 d-inline-block"><img class="img-middle mr-5" src="assets/imgs/page/blog/calendar.svg"> {{ \Carbon\Carbon::parse($article->date)->format('d F Y') }}</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('content')


  <div class="post-loop-grid">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="single-body">
            
            <div class="max-width-single">
              <div class="content-single">
                {!! $article->description !!}
              </div>
              <div class="single-apply-jobs mt-20">
                <div class="row">
                  
                  
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end Blog Detail -->
@endsection

@section('script')

@endsection