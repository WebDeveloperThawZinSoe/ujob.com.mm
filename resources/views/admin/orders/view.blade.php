@extends('admin.layouts.app', ['page_action' => 'View Order'])
@section('style')
<style>
.block-pricing .box-pricing-item {
    display: inline-block;
    width: 100%;
    padding: 44px;
    border: 1px solid #E0E6F7;
    border-radius: 8px;
    margin-bottom: 30px;
}

h3 {
    font-family: "Plus Jakarta Sans", sans-serif;
    font-style: normal;
    font-weight: 700;
    font-size: 28px;
    line-height: 35px;
    color: #05264E;
}

.block-pricing .box-info-price .text-price {
    font-size: 30px;
    color: #FFC000;
    font-family: "Plus Jakarta Sans", sans-serif;
    line-height: 56px;
    font-weight: 800;
    margin-right: 1px;
}

.block-pricing .box-info-price .text-month {
    font-size: 18px;
    line-height: 26px;
    color: #A0ABB8;
}

.mb-30 {
    margin-bottom: 30px !important;
}

.border-bottom {
    border-bottom: 1px solid #dee2e6 !important;
}

.block-pricing .text-desc-package {
    font-size: 15px;
    line-height: 20px;
    color: #4F5E64;
}

.block-pricing .list-package-feature {
    display: inline-block;
    width: 100%;
    padding-bottom: 30px;
}

.block-pricing .list-package-feature li {
    display: inline-block;
    width: 100%;
    padding: 4px 0px 4px 35px;
    background: url(../imgs/template/icons/check-circle.svg) no-repeat left center;
    margin-bottom: 20px;
    font-size: 15px;
    line-height: 20px;
    color: #4F5E64;
}
</style>
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">{{$sale->user_name}}</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">View Order</span>
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

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header mt-3 h3">Order Data</div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-primary">

                        <tbody>
                            <tr class="">
                                <td scope="row">Order Number</td>
                                <td>{{$sale->order_number}}</td>
                            </tr>

                            <tr class="">
                                <td scope="row">Status</td>
                                <td>{{$sale->status}}</td>
                            </tr>




                        </tbody>
                    </table>
                </div>


            </div>
        </div>

        <div class="card">
            <div class="card-header mt-3 h3">User Data</div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-primary">

                        <tbody>
                            <tr class="">
                                <td scope="row">User Name</td>
                                <td>{{$sale->user_name}}</td>
                            </tr>

                            <tr class="">
                                <td scope="row">Email</td>
                                <td>{{$sale->user_email}}</td>
                            </tr>

                            <tr class="">
                                <td scope="row">Phone</td>
                                <td>{{$sale->user_phone}}</td>
                            </tr>

                            <tr class="">
                                <td scope="row">Note</td>
                                <td>{{$sale->user_note}}</td>
                            </tr>


                            <tr class="">
                                <td scope="row">Payment Screenshot</td>
                                <td>
                                    <img src="{{asset('payment/'.$sale->payment_asset)}}" class="img-fluid rounded-top"
                                        alt="" style="width: 200px" />

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>


    </div>

    <div class="col-md-4">
        <div class="block-pricing">
            <div class="row">

                <div class="col-12 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <div class="box-pricing-item">
     
                        <div class="box-pricing-item shadow-lg rounded-lg p-4 text-center bg-white">
                            <h2 class="font-weight-bold text-primary">{{ $sale->membership->title }}</h2>
                            <hr class="my-3 w-75 mx-auto border-primary">
                            <ul class="list-unstyled text-left px-3">
                                <li><strong>Total Job:</strong> @if($sale->membership->total_job > 5000) <span
                                        class="text-success">Unlimited</span> @else {{ $sale->membership->total_job }}
                                    @endif</li>
                                <li><strong>Total Highlight Job:</strong> @if($sale->membership->highlight_job > 5000)
                                    <span class="text-success">Unlimited</span> @else
                                    {{ $sale->membership->highlight_job }} @endif
                                </li>
                                <li><strong>Bulk CV:</strong> {{ $sale->membership->bluk_cvs }}</li>
                                <li><strong>Feature Job:</strong> @if($sale->membership->is_feature_company == 1) <span
                                        class="text-success">Yes</span> @else <span class="text-danger">No</span> @endif
                                </li>
                                <li><strong>Auto Job Match:</strong> @if($sale->membership->auto_match == 1) <span
                                        class="text-success">Yes</span> @else <span class="text-danger">No</span> @endif
                                </li>
                                <li><strong>Share Listing on Other Platforms:</strong> <span
                                        class="text-success">Yes</span></li>
                            </ul>
                            <div class="mt-3 px-3">{!! $sale->membership->summary !!}</div>
                            <h4 class="font-weight-bold text-dark mt-3">{{ number_format($sale->membership->price) }} Ks
                            </h4>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header mt-3 h3">{{ __('Confirm Employer') }}</div>

            <div class="card-body">

                <form method="POST" action="{{ route('admin.orders.update', $sale->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <select class="form-control form-select form-select-lg" name="status" id="status">
                            <option selected value="{{$sale->status}}">{{$sale->status}}</option>
                            <option value="Completed">Completed</option>
                            <option value="Pending">Pending</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="" class="form-label">Total Job Posts </label>
                        <input
                            type="number"
                            class="form-control"
                            name="jobs"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Total Highlight Jobs </label>
                        <input
                            type="number"
                            class="form-control"
                            name="highlights"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">End Date </label>
                        <input
                            type="date"
                            class="form-control"
                            name="end_date"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div> -->




                    <button type="submit" class="btn btn-primary float-right">Update <i
                            class="anticon anticon-save"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection