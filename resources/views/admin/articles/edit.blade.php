@extends('admin.layouts.app', ['page_action' => 'Edit Article'])
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">Edit Article</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">{{$article->title}}</span>
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
<form method="POST" action="{{ route('admin.articles.update', $article->id) }}" enctype="multipart/form-data">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-body">
                
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control form-control-lg  @error('title') is-invalid @enderror" placeholder="Article Title" value="{{ old('title') ?? $article->title}}" autocomplete="title" >
                        
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        
                    </div>

                    <hr>

                    <div class="form-group">
                        <textarea name="description" id="description" cols="30" rows="10">{!! old('description') ?? $article->description !!}</textarea>
                    </div>

                
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <img
                    src="{{asset('articles/'. $article->asset)}}"
                    class="img-fluid rounded-top"
                    alt=""
                />
                
                <div class="mb-3">
                    <label for="asset" class="form-label">Replace Image</label>
                    <input
                        type="file"
                        class="form-control"
                        name="asset"
                        id="asset"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="asset" class="form-text text-muted">max upload size 5MB</small>
                </div>
                
                <hr>
                <button type="submit" class="btn btn-primary float-right">Update Article <i class="anticon anticon-save"></i></button>
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

// CKeditor
CKEDITOR.replace( 'description',{} );

</script>
@endsection