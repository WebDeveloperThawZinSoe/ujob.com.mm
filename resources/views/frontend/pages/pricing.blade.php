@extends('frontend.layouts.app')
@section('style')
<style>
.text-primary {
    color: #FFC000 !important;
}

.btn-primary {
    background-color: #FFC000 !important;
    border-color: #FFC000 !important;
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
              
                    <div class="row g-4">
                        @foreach ($memberships as $data)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp"
                            data-wow-delay=".1s">
                            <div
                                class="box-pricing-item shadow-sm rounded-4 p-4 bg-white h-100 border border-light-subtle position-relative overflow-hidden hover-shadow transition">
                                <h3 class="fw-bold text-primary mb-3 text-center">{{ $data->title }}</h3>

                                <hr class="my-3 w-50 mx-auto border-primary">

                                <p class="text-muted mb-4">
                                    Choose from our flexible and affordable packages designed to meet your hiring needs.
                                </p>

                                <div class="small text-secondary mb-4">
                                    <i class="bi bi-telephone-fill me-1"></i> 09 949 221 468 <br>
                                    <i class="bi bi-envelope-fill me-1"></i> inquiry@ujob.com.mm
                                </div>

                                @if($data->price >= 1)
                                <a class="btn btn-primary px-4 py-2 rounded-pill"
                                    href="{{ route('frontend.membership.apply', $data->id) }}">
                                    Choose Plan
                                </a>
                                @else
                                <a class="btn btn-outline-secondary px-4 py-2 rounded-pill disabled" href="#">
                                    Default Role
                                </a>
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
<!-- <ul class="list-unstyled text-left px-3">
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
                            <h4 class="font-weight-bold text-dark mt-3">{{ number_format($data->price) }} Ks</h4> -->
@endsection