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
<section class="section-box">
    <div class="breacrumb-cover">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="mb-10">{{$job->title}}</h2>
            {{-- <p class="font-lg color-text-paragraph-2">Pricing built to suits teams of all sizes.</p> --}}
          </div>
          <div class="col-lg-6 text-lg-end">
            <ul class="breadcrumbs mt-40">
              <li><a class="home-icon" href="/">Home</a></li>
              <li>Job's Resumes</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</section>
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

  </div>
</section>

<section class="section-box mt-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
              <div class="content-single">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-about" role="tabpanel" aria-labelledby="tab-about">
                        <div class="table-responsive-md">
                          <table class="table table-striped table-hover table-borderless table-primary align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @php $counter = 1; @endphp
                                @foreach ($resumes as $data)
                                    <tr class="table-warning" 
                                        data-form-url="{{route('frontend.employer.resumes.update', $data->id)}}"
                                        data-status="{{ $data->status }}"
                                        data-user-name="{{ $data->user_name }}"
                                        data-user-email="{{ $data->user_email }}"
                                        data-user-phone="{{ $data->user_phone }}"
                                        data-user-cv="{{ $data->user_cv }}"
                                        data-cover-letter="{{ $data->cover_letter }}">
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $data->user_name }}</td>
                                        <td>{{ $data->user_phone}}</td>
                                        <td>{{ $data->status}}</td>
                                        <td>
                                            <a class="btn btn-warning">Detail</a>
                                            
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
            
        </div>
    </div>
</section>


  <div
    class="modal fade"
    id="resumeDetailModal"
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
                    Resume Detail
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-seconary"
                    >
                        
                        <tbody>
                            <tr class="">
                                <td scope="row">Resume status</td>
                                <td><span id="modalStatus"></span></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Name</td>
                                <td><span id="modalUserName"></span></td>
                            </tr>
                            <tr class="">
                                <td scope="row">Email</td>
                                <td><span id="modalUserEmail"></span></td>
                            </tr>

                            <tr class="">
                                <td scope="row">Phone</td>
                                <td><span id="modalUserPhone"></span></td>
                            </tr>

                            <tr class="">
                                <td scope="row">Cover Letter</td>
                                <td><span id="modalCoverLetter"></span></td>
                            </tr>
                            <tr class="">
                                <td scope="row">CV</td>
                                <td><a class="text-warning" id="modalUserCv" href="" target="_blank">Download CV</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer ">
                
                <form id="resumeUpdateForm" action="" method="post" style="display: block; width: 100%;">
                    <h6>Update Status</h6>
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mt-15">
                        <select
                            class="form-select form-select-lg"
                            name="status"
                            id=""
                        >
                            <option selected id="selectedStatus"></option>
                            <option >Submitted</option>
                            <option >Under Review</option>
                            <option >Interviewed</option>
                            <option >Hired</option>
                            <option >Rejected</option>

                        </select>
                    </div>
                    <div class="justify-content-end">
                        <button class="btn btn-warning float-right ml-15" type="submit">Update</button>
                        <button
                    type="button"
                    class="btn btn-secondary float-right"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                
                    </div>
                </form>

                
            </div>
        </div>
    </div>
  </div>
  
  <!-- Optional: Place to the bottom of scripts -->
  
  
  
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const buttons = document.querySelectorAll('.btn-warning');
      
      buttons.forEach(button => {
        button.addEventListener('click', function() {
          const row = this.closest('tr');
          const formUrl = row.getAttribute('data-form-url');
          const status = row.getAttribute('data-status');
          const userName = row.getAttribute('data-user-name');
          const userEmail = row.getAttribute('data-user-email');
          const userPhone = row.getAttribute('data-user-phone');
          const userCv = row.getAttribute('data-user-cv');
          const coverLetter = row.getAttribute('data-cover-letter');
          
          document.getElementById('modalStatus').innerText = status;
          document.getElementById('modalUserName').innerText = userName;
          document.getElementById('modalUserEmail').innerText = userEmail;
          document.getElementById('modalUserPhone').innerText = userPhone;
          document.getElementById('modalCoverLetter').innerText = coverLetter;
          document.getElementById('modalUserCv').href = `/cv-data-001/${userCv}`;
          document.getElementById('selectedStatus').innerText = status;
          document.getElementById('resumeUpdateForm').setAttribute('action', formUrl);
          
          $('#resumeDetailModal').modal('show');
        });
      });
    });
  </script>
  
@endsection
