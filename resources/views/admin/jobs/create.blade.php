@extends('admin.layouts.app')

@section('style')
<!-- select2 css -->
<link href="{{ asset('backend/vendors/select2/select2.css') }}" rel="stylesheet">
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')

@endsection
@section('content')

<div class="page-header no-gutters">

</div>

{{-- Success message --}}
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{ Session::get('success') }}
</div>
@endif

{{-- Error message --}}
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{ Session::get('error') }}
</div>
@endif

<div class="container-fluid">
    <div>
        <form action="{{route('admin.jobs.store')}}" method="post" enctype="multipart/form-data" class="job-form">
            @csrf
            @method("POST")

            <h5>Add New Job</h5>

            <div class="form-group">
                <label for="employer">Employer</label>
                <select class="form-control select2" name="employer" id="employer" required>
                    @foreach ($employers as $employer)
                    <option @if($employer->user_id == Auth::user()->id)  selected @endif value="{{ $employer->id }}">{{ $employer->company_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="form-group">
                <div id="description">Description</div>
                <textarea class="form-control" name="description" id="description-input"></textarea>
            </div>

            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" name="salary" id="salary">
            </div>

            <div class="form-group">
                <label for="job_type">Job Type</label>
                <select class="form-control" name="job_type" id="job_type" required>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Remote Jobs">Remote Jobs</option>
                    <option value="Freelancer">Freelancer</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deadline">Application Deadline</label>
                <input type="date" class="form-control" name="deadline" id="deadline" required>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control select2" name="category_id" id="category_id" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="location_id">Location</label>
                <select class="form-control select2" name="location_id" id="location_id" required>
                    @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="skills">Skills</label>
                <select class="form-control select2" name="skills[]" id="skills" multiple required>
                    @foreach ($skills as $skill)
                    <option value="{{ $skill->name }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="highlight">Is Highlight?</label>
                <select class="form-control" name="highlight" id="highlight" required>
                    <option value="0">Not Highlight</option>
                    <option value="1">Highlight</option>
                </select>
            </div>

            <div class="form-group">
                <label for="anynomous">Is Anynomous?</label>
                <select class="form-control" name="anynomous" id="anynomous" required>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>
</div>

@endsection

@section('script')
<!-- select2 js -->
<script src="{{ asset('backend/vendors/select2/select2.min.js') }}"></script>

<script>
    // Initialize Select2
    $('.select2').select2();
</script>

@endsection
