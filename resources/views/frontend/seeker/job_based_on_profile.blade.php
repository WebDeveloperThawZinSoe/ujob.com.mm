@extends('frontend.seeker.seeker_template')
@section('content1')
<div class="tab-content">
    <div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel" aria-labelledby="tab-my-profile">
       

       
        <div class="row" style="display: flex;">
            <div class="col-xl-12 col-12">
                <div class="card-grid-2 hover-up"
                    style="background: #ffffff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); padding: 20px;">
                    <div class="card-body">
                        <h4 class="m3" style="font-size: 20px; color: #333; font-weight: bold; margin-bottom: 15px;">
                             Jobs Based On Your Profile ( Sort By More Match )
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
                          
                        
                            {{ $paginatedJobs->links('pagination::bootstrap-5') }}
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