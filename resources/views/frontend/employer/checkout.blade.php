@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')

@endsection
@section('content')


<section class="section-box mt-90">
    <div class="container">
        <form action="{{route('frontend.membership.apply.submit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <h3 class="mt-0 mb-15 color-brand-1">Checkout</h3>
                    <input class="form-control" type="hidden" value="{{$membership->id}}" name="membership_id">
                    <div class="row form-contact">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                                <input class="form-control" type="text" value="{{ Auth::user()->name }}" name="user_name">
                            </div>
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Email *</label>
                                <input class="form-control" type="text" value="{{ Auth::user()->email }}"
                                    name="user_email">
                            </div>
                            <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Contact number</label>
                                <input class="form-control" type="text" value="{{ Auth::user()->employer->phone }}"name="user_phone">
                            </div>
                            <div class="heading_s1">
                                <h4 class="font-sm color-text-mutted mb-10">Additional information</h4>
                            </div>
                            <div class="form-group mb-0">
                                <textarea rows="5" class="form-control" placeholder="Order notes"
                                    name="user_note"></textarea>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="col-md-4">
                    <!-- <div class="block-pricing">
                        <div class="row">

                            <div class="col-12 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <div class="box-pricing-item">
                                   
                                    <div class="box-pricing-item shadow-lg rounded-lg p-4 text-center bg-white">
                                        <h2 class="font-weight-bold text-primary">{{ $membership->title }}</h2>
                                        <hr class="my-3 w-75 mx-auto border-primary">
                                        <ul class="list-unstyled text-left px-3">
                                            <li><strong>Total Job:</strong> @if($membership->total_job > 5000) <span
                                                    class="text-success">Unlimited</span> @else {{ $membership->total_job }}
                                                @endif</li>
                                            <li><strong>Total Highlight Job:</strong> @if($membership->highlight_job > 5000)
                                                <span class="text-success">Unlimited</span> @else
                                                {{ $membership->highlight_job }} @endif
                                            </li>
                                            <li><strong>Bulk CV:</strong> {{ $membership->bluk_cvs }}</li>
                                            <li><strong>Feature Job:</strong> @if($membership->is_feature_company == 1) <span
                                                    class="text-success">Yes</span> @else <span
                                                    class="text-danger">No</span> @endif
                                            </li>
                                            <li><strong>Auto Job Match:</strong> @if($membership->auto_match == 1) <span
                                                    class="text-success">Yes</span> @else <span
                                                    class="text-danger">No</span> @endif
                                            </li>
                                            <li><strong>Share Listing on Other Platforms:</strong> <span
                                                    class="text-success">Yes</span></li>
                                        </ul>
                                        <div class="mt-3 px-3">{!! $membership->summary !!}</div>
                                        <h4 class="font-weight-bold text-dark mt-3">{{ number_format($membership->price) }} Ks
                                        </h4>
                                       
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div> -->

                    <div class="sidebar-border">
                        <h6 class="f-18">Payment</h6>
                        <div class="sidebar-list-job">
                            <ul class="ul-disc">
                                <li><strong>23051323003024401</strong>(KBZ-HTY 4) <br> JZ Myanmar Co.,Ltd</li>

                            </ul>

                            <div class="form-group mt-15">
                                <label class="font-sm color-text-mutted mb-10">Payment Slip *</label>
                                <input class="form-control" type="file" value="" required name="payment_asset">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default mr-15 btn-apply-now">Checkout </button>
                    </div>

                </div>
            </div>

    </div>
    </form>


    </div>
</section>

@endsection

@section('script')

@endsection