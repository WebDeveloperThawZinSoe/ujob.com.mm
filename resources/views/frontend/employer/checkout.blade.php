@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<section class="section-box">
  <div class="breacrumb-cover">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="mb-10">Checkout</h2>
          {{-- <p class="font-lg color-text-paragraph-2">Pricing built to suits teams of all sizes.</p> --}}
        </div>
        <div class="col-lg-6 text-lg-end">
          <ul class="breadcrumbs mt-40">
            <li><a class="home-icon" href="/">Home</a></li>
            <li>Checkout</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
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
                        <input class="form-control" type="text" placeholder="Steven Job" name="user_name">
                      </div>
                      <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Email *</label>
                        <input class="form-control" type="text" placeholder="stevenjob@gmail.com" name="user_email">
                      </div>
                      <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Contact number</label>
                        <input class="form-control" type="text" placeholder="09 - 234 567 89" name="user_phone">
                      </div>
                      <div class="heading_s1">
                        <h4 class="font-sm color-text-mutted mb-10">Additional information</h4>
                        </div>
                        <div class="form-group mb-0">
                            <textarea rows="5" class="form-control" placeholder="Order notes" name="user_note"></textarea>
                        </div>
                      </div>
                      
                      
                    </div>
                    
                  </div>
                  <div class="col-md-4">
                    <div class="block-pricing">
                        <div class="row">
                
                          <div class="col-12 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="box-pricing-item">
                              {!! $membership->summary !!}
                            </div>
                            
                          </div> 
                          
                        </div>
                    </div>
        
                    <div class="sidebar-border">
                        <h6 class="f-18">Payment</h6>
                        <div class="sidebar-list-job">
                            <ul class="ul-disc">
                              <li>KBZ Pay: (09191919191)</li>
                              <li>KBZ Bank: (09191919191)</li>
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