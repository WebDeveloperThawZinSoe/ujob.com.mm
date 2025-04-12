<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown 
            {{ Route::is('admin.index') ? 'active' : '' }}
            ">
                <a href="
                {{route('admin.index')}}
                ">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-inbox"></i>
                    </span>
                    <span class="title">Jobs</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin.jobs.index') ? 'active' : '' }}">
                        <a href="{{route('admin.jobs.index')}}">All Jobs</a>
                    </li> 
                    
                                 <li class="{{ Route::is('admin.jobs.create') ? 'active' : '' }}">
                        <a href="{{route('admin.jobs.create')}}">Create Job</a>
                    </li> 
                    
                </ul>
            </li>


            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-user"></i>
                    </span>
                    <span class="title">Seekers</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin.seeker.index') ? 'active' : '' }}">
                        <a href="/admin/seekers">All Seekers</a>
                    </li> 
                    <!--<li class="{{ Route::is('admin.seeker.open_to_work') ? 'active' : '' }}">-->
                    <!--    <a href="/admin/seekers/open-to-work">Open To Work Seekers</a>-->
                    <!--</li> -->
                   
                    
                </ul>
            </li>


            <li class="nav-item dropdown {{ Route::is('admin.employers.index') ? 'active' : '' }}">
                <a href="{{route('admin.employers.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Employers</span>
                </a>
            </li>



            <li class="nav-item dropdown {{ Route::is('admin.categories.index') ? 'active' : '' }}">
                <a href="{{route('admin.categories.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-cluster"></i>
                    </span>
                    <span class="title">Categories</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Route::is('admin.locations.index') ? 'active' : '' }}">
                <a href="{{route('admin.locations.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-environment"></i>
                    </span>
                    <span class="title">Locations</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Route::is('admin.skills.index') ? 'active' : '' }}">
                <a href="{{route('admin.skills.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-crown"></i>
                    </span>
                    <span class="title">Skills</span>
                </a>
            </li>
            <li class="nav-item dropdown {{ Route::is('admin.articles.index') ? 'active' : '' }}">
                <a href="{{route('admin.articles.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-file"></i>
                    </span>
                    <span class="title">Blogs</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Route::is('admin.advertisements.index') ? 'active' : '' }}">
                <a href="{{route('admin.advertisements.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-notification"></i>
                    </span>
                    <span class="title">Advertisements</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Route::is('admin.memberships.index') ? 'active' : '' }}">
                <a href="{{route('admin.memberships.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-team"></i>
                    </span>
                    <span class="title">Memberships</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Route::is('admin.orders.index') ? 'active' : '' }}">
                <a href="{{route('admin.orders.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-solution"></i>
                    </span>
                    <span class="title">Orders</span>
                </a>
            </li>

            <!-- <li class="nav-item dropdown {{ Route::is('admin.email-lists.index') ? 'active' : '' }}">
                <a href="{{route('admin.email-lists.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-solution"></i>
                    </span>
                    <span class="title">Email Lists</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Route::is('admin.email-lists.index') ? 'active' : '' }}">
                <a href="{{route('admin.email-lists.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-solution"></i>
                    </span>
                    <span class="title">Seekers / CV</span>
                </a>
            </li> -->

            {{-- <li class="nav-item dropdown {{ Route::is('admin.events.index') ? 'active' : '' }}">
                <a href="{{route('admin.events.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-calendar"></i>
                    </span>
                    <span class="title">Events</span>
                </a>
            </li>
           

            <li class="nav-item dropdown {{ Route::is('admin.courses.index') ? 'active' : '' }}">
                <a href="{{route('admin.courses.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-read"></i>
                    </span>
                    <span class="title">Courses</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Route::is('admin.orders.index') ? 'active' : '' }}">
                <a href="{{route('admin.orders.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-bars"></i>
                    </span>
                    <span class="title">Orders</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Route::is('admin.orders.charts') ? 'active' : '' }}">
                <a href="{{route('admin.orders.charts')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-bar-chart"></i>
                    </span>
                    <span class="title">Sale Reports</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-team"></i>
                    </span>
                    <span class="title">Accounts</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin.accounts.index') ? 'active' : '' }}">
                        <a href="{{route('admin.accounts.index')}}">All Accounts</a>
                    </li> 
                    
                    <li class=" {{ Route::is('admin.accounts.create') ? 'active' : '' }}">
                        <a href="{{route('admin.accounts.create')}}">Add New</a>
                    </li>
                    
                </ul>
            </li> --}}

        </ul>
    </div>
</div>