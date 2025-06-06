@extends('frontend.seeker.seeker_template')
@section('content1')
<div class="tab-content">
    <div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel" aria-labelledby="tab-my-profile">
        <h3 class="mt-0 mb-15 color-brand-1" id="greeting">
            Welcome, {{ Auth::user()->name }}.
        </h3>

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


        <div class="row" style="display: flex;">
            <div class="col-xl-12 col-12">
                <div class="card-grid-2 hover-up"
                    style="background: #ffffff; border: 1px solid #ddd; border-radius: 6px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px;">
                    <div class="card-body">
                        <h4 class="m3" style="font-size: 18px; color: #333; font-weight: bold; margin-bottom: 15px;">
                            Analytics</h4>
                        <hr style="border-top: 1px solid #ddd; margin-bottom: 20px;">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12"
                                style="display: flex; flex-direction: column; align-items: start; gap: 5px; font-size: 16px; color: #555;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-eye" style="font-size: 22px; color: #007bff;"></i>
                                    <span style="font-weight: bold; font-size: 18px;">{{$jobs->count()}} Job Match
                                    </span>
                                </div>
                                <span style="font-size: 14px; color: #888; margin-left: 32px;"> Job Match Base On
                                    Your Profile</span>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12"
                                style="display: flex; flex-direction: column; align-items: start; gap: 5px; font-size: 16px; color: #555;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-user-check" style="font-size: 22px; color: #28a745;"></i>
                                    <span style="font-weight: bold; font-size: 18px;">
                                        @php
                                        $jobSeekerCount = App\Models\JobSeeker::where("seeker_id",
                                        Auth::user()->seeker->id)->count();
                                        @endphp
                                        {{ $jobSeekerCount }} Applied</span>
                                </div>
                                <span style="font-size: 14px; color: #888; margin-left: 32px;">Applied jobs you
                                    have.</span>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12"
                                style="display: flex; flex-direction: column; align-items: start; gap: 5px; font-size: 16px; color: #555;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-bell" style="font-size: 22px; color: #ffc107;"></i>
                                    <span style="font-weight: bold; font-size: 18px;">
                                        @php
                                        $jobs = App\Models\Job::get();
                                        echo $jobs->count();
                                        @endphp
                                        Total Jobs </span>
                                </div>
                                <span style="font-size: 14px; color: #888; margin-left: 32px;">Total Jobs Count that On
                                    our Platform
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex;">
            <div class="col-xl-12 col-12">
                <div class="card-grid-2 hover-up"
                    style="background: #ffffff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); padding: 20px;">
                    <div class="card-body">
                        <h4 class="m3" style="font-size: 20px; color: #333; font-weight: bold; margin-bottom: 15px;">
                            Leading Employers</h4>
                        <hr style="border-top: 2px solid #ddd; margin-bottom: 20px;">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
    @foreach($leading_employers as $employer)
        <div class="col">
            <div class="d-flex flex-column align-items-center text-center p-3 bg-light rounded shadow-sm" 
                style="transition: transform 0.3s ease-in-out;">
                <a href="/employer/profile/{{$employer->company_name}}" class="text-decoration-none">
                    <div class="d-flex flex-column align-items-center">
                        @if(empty($employer->user->image))
                            <img src="{{ asset('assets/imgs/company_logo.png') }}" alt="logo"
                                class="rounded-circle border p-1 bg-white" 
                                style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #ddd;">
                        @else
                            <img src="{{ asset('profile/'.$employer->user->image) }}" alt="logo"
                                class="rounded-circle border p-1 bg-white" 
                                style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #ddd;">
                        @endif
                    </div>
                    <span class="fw-bold text-dark mt-2 d-block">{{$employer->company_name}}</span>
                </a>
            </div>
        </div>
    @endforeach
</div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="display: flex;">
            <div class="col-xl-12 col-12">
                <div class="card-grid-2 hover-up"
                    style="background: #ffffff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); padding: 20px;">
                    <div class="card-body">
                        <h4 class="m3" style="font-size: 20px; color: #333; font-weight: bold; margin-bottom: 15px;">
                            Some Jobs Based On Your Profile ( Sort By More Match )
                        </h4>
                        <hr style="border-top: 2px solid #ddd; margin-bottom: 20px;">

                        @if($paginatedJobs->count() > 0)
                        <div style="overflow-x: auto;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="background: #f8f9fa; text-align: left;">
                                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Job Title</th>
                                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Company</th>
                                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Location</th>
                                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Salary</th>
                                        <th style="padding: 12px; border-bottom: 2px solid #ddd;">Deadline</th>
                                        <th style="padding: 12px; border-bottom: 2px solid #ddd; text-align: center;">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paginatedJobs as $job)
                                    <tr style="border-bottom: 1px solid #eee;">
                                        <td style="padding: 12px; color: #007bff; font-weight: bold;">{{ $job->title }}
                                        </td>
                                        <td style="padding: 12px; color: #333;">
                                            {{ $job->employer->company_name ?? 'N/A' }}</td>
                                        <td style="padding: 12px; color: #555;">{{ $job->location->name ?? 'N/A' }}</td>
                                        <td style="padding: 12px; color: #28a745;">
                                            @if($job->salary == 0 || $job->salary == null || $job->salary == '')
                                            Negotiate
                                            @else
                                            {{ number_format($job->salary) }} MMK
                                            @endif
                                        </td>
                                        <td style="padding: 12px; color: #dc3545;">
                                            {{ \Carbon\Carbon::parse($job->deadline)->format('d M, Y') }}</td>
                                        <td style="padding: 12px; text-align: center;">
                                            <a href="/jobs/{{ $job->id }}"
                                                style="background: #007bff; color: #fff; padding: 8px 12px; text-decoration: none; border-radius: 5px; font-size: 14px;">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->

                        @else
                        <p style="text-align: center; font-size: 16px; color: #777;">No jobs found matching your
                            profile.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>






    </div>


</div>
@endsection


@section('content2')

@endsection