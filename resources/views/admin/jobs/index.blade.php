@extends('admin.layouts.app')
@section('style')
<!-- select css -->
<link href="{{ asset('backend/vendors/select2/select2.css') }}" rel="stylesheet">
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')

@endsection
@section('content')



<div class="page-header no-gutters">
    <div class="row align-items-md-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5">
                    <h3>Jobs List</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-md-right m-v-10">
                <span class="text-muted pr-3 pt-2 p">Total Result: {{count($jobs)}}</span>

                <div class="btn-group m-r-10">

                </div>

                <button class="btn btn-default m-r-5 " data-toggle="modal" data-target="#filter">
                    <i class="anticon anticon-filter"></i>
                    <span class="m-l-5">Filter</span>
                </button>



            </div>
        </div>
    </div>
</div>

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
{{-- Error message --}}
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{ Session::get('error') }}
</div>
@endif


<div class="container-fluid">

    <div id="card-view">
        <div class="row">

            @foreach ($jobs as $item)
            <div class="col-md-3 mb-2">
                <div class="card">
                    <a href="{{route('admin.jobs.show', $item->id)}}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="media">

                                    <div class="m-l-1">
                                        <h5 class="m-b-0">{{$item->title}}</h5>
                                        {{-- need to update --}}
                                        <span class="text-muted font-size-13">{{$item->job_type}} |
                                            {{ $item->created_at->diffForHumans() }}</span>
                                        <span class="text-muted font-size-12">Company :
                                            {{$item->employer->company_name}}</span>
                                    </div>
                                </div>
                                <div class="dropdown dropdown-animated scale-left">
                                    <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                        <i class="anticon anticon-setting"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="{{route('admin.jobs.show', $item->id)}}" class="dropdown-item"
                                            type="button">
                                            <i class="anticon anticon-eye"></i>
                                            <span class="m-l-10">View</span>
                                        </a>
                                        <a href="{{route('admin.jobs.edit', $item->id)}}" class="dropdown-item"
                                            type="button">
                                            <i class="anticon anticon-edit"></i>
                                            <span class="m-l-10">Edit</span>
                                        </a>
                                       <!-- Delete Confirmation Link -->
                                        <a onclick="if(confirm('Are you sure to delete this?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }" 
                                        href="#" class="dropdown-item" type="button">
                                            <i class="anticon anticon-delete"></i>
                                            <span class="m-l-10">Delete</span>
                                        </a>

                                        <!-- Hidden Form for Deleting Job -->
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('admin.jobs.destroy', $item->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <p class="m-t-25">
                            <div>


                                <p style="text-align:right;" class="text-warning">
                                    @if($item->salary != null)
                                    {{number_format($item->salary)}} Ks
                                    @else
                                    Negotiate
                                    @endif
                                </p>
                            </div>
                            </p>


                        </div>
                    </a>
                </div>
            </div>
            @endforeach

            {{-- end --}}
        </div>
    </div>





    {!! $jobs->appends(request()->query())->links() !!}
</div>

{{-- Filter Form --}}
@include('admin.jobs.filter_form')

@endsection

@section('script')
<!-- select js -->
<script src="{{asset('backend/vendors/select2/select2.min.js')}}"></script>

<script>
$('.select2').select2();
</script>


@endsection