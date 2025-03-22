@extends('frontend.employer.dashboard_template')

@section('dashboard_content')
<div class="tab-content">
    <div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel" aria-labelledby="tab-my-profile">
      
       
       

        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="content-single">
                    <div class="tab-content">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <h3 style="margin: 0;">Our Job Posts</h3>
                            <a href="{{route('frontend.employer.jobs.create')}}"
                                style="background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                                Create New Job Post
                            </a>
                        </div>
                        <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                            aria-labelledby="tab-about">
                            <div class="table-responsive-md">
                                <table
                                    class="table table-striped table-hover table-borderless table-primary align-middle">
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
                                            <td>
                                                <h6 style="margin-bottom: 0;">{{ $job->title }}</h6>
                                                ({{ $job->category->name }})
                                            </td>
                                            <td>{{ $job->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $job->deadline }}</td>
                                            <td>
                                                <div class="dropdown open">
                                                    <button class="btn btn-warning dropdown-toggle" type="button"
                                                        id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                                        <a class="dropdown-item" target="_blank"
                                                        href="/jobs/{{$job->id}}">View</a>
                                                        <a class="dropdown-item"
                                                            href="{{route('frontend.employer.jobs.edit', $job->id)}}">Edit</a>
                                                        
                                                        <a class="dropdown-item"
                                                            href="{{route('frontend.employer.resumes', $job->id)}}">Resumes</a>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                                {{ $jobs->links('pagination::bootstrap-5') }}

                            </div>


                        </div>
                    </div>
                </div>
                <div class="box-related-job content-page">
                </div>
            </div>

        </div>




    </div>

    <div class="tab-pane fade" id="tab-my-jobs" role="tabpanel" aria-labelledby="tab-my-jobs">
        <h3 class="mt-0 color-brand-1 mb-50">My Jobs</h3>
        <div class="row display-list">

        </div>
    </div>
</div>
@endsection