@extends('frontend.employer.dashboard_template')

@section('dashboard_content')
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
                <a href="{{route('frontend.pricing')}}" class="btn btn-apply-now " >View The Pricing</a>
                @endif
            </div>
</div>
@endsection