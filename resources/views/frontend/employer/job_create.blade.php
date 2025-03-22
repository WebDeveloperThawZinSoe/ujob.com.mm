@extends('frontend.employer.dashboard_template')

@section('dashboard_content')
<div class="tab-content">
    <h3>Create New Job Post</h3>
    @php 
        $user_id = Auth::user()->id;
        $employer = App\Models\Employer::where('user_id', $user_id)->first();
    @endphp
    <form action="{{ route('employer.jobs.store', $employer->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Job Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', '') }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description <span class="text-danger">*</span></label>
            <textarea class="form-control" name="description" id="description" required>{{ old('description', '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" class="form-control" name="salary" id="salary" value="{{ old('salary', '') }}">
        </div>

        <div class="form-group">
            <label for="job_type">Job Type <span class="text-danger">*</span></label>
            <select class="form-control" name="job_type" id="job_type" required>
                <option value="Full Time" {{ old('job_type', '') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                <option value="Part Time" {{ old('job_type', '') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                <option value="Remote Jobs" {{ old('job_type', '') == 'Remote Jobs' ? 'selected' : '' }}>Remote Jobs</option>
                <option value="Freelancer" {{ old('job_type', '') == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
            </select>
        </div>

        <div class="form-group">
            <label for="deadline">Application Deadline <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="deadline" id="deadline" value="{{ old('deadline', '') }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category <span class="text-danger">*</span></label>
            <select class="form-control" name="category_id" id="category_id" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="location_id">Location <span class="text-danger">*</span></label>
            <select class="form-control" name="location_id" id="location_id" required>
                @foreach ($locations as $location)
                <option value="{{ $location->id }}" {{ old('location_id', '') == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="skills">Skills <span class="text-danger">*</span></label>
            <select class="form-control select2" name="skills[]" id="skills" multiple required>
                @foreach ($skills as $skill)
                <option value="{{ $skill->name }}" {{ (collect(old('skills', []))->contains($skill->name)) ? 'selected' : '' }}>{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="highlight">Is Highlight?</label>
            <select class="form-control" name="highlight" id="highlight" required>
                <option value="0" {{ old('highlight', '') == '0' ? 'selected' : '' }}>Not Highlight</option>
                <option value="1" {{ old('highlight', '') == '1' ? 'selected' : '' }}>Highlight</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Job</button>
    </form>
</div>

<!-- Include jQuery, Select2, and TinyMCE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.tiny.cloud/1/6qj5redelllsqfqp3bpdll8c390qf1qy4z80onfj2uvckdfj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(document).ready(function() {
        $('#skills').select2({
            placeholder: "Select skills",
            allowClear: true
        });

        // tinymce.init({
        //     selector: '#description',
        //     menubar: false,
        //     plugins: 'lists link',
        //     toolbar: 'bold italic | bullist numlist | link',
        // });
    });
</script>

@endsection
