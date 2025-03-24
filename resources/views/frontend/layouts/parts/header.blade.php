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
              <li class="">
                <a class="" href="/about-us">About Us</a>
              </li>
              
              @guest
              <!-- <li class="">
                <a class="{{ Route::is('frontend.contact') ? 'active' : '' }}" href="{{route('frontend.auth.register.employer')}}">Employer Register</a>
              </li> -->
              <li class="has-children"><a href="#">Register</a>
                <ul class="sub-menu">
                  <li><a href="{{route('frontend.auth.register.employer')}}" >Employer Register</a></li>
                  <li><a href="{{route('register')}}">Seeker Register</a></li>
                  
                </ul>
              </li>
              @endguest
              @auth
             
                @can('employer')
                <!-- <li class="has-children"><a href="#">Dashboard</a> -->
                <!-- <ul class="sub-menu">
                  <li><a href="{{route('frontend.employer.profile', auth()->user()->employer->company_name)}}">Porfile</a></li>
                  <li><a href="{{route('frontend.employer.jobs', auth()->user()->employer->company_name)}}">Post Jobs</a></li>
                  <li><a href="{{route('frontend.employer.membership.show')}}">My Membership</a></li>
                </ul> -->
                  <!-- </li> -->
                @endcan
                @can('seeker')
                <!-- <li class="has-children"><a href="#">Dashboard</a>
                <ul class="sub-menu">
                  <li><a href="{{route('frontend.seeker.profile')}}" >Porfile</a></li>
                  <li><a href="{{route('frontend.cv', auth()->user()->seeker->id)}}">Preview CV</a></li>
                  
                </ul>
                </li> -->
                @endcan
             
              @endauth
              

            </ul>
          </nav>
          <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
        </div>
        <div class="header-right">
          <div class="block-signin">
            @auth
            <a  href="/redirect/auth" class="btn btn-default btn-shadow ml-40 hover-up">Dashboard</a>
           
            
            <!-- <button class="btn btn-default btn-shadow ml-40 hover-up" data-bs-toggle="modal"
            data-bs-target="#jobHuntingPopup">Job Hunting</button> -->
           
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
                <!-- <form action="{{route('frontend.job.hunting.apply')}}" method="post">
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

                </form> -->
                

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
                
              
              </ul>
            </nav>
          </div>
          <div class="mobile-account">
            @guest
            <h6 class="mb-10">Account</h6>
            @endguest
            @auth
            <h6 class="mb-10">Dashboard</h6>
            @endauth
            <ul class="mobile-menu font-heading">
              @auth
              @can('employer')
                <li><a href="{{ route('frontend.employer.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('frontend.employer.jobs.lists') }}">My Jobs</a></li>
                <!-- <li><a href="{{ route('frontend.employer.jobs.lists') }}">CV List</a></li> -->
                @php 
                $user_id = Auth::user()->id;
                $employer = App\Models\Employer::where('user_id', $user_id)->first();
                @endphp
                <li><a href="/employer/profile/{{ $employer->company_name }}">Profile Setting</a></li>
                <li><a href="{{ route('frontend.employer.password_update') }}">Change Password</a></li>
                <!-- <li><a href="{{route('frontend.employer.profile', auth()->user()->employer->company_name)}}">Porfile</a></li>
                <li><a href="{{route('frontend.employer.jobs', auth()->user()->employer->company_name)}}">Post Jobs</a></li>
                <li><a href="{{route('frontend.employer.membership.show')}}">My Membership</a></li> -->
              
              @endcan
              @can('seeker')
                <li><a href="/seeker/dashboard">Dashboard</a></li>
                <li><a href="/seeker/profile">My Profile</a></li>
                <li><a href="/seeker/job/base_on_profile">Jobs Based On Your Profile</a></li>
                <li><a href="/seeker/applied/jobs"> My Jobs</a></li>
               
                <li><a  target="_blank" href="{{ route('frontend.cv', auth()->user()->seeker->id) }}">View Ujob CV</a></li>
                <!-- <li><a href="{{route('frontend.seeker.profile')}}" >Porfile</a></li>
                <li><a href="{{route('frontend.cv', auth()->user()->seeker->id)}}">Preview CV</a></li> -->
                
              @endcan
              <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Sign Out</a></li>
            @endauth

            @guest
            <li><a href="/register/employer"
                >Employer Register</a></li>
                <li><a href="/register/employer"
                >Seeker Register</a></li>
                <li><a href="/login"
                >Login Your Account</a></li>
            @endguest
             
            </ul>
          </div>
        
        </div>
      </div>
    </div>
  </div>