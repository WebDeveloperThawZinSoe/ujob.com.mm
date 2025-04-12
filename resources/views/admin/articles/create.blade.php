@extends('admin.layouts.app', ['page_action' => 'Add New Article'])

@section('style')
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">Add New Article</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Add New</span>
        </nav>
    </div>
</div>
@endsection

@section('content')

<form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @csrf
                    @method('POST')

                    {{-- Title --}}
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control form-control-lg @error('title') is-invalid @enderror" placeholder="Article Title" value="{{ old('title') }}" autocomplete="title">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <hr>

                    {{-- Description --}}
                    <div class="form-group">
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    {{-- Image Upload --}}
                    <div class="mb-3">
                        <label for="asset" class="form-label">Image</label>
                        <input
                            type="file"
                            class="form-control @error('asset') is-invalid @enderror"
                            name="asset"
                            id="asset"
                            aria-describedby="helpId"
                        />
                        @error('asset')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <small id="asset" class="form-text text-muted">max upload size 5MB</small>
                    </div>

                    <hr>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-primary float-right">
                        Publish Article <i class="anticon anticon-save"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('script')
<!-- page js -->
<script src="{{ asset('backend/vendors/ckeditor/ckeditor.js') }}"></script>
<script>
// CKEditor
CKEDITOR.replace('description', {});
</script>
@endsection
