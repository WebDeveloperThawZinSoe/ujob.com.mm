
@extends('admin.layouts.app', ['page_action' => 'Advertisement List'])
@section('style')
<!-- page css -->
<link href="{{ asset('backend/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">

<style>
    #data-table_filter input{
        max-width: 200px !important;
    }
</style>
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">Advertisement List</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="
            {{-- {{route('admin')}} --}}
            " class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Advertisements</span>
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
{{-- Success message --}}
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{ Session::get('error') }}
</div>
@endif

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header mt-3 h4">{{ __('Add New Advertisement') }}</div>
            
            <div class="card-body">
                <form method="POST" action="{{ route('admin.advertisements.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Advertisement Title" value="{{ old('title') }}" >
                        
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    {{-- Url --}}
                    <div class="form-group">
                        <input type="text" name="target_url" id="target_url" class="form-control  @error('target_url') is-invalid @enderror" placeholder="Target URL" value="{{ old('target_url') }}" >
                        
                        @error('target_url')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    {{-- Image --}}
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
                        <input type="date" name="start_date" id="start_date" class="form-control  @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" placeholder="start_date">
                        @error('start_date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <input type="date" name="end_date" id="end_date" class="form-control  @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" placeholder="end_date">
                        @error('end_date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div> 
                    
                    
                    <button type="submit" class="btn btn-primary">Create <i class="anticon anticon-save"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            
            
            <div class="card-body">
                <table id="data-table" class="table table-inverse ">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($advertisements as $data)
                            <tr>
                                <td>
                                    <img src="{{asset('ads/'.$data->image_url)}}" alt="" srcset="" style="width: 100px;">
                                </td>
                                <td>
                                    {{$data->title}}
                                </td>
                                <td>
                                    {{$data->location}}
                                </td>
                                
                                <td>
                                    
                                    {{-- Edit and View --}}
                                    <a href="{{route('admin.advertisements.edit', $data->id)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right text-primary">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    
                                    
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded text-danger" onclick="if(confirm('Are you sure you want to delete this data?')){document.getElementById('delete-form{{$data->id}}').submit(); }">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                    <form style="display: none;" id="delete-form{{$data->id}}" method="POST" action="{{route('admin.advertisements.destroy', $data->id)}}" >
                                        @csrf @method('DELETE')
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                    
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- page js -->
<script src="{{ asset('backend/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>

<script>
    

$('#data-table').DataTable();


</script>
@endsection