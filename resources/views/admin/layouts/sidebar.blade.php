<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fe-airplay"></i>
                        <span class="badge badge-success badge-pill float-right"></span>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('country.index') }}">
                        <i class="fas fa-globe-asia"></i>
                        <span class="badge badge-success badge-pill float-right"></span>
                        <span> Country </span>
                    </a>
                </li>
                <li id="users-tab">
                    <a href="{{ route('state.index') }}" id="users-tab-a">
                        <i class="fas fa-globe-asia"></i>
                        <span class="badge badge-success badge-pill float-right"></span>
                        <span>State </span>
                    </a>
                </li>
                <li id="services-tab">
                    <a href="javascript:void(0);" id="services-tab-a">
                        <i class="fas fa-city"></i>
                        <span class="badge badge-success badge-pill float-right"></span>
                        <span> City </span>
                    </a>
                </li>
                <li id="sub-services-tab">
                    <a href="javascript:void(0);" id="sub-services-tab-a">
                        <i class="fas fa-layer-group"></i>
                        <span class="badge badge-success badge-pill float-right"></span>
                        <span> Tech Stacks </span>
                    </a>
                </li>
                <li id="pickup-time-slots-tab">
                    <a href="javascript:void(0);" id="pickup-time-slots-tab-a">
                        <i class="fas fa-sitemap"></i>
                        <span class="badge badge-success badge-pill float-right"></span>
                        <span> Departments </span>
                    </a>
                </li>
                <li id="dropoff-time-slots-tab">
                    <a href="javascript:void(0);" id="dropoff-time-slots-tab-a">
                        <i class="fas fa-users"></i>
                        <span class="badge badge-success badge-pill float-right"></span>
                        <span> Users </span>
                    </a>
                </li>
                <li id="site-tab">
                    <a href="javascript:void(0);" id="site-tab-a">
                        <i class="fas fa-project-diagram"></i>
                        <span class="badge badge-success badge-pill float-right"></span>
                        <span> Project Category </span>
                    </a>
                </li>
                <li id="app-version-tab">
                    <a href="javascript:void(0);" id="app-version-tab-a">
                        <i class="fas fa-project-diagram"></i>
                        <span class="badge badge-success badge-pill float-right"></span>
                        <span> Projects </span>
                    </a>
                </li>
                <li id="app-version-tab">
                    <a href="javascript:void(0);" id="app-version-tab-a">
                        <i class="fas fa-user-friends"></i>
                        <span class="badge badge-success badge-pill float-right"></span>
                        <span> Clients </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->