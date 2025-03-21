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
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control form-control-lg  @error('title') is-invalid @enderror" placeholder="Article Title" value="{{ old('title')}}" autocomplete="title" >
                        
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        
                    </div>

                    <hr>

                    <div class="form-group">
                        <textarea name="description" id="description" cols="30" rows="10">{!! old('description') !!}</textarea>
                    </div>

                
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="asset" class="form-label">Image</label>
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
                <button type="submit" class="btn btn-primary float-right">Publish Article <i class="anticon anticon-save"></i></button>
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