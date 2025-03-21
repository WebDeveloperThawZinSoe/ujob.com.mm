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
            <h2 class="mb-10">Memberships</h2>
            {{-- <p class="font-lg color-text-paragraph-2">Pricing built to suits teams of all sizes.</p> --}}
          </div>
          <div class="col-lg-6 text-lg-end">
            <ul class="breadcrumbs mt-40">
              <li><a class="home-icon" href="/">Home</a></li>
              <li>Memberships</li>
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
                                    <th>Name</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @php $counter = 1; @endphp
                                @foreach ($sales as $data)
                                    <tr class="table-warning">
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->end_date)->format('Y-m-d') }}</td>
                                        <td>{{ $data->status }}</td>
                                        
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
                @php
                    $currentDate = \Carbon\Carbon::now();
                    $jobDeadline = \Carbon\Carbon::parse($user->employer->end_date);
                    
                @endphp


                @if ($jobDeadline->isFuture())
                <div class="sidebar-border">
                    <h6 class="f-18">{{$user->employer->membership_name}}</h6>
                    <div class="sidebar-list-job">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Total Jobs Post</h6>
                                        <h6>{{$user->employer->total_jobs}} / {{$jobs->count()}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Highlight Jobs</h6>
                                        <h6>{{$user->employer->total_highlights}} / {{$jobsHighlight->count()}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @else
                <p>You don't have membership.</p>
                <a href="{{route('frontend.pricing')}}" class="btn btn-apply-now " >Pricing</a>
                @endif
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')

@endsection
