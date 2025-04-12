@extends('frontend.layouts.app')

@section('style')
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
@endsection

@section('content')




 <!-- Job List -->
 <section class="section-box-2">
    <div class="container">
      <div class="banner-hero banner-single banner-single-bg">
        <div class="block-banner text-center">
          <h3 class="wow animate__animated animate__fadeInUp"><span class="color-brand-2"></span> Available Now</h3>
          
          <div class="form-find text-start mt-40 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
            <form method="GET" action="{{ route('frontend.jobs') }}">
              <div class="box-industry">
                <select class="form-input mr-10 select-active input-industry" name="category_id">
                    <option value="">Job Category</option>
                    @foreach ($categories as $data)
                    <option value="{{$data->id}}" {{ request('category_id') == $data->id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
              </div>
              <select class="form-input mr-10 select-active" name="location_id">
                    <option value="">Location</option>
                    @foreach ($locations as $data)
                    <option value="{{$data->id}}" {{ request('location_id') == $data->id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
              </select>
              <input class="form-input input-keysearch mr-10" type="text" name="title" value="{{ request('title') }}" placeholder="Your keyword... ">
              <button class="btn btn-default btn-find font-sm">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="section-box mt-30">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
          <div class="content-page">
            <div class="box-filters-job">
              <div class="row">
                <div class="col-xl-6 col-lg-5">
                    <span class="text-small text-showing">Showing {{ $jobs->firstItem() }}-{{ $jobs->lastItem() }} of {{ $jobs->total() }} jobs</span>
                </div>
                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                  <div class="display-flex2">
                    
                    
                    <div class="box-view-type"><a class="view-type" href=""><img src="{{asset('assets')}}/imgs/template/icons/icon-grid-hover.svg" alt="jobBox"></a></div>
                  </div>
                </div>
              </div>
            </div>
            
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="row">
              @foreach ($jobs as $data)
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 20px !important;">
                @include('frontend.jobs.part.job-card', [
                    'data' => $data,
                    'jobLink' => route('frontend.jobs-detail', $data->id)
                ])
              </div>   
                
              @endforeach
            </div>
          </div>
          <div class="paginations">
            {!! $jobs->appends(request()->query())->links() !!} 
          </div>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-12">
          <div class="sidebar-shadow none-shadow mb-30">
            <div class="sidebar-filters">
              <form method="GET" action="{{ route('frontend.jobs') }}">
                <div class="filter-block head-border mb-30">
                  <h5>Advance Filter <a class="link-reset" href="{{ route('frontend.jobs') }}">Reset</a></h5>
                </div>
                <div class="filter-block mb-30">
                  <div class="form-group select-style select-style-icon">
                    <select class="form-control form-icons select-active" name="location_id">
                        <option value="">Location</option>
                        @foreach ($locations as $data)
                          <option value="{{$data->id}}" {{ request('location_id') == $data->id ? 'selected' : '' }}>{{$data->name}}</option>
                        @endforeach
                    </select><i class="fi-rr-marker"></i>
                  </div>
                </div>
                <div class="filter-block mb-20">
                  <h5 class="medium-heading mb-15">Industry</h5>
                  <div class="form-group">
                    <ul class="list-checkbox">
                      @foreach ($categories as $data)
                      <li>
                        <label class="cb-container">
                          <input type="checkbox" value="{{$data->id}}" name="category_id[]" {{ in_array($data->id, (array) request('category_id', [])) ? 'checked' : '' }}><span class="text-small">{{$data->name}}</span><span class="checkmark"></span>
                        </label>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <div class="filter-block mb-30">
                  <h5 class="medium-heading mb-10">Job Posted</h5>
                  <div class="form-group">
                    <ul class="list-checkbox">
                      <li>
                        <label class="cb-container">
                          <input type="radio" value="all" name="job_posted" {{ request('job_posted') == 'all' ? 'checked' : '' }}><span class="text-small">All</span><span class="checkmark"></span>
                        </label>
                      </li>
                      <li>
                        <label class="cb-container">
                          <input type="radio" value="1" name="job_posted" {{ request('job_posted') == '1' ? 'checked' : '' }}><span class="text-small">1 day</span><span class="checkmark"></span>
                        </label>
                      </li>
                      <li>
                        <label class="cb-container">
                          <input type="radio" value="7" name="job_posted" {{ request('job_posted') == '7' ? 'checked' : '' }}><span class="text-small">7 days</span><span class="checkmark"></span>
                        </label>
                      </li>
                      <li>
                        <label class="cb-container">
                          <input type="radio" value="30" name="job_posted" {{ request('job_posted') == '30' ? 'checked' : '' }}><span class="text-small">30 days</span><span class="checkmark"></span>
                        </label>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="filter-block mb-20">
                  <h5 class="medium-heading mb-15">Job type</h5>
                  <div class="form-group">
                    <ul class="list-checkbox">
                      <li>
                        <label class="cb-container">
                          <input type="checkbox" value="Full Time" name="job_type[]" {{ in_array('Full Time', (array) request('job_type', [])) ? 'checked' : '' }}><span class="text-small">Full Time</span><span class="checkmark"></span>
                        </label>
                      </li>
                      <li>
                        <label class="cb-container">
                          <input type="checkbox" value="Part Time" name="job_type[]" {{ in_array('Part Time', (array) request('job_type', [])) ? 'checked' : '' }}><span class="text-small">Part Time</span><span class="checkmark"></span>
                        </label>
                      </li>
                      <li>
                        <label class="cb-container">
                          <input type="checkbox" value="Remote Jobs" name="job_type[]" {{ in_array('Remote Jobs', (array) request('job_type', [])) ? 'checked' : '' }}><span class="text-small">Remote Jobs</span><span class="checkmark"></span>
                        </label>
                      </li>
                      <li>
                        <label class="cb-container">
                          <input type="checkbox" value="Freelancer" name="job_type[]" {{ in_array('Freelancer', (array) request('job_type', [])) ? 'checked' : '' }}><span class="text-small">Freelancer</span><span class="checkmark"></span>
                        </label>
                      </li>
                    </ul>
                  </div>
                </div>
                <button class="btn btn-default btn-find font-sm">Apply Filters</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('frontend.layouts.parts.ads', [
      'ads' => $ads,
      'location' => 'home page bottom'
    ])


  @include('frontend.jobs.part.apply-model')
@endsection

@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var applyButtons = document.querySelectorAll('.btn-apply-now');
    var modal = document.getElementById('ModalApplyJobForm');
    var jobTitleElement = modal.querySelector('#modalJobTitle');
    var jobIdElement = modal.querySelector('#dataId');

    applyButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        var jobTitle = button.getAttribute('data-bs-jobName');
        var jobId = button.getAttribute('data-bs-jobId');

        jobTitleElement.textContent = jobTitle;
        jobIdElement.value = jobId;
      });
    });
  });
</script>

@endsection
