
@extends('admin.layouts.app', ['page_action' => 'Employer List'])
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
    <h2 class="header-title">Employer List</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Employers</span>
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
    <div class="col-md-12">
        <div class="card">
            
            
            <div class="card-body">
                <table id="data-table" class="table table-inverse ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Company Name</th>
                            <th>Profile</th>
                            <th>Job</th>
                            <th>Highlight Job</th>
                            <th>Plan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employers as $index=>$employer)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{ $employer->company_name }}</td>
                                <td>
                                    <a  target="blank" href="/employer/profile/{{ $employer->company_name }}" class="btn btn-icon btn-hover btn-sm btn-rounded text-primary" >
                                        <i class="anticon anticon-global"></i>
                                    </a>
                                </td>
                                <td>
                                    @php 
                                        $current_jobs = App\Models\Job::where("employer_id",$employer->id)->count();
                                        echo $current_jobs;
                                    @endphp
                                </td>
                                <td>
                                    @php 
                                        $highlight_jobs = App\Models\Job::where("employer_id",$employer->id)->where("highlight",1)->count();
                                        echo $highlight_jobs;
                                    @endphp
                                </td>
                                <td>
                                    <button class="badge badge-primary">{{$employer->membership_name}}</button>
                                </td>
                                <td>

                                    <a  href="/admin/employer/{{$employer->id}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right text-primary">
                                        <i class="anticon anticon-eye"></i>
                                    </a>
                               
                                    <!-- <a href="#" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right text-primary">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    
                                    
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded text-danger" >
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                     -->
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