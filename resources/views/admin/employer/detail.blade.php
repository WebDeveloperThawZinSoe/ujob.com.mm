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
                                <img style="width:150px;height:150px;" src="{{asset('profile/'.$user->image)}}" alt="">
                                <h4 class="m-b-0">{{$employer->company_name}}</h4>
                                <p>{!! $employer->company_description !!}</p>
                            </div>

                        </div>


                    </div>

                    <div class="d-md-flex m-t-30 align-items-center justify-content-between">
                        <div class="d-flex align-items-center m-t-10">

                            <span class="badge badge-pill badge-warning">
                                Job Count :
                                {{$jobs->count()}}
                            </span> &nbsp;
                            <span class="badge badge-pill badge-warning">
                                Highlight Job Count :
                                {{$highlight->count()}}
                            </span> &nbsp;
                            @if($employer->location_id != "" && $employer->location_id != null)
                            <span class="badge badge-pill badge-info"
                                style="text-transform:capitalize; display:inline-block;">
                                {{$employer->location->name}}
                            </span> &nbsp;
                            @endif
                            @if($employer->phone != "" && $employer->phone != null)
                            <span class="badge badge-pill badge-info"
                                style="text-transform:capitalize; display:inline-block;">
                                {{$employer->phone}}
                            </span> &nbsp;
                            @endif
                        </div>
                        <div class="m-t-10">
                            <span class="font-weight-semibold m-r-10 m-b-5 text-dark">Membership Type: </span>
                            <span> {{$employer->membership_name}}</span><br>
                            <span class="font-weight-semibold m-r-10 m-b-5 text-dark">Leading Company: </span>
                            <span>
                                @if($employer-> is_feature == 1)
                                <span class="badge badge-pill 
                                    
                                    badge-success
                                    
                            " style="text-transform:capitalize;">
                                    True
                                </span>
                                @else
                                <span class="badge badge-pill 
                                    
                                    badge-warning
                                    
                            " style="text-transform:capitalize;">
                                    False
                                </span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="m-t-30">
                    <ul class="nav nav-tabs" id="myTab">

                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#job-applied">Job Posts</a>
                        </li>
                    </ul>
                    <div class="tab-content m-t-15 p-25">

                        <div class="table-responsive-md">
                            <table class="table  table-hover table-borderless  align-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title & Job Category</th>
                                        <th>Start Date</th>
                                        <th>Deadline</th>
                                        <th>Resume</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 1; @endphp
                                    @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>
                                            <h6 style="margin-bottom: 0;">{{ $job->title }}</h6>
                                            ({{ $job->category->name }})
                                        </td>
                                        <td>{{ $job->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $job->deadline }}</td>
                                        <td>
                                            @php
                                            echo App\Models\JobSeeker::where('job_id', $job->id)->count();
                                            @endphp

                                        </td>
                                        <td>
                                            <div class="dropdown open">


                                                <a href="/admin/jobs/show/{{$job->id}}" target="_blank"
                                                    class="btn btn-icon btn-hover btn-sm btn-rounded text-success">
                                                    <i class="anticon anticon-file"></i>
                                                </a>

                                                <a href="/jobs/{{$job->id}}" target="_blank"
                                                    class="btn btn-icon btn-hover btn-sm btn-rounded text-info">
                                                    <i class="anticon anticon-eye"></i>
                                                </a>

                                                <form id="deleteForm{{$job->id}}"
                                                    action="{{ url('/admin/employer/job/'.$job->id.'/delete') }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded text-danger"
                                                    onclick="confirmDelete({{ $job->id }})">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>

                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                function confirmDelete(id) {
                                                   
                                                    Swal.fire({
                                                        title: 'Are you sure?',
                                                        text: 'You won’t be able to revert this!',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Yes, delete it!',
                                                        cancelButtonText: 'No, cancel!',
                                                        reverseButtons: true
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            // Trigger the form submission for the delete action
                                                            document.getElementById('deleteForm' + id).submit();
                                                        } else if (result.dismiss === Swal.DismissReason
                                                            .cancel) {
                                                            Swal.fire(
                                                                'Cancelled',
                                                                'Job is safe :)',
                                                                'info'
                                                            );
                                                        }
                                                    });
                                                }
                                                </script>

                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {{ $jobs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')


    @endsection