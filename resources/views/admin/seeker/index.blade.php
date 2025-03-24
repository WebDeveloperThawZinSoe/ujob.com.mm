
@extends('admin.layouts.app', ['page_action' => 'Seeker List'])
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
    <h2 class="header-title">Seekers List</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin.index')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Seekers</span>
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
                            <th>Name</th>
                            <th>HeadLine</th>
                            <th>Apply</th>
                            <th>Ujob Resume</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seekers as $index=>$seeker)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{$seeker->full_name}}</td>
                                <td>{{$seeker->headline}}</td>
                                <td>
                                    @php 
                                    echo App\Models\JobSeeker::where("seeker_id",$seeker->id)->count();
                                    @endphp
                                </td>
                                <td>
                                    <a  target="_blank" href="/cv/{{$seeker->id}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right text-primary">
                                        <i class="anticon anticon-eye"></i>
                                    </a>
                                </td>
                                <td>
                                <form id="deleteForm{{$seeker->id}}"
                                                    action="{{ url('/admin/seeker/'.$seeker->id.'/delete') }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded text-danger"
                                                    onclick="confirmDelete({{ $seeker->id }})">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>

                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                function confirmDelete(id) {
                                                   
                                                    Swal.fire({
                                                        title: 'Are you sure?',
                                                        text: 'You won’t be able to revert this!',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Yes, delete it!',
                                                        cancelButtonText: 'No, cancel!',
                                                        reverseButtons: true
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            // Trigger the form submission for the delete action
                                                            document.getElementById('deleteForm' + id).submit();
                                                        } else if (result.dismiss === Swal.DismissReason
                                                            .cancel) {
                                                            Swal.fire(
                                                                'Cancelled',
                                                                'Seeker is safe :)',
                                                                'info'
                                                            );
                                                        }
                                                    });
                                                }
                                                </script>
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