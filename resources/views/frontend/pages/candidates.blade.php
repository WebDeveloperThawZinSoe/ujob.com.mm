@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
 
@endsection
@section('content')
<section class="section-box mt-30">
    <div class="container">           
      <div class="content-page">
        <div class="box-filters-job">
          <div class="row">
            <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Total Seekers <strong>{{$candidates->count()}} </strong></span></div>
            <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
              <div class="display-flex2">
                <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                  <div class="dropdown dropdown-sort">
                    <button class="btn dropdown-toggle" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>12</span><i class="fi-rr-angle-small-down"></i></button>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                      <li><a class="dropdown-item active" href="#">10</a></li>
                      <li><a class="dropdown-item" href="#">15</a></li>
                      <li><a class="dropdown-item" href="#">20</a></li>
                    </ul>
                  </div>
                </div>
                <div class="box-view-type"><a class="view-type" href="jobs-grid.html"><img src="assets/imgs/template/icons/icon-grid-hover.svg" alt="jobBox"></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($candidates as $data)
          @php
              $skills = explode(',', $data->skills); // Split the skills string into an array using commas
              
          @endphp

            <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="card-grid-2 hover-up">
                <div class="card-grid-2-image-left">
                  <div class="card-grid-2-image-rd online"><a href="candidate-details.html">
                      <figure><img alt="jobBox" src="{{asset('profile/'.$data->user->image)}}"></figure></a></div>
                  <div class="card-profile pt-10"><a href="candidate-details.html">
                      <h5>{{$data->full_name}}</h5></a>
                      <span class="font-xs color-text-mutted">{{$data->headline}}</span>
                    
                  </div>
                </div>
                <div class="card-block-info">
                  {{-- <p class="font-xs color-text-paragraph-2">{{$data->headline}}</p> --}}
                  <div class="card-2-bottom card-2-bottom-candidate mt-30">
                    <div class="text-start">
                      @foreach ($skills as $skill)
                      <a class="btn btn-tags-sm mb-10 mr-5" href="#" 
                      style="background-color: #f1ca4f;
                      padding: 5px;
                      color: white;">{{ $skill }}</a>
                      @endforeach
                      
                    </div>
                  </div>
                  
                </div>
              </div>
            </div> 
          @endforeach
          
         
        </div>
      </div>
      {{-- <div class="paginations">
        <ul class="pager">
          <li><a class="pager-prev" href="#"></a></li>
          <li><a class="pager-number" href="#">1</a></li>
          <li><a class="pager-number" href="#">2</a></li>
          <li><a class="pager-number" href="#">3</a></li>
          <li><a class="pager-number" href="#">4</a></li>
          <li><a class="pager-number" href="#">5</a></li>
          <li><a class="pager-number active" href="#">6</a></li>
          <li><a class="pager-number" href="#">7</a></li>
          <li><a class="pager-next" href="#"></a></li>
        </ul>
      </div> --}}
    </div>
  </section>

  @foreach ($ads as $item)
        @if ($item->location == 'home page bottom')
            <div class="container mt-4">
              <a href="http://">
                <img src="{{asset('ads/'.$item->image_url)}}" alt="">
              </a>
            </div>
        @endif
      @endforeach
@endsection

@section('script')

@endsection