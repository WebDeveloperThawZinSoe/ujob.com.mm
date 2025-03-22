@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
 
@endsection
@section('content')

  <section class="section-box mt-30">
    <div class="container">
      <div class="row ">
        <div class="col-12">
          <div class="content-page">
            <div class="box-filters-job">
              <div class="row">
                <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Total <strong>{{$companies->count()}} </strong>
              </span></div>
                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                  <div class="display-flex2">
                    <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                      <div class="dropdown dropdown-sort">
                        <button class="btn dropdown-toggle" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>12</span><i class="fi-rr-angle-small-down"></i></button>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                          <li><a class="dropdown-item active" href="#">10</a></li>
                          <li><a class="dropdown-item" href="#">12</a></li>
                          <li><a class="dropdown-item" href="#">20</a></li>
                        </ul>
                      </div>
                    </div>
                    
                    <div class="box-view-type"><a class="view-type" href="#"><img src="assets/imgs/template/icons/icon-grid-hover.svg" alt="jobBox"></a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">

              @foreach ($companies as $data)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                  <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn">
                    <div class="image-box"><a href="{{route('frontend.employer.profile', $data->company_name)}}"><img src="{{asset('profile/'.$data->user->image)}}" alt="jobBox" style="width: 70px"></a></div>
                    <div class="info-text mt-10">
                      <h5 class="font-bold"><a href="{{route('frontend.employer.profile', $data->company_name)}}">{{$data->company_name}}</a></h5>
                      
                    <span class="card-location">{{$data->location->name ?? ''}}</span>
                      <div class="mt-30"><a class="btn btn-grey-big" href="{{route('frontend.employer.profile', $data->company_name)}}"><span>{{$data->activeJobs->count()}}</span><span> Jobs Open</span></a></div>
                    </div>
                  </div>
                </div>
              @endforeach
              
              
            </div>
          </div>
          <div class="paginations">
            
          </div>
        </div>
        
      </div>
    </div>
  </section>
  
@endsection

@section('script')

@endsection