@extends('admin.layouts.app', ['page_action' => 'Edit Advertisement'])
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">{{$advertisement->name}}</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            {{-- <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a> --}}
            <span class="breadcrumb-item active">Edit Advertisement</span>
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
            <div class="card-header mt-3 h3">{{ __('Update Advertisement') }}</div>
            
            <div class="card-body">
                <form method="POST" action="{{ route('admin.advertisements.update', $advertisement->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Apple" value="{{ old('title') ?? $advertisement->title }}" autocomplete="title" >
                        
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        @error('any')
                        <p class="text-danger">error</p>
                        @enderror
                        
                    </div>

                    {{-- Url --}}
                    <div class="form-group">
                        <input type="text" name="target_url" id="target_url" class="form-control  @error('target_url') is-invalid @enderror" placeholder="Target URL" value="{{ old('target_url') ?? $advertisement->target_url }}" >
                        
                        @error('target_url')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    {{-- Image --}}
                    <img
                        src="{{asset('ads/'. $advertisement->image_url)}}"
                        class="img-fluid rounded-top"
                        alt=""
                        style="width: 120px;"
                    />
                    
                    <div class="form-group">
                        <input type="file" name="image_url" id="order" class="form-control  @error('image_url') is-invalid @enderror" value="{{ old('image_url') }}" placeholder="image_url">
                        <small id="helpId" class="form-text text-muted">maximum file size (5 MB)</small>
                        @error('image_url')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div> 
                    
                    <hr>

                    <div class="form-group">
                        <label for="location">ADS Location</label>
                        <select class="form-control" name="location" id="location">
                            <option value="{{$advertisement->location}}">{{$advertisement->location}}</option>
                          <option value="home page header">home page header</option>
                          <option value="home page bottom">home page bottom</option>
                          <option value="footer">footer</option>
                          <option value="sidebar">sidebar</option>
                        </select>
                        @error('location')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <input type="date" name="start_date" id="start_date" class="form-control  @error('start_date') is-invalid @enderror" value="{{ old('start_date') ?? $advertisement->start_date }}" placeholder="start_date">
                        @error('start_date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <input type="date" name="end_date" id="end_date" class="form-control  @error('end_date') is-invalid @enderror" value="{{ old('end_date') ?? $advertisement->end_date }}" placeholder="end_date">
                        @error('end_date')
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