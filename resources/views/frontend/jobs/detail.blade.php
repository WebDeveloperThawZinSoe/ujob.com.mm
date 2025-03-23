@extends('frontend.layouts.app')

@section('style')
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
@endsection

@section('content')
<section class="section-box mt-50">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
          <div class="box-border-single">
            <div class="row mt-10">
              <div class="col-lg-8 col-md-12">
                <h3>{{$job->title}}</h3>
                <div class="mt-0 mb-15"><span class="card-briefcase">{{$job->job_type}}</span><span class="card-time">{{ $job->created_at->diffForHumans() }}</span></div>
              </div>
              <div class="col-lg-4 col-md-12 text-lg-end">                              
                

                @auth
                  @can('seeker')
                      @php
                          $currentDate = \Carbon\Carbon::now();
                          $jobDeadline = \Carbon\Carbon::parse($job->deadline);
                          $hasApplied = auth()->user()->appliedJobs->contains($job->id);
                          $seeker_id = auth()->user()->seeker->id;
                          
                          $hasApplied = App\Models\JobSeeker::where('job_id', $job->id)->where('seeker_id', $seeker_id)->count();
             
                      @endphp

                      @if ($jobDeadline->isFuture() && !$hasApplied)
                          <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm" data-bs-jobName="{{ $job->title }}" data-bs-jobId="{{ $job->id }}">Apply now</div>

                      @endif
                      @if(!$jobDeadline->isFuture())
                      <div ><span class="btn btn-danger" style="border-radius:0px !important;">Apply Date Expired</span></div>
                      @endif
                      @if($hasApplied)
                      <div ><span class="btn btn-success" style="border-radius:0px !important;">Applied</span></div>
                      @endif
                  @endcan
                @endauth

                @guest 
                <a href="/login" class="btn btn-apply-icon btn-apply btn-apply-big hover-up btn-apply-now" style="color:white !important;">Login First</a>
                @endguest

              </div>
            </div>
            
            
            <div class="job-overview">
              <h5 class="border-bottom pb-15 mb-30">Overview</h5>
              <div class="row">
                <div class="col-md-6 d-flex">
                  <div class="sidebar-icon-item"><img src="{{asset('assets')}}/imgs/page/job-single/industry.svg" alt="jobBox"></div>
                  <div class="sidebar-text-info ml-10"><span class="text-description industry-icon mb-10">Industry</span><strong class="small-heading"> {{$job->category->name}}</strong></div>
                </div>
                <div class="col-md-6 d-flex mt-sm-15">
                  <div class="sidebar-icon-item"><img src="{{asset('assets')}}/imgs/page/job-single/job-level.svg" alt="jobBox"></div>
                  <div class="sidebar-text-info ml-10"><span class="text-description joblevel-icon mb-10">Job Type</span><strong class="small-heading">{{$job->job_type}}</strong></div>
                </div>
              </div>
              <div class="row mt-25">
                <div class="col-md-6 d-flex mt-sm-15">
                  <div class="sidebar-icon-item"><img src="{{asset('assets')}}/imgs/page/job-single/salary.svg" alt="jobBox"></div>
                  <div class="sidebar-text-info ml-10"><span class="text-description salary-icon mb-10">Salary</span><strong class="small-heading">{{$job->salary}} Ks / Month</strong></div>
                </div>
                <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="{{asset('assets')}}/imgs/page/job-single/deadline.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Deadline</span><strong class="small-heading">{{$job->deadline}}</strong></div>
                  </div>
              </div>
              <div class="row mt-25">
                <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="{{asset('assets')}}/imgs/page/job-single/location.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Location</span><strong class="small-heading">{{$job->location->name}}</strong></div>
                </div>
                <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="{{asset('assets')}}/imgs/page/job-single/deadline.svg" alt="jobBox"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Skills</span>
                        <strong class="small-heading">
                            <div class="sidebar-list-job" style="border: 0px; margin: 0px; padding: 0;">

                                @foreach (explode(', ', $job->skills) as $key => $item)
                                    <a class="btn btn-grey-small bg-14 mb-10 mr-5" href="#">{{$item}}</a>
                                @endforeach
                                
                            </div>
                        </strong>
                    </div>
                </div>
              </div>
            </div>
            <div class="content-single">
              {!! $job->description !!}
            </div>
            <div class="author-single"><span>{{$job->employer->company_name ?? ""}}</span></div>
            <div class="single-apply-jobs">
              <div class="row align-items-center">
                <div class="col-md-5">
                  
                  @auth
                  @can('seeker')
                      

                      @if ($jobDeadline->isFuture() && !$hasApplied)
                          <div class="btn btn-default mr-15 btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm" data-bs-jobName="{{ $job->title }}" data-bs-jobId="{{ $job->id }}">Apply now</div>
                      @endif

                      
                  @endcan
                @endauth
                @guest 
                <a href="/login" class="btn btn-apply-icon btn-apply btn-apply-big hover-up btn-apply-now" style="color:white !important;">Login First</a>
                @endguest
                </div>
                <div class="col-md-7 text-lg-end social-share">
                  <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-10">Share this</h6>
                  <a class="mr-5 d-inline-block d-middle" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank">
                    <img alt="jobBox" src="{{ asset('assets/imgs/template/icons/share-fb.svg') }}">
                  </a>
                  <a class="mr-5 d-inline-block d-middle" href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text=Check%20this%20out!" target="_blank">
                    <img alt="jobBox" src="{{ asset('assets/imgs/template/icons/share-tw.svg') }}">
                  </a>
                  <a class="d-inline-block d-middle" href="https://wa.me/?text={{ urlencode('Check this out: ' . request()->fullUrl()) }}" target="_blank">
                    <img alt="jobBox" src="{{ asset('assets/imgs/template/icons/share-whatsapp.svg') }}">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
          <div class="sidebar-border">
            <div class="sidebar-heading">
              <div class="avatar-sidebar">
                <figure><img alt="jobBox" src="{{asset('profile/'.$job->employer->user->image)}}" width="100px"></figure>
                <div class="sidebar-info"><span class="sidebar-company">{{$job->employer->company_name ?? ""}}</span><span class="card-location">{{$job->employer->location->name  ?? ""}}</span><a class="link-underline mt-15" href="#">{{$job->employer->jobs->count()}} Open Jobs</a></div>
              </div>
            </div>
            <div class="sidebar-list-job">
              
              <ul class="ul-disc">
                <li>{{$job->employer->location->name  ?? ""}}</li>
                <li>Phone: {{$job->employer->phone}}</li>
                <li>Email: {{$job->employer->user->email}}</li>
              </ul>
            </div>
          </div>
          <div class="sidebar-border">
            <h6 class="f-18">Similar jobs</h6>
            <div class="sidebar-list-job">
              <ul>
                @foreach ($simplerJobs as $data)
                <li>
                    <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                      <div class="image"><a href="{{route('frontend.jobs-detail', $data->id)}}"><img src="{{asset('profile/'.$data->employer->user->image)}}" alt="jobBox" style="width:45px"></a></div>
                      <div class="info-text">
                        <h5 class="font-md font-bold color-brand-1"><a href="{{route('frontend.jobs-detail', $data->id)}}">{{$data->title}}</a></h5>
                        <div class="mt-0"><span class="card-briefcase">{{$data->job_type}}</span><span class="card-time"><span>{{ $data->created_at->diffForHumans() }}</span></div>
                        <div class="mt-5">
                          <div class="row">
                            <div class="col-6">
                              <h6 class="card-price">{{$data->salary}}<span> Ks / Month</span></h6>
                            </div>
                            <div class="col-6 text-end"><span class="card-briefcase">{{$data->location->name ?? ""}}</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
                
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>
  <section class="section-box mt-50 mb-50">
    <div class="container">
      <div class="text-left">
        <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Featured Jobs</h2>
        <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Get the latest news, updates and tips</p>
      </div>
      <div class="mt-50">
        <div class="box-swiper style-nav-top">
          <div class="swiper-container swiper-group-4 swiper">
            <div class="swiper-wrapper pb-10 pt-5">
                @foreach ($highlightJobs as $data)
                    <div class="swiper-slide">
                        @include('frontend.jobs.part.job-card', [
                            'data' => $data,
                            'jobLink' => route('frontend.jobs-detail', $data->id)
                        ])
                    </div>
                @endforeach
              
              
            </div>
          </div>
          <div class="swiper-button-next swiper-button-next-4"></div>
          <div class="swiper-button-prev swiper-button-prev-4"></div>
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
