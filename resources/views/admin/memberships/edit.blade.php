@extends('admin.layouts.app', ['page_action' => 'Edit Membership'])
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">{{$membership->name}}</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            {{-- <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a> --}}
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
                <form method="POST" action="{{ route('admin.memberships.update', $membership->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Membership Title" value="{{ old('title') ?? $membership->title }}" >
                        
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="form-group">
                        <input type="file" name="image" id="order" class="form-control  @error('image') is-invalid @enderror" value="{{ old('image') }}" placeholder="image">
                        <small id="helpId" class="form-text text-muted">maximum file size (5 MB)</small>
                        @error('image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="short_detail" class="form-label">Short Detail</label>
                        <textarea class="form-control" name="short_detail" id="" rows="3">{!! old('short_detail') ?? $membership->short_detail  !!}</textarea>
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label for="">Summary  <small class="text-muted">*</small></label>
                        <textarea name="summary" class="form-control  @error('summary') is-invalid @enderror" autocomplete="summary" rows="3">{!! old('summary') ?? $membership->summary !!}</textarea>
                    </div>
                    

                    {{-- Order --}}
                    <div class="form-group">
                        <input type="number" name="order" id="order" class="form-control  @error('order') is-invalid @enderror" value="{{ old('order') ?? $membership->order }}" placeholder="Order">
                        @error('order')
                        <p class="text-danger">{{$message}}</p>
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
    CKEDITOR.replace( 'summary',{
        
    } 
    );
    
    
</script>
@endsection