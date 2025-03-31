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
                                    <span style="font-weight: bold; font-size: 18px;">50 Job Match </span>
                                </div>
                                <span style="font-size: 14px; color: #888; margin-left: 32px;"> Job Match Base On
                                 Your Profile</span>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12"
                                style="display: flex; flex-direction: column; align-items: start; gap: 5px; font-size: 16px; color: #555;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-user-check" style="font-size: 22px; color: #28a745;"></i>
                                    <span style="font-weight: bold; font-size: 18px;">46 Applications</span>
                                </div>
                                <span style="font-size: 14px; color: #888; margin-left: 32px;">Applications you have
                                    sent before</span>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12"
                                style="display: flex; flex-direction: column; align-items: start; gap: 5px; font-size: 16px; color: #555;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-bell" style="font-size: 22px; color: #ffc107;"></i>
                                    <span style="font-weight: bold; font-size: 18px;">0 Job Alerts</span>
                                </div>
                                <span style="font-size: 14px; color: #888; margin-left: 32px;">Jobs that match your
                                    interests</span>
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
                        <div class="row" style="display: flex; flex-wrap: wrap; gap: 15px;">
                            @foreach($leading_employers as $employer)
                            <div class="col-md-3 col-sm-4 col-xs-6"
                                style="display: flex; flex-direction: column; align-items: center; text-align: center; background: #f8f9fa; padding: 15px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08); transition: transform 0.3s ease-in-out;">
                                <a href="/employer/profile/{{$employer->company_name}}">
                                <div style="display: flex; flex-direction: column; align-items: center;">
                                    @if($employer->user->image == null || $employer->user->image == '')
                                    <img src="{{ asset('assets/imgs/company_logo.png') }}" alt="logo"
                                        style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; background: #fff; border: 2px solid #ddd; padding: 5px;">
                                    @else
                                    <img src="{{ asset('profile/'.$employer->user->image) }}" alt="logo"
                                        style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; background: #fff; border: 2px solid #ddd; padding: 5px;">
                                    @endif
                                </div>

                                <span style="font-weight: bold; font-size: 16px; color: #333; margin-top: 10px;">
                                    {{$employer->company_name}}
                                </span>

                                <span style="font-size: 14px; color: #666; margin-top: 5px;">

                                </span>
                                </a>
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
                            Some Jobs Based On Your Profile
                        </h4>
                        <hr style="border-top: 2px solid #ddd; margin-bottom: 20px;">

                        @if($jobs->count() > 0)
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
                                    @foreach($jobs as $job)
                                    <tr style="border-bottom: 1px solid #eee;">
                                        <td style="padding: 12px; color: #007bff; font-weight: bold;">{{ $job->title }}
                                        </td>
                                        <td style="padding: 12px; color: #333;">{{ $job->employer->company_name ?? 'N/A' }}</td>
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
                        <div style="margin-top: 20px; text-align: center;">
                            {{ $jobs->links() }}
                        </div>
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