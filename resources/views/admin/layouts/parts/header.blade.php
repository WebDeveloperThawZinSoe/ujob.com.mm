<div class="header">
    <div class="logo logo-dark">
        <a href="/">
            <img src="{{asset('backend/images/logo.png')}}" alt="Logo" style="width: 120px">
            <img class="logo-fold" src="{{asset('backend/images/logofc.png')}}" alt="Logo" style="width: 50px;
            margin: 0 auto;">
        </a>
    </div>
    <div class="logo logo-white">
        <a href="/">
            <img src="{{asset('backend/images/logo-white.png')}}" alt="Logo" style="width: 120px">
            <img class="logo-fold" src="{{asset('backend/images/logofc.png')}}" alt="Logo" style="width: 50px;
            margin: 0 auto;">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            
        </ul>
        <ul class="nav-right">
            
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-image  m-h-10 m-r-15">
                        <img src="{{asset('backend/images/user.png')}}"  alt="41Dev">
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            <div class="avatar avatar-lg avatar-image">
                                <img src="{{asset('backend/images/user.png')}}" alt="41Dev">
                            </div>
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">
                                    {{-- {{ Auth::user()->name }} --}}
                                </p>
                                <p class="m-b-0 opacity-1">
                                    {{-- {{ Auth::user()->email }} --}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/change-password" class="dropdown-item d-block p-h-15 p-v-10">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                            <span class="m-l-10">Edit Profile</span>
                        </div>
                        <i class="anticon font-size-10 anticon-right"></i>
                    </div>
                </a>
                
                
            
                <a href="#" onclick="confirmLogout(event);" class="dropdown-item d-block p-h-15 p-v-10">
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
            <span class="m-l-10">Logout</span>
        </div>
        <i class="anticon font-size-10 anticon-right"></i>
    </div>
</a>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<!-- SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmLogout(event) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You will be logged out!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, logout!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("logout-form").submit();
            }
        });
    }
</script>

        </a>
    </div>
</li>

</ul>
</div>
</div>    