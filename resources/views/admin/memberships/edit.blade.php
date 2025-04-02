@extends('admin.layouts.app', ['page_action' => 'Edit Membership'])
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">{{$membership->name}}</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            {{-- <a href="{{route('admin')}}" class="breadcrumb-item"><i
                class="anticon anticon-home m-r-5"></i>Dashboard</a> --}}
            <span class="breadcrumb-item active">Edit Membership</span>
        </nav>
    </div>
</div>
@endsection
@section('content')

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

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header mt-3 h3">{{ __('Update Membership') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.memberships.update', $membership->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Membership Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Membership Title"
                            value="{{ old('title') ?? $membership->title }}">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload (Commented Out) -->
                    <!-- 
    <div class="form-group">
        <label for="image">Upload Image</label>
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
        <small id="helpId" class="form-text text-muted">Maximum file size: 5MB</small>
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    -->

                    <div class="form-group">
                        <label for="short_detail">Short Detail</label>
                        <textarea class="form-control" name="short_detail" id="short_detail"
                            rows="3">{!! old('short_detail') ?? $membership->short_detail !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="summary">Summary <small class="text-muted">*</small></label>
                        <textarea name="summary" id="summary"
                            class="form-control @error('summary') is-invalid @enderror" autocomplete="summary"
                            rows="3">{!! old('summary') ?? $membership->summary !!}</textarea>
                        @error('summary')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" name="order" id="order"
                            class="form-control @error('order') is-invalid @enderror"
                            value="{{ old('order') ?? $membership->order }}" placeholder="Order">
                        @error('order')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="total_job">Total Job</label>
                        <input type="number" name="total_job" id="total_job"
                            class="form-control @error('total_job') is-invalid @enderror"
                            value="{{ old('total_job') ?? $membership->total_job }}" placeholder="Total Job">
                        @error('total_job')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="highlight_job">Highlight Job</label>
                        <input type="number" name="highlight_job" id="highlight_job"
                            class="form-control @error('highlight_job') is-invalid @enderror"
                            value="{{ old('highlight_job') ?? $membership->highlight_job }}"
                            placeholder="Highlight Job">
                        @error('highlight_job')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="is_feature_company">Is Feature Company?</label>
                        <select name="is_feature_company" id="is_feature_company"
                            class="form-control @error('is_feature_company') is-invalid @enderror">
                            <option value="1" @if($membership->is_feature_company == 1) selected @endif>Yes</option>
                            <option value="0" @if($membership->is_feature_company == 0) selected @endif>No</option>
                        </select>
                        @error('is_feature_company')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="auto_match">Auto Match</label>
                        <select name="auto_match" id="auto_match"
                            class="form-control @error('auto_match') is-invalid @enderror">
                            <option value="1" @if($membership->auto_match == 1) selected @endif>Yes</option>
                            <option value="0" @if($membership->auto_match == 0) selected @endif>No</option>
                        </select>
                        @error('auto_match')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price') ?? $membership->price }}" placeholder="Price">
                        @error('price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pre Question (Hidden) -->
                    <!-- 
    <div class="form-group">
        <label for="pre_question">Pre Question</label>
        <select name="pre_question" id="pre_question" class="form-control @error('pre_question') is-invalid @enderror">
            <option value="1" @if($membership->pre_question == 1) selected @endif>Yes</option>
            <option value="0" @if($membership->pre_question == 0) selected @endif>No</option>
        </select>
        @error('pre_question')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    -->

                    <div class="form-group">
                        <label for="bluk_cvs">Bulk CVs</label>
                        <input type="number" name="bluk_cvs" id="bluk_cvs"
                            class="form-control @error('bluk_cvs') is-invalid @enderror"
                            value="{{ old('bluk_cvs') ?? $membership->bluk_cvs }}" placeholder="Bulk CVs">
                        @error('bluk_cvs')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update <i class="anticon anticon-save"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('backend/vendors/ckeditor/ckeditor.js') }}"></script>
<script>
// CKeditor
CKEDITOR.replace('summary', {

});
</script>
@endsection