@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
 
@endsection
@section('content')

  <!-- company profile -->
  <section class="section-box-2">
    <div class="container">
      {{-- Success message --}}
      @if (Session::has('success'))
      <div
        class="alert alert-success alert-dismissible fade show"
        role="alert"
      >
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="alert"
          aria-label="Close"
        ></button>
        <strong>{{ Session::get('success') }}</strong>
      </div>
      <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {
          new bootstrap.Alert(alert);
        });
      </script>

      @endif

      <div class="banner-hero banner-image-single"><img src="{{asset('assets/imgs/page/company/img.png')}}" alt="jobBox"></div>
      <div class="box-company-profile">
        <div class="image-compay">
          
          <img src="{{ asset('profile/'.$employer->user->image) }}" alt="jobBox" style="height: 110px;">
          @auth
            @if ($employer->user_id ==Auth::user()->id)
            <img src="{{asset('assets/imgs/edit.png')}}" alt="" style="width: 30px; display:inline; position:absolute; left:
            0; bottom:10px;" data-bs-toggle="modal" data-bs-target="#modalIdImg">
            @endif
          @endauth
            

        
        </div>
        <div class="row mt-10">
          <div class="col-lg-8 col-md-12">
            <h5 class="f-18">{{$employer->company_name}} <span class="card-location font-regular ml-20">{{$employer->location->name ?? ''}}</span></h5>
            <p class="mt-5 font-md color-text-paragraph-2 mb-15"><a href="{{$employer->company_website}}">{{$employer->company_website}}</a></p>
          </div>
          <div class="col-lg-4 col-md-12 text-lg-end">

            @auth
              @if ($employer->user_id ==Auth::user()->id)
              <a class="btn btn-call-icon btn-apply btn-apply-big" href="#" data-bs-toggle="modal" data-bs-target="#modalIdWholeData">Edit Company</a>
              <a href="/employer/dashboard" class="btn btn-call-icon btn-apply btn-apply-big" >Dashboard</a>
              @endif
            @endauth
            
          </div>
        </div>
      </div>
      <div class="box-nav-tabs mt-40 mb-5">
        <ul class="nav" role="tablist">
          <li><a class="btn btn-border aboutus-icon mr-15 mb-5 active" href="#tab-about" data-bs-toggle="tab" role="tab" aria-controls="tab-about" aria-selected="true">About us</a></li>
          
        </ul>
      </div>
      <div class="border-bottom pt-10 pb-10"></div>
    </div>
  </section>
  
  
  <section class="section-box mt-50">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
          <div class="content-single">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tab-about" role="tabpanel" aria-labelledby="tab-about">
               
                <p>{{$employer->company_description ?? "No description available"}}</p>
                
              </div>
              
            </div>
          </div>
          <div class="box-related-job content-page">
            <h5 class="mb-30">Latest Jobs</h5>
            <div class="box-list-jobs display-list">
                @foreach ($jobs as $data)

                @include('frontend.jobs.part.job-list', [
                    'data' => $data,
                    'jobLink' => route('frontend.jobs-detail', $data->id)
                ])
                    
                @endforeach
              
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
          <div class="sidebar-border">
            <div class="sidebar-heading">
              <div class="avatar-sidebar">
                <div class="sidebar-info pl-0"><span class="sidebar-company">{{$employer->company_name}}</span><span class="card-location">{{$employer->location->name ?? '--'}}</span></div>
              </div>
            </div>
            
            <div class="sidebar-list-job">
              <ul>
                
                <li>
                  <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                  <div class="sidebar-text-info"><span class="text-description">Location</span><strong class="small-heading">{{$employer->location->name ?? '--'}}</strong></div>
                </li>
                <li>
                  <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                  <div class="sidebar-text-info"><span class="text-description">Member since</span><strong class="small-heading">{{ $employer->created_at->format('F j, Y') }}</strong></div>
                </li>
                <li>
                  <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                  <div class="sidebar-text-info"><span class="text-description">Posted Jobs</span><strong class="small-heading">{{$employer->jobs->count()}} Posts</strong></div>
                </li>
              </ul>
            </div>
            <div class="sidebar-list-job">
              <ul class="ul-disc">
                
                <li>Phone: {{$employer->phone}}</li>
              </ul>
              {{-- <div class="mt-30"><a class="btn btn-send-message" href="page-contact.html">Call Employer</a></div> --}}
            </div>
          </div>
          @include('frontend.layouts.parts.ads', [
              'ads' => $ads,
              'location' => 'sidebar'
            ])
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end company profile -->
  

  @auth
    @if ($employer->user_id == Auth::user()->id)
      
    <div
        class="modal fade"
        id="modalIdWholeData"
        tabindex="-1"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        
        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
      >
        <div
          class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
          role="document"
        >
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitleId">
                Update Company Data
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form action="{{route('frontend.employer.profile.company.data.update')}}" method="post" enctype="multipart/form-data">
              @csrf @method("PUT")
            <div class="modal-body">
              
              {{-- Company Name --}}
              <div class="mb-3">
                <label for="" class="form-label">Company Name</label>
                <input
                  type="text"
                  class="form-control"
                  name="company_name"
                  value="{{$employer->company_name}}"
                />
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Company Website</label>
                <input
                  type="text"
                  class="form-control"
                  name="company_website"
                  value="{{$employer->company_website}}"
                />
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Phone Number</label>
                <input
                  type="text"
                  class="form-control"
                  name="phone"
                  value="{{$employer->phone}}"
                />
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Location</label>
                <select
                  class="form-select form-select-lg"
                  name="location_id"
                  id=""
                >
                  <option value="" selected>Select Location</option>
                  @foreach ($locations as $data)
                  <option value="{{$data->id}}">{{$data->name}}</option>
                  @endforeach
                  
                </select>
              </div>
              

              <div class="mb-3">
                <label for="" class="form-label">Company Overview</label>
                <textarea class="form-control" name="company_description" id="" rows="6" cols="6">{{$employer->company_description}}</textarea>
              </div>
              
              
              
            </div>
            <div class="modal-footer">
              
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      
      <!-- Optional: Place to the bottom of scripts -->
      <script>
        const myModal = new bootstrap.Modal(
          document.getElementById("modalIdWholeData"),
          options,
        );
      </script>

      
      
      <!-- Modal Body -->
      <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
      <div
        class="modal fade"
        id="modalIdImg"
        tabindex="-1"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        
        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
      >
        <div
          class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
          role="document"
        >
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitleId">
                Profile Image
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form action="{{route('frontend.employer.profile.image.update')}}" method="post" enctype="multipart/form-data">
              @csrf @method("PUT")
            <div class="modal-body">
              <div class="mb-3">
                
                <input
                  type="file"
                  class="form-control"
                  name="profile_image"
                  id=""
                  aria-describedby="helpId"
                  placeholder=""
                />
                <small id="helpId" class="form-text text-muted">5 MB is max and use Square Size</small>
              </div>
              
            </div>
            <div class="modal-footer">
              
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      
      <!-- Optional: Place to the bottom of scripts -->
      <script>
        const myModal = new bootstrap.Modal(
          document.getElementById("modalIdImg"),
          options,
        );
      </script>
         
    @endif
  @endauth

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