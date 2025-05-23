@extends('frontend.employer.dashboard_template')

@section('dashboard_content')
<div class="tab-content">
    <div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel" aria-labelledby="tab-my-profile">
        <h3 class="mt-0 mb-15 color-brand-1">{{ $employer->company_name }}'s Dashboard</h3>
        <a class="font-md color-text-paragraph-2" href="#" id="greeting">
            Welcome, {{ Auth::user()->name }}.
        </a>

        <script>
        function getGreeting() {
            let hour = new Date().getHours();
            let greeting;

            if (hour >= 5 && hour < 12) {
                greeting = "Good Morning";
            } else if (hour >= 12 && hour < 17) {
                greeting = "Good Afternoon";
            } else if (hour >= 17 && hour < 21) {
                greeting = "Good Evening";
            } else {
                greeting = "Good Night";
            }

            document.getElementById("greeting").innerHTML =
                `${greeting}, {{ Auth::user()->name }}.`;
        }

        // Call the function when the page loads
        getGreeting();
        </script>
        <hr>

        <div class="row" style="display: flex; ">
            <div class="col-xl-4 col-12">
                <div class="card-grid-2 hover-up"
                    style="background: #ffffff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; text-align: center; transition: transform 0.3s ease-in-out;">
                    <h4 class="m3" style="font-size: 18px; color: #333; font-weight: bold;">Total
                        Job
                        Post</h4>
                    <p style="font-size: 24px; color: #2d3748; font-weight: 600;">
                        {{ $jobs->count() }} / {{$employer->total_jobs}}</p>
                </div>
            </div>
            <div class="col-xl-4 col-12">
                <div class="card-grid-2 hover-up"
                    style="background: #ffffff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; text-align: center; transition: transform 0.3s ease-in-out;">
                    <h4 class="m3" style="font-size: 18px; color: #333; font-weight: bold;">Total
                        Hightlight
                        Post</h4>
                    <p style="font-size: 24px; color: #2d3748; font-weight: 600;">
                        {{ $highlight_job->count() }} / {{$employer->total_highlights}} </p>
                </div>
            </div>
            <div class="col-xl-4 col-12">
                <div class="card-grid-2 hover-up"
                    style="background: #ffffff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; text-align: center; transition: transform 0.3s ease-in-out;">
                    <h4 class="m3" style="font-size: 18px; color: #333; font-weight: bold;">CV List
                    </h4>
                    <p style="font-size: 24px; color: #2d3748; font-weight: 600;">
                        {{ $jobs->sum(fn($job) => $job->seekers->count()) }}</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="content-single">
                    <div class="tab-content">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <h3 style="margin: 0;">Our Latest Posts</h3>
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
                                            <th>Resume</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @php $counter = 1; @endphp
                                        @foreach ($latest_jobs as $job)
                                        <tr class="table-warning">
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