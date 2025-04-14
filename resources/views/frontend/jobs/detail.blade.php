@extends('frontend.layouts.app')

@section('style')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<section class="section-box mt-50">
  <div class="container">
    <div class="row">
      <!-- Job Detail Content -->
      <div class="col-lg-8 col-md-12">
        <div class="box-border-single">
          <div class="row mt-10 align-items-center">
            <div class="col-md-8">
              <h3>{{ $job->title }}</h3>
              <div class="mb-3">
                <span class="card-briefcase">{{ $job->job_type }}</span>
                <span class="card-time">{{ $job->created_at->diffForHumans() }}</span>
              </div>
            </div>
            <div class="col-md-4 text-end">
              @auth
                @can('seeker')
                  @php
                      $jobDeadline = \Carbon\Carbon::parse($job->deadline);
                      $seeker_id = auth()->user()->seeker->id;
                      $hasApplied = App\Models\JobSeeker::where('job_id', $job->id)->where('seeker_id', $seeker_id)->exists();
                  @endphp
                  @if ($jobDeadline->isFuture() && !$hasApplied)
                    <button class="btn btn-apply btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm" data-bs-jobName="{{ $job->title }}" data-bs-jobId="{{ $job->id }}">Apply now</button>
                  @elseif(!$jobDeadline->isFuture())
                    <span class="btn btn-danger">Apply Date Expired</span>
                  @elseif($hasApplied)
                    <span class="btn btn-success">Applied</span>
                  @endif
                @endcan
              @endauth

              @guest
                <a href="/login" class="btn btn-primary">Login First</a>
              @endguest
            </div>
          </div>

          <!-- Overview -->
          <div class="job-overview mt-4">
            <h5 class="border-bottom pb-15 mb-3">Overview</h5>
            <div class="row">
              <div class="col-md-6 d-flex mb-3">
                <div class="sidebar-icon-item me-2">
                  <img src="{{ asset('assets/imgs/page/job-single/industry.svg') }}" alt="Industry">
                </div>
                <div>
                  <span class="text-description">Industry</span>
                  <strong class="d-block">{{ $job->category->name }}</strong>
                </div>
              </div>
              <div class="col-md-6 d-flex mb-3">
                <div class="sidebar-icon-item me-2">
                  <img src="{{ asset('assets/imgs/page/job-single/job-level.svg') }}" alt="Job Type">
                </div>
                <div>
                  <span class="text-description">Job Type</span>
                  <strong class="d-block">{{ $job->job_type }}</strong>
                </div>
              </div>
              <div class="col-md-6 d-flex mb-3">
                <div class="sidebar-icon-item me-2">
                  <img src="{{ asset('assets/imgs/page/job-single/salary.svg') }}" alt="Salary">
                </div>
                <div>
                  <span class="text-description">Salary</span>
                  <strong class="d-block">{{ $job->salary ? number_format($job->salary) . ' Ks / Month' : 'Negotiate' }}</strong>
                </div>
              </div>
              <div class="col-md-6 d-flex mb-3">
                <div class="sidebar-icon-item me-2">
                  <img src="{{ asset('assets/imgs/page/job-single/deadline.svg') }}" alt="Deadline">
                </div>
                <div>
                  <span class="text-description">Deadline</span>
                  <strong class="d-block">{{ $job->deadline }}</strong>
                </div>
              </div>
              <div class="col-md-6 d-flex mb-3">
                <div class="sidebar-icon-item me-2">
                  <img src="{{ asset('assets/imgs/page/job-single/location.svg') }}" alt="Location">
                </div>
                <div>
                  <span class="text-description">Location</span>
                  <strong class="d-block">{{ $job->location->name }}</strong>
                </div>
              </div>
              <div class="col-md-6 d-flex mb-3">
                <div class="sidebar-icon-item me-2">
                  <img src="{{ asset('assets/imgs/page/job-single/deadline.svg') }}" alt="Skills">
                </div>
                <div>
                  <span class="text-description">Skills</span>
                  <div class="d-flex flex-wrap gap-1 mt-1">
                    @foreach (explode(', ', $job->skills) as $skill)
                      <span class="badge bg-secondary">{{ $skill }}</span>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Description -->
          <div class="content-single mt-4">{!! $job->description !!}</div>

          <!-- Company Info -->
          <div class="author-single mt-4">
            <span>{{ $job->is_anonymous ? 'Anonymous' : ($job->employer->company_name ?? '') }}</span>
          </div>

          <!-- Apply and Share -->
          <div class="single-apply-jobs mt-4">
            <div class="row align-items-center">
              <div class="col-md-5">
                @auth
                  @can('seeker')
                    @if ($jobDeadline->isFuture() && !$hasApplied)
                      <button class="btn btn-default btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm" data-bs-jobName="{{ $job->title }}" data-bs-jobId="{{ $job->id }}">Apply now</button>
                    @endif
                  @endcan
                @endauth
                @guest
                  <a href="/login" class="btn btn-primary">Login First</a>
                @endguest
              </div>
              <div class="col-md-7 text-end">
                <h6 class="d-inline-block me-2">Share this</h6>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="me-2">
                  <img src="{{ asset('assets/imgs/template/icons/share-fb.svg') }}" alt="Facebook">
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text=Check%20this%20out!" target="_blank" class="me-2">
                  <img src="{{ asset('assets/imgs/template/icons/share-tw.svg') }}" alt="Twitter">
                </a>
                <a href="https://wa.me/?text={{ urlencode('Check this out: ' . request()->fullUrl()) }}" target="_blank">
                  <img src="{{ asset('assets/imgs/template/icons/share-whatsapp.svg') }}" alt="WhatsApp">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4 mt-lg-0 mt-4">
      <div class="sidebar-border mb-4 p-3 bg-white shadow-sm rounded">
    @if(!$job->is_anonymous)
        <div class="d-flex align-items-center mb-3">
            <img src="{{ asset('profile/' . $job->employer->user->image) }}" 
                 class="me-3" 
                 alt="Company Image" 
                 style="max-width: 150px; max-height: 150px; object-fit: cover;">
            <div>
               
                
            </div>
        </div>

        <p class="mb-2"><i class="bi bi-briefcase-fill me-1 text-primary"></i> 
            <a href="#" class="text-decoration-none">{{ $job->employer->jobs->count() }} Open Jobs</a>
        </p>

        <ul class="list-unstyled small">
          <li> <h6 class="mb-0">{{ $job->employer->company_name }}</h6></li>
       
            <li><i class="bi bi-geo-alt-fill me-1 text-secondary"></i> {{ $job->employer->location->name ?? '' }}</li>
            <li><i class="bi bi-telephone-fill me-1 text-secondary"></i> Phone: {{ $job->employer->phone ?? 'N/A' }}</li>
            <li><i class="bi bi-envelope-fill me-1 text-secondary"></i> Email: {{ $job->employer->user->email ?? 'N/A' }}</li>
        </ul>
    @else
        <h5 class="text-muted text-center">Anonymous Post</h5>
    @endif
