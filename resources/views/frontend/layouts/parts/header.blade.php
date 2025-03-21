<!-- Header for PC -->
<header class="header sticky-bar">
    <div class="container">
      <div class="main-header">
        <div class="header-left">
          <div class="header-logo"><a class="d-flex" href="/"><img alt="UJob" src="{{asset('assets/imgs/ujob/logo.svg')}}"></a></div>
        </div>
        <div class="header-nav">
          <nav class="nav-main-menu">
            <ul class="main-menu">
              <li class="">
                <a class="{{ Route::is('frontend.index') ? 'active' : '' }}" href="/">Home</a>
            </li>
              
              <li class="">
                <a class="{{ Route::is('frontend.jobs') ? 'active' : '' }}" href="{{route('frontend.jobs')}}">Find Job</a>
              </li>
              <li class="">
                <a class="" href="/companies">Companies</a>
              </li>
              
              
              <li class="">
                <a class="{{ Route::is('frontend.pricing') ? 'active' : '' }}" href="{{route('frontend.pricing')}}">Pricing</a>
              </li>
              @guest
              <li class="">
                <a class="{{ Route::is('frontend.contact') ? 'active' : '' }}" href="{{route('frontend.auth.register.employer')}}">Employer Register</a>
              </li>
              <li class="has-children"><a href="#">Register</a>
                <ul class="sub-menu">
                  <li><a href="{{route('frontend.auth.register.employer')}}" >Employer Register</a></li>
                  <li><a href="{{route('register')}}">Seeker Register</a></li>
                  
                </ul>
              </li>
              @endguest
              @auth
              <li class="has-children"><a href="#">Dashboard</a>
                @can('employer')
                <ul class="sub-menu">
                  <li><a href="{{route('frontend.employer.profile', auth()->user()->employer->company_name)}}">Porfile</a></li>
                  <li><a href="{{route('frontend.employer.jobs', auth()->user()->employer->company_name)}}">Post Jobs</a></li>
                  <li><a href="{{route('frontend.employer.membership.show')}}">My Membership</a></li>
                </ul>
                @endcan
                @can('seeker')
                <ul class="sub-menu">
                  <li><a href="{{route('frontend.seeker.profile')}}" >Porfile</a></li>
                  <li><a href="{{route('frontend.cv', auth()->user()->seeker->id)}}">Preview CV</a></li>
                  
                </ul>
                @endcan
              </li>
              @endauth
              

            </ul>
          </nav>
          <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
        </div>
        <div class="header-right">
          <div class="block-signin">
            @auth
            
            <button class="btn btn-default btn-shadow ml-40 hover-up" data-bs-toggle="modal"
            data-bs-target="#jobHuntingPopup">Job Hunting</button>
           
           <!-- Modal Body -->
           <div
            class="modal fade"
            id="jobHuntingPopup"
            tabindex="-1"
            data-bs-backdrop="static"
            data-bs-keyboard="false"
            
            role="dialog"
            aria-labelledby="modalTitleId"
            aria-hidden="true"
           >
            <div
              class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
              role="document"
            >
              <div class="modal-content">
                <form action="{{route('frontend.job.hunting.apply')}}" method="post">
                  @method('POST')
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                      Job Hunting
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label class="form-label" for="Jobemail" style="text-align: left">Your Email *</label>
                      <input class="form-control" id="Jobemail" type="email" required="" name="email" placeholder="kaungkaung@gmail.com" value="{{ old('email') }}">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-default btn-shadow">Submit</button>
                  </div>

                </form>
                

              </div>
            </div>
           </div>
           
           <!-- Optional: Place to the bottom of scripts -->
           <script>
            const myModal = new bootstrap.Modal(
              document.getElementById("jobHuntingPopup"),
              options,
            );
           </script>
           
            @endauth

            @guest
            
            <a class="btn btn-default btn-shadow ml-40 hover-up" href="/login">Sign in</a>
            @endguest
            
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Header for mobile -->
  

  <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
      <div class="mobile-header-content-area">
        <div class="perfect-scroll">
          <div class="mobile-search mobile-header-border mb-30">
            <form action="{{route('frontend.jobs')}}" method="get">
              <input type="text" name="title" placeholder="Search…"><i class="fi-rr-search" type="submit"></i>
            </form>
          </div>
          <div class="mobile-menu-wrap mobile-header-border">
            <!-- mobile menu start-->
            <nav>
              <ul class="mobile-menu font-heading">
                <li class="">
                  <a class="{{ Route::is('frontend.index') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="">
                  <a class="{{ Route::is('frontend.jobs') ? 'active' : '' }}" href="{{route('frontend.jobs')}}">Find Job</a>
                </li>
                <li class="">
                  <a class="" href="/companies">Companies</a>
                </li>
                
                <li class="">
                  <a class="{{ Route::is('frontend.pricing') ? 'active' : '' }}" href="{{route('frontend.pricing')}}">Pricing</a>
                </li>
                @guest
                <li class="">
                  <a class="{{ Route::is('frontend.contact') ? 'active' : '' }}" href="{{route('frontend.auth.register.employer')}}">Employer Register</a>
                </li>
                @endguest
              
              </ul>
            </nav>
          </div>
          <div class="mobile-account">
            <h6 class="mb-10">Your Account</h6>
            <ul class="mobile-menu font-heading">
              @auth
              @can('employer')
                <li><a href="{{route('frontend.employer.profile', auth()->user()->employer->company_name)}}">Porfile</a></li>
                <li><a href="{{route('frontend.employer.jobs', auth()->user()->employer->company_name)}}">Post Jobs</a></li>
                <li><a href="{{route('frontend.employer.membership.show')}}">My Membership</a></li>
              
              @endcan
              @can('seeker')
                <li><a href="{{route('frontend.seeker.profile')}}" >Porfile</a></li>
                <li><a href="{{route('frontend.cv', auth()->user()->seeker->id)}}">Preview CV</a></li>
                
              @endcan
            @endauth


              <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Sign Out</a></li>
            </ul>
          </div>
          <div class="site-copyright">Copyright 2022 &copy; JobBox. <br>Designed by AliThemes.</div>
        </div>
      </div>
    </div>
  </div>