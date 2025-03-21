@extends('admin.layouts.app', ['page_action' => 'Articles List'])
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
    <h2 class="header-title">All Articles</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">All Articles</span>
        </nav>
    </div>
    <a href="{{route('admin.articles.create')}}" class="btn btn-primary m-r-5 float-right">Add Article <i class="anticon anticon-plus-square"></i></a>
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

<div class="row">
    
    <div class="col-md-12">
        <div class="card">
            
            
            <div class="card-body">
                <table id="data-table" class="table table-inverse ">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <td><h5>{{$article->title}}</h5></td>
                            
                            <td>
                                {{-- Edit --}}
                                <a href="{{route('admin.articles.edit', $article->id)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right text-primary">
                                    <i class="anticon anticon-edit"></i>
                                </a>
                                {{-- Delete --}}
                                
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded text-danger" type="submit" onclick="if(confirm('Are you sure you want to delete this data?')){document.getElementById('delete-form{{$article->id}}').submit(); }">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                                <form id="delete-form{{$article->id}}" method="POST" action="{{route('admin.articles.destroy', $article->id)}}" >
                                    @csrf
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