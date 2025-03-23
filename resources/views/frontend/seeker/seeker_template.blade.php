@extends('frontend.layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<style>
    .btn-border {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    color: #333;
    text-decoration: none;
    transition: all 0.3s ease;
    }

    .btn-border:hover {
        background-color: #f8f9fa;
        color: #007bff;
    }

    .btn-border.active {
        background-color: #007bff !important;
        color: white !important;
        border-color: #007bff !important;
        font-weight: bold;
    }

</style>
@endsection

@section('breadcrumb')
<!-- Breadcrumb Data Here -->
@endsection

@section('content')

@php
$user = Auth::user();
$seeker = App\Models\Seeker::where('user_id', $user->id)->first();

@endphp
<section class="section-box-2">
    <div class="container">
        {{-- Success message --}}
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ Session::get('success') }}</strong>
        </div>
        <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert);
        });
        </script>

        @endif
    </div>
</section>

<section class="section-box-2">
    <div class="container">
        <div class="banner-hero banner-image-single">
            <img src="{{ asset('assets/imgs/page/candidates/img.png') }}" alt="jobbox">
            <!-- <a class="btn-editor" href="#"></a> -->
        </div>
        <div class="box-company-profile">
            <div class="image-compay">
                <img src="{{ auth()->user()->image ? asset('profile/' . auth()->user()->image) : asset('assets/imgs/page/candidates/candidate-profile.png') }}" style="width: 100px !important; height: 100px !important; border-radius: 10%;" alt="jobbox">
            </div>
            <div class="row mt-10">
                <div class="col-lg-8 col-md-12">
                    <h5 class="f-18">{{$user->name ? "Welcome, ".$user->name : "Welcome, Job Seeker"}}</h5>

                    </h5>
                    <p class="mt-0 font-md color-text-paragraph-2 mb-15">{{$seeker->headline ?? ''}}</p>
                </div>
                <div class="col-lg-4 col-md-12 text-lg-end">
                    <a class="btn btn-preview-icon btn-apply btn-apply-big" href="/redirect/auth">Dashbaord</a>
                    <a class="btn btn-preview-icon btn-apply btn-apply-big"
                        href="{{route('frontend.cv', auth()->user()->seeker->id)}}">Preview CV</a>
                </div>
            </div>
        </div>
        <div class="border-bottom pt-10 pb-10"></div>
    </div>
</section>

<section class="section-box mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="box-nav-tabs nav-tavs-profile mb-5">
                    <ul class="nav flex-column" role="tablist">
                        <li>
                            <a class="btn btn-border  mb-20 {{ request()->is('seeker/dashboard') ? 'active' : '' }}"
                                href="/seeker/dashboard">
                                <i class="fas fa-tachometer-alt"></i> &nbsp; Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-border  mb-20 {{ request()->is('seeker/profile') ? 'active' : '' }}"
                                href="/seeker/profile">
                                <i class="fas fa-user"></i> &nbsp; My Profile
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-border mb-20 {{ request()->is('seeker/job/base_on_profile') ? 'active' : '' }}"
                                href="/seeker/job/base_on_profile">
                                <i class="fas fa-briefcase"></i> &nbsp; Jobs Based On Your Profile
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-border  mb-20 {{ request()->is('seeker/applied/jobs') ? 'active' : '' }}"
                                href="/seeker/applied/jobs">
                                <i class="fas fa-file-alt"></i>  &nbsp; My Jobs
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-border mb-20 {{ request()->is('frontend/cv*') ? 'active' : '' }}"
                                href="{{ route('frontend.cv', auth()->user()->seeker->id) }}">
                                <i class="fas fa-file"></i> &nbsp; View CV
                            </a>
                        </li>
                        <li>
                            <!-- Logout Button -->
                            <a class="btn btn-danger btn-border mb-20" href="#"
                                onclick="confirmLogout(event)"
                                style="background-color: #dc3545; border-color: #dc3545; color: white;">
                                <i class="fas fa-sign-out-alt"></i> &nbsp; Logout
                            </a>

                            <!-- Hidden Logout Form -->
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                <div class="content-single">
                    <div class="tab-content">
                        @yield('content1')

                    </div>
                </div>
            </div>
        </div>

        @yield('content2')



    </div>
</section>


