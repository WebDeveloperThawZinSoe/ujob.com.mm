@extends('frontend.layouts.app')

@section('style')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
/* Custom CSS to increase the height of the Quill editor */
.ql-container {
    min-height: 200px;
    /* Adjust this height as needed */
}

.ql-editor {
    height: 100%;
    /* Ensure the content area takes the full height */
}
</style>
@endsection

@section('breadcrumb')
<!-- Breadcrumb code -->
@endsection

@section('content')

@php 
    $user_id = Auth::user()->id;
    $employer = App\Models\Employer::where('user_id', $user_id)->first();
@endphp


<section class="section-box-2">
    <div class="container">
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
        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
        <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert);
        });
        </script>
        @endif


        <div class="banner-hero banner-image-single">
            <img src="{{ asset('assets/imgs/page/company/img.png') }}" alt="jobBox">
        </div>
        <div class="box-company-profile">
            <div class="image-compay">
                <img src="@if ($employer->user->image == '') {{ asset('assets/imgs/avatar/ava_11.png') }} @else {{ asset('profile/'.$employer->user->image) }} @endif"
                    alt="jobBox" style="height: 110px;">
            </div>
            <div class="row mt-10">
                <div class="col-lg-8 col-md-12">
                    <h5 class="f-18">{{ $employer->company_name }} <span
                            class="card-location font-regular ml-20">Yangon</span> <span
                            class="card-location font-regular ml-20">{{$employer->membership_name}}</span></h5>
                    <p class="mt-5 font-md color-text-paragraph-2 mb-15"><a
                            href="{{ $employer->company_website }}">{{ $employer->company_website }}</a>

                    </p>

                </div>
                <div class="col-lg-4 col-md-12 text-lg-end">
                    <a target="_blank" class="btn btn-preview-icon btn-apply btn-apply-big"
                        href="/employer/profile/{{ $employer->company_name }}">View</a>
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
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="btn btn-border aboutus-icon mb-20 active" href="{{route('frontend.employer.dashboard')}}"
                               
                                >Dashboard</a>
                        </li>
                        <li>
                            <a href="{{route('frontend.employer.jobs.lists')}}" class="btn btn-border recruitment-icon mb-20" href="#tab-my-jobs" >My Jobs</a>
                        </li>

                        <li>
                            <a class="btn btn-border recruitment-icon mb-20" href="#tab-cv-list" >CV List</a>
                        </li>
                        <li>
                            <a class="btn btn-border people-icon mb-20" href="{{route('frontend.employer.membership')}}" >Membership</a>
                        </li>
                        <li>
                            <a target="_blank" class="btn btn-border edit-icon mb-20" href="/employer/profile/{{ $employer->company_name }}" >Profile Setting</a>
                        </li>


                        <li>
                            <a class="btn btn-border edit-icon mb-20" href="{{route('frontend.employer.password_update')}}" >Change Password</a>
                        </li>

                        <li>
                            <!-- Logout Button -->
                            <a class="btn btn-danger btn-border logout-icon mb-20" href="#"
                                onclick="confirmLogout(event)"
                                style="background-color: #dc3545; border-color: #dc3545; color: white;">
                                Logout
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
                    @yield('dashboard_content')
                </div>
            </div>
        </div>





    </div>
</section>

@endsection

@section('script')

<!-- Include jQuery, Select2, and TinyMCE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.tiny.cloud/1/6qj5redelllsqfqp3bpdll8c390qf1qy4z80onfj2uvckdfj/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>



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

<script>
// tinymce.init({
//     selector: '#description', // Target the textarea
//     plugins: 'lists link image table code',
//     toolbar: 'undo redo | bold italic | bullist numlist | link image | code',
//     menubar: false,
//     height: 300
// });
</script>


@endsection