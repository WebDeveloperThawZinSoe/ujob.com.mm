@extends('admin.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="media align-items-center">
                                
                                <div class="m-l-1">
                                    <h4 class="m-b-0">{{$job->title}}</h4>
                                    <p>{{$job->job_type}} | <span style="font-size: 20px; color: rgb(198, 168, 0);">{{$job->salary}} Month</span></p>
                                </div>
                            </div>
                            <div>
                                <span class="badge badge-pill 
                                    
                                            badge-info
                                            
                                    " style="text-transform:capitalize;">{{$job->category->name}}</span>
                                <span class="badge badge-pill badge-info" style="text-transform:capitalize;">{{$job->location->name}}</span>
                            </div>
                        </div>
                        
                        <div class="d-md-flex m-t-30 align-items-center justify-content-between">
                            <div class="d-flex align-items-center m-t-10">
                                <span class="text-dark font-weight-semibold m-r-10 m-b-5">Job Employer : </span>
                                
                                <span class="badge badge-pill badge-warning">{{$job->employer->company_name}}</span>
                           
                            </div>
                            <div class="m-t-10">
                                <span class="font-weight-semibold m-r-10 m-b-5 text-dark">Start Date: </span>
                                <span> {{ \Carbon\Carbon::parse($job->created_at)->format('Y-m-d') }} </span><br>
                                <span class="font-weight-semibold m-r-10 m-b-5 text-dark">Deadline: </span>
                                <span> {{ $job->deadline }} </span>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#job-description">Job Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#job-applied">Applied Seeker</a>
                            </li>
                            
                        </ul>
                        <div class="tab-content m-t-15 p-25">
                            <div class="tab-pane fade show active"  id="job-description">
                                <p>
                                    {!!$job->description!!}
                                </p>

                            </div>
                            <div class="tab-pane fade " id="job-applied">
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
                                                  >
                                                  <td>{{ $counter++ }}</td>
                                                  <td>{{ $data->user_name }}</td>
                                                  <td>{{ $data->user_phone}}</td>
                                                  <td>{{ $data->status}}</td>
                                                  <td>
                                                      <a class="btn btn-warning" href="{{route('frontend.cv', $data->seeker_id)}}">View CV</a>
                                                      
                                                  </td>
                                                  
                                              </tr>
                                          @endforeach
                                      </tbody>
                                      <tfoot>
                                      </tfoot>
                                  </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Content Wrapper END -->
@endsection

@section('script')


@endsection