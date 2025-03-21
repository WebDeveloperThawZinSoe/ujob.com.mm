@extends('admin.layouts.app')
@section('style')

@endsection

@section('breadcrumb')
<div class="page-header no-gutters">
  <div class="d-md-flex align-items-md-center justify-content-between">
      <div class="media m-v-10 align-items-center">
          <div class="media-body">
              <h4 class="m-b-0">Welcome back, {{ auth()->user()->name }}!</h4>
              <span class="text-gray">Admin</span>
          </div>
      </div>
      <div class="d-md-flex align-items-center d-none">
          <div class="media align-items-center m-r-40 m-v-5">
              <div class="font-size-27">
                  <i class="text-success anticon anticon-appstore"></i>
              </div>
              <div class="d-flex align-items-center m-l-10">
                  <h2 class="m-b-0 m-r-5">{{ $totalJobs }}</h2>
                  <span class="text-gray">Jobs Post</span>
              </div>
          </div>
          <div class="media align-items-center m-r-40 m-v-5">
              <div class="font-size-27">
                <i class="text-primary anticon anticon-profile"></i>
              </div>
              <div class="d-flex align-items-center m-l-10">
                  <h2 class="m-b-0 m-r-5">{{ $totalSeekers }}</h2>
                  <span class="text-gray">Total Seeker</span>
              </div>
          </div>
          <div class="media align-items-center m-v-5">
              <div class="font-size-27">
                  <i class="text-danger anticon anticon-team"></i>
              </div>
              <div class="d-flex align-items-center m-l-10">
                  <h2 class="m-b-0 m-r-5">{{ $totalEmployers }}</h2>
                  <span class="text-gray">Total Employee</span>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Latest 5 Jobs</h5>
                    <div>
                        <a href="{{ route('admin.jobs.index') }}" class="btn btn-default btn-sm">View All</a> 
                    </div>
                </div>
                <div class="table-responsive m-t-30">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Salary</th>
                                <th>Job Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestJobs as $job)
                            <tr>
                              <td>{{ $job->title }}</td>
                              <td>{{ $job->salary }} / Month</td>
                              <td>{{ $job->job_type }}</td>
                              <td>
                                <a href="{{ route('admin.jobs.show', $job->id) }}" class="btn btn-icon btn-hover btn-sm btn-rounded text-primary">
                                    <i class="anticon anticon-eye"></i>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Latest Employees</h5>
                    <div>
                        {{-- <a href="{{ route('admin.employees.index') }}" class="btn btn-default btn-sm">View All</a>  --}}
                    </div>
                </div>
                <div class="m-t-30">
                    @foreach ($latestEmployers as $employer)
                    <div class="d-flex m-b-20">
                        <div class="text-center">
                            <div class="avatar avatar-text avatar-blue avatar-lg rounded">
                                <span class="font-size-22">{{ strtoupper(substr($employer->name, 0, 1)) }}</span>
                            </div>
                        </div>
                        <div class="m-l-20">
                            <h5 class="m-b-0">
                                <a class="text-dark">{{ $employer->name }}</a>
                            </h5>
                            <p class="m-b-0">{{ $employer->email }}</p>
                        </div>
                    </div>
                    @endforeach
                </div> 
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Latest Seekers</h5>
                    <div>
                        {{-- <a href="{{ route('admin.seekers.index') }}" class="btn btn-default btn-sm">View All</a>  --}}
                    </div>
                </div>
                <div class="m-t-30">
                    @foreach ($latestSeekers as $seeker)
                    <div class="d-flex m-b-20">
                        <div class="text-center">
                            <div class="avatar avatar-text avatar-blue avatar-lg rounded">
                                <span class="font-size-22">{{ strtoupper(substr($seeker->name, 0, 1)) }}</span>
                            </div>
                        </div>
                        <div class="m-l-20">
                            <h5 class="m-b-0">
                                <a class="text-dark">{{ $seeker->name }}</a>
                            </h5>
                            <p class="m-b-0">{{ $seeker->email }}</p>
                        </div>
                    </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
