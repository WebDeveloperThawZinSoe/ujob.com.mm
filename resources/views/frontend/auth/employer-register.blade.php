@extends('frontend.layouts.app')
@section('style')
@section('style')
<style>
@media (max-width: 768px) {
    .pt-70 {
        padding-top: 0 !important;
    }

    .customize_margin_left {
        margin-left: 20px !important;
    }

}

.login-register-cover {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.form-control {
    width: 100% !important;
}
</style>
@endsection

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')

@endsection
@section('content')

<!-- register -->
<section class="pt-70 login-register customize_margin_left">
    <div class="container">
        <div class="row login-register-cover">
            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                <div class="text-center">
                    <!-- <p class="font-sm text-brand-2">Register </p> -->
                    <h2 class="mt-10 mb-5 text-brand-1">Register As Employer</h2>
                    <!-- <p class="font-sm text-muted mb-30">YOUR DREAM JOB AT YOUR FINGERTIPS!</p> -->
                    <!-- <button class="btn social-login hover-up mb-20"><img src="{{asset('assets/imgs/template/icons/icon-google.svg')}}" alt="jobbox"><strong>Sign up with Google</strong></button>
                    <div class="divider-text-center"><span>Or continue with</span></div> -->
                </div>

                <form class="login-register text-start mt-20"
                    action="{{route('frontend.auth.register.employer.store')}}" method="post">
                    @csrf @method('POST')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="input-1">Your Name *</label>
                                <input class="form-control" id="input-1" type="text" required="" name="name"
                                    placeholder="Kaung Kaung" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="input-3">Company Name *</label>
                                <input class="form-control" id="input-3" type="text" required="" name="company_name"
                                    placeholder="Kaung Co., Ltd" value="{{ old('company_name') }}">
                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="input-2">Email *</label>
                        <input class="form-control" id="input-2" type="email" required="" name="email"
                            placeholder="kaungkaung@gmail.com" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="input-4">Password *</label>
                        <input class="form-control" id="input-4" type="password" required="" name="password"
                            placeholder="************">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-5">Re-Password *</label>
                        <input class="form-control" id="input-5" type="password" required=""
                            name="password_confirmation" placeholder="************">
                    </div>
                    <div class="login_footer form-group d-flex justify-content-between">
                        <label class="cb-container">
                            <input required type="checkbox"><span class="text-small">Agree our terms and
                                policy</span><span class="checkmark"></span>
                        </label><a class="text-muted" href="#">Lean more</a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-brand-1 hover-up w-100" type="submit" name="login">Submit &amp;
                            Register</button>
                    </div>
                    <div class="text-muted text-center">Already have an account? <a href="/login">Sign in</a></div>
                </form>

            </div>
            <div class="img-1 d-none d-lg-block"><img class="shape-1" src="/assets/imgs/page/login-register/img-1.svg"
                    alt="JobBox"></div>
            <div class="img-2"><img src="/assets/imgs/page/login-register/img-2.svg" alt="JobBox"></div>
        </div>
    </div>
</section>
<!-- end register -->


@endsection

@section('script')

@endsection