@extends('frontend.layouts.app')

@section('content')
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
<!-- register -->
<section class="pt-70 login-register customize_margin_left">
    <div class="container">
        <div class="row login-register-cover">
            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                <div class="text-center">
                    <p class="font-sm text-brand-2">Register </p>
                    <!-- <h2 class="mt-10 mb-5 text-brand-1">Register As Seeker</h2>
            <p class="font-sm text-muted mb-30">YOUR DREAM JOB AT YOUR FINGERTIPS!</p> -->
                    <a href="{{ route('google.login') }}" class="btn social-login hover-up mb-20"><img
                            src="assets/imgs/template/icons/icon-google.svg" alt="jobbox"><strong>Sign up with
                            Google</strong></a>
                    <div class="divider-text-center"><span>Or continue with</span></div>
                </div>
                <form class="login-register text-start mt-20" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="input-1">Full Name *</label>
                        <input class="form-control" id="input-1" type="text" name="name" value="{{ old('name') }}"
                            required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="input-2">Email *</label>
                                <input class="form-control" id="input-2" type="email" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="input-6">Contact Number *</label>
                                <input class="form-control" id="input-6" type="text" name="viber_number"
                                    value="{{ old('viber_number') }}" required autocomplete="viber_number">
                                @error('viber_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>




                    <!-- <div class="form-group">
              <label class="form-label" for="input-3">Username *</label>
              <input class="form-control" id="input-3" type="text" required="" name="username" placeholder="stevenjob">
            </div> -->
                    <div class="form-group">
                        <label class="form-label" for="input-4">Password *</label>
                        <input class="form-control" id="input-4" type="password" name="password" required
                            autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-5">Re-Password *</label>
                        <input class="form-control" id="input-5" type="password" name="password_confirmation" required
                            autocomplete="new-password">
                    </div>
                    <div class="login_footer form-group d-flex justify-content-between">
                        <label class="cb-container">
                            <input type="checkbox"><span class="text-small">Agree our terms and policy</span><span
                                class="checkmark"></span>
                        </label><a class="text-muted" href="page-contact.html">Lean more</a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-brand-1 hover-up w-100" type="submit" name="login">Submit &amp;
                            Register</button>
                    </div>
                    <div class="text-muted text-center">Already have an account? <a href="page-signin.html">Sign in</a>
                    </div>
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