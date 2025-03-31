@extends('frontend.seeker.seeker_template')
@section('content1')

<div class="tab-pane fade show active" id="tab-my-jobs" role="tabpanel" aria-labelledby="tab-my-jobs">
    <h3 class="mt-0 color-brand-1 mb-50">My Jobs</h3>
    <div class="row display-list">
        @foreach ($myJobs as $data)
        <div class="col-xl-12 col-12">
            <div class="card-grid-2 hover-up">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card-grid-2-image-left">
                            <div class="image-box">
                                @if (!empty($data->job->employer->user->image))
                                    <img style="width: 50px" src="{{ asset('profile/'.$data->job->employer->user->image) }}" alt="jobBox">
                                @else
                                    <img style="width: 50px" src="{{ asset('default-profile.png') }}" alt="Default Profile">
                                @endif
                            </div>
                            <div class="right-info">
                                <a href="{{ !empty($data->job->employer) ? route('frontend.employer.profile', $data->job->employer->company_name) : '#' }}">
                                    {{ $data->job->employer->company_name ?? 'N/A' }}
                                </a>
                                <span class="location-small">{{ $data->job->location->name ?? 'Unknown Location' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                        <div class="pl-15 mb-15 mt-30">
                            @foreach(explode(', ', $data->job->skills ?? '') as $skill)
                                <a class="btn btn-grey-small mr-5" href="#">{{ $skill }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-block-info">
                    <h4><a href="{{ route('frontend.jobs-detail', $data->job->id) }}">{{ $data->job->title ?? 'No Title' }}</a></h4>
                    <div class="mt-5">
                        <div class="row">
                            <div class="col-lg-7 col-7">
                                <span class="card-briefcase">{{ $data->job->job_type ?? 'N/A' }}</span>
                                <span class="card-time"><span>{{ $data->job->created_at ? $data->job->created_at->diffForHumans() : 'Unknown Time' }}</span></span>
                            </div>
                            <div class="col-lg-5 col-5 text-end">
                                <a href="{{ route('frontend.jobs-detail', $data->job->id) }}" class="btn btn-apply-now">View Job</a>
                                <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalCheckStatus{{ $data->id }}">Check Status</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="paginations">
            {!! $myJobs->links() !!}
        </div>
    </div>
</div>
@endsection

@section('content2')

@foreach ($myJobs as $data)
<div class="modal fade" id="ModalCheckStatus{{ $data->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="ModalCheckStatus{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document" style="min-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $data->job->title ?? 'No Title' }}</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="mt-2">
                        <div class="row justify-content-center">
                            @if ($data->status == 'Rejected')
                            <div class="col-lg-3">
                                <div class="box-step">
                                    <h1 class="number-element">❌</h1>
                                    <h4 class="mb-20">Rejected</h4>
                                </div>
                            </div>
                            @else
                            @php
                            $steps = [
                                'Submitted' => ['Submitted', 'Under Review', 'Interviewed', 'Hired'],
                                'Under Review' => ['Under Review', 'Interviewed', 'Hired'],
                                'Interviewed' => ['Interviewed', 'Hired'],
                                'Hired' => ['Hired']
                            ];
                            @endphp
                            @foreach (['Submitted', 'Under Review', 'Interviewed', 'Hired'] as $step)
                            <div class="col-lg-3">
                                <div class="box-step @if ($step != 'Hired') step-1 @endif">
                                    <h1 class="number-element">
                                        @if (in_array($data->status, $steps[$step] ?? []))
                                        ✅
                                        @else
                                        ⌛️
                                        @endif
                                    </h1>
                                    <h4 class="mb-20">{{ $step }}</h4>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Add/Edit Experience Modal -->
<div class="modal fade" id="experienceModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document" style="min-width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Add Experience</h5>
            </div>
            <form id="experienceForm">
                @csrf
                <input type="hidden" name="experience_id" id="experienceId">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="experienceTitle">Title</label>
                        <input type="text" class="form-control" id="experienceTitle" name="title">
                    </div>
                    <div class="form-group">
                        <label for="experienceCompany">Company</label>
                        <input type="text" class="form-control" id="experienceCompany" name="company">
                    </div>
                    <div class="form-group">
                        <label for="experienceStartDate">Start Date</label>
                        <input type="date" class="form-control" id="experienceStartDate" name="start_date">
                    </div>
                    <div class="form-group">
                        <label for="experienceEndDate">End Date</label>
                        <input type="date" class="form-control" id="experienceEndDate" name="end_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add/Edit Education Modal -->
<div class="modal fade" id="educationModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document" style="min-width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Add Education</h5>
            </div>
            <form id="educationForm">
                @csrf
                <input type="hidden" name="education_id" id="educationId">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="educationDegree">Degree</label>
                        <input type="text" class="form-control" id="educationDegree" name="degree">
                    </div>
                    <div class="form-group">
                        <label for="educationInstitution">Institution</label>
                        <input type="text" class="form-control" id="educationInstitution" name="institution">
                    </div>
                    <div class="form-group">
                        <label for="educationStartDate">Start Date</label>
                        <input type="date" class="form-control" id="educationStartDate" name="start_date">
                    </div>
                    <div class="form-group">
                        <label for="educationEndDate">End Date</label>
                        <input type="date" class="form-control" id="educationEndDate" name="end_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add/Edit Project Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document" style="min-width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Add Project</h5>
            </div>
            <form id="projectForm">
                @csrf
                <input type="hidden" name="project_id" id="projectId">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="projectTitle">Title</label>
                        <input type="text" class="form-control" id="projectTitle" name="title">
                    </div>
                    <div class="form-group">
                        <label for="projectDescription">Description</label>
                        <textarea class="form-control" id="projectDescription" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="projectStartDate">Start Date</label>
                        <input type="date" class="form-control" id="projectStartDate" name="start_date">
                    </div>
                    <div class="form-group">
                        <label for="projectEndDate">End Date</label>
                        <input type="date" class="form-control" id="projectEndDate" name="end_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
