@extends('admin.layouts.app', ['page_action' => 'Edit Category'])
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">{{$category->name}}</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            {{-- <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a> --}}
            <span class="breadcrumb-item active">Edit Category</span>
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
            <div class="card-header mt-3 h3">{{ __('Update Category') }}</div>
            
            <div class="card-body">
                <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Apple" value="{{ old('name') ?? $category->name }}" autocomplete="name" >
                        
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        
                    </div>

                    {{-- Order --}}
                    <div class="form-group">
                        <input type="number" name="order" id="order" class="form-control  @error('order') is-invalid @enderror" value="{{ old('order') ?? $category->order }}" placeholder="Order">
                        @error('order')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    
                    
                    <button type="submit" class="btn btn-primary float-right">Update  <i class="anticon anticon-save"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection