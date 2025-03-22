@extends('frontend.seeker.seeker_template')
@section('content1')
<div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel" aria-labelledby="tab-my-profile">
    <h3 class="mt-0 mb-15 color-brand-1">My Account</h3>
    <a class="font-md color-text-paragraph-2" href="#">Upload Professional Photo</a>
    <div class="mt-35 mb-40 box-info-profie">
        <div class="image-profile">
            <img src="{{ asset('assets/imgs/page/candidates/candidate-profile.png') }}" alt="jobbox">
        </div>
        <a class="btn btn-apply">Upload Avatar</a>
        <a class="btn btn-link">Delete</a>
    </div>

    <div class="row form-contact">
        <div class="col-lg-6 col-md-12">
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label class="font-sm color-text-muted mb-10">Full Name *</label>
                    <input class="form-control" type="text" name="full_name" value="{{ $seeker->full_name }}">
                </div>
                <div class="form-group">
                    <label class="font-sm color-text-muted mb-10">Email *</label>
                    <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label class="font-sm color-text-muted mb-10">Contact number</label>
                    <input class="form-control" type="text" name="contact_number" value="{{ $seeker->contact_number }}">
                </div>
                <div class="form-group">
                    <label class="font-sm color-text-muted mb-10">Contact number</label>
                    <input class="form-control" type="text" name="contact_number" value="{{ $seeker->contact_number }}">
                </div>
                <div class="form-group">
                    <label class="font-sm color-text-muted mb-10">Headline</label>
                    <textarea class="form-control" rows="4" name="headline">{{ $seeker->headline }}</textarea>
                </div>
                <div class="form-group">
                    <label class="font-sm color-text-muted mb-10">Summary</label>
                    <textarea class="form-control" rows="4" name="summary">{{ $seeker->summary }}</textarea>
                </div>
                <button class="btn btn-apply-big font-md font-bold" type="submit">Change</button>
            </form>

            <div class="border-bottom pt-10 pb-10 mb-30"></div>
            <h6 class="color-orange mb-20">Change your password</h6>
            <form action="{{ route('frontend.account.changePassword', auth()->user()->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="font-sm color-text-muted mb-10">Password</label>
                            <input class="form-control" type="password" name="current_password">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-sm color-text-muted mb-10">New Password *</label>
                            <input class="form-control" type="password" name="new_password">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-sm color-text-muted mb-10">Re-Password *</label>
                            <input class="form-control" type="password" name="new_password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
                <div class="box-button mt-15">
                    <button class="btn btn-apply-big font-md font-bold" type="submit">Change</button>
                </div>
            </form>
        </div>

        <div class="col-md-6 col-lg-6">
            <h4 class="mb-30">Professional Experience</h4>
            <ul id="experienceList mb-15">
                @foreach($seeker->seekerExperiences as $data)
                <div class="card mb-10">
                    <div class="card-body">
                        <h6>{{ $data->title }}</h6>
                        <p>{{ $data->company }} <small>{{ $data->start_date }} to
                                {{ $data->end_date ?? '' }}</small></p>
                        <button type="button" class="btn btn-secondary btn-sm editExperienceButton"
                            data-id="{{ $data->id }}" data-title="{{ $data->title }}"
                            data-company="{{ $data->company }}" data-start_date="{{ $data->start_date }}"
                            data-end_date="{{ $data->end_date }}" data-bs-toggle="modal"
                            data-bs-target="#experienceModal">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm deleteExperienceButton"
                            data-id="{{ $data->id }}">
                            Delete
                        </button>
                    </div>
                </div>
                @endforeach
            </ul>
            <button type="button" class="btn btn-warning btn-lg " data-bs-toggle="modal"
                data-bs-target="#experienceModal" style="float: right">
                Add Experience
            </button>

            <h4 class="mt-30 mb-30">Education</h4>
            <ul id="educationList mb-15">
                @foreach($seeker->seekerEducations as $data)
                <div class="card mb-10">
                    <div class="card-body">
                        <h6>{{ $data->degree }}</h6>
                        <p>{{ $data->institution }} <small>{{ $data->start_date }} to
                                {{ $data->end_date ?? '' }}</small></p>
                        <button type="button" class="btn btn-secondary btn-sm editEducationButton"
                            data-id="{{ $data->id }}" data-degree="{{ $data->degree }}"
                            data-institution="{{ $data->institution }}" data-start_date="{{ $data->start_date }}"
                            data-end_date="{{ $data->end_date }}" data-bs-toggle="modal"
                            data-bs-target="#educationModal">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm deleteEducationButton"
                            data-id="{{ $data->id }}">
                            Delete
                        </button>
                    </div>
                </div>
                @endforeach
            </ul>
            <button type="button" class="btn btn-warning btn-lg float-rigth" data-bs-toggle="modal"
                data-bs-target="#educationModal" style="float: right">
                Add Education
            </button>

            <h4 class="mt-30 mb-30 ">Projects</h4>
            <ul id="projectList mb-15">
                @foreach($seeker->seekerProjects as $data)
                <div class="card mb-10">
                    <div class="card-body">
                        <h6>{{ $data->title }}</h6>
                        <p><small>{{ $data->start_date }} to {{ $data->end_date ?? '' }}</small>
                        </p>
                        <p>{{ $data->description }} </p>
                        <button type="button" class="btn btn-secondary btn-sm editProjectButton"
                            data-id="{{ $data->id }}" data-title="{{ $data->title }}"
                            data-description="{{ $data->description }}" data-start_date="{{ $data->start_date }}"
                            data-end_date="{{ $data->end_date }}" data-bs-toggle="modal" data-bs-target="#projectModal">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm deleteProjectButton"
                            data-id="{{ $data->id }}">
                            Delete
                        </button>
                    </div>
                </div>
                @endforeach
            </ul>
            <button type="button" class="btn btn-warning btn-lg float-rigth" data-bs-toggle="modal"
                data-bs-target="#projectModal" style="float: right">
                Add Project
            </button>


            <h4 class="mt-30 mb-30 mt-30">Skills</h4>

            <form action="#" method="post">
                @csrf
                @method('PUT')

                <select class="form-control" name="skills[]" id="skills" multiple>
                    @foreach ($skills as $skill)
                    <option {{ str_contains($seeker->skills, $skill->name) ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-warning mt-15 float-rigth btn-lg" style="float: right">
                    Save Skills
                </button>
            </form>

        </div>
    </div>
</div>

<div class="tab-pane fade" id="tab-my-jobs" role="tabpanel" aria-labelledby="tab-my-jobs">
    <h3 class="mt-0 color-brand-1 mb-50">My Jobs</h3>
    <div class="row display-list">
        @foreach ($myJobs as $data)
        <div class="col-xl-12 col-12">
            <div class="card-grid-2 hover-up">
                @if ($data->job->highlight == 1)
                <span class="flash"></span>
                @endif
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card-grid-2-image-left">
                            <div class="image-box">
                                <img style="width: 50px" src="{{ asset('profile/'.$data->job->employer->user->image) }}"
                                    alt="jobBox">
                            </div>
                            <div class="right-info">
                                <a class="name-job"
                                    href="{{ route('frontend.employer.profile', $data->job->employer->company_name) }}">{{ $data->job->employer->company_name }}</a>
                                <span class="location-small">{{ $data->job->location->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                        <div class="pl-15 mb-15 mt-30">
                            @foreach(explode(', ', $data->job->skills) as $skill)
                            <a class="btn btn-grey-small mr-5" href="#">{{ $skill }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-block-info">
                    <h4><a href="{{ route('frontend.jobs-detail', $data->job->id) }}">{{ $data->job->title }}</a>
                    </h4>
                    <div class="mt-5">
                        <span class="card-briefcase">{{ $data->job->job_type }}</span>
                        <span class="card-time"><span>{{ $data->job->created_at->diffForHumans() }}</span></span>
                    </div>
                    <div class="card-2-bottom mt-20">
                        <div class="row">
                            <div class="col-lg-7 col-7">
                                <span class="card-text-price">{{ $data->job->salary }}</span>
                                Month
                            </div>
                            <div class="col-lg-5 col-5 text-end">
                                <a href="{{ route('frontend.jobs-detail', $data->job->id) }}"
                                    class="btn btn-apply-now">View Job</a>
                                <div class="btn btn-apply-now" data-bs-toggle="modal"
                                    data-bs-target="#ModalCheckStatus{{ $data->id }}">Check
                                    Status</div>
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
<div class="modal fade" id="ModalCheckStatus{{ $data->id }}" tabindex="-1" data-bs-backdrop="static"
    data-bs-keyboard="false" role="dialog" aria-labelledby="ModalCheckStatus{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document"
        style="min-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $data->job->title }}</h5>
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
                                <div class="box-step 
                                                    @if ($step != 'Hired')
                                                        step-1
                                                    @endif">
                                    <h1 class="number-element">
                                        @if (in_array($data->status, $steps[$step]))
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
<div class="modal fade" id="experienceModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document"
        style="min-width: 500px">
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
<div class="modal fade" id="educationModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document"
        style="min-width: 500px">
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
<div class="modal fade" id="projectModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document"
        style="min-width: 500px">
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