<script>
function confirmLogout(event) {
    event.preventDefault(); // Prevent default link action

    Swal.fire({
        title: "Are you sure?",
        text: "You will be logged out!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Yes, Logout!"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit(); // Submit the form via POST
        }
    });
}
</script>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle Add/Edit Experience
    // $('#experienceForm').on('submit', function(e) {
    //     e.preventDefault();
    //     let url = $('#experienceId').val() ? '';
    //     $.ajax({
    //         type: 'POST',
    //         url: url,
    //         data: $(this).serialize(),
    //         success: function(response) {
    //             location.reload();
    //         },
    //         error: function(response) {
    //             alert('An error occurred.');
    //         }
    //     });
    // });

    // Handle Edit Experience Button Click
    $('.editExperienceButton').on('click', function() {
        $('#modalTitleId').text('Edit Experience');
        $('#experienceId').val($(this).data('id'));
        $('#experienceTitle').val($(this).data('title'));
        $('#experienceCompany').val($(this).data('company'));
        $('#experienceStartDate').val($(this).data('start_date'));
        $('#experienceEndDate').val($(this).data('end_date'));
    });

    // Handle Add Experience Button Click
    $('#experienceModal').on('hidden.bs.modal', function() {
        $('#modalTitleId').text('Add Experience');
        $('#experienceForm')[0].reset();
        $('#experienceId').val('');
    });

    // Handle Delete Experience
    $('.deleteExperienceButton').on('click', function() {
        if (confirm('Are you sure you want to delete this experience?')) {
            let experienceId = $(this).data('id');
            $.ajax({
                type: 'DELETE',
                url: '',
                data: {
                    experience_id: experienceId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(response) {
                    alert('An error occurred.');
                }
            });
        }
    });

    // Handle Add/Edit Education
    $('#educationForm').on('submit', function(e) {
        e.preventDefault();
        let url = $('#educationId').val() ? '';
        $.ajax({
            type: 'POST',
            url: url,
            data: $(this).serialize(),
            success: function(response) {
                location.reload();
            },
            error: function(response) {
                alert('An error occurred.');
            }
        });
    });

    // Handle Edit Education Button Click
    $('.editEducationButton').on('click', function() {
        $('#modalTitleId').text('Edit Education');
        $('#educationId').val($(this).data('id'));
        $('#educationDegree').val($(this).data('degree'));
        $('#educationInstitution').val($(this).data('institution'));
        $('#educationStartDate').val($(this).data('start_date'));
        $('#educationEndDate').val($(this).data('end_date'));
    });

    // Handle Add Education Button Click
    $('#educationModal').on('hidden.bs.modal', function() {
        $('#modalTitleId').text('Add Education');
        $('#educationForm')[0].reset();
        $('#educationId').val('');
    });

    // Handle Delete Education
    $('.deleteEducationButton').on('click', function() {
        if (confirm('Are you sure you want to delete this education?')) {
            let educationId = $(this).data('id');
            $.ajax({
                type: 'DELETE',
                url: '',
                data: {
                    education_id: educationId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(response) {
                    alert('An error occurred.');
                }
            });
        }
    });

    // Handle Add/Edit Project
    $('#projectForm').on('submit', function(e) {
        e.preventDefault();
        let url = $('#projectId').val() ? '';
        $.ajax({
            type: 'POST',
            url: url,
            data: $(this).serialize(),
            success: function(response) {
                location.reload();
            },
            error: function(response) {
                alert('An error occurred.');
            }
        });
    });

    // Handle Edit Project Button Click
    $('.editProjectButton').on('click', function() {
        $('#modalTitleId').text('Edit Project');
        $('#projectId').val($(this).data('id'));
        $('#projectTitle').val($(this).data('title'));
        $('#projectDescription').val($(this).data('description'));
        $('#projectStartDate').val($(this).data('start_date'));
        $('#projectEndDate').val($(this).data('end_date'));
    });

    // Handle Add Project Button Click
    $('#projectModal').on('hidden.bs.modal', function() {
        $('#modalTitleId').text('Add Project');
        $('#projectForm')[0].reset();
        $('#projectId').val('');
    });

    // Handle Delete Project
    $('.deleteProjectButton').on('click', function() {
        if (confirm('Are you sure you want to delete this project?')) {
            let projectId = $(this).data('id');
            $.ajax({
                type: 'DELETE',
                url: '',
                data: {
                    project_id: projectId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(response) {
                    alert('An error occurred.');
                }
            });
        }
    });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Select2 for skills with multi-select enabled
    $('#skills').select2({
        tags: true,
        multiple: true // Enable multi-select
    });
});
</script>


@endsection