</div>


        <!-- Similar Jobs -->
        <div class="sidebar-border">
          <h6 class="f-18">Similar Jobs</h6>
          <ul class="list-unstyled">
            @foreach ($simplerJobs as $data)
              <li class="mb-3">
                <div class="d-flex align-items-start">
                  @if(!$job->is_anonymous)
                    <img src="{{ asset('profile/' . $data->employer->user->image) }}" class="img-fluid rounded me-2" alt="Company" width="50">
                  @endif
                  <div>
                    <a href="{{ route('frontend.jobs-detail', $data->id) }}" class="fw-bold d-block">{{ $data->title }}</a>
                    <small>{{ $data->job_type }} • {{ $data->created_at->diffForHumans() }}</small><br>
                    <small>{{ $data->salary ? number_format($data->salary) . ' Ks' : 'Negotiate' }}</small>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Jobs -->
<section class="section-box mt-50 mb-50">
  <div class="container">
    <div class="text-left">
      <h2 class="section-title mb-10">Featured Jobs</h2>
      <p class="font-lg text-muted">Get the latest news, updates and tips</p>
    </div>
    <div class="mt-4">
      <div class="swiper-container swiper-group-4 swiper">
        <div class="swiper-wrapper">
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
      
    </div>
  </div>
</section>

@include('frontend.layouts.parts.ads', ['ads' => $ads, 'location' => 'home page bottom'])
@include('frontend.jobs.part.apply-model')
@endsection

@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const applyButtons = document.querySelectorAll('.btn-apply-now');
    const modal = document.getElementById('ModalApplyJobForm');
    const jobTitleElement = modal.querySelector('#modalJobTitle');
    const jobIdElement = modal.querySelector('#dataId');

    applyButtons.forEach(button => {
      button.addEventListener('click', () => {
        jobTitleElement.textContent = button.getAttribute('data-bs-jobName');
        jobIdElement.value = button.getAttribute('data-bs-jobId');
      });
    });
  });
</script>
@endsection
