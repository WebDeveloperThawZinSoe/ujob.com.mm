@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
 <!-- login -->
 <section class="pt-100 login-register">
    <div class="container"> 
      <div class="row login-register-cover">
        <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
          <div class="text-center">
            <p class="font-sm text-brand-2">Welcome back! </p>
            <h2 class="mt-10 mb-5 text-brand-1">Sign in</h2>
            <p class="font-sm text-muted mb-30">YOUR DREAM JOB AT YOUR FINGERTIPS!</p>
            <button class="btn social-login hover-up mb-20"><img src="assets/imgs/template/icons/icon-google.svg" alt="jobbox"><strong>Sign up with Google</strong></button>
            <div class="divider-text-center"><span>Or continue with</span></div>
          </div>
          <form class="login-register text-start mt-20" action="{{ route('login') }}" method="post">
            @csrf @method('POST')
            <div class="form-group">
              <label class="form-label" for="input-1">Email address *</label>
              <input class="form-control @error('email') is-invalid @enderror" id="input-1" type="text" required="" name="email" placeholder="Kaung Kaung" value="{{ old('email') }}">
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="input-4">Password *</label>
              <input class="form-control @error('password') is-invalid @enderror" id="input-4" type="password" required="" name="password" placeholder="************">
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="login_footer form-group d-flex justify-content-between">
              <label class="cb-container">
                <input  type="checkbox" {{ old('remember') ? 'checked' : '' }}><span class="text-small">Remenber me</span><span class="checkmark"></span>
              </label><a class="text-muted" href="/cooming-soon">Forgot Password</a>
            </div>
            <div class="form-group">
              <button class="btn btn-brand-1 hover-up w-100" type="submit">Login</button>
            </div>
            {{-- <div class="text-muted text-center">Don't have an Account? <a href="page-signin.html">Sign up</a></div> --}}
          </form>
        </div>
        <div class="img-1 d-none d-lg-block"><img class="shape-1" src="{{asset('/')}}assets/imgs/page/login-register/img-4.svg" alt="JobBox"></div>
        <div class="img-2"><img src="{{asset('/')}}assets/imgs/page/login-register/img-3.svg" alt="JobBox"></div>
      </div>
    </div>
  </section>
  <!-- end login -->
@endsection

@section('script')
@endsection