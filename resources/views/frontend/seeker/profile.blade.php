@extends('frontend.layouts.app')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
<!-- Breadcrumb Data Here -->
@endsection

@section('content')
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
  </div>
</section>

<section class="section-box-2">
    <div class="container">
        <div class="banner-hero banner-image-single">
            <img src="{{ asset('assets/imgs/page/candidates/img.png') }}" alt="jobbox">
            <a class="btn-editor" href="#"></a>
        </div>
        <div class="box-company-profile">
            <div class="image-compay">
                <img src="{{ asset('assets/imgs/page/candidates/candidate-profile.png') }}" alt="jobbox">
            </div>
            <div class="row mt-10">
                <div class="col-lg-8 col-md-12">
                    <h5 class="f-18">Steven Jobs 
                        <span class="card-location font-regular ml-20">New York, US</span>
                    </h5>
                    <p class="mt-0 font-md color-text-paragraph-2 mb-15">UI/UX Designer. Front end Developer</p>
                </div>
                <div class="col-lg-4 col-md-12 text-lg-end">
                    <a class="btn btn-preview-icon btn-apply btn-apply-big" href="{{route('frontend.cv', auth()->user()->seeker->id)}}">Preview</a>
                </div>
            </div>
        </div>
        <div class="border-bottom pt-10 pb-10"></div>
    </div>
</section>

<section class="section-box mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="box-nav-tabs nav-tavs-profile mb-5">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="btn btn-border aboutus-icon mb-20 active" href="#tab-my-profile" data-bs-toggle="tab" role="tab" aria-controls="tab-my-profile" aria-selected="true">My Profile</a>
                        </li>
                        <li>
                            <a class="btn btn-border recruitment-icon mb-20" href="#tab-my-jobs" data-bs-toggle="tab" role="tab" aria-controls="tab-my-jobs" aria-selected="false">My Jobs</a>
                        </li>
                        <li>
                            <a class="btn btn-border people-icon mb-20" href="{{route('frontend.cv', auth()->user()->seeker->id)}}">View CV</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                <div class="content-single">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel" aria-labelledby="tab-my-profile">
                            <h3 class="mt-0 mb-15 color-brand-1">My Account</h3>
                            <a class="font-md color-text-paragraph-2" href="#">Upload Professional Photo</a>
                            <div class="mt-35 mb-40 box-info-profie">
                                <div class="image-profile">
                                    <img src="{{ asset('assets/imgs/page/candidates/candidate-profile.png') }}" alt="jobbox">
                                </div>
                                <a class="btn btn-apply">Upload Avatar</a>
                                <a class="btn btn-link">Delete</a>
                            </div>

                            <div class="row form-contact">
                                <div class="col-lg-6 col-md-12">
                                    <form action="{{ route('frontend.seeker.update') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="font-sm color-text-muted mb-10">Full Name *</label>
                                            <input class="form-control" type="text" name="full_name" value="{{ $seeker->full_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-sm color-text-muted mb-10">Email *</label>
                                            <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-sm color-text-muted mb-10">Contact number</label>
                                            <input class="form-control" type="text" name="contact_number" value="{{ $seeker->contact_number }}">
                                        </div>
                                        <div class="form-group">
                                          <label class="font-sm color-text-muted mb-10">Contact number</label>
                                          <input class="form-control" type="text" name="contact_number" value="{{ $seeker->contact_number }}">
                                      </div>
                                        <div class="form-group">
                                            <label class="font-sm color-text-muted mb-10">Headline</label>
                                            <textarea class="form-control" rows="4" name="headline">{{ $seeker->headline }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-sm color-text-muted mb-10">Summary</label>
                                            <textarea class="form-control" rows="4" name="summary">{{ $seeker->summary }}</textarea>
                                        </div>
                                        <button class="btn btn-apply-big font-md font-bold" type="submit">Change</button>
                                    </form>

                                    <div class="border-bottom pt-10 pb-10 mb-30"></div>
                                    <h6 class="color-orange mb-20">Change your password</h6>
                                    <form action="{{ route('frontend.account.changePassword', auth()->user()->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-muted mb-10">Password</label>
                                                    <input class="form-control" type="password" name="current_password">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-muted mb-10">New Password *</label>
                                                    <input class="form-control" type="password" name="new_password">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-muted mb-10">Re-Password *</label>
                                                    <input class="form-control" type="password" name="new_password_confirmation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-bottom pt-10 pb-10"></div>
                                        <div class="box-button mt-15">
                                            <button class="btn btn-apply-big font-md font-bold" type="submit">Change</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                  <h4 class="mb-30">Professional Experience</h4>
                                  <ul id="experienceList mb-15">
                                    @foreach($seeker->seekerExperiences as $data)
                                      <div class="card mb-10">
                                        <div class="card-body">
                                          <h6>{{ $data->title }}</h6>
                                          <p>{{ $data->company }} <small>{{ $data->start_date }} to {{ $data->end_date ?? '' }}</small></p>
                                          <button type="button" class="btn btn-secondary btn-sm editExperienceButton"
                                                  data-id="{{ $data->id }}"
                                                  data-title="{{ $data->title }}"
                                                  data-company="{{ $data->company }}"
                                                  data-start_date="{{ $data->start_date }}"
                                                  data-end_date="{{ $data->end_date }}"
                                                  data-bs-toggle="modal" data-bs-target="#experienceModal">
                                            Edit
                                          </button>
                                          <button type="button" class="btn btn-danger btn-sm deleteExperienceButton" data-id="{{ $data->id }}">
                                            Delete
                                          </button>
                                        </div>
                                      </div>
                                    @endforeach
                                  </ul>
                                  <button type="button" class="btn btn-warning btn-lg " data-bs-toggle="modal" data-bs-target="#experienceModal" style="float: right">
                                    Add Experience
                                  </button>
                                  
                                  <h4 class="mt-30 mb-30">Education</h4>
                                  <ul id="educationList mb-15">
                                    @foreach($seeker->seekerEducations as $data)
                                      <div class="card mb-10">
                                        <div class="card-body">
                                          <h6>{{ $data->degree }}</h6>
                                          <p>{{ $data->institution }} <small>{{ $data->start_date }} to {{ $data->end_date ?? '' }}</small></p>
                                          <button type="button" class="btn btn-secondary btn-sm editEducationButton"
                                                  data-id="{{ $data->id }}"
                                                  data-degree="{{ $data->degree }}"
                                                  data-institution="{{ $data->institution }}"
                                                  data-start_date="{{ $data->start_date }}"
                                                  data-end_date="{{ $data->end_date }}"
                                                  data-bs-toggle="modal" data-bs-target="#educationModal">
                                            Edit
                                          </button>
                                          <button type="button" class="btn btn-danger btn-sm deleteEducationButton" data-id="{{ $data->id }}">
                                            Delete
                                          </button>
                                        </div>
                                      </div>
                                    @endforeach
                                  </ul>
                                  <button type="button" class="btn btn-warning btn-lg float-rigth" data-bs-toggle="modal" data-bs-target="#educationModal"style="float: right">
                                    Add Education
                                  </button>
                                  
                                  <h4 class="mt-30 mb-30 ">Projects</h4>
                                  <ul id="projectList mb-15">
                                    @foreach($seeker->seekerProjects as $data)
                                      <div class="card mb-10">
                                        <div class="card-body">
                                          <h6>{{ $data->title }}</h6>
                                          <p><small>{{ $data->start_date }} to {{ $data->end_date ?? '' }}</small></p>
                                          <p>{{ $data->description }} </p>
                                          <button type="button" class="btn btn-secondary btn-sm editProjectButton"
                                                  data-id="{{ $data->id }}"
                                                  data-title="{{ $data->title }}"
                                                  data-description="{{ $data->description }}"
                                                  data-start_date="{{ $data->start_date }}"
                                                  data-end_date="{{ $data->end_date }}"
                                                  data-bs-toggle="modal" data-bs-target="#projectModal">
                                            Edit
                                          </button>
                                          <button type="button" class="btn btn-danger btn-sm deleteProjectButton" data-id="{{ $data->id }}">
                                            Delete
                                          </button>
                                        </div>
                                      </div>
                                    @endforeach
                                  </ul>
                                  <button type="button" class="btn btn-warning btn-lg float-rigth" data-bs-toggle="modal" data-bs-target="#projectModal"style="float: right">
                                    Add Project
                                  </button>

                                  
                                  <h4 class="mt-30 mb-30 mt-30">Skills</h4>

                                  <form action="{{ route('frontend.seeker.skill.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                
                                    <select class="form-control" name="skills[]" id="skills" multiple>
                                        @foreach ($skills as $skill)
                                            <option {{ str_contains($seeker->skills, $skill->name) ? 'selected' : '' }}>
                                                {{ $skill->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                
                                    <button type="submit" class="btn btn-warning mt-15 float-rigth btn-lg" style="float: right">
                                        Save Skills
                                    </button>
                                </form>
                                
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-my-jobs" role="tabpanel" aria-labelledby="tab-my-jobs">
                            <h3 class="mt-0 color-brand-1 mb-50">My Jobs</h3>
                            <div class="row display-list">
                                @foreach ($myJobs as $data)
                                    <div class="col-xl-12 col-12">
                                        <div class="card-grid-2 hover-up">
                                            @if ($data->job->highlight == 1)
                                                <span class="flash"></span>
                                            @endif
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="card-grid-2-image-left">
                                                        <div class="image-box">
                                                            <img style="width: 50px" src="{{ asset('profile/'.$data->job->employer->user->image) }}" alt="jobBox">
                                                        </div>
                                                        <div class="right-info">
                                                            <a class="name-job" href="{{ route('frontend.employer.profile', $data->job->employer->company_name) }}">{{ $data->job->employer->company_name }}</a>
                                                            <span class="location-small">{{ $data->job->location->name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                    <div class="pl-15 mb-15 mt-30">
                                                        @foreach(explode(', ', $data->job->skills) as $skill)
                                                            <a class="btn btn-grey-small mr-5" href="#">{{ $skill }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-block-info">
                                                <h4><a href="{{ route('frontend.jobs-detail', $data->job->id) }}">{{ $data->job->title }}</a></h4>
                                                <div class="mt-5">
                                                    <span class="card-briefcase">{{ $data->job->job_type }}</span>
                                                    <span class="card-time"><span>{{ $data->job->created_at->diffForHumans() }}</span></span>
                                                </div>
                                                <div class="card-2-bottom mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-7">
                                                            <span class="card-text-price">{{ $data->job->salary }}</span> Month
                                                        </div>
                                                        <div class="col-lg-5 col-5 text-end">
                                                            <a href="{{ route('frontend.jobs-detail', $data->job->id) }}" class="btn btn-apply-now">View Job</a>
                                                            <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalCheckStatus{{ $data->id }}">Check Status</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="paginations">
                                    {!! $myJobs->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($myJobs as $data)
            <div class="modal fade" id="ModalCheckStatus{{ $data->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="ModalCheckStatus{{ $data->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document" style="min-width: 1000px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $data->job->title }}</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="mt-2">
                                    <div class="row justify-content-center">
                                        @if ($data->status == 'Rejected')
                                            <div class="col-lg-3">
                                                <div class="box-step">
                                                    <h1 class="number-element">❌</h1>
                                                    <h4 class="mb-20">Rejected</h4>
                                                </div>
                                            </div>
                                        @else
                                            @php
                                                $steps = [
                                                    'Submitted' => ['Submitted', 'Under Review', 'Interviewed', 'Hired'],
                                                    'Under Review' => ['Under Review', 'Interviewed', 'Hired'],
                                                    'Interviewed' => ['Interviewed', 'Hired'],
                                                    'Hired' => ['Hired']
                                                ];
                                            @endphp
                                            @foreach (['Submitted', 'Under Review', 'Interviewed', 'Hired'] as $step)
                                                <div class="col-lg-3">
                                                    <div class="box-step 
                                                    @if ($step != 'Hired')
                                                        step-1
                                                    @endif">
                                                        <h1 class="number-element">
                                                            @if (in_array($data->status, $steps[$step]))
                                                                ✅
                                                            @else
                                                                ⌛️
                                                            @endif
                                                        </h1>
                                                        <h4 class="mb-20">{{ $step }}</h4>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Add/Edit Experience Modal -->
<div class="modal fade" id="experienceModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document" style="min-width: 500px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">Add Experience</h5>
      </div>
      <form id="experienceForm">
        @csrf
        <input type="hidden" name="experience_id" id="experienceId">
        <div class="modal-body">
          <div class="form-group">
            <label for="experienceTitle">Title</label>
            <input type="text" class="form-control" id="experienceTitle" name="title">
          </div>
          <div class="form-group">
            <label for="experienceCompany">Company</label>
            <input type="text" class="form-control" id="experienceCompany" name="company">
          </div>
          <div class="form-group">
            <label for="experienceStartDate">Start Date</label>
            <input type="date" class="form-control" id="experienceStartDate" name="start_date">
          </div>
          <div class="form-group">
            <label for="experienceEndDate">End Date</label>
            <input type="date" class="form-control" id="experienceEndDate" name="end_date">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Add/Edit Education Modal -->
<div class="modal fade" id="educationModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document" style="min-width: 500px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">Add Education</h5>
      </div>
      <form id="educationForm">
        @csrf
        <input type="hidden" name="education_id" id="educationId">
        <div class="modal-body">
          <div class="form-group">
            <label for="educationDegree">Degree</label>
            <input type="text" class="form-control" id="educationDegree" name="degree">
          </div>
          <div class="form-group">
            <label for="educationInstitution">Institution</label>
            <input type="text" class="form-control" id="educationInstitution" name="institution">
          </div>
          <div class="form-group">
            <label for="educationStartDate">Start Date</label>
            <input type="date" class="form-control" id="educationStartDate" name="start_date">
          </div>
          <div class="form-group">
            <label for="educationEndDate">End Date</label>
            <input type="date" class="form-control" id="educationEndDate" name="end_date">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Add/Edit Project Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document" style="min-width: 500px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">Add Project</h5>
      </div>
      <form id="projectForm">
        @csrf
        <input type="hidden" name="project_id" id="projectId">
        <div class="modal-body">
          <div class="form-group">
            <label for="projectTitle">Title</label>
            <input type="text" class="form-control" id="projectTitle" name="title">
          </div>
          <div class="form-group">
            <label for="projectDescription">Description</label>
            <textarea class="form-control" id="projectDescription" name="description"></textarea>
          </div>
          <div class="form-group">
            <label for="projectStartDate">Start Date</label>
            <input type="date" class="form-control" id="projectStartDate" name="start_date">
          </div>
          <div class="form-group">
            <label for="projectEndDate">End Date</label>
            <input type="date" class="form-control" id="projectEndDate" name="end_date">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

      

    </div>
</section>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Handle Add/Edit Experience
  $('#experienceForm').on('submit', function (e) {
    e.preventDefault();
    let url = $('#experienceId').val() ? '{{ route('frontend.seeker.experience.update') }}' : '{{ route('frontend.seeker.experience.store') }}';
    $.ajax({
      type: 'POST',
      url: url,
      data: $(this).serialize(),
      success: function (response) {
        location.reload();
      },
      error: function (response) {
        alert('An error occurred.');
      }
    });
  });

  // Handle Edit Experience Button Click
  $('.editExperienceButton').on('click', function () {
    $('#modalTitleId').text('Edit Experience');
    $('#experienceId').val($(this).data('id'));
    $('#experienceTitle').val($(this).data('title'));
    $('#experienceCompany').val($(this).data('company'));
    $('#experienceStartDate').val($(this).data('start_date'));
    $('#experienceEndDate').val($(this).data('end_date'));
  });

  // Handle Add Experience Button Click
  $('#experienceModal').on('hidden.bs.modal', function () {
    $('#modalTitleId').text('Add Experience');
    $('#experienceForm')[0].reset();
    $('#experienceId').val('');
  });

  // Handle Delete Experience
  $('.deleteExperienceButton').on('click', function () {
    if (confirm('Are you sure you want to delete this experience?')) {
      let experienceId = $(this).data('id');
      $.ajax({
        type: 'DELETE',
        url: '{{ route('frontend.seeker.experience.delete') }}',
        data: {experience_id: experienceId, _token: '{{ csrf_token() }}'},
        success: function (response) {
          location.reload();
        },
        error: function (response) {
          alert('An error occurred.');
        }
      });
    }
  });

  // Handle Add/Edit Education
  $('#educationForm').on('submit', function (e) {
    e.preventDefault();
    let url = $('#educationId').val() ? '{{ route('frontend.seeker.education.update') }}' : '{{ route('frontend.seeker.education.store') }}';
    $.ajax({
      type: 'POST',
      url: url,
      data: $(this).serialize(),
      success: function (response) {
        location.reload();
      },
      error: function (response) {
        alert('An error occurred.');
      }
    });
  });

  // Handle Edit Education Button Click
  $('.editEducationButton').on('click', function () {
    $('#modalTitleId').text('Edit Education');
    $('#educationId').val($(this).data('id'));
    $('#educationDegree').val($(this).data('degree'));
    $('#educationInstitution').val($(this).data('institution'));
    $('#educationStartDate').val($(this).data('start_date'));
    $('#educationEndDate').val($(this).data('end_date'));
  });

  // Handle Add Education Button Click
  $('#educationModal').on('hidden.bs.modal', function () {
    $('#modalTitleId').text('Add Education');
    $('#educationForm')[0].reset();
    $('#educationId').val('');
  });

  // Handle Delete Education
  $('.deleteEducationButton').on('click', function () {
    if (confirm('Are you sure you want to delete this education?')) {
      let educationId = $(this).data('id');
      $.ajax({
        type: 'DELETE',
        url: '{{ route('frontend.seeker.education.delete') }}',
        data: {education_id: educationId, _token: '{{ csrf_token() }}'},
        success: function (response) {
          location.reload();
        },
        error: function (response) {
          alert('An error occurred.');
        }
      });
    }
  });

  // Handle Add/Edit Project
  $('#projectForm').on('submit', function (e) {
    e.preventDefault();
    let url = $('#projectId').val() ? '{{ route('frontend.seeker.project.update') }}' : '{{ route('frontend.seeker.project.store') }}';
    $.ajax({
      type: 'POST',
      url: url,
      data: $(this).serialize(),
      success: function (response) {
        location.reload();
      },
      error: function (response) {
        alert('An error occurred.');
      }
    });
  });

  // Handle Edit Project Button Click
  $('.editProjectButton').on('click', function () {
    $('#modalTitleId').text('Edit Project');
    $('#projectId').val($(this).data('id'));
    $('#projectTitle').val($(this).data('title'));
    $('#projectDescription').val($(this).data('description'));
    $('#projectStartDate').val($(this).data('start_date'));
    $('#projectEndDate').val($(this).data('end_date'));
  });

  // Handle Add Project Button Click
  $('#projectModal').on('hidden.bs.modal', function () {
    $('#modalTitleId').text('Add Project');
    $('#projectForm')[0].reset();
    $('#projectId').val('');
  });

  // Handle Delete Project
  $('.deleteProjectButton').on('click', function () {
    if (confirm('Are you sure you want to delete this project?')) {
      let projectId = $(this).data('id');
      $.ajax({
        type: 'DELETE',
        url: '{{ route('frontend.seeker.project.delete') }}',
        data: {project_id: projectId, _token: '{{ csrf_token() }}'},
        success: function (response) {
          location.reload();
        },
        error: function (response) {
          alert('An error occurred.');
        }
      });
    }
  });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    // Initialize Select2 for skills with multi-select enabled
    $('#skills').select2({
      tags: true,
      multiple: true // Enable multi-select
    });
  });
</script>
@endsection


