@extends('frontend.layouts.app')

@section('style')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
  /* Custom CSS to increase the height of the Quill editor */
  .ql-container {
    min-height: 200px; /* Adjust this height as needed */
  }

  .ql-editor {
    height: 100%; /* Ensure the content area takes the full height */
  }
</style>
@endsection

@section('breadcrumb')
<!-- Breadcrumb code -->
@endsection

@section('content')
<section class="section-box-2">
  <div class="container">
      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <strong>{{ Session::get('success') }}</strong>
      </div>
      <script>
          var alertList = document.querySelectorAll(".alert");
          alertList.forEach(function(alert) {
              new bootstrap.Alert(alert);
          });
      </script>
      @endif
      @if (Session::has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <strong>{{ Session::get('error') }}</strong>
      </div>
      <script>
          var alertList = document.querySelectorAll(".alert");
          alertList.forEach(function(alert) {
              new bootstrap.Alert(alert);
          });
      </script>
      @endif


      <div class="banner-hero banner-image-single">
          <img src="{{ asset('assets/imgs/page/company/img.png') }}" alt="jobBox">
      </div>
      <div class="box-company-profile">
          <div class="image-compay">
              <img src="@if ($employer->user->image == '') {{ asset('assets/imgs/avatar/ava_11.png') }} @else {{ asset('profile/'.$employer->user->image) }} @endif" alt="jobBox" style="height: 110px;">
          </div>
          <div class="row mt-10">
              <div class="col-lg-8 col-md-12">
                  <h5 class="f-18">{{ $employer->company_name }} <span class="card-location font-regular ml-20">Yangon</span></h5>
                  <p class="mt-5 font-md color-text-paragraph-2 mb-15"><a href="{{ $employer->company_website }}">{{ $employer->company_website }}</a></p>
              </div>
          </div>
      </div>
      <div class="box-nav-tabs mt-40 mb-5">
          <ul class="nav" role="tablist">
              <li><a class="btn btn-border aboutus-icon mr-15 mb-5 active" href="#tab-about" data-bs-toggle="tab" role="tab" aria-controls="tab-about" aria-selected="true">Posted Job</a></li>
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
                        <div class="table-responsive-md">
                          <table class="table table-striped table-hover table-borderless table-primary align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Title & Job Category</th>
                                    <th>Start Date</th>
                                    <th>Deadline</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @php $counter = 1; @endphp
                                @foreach ($jobs as $job)
                                    <tr class="table-warning">
                                        <td>{{ $counter++ }}</td>
                                        <td><h6 style="margin-bottom: 0;">{{ $job->title }}</h6> ({{ $job->category->name }})</td>
                                        <td>{{ $job->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $job->deadline }}</td>
                                        <td>
                                            <div class="dropdown open">
                                                <button
                                                    class="btn btn-warning dropdown-toggle"
                                                    type="button"
                                                    id="triggerId"
                                                    data-bs-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                >
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                                    <a class="dropdown-item" href="{{route('frontend.employer.jobs.edit', $job->id)}}">Edit</a>
                                                    <a class="dropdown-item" href="{{route('frontend.employer.resumes', $job->id)}}">Resumes</a>
                                                </div>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                        
                        </div>

                        {{-- <div class="box-list-jobs display-list">
                            @foreach ($jobs as $data)
                            @include('frontend.jobs.part.job-list', [
                            'job' => $data,
                            'jobLink' => route('frontend.jobs-detail', $data->id)
                            ])
                            @endforeach
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="box-related-job content-page">
            </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                <div class="sidebar-border">
                    @auth
                    @if ($employer->user_id == Auth::user()->id)
                    <a class="btn btn-call-icon btn-apply btn-apply-big" href="#" data-bs-toggle="modal" data-bs-target="#modalIdWholeData">Create New Job</a>
                    @endif
                    @endauth
                </div>
                @include('frontend.layouts.parts.ads', [
                'ads' => $ads,
                'location' => 'sidebar'
                ])
            </div>
        </div>
    </div>
</section>

<!-- The Modal -->
@auth
@if ($employer->user_id == Auth::user()->id)
<form action="{{ route('employer.jobs.store', $employer->id) }}" method="post" enctype="multipart/form-data" class="job-form">
  @csrf @method("POST")

<div class="modal fade" id="modalIdWholeData" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Add New Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Job Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div><div class="form-group">
                        <div id="description" >Description</div>
                    </div>
                    <input type="hidden" name="description" id="description-input">
                    
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" name="salary" id="salary">
                    </div>
                    <div class="form-group">
                        <label for="job_type">Job Type</label>
                        <select class="form-control" name="job_type" id="job_type" required>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Remote Jobs">Remote Jobs</option>
                            <option value="Freelancer">Freelancer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deadline">Application Deadline</label>
                        <input type="date" class="form-control" name="deadline" id="deadline" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location_id">Location</label>
                        <select class="form-control" name="location_id" id="location_id" required>
                            @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="skills">Skills</label>
                        <select class="form-control" name="skills[]" id="skills" multiple required>
                            @foreach ($skills as $skill)
                            <option value="{{ $skill->name }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="highlight">Is Highlight?</label>
                        <select class="form-control" name="highlight" id="highlight" required>
                            <option value="">Not Highlight</option>
                            <option value="1">Highlight</option>
                            
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
            
        </div>
    </div>
</div>
</form>
@endif
@endauth
@endsection

@section('script')

<script>
  const quill = new Quill('#description', {
    theme: 'snow'
  });

  const form = document.querySelector('.job-form');
    const descriptionInput = document.querySelector('#description-input');

    form.addEventListener('submit', function() {
      descriptionInput.value = quill.root.innerHTML;
    });

</script>
@endsection
