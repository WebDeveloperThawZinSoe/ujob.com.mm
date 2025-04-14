@extends('admin.layouts.app', ['page_action' => 'Image List'])

@section('style')
<link href="{{ asset('backend/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">Image List</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{ route('admin.index') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Images</span>
        </nav>
    </div>
</div>
@endsection

@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
</div>
@endif

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header h4">Upload New Image</div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.images.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Image Title">
                    </div>
                    <div class="form-group">
                        <input type="text" name="url" class="form-control" placeholder="Redirect URL (optional) That Will Not Work In Banner">
                    </div>
                    <div class="form-group">
                        <select name="type" class="form-control">
                            <option value="banner">Banner</option>
                            <option value="partner">Partner</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control">
                        <small class="form-text text-muted">Max size: 5MB</small>
                    </div>
                    <button class="btn btn-primary" type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <table id="data-table" class="table table-border">
                    <thead>
                        <tr>
                            <th>Preview</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $img)
                        <tr>
                            <td><a href="{{ asset('ads/' . $img->image) }}" target="_blank"><img src="{{ asset('ads/' . $img->image) }}" style="width: 100px;"></a></td>
                            <td>{{ $img->title }}</td>
                            <td>{{ $img->type }}</td>
                            <td>{{ $img->url ?? '—' }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.images.destroy', $img->id) }}" onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
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
<script src="{{ asset('backend/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
    $('#data-table').DataTable();
</script>
@endsection
