@extends('frontend.layouts.app')
@section('style')
<style>
    .text-primary{
        color:#FFC000  !important;
    }

    .btn-primary{
        background-color:#FFC000  !important;
        border-color : #FFC000  !important;
    }
</style>
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')

@endsection
@section('content')


<section class="section-box ">
    <div class="container">
        <div class="max-width-price">
            <div class="block-pricing mt-70">
                <div class="row">
                    @foreach ($memberships as $data)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp"
                        data-wow-delay=".1s">
                        <div class="box-pricing-item shadow-lg rounded-lg p-4 text-center bg-white">
                            <h2 class="font-weight-bold text-primary">{{ $data->title }}</h2>
                            <hr class="my-3 w-75 mx-auto border-primary">
                            <ul class="list-unstyled text-left px-3">
                                <li><strong>Total Job:</strong> @if($data->total_job > 5000) <span
                                        class="text-success">Unlimited</span> @else {{ $data->total_job }} @endif</li>
                                <li><strong>Total Highlight Job:</strong> @if($data->highlight_job > 5000) <span
                                        class="text-success">Unlimited</span> @else {{ $data->highlight_job }} @endif
                                </li>
                                <li><strong>Bulk CVs:</strong> {{ $data->bluk_cvs }}</li>
                                <li><strong>Feature Job:</strong> @if($data->is_feature_company == 1) <span
                                        class="text-success">Yes</span> @else <span class="text-danger">No</span> @endif
                                </li>
                                <li><strong>Auto Job Match:</strong> @if($data->auto_match == 1) <span
                                        class="text-success">Yes</span> @else <span class="text-danger">No</span> @endif
                                </li>
                                <li><strong>Share Listing on Other Platforms:</strong> <span
                                        class="text-success">Yes</span></li>
                            </ul>
                            <div class="mt-3 px-3">{!! $data->summary !!}</div>
                            <h4 class="font-weight-bold text-dark mt-3">{{ number_format($data->price) }} Ks</h4>
                            @if($data->price >= 1)
                            <a class="btn btn-primary mt-3 px-4 py-2 rounded-pill"
                                href="{{ route('frontend.membership.apply', $data->id) }}">Choose Plan</a>
                            @else
                            <a class="btn btn-secondary mt-3 px-4 py-2 rounded-pill" href="#">Default Role </a>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection