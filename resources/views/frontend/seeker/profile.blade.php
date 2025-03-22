@extends('frontend.seeker.seeker_template')
@section('content1')
<style>
.image-profile {
    max-width: 130px !important;
    max-height: 130px !important;
}
</style>
<div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel" aria-labelledby="tab-my-profile">
    <h3 class="mt-0 mb-15 color-brand-1">My Account</h3>
    <a class="font-md color-text-paragraph-2" href="#">Upload Professional Photo</a>
    <div class="mt-35 mb-40 box-info-profie position-relative">
        <div class="image-profile position-relative">
            <img src="{{ auth()->user()->image ? asset('profile/' . auth()->user()->image) : asset('assets/imgs/page/candidates/candidate-profile.png') }}"
                alt="Profile Image" style="width: 250px !important; height: 150px !important; border-radius: 10%;">

            @if(auth()->user()->image)
            <!-- Delete (X) Button -->
            <button class="btn btn-danger btn-sm delete-image-btn" onclick="confirmDelete(event)">
                ✖
            </button>
            @endif
        </div>

        <br>

        <form action="{{ route('frontend.seeker.profile.image.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input style="width:30% !important;" type="file" name="profile_image" id="profile_image"
                class="form-control mt-3" required>

            @error('profile_image')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-apply mt-3">Upload Avatar</button>
        </form>

        <!-- Hidden Delete Form -->
        <form id="delete-form" action="{{ route('frontend.seeker.profile.image.delete') }}" method="POST"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function confirmDelete(event) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to delete your profile image?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
        });
    }
    </script>

    <!-- Custom Styling for Delete Button -->
    <style>
    .delete-image-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        width: 25px;
        height: 25px;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        border: none;
        background-color: rgba(220, 53, 69, 0.9);
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .delete-image-btn:hover {
        background-color: red;
    }
    </style>


    <div class="row form-contact">
        <div class="col-lg-6 col-md-12">
            <form action="{{route('frontend.seeker.update')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="font-sm color-text-muted mb-10">Full Name *</label>
                    <input class="form-control" required type="text" name="full_name" value="{{ $seeker->full_name }}">
                </div>
                <div class="form-group">
                    <label class="font-sm color-text-muted mb-10">Email *</label>
                    <input class="form-control" required type="email" name="email" value="{{ $user->email }}">
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
            <form action="/change-password" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="font-sm color-text-muted mb-10">Password</label>
                            <input class="form-control" type="password" name="old_password">
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
            <h4 style="margin-bottom: 20px; font-weight: bold;">Professional Experience</h4>
            <ul id="experienceList" style="list-style: none; padding: 0;">
                @foreach($seeker->seekerExperiences as $data)
                <div class="card"
                    style="margin-bottom: 15px; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body">
                        <h6 style="font-weight: bold; margin-bottom: 5px;">{{ $data->title }}</h6>
                        <p style="margin-bottom: 10px; color: #666;">{{ $data->company }} <small>{{ $data->start_date }}
                                to
                                {{ $data->end_date ?? 'Present' }}</small></p>
                        <button type="button" class="btn btn-secondary btn-sm editExperienceButton"
                            data-id="{{ $data->id }}" data-title="{{ $data->title }}"
                            data-company="{{ $data->company }}" data-start_date="{{ $data->start_date }}"
                            data-end_date="{{ $data->end_date }}" data-bs-toggle="modal"
                            data-bs-target="#experienceModal">
                            Edit
                        </button>
                        <form style="display:inline-block !important;" id="deleteExperienceForm-{{ $data->id }}"
                            action="{{ route('frontend.seeker.experience.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="experience_id" value="{{ $data->id }}">

                            <button type="button" class="btn btn-danger btn-sm deleteExperienceButton"
                                data-id="{{ $data->id }}" onclick="confirmDelete2(event, {{ $data->id }})">
                                Delete
                            </button>
                        </form>

                        <script>
                        function confirmDelete2(event, id) {
                            event.preventDefault();

                            Swal.fire({
                                title: "Are you sure?",
                                text: "You won’t be able to revert this!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#d33",
                                cancelButtonColor: "#3085d6",
                                confirmButtonText: "Yes, delete it!"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById("deleteExperienceForm-" + id).submit();
                                }
                            });
                        }
                        </script>

                    </div>
                </div>
                @endforeach
            </ul>
            <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal"
                data-bs-target="#experienceModal" style="float: right; margin-top: 10px;">
                Add Experience
            </button>

            <br> <br>
            <hr>
            <h4 style="margin-top: 40px; font-weight: bold;">Education</h4>
            <ul id="educationList" style="list-style: none; padding: 0;">
                @foreach($seeker->seekerEducations as $data)
                <div class="card"
                    style="margin-bottom: 15px; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body">
                        <h6 style="font-weight: bold; margin-bottom: 5px;">{{ $data->degree }}</h6>
                        <p style="margin-bottom: 10px; color: #666;">{{ $data->institution }}
                            <small>{{ $data->start_date }} to
                                {{ $data->end_date ?? 'Present' }}</small>
                        </p>
                        <button type="button" class="btn btn-secondary btn-sm editEducationButton"
                            data-id="{{ $data->id }}" data-degree="{{ $data->degree }}"
                            data-institution="{{ $data->institution }}" data-start_date="{{ $data->start_date }}"
                            data-end_date="{{ $data->end_date }}" data-bs-toggle="modal"
                            data-bs-target="#educationModal">
                            Edit
                        </button>
                        <!-- <button type="button" class="btn btn-danger btn-sm deleteEducationButton"
                            data-id="{{ $data->id }}">
                            Delete
                        </button> -->

                        <form style="display:inline-block !important;" id="deleteEducationForm-{{ $data->id }}"
                            action="{{ route('frontend.seeker.education.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="education_id" value="{{ $data->id }}">

                            <button type="button" class="btn btn-danger btn-sm deleteExperienceButton"
                                data-id="{{ $data->id }}" onclick="confirmDelete3(event, {{ $data->id }})">
                                Delete
                            </button>
                        </form>

                        <script>
                        function confirmDelete3(event, id) {
                            event.preventDefault();

                            Swal.fire({
                                title: "Are you sure?",
                                text: "You won’t be able to revert this!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#d33",
                                cancelButtonColor: "#3085d6",
                                confirmButtonText: "Yes, delete it!"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById("deleteEducationForm-" + id).submit();
                                }
                            });
                        }
                        </script>

                       
                    </div>
                </div>
                @endforeach
            </ul>
            <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#educationModal"
                style="float: right; margin-top: 10px;">
                Add Education
            </button>

            <br> <br>
            <hr>
            <h4 style="margin-top: 40px; font-weight: bold;">Projects</h4>
            <ul id="projectList" style="list-style: none; padding: 0;">
                @foreach($seeker->seekerProjects as $data)
                <div class="card"
                    style="margin-bottom: 15px; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
                    <div class="card-body">
                        <h6 style="font-weight: bold; margin-bottom: 5px;">{{ $data->title }}</h6>
                        <p style="margin-bottom: 5px; color: #666;"><small>{{ $data->start_date }} to
                                {{ $data->end_date ?? 'Present' }}</small></p>
                        <p style="margin-bottom: 10px;">{{ $data->description }}</p>
                        <button type="button" class="btn btn-secondary btn-sm editProjectButton"
                            data-id="{{ $data->id }}" data-title="{{ $data->title }}"
                            data-description="{{ $data->description }}" data-start_date="{{ $data->start_date }}"
                            data-end_date="{{ $data->end_date }}" data-bs-toggle="modal" data-bs-target="#projectModal">
                            Edit
                        </button>
                        <!-- <button type="button" class="btn btn-danger btn-sm deleteProjectButton"
                            data-id="{{ $data->id }}">
                            Delete
                        </button> -->
                        <form style="display:inline-block !important;" id="deleteProjectForm-{{ $data->id }}"
                            action="{{ route('frontend.seeker.project.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="project_id" value="{{ $data->id }}">

                            <button type="button" class="btn btn-danger btn-sm deleteExperienceButton"
                                data-id="{{ $data->id }}" onclick="confirmDelete3(event, {{ $data->id }})">
                                Delete
                            </button>
                        </form>

                        <script>
                        function confirmDelete3(event, id) {
                            event.preventDefault();

                            Swal.fire({
                                title: "Are you sure?",
                                text: "You won’t be able to revert this!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#d33",
                                cancelButtonColor: "#3085d6",
                                confirmButtonText: "Yes, delete it!"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById("deleteProjectForm-" + id).submit();
                                }
                            });
                        }
                        </script>
                    </div>
                </div>
                @endforeach
            </ul>
            <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#projectModal"
                style="float: right; margin-top: 10px;">
                Add Project
            </button>

            <br> <br>
            <hr>
            <h4 style="margin-top: 40px; font-weight: bold;">Skills</h4>
            <form action="{{route('frontend.seeker.skill.update')}}" method="post">
                @csrf
                @method('POST')

                <select class="form-control" name="skills[]" id="skills" multiple
                    style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                    @foreach ($skills as $skill)
                    <option {{ in_array($skill->name, explode(', ', $seeker->skills)) ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-warning btn-lg" style="float: right; margin-top: 15px;">
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
            <form action="{{route('frontend.seeker.experience.store')}}" method="post" id="experienceForm">
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
            <form action="{{route('frontend.seeker.education.store')}}" method="post" id="educationForm">
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
            <form action="{{route('frontend.seeker.project.store')}}" method="post" id="projectForm">
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